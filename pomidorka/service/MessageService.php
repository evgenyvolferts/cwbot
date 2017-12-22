<?php

//// Создаем дочерний процесс
//$child_pid = pcntl_fork();
//
//if ($child_pid) {
//	// Выходим из родительского процесса, привязанного к консоли...
//	exit(0);
//}
//
////	Делаем основным процессом дочерний...
//posix_setsid();

//	Включаем тики, в противном случае скрипт просто повисает и не реагирует на внешние раздражители...
declare(ticks = 1);

//	Здесь я подключаю всякую нужную штуку...
include('/var/www/pomidorka/include/Db.php');
include('/var/www/pomidorka/service/Daemon.php');
include('/var/www/pomidorka/service/MessageClass.php');

//	Класс изображающий полезную нагрузку...
$Message = new MessageClass();

//	Именно эта функция делает всякую полезую нам нагрузку, которую мы хотим демонизировать...
//	Если нам нужны какие-нибудь классы не забываем упомянуть их тут в противном случае простоо не получите к ним доступ...
$func = function() use ($Message) {

	// Тут живёт всякая полезная нагрука...
	$Message->Send();

	return true;
};

//	Собственно создаём демона, соответственно говорим ему куда записывать свой pid...
$daemon = new Daemon('/tmp/TGMessagesDaemon.pid');

//	Закрываем порочные связи со стандартным вводом-выводом...
fclose(STDIN);
fclose(STDOUT);
fclose(STDERR);

//	Перенаправляем ввод-вывод туда куда нам надо или не надо...
$STDIN = fopen('/dev/null', 'r');
$STDOUT = fopen('/var/log/pomidorka-out.log', 'wb');
$STDERR = fopen('/var/log/pomidorka-err.log', 'wb');

//	Запускаем функцию несущую полезную нагрузку...
$daemon->run($func);
