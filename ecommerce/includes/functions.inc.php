<?php
/*
Fichier de code commun a notre application
> declarations des fontions de notre application
*/

function dd($arg, $mode = false){
	echo '<pre style="position:relative; z-index:99999; background: orange; font-weight: bold; padding: 10px;">';
	if($mode) {
		var_dump($arg);
	} else {
		print_r($arg);
	}
	echo '</pre>';
	die();
}

function dump($arg, $mode = false) {
	echo '<pre style="position:relative; z-index:99999; background: #87D37C; font-weight: bold; padding: 10px;">';
	if($mode) {
		var_dump($arg);
	} else {
		print_r($arg);
	}
	echo '</pre>';
}

// supprimer tous les caracters speciaux et remplacer les espaces
function clean($string) {
	$string = str_replace(' ', '_', $string); // Replaces all spaces with underscores.
	$string = preg_replace('/[^A-Za-z0-9\-_]/', '', $string); // Removes special chars.
	$string = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	$string = preg_replace('/_+/', '_', $string); // Replaces multiple underscores with single one.
	$string = strtolower($string); // on passe en minuscule

	return $string;
}


/**
 * fonction permettant de generer des requetes select par ID de maniere dynamique
 *
 * @param string $table
 * @param int $id
 *
 * @return mixed
 */

function selectOne($table, $id) {

	global $pdo; // je recupere $pdo de l'exterieur de la fonction
	$rowToGet = $pdo->prepare('SELECT * FROM ' . $table . ' WHERE id = :id');
	$rowToGet->bindValue(':id', $id, PDO::PARAM_INT);
	$rowToGet->execute();
	$row = $rowToGet->fetch(PDO::FETCH_ASSOC);

	return $row;

}

/**
 * Recuperer toutes les infos d'une table
 *
 * @param $table string // Nom de la table
 *
 * @return array // resultats de la requete
 */
function selectAll($table) {
	global $pdo; // je recupere $pdo de l'exterieur de la fonction
	$rowsToGet = $pdo->query('SELECT * FROM ' . $table);
	$rows = $rowsToGet->fetchAll(PDO::FETCH_ASSOC);

	return $rows;
}

/**
 * Ajouter un produit au panier
 *
 * @param $produit array
 * @param $quantite int
 *
 * @return void
 */
function addToCart(array $produit, $quantite) {

	// si $_SESSION['cart'] existe et n'est pas vide ET l'indice ['id'] existe dans le tableau $_SESSION['cart']
	if(!empty($_SESSION['cart']) && array_key_exists('id', $_SESSION['cart'])) {
		// nous devons savoir si $produit['id'] que l'on souhaite ajouter est déjà présent dans la session du panier ou non.
		$positionProduit = array_search($produit['id'],  $_SESSION['cart']['id']); // retourne un chiffre si le produit existe
	}

	// var_dump($positionProduit);
	if (isset($positionProduit) && $positionProduit !== false) // si le produit est déjà présent dans le panier
	{
		$_SESSION['cart']['quantite'][$positionProduit] += $quantite ; // nous allons précisement à l'indice de ce produit et nous ajoutons la nouvelle quantite (exemple: +1)
		$_SESSION['cart']['prix_total_produit'][$positionProduit] = $produit['prix'] * $_SESSION['cart']['quantite'][$positionProduit];
	}
	else         //Sinon si $produit['id'] du produit n'existe pas dans le panier, on ajoute $produit['id'] du produit dans un nouvel indice du tableau. les crochets [] permettent de mettre à l'indice suivant.
	{
		$_SESSION['cart']['id'][]        = $produit['id'];
		$_SESSION['cart']['prix_total_produit'][]= $produit['prix'] * $quantite; // prix total selon la quantite
		$_SESSION['cart']['prix_unitaire'][]= $produit['prix']; // prix total selon la quantite
		$_SESSION['cart']['reference'][] = $produit['reference'];
		$_SESSION['cart']['titre'][]     = $produit['titre'];
		$_SESSION['cart']['quantite'][]  = $quantite;
		$_SESSION['cart']['photo'][]     = $produit['photo'];
	}
}


/**
 * Supprimer un produit du panier en se basant sur son ID
 *
 * @param $productId int
 *
 * @reurn void
 */
function deleteFromCart($productId) {
	if(!empty($_SESSION['cart']) && array_key_exists('id', $_SESSION['cart'])) {
		// nous devons savoir si $produit['id'] que l'on souhaite supprimer est présent dans la session du panier ou non.
		$positionProduit = array_search($productId,  $_SESSION['cart']['id']); // retourne un chiffre si le produit existe
	}

	if (isset($positionProduit) && $positionProduit !== false) // si le produit est déjà présent dans le panier
	{
		array_splice($_SESSION['cart']['id'], $positionProduit,1);
		array_splice($_SESSION['cart']['prix_total_produit'], $positionProduit,1);
		array_splice($_SESSION['cart']['prix_unitaire'], $positionProduit,1);
		array_splice($_SESSION['cart']['reference'], $positionProduit,1);
		array_splice($_SESSION['cart']['titre'], $positionProduit,1);
		array_splice($_SESSION['cart']['quantite'], $positionProduit,1);
		array_splice($_SESSION['cart']['photo'], $positionProduit,1);
	}
}
