<html>
<head>
<title>register</title>
<script type="text/javascript" language="JavaScript" src="./src/js/jquery.js"></script>
<script type="text/javascript" language="JavaScript" src="./src/js/main.js"></script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<style type="text/css">
div.user {
background-image: images/register_user.png;
width:243px;height:22px;
}
</style>

<!-- ImageReady Slices (register.psd) -->
<div align="center">
&nbsp;<p>&nbsp;</p>
	<p>&nbsp;</p>
	<form method="POST" action="register.php">
<table id="Tabelle_01" width="438" height="339" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="438" height="99" colspan="4">
			<img src="images/register_head.png" width="438" height="99" alt=""></td>
	</tr>
	<tr>
		<td width="438" height="34" colspan="4">
			<img src="images/register_02.png" width="438" height="34" alt=""></td>
	</tr>
	<tr>
		<td width="149" height="22">
			<img src="images/register_03.png" width="149" height="22" alt=""></td>
		<td width="243" height="22" colspan="2">
				<input type="text" name="username" id="username" size="36" style="border:1px solid #000000;"></td>
		<td width="46" height="206" rowspan="10" background="images/register_05.png" valign="top">
			<div id="msg"></div></td>
	</tr>
	<tr>
		<td width="392" height="7" colspan="3">
			<img src="images/register_06.png" width="392" height="7" alt=""></td>
	</tr>
	<tr>
		<td width="149" height="22">
			<img src="images/register_07.png" width="149" height="22" alt=""></td>
		<td width="243" height="22" colspan="2">
			<input type="password" name="password" id="password" size="36" style="border: 1px solid #000000"></td>
	</tr>
	<tr>
		<td width="392" height="9" colspan="3">
			<img src="images/register_09.png" width="392" height="9" alt=""></td>
	</tr>
	<tr>
		<td width="149" height="22">
			<img src="images/register_10.png" width="149" height="22" alt=""></td>
		<td width="243" height="22" colspan="2">
			<input type="text" name="nachname" size="36" id="nachname" style="border: 1px solid #000000"></td>
	</tr>
	<tr>
		<td width="392" height="10" colspan="3">
			<img src="images/register_12.png" width="392" height="10" alt=""></td>
	</tr>
	<tr>
		<td width="149" height="22">
			<img src="images/register_13.png" width="149" height="22" alt=""></td>
		<td width="243" height="22" colspan="2">
			<input type="text" name="vorname" id="vorname" size="36" style="border: 1px solid #000000"></td>
	</tr>
	<tr>
		<td width="149" height="92" rowspan="3">
			<img src="images/register_15.png" width="149" height="92" alt=""></td>
		<td width="182" height="92" rowspan="3">
			<img src="images/register_16.png" width="182" height="92" alt=""></td>
		<td width="61" height="45">
			<img src="images/register_17.png" width="61" height="45" alt=""></td>
	</tr>
	<tr>
		<td width="61" height="15">
			<a href='#' onClick="check_submit()"><img src="images/register_create.png" border="0"></a>
		</td>
	</tr>
	<tr>
		<td width="61" height="32">
			<img src="images/register_19.png" width="61" height="32" alt=""></td>
	</tr>
</table>
<div id="message" style="visibility: hidden; border: 1px solid black"></div>
		<p>
		&nbsp; </p>
		<p>&nbsp;</p>
	</form>
	<p>&nbsp;</div>
<!-- End ImageReady Slices -->
</body>
</html>