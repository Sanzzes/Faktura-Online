
<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
	<tr>	
<td height="23" width="auto" colspan="13">
			<a href="#" id="hide_menu" align="right"><img src="./images/menu/close.png" id="closer_img"></a>
	<p><a href="./logout.php" title="Ausloggen">
		<img src="images/icon/logout.png" border="0" align="right">
	</a>		
	<a href="javascript:new_client()" title="Neuen Kunden anlegen">
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
	<tr align="center">
		<th ><font size="1">Kundennummer</th>
		<th ><font size="1">Kunde</td>
		<th ><font size="1">Nachname</th>
		<th ><font size="1">Vorname</th>
		<th ><font size="1">Strasse</th>
		<th ><font size="1">Nr.</th>
		<th ><font size="1">PLZ</th>
		<th ><font size="1">Ort</th>
		<th ><font size="1">Tel.Nr.</th>
		<th ><font size="1">Handy</th>
		<th ><font size="1">Fax</th>
		<th ><font size="1">E-Mail</th>
		<th ><font size="1">Funktion</th>
	</tr>	
	{foreach key=keyname item=wert from=$kunden}
	<tr align="center" valign="top">
		<td ><font size="1">{$wert.synetics_clients_clientno}</td>
		<td ><font size="1">{$wert.synetics_clients_client}</td>
		<td ><font size="1">{$wert.synetics_clients_name}</td>
		<td ><font size="1">{$wert.synetics_clients_surname}</td>
		<td ><font size="1">{$wert.synetics_clients_street}</td>
		<td ><font size="1">{$wert.synetics_clients_no}</td>
		<td ><font size="1">{$wert.synetics_clients_zipcode}</td>
		<td ><font size="1">{$wert.synetics_clients_city}</td>
		<td ><font size="1">{$wert.synetics_clients_tel}</td>
		<td ><font size="1">{$wert.synetics_clients_mobile}</td>
		<td ><font size="1">{$wert.synetics_clients_fax}</td>
		<td ><font size="1">{$wert.synetics_clients_mail}</td>
		<td height="23" width="auto" bordercolor="#000000" align="center" valign="middle" >
		<a href="javascript:edit_client({$wert.synetics_clients_clientno})"><img src="images/icon/edit.png" border="0"></a>
		<a href="javascript:del_client({$wert.synetics_clients_clientno},'{$wert.synetics_clients_client}')"><img src="images/icon/del.png" border="0"></a>
		</td>

	</tr>
	{/foreach}
	</tr>
</table>