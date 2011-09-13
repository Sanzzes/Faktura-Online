<?php

session_start();
include '../classes/dbCon.class.php';
include '../config.inc.php';
$password = $_POST['password'];
$username = $_POST['username'];
if ($username == "" || $password == "") {
    echo 0;
} else {

    $base_dn = 'OU=Users,OU=synetics,DC=synetics,DC=int';
    $ldap_usr_dom = "@synetics.int";
    $passwd = $password;
    $hostname = 'syndc01.synetics.int';
    $filter = '(&(objectClass=user)(CN=*)(samaccountname=' . $username . '))';

    $ds = ldap_connect($hostname);

    $r = ldap_bind($ds, $username . $ldap_usr_dom, $passwd);

    if ($r) {
        $sr = ldap_search($ds, $base_dn, $filter);

        $info = ldap_get_entries($ds, $sr);

        $mydb = new DB_MySQL($host, $dbname, $user, $pw);

        $mydb->query("SELECT * FROM synetics_system WHERE synetics_system_username like '$username'");
        if ($mydb->count() < 1) {
            $mydb->query("INSERT INTO synetics_system (synetics_system_name, synetics_system_street,
            synetics_system_zipcode,synetics_system_tele,synetics_system_mail,synetics_system_username,
            synetics_system_pw,synetics_system_rights) VALUES ('" . $info[0]['cn'][0] . "','" . $info[0]['streetaddress'][0] . "','" . $info[0]['postalcode'][0] . "',
                '" . $info[0]['telephonenumber'][0] . "','" . $info[0]['mail'][0] . "','" . $username . "',MD5('" . $passwd . "'),1);");


            $_SESSION["user_id"] = mysql_insert_id();
            $_SESSION["user_username"] = $username;
            $_SESSION["user_name"] = $info[0]['cn'][0];
            $_SESSION["user_rights"] = "1";
            $_SESSION["logged"] = $_POST['logged'];
        } else {
            $data = $mydb->fetchRow();

            $_SESSION["user_id"] = $data["synetics_system__ID"];
            $_SESSION["user_username"] = $data["synetics_system_username"];
            $_SESSION["user_name"] = $data["synetics_system_name"];
            $_SESSION["user_rights"] = $data["synetics_system_rights"];
            $_SESSION["logged"] = $_POST['logged'];
        }

        echo 1;
        ldap_close($ds);
        
    } elseif (!$r) {
        $mydb = new DB_MySQL($host, $dbname, $user, $pw);
        $mydb->query("SELECT * FROM synetics_system WHERE synetics_system_username like '$username' AND synetics_system_pw = MD5('$passwd')");

        if ($mydb->count() > 0) {
            // Benutzerdaten in ein Array auslesen.
            $data = $mydb->fetchRow();

            // Sessionvariablen erstellen und registrieren


            echo 1;
            $_SESSION["user_id"] = $data["synetics_system__ID"];
            $_SESSION["user_username"] = $data["synetics_system_username"];
            $_SESSION["user_name"] = $data["synetics_system_name"];
            $_SESSION["user_rights"] = $data["synetics_system_rights"];
            $_SESSION["logged"] = $_POST['logged'];
        }
    } else {

        echo 0;
    }
}
?>
