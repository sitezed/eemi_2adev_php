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
