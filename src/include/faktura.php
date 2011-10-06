<SCRIPT>
    $(function() {
        $( "#datepicker1" ).datepicker({ dateFormat: 'mm' });
        $( "#datepicker2" ).datepicker({ dateFormat: 'yy' });
    });
</SCRIPT>
<?php
$todaysDate = time();
$todayMonth = date("m", $todaysDate);
$todayYear = date("Y", $todaysDate);

if (isset($_POST['worker_f']) && isset($_POST['datepicker1']) && isset($_POST['datepicker2'])) {
    $workerID = $_POST['worker_f'];
    $month = $_POST['datepicker1'];
    $year = $_POST['datepicker2'];
    $datum_begin = $year . "-" . $month . "-01";
    $datum_end = $year . "-" . $month . "-31";
    $datum_start = strtotime($datum_begin);
    $datum_ende = strtotime($datum_end);
    $smarty->assign('month', $month);
    $smarty->assign('year', $year);
} else {
    $workerID = $_SESSION['user_id'];
    $month = $todayMonth;
    $year = $todayYear;
    $datum_begin = $year . "-" . $month . "-01";
    $datum_end = $year . "-" . $month . "-31";
    $datum_start = strtotime($datum_begin);
    $datum_ende = strtotime($datum_end);
    $smarty->assign('month', $todayMonth);
    $smarty->assign('year', $todayYear);
}
$pageNo = isset($_GET['page']) ? $_GET['page'] : '0';
$intCounter = 0;
$intPage = 0;
$intSet_anzahl = 0;
$process = $_POST['process_id'];
$smarty->assign('perID', $workerID);

if ($process != 0) {
    $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$workerID' AND synetics_data_date <= '$datum_ende' AND synetics_data_date >= '$datum_start' AND synetics_data_process_id = '$process'");
} else {
    $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$workerID' AND synetics_data_date <= '$datum_ende' AND synetics_data_date >= '$datum_start'");
}

$data_numrows = $mysql->fetchNumRows();

while ($data_numrows > 0) {
    if ($intCounter == 0 || $intCounter % $maxShown == 0) {
        $intPage++;
        $strLinks.="<a href='Javascript:openP($pageID,$intSet_anzahl)'> Seite " . $intPage . "</a>&nbsp;";
        $intSet_anzahl = $intSet_anzahl + $maxShown;
    }
    $intCounter++;
    $data_numrows--;
}

if ($_SESSION["user_rights"] > "1") {
    $smarty->assign('boolsche', 'true');
} else {
    $smarty->assign('boolsche', 'false');
}
//error_reporting(E_STRICT);
$smarty->assign('perID', $workerID);
$smarty->assign('procID', $process);

$mytime = new timestamp();

