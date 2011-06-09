<?php
require_once 'config.inc.php';
require_once 'classes/dbCon.class.php';
require_once 'classes/time.class.php';

$mysql = new DB_MySQL($host, $dbname, $user, $pw);
$mytime = new timestamp();

if($_POST['userid'] != "0"){
	$userid = $_POST['userid'];
	$timeabzug	= NULL;
	$ustunden	= NULL;
	$mysql->query("SELECT * FROM synetics_settings");
	$settings 	= $mysql->fetchArray();
	
	$dayWorkTime	= $settings['synetics_settings_dayworktime'];
	
	$mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$userid'");
	$data_result_user = $mysql->queryResult();
	
	while($data_user=mysql_fetch_array($data_result_user, MYSQL_ASSOC))
	{	
	$hinfahrtzeit           = $data_user['synetics_data_outjourneyto'] - $data_user['synetics_data_outjourneyex'];
	$zurückfahrzeit         = $data_user['synetics_data_returnjourneyto'] - $data_user['synetics_data_returnjourneyex'];
	$fahrtzeit		= $hinfahrtzeit + $zurückfahrzeit;
	$arbeitszeit            = $data_user['synetics_data_worktimeto'] - $data_user['synetics_data_worktimefrom'];
	$pause			= $data_user['synetics_data_wtpause'] - $data_user['synetics_data_pause'];
	$azpause		= $arbeitszeit  - ($pause);
	$timeabzug		+= $dayWorkTime;
	$ustunden		+= $azpause;
	
	$ustunden_gesamt = $ustunden - $timeabzug;
	}
	
echo $mytime->ustunden($ustunden_gesamt) . "\nAusgehend von einem: " . $dayWorkTime/60/60 ." Std Arbeitstag
\nDabei ist die Pause bereits von der Arbeitszeit abgerechnet worden";
}

else{
	$userid = NULL;
	echo "Keine Daten vorhanden";
}
?>