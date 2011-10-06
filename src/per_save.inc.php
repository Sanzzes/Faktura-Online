<?php

include './config.inc.php';
include './classes/class.php';
$mydb = new DB_MySQL($host, $dbname, $user, $pw);
$personal_name = utf8_decode($_POST['name']);
$street = utf8_decode($_POST['street']);
$zipcode = $_POST['zipcode'];
$city = utf8_decode($_POST['city']);
$telno = $_POST['tele'];
$mail = utf8_decode($_POST['mail']);
$weekwork = $_POST['workwork'];
$weekhour = $_POST['workhour'];
$systemID = $_POST['systemID'];
$passwort = $_POST['passwort'];
$username = $_POST['username'];
$perAction = $_POST['perAction'];


if ($perAction == 1) {
    $mydb->query("INSERT INTO synetics_system (synetics_system_name, 
			synetics_system_street, synetics_system_city, synetics_system_zipcode,
			synetics_system_mail, synetics_system_tele,synetics_system_weekwork,synetics_system_weekhour,
                        synetics_system_username, 
			synetics_system_pw, synetics_system_rights)
			VALUES
			('$personal_name','$street','$city','$zipcode','$mail','$telno',
                        '$weekwork','$weekhour',
			'$username', MD5('$passwort'), '1');");
    print_r("INSERT INTO synetics_system (synetics_system_name, 
			synetics_system_street, synetics_system_city, synetics_system_zipcode,
			synetics_system_mail, synetics_system_tele,synetics_system_weekwork,synetics_system_weekhour,
                        synetics_system_username, 
			synetics_system_password, synetics_system_rights)
			VALUES
			('$personal_name','$street','$city','$zipcode','$mail','$telno',
                        '$weekwork','$weekhour',
			'$username', MD5('$passwort'), '1');");
    
} elseif ($perAction == 2) {
    $mydb->query("UPDATE synetics_system SET synetics_system_name='$personal_name', 
			synetics_system_street='$street',synetics_system_city='$city', 
			synetics_system_zipcode= '$zipcode', synetics_system_mail='$mail', 
			synetics_system_tele='$telno' WHERE synetics_system__ID ='$systemID'");
} else {
    $mydb->query("DELETE FROM synetics_system WHERE synetics_system__ID = '" . $systemID . "'");
    $mydb->query("DELETE FROM synetics_data WHERE synetics_data_system_id = '" . $systemID . "'");
}
?>