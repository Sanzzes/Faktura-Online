<?php
	$sqlErrorText = '';
   $sqlErrorCode = 0;
   $sqlStmt      = '';
   $sqlFileToExecute = 'sql/setup.sql';

			 if (isset($_POST['dbname'])){
			   $host = isset($_POST['hostname']) ? $_POST['hostname'] : '';
			   $user = isset($_POST['username']) ? $_POST['username'] : '';
			   $pass = isset($_POST['password']) ? $_POST['password'] : '';
			   $dbname = isset($_POST['dbname']) ? $_POST['dbname'] : '';
			   
			        
			   $con = mysql_connect($host,$user,$pass);
			   if ($con !== false){
			   $_SESSION['host']						=		$host;
			   $_SESSION['user']						=		$user;
			   $_SESSION['pw']						=		$pass;
			   $_SESSION['dbname']				=		$dbname;
				  mysql_select_db($dbname, $con);
			     // Load and explode the sql file
			     $f = fopen($sqlFileToExecute,"r+");
			     $sqlFile = fread($f,filesize($sqlFileToExecute));
			     $sqlArray = explode(';',$sqlFile);
			           
			     //Process the sql file by statements
			     foreach ($sqlArray as $stmt) {
			       if (strlen($stmt)>3){
			            $result = mysql_query($stmt);
			              if (!$result){
			                 $sqlErrorCode = mysql_errno();
			                 $sqlErrorText = mysql_error();
			                 $sqlStmt      = $stmt;
			                 break;
			              }
			           }
			      }
			   }
			   if ($sqlErrorCode == 0){
				  $config_file = fopen('../src/config.inc.php', 'w');
				  fwrite($config_file, '<?php');
				  fwrite($config_file, "\n");
				  fwrite($config_file, '//SERVER SETTINGS FOR DATABASE');
				   fwrite($config_file, "\n");
				  fwrite($config_file , '$host="'.$host.'";');
				   fwrite($config_file, "\n");
				  fwrite($config_file , '$user="'.$user.'";');
				   fwrite($config_file, "\n");
				  fwrite($config_file , '$pw="'.$pass.'";');
				   fwrite($config_file, "\n");
				  fwrite($config_file , '$dbname="'.$dbname.'";');
				   fwrite($config_file, "\n");
				  fwrite($config_file, '?>');
				  fclose($config_file);
			   } else {
				$errors = array();
			      $errors[0]['errorMessage'] 	= "<tr><td>Ein Fehler ist aufPOSTreten!</td></tr>";
			      $errors[1]['errorNr'] 			= "<tr><td>Fehlercode: $sqlErrorCode</td></tr>";
			      $errors[2]['errorText']			= "<tr><td>Fehlertext: $sqlErrorText</td></tr>";
				  $smarty->assign('errors', $errors);
			      //echo "<tr><td>Statement:<br/> $sqlStmt</td></tr>";
			   }
			  
			 }
			if($sqlErrorCode == 0){
			$smarty->assign('buttons', '<a href="?iStep=3"><img border="0" src="images/next.png" width="109" height="40" align="right"></a>');
			}
			else{
			$smarty->assign('buttons' , '<a href="?iStep=1"><img border="0" src="images/back.png" width="109" height="40" align="left"></a>');
			}
			$smarty->assign('errorNo', $sqlErrorCode);
			$smarty->display('iStep2.tpl');
			?>