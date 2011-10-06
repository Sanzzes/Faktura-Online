
<table border="0" width="100%" align="left" style="border-collapse: collapse">
	<tr>
		<td height="23" width="auto" colspan="8">
	<p>
	<a href="./logout.php" title="Ausloggen">
		<img src="images/icon/logout.png" border="0" align="right">
	</a>
	<a href="javascript:new_project()" title="Neues Projekt anlegen">
		<img src="images/icon/newclient.png" border="0" align="right">
	</a>
		{if $boolsche == "true"}
		<a href="#" title="Admincenter" id="admin_open"><img src="images/icon/admin.png" border="0" align="right"></a>
		 {/if}
		 </p>
 </td>
	 </tr>
		<tr bgcolor="EECB00">
			<th  align="left" valign="top" colspan="8" >Kunden</th>
		</tr>
			</tr>
			<tr id="0">
		
		<td height="23" width="100%" align="left" valign="top" colspan="7"><img src="./images/icon/plus.png" id="img_0" border="0"  align="left"></a>
		 <a href="#" id="0" class="aufklappen" style="text-decoration: none;">
			Nicht Kategorisiert</a></td>		
	</tr>
	<tr id="insert_0" style="display:none;">
	</tr>
	{foreach key=key_tu item=wert_tu from=$data_client}
		<tr id="{$wert_tu.synetics_clients_id}">
		
		<td height="23" width="100%" align="left" valign="top" colspan="7"><img src="./images/icon/plus.png" id="img_{$wert_tu.synetics_clients_clientno}" border="0"  align="left"></a>
		 <a href="#" id="{$wert_tu.synetics_clients_id}" class="aufklappen" style="text-decoration: none;">
                    {$wert_tu.synetics_clients_client}
                </a>
</td>		
	</tr>
	
	<tr id="insert_{$wert_tu.synetics_clients_id}" style="display:none;">
	</tr>
	{/foreach}
</table>
<div style="clear:both;margin:30px 0;text-align:center;padding-right:40px"></div>
<br>
