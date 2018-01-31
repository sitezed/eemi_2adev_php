<?php
/*
 * Il existe deux syntaxes pour les namespaces.
 * Syntaxe à accolades :
*/
namespace Bureau
{
	// Je me trouve dans l'espace Bureau
	class maClasse
	{
		// methodes et prop
	}
	echo 'Affichage dans Bureau : ' . __NAMESPACE__ . '<hr>'; // constante pour savoir dans quel namespace nous nous trouvons
} // fin de la zone Bureau


// écrire du code ici : IMPOSSIBLE
// Pour écrire du code dans le namespace global, je dois utiliser le mot clé seul namespace

// echo 'coucou'; // declenche une erreur car PHP estime que je ne suis dans aucun namespace 

namespace // je retourne dans le namespace global
{
	echo 'coucou';
	echo __NAMESPACE__; // n'affiche rien 
}

namespace Domicile
{
	class maClasse
	{
		// méthodes et prop
	}
	echo 'Affichage dans Domicile : ' . __NAMESPACE__ . '<hr>';
}
