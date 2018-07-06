// installer l'id="join_projet" au bouton d'inscription au projet
// et le name=<?= id du projet selon la bdd ?>


function get_projet_id(){
   // var projet_Id = $("#join_projet").val();
    
    var projet_Id = {
            projetId : 36};
    console.log(projet_Id);
    
//    console.log(data);
    $.ajax({
        type: "POST",
      // dataType : 'json',
        url : "http://dreamfrom/projet/join",
        data : projet_Id,
        success : function(retour){
            alert(retour);
//            window.location.href = "http://administration.restologue.bwb/";
        },
        error : function(){
           alert('Erreur d\'authentification, veuillez réessayer');
        }

    });
}