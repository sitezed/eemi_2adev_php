<?php
/*
Fichier de code commun a notre application
> session start
> connexion BDD
> chemin absolu du serveur
*/
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root',
	[
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	]);
const PUBLIC_URL = 'http://apache.php71/eemi/php/ecommerce/'; // base de mon URL
const PUBLIC_PATH = '/eemi/php/ecommerce/'; // racine de mon serveur
