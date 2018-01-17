<?php
/*
Les setters sont des méthodes qui vont servir à remplir nos propriétés "private" et "protected" en veillant à ce que la donnée / valeur affectée à la propriété corresponde à ce que l'on recherche.

Les getters sont des méthodes qui vont servir à récupérer la valeur "settée" de la propriété "protected" ou "private" et eventuellement en modifier l'apparence avant de l'afficher

Exemple :
 * */

class Homme
{
	private $prenom;
	private $nom;
	private $age;

	public function setPrenom(string $argument) {
		// je vérifie si l'argument possède un mot supérieur à 2 caractères avant de l'affecter à la propriété.
		// avant, nous devions aussi vérifier s'il s'agit d'un type string, depuis php 7 nous pouvons écrire "string" directement avant $argument CEPENDANT, le typage en PHP possède encore des lacunes (conversion automatique du string en integer etc..), donc il vaut mieux vérifier avec des fonctions à l'ancienne.
		try {
			if(!is_numeric($argument) && mb_strlen($argument) > 2 ) {
				$this->prenom = $argument; // j'accede à la prop private
			} else {
				throw new InvalidArgumentException('Type string et plus de 2 caractères demandés');
			}
		} catch (InvalidArgumentException $e) {
			echo '<pre>';
			print_r($e);
			echo '</pre>';
		}
	}

	public function setNom(string $argument) {
		try {
			if(!is_numeric($argument) && mb_strlen($argument) > 2 ) {
				$this->nom = $argument; // j'accede à la prop private
			} else {
				throw new InvalidArgumentException('Type string et plus de 2 caractères demandés');
			}
		} catch (InvalidArgumentException $e) {
			echo '<pre>';
			print_r($e->getMessage());
			echo '</pre>';
		}
	}

	public function setAge(int $argument) {
		try {
			if(is_numeric($argument) && $argument > 18 ) {
				$this->age = $argument; // j'accede à la prop private
			} else {
				throw new InvalidArgumentException('Type integer et chiffre plus de 18 demandé');
			}
		} catch (InvalidArgumentException $e) {
			echo '<pre>';
			print_r($e->getMessage());
			echo '</pre>';
		}
	}

	public function getPrenom() {
		return ucfirst(mb_strtolower($this->prenom)); // je desire transformer le prenom en premiere letre majuscule avant de le donner
	}

	public function getNom() {
		return mb_strtoupper($this->nom); // je desire transformer le nom, tout en letres majuscules avant de le donner
	}

	public function getAge() {
		return $this->age;
	}

}

$personne = new Homme();
$personne->setPrenom('niColas');
$personne->setNom('duRanD');
$personne->setAge(19);
echo '<hr>';
echo $personne->getPrenom() . ' ' . $personne->getNom();
echo '<hr>';
echo 'la personne a '. $personne->getAge() . ' ans';

// enregistrer un age de + de 18 ans
// afficher "la personne a [X] ans "