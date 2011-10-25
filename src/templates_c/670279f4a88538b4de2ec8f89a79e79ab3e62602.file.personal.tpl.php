<?php /* Smarty version Smarty-3.0.7, created on 2011-10-25 09:28:31
         compiled from "src/templates/pages/personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5020214984ea6651f2606a2-23171607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '670279f4a88538b4de2ec8f89a79e79ab3e62602' => 
    array (
      0 => 'src/templates/pages/personal.tpl',
      1 => 1319462964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5020214984ea6651f2606a2-23171607',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr>
        <td height="23" width="auto" colspan="13">
            <p>
                <a href="./logout.php" title="Ausloggen">
                    <img src="images/icon/logout.png" border="0" align="right">
                </a>
                <a href="javascript:new_personal()" title="Neue Person anlegen">
                    <img src="images/icon/newclient.png" border="0" align="right">
                </a>
                <?php if ($_smarty_tpl->getVariable('boolsche')->value=="true"){?>
                    <a href="#" title="Admincenter" id="admin_open"><img src="images/icon/admin.png" border="0" align="right"></a>
                    <?php }?>
            </p>
        </td>
    </tr>
</table>
<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte_app" class="display" style="border-collapse: collapse">
   <thead>
    <tr id="print" align="center">
        <th >Nachname</th>
        <th >Strasse</th>
        <th >PLZ</th>
        <th >Ort</th>
        <th >Tel.Nr.</th>
        <th >E-Mail</th>
        <th >Arbeitstage/Woche</th>
        <th >Arbeitsstunden/Woche</th>
        <th >Funktion</th>
    </tr>	
    </thead>
    <tbody>
    <?php  $_smarty_tpl->tpl_vars['item_wert'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_wert'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('personal')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item_wert']->key => $_smarty_tpl->tpl_vars['item_wert']->value){
 $_smarty_tpl->tpl_vars['key_wert']->value = $_smarty_tpl->tpl_vars['item_wert']->key;
?>
        <tr align="center" valign="top">
            <td ><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['name'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['street'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['zipcode'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['city'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['tele'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['mail'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['weekwork'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['weekhour'];?>
</td>
            <td>
                <a href="javascript:edit_personal(<?php echo $_smarty_tpl->tpl_vars['item_wert']->value['id'];?>
)" title="Person ändern u. Anzeigen"><img src="images/icon/edit.png" border="0"></a>
                <a href="javascript:del_personal(<?php echo $_smarty_tpl->tpl_vars['item_wert']->value['id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['item_wert']->value['name'];?>
','<?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_surname'];?>
',<?php echo $_SESSION['user_id'];?>
)" title="Person löschen"><img src="images/icon/del.png" border="0"></a>
            </td>
        </tr>
    <?php }} ?>
    </tbody>
</table>