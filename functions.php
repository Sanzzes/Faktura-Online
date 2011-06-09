<?php
/*
 * Check if pageID set else set null
 * @int
 */


$pageID =  (!empty($_GET['pageID'])) ? $_GET['pageID'] : 0;

	switch ($pageID)
	{
		case 1:
			if($_SESSION['user_rights'] > "1")
			{
			require_once './src/include/kunden.php';
			echo ("<title>Faktura Online 2011 - Kunden</title>");
			}
			else 
			{
				print("Du hast nicht genug Rechte für diese Seite");
			}
			break;
		
		case 2:
			if($_SESSION['user_rights'] > "1")
			{
			require_once './src/include/projekte.php';
			echo ("<title>Faktura Online 2011 - Projekte</title>");
			}
			else 
			{
				print("Du hast nicht genug Rechte für diese Seite");
			}
			break;
		
		case 3:
			if($_SESSION['user_rights'] > "1")
			{
				require_once './src/include/personal.php';
				print ("<title>Faktura Online 2011 - Personal</title>");
			}
			else 
			{
				print("Du hast nicht genug Rechte für diese Seite");
			}
			break;
			
		case 4:
			if($_SESSION['user_rights'] > "1")
			{
				require_once './src/include/reisekosten.php';
				print ("<title>Faktura Online 2011 - Reisekosten</title>");
			}
			else 
			{
				print("Du hast nicht genug Rechte für diese Seite");
			}
			break;
			
		case 5:
			if($_SESSION['user_rights'] > "1")
			{
				//require_once '';
				print ("<title>Faktura Online 2011 - Faktura</title>");
				require_once './src/include/faktura.php';
			}
			else 
			{
				print("Du hast nicht genug Rechte für diese Seite");
			}
			break;
			
		case 6:
			if($_SESSION['user_rights'] > "1")
			{
				require_once 'src/include/zeiterfassung.php';
				print("<title>Faktura Online 2011 - Zeiterfassung</title>");
			}
			else 
			{
				print("Du hast nicht genug Rechte für diese Seite");
			}
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
