<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr id="noprint">
		<td>
		<form method="POST" action="index.php?pageID=6">
		<a href="#" id="hide_menu" align="left"><img src="./images/menu/close.png" id="closer_img"></a>
		<p>
		  <a href="javascript:window.print()" title="Seite drucken" align="right"><img src="images/icon/print.png" border="0" align="right"></a>
		 <a href="./logout.php" title="Ausloggen" align="right"><img src="images/icon/logout.png" border="0" align="right"></a>
 {if $boolsche == "true"}
		<a href="#" title="Admincenter" id="admin_open">
		<img src="images/icon/admin.png" border="0" align="right">
		</a>
{/if}
	
		<input type="text" name="datepicker1" id="datepicker1" size="6" value="Monat">
		<input type="text" name="datepicker2" id="datepicker2" size="6" value="Jahr">
					<select size="1" name="worker" id="worker">
			<option selected value="0">Nachname</option>
			
{foreach key=key_wert item=item_wert from=$data_lastname}
			<option value="{$item_wert.synetics_system__ID}">{$item_wert.synetics_system_name}</option>
{/foreach}
			</select>		
			<input type="submit" value="" name="zeit_submit" id="zeit_submit" title="Übernehmen">
			</p>
			</form>
		 	</td>
                </tr>
                </table>
                <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse" id="inhalte">
		<tr id="print">	
		<td width="90" align="center"> <font size="1">Datum</font></td>
		<td width="90" align="center"> <font size="1">Kunde</font></td>
		<td width="90" align="center"> <font size="1">Ort</font></td>
		<td width="91" align="center"> <font size="1">Projekt</font></td>
		<td width="51" align="center"> <font size="1">Hinfahrt von</font></td>
		<td width="51" align="center"> <font size="1">bis</font></td>
		<td width="51" align="center"> <font size="1">Arbeitszeit 
		von</font></td>
		<td height="35" width="52" align="center"> <font size="1">bis</font></td>
		<td height="35" width="52" align="center"> <font size="1">Rückfahrt 
		von</font></td>
		<td width="52" align="center"> <font size="1">bis</font></td>
		<td width="52" align="center" ><font size="1">Pause</font></td>
		<td width="52" align="center" ><font size="1">AZ - Pause</font></td>
		<td width="52" align="center" ><font size="1">Fahrzt.</font></td>
		<td width="52" align="center" ><font size="1">Gesamt-Zeit</font></td>
		<td width="52" align="center" ><font size="1">bez. Ü. Std</font></td>
		<td width="52" align="center" ><font size="1">Mehr Std</font></td>
		<td width="52" align="center" ><font size="1">ges. Woche</font></td>
	</tr>
	</tr>
	{foreach key=key_wert_main item=item_wert_main from=$data_main}
	<tr align="center" id="print">
				<td ><font size="1">{$item_wert_main.date}</td>
				<td ><font size="1">{$item_wert_main.synetics_clients_client}</td>
				<td ><font size="1">{$item_wert_main.synetics_data_city}</td>
				<td ><font size="1">{$item_wert_main.synetics_projects_projectname}</td>
				<td ><font size="1">{$item_wert_main.time_hin}</td>
				<td ><font size="1">{$item_wert_main.time_hin2}</td>
				<td ><font size="1">{$item_wert_main.time_work}</td>
				<td ><font size="1">{$item_wert_main.time_work2}</td>
				<td ><font size="1">{$item_wert_main.time_zur}</td>
				<td ><font size="1">{$item_wert_main.time_zur2}</td>
				<td ><font size="1">{$item_wert_main.pause}</td>
				<td ><font size="1">{$item_wert_main.azpause}</td>
				<td ><font size="1">{$item_wert_main.fahrtzeit}</td>
				<td ><font size="1">{$item_wert_main.allhour}</td>
				<td ><font size="1"> / </td>
				<td ><font size="1">{$item_wert_main.ustunden_synetics}</td>
				<td ><font size="1"> / </td>
	</tr>	
	{/foreach}
	</table>