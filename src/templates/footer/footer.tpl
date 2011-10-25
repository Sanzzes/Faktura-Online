<div class="clearboth"></div>
<div id="noprint">
    <div id="footer">
        <table width="100%"  cellspacing="0" cellpadding="10px">
            <tr>
                <td valign="top">

                    <h3>Logged in as:</h3>
                    <ul>
                        <li>Benutzer:<font color="blue"> {$smarty.session.user_username} </font></li>
                        <li>Name: {$user_nach}</li>
                        <li>Rechte:<font color="orange"> {if $user_rights == 1}Normal{else}Admin{/if}</font></li>
                    </ul>
                    <br /><a href="logout.php">Ausloggen</a>
                </td>
                <td>
                    {foreach $days AS $key => $value}
                        {$key}: <font color="red" size="2px">{$value}</font> ||
                    {/foreach}
                </td>
            </tr>
        </table>
    </div>
</div>

</div>
</div>
</body>
</html>