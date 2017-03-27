#!/bin/bash

# Оригинал скрипта взят из репозитория https://github.com/Lord-Protector/ChatWarsAuto.git (на сегодняшний день удаленного)

# Обработка Ctrl+C
trap finish INT

echo "Скрипт инициализирован."
# Переход в нужную директорию
cd /home/`whoami`

# Обновляем источники
echo "Обновление источников..."
bash -c "sudo apt-get update 1> /dev/null"
echo -e "\e[32mИсточники обновлены.\e[0m"

# Обновляем систему
echo "Обновление системы..."
bash -c "sudo apt-get upgrade -y 1> /dev/null"
echo -e "\e[32mСистема обновлена.\e[0m"

# Устанавливаем зависимости и git
echo "Установка зависимостей..."
bash -c "sudo apt-get install -y libreadline-dev libconfig-dev libssl-dev lua5.2 liblua5.2-dev libevent-dev libjansson-dev libpython-dev make git php 1> /dev/null"
echo -e "\e[32mЗависимости и git установлены.\e[0m"

# Загружаем telegram-cli
echo "Начата загрузка telegram-cli..."
{
	git clone --recursive https://github.com/vysheng/tg.git
	git clone https://github.com/evgenyvolferts/cwbot.git tg/scripts
} &> /dev/null
echo -e "\e[32mЗагрузка завершена.\e[0m"
cd tg

# Сборка
echo "Начата сборка telegram-cli..."
{
	./configure
	make
} &> /dev/null
echo -e "\e[32mСборка завершена.\e[0m"

# Сохраняем текущие задачи
echo "Добавление задач по расписанию..."
crontab -l > currentjobs

# Добавляем новые задачи
echo "48	3,7,11,15,19,23	* * * `pwd`/tg/scripts/automate2 defense" >> currentjobs
echo "15	*/2				* * * `pwd`/tg/scripts/automate2 cave" >> currentjobs
echo "7		0,4,8,12,16,20	* * * `pwd`/tg/scripts/automate2 check_status" >> currentjobs
echo "#36	*				* * * `pwd`/tg/scripts/automate2 forest" >> currentjobs
echo "#*/2	*				* * * `pwd`/tg/scripts/automate2 arena" >> currentjobs
crontab currentjobs

# Удаляем временный файл
rm currentjobs
echo -e "\e[32mЗадачи в cron добавлены.\e[0m"

# Создание файла лога демона и назначение ему прав
sudo touch /var/log/telegramd.log
sudo chmod 666 /var/log/telegramd.log

# Создание systemd задачи
echo "Создание systemd-демона..."
{
	sudo sh -c "sudo echo -e '[Unit]\nDescription=Telegram CLI daemon\nWants=network.target\nAfter=network.target\n\n[Install]\nWantedBy=default.target\n\n[Service]\nType=simple\nUser=`whoami`\nExecStart=/home/`whoami`/tg/bin/telegram-cli --wait-dialog-list -v --disable-auto-accept --disable-readline --disable-colors --rsa-key=/home/`whoami`/tg/tg-server.pub --lua-script=/home/`whoami`/tg/scripts/go.lua --logname=/var/log/telegramd.log --tcp-port=7313 --daemonize\nKillSignal=SIGKILL\nKillMode=process\nRestart=on-failure' > /etc/systemd/system/telegram.service"
	bash -c "sudo systemctl daemon-reload"
	bash -c "sudo systemctl restart telegram"
	bash -c "sudo systemctl status telegram"
	bash -c "sudo systemctl enable telegram"
} &> /dev/null
echo -e "\e[32msystemd-демон создан.\e[0m"

# Инициализация с автовыходом
echo "Выполните вход в аккаунт!"
bin/telegram-cli -D -e 'quit'
