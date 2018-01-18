<?php

// execution
echo maFonction();

// declaration
function maFonction() {
	$maVariable = 'infos<hr>';

	return $maVariable;
}



function autreFonction($argument) {
	echo $argument . '<hr>';
}

function encoreUneFonction($argument) {
	echo $argument . '<hr>';
}

function display($argument, $argument2) {
	autreFonction($argument);
	encoreUneFonction($argument2);
}

display('Guillaume', 'Quentin');