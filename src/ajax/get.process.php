<?php
require_once '../config.inc.php';
require_once '../classes/mysql_db.class.php';

$mysql = new mysql_db($g_db['host'], $g_db['database'], $g_db['user'], $g_db['pass']);

$func = $_POST["ajax"] ? : 0;
switch ($func) {

    case "process":
        $mysql->query("SELECT * FROM synetics_process");
        $process_results = $mysql->queryResult();
        while ($process = mysql_fetch_array($process_results, MYSQL_ASSOC)) {
            echo '<option value="'.$process['synetics_process_id'].'">'.$process['synetics_process_name'].'</option>">';
            }
            break;
    }
    ?>
