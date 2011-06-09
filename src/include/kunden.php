<?php
$mysql->query("SELECT * FROM synetics_clients");
$clients_result = $mysql->queryResult();


if($_SESSION["user_rights"] > "1"){ 
		$smarty->assign('boolsche','true');
		 }else{
		 $smarty->assign('boolsche','false');
		 } 
	
			$i = 0;
	while ($clients=mysql_fetch_array($clients_result, MYSQL_ASSOC))
	{
			foreach($clients as $key => $value){
			$myclients[$i][$key] = utf8_encode($value);
			}
	 $i++;

	}
	if(isset($myclients)){
	$smarty->assign('kunden', $myclients);
	}
	else{
	$smarty->assign('kunden', '0');
	}
	$smarty->display('kunden.tpl');

include 'src/forms/client.forms.php';
?>




