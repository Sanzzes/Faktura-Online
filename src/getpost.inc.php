	<?php
	
	//Prüfen ob Kundenummer gesetzt ist damit Daten verarbeitet werden können
	if(isset($_POST['clientno']))
	{
	$knr = $_POST['clientno'];
	$client = $_POST['client'];
	$client_name = $_POST['name'];
	$client_surname = $_POST['surname'];
	$street = $_POST['street'];
	$street_no = $_POST['streetno'];
	$zipcode = $_POST['zipcode'];
	$city = $_POST['city'];
	$telno = $_POST['tele'];
	$fax = $_POST['fax'];
	$mobile = $_POST['mobile'];
	$mail = $_POST['mail'];
	}
	?>