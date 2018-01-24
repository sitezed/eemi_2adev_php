<?php
final class Application // une FINAL CLASS est une classe dont on ne peut pas hériter
{
	public function lancementApplication() {
		return 'l\'application se lance cela !<br>';
	}
}
// erreur je ne peux pas extend une final class
/*
class Extension extends Application
{

}
*/
$app = new Application(); // je peux !
echo $app->lancementApplication();
//------------------------------------------------
class Application1
{
	public function lancementApplication() {
		return 'La 2eme appli version BETA<br>';
	}
}
class Application2 extends Application1
{
	final public function lancementApplication() { // j'arrete la méthode ici, plus possible de l'overrider
		return 'La 2eme appli version ALPHA<br>';
	}
}
class Extension2 extends Application2
{
	//public function lancementApplication() { // erreur !
	// c'est mort !
	//}
}

$ext = new Extension2();
echo $ext->lancementApplication(); // rien ne m'enpeche de l'utiliser car Extension2 a tout de même hérité de l'utilisation de lancementApplication(). Droit d'utilisation mais pas de modification.
/********************
 * Commentaire *
- une CLASSE finale ne peut pas être héritée
une classe finale aura forcément des méthodes qui ne pourront pas être surchargées ou redéfinies. (pas d'interet à mettre le mot-clé final sur les méthodes d'une classe final).
Une class final peut comporter des méthodes normales (mais cela n'a aucun interet car on ne peut pas hériter d'une classe final donc il n'y a aucun risque que les méthodes soient redéfinie).
Une méthode private avec le mot clé final n'a aucun interet (car on ne peut les modifier qu'à l'intérieur de la classe, elles ne risquent pas de pouvoir être surchargée).
- une classe finale reste instanciable
- une méthode finale peut être présente dans une classe normale.
- une méthode finale permet d'éviter qu'elle soit redéfinie ou surcharger.
- L'interet de mettre le mot-clé 'final' sur une méthode est de vérouiller afin d'empecher toute sous-classe de la redéfinir (quand nous voulons être sûr que le comportement d'une méthode est préservé durant l'héritage)

 * Cas de figure *
Cela est pratique si je souhaite développer le noyau de l'application, en m'assurant que la méthodes soit disponible pour les autres développeurs sans qu'ils ne viennent changer le comportement de la méthode lancementApplication().
Contexte : tu as une class Application sur un site possédant plusieurs
méthodes clés pour assurer le bon fonctionnement du site. il faut hérité
de la class Application pour faire une nouvelle extension sur le site
mais ne pas pouvoir redefinir ou surchargé les méthodes "lancement_site()"
"chargement_site" elles seront donc finales.
Sur un énorme projet, en procédurale il faudra que le developpeur
qui te succède lise tout ton code. en OO tu lui passera juste un UML
 *******************/