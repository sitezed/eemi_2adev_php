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

	// si je possede un ID dans le $_POST, cela signifie que je suis dans le cas d'une modification
	$id = (!empty($_POST['id_modif']) && is_numeric($_POST['id_modif'])) ? $_POST['id_modif'] : NULL;

	// j'initialise la variable de controle
	$ok = true;
	extract($_POST); // permet de transformer toutes les cles de $_POST en variables. Et d'y stocker les valeurs correspondantes. Exemple, si j'ai un $_POST['titre'], alors ca donnera $titre = $_POST['titre'];
	$insert = $pdo->prepare('REPLACE INTO produits (id, reference, titre, slug, prix, description, photo, quantite) VALUES (:id, :reference, :titre, :slug, :prix, :description, :photo, :quantite)');


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
	if($_FILES['photo']['error'] === 0) {
		// je vais isoler le texte apres le dernier point, qui correspond donc a l'extension du fichier
		// exemple mon fichier se nomme monimage.jpeg, je decoupe le ".jpeg"
		$extension = strrchr( $_FILES['photo']['name'], '.' );
		$nomPhoto  = 'photo_' . mt_rand( 0, 99999 ) . $extension; // photo_3738.jpeg
		// dans $_FILES['photo']['tmp_name'], se trouve le fichier de maniere temporaire. Je le deplace dans le dossier photos, et je le renomme en photo_[chiffre_au_hasar].extension
		move_uploaded_file( $_FILES['photo']['tmp_name'], '../assets/photos/' . $nomPhoto );
		if(!empty($_POST['photo_presente'])) {
			file_exists(PUBLIC_PATH . '/assets/photos/' . $_POST['photo_presente'])
	&&  unlink(PUBLIC_PATH . '/assets/photos/' . $_POST['photo_presente']);
		}
	} else if(!empty($_POST['photo_presente'])) {
		$nomPhoto = $_POST['photo_presente'];
	} else if($_FILES['photo']['error'] === 4) {
		$nomPhoto = 'product-image-placeholder.jpg'; // mon image a defaut si je n'ai pas d'image
	} else {
		$_SESSION['error_message'][] = 'Erreur lors de l\'upload du fichier image';
		$ok = false;
	}

	if($ok) {
		$insert->bindValue(':reference',$reference, PDO::PARAM_STR);
		$insert->bindValue(':titre',$titre, PDO::PARAM_STR);
		$insert->bindValue(':slug',$slug, PDO::PARAM_STR);
		$insert->bindValue(':prix',$prix, PDO::PARAM_INT);
		$insert->bindValue(':description',$description, PDO::PARAM_STR);
		$insert->bindValue(':photo',$nomPhoto, PDO::PARAM_STR);
		$insert->bindValue(':quantite',$quantite, PDO::PARAM_INT);
		$insert->bindValue(':id',$id, PDO::PARAM_INT);
		$insertion = $insert->execute();

		// si l'insertion s'est bien passee
		if($insertion) {
			$typeAction = (!empty($id)) ? 'Modification' : 'Enregistrement';
			$_SESSION['success_message'] = $typeAction . ' effectue avec succes';
		} else {
			$_SESSION['error_message'][] = 'Une erreur s\'est produite. Veuillez contacter l\'administrateur';
		}
	}
} else {
	foreach ( $champsVides as $key => $value ) {
		$_SESSION['error_message'][] = 'Le champ ' . $value . ' ne doit pas etre vide';
	};
}

$_SESSION['old_values'] = $_POST; // je renvoi les valeurs du $_POST

if(!empty($id)) {
	header('location:' . PUBLIC_URL . '/admin/afficher_produits.php');
	die();
} else {
	header('location:' . PUBLIC_URL . '/admin/gestion_produits.php');
}
