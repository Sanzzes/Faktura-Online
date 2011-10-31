<?php
session_start();
if(empty($_SESSION['user_username'])){
    echo "Nicht eingeloggt kein zugriff";
    
}else{
require_once '../config.inc.php';
require_once '../classes/mysql_db.class.php';

$mysql = new mysql_db($g_db['host'], $g_db['database'], $g_db['user'], $g_db['pass']);

$l_res = $mysql->query("SELECT * FROM synetics_clients WHERE synetics_clients_clientno = " . $_POST["clientID"]);
$l_resu = $mysql->fetchArray();
$l_result = array();
foreach ($l_resu AS $index => $value) {
    $l_result[$index] = utf8_encode($value);
}
echo json_encode($l_result);
}
?>
