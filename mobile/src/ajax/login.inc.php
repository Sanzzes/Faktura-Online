<?php
$username = $_POST["username"] ? : 0;
require_once '../../../src/classes/class.php';
require_once '../../../src/config.inc.php';
require_once '../functions.inc.php';
$mysql = new DB_MySQL($host, $dbname, $user, $pw);
$mobile = new mobile_class();

$password= $_POST["password"] ? : 0;   
$mysql->query("SELECT * FROM synetics_system WHERE synetics_system_username like '$username' AND synetics_system_password = MD5('$password')");

	if ($mysql->count() > 0) 
	{ 
  // Benutzerdaten in ein Array auslesen. 
 	 $data = $mysql->fetchRow(); 

 	 // Sessionvariablen erstellen und registrieren 
         
         $session_array = array($data["synetics_system__ID"],$data["synetics_system_username"],$data["synetics_system_name"],$data["synetics_system_surname"],$data["synetics_system_rights"],1);
	 
         
         $set_session = $mobile->set_session($session_array);
         
        echo 1;

	} 
	else 
	{

        echo 0;
}
   
?>
