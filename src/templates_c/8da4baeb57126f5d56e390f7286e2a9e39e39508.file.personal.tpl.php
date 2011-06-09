<?php /* Smarty version Smarty-3.0.7, created on 2011-06-06 16:02:31
         compiled from "src/templates/personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14098844374decddf7237105-42790778%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8da4baeb57126f5d56e390f7286e2a9e39e39508' => 
    array (
      0 => 'src/templates/personal.tpl',
      1 => 1307368950,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14098844374decddf7237105-42790778',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="content">
	<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td height="23" width="auto" colspan="13">
		<a href="#" id="hide_menu" align="right"><img src="./images/menu/close.png" id="closer_img"></a>
	<p>
	<a href="./logout.php" title="Ausloggen">
		<img src="images/icon/logout.png" border="0" align="right">
	</a>
	<a href="javascript:new_personal()" title="Neuen Kunden anlegen">
		<img src="images/icon/newclient.png" border="0" align="right">
	</a>
	<?php if ($_smarty_tpl->getVariable('boolsche')->value=="true"){?>
	<a href="#" title="Admincenter" id="admin_open"><img src="images/icon/admin.png" border="0" align="right"></a>
	 <?php }?>
	 </p>
	 </td>
	</tr>
	</table>
	<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse" id="inhalte">
	<tr>
		<th><font size="1">Vorname</th>
		<th ><font size="1">Nachname</th>
		<th ><font size="1">Strasse</th>
		<th ><font size="1">Nr.</th>
		<th ><font size="1">PLZ</th>
		<th ><font size="1">Ort</th>
		<th ><font size="1">Tel.Nr.</th>
		<th ><font size="1">Handy</th>
		<th ><font size="1">E-Mail</th>
		<th ><font size="1">Funktion</th>
	</tr>	
	<?php  $_smarty_tpl->tpl_vars['item_wert'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_wert'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_people')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item_wert']->key => $_smarty_tpl->tpl_vars['item_wert']->value){
 $_smarty_tpl->tpl_vars['key_wert']->value = $_smarty_tpl->tpl_vars['item_wert']->key;
?>
		<tr bgcolor="White" align="center" valign="top">
		<td height="23" width="131"><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_surname'];?>
</td>
		<td height="23" width="131"><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_name'];?>
</td>
		<td height="23" width="131"><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_street'];?>
</td>
		<td height="23" width="131"><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_no'];?>
</td>
		<td height="23" width="131"><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_zipcode'];?>
</td>
		<td height="23" width="131""><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_city'];?>
</td>
		<td height="23" width="131"><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_tele'];?>
</td>
		<td height="23" width="131""><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_mobile'];?>
</td>
		<td height="23" width="131"><font size="1"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_mail'];?>
</td>
		<td height="23" width="132">
		<a href="javascript:edit_personal(<?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system__ID'];?>
)" title="Person ändern u. Anzeigen"><img src="images/icon/edit.png" border="0"></a>
		<a href="javascript:del_personal(<?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system__ID'];?>
,'<?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_name'];?>
','<?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_surname'];?>
',<?php echo $_smarty_tpl->getVariable('sessionid')->value;?>
)" title="Person löschen"><img src="images/icon/del.png" border="0"></a>
		</td>
	</tr>
	<?php }} ?>
</table>
</div>