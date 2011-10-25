<div id="tat_form" title="Tätigkeitenverwaltung" style="display:none">
    <script  type="text/javascript">
      $(document).ready(function(){
      $("#datepicker").datepicker({ 
                                    dateFormat: 'dd.mm.yy' 
        });
    }); 
    </script>

    <form method="POST" action="./src/tat_save.inc.php" id="tat_form1">
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td >
                    <p align="left">Stammdaten</p>
                    <fieldset style="padding: 2; width:785px; height:160px">
                        <p align="left">
                            Mitarbeiter:
                            <select size="1" name="worker" id="worker">
                                <option selected value="0">Bitte wählen</option>
                                {foreach key=key_tu item=wert_tu from=$personal}
                                    <option value="{$wert_tu.id}">{$wert_tu.name}</option>
                                {/foreach}
                            </select>*</p>

                        <p align="left">
                            Kostenstelle:
                            <select size="1" name="process" id="process">
                                <option selected value="0">Bitte wählen</option>
                                {foreach key=key_wert item=item_wert from=$process}
                                    <option value="{$item_wert.id}">{$item_wert.name}</option> 

                                {/foreach}
                            </select>*</p>
                        <p align="left">
                            Datum:<input type="text" name="datepicker" id="datepicker" size="20" value="{$smarty.now|date_format:"%d.%m.%Y"}">*</p>
                    </fieldset><p align="left">
                <p align="left">Allgemeine Information</p>
                <p align="left">
                </p>
                <p align="left"></p>
                <fieldset style="padding: 2; width:785px; height:auto">
                    <p align="left">
                        Kunde<select size="1" name="client" id="client">
                            <option selected value="0">Bitte wählen</option>
                            {foreach key=key_wert item=item_wert from=$clients}
                                <option value="{$item_wert.synetics_clients_id}">{$item_wert.synetics_clients_client}</option>
                            {/foreach}
                        </select>
                    </p>
                    oder
                    Kunde eingeben:<input type="text" name="client2" id="client2">*
                    <p align="left">
                        Einsatzort<select size="1" name="workplace" id="workplace">
                            <option selected value="0">Bitte wählen</option>
                            {foreach key=key_wert item=item_wert from=$city_data}
                                <option value="{$item_wert.name}">{$item_wert.name}</option>
                            {/foreach}

                        </select>*</p>
                    oder
                    Stadt eingeben:<input type="text" name="workplace2" id="workplace2">*
                    <p align="left">Projekt<select size="1" name="project" id="project">
                            <option selected value="0">Bitte wählen</option>
                        </select></p>
                    oder
                    Projekt eingeben:<input type="text" name="project2" id="project2">*
                    <p align="left">Verpflegungspauschale
                        <input type="radio" value="1"  id="foodoverall"name="foodoverall">Ja
                        <input type="radio" id="foodoverall"name="foodoverall" value="0">Nein</p>
                    <div id=zeiten">
                        <p align="left"><b>Zeiten:</b></p>
                        <p align="left">Hinfahrt von:&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="hinfahrt_1" id="hinfahrt_1" size="20" value="0:00">bis<input type="text" name="hinfahrt_2" id="hinfahrt_2"size="20" value="0:00"></p>
                        <p align="left">Einsatzzeit von&nbsp;
                            <input type="text" name="zeit_1" id="zeit_1" size="20"value="0:00">bis<input type="text" name="zeit_2" id="zeit_2" size="20"value="0:00">*</p>
                        <p align="left">Pause von&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="pause_1" id="pause_1" size="20"value="0:00">bis<input type="text" name="pause_2" id="pause_2" size="20" value="0:00">*</p>
                        <p align="left">Rückfahrt von&nbsp;&nbsp;&nbsp;
                            <input type="text" name="rueckfahrt_1" id="rueckfahrt_1" size="20" value="0:00">bis<input type="text" name="rueckfahrt_2" id="rueckfahrt_2" size="20" value="0:00"></p>
                    </div>
                </fieldset><p align="left">Reisekosten</p>
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
                            <option value="0">Nein</option>
                            <option value="1">Ja</option>
                        </select>
                    </p>
                    <table><tr align="left">
                            <td>
                                Art: 
                            </td>
                            <td>
                                Summe Euro:  
                            </td>
                            <td>
                                Bezahlt von:
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select size="1" name="art_1_1" id="art_1_1">
                                    <option selected value="_train">Bahn</option>
                                    <option value="_oil">Benzin</option>
                                    <option value="_airfare">Flug</option>
                                    <option value="_freight">Fracht</option>
                                    <option value="_hotel">Hotel</option>
                                    <option value="_rentalcar">Mietwagen</option>
                                    <option value="_parking">Parken</option>
                                    <option value="_citytrain">City-Bahn</option>
                                    <option value="_taxi">Taxi</option>
                                    <option value="_hospitality">Bewirtung</option>
                                </select>
                                <br>
                                <select size="1" name="art_2_1" id="art_2_1">
                                    <option value="_train">Bahn</option>
                                    <option selected value="_oil">Benzin</option>
                                    <option value="_airfare">Flug</option>
                                    <option value="_freight">Fracht</option>
                                    <option value="_hotel">Hotel</option>
                                    <option value="_rentalcar">Mietwagen</option>
                                    <option value="_parking">Parken</option>
                                    <option value="_citytrain">City-Bahn</option>
                                    <option value="_taxi">Taxi</option>
                                    <option value="_hospitality">Bewirtung</option>
                                </select>
                                <br />
                                <select size="1" name="art_3_1" id="art_3_1">
                                    <option value="_train">Bahn</option>
                                    <option value="_oil">Benzin</option>
                                    <option selected value="_airfare">Flug</option>
                                    <option value="_freight">Fracht</option>
                                    <option value="_hotel">Hotel</option>
                                    <option value="_rentalcar">Mietwagen</option>
                                    <option value="_parking">Parken</option>
                                    <option value="_citytrain">City-Bahn</option>
                                    <option value="_taxi">Taxi</option>
                                    <option value="_hospitality">Bewirtung</option>
                                </select>     
                            </td>
                            <td>
                                <input type="text" name="art_1_2" id="art_1_2" size="12" value=""> 
                                <br />
                                <input type="text" name="art_2_2" id="art_2_2" size="12">
                                <br />
                                <input type="text" name="art_3_2" id="art_3_2" size="12">
                                <br />
                            </td>
                            <td>
                                <select name="art_1_3" id="art_1_3">
                                    <option value="1">Mitarbeiter</option>
                                    <option value="2">Firma</option>
                                </select>
                                <br />
                                <select name="art_2_3" id="art_2_3">
                                    <option value="1">Mitarbeiter</option>
                                    <option value="2">Firma</option>
                                </select>
                                <br />
                                <select name="art_3_3" id="art_3_3">
                                    <option value="1">Mitarbeiter</option>
                                    <option value="2">Firma</option>
                                </select>
                            </td>
                        </tr>
                    </table>

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