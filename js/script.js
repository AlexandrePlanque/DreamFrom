
$(document).ready(function(){
//active state  
//$(function() {
//    $('li a').click(function(e) {
//        e.preventDefault();
//        var $this = $(this);
//        $this.closest('ul').find('li.active,a.active').removeClass('active');
//        $this.addClass('active');
//        $this.parent().addClass('active');
//
//    });
//  });
//if (location.pathname !== '/') {
//$("a[href*='" + location.pathname + "']").addClass("current");
//} else {
//var home = document.getElementById("home").getElementsByTagName('a')[0];
//home.className = 'current';
//}

});

function search(){
//    alert($('option').val());

var yourSelect = document.getElementById( "theme" );
var test = yourSelect.options[ yourSelect.selectedIndex ].value;
//(test === ''? alert("c'est vide"): alert ('ya pa bon'));

var b = document.getElementById( "date" ).options[ document.getElementById( "date" ).selectedIndex ].value;

var c = document.getElementById( "username" ).value;
var ura = "/?pseudo="+c;
var uri = (test === ''? '': '/?intitule='+test)+(b !== '' && test === ''? (b === ''? '': '/?date_creation='+b) : (b === ''? '': '&date_creation='+b));

window.location.href = 'http://dreamfrom/membres'+(c !== ''? ''+ura : ''+uri);


}

