<?php

require_once '../src/config.inc.php';
require_once '../src/classes/dbCon.class.php';

$mysql = new DB_MySQL($host, $dbname, $user, $pw);

$action_a = $_POST["action_a"] ? : 0;

if ($action_a == '1') {
    $km_satz = $_POST['km_satz'] ? : 0;
    $std_day = $_POST['std_day'] ? : 0;
    $stdpause_day = $_POST['stdpause_day'] ? : 0;

    $std_day = $std_day * 60 * 60;
    $stdpause_day = $stdpause_day * 60 * 60;


    $mysql->query("UPDATE synetics_settings SET synetics_settings_kmset= $km_satz, synetics_settings_dayworktime= $std_day, synetics_settings_daypause= $stdpause_day");
} else if ($action_a == '2') {
    $p_rights = $_POST['p_rights'] ? : 0;
    $userID = $_POST['admin_user'] ? : 0;


    $mysql->query("UPDATE synetics_system SET synetics_system_rights= $p_rights WHERE synetics_system__ID = $userID");
} else {
    $process_name = $_POST['process_new'];
    $mysql->query("SELECT * FROM synetics_process WHERE synetics_process_name = '" . $process_name . "'");

    if ($mysql->count() > 0) {
        echo "0";
    } else {
        $mysql->query("INSERT INTO synetics_process (synetics_process_name) VALUES('$process_name')");
        echo "1";
    }
}
?>