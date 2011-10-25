<?php /* Smarty version Smarty-3.0.7, created on 2011-10-25 09:40:25
         compiled from "src/templates/pages/forms/weekend.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19659055274ea667e9ecdfd4-49087171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91306a0ca9b2d5b6258acf0094da072731fe6582' => 
    array (
      0 => 'src/templates/pages/forms/weekend.tpl',
      1 => 1319461442,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19659055274ea667e9ecdfd4-49087171',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'src/libs/plugins/modifier.date_format.php';
?><div id="weekend_form" title="Template Automat v1" style="display:none">
    <div align="left">
        Dies ist der Template Automat er hat bereits bestimmte<br>
        Events in seiner Liste!

        <br>
        Bitte wähle aus:
        <form id="weekform">
            <select id="weekend" name="weekend">
                <option value="1">Wochenende</option>
                <option value="2">Feiertag</option>
                <option value="3">Krank</option>
            </select>
            <p>
                Datum:<br>
                <input type="text" id="pickadate" name="pickdate" value="<?php echo smarty_modifier_date_format(time(),"%d.%m.%Y");?>
">
                <input type="submit" id="submit_week" value="Eintragen">
            </p>
        </form>
    </div>
</div>

<div id="holiday_form" title="Urlaub beantragen" style="display:none">
    <div align="left">
        Hier kannst du deinen Urlaubsbegin und das Urlaubsende<br />
        bequem eintragen/beantragen und das Programm macht den Rest für dich!  
        <br>
        <form id="holidayform">
            <p>
                Datum begin:<br />
                <input type="text" id="pickadate1" name="pickdate1" value="<?php echo smarty_modifier_date_format(time(),"%d.%m.%Y");?>
">
                <br />
                Datum ende:<br />
                <input type="text" id="pickadate2" name="pickdate2">
            </p>
            <p>
                <input type="submit" id="submit_holiday_be" value="Beantragen">
                <input type="submit" id="submit_holiday" value="Eintragen">
                <input type="submit" id="submit_holiday_edit" value="Ändern">
                <input type="hidden" id="appid_val" name="appid_val" value="">
                
            </p>
        </form>
    </div>
</div>