<h2><!--{$LANG_ADMIN_ADMIN_TITLE}--></h2>
<center> 
	<table>
		<tr><td><!--{$LANG_ADMIN_ADMIN_EXPLANATION}--></td></tr>
		<tr><td><b><!--{$LANG_ADMIN_ADMIN_USERS}--></b></td></tr>
		<tr>
		<td>		
			<table>
				<!--{section name=permissions loop=$PERMISSIONCPT}-->
					<!--{if $PERMISSIONUSERNAME[permissions] neq ""}-->
						<tr>
							<td><a href="#" onClick="linkRef('?viewpermissions=admin&permdel=<!--{$PERMISSIONID[permissions]}-->' )"><img src="<!--{$CONFIGBASE}-->themes/default/img/drop.png" border="0" /></a></td>
							<td><!--{$PERMISSIONFIRSTNAME[permissions]}--> <!--{$PERMISSIONLASTNAME[permissions]}--> (<!--{$PERMISSIONUSERNAME[permissions]}-->)</td>	
						</tr>
					<!--{/if}-->	
				<!--{/section}-->							
			</table>
			<form method="post" action="?viewpermissions=admin">
			<table>
			<tr>
				<td><!--{$LANG_ADMIN_ADMIN_ADD}--></td>
				<td>
					<select name="adduser">
						<option value="0"><!--{$LANG_ADMIN_ADMIN_ADDUSER}--></option>							
						<!--{section name=users loop=$USERSCPT}-->
							<option value="<!--{$USERSUSERNAME[users]}-->"><!--{$USERSCNAME[users]}-->: <!--{$USERSFIRSTNAME[users]}--> <!--{$USERSLASTNAME[users]}--> (<!--{$USERSUSERNAME[users]}-->)</option>
						<!--{/section}-->
					</select>				
				</td>
				<td><input name="accept" type="submit" value="OK" /></td>								
			</tr>
			</table>
			</form>
		</td>		
		</tr>
	</table>
</center>
                                 