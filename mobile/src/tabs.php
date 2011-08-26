<?php
$site = $_GET["pageID"];
switch($site){
    case 1:
        $maxShown = 3;
        $smarty->display('mobile/head.tpl');
        require_once './src/tabs/workflow.php';
        $smarty->display('mobile/footer.tpl');
        break;
    default:
        $smarty->display('mobile/head.tpl');
        $smarty->display('mobile/index.tpl');
        $smarty->display('mobile/footer.tpl');
        break;
}
?>
