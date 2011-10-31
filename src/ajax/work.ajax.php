<?php
session_start();
if (empty($_SESSION['user_username'])) {
    echo "Nicht eingeloggt kein zugriff";
} else {
    require_once '../config.inc.php';
    require_once '../classes/mysql_db.class.php';

    $func = $_POST["ajax"] ? : 0;
    $row = $_POST['row'] ? : 0;
    $dID = $_POST['dID'] ? : 0;
    $selected = $_POST['selected'] ? : 0;
    $mysql = new mysql_db($g_db['host'], $g_db['database'], $g_db['user'], $g_db['pass']);




    switch ($func) {

        case "get_travel":
            $mysql->query("SELECT * FROM synetics_data WHERE synetics_data_ID = '$dID'");
            $q_result = $mysql->fetchRow();
            $mysql->query("SELECT * FROM synetics_distribution WHERE synetics_distribution_DataID = '$dID'");
            $q_result_2 = $mysql->fetchRow();

            $result = array();
            $result['data'] = $q_result["synetics_data$row"];
            if ($q_result_2["synetics_distribution$row"] > 0)
                $result['dist'] = 1;
            else
                $result['dist'] = 2;
            echo json_encode($result);

            break;

        case "get_projekt":
            $mysql->query("SELECT * FROM synetics_projects WHERE synetics_clients_synetics_clients_clientno = '" . $dID . "' OR synetics_clients_synetics_clients_clientno = '0' ");
            $q_results = $mysql->queryResult();
            while ($proj = mysql_fetch_array($q_results, MYSQL_ASSOC)) {
                if ($proj['synetics_projects__ID'] == $selected) {
                    ?>
                    <option selected="selected" value="<?php echo $proj['synetics_projects__ID'] ?>"><?php echo $proj['synetics_projects_projectname'] ?></option>
                    </option>
                    <?php
                } else {
                    ?>
                    <option value="<?php echo $proj['synetics_projects__ID'] ?>"><?php echo $proj['synetics_projects_projectname'] ?></option>
                    <?php
                }
            }
            break;


        case "get_projekt_test":
            $mysql->query("SELECT * FROM synetics_projects WHERE synetics_clients_synetics_clients_clientno = '" . $dID . "' OR synetics_clients_synetics_clients_clientno = '0' ");
            $l_result = $mysql->queryResult();
            $l_resulArray = array();
            $i = 0;
            while ($l_resu = mysql_fetch_array($l_result, MYSQLI_ASSOC)) {
                $l_resulArray[$i]['synetics_projects__ID'] = $l_resu['synetics_projects__ID'];
                $l_resulArray[$i]['synetics_projects_projectname'] = $l_resu['synetics_projects_projectname'];
            }
            $l_jsonArray = array();
            foreach ($l_resulArray AS $index => $value) {
                $l_jsonArray[$index] = utf8_encode($value);
            }
            echo json_encode($l_jsonArray);

            break;
    }
}
?>
