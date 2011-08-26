$(document).ready(function(){
    $("#works").click(function(){
        $.get("index.php",{pageID:'works'},function()
        {
         location.href='?pageID=works';
        })
    })

})