<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/css/bootstrap-theme.min.css">
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/css/bootstrap.min.css">
  <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Produits</title>
</head>
<body>

<div class="container">
<div class="row">
  <form method="post" action="{{ route('enregistrer_produit') }}" style="border: 2px solid black; padding: 5px;">
  <div class="form-group">
    <label for="titre">Titre</label>
    <input type="text" name="titre" value="" class="form-control">
  </div>
  <div class="form-group">
    <label for="reference">Reference</label>
    <input type="text" name="reference" value="" class="form-control">
  </div>
  <div class="form-group">
    <label for="prix">Prix</label>
    <input type="text" name="prix" value="" class="form-control">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
  </div>
  <div class="form-group">
    <input type="hidden" name="photo_presente" value="">
    <label for="exampleInputPassword1">Photo</label>
    <!-- BOUTON UPLOAD type="file" -->
    <input type="file" name="photo" class="form-control">
  </div>
  <div class="form-group">
    <label for="quantite">Quantite</label>
    <input type="text" name="quantite" value="" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
  </form>

</div>

</div> <!-- fermeture du container -->
<div style="margin-top: 100px;"></div> <!-- petite marge -->
<!-- assets est le dossier qui contient les sources du FRONT, soit le Javascript, le CSS, les images -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
</html>