<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr id="noprint">
        <td>
            <form method="POST" id="form_zeiten" action="index.php?pageID=5">

                <p>
                    <a href="./logout.php" title="Ausloggen" align="right"><img src="images/icon/logout.png" border="0" align="right"></a>
                    <a href="javascript:window.print()" title="Seite drucken" align="right"><img src="images/icon/print.png" border="0" align="right"></a>

                    {if $boolsche == "true"}
                        <a href="#" title="Admincenter" id="admin_open">
                            <img src="images/icon/admin.png" border="0" align="right">
                        </a>
                    {/if}
                    Zeitraum:
                    <select name="datepicker1" id="datepicker1">
                        {foreach item=key_wert from=$year_month}
                            {if $month == $key_wert}
                                <option selected value="{$key_wert}">{$key_wert}</option>
                            {else}
                                <option value="{$key_wert}">{$key_wert}</option>
                            {/if} 
                        {/foreach}
                    </select>
                    <input type="text" name="datepicker2" id="datepicker2" size="6" value="{$year}">
                    Mitarbeiter:
                    <select size="1" name="worker_f" id="worker_f">
                        <option selected value="0">Nachname</option>

                        {foreach key=key_wert item=item_wert from=$data_lastname}
                            {if $perID == $item_wert.synetics_system__ID}
                                <option selected value="{$item_wert.synetics_system__ID}">{$item_wert.synetics_system_name}</option>
                            {else}
                                <option value="{$item_wert.synetics_system__ID}">{$item_wert.synetics_system_name}</option>
                            {/if}  
                        {/foreach}
                    </select>
                    Filter:
                    <select size="1" name="process_id" id="process_id">
                        <option selected value="0">Alle</option>

                        {foreach key=key_wert item=item_wert from=$data_process}
                            {if $procID == $item_wert.processid}
                                <option selected value="{$item_wert.processid}">{$item_wert.processname}</option>
                            {else}
                                <option value="{$item_wert.processid}">{$item_wert.processname}</option> 
                            {/if}
                        {/foreach}
                    </select>
                    <input type="submit" value="" name="zeit_submit" id="zeit_submit" title="Übernehmen">
                </p>
            </form>
        </td>
    </tr>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse" id="inhalte">
    <tr id="print" align="center">
        <td ><font size="1"><u>Datum</ul></u></font></td>
        <td ><font size="1"><u>Kunde</u></font></td>
        <td ><font size="1"><u>Ort</u></font></td>
        <td ><font size="1"><u>Projekt</u></font></td>
        <td ><font size="1"><u>Hinfahrt von</u></font></td>
        <td ><font size="1"><u>bis</u></font></td>
        <td ><font size="1"><u>Arbeitszeit von</u></font></td>
        <td ><font size="1"><u>bis</u></font></td>
        <td ><font size="1"><u>Rückfahrt von</u></font></td>
        <td ><font size="1"><u>bis</u></font></td>
        <td ><font size="1"><u>Pause</u></font></td>
        <td ><font size="1"><u>AZ<br>-<br>Pause</u></font></td>
        <td ><font size="1"><u>Fahrzt.</u></font></td>
        <td ><font size="1"><u>Dienstl. Tagessatz</u></font></td>
        <td ><font size="1"><u>Dienstl. Std.satz</u></font></td>
        <td ><font size="1"><u>Fahrt Pauschal</u></font></td>
        <td ><font size="1"><u>Fahrt Std.satz</u></font></td>
        <td ><font size="1"><u>KM</u></font></td>
        <td ><font size="1"><u>KM Kosten</u></font></td>
        <td ><font size="1"><u>Hotel</u></font></td>
        <td ><font size="1"><u>Spesen</u></font></td>
        <td ><font size="1"><u>Bahn</u></font></td>
        <td ><font size="1"><u>Flug</u></font></td>
        <td ><font size="1"><u>Mietwagen</u></font></td>
        <td ><font size="1"><u>Parken</u></font></td>
        <td ><font size="1"><u>Str-/U-/ S-Bahn</u></font></td>
        <td ><font size="1"><u>Taxi</u></font></td>
    </tr>
    {foreach key=key_wert_main item=item_wert_main from=$data_main}
        <tr id="print" align="center">
            <td ><font size="1">{$item_wert_main.date}</td>
            <td ><font size="1">{$item_wert_main.synetics_clients_client}</td>
            <td ><font size="1">{$item_wert_main.synetics_data_city}</td>
            <td ><font size="1">{$item_wert_main.synetics_projects_projectname}</td>
            <td ><font size="1">{$item_wert_main.time_hin}</td>
            <td ><font size="1">{$item_wert_main.time_hin2}</td>
            <td ><font size="1">{$item_wert_main.time_work}</td>
            <td ><font size="1">{$item_wert_main.time_work2}</td>
            <td ><font size="1">{$item_wert_main.time_zur}</td>
            <td ><font size="1">{$item_wert_main.time_zur2}</td>
            <td ><font size="1">{$item_wert_main.pause}</td>
            <td ><font size="1">{$item_wert_main.azpause}</td>
            <td ><font size="1">{$item_wert_main.fahrtzeit}</td>
            <td ><font size="1">/</td>
            <td ><font size="1">/</td>
            <td ><font size="1">/</td>
            <td ><font size="1">/</td>
            <td ><font size="1">{$item_wert_main.synetics_data_km}</td>
            <td ><font size="1">{$item_wert_main.synetics_settings_kmset}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_hotel}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_foodoverall}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_train}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_airfare}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_rentalcar}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_parking}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_citytrain}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_taxi}€</td>

        </tr>
    {/foreach}
