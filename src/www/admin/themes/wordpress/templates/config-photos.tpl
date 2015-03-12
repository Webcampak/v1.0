	<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_PHOTOS_SOURCE}--> <!--{$CONFIGWEBCAMSOURCE}--><!--{$LANG_PHOTOS_TITLE}--></h2>

<form method="post" action="<!--{$CONFIGURL}-->config-photos.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">
<input type="hidden" name="submitform" value="1">	
<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">

<div id="commentstatusdiv" class="postbox <!--{if $CFGCROPACTIVATE neq "checked"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_PHOTOS_CROP_TITLE}--></span></h3> 
	<div class="inside">
		<table class="form-table">
		<tr valign="middle">
			<th scope="row"><!--{$LANG_PHOTOS_CROP_ACTIVATE}--></th>
			<td><input name="cfgcropactivate" type="checkbox" value="yes" <!--{$CFGCROPACTIVATE}-->></td>
		</tr>
		<tr valign="middle">
			<th scope="row"><!--{$LANG_PHOTOS_CROP_SIZE}--></th>
			<td>
				<input name="cfgcropsizewidth" type="text" value="<!--{$CFGCROPSIZEWIDTH}-->" size="6">
				x
				<input name="cfgcropsizeheight" type="text" value="<!--{$CFGCROPSIZEHEIGHT}-->" size="6">
			</td>
		</tr>
		<tr valign="middle">
			<th scope="row"><!--{$LANG_PHOTOS_CROP_LOCATION}--></th>
			<td>
				X: <input name="cfgcropxpos" type="text" value="<!--{$CFGCROPXPOS}-->" size="6">, 
				Y: <input name="cfgcropypos" type="text" value="<!--{$CFGCROPYPOS}-->" size="6">
			</td>
		</tr>
		</table>	
	</div>
</div>


<div id="commentstatusdiv" class="postbox <!--{if $CFGPICWATERMARKACTIVATE neq "checked"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_PHOTOS_WATERMARK_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_WATERMARK_ACTIVATE}--></th><td><input name="cfgpicwatermarkactivate" type="checkbox" value="yes" <!--{$CFGPICWATERMARKACTIVATE}-->></td></tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_WATERMARK_SOURCE}--></th><td>
				<select name="cfgpicwatermarkfile">
					<!--{section name=watermarkfiles loop=$CPTWATERMARKFILES}-->
						<!--{if $WATERMARKFILES[watermarkfiles] eq $CFGPICWATERMARKFILE}-->
							<option value="<!--{$WATERMARKFILES[watermarkfiles]}-->" selected="selected"><!--{$WATERMARKFILES[watermarkfiles]}--></option>
						<!--{else}-->
							<option value="<!--{$WATERMARKFILES[watermarkfiles]}-->"><!--{$WATERMARKFILES[watermarkfiles]}--></option>
						<!--{/if}-->
					<!--{/section}-->						
				</select>
			</td></tr>
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_WATERMARK_TRANSPARENCY}--> </th><td><input name="cfgpicwatermarkdissolve" type="text" value="<!--{$CFGPICWATERMARKDISSOLVE}-->" width="5">%</td></tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_WATERMARK_XCOORDINATE}--> </th><td><input name="cfgpicwatermarkpositionx" type="text" value="<!--{$CFGPICWATERMARKPOSITIONX}-->" width="5"></td></tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_WATERMARK_YCOORDINATE}--> </th><td><input name="cfgpicwatermarkpositiony" type="text" value="<!--{$CFGPICWATERMARKPOSITIONY}-->" width="5"></td></tr> 		
		</table>
		<p>
			<strong><!--{$LANG_PHOTOS_TIP}--></strong><br />
		  	<!--{$LANG_PHOTOS_WATERMARK_TIP}--> 
		</p>		
	</div>
</div>


