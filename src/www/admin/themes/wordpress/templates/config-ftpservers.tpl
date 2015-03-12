	<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_CONFIGFTPSERVERS_TITLE}--></h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">
		
<form method="post" action="<!--{$CONFIGURL}-->config-ftpservers.php?submit=1">
<input type="hidden" name="submitform" value="1">

<div id="commentstatusdiv" class="postbox">
	<h3 class="hndle"><span><!--{$LANG_CONFIGFTPSERVERS_LIST_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
			<tr align="center">			
				<td><b><!--{$LANG_CONFIGFTPSERVERS_LIST_ID}--></b></td>				
				<td><b><!--{$LANG_CONFIGFTPSERVERS_LIST_NAME}--></b></td>
				<td><b><!--{$LANG_CONFIGFTPSERVERS_LIST_HOST}--></b></td>
				<td><b><!--{$LANG_CONFIGFTPSERVERS_LIST_USERNAME}--></b></td>
				<td><b><!--{$LANG_CONFIGFTPSERVERS_LIST_PASSWORD}--></b></td>
				<td><b><!--{$LANG_CONFIGFTPSERVERS_LIST_DIRECTORY}--></b></td>
				<td><b><!--{$LANG_CONFIGFTPSERVERS_LIST_ACTIVE}--></b></td>
			</tr>
			<!--{section name=ftpservers start=1 loop=31}-->
				<!--{if $smarty.section.ftpservers.index eq 10 OR $smarty.section.ftpservers.index eq 20}-->
				<tr><td colspan="7"><hr /></td></tr>
				<!--{/if}-->	
			<tr align="center">
				<td><!--{$smarty.section.ftpservers.index}--></td>	
				<td><input name="cfgftpserverslistname-<!--{$smarty.section.ftpservers.index}-->" type="text" value="<!--{$CFGFTPSERVERSLISTNAME[ftpservers]}-->" size="15"></td>
				<td><input name="cfgftpserverslisthost-<!--{$smarty.section.ftpservers.index}-->" type="text" value="<!--{$CFGFTPSERVERSLISTHOST[ftpservers]}-->" size="30"></td>
				<td><input name="cfgftpserverslistusername-<!--{$smarty.section.ftpservers.index}-->" type="text" value="<!--{$CFGFTPSERVERSLISTUSERNAME[ftpservers]}-->" size="10"></td>
				<td><input name="cfgftpserverslistpassword-<!--{$smarty.section.ftpservers.index}-->" type="password" value="<!--{$CFGFTPSERVERSLISTPASSWORD[ftpservers]}-->" size="10"></td>
				<td><input name="cfgftpserverslistdirectory-<!--{$smarty.section.ftpservers.index}-->" type="text" value="<!--{$CFGFTPSERVERSLISTDIRECTORY[ftpservers]}-->" size="30"></td>
				<td><input name="cfgftpserverslistactive-<!--{$smarty.section.ftpservers.index}-->" type="checkbox" value="yes" <!--{$CFGFTPSERVERSLISTACTIVE[ftpservers]}-->></td>		
			</tr>
			<!--{/section}-->
		</table>
		<input name="accept" type="submit" value="<!--{$LANG_CONFIGFTPSERVERS_LIST_BUTTON}-->" class="button-primary" >						
	</div>
</div>


</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->
