<?php /* Smarty version Smarty-3.0.7, created on 2011-06-06 15:53:06
         compiled from "src/templates/reisekosten.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7006455974decdbc2303638-61815250%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9871e4481236a4da0b09b29cef2c5322c7b0e49' => 
    array (
      0 => 'src/templates/reisekosten.tpl',
      1 => 1307368384,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7006455974decdbc2303638-61815250',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr id="noprint">
		<td>
		<form method="POST" action="index.php?pageID=4">
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
	<tr id="print">
		<td height="34" width="92" align="center"><font size="1">Datum</font></td>
		<td height="34" width="93" align="center"><font size="1">Kunde</font></td>
		<td height="34" width="93" align="center"><font size="1">Ort</font></td>
		<td height="34" width="53" align="center" valign="top"><font size="1">Hin fahrt von</font></td>
		<td height="34" width="52" align="center"><font size="1">bis</font></td>
		<td height="34" width="55" align="center" valign="top"><font size="1">Arbeit szeit von</font></td>
		<td height="34" width="52" align="center"><font size="1">bis</font></td>
		<td height="34" width="54" align="center" valign="top"><font size="1">Rück fahrt von</font></td>
		<td height="34" width="52" align="center"><font size="1">bis</font></td>
		<td height="34" width="54" align="center"><font size="1">Std.ges.</font></td>
		<td height="34" width="57" align="center" valign="top"><font size="1">Verpfl. pausch.</font></td>
		<td height="34" width="54" align="center"><font size="1">KM</font></td>
		<td height="34" width="55" align="center"><font size="1">Bahn</font></td>
		<td height="34" width="56" align="center"><font size="1">Benzin</font></td>
		<td height="34" width="54" align="center"><font size="1">Flug</font></td>
		<td height="34" width="56" align="center"><font size="1">Fracht</font></td>
		<td height="34" width="55" align="center"><font size="1">Hotel</font></td>
		<td height="34" width="56" align="center"><font size="1">Mietwagen</font></td>
		<td height="34" width="56" align="center"><font size="1">Parken</font></td>
		<td height="34" width="56" align="center" valign="top"><font size="1">Str-/U-/ S-Bahn</font></td>
		<td height="34" width="55" align="center"><font size="1">Taxi</font></td>
		<td height="34" width="57" align="center"><font size="1">Bewirtung</font></td>
	</tr>
<?php  $_smarty_tpl->tpl_vars['item_wert_main'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_wert_main'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_main')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item_wert_main']->key => $_smarty_tpl->tpl_vars['item_wert_main']->value){
 $_smarty_tpl->tpl_vars['key_wert_main']->value = $_smarty_tpl->tpl_vars['item_wert_main']->key;
?>
				
				<tr id="print" align="center" >
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['date'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_clients_client'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_city'];?>
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
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['allhour'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_foodoverall'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_km'];?>
</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_train'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_oil'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_airfare'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_freight'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_hotel'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_rentalcar'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_parking'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_citytrain'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_taxi'];?>
€</td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_hospitality'];?>
€</td>

			</tr>
<?php }} ?>
</table>