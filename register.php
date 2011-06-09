<?php
include 'src/config.inc.php'; 
if (!mysql_select_db ($dbname, $connectionid)) 
{ 
  die ("Keine Verbindung zur Datenbank"); 
}
$username = $_POST['username'];
$password = $_POST['password'];
$nachname = $_POST['nachname'];
$vorname = $_POST['vorname'];

$result = mysql_query("SELECT * FROM synetics_system WHERE synetics_system_username = '".$username."'");
$l_num = mysql_num_rows($result);
$user = mysql_fetch_array($result);


//Check if all fields filled
if($username == "" || $password == "" || $vorname == "" || $nachname == ""){
echo "Sie haben nicht alle Felder ausgefüllt";
echo "<a href='newuser.php'><br> Zurück</a>";
}
else 
{
//Check if User Exist
if ($l_num == 0){
  //If not Exist insert into DB
  $sql = "INSERT INTO synetics_system (synetics_system_username, synetics_system_password, synetics_system_name, synetics_system_surname, synetics_system_rights) VALUES ('$username', MD5('$password'),'$nachname','$vorname', '1')";
  $result_1 = mysql_query ($sql);

  if (mysql_affected_rows($connectionid) > 0) 
  { 
  	?>
  	<div align="center">
  		<table border="0" width="444" height="300" cellspacing="0" cellpadding="0">
		<tr>
	<td height="70" width="434" background="images/screen.png"></td>
	</tr>
	<tr>
	<td height="230" width="434" valign="top" align="center">
    <?php echo "Benutzer erfolgreich angelegt.<br>\n";
	echo '<form action="index.php" method="post"> <input type="submit" value="OK"></form>'; ?>
	<p align="center"></td>
		</tr>
	</table>
	</div>
	<?php
  } 
  else 
  { 
  ?>
    <div align="center">
  	<table border="0" width="444" height="300" cellspacing="0" cellpadding="0">
	<tr>
	<td height="70" width="434" background="images/screen.png" align="top"></td>
	</tr>
	<tr>
	<td height="230" width="434" valign="top" align="center">
   <?php 
   echo "Fehler beim Anlegen der Benutzer.<br>\n"; 
   echo "<a href='newuser.php'> Zurück</a>"; 
   ?>
   	<p align="center"></td>
		</tr>
		</div>
		<?php
  }  
}
else {
	echo "Leider ist die Benutzerkennung schon vergeben bitte wählen Sie einen anderen<br>";
	echo "<a href='newuser.php'> Zurück</a>";
}
}


?>