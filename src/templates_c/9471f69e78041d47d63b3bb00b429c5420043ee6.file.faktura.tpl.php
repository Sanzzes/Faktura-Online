<?php /* Smarty version Smarty-3.0.7, created on 2011-06-08 09:06:42
         compiled from "src/templates/faktura.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14336209184def1f825873f9-13693038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9471f69e78041d47d63b3bb00b429c5420043ee6' => 
    array (
      0 => 'src/templates/faktura.tpl',
      1 => 1307448633,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14336209184def1f825873f9-13693038',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr id="noprint">
		<td>
		<form method="POST" action="index.php?pageID=5">
		<a href="#" id="hide_menu" align="left"><img src="./images/menu/close.png" id="closer_img"></a>
		<p>
		  <a href="javascript:window.print()" title="Seite drucken" align="right"><img src="images/icon/print.png" border="0" align="right"></a>
		 <a href="./logout.php" title="Ausloggen" align="right"><img src="images/icon/logout.png" border="0" align="right"></a>
 <?php if ($_smarty_tpl->getVariable('boolsche')->value=="true"){?>
		<a href="#" title="Admincenter" id="admin_open">
		<img src="images/icon/admin.png" border="0" align="right">
		</a>
<?php }?>
	
		<input type="text" name="datepicker1" id="datepicker1" size="6" value="Monat">
		<input type="text" name="datepicker2" id="datepicker2" size="6" value="Jahr">
					<select size="1" name="worker" id="worker">
			<option selected value="0">Nachname</option>
			
<?php  $_smarty_tpl->tpl_vars['item_wert'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_wert'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_lastname')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item_wert']->key => $_smarty_tpl->tpl_vars['item_wert']->value){
 $_smarty_tpl->tpl_vars['key_wert']->value = $_smarty_tpl->tpl_vars['item_wert']->key;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system__ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_name'];?>
</option>
<?php }} ?>
			</select>		
			<input type="submit" value="" name="zeit_submit" id="zeit_submit" title="Übernehmen">
			</p>
			</form>
		 	</td>
	</tr>
	</table>
                <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse" id="inhalte">
		<tr id="print" align="center">
		<td ><font size="1">Datum</font></td>
		<td ><font size="1">Kunde</font></td>
		<td ><font size="1">Ort</font></td>
		<td ><font size="1">Projekt</font></td>
		<td ><font size="1">Hinfahrt von</font></td>
		<td ><font size="1">bis</font></td>
		<td ><font size="1">Arbeitszeit von</font></td>
		<td ><font size="1">bis</font></td>
		<td ><font size="1">Rückfahrt von</font></td>
		<td ><font size="1">bis</font></td>
		<td ><font size="1">Pause</font></td>
		<td ><font size="1">AZ<br>-<br>Pause</font></td>
		<td ><font size="1">Fahrzt.</font></td>
		<td ><font size="1">Dienstl. Tagessatz</font></td>
		<td ><font size="1">Dienstl. Std.satz</font></td>
		<td ><font size="1">Fahrt Pauschal</font></td>
		<td ><font size="1">Fahrt Std.satz</font></td>
		<td ><font size="1">KM</font></td>
		<td ><font size="1">KM Satz</font></td>
		<td ><font size="1">Hotel</font></td>
		<td ><font size="1">Spesen</font></td>
		<td ><font size="1">Bahn</font></td>
		<td ><font size="1">Flug</font></td>
		<td ><font size="1">Mietwagen</font></td>
		<td ><font size="1">Parken</font></td>
		<td ><font size="1">Str-/U-/ S-Bahn</font></td>
		<td ><font size="1">Taxi</font></td>
	</tr>
<?php  $_smarty_tpl->tpl_vars['item_wert_main'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_wert_main'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_main')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item_wert_main']->key => $_smarty_tpl->tpl_vars['item_wert_main']->value){
 $_smarty_tpl->tpl_vars['key_wert_main']->value = $_smarty_tpl->tpl_vars['item_wert_main']->key;
?>
		<tr id="print" align="center">
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['date'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_clients_client'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_city'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_projects_projectname'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['time_hin'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['time_hin2'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['time_work'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['time_work2'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['time_zur'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['time_zur2'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['pause'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['azpause'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['fahrtzeit'];?>
</td>
				<td ><font size="1">/</td>
				<td ><font size="1">/</td>
				<td ><font size="1">/</td>
				<td ><font size="1">/</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_km'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_settings_kmset'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_hotel'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_foodoverall'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_train'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_airfare'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_rentalcar'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_parking'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_citytrain'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_taxi'];?>
€</td>

	</tr>
<?php }} ?>
</table>