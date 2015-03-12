<h2><!--{$LANG_ADMIN_GROUPSPAGES_TITLE}--></h2>
<form method="post" action="?submit=1">
<center>
<table>
<tr><td rowspan="<!--{$PAGESCPT+3}-->"><b><!--{$LANG_ADMIN_GROUPSPAGES_PAGES}--></b></td><td></td><td></td><td colspan="<!--{$GROUPSCPT}-->"><b><!--{$LANG_ADMIN_GROUPSPAGES_GROUPS}--></b></td></tr>
<tr>
<td></td>
<td></td>
<!--{section name=groups loop=$GROUPSCPT}-->
	<td><!--{$GROUPSLISTGNAME[groups]}--></td>
<!--{/section}-->
</tr>
<tr>
<td></td>
<td></td>
<!--{section name=groups loop=$GROUPSCPT}-->
	<td><a href="#" onClick="linkRef('?delgroup=<!--{$GROUPSLISTGID[groups]}-->' )"><img src="<!--{$CONFIGBASE}-->themes/default/img/drop.png" border="0" /></a></td>
<!--{/section}-->
</tr>		
<!--{section name=pages loop=$PAGESCPT}-->
<tr>
<td><a href="#" onClick="linkRef('?delpage=<!--{$PAGESLISTPID[pages]}-->' )"><img src="<!--{$CONFIGBASE}-->themes/default/img/drop.png" border="0" /></a></td>
<td align="left"><!--{$PAGESLISTPNAME[pages]}--></td>
	<!--{section name=groups loop=$GROUPSCPT}-->
	<td><input name="<!--{$PAGESLISTPID[pages]}-->-<!--{$GROUPSLISTGID[groups]}-->" type="checkbox" value="yes" <!--{if $GROUPSPAGESRESULTS[pages][groups] eq "yes"}-->checked<!--{/if}--> /></td>
	<!--{/section}-->
</tr>	
<!--{/section}-->				
</table>
<input name="accept" type="submit" value="OK" />			
<table>
<tr>
<td><!--{$LANG_ADMIN_GROUPSPAGES_ADDGROUP}--> </td>
<td><input name="addgroup" type="text" size="15"/></td>
<td><input name="accept" type="submit" value="Ajouter" /></td>
</tr>
<tr>
<td><!--{$LANG_ADMIN_GROUPSPAGES_ADDPAGE}--> </td>
<td><input name="addpage" type="text" size="15"/></td>
<td><input name="accept" type="submit" value="Ajouter" /></td>
</tr>
</table>
</form>
<center>
