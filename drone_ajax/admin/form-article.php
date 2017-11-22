<?php
require '../init.php';
// s'il n'y a pas de session USER alors, je le renvoi sur la page index qui correspond a ma page de connexion / isncription
if(!isset($_SESSION['user'])) {
  header('location:index.php');
  die();
}

$msg = NULL;
if(!empty($_GET['message']) && $_GET['message'] == 'ajout_ok') {
  $msg = '<div class="alert alert-success">Article ajouté avec succès</div>';
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/css/bootstrap.min.css">
  <title>Ajout article</title>
</head>
<body>
<?php include('../menu.php') ?>
<div class="container">
  <div class="row">
    <?= ($msg) ? $msg : '' ?>
    <!-- ENCTYPE permet d'indiquer que nous sommes dans un formulaire avec un bouton upload -->
    <form action="traitement-ajout-article.php" enctype="multipart/form-data" method="post">
      <div class="form-group">
        <label for="exampleInputPassword1">Titre</label>
        <input type="text" name="titre" class="form-control">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Article</label>
        <textarea class="form-control" name="contenu" id="article-content" cols="30" rows="10"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Photo</label>
        <!-- BOUTON UPLOAD type="file" -->
        <input type="file" name="photo" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
  </div>
</div>
<script src="../js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
  $(function() {

    $('#login-form-link').click(function(e) {
      $("#login-form").delay(100).fadeIn(100);
      $("#register-form").fadeOut(100);
      $('#register-form-link').removeClass('active');
      $(this).addClass('active');
      e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
      $("#register-form").delay(100).fadeIn(100);
      $("#login-form").fadeOut(100);
      $('#login-form-link').removeClass('active');
      $(this).addClass('active');
      e.preventDefault();
    });


    $('#register-form').on('submit', function(e){
      e.preventDefault();

      $.post()

    });

  });
</script>
</body>
</html>