<?php

require_once '../config.inc.php';
require_once '../classes/mysql_db.class.php';

$mysql = new mysql_db($g_db['host'], $g_db['database'], $g_db['user'], $g_db['pass']);

$l_res = $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_ID = " . $_POST["workflowID"]);
$l_resu = $mysql->fetchArray();
$format = 'H:i';
$l_result = array();
foreach ($l_resu AS $index => $value) {
    $l_result[$index] = utf8_encode($value);

    if ($index === 'synetics_data_worktimefrom') {
        $l_result['synetics_data_worktimefrom'] = date($format, $l_result['synetics_data_worktimefrom']);
    }
    if ($index === 'synetics_data_worktimeto') {
        $l_result['synetics_data_worktimeto'] = date($format, $l_result['synetics_data_worktimeto']);
    }
    if ($index === 'synetics_data_outjourneyex') {
        $l_result['synetics_data_outjourneyex'] = date($format, $l_result['synetics_data_outjourneyex']);
    }
    if ($index === 'synetics_data_outjourneyto') {
        $l_result['synetics_data_outjourneyto'] = date($format, $l_result['synetics_data_outjourneyto']);
    }
    if ($index === 'synetics_data_pause') {
        $l_result['synetics_data_pause'] = date($format, $l_result['synetics_data_pause']);
    }
    if ($index === 'synetics_data_wtpause') {
        $l_result['synetics_data_wtpause'] = date($format, $l_result['synetics_data_wtpause']);
    }
    if ($index === 'synetics_data_returnjourneyex') {
        $l_result['synetics_data_returnjourneyex'] = date($format, $l_result['synetics_data_returnjourneyex']);
    }
    if ($index === 'synetics_data_returnjourneyto') {
        $l_result['synetics_data_returnjourneyto'] = date($format, $l_result['synetics_data_returnjourneyto']);
    }
    if ($index === 'synetics_data_date') {
        $date = $l_result['synetics_data_date'];
        $l_result['synetics_data_date'] = date("d.m.Y", $date);
    }
}
echo json_encode($l_result);
?>
