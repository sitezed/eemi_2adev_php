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

  @include('flash::message')

	@foreach($products as $key => $value)
  <div class="col-md-6">
    <form method="post" action="ajout_panier.php" style="border: 2px solid black; padding: 5px;">
      <input type="hidden" name="id_produit" value="{{ $value->id  }}">
      <p>reference : {{ $value->reference  }}</p>
      <p>titre : {{ $value->titre  }}</p>
      <p>photo : <a href="{{ route('afficher_produit', $value->id) }}">
          <img src="{{ asset('photos/') . $value->photo }}" width="120" alt="{{ $value->photo  }}">
        </a>
      </p>
      <p> <a href="{{ route('supprimer_produit', $value->id) }}">
          supprimer
        </a>
      </p>
      <p>prix : {{ $value->prix  }}</p>
      <label for="quantite">Qauntite</label>
      <select name="quantite" id="quantite">
				@for($i=1; $i <= intval($value->quantite); $i++ )
        <option value="{{ $i }}">{{ $i }}</option>
				@endfor
      </select>
      <button type="submit">Ajouter au panier</button>
    </form>
  </div>
	@endforeach

</div>

</div> <!-- fermeture du container -->
<div style="margin-top: 100px;"></div> <!-- petite marge -->
<!-- assets est le dossier qui contient les sources du FRONT, soit le Javascript, le CSS, les images -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
</html>