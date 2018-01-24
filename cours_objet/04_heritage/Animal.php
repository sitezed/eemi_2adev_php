<?php

class Animal
{
	public function deplacement(){
		return 'Je cours';
	}

	public function manger() {
		return 'je mange';
	}
}

class Elephant extends Animal
{
	// ici je fais ce qu'on appel une redefinition de méthode. C'est à dire que je remplace le traitement de la méthode héritée.
	// en anglais : override
	public function deplacement()
	{
		return 'je marche';
	}

	// ici je fais ce qu'on appel une surcharge de méthode. C'est à dire que j'ajoute un traitement au traitement hérité
	// en anglais : override
	public function manger() {
		$traitementInitial = parent::manger();
		// je fais ce que je veux avec le traitement initial...
		$traitementFinal = $traitementInitial . ' avec ma trompe';
		return  $traitementFinal;
	}

}

class Chat extends Animal
{
	public function jouer() {
		return 'Joue avec moi';
	}
}

// l'éléphant a overridé les méthodes de Animal
$eleph = new Elephant();
echo $eleph->deplacement() . '<hr>' . '<hr>';
echo $eleph->manger() . '<hr>';

$animal = new Animal();
echo $animal->deplacement() . '<hr>';
echo $animal->manger() . '<hr>';

// le chat accede à toutes les méthode de Animal, ainsi qu'à ses propres méthodes
$chat = new Chat();
echo $chat->deplacement() . '<hr>'; // issu de Animal
echo $chat->manger() . '<hr>'; // issu de Animal
echo $chat->jouer();