<?php
if(isset($_POST['worker_f']))
{
	$workerID	= $_POST['worker_f'];
}
else
{
	$workerID	= "0";	
}
$pageNo = isset($_POST['page']) ? $_POST['page'] : '0';
$intCounter = 0;
$intPage = 0;
$intSet_anzahl = 0;

$mytime = new timestamp();
$sessionid = $_SESSION['user_id'];
	
		$mysql->query("SELECT * FROM synetics_clients ORDER BY synetics_clients_client");
		$clients_result = $mysql->queryResult();

		
		if($_SESSION["user_rights"] > "1"){
		$smarty->assign('boolsche','true');
		
		$mysql->query("SELECT * FROM synetics_system WHERE NOT synetics_system__ID = 1 ORDER BY synetics_system_name ");
		$personal_result = $mysql->queryResult();
		
		$mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$workerID' ORDER BY synetics_data_date LIMIT $pageNo,$maxShown");
		$data_result = $mysql->queryResult();
                
                $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$workerID'");
                $data_numrows = $mysql->fetchNumRows();
                
                while($data_numrows > 0)
                {
                    if($intCounter == 0 || $intCounter % $maxShown == 0)
                    {
                        $intPage++;
                        $strLinks.="<a href='Javascript:openP($workerID,$pageID,$intSet_anzahl)'> Seite ".$intPage."</a>&nbsp;";
                        $intSet_anzahl = $intSet_anzahl + $maxShown;
                    }
                        $intCounter++;
                        $data_numrows--;
            
                }
		
		 }else{
		 $smarty->assign('boolsche','false');
		 
		 $mysql->query("SELECT * FROM synetics_system WHERE synetics_system__ID = '$sessionid' AND synetics_system__ID != 1");
		 $personal_result = $mysql->queryResult();
		 
		 $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$sessionid' ORDER BY synetics_data_date LIMIT $pageNo,$maxShown ");
		$data_result = $mysql->queryResult();
                
                $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_system_id = '$sessionid'");
                $data_numrows = $mysql->fetchNumRows();
                
                while($data_numrows > 0)
                {
                    if($intCounter == 0 || $intCounter % $maxShown == 0)
                    {
                        $intPage++;
                        $strLinks.="<a href='?pageID=7&page=$intSet_anzahl'> Seite ".$intPage."</a>&nbsp;";
                        $intSet_anzahl = $intSet_anzahl + $maxShown;
                    }
                        $intCounter++;
                        $data_numrows--;
            
                }
                
                $workerID = $sessionid;

		 } 
		 
		 
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
		
		$datum = $mytime->timestamp_mysql2german($data['synetics_data_date']);

						
			$mydata[$i]['synetics_system_name']		=		utf8_encode($worker_result['synetics_system_name']);
			$mydata[$i]['date']									=		$datum['date'];
			$mydata[$i]['synetics_clients_client']		=		utf8_encode($kunde_result['synetics_clients_client']);
			$mydata[$i]['synetics_projects_projectname'] =	utf8_encode($projekt_result['synetics_projects_projectname']);
			$mydata[$i]['synetics_data_city']				=		utf8_encode($data['synetics_data_city']);
			$mydata[$i]['synetics_data_ID']				=		utf8_encode($data['synetics_data_ID']);
											
						
		$i++;
		}
        
                
	$smarty->assign('workerID', $workerID);
        $smarty->assign('pagelink', $strLinks);
	$smarty->assign('data_lastname', $mypersonal);
	$smarty->assign('data_main', $mydata);
	$smarty->display('workflow.tpl');
	include 'src/tat.forms.php';
?>