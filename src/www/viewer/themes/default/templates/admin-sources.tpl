<h2><!--{$LANG_ADMIN_SOURCES_TITLE}--></h2>
<center>
<table>
<tr>
<td><!--{$LANG_ADMIN_SOURCES_DELETE}--></td>
<td><!--{$LANG_ADMIN_SOURCES_SOURCEID}--></td>
<td><!--{$LANG_ADMIN_SOURCES_NAME}--></td>
<td><!--{$LANG_ADMIN_SOURCES_WEIGHT}--></td>
<td><!--{$LANG_ADMIN_SOURCES_PERMISSIONS}--></td>
</tr>
<!--{section name=sources loop=$SOURCESCPT}-->
<tr>
<td><a href="#" onClick="linkRef('?delsource=<!--{$SOURCESSOURCEID[sources]}-->' )"><img src="<!--{$CONFIGBASE}-->themes/default/img/drop.png" border="0" /></a></td>
<td>
<!--{if $SOURCESID[sources] eq $CHANGESOURCEID}-->
	<form method="post" action="?changesourceid=<!--{$SOURCESID[sources]}-->">
	<table>
	<tr>
	<td><input name="editsourceid" type="text" size="30" value="<!--{$SOURCESSOURCEID[sources]}-->"/></td>
	<td><input name="accept" type="submit" value="OK" /></td>		
	</tr>	
	</table>
	</form>
<!--{else}-->	 
	<!--{$SOURCESSOURCEID[sources]}--> <a href="?changesourceid=<!--{$SOURCESID[sources]}-->"><img src="<!--{$CONFIGBASE}-->themes/default/img/edit.png" border="0" /></a>
<!--{/if}-->
</td>
<td>
<!--{if $SOURCESID[sources] eq $CHANGESOURCENAME}-->
	<form method="post" action="?changesourcename=<!--{$SOURCESID[sources]}-->">
	<table>
	<tr>
	<td><input name="editsourcename" type="text" size="15" value="<!--{$SOURCESNAME[sources]}-->" /></td>
	<td><input name="accept" type="submit" value="OK" /></td>		
	</tr>	
	</table>
	</form>
<!--{else}-->	
	<!--{$SOURCESNAME[sources]}--> <a href="?changesourcename=<!--{$SOURCESID[sources]}-->"><img src="<!--{$CONFIGBASE}-->themes/default/img/edit.png" border="0" /></a>
<!--{/if}-->	
</td>
<td>
<!--{if $SOURCESID[sources] eq $CHANGESOURCEWEIGHT}-->
	<form method="post" action="?changesourceweight=<!--{$SOURCESID[sources]}-->">
	<table>
	<tr>
	<td><input name="editsourceweight" type="text" size="15" value="<!--{$SOURCESWEIGHT[sources]}-->" /></td>
	<td><input name="accept" type="submit" value="OK" /></td>		
	</tr>	
	</table>
	</form>
<!--{else}-->	
	<!--{$SOURCESWEIGHT[sources]}--> <a href="?changesourceweight=<!--{$SOURCESID[sources]}-->"><img src="<!--{$CONFIGBASE}-->themes/default/img/edit.png" border="0" /></a>
<!--{/if}-->	
</td>
<td><a href="?viewpermissions=<!--{$SOURCESSOURCEID[sources]}-->"><!--{$LANG_ADMIN_SOURCES_VIEWEDIT}--></a></td>
</tr>
<!--{/section}-->			
</table>
<!--{$LANG_ADMIN_SOURCES_WEIGHTNOTE}-->
<!--{if $VIEWPERMISSIONS neq ""}-->
<br />
	<h3><!--{$LANG_ADMIN_SOURCES_SOURCE}--> <!--{$VIEWPERMISSIONSSOURCENAME}--></h3>
	<table>
		<tr><td><!--{$LANG_ADMIN_SOURCES_NOTE}--></td></tr>
		<tr><td><b><!--{$LANG_ADMIN_SOURCES_USERS}--></b></td></tr>
		<tr>
		<td>		
			<table>
				<!--{section name=permissions loop=$PERMISSIONCPT}-->
					<!--{if $PERMISSIONUSERNAME[permissions] neq ""}-->
						<tr>
							<td><a href="?viewpermissions=<!--{$VIEWPERMISSIONS}-->&permdel=<!--{$PERMISSIONID[permissions]}-->"><img src="<!--{$CONFIGBASE}-->themes/default/img/drop.png" border="0" /></a></td>
							<td><!--{$PERMISSIONFIRSTNAME[permissions]}--> <!--{$PERMISSIONLASTNAME[permissions]}--> (<!--{$PERMISSIONUSERNAME[permissions]}-->)</td>	
						</tr>
					<!--{/if}-->	
				<!--{/section}-->							
			</table>
			<form method="post" action="?viewpermissions=<!--{$VIEWPERMISSIONS}-->">
			<table>
			<tr>
				<td><!--{$LANG_ADMIN_SOURCES_ADD}--></td>
				<td>
					<select name="adduser">
						<option value="0"><!--{$LANG_ADMIN_SOURCES_ADDUSER}--></option>							
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
<!--{/if}-->
<br /><br />
<form method="post" action="?submit=1">
<table>
<tr>
<td colspan="2"><!--{$LANG_ADMIN_SOURCES_ADDSOURCE}--> </td>
</tr>
<tr><td><!--{$LANG_ADMIN_SOURCES_ADDSOURCEID}--></td><td><input name="addsourcesourceid" type="text" size="15"/></td></tr>
<tr><td><!--{$LANG_ADMIN_SOURCES_ADDSOURCENAME}--></td><td><input name="addsourcename" type="text" size="15"/></td></tr>
<td><input name="accept" type="submit" value="OK" /></td>
</tr>
</table>
</form>
</center>
