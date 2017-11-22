<?php
/*
Fichier de code commun a notre application
> declarations des fontions de notre application
*/

function dd($arg, $mode = false){
	echo '<pre style="position:absolute; z-index:99999; background: tomato; font-weight: bold; padding: 10px;">';
	if($mode) {
		var_dump($arg);
	} else {
		print_r($arg);
	}
	echo '</pre>';
	die();
}

function dump($arg, $mode = false) {
	echo '<pre style="position:absolute; z-index:99999; background: #87D37C; font-weight: bold; padding: 10px;">';
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
