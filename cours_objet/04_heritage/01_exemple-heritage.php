<?php

/*
L'héritage consiste à donner toutes les propriétés et méthode NON private d'une classe à une autre classe
 * */
class Membre
{
	public $id = 15;
	public $pseudo;
	protected $mdp = 'soleil75';
	private $age = 19; // n'est pas accessible dans la classe Admin

	public function __construct() {
			echo 'Construction d\'un membre';
	}
	public function inscription() {
		// traitements
		return 'Inscription validée !';
	}
	public function connexion() {
		// traitements
		return 'connexion Ok';
	}
}

class Admin extends Membre // un admin est aussi un membre, extends permet d'heriter de toutes les méthodes et propriétés (non private) de Membre
{
	public function accesBackOffice() {
		return 'Acces autorisé';
	}
	public function getMdp() {
		return $this->mdp; // j'ai accès à la propriété $mdp qui se trouve dans Membre (et qui est protected)
	}
}

$personne = new Admin();
echo '<hr>';
echo $personne->getMdp() . '<hr>'; // dans Admin
echo $personne->inscription()  . '<hr>'; // dans Membre

$autrePersonne = new Membre();
echo '<hr>';
// echo $autrePersonne->accesBackOffice(); // Impossible car l'héritage ne se fait pas dans l'autre sens
/*
Rappel :
Les éléments private ne sont accessible QUE dans la classe qui les detient
Les éléments protected sont accessibles dans la classe qui les détient ET dans les classes filles (qui en hérite)
Les éléments public sont accessibles de partout (interieur comme exterieur de n'importe quelle classe)
*/