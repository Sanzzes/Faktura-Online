<?php /* Smarty version Smarty-3.0.7, created on 2011-10-25 09:03:00
         compiled from "src/templates/pages/forms/projects.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4546476294ea65f2417d762-55888314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54601743d26f1d50c8e2f17274c95ddf3ab4d9f9' => 
    array (
      0 => 'src/templates/pages/forms/projects.tpl',
      1 => 1319118497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4546476294ea65f2417d762-55888314',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="p_form" title="Projektverwaltung" style="display:none;">
    <form id="p_form2" method="POST"  action="">
        <table border="0" width="442" height="472" cellspacing="0" cellpadding="0">
            <tr>
                <td width="442" colspan="2">
                    <p>
                </td>
            </tr>
            <tr>
                <td height="38" width="284" valign="top">
                    Projektname</td>
                <td height="38" width="158" valign="top" align="left">
                    <input type="text" name="projectname" id="projectname" size="20" style="border: 1px solid #000000"></td>
            </tr>
            <tr>
                <td height="46" width="284" valign="top">
                    <span style="background-color: #C0C0C0">
                        <input type="radio" name="drivecost_rate" id="drivecost_rate" value="1" checked>Fahrtzeitkosten pro Std.<br>
                        <input type="radio" name="drivecost_rate" id="drivecost_rate" value="2">Anfahrtspauschale			</span>
                </td>
                <td height="46" width="158" valign="top" align="left">
                    <input type="text" name="drivecost" id="drivecost" size="20" style="border: 1px solid #000000"></td>
            </tr>
            <tr>
                <td height="20" width="284" valign="top">
                    Kunde</td>
                <td height="20" width="158" valign="top" align="left">
                    <select size="1" name="client" id="client" style="border: 1px solid #000000">
                        <option selected value="keiner">Bitte wählen</option>
                         <?php  $_smarty_tpl->tpl_vars['wert'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['keyname'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('clients')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['wert']->key => $_smarty_tpl->tpl_vars['wert']->value){
 $_smarty_tpl->tpl_vars['keyname']->value = $_smarty_tpl->tpl_vars['wert']->key;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['wert']->value['synetics_clients_client'];?>
</option>
                        <?php }} ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td height="31" width="284" valign="top">
                    <p>Projektleiter</p>
                </td>
                <td height="31" width="158" valign="top" align="left">
                    <select size="keiner" name="projectlead"  id="projectlead" style="border: 1px solid #000000" >
                        <option selected value="0">Bitte wählen</option>
                        <?php  $_smarty_tpl->tpl_vars['wert_tu'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_tu'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('personal')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['wert_tu']->key => $_smarty_tpl->tpl_vars['wert_tu']->value){
 $_smarty_tpl->tpl_vars['key_tu']->value = $_smarty_tpl->tpl_vars['wert_tu']->key;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['name'];?>
</option>
                            <?php }} ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td height="35" width="284" valign="top">
                        Ansprechpartner Kunde</td>
                    <td height="35" width="158" valign="top" align="left">
                        <input type="text" name="clientcontact" id="clientcontact" size="20" style="border: 1px solid #000000"></td>
                </tr>
                <tr>
                    <td height="49" width="284" valign="top">
                        <span style="background-color: #C0C0C0">
                            <input type="radio" name="cost_rate" id="cost_rate" value="1" checked>Stundensatz<br>
                            <input type="radio" name="cost_rate" id="cost_rate" value="2">Tagessatz
                        </span>
                    </td>
                    <td height="49" width="158" valign="top" align="left">
                        <input type="text" name="cost" id="cost" size="20" style="border: 1px solid #000000"></td>
                </tr>
                <tr>
                    <td height="242" width="442" colspan="2">
                        <font face="MetaKorrespondenz">Beschreibung:</font><p>
                            <textarea rows="9" name="description" id="description" cols="51" style="border: 1px solid #000000"></textarea>
                        </p>
                        <p>
                            <input type="submit" value="" name="p_submit" id="p_submit">
                            <input type="reset" value="Zurücksetzen" name="B2">
                            <input type="hidden" name="pAction" id="pAction" size="20">
                        <input type="hidden" name="projectID" id="projectID" size="20"></td>

                </tr>
            </table>
        </form>
    </div>