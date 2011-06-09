<?php /* Smarty version Smarty-3.0.7, created on 2011-06-01 10:14:18
         compiled from "tpl/finish.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13845750994de5f4daac0e84-36326666%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '195583b8ca72328f4ab6d1b5b26166e9ed46fe21' => 
    array (
      0 => 'tpl/finish.tpl',
      1 => 1306851735,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13845750994de5f4daac0e84-36326666',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
</p>
<div align="center">
	<table border="0" width="788" height="458" background="images/setuppage.png" cellspacing="0" cellpadding="0">
		<tr>
			<td height="418" width="600" rowspan="2"></td>
			<td height="51" width="600"></td>
		</tr>
		<tr>
			<td height="367" width="600" align="center">
			<table width="100%">
			<?php if ($_smarty_tpl->getVariable('erroNo')->value==0){?>
			<tr><td><img src='images/success.gif'></td></tr>
			<?php }else{ ?>
			<?php  $_smarty_tpl->tpl_vars['item_wert'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_wert'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('errors')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item_wert']->key => $_smarty_tpl->tpl_vars['item_wert']->value){
 $_smarty_tpl->tpl_vars['key_wert']->value = $_smarty_tpl->tpl_vars['item_wert']->key;
?>
			 <?php echo $_smarty_tpl->tpl_vars['item_wert']->value['errorMessage'];?>

			 <?php echo $_smarty_tpl->tpl_vars['item_wert']->value['errorNo'];?>

			 <?php echo $_smarty_tpl->tpl_vars['item_wert']->value['errorText'];?>

			 <?php }} ?>
			 <?php }?>
			</table>
			</td>
		</tr>
		<tr>
			<td height="40" width="395"></td>
			<td height="40" width="393">
			<?php echo $_smarty_tpl->getVariable('buttons')->value;?>

			</td>
		</tr>
	</table>
</div>
			