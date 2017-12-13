<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function catalogue() {

    	$data['products'] = Product::all();

    	return view('produits.catalogue', $data);
    }

    public function afficher($id){
    	try{
		    $data['produit'] = Product::findOrFail($id);
		    return view('produits.fiche_produit', $data);
	    } catch(ModelNotFoundException $e) {
    		return redirect()->route('produits');
	    }



    }

	/**
	 * Afficher le formulaire d'ajout produit
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function formAjout() {
    	return view('produits.formulaire');
    }

  public function traitAjout(Request $request) {
		$produit = new Product();

		$produit->reference = $request->reference;
		$produit->titre = $request->titre;
		$produit->slug = str_slug($request->titre);
		$produit->prix = (int) $request->prix;
		$produit->description = $request->description;
	  $produit->quantite = (int) $request->quantite;

	  $produit->save();

//	  $produit->photo = $request->photo;
  }

  public function supprimer($id){

		$destroy = Product::destroy($id);


		if($destroy) {
			flash('Suppressin OK')->success();
		} else {
			flash('Suppression Pas OK')->error();
		}


		return redirect()->route('produits');

  }

}

