</table>
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr id="print" align="center" style="background-color: #EECB00">
        <td ><font size="1"><u>Pause</u></font></td>
        <td ><font size="1"><u>Arbeitsleistung</u></font></td>
        <td ><font size="1"><u>Fahrzeit Summe.</u></font></td>
        <td ><font size="1"><u>Dienstl. Tagessatz Summe</u></font></td>
        <td ><font size="1"><u>Dienstl. Std.satz Summe</u></font></td>
        <td ><font size="1"><u>Fahrt Pauschal Summe</u></font></td>
        <td ><font size="1"><u>Fahrt Std.Satz</u></font></td>
        <td ><font size="1"><u>KM Summe</u></font></td>
        <td ><font size="1"><u>KM Kosten Summe</u></font></td>
        <td ><font size="1"><u>Hotel Summe</u></font></td>
        <td ><font size="1"><u>Spesen Summe</u></font></td>
        <td ><font size="1"><u>Bahn Summe</u></font></td>
        <td ><font size="1"><u>Flug Summe</u></font></td>
        <td ><font size="1"><u>Mietwagen Summe</u></font></td>
        <td ><font size="1"><u>Parken Summe</u></font></td>
        <td ><font size="1"><u>Str-/U-/ S-Bahn Summe</u></font></td>
        <td ><font size="1"><u>Taxi Summe</u></font></td>
    </tr>
    <tr id="print" align="center">
        <td >{$fakturapause}</td>
        <td >{$fakturaazpause}</td>
        <td >{$fakturafahrt}</td>
        <td >/</td>
        <td >/</td>
        <td >/</td>
        <td >/</td>
        <td >{$fakturall.km}</td>
        <td >{$fakturall.kmcost}€</td>
        <td >{$fakturall.synetics_data_hotel}€</td>
        <td >{$fakturall.synetics_data_foodoverall}€</td>
        <td >{$fakturall.synetics_data_train}€</td>
        <td >{$fakturall.synetics_data_airfare}€</td>
        <td >{$fakturall.synetics_data_rentalcar}€</td>
        <td >{$fakturall.synetics_data_parking}€</td>
        <td >{$fakturall.synetics_data_citytrain}€</td>
        <td >{$fakturall.synetics_data_taxi}€</td>
    </tr>
</table>
<br>
<div align="center" id="noprint">{$pagelink}</div>
<br>
<br>