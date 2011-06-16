	<div class="clearboth"></div>
  </div>
<div id="noprint">
<div class="footer holidays">
<h3>Feiertage {$yearnow}:</h3>
<div class="feiertage">
{foreach $days AS $key => $value}
{$key}: <font color="red">{$value} </font> ||
{/foreach}
<br>
<br>
<br>
<table border="0" height="auto" width="100%"  cellspacing="0" cellpadding="0">
	<tr>
		<td height="183" width="310" rowspan="2" valign="top">

                <h3>Logged in as:</h3>
                <li>Benutzer:<font color="blue"> {$user_name} </font></li>
                <li>Name: {$user_nach},{$user_vor}</li>
                <li>Rechte:<font color="orange"> {if $user_rights == 1}Normal{else}Admin{/if}</font></li>
                <br><a href="logout.php">Ausloggen</a>

                </td>
		<td align="center"><div id="uhrzeit"></div></td>

	</tr>
</table>
</div>
</div>
</div>
   </div>