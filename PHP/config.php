<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DB_HOST', 'localhost');
define('DB_USER', 'user');
define('DB_PASS', 'pass');
define('DB_NAME', 'titans');
define('DB_PORT', '3306');

define('BASE_URL', 'http://localhost/');
define('BASE_PATH', '/var/www/titans/htdocs/');

require_once(BASE_PATH . 'functions.php');

$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);

