<?php
// Session starten
session_start ();
include '../classes/dbCon.class.php';
include '../config.inc.php';
$mydb = new DB_MySQL($host, $dbname, $user, $pw);
$mydb->query("SELECT * FROM synetics_system WHERE synetics_system_username like '$_POST[username]' AND synetics_system_password = MD5('$_POST[password]')");

	if ($mydb->count() > 0) 
	{ 
  // Benutzerdaten in ein Array auslesen. 
 	 $data = $mydb->fetchRow(); 

 	 // Sessionvariablen erstellen und registrieren 
	

        echo 1;
        $_SESSION["user_id"] = $data["synetics_system__ID"]; 
	$_SESSION["user_username"] = $data["synetics_system_username"]; 
 	$_SESSION["user_name"] = $data["synetics_system_name"]; 
  	$_SESSION["user_surname"] = $data["synetics_system_surname"];
 	$_SESSION["user_rights"] = $data["synetics_system_rights"];
  	$_SESSION["logged"] = $_POST['logged'];

	} 
	else 
	{

        echo 0;

	} 
   
?>
