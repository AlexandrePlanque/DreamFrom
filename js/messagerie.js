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
        url: "http://dreamfrom/api/mp/"+id,
        dataType: 'json',

        success: function (data) {
            prepareSendBtn(id)
            if(data.length > 0){
              msg(data, id);
          }else{noMsg()}

        },
        error: function (param1, param2) {
            alert('Une erreur est survenue.')
            
        }
        });



}



function msg(data, id){
    $('#msgbox').empty();

    for(var i = 0 ; i < data.length ; i++){
        if((parseInt(id)) === (parseInt(data[i].expediteur))){
$('#msgbox').append($('<div>').addClass("incoming_msg").append($('<div>').addClass('incoming_msg_img').append($('<img>').attr("src", data[i].avatarE))).append($('<div>').addClass("received_msg").append($('<div>').addClass("received_withd_msg").append($('<p>').text(data[i].message)).append($('<span>').addClass('time_date').text(testmsg(data[i].date_creation))))))
        }else{
            $('#msgbox').append($('<div>').addClass("outgoing_msg").append($('<div>').addClass('sent_msg').append($('<p>').text(data[i].message))))
        }
    }
}
    
    
function testmsg(data){
    "2018-08-14"
    var heure =data.substr(11,5);
    var month = getMonth(data.substr(5,2));
    var retour = heure + "  |  " + data.substr(8,2) + " " + month

    return retour;
    
}
function prepareSendBtn(id){
        $('#sendbtn').attr('onclick','sendmsg(' + id + ')')
}

function sendmsg(id){
        var message = {message : $('#inputMsg').val()};
        var destinataire = {destinataire : id}
                    
        var mp = {
            message: $('#inputMsg').val(),
            destinataire: id
        }

        console.log(mp);
    $.ajax({
        url : "http://dreamfrom/api/mp/"+id,
        type: "POST",
        data : mp,
        success : function(e){
            console.log(e);
            getMessage(id);
        },
        error : function(e){
           alert('Transmission échouée');
        }

    })
}

function getMonth(x){
    var month ="";
    switch (x) { 
	case '01': 
		month="Janvier";
		break;
	case '02': 
		month="Fevrier";
		break;
	case '03': 
		month="Mars";
		break;		
	case '04': 
		month="Avril";
		break;
	case '05': 
		month="Mai";
		break;
	case '06': 
		month="Juin";
		break;
	case '07': 
		month="Juillet";
		break;
	case '08': 
		month="Aout";
		break;
	case '09': 
		month="Septembre";
		break;
	case '10': 
		month="Octobre";
		break;
	case '11': 
		month="Novembre";
		break;
	case '12': 
		month="Decembre";
		break;
	default:
		month="inconnu"
}
    return month;
}
function noMsg(){
    $('#msgbox').empty();
    $('#msgbox').append($('<div>').addClass("outgoing_msg").append($('<div>').addClass('sent_msg').append($('<p>').text("Vous n'avez pas de messages avec cet utilisateur.")).append($('<span>').addClass('time_date').text("Message système"))))
}