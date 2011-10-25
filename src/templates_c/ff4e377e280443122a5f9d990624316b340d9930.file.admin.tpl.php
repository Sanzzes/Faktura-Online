<?php /* Smarty version Smarty-3.0.7, created on 2011-10-25 08:23:06
         compiled from "src/templates/pages/admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18582800114ea655ca61fe71-86929742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff4e377e280443122a5f9d990624316b340d9930' => 
    array (
      0 => 'src/templates/pages/admin.tpl',
      1 => 1319199985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18582800114ea655ca61fe71-86929742',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="content_admin" title="Admincenter" style="display:none;">
    <div id="auswahl_menu">
        <h3><a href="#">Grundeinstellungen</a></h3>
        <div>
            <form id="admin_grund" method="POST" action="">
                <table border="0" width="100%" align="left">
                    <tr>
                        <td>Kilometersatz</td>
                        <td><input type="text" id="km_satz" name="km_satz" value="<?php echo $_smarty_tpl->getVariable('settings')->value['synetics_settings_kmset'];?>
"> €</td>
                    </tr>
                    <tr>
                        <td>Arbeitsstunden pro Tag</td>
                        <td><input type="text" id="std_day" name="std_day" value="<?php echo $_smarty_tpl->getVariable('dayworktime')->value;?>
"> Std</td>
                    </tr>
                    <tr>
                        <td>Pause pro Tag</td>
                        <td><input type="text" id="stdpause_day" name="stdpause_day" value="<?php echo $_smarty_tpl->getVariable('daypause')->value;?>
"> Min</td>
                    </tr>
                    <tr>
                        <td>Urlaubsantrags Nr.</td>
                        <td><input type="text" id="appid" name="appid" value="<?php echo $_smarty_tpl->getVariable('settings')->value['synetics_settings_appid'];?>
"></td>
                    </tr>
                    <tr>
                        <td>Wochenende ID:</td>
                        <td>
                            <select id="weekend_select" name="weekend_select">
                                <option value="0">Bitte wählen</option>
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('clients')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['clientid']==$_smarty_tpl->getVariable('settings')->value['synetics_settings_weekendid']){?>
                                        <option selected value="<?php echo $_smarty_tpl->tpl_vars['item']->value['clientid'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['clientname'];?>
</option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['clientid'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['clientname'];?>
</option>
                                    <?php }?>
                                <?php }} ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Feiertage ID:</td>
                        <td>
                            <select id="holidaycheck_select" name="holidaycheck_select">
                                <option value="0">Bitte wählen</option>
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('clients')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['clientid']==$_smarty_tpl->getVariable('settings')->value['synetics_settings_holidayid']){?>
                                        <option selected value="<?php echo $_smarty_tpl->tpl_vars['item']->value['clientid'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['clientname'];?>
</option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['clientid'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['clientname'];?>
</option>
                                    <?php }?>
                                <?php }} ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Krank ID:</td>
                        <td>
                            <select id="ill_select" name="ill_select">
                                <option value="0">Bitte wählen</option>
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('clients')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['clientid']==$_smarty_tpl->getVariable('settings')->value['synetics_settings_illid']){?>
                                        <option selected value="<?php echo $_smarty_tpl->tpl_vars['item']->value['clientid'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['clientname'];?>
</option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['clientid'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['clientname'];?>
</option>
                                    <?php }?>
                                <?php }} ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Urlaub ID:</td>
                        <td>
                            <select id="freeday_select" name="freeday_select">
                                <option value="0">Bitte wählen</option>
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('clients')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['clientid']==$_smarty_tpl->getVariable('settings')->value['synetics_settings_freeid']){?>
                                        <option selected value="<?php echo $_smarty_tpl->tpl_vars['item']->value['clientid'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['clientname'];?>
</option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['clientid'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['clientname'];?>
</option>
                                    <?php }?>
                                <?php }} ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" id="action_a" name="action_a" size="4" value="1">
                            <input type="submit" id="primary_admin" value="Übernehmen">
                        </td>
                    </tr>	
                </table>
            </form>
        </div>

        <h3><a href="#">Rechtesystem</a></h3>
        <div align="center" valign="middle">
            <form id="admin_rechte" method="POST" action="">
                <table border="0" width="100%">
                    <tr>
                        <td>
                            <select id="admin_user" name="admin_user">
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
                        <td><input type="submit" id="primary_admin_rights" name="primary_admin_rights" value="Übernehmen"></td>
                    </tr>
                </table>
            </form>
        </div>	

        <h3><a href="#">Kostenstelle</a></h3>
        <div>
            <form id="admin_process" method="POST">
                <table border="0" width="100%">
                    <tr>
                        <td>
                            <br>Vorhanden:
                            <br>
                            <select id="processID">
                            </select>
                            <a href="javascript:del_process()" title="Löschen"> <img src="images/icon/del.png" border="0"></a>
                            <a href="javascript:edit_process()" title="Editieren"><img src="images/icon/edit.png" border="0"></a>
                            <br>
                            Neu Anlegen:
                            <input type="text" name="process_new" id="process_new" value="" />
                            <input type="hidden" id="action_a" name="action_a" size="4" value="3">
                        </td>
                    </tr> 
                    <tr>
                        <td><input type="submit" id="primary_admin_process" name="primary_admin_rights" value="Übernehmen"></td>
                    </tr>
                </table>
            </form>         <form id="edit_process"title="Rechnungsstelle Editieren" align="left"> 
                <div align="left">
                    Name: 
                    <input type='text' id='process_name' size="25" value=""><br>
                    <input type='hidden' id='process_id_old'>
                    <input type='hidden' id='process_action' value="1">
                </div>
                <br />
                <input type="submit" id="process_edit_sub" value="Ändern">

            </form>
        </div>
    </div>
</div>