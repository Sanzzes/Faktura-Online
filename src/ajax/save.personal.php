<?php

session_start();
if (empty($_SESSION['user_username'])) {
    echo "Nicht eingeloggt kein zugriff";
} else {
    include '../config.inc.php';
    include '../classes/mysql_db.class.php';
    $mysql = new mysql_db($g_db['host'], $g_db['database'], $g_db['user'], $g_db['pass']);
    $personal_name = utf8_decode($_POST['name']);
    $street = utf8_decode($_POST['street']);
    $zipcode = $_POST['zipcode'];
    $city = utf8_decode($_POST['city']);
    $telno = $_POST['tele'];
    $mail = utf8_decode($_POST['mail']);
    $weekwork = $_POST['weekwork'];
    $weekhour = $_POST['weekhour'];
    $systemID = $_POST['systemID'];
    $passwort = $_POST['passwort'];
    $username = $_POST['username'];
    $perAction = $_POST['perAction'];


    if ($perAction == 1) {
        $mysql->query("INSERT INTO synetics_system (synetics_system_name, 
			synetics_system_street, synetics_system_city, synetics_system_zipcode,
			synetics_system_mail, synetics_system_tele,synetics_system_weekwork,synetics_system_weekhour,
                        synetics_system_username, 
			synetics_system_pw, synetics_system_rights)
			VALUES
			('$personal_name','$street','$city','$zipcode','$mail','$telno',
                        '$weekwork','$weekhour',
			'$username', MD5('$passwort'), '1');");
        if (mysql_affected_rows() > 0) {
            echo "Person erfolgreich angelegt";
        } else {
            return "Es ist ein fehler aufgetreten\nPerson wurde nicht angelegt\nFehler Datenbank eintragung";
        }
    } elseif ($perAction == 2) {
        $mysql->query("UPDATE synetics_system SET synetics_system_name='$personal_name', 
			synetics_system_street='$street',synetics_system_city='$city', 
			synetics_system_zipcode= '$zipcode', synetics_system_mail='$mail', 
			synetics_system_tele='$telno',
                        synetics_system_weekwork='$weekwork', synetics_system_weekhour='$weekhour' WHERE synetics_system__ID ='$systemID'");
        if (mysql_affected_rows() > 0) {
            echo "Person erfolgreich geändert";
        } else {
            return "Es ist ein fehler aufgetreten\nPerson wurde nicht geändert\nFehler Datenbank eintragung";
        }
    } else {
        $mysql->query("DELETE FROM synetics_system WHERE synetics_system__ID = '" . $systemID . "'");
        $mysql->query("DELETE FROM synetics_data WHERE synetics_data_system_id = '" . $systemID . "'");
        if (mysql_affected_rows() > 0) {
            echo "Person erfolgreich gelöscht";
        } else {
            return "Es ist ein fehler aufgetreten\nPerson wurde nicht gelöscht\nFehler Datenbank eintragung";
        }
    }
}
?>