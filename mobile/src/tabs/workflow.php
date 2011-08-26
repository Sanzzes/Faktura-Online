
<?php
$todaysDate = time();
$todayMonth 		= date("m", $todaysDate);
$todayYear		= date("Y", $todaysDate);

if(isset($_POST['worker_f']) && isset($_POST['datepicker1']) && isset($_POST['datepicker2']))
{
	$workerID	= $_POST['worker_f'];
	$month		= $_POST['datepicker1'];
	$year		= $_POST['datepicker2'];
	$datum_start 	= $year . $month . "01";
	$datum_ende	= $year . $month . "31";
        $smarty->assign('month', $month);
        $smarty->assign('year', $year);
}
else
{
        $workerID	= $_SESSION['user_id'];
	$month		= $todayMonth;
	$year		= $todayYear;	
	$datum_start 	= $year . $month . "01";
	$datum_ende     = $year . $month . "31";
        $smarty->assign('month', $todayMonth);
        $smarty->assign('year', $todayYear);
}
$pageNo = isset($_GET['page']) ? $_GET['page'] : '0';
$intCounter = 0;
$intPage = 0;
$intSet_anzahl = 0;
$smarty->assign('perID', $workerID);

$mytime = new timestamp();

                $mysql->query("SELECT * FROM synetics_city ORDER BY synetics_city_name");
                $city_result = $mysql->queryResult();
                
		$mysql->query("SELECT * FROM synetics_clients ORDER BY synetics_clients_client");
		$clients_result = $mysql->queryResult();
                
                $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$workerID' AND synetics_data_date < '$datum_ende' AND synetics_data_date > '$datum_start' ORDER BY synetics_data_date");
		$data_result = $mysql->queryResult();
                
                                
                $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$workerID' AND synetics_data_date < '$datum_ende' AND synetics_data_date > '$datum_start'");
                $data_numrows = $mysql->fetchNumRows();
                
                while($data_numrows > 0)
                {
                    if($intCounter == 0 || $intCounter % $maxShown == 0)
                    {
                        $intPage++;
                        $strLinks.="<a href='Javascript:openP($site,$intSet_anzahl)'> Seite ".$intPage."</a>&nbsp;";
                        $intSet_anzahl = $intSet_anzahl + $maxShown;
                    }
                        $intCounter++;
                        $data_numrows--;
            
                }
                $mysql->query("SELECT * FROM synetics_process");
                $process_result = $mysql->queryResult();
                while($process=mysql_fetch_array($process_result,MYSQL_ASSOC))
                {
                    $myprocess[$process['synetics_process_id']] = $process['synetics_process_name'];
                }

		
		if($_SESSION["user_rights"] > "1"){
		$smarty->assign('boolsche','true');
		
		$mysql->query("SELECT * FROM synetics_system WHERE synetics_system__ID != 1");
		$personal_result = $mysql->queryResult();
		
		 }else{
		 $smarty->assign('boolsche','false');
		 
		 $mysql->query("SELECT * FROM synetics_system WHERE synetics_system__ID = '$workerID' AND synetics_system__ID != 1");
		 $personal_result = $mysql->queryResult();
		 
                         
                

		 } 
                 
$mysql->query("SELECT * FROM synetics_settings");
$settings 	= $mysql->fetchArray();
	
