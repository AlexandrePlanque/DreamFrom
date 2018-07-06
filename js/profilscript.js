
$( document ).ready(function() {
//    var clone = $('#hidden').clone().removeClass('hide');
//    clone.find("h4").text('yolooo')
//    clone.find("img").attr('src', "https://c.pxhere.com/photos/72/3e/beauty_bloom_blue_droplets_flora_flower_fresh_macro-917079.jpg!d")
//    clone.find("div.progress-bar").attr('style', "width:70%")
// $('#contenuProfil').append(clone);
// $('#contenuProfil').append(clone);

    switch(GetURLParameter('display')){
        case "profil" :
            displayProfil();
            break;
        case "projet" :
            displayProjet();
            break;
        case "message" :
            displayMessage();
            break;
        default :
            displayProfil();
    }

    
});


//$( "#btnprofil" ).click(function
function displayProfil() {
    
    $( "#togglepromsg" ).addClass('hide');
    $( "#toggleprojet" ).addClass('hide');
    $( "#toggleprofil" ).removeClass('hide');
    $( "#btnprofil" ).addClass('activebtn');
    $( "#btnprojet" ).removeClass('activebtn');
    $( "#btnmsg" ).removeClass('activebtn');
//    $( document ).clearQueue();
//    $( "#togglemsg" ).fadeOut(  );
//    $( "#toggleprojet" ).fadeOut(  ).queue(function(next){
//    setTimeout(clearfixProfil,900);
//    $( "#toggleprofil" ).removeClass('hide').fadeIn(  );
//    next();
//});
//  $( "#btnprofil" ).addClass('activebtn');
//  $( "#btnprojet" ).removeClass('activebtn');
//  $( "#btnmsg" ).removeClass('activebtn');
  
};

function displayProjet() {
    
    $( "#toggleprofil" ).addClass('hide');
    $( "#togglemsg" ).addClass('hide');
    $( "#toggleprojet" ).removeClass('hide');
    $( "#btnprojet" ).addClass('activebtn');
    $( "#btnprofil" ).removeClass('activebtn');
    $( "#btnmsg" ).removeClass('activebtn');
//    $( document ).clearQueue();
//    $( "#togglemsg" ).fadeOut(  );
//    $( "#toggleprofil" ).fadeOut(  ).queue(function(next){
//    setTimeout(clearfixProjet,900);
//    $( "#toggleprojet" ).removeClass('hide').fadeIn(  );
//    next();
//});
//  $( "#btnprojet" ).addClass('activebtn');
//  $( "#btnprofil" ).removeClass('activebtn');
//  $( "#btnmsg" ).removeClass('activebtn');
  
};

function displayMessage() {
    $( "#toggleprofil" ).addClass('hide');
    $( "#toggleprojet" ).addClass('hide');
    $( "#togglemsg" ).removeClass('hide');
    $( "#btnmsg" ).addClass('activebtn');
    $( "#btnprojet" ).removeClass('activebtn');
    $( "#btnprofil" ).removeClass('activebtn');
//    $( document ).clearQueue();
//    $( "#toggleprofil" ).fadeOut(  );
//    $( "#toggleprojet" ).fadeOut(  ).queue(function(next){
//    setTimeout(clearfixMsg,900);
//    $( "#togglemsg" ).removeClass('hide').fadeIn(  );
//    next();
//});
//  $( "#btnmsg" ).addClass('activebtn');
//  $( "#btnprofil" ).removeClass('activebtn');
//  $( "#btnprojet" ).removeClass('activebtn');

};

$('#btnedit').click(function(){
var choix = document.getElementById( "theme" );
var valeurChoix = choix.options[ choix.selectedIndex ].value;
var date = document.getElementById( "date" );
var valeurDate = date.options[ date.selectedIndex ].value;
window.location.href = 'http://dreamfrom/projets/?intitule='+valeurChoix+"&date_creation="+valeurDate;
});

$("#formprofil").submit(function(event){
    event.preventDefault();
    preparePut();
});


