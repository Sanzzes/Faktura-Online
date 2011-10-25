<html>
    <!DOCTYPE  html PUBLIC "-//WC3//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

    <head>
        <meta http-equiv="Content-Type" content="application/html" charset="utf-8">
        <title>Faktura - Login</title>
        <link rel="stylesheet" type="text/css" href="src/css/login.css">
        <script type="text/javascript" language="JavaScript" src="./src/js/jquery/jquery.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/jquery/jquery.tools.min.js"></script>
        <script type="text/javascript" language="JavaScript" src="./src/js/login.js"></script>
    </head>
    <body>

        <div align="center" id="registration">
            <table width="100%" height="100%">
             <tr>
                 <td>
            <img src="./images/loginfaktura.png">
            <form method="POST" id="login_form" action="">
                <fieldset>
                    <p><label for="username">Benutzername</label>
                        <input type="text" class="text" id="username" name="username">
                    </p>                    
                    <p><label for="password">Passwort:</label>
                        <input type="password" class="text" id="password" name="password">
                    </p>

                    <p>
                        <input type="submit" id="login" value="Login">
                    </p>
                    <input type="hidden" name="logged" id="logged" value="1" size="20">   
                </fieldset>
            </form>
                             <div id="message"></div>
                             <div style="display:none" id="divloader"><img src="src/images/loading.gif" /></div>
                 </td>
             </tr>
            </table>
        </div>

    </body>

</html>