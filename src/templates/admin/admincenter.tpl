<div id="content_admin">
    <div id="auswahl_menu">
        <h3><a href="#">Grundeinstellungen</a></h3>
        <div>
            <form id="admin_grund" method="POST" action="">
                <table border="0" width="100%">
                    <tr>
                        <td>Kilometersatz
                            <br>
				Arbeitsstunden pro Tag
                            <br>
				Pause pro Tag
                        </td>
                        <td>
                            <input type="text" id="km_satz" name="km_satz" value="{$synetics_settings_kmset}"> €
                            <br>
                            <input type="text" id="std_day" name="std_day" value="{$dayworktime}"> Std
                            <br>
                            <input type="text" id="stdpause_day" name="stdpause_day" value="{$daypause}"> Min
                            <br>
                            <input type="hidden" id="action_a" name="action_a" size="4" value="1">
                        </td>
                    </tr> 
                    <tr>
                        <td><input type="submit" id="primary_admin" value="Übernehmen"></td>
                    </tr>	
                </table>
            </form>
        </div>

        <h3><a href="#">Rechtesystem</a></h3>
        <div align="center" valign="middle">
            <form id="admin_rechte" method="POST" action="">
                <table border="0" width="100%">
                    <tr>
                        <td>
                            <select id="admin_user" name="admin_user">
                                <option value="0">Bitte wählen</option>

                                {foreach key=key_wert item=item_wert from=$admin_1}

                                    <option value="{$item_wert.synetics_system__ID}">{$item_wert.synetics_system_name}</option>

                                {/foreach}

                            </select>
                        </td>
                        <td>
                            <input type="text" id="p_rights" name="p_rights" size="4">* 1. Normal  2.Admin<br>
                            <input type="hidden" id="action_a"name="action_a" size="4" value="2">
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" id="primary_admin_rights" name="primary_admin_rights" value="Übernehmen"></td>
                    </tr>
                </table>
            </form>
        </div>	

        <h3><a href="#">Verrechnungsstelle</a></h3>
            <div>
                <form id="admin_process" method="POST">
                    <table border="0" width="100%">
                        <tr>
                            <td>
                                <br>Vorhanden:
                                <br>
                                <select id="processID">
                                    {foreach key=key_wert item=item_wert from=$process}
                                        <option value="{$item_wert.processid}">{$item_wert.processname}</option>
                                    {/foreach}
                                </select>
                               <a href="javascript:del_process()" title="Löschen"> <img src="images/icon/del.png" border="0"></a>
                               <a href="javascript:edit_process()" title="Editieren"><img src="images/icon/edit.png" border="0"></a>
                                <br>
                                Neu Anlegen:
                                <input type="text"name="process_new" id="process_new"></input>
                                <input type="hidden" id="action_a"name="action_a" size="4" value="3">
                            </td>
                        </tr> 
                        <tr>
                            <td><input type="submit" id="primary_admin_process" name="primary_admin_rights" value="Übernehmen"></td>
                        </tr>
                    </table>
                </form>         <form id="edit_process"title="Rechnungsstelle Editieren" align="left"> 
                                <div align="left">
                                Name: 
                                <input type='text' id='process_name' size="25" value=""><br>
                                <input type='hidden' id='process_id_old'>
                                <input type='hidden' id='process_action' value="1">
                                </div>
                                <input type="submit" id="process_edit_sub" value="Ändern">
                                
                                </form>
            </div>
    </div>
</div>