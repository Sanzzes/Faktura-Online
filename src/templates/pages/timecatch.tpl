<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr id="noprint">
        <td>
            <form method="POST" id="form_zeiten" action="index.php?pageID=6">

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
            <th>Mitarbeiter</th>
            <th>Datum</th>
            <th>Hinfahrt von</th>
            <th>bis</th>
            <th>Arbeitszeit von</th>
            <th>bis</th>
            <th>Rückfahrt von</th>
            <th>bis</th>
            <th>Pause</th>
            <th>Gesamt-Zeit</th>
            <th>Fahrzt.</th>
            <th>AZ - Pause</th>
            <th>Verrechnung für</th>
        </tr>
    </thead>
    <tbody>
        {foreach key=key_wert_main item=item_wert_main from=$data_main}
            <tr align="center" id="print">
                <td >{$item_wert_main.synetics_data_worker}</td>
                <td >{$item_wert_main.date}</td>
                <td >{$item_wert_main.time_hin}</td>
                <td >{$item_wert_main.time_hin2}</td>
                <td >{$item_wert_main.time_work}</td>
                <td >{$item_wert_main.time_work2}</td>
                <td >{$item_wert_main.time_zur}</td>
                <td >{$item_wert_main.time_zur2}</td>
                <td >{$item_wert_main.pause}</td>
                <td >{$item_wert_main.allhour}</td>
                <td >{$item_wert_main.fahrtzeit}</td>
                <td >{$item_wert_main.azpause}</td>
                <td >{$item_wert_main.process}</td>
            </tr>	
        {/foreach}	
    </tbody>
</table>
<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte_app" class="display" style="border-collapse: collapse">
    <thead>
        <tr id="print" align="center">	
            <th></th>
            <th>Gesamt-Zeit Summe</th>
            <th>Fahrzeiten Summe</th>
            <th>Arbeitsleistung o. Pause Summe</th>
            <th>Zeitkonto</th>
        </tr>
    </thead>
    <tbody>
        <tr align="center" id="print">
            <td ><font size="3">Summen</td>
            <td ><font size="2" color="red">{$allhour_all}</td>
            <td ><font size="2" color="red">{$fahrtzeiten_all}</td>
            <td ><div id="stunden_month_ges" class="ustunden" align="center"></div></td>
            <td ><font size="2" color="red">{$zeitkonto}</td>
        </tr>
    </tbody>
</table>