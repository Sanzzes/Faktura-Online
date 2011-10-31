$(document).ready(function(){
    $('#inhalte_app').dataTable({
        "bJQueryUI": true,
        "sDom": 'T<"clear">lfrtip',
	"aLengthMenu": [[10, 20, -1], [10, 20, "Alle"]],
	      "oLanguage": {
            "sUrl": "media/language/de_DE.txt"
        }
        
    });
})