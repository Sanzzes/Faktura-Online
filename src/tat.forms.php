<div id="tat_form" title="Tätigkeitenverwaltung" style="display:none">
<SCRIPT>$(function() {
	$( "#datepicker" ).datepicker({ dateFormat: 'dd.mm.yy' });
});
</SCRIPT>
<?php
$todaysDate = time();
$today 		= date("d.m.Y", $todaysDate);
?>
<form method="POST" action="./src/tat_save.inc.php" id="tat_form1">
		<legend>
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td >
			<p align="left">Stammdaten</p>
		</legend>
			<fieldset style="padding: 2; width:785px; height:103px">
			<p align="left">
			Mitarbeiter
			<select size="1" name="worker" id="worker">
			<option selected value="0">Bitte wählen</option>
			<?php foreach ($myworkers AS $worker_id => $worker_name)
					{				
			?>
					<option value="<?php echo $worker_id; ?>">
					<?php echo $worker_name?>
					</option>
			<?php
					}
	
			?>
			</select>*</p>
			<p align="left">
			Datum:<input type="text" name="datepicker" id="datepicker" size="20" value="<?php echo $today ?>">*</p>
			</fieldset><p align="left">			<legend>
			<p align="left">Allgemeine Information</p>
					<p align="left">
			</legend></p>
			<p align="left"></p>
			<fieldset style="padding: 2; width:785px; height:388px">
			<p align="left">
			Kunde<select size="1" name="client" id="client">
			<option selected value="0">Bitte wählen</option>
			<?php while ($clients=mysql_fetch_array($clients_result, MYSQL_ASSOC))
					{			
					 $workplace[$clients['synetics_clients_city']] = $clients['synetics_clients_city'];	
			?>
					<option value="<?php echo $clients['synetics_clients_clientno'] ?>">
					<?php echo utf8_encode($clients['synetics_clients_client'])?>
					</option>
			<?php
					}
	
			?>
			</select><p align="left">
			Einsatzort<select size="1" name="workplace" id="workplace">
			<option selected value="0">Bitte wählen</option>

			<?php foreach ($workplace AS $workplace_1 => $workplace_2)
					{				
			?>
					<option value="<?php echo utf8_encode($workplace_1)?>">
					<?php echo utf8_encode($workplace_2)?>
					</option>
			<?php
					}
	
			?>

			</select>*</p>
			<p align="left">Projekt<select size="1" name="project" id="project">
			
			</select></p>
			<p align="left">Verpflegungspauschale
			<input type="radio" value="1"  name="foodoverall">Ja
			<input type="radio" checked name="foodoverall" value="0">Nein</p>
			<div id=zeiten">
			<p align="left"><b>Zeiten:</b></p>
			<p align="left">Hinfahrt von:&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="text" name="hinfahrt_1" id="hinfahrt_1" size="20">bis<input type="text" name="hinfahrt_2" id="hinfahrt_2"size="20"></p>
			<p align="left">Einsatzzeit von&nbsp;
			<input type="text" name="zeit_1" id="zeit_1" size="20">bis<input type="text" name="zeit_2" id="zeit_2" size="20">*</p>
			<p align="left">Pause von&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="text" name="pause_1" id="pause_1" size="20">bis<input type="text" name="pause_2" id="pause_2" size="20">*</p>
			<p align="left">Rückfahrt von&nbsp;&nbsp;&nbsp;
			<input type="text" name="rueckfahrt_1" id="rueckfahrt_1" size="20">bis<input type="text" name="rueckfahrt_2" id="rueckfahrt_2" size="20"></p>
			</div>
			</fieldset><p align="left">Reisekosten</legend></p>
			<p align="left"></p>
			<fieldset style="padding: 2; width:781px; height:541px">
			<p align="left">
			Kilometer gefahren<input type="text" name="kilometer" id="kilometer" size="9">km<p align="left">
			mit 
			<select size="1" name="wagen" id="wagen">
			<option value="1">Firmenwagen</option>
			<option value="2">Mietwagen</option>
			<option value="3">Privatwagen</option>
			<option value="4">Sonstiges</option>
			</select>
			</p>
			<p align="left">
			Hotel mit Frühstück
			<select size="1" name="hotelgarni" id="hotelgarni">
			<option value="1">Nein</option>
			<option value="2">Ja</option>
			</select>
			</p>
			<p align="left">
			<b>Art:  /   Summe Euro:</b></p>
			<p align="left">
			<select size="1" name="art_1_1" id="art_1_1">
			<option selected value="synetics_data_train">Bahn</option>
			<option value="synetics_data_oil">Benzin</option>
			<option value="synetics_data_airfare">Flug</option>
			<option value="synetics_data_freight">Fracht</option>
			<option value="synetics_data_hotel">Hotel</option>
			<option value="synetics_data_rentalcar">Mietwagen</option>
			<option value="synetics_data_parking">Parken</option>
			<option value="synetics_data_citytrain">City-Bahn</option>
			<option value="synetics_data_taxi">Taxi</option>
			<option value="synetics_data_hospitality">Bewirtung</option>
			</select>
			<input type="text" name="art_1_2" id="art_1_2" size="9" value="">
			</p>
			<p align="left">
			<select size="1" name="art_2_1" id="art_2_1">
			<option value="synetics_data_train">Bahn</option>
			<option selected value="synetics_data_oil">Benzin</option>
			<option value="synetics_data_airfare">Flug</option>
			<option value="synetics_data_freight">Fracht</option>
			<option value="synetics_data_hotel">Hotel</option>
			<option value="synetics_data_rentalcar">Mietwagen</option>
			<option value="synetics_data_parking">Parken</option>
			<option value="synetics_data_citytrain">City-Bahn</option>
			<option value="synetics_data_taxi">Taxi</option>
			<option value="synetics_data_hospitality">Bewirtung</option>
			</select>
			<input type="text" name="art_2_2" id="art_2_2" size="9">
			</p>
			<p align="left">
			<select size="1" name="art_3_1" id="art_3_1">
			<option value="synetics_data_train">Bahn</option>
			<option value="synetics_data_oil">Benzin</option>
			<option selected value="synetics_data_airfare">Flug</option>
			<option value="synetics_data_freight">Fracht</option>
			<option value="synetics_data_hotel">Hotel</option>
			<option value="synetics_data_rentalcar">Mietwagen</option>
			<option value="synetics_data_parking">Parken</option>
			<option value="synetics_data_citytrain">City-Bahn</option>
			<option value="synetics_data_taxi">Taxi</option>
			<option value="synetics_data_hospitality">Bewirtung</option>
			</select>
			<input type="text" name="art_3_2" id="art_3_2" size="9">
			</p>
			<p align="left"><b>Rechnungstext</b></p>
			<p align="left"><textarea rows="8" name="rechnungstext" cols="53"></textarea></p>
			</fieldset><p align="left"></p>
			<p align="left"></p></td>
				</tr>
			</table>
			<p></p>
			<p></p>			
			<p></p>
			<p></p>
			<p align="left">
			
			<input type="submit" value="Anlegen" name="tat_submit" id="tat_submit">
			<input type="hidden" name="workAction" id="workAction" size="20">
			<input type="hidden" name="workflow_ID" id="workflow_ID" size="20">
			<br>* Pflichtfelder<br>
			</p>
		</form>
</div>