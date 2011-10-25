$(document).ready(function() {
    $('#holiday_form').dialog({
        autoOpen: false,
        width: 400,
        height: 240,
        resizable: false,
        modal: true
    });
    $( "#pickadate1" ).datepicker({
        dateFormat: 'dd.mm.yy'
    });
    
    $( "#pickadate2" ).datepicker({
        dateFormat: 'dd.mm.yy'
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
    
    $('#einpflegen').live('click', function(){
        var appid = $(this).children().attr("id");
        $.ajax({
            type: "POST",
            url: "./src/ajax/holiday.application.php",
            data: "appid_val="+appid+"&holiday_pflege=1&pflege=1",
            success: function(work) {
                alert("Der Antrag wurde eingepflegt");
                location.reload(true);
            }
        });
        return false;
        
    })
    $('#auspflegen').live('click', function(){
        var appid = $(this).children().attr("id");
        $.ajax({
            type: "POST",
            url: "./src/ajax/holiday.application.php",
            data: "appid_val="+appid+"&holiday_pflege=1&pflege=0",
            success: function(work) {
                alert("Der Antrag wurde Ausgepflegt")
                location.reload(true);
                                       
            }
        });
        return false;
        
    })
    $('#delete_holiday').live('click', function(){
        var appid = $(this).children().attr("id");
        var confirm = window.confirm('Wirklich löschen?');
        if(confirm ==true)
        {
            $.ajax({
                type: "POST",
                url: "./src/ajax/holiday.application.php",
                data: "appid_val="+appid+"&function=1&func=1",
                success: function() {
                    alert("Der Antrag wurde gelöscht")
                    location.reload(true);
                                       
                }
            });
            return false;
        }
        else
        {
            alert("Vorgang abgebrochen");
        }
        
    })
    
    $('#edit_holiday').live('click', function(){
        var appid = $(this).children().attr("id");
        $.ajax({
            type: "POST",
            url: "./src/ajax/holiday.application.php",
            data: "appid="+appid+"&function=1&func=2",
            dataType: "json",
            success: function(json) {
                $("#submit_holiday").hide();
                $('#holiday_form').attr("title","Urlaub ändern")
                $("#submit_holiday_be").hide();
                $("#pickadate1").val(json.synetics_holiday_appfrom);
                $("#pickadate2").val(json.synetics_holiday_appto);
                $('#submit_holiday_edit').button();
                $('#submit_holiday_edit').show();
                $('#appid_val').val(json.synetics_holiday_appid);
                $('#holiday_form').dialog('open');
                                       
            }
        });
        return false;

        
    });
    $('#transfer_inacc').live('click', function(){
        var appid = $(this).children().attr("id");
        $.ajax({
            type: "POST",
            url: "./src/ajax/holiday.application.php",
            data: "appid_val="+appid+"&function=1&func=2",
            dataType: "json",
            success: function(json) {
                $("#submit_holiday").show();
                $("#submit_holiday").button();
                $('#holiday_form').attr({
                
                    title: 'Urlaub übertragen'
                });
                $('#submit_holiday').val("Übertragen");
                $("#submit_holiday_be").hide();
                $("#pickadate1").val(json.synetics_holiday_appfrom);
                $("#pickadate2").val(json.synetics_holiday_appto);
                $('#submit_holiday_edit').hide();
                $('#holiday_form').dialog('open');
                                       
            }
        });
        return false;

        
    });
});