<?php
namespace SanDiego; // Je déclare un namespace TOUJOURS EN PREMIER
include('ns_fichier_2a.php'); // j'inclus le namespace LosAngeles
// Je me trouve dans l'espace SanDiego
const MA_CONSTANTE = 'Je suis la constante dans SanDiego<br>';
class Maclasse {
    public $prop = 'Je suis la classe dans SanDiego<br>';
}

// En faisant l'inclusion de ns_fichier_2a (qui contient le ns LosAngeles), AVEC déclaration du ns SanDiego, cela revient à mettre SanDiego À CÔTÉ de Los Angeles et NON PAS DEDANS !

// Cependant je suis toujours dans SanDiego

echo MA_CONSTANTE; // Ma constante de SanDiego
echo \SanDiego\MA_CONSTANTE; // Ma constante de SanDiego

echo \LosAngeles\MA_CONSTANTE; // Ma constante de LosAngeles

//========================================================

// Cela équivaut à
/*

namespace Sandiego {
    const MA_CONSTANTE = 'Je suis la constante dans SanDiego<br>';
    class Maclasse {
    public $prop = 'Je suis la classe dans SanDiego<br>';
    }
}

namespace LosAngeles {
    const MA_CONSTANTE = 'Je suis la constante dans LosAngeles';
    class Maclasse {
        public $prop = 'Je suis la classe dans LosAngeles';
    }    // mon code ici;
}

namespace Sandiego {
    echo MA_CONSTANTE; // Ma constante de SanDiego
    echo \SanDiego\MA_CONSTANTE; // Ma constante de SanDiego

    echo \LosAngeles\MA_CONSTANTE; // Ma constante de LosAngeles
}

*/

// Synthèse : "ns_fichier_1a.php" contient le namespace LosAngeles.
// J'ai inclu "ns_fichier_2a.php" dans "ns_fichier_2b.php".
// J'ai déclaré namespace SanDiego juste au dessus de l'inclusion

// TRÈS IMPORTANT : EN FAISANT CETTE DÉCLARATION NAMESPACE + INCLUSION, "ns_fichier_2b.php" EST DEVENU UN ESPACE SANDIEGO.
// DÉCLARATION NAMESPACE + INCLUSION DE FICHIER = ÉQUIVAUT À ÉCRIRE LES NAMESPACES LES UNS À CÔTÉS DES AUTRES, ET LE NAMESPACE OÙ NOUS NOUS TROUVONS EST CELUI DU FICHIER QUI APPEL LES AUTRES