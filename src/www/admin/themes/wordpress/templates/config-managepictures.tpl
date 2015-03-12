	<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_MANAGEPICTURES_SOURCE}--> <!--{$CONFIGWEBCAMSOURCE}--><!--{$LANG_MANAGEPICTURES_TITLE}--></h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">

<div id="commentstatusdiv" class="postbox ">
	<form method="post" action="<!--{$CONFIGURL}-->config-managepictures.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">
	<input type="hidden" name="submitform" value="1">
	<h3 class="hndle"><span><!--{$LANG_MANAGEPICTURES_MANAGE}--></h3>
	<div class="inside">
			<table class="form-table">
                	<tr>
                  	<td width="10" class="list">&nbsp;</td>
                  	<td width="10" class="list">&nbsp;</td>
                  	<td width="30%" class="listhdrr" align="center"><!--{$LANG_MANAGEPICTURES_DATE}--></td>
                  	<td width="35%" class="listhdrr" align="center"><!--{$LANG_MANAGEPICTURES_NBPICS}--></td>
                  	<td width="30%" class="listhdrr" align="center"><!--{$LANG_MANAGEPICTURES_GLOBALSIZE}--></td>
						</tr>
						<!--{section name=picfile loop=$CPTPICFILE}-->
				      <tr valign="top">
                  	<td class="listt" align="center"><input name="<!--{$PICRESULTSFILE[picfile]}-->" type="checkbox" value="yes"></td>
                  	<td class="listt" align="center"><a href="<!--{$CONFIGURL}-->config-managepictures.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1&deleteday=<!--{$PICRESULTSFILE[picfile]}-->"><img src="<!--{$CONFIGURL}-->themes/<!--{$CONFIGTHEME}-->/img/delete.gif" width="16" border="0"></a></td>
                 	   <td class="listr" align="center"><!--{$PICRESULTSDAY[picfile]}--></td>
                 	   <td class="listr" align="center"><!--{$PICRESULTSNBFILES[picfile]}--></td>
                 	   <td class="listr" align="center"><!--{$PICRESULTSSIZE[picfile]}--></td>
						</tr>
						<!--{/section}-->
						<tr>
							<td colspan="2"><b><input name="accept" type="submit" value="<!--{$LANG_MANAGEPICTURES_DELETE}-->" class="button-primary"></b></td>
							<td align="right"><b><!--{$LANG_MANAGEPICTURES_TOTAL}--></b></td>
							<td align="center"><b><!--{$TOTALPICRESULTSFILE}--></b></td>
							<td align="center"><b><!--{$TOTALPICRESULTSSIZE}--></b></td>	 	
						</tr>				
			</table>
			<p>
				<strong><!--{$LANG_MANAGEPICTURES_TIP}--></strong><br />
				<!--{$LANG_MANAGEPICTURES_TIPCONTENT}-->					
			</p>			
	</div>
	</form>
</div>

</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->
