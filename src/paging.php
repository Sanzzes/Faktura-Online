<?php

if ($_SESSION["user_rights"] > "1") {

    $pageID = (!empty($_GET['pageID'])) ? $_GET['pageID'] : 0;
    switch ($pageID) {
        case 1:

            $smarty->display('pages/clients.tpl');
            $smarty->display('pages/forms/clients.tpl');
            echo ("<title>Faktura Online 2011 - Kunden</title>");
            break;

        case 2:

            $smarty->display('pages/projects.tpl');
            $smarty->display('pages/forms/projects.tpl');
            echo ("<title>Faktura Online 2011 - Projekte</title>");
            break;

        case 3:

            $smarty->display('pages/personal.tpl');
            $smarty->display('pages/forms/personal.tpl');
            print ("<title>Faktura Online 2011 - Personal</title>");
            break;

        case 4:

            $smarty->display('pages/travelcost.tpl');
            print ("<title>Faktura Online 2011 - Reisekosten</title>");
            break;

        case 5:

            $smarty->display('pages/faktura.tpl');
            print ("<title>Faktura Online 2011 - Faktura</title>");
            break;

        case 6:

            $smarty->display('pages/timecatch.tpl');
            print("<title>Faktura Online 2011 - Zeiterfassung</title>");
            break;

        case 7:
            $smarty->display('pages/workflow.tpl');
            $smarty->display('pages/forms/workflow.tpl');
            $smarty->display('pages/forms/weekend.tpl');
            print("<title>Faktura Online 2011 - Tätigkeiten</title>");
            break;

        case 8:
            $smarty->display('pages/holiday.tpl');
            $smarty->display('pages/forms/weekend.tpl');
            print("<title>Faktura Online 2011 - Urlaubsanträge</title>");
            break;

        default:
            $smarty->display('pages/index.tpl');
            break;
    }
} else {

    $pageID = (!empty($_GET['pageID'])) ? $_GET['pageID'] : 0;
    switch ($pageID) {
        case 1:

            $smarty->display('pages/index.tpl');
            echo "<script type=\"text/javascript\">alert(\"Zugriff verweigert!\")</script>";
            echo ("<title>Faktura Online 2011 - Kunden</title>");
            break;

        case 2:

            $smarty->display('pages/index.tpl');
             echo "<script type=\"text/javascript\">alert(\"Zugriff verweigert!\")</script>";
            echo ("<title>Faktura Online 2011 - Projekte</title>");
            break;

        case 3:

            $smarty->display('pages/index.tpl');
             echo "<script type=\"text/javascript\">alert(\"Zugriff verweigert!\")</script>";
            print ("<title>Faktura Online 2011 - Personal</title>");
            break;

        case 4:

            $smarty->display('pages/index.tpl');
             echo "<script type=\"text/javascript\">alert(\"Zugriff verweigert!\")</script>";
            print ("<title>Faktura Online 2011 - Reisekosten</title>");
            break;

        case 5:
            
            $smarty->display('pages/index.tpl');
            echo "<script type=\"text/javascript\">alert(\"Zugriff verweigert!\")</script>";
            print ("<title>Faktura Online 2011 - Faktura</title>");
            break;

        case 6:

            $smarty->display('pages/timecatch.tpl');
            print("<title>Faktura Online 2011 - Zeiterfassung</title>");
            break;

        case 7:
            $smarty->display('pages/workflow.tpl');
            $smarty->display('pages/forms/workflow.tpl');
            $smarty->display('pages/forms/weekend.tpl');
            print("<title>Faktura Online 2011 - Tätigkeiten</title>");
            break;

        case 8:
            $smarty->display('pages/holiday.tpl');
            $smarty->display('pages/forms/weekend.tpl');
            print("<title>Faktura Online 2011 - Urlaubsanträge</title>");
            break;

        default:
            $smarty->display('pages/index.tpl');
            break;
    }
}
?>