<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
    <tr>	
        <td height="23" width="auto" colspan="13">
            <p><a href="./logout.php" title="Ausloggen">
                    <img src="images/icon/logout.png" border="0" align="right">
                </a>		
                <a href="javascript:new_client()" title="Neuen Kunden anlegen" id="clientADD">
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
            <th >Kundennummer</th>
            <th >Kunde</th>
            <th >Nachname</th>
            <th >Vorname</th>
            <th >Strasse</th>
            <th >Nr.</th>
            <th >PLZ</th>
            <th >Ort</th>
            <th >Tel.Nr.</th>
            <th >Handy</th>
            <th >Fax</th>
            <th >E-Mail</th>
            <th >Funktion</th>
        </tr>
    </thead>
    <tbody>
        {foreach key=keyname item=wert from=$clients}
        <tr id="print" align="center">
            <td >{$wert.synetics_clients_clientno}</td>
            <td >{$wert.synetics_clients_client}</td>
            <td >{$wert.synetics_clients_name}</td>
            <td >{$wert.synetics_clients_surname}</td>
            <td >{$wert.synetics_clients_street}</td>
            <td >{$wert.synetics_clients_no}</td>
            <td >{$wert.synetics_clients_zipcode}</td>
            <td >{$wert.synetics_clients_city}</td>
            <td >{$wert.synetics_clients_tel}</td>
            <td >{$wert.synetics_clients_mobile}</td>
            <td >{$wert.synetics_clients_fax}</td>
            <td >{$wert.synetics_clients_mail}</td>
            <td height="23" width="auto" bordercolor="#000000" align="center" valign="middle" >
                <a href="javascript:edit_client({$wert.synetics_clients_clientno})"><img src="images/icon/edit.png" border="0"></a>
                <a href="javascript:del_client({$wert.synetics_clients_clientno},'{$wert.synetics_clients_client}')"><img src="images/icon/del.png" border="0"></a>
            </td>
        </tr>
      	{/foreach}
    </tbody>
</table>