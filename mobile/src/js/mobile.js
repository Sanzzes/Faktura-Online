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
                {
                    required: true
                },
                client2:                        {
                    required: 
                    function(element)
                    {
                        return $('#client').val() == '0'
                    }
                },
                process:		
                {
                    required: true, 
                    min: 1
                },
                worker:		
                {
                    required: true, 
                    min: 1
                },
                workplace: 	
                {
                    required: true
                },
                                                    
                workplace2:                     {
                    required: 
                    function(element)
                    {
                        return $('#workplace').val() == '0'
                    }
                },
                        
                datepicker: 	
                {
                    required: true, 
                    dateDE: true
                },
                zeit_1: 
                {
                    required: true
                },
                zeit_2: 
                {
                    required: true
                },
                pause_1: 
                {
                    required: true
                },
                pause_2: 
                {
                    required: true
                },
                project:
                {
                    required: true
                },
                project2:                     {
                    required: 
                    function(element)
                    {
                        return $('#project').val() == '0'
                    }
                }
            },
            messages:	{
                client: 	"*Bitte Kunde auswählen!",
                client2:        "*Bitte Kunde eingeben!",
                worker: 	"*Bitte Mitarbeiter wählen!",
                process: 	"*Bitte Kostenstellestelle wählen!",
                workplace: 	"*Bitte Einsatzort wählen!",
                workplace2:     "*Bitte Einsatzort eingeben!",
                zeit_1:		"*Fehlt!",
                zeit_2:		"*Fehlt!",
                pause_1:	"*Fehlt!",
                pause_2:	"*Fehlt!",
                datepicker: 	"*Kein Datum angegeben!",
                project:	"*Bitte Projekt wählen!",
                project2:	"*Bitte Projekt eingeben!"
            },
            submitHandler: function()
            {
                var data = $('#tat_form1').serialize();
                $.ajax({
                    type: "POST",
                    url: "../src/tat_save.inc.php",
                    data: data,
                    success: function() {
                        alert("Erfolgreich angelegt!");
                        window.location.href="index.php?pageID=1#home"
                    }
                });
                return false;
            }
        });
    });
});
   
$(function() {
    $('#art_1_1').change(function(){
        var choose =$("#art_1_1").attr("value");
        var did = $("#workflow_ID").attr("value");
        $.ajax({
            url:	"../src/ajax/work.ajax.php",
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
            url:	"../src/ajax/work.ajax.php",
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
            url:	"../src/ajax/work.ajax.php",
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
        $("#project").load("../src/ajax/work.ajax.php",
        {
            ajax: "get_projekt",
            dID: 	did
        });
        $('#project').selectmenu('refresh', true);
    });	
});


$(function ()
{
                                
    $('#execute_del').click(function(){
        var delIDS = $(':checkbox').serialize();
        if(delIDS != ""){
            var confirm = window.confirm('Wirklich Markierte löschen?');
            if(confirm ==true)
            {
 	 				
 	 				
                $.ajax({
                    type: "POST",
                    url:'../src/tat_save.inc.php',
                    data: "workAction=3&"+ delIDS,
                    success: function()
                    { 
                        alert("Tätigkeiten wurden gelöscht");
                        setTimeout("location.reload(true);",500);
                    }
                });
            }
            else
            {
                alert("Vorgang abgebrochen");
            }
        }
        else{
            alert("Nichts Markiert");
        }
    })
});
                
               
$(document).ready(function(){

    
    var userid = $('#worker_f').val();
    var thismonth = $('#datepicker1').val();
    var thisyear = $('#datepicker2').val();
    
    
    $.ajax({
        type: "post",
        url:"../src/ustunden.inc.php",
        data: "ajax=get_ustunden_month&userid="+userid+"&thisyear="+thisyear+"&thismonth="+thismonth,
        success: function(ustundeng)
        { 
            $('#ustunden_month').html("&Uuml;berstunden Monat "+thismonth+" im Jahr "+thisyear+" sind: "+ustundeng);
        }
    });
    $('#inhalte').dataTable();
                    
   
})


		 
        
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
    $('#newwork').click(function(){ 
        var workerID = $('#worker_f').val();
        $("#worker").val(workerID);
        $("#tat_submit").val("Anlegen");
        $("#workAction").val("1");
    });
    
    $('#overwork').click(function(){	
        var ustunden_id_user = $('#worker_f').val();
        $.ajax({
            type: "post",
            url:"../src/ustunden.inc.php",
            data: "ajax=get_ustunden_all&userid="+ustunden_id_user,
            success: function(ustundeng)
            { 
                alert("--Überstundenrechner--\t\t\n\nDu hast:" +ustundeng );
            }
        });
    })
});

$(document).bind('mobileinit',function(){
    $.mobile.selectmenu.prototype.options.nativeMenu = false;
})