<div id="commentstatusdiv" class="postbox <!--{if $CFGIMAGEMAGICKTXT neq "checked"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_PHOTOS_LEGEND_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_LEGEND_ACTIVATE}--> </th><td><input name="cfgimagemagicktxt" type="checkbox" value="yes" <!--{$CFGIMAGEMAGICKTXT}-->></td></tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_LEGEND_LEGEND}--> </th><td><input name="cfgimgtext" type="text" value="<!--{$CFGIMGTEXT}-->" size="30"></td></tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_LEGEND_FORMAT}--> </th><td>
					<select name="cfgimgdateformat">
						<option value="0"><!--{$LANG_PHOTOS_LEGEND_NODATE}--></option>
						<option value="1" <!--{if $CFGIMGDATEFORMAT eq "1"}--> selected<!--{/if}-->>25/01/2010 - 09h30</option>
						<option value="2" <!--{if $CFGIMGDATEFORMAT eq "2"}--> selected<!--{/if}-->>25/01/2010</option>
						<option value="3" <!--{if $CFGIMGDATEFORMAT eq "3"}--> selected<!--{/if}-->>09h30</option>
						<option value="4" <!--{if $CFGIMGDATEFORMAT eq "4"}--> selected<!--{/if}-->><!--{$LANG_PHOTOS_LEGEND_FORMAT4}--></option>
						<option value="5" <!--{if $CFGIMGDATEFORMAT eq "5"}--> selected<!--{/if}-->><!--{$LANG_PHOTOS_LEGEND_FORMAT5}--></option>
					</select>
			</td></tr> 
			<tr valign="top"><th scope="row"><b><!--{$LANG_PHOTOS_LEGEND_ADVANCED}--></b></th></tr>
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_LEGEND_FONTSIZE}--> </th><td><input name="cfgimgtextsize" type="text" value="<!--{$CFGIMGTEXTSIZE}-->"></td></tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_LEGEND_FONTLOCATION}--> </th>
			<td>
				<select name="cfgimgtextgravity">
					<option value="southwest" <!--{if $CFGIMGTEXTGRAVITY eq "southwest"}--> selected<!--{/if}-->><!--{$LANG_PHOTOS_LEGEND_FONTSOUTHWEST}--></option>
					<option value="south" <!--{if $CFGIMGTEXTGRAVITY eq "south"}--> selected<!--{/if}-->><!--{$LANG_PHOTOS_LEGEND_FONTSOUTH}--></option>
					<option value="southeast" <!--{if $CFGIMGTEXTGRAVITY eq "southeast"}--> selected<!--{/if}-->><!--{$LANG_PHOTOS_LEGEND_FONTSOUTHEAST}-->)</option>
					<option value="east" <!--{if $CFGIMGTEXTGRAVITY eq "east"}--> selected<!--{/if}-->><!--{$LANG_PHOTOS_LEGEND_FONTEAST}--></option>
					<option value="northeast" <!--{if $CFGIMGTEXTGRAVITY eq "northeast"}--> selected<!--{/if}-->><!--{$LANG_PHOTOS_LEGEND_FONTNORTHEAST}--></option>
					<option value="north" <!--{if $CFGIMGTEXTGRAVITY eq "north"}--> selected<!--{/if}-->><!--{$LANG_PHOTOS_LEGEND_FONTNORTH}--></option>
					<option value="northwest" <!--{if $CFGIMGTEXTGRAVITY eq "northwest"}--> selected<!--{/if}-->><!--{$LANG_PHOTOS_LEGEND_FONTNORTWEST}--></option>
					<option value="west" <!--{if $CFGIMGTEXTGRAVITY eq "west"}--> selected<!--{/if}-->><!--{$LANG_PHOTOS_LEGEND_FONTWEST}--></option>
				</select>					
			</td>
			</tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_LEGEND_FONTNAME}--></th>
			<td>
				<select name="cfgimgtextfont">
					<!--{section name=fonts loop=$FONTSCPT}-->
						<!--{if $FONTSLIST[fonts] eq $CFGIMGTEXTFONT}-->
							<option value="<!--{$FONTSLIST[fonts]}-->" selected><!--{$FONTSLIST[fonts]}--></option>
						<!--{else}-->
							<option value="<!--{$FONTSLIST[fonts]}-->"><!--{$FONTSLIST[fonts]}--></option>
						<!--{/if}-->
					<!--{/section}-->						
				</select>
			</td>
			</tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_LEGEND_FONTCOLOR}--> </th><td><input name="cfgimgtextovercolor" type="text" value="<!--{$CFGIMGTEXTOVERCOLOR}-->"></td></tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_LEGEND_FONTCOORDINATES}--> </th><td><input name="cfgimgtextoverposition" type="text" value="<!--{$CFGIMGTEXTOVERPOSITION}-->"></td></tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_LEGEND_FONTSHADOWCOLOR}--> </th><td><input name="cfgimgtextbasecolor" type="text" value="<!--{$CFGIMGTEXTBASECOLOR}-->"></td></tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_PHOTOS_LEGEND_FONTSHADOWCOORDINATES}--> </th><td><input name="cfgimgtextbaseposition" type="text" value="<!--{$CFGIMGTEXTBASEPOSITION}-->"></td></tr> 
		</table>
	</div>
