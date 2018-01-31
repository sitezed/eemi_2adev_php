<?php
include('ns_fichier_1a.php');
// echo MA_CONSTANTE; // cela ne fonctionne pas car je me trouve dans l'espace global
echo Ville\Maison\Chambre\MA_CONSTANTE; // comme je me trouve dans l'ESPACE GLOBAL, j'utilise le CHEMIN ABSOLU pour ressortir et appeler MA_CONSTANTE de Ville\Maison\Chambre
//===========================================================================

// Cela équivaut à faire :

/*

namespace Ville\Maison\Chambre {
    const MA_CONSTANTE = 'Je suis la constante dans Ville\Maison\Chambre';
    class Maclasse {
        public $prop = 'Je suis la classe dans Ville\Maison\Chambre';
    }
}

namespace {
    echo \Ville\Maison\Chambre\MA_CONSTANTE;
}

*/

// Synthèse : "ns_fichier_1a.php" contient le namespace Ville\Maison\Chambre. J'ai inclu "ns_fichier_1a.php" dans "ns_fichier_1b.php".
// TRÈS IMPORTANT : EN FAISANT CETTE INCLUSION, "ns_fichier_1b.php" EST DEVENU UN ESPACE GLOBAL (il ferme l'espace perso de ns_fichier_1a.php).
// INCLUSION DE FICHIER = RETOUR À L'ESPACE GLOBAL (à condition de ne pas avoir déclaré de namespace avant l'inclusion, DANS fichier 1b. Voir fichier 2a et 2b)