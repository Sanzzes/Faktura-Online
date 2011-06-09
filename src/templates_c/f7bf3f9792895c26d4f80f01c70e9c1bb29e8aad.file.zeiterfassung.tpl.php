<?php /* Smarty version Smarty-3.0.7, created on 2011-06-06 15:54:12
         compiled from "src/templates/zeiterfassung.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18189205524decdc04b95670-88744623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7bf3f9792895c26d4f80f01c70e9c1bb29e8aad' => 
    array (
      0 => 'src/templates/zeiterfassung.tpl',
      1 => 1307368447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18189205524decdc04b95670-88744623',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr id="noprint">
		<td>
		<form method="POST" action="index.php?pageID=6">
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
	<?php  $_smarty_tpl->tpl_vars['item_wert_main'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_wert_main'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_main')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item_wert_main']->key => $_smarty_tpl->tpl_vars['item_wert_main']->value){
 $_smarty_tpl->tpl_vars['key_wert_main']->value = $_smarty_tpl->tpl_vars['item_wert_main']->key;
?>
	<tr align="center" id="print">
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
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['allhour'];?>
</td>
				<td ><font size="1"> / </td>
				<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['ustunden_synetics'];?>
</td>
				<td ><font size="1"> / </td>
	</tr>	
	<?php }} ?>
	</table>