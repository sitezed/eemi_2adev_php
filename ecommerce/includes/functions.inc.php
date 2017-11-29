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
