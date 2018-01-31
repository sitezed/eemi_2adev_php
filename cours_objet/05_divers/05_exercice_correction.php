<?php
abstract class Vehicule
{
	// avec final je bloque la modification / surcharge / override de demarrer() dans les heritiers
	final public function demarrer()
	{
		return 'je demarre';
	}
	// avec abstract j'impose la declaration de la methode carburant dans les heritiers
	abstract public function carburant();
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

