<?php 
$mysql->query("SELECT * FROM synetics_system WHERE NOT synetics_system__ID = 1");
$personal_result = $mysql->queryResult();


$mysql->query("SELECT * FROM synetics_settings");
$settings = $mysql->fetchArray();

$mysql->query("SELECT * FROM synetics_clients");
$clients_result = $mysql->queryResult();

$mysql->query("SELECT * FROM synetics_process");
$process_result = $mysql->queryResult();

$dayworktime = $settings['synetics_settings_dayworktime'] / 60 / 60;
$daypause = $settings['synetics_settings_daypause'] / 60 /60;



				$mypersonal 	=	 array();
				$i	=	0;
				while ($personal=mysql_fetch_array($personal_result, MYSQL_ASSOC))
				{
				$mypersonal[$i]['synetics_system__ID']		=		$personal['synetics_system__ID'];
				$mypersonal[$i]['synetics_system_name']		= utf8_encode($personal['synetics_system_name']);
				$i++;
				}
                                

                                while($process=mysql_Fetch_array($process_result, MYSQL_ASSOC))
                                {
                                  $proFirm[$process['synetics_process_id']]['processname'] = $process['synetics_process_name'];
                                  $proFirm[$process['synetics_process_id']]['processid'] = $process['synetics_process_id'];
                                }
                                
                                $i = 0;
                                while($clients=  mysql_fetch_array($clients_result,MYSQL_ASSOC)){
                                    $myclients[$i]['clientname']        = $clients['synetics_clients_client'];
                                    $myclients[$i]['clientid']          = $clients['synetics_clients_id'];
                                $i++;
                                }
				
				

				
				$smarty->assign('settings', $settings);
                                $smarty->assign('clients', $myclients);
				$smarty->assign('admin_1', $mypersonal);
				$smarty->assign('dayworktime', $dayworktime);
				$smarty->assign('daypause', $daypause);
                                $smarty->assign('process', $proFirm);
				$smarty->display('pages/admin.tpl');
                                
?>
