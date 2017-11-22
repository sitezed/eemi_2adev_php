<?php
require 'init.php';

// verifier que la connexion BDD est bien passee var_dump($pdo)

// je verifie si je recupere bien mes POST de formulaire
// echo '<pre>';
// print_r($_post);
// echo '</pre>';

// si je n'ai pas d'id article je quitte la page
if(empty($_GET['display_id_article']) || !is_numeric($_GET['display_id_article'])) {
  header('location:/eemi/php/drone_ajax/article.php?display_id_article=1');
  die();
}


// recuperation de l'article concerne
$result = $pdo->prepare('
    SELECT id, titre, contenu, photo 
    FROM articles
    WHERE id = :id_article
    ');
$result->bindValue(':id_article', $_GET['display_id_article'], PDO::PARAM_INT);
$result->execute();
$article = $result->fetch(PDO::FETCH_ASSOC);

// recuperation des commentaires de l'article concerné
$result = $pdo->query('
    SELECT commentaires.id, commentaires.prenom, DATE_FORMAT(date, \'%d/%m/%Y à %H:%i\') AS date_fr, commentaire 
    FROM commentaires
    WHERE article_id = '.$article['id'].'
    ORDER BY date DESC
    ');
$comments = $result->fetchAll(PDO::FETCH_ASSOC);
$commentsCount = $result->rowCount(); // je recupere le nombre de lignes SQL, soit le nombre de comentaires


?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Les drones</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css" type="text/css">
  <style>
    .apparition {
      display: none;
    }
  </style>
</head>
<body style="height:5000px;">
<?php include('menu.php') ?>
<h1><?= $article['titre'] ?></h1>

<div class="article clearfix">
    <img id="photo_article" src="admin/photos/<?= $article['photo'] ?>" alt="drone volant"/>

    <p id="article" data-id-article="<?= $article['id'] ?>"><?= $article['contenu'] ?></p>
</div>
<?php
// recuperer la liste de tous les articles
$getArticles = $pdo->query('SELECT id, titre FROM articles');
$displayArticles = $getArticles->fetchAll(PDO::FETCH_ASSOC);
?>
<form>
  <select name="display_id_article" id="selectArticles">
		<?php foreach($displayArticles as $value) : ?>
      <option <?php if($value['id'] == $article['id']) : ?> selected <?php endif;?>
        value="<?= $value['id'] ?>"><?= $value['titre'] ?>
      </option>
		<?php endforeach; ?>
  </select>
  <button type="submit">changer d'article</button>
</form>
<div class="reaction">
    <?= (!empty($msg)) ? $msg : '' ?>
    <p class="etiquette"><span id="nbreCommentaires"><?= $commentsCount ?></span> commentaire(s)</p>

    <form id="formComment" method="post">
        <div class="saisie">
            <div class="user clearfix">
                <div class="prenom">
                    <label for="prenom">Votre prénom</label>
                    <input name="prenom" id="prenom" type="text" />
                </div>
                <div class="email">
                    <label for="email">Votre email</label>
                    <input name="email" id="email" type="text" />
                </div>
            </div>
            <label for="commentaire">Commentaire</label>
            <textarea name="commentaire" id="commentaire"></textarea>
        </div>
        <p class="etiquette">
            <button type="reset">EFFACER</button>
            <button type="submit">ENVOYER</button>
        </p>
    </form>
</div>
<div class="separation" id="separation"></div>

<?php if(!empty($comments) && is_array($comments)) : ?>
    <?php foreach($comments as $value) : ?>
      <div id="commentaire_<?= $value['id']?>" data-id="<?= $value['id']?>" class="commentaire">
        <p class="pseudo"><?= $value['prenom'] ?>
            <span class="date">Publié le <?= $value['date_fr'] ?></span></p>

        <p class="texte"><?= $value['commentaire'] ?></p>
      </div>
    <?php endforeach; ?>
<?php endif; ?>

<script src="js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="envoi.js"></script>
</body>
</html>