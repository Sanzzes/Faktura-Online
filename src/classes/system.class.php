<?php

class system {

    public function holiday($start_h, $end_h) {
        $split = explode(" ", $start_h);
        $start_h_eng = sprintf("%04d-%02d-%02d", substr($split[0], 6, 4), substr($split[0], 3, 2), substr($split[0], 0, 2));
        $split = explode(" ", $end_h);
        $end_h_eng = sprintf("%04d-%02d-%02d", substr($split[0], 6, 4), substr($split[0], 3, 2), substr($split[0], 0, 2));
        $days = (strtotime($end_h_eng) - strtotime($start_h_eng)) / 86400;

        while ($days != 0) {
            $start = strtotime($start_h_eng);
            if (date("l", $start) != "Sunday" || date("l", $start != "Saturday"))
                --$days;
        }
    }

    public function timeacc($array) {
        global $time;
        foreach ($array AS $key => $value) {
            $checkday = date("N", $value['datum']);
            $workperday = ($value['weekhour'] / $value['weekwork'] * 60) * 60;
            if ($checkday == 6 || $checkday == 7) {

                $timeacc += $value['worktime'] + ($value['journeytime'] * 0.5);
            } else {
                if ($value['worktime'] < $workperday) {
                    $howmuch = $workperday - $value['worktime'];
                    if ($howmuch <= $value['journeytime']) {
                        $journeytime_new = $value['journeytime'] - $howmuch;
                        $workday = $value['worktime'] + $howmuch;
                        $journey = $journeytime_new * 0.5;
                        $workday_new = $journey + $workday;
                        $timeacc += $workday_new - $workperday;
                    } else {
                        $workday_new = $value['worktime'] + ($value['journeytime'] * 0.5);
                        $timeacc += $workday_new - $workperday;
                    }
                } else {

                    $workday_new = $value['worktime'] + ($value['journeytime'] * 0.5);
                    $timeacc += $workday_new - $workperday;
                }
            }
        }

        return $time->timersSTD($timeacc);
    }

