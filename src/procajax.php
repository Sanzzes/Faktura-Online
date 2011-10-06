<?php
require_once './config.inc.php';
require_once './classes/dbCon.class.php';

$mysql = new DB_MySQL($host, $dbname, $user, $pw);

		
switch($_POST["ajax"])
{
	case "get_client":
	
				$l_res = $mysql->query("SELECT * FROM synetics_clients WHERE synetics_clients_clientno = ".$_POST["clientID"]);
				$l_resu = $mysql->fetchArray();
				$l_result = array();
				foreach ($l_resu AS $index => $value)
				{
					$l_result[$index] = utf8_encode($value);
				}
				echo json_encode($l_result);
				break;
		
	case "get_project":
	
				$l_res = $mysql->query("SELECT * FROM synetics_projects WHERE synetics_projects__ID = ".$_POST["projectID"]);
				$l_resu = $mysql->fetchArray();
				$l_result = array();
				foreach ($l_resu AS $index => $value)
				{
					$l_result[$index] = utf8_encode($value);
				}
				echo json_encode($l_result);
				break;
				
	case "get_personal":
	
				$l_res = $mysql->query("SELECT * FROM synetics_system WHERE synetics_system__ID = ".$_POST["systemID"]);
				$l_resu = $mysql->fetchArray();
				$l_result = array();
				foreach ($l_resu AS $index => $value)
				{
					$l_result[$index] = utf8_encode($value);
				}
				echo json_encode($l_result);
				break;
				
	case "get_workflow":
	
				$l_res = $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_ID = ".$_POST["workflowID"]);
				$l_resu = $mysql->fetchArray();
				$format = 'H:i';
				$l_result = array();
				foreach ($l_resu AS $index => $value)
				{
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
						$l_result['synetics_data_date'] = 	date("d.m.Y", $date);
					}
					
					
				}
				echo json_encode($l_result);
				break;
				}
?>