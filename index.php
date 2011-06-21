<?php
// Session starten
session_start ();

//Set Time to Local German Time much formats 4 various servers
setlocale(LC_ALL,"de_DE", "de_DE.UTF-8", "de_DE@euro", "de", "ge");

//Check if config File Exist if not go to Setup Page
if(!file_exists('src/config.inc.php')){
   header("Location: install/index.php");
}
    
//Check if Session is not Empty if empty go to Login
if(empty($_SESSION['user_username'])){
 header("Location: login.html");
    
}

//Begin main coding.
//Initialize SMARTY Library/Plugin
define('SMARTY_DIR', 'src/libs/');
require(SMARTY_DIR . 'Smarty.class.php');
	
$smarty = new Smarty();


//Set Paths and Directories for Smarty
$smarty->template_dir = 'src/templates/';
$smarty->compile_dir = 'src/templates_c/';
$smarty->config_dir = 'src/configs/';
$smarty->cache_dir = 'src/cache/';
$smarty->caching = false;

//Display the main page with starting div tags
$smarty->display('index.tpl');

//require the config file with mysql connect data
require_once 'src/config.inc.php';

//define global variables
define("host", $host);
define("user", $user);
define("pass", $pw);
define("dbn", $dbname);


require_once 'src/classes/class.php';

//create class mysql from DB_MySQL
$mysql = new DB_MySQL($host, $dbname, $user, $pw);
require_once 'js.php';
require_once 'functions.php';
require_once 'admin/admincenter.php';

//display the footer that close all Div Tags
$smarty->display('footer.tpl');




?>