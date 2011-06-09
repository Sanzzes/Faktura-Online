<?php
	class Client_Work
	extends DB_MySQL  
		{
			public function edit_client($knr, $client, $client_name, $client_surname, $street, $street_no, $zipcode, $city, $telno, $fax, $mobile, $mail)
			{
				
			$host=$this->host;
			$dbname=$this->dbname;
			$user=$this->user;
			$pw=$this->pw;
			
			$mydb = new DB_MySQL($host, $dbname, $user, $pw);
			$mydb->query("UPDATE synetics_clients set synetics_clients_clientno='$knr', synetics_clients_client='$client', synetics_clients_name='$client_name', synetics_clients_surname='$client_surname', synetics_clients_street='$street', synetics_clients_no='$street_no', synetics_clients_city='$city', synetics_clients_zipcode='$zipcode', synetics_clients_mail='$mail', synetics_clients_tel='$telno', synetics_clients_mobile='$mobile', synetics_clients_fax='$fax' WHERE synetics_clients_clientno ='$knr'");
			
  				if (mysql_affected_rows() > 0) 
  				{ 
  					
 ?>
  				<div align="center">
  					<table border="0" width="444" height="300" cellspacing="0" cellpadding="0">
						<tr>
							<td height="70" width="434" background=""></td>
						</tr>
						<tr>
							<td height="230" width="434" valign="top" align="center">
    						<?php echo "<p align='center'>Der Kunde wurde erfolgreich editiert.</p><br>\n";
							echo '<a href="?pageID=1">Zurück</a>'; 
							echo '<meta http-equiv="refresh" content="3; URL=index.php?pageID=1">';?>
							<p align="center"></td>
						</tr>
					</table>
				</div>
<?php
 				} 
  				else 
  				{  					
 ?>
    			<div align="center">
  					<table border="0" width="444" height="300" cellspacing="0" cellpadding="0">
						<tr>
							<td height="70" width="434" background=""></td>
						</tr>
						<tr>
							<td height="230" width="434" valign="top" align="center">
    						<?php 
    						echo "<p align='center'>Fehler - Die kundendaten konnten nicht geändert werden.</p><br>\n";
							echo '<a href="?pageID=1">Zurück</a>'; 
							echo '<meta http-equiv="refresh" content="3; URL=index.php?pageID=1">';
							?>
				<p align="center"></td>
						</tr>
					</table>
				</div>
<?php				
				}
				
			}
			public function del_client($knr)
			{
				
			$host=$this->host;
			$dbname=$this->dbname;
			$user=$this->user;
			$pw=$this->pw;
			
			$mydb = new DB_MySQL($host, $dbname, $user, $pw);
			$mydb->query("DELETE FROM synetics_clients WHERE synetics_clients_clientno = '$knr'");
			
  				if (mysql_affected_rows() > 0) 
  				{ 
 ?>
  				<div align="center">
  					<table border="0" width="444" height="300" cellspacing="0" cellpadding="0">
						<tr>
							<td height="70" width="434" background=""></td>
						</tr>
						<tr>
							<td height="230" width="434" valign="top" align="center">
							<?php 
    						echo "<p align='center'>Der Kunde wurde erfolgreich gelöscht.</p><br>\n";
							echo '<a href="?pageID=1">Zurück</a>'; 
							echo '<meta http-equiv="refresh" content="3; URL=index.php?pageID=1">';
							?>
				<p align="center"></td>
						</tr>
					</table>
				</div>
<?php
 				 } 
  				else 
  				{ 
 ?>
    			<div align="center">
  					<table border="0" width="444" height="300" cellspacing="0" cellpadding="0">
						<tr>
							<td height="70" width="434" background=""></td>
						</tr>
						<tr>
							<td height="230" width="434" valign="top" align="center">
   							 <?php 
    						echo "<p align='center'>Fehler - Der Kunde konnte nicht gelöscht werden.</p><br>\n";
							echo '<a href="?pageID=1">Zurück</a>'; 
							echo '<meta http-equiv="refresh" content="3; URL=index.php?pageID=1">';
							?>
			<p align="center"></td>
						</tr>
					</table>
				</div>
<?php
				}
			}
			public function new_client($knr, $client, $client_name, $client_surname, $street, $street_no, $zipcode, $city, $telno, $fax, $mobile, $mail)
			{
			$host=$this->host;
			$dbname=$this->dbname;
			$user=$this->user;
			$pw=$this->pw;
			
			$mydb = new DB_MySQL($host, $dbname, $user, $pw);
				$mydb->query("INSERT INTO synetics_clients (synetics_clients_clientno, synetics_clients_client, synetics_clients_name, synetics_clients_surname, synetics_clients_street, synetics_clients_no, synetics_clients_city, synetics_clients_zipcode, synetics_clients_mail, synetics_clients_tel, synetics_clients_mobile, synetics_clients_fax) 
				VALUES ('$knr', '$client', '$client_name', '$client_surname', '$street', '$street_no', '$city', '$zipcode', '$mail', '$telno', '$mobile', '$fax')");

  				if (mysql_affected_rows() > 0) 
  				{ 
?>
  				<div align="center">
  					<table border="0" width="444" height="300" cellspacing="0" cellpadding="0">
						<tr>
							<td height="70" width="434" background=""></td>
						</tr>
						<tr>
						<td height="230" width="434" valign="top" align="center">
							<?php 
							echo "<p align='center'>Der Kunde wurde erfolgreich angelegt.</p><br>\n";
							echo '<a href="?pageID=1">Zurück</a>'; 
							echo '<meta http-equiv="refresh" content="3; URL=index.php?pageID=1">';
							?>
							<p align="center"></td>
						</tr>
					</table>
				</div>
<?php
 				} 
 				 else 
  				{ 
 ?>
    			<div align="center">
  					<table border="0" width="444" height="300" cellspacing="0" cellpadding="0">
						<tr>
							<td height="70" width="434" background="images/screen.png"></td>
						</tr>
						<tr>
							<td height="230" width="434" valign="top" align="center">
    						<?php 
    						echo "<p align='center'>Fehler - Der Kunde konnte nicht angelegt werden.</p>br>\n";
							echo '<a href="pageID=1">Zurück</a>'; 
							echo '<meta http-equiv="refresh" content="3; URL=index.php?pageID=1">';?>
							<p align="center"></td>
						</tr>
					</table>
				</div>
<?php
  				}
			}
		}
?>