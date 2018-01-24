<?php

class Maison
{
	public static $nbPiece = 7;

	public static $espaceTerrain = '500m2';

	const HAUTEUR = '10m';

	protected static $typeMur;

	protected $couleur;

	public static function setTypeMur(string $typeMur)
	{
		self::$typeMur = $typeMur;
	}

	public static function getTypeMur()
	{
		return self::$typeMur;
	}

	public function setCouleur(string $couleur)
	{
		$this->couleur = $couleur;
	}

	public function getCouleur()
	{
		return $this->couleur;
	}
}

// parfois, même lorsque nous créons des objets, nous avons besoin de conserver des informations figées et communes aux différents objets. C'est pourquoi, nous utilisons les propriétés, constantes et méthodes de classe.
echo 'Espace terrain Class Maison : ' . Maison::$espaceTerrain . '<hr>';
echo 'Hauteur Class Maison : ' . Maison::HAUTEUR . '<hr>';
Maison::setTypeMur('brique');
echo 'Type de mur Class Maison : ' . Maison::getTypeMur(). '<hr>';

$laLouisiane = new Maison();
$autreMaison = new Maison();
$maison3 = new Maison();

$laLouisiane->setCouleur('rouge');
$autreMaison->setCouleur('jaune');

echo $laLouisiane->getCouleur() . '<hr>'; // rouge
echo $autreMaison->getCouleur() . '<hr>'; // jaune
echo $maison3->getCouleur() . '<hr>'; //

echo $laLouisiane::getTypeMur() . '<hr>'; // brique
echo $autreMaison::getTypeMur() . '<hr>'; // brique

$laLouisiane::setTypeMur('marbre');
echo $laLouisiane::getTypeMur() . '<hr>'; // marbre
echo $autreMaison::getTypeMur() . '<hr>'; // marbre


class Appart
{
	public $couleur = 'rouge';
	public $superfice = '100m';
}

$apparte = new Appart();

$encoreMaison = new Maison();
$encoreMaison::setTypeMur('paille');
echo $laLouisiane::getTypeMur() . '<hr>'; // paille
echo $autreMaison::getTypeMur() . '<hr>'; // paille
echo $encoreMaison::getTypeMur() . '<hr>'; // paille

var_dump($encoreMaison);

/*
Rappel : membres = propriétés et méthodes dans une classe ou un objet
- le mot clé "self" renvoi aux membres de la classe.
- le mot clé "this" renvoi aux membres de l'objet.
- "::" permet d'accéder aux membres de la classe (possibilité de manipulation de la classe sans l'instancier)
- "->" permet d'accéder aux membres de l'objet (obliger de créer l'objet avant de pouvoir accéder à ses membres)
- "static" permet de créer / déclarer des membres de Classe
- lorsqu'il n'y a pas écrit "static", c'est nécessairement un membre d'objet

 * */
