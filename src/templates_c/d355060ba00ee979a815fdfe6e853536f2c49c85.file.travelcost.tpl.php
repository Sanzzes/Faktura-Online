<?php /* Smarty version Smarty-3.0.7, created on 2011-10-25 09:28:34
         compiled from "src/templates/pages/travelcost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3192569794ea66522134188-04349637%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd355060ba00ee979a815fdfe6e853536f2c49c85' => 
    array (
      0 => 'src/templates/pages/travelcost.tpl',
      1 => 1319463038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3192569794ea66522134188-04349637',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr id="noprint">
        <td>
            <form method="POST" id="form_zeiten" action="index.php?pageID=4">

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
            <th >Datum</th>
            <td >Kunde</td>
            <td >Ort</td>
            <td >Hin fahrt von</td>
            <td >bis</td>
            <td >Arbeit szeit von</td>
            <td >bis</td>
            <td >Rück fahrt von</td>
            <td >bis</td>
            <td >Std.ges.</td>
            <td >Verpfl. pausch.</td>
            <td >KM</td>
            <td >Bahn</td>
            <td >Benzin</td>
            <td >Flug</td>
            <td >Fracht</td>
            <td >Hotel</td>
            <td >Mietwagen</td>
            <td >Parken</td>
            <td >Str-/U-/ S-Bahn</td>
            <td >Taxi</td>
            <td >Bewirtung</td>
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

            <tr id="print" align="center" >
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['date'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_clients_client'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_city'];?>
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
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['allhour'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['synetics_data_foodoverall'];?>
€</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['_km'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['_train'];?>
€</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['_oil'];?>
€</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['_airfare'];?>
€</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['_freight'];?>
€</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['_hotel'];?>
€</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['_rentalcar'];?>
€</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['_parking'];?>
€</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['s_citytrain'];?>
€</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['_taxi'];?>
€</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['item_wert_main']->value['_hospitality'];?>
€</td>

            </tr>
        <?php }} ?>
    </tbody>
</table>
<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte_app" class="display" style="border-collapse: collapse">
    <thead>
        <tr id="print" align="center">
            <th >Pause</th>
            <th >Arbeitsleistung</th>
            <th >Fahrzeit Summe.</th>
            <th >KM Summe</th>
            <th >KM Kosten Summe</th>
            <th >Hotel Summe</th>
            <th >Verpfl. Summe</th>
            <th >Bahn Summe</th>
            <th >Flug Summe</th>
            <th >Mietwagen Summe</th>
            <th >Parken Summe</th>
            <th >Str-/U-/ S-Bahn Summe</th>
            <th >Taxi Summe</th>
        </tr> 
    </thead>
    <tbody>
    <tr id="print" align="center">
        <td ><?php echo $_smarty_tpl->getVariable('fakturapause')->value;?>
</td>
        <td ><?php echo $_smarty_tpl->getVariable('fakturaazpause')->value;?>
</td>
        <td ><?php echo $_smarty_tpl->getVariable('fakturafahrt')->value;?>
</td>
        <td ><?php echo $_smarty_tpl->getVariable('fakturall')->value['km'];?>
</td>
        <td ><?php echo $_smarty_tpl->getVariable('fakturall')->value['kmcost'];?>
€</td>
        <td ><?php echo $_smarty_tpl->getVariable('fakturall')->value['synetics_data_hotel'];?>
€</td>
        <td ><?php echo $_smarty_tpl->getVariable('fakturall')->value['synetics_data_foodoverall'];?>
€</td>
        <td ><?php echo $_smarty_tpl->getVariable('fakturall')->value['synetics_data_train'];?>
€</td>
        <td ><?php echo $_smarty_tpl->getVariable('fakturall')->value['synetics_data_airfare'];?>
€</td>
        <td ><?php echo $_smarty_tpl->getVariable('fakturall')->value['synetics_data_rentalcar'];?>
€</td>
        <td ><?php echo $_smarty_tpl->getVariable('fakturall')->value['synetics_data_parking'];?>
€</td>
        <td ><?php echo $_smarty_tpl->getVariable('fakturall')->value['synetics_data_citytrain'];?>
€</td>
        <td ><?php echo $_smarty_tpl->getVariable('fakturall')->value['synetics_data_taxi'];?>
€</td>
    </tr>
    </tbody>
</table>