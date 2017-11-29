<?php
require_once( 'includes/init.inc.php' );
$title  = 'Catalogue des produits';
$msg    = '';

// nous recuperons tous les produits
$produits = selectAll('produits');

require_once( 'includes/haut.inc.php' );
require_once( 'includes/menu.inc.php' );
?>

<div class="row">
  <?php foreach($produits as $key => $value) : ?>
    <div class="col-md-6">
      <form action="ajout_panier.php" style="border: 2px solid black; padding: 5px;">
        <input type="hidden" value="<?= $value['id'] ?>">
        <p>reference : <?= $value['reference'] ?></p>
        <p>titre : <?= $value['titre'] ?></p>
        <p>photo : <a href="fiche_produit.php?id=<?= $value['id'] ?>">
            <img src="<?= PUBLIC_URL . '/assets/photos/' . $value['photo'] ?>" width="120" alt="<?= $value['photo'] ?>">
          </a>
        </p>
        <p>prix : <?= $value['prix'] ?></p>
        <label for="quantite">Qauntite</label>
        <select name="quantite" id="quantite">
          <?php for($i=1; $i <= intval($value['quantite']); $i++ ) : ?>
          <option value="<?= $i ?>"><?= $i ?></option>
          <?php endfor ?>
        </select>
        <button type="submit">Ajouter au panier</button>
      </form>
    </div>
  <?php endforeach; ?>
</div>





<?php
require_once( 'includes/bas.inc.php' );