<?php

use Engine\Db;

class MessageClass {
	
	private $DBConfig = [
		'host' => '127.0.0.1',
		'username' => '',
		'password' => '',
		'database' => 'cw',
		'port' => '3306',
	];
	
	private $DB;
	protected $APIWebsite = 'https://api.telegram.org/bot331870319:AAF9SGGAX436UkmFzv9U4JBlUuKLLXSwpLM/';
	
	private function GetChatID($URL) {
		$Parts = parse_url($URL);
		parse_str($Parts['query'], $Query);
		return $Query['chat_id'];
	}
	
	private function Request($URL) {
		$ch = curl_init($URL);

		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
		curl_setopt($ch, CURLOPT_COOKIESESSION, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_FORBID_REUSE, false);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, false);
		curl_setopt($ch, CURLOPT_HEADER, false);

		curl_setopt($ch, CURLOPT_VERBOSE, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
		curl_setopt($ch, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS);
		curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0");
		$content = curl_exec($ch);
		$err = curl_errno($ch);
		$errmsg = curl_error($ch);
		$header = curl_getinfo($ch);
		curl_close($ch);

		$header['errno'] = $err;
		$header['errmsg'] = $errmsg;
		$header['content'] = $content;

		return $header;
	}

	public function Send() {
		$this->DB = new Db($this->DBConfig['host'], $this->DBConfig['username'], $this->DBConfig['password'], $this->DBConfig['database'], $this->DBConfig['port']);
		$this->DB->query("SET NAMES utf8mb4;");
		
		$Row = $this->DB->getRow("SELECT MessageID, MessageURL FROM OutgoingMessages WHERE TimeToSend < UNIX_TIMESTAMP() AND Processed = 0 ORDER BY TimeToSend LIMIT 0, 1;");
		if (isset($Row['MessageURL']) && !empty($Row['MessageURL'])) {
			$Request = $this->Request($this->APIWebsite . $Row['MessageURL']);
			$Result = json_decode($Request['content'], true);
			if ($Request['http_code'] == 200) {
				$this->DB->updateRow(['Processed' => 1], 'OutgoingMessages', 'MessageID', $Row['MessageID']);
				if (strpos($Row['MessageURL'], 'sendMessage') !== false) {
					$URL = urldecode($Row['MessageURL']);
					parse_str(substr($URL, strpos($URL, 'sendMessage?') + 12), $ParamsArray);
					if (isset($ParamsArray['reply_markup']) && isset($ParamsArray['chat_id'])) {
						$ReplyMarkup = json_decode($ParamsArray['reply_markup'], true);
						if (isset($ReplyMarkup['inline_keyboard'][0][1]['switch_inline_query'])) {
							$this->DB->updateRow(['MessageID' => $Result['result']['message_id'], 'ChatID' => $ParamsArray['chat_id']], 'Monsters', 'ID', $ReplyMarkup['inline_keyboard'][0][1]['switch_inline_query']);
							$this->DB->insertRow(['MessageURL' => "deleteMessage?chat_id={$ParamsArray['chat_id']}&message_id={$Result['result']['message_id']}", 'TimeToSend' => time() + 180], 'OutgoingMessages');
						}
					}
				}
				return $Result['result']['message_id'];
			}
			elseif ($Request['http_code'] == 403) {
				if ($Result['description'] == 'Forbidden: user is deactivated') {
					$this->DB->updateRow(['Processed' => 2], 'OutgoingMessages', 'MessageID', $Row['MessageID']);
					$this->DB->updateRow(['Active' => 0], 'Users', 'TelegramID', $this->GetChatID($Row['MessageURL']));
					return 0;
				}
				elseif ($Result['description'] == 'Forbidden: bot was blocked by the user') {
					$this->DB->updateRow(['Processed' => 3], 'OutgoingMessages', 'MessageID', $Row['MessageID']);
					return 0;
				}
			}
			else {
				$this->DB->updateRow(['Processed' => 4], 'OutgoingMessages', 'MessageID', $Row['MessageID']);
				return 0;
			}
		}
		else {
			return 0;
		}
	}

}
