<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr id="noprint">
        <td>
            <form method="POST" id="form_zeiten" action="index.php?pageID=7">
                <div id="menu" align="right">
                    {if $boolsche == "true"}
                        <a href="#" title="Admincenter" id="admin_open">
                            <img src="images/icon/admin.png" border="0" align="left">
                        </a>
                    {/if}
                    <a href="javascript:new_workflow({$perID})" title="Neue Tätigkeit anlegen"><img src="images/icon/newclient.png" border="0"></a>
                    <a href="#" title="Urlaub eintragen/beantragen" id="holiday"><img src="images/icon/holiday.png" border="0"></a>
                    <a href="#" title="Wochenende/Feiertag Eintragen" id="weekend"><img src="images/icon/briefcase.png" border="0"></a>
                    <a href="#" id="execute_del" class="execute_del"><img  src="images/icon/delselected.png" title="Selektierte löschen"></a>
                    <a href="javascript:window.print()" title="Seite drucken" align="right"><img src="images/icon/print.png" border="0"></a>
                    <a href="./logout.php" title="Ausloggen" align="right"><img src="images/icon/logout.png" border="0"></a>                    
                </div>
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
                <input type="submit" value="Übernehmen" name="zeit_submit" id="zeit_submit" title="Übernehmen">

            </form>
        </td>
    </tr>
</table>
<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte_app" class="display" style="border-collapse: collapse">
    <thead>
        <tr id="print" align="center">
            <th>Mitarbeiter</th>
            <th>Datum</th>
            <th>Kunde</th>
            <th>Einsatzort</th>
            <th>Projekt</th>
            <th>Hinfahrt von</th>
            <th>bis</th>
            <th>Arbeitszeit von</th>
            <th >bis</th>
            <th >Rückfahrt von</th>
            <th >bis</th>
            <th>Pause</th>
            <th>Gesamt-Zeit</th>   
            <th>Fahrzt.</th>
            <th>AZ - Pause</th>
            <th id="noprint">Funktion</th>
        </tr>
    <tbody>
        {foreach key=key_wert_main item=item_wert_main from=$data_main}
            <tr align="center">
                <td >{$item_wert_main.synetics_data_worker}</td>
                <td >{$item_wert_main.date}</td>
                <td >{$item_wert_main.synetics_clients_client}</td>
                <td >{$item_wert_main.synetics_data_city}</td>
                <td >{$item_wert_main.synetics_projects_projectname}</td>
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
                <td id="noprint">
                    <a href="javascript:edit_workflow({$item_wert_main.synetics_data_ID})"
                       title="Tätigkeiten ändern u. Anzeigen">
                        <img src="images/icon/edit.png" border="0"></a>
                    <a href="javascript:copy_workflow({$item_wert_main.synetics_data_ID})"
                       title="Tätigkeit duplizieren">
                        <img src="images/icon/duplicate.png" border="0"></a>
                    <a href="javascript:del_workflow({$item_wert_main.synetics_data_ID},'{$item_wert_main.date}')"
                       title="Tätigkeit löschen">
                        <img src="images/icon/del.png" border="0"></a>
                    <input type="checkbox" title="Markieren zum Löschen" name="tatdelete[]" value="{$item_wert_main.synetics_data_ID}">
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>
    <div align="right">Alle markieren<input type="checkbox" id="markall"></div>