<?php /* Smarty version Smarty-3.0.7, created on 2011-10-25 08:23:06
         compiled from "src/templates/pages/clients.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3358016104ea655ca10f4a0-00967891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46105d96ab37d60afb50edbfe58d97dab9d5bf26' => 
    array (
      0 => 'src/templates/pages/clients.tpl',
      1 => 1319028521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3358016104ea655ca10f4a0-00967891',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr>	
        <td height="23" width="auto" colspan="13">
            <p><a href="./logout.php" title="Ausloggen">
                    <img src="images/icon/logout.png" border="0" align="right">
                </a>		
                <a href="javascript:new_client()" title="Neuen Kunden anlegen" id="clientADD">
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
            <th >Kundennummer</th>
            <th >Kunde</th>
            <th >Nachname</th>
            <th >Vorname</th>
            <th >Strasse</th>
            <th >Nr.</th>
            <th >PLZ</th>
            <th >Ort</th>
            <th >Tel.Nr.</th>
            <th >Handy</th>
            <th >Fax</th>
            <th >E-Mail</th>
            <th >Funktion</th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['wert'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['keyname'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('clients')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['wert']->key => $_smarty_tpl->tpl_vars['wert']->value){
 $_smarty_tpl->tpl_vars['keyname']->value = $_smarty_tpl->tpl_vars['wert']->key;
?>
        <tr id="print" align="center">
            <td ><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_clientno'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_client'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_name'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_surname'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_street'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_no'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_zipcode'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_city'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_tel'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_mobile'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_fax'];?>
</td>
            <td ><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_mail'];?>
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
    </tbody>
</table>