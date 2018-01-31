<?php
// Version de correction avec interface
interface IVehicule
{
	public function carburant();
}

// en implementant l'interface dans une classe ABSTRAITE, j'impose la declaration des methodes de l'interface dans les classes heritieres NON ABSTRAITES.
// si la classe Vehicule n'etait pas abstraite, j'aurai l'obligation de declarer la methode carburant() dans la classe Vehicule
abstract class Vehicule implements IVehicule
{
	// avec final je bloque la modification / surcharge / override de demarrer() dans les heritiers
	final public function demarrer()
	{
		return 'je demarre';
	}
	public function nombreDeTestObligatoire()
	{
		return 100;
	}
}
//-----------------------
class Peugeot extends Vehicule
{
	public function carburant(){
		return 'diesel';
	}
	public function nombreDeTestObligatoire(){
		// avec parent:: je recuperer le resultat de la methode pour y ajouter un traitement suplementaire (ici une adition)
		return parent::nombreDeTestObligatoire() + 70;
	}
}
//-----------------------
class Renault extends Vehicule
{
	public function carburant(){
		return 'essence';
	}

	public function nombreDeTestObligatoire(){
		return parent::nombreDeTestObligatoire() + 30;
	}

}
//-----------------------

