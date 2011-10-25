$(document).ready(function(){ 
    $('#tat_form').dialog({
        autoOpen: false,
        width: 640,
        height: 480,
        resizable: true,
        modal: true
    });
    
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
                    url: "./src/ajax/save.workflow.php",
                    data: data,
                    success: function() {
                        $('#tat_form').dialog('close');
                        $('#tat_form1').html("<div id='message'></div>").dialog({
                            autoOpen: false,
                            width: 400, 
                            height: 240, 
                            resizable: false
                        }).dialog('open');
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
    $('#weekend_form').dialog({
        autoOpen: false,
        width: 450,
        height: 220,
        resizable: false,
        modal: true
    });
    $('#weekend').click(function() {
        $('#weekend_form').dialog('open');
        $("#submit_week").button();

        return false;
    });
    
    
    $('#submit_week').click(function(){
        var data = $('#weekform').serialize();
        $.ajax({
            type: "POST",
            url: "./src/ajax/week.save.php",
            data: data,
            success: function(work) {
                if(work == true){
                    alert("Erfolgreich eingetragen");
                    $('#weekend_form').dialog('close'); 
                    location.reload();
                }else{
                    alert("Ein fehler ist aufgetreten:\n"+work)
                                       
                }
            }
        });
        return false;
    });
    $( "#pickadate" ).datepicker({
        dateFormat: 'dd.mm.yy'
    });
    
    $( "#pickadate1" ).datepicker({
        dateFormat: 'dd.mm.yy'
    });
    
    $( "#pickadate2" ).datepicker({
        dateFormat: 'dd.mm.yy'
    });
    
    $('#holiday_form').dialog({
        autoOpen: false,
        width: 460,
        height: 300,
        resizable: false,
        modal: true
    });
    $('#holiday').click(function() {
        $('#holiday_form').dialog('open');
        $("#submit_holiday").hide();
        $("#submit_holiday_be").button();
        $('#submit_holiday_edit').hide();

        return false;
    });
    $('#submit_holiday').click(function(){
        $('#holidayform').validate(
        {
            rules: {
                pickdate1:		
                {
                    required: true
                },
                pickdate2:		
                {
                    required: true
                }
            },
            messages:	{
                pickdate1: 	"*Bitte Urlaubsbegin eingeben!",
                pickdate2:        "*Bitte Urlaubsende eingeben!"
            },   
            submitHandler: function()
            {
                var data = $('#holidayform').serialize();
                $.ajax({
                    type: "POST",
                    url: "./src/ajax/holiday.save.php",
                    data: data,
                    success: function(work) {
                        if(work == true){
                            alert("Erfolgreich eingetragen");
                            $('#holiday_form').dialog('close'); 
                        //location.reload();
                        }else{
                            alert("Ein fehler ist aufgetreten:\n")
                                       
                        }
                    }
                });
                return false;
        
            }
        });
    
    });
    
    $('#submit_holiday_edit').click(function(){
        $('#holidayform').validate(
        {
            rules: {
                pickdate1:		
                {
                    required: true
                },
                pickdate2:		
                {
                    required: true
                }
            },
            messages:	{
                pickdate1: 	"*Bitte Urlaubsbegin eingeben!",
                pickdate2:        "*Bitte Urlaubsende eingeben!"
            },   
            submitHandler: function()
            {
                var data = $('#holidayform').serialize();
                $.ajax({
                    type: "POST",
                    url: "./src/ajax/holiday.save.php",
                    data: data+"&updaten=1",
                    success: function(work) {
                        if(work == true){
                            alert("Erfolgreich geändert");
                            $('#holiday_form').dialog('close'); 
                            location.reload(true);
                        }else{
                            alert("Ein fehler ist aufgetreten:\n"+work)
                                       
                        }
                    }
                });
                return false;
        
            }
        });
    
    });
    
    $('#submit_holiday_be').click(function(){
        $('#holidayform').validate(
        {
            rules: {
                pickdate1:		
                {
                    required: true
                },
                pickdate2:		
                {
                    required: true
                }
            },
            messages:	{
                pickdate1: 	"*Bitte Urlaubsbegin eingeben!",
                pickdate2:        "*Bitte Urlaubsende eingeben!"
            },   
            submitHandler: function()
            {
                var data = $('#holidayform').serialize();
                $.ajax({
                    type: "POST",
                    url: "./src/ajax/holiday.application.php",
                    data: data,
                    success: function(work) {
                        if(work == true){
                            alert("Der Antrag wurde verschickt");
                            $('#holiday_form').dialog('close'); 
                        //location.reload();
                        }else{
                            alert("Ein fehler ist aufgetreten:\nAntrag nicht versendet!")
                                       
                        }
                    }
                });
                return false;
        
            }
        });
    
    });
    $('#markall').click(function(){
        if($('#markall:checked').val() !== undefined){
            $('input:checkbox[name=tatdelete[]]').attr('checked', true)
        }
        else{
            $('input:checkbox[name=tatdelete[]]').attr('checked', false)
        }
        
    });
    
    $('#rueckfahrt_1').change(function(){
        var workend = $('#zeit_2').val();
        var drivestart = $('#rueckfahrt_1').val();
        if(!drivestart.match(/^[0-9]{1,2}:[0-9]{1,2}$/i)){
            alert("Ungültiges Format\nBitte im Format 00:00 eingeben");
        }
        else{
            $.ajax({
                type: "POST",
                url: "./src/ajax/checkdiff.php",
                data: "workend="+workend+"&drive="+drivestart,
                success: function(msg){
                    if (msg == true)
                    {
                        alert("Differenz entdeckt!\nÜberprüfen Sie Ihre Angaben");
                    }
                    else
                    {
                   
                }
                }
            });
        }
    });
});

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
            dataType: "json",
            success: function(json)
            { 
                $("#art_1_2").val(json.data);
                $('#art_1_3').val(json.dist);
            }
        });
    });
			 
    $('#art_2_1').change(function(){
        var choose =$("#art_2_1").attr("value");
        var did = $("#workflow_ID").attr("value");
        $.ajax({
            url:	"src/ajax/work.ajax.php",
            type: "post",
            data: "ajax=get_travel&row="+choose+"&dID="+did,
            dataType: "json",
            success: function(json)
            { 
                $("#art_2_2").val(json.data);
                $('#art_2_3').val(json.dist);
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
            dataType: "json",
            success: function(json)
            { 
                $("#art_3_2").val(json.data);
                $('#art_3_3').val(json.dist);
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
    $('#client2').change(function(){
        var did = 0;
        $("#project").load("src/ajax/work.ajax.php",
        {
            ajax: "get_projekt",
            dID: 	did
        });
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
                    url:'src/ajax/save.workflow.php',
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

function edit_workflow(tat_workflow_id)
{
    $.ajax({
        type: "POST",
        url: "./src/ajax/workflow.edit.php",
        data: "workflowID="+tat_workflow_id,
        dataType: "json",
        success: function(json){		   	
            $("#datepicker").val(json.synetics_data_date);
            $("#worker").val(json.synetics_data_system_id);
            $("#process").val(json.synetics_data_process_id);
            $("#client").val(json.synetics_data_client);
            $("#workplace").val(json.synetics_data_city);
            $("#hinfahrt_1").val(json.synetics_data_outjourneyex);
            $("#hinfahrt_2").val(json.synetics_data_outjourneyto);
            $("#zeit_1").val(json.synetics_data_worktimefrom);
            $("#zeit_2").val(json.synetics_data_worktimeto);
            $("#pause_1").val(json.synetics_data_pause);
            $("#pause_2").val(json.synetics_data_wtpause);
            $("#rueckfahrt_1").val(json.synetics_data_returnjourneyex);
            $("#rueckfahrt_2").val(json.synetics_data_returnjourneyto);
            $("#wagen").val(json.synetics_data_whichcar);
            l_dcr = document.getElementsByName('foodoverall');
            $("#hotelgarni").val(json.synetics_data_hotelgarni);
            $("#rechnungstext").val(json.synetics_data_text);
            $("#kilometer").val(json.synetics_data_km);
            $("#workflow_ID").val(json.synetics_data_ID);
            $("#tat_submit").val("Ändern");
            $("#workAction").val("2");
            if(json.synetics_data_foodoverall != 0)
            {
                l_dcr[0].checked = true;
            }else{
                l_dcr[1].checked = true;   
            }
				

            $("#project").load("src/ajax/work.ajax.php",
            {
                ajax: "get_projekt",
                dID:   json.synetics_data_client,
                selected: json.synetics_data_projects_id
            });
				
            $("#tat_form").fadeIn(1500).dialog("open").resizable();

        }
    });
}
        
function copy_workflow(tat_workflow_id)
{
    $.ajax({
        type: "POST",
        url: "./src/ajax/workflow.edit.php",
        data: "workflowID="+tat_workflow_id,
        dataType: "json",
        success: function(json){		   	
            $("#worker").val(json.synetics_data_system_id);
            $("#process").val(json.synetics_data_process_id);
            $("#client").val(json.synetics_data_client);
            $("#workplace").val(json.synetics_data_city);
            $("#hinfahrt_1").val(json.synetics_data_outjourneyex);
            $("#hinfahrt_2").val(json.synetics_data_outjourneyto);
            $("#zeit_1").val(json.synetics_data_worktimefrom);
            $("#zeit_2").val(json.synetics_data_worktimeto);
            $("#pause_1").val(json.synetics_data_pause);
            $("#pause_2").val(json.synetics_data_wtpause);
            $("#rueckfahrt_1").val(json.synetics_data_returnjourneyex);
            $("#rueckfahrt_2").val(json.synetics_data_returnjourneyto);
            $("#wagen").val(json.synetics_data_whichcar);
            $("#hotelgarni").val(json.synetics_data_hotelgarni);
            $("#rechnungstext").val(json.synetics_data_text);
            $("#kilometer").val(json.synetics_data_km);
            $("#tat_submit").val("Duplizieren");
            $("#workAction").val("1");
            $("#project").load("src/ajax/work.ajax.php",
            {
                ajax: "get_projekt",
                dID:   json.synetics_data_client,
                selected: json.synetics_data_projects_id
            });
				
            $("#tat_form").fadeIn(1500).dialog("open");

        }
    });
}
 	
function new_workflow(tat_workflow_id)
{
    $("#worker").val(tat_workflow_id);
    $("#tat_submit").val("Anlegen");
    $("#workAction").val("1");
    $("#tat_form").fadeIn(1500).dialog("open");
}
 	 	  
function del_workflow(tat_workflow_id,tat_date)
{
    var confirm = window.confirm('Wirklich löschen?');
    if(confirm ==true)
    {
 	 				
 	 				
        $.ajax({
            type: "post",
            url:'src/ajax/save.workflow.php',
            data: "workflow_ID="+tat_workflow_id+"&workAction=3",
            success: function()
            { 
                alert("Tätigkeit vom " + tat_date + " wurde gelöscht");
                setTimeout("location.reload(true);",500);
            }
        });
    }
    else
    {
        alert("Vorgang abgebrochen");
    }
}