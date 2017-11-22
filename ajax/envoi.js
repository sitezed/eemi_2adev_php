

// fichier envoi.js
$(function(){
	// code ici
	$('#selectBox').on('change', function(e){
		e.preventDefault(); // je bloque le comportement par defaut (utile pour bloquer le comportement d' un lien ou un bouton input)

    var objetEnvoye = {
      info: 'coucou',
      pseudo: 'batman',
      couleur: 'rouge',
      prenom: $('#prenom').html(),
      matiere: $('#matiere').val()
    };

		$.post('reception.php', objetEnvoye , function(response){
			console.info(response);

			$('img').after('<p>'+response.retour+'</p>');

		}, 'JSON')


	});

	$('#messageBox').on('keypress', function(e) {
	  // e.preventDefault(); // bloquer le comportement a defaut de mon evenement (dans ce cas la, keyPress)

    console.log(e.keyCode); // me permet de recuperer le code de la touche sur laquelle jappuie
    if(e.keyCode === 13 && $(this).val() !== '') {

      $.post(
        'http://apache.php71/eemi/php/ajax/reception.php', // url du fichier pour envoyer les donnees
        { commentaire: $(this).val() }, // les donnees a envoyer (objet JS)
        function(reponse){
          console.log(reponse.message);
        // correspond a la reponse que va me renvoyer le serveur, soit le code contenu dans reception.php
        $('#picture').before('<p>' + reponse.message + '</p>'); // reponse du serveur (json_encode() cote PHP)
      },
        'JSON'); // type de reponse attendue
    }

  });


	//----------------------------------
});