<?php /* Smarty version Smarty-3.0.7, created on 2011-10-25 09:02:59
         compiled from "src/templates/pages/projects.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19063599724ea65f23d18c80-33490922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3d16eebff87bbe5bb42089cf2dcbbe379d0acd0' => 
    array (
      0 => 'src/templates/pages/projects.tpl',
      1 => 1319113488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19063599724ea65f23d18c80-33490922',
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
                <a href="javascript:new_project()" title="Neues Projekt anlegen" id="projectADD">
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
            <th >Kunde</th>
            <th >Projekt</th>
            <th >Kostensatz</th>
            <th >Fahrtkostensatz</th>
            <th >Projektleiter</th>
            <th >Beschreibung</th>
            <th >Kostenart</th>
            <th >Fahrtkostenart</th>
            <th >Funktion</th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['wert_tu'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key_tu'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('projects')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['wert_tu']->key => $_smarty_tpl->tpl_vars['wert_tu']->value){
 $_smarty_tpl->tpl_vars['key_tu']->value = $_smarty_tpl->tpl_vars['wert_tu']->key;
?>
            <tr id="print" align="center">
                <?php if ($_smarty_tpl->tpl_vars['wert_tu']->value['clients_id']==0){?>
                    <td >Nicht Kategorisiert</td>
                <?php }else{ ?>
                    <td ><?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['clients_name'];?>
</td>
                <?php }?>
                <td ><?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['projectname'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['cost'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['drivecost'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['leader'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['description'];?>
</td>
                <?php if ($_smarty_tpl->tpl_vars['wert_tu']->value['costrate']==1){?>
                    <td >Stundensatz</td>
                <?php }else{ ?>
                    <td >Tagessatz</td>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['wert_tu']->value['drivecostrate']==1){?>
                    <td >Pro Stunde</td>
                <?php }else{ ?>
                    <td >Pauschal</td>
                <?php }?>
                <td height="23" width="132" valign="top">
                    <a href="javascript:edit_project(<?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['id'];?>
)" 
                       title="Projekt Editieren und Anzeigen">
                        <img src="images/icon/edit.png" border="0"></a>
                    <a href="javascript:del_project(<?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['projectname'];?>
','<?php echo $_smarty_tpl->tpl_vars['wert_tu']->value['leader'];?>
')" 
                       title="Projekt Löschen">
                        <img src="images/icon/del.png" border="0"></a>
                </td>
            </tr>
        <?php }} ?>
    </tbody>
</table>