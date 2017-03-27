chatwarsbot = 'user#id265204902'
admin = 'user#id85613593'
--redstatbot = 'user#id296332261'
redstatbot = 'user#0'
chatwarsbot_id = 265204902
admin_id = 85613593
--redstatbot_id = 296332261
redstatbot_id = 0
attack_target = ''
captcha_text = ''

flag = { red = '🇮🇲', blue = '🇪🇺', yellow = '🇻🇦', white = '🇨🇾', black = '🇬🇵' }

function on_msg_receive (msg)
	if msg.out then
		return
	end

	if (msg.from.peer_id == chatwarsbot_id) then
		sender = chatwarsbot
	elseif (msg.from.peer_id == admin_id) then
		sender = admin
	elseif (msg.from.peer_id == redstatbot_id) then
		sender = redstatbot
	else
		sender = 'guest'
	end

	if ((sender == redstatbot) and (msg.text ~= nil)) then
		if (string.find(msg.text, flag['blue'])) then
			attack_target = 'blue'
			os.execute("/home/`whoami`/tg/scripts/automate2 attack")
		elseif (string.find(msg.text, flag['yellow'])) then
			attack_target = 'yellow'
			os.execute("/home/`whoami`/tg/scripts/automate2 attack")
		elseif (string.find(msg.text, flag['white'])) then
			attack_target = 'white'
			os.execute("/home/`whoami`/tg/scripts/automate2 attack")
		elseif (string.find(msg.text, flag['black'])) then
			attack_target = 'black'
			os.execute("/home/`whoami`/tg/scripts/automate2 attack")
		end
	elseif ((sender == admin) and (msg.text ~= nil)) then
		if (string.find(msg.text, '/bot_status')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 status")
		elseif (valid_captcha_answer(msg.text) and (captcha_text ~= '')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 captcha_reply '" .. msg.text .. "_" .. captcha_text .. "'")
			captcha_text = ''
		end
	elseif ((sender ~= 'guest') and (msg.text ~= nil)) then
		if (string.find(msg.text, '/go')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 caravan_go")
		elseif (string.find(msg.text, 'Храбрый защитник! Где будем держать оборону?')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 defense_castle")
		elseif (string.find(msg.text, 'выбери точку атаки и точку защиты')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 arena_a_d")
		elseif (string.find(msg.text, 'Выбери место удара')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 arena_a")
		elseif (string.find(msg.text, 'Осталось определиться с защитой')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 arena_d")
		elseif (string.find(msg.text, 'Новый уровень')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 level_up")
		elseif (string.find(msg.text, 'какую характеристику ты хочешь улучшить')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 increase_stat")
		elseif (string.find(msg.text, 'Таблица победителей обновлена')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 arena_finished")
		elseif (string.find(msg.text, 'Пока соперник не найден, ты можешь в любой момент отменить поиск поединка')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 arena_searching")
		elseif (string.find(msg.text, 'Ты отправился искать приключения в пещеру')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 cave_active")
		elseif (string.find(msg.text, 'Ты отправился искать приключения в лес')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 forest_active")
		elseif (string.find(msg.text, 'Поиск отменен')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 search_cancelled")
		elseif (string.find(msg.text, 'Состояние') and string.find(msg.text, 'Отдых')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 status_rest")
		elseif (string.find(msg.text, 'Состояние') and string.find(msg.text, 'Защита')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 status_defense")
		elseif (string.find(msg.text, 'Смелый вояка! Выбирай врага') and (attack_target ~= '')) then
			os.execute("/home/`whoami`/tg/scripts/automate2 attack_" .. attack_target)
			attack_target = ''
		elseif (string.find(msg.text, 'На выходе из замка охрана никого не пропускает: в окресностях эпидемия мандариновой лихорадки')) then
			captcha_text = captcha(msg.text)
			print("/home/`whoami`/tg/scripts/automate2 captcha '" .. captcha_text .. "'")
			os.execute("/home/`whoami`/tg/scripts/automate2 captcha '" .. captcha_text .. "'")
		end
	end
end

function captcha(msg)
	if msg:find('меню') then
		local start_position = msg:find("Ты-то помнишь", 1, true)
		local substring = msg:sub(start_position + string.len('Ты-то помнишь, '))
		local end_position = substring:find(',', 1, true) - 1
		return substring:sub(1, end_position)
	elseif msg:find('животное') then
		local start_position = msg:find('гоняясь за', 1, true)
		local substring = msg:sub(start_position + string.len('гоняясь за '))
		local end_position = substring:find('.', 1, true) - 1
		return substring:sub(1, end_position)
	end
end

function valid_captcha_answer(text)
	start_position = string.find(text, "/c%d")
	if (start_position == 1) then
		return true
	else
		return false
	end
end

function vardump(value, depth, key)
	local linePrefix = ""
	local spaces = ""

	if key ~= nil then
		linePrefix = "["..key.."] = "
	end

	if depth == nil then
		depth = 0
	else
		depth = depth + 1
		for i=1, depth do
			spaces = spaces .. "  "
		end
	end

	if type(value) == 'table' then
		mTable = getmetatable(value)
		if mTable == nil then
			print(spaces .. linePrefix .."(table) ")
		else
			print(spaces .. "(metatable) ")
			value = mTable
		end
		for tableKey, tableValue in pairs(value) do
			vardump(tableValue, depth, tableKey)
		end
	elseif type(value) == 'function' or type(value) == 'thread' or type(value) == 'userdata' or value == nil then
		print(spaces .. tostring(value))
	else
		print(spaces .. linePrefix .. "(" .. type(value) .. ") " .. tostring(value))
	end
end

function on_our_id (id) 
end
   
function on_secret_chat_created (peer)
end
   
function on_user_update (user)
end
   
function on_chat_update(user)
end
   
function on_get_difference_end ()
end
  
function on_binlog_replay_end ()
end
