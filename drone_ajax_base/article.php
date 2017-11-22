<?php
// connexion BDD
$pdo = new PDO('mysql:host=localhost;dbname=drone_base', 'root', 'root',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);

// verifier que la connexion BDD est bien passee var_dump($pdo)

// je verifie si je recupere bien mes POST de formulaire
// echo '<pre>';
// print_r($_post);
// echo '</pre>';

// affichage
$result = $pdo->query('
    SELECT id, prenom, DATE_FORMAT(date, \'%d/%m/%Y à %H:%i\') AS date_fr, commentaire 
    FROM commentaires
    ORDER BY id DESC
    ');
$comments = $result->fetchAll(PDO::FETCH_ASSOC);
$commentsCount = $result->rowCount(); // je recupere le nombre de lignes SQL, soit le nombre de comentaires
// autre maniere, je compte le nombre díndices dans le tableau :
// $commentsCount = count($comments);
// echo '<pre>';
// print_r($comments);
// echo '</pre>';


?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Les drones</title>
    <link rel="stylesheet" href="styles/style.css" type="text/css">
  <style>
    .apparition {
      display: none;
    }
  </style>
</head>
<body style="height:5000px;">
<h1>Les drones de plus en plus présents</h1>

<div class="article clearfix">
    <img src="photos/drone.jpg" alt="drone volant"/>

    <p>Un drone (de l'anglais « faux-bourdon »), également appelé UAV (pour Unmanned Aerial Vehicle),
        ou encore RPAS (Remotely Piloted Aircraft Systems), est un aéronef sans personne à bord,
        télécommandé ou autonome, qui peut éventuellement emporter une charge utile,
        destinée à des missions (ex. : de surveillance, de renseignement, d'exploration,
        de combat, de transport, etc.). Les drones ont d'abord été utilisés au profit
        des forces armées ou de sécurité — police, douane, etc. — d'un État, mais ont aussi
        des applications civiles (Cinéma, télévision, agriculture, environnement) ou cinématographiques.
        La charge utile du drone de combat ou UCAV (Unmanned Combat Aerial Vehicle) en fait une arme.</p>
</div>
<div class="reaction">
    <?= (!empty($msg)) ? $msg : '' ?>
    <p class="etiquette"><span id="nbreCommentaires"><?= $commentsCount ?></span> commentaire(s) Laissez le vôtre ! :)</p>

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

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="envoi.js"></script>
</body>
</html>