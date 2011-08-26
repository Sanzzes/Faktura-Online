<div data-role="page" id="add">
<SCRIPT>$(function() {
	$( "#datepicker" ).datepicker({ dateFormat: 'dd.mm.yy' });
});
</SCRIPT>
    <div data-role="header" data-theme="e">
        <h1>Tätigkeit - Neu Anlegen</h1>
        <a href="#home" data-icon="delete">Abbrechen</a>
    </div>
    <div data-role="content">
<?php
$todaysDate = time();
$today 		= date("d.m.Y", $todaysDate);
?>
<form method="POST" action="../src/tat_save.inc.php" id="tat_form1">
		<legend>
			<table border="0" cellspacing="0" cellpadding="0" width="736">
				<tr>
					<td >
			<b>Stammdaten</b></p>
			<div data-role="fieldcontain">
			Mitarbeiter :
			<br>
			<select size="1" name="worker" id="worker" data-inline="true">
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
			</select>*</div>
            <p align="left"><b>Rechnungsstelle:</b>
            <br>
            <select size="1" name="process" id="process">
			<option selected value="0">Bitte wählen</option>
			<?php foreach ($myprocess AS $process_id => $process_name)
					{				
			?>
					<option value="<?php echo $process_id; ?>">
					<?php echo $process_name?>
					</option>
			<?php
					}
	
			?>
			</select>*</p></p>
			<p align="left">
			Datum :<br>
			<input type="date" name="datepicker" id="datepicker" size="20" value="<?php echo $today ?>">*</p><p align="left">
			<p align="left"><b>Allgemeine Information</b></p>
			<p align="left">
			Kunde<br>
			<select size="1" name="client" id="client">
			<option selected value="0">Bitte wählen</option>
			<?php while ($clients=mysql_fetch_array($clients_result, MYSQL_ASSOC))
                                        {
			?>
					<option value="<?php echo $clients['synetics_clients_clientno'] ?>">
					<?php echo utf8_encode($clients['synetics_clients_client'])?>
					</option>
			<?php
					}
	
			?>
			</select><p align="left">
			Einsatzort<br>
			<select size="1" name="workplace" id="workplace">
			<option selected value="0">Bitte wählen</option>

			<?php while($citys=mysql_fetch_array($city_result, MYSQL_ASSOC))
					{				
			?>
					<option value="<?php echo utf8_encode($citys['synetics_city_name'])?>">
					<?php echo utf8_encode($citys['synetics_city_name'])?>
					</option>
			<?php
					}
	
			?>

			</select>*</p>
                        oder
                        Stadt eingeben:<br>
                        <input type="text" name="workplace2" id="workplace2">*
			<p align="left">Projekt<br>
			<select size="1" name="project" id="project">
			
			</select></p>			
			<div data-role="fieldcontain">
    			<fieldset data-role="controlgroup">
			Verpflegungspauschale
			<input type="radio" value="1"  id="foodoverall1" name="foodoverall" />
			<label for="foodoverall1" >Ja</label>
			<input type="radio" checked name="foodoverall" id="foodoverall2" value="0" />
			<label for="foodoverall2" >Nein</label>
			</fieldset>
			</div>
			<div id=zeiten">
			<p align="left"><b>Zeiten:</b></p>
			<p align="left">Hinfahrt von:<br>
			<input type="text" name="hinfahrt_1" id="hinfahrt_1" size="20" data-inline="true">
			<br>bis<br>
			<input type="text" name="hinfahrt_2" id="hinfahrt_2"size="20"></p>
			<p align="left">Einsatzzeit von:<br>
			<input type="text" name="zeit_1" id="zeit_1" size="20"value="7:30">
			<br>bis<br>
			<input type="text" name="zeit_2" id="zeit_2" size="20"value="16:30">*</p>
			<p align="left">Pause von;<br>
			<input type="text" name="pause_1" id="pause_1" size="20"value="12:00">
			<br>bis<br>
			<input type="text" name="pause_2" id="pause_2" size="20" value="12:30">*</p>
			<p align="left">Rückfahrt von:<br>
			<input type="text" name="rueckfahrt_1" id="rueckfahrt_1" size="20">
			<br>bis<br>
			<input type="text" name="rueckfahrt_2" id="rueckfahrt_2" size="20"></p>
			</div>
			<p align="left"><b>Reisekosten:</b></p>
			<p align="left">
			Kilometer gefahren
			<br>
			<input type="text" name="kilometer" id="kilometer" size="9">km<p align="left">
			<br>mit<br>
			<select size="1" name="wagen" id="wagen">
			<option value="1">Firmenwagen</option>
			<option value="2">Mietwagen</option>
			<option value="3">Privatwagen</option>
			<option value="4">Sonstiges</option>
			</select>
			</p>
			<p align="left">
			Hotel mit Frühstück<br>
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
			<p align="left"></p>
			<p align="left"></p>
			<p align="left"></p></td>
				</tr>
			</table>
			<p></p>
			<p></p>			
			<p></p>
			<p></p>
			<p align="left">
			
			<input type="submit" value="Anlegen" name="tat_submit" id="tat_submit" data-inline="true">
			<input type="hidden" name="workAction" id="workAction" size="20">
			<br>* Pflichtfelder<br>
			</p>
		</form>
        </div>
</div>