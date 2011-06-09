$(document).ready(function(){
		 $(".aufklappen").live("click",function(){
			var id = $(this).attr("id");
			if($("#insert_" +id).css("display") === "none"){
			//Open Projects TR and get DATA with AJAX Request
			$.ajax({
					url: './src/ajax/popup.php',
					type: 'POST',
					data: 'client_id='+id,
			success: function(html){
					$("#img_"+id).attr("src", "./images/icon/minus.png");
					$('#insert_'+id).append(html);
					$("#insert_" +id).css({"display":""});
					}
					});
					}else{
					//Close Projects TR and Set TR to Empty
					$("#img_"  + id).attr ("src" , "./images/icon/plus.png");
					$('#insert_'+id).empty();
					$("#insert_" + id).css({"display":"none"});	
					}
			});
			
});



$(function() {
    $("#p_submit").click(function() {
	var data = $('#p_form2').serialize();
  //alert (dataString);return false;
  $.ajax({
    type: "POST",
    url: "./src/p_save.inc.php",
    data: data,
    success: function() {
      $('#p_form2').html("<div id='message'></div>");
      $('#message').html("<h2>Erfolgreich ausgeführt!</h2>")
      .append("<a href='javascript:closeRefreshEditPro()'>Schließen</a>")
      .hide()
      .fadeIn(1500, function() {
        $('#message');
      });
    }
  });
  return false;
    });
   });
   
   function closeRefreshEditPro() 
   {
    $('#p_form').html("<p>Seite wird neu geladen<br><img src='images/icon/loader.gif' align='center'></p>")
   setTimeout("location.reload(true);",1000);
   $("#p_form2").fadeOut(1500).dialog("close");
   }

  
  

$(function() {
    $("#p_del").click(function() {
	var data = $('#p_form3').serialize();
  //alert (dataString);return false;
  $.ajax({
    type: "POST",
    url: "./src/p_save.inc.php",
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