<?php
abstract class Joueur
{
	public $info;

	final public function seConnecter() // en passant la fonciton en final, je bloque l'override
	{
		if(is_numeric($this->EtreMajeur())) {
			return $this->EtreMajeur() ;
		}

		return 'erreur';
	}

	abstract public function EtreMajeur(); // les méthodes abstraites n'ont pas de contenu (no body /corps).

	abstract public function Devise(); // les méthodes abstraites n'ont pas de contenu (no body /corps).
}

//-----------------
class JoueurFr extends Joueur
{
	public function EtreMajeur() // je suis obligé de redefinir la méthode de ma classMere sinon j'obtiens une erreur.
	{
		return 18;
	}

	public function Devise()
	{
		return '€';
	}
}

//-----------------
class JoueurUs extends Joueur
{
	public function EtreMajeur() // je suis obligé de redefinir la méthode de ma classMere sinon j'obtiens une erreur.
	{
		return 21;
	}

	public function Devise()
	{
		return '$';
	}
}

//-----------------
// $Joueur = new Joueur();  // erreur, une class abstraites n'est pas instanciable !
$joueurFr = new JoueurFr;
echo $joueurFr->seConnecter();
echo '<hr />';
$joueurUs = new JoueurUs;
echo $joueurUs->seConnecter();
//-----------------
/*************
 * - Une classe abstraite n'est pas instanciable.
 * - Les méthodes abstraites n'ont pas de contenu.
 * - Lorsque l'on hérite de méthodes abstraites, nous sommes obligé de les redéfinir.
 * - Pour définir des méthodes abstraites, il est nécessaire que la classe qui les contient soit abstraite.
 * - Une classe abstraite peut contenir des méthodes normales.
 * - Une classe normale NE PEUT PAS contenir des méthodes abstraites
 *
 * Le développeur qui écrit la classe Joueur est au coeur de l'application (noyau) et va obliger les autres développeur à redéfinir la méthode etreMajeur() car non seulement elle est abstraite mais en + elle est exécuté dans la méthode seConnecter() (c'est obligatoire pour se connecter au site de jeu en ligne). Il impose donc de bonnes contraintes (saine).
 **********************/

/*
o	Le fait de déclarer une classe abstraite permet d’empêcher son « instanciation ».
o	Pour définir une méthode comme étant abstraite, il faut que la classe elle-même soit abstraite.
o	Une classe abstraite n’est pas forcément uniquement composée de méthodes abstraites
o	Quand on hérite (dans une classe fille) de méthodes abstraites, il faut absolument les redéfinir car elles n'ont pas de corps.
o	Les méthodes abstraites n’ont pas de corps

Le plan d'un plan
Contexte (poker) : class joueur abstraite non instanciable avec methode connexion abstraite.
class joueur_fr qui hérite de joueur ou on dois forcément se connecté
et une méthode "etre_majeur()" qui regarde si le joueur_fr à 18 ans.
une méthode devise() en euros

class joueur_us qui hérite de joueur ou on dois forcément se connecté
et une méthode "etre_majeur()" qui regarde si le joueur_us à 21 ans.
une méthode devise() en dollars

Ceci ne fonctionne pas:
class test
{
	abstract public function abstraction();
}
Imaginons que nous ayons une classe Animal et des classes : Chien, Chat, Loup, Eléphant, Chameau.
Tous sont des animaux et héritent naturellement de la classe « Animal ».
Cependant aucun d’entre eux n’est « juste animal », un Chien est un chien, et un chat est un chat.
Par conséquent la classe Animal ne sera jamais instanciée, la classe animale sera abstraite.
Elle servira de classe modèle pour celle qui en hériteront. En effet chaque animaux dors, chaque animaux mange…
Ces méthodes « dormir() » ou encore « manger() » seront relative à la classe animal.
En revanche chaque animal a un cri différent : le chien abboie, le chat miole.
Ces méthodes cri() seront dans les classes filles.
Nous pourrons tout de même ajouter la méthode cri() dans la class Animal pour forcer les classes héritière à écrire cette méthode, la méthode cri() sera abstraite.
*/