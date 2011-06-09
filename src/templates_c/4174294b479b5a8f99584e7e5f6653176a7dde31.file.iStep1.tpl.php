<?php /* Smarty version Smarty-3.0.7, created on 2011-06-01 10:12:46
         compiled from "tpl/iStep1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17782101644de5f47ea57e22-69482926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4174294b479b5a8f99584e7e5f6653176a7dde31' => 
    array (
      0 => 'tpl/iStep1.tpl',
      1 => 1306851735,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17782101644de5f47ea57e22-69482926',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<p>
<div align="center">
	<table border="0" width="788" height="458" background="images/setuppage.png" cellspacing="0" cellpadding="0">
		<tr>
			<td height="458" width="197" rowspan="2"></td>
			<td height="51" width="591"></td>
		</tr>
		<tr>
			<td height="407" width="591" align="center">
			<form method="POST" action="?iStep=2" id="iStep1_form" name="iStep1_form">
				<p>  
				<p>  
				<p>  
				<p align="left">  <u><b>MySql Datenbank Verbindung</b></u><p align="left">
				<table width="100%">
   <tr>
    <td>Hostname:</td>
    <td>
	<input name="hostname" type="text" id="hostname"  size="31"/><p></td>
   </tr>
      <tr>
    <td>Datenbankname:</td>
    <td><input name="dbname" type="text" id="dbname" size="31" /><p></td>
   </tr>
   <tr>
    <td>Benutzername:</td>
    <td>
	<input name="username" type="text" id="username" size="31" /><p></td>
   </tr>
   <tr>
    <td>Passwort:</td>
    <td><input name="password" type="password" id="password" size="31" /><p></td>
   </tr>
  </table>  
  				- MySql Standard Port : 3306 -</p>
				<p>
				<input type="submit" id="submit_mysql" name="submit_mysql" class="submit_style" value="" />
				</p>
				<p><a href="?iStep=0"><img border="0" src="images/back.png" width="109" height="40" align="left"></a></p>
			</td>
	</form>
		</tr>
		</table>
</div>