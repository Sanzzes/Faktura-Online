<div data-role="page" id="home">
    <div  data-role="header" data-theme="e"> 
        <h1>Faktura Mobile v.1.0</h1> 
        <div data-role="navbar">
            <ul>
                <li><a href="index.php" rel="external">Startseite</a></li>
                <li><a id="logout">Ausloggen</a></li>
            </ul>
        </div><!-- /navbar -->
    </div> 
    <div data-role="content">
        <table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" 
               style="border-collapse: collapse">
            <tr id="noprint">
                <td height="auto" width="auto" colspan="13">
                    <form method="POST" action="index.php?pageID=1" id="form_zeiten"data-ajax="false">
                        <a href="#add" id="newwork" data-role="button" data-icon="plus" data-inline="true">Neu Anlegen</a>
                        <a href="#" id="overwork" data-role="button" data-icon="check" data-inline="true">Überstunden Gesamt</a>
                        <br>Monat:<br>
                        <select name="datepicker1" id="datepicker1">
                            {foreach item=key_wert from=$year_month}
                                {if $month == $key_wert}
                                    <option selected value="{$key_wert}">{$key_wert}</option>
                                {else}
                                    <option value="{$key_wert}">{$key_wert}</option>
                                {/if} 
                            {/foreach}
                        </select>
                        <br>Jahr:<br>
                        <input type="text" name="datepicker2" id="datepicker2" size="6" value="{$year}">
                        <br>Mitarbeiter:<br>
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
                        <input type="submit" value="&Uuml;bernehmen" name="zeit_submit" id="zeit_submit" title="Übernehmen">
                        </p>
                    </form>
                </td>
            </tr>	
        </table>
        <table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte" class="display" style="border-collapse: collapse">
            <thead>
                <tr id="print">
                    <th>Mitarbeiter</th>
                    <th>Datum</th>
                    <th>Arbeitszeit</th>
                    <th>bis</th>
                    <th>Funktion</th>
                </tr>
            </thead>
            <tbody>
                {foreach key=key_wert_main item=item_wert_main from=$data_main}

                    <tr align="center">
                <font size="6">
                    <td>{$item_wert_main.synetics_system_name}</td>
                    <td>{$item_wert_main.date}</td>
                    <td>{$item_wert_main.time_work}</td>
                    <td>{$item_wert_main.time_work2}</td>
                    <td>           
                        <a href="javascript:edit_workflow({$item_wert_main.synetics_data_ID})"
                           title="Person ändern u. Anzeigen">
                            <img src="images/icon/edit.png" border="0"></a>
                        <a href="javascript:del_workflow({$item_wert_main.synetics_data_ID},'{$item_wert_main.date}')"
                           title="Person löschen">
                            <img src="images/icon/del.png" border="0"></a>
                    </td>


                    </tr>
                {/foreach} 
        </table>

        <br>
        <div id="ustunden_month" class="ustunden" align="right"></div>
    </div>
    <div  data-role="footer" data-theme="e"> 
        <h4>(c) Steven Bohm 2011</h4> 
    </div>
</div>