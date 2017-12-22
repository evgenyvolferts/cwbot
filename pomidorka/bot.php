<?php
//set_time_limit(0);
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
$Request = file_get_contents("php://input");
require_once('bot.class.php');

$KickAssBot = new CWBot();
$KickAssBot->LoadRequest($Request);
$KickAssBot->Init();
$KickAssBot->Run();

?>