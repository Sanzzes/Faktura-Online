<?php /* Smarty version Smarty-3.0.7, created on 2011-06-06 16:04:12
         compiled from "src/templates/kunden.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17237442764decde5c5d9608-78679022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c377cf3eca28c1b728a959dacf6676f00bc9d9d2' => 
    array (
      0 => 'src/templates/kunden.tpl',
      1 => 1307369049,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17237442764decde5c5d9608-78679022',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
	<tr>	
<td height="23" width="auto" colspan="13">
			<a href="#" id="hide_menu" align="right"><img src="./images/menu/close.png" id="closer_img"></a>
	<p><a href="./logout.php" title="Ausloggen">
		<img src="images/icon/logout.png" border="0" align="right">
	</a>		
	<a href="javascript:new_client()" title="Neuen Kunden anlegen">
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
	<tr align="center">
		<th ><font size="1">Kundennummer</th>
		<th ><font size="1">Kunde</td>
		<th ><font size="1">Nachname</th>
		<th ><font size="1">Vorname</th>
		<th ><font size="1">Strasse</th>
		<th ><font size="1">Nr.</th>
		<th ><font size="1">PLZ</th>
		<th ><font size="1">Ort</th>
		<th ><font size="1">Tel.Nr.</th>
		<th ><font size="1">Handy</th>
		<th ><font size="1">Fax</th>
		<th ><font size="1">E-Mail</th>
		<th ><font size="1">Funktion</th>
	</tr>	
	<?php  $_smarty_tpl->tpl_vars['wert'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['keyname'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('kunden')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['wert']->key => $_smarty_tpl->tpl_vars['wert']->value){
 $_smarty_tpl->tpl_vars['keyname']->value = $_smarty_tpl->tpl_vars['wert']->key;
?>
	<tr align="center" valign="top">
		<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_clientno'];?>
</td>
		<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_client'];?>
</td>
		<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_name'];?>
</td>
		<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_surname'];?>
</td>
		<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_street'];?>
</td>
		<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_no'];?>
</td>
		<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_zipcode'];?>
</td>
		<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_city'];?>
</td>
		<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_tel'];?>
</td>
		<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_mobile'];?>
</td>
		<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_fax'];?>
</td>
		<td ><font size="1"><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_mail'];?>
</td>
		<td height="23" width="auto" bordercolor="#000000" align="center" valign="middle" >
		<a href="javascript:edit_client(<?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_clientno'];?>
)"><img src="images/icon/edit.png" border="0"></a>
		<a href="javascript:del_client(<?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_clientno'];?>
,'<?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_client'];?>
')"><img src="images/icon/del.png" border="0"></a>
		</td>

	</tr>
	<?php }} ?>
	</tr>
</table>