</div>


<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_PHOTOS_HOTLINK_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="middle"><th scope="row"><!--{$LANG_PHOTOS_HOTLINK_FORMAT1}--> </th><td>
			<input name="cfghotlinksize1box" type="checkbox" value="yes" <!--{if $CFGHOTLINKSIZE1 neq "no"}-->checked<!--{/if}-->> 
			<input name="cfghotlinksize1" type="text" value="<!--{if $CFGHOTLINKSIZE1 neq "no"}--><!--{$CFGHOTLINKSIZE1}--><!--{/if}-->" size="12"> <!--{$LANG_PHOTOS_HOTLINK_EXAMPLE}-->  
		</td></tr>
		<tr valign="middle"><th scope="row"><!--{$LANG_PHOTOS_HOTLINK_FORMAT2}--> </th><td>
			<input name="cfghotlinksize2box" type="checkbox" value="yes" <!--{if $CFGHOTLINKSIZE2 neq "no"}-->checked<!--{/if}-->> 
			<input name="cfghotlinksize2" type="text" value="<!--{if $CFGHOTLINKSIZE2 neq "no"}--><!--{$CFGHOTLINKSIZE2}--><!--{/if}-->" size="12"> <!--{$LANG_PHOTOS_HOTLINK_EXAMPLE}--> 
		</td></tr>
		<tr valign="middle"><th scope="row"><!--{$LANG_PHOTOS_HOTLINK_FORMAT3}--> </th><td>
			<input name="cfghotlinksize3box" type="checkbox" value="yes" <!--{if $CFGHOTLINKSIZE3 neq "no"}-->checked<!--{/if}-->> 
			<input name="cfghotlinksize3" type="text" value="<!--{if $CFGHOTLINKSIZE3 neq "no"}--><!--{$CFGHOTLINKSIZE3}--><!--{/if}-->" size="12"> <!--{$LANG_PHOTOS_HOTLINK_EXAMPLE}--> 
		</td></tr>
		<tr valign="middle"><th scope="row"><!--{$LANG_PHOTOS_HOTLINK_FORMAT4}--> </th><td>
			<input name="cfghotlinksize4box" type="checkbox" value="yes" <!--{if $CFGHOTLINKSIZE4 neq "no"}-->checked<!--{/if}-->> 
			<input name="cfghotlinksize4" type="text" value="<!--{if $CFGHOTLINKSIZE4 neq "no"}--><!--{$CFGHOTLINKSIZE4}--><!--{/if}-->" size="12"> <!--{$LANG_PHOTOS_HOTLINK_EXAMPLE}--> 
		</td></tr>
		<tr valign="middle"><th scope="row"><!--{$LANG_PHOTOS_HOTLINKERROR_ACTIVATE}--> </th><td><input name="cfghotlinkerrorcreate" type="checkbox" value="yes" <!--{$CFGHOTLINKERRORCREATE}-->></td></tr> 				
		</table>	
		<p>
			<strong><!--{$LANG_PHOTOS_TIP}--></strong><br />
			<!--{$LANG_PHOTOS_HOTLINK_TIP}-->
		</p>		
	</div>
