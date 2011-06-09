<?php /* Smarty version Smarty-3.0.7, created on 2011-06-06 10:04:18
         compiled from "src/templates/admin/admincenter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7199849224dec8a02e701b4-13045161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'caf2e6bbc5793c7f687b0bb14f47243b760c03d9' => 
    array (
      0 => 'src/templates/admin/admincenter.tpl',
      1 => 1307347444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7199849224dec8a02e701b4-13045161',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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
				<input type="text" id="km_satz" name="km_satz" value="<?php echo $_smarty_tpl->getVariable('synetics_settings_kmset')->value;?>
"> €
				<br>
				<input type="text" id="std_day" name="std_day" value="<?php echo $_smarty_tpl->getVariable('dayworktime')->value;?>
"> Std
				<br>
				<input type="text" id="stdpause_day" name="stdpause_day" value="<?php echo $_smarty_tpl->getVariable('daypause')->value;?>
"> Min
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
				
				<?php  $_smarty_tpl->tpl_vars['item_wert'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_wert'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('admin_1')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item_wert']->key => $_smarty_tpl->tpl_vars['item_wert']->value){
 $_smarty_tpl->tpl_vars['key_wert']->value = $_smarty_tpl->tpl_vars['item_wert']->key;
?>
				
				<option value="<?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system__ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_name'];?>
</option>
				
				<?php }} ?>
				
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