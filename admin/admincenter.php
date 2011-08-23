<?php 
$mysql->query("SELECT * FROM synetics_system WHERE NOT synetics_system__ID = 1");
$personal_result = $mysql->queryResult();


$mysql->query("SELECT * FROM synetics_settings");
$settings = $mysql->fetchArray();

$mysql->query("SELECT * FROM synetics_process");
$process_result = $mysql->queryResult();

$dayworktime = $settings['synetics_settings_dayworktime'] / 60 / 60;
$daypause = $settings['synetics_settings_daypause'] / 60 /60;



				$mypersonal 	=	 array();
				$i	=	0;
				while ($personal=mysql_fetch_array($personal_result, MYSQL_ASSOC))
				{
				$mypersonal[$i]['synetics_system__ID']		=		$personal['synetics_system__ID'];
				$mypersonal[$i]['synetics_system_name']		=		$personal['synetics_system_name'];
				$i++;
				}
                                

                                while($process=mysql_Fetch_array($process_result, MYSQL_ASSOC))
                                {
                                  $proFirm[$process['synetics_process_id']]['processname'] = $process['synetics_process_name'];
                                  $proFirm[$process['synetics_process_id']]['processid'] = $process['synetics_process_id'];
                                }
				
				

				
				$smarty->assign('synetics_settings_kmset', $settings['synetics_settings_kmset']);
				$smarty->assign('admin_1', $mypersonal);
				$smarty->assign('dayworktime', $dayworktime);
				$smarty->assign('daypause', $daypause);
                                $smarty->assign('process', $proFirm);
				$smarty->display('admin/admincenter.tpl');
                                
?>
