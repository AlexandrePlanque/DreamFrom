function search(){


var yourSelect = document.getElementById( "theme" );
var test = yourSelect.options[ yourSelect.selectedIndex ].value;

var b = document.getElementById( "date" ).options[ document.getElementById( "date" ).selectedIndex ].value;

var c = document.getElementById( "username" ).value;
var ura = "/?pseudo="+c;
var uri = (test === ''? '': '/?intitule='+test)+(b !== '' && test === ''? (b === ''? '': '/?date_creation='+b) : (b === ''? '': '&date_creation='+b));

window.location.href = 'http://appalpha/membres'+(c !== ''? ''+ura : ''+uri);

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
window.location.href = 'http://appalpha/projets/?intitule='+valeurChoix+"&date_creation="+valeurDate;


}
