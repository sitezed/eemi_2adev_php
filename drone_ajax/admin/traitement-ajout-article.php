<?php
require '../init.php';
// je verifie si une session USER existe, sinon je n'ai rien a faire ici
if(!isset($_SESSION['user'])) {
	header('location: index.php');
	die();
}

if(
	!empty($_POST['titre'])
&& !empty($_POST['contenu'])
&& !empty($_FILES['photo'])
) {
	$insert = $pdo->prepare( 'INSERT INTO articles (utilisateur_id, titre, contenu, photo) VALUES(:utilisateur_id, :titre, :contenu, :photo)' );
	$insert->bindValue( ':utilisateur_id', $_SESSION['user']['id'], PDO::PARAM_INT );
	$insert->bindValue( ':titre', $_POST['titre'] );
	$insert->bindValue( ':contenu', $_POST['contenu'] );

	// je vais isoler le texte apres le dernier point, qui correspond donc a l'extension du fichier
	// exemple mon fichier se nomme monimage.jpeg, je decoupe le ".jpeg"
	$extension = strrchr( $_FILES['photo']['name'], '.' );
	$nomPhoto  = 'photo_' . mt_rand( 0, 99999 ) . $extension; // photo_3738.jpeg
	// dans $_FILES['photo']['tmp_name'], se trouve le fichier de maniere temporaire. Je le deplace dans le dossier photos, et je le renomme en photo_[chiffre_au_hasar].extension
	move_uploaded_file( $_FILES['photo']['tmp_name'], 'photos/' . $nomPhoto );


	$insert->bindValue( ':photo', $nomPhoto );

	$ok = $insert->execute();


	if ( $ok ) {
		header( 'location: form-article.php?message=ajout_ok' );
		die();
	}
} else {
	header( 'location: form-article.php?message=error' );
	die();
}