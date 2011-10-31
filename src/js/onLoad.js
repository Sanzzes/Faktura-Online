$(document).ready(function(){
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
    $('#m'+GET['pageID']).css({
        "background-color": "#8aff00", 
        "color": "#ffffff"

    }); 
    $('#form_zeiten').jqTransform();
    
    
    var userid = $('#worker_f').val();
    var thismonth = $('#datepicker1').val();
    var thisyear = $('#datepicker2').val();
    var process = $('#process_id').val();
    
    
    $.ajax({
        type: "post",
        url:"src/ajax/ustunden.ajax.php",
        data: "userid="+userid+"&thisyear="+thisyear+"&thismonth="+thismonth+"&thisprocess="+process,
        success: function(stundeng)
        { 
            $('#stunden_month_ges').html(stundeng);
        }
    });

          $('body').append("<div id='overlay'><img src='src/images/lade.gif' /></div>");
	$.datepicker.regional['de'] = {
		closeText: 'schlieﬂen',
		prevText: '&#x3c;zur&uuml;ck',
		nextText: 'Vor&#x3e;',
		currentText: 'heute',
		monthNames: ['Januar','Februar','M‰rz','April','Mai','Juni',
		'Juli','August','September','Oktober','November','Dezember'],
		monthNamesShort: ['Jan','Feb','M‰r','Apr','Mai','Jun',
		'Jul','Aug','Sep','Okt','Nov','Dez'],
		dayNames: ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'],
		dayNamesShort: ['So','Mo','Di','Mi','Do','Fr','Sa'],
		dayNamesMin: ['So','Mo','Di','Mi','Do','Fr','Sa'],
		weekHeader: 'Wo',
		dateFormat: 'dd.mm.yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['de']);
         

});
function preLoadingOff(){
    $('#overlay').css({"display":"none"});
}