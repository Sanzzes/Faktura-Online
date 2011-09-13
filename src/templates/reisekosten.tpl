<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr id="noprint">
        <td>
            <form method="POST" id="form_zeiten" action="index.php?pageID=4">
                <a href="#" id="hide_menu" align="left"><img src="./images/menu/close.png" id="closer_img"></a>
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
     <thead>
    <tr id="print">
        <th height="34" width="92" align="center"><font size="1">Datum</font></th>
        <td height="34" width="93" align="center"><font size="1">Kunde</font></td>
        <td height="34" width="93" align="center"><font size="1">Ort</font></td>
        <td height="34" width="53" align="center" valign="top"><font size="1">Hin fahrt von</font></td>
        <td height="34" width="52" align="center"><font size="1">bis</font></td>
        <td height="34" width="55" align="center" valign="top"><font size="1">Arbeit szeit von</font></td>
        <td height="34" width="52" align="center"><font size="1">bis</font></td>
        <td height="34" width="54" align="center" valign="top"><font size="1">Rück fahrt von</font></td>
        <td height="34" width="52" align="center"><font size="1">bis</font></td>
        <td height="34" width="54" align="center"><font size="1">Std.ges.</font></td>
        <td height="34" width="57" align="center" valign="top"><font size="1">Verpfl. pausch.</font></td>
        <td height="34" width="54" align="center"><font size="1">KM</font></td>
        <td height="34" width="55" align="center"><font size="1">Bahn</font></td>
        <td height="34" width="56" align="center"><font size="1">Benzin</font></td>
        <td height="34" width="54" align="center"><font size="1">Flug</font></td>
        <td height="34" width="56" align="center"><font size="1">Fracht</font></td>
        <td height="34" width="55" align="center"><font size="1">Hotel</font></td>
        <td height="34" width="56" align="center"><font size="1">Mietwagen</font></td>
        <td height="34" width="56" align="center"><font size="1">Parken</font></td>
        <td height="34" width="56" align="center" valign="top"><font size="1">Str-/U-/ S-Bahn</font></td>
        <td height="34" width="55" align="center"><font size="1">Taxi</font></td>
        <td height="34" width="57" align="center"><font size="1">Bewirtung</font></td>
    </tr>
     </thead>
     <tbody>
    {foreach key=key_wert_main item=item_wert_main from=$data_main}

        <tr id="print" align="center" >
            <td ><font size="1">{$item_wert_main.date}</td>
            <td ><font size="1">{$item_wert_main.synetics_clients_client}</td>
            <td ><font size="1">{$item_wert_main.synetics_data_city}</td>
            <td ><font size="1">{$item_wert_main.time_hin}</td>
            <td ><font size="1">{$item_wert_main.time_hin2}</td>
            <td ><font size="1">{$item_wert_main.time_work}</td>
            <td ><font size="1">{$item_wert_main.time_work2}</td>
            <td ><font size="1">{$item_wert_main.time_zur}</td>
            <td ><font size="1">{$item_wert_main.time_zur2}</td>
            <td ><font size="1">{$item_wert_main.allhour}</td>
            <td ><font size="1">{$item_wert_main.synetics_data_foodoverall}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_km}</td>
            <td ><font size="1">{$item_wert_main.synetics_data_train}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_oil}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_airfare}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_freight}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_hotel}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_rentalcar}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_parking}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_citytrain}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_taxi}€</td>
            <td ><font size="1">{$item_wert_main.synetics_data_hospitality}€</td>

        </tr>
    {/foreach}
    </tbody>
</table>
<br>
<div align="center" id="noprint">{$pagelink}</div>
<br>
<br>