</div>

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_PHOTOS_ARCHIVES_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
			<tr valign="middle"><th scope="row"><!--{$LANG_PHOTOS_ARCHIVES_ACTIVATE}--> </th><td><input name="cfgdeletelocalpictures" type="checkbox" value="no" <!--{$CFGDELETELOCALPICTURES}-->></td></tr> 		
			<tr><td colspan="2"><font color="red"><!--{$LANG_PHOTOS_ARCHIVES_WARNING}--></font></td></tr>			
			<tr valign="middle"><th scope="row"><!--{$LANG_PHOTOS_ARCHIVES_RESIZEACTIVATE}--> </th><td><input name="cfgarchivesize" type="checkbox" value="yes" <!--{$CFGARCHIVESIZE}-->> <!--{$LANG_PHOTOS_ARCHIVES_RESIZESIZE}--> <input name="cfgarchivesizeres" type="text" value="<!--{$CFGARCHIVESIZERES}-->" size="30"> </td></tr> 
			<tr valign="middle"><th scope="row"><!--{$LANG_PHOTOS_ARCHIVES_PICSIZE}--> </th><td><input name="cfgcaptureminisize" type="text" value="<!--{$CFGCAPTUREMINISIZE}-->" size="10"> bytes</td></tr> 
			<tr><td colspan="2"><i><!--{$LANG_PHOTOS_ARCHIVES_PICDELETE}--></i></td></tr>
			<tr valign="middle"><th scope="row"><!--{$LANG_PHOTOS_ARCHIVES_DELETEPICAFTER}--> </th><td><input name="cfgcapturedeleteafterdays" type="text" value="<!--{$CFGCAPTUREDELETEAFTERDAYS}-->" size="10"> <!--{$LANG_PHOTOS_ARCHIVES_DAYS}--></td></tr> 
			<tr><td colspan="2"><i><!--{$LANG_PHOTOS_ARCHIVES_DELETEPICAFTERDELETE}--></i></td></tr>
			<tr valign="middle"><th scope="row"><!--{$LANG_PHOTOS_ARCHIVES_MAXSIZE}--> </th><td><input name="cfgcapturemaxdirsize" type="text" value="<!--{$CFGCAPTUREMAXDIRSIZE}-->" size="10"> <!--{$LANG_PHOTOS_ARCHIVES_MB}--></td></tr> 
			<tr><td colspan="2"><i><!--{$LANG_PHOTOS_ARCHIVES_MAXSIZEDELETE}--></i></td></tr>
		</table>	
	</div>
</div>


