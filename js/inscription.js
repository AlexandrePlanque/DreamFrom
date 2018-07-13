$(document).ready(function(){
$("#inscription").submit(function(event){
    event.preventDefault();
    prepareSignIn();
});
});

function prepareSignIn(){
    var user = {
        "nom" : $("#nom").val(),
        "prenom" : $("#prenom").val(),
        "pseudo" : $("#pseudo").val(),
        "email" : $("#email").val(),
        "password" : $("#password").val()
    };
    console.log(user);
    var data = {
        user : user,
    };
    
    $.ajax({
        url : "http://dreamfrom/api/user",
        type: "POST",
//        dataType : 'json',
        data : user,
        statusCode: {
        200: function() {

            $("#formSignIn").notify(
              "Inscription réussie, merci de vérifier vos mails pour activer votre compte.", "success",
              { position:"bottom left" }
            );
        },
        500:function(){
            $("#formSignIn").notify(
              "Une erreur est survenue vérifier vos informations.", "error",
              { position:"left" }
            );

        }
    }
//        success : function(e){
//        },
//        error : function(e){
//            $.notify("Une erreur provenant de nos serveurs est survenu, désolé pour le désagrément.", "error");
////           alert('Transmission échouée');
//        }

    });
}
