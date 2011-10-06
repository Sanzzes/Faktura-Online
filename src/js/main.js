$(document).ready(function() {
    $('#username').change(function(){
        var benutzer = document.getElementById("username").value;
        $.ajax({
            type: "POST",
            url: "./src/ajax.php",
            data: "name="+benutzer,
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
    //$('#inhalte').dataTable();
        
    
    $('#menu a div').live('click', function(){
        if($(this).attr('class') == "btn green"){
            $(this).removeClass('btn green');
            $(this).addClass('btn red');
            
        }
        else{
            $(last_id).removeClass('btn red'); 
            $(last_id).addClass('btn green');
        }
        var last_id = $(this).parent().attr('id');
        
            $('.maincontent').empty();
            $('.maincontent').html('<div style="clear:both;margin:30px 0;text-align:center;padding-right:40px"></div>');
            $('.maincontent').load('index.php?pageID='+$(this).parent().attr('id')+'&noPage=1');
            $('.maincontent').html('<div class="clearboth"></div>')
    })
    
   var GET = new Array();
   if(location.search.length > 0) {
      var get_param_str = location.search.substring(1, location.search.length);
      var get_params = get_param_str.split("&");
      for(i = 0; i < get_params.length; i++) {
         var key_value = get_params[i].split("=");
         if(key_value.length == 2) {
            var key = key_value[0];
            var value = key_value[1];
            GET[key] = value;
         }
      }
   }
       $('#m'+GET['pageID']).parent().css({
        "background-color": "#8aff00", 
        "color": "#ffffff"

       });
    
    
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
        $(this).css("background-color", "#C6E2FF");
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
        if($('#stickey_footer').is(':hidden')){
            $('#stickey_footer').slideDown('slow');
            $('.head').slideDown('slow');
            $('#closer_img').attr('src' , './images/menu/close.png');
            $('#hide_menu').attr('title' ,  'Menü Ausblenden');
        }else{	
            $('#stickey_footer').slideUp('slow');
            $('.head').slideUp('slow');
            $('#closer_img').attr('src' ,  './images/menu/open.png');
            $('#hide_menu').attr('title' ,  'Menü Anzeigen');
        }
    });
});

//Paging
function openP(paID,pgID){
    $.post('index.php?pageID='+paID+'&page='+pgID,$("#form_zeiten").serialize(), function(p_data){
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
           
$(document).ready(function(){
    
    var userid = $('#worker_f').val();
    var thismonth = $('#datepicker1').val();
    var thisyear = $('#datepicker2').val();
    var process = $('#process_id').val();
    
    
    $.ajax({
        type: "post",
        url:"src/ustunden.inc.php",
        data: "ajax=get_stunden_process&userid="+userid+"&thisyear="+thisyear+"&thismonth="+thismonth+"&thisprocess="+process,
        success: function(stundeng)
        { 
            $('#stunden_month_ges').html(stundeng);
        }
    });
})


