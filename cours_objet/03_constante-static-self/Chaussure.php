<?php

class Chaussure
{
	public $couleur;
	public static $paysFabrication = 'Chine';
	const MATIERE = 'cuir';
	protected $pointure, $marque; // les 2 propriétés sont protected

	/**
	 * Chaussure constructor.
	 *
	 * @param $pointure
	 * @param $marque
	 * @param $couleur
	 */
	public function __construct($pointure = NULL, $marque = NULL, $couleur = NULL)
	{
		if (!is_null($pointure)) {
			$this->setPointure($pointure);
		}
		if (!is_null($couleur)) {
			$this->couleur = $couleur;
		}
		if (!is_null($marque)) {
			$this->setMarque($marque);
		}
		// le construtor est déclenché lorsqu'on utilise "new". Il nous retourne toujours l'objet créé.
	}

	/**
	 * Set de la pointure
	 *
	 * @param int $pointure pointure de la chaussure
	 *
	 * @return void
	 */
	public function setPointure(int $pointure): void
	{
		if ($this->checkPointure($pointure)) {
			$this->pointure = (int)$pointure;
		} else {
			echo 'la pointure doit être un nombre compris entre 22 et 52<hr>';
		}

		return; // facultatif
	}

	/**
	 * get de la pointure (recuperer la pointure)
	 *
	 * @return mixed
	 */
	public function getPointure()
	{
		return $this->pointure;
	}

	/**
	 * Set de la marque
	 *
	 * @param int $marque marque de la chaussure
	 *
	 * @return void
	 */
	public function setMarque(string $marque): void
	{
		$acceptedMarque = ['adidas', 'nike', 'timberland', 'diesel', 'reebok', 'geox'];
		// si je trouve la marque $marque dans l'array préparé
		$marqueRecuperee = mb_strtolower($marque); // je passe tout en minuscule
		if (in_array($marqueRecuperee, $acceptedMarque)) {
			// alors...
			$this->marque = $marqueRecuperee;
		}

		return; // facultatif
	}

	/**
	 * get de la marque (recuperer la marque)
	 *
	 * @return mixed
	 */
	public function getMarque()
	{
		return ucfirst($this->marque); // 1ere lettre majuscule
	}

	/**
	 * @param int $pointure
	 *
	 * @return bool
	 */
	protected function checkPointure(int $pointure): bool
	{
		if (is_numeric($pointure) && $pointure > 21 && $pointure < 53) {
			return TRUE;
		}

		// si je tombe dans le return true, le return false ne sera pas lu
		return FALSE;
	}

}

$basket = new Chaussure(45, 'nike', 'rouge');
// afficher pointure
echo $basket->getPointure();
echo '<hr>';
// afficher la matiere
echo Chaussure::MATIERE;
echo '<hr>';
// afficher la couleur
echo $basket->couleur; // pas beosin de getter, accès public
echo '<hr>';
// afficher la marque
echo $basket->getMarque();
echo '<hr>';

// pour modifier les valeurs, je peux passer par le constructeur OU par les setters pour les propriété privées / protégées et directement pour les propriété publiques.
// changement couleur
$basket->couleur = 'noire';
// changement marque
$basket->setMarque('adidas');
// changement pointure
$basket->setPointure(47);
// changement tout, par le constructeur
$basket->__construct(50, 'timberland', 'bleue');

echo '<hr><hr><hr>';

// afficher nouvelle pointure
echo $basket->getPointure();
echo '<hr>';
// afficher nouvelle couleur
echo $basket->couleur; // pas beosin de getter, accès public
echo '<hr>';
// afficher nouvelle marque
echo $basket->getMarque();
echo '<hr>';

$boots = new Chaussure();