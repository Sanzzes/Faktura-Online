
<?php

session_start();
if ($_SESSION["user_rights"] > "1") {
    $smarty->assign('boolsche', 'true');
} else {
    $smarty->assign('boolsche', 'false');
}
$pageID = (!empty($_GET['pageID'])) ? $_GET['pageID'] : 0;
if ($pageID > 3 && $pageID != 8) {
    $todaysDate = time();
    $todayMonth = date("m", $todaysDate);
    $todayYear = date("Y", $todaysDate);
    $processID = isset($_POST['process_id']) ? $_POST['process_id'] : '0';

    if (isset($_POST['worker_f']) && isset($_POST['datepicker1']) && isset($_POST['datepicker2'])) {
        $workerID = $_POST['worker_f'];
        $month = $_POST['datepicker1'];
        $year = $_POST['datepicker2'];
    } else {
        $workerID = $_SESSION['user_id'];
        $month = $todayMonth;
        $year = $todayYear;
    }
    $pageNo = isset($_GET['page']) ? $_GET['page'] : '0';
    if($pageID == 7){
     $system->DataTables($month, $year, $workerID, '0');   
    }
    
    
    $system->DataTables($month, $year, $workerID, $processID);
    $system->getProcess();
}
if ($pageID != 8 || $pageID == 3) {
    $system->getClients();
}
if ($pageID == 2 || $pageID == 3) {
    $system->getProjects();
}
$system->getPersonal();

if($pageID == 7){
    $system->getCity();
}

if($pageID == 8){
    $system->getHoliday();
}
?>