<?php

class Bot {
	
//	// нормальные значения
//	public $Flags = [
//		'red' => '🇮🇲',
//		'blue' => '🇪🇺',
//		'yellow' => '🇻🇦',
//		'white' => '🇨🇾',
//		'black' => '🇬🇵'
//	];
	
	// значения для 1 апреля
	public $Flags = [
		'red' => '⭕️',
		'blue' => '⚖️',
		'yellow' => '☠️',
		'white' => '🌐',
		'black' => '⚫️'
	];
	
//	// нормальные значения
//	public $Texts = [
//		'character' => "🏅Герой",
//		'defense' => "🛡 Защита",
//		'attack' => "⚔ Атака",
//		'cave' => "🕸Пещера",
//		'caravan' => "🐫ГРАБИТЬ КОРОВАНЫ",
//		'forest' => "🌲Лес",
//		'arena_search' => "🔎Поиск соперника",
//		'arena_cancel_search' => "✖️Отменить поиск",
//		'increase_attack' => "+1 ⚔Атака",
//		'increase_defense' => "+1 🛡Защита",
//		'pet_wash' => "🛁Почистить",
//		'pet_feed' => "🍼Покормить",
//		'pet_play' => "⚽️Поиграть"
//	];
	
	// значения для 1 апреля
	public $Texts = [
		'character' => "👨‍🚀 Пилот",
		'defense' => "🎚Оборона",
		'attack' => "💣Нападение",
		'cave' => "🔎Изучить планету",
		'caravan' => "🐫ГРАБИТЬ КОСМИЧЕСКИЕ КОРОВАНЫ",
		'forest' => "🛰Помочь кораблю",
		'arena_search' => "🔎Поиск соперника",
		'arena_cancel_search' => "✖️Отменить поиск",
		'increase_attack' => "+1 🎯Точность",
		'increase_defense' => "+1 🕹Маневренность",
		'pet_wash' => "🛁Почистить",
		'pet_feed' => "🍼Покормить",
		'pet_play' => "⚽️Поиграть"
	];
	
	public $Attack = [
		1 => '🗡в голову',
		2 => '🗡по корпусу',
		3 => '🗡по ногам'
	];
	
	public $Defense = [
		1 => '🛡головы',
		2 => '🛡корпуса',
		3 => '🛡ног'
	];
	
	public $Captcha = [
		11 => '🍉🍒',	// арбуз + вишня
		12 => '🍆🥕',	// баклажан + морковь
		13 => '🌭',	// хотдог
		14 => '🍕',	// пицца
		15 => '🍞🧀',	// хлеб + сыр
		16 => '🧀',	// сыр
		
		21 => '🐖',	// свинья
		22 => '🐈',	// кот
		23 => '🐎',	// конь
		24 => '🐐',	// коза
		25 => '🐕',	// собака
		26 => '🐿'	// бурундук
	];
	
	private $TelegramCLIDaemonPort;
	private $ChatWarsBot = "user#265204902";
	private $AdminUser = "user#85613593";
	private $CaptchaGroup = "chat#197129924";
	private $State;
	private $Castle;
	private $CharacterClass;
	private $LastArenaFile;
	private $CurrentStatusFile;
	private $CaptchaFile;
	private $CaptchaText;
	
	public function __construct($State, $CurrentUser, $Port) {
		$this->TelegramCLIDaemonPort = $Port;
		$this->State = $State;
		$this->LastArenaFile = "/home/{$CurrentUser}/tg/scripts/last_arena";
		$this->CurrentStatusFile = "/home/{$CurrentUser}/tg/scripts/current_status";
	}
	
	public function SetCastle($Castle) {
		$this->Castle = $Castle;
	}
	
	public function SetCaptchaFile($CaptchaFile) {
		$this->CaptchaFile = $CaptchaFile;
	}
	
	public function SetCaptchaText($CaptchaText) {
		$this->CaptchaText = $CaptchaText;
	}
	
	public function SetCharacterClass($CharacterClass) {
		$this->CharacterClass = $CharacterClass;
	}
	
	private function ArenaRandom() {
		$tmp = rand(1, 99);
		if ($tmp <= 33) {
			return 1;
		}
		elseif (($tmp > 33) and ($tmp <= 66)) {
			return 2;
		}
		elseif ($tmp > 66) {
			return 3;
		}
	}

