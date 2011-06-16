$(document).ready(function() {
$('#content_admin').dialog({
				autoOpen: false,
				width: 600,
				height: 400,
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
				  $('#content_admin').html("<div id='message'></div>").dialog({width: 400, height: 200, resizable: false});
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
				  $('#content_admin').html("<div id='message'></div>").dialog({width: 400, height: 200, resizable: false});
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