<?php
require_once 'config.inc.php';
require_once 'classes/dbCon.class.php';
require_once 'classes/time.class.php';

$mysql = new DB_MySQL($host, $dbname, $user, $pw);
$mytime = new timestamp();
$mysql->query("SELECT * FROM synetics_settings");
$settings 	= $mysql->fetchArray();
	
$dayWorkTime	= $settings['synetics_settings_dayworktime'];

 switch($_POST['ajax']){
    
     case "get_ustunden_all":

if($_POST['userid'] != "0"){
	$userid = $_POST['userid'];
        
         
	
	$mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$userid'");
	$data_result_user = $mysql->queryResult();
        $overhours = array();
        $ustunden = 0;
	while($data_user=mysql_fetch_array($data_result_user, MYSQL_ASSOC))
	{
        $hinfahrtzeit           = $data_user['synetics_data_outjourneyto'] - $data_user['synetics_data_outjourneyex'];
	$zurückfahrzeit         = $data_user['synetics_data_returnjourneyto'] - $data_user['synetics_data_returnjourneyex'];
	$arbeitszeit            = $data_user['synetics_data_worktimeto'] - $data_user['synetics_data_worktimefrom'];
	$pause                  = $data_user['synetics_data_wtpause'] - $data_user['synetics_data_pause'];
        $fahrtzeit		= $hinfahrtzeit + $zurückfahrzeit;
	$overhours[$data_user['synetics_data_date']]    += $arbeitszeit  - ($pause);
	}
        
        foreach($overhours as $overhour) {
            $ustunden += $overhour - $dayWorkTime;
        }
        
	
echo $mytime->ustunden($ustunden) . " Gesamt\nAusgehend von einem: " . $dayWorkTime/60/60 ." Std Arbeitstag
\nDabei ist die Pause bereits von der Arbeitszeit abgerechnet worden";
}

else{
	$userid = NULL;
	echo "Keine Daten vorhanden";
}
break;

 case "get_ustunden_month":
    
 if($_POST['userid'] != "0"){
	$userid = $_POST['userid'];
	$timeabzug	= NULL;
	$ustunden	= NULL;
        $month          = $_POST['thismonth'];
        $year           = $_POST['thisyear'];
        $datum_start 	= $year . $month . "01";
	$datum_ende	= $year . $month . "31";
         
	
	$mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$userid' AND synetics_data_date < '$datum_ende' AND synetics_data_date > '$datum_start'");
	$data_result_user = $mysql->queryResult();
	$monthhours = array();
        $ustunden = 0;
	while($data_user=mysql_fetch_array($data_result_user, MYSQL_ASSOC))
	{	
	$hinfahrtzeit           = $data_user['synetics_data_outjourneyto'] - $data_user['synetics_data_outjourneyex'];
	$zurückfahrzeit         = $data_user['synetics_data_returnjourneyto'] - $data_user['synetics_data_returnjourneyex'];
	$fahrtzeit		= $hinfahrtzeit + $zurückfahrzeit;
	$arbeitszeit            = $data_user['synetics_data_worktimeto'] - $data_user['synetics_data_worktimefrom'];
	$pause			= $data_user['synetics_data_wtpause'] - $data_user['synetics_data_pause'];
        $monthhours[$data_user['synetics_data_date']]    += $arbeitszeit  - ($pause);
	}
        
        foreach($monthhours as $monthhour) {
            $ustunden += $monthhour - $dayWorkTime;
        }
	
echo $mytime->ustunden($ustunden);
}

else{
	$userid = NULL;
	echo "Keine Daten vorhanden";
}
        break;
        case "get_stunden_process":

if($_POST['userid'] != "0"){
	$userid = $_POST['userid'];
        $month          = $_POST['thismonth'];
        $year           = $_POST['thisyear'];
        $process        = $_POST['thisprocess'];
        $datum_start 	= $year . $month . "01";
	$datum_ende	= $year . $month . "31";
        
         
	
	if($process != 0)
        {
            $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$userid' AND synetics_data_date < '$datum_ende' AND synetics_data_date > '$datum_start' AND synetics_data_process_id = '$process'");
        }
        else
        {
            $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$userid' AND synetics_data_date < '$datum_ende' AND synetics_data_date > '$datum_start'");
        }
	$data_result_user = $mysql->queryResult();
        $mysql->query("SELECT * FROM synetics_process WHERE synetics_process_id = '$process'");
        $process_name = $mysql->fetchArray();
        $overhours = array();
        $ustunden = 0;
	while($data_user=mysql_fetch_array($data_result_user, MYSQL_ASSOC))
	{
        $hinfahrtzeit           = $data_user['synetics_data_outjourneyto'] - $data_user['synetics_data_outjourneyex'];
	$zurückfahrzeit         = $data_user['synetics_data_returnjourneyto'] - $data_user['synetics_data_returnjourneyex'];
	$arbeitszeit            = $data_user['synetics_data_worktimeto'] - $data_user['synetics_data_worktimefrom'];
	$pause                  = $data_user['synetics_data_wtpause'] - $data_user['synetics_data_pause'];
        $fahrtzeit		= $hinfahrtzeit + $zurückfahrzeit;
	$overhours[$data_user['synetics_data_date']]    += $arbeitszeit  - ($pause);
	}
        
        foreach($overhours as $overhour) {
            $ustunden += $overhour;
        }
if($process !=0)
{
    $processname =  $process_name['synetics_process_name'];
}   
else
{
    $processname = "alle";
}
echo $mytime->ustunden($ustunden) ."für <b><font color='red'>". $processname . "</font></b> gearbeitet diesen Monat";
}

else{
	$userid = NULL;
	echo "Keine Daten vorhanden";
}
break;
 }
?>