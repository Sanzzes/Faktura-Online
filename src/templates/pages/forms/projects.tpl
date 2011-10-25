<div id="p_form" title="Projektverwaltung" style="display:none;">
    <form id="p_form2" method="POST"  action="">
        <table border="0" width="442" height="472" cellspacing="0" cellpadding="0">
            <tr>
                <td width="442" colspan="2">
                    <p>
                </td>
            </tr>
            <tr>
                <td height="38" width="284" valign="top">
                    Projektname</td>
                <td height="38" width="158" valign="top" align="left">
                    <input type="text" name="projectname" id="projectname" size="20" style="border: 1px solid #000000"></td>
            </tr>
            <tr>
                <td height="46" width="284" valign="top">
                    <span style="background-color: #C0C0C0">
                        <input type="radio" name="drivecost_rate" id="drivecost_rate" value="1" checked>Fahrtzeitkosten pro Std.<br>
                        <input type="radio" name="drivecost_rate" id="drivecost_rate" value="2">Anfahrtspauschale			</span>
                </td>
                <td height="46" width="158" valign="top" align="left">
                    <input type="text" name="drivecost" id="drivecost" size="20" style="border: 1px solid #000000"></td>
            </tr>
            <tr>
                <td height="20" width="284" valign="top">
                    Kunde</td>
                <td height="20" width="158" valign="top" align="left">
                    <select size="1" name="client" id="client" style="border: 1px solid #000000">
                        <option selected value="keiner">Bitte wählen</option>
                         {foreach key=keyname item=wert from=$clients}
			<option value="{$wert.synetics_clients_id}">{$wert.synetics_clients_client}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td height="31" width="284" valign="top">
                    <p>Projektleiter</p>
                </td>
                <td height="31" width="158" valign="top" align="left">
                    <select size="keiner" name="projectlead"  id="projectlead" style="border: 1px solid #000000" >
                        <option selected value="0">Bitte wählen</option>
                        {foreach key=key_tu item=wert_tu from=$personal}
                            <option value="{$wert_tu.id}">{$wert_tu.name}</option>
                            {/foreach}
                        </select>
                    </td>
                </tr>
                <tr>
                    <td height="35" width="284" valign="top">
                        Ansprechpartner Kunde</td>
                    <td height="35" width="158" valign="top" align="left">
                        <input type="text" name="clientcontact" id="clientcontact" size="20" style="border: 1px solid #000000"></td>
                </tr>
                <tr>
                    <td height="49" width="284" valign="top">
                        <span style="background-color: #C0C0C0">
                            <input type="radio" name="cost_rate" id="cost_rate" value="1" checked>Stundensatz<br>
                            <input type="radio" name="cost_rate" id="cost_rate" value="2">Tagessatz
                        </span>
                    </td>
                    <td height="49" width="158" valign="top" align="left">
                        <input type="text" name="cost" id="cost" size="20" style="border: 1px solid #000000"></td>
                </tr>
                <tr>
                    <td height="242" width="442" colspan="2">
                        <font face="MetaKorrespondenz">Beschreibung:</font><p>
                            <textarea rows="9" name="description" id="description" cols="51" style="border: 1px solid #000000"></textarea>
                        </p>
                        <p>
                            <input type="submit" value="" name="p_submit" id="p_submit">
                            <input type="reset" value="Zurücksetzen" name="B2">
                            <input type="hidden" name="pAction" id="pAction" size="20">
                        <input type="hidden" name="projectID" id="projectID" size="20"></td>

                </tr>
            </table>
        </form>
    </div>