$dayWorkTime	= $settings['synetics_settings_dayworktime'];
		 
		 
$i = 0;
while ($personal=mysql_fetch_array($personal_result, MYSQL_ASSOC))
					{	
					$myworkers[$personal['synetics_system__ID']] = $personal['synetics_system_name'];

						foreach($personal as $key => $value){
						$mypersonal[$i][$key] = utf8_encode($value);
						}
						$i++;

					}

		$i = 0;
		$mydata = array();
		while($data=mysql_fetch_array($data_result, MYSQL_ASSOC))
		{
		$worker = $data['synetics_data_system_id'];
		$mysql->query("SELECT * FROM synetics_system 
		WHERE synetics_system__ID = '$worker'");
		$worker_result = $mysql->fetchRow();

	 	$kunde = $data['synetics_data_client'];
		$mysql->query("SELECT * FROM synetics_clients 
		WHERE synetics_clients_clientno = '$kunde'");
		$kunde_result = $mysql->fetchRow();

		$projekt = $data['synetics_data_projects_id'];
		$mysql->query("SELECT * FROM synetics_projects 
		WHERE synetics_projects__ID = '$projekt'");
		$projekt_result = $mysql->fetchRow();
                

			
		$datum 			= $mytime->timestamp_mysql2german($data['synetics_data_date']);
		$time_hin 		= $mytime->timestamp_time2ger($data['synetics_data_outjourneyex']);
		$time_hin2 		= $mytime->timestamp_time2ger($data['synetics_data_outjourneyto']);
		$time_work 		= $mytime->timestamp_time2ger($data['synetics_data_worktimefrom']);
		$time_work2		= $mytime->timestamp_time2ger($data['synetics_data_worktimeto']);
		$time_zur 		= $mytime->timestamp_time2ger($data['synetics_data_returnjourneyex']);
		$time_zur2		= $mytime->timestamp_time2ger($data['synetics_data_returnjourneyto']);
		
				if($data['synetics_data_outjourneyex'] > $data['synetics_data_outjourneyto'])
		{
		
		$twenty = $mytime->secondsR('24:00') - $data['synetics_data_outjourneyex'];
		$two =  $data['synetics_data_outjourneyto'] - $mytime->secondsR('0:00');
		$hinfahrtzeit 	= $twenty + $two;
		}
		else{
		$hinfahrtzeit 	= $data['synetics_data_outjourneyto'] - $data['synetics_data_outjourneyex'];
		}
		
		if($data['synetics_data_returnjourneyex'] > $data['synetics_data_returnjourneyto'])
		{
		
		$twenty = $mytime->secondsR('24:00') - $data['synetics_data_returnjourneyex'];
		$two =  $data['synetics_data_returnjourneyto'] -  $mytime->secondsR('0:00');
		$zurückfahrzeit 	= $twenty + $two;
		}
		else{
		$zurückfahrzeit = $data['synetics_data_returnjourneyto'] - $data['synetics_data_returnjourneyex'];
		}
		
		if($data['synetics_data_worktimefrom'] > $data['synetics_data_worktimeto'])
		{
		
		$twenty = $mytime->secondsR('24:00') - $data['synetics_data_worktimefrom'];
		$two =  $data['synetics_data_worktimeto'] -  $mytime->secondsR('0:00');
		$arbeitszeit	= $twenty + $two;
		}
		else{
		$arbeitszeit	= $data['synetics_data_worktimeto'] - $data['synetics_data_worktimefrom'];
		}

		$fahrtzeit		= $hinfahrtzeit + $zurückfahrzeit;
		$pause			= $data['synetics_data_wtpause'] - $data['synetics_data_pause'];
		$azpause		= $arbeitszeit  - ($pause);
		$allhour				= $fahrtzeit + $arbeitszeit;
                $ustunden               =       $azpause - $dayWorkTime;
		
		$datum = $mytime->timestamp_mysql2german($data['synetics_data_date']);

						
			$mydata[$i]['synetics_system_name']		=		utf8_encode($worker_result['synetics_system_name']);
			$mydata[$i]['date']				=		$datum['date'];
			$mydata[$i]['synetics_clients_client']		=		utf8_encode($kunde_result['synetics_clients_client']);
			$mydata[$i]['synetics_projects_projectname']    =               utf8_encode($projekt_result['synetics_projects_projectname']);
			$mydata[$i]['synetics_data_city']		=		utf8_encode($data['synetics_data_city']);
			$mydata[$i]['synetics_data_ID']			=		utf8_encode($data['synetics_data_ID']);
                        $mydata[$i]['time_hin'] 			=               $time_hin['time'];
                        $mydata[$i]['time_hin2'] 			=               $time_hin2['time'];
                        $mydata[$i]['time_work'] 			=               $time_work['time'];
                        $mydata[$i]['time_work2']			=               $time_work2['time'];
                        $mydata[$i]['time_zur']                         =               $time_zur['time'];
                        $mydata[$i]['time_zur2']			=               $time_zur2['time'];
                        $mydata[$i]['fahrtzeit']			=               $fahrtzeit;
                        $mydata[$i]['pause']				=               $mytime->timersSTD($pause);
                        $mydata[$i]['azpause']				=               $mytime->timersSTD($azpause);
                        $mydata[$i]['allhour'] 				=               $mytime->timersSTD($allhour);
                        $mydata[$i]['ustunden_synetics']                =               $mytime->timersSTD($ustunden);
                        
                        
                        
                        
											
						
		$i++;
		}
        $smarty->assign('year_month', $mytime->showmonth());
        $smarty->assign('pagelink', $strLinks);
	$smarty->assign('data_lastname', $mypersonal);
	$smarty->assign('data_main', $mydata);
        $smarty->display('mobile/workflow.tpl');
        require_once './src/forms.inc.php';
        
        
?>
