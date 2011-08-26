<html>
    <head>
        <meta http-equiv="Content-Type" content="application/html" charset="utf-8"></meta>
        <title>Faktura - Login</title>
        <link rel="stylesheet" type="text/css" href="src/css/login.css"></link>
        <script type="text/javascript" language="JavaScript" src="./src/js/login.js"></script>
    </head>
    <body>

        <div align="center">
            &nbsp;<p>&nbsp;</p>
            <form method="POST" id="login_form" action="">
                <div align="center">
                    <table border="0" width="100%" height="200" cellspacing="0" cellpadding="0" id="login_board">
                        <tr>
                            <th>Benutzername:</th>
                            <td>
                                <input type="text" class="login_input" id="username" name="username" size="30" style="border: 1px solid #000000" value="Benutzername">
                            </td>
                            </tr>
                            <tr>
                            <th>Passwort:</th>
                            <td>
                                <input type="password" class="login_input" id="password" name="password" size="30" style="border: 1px solid #000000"></td>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <a id="login"><font size="5">Einloggen</font></a>
                            </td>
                        </tr>
                        

                    </table>
                    <br>
                    <div id="message" style="border: 1px solid black"></div>
                </div>
                <input type="hidden" name="logged" id="logged" value="1" size="20">
            </form>
        </div>
    </body>

</html>