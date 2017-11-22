<?php
session_start(); // TOUJOURS l'ecrire en DEBUT de fichier, dans TOUS les fichiers
// connexion BDD
$pdo = new PDO('mysql:host=localhost;dbname=drone', 'root', 'root',
	[
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	]);
