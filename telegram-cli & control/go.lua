chatwarsbot = 'user#id265204902'
chatwarsbot_id = 265204902
chatwarstradebot = 'user#id278525885'
chatwarstradebot_id = 278525885
admin = 'user#id85613593'
admin_id = 85613593
pomidorka = 'user#id331870319'
pomidorka_id = 331870319
captcha_text = ''
report_requested = false
hero_requested = false
hero_short_requested = false
stock_requested = false

function on_msg_receive (msg)
	if msg.out then
		return
	end
	
	if ((os.time() - msg.date) > 30) then
		return
	end

	if (msg.from.peer_id == chatwarsbot_id) then
		sender = chatwarsbot
	elseif (msg.from.peer_id == chatwarstradebot_id) then
		sender = chatwarstradebot
	elseif (msg.from.peer_id == admin_id) then
		sender = admin
	elseif (msg.from.peer_id == pomidorka_id) then
		sender = pomidorka
	else
		sender = 'guest'
	end
	
--	if (sender == admin) then
--		vardump(msg)
--	end

	if (((sender == admin) or (sender == pomidorka)) and (msg.text ~= nil)) then
		mark_read(sender, ok_cb, false)
		if (msg.text == '/bot_status') then
			os.execute("/home/`whoami`/tg/scripts/automate status")
		elseif (msg.text == '/hero_short') then
			send_msg(chatwarsbot, '🏅Герой', ok_cb, false)
			hero_short_requested = true
		elseif (msg.text == '/report') then
			os.execute("/home/`whoami`/tg/scripts/automate report_request")
			report_requested = true
		elseif (msg.text == '/hero') then
			os.execute("/home/`whoami`/tg/scripts/automate hero_request")
			hero_requested = true
		elseif (msg.text == '/stock_request') then
			stock_requested = true
			send_msg(chatwarstradebot, "/start", ok_cb, false)
		elseif (msg.text == '/defense') then
			os.execute("/home/`whoami`/tg/scripts/automate defense")
		elseif (msg.text == '/attack') then
			os.execute("/home/`whoami`/tg/scripts/automate attack")
		elseif (msg.text == '/forest') then
			os.execute("/home/`whoami`/tg/scripts/automate forest")
		elseif (msg.text == '/cave') then
			os.execute("/home/`whoami`/tg/scripts/automate cave")
		elseif (msg.text == '/seaside') then
			os.execute("/home/`whoami`/tg/scripts/automate seaside")
		elseif (msg.text == '/wood') then
			os.execute("/home/`whoami`/tg/scripts/automate wood")
		elseif (msg.text == '/mountain') then
			os.execute("/home/`whoami`/tg/scripts/automate mountain")
		elseif (msg.text == '/sea') then
			os.execute("/home/`whoami`/tg/scripts/automate sea")
		elseif (msg.text == '/blue') then
			os.execute("/home/`whoami`/tg/scripts/automate blue")
		elseif (msg.text == '/red') then
			os.execute("/home/`whoami`/tg/scripts/automate red")
		elseif (msg.text == '/black') then
			os.execute("/home/`whoami`/tg/scripts/automate black")
		elseif (msg.text == '/white') then
			os.execute("/home/`whoami`/tg/scripts/automate white")
		elseif (msg.text == '/yellow') then
			os.execute("/home/`whoami`/tg/scripts/automate yellow")
		elseif (msg.text == '/mint') then
			os.execute("/home/`whoami`/tg/scripts/automate mint")
		elseif (msg.text == '/twilight') then
			os.execute("/home/`whoami`/tg/scripts/automate twilight")
		elseif (valid_captcha_answer(msg.text) and (captcha_text ~= '')) then
			os.execute("/home/`whoami`/tg/scripts/automate captcha_reply '" .. msg.text .. "_" .. captcha_text .. "'")
			captcha_text = ''
		elseif (string.find(msg.text, "/donate")) then
			send_msg(chatwarsbot, msg.text, ok_cb, false)
		elseif (string.find(msg.text, "/build_")) then
			send_msg(chatwarsbot, msg.text, ok_cb, false)
		elseif (string.find(msg.text, "/vote_")) then
			send_msg(chatwarsbot, msg.text, ok_cb, false)
		elseif (string.find(msg.text, "/command")) then
			local command = msg.text:sub(string.len("/command "))
			send_msg(chatwarsbot, command, ok_cb, false)
		elseif (string.find(msg.text, "/add_")) then
			send_msg(chatwarstradebot, msg.text, ok_cb, false)
		end
	elseif ((sender == chatwarsbot) and (msg.text ~= nil)) then
		mark_read(chatwarsbot, ok_cb, false)
		if (string.find(msg.text, '/go')) then
			os.execute("/home/`whoami`/tg/scripts/automate caravan_go")
