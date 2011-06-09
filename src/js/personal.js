
$(function() {
    $("#per_submit").click(function() {
	var data = $('#per_form1').serialize();
  //alert (dataString);return false;
  $.ajax({
    type: "POST",
    url: "./src/per_save.inc.php",
    data: data,
    success: function() {	
      $('#per_form').html("<div id='message'></div>").dialog({width: 400, resizable: false});
      $('#message').html("<h2 align='center'>Erfolgreich ausgeführt!</h2>")
      .append("<a href='javascript:closeRefreshEditPer()'><h4 align='center'>Schließen<h4></a>")
      .hide()
      .fadeIn(1500, function() {
        $('#message');
      });
    }
  });
  return false;
    });
   });
   
   function closeRefreshEditPer() 
   {
    $('#per_form').html("<p align='center'>Seite wird neu geladen<br><img src='images/icon/loader.gif' align='center'></p>").dialog({width: 400, resizable: false})
   setTimeout("location.reload(true);",1000);
   $("#per_form1").fadeOut(1500).dialog("close");
   }