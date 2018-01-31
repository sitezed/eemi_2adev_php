<?php
function inclusionAutomatique($nomDeLaClasse)
{
	include_once($nomDeLaClasse . '.php');
	//	include_once("A.php");
	echo "On passe dans la fonction inclusionAutomatique!<br />";
	echo "On fait donc un include de $nomDeLaClasse.php<br>";
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