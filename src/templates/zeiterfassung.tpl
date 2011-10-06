<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr id="noprint">
        <td>
            <form method="POST" action="index.php?pageID=6" id="form_zeiten">
                
                <p>
                    <a href="javascript:window.print()" title="Seite drucken" align="right"><img src="images/icon/print.png" border="0" align="right"></a>
                    <a href="./logout.php" title="Ausloggen" align="right"><img src="images/icon/logout.png" border="0" align="right"></a>
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
    <tr id="print">	
        <td align="center"> <font size="1"><u>Mitarbeiter</u></font></td>
        <td align="center"> <font size="1"><u>Datum</u></font></td>
        <td align="center"> <font size="1"><u>Hinfahrt von</u></font></td>
        <td align="center"> <font size="1"><u>bis</u></font></td>
        <td align="center"> <font size="1"><u>Arbeitszeit von</u></font></td>
        <td align="center"> <font size="1"><u>bis</u></font></td>
        <td align="center"> <font size="1"><u>Rückfahrt von</u></font></td>
        <td align="center"> <font size="1"><u>bis</u></font></td>
        <td align="center" ><font size="1"><u>Pause</u></font></td>
        <td align="center" ><font size="1"><u>Gesamt-Zeit</u></font></td>
        <td align="center" ><font size="1"><u>Fahrzt.</u></font></td>
        <td align="center" ><font size="1"><u>AZ - Pause</u></font></td>
        <td align="center" ><font size="1"><u>Verrechnung für</u></font></td>
    </tr>
    {foreach key=key_wert_main item=item_wert_main from=$data_main}
        <tr align="center" id="print">
            <td ><font size="1">{$item_wert_main.synetics_data_worker}</td>
            <td ><font size="1">{$item_wert_main.date}</td>
            <td ><font size="1">{$item_wert_main.time_hin}</td>
            <td ><font size="1">{$item_wert_main.time_hin2}</td>
            <td ><font size="1">{$item_wert_main.time_work}</td>
            <td ><font size="1">{$item_wert_main.time_work2}</td>
            <td ><font size="1">{$item_wert_main.time_zur}</td>
            <td ><font size="1">{$item_wert_main.time_zur2}</td>
            <td ><font size="1">{$item_wert_main.pause}</td>
            <td ><font size="1">{$item_wert_main.allhour}</td>
            <td ><font size="1">{$item_wert_main.fahrtzeit}</td>
            <td ><font size="1">{$item_wert_main.azpause}</td>
            <td ><font size="1">{$item_wert_main.process}</td>
        </tr>	
    {/foreach}	
</table>
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr id="print" style="background-color: #EECB00">	
        <td align="center" ><font size="1"></font></td>
        <td align="center" ><font size="1">Gesamt-Zeit Summe</font></td>
        <td align="center" ><font size="1">Fahrzeiten Summe</font></td>
        <td align="center" ><font size="1">Arbeitsleistung o. Pause Summe</font></td>
        <td align="center" ><font size="1">Zeitkonto</font></td>
    </tr>
    <tr align="center" id="print">
        <td ><font size="1">Summen</td>
        <td ><font size="2" color="red">{$allhour_all}</td>
        <td ><font size="2" color="red">{$fahrtzeiten_all}</td>
        <td ><font size="2" color="red">{$arbeitszeit_all}</td>
        <td ><font size="2" color="red">{$zeitkonto}</td>

    </tr>
</table>
<br><div align="center" id="noprint">{$pagelink}</div><div id="stunden_month_ges" class="ustunden" align="right"></div>
<br>
<br>