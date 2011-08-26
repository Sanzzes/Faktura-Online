$(document).ready(function(){
    $("#logout").click(function(){
        $.post("logout.php",{},function()
        {
            alert("Erfolgreich ausgelogt");
            window.location.href='index.php';
        })
    })

})