
$( document ).ready(function() {

  $( "#toggleprojet" ).fadeOut(  );
  $( "#togglemsg" ).fadeOut(  );



$( "#btnprofil" ).click(function() {
    $( "#toggleprojet" ).addClass("projetprofil");
    $( "#toggleprojet" ).fadeOut(  );
    $( "#toggleprojet" ).fadeOut(  ).queue(function(next){
    $( "#toggleprofil" ).fadeIn(  );
    next();
});

  $( "#btnprofil" ).addClass('activebtn');
  $( "#btnprojet" ).removeClass('activebtn');
  
});


});


$( "#btnprojet" ).click(function() {
    $( "#toggleprofil" ).fadeOut();
    $( "#togglemsg" ).fadeOut();
    $( "#toggleprojet" ).removeClass( "projetprofil hide" );
    $( "#toggleprojet" ).fadeIn(  );

  $( "#btnprojet" ).addClass('activebtn');
  $( "#btnprofil" ).removeClass('activebtn');
  
});
  
$( "#btnmsg" ).click(function() {
    $( "#toggleprofil" ).fadeOut();
    $( "#toggleprojet" ).fadeOut();
    $( "#toggleprojet" ).removeClass( "projetprofil hide" );
    $( "#togglemsg" ).fadeIn(  );

  $( "#btnmsg" ).addClass('activebtn');
  $( "#btnprofil" ).removeClass('activebtn');
  $( "#btnprojet" ).removeClass('activebtn');

});

$('#btnedit').click(function(){
    $("#")
// selection du theme 
var choix = document.getElementById( "theme" );
// transformation en valeur equivalente dans la bdd
var valeurChoix = choix.options[ choix.selectedIndex ].value;

var date = document.getElementById( "date" );
var valeurDate = date.options[ date.selectedIndex ].value;
//var valeurs = valeurChoix + valeurDate;

//var collaborateur = document.getElementById( "" );
//var valeurDate = date.options[ date.selectedIndex ].value;
window.location.href = 'http://dreamfrom/projets/?intitule='+valeurChoix+"&date_creation="+valeurDate;



})

$("#formprofil").submit(function(event){
    event.preventDefault();
    preparePut()
});


function preparePut(id, idadr){
var user = {
    id : id,
    nom : $("#nom").val(),
    prenom : $("#prenom").val(),
    tel : $("#tel").val(),
    email : $("#email").val(),
    theme_id : $("#theme").val()
};

var addr = {
    id: idadr,
    rue: $("#rue").val(),
    numero: $('#numero').val(),
    ville: $("#ville").val(),
    code_postal: $("#code_postal").val()
}
var data = {
    user : user,
    adresse: addr
}

console.log(data);
    $.ajax({
        type: "PUT",
        dataType : 'json',
        url : "http://dreamfrom/api/edit/"+id,
        data : data,
        success : function(retour){
            alert('ya bon');
//            window.location.href = "http://administration.restologue.bwb/";
        },
        error : function(param1, param2){
           alert('Erreur d\'authentification, veuillez réessayer');
        }

    });
}