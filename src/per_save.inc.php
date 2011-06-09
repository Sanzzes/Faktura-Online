<?php
include './config.inc.php';
include './classes/class.php';
$mydb = new DB_MySQL($host, $dbname, $user, $pw);
$personal_name = utf8_decode($_POST['name']);
$personal_surname = utf8_decode($_POST['surname']);
$street = utf8_decode($_POST['street']);
$street_no =  $_POST['streetno'];
$zipcode = $_POST['zipcode'];
$city =  utf8_decode($_POST['city']);
$telno = $_POST['tele'];
$mobile = $_POST['mobile'];
$mail = utf8_decode($_POST['mail']);
$systemID = $_POST['systemID'];
$passwort = $_POST['passwort'];
$username = $_POST['username'];
$perAction = $_POST['perAction'];


		if($perAction == 1)
		{
			$mydb->query("INSERT INTO synetics_system (synetics_system_name, synetics_system_surname, 
			synetics_system_street, synetics_system_no, synetics_system_city, synetics_system_zipcode,
			synetics_system_mail, synetics_system_tele, synetics_system_mobile, synetics_system_username, 
			synetics_system_password, synetics_system_rights)
			VALUES
			('$personal_name','$personal_surname','$street','$street_no','$city','$zipcode','$mail','$telno','$mobile',
			'$username', MD5('$passwort'), '1')");
		}
		elseif($perAction == 2)
		{
			$mydb->query("UPDATE synetics_system SET synetics_system_name='$personal_name', 
			synetics_system_surname='$personal_surname', synetics_system_street='$street', 
			synetics_system_no= '$street_no', synetics_system_city='$city', 
			synetics_system_zipcode= '$zipcode', synetics_system_mail='$mail', 
			synetics_system_tele='$telno',
		    synetics_system_mobile='$mobile' WHERE synetics_system__ID ='$systemID'");
		}
		else 
		{
			$mydb->query("DELETE FROM synetics_system WHERE synetics_system__ID = '".$systemID."'");
			$mydb->query("DELETE FROM synetics_data WHERE synetics_data_system_id = '".$systemID."'");
			
		}

?>