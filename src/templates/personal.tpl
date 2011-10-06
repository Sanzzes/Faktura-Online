<div id="content">
	<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td height="23" width="auto" colspan="13">
	<p>
	<a href="./logout.php" title="Ausloggen">
		<img src="images/icon/logout.png" border="0" align="right">
	</a>
	<a href="javascript:new_personal()" title="Neue Person anlegen">
		<img src="images/icon/newclient.png" border="0" align="right">
	</a>
	{if $boolsche == "true"}
	<a href="#" title="Admincenter" id="admin_open"><img src="images/icon/admin.png" border="0" align="right"></a>
	 {/if}
	 </p>
	 </td>
	</tr>
	</table>
	<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse" id="inhalte">
	<tr>
		<th ><font size="1">Nachname</th>
		<th ><font size="1">Strasse</th>
		<th ><font size="1">PLZ</th>
		<th ><font size="1">Ort</th>
		<th ><font size="1">Tel.Nr.</th>
		<th ><font size="1">E-Mail</th>
                <th ><font size="1">Arbeitstage/Woche</th>
                <th ><font size="1">Arbeitsstunden/Woche</th>
		<th ><font size="1">Funktion</th>
	</tr>	
	{foreach key=key_wert item=item_wert from=$data_people}
		<tr bgcolor="White" align="center" valign="top">
		<td height="23" width="131"><font size="1">{$item_wert.synetics_system_name}</td>
		<td height="23" width="131"><font size="1">{$item_wert.synetics_system_street}</td>
		<td height="23" width="131"><font size="1">{$item_wert.synetics_system_zipcode}</td>
		<td height="23" width="131""><font size="1">{$item_wert.synetics_system_city}</td>
		<td height="23" width="131"><font size="1">{$item_wert.synetics_system_tele}</td>
		<td height="23" width="131"><font size="1">{$item_wert.synetics_system_mail}</td>
                <td height="23" width="131"><font size="1">{$item_wert.synetics_system_weekwork}</td>
		<td height="23" width="131"><font size="1">{$item_wert.synetics_system_weekhour}</td>
		<td height="23" width="132">
		<a href="javascript:edit_personal({$item_wert.synetics_system__ID})" title="Person ändern u. Anzeigen"><img src="images/icon/edit.png" border="0"></a>
		<a href="javascript:del_personal({$item_wert.synetics_system__ID},'{$item_wert.synetics_system_name}','{$item_wert.synetics_system_surname}',{$sessionid})" title="Person löschen"><img src="images/icon/del.png" border="0"></a>
		</td>
	</tr>
	{/foreach}
</table>
</div>