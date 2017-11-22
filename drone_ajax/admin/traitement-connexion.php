<?php
require '../init.php';

$result = $pdo->prepare('SELECT id, prenom, email FROM utilisateurs WHERE email = :email && password = :password');
$result->bindValue(':email', $_POST['email']);
$result->bindValue(':password', $_POST['password']);

$result->execute();

$user = $result->fetchAll(PDO::FETCH_ASSOC);

if($result->rowCount() > 0) {
	$_SESSION['user'] = array();
	$_SESSION['user']['id'] = $pdo->lastInsertId();
	$_SESSION['user']['prenom'] = $user[0]['prenom'];
	$_SESSION['user']['email'] = $user[0]['email'];
	header('location: form-article.php');
	die();
} else {
	header('location: index.php?message=error');
	die();
}