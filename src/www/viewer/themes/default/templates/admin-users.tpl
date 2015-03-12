<h2><!--{$LANG_ADMIN_USERS_TITLE}--></h2>
<center>
<!--{if $ERRORDELETE neq ""}-->
	<font color="red"><b><!--{$ERRORDELETE}--></b></font>
<!--{/if}-->
<table>
<tr>
<td><!--{$LANG_ADMIN_USERS_DELETE}--></td>
<td><!--{$LANG_ADMIN_USERS_USERNAME}--></td>
<td><!--{$LANG_ADMIN_USERS_PASSWORD}--></td>
<td><!--{$LANG_ADMIN_USERS_FIRSTNAME}--></td>
<td><!--{$LANG_ADMIN_USERS_LASTNAME}--></td>
<td><!--{$LANG_ADMIN_USERS_EMAIL}--></td>
<td><!--{$LANG_ADMIN_USERS_COMPANY}--></td>
<td><!--{$LANG_ADMIN_USERS_GROUP}--></td>
</tr>
<!--{section name=users loop=$USERSCPT}-->
<tr>
<td><a href="#" onClick="linkRef('?deluser=<!--{$USERSID[users]}-->' )"><img src="<!--{$CONFIGBASE}-->themes/default/img/drop.png" border="0" /></a></td>
<td><!--{$USERSUSERNAME[users]}--></td>
<td>
<!--{if $USERSID[users] eq $CHANGEPASSWORDID}-->
	<form method="post" action="?changepassword=<!--{$USERSID[users]}-->">
	<table>
	<tr>
	<td><input name="editpassword" type="text" size="15"/></td>
	<td><input name="accept" type="submit" value="OK" /></td>		
	</tr>	
	</table>
	</form>
<!--{else}-->	
	<a href="?changepassword=<!--{$USERSID[users]}-->"><img src="<!--{$CONFIGBASE}-->themes/default/img/edit.png" border="0" /></a>
<!--{/if}-->	
</td>
<td><!--{$USERSFIRSTNAME[users]}--></td>
<td><!--{$USERSLASTNAME[users]}--></td>
<td><!--{$USERSEMAIL[users]}--></td>
<td><!--{$USERSCNAME[users]}--></td>
<td><!--{$USERSGNAME[users]}--></td>
</tr>
<!--{/section}-->			
</table>
<br /><br />
<form method="post" action="?submit=1">
<table>
<tr>
<td colspan="2"><!--{$LANG_ADMIN_USERS_ADDUSER}--> </td>
</tr>
<tr><td><!--{$LANG_ADMIN_USERS_ADDUSERNAME}--></td><td><input name="addusername" type="text" size="15"/></td></tr>
<tr><td><!--{$LANG_ADMIN_USERS_ADDPASSWORD}--></td><td><input name="addpassword" type="text" size="15"/></td></tr>
<tr><td><!--{$LANG_ADMIN_USERS_ADDFIRSTNAME}--></td><td><input name="addfirstname" type="text" size="15"/></td></tr>
<tr><td><!--{$LANG_ADMIN_USERS_ADDLASTNAME}--></td><td><input name="addlastname" type="text" size="15"/></td></tr>
<tr><td><!--{$LANG_ADMIN_USERS_ADDEMAIL}--></td><td><input name="addemail" type="text" size="15"/></td></tr>
<tr><td><!--{$LANG_ADMIN_USERS_ADDCOMPANY}--></td><td>
	<select name="addcompany">
		<option value="0"><!--{$LANG_ADMIN_USERS_ADDNOCOMPANY}--></option>							
		<!--{section name=companies loop=$COMPANIESCPT}-->
		<option value="<!--{$COMPANIESID[companies]}-->"><!--{$COMPANIESNAME[companies]}--></option>
		<!--{/section}-->
	</select>
</td></tr>
<tr><td><!--{$LANG_ADMIN_USERS_ADDGROUP}--></td><td>
	<select name="addgroup">
		<option value="0"><!--{$LANG_ADMIN_USERS_ADDNOGROUP}--></option>							
		<!--{section name=groups loop=$GROUPSCPT}-->
		<option value="<!--{$GROUPSLISTGID[groups]}-->"><!--{$GROUPSLISTGNAME[groups]}--></option>
		<!--{/section}-->
	</select>
</td></tr>
<td><input name="accept" type="submit" value="OK" /></td>
</tr>
</table>
</form>
</center>
