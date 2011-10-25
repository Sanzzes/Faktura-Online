<?php

require_once '../config.inc.php';
require_once '../classes/mysql_db.class.php';

$checkuser = $_POST['checkuser'];

$mysql = new mysql_db($g_db['host'], $g_db['database'], $g_db['user'], $g_db['pass']);

if ($checkuser == 1) {
    $name = $_POST['name'];


    $mysql->query("SELECT * from synetics_system WHERE synetics_system_username = '" . $name . "'");
    $l_num = $mysql->fetchNumRows();

    if ($l_num == 0) {
        echo true;
    } else {
        echo false;
    }
} else {
    
    $l_res = $mysql->query("SELECT * FROM synetics_system WHERE synetics_system__ID = " . $_POST["systemID"]);
    $l_resu = $mysql->fetchArray();
    $l_result = array();
    foreach ($l_resu AS $index => $value) {
        $l_result[$index] = utf8_encode($value);
    }
    echo json_encode($l_result);
}
?>
