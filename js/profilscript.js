//$("button").click(function(){
//    $("#card").animate({
//        width: '0',
//        opacity: '0.5',
//        zIndex: "-10",
//        display: "hiden"
//        });
//                $("#card").delay(800000).addClass('cardtest');
//
//}); 


$( "div" ).click(function() {

});
$( document ).ready(function() {

//  $( "#toggleprojet" ).toggle( "slide" );
//  $( "#togglemessage" ).toggle( "slide" );



$( "#btnprofil" ).click(function() {
    
    $( "#toggleprojet" ).fadeOut( "slide" );
    if($("#btnprojet").hasClass("activebtn")){
  $( "#toggleprofil" ).fadeIn( "slide" ).delay(900);
    $( "#btnprojet" ).removeClass('activebtn');
    }
  
  $( "#btnprofil" ).addClass('activebtn');

});
$( "#btnprojet" ).click(function() {
  if($("#btnprofil").hasClass("activebtn")){
  $( "#toggleprofil" ).fadeOut( "slide" );
  $( "#btnprofil" ).removeClass('activebtn');
  }
  
  $( "#toggleprojet" ).fadeIn( "slide" ).delay(90000, $( "#toggleprojet" ).removeClass('hide'));
//  $( "#toggleprojet" ).removeClass('hide').delay();
//  if($("#btnmessage").hasClass("activebtn")){
//  $( "#togglemessage" ).toggle( "slide" ).delay(900);
//  $( "#btnmsg" ).removeClass('activebtn');
//  }
  $( "#btnprojet" ).addClass('activebtn');
});

});