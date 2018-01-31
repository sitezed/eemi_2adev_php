<?php
namespace USA\Colorado;
include('ns_fichier_3a.php');
include('ns_fichier_3b.php');

class ClassColorado extends Denver\ClassDenver{
    // si je veux hériter de la classe de Denver je dois ajouter le chemin qui conduit vers elle
}

echo __NAMESPACE__ . '<hr>';

echo Denver\MA_CONSTANTE; // j'utilise le chemin relatif pour accéder à DENVER
echo Lakewood\MA_CONSTANTE; // j'utilise le chemin relatif pour accéder à Lakewood

echo \USA\Colorado\Denver\MA_CONSTANTE; // j'utilise le chemin absolu pour accéder à DENVER
echo \USA\Colorado\Lakewood\MA_CONSTANTE; // j'utilise le chemin absolu pour accéder à Lakewood

$objet = new ClassColorado(); // héritage de Denver
$objet2 = new Lakewood\ClassLakewood(); // chemin relatif
$objet3 = new \USA\Colorado\Lakewood\ClassLakewood(); // chemin absolu

var_dump($objet);
var_dump($objet2);
var_dump($objet3);

//====================================================================================
// Cela équivaut à :

/*

namespace USA\Colorado\Denver {
    const MA_CONSTANTE = 'Je suis la constante de USA\Colorado\Denver<br>';
}

namespace USA\Colorado\Lakewood {
    const MA_CONSTANTE = 'Je suis la constante de USA\Colorado\Lakewood<br>';
}

namespace USA\Colorado {
    echo Denver\MA_CONSTANTE;
    echo Lakewood\MA_CONSTANTE;

    echo \USA\Colorado\Denver\MA_CONSTANTE;
    echo \USA\Colorado\Lakewood\MA_CONSTANTE;
}

*/

// Synthèse : Lorsque je créé des namespaces aux noms composés, cela crée une hiérarchie.
// Je me trouve dans le ns USA\Colorado, et en incluant USA\Colorado\Denver et USA\Colorado\Lakewood, je peux appeler Denver et Lakewood directement en chemins relatifs.
// C'est exactement pareil pour les dossiers, sous dossiers, fichiers ...
// Infos sup : Pour accéder à n'importe quelle classe prédéfinie, constante prédéfinie ou fonction prédéfinie on utilise le "\" devant,
//  exemple :  echo \strlen('okok'); $objet = new \Mysqli();
// On ne peut pas redefinir les constantes magiques même dans un espace de nom privé
// __NAMESPACE__ permet d'afficher l'espace de nom où l'on se trouve