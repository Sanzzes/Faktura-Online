<?php

session_start();
if (empty($_SESSION['user_username'])) {
    echo "Nicht eingeloggt kein zugriff";
} else {
    require_once '../config.inc.php';
    require_once '../classes/mysql_db.class.php';

    $funktion = $_POST["ajax"] ? : 0;
    $process = $_POST["processID"] ? : 0;
    $process_action = $_POST["process_action"] ? : 0;
    $processCName = $_POST["processCName"] ? : 0;

    $mysql = new mysql_db($g_db['host'], $g_db['database'], $g_db['user'], $g_db['pass']);

    switch ($funktion) {
        case "edit_process":

            if ($process_action == 0) {
                $l_res = $mysql->query("SELECT * FROM synetics_process WHERE synetics_process_id = $process");
                $l_resu = $mysql->fetchArray();
                $l_result = array();
                foreach ($l_resu AS $index => $value) {
                    $l_result[$index] = $value;
                }
                echo json_encode($l_result);
            } else {
                $mysql->query("UPDATE synetics_process SET synetics_process_name='$processCName' WHERE synetics_process_id = $process");
            }
            break;
        case "del_process":

            $l_res = $mysql->query("SELECT * FROM synetics_process WHERE synetics_process_id = $process");
            $l_resu = $mysql->fetchArray();
            $mysql->query("DELETE FROM synetics_process WHERE synetics_process_id = $process");
            echo $l_resu['synetics_process_name'];
            break;
    }
}
?>
