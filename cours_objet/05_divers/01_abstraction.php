<?php

// Animal devient une classe abstraite. ce qui signifie que nous ne pouvons plus l'instancier. Elle ne servira QU'à être hértiée.
// on dit, que Animal est une classe Polymorph
abstract class Animal
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
	public function deplacement()
	{
		return 'je marche';
	}

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

$animal = new Animal();
echo $animal->deplacement() . '<hr>';
echo $animal->manger() . '<hr>';

// l'éléphant a overridé les méthodes de Animal
$eleph = new Elephant();
echo $eleph->deplacement() . '<hr>' . '<hr>';
echo $eleph->manger() . '<hr>';

// le chat accede à toutes les méthode de Animal, ainsi qu'à ses propres méthodes
$chat = new Chat();
echo $chat->deplacement() . '<hr>'; // issu de Animal
echo $chat->manger() . '<hr>'; // issu de Animal
echo $chat->jouer();