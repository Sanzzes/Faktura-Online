<?php

session_start();
if (empty($_SESSION['user_username'])) {
    echo "Nicht eingeloggt kein zugriff";
} else {
    include '../classes/mysql_db.class.php';
    include '../classes/timestamp.class.php';
    include '../config.inc.php';
    $mysql = new mysql_db($g_db['host'], $g_db['database'], $g_db['user'], $g_db['pass']);
    $mytime = new timestamp();

    $datum_select_begin = $_POST['pickdate1'];
    $datum_select_ende = $_POST['pickdate2'];
    $updaten = $_POST['updaten'];
    $appid = $_POST['appid_val'];

    $datum1 = $mytime->timestamp_german2mysql($datum_select_begin);
    $datum2 = $mytime->timestamp_german2mysql($datum_select_ende);

    $maxDays = $datum2 - $datum1;
    $days = $maxDays / (3600 * 24);

    $datum = $mytime->timesplitt($datum_select_begin);

    if ($updaten == 1) {
        $abzug = 0;
        for ($i = 0; $i <= $days; $i++) {
            $dateToTime = strtotime($datum . "+" . $i . " days");
            $checkday = date("N", $dateToTime);
            if ($checkday == 6 || $checkday == 7) {
                $abzug++;
            }
        }

        $daysnew = ($days - $abzug) + 1;
        $mysql->query("UPDATE synetics_holiday SET synetics_holiday_appfrom = '" . $datum1 . "',synetics_holiday_appto = '" . $datum2 . "', synetics_holiday_days = '" . $daysnew . "'  WHERE synetics_holiday_appid = '" . $appid . "';");
        if (mysql_affected_rows() > 0) {
            echo true;
        } else {
            echo false;
        }
    } else {

        $mysql->query("SELECT * FROM synetics_settings");
        $settings = $mysql->fetchRow();

        $mysql->query("SELECT * FROM synetics_system WHERE synetics_system__ID = '" . $_SESSION["user_id"] . "'");
        $system = $mysql->fetchRow();

        $startime = "1317792600";

        $userwork = $system['synetics_system_weekhour'] / $system['synetics_system_weekwork'];

        $worktime = $startime + (3600 * $userwork);

        $city = utf8_decode("Düsseldorf");

        for ($i = 0; $i <= $days; $i++) {
            $dateToTime = strtotime($datum . "+" . $i . " days");
            $checkday = date("N", $dateToTime);
            if ($checkday == 6 || $checkday == 7) {
                $mysql->query("INSERT INTO synetics_data (synetics_data_date,synetics_data_client,
					synetics_data_city,synetics_data_outjourneyex,synetics_data_outjourneyto,synetics_data_worktimefrom,
					synetics_data_worktimeto,synetics_data_pause,
					synetics_data_wtpause,
					synetics_data_returnjourneyex,synetics_data_returnjourneyto,synetics_data_system_id,
					synetics_data_projects_id,synetics_data_process_id) 
                                        VALUES ('" . $dateToTime . "', '" . $settings['synetics_settings_weekendid'] . "', '" . $city . "', '1317765600', '1317765600', '1317765600', '1317765600', '1317765600', '1317765600', '1317765600', '1317765600','" . $_SESSION['user_id'] . "','1', '0');");
            } else {

                $mysql->query("INSERT INTO synetics_data (synetics_data_date,synetics_data_client,
					synetics_data_city,synetics_data_outjourneyex,synetics_data_outjourneyto,synetics_data_worktimefrom,
					synetics_data_worktimeto,synetics_data_pause,
					synetics_data_wtpause,
					synetics_data_returnjourneyex,synetics_data_returnjourneyto,synetics_data_system_id,
					synetics_data_projects_id,synetics_data_process_id) 
                                        VALUES ('" . $dateToTime . "', '" . $settings['synetics_settings_freeid'] . "', '" . $city . "', '1317765600', '1317765600', '1317792600', '" . $worktime . "', '1317765600', '1317765600', '1317765600', '1317765600','" . $_SESSION['user_id'] . "','1', '0');");
            }
        }
        if (mysql_affected_rows() > 0) {
            echo true;
        } else {
            echo false;
        }
    }
}
?>
