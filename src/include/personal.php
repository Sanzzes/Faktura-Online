<?php
$mysql = new DB_MySQL($host, $dbname, $user, $pw);
$mysql->query("SELECT * FROM synetics_system");
$personal_result = $mysql->queryResult();


if($_SESSION["user_rights"] > "1"){ 
		$smarty->assign('boolsche','true');
		 }else{
		 $smarty->assign('boolsche','false');
		 } 

		$i = 0;
	while ($personal=mysql_fetch_array($personal_result, MYSQL_ASSOC))
	{
			
			foreach($personal as $key => $value){
			$mypersonal[$i][$key] = utf8_encode($value);
			}
			$i++;
	}
if(isset($mypersonal)){
	$smarty->assign('data_people', $mypersonal);
}
else{
$smarty->assign('data_people', '0');
}
	$smarty->assign('sessionid', $_SESSION["user_id"] );
	$smarty->display('personal.tpl');
	
include 'src/forms/personal.forms.php';
?>
