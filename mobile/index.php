<?php
session_start();
//Initialize SMARTY Library/Plugin
define('SMARTY_DIR', '../src/libs/');
require(SMARTY_DIR . 'Smarty.class.php');
	
$smarty = new Smarty();
//Set Paths and Directories for Smarty
$smarty->template_dir = '../src/templates/';
$smarty->compile_dir = '../src/templates_c/';
$smarty->config_dir = '../src/configs/';
$smarty->cache_dir = '../src/cache/';
$smarty->caching = false;

require_once '../src/classes/class.php';
require_once '../src/config.inc.php';
require_once 'js.php';
require_once './src/functions.inc.php';
require_once './src/globals.inc.php';

//Display the main page with starting div tags

if(empty($_SESSION['user_username'])){
 $smarty->display('mobile/login.tpl');   
}
else{
require_once './src/tabs.php';
}




?>