<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_PHOTOS_FTP_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
			<tr valign="middle">
				<th scope="row"><!--{$LANG_PHOTOS_FTP_MAINFTP}--> </th>
				<td>
					<select name="cfgftpmainserverid">
						<option value="no" <!--{if $CFGFTPMAINSERVERID eq "no"}-->selected<!--{/if}-->><!--{$LANG_PHOTOS_FTP_DISABLED}--></option>
						<!--{section name=ftpservers start=1 loop=$CFGFTPSERVERSNB}-->
							<option value="<!--{$smarty.section.ftpservers.index}-->" <!--{if $CFGFTPMAINSERVERID eq $smarty.section.ftpservers.index}-->selected<!--{/if}-->><!--{$smarty.section.ftpservers.index}-->: <!--{$CFGFTPSERVERSNAME[ftpservers]}--></option>
						<!--{/section}-->						
					</select>
					<!--{$LANG_PHOTOS_FTP_MAINFTPRETRY}-->
					<select name="cfgftpmainserverretry">
						<option value="no" <!--{if $CFGFTPMAINSERVERRETRY eq "no"}-->selected<!--{/if}-->><!--{$LANG_PHOTOS_FTP_NORETRY}--></option>
						<!--{section name=cptloop start=1 loop=4}-->
							<option value="<!--{$smarty.section.cptloop.index}-->" <!--{if $CFGFTPMAINSERVERRETRY eq $smarty.section.cptloop.index}-->selected<!--{/if}-->><!--{$smarty.section.cptloop.index}--></option>
						<!--{/section}-->						
					</select>
				</td>
			</tr> 
			<tr valign="middle">
				<th scope="row"><!--{$LANG_PHOTOS_FTP_SECONDFTP}--> </th>
				<td>
					<select name="cfgftpsecondserverid">
						<option value="no" <!--{if $CFGFTPSECONDSERVERID eq "no"}-->selected<!--{/if}-->><!--{$LANG_PHOTOS_FTP_DISABLED}--></option>
						<!--{section name=ftpservers start=1 loop=$CFGFTPSERVERSNB}-->
							<option value="<!--{$smarty.section.ftpservers.index}-->" <!--{if $CFGFTPSECONDSERVERID eq $smarty.section.ftpservers.index}-->selected<!--{/if}-->><!--{$smarty.section.ftpservers.index}-->: <!--{$CFGFTPSERVERSNAME[ftpservers]}--></option>
						<!--{/section}-->							
					</select>
					<!--{$LANG_PHOTOS_FTP_SECONDFTPRETRY}-->
					<select name="cfgftpsecondserverretry">
						<option value="no" <!--{if $CFGFTPSECONDSERVERRETRY eq "no"}-->selected<!--{/if}-->><!--{$LANG_PHOTOS_FTP_NORETRY}--></option>
						<!--{section name=cptloop start=1 loop=4}-->
							<option value="<!--{$smarty.section.cptloop.index}-->" <!--{if $CFGFTPSECONDSERVERRETRY eq $smarty.section.cptloop.index}-->selected<!--{/if}-->><!--{$smarty.section.cptloop.index}--></option>
						<!--{/section}-->								
					</select>
				</td>
			</tr> 
			<tr valign="middle">
				<th scope="row"><!--{$LANG_PHOTOS_FTP_HOTLINKFTP}--> </th>
				<td>
					<select name="cfgftphotlinkserverid">
						<option value="no" <!--{if $CFGFTPHOTLINKSERVERID eq "no"}-->selected<!--{/if}-->><!--{$LANG_PHOTOS_FTP_DISABLED}--></option>
						<!--{section name=ftpservers start=1 loop=$CFGFTPSERVERSNB}-->
							<option value="<!--{$smarty.section.ftpservers.index}-->" <!--{if $CFGFTPHOTLINKSERVERID eq $smarty.section.ftpservers.index}-->selected<!--{/if}-->><!--{$smarty.section.ftpservers.index}-->: <!--{$CFGFTPSERVERSNAME[ftpservers]}--></option>
						<!--{/section}-->							
					</select>
					<!--{$LANG_PHOTOS_FTP_HOTLINKRETRY}-->
					<select name="cfgftphotlinkserverretry">
						<option value="no" <!--{if $CFGFTPHOTLINKSERVERRETRY eq "no"}-->selected<!--{/if}-->><!--{$LANG_PHOTOS_FTP_NORETRY}--></option>
						<!--{section name=cptloop start=1 loop=4}-->
							<option value="<!--{$smarty.section.cptloop.index}-->" <!--{if $CFGFTPHOTLINKSERVERRETRY eq $smarty.section.cptloop.index}-->selected<!--{/if}-->><!--{$smarty.section.cptloop.index}--></option>
						<!--{/section}-->								
					</select>
				</td>
			</tr> 
		</table>	
	</div>
</div>

<input name="accept" type="submit" value="<!--{$LANG_PHOTOS_BUTTON}-->" class="button-primary" >
</form>

</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->
