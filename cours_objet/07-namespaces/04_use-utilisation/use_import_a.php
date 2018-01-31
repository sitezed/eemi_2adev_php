<?php
namespace USA\Texas\Houston;
    const MA_CONSTANTE = 'Je suis dans USA\Texas\Houston<br>';

namespace RienAVoir;
    const MA_CONSTANTE = 'Je suis dans RienAVoir<br>';
    class MaClasse {
        public $maProp = 'Je suis la classe du namespace RienAVoir';
        public function getInfo()
        {
            echo 'Je suis la méthode de MaClasse dans le namespace RienAVoir<br>';
        }
    }

    class MaClasse2 {
        public $maProp2 = 'Je suis la classe2 du namespace RienAVoir';
        public function getInfo()
        {
            echo 'Je suis la méthode de MaClasse2 dans le namespace RienAVoir<br>';
        }
    }