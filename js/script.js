
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

var b = document.getElementById( "date" );
var tast = b.options[ b.selectedIndex ].value;
var tost = test + tast;

window.location.href = 'http://dreamfrom/membres/?intitule='+test+"&date_creation="+tast;


}

