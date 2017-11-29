<?php
require_once( '../includes/init.inc.php' );
$title  = 'Affichage des produits';
$msg    = '';
$active = 'afficher_produits';

// suppression d'un produit
if ( ! empty( $_GET['suppr'] ) && is_numeric( $_GET['suppr'] ) ) {
	// recuperation du nom de la photo a supprimer
	$getPhoto = $pdo->prepare( 'SELECT photo FROM produits WHERE id = :id' );
	$getPhoto->bindValue( ':id', $_GET['suppr'] );
	$getPhoto->execute();
	$photo = $getPhoto->fetch( PDO::FETCH_ASSOC );

	$delete = $pdo->prepare( 'DELETE FROM produits WHERE id = :id' );
	$delete->bindValue( ':id', $_GET['suppr'], PDO::PARAM_INT );
	$supprOk = $delete->execute();
	if ( $supprOk ) {
		// si le fichier existe, je le supprime
		if ( file_exists( PUBLIC_PATH . '/assets/photos/' . $photo['photo'] ) ) {
			unlink( PUBLIC_PATH . '/assets/photos/' . $photo['photo'] );
		}
		$msg = '<div class="alert alert-success">Suppression du produit ' . $_GET['suppr'] . ' OK !</div>';
	} else {
		$msg = '<div class="alert alert-danger">Probleme lors de la suppression du produit ' . $_GET['suppr'] . '.<br>Veuillez actualiser la page et reessayer</div>';
	}
}

if ( ! empty( $_SESSION['old_values'] ) ) {
	extract( $_SESSION['old_values'] ); // je fabrique des variables a partir des cles du tableau DONC $_SESSION['titre'] devient $titre
	unset( $_SESSION['old_values'] ); // j'ai recupere les infos de ol_values, je peux detruire ce tableau.
}

$selectProducts = $pdo->query( 'SELECT id, titre, reference, prix, photo, quantite FROM produits' );
$products       = $selectProducts->fetchAll( PDO::FETCH_ASSOC );

require_once( '../includes/haut.inc.php' );
require_once( '../includes/menu.inc.php' );
?>
  <h1><?= $title ?></h1>
<?= $msg ?>
<?php
if ( ! empty( $products ) && is_array( $products ) ) :
	?>
  <h2>Tableau des produits</h2>
  <table class="table">
    <thead>
    <tr>
      <!-- ici nous affichons les tritres de notre Table HTML, en nous basant sur les titres du 1er array PHP dans l'indice 0 -->
			<?php foreach ( $products[0] as $titles => $value ) : ?>
        <th scope="col"><?= $titles ?></th>
			<?php endforeach; ?>
      <th>Mod</th>
      <th>Suppr</th>
    </tr>
    </thead>
    <tbody>
		<?php foreach ( $products as $value ) : ?>
      <tr>
				<?php foreach ( $value as $k => $v ) : ?>
          <td>
						<?= ( 'photo' === $k ) ? '<img src="' . PUBLIC_URL . '/assets/photos/' . $v . '" width=50>' : $v ?>
          </td>
				<?php endforeach; ?>
        <td>
          <a href="<?= PUBLIC_URL . '/admin/gestion_produits?modif=' . $value['id'] ?>">
            <i class="fa fa-pencil"></i>
          </a>
        </td>
        <td>
          <a onclick="return confirm('T sûr ??')" href="<?= '?suppr=' . $value['id'] ?>">
            <i class="fa fa-trash"></i>
          </a>
        </td>
      </tr>
		<?php endforeach; ?>
    </tbody>
  </table>


  <hr>
  ////////////////////////////////////////////////// Version une seule boucle foreach
  <hr>
  <table class="table">
    <thead>
    <tr>
      <!-- ici nous affichons les tritres de notre Table HTML, en nous basant sur les titres du 1er array PHP dans l'indice 0 -->
      <th>id</th>
      <th>titre</th>
      <th>reference</th>
      <th>prix</th>
      <th>photo</th>
      <th>quantite</th>
      <th>Mod</th>
      <th>Suppr</th>
    </tr>
    </thead>
    <tbody>
		<?php foreach ( $products as $value ) : ?>
      <tr>
        <td><?= $value['id'] ?></td>
        <td><?= $value['titre'] ?></td>
        <td><?= $value['reference'] ?></td>
        <td><?= $value['prix'] ?></td>
        <td><img src="<?= PUBLIC_URL . '/assets/photos/' . $value['photo'] ?>" width="50" alt=""></td>
        <td><?= $value['quantite'] ?></td>
        <td>
          <a href="<?= PUBLIC_URL . '/admin/gestion_produits?modif=' . $value['id'] ?>">
            <i class="fa fa-pencil"></i>
          </a>
        </td>
        <td>
          <a onclick="return confirm('T sûr ??')" href="<?= '?suppr=' . $value['id'] ?>">
            <i class="fa fa-trash"></i>
          </a>
        </td>
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
require_once( '../includes/bas.inc.php' );


