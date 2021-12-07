<?php
defined('myeshop') or die('Доступ запрещён!');
$db_host		= 'localhost';
$db_user		= 'admin';
$db_pass		= '123456';
$db_database	= 'db_shop'; 

$link =mysqli_connect($bd_host,$db_user,$db_pass, $db_database) or die("Нет соединения с БД ".mysqli_error());
mysqli_query($link, "set names cp1251");
?>