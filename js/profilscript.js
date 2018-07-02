
////$("button").click(function(){
//    $("#card").animate({
//        width: '0',
//        opacity: '0.5',
//        zIndex: "-10",
//        display: "hiden"
//        });
//                $("#card").delay(800000).addClass('cardtest');
//
//}); 

$( document ).ready(function() {

  $( "#toggleprojet" ).fadeOut(  );
  $( "#togglemessage" ).fadeOut(  );



$( "#btnprofil" ).click(function() {
    $( "#toggleprojet" ).addClass("projetprofil");
    $( "#toggleprojet" ).fadeOut(  );
    $( "#toggleprojet" ).fadeOut(  ).queue(function(next){
    $( "#toggleprofil" ).fadeIn(  );
    next();
});
//    $( "#togglemessage" ).fadeOut(  );   
    
//    $( "#toggleprojet" ).delay(9000000000).addClass("projetprofil hide");

//    if($("#btnprojet").hasClass("activebtn")){
////  $( "#toggleprojet" ).fadeOut(  );
//    $( "#btnprojet" ).removeClass('activebtn');
//    }
//    if($("#btnmsg").hasClass("activebtn")){
//  $( "#togglemsg" ).fadeOut( "slide" );
//    $( "#btnprojet" ).removeClass('activebtn');
//    }
  $( "#btnprofil" ).addClass('activebtn');
  

});




//$( "#btnprojet" ).click(function() {
//  if($("#btnprofil").hasClass("activebtn")){
//  $( "#toggleprofil" ).fadeOut( "slide" );
//  $( "#btnprofil" ).removeClass('activebtn');
//  }
  
//  $( "#toggleprojet" ).fadeIn( "slide" ).delay(90000, $( "#toggleprojet" ).removeClass('hide'));
//  $( "#toggleprojet" ).removeClass('hide').delay();
//  if($("#btnmessage").hasClass("activebtn")){
//  $( "#togglemessage" ).toggle( "slide" ).delay(900);
//  $( "#btnmsg" ).removeClass('activebtn');
//  }
//  $( "#btnprojet" ).addClass('activebtn');
});


$( "#btnprojet" ).click(function() {
    $( "#toggleprofil" ).fadeOut();
    $( "#togglemsg" ).fadeOut();
    $( "#toggleprojet" ).removeClass( "projetprofil hide" );
    $( "#toggleprojet" ).fadeIn(  );
//    if($("#btnprofil").hasClass("activebtn")){
//    $( "#btnprofil" ).removeClass('activebtn');
//    }
//    if($("#btnmsg").hasClass("activebtn")){
//////  $( "#toggleprofil" ).fadeOut( "slide" ).delay(900);
//    $( "#btnmsg" ).removeClass('activebtn');
//    }

  $( "#btnprojet" ).addClass('activebtn');
//  

});