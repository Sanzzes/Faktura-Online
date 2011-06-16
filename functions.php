<?php
if(!isset($year) || empty($year)) {
  $year = date('Y');
}
$tag = new holiday_calc();

          
                   

$smarty->assign('user_name', $_SESSION['user_username']);
$smarty->assign('user_rights', $_SESSION['user_rights']);
$smarty->assign('user_vor', $_SESSION['user_surname']);
$smarty->assign('user_nach', $_SESSION['user_name']);
$smarty->assign('osternso', date("d.F",easter_date($year)));
$smarty->assign('yearnow', $year);
$smarty->assign('days',$tag->getHolidays($year));

if($_SESSION["user_rights"] > "1"){
    
    $pageID =  (!empty($_GET['pageID'])) ? $_GET['pageID'] : 0;
    
}
else{
    $pageID=7;
    echo '<script type="text/javascript">';
    echo 'window.history.replaceState("Tätigkeiten", "Faktura Online 2011 - Tätigkeiten","./index.php?pageID=7")';
    echo '</script>';
}

	switch ($pageID)
	{
		case 1:
                    
			require_once './src/include/kunden.php';
			echo ("<title>Faktura Online 2011 - Kunden</title>");
			break;
		
		case 2:

			require_once './src/include/projekte.php';
			echo ("<title>Faktura Online 2011 - Projekte</title>");
			break;
		
		case 3:

			require_once './src/include/personal.php';
			print ("<title>Faktura Online 2011 - Personal</title>");
			break;
			
		case 4:

			require_once './src/include/reisekosten.php';
			print ("<title>Faktura Online 2011 - Reisekosten</title>");
			break;
			
		case 5:

			print ("<title>Faktura Online 2011 - Faktura</title>");
			require_once './src/include/faktura.php';
			break;
			
		case 6:

			require_once 'src/include/zeiterfassung.php';
			print("<title>Faktura Online 2011 - Zeiterfassung</title>");
			break;
			
		case 7:
			require_once 'src/include/teatigkeiten.php';
			print("<title>Faktura Online 2011 - Tätigkeiten</title>");
			break;
			
		default:
			$smarty->display('start.tpl');
	break;			
	}
?>
