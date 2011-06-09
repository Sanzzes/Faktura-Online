
<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" 
style="border-collapse: collapse">
<tr>
	<td height="auto" width="auto" colspan="13">
			 <form method="POST" action="index.php?pageID=7" id="menu">
			 		<a href="#" id="hide_menu" align="left"><img src="./images/menu/close.png" id="closer_img"></a>
		<p>
		<a href="./logout.php" title="Ausloggen">
		<img src="images/icon/logout.png" border="0" align="right">
		</a>
	 	<a href="javascript:ustunden({$workerID})" title="Überstunden anzeigen">
 		<img src="images/icon/uestd.png" border="0" align="right">
		</a>
 	<a href="javascript:new_workflow()" title="Neue Tätigkeit anlegen">
		<img src="images/icon/newclient.png" border="0" align="right">
	</a>
	{if $boolsche == "true"}
		<a href="#"title="Admincenter" id="admin_open"><img src="images/icon/admin.png" border="0" align="right"></a>
		 {/if}
			 <select size="1" name="worker_f" id="worker_f">
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
		<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte" style="border-collapse: collapse" id="inhalte">
	<tr align="center">
		<td height="19" width="211">Mitarbeiter</td>
		<td height="19" width="211">Datum</td>
		<td height="19" width="211">Kunde</td>
		<td height="19" width="211">Einsatzort</td>
		<td height="19" width="211">Projekt</td>
		<td height="19" width="211">Funktion</td>
	</tr>
	{foreach key=key_wert_main item=item_wert_main from=$data_main}
		<tr align="center">
		<td height="25" width="211"><font size="1">{$item_wert_main.synetics_system_name}</td>
		<td height="25" width="211"><font size="1">{$item_wert_main.date}</td>
		<td height="25" width="211"><font size="1">{$item_wert_main.synetics_clients_client}</td>
		<td height="25" width="211"><font size="1">{$item_wert_main.synetics_data_city}</td>
		<td height="25" width="211"><font size="1">{$item_wert_main.synetics_projects_projectname}</td>
		<td height="23" width="132" align="center" valign="top">
			<a href="javascript:edit_workflow({$item_wert_main.synetics_data_ID})"
			title="Person ändern u. Anzeigen">
			<img src="images/icon/edit.png" border="0"></a>
			<a href="javascript:del_workflow({$item_wert_main.synetics_data_ID},'{$item_wert_main.date}')"
			title="Person löschen">
			<img src="images/icon/del.png" border="0"></a>
		</td>
	</tr>
	{/foreach}

</table>
<br>
<div align="center">{$pagelink}</div>
<br>
<br>
					 