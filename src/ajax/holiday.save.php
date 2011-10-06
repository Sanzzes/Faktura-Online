<?php

session_start();
include '../classes/dbCon.class.php';
include '../classes/time.class.php';
include '../config.inc.php';
$mysql = new DB_MySQL($host, $dbname, $user, $pw);
$mytime = new timestamp();

$datum_select_begin = $_POST['pickdate1'];
$datum_select_ende = $_POST['pickdate2'];

$datum1 = $mytime->timestamp_german2mysql($datum_select_begin);
$datum2 = $mytime->timestamp_german2mysql($datum_select_ende);

$maxDays = $datum2 - $datum1;
$days = $maxDays/(3600*24);

$datum = $mytime->timesplitt($datum_select_begin);



$mysql->query("SELECT * FROM synetics_settings");
$settings = $mysql->fetchRow();

$city = utf8_decode("Düsseldorf");

for ($i = 0; $i <= $days; $i++) {
    $dateToTime = strtotime($datum."+".$i." days");
    $checkday = date("N", $dateToTime);
    if ($checkday == 6 || $checkday == 7) {

        $mysql->query("INSERT INTO synetics_data (synetics_data_date,synetics_data_client,
					synetics_data_city,synetics_data_outjourneyex,synetics_data_outjourneyto,synetics_data_worktimefrom,
					synetics_data_worktimeto,synetics_data_pause,
					synetics_data_wtpause,
					synetics_data_returnjourneyex,synetics_data_returnjourneyto,synetics_data_system_id,
					synetics_data_projects_id,synetics_data_process_id) 
                                        VALUES ('" . $dateToTime . "', '" . $settings['synetics_settings_weekendid'] . "', '" . $city . "', '1317765600', '1317765600', '1317765600', '1317765600', '1317765600', '1317765600', '1317765600', '1317765600','" . $_SESSION['user_id'] . "','1', '1');");
    } else {

        $mysql->query("INSERT INTO synetics_data (synetics_data_date,synetics_data_client,
					synetics_data_city,synetics_data_outjourneyex,synetics_data_outjourneyto,synetics_data_worktimefrom,
					synetics_data_worktimeto,synetics_data_pause,
					synetics_data_wtpause,
					synetics_data_returnjourneyex,synetics_data_returnjourneyto,synetics_data_system_id,
					synetics_data_projects_id,synetics_data_process_id) 
                                        VALUES ('" . $dateToTime . "', '" . $settings['synetics_settings_freeid'] . "', '" . $city . "', '1317765600', '1317765600', '1317792600', '1317821400', '1317765600', '1317765600', '1317765600', '1317765600','" . $_SESSION['user_id'] . "','1', '1');");


    }
}       
        if (mysql_affected_rows() > 0) {
            echo true;
        } else {
            echo false;
        }

?>
