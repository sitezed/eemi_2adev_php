<?php
/*
Les traits comportent les mêmes caractéristiques qu'une classe à la différence que :
- Nous ne pouvons pas instancier un trait (il ne sert qu'à ajouter des méthodes à une classe, un peu comme une classe abstraite)
- Nous pouvons importés plusieurs traits dan une classe. Alors qu'une classe ne peut pas hériter de plusieurs classes.

Les traits sont une sorte de "solution" apportée au PHP pour régler le problème du multi-héritage. Nous ne pouvons pas faire de multi-héritage en PHP autrement qu'en passant par les traits.

 * */

trait TPanier
{
	public $nbProduit = 1;
	public function affichageProduits()
	{
		return 'Affichage des produits!';
	}
}

trait TMembre
{
	public function affichageMembres()
	{
		return 'Affichage des membres';
	}
}

class Site
{
	use TPanier, TMembre;
}

$website = new Site();
echo $website->affichageMembres();
echo '<hr>';
echo $website->affichageProduits();

