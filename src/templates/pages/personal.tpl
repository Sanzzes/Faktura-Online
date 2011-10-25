<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr>
        <td height="23" width="auto" colspan="13">
            <p>
                <a href="./logout.php" title="Ausloggen">
                    <img src="images/icon/logout.png" border="0" align="right">
                </a>
                <a href="javascript:new_personal()" title="Neue Person anlegen">
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
        <th >Nachname</th>
        <th >Strasse</th>
        <th >PLZ</th>
        <th >Ort</th>
        <th >Tel.Nr.</th>
        <th >E-Mail</th>
        <th >Arbeitstage/Woche</th>
        <th >Arbeitsstunden/Woche</th>
        <th >Funktion</th>
    </tr>	
    </thead>
    <tbody>
    {foreach key=key_wert item=item_wert from=$personal}
        <tr align="center" valign="top">
            <td >{$item_wert.name}</td>
            <td >{$item_wert.street}</td>
            <td >{$item_wert.zipcode}</td>
            <td >{$item_wert.city}</td>
            <td >{$item_wert.tele}</td>
            <td >{$item_wert.mail}</td>
            <td >{$item_wert.weekwork}</td>
            <td >{$item_wert.weekhour}</td>
            <td>
                <a href="javascript:edit_personal({$item_wert.id})" title="Person ändern u. Anzeigen"><img src="images/icon/edit.png" border="0"></a>
                <a href="javascript:del_personal({$item_wert.id},'{$item_wert.name}','{$item_wert.synetics_system_surname}',{$smarty.session.user_id})" title="Person löschen"><img src="images/icon/del.png" border="0"></a>
            </td>
        </tr>
    {/foreach}
    </tbody>
</table>