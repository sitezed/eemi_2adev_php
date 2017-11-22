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
	// j'initialise la variable de controle
	$ok = true;
	extract($_POST); // permet de transformer toutes les cles de $_POST en variables. Et d'y stocker les valeurs correspondantes. Exemple, si j'ai un $_POST['titre'], alors ca donnera $titre = $_POST['titre'];
	$insert = $pdo->prepare('INSERT INTO produits (reference, titre, slug, prix, description, photo, quantite) VALUES (:reference, :titre, :slug, :prix, :description, :photo, :quantite)');


	$reference = clean($reference);
	$slug = clean($titre);

	// je verifie si le $prix est un chiffre
	if(!is_numeric($prix)) {
		$_SESSION['error_message'][] = 'Le prix doit etre un chiffre !';
		$ok = false;
	}

	if(!is_numeric($quantite)) {
		$_SESSION['error_message'][] = 'La quantite doit etre un chiffre !';
		$ok = false;
	}

	// je traite la photo
	if(!empty($_FILES['photo'])) {
		// je vais isoler le texte apres le dernier point, qui correspond donc a l'extension du fichier
		// exemple mon fichier se nomme monimage.jpeg, je decoupe le ".jpeg"
		$extension = strrchr( $_FILES['photo']['name'], '.' );
		$nomPhoto  = 'photo_' . mt_rand( 0, 99999 ) . $extension; // photo_3738.jpeg
		// dans $_FILES['photo']['tmp_name'], se trouve le fichier de maniere temporaire. Je le deplace dans le dossier photos, et je le renomme en photo_[chiffre_au_hasar].extension
		move_uploaded_file( $_FILES['photo']['tmp_name'], '../assets/photos/' . $nomPhoto );
	} else {
		$nomPhoto = 'product-image-placeholder.jpg'; // mon image a defaut si je n'ai pas d'image
	}

	if($ok) {
		$insert->bindValue(':reference',$reference, PDO::PARAM_STR);
		$insert->bindValue(':titre',$titre, PDO::PARAM_STR);
		$insert->bindValue(':slug',$slug, PDO::PARAM_STR);
		$insert->bindValue(':prix',$prix, PDO::PARAM_INT);
		$insert->bindValue(':description',$description, PDO::PARAM_STR);
		$insert->bindValue(':photo',$nomPhoto, PDO::PARAM_STR);
		$insert->bindValue(':quantite',$quantite, PDO::PARAM_INT);
		$insertion = $insert->execute();

		// si l'insertion s'est bien passee
		if($insertion) {
			$_SESSION['success_message'] = 'Enregistrement effectue avec succes';
		} else {
			$_SESSION['error_message'][] = 'Une erreur s\'est produite. Veuillez contacter l\'administrateur';
		}

		header('location:' . PUBLIC_URL . '/admin/gestion_produits.php');
	} else {
		header('location:' . PUBLIC_URL . '/admin/gestion_produits.php');
	}

} else {
	dd($champsVides);
}