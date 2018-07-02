//$( document ).ready(function() {
//    $.ajax({
//            type: "GET",
//            url: "http://appalpha/api/mp/1",
//            dataType: 'json',
//
//            success: function (data) {
//                console.log(data);
//                alert('ya bon bb');
//              testmsg(data);
//
//
//            },
//            error: function (param1, param2) {
//                alert('ya PAS bon bb');
//
//            }
//            });
//
//        });

function getMessage(id){


$.ajax({
        type: "GET",
        url: "http://appalpha/api/mp/"+id,
        dataType: 'json',

        success: function (data) {
            console.log(data);
            alert('ya bon bb');
            if(data.length > 0){
              msg(data, id);
          }else{noMsg()}

        },
        error: function (param1, param2) {
            alert('ya PAS bon bb');
            
        }
        });



}



function msg(data, id){
    $('#msgbox').empty();
    for(var i = 0 ; i < data.length ; i++){
        console.log(data[i]);
        if(id !== data[i].desinataire){
$('#msgbox').append($('<div>').addClass("incoming_msg").append($('<div>').addClass('incoming_msg_img').append($('<img>').attr("src", "dsoqdopqk"))).append($('<div>').addClass("received_msg").append($('<div>').addClass("received_withd_msg").append($('<p>')).append($('<span>').addClass('time_date')))))
        }else{
            $('#msgbox').append($('<div>').addClass("outgoing_msg").append($('<div>').addClass('sent_msg').append($('<p>').text(data[i].message))))
        }
    }
}
    
    
function testmsg(data){
    for(var i = 0 ; i < data.length ; i++){
alert(data[i].message)
$('#msgbox').append($('<div>').addClass("outgoing_msg").append($('<div>').addClass('sent_msg').append($('<p>').text(data[i].message)).append($('<span>').addClass('time_date').text(data[i].date_creation))))

    }
}

function noMsg(){
    $('#msgbox').empty();
    $('#msgbox').append($('<div>').addClass("outgoing_msg").append($('<div>').addClass('sent_msg').append($('<p>').text("Vous n'avez pas de messages avec cet utilisateur.")).append($('<span>').addClass('time_date').text("Message système"))))
}