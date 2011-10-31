<?php /* Smarty version Smarty-3.0.7, created on 2011-10-26 10:06:47
         compiled from "src/templates/pages/workflow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13592632884ea7bf97197f61-37484857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f928a8aec943dbc7be9d41c85bd74c13d419f9fd' => 
    array (
      0 => 'src/templates/pages/workflow.tpl',
      1 => 1319615968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13592632884ea7bf97197f61-37484857',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr id="noprint">
        <td>
            <form method="POST" id="form_zeiten" action="index.php?pageID=7">
                <div id="menu" align="right">
                    <?php if ($_smarty_tpl->getVariable('boolsche')->value=="true"){?>
                        <a href="#" title="Admincenter" id="admin_open">
                            <img src="images/icon/admin.png" border="0" align="left">
                        </a>
                    <?php }?>
                    <a href="javascript:new_workflow(<?php echo $_smarty_tpl->getVariable('perID')->value;?>
)" title="Neue Tätigkeit anlegen"><img src="images/icon/newclient.png" border="0"></a>
                    <a href="#" title="Urlaub eintragen/beantragen" id="holiday"><img src="images/icon/holiday.png" border="0"></a>
                    <a href="#" title="Wochenende/Feiertag Eintragen" id="weekend"><img src="images/icon/briefcase.png" border="0"></a>
                    <a href="#" id="execute_del" class="execute_del"><img  src="images/icon/delselected.png" title="Selektierte löschen"></a>
                    <a href="javascript:window.print()" title="Seite drucken" align="right"><img src="images/icon/print.png" border="0"></a>
                    <a href="./logout.php" title="Ausloggen" align="right"><img src="images/icon/logout.png" border="0"></a>                    
                </div>
                <select name="datepicker1" id="datepicker1">
                    <?php  $_smarty_tpl->tpl_vars['key_wert'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('year_month')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['key_wert']->key => $_smarty_tpl->tpl_vars['key_wert']->value){
?>
                        <?php if ($_smarty_tpl->getVariable('month')->value==$_smarty_tpl->tpl_vars['key_wert']->value){?>
                            <option selected value="<?php echo $_smarty_tpl->tpl_vars['key_wert']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['key_wert']->value;?>
</option>
                        <?php }else{ ?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['key_wert']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['key_wert']->value;?>
</option>
                        <?php }?> 
                    <?php }} ?>
                </select>
                <input type="text" name="datepicker2" id="datepicker2" size="6" value="<?php echo $_smarty_tpl->getVariable('year')->value;?>
">
                <select size="1" name="worker_f" id="worker_f">
                    <option selected value="0">Mitarbeiter</option>

                    <?php  $_smarty_tpl->tpl_vars['item_wert'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_wert'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_lastname')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item_wert']->key => $_smarty_tpl->tpl_vars['item_wert']->value){
 $_smarty_tpl->tpl_vars['key_wert']->value = $_smarty_tpl->tpl_vars['item_wert']->key;
?>
                        <?php if ($_smarty_tpl->getVariable('perID')->value==$_smarty_tpl->tpl_vars['item_wert']->value['synetics_system__ID']){?>
                            <option selected value="<?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system__ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_name'];?>
</option>
                        <?php }else{ ?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system__ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['synetics_system_name'];?>
</option>
                        <?php }?>  
                    <?php }} ?>
                </select>	
                <input type="submit" value="Übernehmen" name="zeit_submit" id="zeit_submit" title="Übernehmen">

            </form>
        </td>
    </tr>
</table>
<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte_app" class="display" style="border-collapse: collapse">
    <thead>
        <tr id="print" align="center">
            <th>Mitarbeiter</th>
            <th>Datum</th>
            <th>Kunde</th>
            <th>Einsatzort</th>
            <th>Projekt</th>
            <th>Hinfahrt von</th>
            <th>bis</th>
            <th>Arbeitszeit von</th>
            <th >bis</th>
            <th >Rückfahrt von</th>
            <th >bis</th>
            <th>Pause</th>
            <th>Gesamt-Zeit</th>   
            <th>Fahrzt.</th>
            <th>AZ - Pause</th>
            <th id="noprint">Funktion</th>
        </tr>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['item_wert_main'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_wert_main'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_main')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item_wert_main']->key => $_smarty_tpl->tpl_vars['item_wert_main']->value){
 $_smarty_tpl->tpl_vars['key_wert_main']->value = $_smarty_tpl->tpl_vars['item_wert_main']->key;
?>
            <tr align="center">
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_worker'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['date'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_clients_client'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_city'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_projects_projectname'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['time_hin'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['time_hin2'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['time_work'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['time_work2'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['time_zur'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['time_zur2'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['pause'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['allhour'];?>
</td>  
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['fahrtzeit'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['azpause'];?>
</td>
                <td id="noprint">
                    <a href="javascript:edit_workflow(<?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_ID'];?>
)"
                       title="Tätigkeiten ändern u. Anzeigen">
                        <img src="images/icon/edit.png" border="0"></a>
                    <a href="javascript:copy_workflow(<?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_ID'];?>
)"
                       title="Tätigkeit duplizieren">
                        <img src="images/icon/duplicate.png" border="0"></a>
                    <a href="javascript:del_workflow(<?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_ID'];?>
,'<?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['date'];?>
')"
                       title="Tätigkeit löschen">
                        <img src="images/icon/del.png" border="0"></a>
                    <input type="checkbox" title="Markieren zum Löschen" name="tatdelete[]" value="<?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_ID'];?>
">
                </td>
            </tr>
        <?php }} ?>
    </tbody>
</table>
    <div align="right">Alle markieren<input type="checkbox" id="markall"></div>