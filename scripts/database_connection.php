<?php

require_once 'app_config.php';

$link = new mysqli (DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
if ($link->connect_errno) {
	die('Ошибка соединения: ' . $link->connect_errno . ' ' . $link->connect_error);
}

//Устанавливаем кодировку запроса
$link->query ("SET NAMES'utf8'");

return $link;

//Закрывает ранее открытое соединение с базой данных
$link->close();

?>