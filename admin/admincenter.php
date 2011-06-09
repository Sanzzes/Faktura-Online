<?php 
$mysql->query("SELECT * FROM synetics_system WHERE NOT synetics_system__ID = 1");
$personal_result = $mysql->queryResult();


$mysql->query("SELECT * FROM synetics_settings");
$settings = $mysql->fetchArray();

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
				
				

				
				$smarty->assign('synetics_settings_kmset', $settings['synetics_settings_kmset']);
				$smarty->assign('admin_1', $mypersonal);
				$smarty->assign('dayworktime', $dayworktime);
				$smarty->assign('daypause', $daypause);
				$smarty->display('admin/admincenter.tpl');
                                
?>
