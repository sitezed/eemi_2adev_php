<?php
namespace USA\Texas;
include('use_import_a.php');
include('use_import_b.php');

// Actuellement je suis dans USA\Texas et "à côté" (avec l'include), il y a USA\Texas\Houston, USA\Texas\Dallas, RienAVoir et RienAvoir\Dans\B


echo Dallas\MA_CONSTANTE; // affichage OK (en chemin relatif)
echo Houston\MA_CONSTANTE; // affichage OK (en chemin relatif)

echo \RienAVoir\Dans\B\MA_CONSTANTE; // affichage OK (en chemin absolu)

use RienAVoir\Dans\B as RDB; // USE COMMENCE TOUJOURS À PARTIR DE LA RACINE
echo RDB\MA_CONSTANTE; // affiche 'Je suis dans RienAvoir\Dans\B<br>'

use RienAVoir\Dans\B; // équivaut à use \RienAvoir\Dans\B as B (il prend le dernier)
echo B\MA_CONSTANTE; // affiche 'Je suis dans RienAvoir\Dans\B<br>'

use RienAVoir\MaClasse; // j'importe explicitement une classe de l'espace RienAVoir
// équivaut à faire "use RienAVoir\MaClasse as MaClasse
$objet = new MaClasse();
// $objet2 = new MaClasse2(); // FATAL ERROR, car je suis dans USA\Texas
$objet->getInfo();
echo $objet->maProp;

use RienAVoir; // me permet d'utiliser toutes les classes de RienAVoir
$objet2 = new RienAVoir\MaClasse();
var_dump($objet2);
$objet3 = new RienAVoir\MaClasse2();
var_dump($objet3);

// revient au même que faire un
// $objet4 = new \RienAVoir\MaClasse();
// var_dump($objet4);


// On peut tous les écrire en une seule fois
// // use RienAVoir\Dans\B as RDB, RienAVoir\Dans\B, RienAVoir\MaClasse;

