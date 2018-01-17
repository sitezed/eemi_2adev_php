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

		echo $this->couleurProduit;

		// traitements...
		return 'Article ajouté avec succès';
	}

	public function augmenterNombreProduit($nombre)
	{

		$variable = 'ok';
		$this->couleurProduit = 'jaune';
		// j'accede à ma propriété depuis l'interieur de la classe
		$this->nbProduit = $this->nbProduit + $nombre;
	}

	protected function retirerArticle($article)
	{
		// traitements pour retirer l'article...
		echo $this->maFonction();
		return 'Article supprimé avec succès';
	}

	private function modifierPrix($article, $prix)
	{
		// traitements..
		$maVariable = 'mot'; // ceci est une variable
		$this->referenceProduit = 'coco'; // ceci est une propriété
		return 'Le prix de l\'article a été modifié';
	}

	// declaration
	public function maFonction() {
		$maVariable = 'infos';
echo $this->couleurProduit;
echo '<br>';
		return $maVariable;
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

// execution
echo $monPanier->maFonction(); // la couleur du produit sera jaune car il y a une affectation dans augmenterNombreProduit() qui est éxécuté à la ligne 67 (plus haut)

echo $monPanier2->maFonction(); // affiche que "infos" car "jaune" n'est bon que pour $panier et NON $panier2 DONC $this renvoi à l'objet instancié

/*
Lorsqu'on appelle une classe pour créer un objet ($monObjet = new MaClasse()), nous disons que nous instancions une classe. L'objet est donc une instance de classe (synonymes).
Les fonctions se trouvant à l'intérieur d'une classe se nomment des méthodes.
Les propriétés sont listés au début, à l'intérieur de la classe et possède la même syntaxe que les variables. Mais ce ne sont pas des variables.
L'ensemble (méthodes + propriétés) se nomme des membres. On parle des membres de la classe.
(members = properties + methods)

Niveau de visibilité (niveau d'accès)
public : accessible de l'intérieur ET l'exterieur de la classe
protected : accessible de l'intérieur de la Classe ET de l'intérieur de ses classes héritières (voir notion héritage)
private : accessible uniquement depuis l'intérieur de la classe (pas extérieur, pas héritières)

 * */