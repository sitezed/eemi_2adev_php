<?php
require_once('init.inc.php');
//--------------------------------

// code PHP pour affichage des messages
// 1 : je VALIDE ma requete SQL :
// SELECT pseudo, message, DATE_FORMAT(date_heure, "%d/%m/%Y à %Hh%i") AS date_fr FROM tchat ORDER BY date_heure DESC
// 2 : je pose ma requette SQL (sans bug) dans mon environnement PHP

$resultat = $pdo->query('SELECT id, pseudo, message, DATE_FORMAT(date_heure, "%d/%m/%Y à %Hh%i") AS date_fr FROM tchat ORDER BY id DESC');
// var_dump($pdo);
// echo '<hr>';
// var_dump(get_class_methods($resultat));

// $resultat nous donne un objet PDOStatement. Cet objet contient le texte (pseudo, message, date_heure) de la base de donnees, que nous souhaitons afficher en HTML.
// // Pour recuperer ce texte, je dois passer par une methode / fonction de PDOStatement. 
// echo '<pre>';
// print_r($resultat->fetchAll(PDO::FETCH_ASSOC));
// echo '</pre>';
// echo '<hr>';
// je recupere le smessages dans une variable $messages, qui devient un donc un ARray qui contient toutes les infos de ma table TCHAT
$messages = $resultat->fetchAll(PDO::FETCH_ASSOC); 
// echo '<pre>';
// print_r($messages);
// echo '</pre>';
// echo '<hr>';


?>
<!-- --------------------------------------------------- -->
<!doctype html>
<html>
	<head>
		<title>Tchat</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<meta charset=utf-8>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<?php if(!empty($msg)) { echo $msg; } ?> 
					<form id="formMessage" method="post" action="">
						<div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">@</span>
						  <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Votre pseudo" aria-label="Username" aria-describedby="basic-addon1">
						</div>
						<div class="input-group">
						  <span class="input-group-addon" id="basic-addon1">@</span>
						  <textarea id="message" name="message" class="form-control" placeholder="Votre message" aria-label="Username" aria-describedby="basic-addon1"></textarea>
						</div>
						<input type="submit" name="soumettre" value="envoyer" class="btn btn-default">
					</form>
				</div>
			</div>
				<h1 id="titreMessages">Affichage des messages</h1>
			<?php 
				foreach($messages as $key => $value) :
					?>
					<div class="row message-block" data-id-message="<?= $value['id'] ?>" id="msg_<?= $key ?>">
						<div class="col-md-6">
							<p><?= $value['pseudo'] ?></p>
						</div>
						<div class="col-md-6">
							<p>Le <?= $value['date_fr'] ?></p>
						</div>
						<div class="col-md-12">
							<p><?= $value['message'] ?></p>
						</div>
					</div>	
					<hr>
					<?php
				endforeach;
			?>
		</div>		
		
		<script src="jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
    <script src="envoi.js"></script>
	</body>
</html>
	
	
	
	
	
	
	
	
	
	
	
	
	