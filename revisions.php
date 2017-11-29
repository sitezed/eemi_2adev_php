<?php
// Instruction d'affichage.
echo 'Bonjour<br>';
//---------------------------------------
// concat�nation.
$x = "Hello";
$y = "tout le monde";
echo $x . ' ' . $y . '<br>';
echo $x , ' ' , $y , '<br>';
//---------------------------------------
// guillemets et quotes
echo 'Bonjour $y aujourd\'hui<br>';
echo "Bonjour $y <br>"; 
//---------------------------------------
// variables
$prenom = 'Nicolas';
$prenom .= 'Marie';
echo $prenom . '<br>';
echo "$prenom<br>";
//---------------------------------------
// conditions
$a = 10; $b = 5; $c = 2;
if($a > $b)
{
	echo '$a est bien sup�rieur a $b<br>';
}
else
{
	echo '$a n\'est pas sup�rieur a $b<br>';
}
if($a > $b)	echo '$a est bien sup�rieur a $b<br>';
else echo '$a n\'est pas sup�rieur a $b<br>';

if($a > $b && $b > $c) // && AND
{
	echo 'ok pour les 2 conditions<br>';
}

if($a == 9 || $b > $c) // || OR
{
	echo 'ok au moins pour l\'une des deux conditions<br>';
}

if($a == 8)
{
	echo '$a est �gal a 8<br>';
}
elseif($a != 10)
{
	echo '$a est diff�rent de 10<br>';
}
else
{
	echo 'message par d�faut.<br>';
}

$couleur = 'bleu';
if($couleur == 'bleu') echo 'la couleur c\'est bleu<br>';
elseif($couleur == 'jaune') echo 'la couleur c\'est jaune<br>';
elseif($couleur == 'vert') echo 'la couleur c\'est vert<br>';
elseif($couleur == 'orange') echo 'la couleur c\'est orange<br>';
else echo 'autre couleur <br>';

echo ($a == 10) ? "a est �gal a 10<br>" : "a n'est pas �gal a 10<br>";

$z = (isset($a)) ? $a : '';
echo $z . '<br>'; // 10

$e = 1;
$f = "1";
if($e == $f)	echo '$e est bien �gal a $f<br>';
if($e === $f)	echo '$e est bien �gal a $f<br>';
/*
= affectation.
== comparaison de la valeur.
=== comparaison de la valeur et du type.
*/
//------------------------------------------------------------------
// fonctions pr�d�finies
$pseudo = 'joker';
echo iconv_strlen($pseudo) . '<br>'; // 5 caracteres.
	// Description : Retourne le nombre de caract�res d'une cha�ne.
	// Liste des arguments attendus : chaine de caractere.
	// Valeurs de retour : nombre de caractere de la chaine.

echo date('d/m/Y H:i:s') . '<br>'; //27/09/2017
//------------------------------------------------------------------
// fonctions utilisateurs
function bonjour($qui)
{
	return "Bonjour $qui <br>";
}

echo bonjour('Etienne');
echo bonjour('Amandine');

function jourSemaine()
{
	$jour = 'mercredi';
	return $jour ;
}

$jourRecupere = jourSemaine();
echo $jourRecupere ;

$pays = 'France';

function affichagePays()
{
	global $pays;
	echo $pays; 
}
affichagePays();

// phpinfo();

// function estAdulte(int $age) : bool
// {
	// if($age >= 18) return true;
	// else return false;
// }

// var_dump(estAdulte(5));
// var_dump(estAdulte(35));
//-------------------------------------------------------
// Boucle
// $i = 1;
// while($i <= 5)
// {
	// echo "<h1>Produit $i</h1>";
	// echo "<img src=\"http://lorempixel.com/150/100/sports/$i\"><br><hr><br>";
	// $i++;
// }
	
echo '<select>';
for($annee = date('Y'); $annee >= (date('Y')-100); $annee--)
{
	$annee = ($annee-9);
	echo "<option>$annee</option>";
}
echo '</select>';


$i = 2017;
echo '<select>';
while($i >= (date('Y')-100))
{
	echo "<option>$i</option>";
	$i = $i-10;
}
echo '</select><br><br>';
//---------------------------------------------------------
// Array
$listePrenom = array('gregoire', 'marie', 'jean', 'amandine', 'nicolas');
echo '<pre>'; print_r($listePrenom); echo '</pre>';
var_dump($listePrenom);
echo implode($listePrenom, '<br>');
echo implode('<br>', $listePrenom);
	// description : Rassemble les �l�ments d'un tableau en une cha�ne.
	// parametres attendus : array , caractere de separation.
	// valeur de retour : retourne une chaine de caract�re.
echo '<br>' . $listePrenom[1] . '<br>';
echo '<br>';
foreach($listePrenom AS $indice => $valeur)
{
	echo "$indice => $valeur <br>";
}

$listeCouleur[] = 'jaune';
$listeCouleur[] = 'orange';
$listeCouleur[] = 'bleu';
$listeCouleur[] = 'rouge';
echo '<pre>'; print_r($listeCouleur); echo '</pre>';
//------------------------------------------------
// Classe & Objet
class Etudiant
{
	public $prenom = 'Julien';
	public $age = 25;
	public function pays()
	{
		return 'France';
	}
}

$etudiant = new Etudiant ;
var_dump($etudiant);
echo $etudiant->prenom . '<br>';
echo $etudiant->age . '<br>';
echo $etudiant->pays() . '<br>';

// Une classe permet de regrouper plusieurs �l�ments (variables, fonction, array) en fonction d'un m�me sujet.
// Pour utiliser une classe, il est n�cessaire d'�crire "new" afin de l'instancier. $etudiant est un objet issue de la classe Etudiant.


/*
ecriture "<?=" signifie "<?php echo". Nous utilisons cette syntaxe comme contraction lors de saisies dans le HTML
*/

// isset et empty

$nimporteKoi = '';
if(isset($nimporteKoi)) {
	echo '$nimporteKoi existe';
	echo $nimporteKoi;
}

if(!empty($nimporteKoi)) {
	echo '$nimporteKoi n\'est pas vide';
}


$tableau = [
'coco' => 'riko', 
'objet' => 'chaise'
];

// rappel tableaux PHP
$tableau = [
	['septembre'=>'fraises', 'autre valeur' => 'ordinateur'],
	['septembre'=>'pommes', 'encore valeur' => 'bureau'],
	['septembre'=>'bananes'],
	['septembre'=>'oranges']
];

foreach ( $tableau as $key => $value ) {
	foreach ( $value as $k => $v ) {
			echo $v . '</br>';
	}
}
echo '<pre>';
print_r($tableau);
echo '</pre>';
$tableau2 = ['septembre' => 'framboises'];
echo $tableau2['septembre']; // framboises

echo $tableau[0]['septembre']; // fraise
foreach ( $tableau as $key => $value ) {
	echo $key . ':' . $value['septembre'] . '<br>';
}

var_dump($tableau);














