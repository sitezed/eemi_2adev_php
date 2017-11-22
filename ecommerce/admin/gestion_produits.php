<?php
require_once('../includes/init.inc.php');
$title = 'gestion des produits';
$msg = '';
if(!empty($_SESSION['error_message'])) {
  foreach ($_SESSION['error_message'] as $key => $value) {
    $msg .= '<div class="alert alert-danger">'.$value.'</div>';
  }
  unset($_SESSION['error_message']);
} else if(!empty($_SESSION['success_message'])) {
	$msg = '<div class="alert alert-success">'. $_SESSION['success_message'] . '</div>';
	unset($_SESSION['success_message']);
}
require_once('../includes/haut.inc.php');
require_once('../includes/menu.inc.php');
?>
<h1><?= $title ?></h1>
<h2>Ajouter un produit</h2>
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
    <div class="form-group">
      <label for="titre">Titre</label>
      <input type="text" name="titre" class="form-control">
    </div>
    <div class="form-group">
      <label for="reference">Reference</label>
      <input type="text" name="reference" class="form-control">
    </div>
    <div class="form-group">
      <label for="prix">Prix</label>
      <input type="text" name="prix" class="form-control">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Photo</label>
      <!-- BOUTON UPLOAD type="file" -->
      <input type="file" name="photo" class="form-control">
    </div>
    <div class="form-group">
      <label for="quantite">Quantite</label>
      <input type="text" name="quantite" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
  </form>




<?php
require_once ('../includes/bas.inc.php');


