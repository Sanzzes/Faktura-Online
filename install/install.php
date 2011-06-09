<?php

session_start();
define('SMARTY_DIR', '../src/libs/');
require(SMARTY_DIR . 'Smarty.class.php');

$smarty = new Smarty();

		/*
		;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
		;; Paths and Directories ;;
		;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
		*/
	
	$smarty->template_dir = 'tpl';
	$smarty->compile_dir = '../src/templates_c/';
	$smarty->config_dir = '../src/configs/';
	$smarty->cache_dir = '../src/cache/';
	$smarty->caching = false;

header('Content-type: text/html;charset=utf-8');
$iStep = isset($_GET['iStep']) ? $_GET['iStep'] : '';
$smarty->display('includes.tpl');
switch($iStep)
{
case 1:
$smarty->display('iStep1.tpl');
break;

case 2:
include_once 'iStep2.php';
break;

case 3:
$smarty->display('iStep3.tpl');
break;

case 4:
include_once 'finish.php';
break;

default:
$smarty->display('install.tpl');
break;
}
?>

