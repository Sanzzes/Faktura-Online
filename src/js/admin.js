$(document).ready(function() {
    $('#content_admin').dialog({
        autoOpen: false,
        width: 640,
        height: 480,
        resizable: true,
        modal: true
    });
    $('#admin_open').click(function() {
        $('#content_admin').dialog('open')
        .find('#auswahl_menu').accordion
        ({
            navigation: true,
            autoHeight: false
        })
        .find("#primary_admin").button();

        return false;
    });
});

//
$(function() {			
    $("#primary_admin").click(function() {
        var data = $('#admin_grund').serialize();
        //alert (dataString);return false;
        $.ajax({
            type: "POST",
            url: "./admin/save.changes.php",
            data: data,
            success: function() {	
                $('#content_admin').html("<div id='message'></div>").dialog({
                    width: 400, 
                    height: 200, 
                    resizable: false
                });
                $('#message').html("<h2 align='center'>Erfolgreich ausgeführt!</h2>")
                .append("<a href='javascript:closeRefreshAdmin()'><h4 align='center'>Schließen<h4></a>")
                .hide()
                .fadeIn(1500, function() {
                    $('#message');
                });
            }
        });
        return false;
    });
});

$(function() {			
    $("#primary_admin_rights").click(function() {
        var data = $('#admin_rechte').serialize();
        //alert (dataString);return false;
        $.ajax({
            type: "POST",
            url: "./admin/save.changes.php",
            data: data,
            success: function() {	
                $('#content_admin').html("<div id='message'></div>").dialog({
                    width: 400, 
                    height: 200, 
                    resizable: false
                });
                $('#message').html("<h2 align='center'>Erfolgreich ausgeführt!</h2>")
                .append("<a href='javascript:closeRefreshAdmin()'><h4 align='center'>Schließen<h4></a>")
                .hide()
                .fadeIn(1500, function() {
                    $('#message');
                });
            }
        });
        return false;
    });
});

$(function() {			
    $("#primary_admin_process").click(function() {
        $.post("./admin/save.changes.php",$('#admin_process').serialize(), function(data){
            if(data == 0){
                alert("Fehler: Existiert bereits!")
            }
            else
            {
                alert("Erfolgreich angelegt")
                
            }
        });
        return false;
    });
});

$(function() {			
    $("#process_edit_sub").click(function() {
        
        var process = $('#process_id_old').val();
        var processName = $('#process_name').val();
        var processAction = $('#process_action').val();
        $.ajax({
            type: "POST",
            url: "./src/ajax/process.inc.php",
            data: "ajax=edit_process&processID= "+process+"&processCName="+processName+"&process_action="+processAction,
            success: function() {	
                $('#edit_process').html("<div id='message'></div>").dialog({
                    width: 400, 
                    height: 200, 
                    resizable: false
                });
                $('#message').html("<h2 align='center'>Erfolgreich ausgeführt!</h2>")
                .append("<a href='javascript:closeRefreshAdmin()'><h4 align='center'>Schließen<h4></a>")
                .hide()
                .fadeIn(1500, function() {
                    $('#message');
                });
            }
        });
        return false;
    });
});

function closeRefreshAdmin() 
{
    setTimeout("location.reload(true);",1000);
}
$(document).ready(function() {
    $('#client_form').dialog({
        autoOpen: false, 
        width: 800, 
        resizable: false
    })
    $('#p_form').dialog({
        autoOpen: false, 
        width: 600, 
        resizable: false
    })
    $('#per_form').dialog({
        autoOpen: false, 
        width: 800, 
        resizable: false
    })
    $('#tat_form').dialog({
        autoOpen: false, 
        width: 900, 
        height: 600, 
        resizable: false
    })
    $('#edit_process').dialog({
        autoOpen: false, 
        width: 300, 
        height: 150, 
        resizable: false
    })
});
        
function edit_process()
{
    var process = $('#processID').val();
    $.ajax({
        type: "POST",
        url: "./src/ajax/process.inc.php",
        data: "ajax=edit_process&processID= "+process,
        dataType: "json",
        success: function(json){
                                
            $('#process_name').val(json.synetics_process_name);
            $('#process_id_old').val(json.synetics_process_id);
            $('#edit_process').fadeIn(1500).dialog("open");

        }
    });
}

function del_process()
{
    var process = $('#processID').val();
    var confirm = window.confirm('Wirklich löschen?'); 	
    if(confirm ==true) 		 				
    {		 						 								
        $.ajax({	
            type: "POST",
            url: "./src/ajax/process.inc.php",
            data: "ajax=del_process&processID= "+process,				 							
            success: function(processName)							 							
            { 							
                alert("Rechnungsstelle: "+processName+", wurde gelöscht"); 							
                setTimeout("location.reload(true);",500); 							
            }					 	
        }); 		 				
    } 		 			
    else 		 			
    { 		 			
        alert("Vorgang abgebrochen"); 		 			
    } 
}
        	