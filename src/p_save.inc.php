<?php
//File includes
require_once './config.inc.php';
require_once './classes/class.php';

//Erstelle mydb Klasse
$mydb = new DB_MySQL($host, $dbname, $user, $pw);

//Formular Daten abfangen per $_POST
$projectname		=	utf8_decode($_POST['projectname']);
$drivecost_rate		= 	$_POST['drivecost_rate'];
$drivecost			=	$_POST['drivecost'];
$client				=	$_POST['client'];
$projectlead		=	utf8_decode($_POST['projectlead']);
$clientcontact		=	utf8_decode($_POST['clientcontact']);
$cost_rate			=	$_POST['cost_rate'];
$cost				=	$_POST['cost'];
$description		=	utf8_decode($_POST['description']);
$projectID			=	$_POST['projectID'];
$pAction			= 	$_POST['pAction'];

		//Auswählen ob Neuer- Aktualisiere- oder  Lösche Datensatz
		if($pAction == 1)
		{
		$mydb->query("INSERT INTO synetics_projects (synetics_projects_projectname, 
			synetics_projects_cost, synetics_projects_drivecost,
			synetics_clients_synetics_clients_clientno, 
			synetics_projects_contactpersonclient, synetics_projects_projecleader,
			synetics_projects_description, synetics_projects_drivecostrate, 
			synetics_projects_costrate) 
			VALUES('$projectname','$cost','$drivecost','$client','$clientcontact',
			'$projectlead','$description','$drivecost_rate','$cost_rate')");
		}
		elseif($pAction == 2)
		{	
			$mydb->query("UPDATE synetics_projects SET synetics_projects_projectname='$projectname', 
			synetics_projects_cost='$cost', synetics_projects_drivecost='$drivecost',
			synetics_clients_synetics_clients_clientno = '$client', 
			synetics_projects_contactpersonclient='$clientcontact', synetics_projects_projecleader='$projectlead',
			synetics_projects_description='$description', synetics_projects_drivecostrate='$drivecost_rate', 
			synetics_projects_costrate='$cost_rate' WHERE synetics_projects__ID ='$projectID'");
		}
		else
		{
			$mydb->query("DELETE FROM synetics_projects WHERE synetics_projects__ID ='$projectID'");
	
		}

?>