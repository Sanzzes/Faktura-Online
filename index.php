<?php
// Session starten
session_start ();
setlocale(LC_ALL,"de_DE", "de_DE.UTF-8", "de_DE@euro", "de", "ge");

if(!file_exists('src/config.inc.php')){
   header("Location: install/index.php");
}
    
    

if(empty($_SESSION['user_username'])){
 header("Location: login.html");
    
}

define('SMARTY_DIR', 'src/libs/');
require(SMARTY_DIR . 'Smarty.class.php');
	
$smarty = new Smarty();

		/*
		;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
		;; Paths and Directories ;;
		;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
		*/
	
	$smarty->template_dir = 'src/templates/';
	$smarty->compile_dir = 'src/templates_c/';
	$smarty->config_dir = 'src/configs/';
	$smarty->cache_dir = 'src/cache/';
	$smarty->caching = false;

	
$smarty->display('index.tpl');
require_once 'src/config.inc.php';

define("host", $host);
define("user", $user);
define("pass", $pw);
define("dbn", $dbname);

require_once 'src/classes/class.php';
$mysql = new DB_MySQL($host, $dbname, $user, $pw);
require_once 'js.php';
require_once 'functions.php';
require_once 'admin/admincenter.php';
$smarty->display('footer.tpl');




?>