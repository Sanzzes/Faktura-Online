<?php
require_once './src/getpost.inc.php';
$mysql->query("SELECT * FROM synetics_system");
$personal_result = $mysql->queryResult();
$mysql->query("SELECT * FROM synetics_clients");
$clients_result = $mysql->queryResult();	

/* SAVED CODE
INNER JOIN (synetics_system  INNER JOIN synetics_projects 
ON synetics_system.synetics_system__ID = synetics_projects.synetics_projects_projecleader)
ON synetics_projects.synetics_clients_synetics_clients_clientno = synetics_clients.synetics_clients_clientno
*/



$mysql->query("SELECT * FROM synetics_projects INNER JOIN synetics_system ON synetics_system.synetics_system__ID = synetics_projects.synetics_projects_projecleader");
$projects_results = $mysql->queryResult();

if($_SESSION["user_rights"] > "1"){ 
		$smarty->assign('boolsche','true');
		 }else{
		 $smarty->assign('boolsche','false');
		 } 
		 
$i = 0;
while ($clients=mysql_fetch_array($clients_result, MYSQL_ASSOC)){
		$meinekunden[$clients['synetics_clients_clientno']] = utf8_encode($clients['synetics_clients_client']);
		
			foreach($clients as $key => $value){
			$myclients[$i][$key] = utf8_encode($value);
			}
			$i++;

}
if(isset($myclients)){
$smarty->assign('data_client', $myclients);
}
else{
$smarty->assign('data_client', '0');
}
$smarty->display('projekte.tpl');


include './src/projects.forms.php';
?>