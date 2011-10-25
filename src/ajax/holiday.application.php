<?php

session_start();
include '../classes/mysql_db.class.php';
include '../classes/timestamp.class.php';
include '../config.inc.php';
$mysql = new mysql_db($g_db['host'], $g_db['database'], $g_db['user'], $g_db['pass']);
$mytime = new timestamp();
$mysql->query("SELECT * FROM synetics_settings");
$settings = $mysql->fetchRow();

if ($_POST['holiday_pflege'] == 1) {
    $appid = $_POST['appid_val'];
    if ($_POST['pflege'] == 1) {
        $mysql->query("UPDATE synetics_holiday SET synetics_holiday_accepted=1 WHERE synetics_holiday_appid = '" . $appid . "' ");
    } else {
        $mysql->query("UPDATE synetics_holiday SET synetics_holiday_accepted=0 WHERE synetics_holiday_appid = '" . $appid . "' ");
    }
} else {
    if ($_POST['function'] == 1) {
        if($_POST['func'] == 1){
        $appid = $_POST['appid_val'];
        $mysql->query("DELETE FROM synetics_holiday WHERE synetics_holiday_appid = '".$appid."'");
        }else{
            $mysql->query("SELECT * FROM synetics_holiday");
            $q_result = $mysql->fetchRow();
            $l_result = array();
            $format = "d.m.Y";
            foreach ($q_result as $key => $value) {
                $l_result[$key] = $value;
                if($key == 'synetics_holiday_appfrom'){
                   $l_result['synetics_holiday_appfrom'] = date($format, $l_result['synetics_holiday_appfrom']);
                   
                }
                if($key == 'synetics_holiday_appto'){
                    $l_result['synetics_holiday_appto'] = date($format, $l_result['synetics_holiday_appto']);
                }
            }
            
            echo json_encode($l_result);
        }
    
        
    } else {
        $datum_select_begin = $_POST['pickdate1'];
        $datum_select_ende = $_POST['pickdate2'];

        $datum1 = $mytime->timestamp_german2mysql($datum_select_begin);
        $datum2 = $mytime->timestamp_german2mysql($datum_select_ende);

        $datum = $mytime->timesplitt($datum_select_begin);

        $maxDays = $datum2 - $datum1;
        $days = floor($maxDays / (3600 * 24));
        $abzug = 0;
        for ($i = 0; $i <= $days; $i++) {
            $dateToTime = strtotime($datum . "+" . $i . " days");
            $checkday = date("N", $dateToTime);
            if ($checkday == 6 || $checkday == 7) {
                $abzug++;
            }
        }
        $daysnew = ($days - $abzug) + 1;


        $mysql->query("SELECT * FROM synetics_system WHERE synetics_system__ID = '" . $_SESSION["user_id"] . "'");
        $system = $mysql->fetchRow();

        $betreff = 'Urlaubsantrag';
        $nachricht = '
Urlaubsantrag Nr. ' . $settings['synetics_settings_appid'] . '

Hiermit beantrage ich, ' . utf8_encode($system['synetics_system_name']) . ',
    
vom (erster Urlaubstag) ' . $datum_select_begin . '
    
bis (letzter Urlaubstag) ' . $datum_select_ende . ' Urlaub.
Gesamturlaubstage: ' . $daysnew . '
    

Ich habe die Vertretung wie unten aufgeführt geklärt. 
Ein Woche vor Urlaubsbeginn schreibe ich eine E-mail an das synetics-Team 
und weise auf meinen Urlaub hin.


_____________________
 Datum, Unterschrift
 

Vertretung

Ich bin willens und in der Lage, die Urlaubsvertretung zu übernehmen, und habe keinen
eigenen Urlaub oder andere Abwesenheitstermine geplant.

_____________________________________________________________________
||Projekt/Aufgabenbereich || Zeitraum || Vertretung ||Unterschrift ||






_____________________________________________________________________


Genehmigt:                                  Verarbeitet:
Der Urlaub ist genehmigt.                   Antrag erhalten und eingepflegt.

___________________                          ___________________
Datum, Unterschrift                          Datum, Unterschrift ';
// für HTML-E-Mails muss der 'Content-type'-Header gesetzt werden
//$header = 'MIME-Version: 1.0' . "\r\n";
//$header .= 'Content-type: text/plain; charset=\'ISO-8859-15\'\n';
// zusätzliche Header
        $header .= 'From: Faktura-Urlaubsantrag' . "\n";
        $header .= 'Reply-To: gschmarsow@synetics.de' . "\n";


        $mailinfo = mail($system['synetics_system_mail'], $betreff, utf8_decode($nachricht), $header);
        if ($mailinfo) {
            echo true;
        } else {
            echo false;
        }
        $mysql->query("INSERT INTO synetics_holiday (synetics_holiday_appid,synetics_holiday_apporder,
                synetics_holiday_appfromper,synetics_holiday_appfrom,
                synetics_holiday_appto,synetics_holiday_days, synetics_holiday_accepted) 
                VALUES ('" . $settings['synetics_settings_appid'] . "','" . time() . "','" . $_SESSION['user_id'] . "','" . $datum1 . "','" . $datum2 . "','" . $daysnew . "','0');");
        $newappid = $settings['synetics_settings_appid'] + 1;
        $mysql->query("UPDATE synetics_settings SET synetics_settings_appid='" . $newappid . "';");
    }
}
?>
