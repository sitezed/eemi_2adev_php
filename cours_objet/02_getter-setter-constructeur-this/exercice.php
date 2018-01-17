<?php
//--------------------------------------------
/************************
UML:
-----------------
|    Vehicule	|
-----------------
|	$litres		  |
-----------------
|setLitres()    |
|getLitres()	  |
-----------------

-----------------
|    Pompe   	|
-----------------
|	$stock		  |
-----------------
|setStock()     |
|getStock() 	  |
|donnerEssence()|
-----------------

1. Création d'un véhicule 1
2. Attribuer un nombre de litres d'essence au vehicule 1 : 5
3. Afficher le nombre de litres d'essence du vehicule 1
4. Création d'une pompe
5. Attribuer un stock d'essence à la pompe : 800
6. Afficher le stock d'essence de la pompe
7. la pompe donne de l'essence en faisant le plein (50L) à la voiture1
8. Afficher le nombre de litres d'essence pour la voiture1 après ravitaillement
9. Afficher le stock d'essence restant pour la pompe
10. Faire en sorte que le véhicule ne puisse pas contenir plus de 50L d'essence (limite reservoir).
 ***********************/
class Vehicule {
	protected $litres;

	public function setLitres(int $litres){
		if(is_numeric($litres) && $litres <= 50) {
			$this->litres = $litres;
		} else {
			echo "Le véhicule doit posséder maximum 50 litres et le type doit être un chiffre";
		}
	}

	public function getLitres(){
		return $this->litres;
	}
}


class Pompe {
	protected $stock;

	/**
	 * the stock setter
	 *
	 * @param int $stock
	 */
	public function setStock(int $stock): void
	{
		if(is_numeric($stock)) {
			$this->stock = $stock;
		} else {
			echo "le stock doit être numérique";
		}
	}

	/**
	 * @return mixed
	 */
	public function getStock()
	{
		return $this->stock;
	}

	// mon argument EST un objet Vehicule
	public function donnerEssence(Vehicule $vehicule) {
		$dansVoiture = $vehicule->getLitres(); // je recupere le nombre de litres dispo dans la voiture
		$stockPompe = $this->getStock(); // je prend le stock actuel de la pompe
		$essenceADonner = 50 - $dansVoiture; // donne 45

		$vehicule->setLitres($essenceADonner + $dansVoiture); // 45 + 5 = 50
		$this->setStock($stockPompe - $essenceADonner); // 800 - 45 = 755
	}

}

//1
$voiture = new Vehicule();

//2
$voiture->setLitres(5);

//3
echo $voiture->getLitres() . ' L d\'essence pour le véhicule 1<hr>';


//4
$pompe = new Pompe();

//5
$pompe->setStock(800);

//6
$stockPompe = $pompe->getStock();
echo "Il y a $stockPompe L dans la pompe<hr>";

//7


















