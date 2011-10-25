$(function() {
    $("#p_submit").click(function() {
        var data = $('#p_form2').serialize();
        //alert (dataString);return false;
        $.ajax({
            type: "POST",
            url: "./src/ajax/save.projects.php",
            data: data,
            success: function(text) {
                alert(text);
                $('#p_form').dialog('close');
                location.reload(true);
            }
        });
        return false;
    });
      $('#p_form').dialog({
        autoOpen: false, 
        width: 600, 
        resizable: true,
        modal: true
    });
});

  
  

$(function() {
    $("#p_del").click(function() {
        var data = $('#p_form3').serialize();
        //alert (dataString);return false;
        $.ajax({
            type: "POST",
            url: "./src/ajax/save.projects.php",
            data: data,
            success: function() {
                $('#p_form1').html("<div id='message'></div>");
                $('#message').html("<h2>Projekt wurde gelöscht!</h2>")
                .append("<a href='javascript:closeRefreshDel()'>Schließen</a>")
                .hide()
                .fadeIn(1500, function() {
                    $('#message');
                });
            }
        });
        return false;
    });
});
   
function closeRefreshDel() 
{
    $('#p_form1').html("<p>Seite wird neu geladen<br><img src='images/icon/loader.gif' align='center'></p>")
    setTimeout("location.reload(true);",1000);
    $("#p_form3").fadeOut(1500).dialog("close");
}


function new_project()
{

    document.getElementsByName("p_submit")[0].value = "Anlegen";
    document.getElementsByName("pAction")[0].value = "1";
    $("#p_form").fadeIn(1500).dialog("open");
}
 	
function edit_project(p_project_id)
{
    $.ajax({
        type: "POST",
        url: "./src/ajax/projects.edit.php",
        data: "ajax=get_project&projectID= "+p_project_id,
        dataType: "json",
        success: function(json){
            document.getElementsByName("projectname")[0].value = json.synetics_projects_projectname;
            document.getElementsByName("drivecost")[0].value = json.synetics_projects_drivecost;
            document.getElementsByName("client")[0].value = json.synetics_clients_synetics_clients_clientno;
            document.getElementsByName("projectlead")[0].value = json.synetics_projects_projecleader;
            document.getElementsByName("clientcontact")[0].value = json.synetics_projects_contactpersonclient;
            document.getElementsByName("client")[0].value = json.synetics_projects_client;
            document.getElementsByName("description")[0].value = json.synetics_projects_description;
            document.getElementsByName("cost")[0].value = json.synetics_projects_cost;
            document.getElementsByName("p_submit")[0].value = "Ändern";
            l_cr = document.getElementsByName("cost_rate");
            document.getElementsByName("projectID")[0].value = json.synetics_projects__ID;
            l_dcr = document.getElementsByName("drivecost_rate");
            document.getElementsByName("pAction")[0].value = "2";
				
            switch (json.synetics_projects_drivecostrate)
            {
                case "1":
                    l_dcr[0].checked = true;
                    break;
                case "2":
                    l_dcr[1].checked = true;
                    break;
            }
				
            switch (json.synetics_projects_costrate)
            {
                case "1":
                    l_cr[0].checked = true;
                    break;
				
                case "2":
                    l_cr[1].checked = true;
                    break;
            }
            $("#p_form").fadeIn(1500).dialog("open");
        }
    });
}
 	
function del_project(p_project_id,p_name,p_leiter)
{
    var confirm = window.confirm('Wirklich löschen?\n\nProjektname: '+p_name+'\nProjektleiter: ' +p_leiter);
    if(confirm ==true)
    {
	 				
	 				
        $.ajax({
            type: "post",
            url:'src/ajax/save.projects.php',
            data: "projectID="+p_project_id+"&pAction=3",
            success: function()
            { 
                alert("Projekt " + p_name + " wurde gelöscht");
                setTimeout("location.reload(true);",500);
            }
        });
    }
    else
    {
        alert("Vorgang abgebrochen");
    }
}