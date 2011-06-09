$(document).ready(function() {			
    $("#submit_mysql").click(function() {	
	$('#iStep1_form').validate(
	{
	rules: {
			 hostname: 
							{required: true},
			 username:		
							{required: true},		
			 dbname:		
							{required: true},		 					 
			 password:
							{required: true}
			 },
	messages:	{
						hostname: 	"<font color='red'>*Bitte Host eintragen!",
						username: 	"<font color='red'>*Bitte Benutzername eintragen!",
						dbname:	 	"<font color='red'>*Bitte DB Name eintragen!",
						password: 	"<font color='red'>*Bitte Passwort eintragen!"
						},
	submitHandler: function()
			{
			document.forms[0].submit();
			}
     });
    });
  });
  
  
  $(document).ready(function() {			
    $("#submit_admin").click(function() {	
	$('#iStep3_form').validate(
	{
	rules: {
			 username:		
							{required: true},			 					 
			 password:
							{required: true}
			 },
	messages:	{
						username: 	"<font color='red'>*Bitte Benutzername eintragen!",
						password: 	"<font color='red'>*Bitte Passwort eintragen!"
						},
	submitHandler: function()
			{
			document.forms[0].submit();
			}
     });
    });
  });
 