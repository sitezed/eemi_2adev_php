<?php
// o	Transitivité : si B hérite de A et si C hérite de B alors C hérite de A ;
class A
{
	private function coco() {} // innaccessible dans les filles
	public function test1()
	{
		return 'test1';
	}
	protected function test(){	return "test";	}
}
class B extends A
{
	public function test2()
	{
		return 'test2';
	}
}
class C extends B
{
	public function test3()
	{
		echo $this->test() . ' '; // on peut appeler une méthode protected de A qui n'est pourtant pas son parent direct.
		return 'test3';
	}
}
//---------------------
$c = new C;
echo $c->test1() . '<hr />'; // méthode de A accessible par C (héritage)
echo $c->test2() . '<hr />'; // méthode de B accessible par C (héritage)
echo $c->test3() . '<hr />'; // méthode de C accessible par C
print "<pre>"; print_r(get_class_methods('C')); print "</pre>"; // Retourne toutes les méthodes
/*

		Si C hérite de B
			que B hérite de A
				...alors C hérite de A...
		les méthodes protected de A sont accessible dans C (pourtant l'héritage est indirect car cela passe par B).
		les méthodes protected sont accessible dans la classe où elles ont été définie ou dans LES classes filles (les classes descendante).
*/
/*******************
Non reflexif : class D extends D // erreur, une classe ne peut pas hériter d’elle même.
Non symétrique : class F extends E // F hérite de E, mais, E n'hérite pas de F.
Sans cycle : class X{}
class Y extends X{}
class X extends Y{} // erreur, il n'est pas possible que Y hérite de X et que X hérite de Y.
Pas d'héritage multiple : class G extends I, J{} // erreur
 *******************/