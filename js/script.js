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
         
    $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

//    footerAlwaysInBottom();
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

        });
}

    function clearfixFooter(){
        var docHeight = $(window).height();
        var footerTop = $('#footer').position().top + $('#footer').height();
        if (footerTop < docHeight) {
            $('#footer').css("margin-top", (1200 - footerTop) + "px");
        }
    }

    function footerAlwaysInBottom() {
        var docHeight = $(document).height();
        var footerTop = $('#footer').position().top + $('#footer').height();

        if (footerTop < docHeight) {
//            $('#footer').attr("style""margin-top", (docHeight - footerTop) + "px");
            $('#footer').attr('style','margin-top:'+(docHeight - footerTop)+ "px");
        }
    }

function cleanUp(){
    $('#home').removeClass('active')
    $('#projet').removeClass('active')
    $('#membre').removeClass('active')
    $('#profil').removeClass('active')
}

function getWindowHeight() {
    var windowHeight=0;
    if (typeof(window.innerHeight)=='number') {
        windowHeight=window.innerHeight;
    }
    else {
     if (document.documentElement&&
       document.documentElement.clientHeight) {
         windowHeight = document.documentElement.clientHeight;
    }
    else {
     if (document.body&&document.body.clientHeight) {
         windowHeight=document.body.clientHeight;
      }
     }
    }
    return windowHeight;
}

function setFooter() {
    if (document.getElementById) {
        var windowHeight=getWindowHeight();
        if (windowHeight>0) {
            var contentHeight=
            document.getElementById('content').offsetHeight;
            var footerElement=document.getElementById('footer');
            var footerHeight=footerElement.offsetHeight;
        if (windowHeight-(contentHeight+footerHeight)>=0) {
            footerElement.style.position='relative';
            footerElement.style.top=
            (windowHeight-(contentHeight+footerHeight))+'px';
        }
        else {
            footerElement.style.position='static';
        }
       }
      }
}