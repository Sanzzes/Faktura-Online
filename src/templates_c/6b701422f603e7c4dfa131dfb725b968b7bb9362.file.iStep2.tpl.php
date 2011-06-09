<?php /* Smarty version Smarty-3.0.7, created on 2011-06-01 10:12:57
         compiled from "tpl/iStep2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15800014174de5f4894cca53-30259791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b701422f603e7c4dfa131dfb725b968b7bb9362' => 
    array (
      0 => 'tpl/iStep2.tpl',
      1 => 1306851735,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15800014174de5f4894cca53-30259791',
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
			<?php if ($_smarty_tpl->getVariable('errorNo')->value==0){?>
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

			 <?php echo $_smarty_tpl->tpl_vars['item_wert']->value['errorNr'];?>

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
			