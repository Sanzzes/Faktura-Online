
$(function() {
    $('#per_form').dialog({
        autoOpen: false, 
        width: 800, 
        resizable: true,
        modal: true
    });
    $("#per_submit").click(function() {
        var data = $('#per_form1').serialize();
        //alert (dataString);return false;
        $.ajax({
            type: "POST",
            url: "./src/ajax/save.personal.php",
            data: data,
            success: function(text) {	
                alert(text);
                $('#per_form').dialog('close');
                location.reload(true);
            }
        });
        return false;
    });
    $('#username').change(function(){
        var benutzer = document.getElementById("username").value;
        $.ajax({
            type: "POST",
            url: "./src/ajax/personal.edit.php",
            data: "name="+benutzer+"&checkuser=1",
            success: function(msg){
                if (msg == true)
                {
                    document.getElementById("msg").innerHTML = "<img src='./images/ok.png' />";
                }
                else
                {
                    document.getElementById("msg").innerHTML = "<img src='./images/notok.png' />";
                }
            }
        });
    });
});

function new_personal()
{
    document.getElementsByName("per_submit")[0].value = "Anlegen";
    document.getElementsByName("perAction")[0].value = "1";
    $("#per_form").fadeIn(1500).dialog("open");
}
 	
function edit_personal(p_personal_id)
{
    $.ajax({
        type: "POST",
        url: "./src/ajax/personal.edit.php",
        data: "ajax=get_personal&systemID= "+p_personal_id,
        dataType: "json",
        success: function(json){
            document.getElementsByName("name")[0].value = json.synetics_system_name;
            document.getElementById("street").value = json.synetics_system_street;
            document.getElementById("tele").value = json.synetics_system_tele;
            document.getElementById("mail").value = json.synetics_system_mail;
            document.getElementById("zipcode").value = json.synetics_system_zipcode;
            document.getElementById("city").value = json.synetics_system_city;
            document.getElementById("weekwork").value = json.synetics_system_weekwork;
            document.getElementById("weekhour").value = json.synetics_system_weekhour;
            document.getElementById("username").type = "hidden";
            document.getElementById("passwort").type = "hidden";
            document.getElementById("passwort_td").style.display = "none";
            document.getElementById("username_tr").style.display = "none";
            document.getElementsByName("systemID")[0].value = json.synetics_system__ID;
            document.getElementsByName("per_submit")[0].value = "Ändern";
            document.getElementsByName("perAction")[0].value = "2";
            $("#per_form").fadeIn(1500).dialog("open");
        }
    });
}
 	
function del_personal(p_personal_id,per_name,per_surname,sessionid)
{
    if(sessionid == p_personal_id || p_personal_id == 1){
        if(p_personal_id == 1){
            alert('Warnung:\n\nDu kannst den Admin nicht löschen');
        }
        else{
            alert('Warnung:\n\nDu kannst dich nicht selber löschen');
        }
    }
    else{
        var confirm = window.confirm('Wirklich löschen?\n\n'+'Zu löschende Person:\nName:'+per_name+'\nVorname:'+per_surname);
        if(confirm ==true)
        {
						
						
            $.ajax({
                type: "post",
                url:'src/ajax/save.personal.php',
                data: "systemID="+p_personal_id+"&perAction=3",
                success: function()
                { 
                    alert("Personal Mitarbeiter: " + per_name + ", wurde gelöscht");
                    setTimeout("location.reload(true);",500);
                }
            });
        }
        else
        {
            alert("Vorgang abgebrochen");
        }
    }
}