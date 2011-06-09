/*
$(function() {			
    $("#tat_submit").click(function() {
	$.validator.addMethod("stadtauswahl", function(value, element) 
				{
				return this.optional(element) || value != 0;
				},
				$.format("Bitte Einsatzort wählen"));
				
	$('#tat_form1').validate(
	{
	rules: {
			 client: 
							{required: true, min: 1},
			 worker:		
							{required: true, min: 1},
			 workplace: 	
							{required: true, stadtauswahl: true},
			 datepicker: 	
							{required: true, dateDE: true},
			zeit_1: 
							{required: true},
			zeit_2: 
							{required: true},
			pause_1: 
							{required: true},
			pause_2: 
							{required: true},
			 project:
							{required: true, min: 1}
			 },
	messages:	{
						client: 	"*Bitte Kunden auswählen!",
						worker: 	"*Bitte Mitarbeiter wählen!",
						workplace: 	"*Bitte Einsatzort wählen!",
						zeit_1:		"*Fehlt!",
						zeit_2:		"*Fehlt!",
						pause_1:	"*Fehlt!",
						pause_2:	"*Fehlt!",
						datepicker: 	"*Kein Datum angegeben!",
						project:	"*Bitte Projekt wählen!"
						},
	submitHandler: function()
			{
		    var data = $('#tat_form1').serialize();
			$.ajax({
				type: "POST",
				url: "./src/tat_save.inc.php",
				data: data,
				success: function() {
                                  $('#tat_form').dialog('close');
				  $('#tat_form1').html("<div id='message'></div>").dialog({autoOpen: false,width: 400, height: 240, resizable: false}).dialog('open');
				  $('#message').html("<h2 >Erfolgreich ausgeführt!</h2>")
				  .append("<a href='javascript:closeRefreshEditTat_12()'><h4>Schließen<h4></a>")
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
*/
	function closeRefreshEditTat_12() 
   {
    $('#tat_form1').html("<p align='center'>Seite wird neu geladen<br><img src='images/icon/loader.gif' align='center'></p>")
   setTimeout("location.reload(true);",1000);
   } 
   
   $(function() {
   		$('#art_1_1').change(function(){
			var choose =$("#art_1_1").attr("value");
			var did = $("#workflow_ID").attr("value");
			$.ajax({
						url:	"src/ajax/work.ajax.php",
						type: "post",
						data: "ajax=get_travel&row="+choose +"&dID="+did,
						success: function(row)
					{ 
						$("#art_1_2").attr("value", row);
					}
			 	});
			 });
			 
		$('#art_2_1').change(function(){
			var choose =$("#art_2_1").attr("value");
			var did = $("#workflow_ID").attr("value");
			$.ajax({
						url:	"src/ajax/work.ajax.php",
						type: "post",
						data: "ajax=get_travel&row="+choose +"&dID="+did,
						success: function(row)
					{ 
						$("#art_2_2").attr("value", row);
					}
			 	});
			 });
			 
		$('#art_3_1').change(function(){
		var choose =$("#art_3_1").attr("value");
		var did = $("#workflow_ID").attr("value");
		$.ajax({
						url:	"src/ajax/work.ajax.php",
						type: "post",
						data: "ajax=get_travel&row="+choose +"&dID="+did,
						success: function(row)
					{ 
						$("#art_3_2").attr("value", row);
					}
			   });
		});
		
		
		
		$('#client').change(function(){
						var did = $(this).children("option:selected").val();
							$("#project").load("src/ajax/work.ajax.php",
							{
							ajax: "get_projekt",
							dID: 	did
							});
					});	
});