if ($process != 0) {
    $mysql->query("SELECT * FROM synetics_data
INNER JOIN synetics_clients 
	ON (synetics_clients.synetics_clients_id = synetics_data.synetics_data_client)
WHERE synetics_data.synetics_data_system_id = '$workerID' AND synetics_data.synetics_data_date < '$datum_ende' AND synetics_data.synetics_data_date > '$datum_start' AND synetics_data_process_id = '$process' ORDER BY synetics_data.synetics_data_date LIMIT $pageNo,$maxShown");
} else {
    $mysql->query("SELECT * FROM synetics_data
INNER JOIN synetics_clients 
	ON (synetics_clients.synetics_clients_id = synetics_data.synetics_data_client)
WHERE synetics_data.synetics_data_system_id = '$workerID' AND synetics_data.synetics_data_date < '$datum_ende' AND synetics_data.synetics_data_date > '$datum_start' ORDER BY synetics_data.synetics_data_date LIMIT $pageNo,$maxShown");
}
$data_result = $mysql->queryResult();

$mysql->query("SELECT * FROM synetics_process");
$process_result = $mysql->queryResult();

$mysql->query("SELECT * FROM synetics_system WHERE NOT synetics_system__ID = 1 ORDER BY synetics_system_name");
$personal_result = $mysql->queryResult();

$i = 0;
while ($personal = mysql_fetch_array($personal_result, MYSQL_ASSOC)) {
    foreach ($personal as $key => $value) {
        $mypersonal[$i][$key] = utf8_encode($value);
    }
    $i++;
}

$i = 0;
$myprocess = array();
$fakturaall = array();
while ($process = mysql_fetch_array($process_result, MYSQL_ASSOC)) {
    $myprocess[$i]['processname'] = $process['synetics_process_name'];
    $myprocess[$i]['processid'] = $process['synetics_process_id'];
    $i++;
}

$mysql->query("SELECT * FROM synetics_settings");
$settings = $mysql->fetchArray();

$mydata = array();
$i = 0;
while ($data = mysql_fetch_array($data_result, MYSQL_ASSOC)) {
    $mysql->query("SELECT * FROM synetics_projects WHERE synetics_projects__ID = '" . $data['synetics_data_projects_id'] . "'");
    $projects = $mysql->fetchArray();


    if ($projects == 0) {
        $projects['synetics_projects_projectname'] = '/';
    }
    $datum = $mytime->timestamp_mysql2german($data['synetics_data_date']);
    $time_hin = $mytime->timestamp_time2ger($data['synetics_data_outjourneyex']);
    $time_hin2 = $mytime->timestamp_time2ger($data['synetics_data_outjourneyto']);
    $time_work = $mytime->timestamp_time2ger($data['synetics_data_worktimefrom']);
    $time_work2 = $mytime->timestamp_time2ger($data['synetics_data_worktimeto']);
    $time_zur = $mytime->timestamp_time2ger($data['synetics_data_returnjourneyex']);
    $time_zur2 = $mytime->timestamp_time2ger($data['synetics_data_returnjourneyto']);

    /*
     * Wert 2 < Wert 1
     * Fallstudie Rechnungs Fix
     */
    if ($data['synetics_data_outjourneyex'] > $data['synetics_data_outjourneyto']) {

        $twenty = $mytime->secondsR('24:00') - $data['synetics_data_outjourneyex'];
        $two = $data['synetics_data_outjourneyto'] - $mytime->secondsR('0:00');
        $hinfahrtzeit = $twenty + $two;
    } else {
        $hinfahrtzeit = $data['synetics_data_outjourneyto'] - $data['synetics_data_outjourneyex'];
    }

    if ($data['synetics_data_returnjourneyex'] > $data['synetics_data_returnjourneyto']) {

        $twenty = $mytime->secondsR('24:00') - $data['synetics_data_returnjourneyex'];
        $two = $data['synetics_data_returnjourneyto'] - $mytime->secondsR('0:00');
        $zurückfahrzeit = $twenty + $two;
    } else {
        $zurückfahrzeit = $data['synetics_data_returnjourneyto'] - $data['synetics_data_returnjourneyex'];
    }

    if ($data['synetics_data_worktimefrom'] > $data['synetics_data_worktimeto']) {

        $twenty = $mytime->secondsR('24:00') - $data['synetics_data_worktimefrom'];
        $two = $data['synetics_data_worktimeto'] - $mytime->secondsR('0:00');
        $arbeitszeit = $twenty + $two;
    } else {
        $arbeitszeit = $data['synetics_data_worktimeto'] - $data['synetics_data_worktimefrom'];
    }
    $kmcost = $settings['synetics_settings_kmset'] * $data['synetics_data_km'];


    $fahrtzeit = $hinfahrtzeit + $zurückfahrzeit;
    $pause = $data['synetics_data_wtpause'] - $data['synetics_data_pause'];
    $azpause = $arbeitszeit - $pause;
    $allhour = $fahrtzeit + $arbeitszeit;

    $fakturaazpause += $azpause;
    $fakturapause += $pause;
    $fakturafahrt += $fahrtzeit;
    $fakturaall['kmcost'] += $kmcost;
    $fakturaall['km'] += $data['synetics_data_km'];
    $fakturaall['synetics_data_train'] += $data['synetics_data_train'];
    $fakturaall['synetics_data_oil'] += $data['synetics_data_oil'];
    $fakturaall['synetics_data_airfare'] += $data['synetics_data_airfare'];
    $fakturaall['synetics_data_freight'] += $data['synetics_data_freight'];
    $fakturaall['synetics_data_hotel'] += $data['synetics_data_hotel'];
    $fakturaall['synetics_data_rentalcar'] += $data['synetics_data_rentalcar'];
    $fakturaall['synetics_data_parking'] += $data['synetics_data_parking'];
    $fakturaall['synetics_data_citytrain'] += $data['synetics_data_citytrain'];
    $fakturaall['synetics_data_taxi'] += $data['synetics_data_taxi'];
    $fakturaall['synetics_data_hospitality'] += $data['synetics_data_hospitality'];
    $fakturaall['synetics_data_foodoverall'] += $data['synetics_data_foodoverall'];

    $mydata[$i]['date'] = $datum;
    $mydata[$i]['synetics_projects_projectname'] = utf8_encode($projects['synetics_projects_projectname']);
    $mydata[$i]['time_hin'] = $time_hin['time'];
    $mydata[$i]['time_hin2'] = $time_hin2['time'];
    $mydata[$i]['time_work'] = $time_work['time'];
    $mydata[$i]['time_work2'] = $time_work2['time'];
    $mydata[$i]['time_zur'] = $time_zur['time'];
    $mydata[$i]['time_zur2'] = $time_zur2['time'];
    $mydata[$i]['hinfahrtzeit'] = $hinfahrtzeit;
    $mydata[$i]['zurückfahrzeit'] = $zurückfahrzeit;
    $mydata[$i]['fahrtzeit'] = $mytime->timersSTD($fahrtzeit);
    $mydata[$i]['pause'] = $mytime->timersSTD($pause);
    $mydata[$i]['azpause'] = $mytime->timersSTD($azpause);
    $mydata[$i]['allhour'] = $mytime->timersSTD($allhour);
    $mydata[$i]['synetics_data_city'] = utf8_encode($data['synetics_data_city']);
    $mydata[$i]['synetics_data_foodoverall'] = utf8_encode($data['synetics_data_foodoverall']);
    $mydata[$i]['synetics_data_km'] = $data['synetics_data_km'];
    $mydata[$i]['synetics_data_train'] = utf8_encode($data['synetics_data_train']);
    $mydata[$i]['synetics_data_oil'] = utf8_encode($data['synetics_data_oil']);
    $mydata[$i]['synetics_data_airfare'] = utf8_encode($data['synetics_data_airfare']);
    $mydata[$i]['synetics_data_freight'] = utf8_encode($data['synetics_data_freight']);
    $mydata[$i]['synetics_data_hotel'] = utf8_encode($data['synetics_data_hotel']);
    $mydata[$i]['synetics_data_rentalcar'] = utf8_encode($data['synetics_data_rentalcar']);
    $mydata[$i]['synetics_data_parking'] = utf8_encode($data['synetics_data_parking']);
    $mydata[$i]['synetics_data_citytrain'] = utf8_encode($data['synetics_data_citytrain']);
    $mydata[$i]['synetics_data_taxi'] = utf8_encode($data['synetics_data_taxi']);
    $mydata[$i]['synetics_data_hospitality'] = utf8_encode($data['synetics_data_hospitality']);
    $mydata[$i]['synetics_clients_client'] = utf8_encode($data['synetics_clients_client']);
    $mydata[$i]['synetics_settings_kmset'] = $kmcost;
    $mydata[$i]['synetics_data_foodoverall'] = $data['synetics_data_foodoverall'];
    $i++;
}
//var_dump($mydata);
$smarty->assign('fakturall', $fakturaall);
$smarty->assign('fakturaazpause', $mytime->timersSTD($fakturaazpause));
$smarty->assign('fakturapause', $mytime->timersSTD($fakturapause));
$smarty->assign('fakturafahrt', $mytime->timersSTD($fakturafahrt));
$smarty->assign('year_month', $mytime->showmonth());
$smarty->assign('pagelink', $strLinks);
$smarty->assign('data_lastname', $mypersonal);
$smarty->assign('data_process', $myprocess);
$smarty->assign('data_main', $mydata);
$smarty->display('faktura.tpl');
?>
