<?php
require_once('../includes/init.inc.php');
$empty = null;
$champsVides = [];
foreach ( $_POST as $key => $value ) {
	if(empty($_POST[$key])){
		$empty = true;
		$champsVides[] = $key; // je rempli le tableau $champsVides pour indiquer quels champs sont vides
	} else {
		$_POST[$key] = trim($value); // je supprime les espaces des extremites
	}
}

// si aucun des POST n'est vide, alors c'est bon je fais mon traitement
if(!$empty) {
	extract($_POST); // permet de transformer toutes les cles de $_POST en variables. Et d'y stocker les valeurs correspondantes. Exemple, si j'ai un $_POST['titre'], alors ca donnera $titre = $_POST['titre'];
	$insert = $pdo->prepare('INSERT INTO produits (reference, titre, slug, prix, description, photo, quantite) VALUES (:reference, :titre, :slug, :prix, :description, :photo, :quantite)');


	$reference = clean($reference);
	$slug = clean($titre);

	$insert->bindValue(':reference',$reference, PDO::PARAM_STR);
	$insert->bindValue(':titre',$titre, PDO::PARAM_STR);
	$insert->bindValue(':slug',$slug, PDO::PARAM_STR);
	$insert->bindValue(':prix',$prix, PDO::PARAM_INT);
	$insert->bindValue(':description',$description, PDO::PARAM_STR);
	$insert->bindValue(':photo',$photo, PDO::PARAM_STR);
	$insert->bindValue(':quantite',$quantite, PDO::PARAM_INT);

} else {
	dd($champsVides);
}