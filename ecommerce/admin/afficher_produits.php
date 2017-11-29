<?php
require_once('../includes/init.inc.php');
$title = 'Affichage des produits';
$msg = '';
$active = 'afficher_produits';
if(!empty($_SESSION['error_message'])) {
  foreach ($_SESSION['error_message'] as $key => $value) {
    $msg .= '<div class="alert alert-danger">'.$value.'</div>';
  }
  unset($_SESSION['error_message']);
} else if(!empty($_SESSION['success_message'])) {
	$msg = '<div class="alert alert-success">'. $_SESSION['success_message'] . '</div>';
	unset($_SESSION['success_message']);
}

if(!empty($_SESSION['old_values'])) {
	extract($_SESSION['old_values']); // je fabrique des variables a partir des cles du tableau DONC $_SESSION['titre'] devient $titre
  unset($_SESSION['old_values']); // j'ai recupere les infos de ol_values, je peux detruire ce tableau.
}

$selectProducts = $pdo->query('SELECT id, titre, reference, prix, photo, quantite FROM produits');
$products = $selectProducts->fetchAll(PDO::FETCH_ASSOC);

require_once('../includes/haut.inc.php');
require_once('../includes/menu.inc.php');
?>
  <h1><?= $title ?></h1>
<?= $msg ?>
<?php
if(!empty($products) && is_array($products)) :
?>
  <h2>Tableau des produits</h2>
  <table class="table">
    <thead>
    <tr>
      <!-- ici nous affichons les tritres de notre Table HTML, en nous basant sur les titres du 1er array PHP dans l'indice 0 -->
      <?php foreach($products[0] as $titles => $value) : ?>
      <th scope="col"><?= $titles ?></th>
      <?php endforeach; ?>
      <th>Mod</th>
      <th>Suppr</th>
    </tr>
    </thead>
    <tbody>
	<?php foreach($products as $value) : ?>
    <tr>
      <?php foreach ( $value as $v ) : ?>
        <td><?= $v ?></td>
      <?php endforeach; ?>
      <td><i class="fa fa-pencil"></i></td>
      <td><i class="fa fa-trash"></i></td>
    </tr>
  <?php endforeach; ?>
    </tbody>
  </table>

<?php
else :
?>
<h2>Pas de produits</h2>
<?php
endif; // fin if(!empty($products) && is_array($products))
require_once ('../includes/bas.inc.php');


