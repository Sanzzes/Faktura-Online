<?php

require_once '../config.inc.php';
require_once '../classes/mysql_db.class.php';

$mysql = new mysql_db($g_db['host'], $g_db['database'], $g_db['user'], $g_db['pass']);

//Fange Daten ab
$knr = $_POST['clientno'];
$client = utf8_decode($_POST['client']);
$client_name = utf8_decode($_POST['name']);
$client_surname = utf8_decode($_POST['surname']);
$street = utf8_decode($_POST['street']);
$street_no = $_POST['streetno'];
$zipcode = $_POST['zipcode'];
$city = utf8_decode($_POST['city']);
$telno = $_POST['tele'];
$fax = $_POST['fax'];
$mobile = $_POST['mobile'];
$mail = $_POST['mail'];
$INTaction = $_POST['INTaction'];

if ($INTaction == "1") {
    $mysql->query("INSERT INTO synetics_clients (synetics_clients_clientno, synetics_clients_client, synetics_clients_name, synetics_clients_surname, synetics_clients_street, synetics_clients_no, synetics_clients_city, synetics_clients_zipcode, synetics_clients_mail, synetics_clients_tel, synetics_clients_mobile, synetics_clients_fax) 
				VALUES ('$knr', '$client', '$client_name', '$client_surname', '$street', '$street_no', '$city', '$zipcode', '$mail', '$telno', '$mobile', '$fax')");
    if (mysql_affected_rows() > 0) {
        echo "Kunde erfolgreich angelegt";
    } else {
        return "Es ist ein fehler aufgetreten\nKunde wurde nicht angelegt\nFehler Datenbank eintragung";
    }
} elseif ($INTaction == "2") {
    $mysql->query("UPDATE synetics_clients set synetics_clients_clientno='$knr', synetics_clients_client='$client', 
            synetics_clients_name='$client_name', synetics_clients_surname='$client_surname', 
            synetics_clients_street='$street', synetics_clients_no='$street_no', 
            synetics_clients_city='$city', synetics_clients_zipcode='$zipcode', 
            synetics_clients_mail='$mail', synetics_clients_tel='$telno', 
            synetics_clients_mobile='$mobile', 
            synetics_clients_fax='$fax' WHERE synetics_clients_clientno ='$knr'");
        if (mysql_affected_rows() > 0) {
        echo "Kunde erfolgreich geändert";
    } else {
        echo "Es ist ein fehler aufgetreten\nKunde wurde nicht geändert\nFehler Datenbank eintragung";
    }
} else {
    $mysql->query("DELETE FROM synetics_clients WHERE synetics_clients_clientno = '$knr'");
    $mysql->query("DELETE FROM synetics_projects WHERE synetics_clients_synetics_clients_clientno = '$knr'");
    
        if (mysql_affected_rows() > 0) {
        echo "Kunde erfolgreich gelöscht";
    } else {
        echo "Es ist ein fehler aufgetreten\nKunde wurde nicht gelöscht\nFehler Datenbank eintragung";
    }
}
		
