<?php
// Session starten
session_start ();

if(file_exists('src/config.inc.php')){

if(isset($_SESSION['logged'])){

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
$_SESSION['host'] = $host;
$_SESSION['user'] = $user;
$_SESSION['pass'] = $pw;
$_SESSION['dbn'] = $dbname;

require_once 'src/classes/class.php';
$mysql = new DB_MySQL($host, $dbname, $user, $pw);
require_once 'js.php';
require_once 'functions.php';
require_once 'admin/admincenter.php';
$smarty->display('footer.tpl');
?>
	<?php
}
else{
	include './login.php';
}
}else{
header("Location: install/index.php");
}
?>