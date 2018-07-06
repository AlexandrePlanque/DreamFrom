$( document).ready(function(){
    var url = $(location).attr('href');
    switch (url.split('?')[0]) {
            
        case ("http://dreamfrom/") :
            cleanUp()
            $('#home').addClass('active')
            break;
        case("http://dreamfrom/projets") :
            cleanUp()
            $('#projet').addClass('active')
            break;
        case("http://dreamfrom/membres") :
            cleanUp()
            $('#membre').addClass('active')
            break;
        case("http://dreamfrom/bar") :
            cleanUp()
            $('#bar').addClass('active')
            break;
        case("http://dreamfrom/profil/") :
            cleanUp()
            $('#profil').addClass('active')
            break;
            
    }
            
    

})

function search(){
var yourSelect = document.getElementById( "theme" );
var test = yourSelect.options[ yourSelect.selectedIndex ].value;

var b = document.getElementById( "date" ).options[ document.getElementById( "date" ).selectedIndex ].value;

var c = document.getElementById( "username" ).value;
var ura = "/?pseudo="+c;
var uri = (test === ''? '': '/?intitule='+test)+(b !== '' && test === ''? (b === ''? '': '/?date_creation='+b) : (b === ''? '': '&date_creation='+b));

window.location.href = 'http://dreamfrom/membres'+(c !== ''? ''+ura : ''+uri);

}

function searchProjet(){

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


}

function disconnect(){
    $.ajax({
        type: "GET",
        url: "http://dreamfrom/logout",
        dataType: 'json',

//        success: function (data) {
//            console.log(data);
//            alert('ya bon bb');
//            if(data.length > 0){
//              msg(data, id);
//          }else{noMsg()}
//
//        },
//        error: function (param1, param2) {
//            alert('ya PAS bon bb');
//            
//        }
        });



}

function cleanUp(){
    $('#home').removeClass('active')
    $('#projet').removeClass('active')
    $('#membre').removeClass('active')
    $('#profil').removeClass('active')
}
