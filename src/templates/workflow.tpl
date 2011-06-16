
<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" 
style="border-collapse: collapse">
<tr id="noprint">
	<td height="auto" width="auto" colspan="13">
			 <form method="POST" action="index.php?pageID=7" id="menu">
			 		<a href="#" id="hide_menu" align="left"><img src="./images/menu/close.png" id="closer_img"></a>
		<p>
		<a href="./logout.php" title="Ausloggen">
		<img src="images/icon/logout.png" border="0" align="right">
		</a>
                <a href="javascript:window.print()" title="Seite drucken" align="right"><img src="images/icon/print.png" border="0" align="right"></a>
	 	<a href="javascript:ustunden({$perID})" title="Überstunden anzeigen">
 		<img src="images/icon/uestd.png" border="0" align="right">
		</a>
 	<a href="javascript:new_workflow({$perID})" title="Neue Tätigkeit anlegen">
		<img src="images/icon/newclient.png" border="0" align="right">
	</a>
	{if $boolsche == "true"}
		<a href="#"title="Admincenter" id="admin_open"><img src="images/icon/admin.png" border="0" align="right"></a>
		 {/if}
                         <input type="text" name="datepicker1" id="datepicker1" size="6" value="{$month}">
                         <input type="text" name="datepicker2" id="datepicker2" size="6" value="{$year}">
			 <select size="1" name="worker_f" id="worker_f">
						<option selected value="0">Nachname</option>
{foreach key=key_wert item=item_wert from=$data_lastname}
                   {if $perID == $item_wert.synetics_system__ID}
			<option selected value="{$item_wert.synetics_system__ID}">{$item_wert.synetics_system_name}</option>
                         {else}
                         <option value="{$item_wert.synetics_system__ID}">{$item_wert.synetics_system_name}</option>
                    {/if}  
{/foreach}
			</select>
			<input type="submit" value="" name="zeit_submit" id="zeit_submit" title="Übernehmen">
			</p>
		</form>
		 </td>
	</tr>	
	</table>
		<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte" style="border-collapse: collapse">
	<tr align="center" id="print">
		<td ><font size="1">Mitarbeiter</td>
		<td ><font size="1">Datum</td>
		<td ><font size="1">Kunde</td>
		<td ><font size="1">Einsatzort</td>
		<td ><font size="1">Projekt</td>
                <td ><font size="1">Hinfahrt von</td>
		<td ><font size="1">bis</td>
		<td ><font size="1">Arbeitszeit von</td>
		<td > <font size="1">bis</td>
		<td > <font size="1">Rückfahrt von</td>
		<td > <font size="1">bis</td>
		<td ><font size="1">Pause</font></td>
		<td ><font size="1">AZ - Pause</td>
		<td ><font size="1">Fahrzt.</td>
		<td ><font size="1">Gesamt-Zeit</td>
                <td ><font size="1">Mehr Std.</td>
		<td id="noprint"><font size="1">Funktion</td>
	</tr>
	{foreach key=key_wert_main item=item_wert_main from=$data_main}
		<tr align="center">
		<td ><font size="1">{$item_wert_main.synetics_system_name}</td>
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
		<td ><font size="1">{$item_wert_main.ustunden_synetics}</td>
		<td id="noprint">
			<a href="javascript:edit_workflow({$item_wert_main.synetics_data_ID})"
			title="Person ändern u. Anzeigen">
			<img src="images/icon/edit.png" border="0"></a>
			<a href="javascript:del_workflow({$item_wert_main.synetics_data_ID},'{$item_wert_main.date}')"
			title="Person löschen">
			<img src="images/icon/del.png" border="0"></a>
                        <input type="checkbox" title="Markieren zum Löschen" name="tatdelete[]" value="{$item_wert_main.synetics_data_ID}">
		</td>
	</tr>
	{/foreach}
</table>
<br>
<div align="center" id="noprint">{$pagelink}</div><div class="execute_del" id="execute_del">Markierte Löschen</div>
<br>
<br>
					 