<?php
require_once('../includes/init.inc.php');
$title = 'gestion des produits';
$msg = '';
$active = 'ajouter_produit';

if(!empty($_SESSION['error_message'])) {
  foreach ($_SESSION['error_message'] as $key => $value) {
    $msg .= '<div class="alert alert-danger">'.$value.'</div>';
  }
  unset($_SESSION['error_message']);
} else if(!empty($_SESSION['success_message'])) {
	$msg = '<div class="alert alert-success">'. $_SESSION['success_message'] . '</div>';
	unset($_SESSION['success_message']);
	$success = true;
}

if(!empty($_SESSION['old_values'])) {
  if(!isset($success)) { // si je n'ai pas le message d'enregistrement avec succes
	  extract($_SESSION['old_values']); // je fabrique des variables a partir des cles du tableau DONC $_SESSION['titre'] devient $titre
  }
  unset($_SESSION['old_values']); // j'ai recupere les infos de ol_values, je peux detruire ce tableau.
}

if(!empty($_GET['modif']) && is_numeric($_GET['modif'])) {
  $product = selectOne('produits', $_GET['modif']);
  extract($product); // on extract $product ce qui nous donne acces aux variables qui vont preremplir les values du formulaire
}


$typeTitre = (!empty($_GET['modif'])) && is_numeric($_GET['modif']) ? 'Modifier' : 'Ajouter';
$typeBouton = (!empty($_GET['modif'])) && is_numeric($_GET['modif']) ? 'Modification' : 'Enregistrement';

require_once('../includes/haut.inc.php');
require_once('../includes/menu.inc.php');
?>
<h1><?= $title ?></h1>
<h2><?= $typeTitre ?> un produit</h2>
<!--

Formulaire de saisie d'un produit :
- reference
- titre
- prix
- description
- photo
- quantite
-->
  <?= $msg ?>
  <form class="col-md-4" action="traitement-ajout-produit.php" enctype="multipart/form-data" method="post">

    <?php if(!empty($id) && is_numeric($id)) : ?>
	    <input type="hidden" name="id_modif" value="<?= $id ?>">
    <?php endif; ?>
    <div class="form-group">
      <label for="titre">Titre</label>
      <input type="text" name="titre" value="<?= !empty($titre) ? $titre : '' ?>" class="form-control">
    </div>
    <div class="form-group">
      <label for="reference">Reference</label>
      <input type="text" name="reference" value="<?= !empty($reference) ? $reference : '' ?>" class="form-control">
    </div>
    <div class="form-group">
      <label for="prix">Prix</label>
      <input type="text" name="prix" value="<?= !empty($prix) ? $prix : '' ?>" class="form-control">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" cols="30" rows="10"><?= !empty($description) ? $description : '' ?></textarea>
    </div>
    <div class="form-group">
      <?php
        if(!empty($photo)) :
          ?>
          <input type="hidden" name="photo_presente" value="<?= $photo ?>">
          <img src="<?= PUBLIC_URL . '/assets/photos/' . $photo ?>" width=100 alt="<?= $photo ?>">
          <?php
        endif;
      ?>
      <label for="exampleInputPassword1">Photo</label>
      <!-- BOUTON UPLOAD type="file" -->
      <input type="file" name="photo" class="form-control">
    </div>
    <div class="form-group">
      <label for="quantite">Quantite</label>
      <input type="text" name="quantite" value="<?= !empty($quantite) ? $quantite : '' ?>" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary"><?= $typeBouton ?></button>
  </form>




<?php
require_once ('../includes/bas.inc.php');


