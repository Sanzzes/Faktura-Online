<?php    
			 if (isset($_POST['username'])){
			   $username = isset($_POST['username']) ? $_POST['username'] : '';
			   $password = isset($_POST['password']) ? $_POST['password'] : '';
			   
			   
			   $con = mysql_connect($_SESSION['host'],$_SESSION['user'],$_SESSION['pw']);
			   mysql_select_db($_SESSION['dbname'], $con);
			   $admin = mysql_query("INSERT INTO synetics_system (synetics_system_username, synetics_system_password, synetics_system_rights, synetics_system_surname)	values('$username',MD5('$password'),'2','admin' )");
			    $sqlErrorCode = mysql_errno();
				$sqlErrorText = mysql_error();
	
			   if ($sqlErrorCode == 0){
			  $smarty->assign('succes', '<tr><td><img src="success.gif"></td></tr>');
			  } else {
				  $errors = array();
			      $errors[0][errorMessage] 	= "<tr><td>Ein Fehler ist aufPOSTreten!</td></tr>";
			      $errors[0][errorNo] 			= "<tr><td>Fehlercode: $sqlErrorCode</td></tr>";
			      $errors[0][errorText]			= "<tr><td>Fehlertext: $sqlErrorText</td></tr>";
				  $smarty->assign('errors', $errors);
			   }
			   
			   
			if($sqlErrorCode == 0){
			$smarty->assign('buttons', '<a href="?iStep=4"><img border="0" src="images/next.png" width="109" height="40" align="right"></a>');
			}
			else{
			$smarty->assign('buttons', '');
			}
			$smarty->assign('errorNo', $sqlErrorCode);
			$smarty->display('finish.tpl');
			}else{
			$smarty->display('complete.tpl');
			session_unset();
			session_destroy();
			}
			?>
