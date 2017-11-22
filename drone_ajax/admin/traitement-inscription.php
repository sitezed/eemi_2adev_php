<?php
require '../init.php';

$insert = $pdo->prepare('INSERT INTO utilisateurs (email, prenom, password) VALUES(:email, :prenom, :password)');
$insert->bindValue(':email', $_POST['email']);
$insert->bindValue(':prenom', $_POST['prenom']);
$insert->bindValue(':password', $_POST['password']);

// ici je procede a lenregistrement en BDD (inscription)
$ok = $insert->execute(); // me renvoi le nombre de lignes affectees. 0 si aucune lignes affectees

// ici, si l'enregistrement s'est bien deroulé, je procede à la connexion
if($ok) {

	$_SESSION['user'] = array();
	$_SESSION['user']['id'] = $pdo->lastInsertId(); // je recupere l'id de l'enregisrement que je viens d'effectuer
	$_SESSION['user']['prenom'] = $_POST['prenom'];
	$_SESSION['user']['email'] = $_POST['email'];

	header('location: form-article.php');
	die();
} else {
	header('location: index.php?message=error_inscription');
	die();
}