function preparePut(id, idadr){
    var user = {
        "id" : id,
        "nom" : $("#nom").val(),
        "prenom" : $("#prenom").val(),
        "tel" : $("#tel").val(),
        "email" : $("#email").val(),
        "theme_id" : $("#theme").val()
    };

    var addr = {
        "id": idadr,
        "rue": $("#rue").val(),
        "numero": $('#numero').val(),
        "ville": $("#ville").val(),
        "code_postal": $("#code_postal").val()
    };
    var data = {
        user : user,
        adresse: addr
    };
    
    $.ajax({
//        dataType : 'json',
        url : "http://dreamfrom/api/edit/"+id,
        type: "POST",
        data : data,
        success : function(e){
            console.log(e)
        },
        error : function(e){
           alert('Transmission échouée');
        }

    });
}

function clearfixProfil(){
    $( "#toggleprojet" ).addClass('hide');
    $( "#togglemsg" ).addClass('hide');
}

function clearfixProjet(){
    $( "#toggleprofil" ).addClass('hide');
    $( "#togglemsg" ).addClass('hide');
}

function clearfixMsg(){
    $( "#toggleprofil" ).addClass('hide');
    $( "#toggleprojet" ).addClass('hide');
}

//$( document ).ready(function() {


    
    
    
    
//    showProjet()
//})
function showProfil(){
    $("#id").append($("<div>").addClass('col-6 mt-4 profil mb-4').attr('id','toggleprofil').append(
            $('<div>').addClass('card-outline-secondary mt-2 debugprofil').append(
            $('<div>').addClass('card-img-top').append(
            $('<img>').addClass('img-fluid profilavatar offset-1 mt-5').attr('src','http://www.mag-ma.org/files/design/avatar_default.png')).append(
            $('<button>').addClass('btn mt-3 avatarbtn').attr('type', 'button').text("Modifier l'avatar"))).append(
            $('<div>').addClass('card-body').append(
            $('<form>').addClass('form').attr({role:"form", autocomplete:"off", id:"formprofils"}).append(
            $('<div>').addClass('form-row').append(
            $('<div>').addClass('input-group mb-2 col-md-6 active-cyan-4').append(
            $('<div>').addClass('input-group-prepend').append(
            $('<div>').addClass('input-group-text').append(
            $('<i>').addClass('fas fa-user-circle')))).append(
            $('<input>').addClass('form-control').attr({id:'nom',type:'text',name:'nom',placeholder:'Nom'}))).append(
            $('<div>').addClass('input-group mb-2 col-md-6 active-cyan-4').append(
            $('<div>').addClass('input-group-prepend').append(
            $('<div>').addClass('input-group-text').append(
            $('<i>').addClass('fas fa-user-circle')))).append(
            $('<input>').addClass('form-control').attr({id:'prenom',type:'text',name:'prenom',placeholder:'Prenom'}))))))))
    }

function showProjet(data){
        $.ajax({
//        dataType : 'json',
        type: "GET",
        url : "http://dreamfrom/api/projet/1",//+id,
        dataType : "JSON",
        success : function(data){

            console.log(data);
            showProjet(data)
        },
        error : function(e){
           alert('Transmission échouée');
        }

    });
    for(var i = 0; i< data.length; i++){
//        alert(data[i]);
    $('#cardprojet').append($('<div>').addClass('card card-outline-secondary text-center mt-2 cardprojet').append(
            $('<div>').addClass('card-header').append(
            $('<h4>').text(data[i].titre))).append(
            $('<div>').addClass('card-body').append(
            $('<img>').addClass('card-img projetimg').attr('src',data[i].image)).append(
            $('<p>').addClass('card-text').text('Progression')).append(
            $('<div>').addClass('progress custombgprogress mb-3').append(
            $('<div>').addClass('progress-bar customprogress').attr('style','width:'+data[i].featProgress))).append(
            $('<div>').addClass('bar-basic').attr('value','100')).append(
            $('<a>').addClass('btn btn-primary').attr('href',"#").text('Accéder au projet'))).append(
            $('<div>').addClass('card-footer text-muted').text('4651 days ago')));
}


}

    function GetURLParameter(sParam){
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++){
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] === sParam){
                return sParameterName[1];
            }
        }
    }