--		elseif (string.find(msg.text, 'Храбрый защитник! Где будем держать оборону?')) then
--			os.execute("/home/`whoami`/tg/scripts/automate defense_castle")
		elseif (string.find(msg.text, 'выбери точку атаки и точку защиты')) then
			os.execute("/home/`whoami`/tg/scripts/automate arena_a_d")
		elseif (string.find(msg.text, 'Выбери место удара')) then
			os.execute("/home/`whoami`/tg/scripts/automate arena_a")
		elseif (string.find(msg.text, 'Осталось определиться с защитой')) then
			os.execute("/home/`whoami`/tg/scripts/automate arena_d")
		elseif (string.find(msg.text, 'Новый уровень')) then
			os.execute("/home/`whoami`/tg/scripts/automate level_up")
		elseif (string.find(msg.text, 'какую характеристику ты хочешь улучшить')) then
			os.execute("/home/`whoami`/tg/scripts/automate increase_stat")
		elseif (string.find(msg.text, 'Таблица победителей обновлена')) then
			os.execute("/home/`whoami`/tg/scripts/automate arena_finished")
		elseif (string.find(msg.text, 'Пока соперник не найден, ты можешь в любой момент отменить поиск поединка')) then
			os.execute("/home/`whoami`/tg/scripts/automate arena_searching")
--		elseif (string.find(msg.text, 'Ты отправился искать приключения в пещеру')) then
--			os.execute("/home/`whoami`/tg/scripts/automate cave_active")
--		elseif (string.find(msg.text, 'Ты отправился искать приключения в лес')) then
--			os.execute("/home/`whoami`/tg/scripts/automate forest_active")
		elseif (string.find(msg.text, 'Доберешься до ближайшего через')) then
			os.execute("/home/`whoami`/tg/scripts/automate caravan_active")
		elseif (string.find(msg.text, 'Поиск отменен')) then
			os.execute("/home/`whoami`/tg/scripts/automate search_cancelled")
		elseif (string.find(msg.text, 'Твои результаты в бою') and (sender == chatwarsbot) and (report_requested == true)) then
			report_requested = false
			if (string.find(msg.text, 'Вы нашли:')) then
				fwd_msg(pomidorka, msg.id, ok_cb, false)
			end
		elseif (string.find(msg.text, '🎽Экипировка') and string.find(msg.text, '🎒Рюкзак') and string.find(msg.text, '📦Склад') and (hero_requested == true)) then
			hero_requested = false
			fwd_msg(pomidorka, msg.id, ok_cb, false)
		elseif (string.find(msg.text, 'Битва семи замков через') and string.find(msg.text, '🎽Экипировка') and string.find(msg.text, 'Состояние:') and (hero_short_requested == true)) then
			hero_short_requested = false
			fwd_msg(pomidorka, msg.id, ok_cb, false)
		elseif (string.find(msg.text, '/fight_')) then
			send_msg(chatwarsbot, fight_string(msg.text), ok_cb, false)
			fwd_msg(pomidorka, msg.id, ok_cb, false)
		elseif (string.find(msg.text, 'Состояние') and string.find(msg.text, 'Отдых')) then
			os.execute("/home/`whoami`/tg/scripts/automate status_rest")
		elseif (string.find(msg.text, 'Состояние') and string.find(msg.text, 'Защита')) then
			os.execute("/home/`whoami`/tg/scripts/automate status_defense")
		elseif (string.find(msg.text, 'На выходе из замка охрана никого не пропускает: в окресностях эпидемия мандариновой лихорадки')) then
			captcha_text = captcha(msg.text)
			print("/home/`whoami`/tg/scripts/automate captcha '" .. captcha_text .. "|||" .. msg.to.peer_id .. "'")
			os.execute("/home/`whoami`/tg/scripts/automate captcha '" .. captcha_text .. "|||" .. msg.to.peer_id .. "'")
		end
	elseif ((sender == chatwarsbot) and (msg.media.type ~= nil) and (msg.media.type == 'document')) then
		--os.execute("/home/`whoami`/tg/scripts/automate character")
		--send_msg(pomidorka, "/level_up", ok_cb, false)
		fwd_msg(pomidorka, msg.id, ok_cb, false)
	elseif ((sender == chatwarstradebot) and (msg.text ~= nil) and string.find(msg.text, 'Твой склад с материалами') and string.find(msg.text, 'Твое предложение:') and string.find(msg.text, '[пусто]') and (stock_requested == true)) then
		mark_read(chatwarstradebot, ok_cb, false)
		stock_requested = false
		fwd_msg(pomidorka, msg.id, ok_cb, false)
	end
end

function captcha(msg)
	if msg:find('меню') then
		local start_position = msg:find("Ты-то помнишь", 1, true)
		local substring = msg:sub(start_position + string.len('Ты-то помнишь, '))
		local end_position = substring:find(', что точно безопасно', 1, true) - 1
		return substring:sub(1, end_position)
	elseif msg:find('животное') then
		local start_position = msg:find('гоняясь за', 1, true)
		local substring = msg:sub(start_position + string.len('гоняясь за '))
		local end_position = substring:find('. У этой твари', 1, true) - 1
		return substring:sub(1, end_position)
	end
end

function fight_string(msg)
	local start_position = msg:find("/fight", 1, true)
	return msg:sub(start_position)
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
