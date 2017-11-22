<?php

// fichier reception.php

$pdo = new Pdo('mysql:host=localhost;dbname=ajax', 'root', 'root', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);

if(!empty($_POST['info'])) {
	$insert = $pdo->prepare('INSERT INTO pictures(user_agent) VALUES (:user_agent)');
	$insert->bindValue(':user_agent', $_POST['info']);
	$insert->execute();
	$laReponse = ['retour' => 'Goood !!!'];
}

if(!empty($_POST['commentaire'])) {
	$insert = $pdo->prepare('INSERT INTO commentaire(commentaire) VALUES (:commentaire)');
	$insert->bindValue(':commentaire', $_POST['commentaire']);
	$insert->execute();

	$laReponse = ['message' => 'votre commentaire a bien été enregistré'];
	echo json_encode($laReponse);
}