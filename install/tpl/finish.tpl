</p>
<div align="center">
	<table border="0" width="788" height="458" background="images/setuppage.png" cellspacing="0" cellpadding="0">
		<tr>
			<td height="418" width="600" rowspan="2"></td>
			<td height="51" width="600"></td>
		</tr>
		<tr>
			<td height="367" width="600" align="center">
			<table width="100%">
			{if $erroNo == 0}
			<tr><td><img src='images/success.gif'></td></tr>
			{else}
			{foreach key=key_wert item=item_wert from=$errors}
			 {$item_wert.errorMessage}
			 {$item_wert.errorNo}
			 {$item_wert.errorText}
			 {/foreach}
			 {/if}
			</table>
			</td>
		</tr>
		<tr>
			<td height="40" width="395"></td>
			<td height="40" width="393">
			{$buttons}
			</td>
		</tr>
	</table>
</div>
			