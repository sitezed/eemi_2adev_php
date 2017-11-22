$(function(){

  // au moment ou je soumet le formulaire, jenvoie les donnees au serveur
  $('#formComment').on('submit', function(e){

    e.preventDefault(); // annuler conportement a defaut

    var objetEnvoye = {
      prenom : $('#prenom').val(),
      email : $('#email').val(),
      commentaire : $('#commentaire').val(),
      id_commentaire : $('.commentaire').first().attr('data-id'),
    };

    // console.log(objetEnvoye);

    $('#formComment')[0].reset(); // je reset le formulaire
    $.post(
      'reception.php',
      objetEnvoye,
      function(reponse){
        // reponse du serveur
        $('#separation').after(reponse.commentaires);
        $('.apparition').fadeIn(1200);
        var ancienNombre = $('#nbreCommentaires').html();
        var nouveauNombre = parseInt(ancienNombre) + parseInt(reponse.nbreCommentaires);
        $('#nbreCommentaires').html(nouveauNombre);
      },
      'JSON'
    );
  });

  // au moment ou jappuie sur entree, je soumet le formulaire
  $('#formComment').on('keypress', function(e){

    if(e.keyCode === 13) {
      $('#formComment').submit();
    }

  });

});