<?php /* Smarty version Smarty-3.0.7, created on 2011-10-25 09:28:31
         compiled from "src/templates/pages/forms/personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17351782834ea6651fca2d66-69002531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c4a146acc420d037fa0fafd9ba08ba742bddaee' => 
    array (
      0 => 'src/templates/pages/forms/personal.tpl',
      1 => 1319180760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17351782834ea6651fca2d66-69002531',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="per_form" align="left" title="Personalverwaltung" style="display:none;">
    <form method="POST" id="per_form1" action="">
        <p align="left"></p>

        <table border="0" width="717" height="340" cellspacing="0" cellpadding="0">
            <tr>
                <td height="32" width="165" valign="top">Nachname : </td>
                <td height="32" width="273" valign="top">
                    <input type="text" name="name" size="32" id="name" style="border: 1px solid #000000"></td>
            </tr>
            <tr>
                <td height="32" width="165" valign="top">Strasse :</td>
                <td height="32" width="273" valign="top">
                    <input type="text" name="street" size="32" id="street"style="border: 1px solid #000000"></td>
            </tr>
            <tr>
                <td height="32" width="165" valign="top">PLZ : </td>
                <td height="32" width="273" valign="top">
                    <input type="text" name="zipcode" size="32" id="zipcode" style="border: 1px solid #000000"></td>
            </tr>
            <tr>
                <td height="32" width="75" valign="top">Ort :</td>
                <td height="32" width="205" valign="top">
                    <input type="text" name="city" size="32" id="city" style="border: 1px solid #000000"></td>
            </tr>
            <tr>
                <td height="32" width="165" valign="top">Tel.Nr. : </td>
                <td height="32" width="273" valign="top">
                    <input type="text" name="tele" size="32" id="tele" style="border: 1px solid #000000"></td>
            </tr>
            <tr>
                <td height="33" width="165" valign="top">E-Mail : </td>
                <td height="33" width="273" valign="top">
                    <input type="text" name="mail" size="32" id="mail" style="border: 1px solid #000000"></td>
            </tr>
            <tr>
                <td height="33" width="165" valign="top">Arbeitstage/Woche : </td>
                <td height="33" width="273" valign="top">
                    <input type="text" name="weekwork" size="32" id="weekwork" style="border: 1px solid #000000"></td>
            </tr>
            <tr>
                <td height="33" width="165" valign="top">Arbeitsstunden/Woche : </td>
                <td height="33" width="273" valign="top">
                    <input type="text" name="weekhour" size="32" id="weekhour" style="border: 1px solid #000000"></td>
            </tr>
            <tr id="username_tr">
                <td height="33" width="120" valign="top">Username : </td>
                <td height="33" width="200" valign="top">
                    <input type="text" name="username" size="20" id="username" style="border: 1px solid #000000"><div id="msg"></div></td>
            </tr>
            <tr>
                <td height="33" width="120" valign="top" id="passwort_td">Passwort : </td>
                <td height="33" width="200" valign="top">
                    <input type="text" name="passwort" size="20" id="passwort" style="border: 1px solid #000000"></td>
            </tr>
        </table>
        <table border="0" width="568" height="26" cellspacing="0" cellpadding="0">
            <tr>
                <td height="26" width="637">
                    <input type="submit" id="per_submit" value="" name="per_submit">
                    <input type="reset" value="Zurücksetzen" name="B2">
                    <input type="hidden" name="perAction" id="perAction" size="20">
                    <input type="hidden" name="systemID" id="systemID" size="20">
                </td>
            </tr>
        </table>

    </form>
</div>