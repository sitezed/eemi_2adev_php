<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// afficher tous les produits
Route::get('/produits', 'ProductController@catalogue')->name('produits');

// afficher un produit
Route::get('/produit/afficher/{id}', 'ProductController@afficher')->name('afficher_produit');

// ajouter un produit afficher le formulaire
Route::get('/produit/ajout', 'ProductController@formAjout')->name('ajouter_produit');

// ajouter un produit, enregistrer en BDD (traitement)
Route::post('/produit/ajout', 'ProductController@traitAjout')->name('enregistrer_produit');


// supprimer un produit
Route::get('/produit/suppr/{id}', 'ProductController@supprimer')->name('supprimer_produit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
