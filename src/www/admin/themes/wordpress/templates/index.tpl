	<div id="icon-index" class="icon32"><br /></div>
<h2><!--{$LANG_INDEX_TITLE}--></h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_INDEX_TITLE}--></h3>
	<div class="inside">
		<table align="center" width="100%">
		<tr>
		<td colspan="6"></td>
		<td align="center" colspan="3"><b><!--{$LANG_INDEX_SOURCE_DASHBOARD_DISKUSAGE}--></b></td></tr>
		<tr>		
		<td></td>
		<td align="center"><b><!--{$LANG_INDEX_SOURCE_DASHBOARD_STATUS}--></b></td>
		<td align="center"><b><!--{$LANG_INDEX_SOURCE_DASHBOARD_LASTCAPTURE}--></b></td>
		<td align="center"><b><!--{$LANG_INDEX_SOURCE_DASHBOARD_TIME}--></b></td>		
		<td align="center"><b><!--{$LANG_INDEX_SOURCE_DASHBOARD_FREQUENCY}--></b></td>
		<td align="center"><b><!--{$LANG_INDEX_SOURCE_DASHBOARD_LEGEND}--></b></td>		
		<td align="center"><b><!--{$LANG_INDEX_SOURCE_DASHBOARD_DISKPICTURES}--></b></td>
		<td align="center"><b><!--{$LANG_INDEX_SOURCE_DASHBOARD_DISKVIDEOS}--></b></td>
		<td align="center"><b><!--{$LANG_INDEX_SOURCE_DASHBOARD_DISKTOTAL}--></b></td>						
		</tr>
		<!--{section name=sources start=1 loop=$CONFIGNBSOURCES}-->
		<tr>
			<td>Source <!--{$smarty.section.sources.index}--></td>
			<td align="center">
			<!--{if $SOURCELASTPICTURECOLOR[sources] eq "disabled"}-->
				<img src="<!--{$CONFIGURL}-->themes/<!--{$CONFIGTHEME}-->/img/redtick.png" />
			<!--{elseif $SOURCELASTPICTURECOLOR[sources] eq "green"}-->
				<img src="<!--{$CONFIGURL}-->themes/<!--{$CONFIGTHEME}-->/img/greencube.png" />
			<!--{elseif $SOURCELASTPICTURECOLOR[sources] eq "orange"}-->		
				<img src="<!--{$CONFIGURL}-->themes/<!--{$CONFIGTHEME}-->/img/yellowcube.png" />
			<!--{elseif $SOURCELASTPICTURECOLOR[sources] eq "red"}-->
				<img src="<!--{$CONFIGURL}-->themes/<!--{$CONFIGTHEME}-->/img/redcube.png" />
			<!--{else}-->
				<img src="<!--{$CONFIGURL}-->themes/<!--{$CONFIGTHEME}-->/img/redtick.png" />			
			<!--{/if}-->														
			</td>
			<td align="center"><!--{$SOURCELASTPICTUREDATE[sources]}--></td>
			<td align="center"><!--{$SOURCELASTPICTUREDIFFDATE[sources]}--></td>
			<td align="center"><!--{$SOURCELASTPICTURECRONVALUE[sources]}--> <!--{$SOURCELASTPICTURECRONINTERVAL[sources]}--></td>
			<td align="center"><!--{$SOURCELEGEND[sources]}--></td>		
			<td align="center"><!--{$SOURCESIZEPIC[sources]}--></td>	
			<td align="center"><!--{$SOURCESIZEVID[sources]}--></td>	
			<td align="center"><!--{$SOURCESIZETOTAL[sources]}--></td>				
		</tr>	
		<!--{/section}-->
		</table>
		<p>
			<pre><!--{$DISP_GPHOTOAUTODETECT}--></pre>
		</p>						
	</div>
</div>

</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

