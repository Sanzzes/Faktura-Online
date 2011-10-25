<?php

require_once '../config.inc.php';
require_once '../classes/mysql_db.class.php';

$mysql = new mysql_db($g_db['host'], $g_db['database'], $g_db['user'], $g_db['pass']);

$action_a = $_POST["action_a"] ? : 0;

if ($action_a == '1') {
    $km_satz = $_POST['km_satz'] ? : 0;
    $std_day = $_POST['std_day'] ? : 0;
    $stdpause_day = $_POST['stdpause_day'] ? : 0;
    $weekend = $_POST['weekend_select'] ? : 0;
    $holidaycheck = $_POST['holidaycheck_select'] ? : 0;
    $freedaycheck = $_POST['freeday_select'] ? : 0;
    $illcheck = $_POST['ill_select'] ? : 0;
    $appid = $_POST['appid'] ? : 0;
    

    $std_day = $std_day * 60 * 60;
    $stdpause_day = $stdpause_day * 60 * 60;


    $mysql->query("UPDATE synetics_settings SET synetics_settings_kmset= $km_satz, synetics_settings_dayworktime= $std_day, synetics_settings_daypause= $stdpause_day, synetics_settings_weekendid= $weekend, synetics_settings_holidayid= $holidaycheck, synetics_settings_illid= $illcheck, synetics_settings_freeid= $freedaycheck, synetics_settings_appid=$appid");
} else if ($action_a == '2') {
    $p_rights = $_POST['p_rights'] ? : 0;
    $userID = $_POST['admin_user'] ? : 0;


    $mysql->query("UPDATE synetics_system SET synetics_system_rights= $p_rights WHERE synetics_system__ID = $userID");
} else {
    $process_name = $_POST['process_new'];
    if ($process_name == ""){
        echo 0;
    }
    else{
        $mysql->query("SELECT * FROM synetics_process WHERE synetics_process_name = '" . $process_name . "'");

    if ($mysql->count() > 0) {
        echo 1;
    } else {
        $mysql->query("INSERT INTO synetics_process (synetics_process_name) VALUES('$process_name')");
        echo 2;
    }
    }
}
?>