<?php
require('init.php');

// je prepare ma requete d'insertion, puis, je lie les POSTS aux variables SQL, puis je l'execute
if(!empty($_POST['commentaire'])) {
	if(
		!empty($_POST['commentaire'])
		&& !empty($_POST['prenom'])
		&& !empty($_POST['email'])
	) {
		$insert = $pdo->prepare('INSERT INTO commentaires(article_id, prenom, email, commentaire, date)
                        VALUES ( :article_id, :prenom, :email, :commentaire, NOW() )');
		$insert->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
		$insert->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
		$insert->bindValue(':commentaire', $_POST['commentaire'], PDO::PARAM_STR);
		$insert->bindValue(':article_id', $_POST['id_article'], PDO::PARAM_STR);

		$insert->execute();

		if(!empty($_POST['id_commentaire'])) {
			$resultat = $pdo->prepare(
				'SELECT id, prenom, DATE_FORMAT(date, \'%d/%m/%Y à %H:%i\') AS date_fr, commentaire
							  FROM commentaires
							  WHERE id > :id_commentaire
							  ORDER BY date DESC
							  ');
			$resultat->bindValue(':id_commentaire', $_POST['id_commentaire'], PDO::PARAM_INT);
			$resultat->execute();
		} else {
			$resultat = $pdo->query(
				'SELECT id, prenom, DATE_FORMAT(date, \'%d/%m/%Y à %H:%i\') AS date_fr, commentaire
							  FROM commentaires
							  ORDER BY date DESC
							  ');
		}

		$comments = $resultat->fetchAll(PDO::FETCH_ASSOC);

		$content = ''; // j'initialise la variable qui va contenir mes divs commentaires
		foreach ( $comments as $value ) {
			$content .= '
			<div id="commentaire_' . $value['id'] . '" 
			data-id="'. $value['id'] .'" class="commentaire apparition">
        <p class="pseudo">'. $value['prenom'] .
            '<span class="date">Publié le '. $value['date_fr'] .'</span>
        </p>
        <p class="texte">' . $value['commentaire'] . '</p>
      </div> ';
		}

		$laReponse = [
			'commentaires' => $content,
			'nbreCommentaires' => $resultat->rowCount()
			];
		echo json_encode($laReponse); // je transforme $laReponse en JSON

	} else {
		$msg = '<div class="alert alert-danger">Veuillez remplir TOUS les champs</div>';
	}
}

?>