<?php
require_once( 'includes/init.inc.php' );
$title  = 'Catalogue des produits';
$msg    = '';

// j'enregistre le produit ajouté au panier. Dans un tableau SESSION
// pour cela, je recupere les informations a partir de la BDD a l'aide de l'id.
if(!empty($_POST['id_produit']) && is_numeric($_POST['id_produit'])) {
	$produit = selectOne('produits', $_POST['id_produit']);

dd($produit);

}




require_once( 'includes/haut.inc.php' );
require_once( 'includes/menu.inc.php' );
?>