<?php /* Smarty version Smarty-3.0.7, created on 2011-10-25 08:23:06
         compiled from "src/templates/footer/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2678932744ea655ca4fadd7-73153982%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '818dcd130a856a67ccc5e040d8b807a411cdaef5' => 
    array (
      0 => 'src/templates/footer/footer.tpl',
      1 => 1319462809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2678932744ea655ca4fadd7-73153982',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="clearboth"></div>
<div id="noprint">
    <div id="footer">
        <table width="100%"  cellspacing="0" cellpadding="10px">
            <tr>
                <td valign="top">

                    <h3>Logged in as:</h3>
                    <ul>
                        <li>Benutzer:<font color="blue"> <?php echo $_SESSION['user_username'];?>
 </font></li>
                        <li>Name: <?php echo $_smarty_tpl->getVariable('user_nach')->value;?>
</li>
                        <li>Rechte:<font color="orange"> <?php if ($_smarty_tpl->getVariable('user_rights')->value==1){?>Normal<?php }else{ ?>Admin<?php }?></font></li>
                    </ul>
                    <br /><a href="logout.php">Ausloggen</a>
                </td>
                <td>
                    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('days')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                        <?php echo $_smarty_tpl->tpl_vars['key']->value;?>
: <font color="red" size="2px"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</font> ||
                    <?php }} ?>
                </td>
            </tr>
        </table>
    </div>
</div>

</div>
</div>
</body>
</html>