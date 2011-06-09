<html>
    <head>
        <title>Faktura - Login</title>
        <link rel="stylesheet" type="text/css" href="src/css/login.css"></link>
        <script type="text/javascript" language="JavaScript" src="./src/js/jquery/jquery.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/jquery/jquery.tools.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#browsers img[title]').tooltip({
                    effect: "fade",
                    opacity: 0.7
                });
                $("#message").hide();
                $("#login").click(function(){
                    var username = $("#username").attr("value");
                    var password = $("#password").attr("value");
                    if (username != "" && password != "")
                    {
                        document.forms[0].submit();
                    }
                    else
                    {
                        $("#message").html("Bitte füllen sie alle Felder aus! <a href=''#' id='hide_block'>Ausblenden</a>");
                        $("#message").show();
                    }
                });
                $("#hide_block").click(function(){
                    $("#message").hide();
		
                });
            });
        </script>

    </head>
    <body>

        <div align="center">
            &nbsp;<p>&nbsp;</p>
            <form method="POST" action="verwaltung.php">
                <div align="center">
                    <table border="0" width="437" height="236" cellspacing="0" cellpadding="0" id="login_board">
                        <tr>
                            <td height="31" width="437" colspan="4">
                                <img border="0" src="images/login_head.png" width="438" height="99" id="login_head"></td>
                        </tr>
                        <tr>
                            <td height="137" width="147" rowspan="6" valign="top">
                                <img border="0" src="images/login_names.png" width="147" height="85"></td>
                            <td height="27" width="149" colspan="2" valign="top">
                                <input type="text" class="login_input" id="username" name="username" size="33" style="border: 1px solid #000000" value="Benutzername"></td>
                            <td height="137" width="142" rowspan="6" valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="35" width="149" bgcolor="#FFFFFF" colspan="2" valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="22" width="149" colspan="2" valign="top">
                                <input type="password" class="login_input" id="password" name="password" size="33" style="border: 1px solid #000000"></td>
                        </tr>
                        <tr>
                            <td height="19" width="149" colspan="2" valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="33" width="164" rowspan="2" valign="top">&nbsp;</td>
                            <td height="14" width="81" valign="top">
                                <a href="#" id="login"><img src="images/login_login.png" border="0"></a></td>
                        </tr>
                        <tr>
                            <td height="19" width="81" valign="top">&nbsp;</td>
                        </tr>
                    </table>
					<br>
                    <div id="message" style="border: 1px solid black"></div>
                </div>
                <input type="hidden" name="logged" id="logged" value="1" size="20">
            </form>
        </div>
        <div align="center" id="browsers"><br><br>Optimiert für : <br><img src="images/browser/firefox_icon.png" border="0" title="Mozilla Firefox 3/4"><img src="images/browser/chrome_icon.png" border="0"title="Google Chrome 11"></div>
    </body>

</html>
