$(document).ready(function(){
                $("#message").hide();
                $("#login").click(function(){
                        $.post("./src/ajax/login.inc.php",{username:$("#username").val(), password:$('#password').val(), logged:$('#logged').val()},function(data)
                        {
                           
                            if(data > 0)
                            {
                                $('#message').show().fadeTo(200, 0.1,function()
                                 {
                                   $(this).html("Login war erfolgreich").fadeTo(900,1,
                                   function()
                                   {
                                   window.location.href='index.php';
                               });
                            });
                            }
                            else{
                                
                                $('#message').show().fadeTo(200,0.1,function(){
                                    $(this).html("Das Login war nicht erfolgreich<br>Password oder Username Falsch").fadeTo(900,1);
                                });
                            }
                        });
                        return false;
                         }); 
                    });

