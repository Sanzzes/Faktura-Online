<?php
		/*
		;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
		;; Paths and Directories ;;
		;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
		*/
	
	
require_once '../config.inc.php';
require_once '../classes/dbCon.class.php';
$mysql = new DB_MySQL($host, $dbname, $user, $pw);

 if(isset($_POST['client_id'])){
 $clientID = $_POST['client_id'];
 
$mysql->query("SELECT * FROM synetics_projects 
						WHERE synetics_clients_synetics_clients_clientno = '".$clientID."' 
						ORDER by synetics_clients_synetics_clients_clientno");
$projects_results = $mysql->queryResult();

?>
				<td colspan="8">
			  <table width="100%" border="0" style="border-collapse: collapse" id="inhalte">
			  <tr bgcolor="#EECB00" align="center">
				<th ><font size="1">Projekt</th>
				<th ><font size="1">Kostensatz</th>
				<th ><font size="1">Fahrtkostensatz</th>
				<th ><font size="1">Projektleiter</th>
				<th ><font size="1">Beschreibung</th>
				<th ><font size="1">Kostenart</th>
				<th ><font size="1">Fahrtkostenart</th>
				<th ><font size="1">Funktion</th>
			</tr>
			
<?php
			while($projects=mysql_fetch_array($projects_results, MYSQL_ASSOC))
			{
		$leader = $projects['synetics_projects_projecleader'];
		$mysql->query("SELECT * FROM synetics_system 
		WHERE synetics_system__ID = '$leader'");
		$leader_result = $mysql->fetchRow();
?>
			
			<tr bgcolor="Silver" align="center">
			<td height="23" width="131"valign="top"><font size="1"><?php echo utf8_encode($projects['synetics_projects_projectname'])?></td>
			<td height="23" width="131"valign="top"><font size="1"><?php echo utf8_encode($projects['synetics_projects_cost'])?> </td>
			<td height="23" width="131"valign="top"><font size="1"><?php echo utf8_encode($projects['synetics_projects_drivecost'])?></td>
			<td height="23" width="131"valign="top"><font size="1"><?php echo utf8_encode($leader_result['synetics_system_name'])?> </td>
			<td height="23" width="132"valign="top"><font size="1"><?php echo utf8_encode($projects['synetics_projects_description'])?> </td>
<?php
				 
		if($projects['synetics_projects_costrate'] == "1"){ 
?>
			<td height="23" width="132"valign="top">Stundensatz</td>
		<?php
		}else{
		?>
			<td height="23" width="132"valign="top">Tagessatz</td>
		<?php
		 } 
		if($projects['synetics_projects_drivecostrate'] == "1"){ 
		?>
		
			<td height="23" width="132" valign="top">Pro Stunde</td>
		<?php
		}else{
		?>
			<td height="23" width="132" valign="top">Pauschal</td>
		<?php
		 } 
		 ?>
			<td height="23" width="132"valign="top">
			<a href="javascript:edit_project(<?php echo $projects['synetics_projects__ID'] ?>)" 
			 title="Projekt Editieren und Anzeigen">
			<img src="images/icon/edit.png" border="0"></a>
			<a href="javascript:del_project(<?php echo $projects['synetics_projects__ID'] ?>,'<?php echo $projects['synetics_projects_projectname']?>','<?php echo $leader_result['synetics_system_name']?>')" 
			title="Projekt Löschen">
			<img src="images/icon/del.png" border="0"></a>
		</tr>
<?php
		}
?>
	</table></td>
 <?php
 }
?>