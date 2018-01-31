<?php

// ce code va générérer une érreur car je ne peux pas REDÉCLARER une fonction PRÉDÉFINIE PHP


function strlen()
{
    return ('Je ne veux pas compter de chaines de caractères');
}



// je crée un espace perso où je peux redéfinir cette fonction

namespace monEspace {
    function strlen()
    {
        return ('Je ne veux pas compter de chaines de caractères<hr>');
    }

    echo strlen(); // je me suis approprié la fonction strlen()
    echo \strlen('Ma chaine à compter'); // je fais appel à la fonction prédéfinie de PHP dans l'espace global à l'aide du "\" placé devant 
}
