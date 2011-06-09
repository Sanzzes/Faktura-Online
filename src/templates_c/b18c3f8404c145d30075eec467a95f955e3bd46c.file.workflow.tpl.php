<?php /* Smarty version Smarty-3.0.7, created on 2011-06-09 10:31:54
         compiled from "src/templates/workflow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16571249484df084faa42c95-59495028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b18c3f8404c145d30075eec467a95f955e3bd46c' => 
    array (
      0 => 'src/templates/workflow.tpl',
      1 => 1307608313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16571249484df084faa42c95-59495028',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

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
	 	<a href="javascript:ustunden(<?php echo $_smarty_tpl->getVariable('workerID')->value;?>
)" title="Überstunden anzeigen">
 		<img src="images/icon/uestd.png" border="0" align="right">
		</a>
 	<a href="javascript:new_workflow()" title="Neue Tätigkeit anlegen">
		<img src="images/icon/newclient.png" border="0" align="right">
	</a>
	<?php if ($_smarty_tpl->getVariable('boolsche')->value=="true"){?>
		<a href="#"title="Admincenter" id="admin_open"><img src="images/icon/admin.png" border="0" align="right"></a>
		 <?php }?>
			 <select size="1" name="worker_f" id="worker_f">
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
		<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte" style="border-collapse: collapse" id="inhalte">
	<tr align="center">
		<td height="19" width="211">Mitarbeiter</td>
		<td height="19" width="211">Datum</td>
		<td height="19" width="211">Kunde</td>
		<td height="19" width="211">Einsatzort</td>
		<td height="19" width="211">Projekt</td>
		<td height="19" width="211">Funktion</td>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['item_wert_main'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_wert_main'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_main')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item_wert_main']->key => $_smarty_tpl->tpl_vars['item_wert_main']->value){
 $_smarty_tpl->tpl_vars['key_wert_main']->value = $_smarty_tpl->tpl_vars['item_wert_main']->key;
?>
		<tr align="center">
		<td height="25" width="211"><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_system_name'];?>
</td>
		<td height="25" width="211"><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['date'];?>
</td>
		<td height="25" width="211"><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_clients_client'];?>
</td>
		<td height="25" width="211"><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_city'];?>
</td>
		<td height="25" width="211"><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_projects_projectname'];?>
</td>
		<td height="23" width="132" align="center" valign="top">
			<a href="javascript:edit_workflow(<?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_ID'];?>
)"
			title="Person ändern u. Anzeigen">
			<img src="images/icon/edit.png" border="0"></a>
			<a href="javascript:del_workflow(<?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_ID'];?>
,'<?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['date'];?>
')"
			title="Person löschen">
			<img src="images/icon/del.png" border="0"></a>
		</td>
	</tr>
	<?php }} ?>

</table>
<br>
<div align="center"><?php echo $_smarty_tpl->getVariable('pagelink')->value;?>
</div>
<br>
<br>
					 