	private function ArenaTime() {
		$Now = time();
		$LastArena = intval(trim(file_get_contents($this->LastArenaFile)));
		$TimeShift = $Now - $LastArena;
		if ($TimeShift > 3600) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	private function CurrentStatus() {
		return trim(file_get_contents($this->CurrentStatusFile));
	}

	private function BattleSoon() {
		$Hour = intval(date('H'));
		$Minute = intval(date('i'));
		$HoursBeforeBattle = array(3, 7, 11, 15, 19, 23);
		$BattleHours = array(0, 4, 8, 12, 16, 20);
		if ((in_array($Hour, $HoursBeforeBattle) && ($Minute > 45)) || (in_array($Hour, $BattleHours) && ($Minute < 7))) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	private function MsgSend($Recipient, $Message) {
		$fp = fsockopen("tcp://127.0.0.1", $this->TelegramCLIDaemonPort, $errno, $errstr);
		if (!$fp) {
			echo "ERROR: $errno - $errstr<br />\n";
		} else {
			fwrite($fp, "msg {$Recipient} \"{$Message}\"\n");
			fclose($fp);
		}
	}

	private function MakeSeed() {
		list($usec, $sec) = explode(' ', microtime());
		return $sec + $usec * 1000000;
	}

	private function IncreaseStat() {
		if ($this->CharacterClass == 'defense') {
			$this->MsgSend($this->ChatWarsBot, $this->Texts['increase_defense']);
		}
		elseif ($this->CharacterClass == 'attack') {
			$this->MsgSend($this->ChatWarsBot, $this->Texts['increase_attack']);
		}
	}
	
	public function Run() {
		srand($this->MakeSeed());
		
		switch ($this->State) {
			
			// отправка в защиту
			case 'defense':
				if ($this->CurrentStatus() == 'searching_opponent') {
					$this->MsgSend($this->ChatWarsBot, $this->Texts['arena_cancel_search']);
				}
				file_put_contents($this->CurrentStatusFile, 'defense');
				sleep(rand(15, 120));
				$this->MsgSend($this->ChatWarsBot, $this->Texts['defense']);
				break;
			
			// отправка флага в защиту своего замка
			case 'defense_castle':
				file_put_contents($this->CurrentStatusFile, 'defense');
				sleep(rand(15, 30));
				$this->MsgSend($this->ChatWarsBot, $this->Flags[$this->Castle]);
				break;
			
			// изменение статуса на защиту
			case 'status_defense':
				file_put_contents($this->CurrentStatusFile, 'defense');
				break;
			
			// отправка в атаку
			case 'attack':
				file_put_contents($this->CurrentStatusFile, 'waiting_attack');
				$this->MsgSend($this->ChatWarsBot, $this->Texts['attack']);
				break;
			
			// отправка в атаку на синий замок
			case 'attack_blue':
				file_put_contents($this->CurrentStatusFile, 'attack');
				sleep(rand(5, 10));
				$this->MsgSend($this->ChatWarsBot, $this->Flags['blue']);
				break;
			
			// отправка в атаку на желтый замок
			case 'attack_yellow':
				file_put_contents($this->CurrentStatusFile, 'attack');
				sleep(rand(5, 10));
				$this->MsgSend($this->ChatWarsBot, $this->Flags['yellow']);
				break;
			
			// отправка в атаку на черный замок
			case 'attack_black':
				file_put_contents($this->CurrentStatusFile, 'attack');
				sleep(rand(5, 10));
				$this->MsgSend($this->ChatWarsBot, $this->Flags['black']);
				break;
			
			// отправка в атаку на белый замок
			case 'attack_white':
				file_put_contents($this->CurrentStatusFile, 'attack');
				sleep(rand(5, 10));
				$this->MsgSend($this->ChatWarsBot, $this->Flags['white']);
				break;
			
			// отправка в атаку на красный замок
			case 'attack_red':
				file_put_contents($this->CurrentStatusFile, 'attack');
				sleep(rand(5, 10));
				$this->MsgSend($this->ChatWarsBot, $this->Flags['red']);
				break;
			
			// отправка грабить караваны
			case 'caravan':
				while ($this->CurrentStatus() != 'inactive') {
					if (($this->CurrentStatus() == 'defense') && !$this->BattleSoon()) {
						break;
					}
					else {
						sleep(15);
					}
				}
				file_put_contents($this->CurrentStatusFile, 'waiting_caravan');
				sleep(rand(5, 180));
				$this->MsgSend($this->ChatWarsBot, $this->Texts['caravan']);
				break;
			
			// отправка в защиту каравана
			case 'caravan_go':
				sleep(rand(10, 20));
				$this->MsgSend($this->ChatWarsBot, "/go");
				break;
			
			// отправка в защиту космического каравана
			case 'caravan_intercept':
				sleep(rand(10, 20));
				$this->MsgSend($this->ChatWarsBot, "/intercept");
				break;
			
			// отправка в лес
			case 'forest':
				while ($this->CurrentStatus() != 'inactive') {
					if (($this->CurrentStatus() == 'defense') && !$this->BattleSoon()) {
						break;
					}
					else {
						sleep(15);
					}
				}
				file_put_contents($this->CurrentStatusFile, 'waiting_forest');
				sleep(rand(5, 180));
				$this->MsgSend($this->ChatWarsBot, $this->Texts['forest']);
				break;
			
			// подтверждение похода в лес получено
			case 'forest_active':
				file_put_contents($this->CurrentStatusFile, 'forest_active');
				sleep(rand(305, 360));
				$this->MsgSend($this->ChatWarsBot, $this->Texts['character']);
				break;
			
			// отправка в пещеру
			case 'cave':
				while ($this->CurrentStatus() != 'inactive') {
					if (($this->CurrentStatus() == 'defense') && !$this->BattleSoon()) {
						break;
					}
					else {
						sleep(15);
					}
				}
				file_put_contents($this->CurrentStatusFile, 'waiting_cave');
				sleep(rand(5, 180));
				$this->MsgSend($this->ChatWarsBot, $this->Texts['cave']);
				break;
			
			// подтверждение похода в пещеру получено
			case 'cave_active':
				file_put_contents($this->CurrentStatusFile, 'cave_active');
				sleep(rand(305, 360));
				$this->MsgSend($this->ChatWarsBot, $this->Texts['character']);
				break;
			
			// проверка статуса
			case 'check_status':
				if (($this->CurrentStatus() != 'inactive') && ($this->CurrentStatus() != 'defense')) {
					sleep(rand(5, 90));
					$this->MsgSend($this->ChatWarsBot, $this->Texts['character']);
				}
				break;
			
			// запрос профиля героя
			case 'character':
				$this->MsgSend($this->ChatWarsBot, $this->Texts['character']);
				break;
			
			// изменение статуса на отдых
			case 'status_rest':
				file_put_contents($this->CurrentStatusFile, 'inactive');
				break;
			
			// запуск арены
			case 'arena':
				if ($this->ArenaTime() && !$this->BattleSoon() && (($this->CurrentStatus() == 'inactive') || ($this->CurrentStatus() == 'defense'))) {
					file_put_contents($this->CurrentStatusFile, 'waiting_arena');
					sleep(rand(5, 90));
					$this->MsgSend($this->ChatWarsBot, $this->Texts['arena_search']);
				}
				break;
			
			// получено подтверждение поиска противника на арене
			case 'arena_searching':
				file_put_contents($this->CurrentStatusFile, 'searching_opponent');
				break;
			
			// арена - атака или защита
			case 'arena_a_d':
				file_put_contents($this->CurrentStatusFile, 'arena_active');
				sleep(rand(2, 7));
				$this->MsgSend($this->ChatWarsBot, $this->Attack[$this->ArenaRandom()]);
				break;
			
			// арена - атака
			case 'arena_a':
				file_put_contents($this->CurrentStatusFile, 'arena_active');
				sleep(rand(2, 7));
				$this->MsgSend($this->ChatWarsBot, $this->Attack[$this->ArenaRandom()]);
				break;
			
			// арена - защита
			case 'arena_d':
				file_put_contents($this->CurrentStatusFile, 'arena_active');
				sleep(rand(2, 7));
				$this->MsgSend($this->ChatWarsBot, $this->Defense[$this->ArenaRandom()]);
				break;
			
			// бой на арене закончен
			case 'arena_finished':
				file_put_contents($this->LastArenaFile, time());
				file_put_contents($this->CurrentStatusFile, 'inactive');
				break;
			
			// поиск противника на арене отменен
			case 'search_cancelled':
				file_put_contents($this->CurrentStatusFile, 'inactive');
				break;
			
			// новый уровень
			case 'level_up':
				sleep(rand(5, 10));
				$this->MsgSend($this->ChatWarsBot, "/level_up");
				break;
			
			// увеличим характеристику
			case 'increase_stat':
				sleep(rand(5, 10));
				$this->IncreaseStat();
				break;
			
			// почистить питомца
			case 'pet_wash':
				sleep(rand(30, 300));
				$this->MsgSend($this->ChatWarsBot, $this->Texts['pet_wash']);
				break;
			
			// покормить питомца
			case 'pet_feed':
				sleep(rand(30, 300));
				$this->MsgSend($this->ChatWarsBot, $this->Texts['pet_feed']);
				break;
			
			// поиграть с питомцем
			case 'pet_play':
				sleep(rand(30, 300));
				$this->MsgSend($this->ChatWarsBot, $this->Texts['pet_play']);
				break;
			
			// антикапча
			case 'captcha':
				sleep(rand(3, 10));
				$CaptchaFile = file_get_contents($this->CaptchaFile);
				$CaptchaLines = explode("\n", $CaptchaFile);
				$CaptchaResult = array(
					'ID' => 0,
					'Percent' => 0
				);
				foreach ($CaptchaLines as $CaptchaLine) {
					list($ID, $Line) = explode('=', $CaptchaLine);
					similar_text($this->CaptchaText, $Line, $Percent);
					
					if (($ID != 99) && ($Percent > $CaptchaResult['Percent'])) {
						$CaptchaResult['Percent'] = $Percent;
						$CaptchaResult['ID'] = $ID;
					}
				}
				
				if ($CaptchaResult['Percent'] == 100) {
					$out = 'Капча распознана!\n' . $this->CaptchaText . '\n' . $this->Captcha[$CaptchaResult['ID']];
					$this->MsgSend($this->ChatWarsBot, $this->Captcha[$CaptchaResult['ID']]);
					$this->MsgSend($this->AdminUser, $out);
				}
				elseif ($CaptchaResult['Percent'] > 75) {
					$CaptchaLines[] = "{$CaptchaResult['ID']}={$this->CaptchaText}";
					$out = 'Капча распознана!\n' . $this->CaptchaText . '\n' . $this->Captcha[$CaptchaResult['ID']];
					$this->MsgSend($this->ChatWarsBot, $this->Captcha[$CaptchaResult['ID']]);
					$this->MsgSend($this->AdminUser, $out);
				}
				else {
					$out = 'Не могу разобрать следующий текст:\n\n' . $this->CaptchaText;
					$out .= '\n\nПодсказка по командам:\n/c11 - арбуз + вишня\n/c12 - баклажан + морковь\n/c13 - хотдог\n/c14 - пицца\n/c15 - хлеб + сыр\n/c16 - сыр\n\n/c21 - свинья\n/c22 - кот\n/c23 - конь\n/c24 - коза\n/c25 - собака\n/c26 - бурундук\n';
					$this->MsgSend($this->AdminUser, $out);
				}
				
				sort($CaptchaLines);
				$CaptchaFileNew = implode("\n", $CaptchaLines);
				if ($CaptchaFileNew != $CaptchaFile) {
					file_put_contents($this->CaptchaFile, $CaptchaFileNew);
				}
				break;
				
			// отправка ответа на капчу
			// второй параметр - строка, которая имеет вид "/c<id капчи>_<текст капчи для добавления в базу>"
			case 'captcha_reply':
				list($CaptchaID, $CaptchaText) = explode("_", $this->CaptchaText);
				$CaptchaID = intval(str_replace('/c', '', $CaptchaID));
				if (isset($this->Captcha[$CaptchaID])) {
					$CaptchaFile = file_get_contents($this->CaptchaFile);
					$CaptchaLines = explode("\n", $CaptchaFile);
					$CaptchaLines[] = "{$CaptchaID}={$CaptchaText}";
					sort($CaptchaLines);
					$CaptchaFile = implode("\n", $CaptchaLines);
					file_put_contents($this->CaptchaFile, $CaptchaFile);
					$this->MsgSend($this->ChatWarsBot, $this->Captcha[$CaptchaID]);
					$this->MsgSend($this->AdminUser, 'Отправлен ответ:\n\n' . $this->Captcha[$CaptchaID]);
				}
				else {
					$this->MsgSend($this->AdminUser, 'Неизвестная команда');
				}
				break;
			
			// тест
			case 'status':
				$out = $this->ArenaTime() ? "ArenaTime = true" : "ArenaTime = false";
				$out .= '\n';
				$out .= "Last arena finished: " . date("Y-m-d H:i:s", intval(trim(file_get_contents($this->LastArenaFile))));
				$out .= '\n';
				$out .= $this->BattleSoon() ? "BattleSoon = true" : "BattleSoon = false";
				$out .= '\n';
				$out .= "CurrentStatus = " . $this->CurrentStatus();
				$out .= '\n';
				$this->MsgSend($this->AdminUser, $out);
				break;
			
		}
	}
}

?>