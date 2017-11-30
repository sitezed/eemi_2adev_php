<?php
require_once( 'includes/init.inc.php' );

// creer un table HTML representant le panier
// avec suppression d'un produit (bouton X sur la ligne du produit)
// avec suppression de l'ensemble du panier (bouton vider le panier)
//unset($_SESSION['cart']);

$nbreProduitsDansPanier = count($_SESSION['cart']['id']);
$totalPanier = 0; // j'initialise une variable a 0 qui va contenir mon total panier additionné

require_once 'includes/haut.inc.php';
require_once 'includes/menu.inc.php';
?>
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Produit</th>
							<th style="width:10%">Prix</th>
							<th style="width:8%">Quantité</th>
							<th style="width:22%" class="text-center">Total</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>

				<?php
				for($i=0; $i<$nbreProduitsDansPanier; $i++) :
					// a chaque tour de boucle, jaditionne le prix total produit au total du panier
					$totalPanier += $_SESSION['cart']['prix_total_produit'][$i];
					?>
					<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs">
										<img src="<?= PUBLIC_URL . '/assets/photos/' .
										              $_SESSION['cart']['photo'][$i] ?>"
										     alt="<?= $_SESSION['cart']['titre'][$i] ?>"
										     class="img-responsive"/>
									</div>
									<div class="col-sm-10">
										<h4 class="nomargin">
											<?= $_SESSION['cart']['titre'][$i] ?>
										</h4>
										<small><?= $_SESSION['cart']['reference'][$i] ?></small>
										<p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</td>
							<td data-th="Price">
								<?= $_SESSION['cart']['prix_unitaire'][$i] ?>€
							</td>
							<td data-th="Quantity">
								<input type="number" class="form-control text-center"
								       value="<?= $_SESSION['cart']['quantite'][$i] ?>">
							</td>
							<td data-th="Subtotal" class="text-center">
								<?= $_SESSION['cart']['prix_total_produit'][$i] ?>€
							</td>
							<td class="actions" data-th="">
								<button class="btn btn-info btn-sm">
									<i class="fa fa-refresh"></i>
								</button>
								<button class="btn btn-danger btn-sm">
									<i class="fa fa-trash-o"></i>
								</button>
							</td>
						</tr>

					<?php endfor; ?>

					</tbody>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong>Total General <?= $totalPanier ?>€</strong></td>
						</tr>
						<tr>
							<td><a href="<?= PUBLIC_URL . '/catalogue_produits.php' ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i> Retour en boutique</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total general <?= $totalPanier ?>€</strong></td>
							<td><a href="" class="btn btn-success btn-block">Commander <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>
</div>

<?php

dd($_SESSION);
require_once 'includes/bas.inc.php';