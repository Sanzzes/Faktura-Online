<?php
session_start();
if(empty($_SESSION['user_username'])){
    echo "Nicht eingeloggt kein zugriff";
    
}else{
require_once '../config.inc.php';
require_once '../classes/mysql_db.class.php';
require_once '../classes/timestamp.class.php';

$mysql = new mysql_db($g_db['host'], $g_db['database'], $g_db['user'], $g_db['pass']);
$mytime = new timestamp();
$mysql->query("SELECT * FROM synetics_settings");
$settings = $mysql->fetchArray();

$dayWorkTime = $settings['synetics_settings_dayworktime'];


        if ($_POST['userid'] != "0") {
            $userid = $_POST['userid'];
            $month = $_POST['thismonth'];
            $year = $_POST['thisyear'];
            $process = $_POST['thisprocess'];
            $datum_begin 	= $year . $month . "01";
            $datum_end	= $year . $month . "31";
            $datum_start    = strtotime($datum_begin);
            $datum_ende     = strtotime($datum_end);



            if ($process != 0) {
                $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$userid' AND synetics_data_date < '$datum_ende' AND synetics_data_date > '$datum_start' AND synetics_data_process_id = '$process'");
            } else {
                $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$userid' AND synetics_data_date < '$datum_ende' AND synetics_data_date > '$datum_start'");
            }
            $data_result_user = $mysql->queryResult();
            $mysql->query("SELECT * FROM synetics_process WHERE synetics_process_id = '$process'");
            $process_name = $mysql->fetchArray();
            $overhours = array();
            $ustunden = 0;
            while ($data_user = mysql_fetch_array($data_result_user, MYSQL_ASSOC)) {
                $hinfahrtzeit = $data_user['synetics_data_outjourneyto'] - $data_user['synetics_data_outjourneyex'];
                $zurückfahrzeit = $data_user['synetics_data_returnjourneyto'] - $data_user['synetics_data_returnjourneyex'];
                $arbeitszeit = $data_user['synetics_data_worktimeto'] - $data_user['synetics_data_worktimefrom'];
                $pause = $data_user['synetics_data_wtpause'] - $data_user['synetics_data_pause'];
                $fahrtzeit = $hinfahrtzeit + $zurückfahrzeit;
                $overhours[$data_user['synetics_data_date']] += $arbeitszeit + $fahrtzeit - $pause;
            }

            foreach ($overhours as $overhour) {
                $ustunden += $overhour;
            }
            if ($process != 0) {
                $processname = $process_name['synetics_process_name'];
            } else {
                $processname = "alle";
            }
            echo $mytime->ustunden($ustunden) . "für <b><font color='red'>" . $processname . "</font></b> gearbeitet diesen Monat";
        } else {
            $userid = NULL;
            echo "Keine Daten vorhanden";
        }
}
?>