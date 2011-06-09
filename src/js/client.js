$(function() {
    $("#submit_client").click(function() {
	$('#client_form1').validate(
	{
	rules:
		{
		clientno:
			{required: true},
		client:
			{required: true},
			
		city:
			{required: true},
			
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
						url: "src/client_save.inc.php",
						data: data,
						success: function() {	
						  $('#client_form').html("<div id='message'></div>").dialog({width: 400, height: 200, resizable: false});
						  $('#message').html("<h2 align='center'>Erfolgreich ausgeführt!</h2>")
						  .append("<a href='javascript:closeRefreshEditClient()'><h4 align='center'>Schließen<h4></a>")
						  .hide()
						  .fadeIn(1500, function() {
							$('#message');
						  });
						}
					  });
		  return false;
			}
		});
    });
 });
   
   function closeRefreshEditClient() 
   {
    $('#client_form').html("<p align='center'>Seite wird neu geladen<br><img src='images/icon/loader.gif' align='center'></p>").dialog({width: 400, resizable: false})
   setTimeout("location.reload(true);",1000);
   $("#client_form1").fadeOut(1500).dialog("close");
   } 
   
   $(function(){
   $('#submit_client').button();
   $('#cancel_sub').button();
   })