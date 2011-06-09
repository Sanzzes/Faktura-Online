<?php
require_once '../config.inc.php';
require_once '../classes/dbCon.class.php';

$func		= $_POST["ajax"] ?: 0;
$row 		= $_POST['row'] ?:  0;
$dID 		= $_POST['dID'] ?:  0;
$selected 	= $_POST['selected'] ?:  0;
$mysql = new DB_MySQL($host, $dbname, $user, $pw);



	
switch($func)
{

	case "get_travel":
		$mysql->query("SELECT * FROM synetics_data WHERE synetics_data_ID = '$dID'");
		$q_result  = $mysql->fetchArray();
	break;
	
	case "get_projekt":
		?>
		<option selected value="0">Bitte wählen</option>
		<?php
		$mysql->query("SELECT * FROM synetics_projects WHERE synetics_clients_synetics_clients_clientno = '".$dID."' OR synetics_clients_synetics_clients_clientno = '0' ");
		$q_results  = $mysql->queryResult();
		while ($proj=mysql_fetch_array($q_results, MYSQL_ASSOC))
						{	
			if($proj['synetics_projects__ID'] == $selected){
			?>
			<option selected value="<?php echo $proj['synetics_projects__ID'] ?>"><?php echo $proj['synetics_projects_projectname']?>
			</option>
			<?php
			}
			else{
			?>
			<option value="<?php echo $proj['synetics_projects__ID'] ?>"><?php echo $proj['synetics_projects_projectname']?>
			<?php
			}
			
						}	
	break;
	
}


echo $q_result[$row];

?>
