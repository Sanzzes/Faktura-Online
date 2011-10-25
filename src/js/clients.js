$(document).ready(function(){
    $('#client_form').dialog({
        autoOpen: false, 
        width: 800, 
        resizable: false,
        modal: true
    });
    
    $("#submit_client").click(function() {
        $('#client_form1').validate(
        {
            rules:
            {
                clientno:
                {
                    required: true
                },
                client:
                {
                    required: true
                },
			
                city:
                {
                    required: true
                },
			
            },
            messages:
            {
                clientno: 	 "<br>*Bitte Kundennummer Eintragen!",
                client:		"<br>*Bitte Kundenname Eintragen!",
                city:		"<br>*Ort Angeben!"
            },
            submitHandler:function()
            {
                var data = $('#client_form1').serialize();
                $.ajax({
                    type: "POST",
                    url: "src/ajax/save.clients.php",
                    data: data,
                    success: function(daten) {	
                        alert(daten);
                        $('#client_form').dialog("close");
                        location.reload(true);
                    }
                });
                return false;
            }
        });
    });

    
 
});

function new_client()
{  
    document.getElementsByName("submit_client")[0].value = "Eintragen";
    document.getElementsByName("cancel_sub")[0].value = "Leeren";
    document.getElementsByName("INTaction")[0].value = "1";
    $('#submit_client').button();
    $('#cancel_sub').button();
    $("#client_form").dialog("open")
        
}

function edit_client(p_client_id)
{
    $.ajax({
        type: "POST",
        url: "./src/ajax/client.edit.php",
        data: "ajax=get_client&clientID= "+p_client_id,
        dataType: "json",
        success: function(json){
            document.getElementsByName("clientno")[0].value = json.synetics_clients_clientno;
            document.getElementsByName("client")[0].value = json.synetics_clients_client;
            document.getElementById("clname").value = json.synetics_clients_name;
            document.getElementById("clsurname").value = json.synetics_clients_surname;
            document.getElementById("clstreet").value = json.synetics_clients_street;
            document.getElementById("clno").value = json.synetics_clients_no;
            document.getElementById("cltel").value = json.synetics_clients_tel;
            document.getElementById("clmobile").value = json.synetics_clients_mobile;
            document.getElementById("clmail").value = json.synetics_clients_mail;
            document.getElementById("clfax").value = json.synetics_clients_fax;
            document.getElementById("clzipcode").value = json.synetics_clients_zipcode;
            document.getElementById("clcity").value = json.synetics_clients_city;
            document.getElementsByName("submit_client")[0].value = "Ändern";
            document.getElementsByName("INTaction")[0].value = "2";
            $("#client_form").dialog("open");
        }
    });
}

function del_client(p_client_id,client_name)
 		 	
{
 		 		
    var confirm = window.confirm('Wirklich löschen?\n\n'+'Zu löschender Kunde:\nName:'+client_name); 	
    if(confirm ==true) 		 				
    {		 						 								
        $.ajax({	
            type: "post",	
            url:'src/ajax/save.clients.php',
            data: "clientno="+p_client_id+"&INTaction=3", 				 							
            success: function()							 							
            { 							
                alert("Kunde: " + client_name + ", wurde gelöscht"); 							
                setTimeout("location.reload(true);",500); 							
            }					 	
        }); 		 				
    } 		 			
    else 		 			
    { 		 			
        alert("Vorgang abgebrochen"); 		 			
    } 		 	
}
 