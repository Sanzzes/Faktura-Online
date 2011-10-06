<?php
	require_once './config.inc.php';
	require_once './classes/dbCon.class.php';
	$name = $_POST['name'];
	
	$mysql = new DB_MySQL($host, $dbname, $user, $pw);

	$mysql->query("SELECT * from synetics_system WHERE synetics_system_username = '".$name."'");
	$l_num = $mysql->fetchNumRows();
	
	if ($l_num == 0)
	{
		echo true;
	}
	else 
	{
		echo false;
	}
?>