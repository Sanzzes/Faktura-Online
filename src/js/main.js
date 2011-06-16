$(document).ready(function() {
	$('#username').change(function(){
		var benutzer = document.getElementById("username").value;
		$.ajax({
		   type: "POST",
		   url: "./src/ajax.php",
		   data: "name="+benutzer,
		   success: function(msg){
		     if (msg == "true")
		     {
		     	document.getElementById("msg").innerHTML = "<img src='./images/ok.png' />";
		     }
		     else
		     {
		     	document.getElementById("msg").innerHTML = "<img src='./images/notok.png' />";
		     }
		   }
		 });
	})
});

function check_submit()
{
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var nachname = document.getElementById("nachname").value;
	var vorname = document.getElementById("vorname").value;
	if (username != "" && password != "" && nachname != "" && vorname != "")
	{
		document.forms[0].submit();
	}
	else
	{
		var targetdiv = document.getElementById("message");
		targetdiv.innerHTML = "Bitte füllen sie alle Felder aus! <a href='#' onClick='hide()'>Ausblenden</a>";
		targetdiv.style.visibility = "visible";
	}
}


$(document).ready(function(){
	$("#inhalte tr:odd").css({
		"background-color": "#ccc",
		"cursor":		"pointer"	
	});
	
	$("#inhalte tr:even").css({
		"background-color": "#eee",
		"cursor":		"pointer"	
		});
	
	$("#inhalte tr:first").css("background-color", "#EECB00");	
	$("#inhalte tr:not(tr:first)").hover(function(){
	//Mouseover
	$(this).data("oldbg", $(this).css("background-color"));
	$(this).css("background-color", "#4050AB");
	},function() {
	//Mouseout
	$(this).css("background-color", $(this).data("oldbg"));
	});
	$("#slidershow").nivoSlider({
		pauseOnHover:true,
		controlNav:false,
		directionNav:false
	});
});
	
$(document).ready(function(){
	$('#hide_menu').click(function(){
	if($('.head').is(':hidden')){
	    $('.head').slideDown('slow');
		$('#closer_img').attr('src' , './images/menu/close.png');
		$('#hide_menu').attr('title' ,  'Menü Ausblenden');
		}else{	
		$('.head').slideUp('slow');
		$('#closer_img').attr('src' ,  './images/menu/open.png');
		$('#hide_menu').attr('title' ,  'Menü Anzeigen');
		}
	});
});

//Paging
   function openP(woID,paID,pgID,dpicker1,dpicker2){
       $.post('index.php?pageID='+paID,{datepicker1: "0"+dpicker1, datepicker2: dpicker2, worker_f: woID, page: pgID }, function(p_data){
         $('#inhalte').empty();
         var d_inhalt = $(p_data).find('#inhalte');
         $('#inhalte').html(d_inhalt);
         $("#inhalte tr:odd").css({
		"background-color": "#ccc",
		"cursor":		"pointer"	
	});
	
	$("#inhalte tr:even").css({
		"background-color": "#eee",
		"cursor":		"pointer"	
		});
	
	$("#inhalte tr:first").css("background-color", "#EECB00");	
	$("#inhalte tr:not(tr:first)").hover(function(){
	//Mouseover
	$(this).data("oldbg", $(this).css("background-color"));
	$(this).css("background-color", "#4050AB");
	},function() {
	//Mouseout
	$(this).css("background-color", $(this).data("oldbg"));
	});
       })
   }
   
   
   	   window.setInterval("zeitanzeige()",1000);
 
	   function zeitanzeige()
	   {
		d = new Date ();
 
		h = (d.getHours () < 10 ? '0' + d.getHours () : d.getHours ());
		m = (d.getMinutes () < 10 ? '0' + d.getMinutes () : d.getMinutes ());
		s = (d.getSeconds () < 10 ? '0' + d.getSeconds () : d.getSeconds ());
 
		var wochentage = new Array ("Sonntag(Wochenende)", "Montag(Wochentag)", "Dienstag(Wochentag)",
		"Mittwoch(Wochentag)", "Donnerstag(Wochentag)", "Freitag(Wochentag)", "Samstag(Wochenende)");
 
		var monate = new Array ("Januar", "Februar", "März", "April",
		"Mai", "Juni", "Juli", "August", "September",
		"Oktober", "November", "Dezember");
 
		document.getElementById("uhrzeit").innerHTML = 'Heute ist '
		+ wochentage[d.getDay ()]
		+ ', der ' + d.getDate () + '. '
		+ monate[d.getMonth ()] + ' '
		+ d.getFullYear () +
		' und es ist jetzt '
		+ h + ':' + m + ':' + s + ' Uhr!';
	   }


