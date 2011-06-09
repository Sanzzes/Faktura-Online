<?php /* Smarty version Smarty-3.0.7, created on 2011-06-06 15:57:45
         compiled from "src/templates/projekte.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19559052004decdcd96d1ab4-41046687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca483f63ca255ea0e125d1506aad70d23c9f03df' => 
    array (
      0 => 'src/templates/projekte.tpl',
      1 => 1307368659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19559052004decdcd96d1ab4-41046687',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<table border="0" width="100%" align="left" style="border-collapse: collapse">
	<tr>
		<td height="23" width="auto" colspan="8">
			<a href="#" id="hide_menu" align="right"><img src="./images/menu/close.png" id="closer_img"></a>
	<p>
	<a href="./logout.php" title="Ausloggen">
		<img src="images/icon/logout.png" border="0" align="right">
	</a>
	<a href="javascript:new_project()" title="Neues Projekt anlegen">
		<img src="images/icon/newclient.png" border="0" align="right">
	</a>
		<?php if ($_smarty_tpl->getVariable('boolsche')->value=="true"){?>
		<a href="#" title="Admincenter" id="admin_open"><img src="images/icon/admin.png" border="0" align="right"></a>
		 <?php }?>
		 </p>
 </td>
	 </tr>
		<tr bgcolor="EECB00">
			<th  align="left" valign="top" colspan="8" >Kunden</th>
		</tr>
			</tr>
			<tr id="0">
		
		<td height="23" width="100%" align="left" valign="top" colspan="7"><img src="./images/icon/plus.png" id="img_0" border="0"  align="left"></a>
		 <a href="#" id="0"" class="aufklappen" style="text-decoration: none;">
			Nicht Kategorisiert</a></td>		
	</tr>
	<tr id="insert_0" style="display:none;">
	</tr>
	<?php  $_smarty_tpl->tpl_vars['wert_tu'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_tu'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_client')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['wert_tu']->key => $_smarty_tpl->tpl_vars['wert_tu']->value){
 $_smarty_tpl->tpl_vars['key_tu']->value = $_smarty_tpl->tpl_vars['wert_tu']->key;
?>
		<tr id="<?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['synetics_clients_clientno'];?>
">
		
		<td height="23" width="100%" align="left" valign="top" colspan="7"><img src="./images/icon/plus.png" id="img_<?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['synetics_clients_clientno'];?>
" border="0"  align="left"></a>
		 <a href="#" id="<?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['synetics_clients_clientno'];?>
"" class="aufklappen" style="text-decoration: none;">
                    <?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['synetics_clients_client'];?>

                </a>
</td>		
	</tr>
	
	<tr id="insert_<?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['synetics_clients_clientno'];?>
" style="display:none;">
	</tr>
	<?php }} ?>
</table>
<div style="clear:both;margin:30px 0;text-align:center;padding-right:40px"></div>
<br>
