<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr id="noprint">
        <td>
            <form method="POST" id="form_zeiten" action="index.php?pageID=4">

                <p>
                    <a href="./logout.php" title="Ausloggen" align="right"><img src="images/icon/logout.png" border="0" align="right"></a>
                    <a href="javascript:window.print()" title="Seite drucken" align="right"><img src="images/icon/print.png" border="0" align="right"></a>

                    {if $boolsche == "true"}
                        <a href="#" title="Admincenter" id="admin_open">
                            <img src="images/icon/admin.png" border="0" align="right">
                        </a>
                    {/if}
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
                    <select size="1" name="worker_f" id="worker_f">
                        <option selected value="0">Mitarbeiter</option>

                        {foreach key=key_wert item=item_wert from=$data_lastname}
                            {if $perID == $item_wert.synetics_system__ID}
                                <option selected value="{$item_wert.synetics_system__ID}">{$item_wert.synetics_system_name}</option>
                            {else}
                                <option value="{$item_wert.synetics_system__ID}">{$item_wert.synetics_system_name}</option>
                            {/if}  
                        {/foreach}
                    </select>
                    <select size="1" name="process_id" id="process_id">
                        <option selected value="0">Alle</option>

                        {foreach key=key_wert item=item_wert from=$process}
                            {if $procID == $item_wert.id}
                                <option selected value="{$item_wert.id}">{$item_wert.name}</option>
                            {else}
                                <option value="{$item_wert.id}">{$item_wert.name}</option> 
                            {/if}
                        {/foreach}
                    </select>	
                    <input type="submit" value="Übernehmen" name="zeit_submit" id="zeit_submit" title="Übernehmen">
                </p>
            </form>
        </td>
    </tr>
</table>
<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte_app" class="display" style="border-collapse: collapse">
    <thead>
        <tr id="print" align="center">
            <th >Datum</th>
            <td >Kunde</td>
            <td >Ort</td>
            <td >Hin fahrt von</td>
            <td >bis</td>
            <td >Arbeit szeit von</td>
            <td >bis</td>
            <td >Rück fahrt von</td>
            <td >bis</td>
            <td >Std.ges.</td>
            <td >Verpfl. pausch.</td>
            <td >KM</td>
            <td >Bahn</td>
            <td >Benzin</td>
            <td >Flug</td>
            <td >Fracht</td>
            <td >Hotel</td>
            <td >Mietwagen</td>
            <td >Parken</td>
            <td >Str-/U-/ S-Bahn</td>
            <td >Taxi</td>
            <td >Bewirtung</td>
        </tr>
    </thead>
    <tbody>
        {foreach key=key_wert_main item=item_wert_main from=$data_main}

            <tr id="print" align="center" >
                <td >{$item_wert_main.date}</td>
                <td >{$item_wert_main.synetics_clients_client}</td>
                <td >{$item_wert_main.synetics_data_city}</td>
                <td >{$item_wert_main.time_hin}</td>
                <td >{$item_wert_main.time_hin2}</td>
                <td >{$item_wert_main.time_work}</td>
                <td >{$item_wert_main.time_work2}</td>
                <td >{$item_wert_main.time_zur}</td>
                <td >{$item_wert_main.time_zur2}</td>
                <td >{$item_wert_main.allhour}</td>
                <td >{$item_wert_main.synetics_data_foodoverall}€</td>
                <td >{$item_wert_main._km}</td>
                <td >{$item_wert_main._train}€</td>
                <td >{$item_wert_main._oil}€</td>
                <td >{$item_wert_main._airfare}€</td>
                <td >{$item_wert_main._freight}€</td>
                <td >{$item_wert_main._hotel}€</td>
                <td >{$item_wert_main._rentalcar}€</td>
                <td >{$item_wert_main._parking}€</td>
                <td >{$item_wert_main.s_citytrain}€</td>
                <td >{$item_wert_main._taxi}€</td>
                <td >{$item_wert_main._hospitality}€</td>

            </tr>
        {/foreach}
    </tbody>
</table>
<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte_app" class="display" style="border-collapse: collapse">
    <thead>
        <tr id="print" align="center">
            <th >Pause</th>
            <th >Arbeitsleistung</th>
            <th >Fahrzeit Summe.</th>
            <th >KM Summe</th>
            <th >KM Kosten Summe</th>
            <th >Hotel Summe</th>
            <th >Verpfl. Summe</th>
            <th >Bahn Summe</th>
            <th >Flug Summe</th>
            <th >Mietwagen Summe</th>
            <th >Parken Summe</th>
            <th >Str-/U-/ S-Bahn Summe</th>
            <th >Taxi Summe</th>
        </tr> 
    </thead>
    <tbody>
    <tr id="print" align="center">
        <td >{$fakturapause}</td>
        <td >{$fakturaazpause}</td>
        <td >{$fakturafahrt}</td>
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
    </tbody>
</table>