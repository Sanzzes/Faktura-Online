<table border="0" width="100%" bordercolordark="#000000" bordercolorlight="#000000" id="inhalte_app" class="display" style="border-collapse: collapse">
            <thead>
                <tr id="print" align="center">
                    <th>Gestellt am</th>
                    <th>Mitarbeiter</th>
                    <th>Urlaubsantrag Nr.</th>
                    <th>Urlaubsbegin</th>
                    <th>Urlaubsende</th>
                    <th>Urlaubstage</th>
                    <th>Eingepflegt</th>
                    {if $boolsche == "true"}
                    <th>Pflegen</th>
                    {/if}
                    <th>Funktionen</th>
                </tr>
            </thead>
            <tbody>
                {foreach key=key_wert_main item=item_wert_main from=$appdata}

                    <tr align="center">
                    <td>{$item_wert_main.gestellt}</td>
                    <td>{$item_wert_main.mitarbeiter}</td>
                    <td>{$item_wert_main.appid}</td>
                    <td>{$item_wert_main.ubegin}</td>
                    <td>{$item_wert_main.uend}</td>
                    <td>{$item_wert_main.days}</td>
                    {if $item_wert_main.accepted == 1}
                    <td><img src="images/icon/apply_hol.png"></td>
                    {if $boolsche == "true"}
                    <td id="auspflegen">
                        <button id="{$item_wert_main.appid}">Auspflegen</button>
                    </td>
                    {/if}
                    {else}
                    <td><img src="images/icon/no.png"></td>
                    {if $boolsche == "true"}
                    <td id="einpflegen">
                        <button id="{$item_wert_main.appid}">Einpflegen</button>
                    </td>
                    {/if}
                    {/if}
                    <td>
                        {if $boolsche == "true"}
                        <div id="edit_holiday" class="pointer">
                        <img src="images/icon/edit.png" id="{$item_wert_main.appid}" title="Antrag editieren">
                        </div>
                        <div id="delete_holiday" class="pointer">
                        <img src="images/icon/del.png" id="{$item_wert_main.appid}" title="Antrag Löschen">
                        </div>
                        {/if}
                        {if $item_wert_main.accepted == 1 && $smarty.session.user_id == $item_wert_main.appfromper}
                         <div id="transfer_inacc" class="pointer">
                        <img src="images/icon/transfer.png" id="{$item_wert_main.appid}" title="Übertragen in die Faktura">
                        </div>
                        {/if}

                    </td>


                    </tr>
                {/foreach} 
        </table>

