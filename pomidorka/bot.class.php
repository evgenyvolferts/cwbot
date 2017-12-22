<?php

require_once('include/Db.php');

use Engine\Db;

class CWBot {

	const MonsterSourceForest = 1;
	const MonsterSourceCoast = 2;
	const MonsterSourceWasteland = 3;

	private $Commands = [
		['Name' => '/start', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/m', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/test_request', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => true, 'KeyboardID' => 0],
		['Name' => '/donate', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => true, 'KeyboardID' => 0],
		['Name' => '/gold', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => true, 'KeyboardID' => 0],
//		['Name' => '/init_resources', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => true, 'KeyboardID' => 0],
//		['Name' => '/init_items', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => true, 'KeyboardID' => 0],
		['Name' => '/exchange', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => true, 'KeyboardID' => 0],
		['Name' => '/debug', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => true, 'KeyboardID' => 0],
		['Name' => '/stock', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/stock_report', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => true, 'KeyboardID' => 0],
		['Name' => '/profile', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => true, 'KeyboardID' => 0],
		['Name' => '/level_up', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/me', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_build', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_build_stat', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => true, 'KeyboardID' => 0],
		['Name' => '/twink_stock', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_list', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_defense', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_attack', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_command', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_donate', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_hero', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_hero_short', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_vote', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_delete', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_forest', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_forest_all', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_cave', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_cave_all', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_seaside', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_seaside_all', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_report', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_rb', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/twink_stock_request', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/trade', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/trade_craft', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/craft', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/help', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/craft_queue', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => false, 'KeyboardID' => 0],
		['Name' => '/squad', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => true, 'KeyboardID' => 0],
		['Name' => '/squad_add', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => true, 'KeyboardID' => 0],
		['Name' => '/squad_remove', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => true, 'KeyboardID' => 0],
		['Name' => '/msg', 'ShowInKeyboard' => false, 'KeyboardRow' => 0, 'AdminNeeded' => true, 'KeyboardID' => 0],
		['Name' => '📊 Статистика', 'ShowInKeyboard' => true, 'KeyboardRow' => 1, 'AdminNeeded' => true, 'KeyboardID' => 1], // статистика	- 1 уровень
		['Name' => '📊 Общая', 'ShowInKeyboard' => true, 'KeyboardRow' => 3, 'AdminNeeded' => true, 'KeyboardID' => 2], // статистика	- 2 уровень
		['Name' => '📊 Основа', 'ShowInKeyboard' => true, 'KeyboardRow' => 3, 'AdminNeeded' => true, 'KeyboardID' => 2], // статистика	- 2 уровень
		['Name' => '📊 Твинки', 'ShowInKeyboard' => true, 'KeyboardRow' => 3, 'AdminNeeded' => true, 'KeyboardID' => 2], // статистика	- 2 уровень
		['Name' => '📦 Ресурсы', 'ShowInKeyboard' => true, 'KeyboardRow' => 1, 'AdminNeeded' => true, 'KeyboardID' => 1], // ресурсы		- 1 уровень
		['Name' => '📦 Общие', 'ShowInKeyboard' => true, 'KeyboardRow' => 4, 'AdminNeeded' => true, 'KeyboardID' => 3], // ресурсы		- 2 уровень
		['Name' => '📦 Основа', 'ShowInKeyboard' => true, 'KeyboardRow' => 4, 'AdminNeeded' => true, 'KeyboardID' => 3], // ресурсы		- 2 уровень
		['Name' => '📦 Твинки', 'ShowInKeyboard' => true, 'KeyboardRow' => 4, 'AdminNeeded' => true, 'KeyboardID' => 3], // ресурсы		- 2 уровень
		['Name' => '📦 Собранные', 'ShowInKeyboard' => true, 'KeyboardRow' => 5, 'AdminNeeded' => true, 'KeyboardID' => 3], // ресурсы		- 2 уровень
		['Name' => '📦 Собранные за неделю', 'ShowInKeyboard' => true, 'KeyboardRow' => 5, 'AdminNeeded' => true, 'KeyboardID' => 3], // ресурсы		- 2 уровень
		['Name' => '👤 Профиль', 'ShowInKeyboard' => true, 'KeyboardRow' => 2, 'AdminNeeded' => false, 'KeyboardID' => 1], // профиль
		['Name' => '⚒ Крафт', 'ShowInKeyboard' => true, 'KeyboardRow' => 2, 'AdminNeeded' => false, 'KeyboardID' => 1], // крафт
		['Name' => '🥇 Топы', 'ShowInKeyboard' => true, 'KeyboardRow' => 2, 'AdminNeeded' => false, 'KeyboardID' => 1], // топы			- 1 уровень
		['Name' => '📋 Все отчеты', 'ShowInKeyboard' => true, 'KeyboardRow' => 1, 'AdminNeeded' => true, 'KeyboardID' => 1], // отчеты
		['Name' => '⚔️ Атака', 'ShowInKeyboard' => true, 'KeyboardRow' => 6, 'AdminNeeded' => false, 'KeyboardID' => 4], // топы			- 2 уровень	// атака
		['Name' => '🛡 Защита', 'ShowInKeyboard' => true, 'KeyboardRow' => 6, 'AdminNeeded' => false, 'KeyboardID' => 4], // топы			- 2 уровень	// защита
		['Name' => '🔥 Опыт', 'ShowInKeyboard' => true, 'KeyboardRow' => 7, 'AdminNeeded' => false, 'KeyboardID' => 4], // топы			- 2 уровень	// опыт
		['Name' => '📋 Отчеты', 'ShowInKeyboard' => true, 'KeyboardRow' => 7, 'AdminNeeded' => false, 'KeyboardID' => 4], // топы			- 2 уровень // отчеты
	];
	private $Classes = ['Воин', 'Эсквайр', 'Мастер', 'Рыцарь', 'Страж', 'Кузнец', 'Добытчик', 'Хранитель', 'Паладин'];
	private $ClassIcons = ['attack', 'attack', 'smith', 'attack', 'defense', 'smith', 'mining', 'defense', 'defense'];
	private $AttackClasses = [0, 1, 3];
	private $DefenseClasses = [4, 7, 8];
	private $Icons = [
		'attack' => "⚔️",
		'defense' => "🛡",
		'luck' => "🍀",
		'mana' => "💧",
		'mining' => "⛏",
		'stamina' => "🔋",
		'gold' => "💰",
		'gem' => "💠",
		'smith' => "⚒",
		'level' => "🏅"
	];
	private $Castles = [
		'red' => ['icon' => '🇮🇲', 'text' => 'Красного'],
		'blue' => ['icon' => '🇪🇺', 'text' => 'Синего'],
		'yellow' => ['icon' => '🇻🇦', 'text' => 'Желтого'],
		'white' => ['icon' => '🇨🇾', 'text' => 'Белого'],
		'black' => ['icon' => '🇬🇵', 'text' => 'Черного'],
		'mint' => ['icon' => '🇲🇴', 'text' => 'Мятного'],
		'twilight' => ['icon' => '🇰🇮', 'text' => 'Сумрачного']
	];
	private $DBConfig = [
		'host' => '127.0.0.1',
		'username' => '',
		'password' => '',
		'database' => 'cw',
		'port' => '3306',
	];
	private $Targets = ['red', 'black', 'blue', 'white', 'yellow', 'twilight', 'mint', 'wood', 'mountain', 'sea'];
	private $Buildings = ['ambar', 'gladiators', 'hq', 'monument', 'sentries', 'stash', 'teaparty', 'wall', 'warriors'];
	private $DB;
//	private $KAGroup = -1001120953377;
//	private $SoldiersGroup = -1001142621369;
	private $LowLevelMonstersGroup = -1001127494482;
	private $Request;
	private $KeyboardID;
	private $SendMessageDelay;

	public function __construct() {
		$this->DB = new Db($this->DBConfig['host'], $this->DBConfig['username'], $this->DBConfig['password'], $this->DBConfig['database'], $this->DBConfig['port']);
		$this->DB->query("SET NAMES utf8mb4;");
		$this->SendMessageDelay = intval(ceil(1000000 / 30));
	}

	public function LoadRequest($JSON) {
		$this->Request = json_decode($JSON, true);
	}

	public function Init() {
		if (isset($this->Request['message'])) {
			$this->Message = $this->Request['message'];
		}
		elseif (isset($this->Request['edited_message'])) {
			$this->Message = $this->Request['edited_message'];
		}
		elseif (isset($this->Request['inline_query'])) {
			$this->Message = $this->Request['inline_query'];
			$this->Message['chat']['id'] = $this->Message['from']['id'];
			$this->Message['chat']['type'] = 'inline';
		}
		elseif (isset($this->Request['callback_query'])) {
			$this->Message = $this->Request['callback_query']['message'];
			$this->Message['chat']['type'] = 'callback';
		}
	}

	private function isNameString($String) {
		foreach ($this->Classes as $Class) {
			if ((mb_strpos($String, ", {$Class} {$this->Castles['red']['text']} замка") !== false) && (mb_strpos($String, $this->Castles['red']['icon']) !== false)) {
				return true;
			}
			elseif ((mb_strpos($String, ", {$Class} {$this->Castles['blue']['text']} замка") !== false) && (mb_strpos($String, $this->Castles['blue']['icon']) !== false)) {
				return true;
			}
			elseif ((mb_strpos($String, ", {$Class} {$this->Castles['white']['text']} замка") !== false) && (mb_strpos($String, $this->Castles['white']['icon']) !== false)) {
				return true;
			}
			elseif ((mb_strpos($String, ", {$Class} {$this->Castles['black']['text']} замка") !== false) && (mb_strpos($String, $this->Castles['black']['icon']) !== false)) {
				return true;
			}
			elseif ((mb_strpos($String, ", {$Class} {$this->Castles['yellow']['text']} замка") !== false) && (mb_strpos($String, $this->Castles['yellow']['icon']) !== false)) {
				return true;
			}
			elseif ((mb_strpos($String, ", {$Class} {$this->Castles['mint']['text']} замка") !== false) && (mb_strpos($String, $this->Castles['mint']['icon']) !== false)) {
				return true;
			}
			elseif ((mb_strpos($String, ", {$Class} {$this->Castles['twilight']['text']} замка") !== false) && (mb_strpos($String, $this->Castles['twilight']['icon']) !== false)) {
				return true;
			}
		}

		return false;
	}

	private function isValidHeroProfile() {
		$ProfileStrings = explode("\n", $this->Message['text']);
		if ($this->isNameString($ProfileStrings[0])) {
			return true;
		}
		else {
			return false;
		}
	}

	private function isValidShortHeroProfile() {
		$ProfileStrings = explode("\n", $this->Message['text']);
		if ($this->isNameString($ProfileStrings[2])) {
			return true;
		}
		else {
			return false;
		}
	}

	private function isPrivateMessage() {
		return ($this->Message['chat']['type'] == 'private');
	}

	private function ProfileStatus($TelegramID) {
		$User = $this->DB->getRow("SELECT Active, Updated FROM Users WHERE TelegramID = {$TelegramID};");
		if ($User['Active']) {
			$ProfileAge = time() - strtotime($User['Updated']);
			if ($ProfileAge >= 604800) {
				return "🛑";
			}
			elseif (($ProfileAge < 604800) && ($ProfileAge >= 259200)) {
				return "⚠️";
			}
			elseif ($ProfileAge < 259200) {
				return "✅";
			}
		}
		else {
			return "☠️";
		}
	}

	private function ParseProfile() {
		$Profile = [
			'Name' => '',
			'Castle' => '',
			'CharLevel' => 1,
			'CharClass' => 0,
			'Attack' => 1,
			'Defense' => 1,
			'Stamina' => 0,
			'Exp' => 0,
			'Gold' => 0,
			'Gem' => 0,
			'Armor' => [
				1 => 0,
				2 => 0,
				3 => 0,
				4 => 0,
				5 => 0,
				6 => 0,
				7 => 0
			],
			'Pet' => 0,
			'PetType' => 0,
			'PetLevel' => 0,
			'Stock' => 0
		];

		$ProfileStrings = explode("\n", $this->Message['text']);

		$Items = $this->LoadItems();

		if ($this->isSuperUser() && $this->isDebugActive()) {
			file_put_contents('debug.log', print_r($Items, true), FILE_APPEND | LOCK_EX);
		}

		foreach ($ProfileStrings as $ProfileString) {
			if ($this->isNameString($ProfileString)) {
				foreach ($this->Castles as $Color => $Castle) {
					if (mb_strpos($ProfileString, $Castle['icon']) !== false) {
						$Profile['Castle'] = $Color;
					}
				}
				$ClassStartPos = mb_strpos($ProfileString, ", ") + mb_strlen(", ");
				$ClassLength = mb_strpos($ProfileString, " {$this->Castles[$Profile['Castle']]['text']} замка") - $ClassStartPos;
				$Class = mb_substr($ProfileString, $ClassStartPos, $ClassLength);
				$Profile['CharClass'] = array_search($Class, $this->Classes);

				$NameStartPos = mb_strlen($this->Castles[$Profile['Castle']]['icon']);
				$NameLength = mb_strpos($ProfileString, ", ") - $NameStartPos;
				$Profile['Name'] = mb_substr($ProfileString, $NameStartPos, $NameLength);
			}
			elseif (mb_strpos($ProfileString, "Уровень: ") !== false) {
				if (mb_ereg("(\d)+", $ProfileString, $matches)) {
					$Profile['CharLevel'] = $matches[0];
				}
			}
			elseif (mb_strpos($ProfileString, "Атака: ") !== false) {
				list($AttackString, $DefenseString) = explode(" 🛡", $ProfileString);
				if (mb_ereg("(\d)+", $AttackString, $matches)) {
					$Profile['Attack'] = $matches[0];
				}
				if (mb_ereg("(\d)+", $DefenseString, $matches)) {
					$Profile['Defense'] = $matches[0];
				}
			}
			elseif (mb_strpos($ProfileString, "Опыт: ") !== false) {
				list($FirstString, $SecondString) = explode("/", $ProfileString);
				if (mb_ereg("(\d)+", $FirstString, $matches)) {
					$Profile['Exp'] = $matches[0];
				}
			}
			elseif (mb_strpos($ProfileString, "Выносливость: ") !== false) {
				list($FirstString, $SecondString) = explode("/", $ProfileString);
				if (mb_ereg("(\d)+", $FirstString, $matches)) {
					$Profile['Stamina'] = $matches[0];
				}
			}
			elseif (mb_strpos($ProfileString, "Склад: ") !== false) {
				if (mb_ereg("(\d)+", $ProfileString, $matches)) {
					$Profile['Stock'] = $matches[0];
				}
			}
			elseif ((mb_strpos($ProfileString, $this->Icons['gold']) !== false) && (mb_strpos($ProfileString, $this->Icons['gem']) !== false)) {
				list($Gold, $Gem) = explode(" ", $ProfileString);
				if (mb_ereg("(\d)+", $Gold, $matches)) {
					$Profile['Gold'] = $matches[0];
				}
				if (mb_ereg("(\d)+", $Gem, $matches)) {
					$Profile['Gem'] = $matches[0];
				}
			}

			foreach ($Items as $ItemID => $Item) {
				if (mb_strpos(preg_replace("/(^\s+)|(\s+$)/us", "", $ProfileString), $Item['Name']) !== false) {
					$Profile['Armor'][$Item['Type']] = $ItemID;
				}
			}
		}

		return $Profile;
	}

	private function ParseShortProfile() {
		$Profile = [
			'Name' => '',
			'Castle' => '',
			'CharLevel' => 1,
			'CharClass' => 0,
			'Attack' => 1,
			'Defense' => 1,
			'Stamina' => 0,
			'Exp' => 0,
			'Gold' => 0,
			'Gem' => 0,
			'Armor' => [
				1 => 0,
				2 => 0,
				3 => 0,
				4 => 0,
				5 => 0,
				6 => 0,
				7 => 0
			],
			'Pet' => 0,
			'PetType' => 0,
			'PetLevel' => 0,
			'Stock' => 0
		];

		$ProfileStrings = explode("\n", $this->Message['text']);

		foreach ($ProfileStrings as $ProfileString) {
			if ($this->isNameString($ProfileString)) {
				foreach ($this->Castles as $Color => $Castle) {
					if (mb_strpos($ProfileString, $Castle['icon']) !== false) {
						$Profile['Castle'] = $Color;
					}
				}
				$ClassStartPos = mb_strpos($ProfileString, ", ") + mb_strlen(", ");
				$ClassLength = mb_strpos($ProfileString, " {$this->Castles[$Profile['Castle']]['text']} замка") - $ClassStartPos;
				$Class = mb_substr($ProfileString, $ClassStartPos, $ClassLength);
				$Profile['CharClass'] = array_search($Class, $this->Classes);

				$NameStartPos = mb_strlen($this->Castles[$Profile['Castle']]['icon']);
				$NameLength = mb_strpos($ProfileString, ", ") - $NameStartPos;
				$Profile['Name'] = mb_substr($ProfileString, $NameStartPos, $NameLength);
			}
			elseif (mb_strpos($ProfileString, "Уровень: ") !== false) {
				if (mb_ereg("(\d)+", $ProfileString, $matches)) {
					$Profile['CharLevel'] = $matches[0];
				}
			}
			elseif (mb_strpos($ProfileString, "Атака: ") !== false) {
				list($AttackString, $DefenseString) = explode(" 🛡", $ProfileString);
				if (mb_ereg("(\d)+", $AttackString, $matches)) {
					$Profile['Attack'] = $matches[0];
				}
				if (mb_ereg("(\d)+", $DefenseString, $matches)) {
					$Profile['Defense'] = $matches[0];
				}
			}
			elseif (mb_strpos($ProfileString, "Опыт: ") !== false) {
				list($FirstString, $SecondString) = explode("/", $ProfileString);
				if (mb_ereg("(\d)+", $FirstString, $matches)) {
					$Profile['Exp'] = $matches[0];
				}
			}
			elseif (mb_strpos($ProfileString, "Выносливость: ") !== false) {
				list($FirstString, $SecondString) = explode("/", $ProfileString);
				if (mb_ereg("(\d)+", $FirstString, $matches)) {
					$Profile['Stamina'] = $matches[0];
				}
			}
			elseif ((mb_strpos($ProfileString, $this->Icons['gold']) !== false) && (mb_strpos($ProfileString, $this->Icons['gem']) !== false)) {
				list($Gold, $Gem) = explode(" ", $ProfileString);
				if (mb_ereg("(\d)+", $Gold, $matches)) {
					$Profile['Gold'] = $matches[0];
				}
				if (mb_ereg("(\d)+", $Gem, $matches)) {
					$Profile['Gem'] = $matches[0];
				}
			}
		}

		return $Profile;
	}

	private function CompareStock($SavedStock, $Stock) {
		$Resources = [];
		$Resources['Found'] = [];
		$Resources['Lost'] = [];

		foreach ($Stock as $ResourceID => $Amount) {
			if (isset($SavedStock[$ResourceID])) {
				if ($SavedStock[$ResourceID] > $Amount) {
					$Resources['Lost'][$ResourceID] = $SavedStock[$ResourceID] - $Amount;
				}
				elseif ($SavedStock[$ResourceID] < $Amount) {
					$Resources['Found'][$ResourceID] = $Amount - $SavedStock[$ResourceID];
				}
				unset($SavedStock[$ResourceID]);
			}
			else {
				$Resources['Found'][$ResourceID] = $Amount;
			}
		}

		foreach ($SavedStock as $ResourceID => $Amount) {
			$Resources['Lost'][$ResourceID] = $Amount;
		}

		return $Resources;
	}

	private function CorrectNickname($Nickname) {
		return $this->DB->getOne("SELECT EXISTS(SELECT * FROM Users WHERE CharName = '{$Nickname}' AND TelegramID = {$this->Message['from']['id']});");
	}
	
	private function DeleteTwink($TelegramUsername) {
		$TelegramUsername = str_replace("@", "", $TelegramUsername);
		if ($this->DB->getOne("SELECT EXISTS(SELECT * FROM Users WHERE TelegramUsername = '{$TelegramUsername}' and OwnerID = {$this->Message['from']['id']});")) {
			if ($this->DB->updateRow(['OwnerID' => 999, 'OriginalOwner' => $this->Message['from']['id']], 'Users', 'TelegramUsername', $TelegramUsername) !== false) {
				$this->SendMessage("Твинк удален");
			}
			else {
				$this->SendMessage("Что-то пошло не так");
			}
		}
		else {
			$this->SendMessage("Что-то пошло не так");
		}
	}

	private function Donate() {
		$Bots = $this->DB->getAll("SELECT TelegramID, Gold FROM Users WHERE TGBot = 1 AND Gold > 0;");
		$Delay = 0;
		foreach ($Bots as $Bot) {
			$Delay += 3;
			$this->SendMessage("/donate {$Bot['Gold']}", $Bot['TelegramID'], false, $Delay);
		}
		$this->SendMessage("Команда donate отправлена", 0, true, $Delay);
	}

	private function ParseRB() {
		$Lines = explode("\n", $this->Message['text']);
		$MonsterName = mb_substr($Lines[0], mb_strpos($Lines[0], "🔱") + mb_strlen("🔱"));
		$FightID = trim($Lines[4]);
		$Monster = $this->DB->getRow("SELECT BossLevel, RaidBoss FROM MonstersList WHERE Name = '{$MonsterName}';");
		if ($Monster['RaidBoss']) {
			//$this->SendMessage("/twink_rb Ого! Будь осторожен, ты встретил {$MonsterName} ({$Monster['BossLevel']} ур). {$FightID}", $this->SoldiersGroup, false, -1);
		}
	}

	private function ParseResult() {
		$Result = [
			'Attack' => 0,
			'Defense' => 0,
			'CharLevel' => 0,
			'Exp' => 0,
			'Gold' => 0
		];

		$LootMessage = '';

		$ResultStrings = explode("\n", $this->Message['text']);

		foreach ($ResultStrings as $ResultStringNum => $ResultString) {
			if ($ResultStringNum == 0) {

				if (!$this->CorrectNickname(mb_substr($ResultString, mb_strlen("🇮🇲"), mb_strpos($ResultString, " ⚔️") - mb_strlen("🇮🇲")))) {
					return false;
				}

				$ResultStringsExt = explode(" ", $ResultString);
				foreach ($ResultStringsExt as $ResultStringExt) {
					if (mb_strpos($ResultStringExt, "⚔️") !== false) {
						if (mb_ereg("(\d)+", $ResultStringExt, $matches)) {
							$Result['Attack'] = $matches[0];
						}
					}
					elseif (mb_strpos($ResultStringExt, "🛡") !== false) {
						if (mb_ereg("(\d)+", $ResultStringExt, $matches)) {
							$Result['Defense'] = $matches[0];
						}
					}
					elseif (mb_strpos($ResultStringExt, "(") !== false) {
						if (mb_ereg("(\d)+", $ResultStringExt, $matches)) {
							$Result['CharLevel'] = $matches[0];
						}
					}
				}
			}
			elseif (mb_strpos($ResultString, "Опыт:") !== false) {
				if (mb_ereg("(\d)+", $ResultString, $matches)) {
					$Result['Exp'] = $matches[0];
				}
			}
			elseif (mb_strpos($ResultString, "Золото: -") !== false) {
				if (mb_ereg("(\d)+", $ResultString, $matches)) {
					$Result['Gold'] = 0 - $matches[0];
				}
			}
			elseif (mb_strpos($ResultString, "Золото:") !== false) {
				if (mb_ereg("(\d)+", $ResultString, $matches)) {
					$Result['Gold'] = $matches[0];
				}
			}
			elseif ((mb_strpos($ResultString, "Вы нашли:") !== false) && empty($LootMessage)) {
				$OwnerID = $this->DB->getOne("SELECT OwnerID FROM Users WHERE TelegramID = {$this->Message['from']['id']};");
				if ($OwnerID) {
					$LootMessage1 = "forwardMessage?chat_id={$OwnerID}&from_chat_id={$this->Message['chat']['id']}&message_id={$this->Message['message_id']}";
					$LootMessage2 = "forwardMessage?chat_id=85613593&from_chat_id={$this->Message['chat']['id']}&message_id={$this->Message['message_id']}";
				}
			}
		}

		if (!empty($LootMessage1)) {
			$this->SendAPIRequest($LootMessage1);
			$this->SendAPIRequest($LootMessage2);
		}

		return $Result;
	}

	private function ParseStockTrade() {
		$Resources = $this->DB->getAssoc("SELECT Name, ID FROM Resources;");
		$ResourcesTrade = [];
		foreach ($Resources as $ResourceName => $ResourceID) {
			$ResourcesTrade[trim($this->RemoveEmoji($ResourceName))] = $ResourceID;
		}

		$Items = $this->DB->getAssoc("SELECT Name, ID FROM Items;");
		foreach ($Items as $ItemName => $ItemID) {
			$ResourcesTrade[trim($this->RemoveEmoji($ItemName))] = $ItemID + 1101;
		}

		$StockLines = explode("\n", $this->Message['text']);
		$Stock = [];

		foreach ($StockLines as $StockLine) {
			if (mb_strpos($StockLine, "/add_") === 0) {
				list($Text, $Amount) = explode(" x ", $StockLine);
				list($Command, $ResourceName) = explode("   ", $Text);
				if (isset($ResourcesTrade[trim($this->RemoveEmoji($ResourceName))])) {
					$Stock[$ResourcesTrade[trim($this->RemoveEmoji($ResourceName))]] = $Amount;
				}
				else {
					$this->SendMessage("Неизвестный ресурс: {$ResourceName}");
				}
			}
		}

//		if ($this->isSuperUser()) {
//			$this->SendMessage(print_r($Stock, true));
//		}

		$SavedStock = $this->DB->getAssoc("SELECT ResourceID, Amount FROM UsersStock WHERE TelegramID = {$this->Message['from']['id']};");
		$BattleResult = $this->CompareStock($SavedStock, $Stock);

		if ($this->DB->query("DELETE FROM UsersStock WHERE TelegramID = {$this->Message['from']['id']};")) {
			if (!empty($Stock)) {
				foreach ($Stock as $ResourceID => $Amount) {
					$this->DB->insertRow(['TelegramID' => $this->Message['from']['id'], 'ResourceID' => $ResourceID, 'Amount' => $Amount], 'UsersStock');
				}

				$Output = "Сток обновлен";

				$Resources = $this->DB->getAssoc("SELECT ID, Name FROM Resources;");
				$Items = $this->DB->getAssoc("SELECT ID, Name FROM Items;");

				if (!empty($BattleResult['Found'])) {
					$Output .= "\n\nДобавлено:\n";
					$Found = [];
					foreach ($BattleResult['Found'] as $ResourceID => $Amount) {
						if ($ResourceID > 1101) {
							$Found[] = "{$Items[$ResourceID - 1101]} ({$Amount})";
						}
						else {
							$Found[] = "{$Resources[$ResourceID]} ({$Amount})";
						}
					}
					sort($Found);
					$Output .= implode("\n", $Found);
				}

				if (!empty($BattleResult['Lost'])) {
					$Output .= "\n\nУдалено:\n";
					$Lost = [];
					foreach ($BattleResult['Lost'] as $ResourceID => $Amount) {
						if ($ResourceID > 1101) {
							$Lost[] = "{$Items[$ResourceID - 1101]} ({$Amount})";
						}
						else {
							$Lost[] = "{$Resources[$ResourceID]} ({$Amount})";
						}
					}
					sort($Lost);
					$Output .= implode("\n", $Lost);
				}

				return $Output;
			}
			else {
				return "Сток обнулен";
			}
		}
		else {
			return "Ошибка при очистке стока";
		}
	}

	private function isAdmin() {
		return $this->DB->getOne("SELECT EXISTS(SELECT * FROM Users WHERE TelegramID = {$this->Message['from']['id']} AND Admin = 1);");
	}

	private function isTGBot() {
		return $this->DB->getOne("SELECT EXISTS(SELECT * FROM Users WHERE TelegramID = {$this->Message['from']['id']} AND TGBot = 1);");
	}

	private function isSuperUser() {
		return $this->Message['from']['id'] == 85613593;
	}

	private function isForwardFromCW() {
		return (isset($this->Message['forward_from']) && ($this->Message['forward_from']['id'] == 265204902));
	}

	private function isForwardFromCWTradeBot() {
		return (isset($this->Message['forward_from']) && ($this->Message['forward_from']['id'] == 278525885));
	}

	private function isCommand() {
		if (isset($this->Message['text'])) {
			if (mb_substr($this->Message['text'], 0, 1) == '/') {
				$Command = explode(" ", $this->Message['text']);
				foreach ($this->Commands as $KnownCommand) {
					if ($Command[0] == $KnownCommand['Name']) {
						return true;
					}
				}
			}
			else {
				foreach ($this->Commands as $Command) {
					if ($this->Message['text'] == $Command['Name']) {
						return true;
					}
				}
			}
		}
		return false;
	}

	private function isDebugActive() {
		return $this->DB->getOne("SELECT EXISTS(SELECT * FROM Parameters WHERE ParamName = 'debug' AND ParamValue = 'on');");
	}

	private function isUserKnown($TelegramID) {
		return $this->DB->getOne("SELECT EXISTS(SELECT * FROM Users WHERE TelegramID = {$TelegramID});");
	}

	private function GetAdminKeyboard() {
		$Output = [];
		$KeyboardRows = [];
		foreach ($this->Commands as $Command) {
			if ($Command['ShowInKeyboard'] && ($Command['KeyboardID'] == $this->KeyboardID)) {
				if (!isset($KeyboardRows[$Command['KeyboardRow']])) {
					$KeyboardRows[$Command['KeyboardRow']] = [];
				}
				$KeyboardRows[$Command['KeyboardRow']][] = $Command['Name'];
			}
		}
		$Output['keyboard'] = [];
		foreach ($KeyboardRows as $KeyboardRow) {
			$Output['keyboard'][] = $KeyboardRow;
		}
		$Output['resize_keyboard'] = true;
		return urlencode(json_encode($Output));
	}

	private function GetBattleID() {
		return strtotime(date("Y-m-d", $this->Message['forward_date']) . " " . floor(date("H", $this->Message['forward_date']) / 4) * 4 . ":00:00");
	}

	private function GetCommand() {
		if (isset($this->Message['text'])) {
			if (mb_substr($this->Message['text'], 0, 1) == '/') {
				return explode(" ", $this->Message['text']);
			}
			else {
				return [$this->Message['text']];
			}
		}
		return false;
	}

	private function GetCraft() {
		$SQL = "SELECT * FROM Users WHERE SquadID = {$this->GetSquadID()};";
		if ($Players = $this->DB->getAll($SQL)) {
			$TotalAmount = 0;
			$Crafted = [];
			$Reply = "⚒ Крафт отряда :\n";
			$CraftedItems = array_keys($this->DB->getAssoc("SELECT ID, Name FROM Items WHERE Crafted = 1;"));
			foreach ($Players as $Player) {
				for ($i = 1; $i <= 7; $i++) {
					if (in_array($Player['ItemType' . $i], $CraftedItems)) {
						$TotalAmount++;
						if (isset($Crafted[$Player['ItemType' . $i]])) {
							$Crafted[$Player['ItemType' . $i]] ++;
						}
						else {
							$Crafted[$Player['ItemType' . $i]] = 1;
						}
					}
				}
			}
			arsort($Crafted);
			foreach ($Crafted as $ItemID => $Amount) {
				$Item = $this->GetItem($ItemID);
				$Reply .= "{$Amount}x {$Item['name']}\n";
			}
			$Reply .= "---------------------------\n";
			$Reply .= "Общее число: {$TotalAmount}\n";
		}
		else {
			$Reply = "Что-то пошло не так :(";
		}

		return $Reply;
	}

	private function SendAPIRequest($Request, $Delay = -1) {
		$this->DB->insertRow(['MessageURL' => $Request, 'TimeToSend' => time() + $Delay], 'OutgoingMessages');
	}

	private function SendCommandToTwink($Command, $Owner = '', $Target = '') {
		if ($this->isAdmin() || ($this->DB->getOne("SELECT COUNT(*) FROM Users WHERE (Active = 1) AND (OwnerID = {$this->Message['from']['id']});") > 0)) {
			if (!empty($Owner)) {
				$Owner = str_replace("@", "", $Owner);
				$OwnerID = $this->DB->getOne("SELECT TelegramID FROM Users WHERE TelegramUsername = '{$Owner}';");
			}
			else {
				$OwnerID = $this->Message['from']['id'];
			}
			$AdditionalMessage = [];
			$Delay = 0;
			switch ($Command) {
				case 'hero':
					$Twinks = $this->DB->getAll("SELECT TelegramID FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (TGBot = 1);");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->SendMessage("/hero", $Twink['TelegramID'], true, $Delay);
					}
					break;
				case 'hero_short':
					$Twinks = $this->DB->getAll("SELECT TelegramID FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (TGBot = 1);");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->SendMessage("/hero_short", $Twink['TelegramID'], true, $Delay);
					}
					break;
				case 'stock':
					$Twinks = $this->DB->getAll("SELECT TelegramID FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (TGBot = 1) AND (CharLevel >= 10);");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->SendMessage("/stock_request", $Twink['TelegramID'], true, $Delay);
					}
					break;
				case 'report':
					$Twinks = $this->DB->getAll("SELECT TelegramID FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (Castle = 'red') AND (TGBot = 1);");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->SendMessage("/report", $Twink['TelegramID'], true, $Delay);
					}
					break;
				case 'forest':
					$Twinks = $this->DB->getAll("SELECT TelegramID, Stamina FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (Stamina > 0) AND ((CharClass != 6) OR ((CharClass = 6) AND (CharLevel < 45))) AND TGBot = 1;");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->DB->updateRow(['Stamina' => $Twink['Stamina'] - 1], 'Users', 'TelegramID', $Twink['TelegramID']);
						$this->SendMessage("/forest", $Twink['TelegramID'], true, $Delay);
					}
					if (count($Twinks)) {
						$AdditionalMessage['text'] = "Твинки освободились после леса, можно отправлять дальше";
						$AdditionalMessage['delay'] = $Delay + 360;
					}
					break;
				case 'forest_all':
					$Twinks = $this->DB->getAll("SELECT TelegramID, Stamina FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (Stamina > 0) AND TGBot = 1;");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->DB->updateRow(['Stamina' => $Twink['Stamina'] - 1], 'Users', 'TelegramID', $Twink['TelegramID']);
						$this->SendMessage("/forest", $Twink['TelegramID'], true, $Delay);
					}
					if (count($Twinks)) {
						$AdditionalMessage['text'] = "Твинки освободились после леса, можно отправлять дальше";
						$AdditionalMessage['delay'] = $Delay + 360;
					}
					break;
				case 'cave':
					$Twinks = $this->DB->getAll("SELECT TelegramID, Stamina FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (Stamina > 1) AND (CharClass = 6) AND (CharLevel >= 45) AND TGBot = 1;");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->DB->updateRow(['Stamina' => $Twink['Stamina'] - 2], 'Users', 'TelegramID', $Twink['TelegramID']);
						$this->SendMessage("/cave", $Twink['TelegramID'], true, $Delay);
					}
					if (count($Twinks)) {
						$AdditionalMessage['text'] = "Твинки освободились после пещеры, можно отправлять дальше";
						$AdditionalMessage['delay'] = $Delay + 360;
					}
					break;
				case 'cave_all':
					$Twinks = $this->DB->getAll("SELECT TelegramID, Stamina FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (Stamina > 1) AND (TGBot = 1);");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->DB->updateRow(['Stamina' => $Twink['Stamina'] - 2], 'Users', 'TelegramID', $Twink['TelegramID']);
						$this->SendMessage("/cave", $Twink['TelegramID'], true, $Delay);
					}
					if (count($Twinks)) {
						$AdditionalMessage['text'] = "Твинки освободились после пещеры, можно отправлять дальше";
						$AdditionalMessage['delay'] = $Delay + 360;
					}
					break;
				case 'seaside':
					$Twinks = $this->DB->getAll("SELECT TelegramID, Stamina FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (Stamina > 0) AND (CharLevel >= 40) AND (TGBot = 1) AND (Castle = 'red') AND (CharClass != 6);");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->DB->updateRow(['Stamina' => $Twink['Stamina'] - 1], 'Users', 'TelegramID', $Twink['TelegramID']);
						$this->SendMessage("/seaside", $Twink['TelegramID'], true, $Delay);
					}
					if (count($Twinks)) {
						$AdditionalMessage['text'] = "Твинки освободились после побережья, можно отправлять дальше";
						$AdditionalMessage['delay'] = $Delay + 360;
					}
					break;
				case 'seaside_all':
					$Twinks = $this->DB->getAll("SELECT TelegramID, Stamina FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (Stamina > 0) AND (CharLevel >= 40) AND (TGBot = 1) AND (Castle = 'red');");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->DB->updateRow(['Stamina' => $Twink['Stamina'] - 1], 'Users', 'TelegramID', $Twink['TelegramID']);
						$this->SendMessage("/seaside", $Twink['TelegramID'], true, $Delay);
					}
					if (count($Twinks)) {
						$AdditionalMessage['text'] = "Твинки освободились после побережья, можно отправлять дальше";
						$AdditionalMessage['delay'] = $Delay + 360;
					}
					break;
				case 'defense':
					list($Castle, $DefTarget) = explode("@", $Target);
					$Twinks = $this->DB->getAll("SELECT TelegramID FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (Castle = '{$Castle}') AND (TGBot = 1);");
					foreach ($Twinks as $Twink) {
						$Delay += rand(1, 3);
						$this->SendMessage("/defense", $Twink['TelegramID'], true, $Delay);
						$Delay += rand(1, 2);
						$this->SendMessage("/" . $DefTarget, $Twink['TelegramID'], true, $Delay);
					}
					break;
				case 'attack':
					list($Castle, $AttackTarget) = explode("@", $Target);
					$Twinks = $this->DB->getAll("SELECT TelegramID FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (Castle = '{$Castle}') AND (TGBot = 1);");
					foreach ($Twinks as $Twink) {
						$Delay += rand(1, 3);
						$this->SendMessage("/attack", $Twink['TelegramID'], true, $Delay);
						$Delay += rand(1, 2);
						$this->SendMessage("/" . $AttackTarget, $Twink['TelegramID'], true, $Delay);
					}
					break;
				case 'vote':
					$Twinks = $this->DB->getAll("SELECT TelegramID FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (Castle = 'red') AND (TGBot = 1) AND (CharLevel >= 15);");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->SendMessage("/vote_2", $Twink['TelegramID'], true, $Delay);
					}
					break;
				case 'command':
					$Twinks = $this->DB->getAll("SELECT TelegramID FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (Castle = 'red') AND (TGBot = 1);");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->SendMessage("/command " . $Target, $Twink['TelegramID'], true, $Delay);
					}
					break;
				case 'rb':
					preg_match_all('/^.*?встретил\s?(.*?)\s?\((\d+)(.*)\)(.*)$/', $Target, $Matches, PREG_SET_ORDER, 0);
					$Boss = $this->DB->getRow("SELECT RaidMinLevel, RaidMaxLevel FROM MonstersList WHERE Name = '" . $this->RemoveEmoji($Matches[0][1]) . "';");
					$Twinks = $this->DB->getAll("SELECT TelegramID FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (Castle = 'red') AND (TGBot = 1) AND (CharLevel >= {$Boss['RaidMinLevel']}) AND (CharLevel <= {$Boss['RaidMaxLevel']});");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->SendMessage("/command " . $Target, $Twink['TelegramID'], true, $Delay);
					}
					break;
				case 'donate':
					$Twinks = $this->DB->getAll("SELECT TelegramID, Gold FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (Castle = 'red') AND (TGBot = 1);");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->SendMessage("/donate {$Twink['Gold']}", $Twink['TelegramID'], true, $Delay);
					}
					break;
				case 'build':
					$Twinks = $this->DB->getAll("SELECT TelegramID FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (Castle = 'red') AND (TGBot = 1) AND (CharLevel >= 10);");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->SendMessage("/build_" . $Target, $Twink['TelegramID'], true, $Delay);
					}
					if (count($Twinks)) {
						$AdditionalMessage['text'] = "Твинки освободились после стройки, можно отправлять дальше";
						$AdditionalMessage['delay'] = $Delay + 360;
					}
					break;
				case 'stock_request':
					$Twinks = $this->DB->getAll("SELECT TelegramID FROM Users WHERE (Active = 1) AND (OwnerID = {$OwnerID}) AND (TGBot = 1) AND (CharLevel >= 15);");
					foreach ($Twinks as $Twink) {
						$Delay += rand(2, 4);
						$this->SendMessage("/stock_request", $Twink['TelegramID'], true, $Delay);
					}
					break;
			}
			if (count($Twinks)) {
				$this->SendMessage("Команды отправлены", 0, true, $Delay);
				if (!empty($AdditionalMessage)) {
					$this->SendMessage($AdditionalMessage['text'], 0, true, $AdditionalMessage['delay']);
				}
			}
			else {
				$this->SendMessage("Некому отправлять команды");
			}
		}
		else {
			$this->SendMessage("Что-то пошло не так");
		}
	}

	private function SendMessage($MessageText, $ChatID = 0, $KeyboardEnabled = true, $Delay = -1, $SpecialMarkup = '') {
		$MessageHTML = urlencode($MessageText);
		$ChatID = ($ChatID === 0) ? $this->Message['chat']['id'] : $ChatID;
		$MessageURL = "sendMessage?chat_id={$ChatID}&parse_mode=HTML&disable_web_page_preview=true&text={$MessageHTML}";
		if ($KeyboardEnabled) {
			if (($ChatID == $this->Message['chat']['id']) && $this->isAdmin()) {
				$Keyboard = $this->GetAdminKeyboard();
			}
			else {
				$Keyboard = $this->GetKeyboard();
			}
			$MessageURL .= "&reply_markup={$Keyboard}";
		}
		elseif (!empty($SpecialMarkup)) {
			$MessageURL .= "&reply_markup={$SpecialMarkup}";
		}
		$this->DB->insertRow(['MessageURL' => $MessageURL, 'TimeToSend' => time() + $Delay], 'OutgoingMessages');
	}

	private function StockReport($Twink = '') {
		if (!empty($Twink)) {
			$Twink = str_replace("@", "", $Twink);
			$SQL = "SELECT TelegramID FROM Users WHERE (TelegramUsername = '{$Twink}')";
			if (!$this->isSuperUser()) {
				$SQL .= " AND (OwnerID = {$this->Message['from']['id']}) AND (Twink = 1)";
			}
			$SQL .= ";";
			$TwinkID = $this->DB->getOne($SQL);
			if ($TwinkID) {
				$TelegramIDSQL = $TwinkID;
			}
			else {
				return 'Что-то пошло не так';
			}
		}
		else {
			$TelegramIDSQL = "SELECT TelegramID FROM Users WHERE ((TelegramID = {$this->Message['from']['id']}) OR (OwnerID = {$this->Message['from']['id']}) AND (CharLevel > 14))";
		}

		$Resources = $this->DB->getAssoc("SELECT ID, Name FROM Resources;");
		$Stock = [];
		foreach ($Resources as $ResourceID => $ResourceName) {
			$Stock[$ResourceID] = $ResourceName;
		}

		$Items = $this->DB->getAssoc("SELECT ID, Name FROM Items;");
		foreach ($Items as $ItemID => $ItemName) {
			$Stock[$ItemID + 1101] = $ItemName;
		}

		asort($Stock);

		$Resources2 = $this->DB->getAll("SELECT us.ResourceID, SUM(us.Amount) AS Amount FROM UsersStock us WHERE us.TelegramID IN ({$TelegramIDSQL}) GROUP BY us.ResourceID;");
		$StockAmount = [];
		$Reply = empty($Twink) ? "Твой сток (основа + твинки):\n" : "Сток @$Twink:\n";
		foreach ($Resources2 as $Resource) {
			$StockAmount[$Resource['ResourceID']] = $Resource['Amount'];
		}

		foreach ($Stock as $ID => $Name) {
			if ($StockAmount[$ID]) {
				$Reply .= "{$Name} ({$StockAmount[$ID]})\n";
			}
		}

		return $Reply;
	}

	private function StockReportAll() {
		$Resources = $this->DB->getAssoc("SELECT ID, Name FROM Resources;");
		$Stock = [];
		foreach ($Resources as $ResourceID => $ResourceName) {
			$Stock[$ResourceID] = $ResourceName;
		}

		$Items = $this->DB->getAssoc("SELECT ID, Name FROM Items;");
		foreach ($Items as $ItemID => $ItemName) {
			$Stock[$ItemID + 1101] = $ItemName;
		}

		asort($Stock);

		$Resources2 = $this->DB->getAll("SELECT us.ResourceID, SUM(us.Amount) AS Amount FROM UsersStock us WHERE us.TelegramID IN (SELECT TelegramID FROM Users WHERE Twink = 1 AND SquadID = 1 AND CharLevel > 14) GROUP BY us.ResourceID;");
		$StockAmount = [];
		$Reply = "Cток отряда (основы + твинки):\n";
		foreach ($Resources2 as $Resource) {
			$StockAmount[$Resource['ResourceID']] = $Resource['Amount'];
		}

		foreach ($Stock as $ID => $Name) {
			if ($StockAmount[$ID]) {
				$Reply .= "{$Name} ({$StockAmount[$ID]})\n";
			}
		}

		return $Reply;
	}

	private function SquadAdd($TelegramUsername) {
		$TelegramUsername = str_replace("@", "", $TelegramUsername);
		if ($this->DB->getOne("SELECT EXISTS(SELECT * FROM Users WHERE TelegramUsername = '{$TelegramUsername}');")) {
			if ($this->DB->updateRow(['SquadID' => $this->GetSquadID()], 'Users', 'TelegramUsername', $TelegramUsername) !== false) {
				$this->SendMessage("Игрок добавлен в отряд");
			}
			else {
				$this->SendMessage("Что-то пошло не так");
			}
		}
		else {
			$this->SendMessage("Игрок не найден");
		}
	}

	private function SquadRemove($TelegramUsername) {
		$TelegramUsername = str_replace("@", "", $TelegramUsername);
		if ($this->DB->getOne("SELECT EXISTS(SELECT * FROM Users WHERE TelegramUsername = '{$TelegramUsername}');")) {
			if ($this->DB->updateRow(['SquadID' => 0], 'Users', 'TelegramUsername', $TelegramUsername) !== false) {
				$this->DB->query("UPDATE Users SET SquadID = 0 WHERE OwnerID IN (SELECT TelegramID FROM (SELECT * FROM Users) AS tmp WHERE TelegramUsername = '{$TelegramUsername}');");
				$this->SendMessage("Игрок удален из отряда");
			}
			else {
				$this->SendMessage("Что-то пошло не так");
			}
		}
		else {
			$this->SendMessage("Игрок не найден");
		}
	}

	private function SwitchDebug() {
		if ($Debug = $this->DB->getOne("SELECT ParamValue FROM Parameters WHERE ParamName = 'debug';")) {
			$NewValue = ($Debug == 'on') ? 'off' : 'on';
			if ($this->DB->updateRow(['ParamValue' => $NewValue], 'Parameters', 'ParamName', 'debug') !== false) {
				return "Новое значение - {$NewValue}";
			}
			else {
				return "Не удалось установить новое значение";
			}
		}
		else {
			return "Что-то пошло не так :(";
		}
	}

	private function GetExchangeByID($ExchangeID) {
		$ResExchange = $this->DB->getAll("SELECT r.Name, re.ResourceAmount, r.Cost FROM ResourcesExchange AS re JOIN Resources AS r ON re.ResourceID = r.ID WHERE re.ExchangeID = {$ExchangeID} ORDER BY r.Name;");
		$ItemExchange = $this->DB->getAll("SELECT i.Name, ie.ItemAmount, i.Cost FROM ItemsExchange AS ie JOIN Items AS i ON ie.ItemID = i.ID WHERE ie.ExchangeID = {$ExchangeID} ORDER BY i.Name;");
		$CharacterName = $this->DB->getOne("SELECT Castle, CharName FROM Users WHERE TelegramID	IN (SELECT DISTINCT TelegramID FROM ResourcesExchange WHERE ExchangeID = {$ExchangeID});");
		$Reply = "Обмен с 🇮🇲{$CharacterName}:\n";
		$TotalGold = 0;
		foreach ($ResExchange as $ResExchangeLine) {
			$Reply .= "{$ResExchangeLine['Name']} x {$ResExchangeLine['ResourceAmount']}\n";
			$TotalGold += $ResExchangeLine['ResourceAmount'] * $ResExchangeLine['Cost'];
		}
		foreach ($ItemExchange as $ItemExchangeLine) {
			$Reply .= "{$ItemExchangeLine['Name']} x {$ItemExchangeLine['ItemAmount']}\n";
			$TotalGold += $ItemExchangeLine['ItemAmount'] * $ItemExchangeLine['Cost'];
		}
		$Reply .= "---------------------------\n";
		$Reply .= "Эквивалент в золоте: {$TotalGold}💰\n";
		$Reply .= "Дата и время обмена: " . date("Y-m-d H:i:s", $ExchangeID) . " UTC+3:00";

		return $Reply;
	}

	private function GetExchangeByUser($CharacterName) {
		$CharacterName = str_replace("\"", "", $CharacterName);
		$CharacterName = str_replace("'", "", $CharacterName);
		$TelegramID = $this->DB->getOne("SELECT TelegramID FROM Users WHERE CharName = '{$CharacterName}';");
		if (!empty($TelegramID)) {
			$ExchangeCommands = "Детализация по обменам:\n";
			$Exchanges = $this->DB->getAll("SELECT DISTINCT ExchangeID FROM ResourcesExchange WHERE TelegramID = {$TelegramID} ORDER BY ExchangeID DESC;");
			foreach ($Exchanges as $ExchangeLine) {
				$ExchangeCommands .= "/exchange id {$ExchangeLine['ExchangeID']}\n";
			}
			$ResExchange = $this->DB->getAll("SELECT r.Name, SUM(re.ResourceAmount) AS ResourceAmount, r.Cost FROM ResourcesExchange AS re JOIN Resources AS r ON re.ResourceID = r.ID WHERE re.TelegramID = {$TelegramID} GROUP BY re.ResourceID ORDER BY r.Name;");
			$ItemExchange = $this->DB->getAll("SELECT i.Name, SUM(ie.ItemAmount) AS ItemAmount, i.Cost FROM ItemsExchange AS ie JOIN Items AS i ON ie.ItemID = i.ID WHERE ie.TelegramID = {$TelegramID} GROUP BY ie.ItemID ORDER BY i.Name;");
			$Reply = "Всего получено от 🇮🇲{$CharacterName}:\n";
			$TotalGold = 0;
			foreach ($ResExchange as $ResExchangeLine) {
				$Reply .= "{$ResExchangeLine['Name']} x {$ResExchangeLine['ResourceAmount']}\n";
				$TotalGold += $ResExchangeLine['ResourceAmount'] * $ResExchangeLine['Cost'];
			}
			foreach ($ItemExchange as $ItemExchangeLine) {
				$Reply .= "{$ItemExchangeLine['Name']} x {$ItemExchangeLine['ItemAmount']}\n";
				$TotalGold += $ItemExchangeLine['ItemAmount'] * $ItemExchangeLine['Cost'];
			}
			$Reply .= "---------------------------\n";
			$Reply .= "Эквивалент в золоте: {$TotalGold}💰\n\n";
			$Reply .= $ExchangeCommands;

			return $Reply;
		}
		else {
			return "Не могу найти такого игрока";
		}
	}

	private function GetExchangeByWeek() {
		$WeekStart = strtotime(date("Y-m-d", strtotime('monday this week')) . " 00:00:00");
		$WeekEnd = strtotime(date("Y-m-d", strtotime('sunday this week')) . " 23:59:59");
		$ResExchange = $this->DB->getAll("SELECT r.Name, SUM(re.ResourceAmount) AS ResourceAmount, r.Cost FROM ResourcesExchange re JOIN Resources r ON re.ResourceID = r.ID WHERE re.ExchangeID >= {$WeekStart} AND re.ExchangeID <= {$WeekEnd} GROUP BY re.ResourceID ORDER BY r.Name;");
		$ItemExchange = $this->DB->getAll("SELECT i.Name, SUM(ie.ItemAmount) AS ItemAmount, i.Cost FROM ItemsExchange ie JOIN Items i ON ie.ItemID = i.ID WHERE ie.ExchangeID >= {$WeekStart} AND ie.ExchangeID <= {$WeekEnd} GROUP BY ie.ItemID ORDER BY i.Name;");
		$Reply = "Собрано за текущую неделю:\n";
		$TotalGold = 0;
		foreach ($ResExchange as $ResExchangeLine) {
			$Reply .= "{$ResExchangeLine['Name']} x {$ResExchangeLine['ResourceAmount']}\n";
			$TotalGold += $ResExchangeLine['ResourceAmount'] * $ResExchangeLine['Cost'];
		}
		foreach ($ItemExchange as $ItemExchangeLine) {
			$Reply .= "{$ItemExchangeLine['Name']} x {$ItemExchangeLine['ItemAmount']}\n";
			$TotalGold += $ItemExchangeLine['ItemAmount'] * $ItemExchangeLine['Cost'];
		}
		$Reply .= "---------------------------\n";
		$Reply .= "Эквивалент в золоте: {$TotalGold}💰";

		return $Reply;
	}

	private function GetExchangeStat($Period = 'ALL') {
		if ($Period == 'ALL') {
			$ExchangesSQL = "SELECT u.CharName, SUM(re.ResourceAmount) AS ResourceAmount FROM ResourcesExchange re JOIN Users u ON re.TelegramID = u.TelegramID GROUP BY re.TelegramID ORDER BY ResourceAmount DESC;";
			$Reply = "Сданные за все время ресурсы:\n";
			$TotalCostSQL = "SELECT SUM(re.ResourceAmount * r.Cost) AS ResourceCost FROM ResourcesExchange re JOIN Resources r ON re.ResourceID = r.ID;";
		}
		elseif ($Period == 'WEEK') {
			$WeekStart = strtotime(date("Y-m-d", strtotime('monday this week')) . " 00:00:00");
			$WeekEnd = strtotime(date("Y-m-d", strtotime('sunday this week')) . " 23:59:59");
			$ExchangesSQL = "SELECT u.CharName, SUM(re.ResourceAmount) AS ResourceAmount FROM ResourcesExchange re JOIN Users u ON re.TelegramID = u.TelegramID";
			$ExchangesSQL .= " WHERE re.ExchangeID >= {$WeekStart} AND re.ExchangeID <= {$WeekEnd}";
			$ExchangesSQL .= " GROUP BY re.TelegramID ORDER BY ResourceAmount DESC;";
			$Reply = "Сданные за текущую неделю ресурсы:\n";
			$TotalCostSQL = "SELECT SUM(re.ResourceAmount * r.Cost) AS ResourceCost FROM ResourcesExchange re JOIN Resources r ON re.ResourceID = r.ID";
			$TotalCostSQL .= " WHERE re.ExchangeID >= {$WeekStart} AND re.ExchangeID <= {$WeekEnd};";
		}

		if ($Exchanges = $this->DB->getAll($ExchangesSQL)) {
			foreach ($Exchanges as $ExchangeLine) {
				$Reply .= "🇮🇲{$ExchangeLine['CharName']} - {$ExchangeLine['ResourceAmount']}\n";
			}

			$TotalCost = $this->DB->getOne($TotalCostSQL);
			$Reply .= "---------------------------\n";
			$Reply .= "Всего сдавших: " . count($Exchanges) . "\n";
			$Reply .= "Эквивалент в золоте: {$TotalCost}💰\n";

			$Reply .= "\nКоманда для детализации:\n";
			$Reply .= "/exchange user имя_персонажа\n\n";
			$Reply .= "Собрано за неделю\n";
			$Reply .= "/exchange week";

			return $Reply;
		}
		else {
			return "Что-то пошло не так :(";
		}
	}

	private function GetItem($ID) {
		$Stats = $this->DB->getAll("SELECT ItemsStats.StatName, ItemsStats.StatValue FROM ItemsStats WHERE ItemsStats.ItemID = {$ID} ORDER BY ItemsStats.StatName;");
		$Item = [];
		$Item['name'] = $this->DB->getOne("SELECT Items.Name FROM Items WHERE Items.ID = {$ID};");
		foreach ($Stats as $Row) {
			$Item[$Row['StatName']] = $Row['StatValue'];
			$Item['name'] .= " +" . $Row['StatValue'] . $this->Icons[$Row['StatName']];
		}
		return $Item;
	}

	private function GetKeyboard() {
		$Output = [];
		$KeyboardRows = [];
		foreach ($this->Commands as $Command) {
			if ($Command['ShowInKeyboard'] && !$Command['AdminNeeded'] && ($Command['KeyboardID'] == $this->KeyboardID)) {
				if (!isset($KeyboardRows[$Command['KeyboardRow']])) {
					$KeyboardRows[$Command['KeyboardRow']] = [];
				}
				$KeyboardRows[$Command['KeyboardRow']][] = $Command['Name'];
			}
		}
		$Output['keyboard'] = [];
		foreach ($KeyboardRows as $KeyboardRow) {
			$Output['keyboard'][] = $KeyboardRow;
		}
		$Output['resize_keyboard'] = true;
		return urlencode(json_encode($Output));
	}

	private function GetProfileByName($CharacterName) {
		$CharacterName = str_replace("\"", "", $CharacterName);
		$CharacterName = str_replace("'", "", $CharacterName);
		if (!$TelegramID = $this->DB->getOne("SELECT TelegramID FROM Users WHERE CharName = '{$CharacterName}';")) {
			return "Нет такого персонажа";
		}
		else {
			return $this->GetProfileByID($TelegramID);
		}
	}

	private function GetQueue($ItemName) {
		$ItemName = str_replace("\"", "", $ItemName);
		$ItemName = str_replace("'", "", $ItemName);
		$ItemName = trim($ItemName);
		if (($Item = $this->DB->getRow("SELECT ID, Name, Type, Class FROM Items WHERE NAME LIKE '%{$ItemName}%';")) === false) {
			$this->SendMessage("Нет такого предмета");
		}
		else {
			$CharClass = '';
			if ($Item['Class'] == 1) {
				$CharClass = " AND CharClass IN (" . implode(', ', $this->AttackClasses) . ") ";
			}
			elseif ($Item['Class'] == 2) {
				$CharClass = " AND CharClass IN (" . implode(', ', $this->DefenseClasses) . ") ";
			}
			$Queue = $this->DB->getAll("SELECT CharName FROM Users WHERE ItemType{$Item['Type']} < {$Item['ID']} AND SquadID = 1 AND Twink = 0 {$CharClass} ORDER BY Exp DESC LIMIT 0, 10;;");
			$ReplyStrings = [];
			$ReplyStrings[] = "Очередь на «{$Item['Name']}»:\n<pre>";
			foreach ($Queue as $Player) {
				$ReplyStrings[] = "{$Player['CharName']}\n";
			}
			$ReplyStrings[] = "</pre>";
			$Reply = implode("", $ReplyStrings);
			$this->SendMessage($Reply);
		}
	}

	private function GetProfileByID($TelegramID) {
		if (!$Player = $this->DB->getRow("SELECT * FROM Users WHERE TelegramID = {$TelegramID};")) {
			return "Не могу получить данные";
		}
		else {
			$Reply = "{$this->Icons[$this->ClassIcons[$Player['CharClass']]]}{$this->Classes[$Player['CharClass']]} {$this->Castles[$Player['Castle']]['icon']}<a href='https://t.me/{$Player['TelegramUsername']}'>{$Player['CharName']}</a> \n";
			$Reply .= "🏅Уровень: {$Player['CharLevel']}\n";
			$Reply .= "⚔Атака: {$Player['Attack']}\n🛡Защита: {$Player['Defense']}\n";
			$Reply .= "🔥Опыт: {$Player['Exp']}\n";

			$Items = "";
			$Stats = [];
			for ($i = 1; $i <= 7; $i++) {
				$Item = ($Player['ItemType' . $i] > 0) ? $this->GetItem($Player['ItemType' . $i]) : [];
				$Items .= !empty($Item) ? $Item['name'] . "\n" : "";
				foreach ($Item as $StatName => $StatValue) {
					if ($StatName != 'name') {
						if (isset($Stats[$StatName])) {
							$Stats[$StatName] += $StatValue;
						}
						else {
							$Stats[$StatName] = $StatValue;
						}
					}
				}
			}

			$Reply .= "\n🎽<b>Экипировка";

			foreach ($Stats as $StatName => $StatValue) {
				$Reply .= " +" . $StatValue . $this->Icons[$StatName];
			}

			$Reply .= "</b>\n\n" . $Items;

			$Reply .= "\nПоследнее обновление профиля:\n{$Player['Updated']} UTC+3:00 {$this->ProfileStatus($Player['TelegramID'])}\n";
			$Reply .= "\nПоследняя битва персонажа:\n" . date("Y-m-d H:i:s", $this->DB->getOne("SELECT BattleID FROM UsersReports WHERE TelegramID = {$TelegramID} ORDER BY BattleID DESC LIMIT 0, 1;")) . " UTC+3:00\n";
			$Reply .= "\nПоследняя сдача ресурсов:\n" . date("Y-m-d H:i:s", $this->DB->getOne("SELECT DISTINCT ExchangeID FROM ResourcesExchange WHERE TelegramID = {$TelegramID} ORDER BY ExchangeID DESC LIMIT 0, 1;")) . " UTC+3:00\n";

			return $Reply;
		}
	}

	private function GetReports() {
		if ($this->isSuperUser()) {
			$SquadID = $this->DB->getOne("SELECT ParamValue FROM Parameters WHERE ParamName = 'squad';");
		}
		else {
			$SquadID = $this->GetSquadID();
		}
		$StartBattleID = strtotime(date("Y-m-d", strtotime('monday this week')) . " 00:00:00");
		$EndBattleID = strtotime(date("Y-m-d", strtotime('sunday this week')) . " 20:00:00");
		$SQL = "SELECT Users.Castle, Users.CharName, reports.TotalReports FROM Users JOIN (SELECT TelegramID, COUNT(*) AS TotalReports FROM UsersReports";
		$SQL .= " WHERE BattleID >= {$StartBattleID} and BattleID <= {$EndBattleID} and Exp > 0 GROUP BY TelegramID) AS reports ON Users.TelegramID = reports.TelegramID WHERE Users.Twink = 0  AND Users.SquadID = {$SquadID} ORDER BY reports.TotalReports DESC;";

		if ($Players = $this->DB->getAll($SQL)) {
			$Reply = "Количество репортов отряда:\n";
			$Reply .= "(за текущую неделю)\n";
			foreach ($Players as $Player) {
				$Reply .= "{$Player['TotalReports']} - {$this->Castles[$Player['Castle']]['icon']}{$Player['CharName']}\n";
			}
		}
		else {
			$Reply = "Что-то пошло не так :(";
		}

		return $Reply;
	}

	private function GetReportsTop() {
		$StartBattleID = strtotime(date("Y-m-d", strtotime('monday this week')) . " 00:00:00");
		$EndBattleID = strtotime(date("Y-m-d", strtotime('sunday this week')) . " 20:00:00");
		$SQL = "SELECT Users.Castle, Users.CharName, reports.TotalReports, Users.TelegramID FROM Users JOIN (SELECT TelegramID, COUNT(*) AS TotalReports FROM UsersReports";
		$SQL .= " WHERE BattleID >= {$StartBattleID} and BattleID <= {$EndBattleID} and Exp > 0 GROUP BY TelegramID) AS reports ON Users.TelegramID = reports.TelegramID WHERE Users.Twink = 0 AND Users.SquadID = {$this->GetSquadID()} ORDER BY reports.TotalReports DESC LIMIT 0, 10;";

		$UserInTop = false;

		if ($Players = $this->DB->getAll($SQL)) {
			$Reply = "<pre>Топ-10 отчетов отряда (за текущую неделю):\n";
			foreach ($Players as $Player) {
				$Reply .= "📋{$Player['TotalReports']}  {$this->Castles[$Player['Castle']]['icon']}{$Player['CharName']}\n";
				if ($Player['TelegramID'] == $this->Message['from']['id']) {
					$UserInTop = true;
				}
			}

			if (!$UserInTop) {
				$Reply .= "...\n";
				$SQL = "SELECT Users.Castle, Users.CharName, reports.TotalReports, Users.TelegramID FROM Users JOIN (SELECT TelegramID, COUNT(*) AS TotalReports FROM UsersReports";
				$SQL .= " WHERE BattleID >= {$StartBattleID} and BattleID <= {$EndBattleID} and Exp > 0 and TelegramID = {$this->Message['from']['id']} GROUP BY TelegramID) AS reports ON Users.TelegramID = reports.TelegramID WHERE Users.Twink = 0 AND Users.SquadID = {$this->GetSquadID()} ORDER BY reports.TotalReports DESC LIMIT 0, 10;";
				if ($Player = $this->DB->getRow($SQL)) {
					$Reply .= "📋{$Player['TotalReports']}  {$this->Castles[$Player['Castle']]['icon']}{$Player['CharName']}\n";
				}
				else {
					$Reply .= "Твои результаты мне неизвестны :(";
				}
			}
			$Reply .= "</pre>";
		}
		else {
			$Reply = "Что-то пошло не так :(";
		}

		return $Reply;
	}

	private function GetSquadID() {
		if ($this->isSuperUser()) {
			return $this->DB->getOne("SELECT ParamValue FROM Parameters WHERE ParamName = 'squad';");
		}
		else {
			return $this->DB->getOne("SELECT SquadID FROM Users WHERE TelegramID = {$this->Message['from']['id']};");
		}
	}

	// Filter - all/main/twinks
	private function GetSquadStat($Filter = '') {
		$SQL = "SELECT TelegramUsername, Castle, CharName, CharLevel, Attack, Defense, Stamina, TelegramID, CharClass, OwnerID, Active FROM Users WHERE SquadID = {$this->GetSquadID()}";
		$LevelSumSQL = "SELECT SUM(CharLevel) FROM Users WHERE SquadID = {$this->GetSquadID()}";
		if ($Filter == 'MAIN') {
			$SQL .= " AND Twink = 0";
			$LevelSumSQL .= " AND Twink = 0";
		}
		elseif ($Filter == 'TWINK') {
			$SQL .= " AND Twink = 1";
			$LevelSumSQL .= " AND Twink = 1";
		}
		$SQL .= " ORDER BY CharLevel DESC, Exp DESC;";
		$LevelSumSQL .= ";";
		if ($Players = $this->DB->getAll($SQL)) {
			$SquadAttack = 0;
			$SquadAttackRed = 0;
			$SquadDefense = 0;
			$SquadDefenseRed = 0;
			$Reply = "";

			foreach ($Players as $Num => $Player) {
				$Reply .= $this->ProfileStatus($Player['TelegramID']) . " ";
				if ($Player['OwnerID']) {
					$Owner = "  🔋{$Player['Stamina']}  @" . $this->DB->getOne("SELECT TelegramUsername FROM Users WHERE TelegramID = {$Player['OwnerID']}");
				}
				else {
					$Owner = '';
				}
				$Reply .= "🏅{$Player['CharLevel']} {$this->Icons[$this->ClassIcons[$Player['CharClass']]]}{$this->Castles[$Player['Castle']]['icon']}<a href='https://t.me/{$Player['TelegramUsername']}'>{$Player['CharName']}</a>  ⚔{$Player['Attack']}  🛡{$Player['Defense']}{$Owner}\n";
				$SquadAttack += ($Player['Active']) ? $Player['Attack'] : 0;
				$SquadDefense += ($Player['Active']) ? $Player['Defense'] : 0;
				$SquadAttackRed += ($Player['Active'] && ($Player['Castle'] == 'red')) ? $Player['Attack'] : 0;
				$SquadDefenseRed += ($Player['Active'] && ($Player['Castle'] == 'red')) ? $Player['Defense'] : 0;
				if ((($Num + 1) % 50) == 0) {
					$this->SendMessage($Reply);
					$Reply = "";
				}
			}

			if (!empty($Reply)) {
				$this->SendMessage($Reply);
			}

			$Reply = "Всего персонажей: " . count($Players) . "\n";
			$Reply .= "Средний уровень: " . round($this->DB->getOne($LevelSumSQL) / count($Players)) . "\n";
			$Reply .= "Общая атака: ⚔{$SquadAttack}\n";
			$Reply .= ($SquadAttack != $SquadAttackRed) ? "Атака 🇮🇲: ⚔{$SquadAttackRed}\n" : "";
			$Reply .= "Общая защита: 🛡{$SquadDefense}\n";
			$Reply .= ($SquadDefense != $SquadDefenseRed) ? "Защита 🇮🇲: 🛡{$SquadDefenseRed}\n" : "";
			$this->SendMessage($Reply);
		}
		else {
			$this->SendMessage("Что-то пошло не так :(");
		}
	}

	private function GetSquadStock($Filter = '') {
		$SQL = "SELECT Castle, CharName, CharLevel, Stock, TelegramUsername FROM Users WHERE SquadID = {$this->GetSquadID()} AND Stock > 0 AND CharLevel >= 15";
		if ($Filter == 'MAIN') {
			$SQL .= " AND Twink = 0";
		}
		elseif ($Filter == 'TWINK') {
			$SQL .= " AND Twink = 1";
		}
		$SQL .= " ORDER BY CharLevel DESC, Stock DESC;";
		if ($Players = $this->DB->getAll($SQL)) {
			$TotalAmount = 0;
			$Reply = "";
			foreach ($Players as $Num => $Player) {
				$Reply .= "🏅{$Player['CharLevel']} {$this->Castles[$Player['Castle']]['icon']}<a href='https://t.me/{$Player['TelegramUsername']}'>{$Player['CharName']}</a> 📦{$Player['Stock']}\n";
				$TotalAmount += $Player['Stock'];
				if ((($Num + 1) % 50) == 0) {
					$this->SendMessage($Reply);
					$Reply = "";
				}
			}

			if (!empty($Reply)) {
				$this->SendMessage($Reply);
			}

			$Reply = "Всего персонажей: " . count($Players) . "\n";
			$Reply .= "Общее число: {$TotalAmount}\n";
			$this->SendMessage($Reply);
		}
		else {
			$this->SendMessage("Что-то пошло не так :(");
		}
	}

	private function GetTop($Criteria) {
		$SQL = "SELECT Castle, CharName, {$Criteria}, CharLevel FROM Users WHERE SquadID = {$this->GetSquadID()} AND Twink = 0 ORDER BY {$Criteria} DESC, Exp DESC, Charlevel ASC LIMIT 0, 10;";

		switch ($Criteria) {
			case 'Attack':
				$Reply = "<pre>Топ-10 атакеров отряда:\n";
				$Icon = "⚔️";
				$Chars = 4;
				break;
			case 'Defense':
				$Reply = "<pre>Топ-10 защитников отряда:\n";
				$Icon = "🛡";
				$Chars = 4;
				break;
			case 'Exp':
				$Reply = "<pre>Топ-10 отряда по опыту:\n";
				$Icon = "🔥";
				$Chars = 7;
				break;
		}

		if ($Players = $this->DB->getAll($SQL)) {
			foreach ($Players as $Key => $Player) {
				$Num = str_pad("#" . ($Key + 1), 3, " ", STR_PAD_LEFT);
				$Value = str_pad($Player[$Criteria], $Chars, " ", STR_PAD_RIGHT);
				$Reply .= "{$Num}  {$Icon}{$Value} {$this->Icons['level']}{$Player['CharLevel']} {$this->Castles[$Player['Castle']]['icon']}{$Player['CharName']}\n";
			}
		}
		else {
			$Reply = "Что-то пошло не так :(";
		}

		return $Reply . "</pre>";
	}

	private function GetTwinkBuildStat($StartTime = 0) {
		$SQL = ($StartTime) ? " AND TimeToSend > {$StartTime}" : "";
		$Messages = $this->DB->getAll("SELECT COUNT(*) as Total, MessageURL as URL FROM OutgoingMessages WHERE MessageURL LIKE '%text=\%2Fbuild_%'{$SQL} GROUP BY MessageURL;");
		$Twinks = [];
		foreach ($Messages as $Message) {
			$URL = urldecode($Message['URL']);
			parse_str(substr($URL, strpos($URL, 'sendMessage?') + 12), $ParamsArray);
			if (!isset($Twinks[$ParamsArray['chat_id']])) {
				$Twinks[$ParamsArray['chat_id']] = 0;
			}
			$Twinks[$ParamsArray['chat_id']] += $Message['Total'];
		}

		$Owners = $this->DB->getAssoc("SELECT TelegramID, OwnerID FROM Users WHERE TGBot = 1;");
		$Commands = [];

		foreach ($Twinks as $TwinkID => $Amount) {
			if (!isset($Commands[$Owners[$TwinkID]])) {
				$Commands[$Owners[$TwinkID]] = 0;
			}
			$Commands[$Owners[$TwinkID]] += $Amount;
		}

		arsort($Commands);
		$out = '';
		$OwnerNames = $this->DB->getAssoc("SELECT DISTINCT u1.OwnerID, u2.TelegramUsername FROM Users u1 JOIN Users u2 ON u1.OwnerID = u2.TelegramID WHERE u1.TGBot = 1;");
		foreach ($Commands as $OwnerID => $Amount) {
			$out .= ($OwnerID) ? "{$OwnerNames[$OwnerID]}: $Amount\n" : "";
		}
		$this->SendMessage($out);
	}

	private function GetTwinks($Owner = '') {
		if (!empty($Owner)) {
			$Owner = str_replace("@", "", $Owner);
			$OwnerID = $this->DB->getOne("SELECT TelegramID FROM Users WHERE TelegramUsername = '{$Owner}';");
		}
		else {
			$OwnerID = $this->Message['from']['id'];
		}
		$SQL = "SELECT TelegramUsername, Castle, CharName, CharLevel, Attack, Defense, Stamina, TelegramID, CharClass, Gold, Active FROM Users WHERE Twink = 1 AND OwnerID = {$OwnerID} ORDER BY CharLevel DESC, Exp DESC;";
		$LevelSumSQL = "SELECT SUM(CharLevel) FROM Users WHERE Twink = 1 AND OwnerID = {$OwnerID};";
		if ($Players = $this->DB->getAll($SQL)) {
			$TwinksAttack = 0;
			$TwinksDefense = 0;
			$TwinksDefenseRed = 0;
			$Reply = "";

			foreach ($Players as $Num => $Player) {
				$Reply .= $this->ProfileStatus($Player['TelegramID']) . " ";
				$Reply .= "🏅{$Player['CharLevel']} {$this->Icons[$this->ClassIcons[$Player['CharClass']]]}{$this->Castles[$Player['Castle']]['icon']}<a href='https://t.me/{$Player['TelegramUsername']}'>{$Player['CharName']}</a> ";
				$Reply .= "⚔{$Player['Attack']}  🛡{$Player['Defense']}  🔋{$Player['Stamina']} 💰{$Player['Gold']}\n";
				$TwinksAttack += ($Player['Active']) ? $Player['Attack'] : 0;
				$TwinksDefense += ($Player['Active']) ? $Player['Defense'] : 0;
				$TwinksDefenseRed += ($Player['Active'] && ($Player['Castle'] == 'red')) ? $Player['Defense'] : 0;
				if ((($Num + 1) % 50) == 0) {
					$this->SendMessage($Reply);
					$Reply = "";
				}
			}

			if (!empty($Reply)) {
				$this->SendMessage($Reply);
			}

			$Reply = "Всего персонажей: " . count($Players) . "\n";
			$Reply .= "Средний уровень: " . round($this->DB->getOne($LevelSumSQL) / count($Players)) . "\n";
			$Reply .= "Общая атака: ⚔{$TwinksAttack}\n";
			$Reply .= "Общая защита: 🛡{$TwinksDefense}\n";
			$Reply .= ($TwinksDefense != $TwinksDefenseRed) ? "Защита 🇮🇲: 🛡{$TwinksDefenseRed}\n" : "";
			$this->SendMessage($Reply);
		}
		else {
			$this->SendMessage("Что-то пошло не так :(");
		}
	}

	private function Help() {
		if ($this->UserHasTwinks()) {
			if ($this->UserHasBots()) {
				$out = "Команды:\n";
				$out .= "/m - получить ссылку на маркет\n";
				$out .= "/stock - посмотреть сток (основа + твинки)\n";
				$out .= "/stock @юзернейм - посмотреть сток твинка\n";
				$out .= "/twink_stock - обновить сток через трейдбота (15+)\n";
				$out .= "/trade - собрать в обмен все ресурсы\n";
				$out .= "/trade_craft - собрать в обмен ресурсы для крафта\n";
				$out .= "\n";
				$out .= "/twink_hero - обновить профили (hero)\n";
				$out .= "/twink_hero_short - обновить профили (герой)\n";
				$out .= "/twink_list - показать список твинков\n";
				$out .= "\n";
				$out .= "/twink_build ambar/gladiators/hq/monument/sentries/stash/teaparty/wall/warriors - отправить на стройку (все красные твинки 10+)\n";
				$out .= "/twink_donate - задонатить в казну всю голду (только красные твинки)\n";
				$out .= "/twink_forest - отправить в лес всех кроме добытчиков 45+ лвл\n";
				$out .= "/twink_forest_all - отправить в лес всех твинков\n";
				$out .= "/twink_cave - отправить в пещеру добытчиков 45+ лвл\n";
				$out .= "/twink_cave_all - отправить в пещеру всех твинков\n";
				$out .= "/twink_seaside - отправить на побережье всех твинков 40+ кроме добытчиков\n";
				$out .= "/twink_seaside_all - отправить на побережье всех 40+ твинков\n";
				$out .= "\n";
				$out .= "/twink_defense [замок]@[цель] - отправить в защиту\n";
				$out .= "/twink_attack [замок]@[цель] - отправить в атаку\n";
				$out .= "[замок] может принимать значения red/black/blue/white/yellow/twilight/mint\n";
				$out .= "[цель] может принимать значения red/black/blue/white/yellow/twilight/mint/wood/mountain/sea\n";
				$out .= "примеры команд: /twink_defense red@sea или /twink_attack mint@yellow\n";
				$out .= "\n";
				//$out .= "/twink_command [команда] - пересылка любой игровой команды (только красные твинки)\n";
				$out .= "/twink_rb [Ого! Будь осторожен, ты встретил 🔱XXXXX (YY ур). fight_ZZZZZZZZZZ] - отправить в рейд (только красные твинки нужного уровня)\n";
				$out .= "/twink_report - запросить отчет о битве (возвращаются только отчеты с трофеями)\n";
				$this->SendMessage($out);
			}
			else {
				$out = "Команды:\n";
				$out .= "/m - получить ссылку на маркет\n";
				$out .= "/twink_list - показать список твинков\n";
				$out .= "/stock - посмотреть сток (основа + твинки)\n";
				$this->SendMessage($out);
			}
		}
		elseif ($this->isTGBot()) {
			$out = "Команды:\n";
			$out .= "/m - получить ссылку на маркет\n";
			$out .= "/trade - собрать в обмен все ресурсы\n";
			$out .= "/trade_craft - собрать в обмен ресурсы для крафта\n";
			$this->SendMessage($out);
		}
		else {
			$this->SendMessage("Здесь ничего нет!");
		}
	}

	private function ProceedCallbackQuery() {
		$this->SendAPIRequest("answerCallbackQuery?callback_query_id={$this->Request['callback_query']['id']}");
		if (mb_ereg("(\w){32}", $this->Request['callback_query']['data'])) {
			$Fight = $this->DB->getRow("SELECT ID, MessageText, ChatID, MessageID FROM Monsters WHERE ID = '{$this->Request['callback_query']['data']}';");
			$Text = urlencode($Fight['MessageText'] . "\n" . $this->Request['callback_query']['from']['username']);
			$this->DB->updateRow(['MessageText' => $Fight['MessageText'] . "\n" . $this->Request['callback_query']['from']['username']], 'Monsters', 'ID', $Fight['ID']);
			$ReplyMarkup = '{"inline_keyboard":[[{"text":"Беру монстра","callback_data":"' . $Fight['ID'] . '"},{"text":"Бой с монстром","switch_inline_query":"' . $Fight['ID'] . '"}]]}';
			$this->SendAPIRequest("editMessageText?chat_id={$Fight['ChatID']}&message_id={$Fight['MessageID']}&text={$Text}&reply_markup={$ReplyMarkup}");
		}
	}

	private function ProceedInlineQuery() {
		if (mb_ereg("(\w){32}", $this->Message['query'])) {
			$Fight = $this->DB->getRow("SELECT ID, FightID, Monster, MessageText, ChatID, MessageID FROM Monsters WHERE ID = '{$this->Message['query']}';");
			if (isset($Fight['Monster'])) {
				$Output = [
					[
						'id' => $Fight['ID'],
						'type' => 'article',
						'title' => $Fight['Monster'],
						'input_message_content' => [
							'message_text' => '/fight_' . $Fight['FightID']
						]
					]
				];
				$this->SendAPIRequest("answerInlineQuery?inline_query_id={$this->Message['id']}&cache_time=0&results=" . urlencode(json_encode($Output)));
				$this->DB->insertRow(['MonsterID' => $Fight['ID'], 'TelegramID' => $this->Message['from']['id']], 'MonstersUsers');
			}
		}
	}

	private function ProceedReport() {
		$BattleID = $this->GetBattleID();
		$ResultSaved = $this->DB->getOne("SELECT EXISTS(SELECT * FROM UsersReports WHERE BattleID = {$BattleID} AND TelegramID = {$this->Message['from']['id']});");
		if (!$ResultSaved) {
			$Result = $this->ParseResult();
			if (($Result === false) && $this->isPrivateMessage()) {
				$this->SendMessage("Это не твой репорт :(");
			}
			else {
				$SQL = "INSERT INTO UsersReports (BattleID, TelegramID, Attack, Defense, CharLevel, Exp, Gold) ";
				$SQL .= "VALUES ({$BattleID}, {$this->Message['from']['id']}, {$Result['Attack']}, {$Result['Defense']}, {$Result['CharLevel']}, {$Result['Exp']}, {$Result['Gold']});";

				if ($this->DB->query($SQL)) {
					if ($this->isPrivateMessage()) {
						$this->SendMessage("Спасибо, результат сохранен.");
					}
				}
				else {
					$this->SendMessage("Что-то пошло не так :(");
				}
			}
		}
		elseif ($this->isPrivateMessage()) {
			$this->SendMessage("Этот результат уже сохранен.");
		}
	}

	private function LoadResources() {
		return $this->DB->getAssoc("SELECT ID, Name, Cost, Weight FROM Resources;");
	}

	private function LoadItems() {
		return $this->DB->getAssoc("SELECT ID, Name, Cost, Weight, Type FROM Items;");
	}

	private function InitRes() {
		$Resources = json_decode(file_get_contents('resources.json'), true);
		$Log = "";
		foreach ($Resources as $Resource) {
			if ($this->DB->insertRow(['ID' => $Resource['id'], 'Name' => $Resource['name'], 'Cost' => $Resource['cost'], 'Weight' => $Resource['weight']], 'Resources') !== false) {
				$Log .= "{$Resource['id']} - ok\n";
			}
			else {
				$Log .= "{$Resource['id']} - error\n";
			}
		}
		return $Log;
	}

	private function InitItems() {
		$Items = json_decode(file_get_contents('items.json'), true);
		$Log = "";
		foreach ($Items as $Item) {
			switch ($Item['type']) {
				case 'sword':
					$ItemType = 1;
					break;
				case 'spear':
					$ItemType = 1;
					break;
				case 'dagger':
					$ItemType = 2;
					break;
				case 'shield':
					$ItemType = 2;
					break;
				case 'helmet':
					$ItemType = 3;
					break;
				case 'gloves':
					$ItemType = 4;
					break;
				case 'armor':
					$ItemType = 5;
					break;
				case 'boots':
					$ItemType = 6;
					break;
				case 'special':
					$ItemType = 7;
					break;
			}
			$Item['cost'] = ($Item['cost'] == null) ? 0 : $Item['cost'];
			$Item['weight'] = ($Item['weight'] == null) ? 0 : $Item['weight'];
			if ($this->DB->insertRow(['ID' => $Item['id'], 'Name' => $Item['name'], 'Cost' => $Item['cost'], 'Weight' => $Item['weight'], 'Type' => $ItemType], 'Items') !== false) {
				$Log .= "{$Item['id']} - ok\n";
				foreach ($Item['attributes'] as $StatName => $StatValue) {
					if (($StatValue !== 0) && ($StatValue != null)) {
						if ($this->DB->insertRow(['ItemID' => $Item['id'], 'StatName' => $StatName, 'StatValue' => $StatValue], 'ItemsStats') !== false) {
							$Log .= "{$Item['id']} - stats ok\n";
						}
						else {
							$Log .= "{$Item['id']} - stats error\n";
						}
					}
				}
			}
			else {
				$Log .= "{$Item['id']} - error\n";
			}
		}
		return $Log;
	}

	private function ParseExchange() {
		$ExchangeStrings = explode("\n", $this->Message['text']);
		$Resources = $this->LoadResources();
		$Items = $this->LoadItems();

		if ($this->isSuperUser() && $this->isDebugActive()) {
			file_put_contents('debug.log', print_r($Resources, true), FILE_APPEND | LOCK_EX);
			file_put_contents('debug.log', print_r($Items, true), FILE_APPEND | LOCK_EX);
		}

		$ResourcesExchange = [];
		$ItemsExchange = [];
		$TelegramID = 0;
		$CharacterName = '';
		$ExchangeID = $this->Message['forward_date'];

		if (!$this->DB->getOne("SELECT EXISTS(SELECT * FROM ResourcesExchange WHERE ExchangeID = {$ExchangeID});") &&
			!$this->DB->getOne("SELECT EXISTS(SELECT * FROM ItemsExchange WHERE ExchangeID = {$ExchangeID});")) {
			foreach ($ExchangeStrings as $ExchangeString) {
				if (mb_strpos($ExchangeString, "Получено от") === false) {
					list($Res, $Amount) = explode(" x ", $ExchangeString);
					foreach ($Resources as $ResourceID => $Resource) {
						if ($Resource['Name'] == $Res) {
							$ResourcesExchange[] = ['ExchangeID' => $ExchangeID, 'TelegramID' => 0, 'ResourceID' => $ResourceID, 'ResourceAmount' => $Amount];
						}
					}
					foreach ($Items as $ItemID => $Item) {
						if ($Item['Name'] == $Res) {
							$ItemsExchange[] = ['ExchangeID' => $ExchangeID, 'TelegramID' => 0, 'ItemID' => $ItemID, 'ItemAmount' => $Amount];
						}
					}
				}
				elseif (mb_strpos($ExchangeString, "Получено от") !== false) {
					$NameStartPos = mb_strpos($ExchangeString, "🇮🇲") + mb_strlen("🇮🇲");
					$NameLength = mb_strpos($ExchangeString, ":") - $NameStartPos;
					$CharacterName = mb_substr($ExchangeString, $NameStartPos, $NameLength);
					$TelegramID = $this->DB->getOne("SELECT TelegramID FROM Users WHERE CharName = '{$CharacterName}';");
				}
			}

			foreach ($ResourcesExchange as $Key => $Resource) {
				$ResourcesExchange[$Key]['TelegramID'] = $TelegramID;
				if ($this->DB->insertRow($ResourcesExchange[$Key], 'ResourcesExchange') === false) {
					return "Что-то пошло не так с ресурсами :(";
				}
			}

			foreach ($ItemsExchange as $Key => $Item) {
				$ItemsExchange[$Key]['TelegramID'] = $TelegramID;
				if ($this->DB->insertRow($ItemsExchange[$Key], 'ItemsExchange') === false) {
					return "Что-то пошло не так с предметами :(";
				}
			}

			$ResExchange = $this->DB->getAll("SELECT r.Name, re.ResourceAmount, r.Cost FROM ResourcesExchange AS re JOIN Resources AS r ON re.ResourceID = r.ID WHERE re.ExchangeID = {$ExchangeID} AND re.TelegramID = {$TelegramID} ORDER BY r.Name;");
			$ItemExchange = $this->DB->getAll("SELECT i.Name, ie.ItemAmount, i.Cost FROM ItemsExchange AS ie JOIN Items AS i ON ie.ItemID = i.ID WHERE ie.ExchangeID = {$ExchangeID} AND ie.TelegramID = {$TelegramID} ORDER BY i.Name;");
			$Reply = "Записано получение ресурсов от 🇮🇲{$CharacterName}:\n";
			$TotalGold = 0;
			foreach ($ResExchange as $ResExchangeLine) {
				$Reply .= "{$ResExchangeLine['Name']} x {$ResExchangeLine['ResourceAmount']}\n";
				$TotalGold += $ResExchangeLine['ResourceAmount'] * $ResExchangeLine['Cost'];
			}
			foreach ($ItemExchange as $ItemExchangeLine) {
				$Reply .= "{$ItemExchangeLine['Name']} x {$ItemExchangeLine['ItemAmount']}\n";
				$TotalGold += $ItemExchangeLine['ItemAmount'] * $ItemExchangeLine['Cost'];
			}
			$Reply .= "---------------------------\n";
			$Reply .= "Эквивалент в золоте: {$TotalGold}\n";
			$Reply .= "Информация об этом обмене: /exchange id {$ExchangeID}";

			return $Reply;
		}
		else {
			return "Этот обмен уже сохранен";
		}
	}

	private function ParseMonster() {
		$Lines = explode("\n", $this->Message['text']);
		foreach ($Lines as $Line) {
			if (mb_strpos($Line, "/fight_") !== false) {
				$Line = $this->RemoveEmoji($Line);
				$FightID = mb_substr($Line, mb_strpos($Line, "/fight_") + 7);
				$ID = md5('CW' . $FightID . 'KA');
				$MonsterString = mb_substr($Line, 0, mb_strpos($Line, "/fight_"));

				preg_match_all('/^.*?встретил\s?(.*?)\s?\((\d+)(.*)\)(.*)$/', $Line, $Matches, PREG_SET_ORDER, 0);

				$Monster = $this->DB->getRow("SELECT Name, NameInfinitive, Level, RaidBoss, Source FROM MonstersList WHERE Name = '{$Matches[0][1]}';");
				$Message = '';
				if (!empty($Monster)) {
					if (($Monster['Source'] == self::MonsterSourceForest) || ($Monster['Source'] == self::MonsterSourceCoast)) {
						$SenderCastle = $this->DB->getOne("SELECT Castle FROM Users WHERE TelegramID = {$this->Message['from']['id']};");
						$Message .= $this->Castles[$SenderCastle]['icon'];
						$Message .= "\n";
					}
					elseif ($Monster['Source'] == self::MonsterSourceWasteland) {
						$Message .= $this->Castles['twilight']['icon'];
						$Message .= $this->Castles['mint']['icon'];
						$Message .= "\n";
					}

					if ($Monster['RaidBoss']) {
						$Message .= "🔱{$Monster['NameInfinitive']} ({$Matches[0][2]} ур)\n/fight_{$FightID}";
						//$this->SendMessage($Message, $this->LowLevelMonstersGroup, false, -1, '{"inline_keyboard":[[{"text":"Беру монстра","callback_data":"' . $ID . '"},{"text":"Бой с монстром","switch_inline_query":"' . $ID . '"}]]}');
						//$this->SendMessage("/twink_rb " . $Line, $this->SoldiersGroup, false, -1);
					}
					elseif ($Matches[0][2] >= $Monster['Level']) {
						$Message .= "{$Monster['NameInfinitive']} ({$Matches[0][2]} ур)";
						//$this->SendMessage($Message, $this->LowLevelMonstersGroup, false, -1, '{"inline_keyboard":[[{"text":"Беру монстра","callback_data":"' . $ID . '"},{"text":"Бой с монстром","switch_inline_query":"' . $ID . '"}]]}');
					}
					else {
						$Message .= "{$Monster['NameInfinitive']} ({$Matches[0][2]} ур)";
						//$this->SendMessage($Message, $this->LowLevelMonstersGroup, false, -1, '{"inline_keyboard":[[{"text":"Беру монстра","callback_data":"' . $ID . '"},{"text":"Бой с монстром","switch_inline_query":"' . $ID . '"}]]}');
					}
				}
				else {
					$Message = $MonsterString;
					//$this->SendMessage($Message, $this->LowLevelMonstersGroup, false, -1, '{"inline_keyboard":[[{"text":"Бой с монстром","switch_inline_query":"' . $ID . '"}]]}');
				}

				$this->DB->insertRow(['ID' => $ID, 'FightID' => $FightID, 'Monster' => $MonsterString, 'MessageText' => $Message], 'Monsters');
			}
		}
	}

	private function UpdateLastActivity() {
		$this->DB->query("INSERT INTO UsersActivity (TelegramID, LastMessageTime) VALUES ({$this->Message['from']['id']}, CURRENT_TIMESTAMP) ON DUPLICATE KEY UPDATE LastMessageTime = CURRENT_TIMESTAMP;");
	}

	private function UpdateProfile($Profile) {
		$TelegramUsername = isset($this->Message['from']['username']) ? $this->Message['from']['username'] : '';

		$SQL = "INSERT INTO Users (TelegramID, TelegramUsername, Castle, CharName, CharLevel, CharClass, Attack, Defense, Exp, Stamina, ItemType1, ItemType2, ItemType3, ItemType4, ItemType5, ItemType6, ItemType7, Gold, Gem, Stock)";
		$SQL .= " VALUES ({$this->Message['from']['id']}, '{$TelegramUsername}', '{$Profile['Castle']}', '{$Profile['Name']}', {$Profile['CharLevel']}, {$Profile['CharClass']}, {$Profile['Attack']}, {$Profile['Defense']}, {$Profile['Exp']}, {$Profile['Stamina']}, {$Profile['Armor'][1]}, {$Profile['Armor'][2]}, {$Profile['Armor'][3]}, {$Profile['Armor'][4]}, {$Profile['Armor'][5]}, {$Profile['Armor'][6]}, {$Profile['Armor'][7]}, {$Profile['Gold']}, {$Profile['Gem']}, {$Profile['Stock']})";
		$SQL .= " ON DUPLICATE KEY UPDATE ";
		$SQL .= !empty($TelegramUsername) ? " TelegramUsername = '{$TelegramUsername}'," : "";
		$SQL .= " Castle = '{$Profile['Castle']}',";
		$SQL .= " CharName = '{$Profile['Name']}',";
		$SQL .= " CharLevel = {$Profile['CharLevel']},";
		$SQL .= " CharClass = {$Profile['CharClass']},";
		$SQL .= " Attack = {$Profile['Attack']},";
		$SQL .= " Defense = {$Profile['Defense']},";
		$SQL .= " Exp = {$Profile['Exp']},";
		$SQL .= " Stamina = {$Profile['Stamina']},";
		$SQL .= $Profile['Armor'][1] ? " ItemType1 = {$Profile['Armor'][1]}," : "";
		$SQL .= $Profile['Armor'][2] ? " ItemType2 = {$Profile['Armor'][2]}," : "";
		$SQL .= $Profile['Armor'][3] ? " ItemType3 = {$Profile['Armor'][3]}," : "";
		$SQL .= $Profile['Armor'][4] ? " ItemType4 = {$Profile['Armor'][4]}," : "";
		$SQL .= $Profile['Armor'][5] ? " ItemType5 = {$Profile['Armor'][5]}," : "";
		$SQL .= $Profile['Armor'][6] ? " ItemType6 = {$Profile['Armor'][6]}," : "";
		$SQL .= $Profile['Armor'][7] ? " ItemType7 = {$Profile['Armor'][7]}," : "";
		$SQL .= " Gold = {$Profile['Gold']},";
		$SQL .= " Gem = {$Profile['Gem']},";
		$SQL .= $Profile['Stock'] ? " Stock = {$Profile['Stock']}," : "";
		$SQL .= " Active = 1,";
		$SQL .= " Updated = CURRENT_TIMESTAMP;";

		if ($this->DB->query($SQL)) {
			if ($this->isPrivateMessage()) {
				$this->SendMessage("Спасибо! Профиль обновлен.");
			}
		}
		else {
			if ($this->isPrivateMessage()) {
				$this->SendMessage("Что-то пошло не так :(");
			}
		}
	}

	private function UserHasBots() {
		return $this->DB->getOne("SELECT EXISTS(SELECT * FROM Users WHERE OwnerID = {$this->Message['from']['id']} AND SquadID = 1 AND TGBot = 1);");
	}

	private function UserHasTwinks() {
		return $this->DB->getOne("SELECT EXISTS(SELECT * FROM Users WHERE OwnerID = {$this->Message['from']['id']} AND SquadID = 1);");
	}

	private function RemoveEmoji($text) {
		return preg_replace('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $text);
	}

	private function RequestProcessed() {
		return $this->DB->getOne("SELECT EXISTS(SELECT * FROM TelegramRequests WHERE UpdateID = {$this->Request['update_id']} AND Processed = 1);");
	}

	public function Run() {
		if ($this->isDebugActive()) {
			file_put_contents('requests_' . date('Y-m-d') . '.log', print_r($this->Request, true), FILE_APPEND | LOCK_EX);
		}
		if (!$this->RequestProcessed()) {
			$this->DB->insertRow(['UpdateID' => $this->Request['update_id'], 'ChatType' => $this->Message['chat']['type'], 'ChatID' => $this->Message['chat']['id']], 'TelegramRequests');
			$this->UpdateLastActivity();
			if (isset($this->Request['inline_query'])) {
				$this->ProceedInlineQuery();
			}
			elseif (isset($this->Request['callback_query'])) {
				$this->ProceedCallbackQuery();
			}
			elseif ($this->isCommand() && $this->isPrivateMessage()) {
				$Command = $this->GetCommand();
				$this->KeyboardID = 1;
				switch ($Command[0]) {
					case '/start':
						$this->SendMessage("Привет. Пришли мне форвард твоего /hero");
						break;
					case '/test_request':
						if ($this->isSuperUser()) {
							$this->SendMessage(print_r($this->Request, true));
						}
						break;
					case '/debug':
						if ($this->isSuperUser()) {
							$this->SendMessage($this->SwitchDebug());
						}
						break;
					case '/init_resources':
						if ($this->isSuperUser()) {
							$this->SendMessage($this->InitRes());
						}
						break;
					case '/init_items':
						if ($this->isSuperUser()) {
							$this->SendMessage($this->InitItems());
						}
						break;
					case '/donate':
						if ($this->isSuperUser()) {
							$this->Donate();
						}
						break;
					case '/stock_report':
						if ($this->isSuperUser()) {
							$this->SendMessage($this->StockReportAll());
						}
						break;
					case '/stock':
						if ($this->UserHasTwinks()) {
							if (isset($Command[1])) {
								$this->SendMessage($this->StockReport($Command[1]));
							}
							else {
								$this->SendMessage($this->StockReport());
							}
						}
						break;
					case '/gold':
						if ($this->isSuperUser()) {
							$this->SendMessage($this->DB->getOne("SELECT SUM(Gold) FROM Users WHERE TGBot = 1"));
						}
						break;
					case '/level_up':
						if (in_array(intval(date('H')), [0, 4, 8, 12, 16, 20]) && (intval(date('i')) < 6)) {
							$this->SendMessage("/hero_short", 0, true, 300);
						}
						else {
							$this->SendMessage("/hero_short");
						}
						break;
					case '/exchange':
						if ($this->isAdmin() && isset($Command[1])) {
							if ($Command[1] == 'id') {
								$this->SendMessage($this->GetExchangeByID(intval($Command[2])));
							}
							elseif (($Command[1] == 'user') && isset($Command[2])) {
								unset($Command[0]);
								unset($Command[1]);
								$this->SendMessage($this->GetExchangeByUser(implode(" ", $Command)));
							}
							elseif ($Command[1] == 'week') {
								$this->SendMessage($this->GetExchangeByWeek());
							}
						}
						break;
					case '/squad':
						if ($this->isSuperUser() && isset($Command[1]) && is_numeric($Command[1])) {
							$this->DB->updateRow(['ParamValue' => $Command[1]], 'Parameters', 'ParamName', 'squad');
							$this->SendMessage("ID отряда изменен на {$Command[1]}");
						}
						break;
					case '/squad_add':
						if ($this->isAdmin() && isset($Command[1])) {
							$this->SquadAdd($Command[1]);
						}
						else {
							$this->SendMessage("Пожалуй, нет");
						}
						break;
					case '/squad_remove':
						if ($this->isAdmin() && isset($Command[1])) {
							$this->SquadRemove($Command[1]);
						}
						else {
							$this->SendMessage("Пожалуй, нет");
						}
						break;
					case '/msg':
						if ($this->isSuperUser() && isset($Command[1])) {
							unset($Command[0]);
							$Target = $Command[1];
							unset($Command[1]);
							$this->SendMessage(implode(" ", $Command), $Target, false);
						}
						break;
					case '/profile':
						if ($this->isAdmin() && isset($Command[1])) {
							unset($Command[0]);
							$this->SendMessage($this->GetProfileByName(implode(" ", $Command)));
						}
						break;
					case '/m':
						//$this->SendAPIRequest("deleteMessage?chat_id={$this->Message['chat']['id']}&message_id={$this->Message['message_id']}");
						$this->SendMessage("https://t.me/ChatWarsMarket");
						break;
					case '/twink':
						if (isset($Command[1])) {
							if (preg_match('/^[a-f0-9]{32}$/', $Command[1])) {
								if ($this->isUserKnown($this->Message['from']['id'])) {
									$Player = $this->DB->getRow("SELECT TelegramUsername, TelegramID, SquadID FROM Users WHERE TelegramIDHash = '{$Command[1]}';");
									$this->DB->updateRow(['OwnerID' => $Player['TelegramID'], 'SquadID' => $Player['SquadID'], 'Twink' => 1], 'Users', 'TelegramID', $this->Message['from']['id']);
									$this->SendMessage("Твинк привязан к @{$Player['TelegramUsername']}");
								}
								else {
									$this->SendMessage("Сначала пришли мне форвард\n<pre>/hero</pre>");
								}
							}
							else {
								$this->SendMessage("Неверная команда");
							}
						}
						else {
							$TelegramIDHash = md5("Kick{$this->Message['from']['id']}asS");
							$this->DB->updateRow(['TelegramIDHash' => $TelegramIDHash], 'Users', 'TelegramID', $this->Message['from']['id']);
							$this->SendMessage("Чтобы привязать твинка, отправь с него команду\n<pre>/twink {$TelegramIDHash}</pre>");
						}
						break;
					case '/craft_queue':
						if (isset($Command[1])) {
							unset($Command[0]);
							$this->GetQueue(implode(" ", $Command));
						}
						else {
							$this->SendMessage("Нет предмета для очереди");
						}
						break;
					case '/twink_list':
						if ($this->isAdmin() && isset($Command[1])) {
							$this->GetTwinks($Command[1]);
						}
						elseif ($this->UserHasTwinks()) {
							$this->GetTwinks();
						}
						else {
							$this->SendMessage("Пожалуй, нет");
						}
						break;
					case '/twink_forest':
						$this->SendCommandToTwink('forest');
						break;
					case '/twink_forest_all':
						$this->SendCommandToTwink('forest_all');
						break;
					case '/twink_cave':
						$this->SendCommandToTwink('cave');
						break;
					case '/twink_cave_all':
						$this->SendCommandToTwink('cave_all');
						break;
					case '/twink_seaside':
						$this->SendCommandToTwink('seaside');
						break;
					case '/twink_seaside_all':
						$this->SendCommandToTwink('seaside_all');
						break;
					case '/twink_vote':
						$this->SendCommandToTwink('vote');
						break;
					case '/twink_delete':
						if ($this->UserHasTwinks() && isset($Command[1])) {
							$this->DeleteTwink($Command[1]);
						}
						else {
							$this->SendMessage("Пожалуй, нет");
						}
						break;
					case '/twink_donate':
						$this->SendCommandToTwink('donate');
						break;
					case '/twink_stock':
						if ($this->isSuperUser() && isset($Command[1])) {
							$this->SendCommandToTwink('stock', $Command[1]);
						}
						else {
							$this->SendCommandToTwink('stock');
						}
						break;
					case '/twink_build_stat':
						if ($this->isSuperUser() && isset($Command[1])) {
							$this->GetTwinkBuildStat($Command[1]);
						}
						else {
							$this->GetTwinkBuildStat();
						}
						break;
					case '/twink_defense':
						if (isset($Command[1]) && isset($Command[2]) && ($this->isSuperUser() || $this->isAdmin())) {
							list($Castle, $Target) = explode("@", $Command[1]);
							if (in_array($Target, $this->Targets) && in_array($Castle, array_keys($this->Castles))) {
								$this->SendCommandToTwink('defense', $Command[2], $Command[1]);
							}
							else {
								$this->SendMessage("Что-то тут не так");
							}
						}
						elseif (isset($Command[1]) && $this->UserHasBots()) {
							list($Castle, $Target) = explode("@", $Command[1]);
							if (in_array($Target, $this->Targets) && in_array($Castle, array_keys($this->Castles))) {
								$this->SendCommandToTwink('defense', '', $Command[1]);
							}
							else {
								$this->SendMessage("Что-то тут не так");
							}
						}
						else {
							$this->SendMessage("Пожалуй, нет");
						}
						break;
					case '/twink_attack':
						if (isset($Command[1]) && isset($Command[2]) && ($this->isSuperUser() || $this->isAdmin())) {
							list($Castle, $Target) = explode("@", $Command[1]);
							if (in_array($Target, $this->Targets) && in_array($Castle, array_keys($this->Castles))) {
								$this->SendCommandToTwink('attack', $Command[2], $Command[1]);
							}
							else {
								$this->SendMessage("Что-то тут не так");
							}
						}
						elseif (isset($Command[1]) && $this->UserHasBots()) {
							list($Castle, $Target) = explode("@", $Command[1]);
							if (in_array($Target, $this->Targets) && in_array($Castle, array_keys($this->Castles))) {
								$this->SendCommandToTwink('attack', '', $Command[1]);
							}
							else {
								$this->SendMessage("Что-то тут не так");
							}
						}
						else {
							$this->SendMessage("Пожалуй, нет");
						}
						break;
					case '/twink_build':
						if (isset($Command[1]) && in_array($Command[1], $this->Buildings) && isset($Command[2]) && $this->isSuperUser()) {
							$this->SendCommandToTwink('build', $Command[2], $Command[1]);
						}
						elseif (isset($Command[1]) && in_array($Command[1], $this->Buildings) && $this->UserHasBots()) {
							$this->SendCommandToTwink('build', '', $Command[1]);
						}
						else {
							$this->SendMessage("Пожалуй, нет");
						}
						break;
					case '/twink_hero':
						if ($this->isSuperUser() && isset($Command[1])) {
							$this->SendCommandToTwink('hero', $Command[1]);
						}
						elseif ($this->UserHasBots()) {
							$this->SendCommandToTwink('hero');
						}
						else {
							$this->SendMessage("Пожалуй, нет");
						}
						break;
					case '/twink_hero_short':
						if ($this->isSuperUser() && isset($Command[1])) {
							$this->SendCommandToTwink('hero_short', $Command[1]);
						}
						elseif ($this->UserHasBots()) {
							$this->SendCommandToTwink('hero_short');
						}
						else {
							$this->SendMessage("Пожалуй, нет");
						}
						break;
					case '/twink_report':
						if ($this->isSuperUser() && isset($Command[1])) {
							$this->SendCommandToTwink('report', $Command[1]);
						}
						elseif ($this->UserHasBots()) {
							$this->SendCommandToTwink('report');
						}
						else {
							$this->SendMessage("Пожалуй, нет");
						}
						break;
					case '/twink_stock_request':
						if ($this->isSuperUser() && isset($Command[1])) {
							$this->SendCommandToTwink('stock_request', $Command[1]);
						}
						else {
							$this->SendCommandToTwink('stock_request');
						}
						break;
					case '/twink_command':
						if ($this->isSuperUser() && isset($Command[1])) {
							unset($Command[0]);
							$this->SendCommandToTwink('command', '', implode(" ", $Command));
						}
						else {
							$this->SendMessage("Пожалуй, нет");
						}
						break;
					case '/twink_rb':
						if (isset($Command[1])) {
							unset($Command[0]);
							$this->SendCommandToTwink('rb', '', implode(" ", $Command));
						}
						else {
							$this->SendMessage("Нет описания рейд босса");
						}
						break;
					case '/me':
						$this->SendMessage($this->GetProfileByID($this->Message['from']['id']));
						break;
					case '/help':
						$this->Help();
						break;
					case '/trade':
						$ResStock = $this->DB->getAll("SELECT us.ResourceID, us.Amount, r.Name FROM UsersStock AS us LEFT JOIN Resources AS r ON r.ID = us.ResourceID WHERE us.TelegramID = {$this->Message['from']['id']} AND us.ResourceID < 1101 ORDER BY r.Name;");
						if (count($ResStock)) {
							$Delay = 0;
							$ExchangeContent = "Твои ресурсы:\n";
							foreach ($ResStock as $Recource) {
								$ExchangeContent .= "{$Recource['Name']} x {$Recource['Amount']}\n";
								$Delay += 3;
								$this->SendMessage("/add_{$Recource['ResourceID']} {$Recource['Amount']}", 0, true, $Delay);
							}
							$ItemsStock = $this->DB->getAll("SELECT us.ResourceID, us.Amount, i.Name FROM UsersStock AS us LEFT JOIN Items AS i ON i.ID + 1101 = us.ResourceID WHERE us.TelegramID = {$this->Message['from']['id']} AND us.ResourceID > 1101 ORDER BY i.Name;");
							if (count($ItemsStock)) {
								$ExchangeContent .= "\nТвои шмотки:\n";
								foreach ($ItemsStock as $Recource) {
									$ExchangeContent .= "{$Recource['Name']} x {$Recource['Amount']}\n";
									$Delay += 3;
									$this->SendMessage("/add_{$Recource['ResourceID']} {$Recource['Amount']}", 0, true, $Delay);
								}
							}
							$this->SendMessage($ExchangeContent);
							$this->SendMessage("Для сбора этих ресов в трейд перешли следующие команды по одной трейдботу");
							$this->SendMessage("https://t.me/ChatWarsMarket", 0, true, $Delay);
						}
						else {
							$this->SendMessage("Сначала пришли мне форвард /start от @ChatWarsTradeBot");
						}
						break;
					case '/trade_craft':
						$Stock = $this->DB->getAll("SELECT us.ResourceID, us.Amount, r.Name FROM UsersStock AS us LEFT JOIN Resources AS r ON r.ID = us.ResourceID WHERE us.TelegramID = {$this->Message['from']['id']} AND r.NeededForCraft = 1 ORDER BY r.Name;");
						if (count($Stock)) {
							$Delay = 0;
							$ExchangeContent = "Ресурсы, используемые в крафте:\n";
							foreach ($Stock as $Recource) {
								$ExchangeContent .= "{$Recource['Name']} x {$Recource['Amount']}\n";
								$Delay += 3;
								$this->SendMessage("/add_{$Recource['ResourceID']} {$Recource['Amount']}", 0, true, $Delay);
							}
							$this->SendMessage($ExchangeContent);
							$this->SendMessage("Для сбора этих ресов в трейд перешли следующие команды по одной трейдботу");
							$this->SendMessage("https://t.me/ChatWarsMarket", 0, true, $Delay);
						}
						else {
							$this->SendMessage("Сначала пришли мне форвард /start от @ChatWarsTradeBot");
						}
						break;
					case '/craft':
						if (isset($Command[1]) && isset($Command[2])) {
							$Delay = 0;
							for ($i = 0; $i < intval($Command[2]); $i++) {
								$Delay += 3;
								$this->SendMessage("/command /craft_{$Command[1]}", 0, true, $Delay);
							}
						}
						break;
					case '👤 Профиль':
						$this->SendMessage($this->GetProfileByID($this->Message['from']['id']));
						break;
					case '📊 Статистика':
						if ($this->isAdmin()) {
							$this->KeyboardID = 2;
							$this->SendMessage("Выбери нужный пункт");
						}
						break;
					case '📦 Ресурсы':
						if ($this->isAdmin()) {
							$this->KeyboardID = 3;
							$this->SendMessage("Выбери нужный пункт");
						}
						break;
					case '🥇 Топы':
						$this->KeyboardID = 4;
						$this->SendMessage("Выбери нужный пункт");
						break;
					case '📦 Собранные':
						if ($this->isAdmin()) {
							$this->SendMessage($this->GetExchangeStat());
						}
						break;
					case '📦 Собранные за неделю':
						if ($this->isAdmin()) {
							$this->SendMessage($this->GetExchangeStat('WEEK'));
						}
						break;
					case '📊 Общая':
						if ($this->isAdmin()) {
							$this->GetSquadStat();
						}
						break;
					case '📊 Основа':
						if ($this->isAdmin()) {
							$this->GetSquadStat('MAIN');
						}
						break;
					case '📊 Твинки':
						if ($this->isAdmin()) {
							$this->GetSquadStat('TWINK');
						}
						break;
					case '📦 Общие':
						if ($this->isAdmin()) {
							$this->GetSquadStock();
						}
						break;
					case '📦 Основа':
						if ($this->isAdmin()) {
							$this->GetSquadStock('MAIN');
						}
						break;
					case '📦 Твинки':
						if ($this->isAdmin()) {
							$this->GetSquadStock('TWINK');
						}
						break;
					case '⚒ Крафт':
						$this->SendMessage($this->GetCraft());
						break;
					case '📋 Все отчеты':
						if ($this->isAdmin()) {
							$this->SendMessage($this->GetReports());
						}
						break;
					case '📋 Отчеты':
						$this->SendMessage($this->GetReportsTop());
						break;
					case '⚔️ Атака':
						$this->SendMessage($this->GetTop('Attack'));
						break;
					case '🛡 Защита':
						$this->SendMessage($this->GetTop('Defense'));
						break;
					case '🔥 Опыт':
						$this->SendMessage($this->GetTop('Exp'));
						break;
				}
			}
			elseif ($this->isCommand() && !$this->isPrivateMessage()) {
				if ($this->Message['text'] == '/m') {
					$this->SendMessage("https://t.me/ChatWarsMarket", $this->Message['chat']['id'], false, $Delay);
				}
			}
			elseif ($this->isForwardFromCW()) {
				if (mb_strpos($this->Message['text'], "Твои результаты в бою") !== false) {
					$this->ProceedReport();
				}
				elseif ((mb_strpos($this->Message['text'], "Получено от") !== false) && $this->isAdmin()) {
					$this->SendMessage($this->ParseExchange());
				}
				elseif ((mb_strpos($this->Message['text'], "/fight_") !== false) && $this->isPrivateMessage()) {
					$this->ParseMonster();
				}
				elseif (mb_strpos($this->Message['text'], "Содержимое склада") !== false) {
					if ($this->isPrivateMessage()) {
						$this->SendMessage("Отправь /start @ChatWarsTradeBot и форвардни мне результат");
					}
				}
				elseif ($this->isValidHeroProfile()) {
					if ((time() - $this->Message['forward_date']) > 300) {
						if ($this->isPrivateMessage()) {
							$this->SendMessage("Этому сообщению больше 5 минут. Давай посвежее ;)");
						}
					}
					else {
						$this->UpdateProfile($this->ParseProfile());
					}
				}
				elseif ((mb_strpos($this->Message['text'], "Битва семи замков через") !== false) && $this->isValidShortHeroProfile()) {
					if ((time() - $this->Message['forward_date']) > 300) {
						if ($this->isPrivateMessage()) {
							$this->SendMessage("Этому сообщению больше 5 минут. Давай посвежее ;)");
						}
					}
					else {
						$this->UpdateProfile($this->ParseShortProfile());
					}
				}
				elseif (isset($this->Message['sticker']) && ($this->Message['sticker']['emoji'] == "🌟") && $this->isPrivateMessage()) {
					if (in_array(intval(date('H')), [0, 4, 8, 12, 16, 20]) && (intval(date('i')) < 6)) {
						$this->SendMessage("/hero_short", 0, true, 300);
					}
					else {
						$this->SendMessage("/hero_short");
					}
				}
				else {
					if ($this->isPrivateMessage()) {
						$this->SendMessage("Похоже, что ты присылаешь что-то не то. Пришли мне форвард твоего /hero");
					}
				}
			}
			elseif ($this->isForwardFromCWTradeBot() && $this->isPrivateMessage()) {
				if (mb_strpos($this->Message['text'], "Твой склад с материалами") !== false) {
					$this->SendMessage($this->ParseStockTrade());
				}
			}
			elseif (isset($this->Message['text']) && (mb_strpos($this->Message['text'], "Не могу разобрать следующий текст") !== false)) {
				$OwnerID = $this->DB->getOne("SELECT OwnerID FROM Users WHERE TelegramID = {$this->Message['from']['id']};");
				if ($OwnerID) {
					$this->SendAPIRequest("forwardMessage?chat_id={$OwnerID}&from_chat_id={$this->Message['chat']['id']}&message_id={$this->Message['message_id']}");
				}
			}
			elseif (isset($this->Message['text']) && mb_ereg("/c(\d{2})_(\d{6,9})", $this->Message['text'], $matches)) {
				if ($this->DB->getOne("SELECT EXISTS(SELECT * FROM Users WHERE TelegramID = {$matches[2]} AND OwnerID = {$this->Message['from']['id']});")) {
					$this->SendMessage("/c" . $matches[1], $matches[2]);
				}
			}
			elseif (isset($this->Message['text']) &&
				(mb_strpos($this->Message['text'], "Один из храбрых воинов встретил") !== false) &&
				(mb_strpos($this->Message['text'], "/fight_") !== false) &&
				(mb_strpos($this->Message['text'], "Копируем и тыкаем на кнопку ИЛИ пересылаем в CW") !== false)) {
				$this->ParseRB();
			}
			$this->DB->updateRow(['Processed' => 1], 'TelegramRequests', 'UpdateID', $this->Request['update_id']);
		}
	}

}

?>