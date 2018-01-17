<?php
// par convention, nous créons toujours la classe avec sa premiere lettre en majuscule
// par convention, nous aurons toujours une classe par fichier, et le fichier portera le nom de la classe. Dans notre cas, Panier.php (premiere lettre majuscule)
class Panier
{

	// Les propriétés dans les classes sont l'équivalent des variables en procédural. À la seule différence que nous aurons des niveaux de visibilité / d'accès.
	public $nbProduit = 0; // public >> je peux accéder à ma propriété depuis l'intérieur ET l'extérieur de la classe (voir exemple dans la fonction augmenterNombreProduit

	protected $couleurProduit;

	protected $referenceProduit = 'nimporte'; // je peux mettre une valeur à défaut dans ma propriété. Ou non.

	private $tailleProduit;

	private $poidsProduit = '1kg';

	public function ajouterArticle($article)
	{

		// traitements...
		return 'Article ajouté avec succès';
	}

	public function augmenterNombreProduit($nombre)
	{
		// j'accede à ma propriété depuis l'interieur de la classe
		$this->nbProduit = $this->nbProduit + $nombre;
	}

	protected function retirerArticle($article)
	{
		// traitements pour retirer l'article...
		return 'Article supprimé avec succès';
	}

	private function modifierPrix($article, $prix)
	{
		// traitements..
		return 'Le prix de l\'article a été modifié';
	}
}

$monPanier  = new Panier(); // ici, je fais une instance de la classe Panier, autrement dit, je crée un objet Panier à partir de la classe Panier. La classe est une sorte de "moule" à fabriquer des objets
$monPanier2 = new Panier; // pareil, je peux utiliser la syntaxe avec ou sans "()"

echo $monPanier->nbProduit; // j'accede à ma propriété depuis l'exterieur de la classe
echo '<br>';
$monPanier->nbProduit = 15; // affectation depuis l'exterieur de la classe (toujours possible grâce a public)
$monPanier->augmenterNombreProduit(10); // accès depuis l'exterieur OK
echo $monPanier->nbProduit;

echo '<br>';

// echo $monPanier->referenceProduit; // Imossible, erreur, je ne peux pas acceder à une propriété protected depuis l'exterieur de la classe. Accès UNIQUEMENT depuis l'interieur de la classe et, depuis l'interieur des classes héritères (voir notion héritage)

// echo $monPanier->retirerArticle('article'); // La règle d'accessibilité est aussi valable pour les méthodes (méthodes = fonctions à l'interieur d'une classe)
