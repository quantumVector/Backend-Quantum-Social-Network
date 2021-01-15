<?php
define("DEBUG_MODE", false);

//Корневой каталог сайта в форме реального пути в файловой системе
define("SITE_ROOT", $_SERVER['DOCUMENT_ROOT']);

//Константы для подключения к бд
define('DATABASE_HOST', 'localhost');
define('DATABASE_USERNAME', 'root');
define('DATABASE_PASSWORD', 'root');
define('DATABASE_NAME', 'quantum_social_network');

// Выдача отчетов об ошибках
if (DEBUG_MODE) {
 error_reporting(E_ALL);
} else {
 // Выключение выдачи отчетов об ошибках
 error_reporting(0);
}
?>