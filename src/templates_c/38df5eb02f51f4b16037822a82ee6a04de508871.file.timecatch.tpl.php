<?php /* Smarty version Smarty-3.0.7, created on 2011-10-25 09:40:30
         compiled from "src/templates/pages/timecatch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:681297634ea667eecbd008-72743805%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38df5eb02f51f4b16037822a82ee6a04de508871' => 
    array (
      0 => 'src/templates/pages/timecatch.tpl',
      1 => 1319463053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '681297634ea667eecbd008-72743805',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr id="noprint">
        <td>
            <form method="POST" id="form_zeiten" action="index.php?pageID=6">

                <p>
                    <a href="./logout.php" title="Ausloggen" align="right"><img src="images/icon/logout.png" border="0" align="right"></a>
                    <a href="javascript:window.print()" title="Seite drucken" align="right"><img src="images/icon/print.png" border="0" align="right"></a>

                    <?php if ($_smarty_tpl->getVariable('boolsche')->value=="true"){?>
                        <a href="#" title="Admincenter" id="admin_open">
                            <img src="images/icon/admin.png" border="0" align="right">
                        </a>
                    <?php }?>
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
                    <select size="1" name="process_id" id="process_id">
                        <option selected value="0">Alle</option>

                        <?php  $_smarty_tpl->tpl_vars['item_wert'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_wert'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('process')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item_wert']->key => $_smarty_tpl->tpl_vars['item_wert']->value){
 $_smarty_tpl->tpl_vars['key_wert']->value = $_smarty_tpl->tpl_vars['item_wert']->key;
?>
                            <?php if ($_smarty_tpl->getVariable('procID')->value==$_smarty_tpl->tpl_vars['item_wert']->value['id']){?>
                                <option selected value="<?php echo $_smarty_tpl->tpl_vars['item_wert']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['name'];?>
</option>
                            <?php }else{ ?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['item_wert']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item_wert']->value['name'];?>
</option> 
                            <?php }?>
                        <?php }} ?>
                    </select>	
                    <input type="submit" value="Übernehmen" name="zeit_submit" id="zeit_submit" title="Übernehmen">
                </p>
            </form>
        </td>
    </tr>
</table>
<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte_app" class="display" style="border-collapse: collapse">
    <thead>
        <tr id="print" align="center">	
            <th>Mitarbeiter</th>
            <th>Datum</th>
            <th>Hinfahrt von</th>
            <th>bis</th>
            <th>Arbeitszeit von</th>
            <th>bis</th>
            <th>Rückfahrt von</th>
            <th>bis</th>
            <th>Pause</th>
            <th>Gesamt-Zeit</th>
            <th>Fahrzt.</th>
            <th>AZ - Pause</th>
            <th>Verrechnung für</th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['item_wert_main'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_wert_main'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data_main')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item_wert_main']->key => $_smarty_tpl->tpl_vars['item_wert_main']->value){
 $_smarty_tpl->tpl_vars['key_wert_main']->value = $_smarty_tpl->tpl_vars['item_wert_main']->key;
?>
            <tr align="center" id="print">
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_worker'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['date'];?>
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
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['process'];?>
</td>
            </tr>	
        <?php }} ?>	
    </tbody>
</table>
<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte_app" class="display" style="border-collapse: collapse">
    <thead>
        <tr id="print" align="center">	
            <th></th>
            <th>Gesamt-Zeit Summe</th>
            <th>Fahrzeiten Summe</th>
            <th>Arbeitsleistung o. Pause Summe</th>
            <th>Zeitkonto</th>
        </tr>
    </thead>
    <tbody>
        <tr align="center" id="print">
            <td ><font size="3">Summen</td>
            <td ><font size="2" color="red"><?php echo $_smarty_tpl->getVariable('allhour_all')->value;?>
</td>
            <td ><font size="2" color="red"><?php echo $_smarty_tpl->getVariable('fahrtzeiten_all')->value;?>
</td>
            <td ><div id="stunden_month_ges" class="ustunden" align="center"></div></td>
            <td ><font size="2" color="red"><?php echo $_smarty_tpl->getVariable('zeitkonto')->value;?>
</td>
        </tr>
    </tbody>
</table>