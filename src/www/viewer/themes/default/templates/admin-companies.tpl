<h2><!--{$LANG_ADMIN_COMPANIES_TITLE}--></h2>
<center>
<form method="post" action="?submit=1">
<table>
<tr>
<td>Sup.</td>
<td>Nom</td>
</tr>
<!--{section name=companies loop=$COMPANIESCPT}-->
<tr>
<td><a href="?delcompany=<!--{$COMPANIESID[companies]}-->"><img src="<!--{$CONFIGBASE}-->themes/default/img/drop.png" border="0" /></a></td>
<td><!--{$COMPANIESNAME[companies]}--></td>
</tr>
<!--{/section}-->			
</table>
<table>
<tr>
<td><!--{$LANG_ADMIN_COMPANIES_ADDCOMPANY}--></td>
<td><input name="addcompany" type="text" size="15"/></td>
<td><input name="accept" type="submit" value="OK" /></td>
</tr>
</table>
</form>
</center>