<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?= (!empty($active) && 'afficher_produits' === $active) ? 'active' : '' ?>" >
          <a href="<?= PUBLIC_URL . '/admin/afficher_produits.php' ?>">Afficher Produits</a>
        </li>
        <li class="<?= (!empty($active) && 'ajouter_produit' === $active) ? 'active' : '' ?>" >
          <a href="<?= PUBLIC_URL . '/admin/gestion_produits.php' ?>">Ajouter Produit<span class="sr-only">(current)</span></a>
        </li>
        <li class="<?= (!empty($active) && 'afficher_clients' === $active) ? 'active' : '' ?>" >
          <a href="<?= PUBLIC_URL . '/admin/afficher_clients.php' ?>">Afficher Clients</a>
        </li>
        <li class="<?= (!empty($active) && 'ajouter_client' === $active) ? 'active' : '' ?>" >
          <a href="<?= PUBLIC_URL . '/admin/gestion_clients.php' ?>">Ajouter Client<span class="sr-only">(current)</span></a>
        </li>
        <li class="<?= (!empty($active) && 'catalogue_produits' === $active) ? 'active' : '' ?>" >
          <a href="<?= PUBLIC_URL . '/catalogue_produits.php' ?>">Catalogue des produits<span class="sr-only">(current)</span></a>
        </li>
        <li><a href="">Deconnexion</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

