<div id="content_admin">
			<div id="auswahl_menu">
				<h3><a href="#">Grundeinstellungen</a></h3>
				<div>
				<form id="admin_grund" method="POST" action="./admin/save.changes.php">
				<table border="0" width="100%">
			<tr>
				<td>Kilometersatz
				<br>
				Arbeitsstunden pro Tag
				<br>
				Pause pro Tag
				</td>
				<td>
				<input type="text" id="km_satz" name="km_satz" value="{$synetics_settings_kmset}"> €
				<br>
				<input type="text" id="std_day" name="std_day" value="{$dayworktime}"> Std
				<br>
				<input type="text" id="stdpause_day" name="stdpause_day" value="{$daypause}"> Min
				<br>
				<input type="hidden" id="action_a" name="action_a" size="4" value="1">
				</td>
			</tr>
			<tr>
				<td><input type="submit" id="primary_admin" value="Übernehmen"></td>
			</tr>	
			</table>
				</form>
				</div>
				
				<h3><a href="#">Rechtesystem</a></h3>
				<div align="center" valign="middle">
				<form id="admin_grund" method="POST" action="./admin/save.changes.php">
				<table border="0" width="100%">
			<tr>
				<td>
				<select id="admin_rights" name="admin_rights">
				<option value="0">Bitte wählen</option>
				
				{foreach key=key_wert item=item_wert from=$admin_1}
				
				<option value="{$item_wert.synetics_system__ID}">{$item_wert.synetics_system_name}</option>
				
				{/foreach}
				
				</select>
				</td>
				<td>
				<input type="text" id="p_rights" name="p_rights" size="4">* 1. Normal  2.Admin<br>
				<input type="hidden" id="action_a"name="action_a" size="4" value="2">
				</td>
			</tr>
			<tr>
				<td><input type="submit" id="primary_admin" name="primary_admin" value="Übernehmen"></td>
			</tr>
				</table>
				</form>
				</div>	
			</div>
</div>