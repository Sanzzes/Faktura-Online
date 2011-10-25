<?php
$mysql = new mysql_db($g_db['host'], $g_db['database'], $g_db['user'], $g_db['pass']);
$system = new system();
$time = new timestamp();
$tag = new holiday_calc();

$year = date("Y");

$smarty->assign('user_name', $_SESSION['user_username']);
$smarty->assign('user_rights', $_SESSION['user_rights']);
$smarty->assign('user_vor', $_SESSION['user_surname']);
$smarty->assign('user_nach', $_SESSION['user_name']);
$smarty->assign('osternso', date("d.F", easter_date($year)));
$smarty->assign('yearnow', $year);
$smarty->assign('days', $tag->getHolidays($year));
?>
