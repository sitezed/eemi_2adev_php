<?php
/*
 * [ Pour présenter ce passage, possibilité de créer des dossiers sous windows pour représenter les namespaces ]
 * Syntaxe simple, la plus utilisée
 *
 * Les espaces de noms sont pour les langages de programmation, ce que représentent les dossiers et fichiers dans Windows.
 * Càd : 2 fichiers portant le même nom ne peuvent pas cohabiter dans un seul dossier. Mais chacun de ces fichiers peut aller dans un dossier sans problème. En programmation on peut considérer que les espaces de noms sont les dossiers et les classes, constantes, fonctions sont les fichiers.
 *
 * En PHP, seuls les types de code suivants peuvent être affectés par les espaces de noms :
 * les classes (incluants les abstraites et les traits), les interfaces, les fonctions et les constantes.
 *
 * Il faut réfléchir en espaces de noms comme on réfléchi en chemins de dossiers et de fichiers
 * Exemple :
 * Je suis le fichier page.html, à côté de moi se trouve le fichier image.jpg, nous nous trouvons tous les deux dans le dossier web
 * Si je veux appeler le fichier image.jpg à partir de page.html en chemin relatif je fais src = 'image.jpg'
 * Si je veux appeler le fichier image.jpg à partir de page.html en chemin absolu je fais src= '/web/image.jpg'
 * Si j'ai des sous dossiers dans lesquels se trouves des fichiers, je devrais faire des chemins avec les sous dossiers jusqu'au fichiers.
 *
 * Les namespaces c'est pareil
 *
 * Si j'ai des sous espaces de noms, je devrais faire des chemins avec les sous espaces de noms jusqu'au classes et fonctions
 *
 *
 *  */
namespace EspacePerso; // permet de déclarer un namespace, doit être la 1ere ligne de code avant tout (seul declare est permis avant)
// Je me trouve dans mon namespace EspacePerso;
    const MA_CONSTANTE = 'Je suis dans EspacePerso';
    class MaClasse { public $prop = 'Je suis dans EspacePerso'; }
    function maFonction() { return 'Je suis dans EspacePerso';  }

    $objet = new MaClasse(); // me permet d'instancier MaClasse qui se trouve dans mon EspacePerso (chemin relatif) (exemple de src = 'image.jpg'). En PHP se nomme : Qualified name
    $objet2 = new \EspacePerso\MaClasse(); // me permet d'instancier MaClasse qui se trouve dans mon EspacePerso qui lui même se trouve dans l'espace global (chemin absolu) (exemple de src= '/web/image.jpg'). En PHP se nomme : Fully qualified name
    echo 'Affichage dans EspacePerso : ' . __NAMESPACE__ . '<hr>';
//-----------------------------------------------------------------------------------------------------

namespace AutreEspace; // chaque fois que nous déclarons un namespace nous repartons de l'espace global (de la racine)
    const MA_CONSTANTE = 'Je suis dans AutreEspace';
    class MaClasse { public $prop = 'Je suis dans AutreEspace'; }
    function maFonction() { return 'Je suis dans AutreEspace';  }

    $objet = new MaClasse(); // me permet d'instancier MaClasse qui se trouve dans mon AutreEspace (chemin relatif)
    $objet2 = new \AutreEspace\MaClasse(); // me permet d'instancier MaClasse qui se trouve dans mon AutreEspace qui lui même se trouve dans l'espace global (chemin absolu)
    echo 'Affichage dans AutreEspace : ' . __NAMESPACE__ . '<hr>';
//-----------------------------------------------------------------------------------------------------

namespace EspacePerso\NiveauDuDessous\NiveauPlusBas;
    const MA_CONSTANTE = 'Je suis dans EspacePerso\NiveauDuDessous\NiveauPlusBas';
    class MaClasse { public $prop = 'Je suis dans EspacePerso\NiveauDuDessous\NiveauPlusBas'; }
    function maFonction() { return 'Je suis dans EspacePerso\NiveauDuDessous\NiveauPlusBas';  }

    $objet = new MaClasse(); // me permet d'instancier MaClasse qui se trouve dans mon NiveauPlusBas (chemin relatif)
    $objet2 = new \EspacePerso\NiveauDuDessous\NiveauPlusBas\MaClasse(); // me permet d'instancier MaClasse qui se trouve dans mon NiveauPlusBas qui lui même se trouve dans l'espace global\EspacePerso\NiveauDuDessous (chemin absolu)
    echo 'Affichage dans EspacePerso\NiveauDuDessous\NiveauPlusBas : ' . __NAMESPACE__ . '<hr>';

namespace EspacePerso;
echo NiveauDuDessous\NiveauPlusBas\MA_CONSTANTE; // chemin relatif

namespace EspacePerso\NiveauDuDessous\NiveauPlusBas;

/*****************
 Actuellement, Je me trouve dans le dernier espace déclaré DONC EspacePerso\NiveauDuDessous\NiveauPlusBas
********************/
$objetA = new \EspacePerso\MaClasse(); // j'appel la classe de EspacePerso
$objetB = new \AutreEspace\MaClasse(); // j'appel la classe de AutreEspace
$objetC = new MaClasse(); // j'appel la classe de EspacePerso\NiveauDuDessous\NiveauPlusBas car je m'y trouve
$constA = \EspacePerso\MA_CONSTANTE;
$constB = \AutreEspace\MA_CONSTANTE;
$constC = MA_CONSTANTE;
$fonctA = \EspacePerso\maFonction();
$fonctB = \AutreEspace\maFonction();
$fonctC = maFonction();

var_dump($objetA);
var_dump($objetB);
var_dump($objetC);

/*
Synthèse : Dans cet exemple et si l'on devait faire une comparaison avec des dossiers, c'est comme si j'avais déclaré une arborescence de cet ordre :
    - Dossier EspacePerso
              - fichier Class
              - fichier fonction
              - fichier CONSTANTE
              - dossier NiveauDuDessous
                        - dossier NiveauPlusBas
                                  - fichier Class
                                  - fichier fonction
                                  - fichier CONSTANTE
    - Dossier AutreEspace
              - fichier Class
              - fichier fonction
              - fichier CONSTANTE

Important : Lorsque je me trouve dans un namespace et que j'instancie une classe ou utilise une fonction d'un autre namespace, je dois toujours utiliser le "\" pour repartir de l'espace global (comme si je sortais de mon dossier pour aller à la racine)

Il est fortement recommandé, en tant que pratique de codage, de ne pas mélanger plusieurs espaces de noms dans le même fichier.
L'utilisation recommandée est de combiner plusieurs scripts PHP dans le même fichier (require('script1.php')).
Si toutefois on souhaite avoir plusieurs espaces de noms dans le même fichier, il faut utiliser la syntaxe à accolades.

*/

