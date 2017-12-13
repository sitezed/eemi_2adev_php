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

  <div class="col-md-6">
    <div>
      reference : {{ $produit->reference }}<br>
      titre : {{ $produit->titre }}<br>
      prix : {{ $produit->prix }}<br>
      description : {{ $produit->description }}<br>
      photo : {{ $produit->photo }}
    </div>
  </div>

</div>

</div> <!-- fermeture du container -->
<div style="margin-top: 100px;"></div> <!-- petite marge -->
<!-- assets est le dossier qui contient les sources du FRONT, soit le Javascript, le CSS, les images -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
</html>