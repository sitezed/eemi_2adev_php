<?php
function inclusionAutomatique($nomDeLaClasse)
{
	include_once($nomDeLaClasse . '.php');
	//	include_once("A.class.php");
	echo "on passe dans inclusionAutomatique!<br />";
	echo "require($nomDeLaClasse.class.php);<br />";
}
//------------------------------------------------------
spl_autoload_register('inclusionAutomatique');
//------------------------------------------------------
/**************************************
 * Commentaire *
spl_autoload_register : permet d'exécuter une fonction lorsque l'interpreteur voit passer un 'new' dans le code.
Le nom a coté du 'new' est récupéré et transmis automatiquement à la fonction inclusionAutomatique() (un peu à la manière des méthodes magiques __set, __get, __call, etc.).
Il est indispensable de respecter une convention de nommage sur ses fichiers pour que l'autoload fonctionne.
 **************************************/