    function DataTables($month, $year, $workerID, $process) {
        global $mysql, $smarty, $time, $maxShown, $system;
        $datum_begin = $year . "-" . $month . "-01";
        $datum_end = $year . "-" . $month . "-31";
        $datum_start = strtotime($datum_begin);
        $datum_ende = strtotime($datum_end);
        $smarty->assign('month', $month);
        $smarty->assign('year', $year);

        $smarty->assign('procID', $process);
        if ($process != 0) {
            $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$workerID' AND synetics_data_date <= '$datum_ende' AND synetics_data_date >= '$datum_start' AND synetics_data_process_id = '$process'");
        } else {
            $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$workerID' AND synetics_data_date <= '$datum_ende' AND synetics_data_date >= '$datum_start'");
        }
        $data_result = $mysql->queryResult();

        $smarty->assign('perID', $workerID);

        $mysql->query("SELECT * FROM synetics_city ORDER BY synetics_city_name");
        $city_result = $mysql->queryResult();

        $mysql->query("SELECT * FROM synetics_clients ORDER BY synetics_clients_client");
        $clients_result = $mysql->queryResult();


        if ($_SESSION["user_rights"] > "1") {
            $smarty->assign('boolsche', 'true');

            $mysql->query("SELECT * FROM synetics_system WHERE synetics_system__ID != 1");
            $personal_result = $mysql->queryResult();
        } else {
            $smarty->assign('boolsche', 'false');

            $mysql->query("SELECT * FROM synetics_system WHERE synetics_system__ID = '$workerID' AND synetics_system__ID != 1");
            $personal_result = $mysql->queryResult();
        }

        $mysql->query("SELECT * FROM synetics_settings");
        $settings = $mysql->fetchArray();


        $i = 0;
        while ($personal = mysql_fetch_array($personal_result, MYSQL_ASSOC)) {
            $myworkers[$personal['synetics_system__ID']] = utf8_encode($personal['synetics_system_name']);

            foreach ($personal as $key => $value) {
                $mypersonal[$i][$key] = utf8_encode($value);
            }
            $i++;
        }
        $i = 0;
        $mydata = array();
        $timeacc = array();
        while ($data = mysql_fetch_array($data_result, MYSQL_ASSOC)) {
            $mysql->query("SELECT * FROM synetics_distribution WHERE synetics_distribution_DataID = '" . $data['synetics_data_ID'] . "'");
            $l_data = $mysql->fetchRow();


            $mysql->query("SELECT * FROM synetics_system 
		WHERE synetics_system__ID = '" . $data['synetics_data_system_id'] . "'");
            $worker_result = $mysql->fetchRow();


            $mysql->query("SELECT * FROM synetics_clients 
		WHERE synetics_clients_id = '" . $data['synetics_data_client'] . "'");
            $kunde_result = $mysql->fetchRow();

            $mysql->query("SELECT * FROM synetics_projects
		WHERE synetics_projects__ID = '" . $data['synetics_data_projects_id'] . "'");
            $projekt_result = $mysql->fetchRow();

            $mysql->query("SELECT synetics_process_name FROM synetics_process WHERE synetics_process_id = '" . $data['synetics_data_process_id'] . "'");
            $process = $mysql->fetchArray();


            $datum = $time->timestamp_mysql2german($data['synetics_data_date']);
            $time_exdrive = $time->timestamp_time2ger($data['synetics_data_outjourneyex']);
            $time_todrive = $time->timestamp_time2ger($data['synetics_data_outjourneyto']);
            $time_work = $time->timestamp_time2ger($data['synetics_data_worktimefrom']);
            $time_work2 = $time->timestamp_time2ger($data['synetics_data_worktimeto']);
            $time_rexdrive = $time->timestamp_time2ger($data['synetics_data_returnjourneyex']);
            $time_rtodrive = $time->timestamp_time2ger($data['synetics_data_returnjourneyto']);



            if ($data['synetics_data_outjourneyex'] > $data['synetics_data_outjourneyto']) {

                $twenty = $mytime->secondsR('24:00') - $data['synetics_data_outjourneyex'];
                $two = $data['synetics_data_outjourneyto'] - $time->secondsR('0:00');
                $hinfahrtzeit = $twenty + $two;
            } else {
                $hinfahrtzeit = $data['synetics_data_outjourneyto'] - $data['synetics_data_outjourneyex'];
            }

            if ($data['synetics_data_returnjourneyex'] > $data['synetics_data_returnjourneyto']) {

                $twenty = $mytime->secondsR('24:00') - $data['synetics_data_returnjourneyex'];
                $two = $data['synetics_data_returnjourneyto'] - $time->secondsR('0:00');
                $zurückfahrzeit = $twenty + $two;
            } else {
                $zurückfahrzeit = $data['synetics_data_returnjourneyto'] - $data['synetics_data_returnjourneyex'];
            }

            if ($data['synetics_data_worktimefrom'] > $data['synetics_data_worktimeto']) {

                $twenty = $mytime->secondsR('24:00') - $data['synetics_data_worktimefrom'];
                $two = $data['synetics_data_worktimeto'] - $time->secondsR('0:00');
                $arbeitszeit = $twenty + $two;
            } else {
                $arbeitszeit = $data['synetics_data_worktimeto'] - $data['synetics_data_worktimefrom'];
            }


            $fahrtzeit = $hinfahrtzeit + $zurückfahrzeit;
            $pause = $data['synetics_data_wtpause'] - $data['synetics_data_pause'];
            $azpause = $arbeitszeit - ($pause);
            $allhour = $fahrtzeit + $arbeitszeit;
            $ustunden = $azpause - $dayWorkTime;

            $datum = $time->timestamp_mysql2german($data['synetics_data_date']);

            $kmcost = $settings['synetics_settings_kmsetper'] * $data['synetics_data_km'];

            $timeacc[$datum]['worktime'] += $azpause;
            $timeacc[$datum]['datum'] = $data['synetics_data_date'];
            $timeacc[$datum]['weekwork'] += $worker_result['synetics_system_weekwork'];
            $timeacc[$datum]['weekhour'] += $worker_result['synetics_system_weekhour'];
            $timeacc[$datum]['journeytime'] += $fahrtzeit;
            $allhour_all += $allhour;
            $fahrtzeiten_all += $fahrtzeit;
            $arbeitszeit_all += $azpause;

            $fakturaazpause += $azpause;
            $fakturapause += $pause;
            $fakturafahrt += $fahrtzeit;
            $fakturaall['kmcost'] += $kmcost;
            $fakturaall['km'] += $data['synetics_data_km'];
            $fakturaall['synetics_data_train'] += $l_data['synetics_distribution_train'];
            $fakturaall['synetics_data_oil'] += $l_data['synetics_distribution_oil'];
            $fakturaall['synetics_data_airfare'] += $l_data['synetics_distribution_airfare'];
            $fakturaall['synetics_data_freight'] += $l_data['synetics_distribution_freight'];
            $fakturaall['synetics_data_hotel'] += $l_data['synetics_distribution_hotel'];
            $fakturaall['synetics_data_rentalcar'] += $l_data['synetics_distribution_rentalcar'];
            $fakturaall['synetics_data_parking'] += $l_data['synetics_distribution_parking'];
            $fakturaall['synetics_data_citytrain'] += $l_data['synetics_distribution_citytrain'];
            $fakturaall['synetics_data_taxi'] += $l_data['synetics_distribution_taxi'];
            $fakturaall['synetics_data_hospitality'] += $l_data['synetics_distribution_hospitality'];
            $fakturaall['synetics_data_foodoverall'] += $data['synetics_data_foodoverall'];

            $mydata[$i]['date'] = $datum;
            $mydata[$i]['process'] = utf8_encode($process['synetics_process_name']);
            $mydata[$i]['synetics_data_worker'] = utf8_encode($worker_result['synetics_system_name']);
            $mydata[$i]['synetics_projects_projectname'] = utf8_encode($projekt_result['synetics_projects_projectname']);
            $mydata[$i]['time_hin'] = $time_exdrive['time'];
            $mydata[$i]['synetics_data_ID'] = $data['synetics_data_ID'];
            $mydata[$i]['time_hin2'] = $time_todrive['time'];
            $mydata[$i]['time_work'] = $time_work['time'];
            $mydata[$i]['time_work2'] = $time_work2['time'];
            $mydata[$i]['time_zur'] = $time_rexdrive['time'];
            $mydata[$i]['time_zur2'] = $time_rtodrive['time'];
            $mydata[$i]['fahrtzeit'] = $time->timersSTD($fahrtzeit);
            $mydata[$i]['pause'] = $time->timersSTD($pause);
            $mydata[$i]['azpause'] = $time->timersSTD($azpause);
            $mydata[$i]['allhour'] = $time->timersSTD($allhour);
            $mydata[$i]['synetics_data_city'] = utf8_encode($data['synetics_data_city']);
            $mydata[$i]['synetics_clients_client'] = utf8_encode($kunde_result['synetics_clients_client']);
            $mydata[$i]['ustunden_synetics'] = $time->timersSTD($ustunden);
            $mydata[$i]['_km'] = utf8_encode($data['synetics_data_km']);
            $mydata[$i]['synetics_data_foodoverall'] = utf8_encode($data['synetics_data_foodoverall']);
            $mydata[$i]['_train'] = utf8_encode($l_data['synetics_distribution_train']);
            $mydata[$i]['_oil'] = utf8_encode($l_data['synetics_distribution_oil']);
            $mydata[$i]['_airfare'] = utf8_encode($l_data['synetics_distribution_airfare']);
            $mydata[$i]['_freight'] = utf8_encode($l_data['synetics_distribution_freight']);
            $mydata[$i]['_hotel'] = utf8_encode($l_data['synetics_distribution_hotel']);
            $mydata[$i]['_rentalcar'] = utf8_encode($l_data['synetics_distribution_rentalcar']);
            $mydata[$i]['_parking'] = utf8_encode($l_data['synetics_distribution_parking']);
            $mydata[$i]['_citytrain'] = utf8_encode($l_data['synetics_distribution_citytrain']);
            $mydata[$i]['_taxi'] = utf8_encode($l_data['synetics_distribution_taxi']);
            $mydata[$i]['_hospitality'] = utf8_encode($l_data['synetics_distribution_hospitality']);
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
            $i++;
        }
        $smarty->assign('year_month', $time->showmonth());
        $smarty->assign('fakturall', $fakturaall);
        $smarty->assign('fakturaazpause', $time->timersSTD($fakturaazpause));
        $smarty->assign('fakturapause', $time->timersSTD($fakturapause));
        $smarty->assign('fakturafahrt', $time->timersSTD($fakturafahrt));
        $smarty->assign('allhour_all', $time->timersSTD($allhour_all));
        $smarty->assign('arbeitszeit_all', $time->timersSTD($arbeitszeit_all));
        $smarty->assign('fahrtzeiten_all', $time->timersSTD($fahrtzeiten_all));
        $smarty->assign('zeitkonto', $system->timeacc($timeacc));
        $smarty->assign('data_lastname', $mypersonal);
        $smarty->assign('data_main', $mydata);
        $smarty->assign('pagelink', $strLinks);
    }

    public function getClients() {
        global $mysql, $smarty;
        $mysql->query("SELECT * FROM synetics_clients");
        $clients_result = $mysql->queryResult();

        $i = 0;
        while ($clients = mysql_fetch_array($clients_result, MYSQL_ASSOC)) {
            foreach ($clients as $key => $value) {
                $myclients[$i][$key] = utf8_encode($value);
            }
            $i++;
        }
        $smarty->assign('clients', $myclients);
    }

    public function getProjects() {
        global $mysql, $smarty;

        $mysql->query("SELECT * FROM synetics_projects ORDER by synetics_clients_synetics_clients_clientno");
        $l_query = $mysql->queryResult();

        $i = 0;
        $project_data = array();
        while ($data = mysql_fetch_array($l_query, MYSQLI_ASSOC)) {
            $mysql->query("SELECT * FROM synetics_clients WHERE synetics_clients_id = '" . $data['synetics_clients_synetics_clients_clientno'] . "'");
            $c_query = $mysql->fetchRow();
            $project_data[$i]['projectname'] = utf8_encode($data['synetics_projects_projectname']);
            $project_data[$i]['id'] = $data['synetics_projects__ID'];
            $project_data[$i]['leader'] = $data['synetics_projects_projecleader'];
            $project_data[$i]['contact'] = utf8_encode($data['synetics_projects_contactperson']);
            $project_data[$i]['cost'] = $data['synetics_projects_cost'];
            $project_data[$i]['drivecost'] = $data['synetics_projects_drivecost'];
            $project_data[$i]['description'] = $data['synetics_projects_description'];
            $project_data[$i]['costrate'] = $data['synetics_projects_costrate'];
            $project_data[$i]['drivecostrate'] = $data['synetics_projects_drivecostrate'];
            $project_data[$i]['clients_id'] = $data['synetics_clients_synetics_clients_clientno'];
            $project_data[$i]['clients_name'] = utf8_encode($c_query['synetics_clients_client']);



            $i++;
        }

        $smarty->assign('projects', $project_data);
    }

    public function getPersonal() {
        global $mysql, $smarty;
        $mysql->query("SELECT * FROM synetics_system");
        $results = $mysql->queryResult();
        $i = 0;
        $personal = array();
        while ($data = mysql_fetch_array($results, MYSQLI_ASSOC)) {
            $personal[$i]['id'] = $data['synetics_system__ID'];
            $personal[$i]['name'] = utf8_encode($data['synetics_system_name']);
            $personal[$i]['street'] = utf8_encode($data['synetics_system_street']);
            $personal[$i]['city'] = utf8_encode($data['synetics_system_city']);
            $personal[$i]['zipcode'] = $data['synetics_system_zipcode'];
            $personal[$i]['tele'] = $data['synetics_system_tele'];
            $personal[$i]['weekwork'] = $data['synetics_system_weekwork'];
            $personal[$i]['weekhour'] = $data['synetics_system_weekhour'];
            $personal[$i]['mail'] = utf8_encode($data['synetics_system_mail']);
            $personal[$i]['rights'] = $data['synetics_system_rights'];
            $i++;
        }
        $smarty->assign('personal', $personal);
    }

    public function getHoliday() {
        global $mysql, $smarty;

        if ($_SESSION["user_rights"] > "1") {
            $mysql->query("SELECT * FROM synetics_holiday LEFT JOIN synetics_system ON synetics_holiday.synetics_holiday_appfromper = synetics_system.synetics_system__ID");
        } else {
            $mysql->query("SELECT * FROM synetics_holiday LEFT JOIN synetics_system ON synetics_holiday.synetics_holiday_appfromper = synetics_system.synetics_system__ID WHERE synetics_holiday.synetics_holiday_appfromper = '" . $_SESSION['user_id'] . "'");
        }

        $app = $mysql->queryResult();
        $i = 0;
        $appdata = array();
        while ($app_data = mysql_fetch_array($app, MYSQL_ASSOC)) {
            $appdata[$i]['id'] = $app_data['synetics_holiday_id'];
            $appdata[$i]['appid'] = $app_data['synetics_holiday_appid'];
            $appdata[$i]['gestellt'] = date("d.m.Y", $app_data['synetics_holiday_apporder']);
            $appdata[$i]['mitarbeiter'] = utf8_encode($app_data['synetics_system_name']);
            $appdata[$i]['ubegin'] = date("d.m.Y", $app_data['synetics_holiday_appfrom']);
            $appdata[$i]['uend'] = date("d.m.Y", $app_data['synetics_holiday_appto']);
            $appdata[$i]['days'] = $app_data['synetics_holiday_days'];
            $appdata[$i]['accepted'] = $app_data['synetics_holiday_accepted'];
            $appdata[$i]['appfromper'] = $app_data['synetics_holiday_appfromper'];
            $i++;
        }
        $smarty->assign('appdata', $appdata);
    }

    public function getProcess() {
        global $mysql, $smarty;

        $mysql->query("SELECT * FROM synetics_process");
        $process_results = $mysql->queryResult();
        $i = 0;
        $process_data = array();
        while ($process = mysql_fetch_array($process_results, MYSQL_ASSOC)) {
            $process_data[$i]['id'] = $process['synetics_process_id'];
            $process_data[$i]['name'] = utf8_encode($process['synetics_process_name']);
            $i++;
        }
        $smarty->assign('process', $process_data);
    }

    public function getCity() {
        global $mysql, $smarty;

        $mysql->query("SELECT * FROM synetics_city");
        $result = $mysql->queryResult();

        $i = 0;
        while ($data = mysql_fetch_array($result, MYSQLI_ASSOC)) {
            $city[$i]['name'] = utf8_encode($data['synetics_city_name']);
            $i++;
        }
        $smarty->assign('city_data', $city);
    }

}

?>
