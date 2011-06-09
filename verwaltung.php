<?php 
// Session starten
session_start ();
include 'src/classes/dbCon.class.php';
include 'src/config.inc.php';
$mydb = new DB_MySQL($host, $dbname, $user, $pw);
$mydb->query("SELECT * FROM synetics_system WHERE synetics_system_username like '$_POST[username]' AND synetics_system_password = MD5('$_POST[password]')");

	if ($mydb->count() > 0) 
	{ 
  // Benutzerdaten in ein Array auslesen. 
 	 $data = $mydb->fetchRow(); 

 	 // Sessionvariablen erstellen und registrieren 
 	$_SESSION["user_id"] = $data["synetics_system__ID"]; 
	$_SESSION["user_username"] = $data["synetics_system_username"]; 
 	$_SESSION["user_name"] = $data["synetics_system_name"]; 
  	$_SESSION["user_surname"] = $data["synetics_system_surname"];
 	$_SESSION["user_rights"] = $data["synetics_system_rights"];
  	$_SESSION["logged"] = $_POST['logged'];
	

   echo '<tr><td class="auto-style3" style="height: 11px; width: 325px">Sie haben sich erfolgreich Eingeloggt!</td></tr>';
   echo "<br>Sollten Sie nicht Automatisch weitergeleitet werden <a href='index.php'>Hier klicken</a>";
   echo '<meta http-equiv="refresh" content="3; URL=index.php">';

	} 
	else 
	{

	echo '<tr><td class="auto-style3" style="width: 325px">Falsches Kennwort oder Benutzername!</td></tr>';
	echo "<br>Sollten Sie nicht Automatisch weitergeleitet werden <a href='index.php'>Hier klicken</a>";
	echo '<meta http-equiv="refresh" content="3; URL=index.php">';

	} 
?> 