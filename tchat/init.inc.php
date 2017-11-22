<?php
$pdo = new Pdo('mysql:host=localhost;dbname=dialogue', 'root', 'root', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);

// var_dump($pdo);
