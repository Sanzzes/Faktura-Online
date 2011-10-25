<?php

session_start();
include '../classes/dbCon.class.php';
include '../classes/time.class.php';
include '../config.inc.php';
$mysql = new DB_MySQL($host, $dbname, $user, $pw);
$mytime = new timestamp();

$weekend_select = $_POST['weekend'];
$datum_select = $_POST['pickdate'];

$datum = $mytime->timestamp_german2mysql($datum_select);

$mysql->query("SELECT * FROM synetics_settings");
$settings = $mysql->fetchRow();

$mysql->query("SELECT * FROM synetics_system WHERE synetics_system__ID = '".$_SESSION["user_id"]."'");
$system = $mysql->fetchRow();

$startime = "1317792600";

$userwork = $system['synetics_system_weekhour'] / $system['synetics_system_weekwork'];

$worktime = $startime + (3600 * $userwork);

$city = utf8_decode("Düsseldorf");

switch ($weekend_select) {

    case 1:
        $mysql->query("INSERT INTO synetics_data (synetics_data_date,synetics_data_client,
					synetics_data_city,synetics_data_outjourneyex,synetics_data_outjourneyto,synetics_data_worktimefrom,
					synetics_data_worktimeto,synetics_data_pause,
					synetics_data_wtpause,
					synetics_data_returnjourneyex,synetics_data_returnjourneyto,synetics_data_system_id,
					synetics_data_projects_id,synetics_data_process_id) 
                                        VALUES ('" . $datum . "', '" . $settings['synetics_settings_weekendid'] . "', '".$city."', '1317765600', '1317765600', '1317765600', '1317765600', '1317765600', '1317765600', '1317765600', '1317765600','" . $_SESSION['user_id'] . "','1', '1');");
        if (mysql_insert_id() > 0) {
            echo true;
        } else {
            echo false;
        }
        break;
    case 2:
        $mysql->query("INSERT INTO synetics_data (synetics_data_date,synetics_data_client,
					synetics_data_city,synetics_data_outjourneyex,synetics_data_outjourneyto,synetics_data_worktimefrom,
					synetics_data_worktimeto,synetics_data_pause,
					synetics_data_wtpause,
					synetics_data_returnjourneyex,synetics_data_returnjourneyto,synetics_data_system_id,
					synetics_data_projects_id,synetics_data_process_id) 
                                        VALUES ('" . $datum . "', '" . $settings['synetics_settings_holidayid'] . "', '".$city."', '1317765600', '1317765600', '1317792600', '".$worktime."', '1317765600', '1317765600', '1317765600', '1317765600','" . $_SESSION['user_id'] . "','1', '1');");
        if (mysql_insert_id() > 0) {
            echo true;
        } else {
            echo false;
        }
        break;

    case 3:
        $mysql->query("INSERT INTO synetics_data (synetics_data_date,synetics_data_client,
					synetics_data_city,synetics_data_outjourneyex,synetics_data_outjourneyto,synetics_data_worktimefrom,
					synetics_data_worktimeto,synetics_data_pause,
					synetics_data_wtpause,
					synetics_data_returnjourneyex,synetics_data_returnjourneyto,synetics_data_system_id,
					synetics_data_projects_id,synetics_data_process_id) 
                                        VALUES ('" . $datum . "', '" . $settings['synetics_settings_illid'] . "', '".$city."', '1317765600', '1317765600', '".$worktime."', '1317821400', '1317765600', '1317765600', '1317765600', '1317765600','" . $_SESSION['user_id'] . "','1', '1');");
        if (mysql_insert_id() > 0) {
            echo true;
        } else {
            echo false;
        }
        break;
}
?>
