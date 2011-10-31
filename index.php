<?php
/*
 * Author Steven Bohm <sbohm@synetics.de>
 * Copyright 2010-2011 Synetics GmbH Düsseldorf
 */

// Session starten
session_start ();
error_reporting(E_ALL);
//Set Time to Local German Time much formats 4 various servers
setlocale(LC_ALL,"de_DE", "de_DE.UTF-8", "de_DE@euro", "de", "ge");
date_default_timezone_set('Europe/Berlin');
ini_set('dat.timezone', 'Europe/Berlin');

//Catch Mobile Phones
$android = stristr($_SERVER["HTTP_USER_AGENT"], 'Android');
$iphone = stristr($_SERVER["HTTP_USER_AGENT"], 'iPhone');

//Initialize SMARTY Library/Plugin
define('SMARTY_DIR', 'src/libs/');
require(SMARTY_DIR . 'Smarty.class.php');
	
$smarty = new Smarty();


//Set Paths and Directories for Smarty
$smarty->template_dir = "src/templates/";
$smarty->compile_dir = "src/templates_c/";
$smarty->config_dir = "src/configs/";
$smarty->cache_dir = "src/cache/";
$smarty->caching = false;

//Check if config File Exist if not go to Setup Page
//Check if Session is not Empty if empty go to Login
if(empty($_SESSION['user_username'])){
    $smarty->display('login.tpl');
    
}else{

 if(stristr($_SERVER["HTTP_USER_AGENT"], 'Android')){
    header("Location: mobile/");
}
if(stristr($_SERVER["HTTP_USER_AGENT"], 'iPhone')){
    header("Location: mobile/");
}
//Include Autloader
require_once "src/loader.php";
require_once "src/config.inc.php";

spl_autoload_register(array('Autoloader','load'));

require_once 'src/globals.inc.php';
$smarty->display('menu/menu.tpl');
require_once 'src/functions.inc.php';
require_once 'src/paging.php';
$smarty->display('footer/footer.tpl');
require_once 'src/include/admin.php';
}
?>