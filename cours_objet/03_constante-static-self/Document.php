<?php

/*
Dans cette classe, nous mettons en place le design pattern Singleton.
Un design pattern est une reflexion (algorithme ou architecture) apportée pour répondre à un problème récurrent.
MVC, est un design pattern architectural qui répond au problème : comment travailler en équipe sans se marcher dessus ?
Singleton, est un design pattern algorithmique qui répond au problème : comment faire pour ne pas instancier une classe qui l'a déjà été (ne pas avoir 2 espaces mémoire pour faire la même chose). Réponse : nous allons faire en sorte que lorsqu'une personne instancie une classe, nous vérifions d'abord si elle n'a pas déjà été insanciée.
Si oui : nous donnons l'instance précedente (déjà créée)
S non : nous instancions..


 * */
class Document
{
	private static $instance = null;
	public $info;

	// en faisant ceci, je bloque le "new"
	private function __construct(){}
	// je bloque aussi la tentative de clonage. le mot clé pour faire un clonage est "clone". Un clonage, est la copie d'un objet dans un nouvel espace mémoire.
	private function __clone(){}

	public static function getInstance(){
		if(is_null(self::$instance)){
			self::$instance = new Document();
		}
		return self::$instance;
	}
}

// $doc = new Document(); // ERROR >> private
$doc = Document::getInstance();
$doc->info = 'test<br>';
$doc2 = Document::getInstance();
echo $doc2->info; // test
$doc3 = Document::getInstance();
echo $doc3->info; // test


// $doc4 = clone $doc; // ERROR >> private
// var_dump($doc4);

var_dump($doc); // espace memoire 1
var_dump($doc2); // espace memoire 1
var_dump($doc3); // espace memoire 1