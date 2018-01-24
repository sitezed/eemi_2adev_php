<?php
interface Mouvement
{
	public function deplacement();
}
//--------------------------------------
class Bateau implements Mouvement // class Bateau extends Mouvement ne fonctionne pas.
{
	public function deplacement(){
		// traitement
	} // obligation de recréer les méthodes de l'interface qu'on implemente pour éviter erreur
}
//--------------------------------------
class Animal implements Mouvement
{
	public function deplacement(){
		// traitement
	}
}
//--------------------------------------
// new Mouvement; // erreur, une interface n'est pas instanciable.
//--------------------------------------
/************
 * Explications *
Une interface est une liste de méthodes (sans contenu) qui permet de garantir que toute classe qui implémente l'interface contiendra les méthodes de l'interface, avec la même signature (le même nom). C'est une sorte de contrat qui garantie un minimum de méthode avec la bonne ortographe.
Une interface n'est pas un héritage
un Bateau hérite de Véhicule
une Voiture hérite de Véhicule
un Avion hérite de Véhicule
...un Avion, voiture, moto n'hérite pas de Mouvement
C'est juste un point commun entre toutes ces classes.

Pour les interfaces on imagine qu'il y a 3 développeurs,
1- celui qui développe l'interface (qui fixe les normes)
2- celui qui développe les classes
3- celui qui réalise les appels

celui qui réalise les appels est certain de pouvoir effectuer :
$bateau->deplacement(); // il sais qu'avec l'interface il ne devra pas faire $bateau->seDeplacer(); pas besoin d'ouvrir la classe en question.
$avion->deplacement();
Pas de risque que le développeur de la classe Bateau crée la méthode "seDeplacer()" et celui de la classe Avion "deplacement()".
Une interface crée une sorte de formalités
Si le code des classes doit changer, cela ne changera pas les appels car la méthode deplacement() devra toujours être présente.

D'une manière générale, cela me permet une meilleure conceptualisation.
Tu as une classe voiture, une classe train. Tu leur met l'interface peutRouler.
Tu définis ensuite qu'une voiture ou un train peut entrer en collision avec tout ce qui peutRouler (toutes les classes qui implémentes l'interface peutRouler).


class extends class (héritage)
interface extends interface (héritage)
class implements interface (implémentation)

- Une interface est une liste de méthode n'ayant pas de contenu devant obligatoirement être redeclarees dans les classes qui l'implémente
- Les interfaces permettent de créer du code qui spécifie quelles méthodes une classe doit implémenter.
- Toutes les méthodes déclarées dans une interface doivent être publiques et redéfinie dans la classe qui l'implémente.
- Lorsque je souhaite me servir d'une interface, il faut préciser "implements" (pour une classe on utilise "extends")
- Une interface n'est pas instanciable (new Mouvement; erreur).  (les classes abstraites non plus)
- Les méthodes d'une interface n'ont pas de contenu. (les classes abstraites non plus)
- On se sert d'une interface pour représenter un POINT COMMUN entre deux classes. cela permet d'exiger un comportement. (une classe abstraite est plutôt le plan d'un plan).
Bateau hérite de Vehicule, Avion hérite de Vehicule - Bateau n'hérite pas de Mouvement, Avion n'hérite pas de Mouvement. Un véhicule et un Mouvement n'existe pas.
- Pour créer une interface, On réfléchi en terme de comportement et non d'entité.
- Il est possible d'implementer plusieurs interfaces à la fois (on ne peux pas hériter de plusieurs classes)
- Une interface ne permet pas de factoriser le code, alors qu'une classe abstraite peut le faire car elle peut contenir des méthodes normales (avec du contenu).
- Pas de possibilité d'avoir des propriétés dans une interface.

précision : nous pouvons déclarer des constantes dans une interface.
lien interessant : http://www.developpez.net/forums/d604186/php/langage/debuter/poo-quoi-servent-interfaces-php-resolu/

 * ++ *
- une interface comporte une liste de méthode (public) sans contenu qui permet de garantir que toutes les classes qui implémente l'interface contiendra forcément les méthodes de l'interface, avec la même signature (le même nom).
- les méthodes d'une interface doivent forcément être redéclarées dans les classes qui l'implémente
- Lorsqu'on utilise une interface il faut utiliser le mot-clé implements (pour une classe extends, pour un trait use).
class extends class
class implements interface
class { USE trait; }
- une interface n'est pas instanciable
- L'interface permet de représenter un point commun entre deux classes. cela permet d'exiger un comportement.
Bateau hérite de Véhicule
Avion hérite de Véhicule
Voiture hérite de Véhicule
Bateau, Avion, Voiture possède un point commun, le deplacement (Mouvement).
- une interface ne peut pas contenir de propriété
- une classe peut implementer plusieurs interfaces.
- Différence entre une classe abstraite et une interface : il n'est pas possible d'avoir des méthodes avec du contenu dans l'interface, alors que c'est possible dans la classe abstraite.
- Pour créer une interface, il faut réfléchir en terme de comportement et non pas d'entité.
 ************/
//------------------------------------------------------- Autres Exemples :
// implémentation de plusieurs interfaces
interface iA
{
	public function test1(); // pas de visibilité private car les méthodes doivent être redéfinie
}
interface iB
{
	public function test2();
}
class A implements iA, iB 	// implémente 2 interfaces. à condition que celles-ci n'aient aucune méthode portant le même nom !
{
	public function test1(){}
	public function test2(){}
}
//-------------------------------------------------------
// héritage entre interfaces
interface iC
{
	public function test1();
}
interface iD
{
	public function test2();
}
interface iE extends iC, iD // héritage multiple entre interfaces
{
	public function test3();
}
class B implements iE
{   //Pour ne générer aucune erreur, il va falloir écrire les méthodes de iA et de iB
	public function test1(){}
	public function test2(){}
	public function test3(){}
}
//-------------------------------------------------------
// héritage + implémentation
class C{}
class D extends C implements iA
{
	public function test1(){}
}
//-------------------------------------------------------