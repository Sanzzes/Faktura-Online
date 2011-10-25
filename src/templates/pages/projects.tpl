<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr>	
        <td height="23" width="auto" colspan="13">
            <p><a href="./logout.php" title="Ausloggen">
                    <img src="images/icon/logout.png" border="0" align="right">
                </a>		
                <a href="javascript:new_project()" title="Neues Projekt anlegen" id="projectADD">
                    <img src="images/icon/newclient.png" border="0" align="right">
                </a>
                {if $boolsche == "true"}
                    <a href="#" title="Admincenter" id="admin_open"><img src="images/icon/admin.png" border="0" align="right"></a>
                    {/if}
            </p>
        </td>
    </tr>
</table>
<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte_app" class="display" style="border-collapse: collapse">
    <thead>
        <tr id="print" align="center">
            <th >Kunde</th>
            <th >Projekt</th>
            <th >Kostensatz</th>
            <th >Fahrtkostensatz</th>
            <th >Projektleiter</th>
            <th >Beschreibung</th>
            <th >Kostenart</th>
            <th >Fahrtkostenart</th>
            <th >Funktion</th>
        </tr>
    </thead>
    <tbody>
        {foreach key=key_tu item=wert_tu from=$projects}
            <tr id="print" align="center">
                {if $wert_tu.clients_id == 0}
                    <td >Nicht Kategorisiert</td>
                {else}
                    <td >{$wert_tu.clients_name}</td>
                {/if}
                <td >{$wert_tu.projectname}</td>
                <td >{$wert_tu.cost}</td>
                <td >{$wert_tu.drivecost}</td>
                <td >{$wert_tu.leader}</td>
                <td >{$wert_tu.description}</td>
                {if $wert_tu.costrate == 1}
                    <td >Stundensatz</td>
                {else}
                    <td >Tagessatz</td>
                {/if}
                {if $wert_tu.drivecostrate == 1}
                    <td >Pro Stunde</td>
                {else}
                    <td >Pauschal</td>
                {/if}
                <td height="23" width="132" valign="top">
                    <a href="javascript:edit_project({$wert_tu.id})" 
                       title="Projekt Editieren und Anzeigen">
                        <img src="images/icon/edit.png" border="0"></a>
                    <a href="javascript:del_project({$wert_tu.id},'{$wert_tu.projectname}','{$wert_tu.leader}')" 
                       title="Projekt Löschen">
                        <img src="images/icon/del.png" border="0"></a>
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>