	<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_VIDEOS_SOURCE}--> <!--{$CONFIGWEBCAMSOURCE}--><!--{$LANG_VIDEOS_TITLE}--></h2>

<form method="post" action="<!--{$CONFIGURL}-->config-videoscustom.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">
<input type="hidden" name="submitform" value="1">				
<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_VIDEOS_DAILY_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
			<tr>
				<td align="center"><strong><span class="blue"></span></strong></td>			
				<td><strong><span class="blue"><!--{$LANG_VIDEOS_DAILY_FORMAT}--></span></strong></td>
				<td align="center"><strong><span class="blue"><!--{$LANG_VIDEOS_DAILY_WEB}--></span></strong></td>
				<td align="center"><strong><span class="blue"><!--{$LANG_VIDEOS_DAILY_DESCRIPTION}--></span></strong></td>				
				<td align="center"><strong><span class="blue"><!--{$LANG_VIDEOS_ADVANCED_FPS}--></span></strong></td>
				<td align="center"><strong><span class="blue"><!--{$LANG_VIDEOS_DAILY_MINSIZE}--></span></strong></td>										
				<td align="center"><strong><span class="blue"><!--{$LANG_VIDEOS_DAILY_SPEED}--></span></strong></td>											
			</tr>
			<tr>
				<td colspan="4"><strong><!--{$LANG_VIDEOS_DAILY_HD}--></strong></td>
				<td></td>
			</tr>
			<tr>
				<td align="center"><input name="cfgvideocodecH2641080pcreate" type="checkbox" value="yes" <!--{$CFGVIDEOCODECH2641080PCREATE}-->></td>
				<td>H. 264 (1080p): </td>
				<td align="center"><input name="cfgvideocodecH2641080pcreateflv" type="checkbox" value="yes" <!--{$CFGVIDEOCODECH2641080PCREATEFLV}-->></td>
				<td align="left"><!--{$LANG_VIDEOS_DAILY_HDMAX}--></td>
				<td align="center"><input name="cfgvideocodecH2641080pfps" type="text" value="<!--{$CFGVIDEOCODECH2641080PFPS}-->" size="2"></td>
				<td align="center"><input name="cfgvideocodecH2641080pminsize" type="text" value="<!--{$CFGVIDEOCODECH2641080PMINSIZE}-->" size="5"></td>
				<td align="center"><span class="red"><b>0.25 fps</b></span></td>						
			</tr>
			<tr>
				<td align="center"><input name="cfgvideocodecH264720pcreate" type="checkbox" value="yes" <!--{$CFGVIDEOCODECH264720PCREATE}-->></td>
				<td>H. 264 (720p): </td>
				<td align="center"><input name="cfgvideocodecH264720pcreateflv" type="checkbox" value="yes" <!--{$CFGVIDEOCODECH264720PCREATEFLV}-->></td>
				<td align="left"><!--{$LANG_VIDEOS_DAILY_HDGOOD}--></td>
				<td align="center"><input name="cfgvideocodecH264720pfps" type="text" value="<!--{$CFGVIDEOCODECH264720PFPS}-->" size="2"></td>
				<td align="center"><input name="cfgvideocodecH264720pminsize" type="text" value="<!--{$CFGVIDEOCODECH264720PMINSIZE}-->" size="5"></td>
				<td align="center"><span class="red"><b>0.50 fps</b></span></td>						
			</tr>			 		
		<tr><td colspan="4"><strong><!--{$LANG_VIDEOS_DAILY_SD}--></strong></td></tr>
			<tr>
				<td align="center"><input name="cfgvideocodecH264480pcreate" type="checkbox" value="yes" <!--{$CFGVIDEOCODECH264480PCREATE}-->></td>
				<td>H. 264 (480p): </td>
				<td align="center"><input name="cfgvideocodecH264480pcreateflv" type="checkbox" value="yes" <!--{$CFGVIDEOCODECH264480PCREATEFLV}-->></td>
				<td align="left"><!--{$LANG_VIDEOS_DAILY_SDDVD}--></td>
				<td align="center"><input name="cfgvideocodecH264480pfps" type="text" value="<!--{$CFGVIDEOCODECH264480PFPS}-->" size="2"></td>
				<td align="center"><input name="cfgvideocodecH264480pminsize" type="text" value="<!--{$CFGVIDEOCODECH264480PMINSIZE}-->" size="5"></td>
				<td align="center"><span class="red"><b>1.35 fps</b></span></td>						
			</tr>			
			<tr>
				<td align="center"><input name="cfgvideocodecH264customcreate" type="checkbox" value="yes" <!--{$CFGVIDEOCODECH264CUSTOMCREATE}-->></td>
				<td><!--{$LANG_VIDEOS_DAILY_CUSTOM}--> </td>
				<td align="center"><input name="cfgvideocodecH264customcreateflv" type="checkbox" value="yes" <!--{$CFGVIDEOCODECH264CUSTOMCREATEFLV}-->></td>
				<td align="left"><!--{$LANG_VIDEOS_DAILY_CUSTOMTXT}--></td>
				<td align="center"><input name="cfgvideocodecH264customfps" type="text" value="<!--{$CFGVIDEOCODECH264CUSTOMFPS}-->" size="2"></td>
				<td align="center"><input name="cfgvideocodecH264customminsize" type="text" value="<!--{$CFGVIDEOCODECH264CUSTOMMINSIZE}-->" size="5"></td>
				<td align="center">n/a</td>								
			</tr>			
			<tr>
		 	<td colspan="10">
				<p>
				 <!--{$LANG_VIDEOS_DAILY_WARNING}-->	 
				 </p>
		 	</td>
	   	</tr>
		</table>	
	</div>
</div>

<div id="commentstatusdiv" class="postbox closed">
	<h3 class="hndle"><span> <!--{$LANG_VIDEOS_ADVANCED_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
			<tr>
				<td align="center"><strong><span class="blue"></span></strong></td>			
				<td><strong><span class="blue"><!--{$LANG_VIDEOS_ADVANCED_FORMAT}--></span></strong></td>
				<td align="center"><strong><span class="blue"><!--{$LANG_VIDEOS_ADVANCED_BITRATE}--></span></strong></td>
				<td align="center"><strong><span class="blue"><!--{$LANG_VIDEOS_ADVANCED_RESOLUTION}--></span></strong></td>
				<td align="center"><strong><span class="blue"><!--{$LANG_VIDEOS_ADVANCED_CUT}--></span></strong></td>
				<td align="center"><strong><span class="blue"><!--{$LANG_VIDEOS_ADVANCED_PASSES}--></span></strong></td>									
			</tr>
			<tr>
				<td colspan="4"><strong><!--{$LANG_VIDEOS_ADVANCED_HD}--></strong></td>
				<td></td>
			</tr>
			<tr>
				<td align="center"></td>
				<td>H. 264 (1080p): </td>
				<td align="center"><!--{$CFGVIDEOCODECH2641080PBITRATE}--></td>
				<td align="center"><!--{$CFGVIDEOCODECH2641080PWIDTH}-->x1080</td>
				<td align="center"><!--{$CFGVIDEOCODECH2641080PCROPWIDTH}-->:<!--{$CFGVIDEOCODECH2641080PCROPHEIGHT}-->:0:<input name="cfgvideocodecH2641080pcropy" type="text" value="<!--{$CFGVIDEOCODECH2641080PCROPY}-->" size="4"></td>					
				<td align="center"><input name="cfgvideocodecH2641080p2pass" type="checkbox" value="yes" <!--{$CFGVIDEOCODECH2641080P2PASS}-->></td>					
			</tr>
			<tr>
				<td align="center"></td>
				<td>H. 264 (720p): </td>
				<td align="center"><!--{$CFGVIDEOCODECH264720PBITRATE}--></td>
				<td align="center"><!--{$CFGVIDEOCODECH264720PWIDTH}-->x720</td>
				<td align="center"><!--{$CFGVIDEOCODECH264720PCROPWIDTH}-->:<!--{$CFGVIDEOCODECH264720PCROPHEIGHT}-->:0:<input name="cfgvideocodecH264720pcropy" type="text" value="<!--{$CFGVIDEOCODECH264720PCROPY}-->" size="4"></td>					
				<td align="center"><input name="cfgvideocodecH264720p2pass" type="checkbox" value="yes" <!--{$CFGVIDEOCODECH264720P2PASS}-->></td>				
			</tr>			 		
		<tr><td colspan="4"><strong><!--{$LANG_VIDEOS_ADVANCED_SD}--></strong></td></tr>
			<tr>
				<td align="center"></td>
				<td>H. 264 (480p): </td>
				<td align="center"><!--{$CFGVIDEOCODECH264480PBITRATE}--></td>
				<td align="center"><!--{$CFGVIDEOCODECH264480PWIDTH}-->x480</td>
				<td align="center"><!--{$CFGVIDEOCODECH264480PCROPWIDTH}-->:<!--{$CFGVIDEOCODECH264480PCROPHEIGHT}-->:0:<input name="cfgvideocodecH264480pcropy" type="text" value="<!--{$CFGVIDEOCODECH264480PCROPY}-->" size="4"></td>					
				<td align="center"><input name="cfgvideocodecH264480p2pass" type="checkbox" value="yes" <!--{$CFGVIDEOCODECH264480P2PASS}-->></td>						
			</tr>			
			<tr>
				<td align="center"></td>
				<td><!--{$LANG_VIDEOS_ADVANCED_CUSTOM}--> </td>
				<td align="center"><input name="cfgvideocodecH264custombitrate" type="text" value="<!--{$CFGVIDEOCODECH264CUSTOMBITRATE}-->" size="4"></td>
				<td align="center">
					<input name="cfgvideocodecH264customwidth" type="text" value="<!--{$CFGVIDEOCODECH264CUSTOMWIDTH}-->" size="4">
					x
					<input name="cfgvideocodecH264customheight" type="text" value="<!--{$CFGVIDEOCODECH264CUSTOMHEIGHT}-->" size="4"></td>
				<td align="center">
					<input name="cfgvideocodecH264customcropwidth" type="text" value="<!--{$CFGVIDEOCODECH264CUSTOMCROPWIDTH}-->" size="4">:
					<input name="cfgvideocodecH264customcropheight" type="text" value="<!--{$CFGVIDEOCODECH264CUSTOMCROPHEIGHT}-->" size="4">:
					<input name="cfgvideocodecH264customcropx" type="text" value="<!--{$CFGVIDEOCODECH264CUSTOMCROPX}-->" size="4">:
					<input name="cfgvideocodecH264customcropy" type="text" value="<!--{$CFGVIDEOCODECH264CUSTOMCROPY}-->" size="4">
				</td>					
				<td align="center"><input name="cfgvideocodecH264custom2pass" type="checkbox" value="yes" <!--{$CFGVIDEOCODECH264CUSTOM2PASS}-->></td>						
			</tr>	
		</table>	
	</div>
</div>

<div id="commentstatusdiv" class="postbox <!--{if $CFGFILTERACTIVATE neq "checked"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_VIDEOS_FILTER_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
			<tr valign="top"><th scope="row"><!--{$LANG_VIDEOS_FILTER_ACTIVATE}--></th><td><input name="cfgfilteractivate" type="checkbox" value="yes" <!--{$CFGFILTERACTIVATE}-->></td></tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_VIDEOS_FILTER_WATERMARKFILE}--></th><td>
				<select name="cfgfilterwatermarkfile">
						<option value="no"<!--{if $CFGFILTERWATERMARKFILE eq "no"}--> selected="selected"<!--{/if}-->	>None</option>
					<!--{section name=watermarkfiles loop=$CPTWATERMARKFILES}-->					
						<!--{if $WATERMARKFILES[watermarkfiles] eq $CFGFILTERWATERMARKFILE}-->
							<option value="<!--{$WATERMARKFILES[watermarkfiles]}-->" selected="selected"><!--{$WATERMARKFILES[watermarkfiles]}--></option>
						<!--{else}-->
							<option value="<!--{$WATERMARKFILES[watermarkfiles]}-->"><!--{$WATERMARKFILES[watermarkfiles]}--></option>
						<!--{/if}-->
					<!--{/section}-->						
				</select>
			</td></tr>
			<tr valign="middle"><th scope="row"><!--{$LANG_VIDEOS_FILTER_VALUE}--> </th><td><input name="cfgfiltervalue" type="text" value="<!--{$CFGFILTERVALUE}-->" width="5"> (ex: 0.323)</td></tr> 
		</table>
		<p>
			<strong><!--{$LANG_VIDEOS_TIP}--></strong><br />
		  	<!--{$LANG_VIDEOS_FILTER_TIP}-->
		</p>		
	</div>
</div>

<div id="commentstatusdiv" class="postbox closed">
	<h3 class="hndle"><span><!--{$LANG_VIDEOS_PHIDGET_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
			<tr>
				<td colspan="5"></td>
				<td colspan="5" align="center"><b><!--{$LANG_CONFIGAVANCE_VIDEOS_INSERTIMAGE}--></b></td>
			</tr>
			<tr align="center">
				<td><b><!--{$LANG_VIDEOS_PHIDGET_SENSOR}--></b></td>				
				<td><b><!--{$LANG_VIDEOS_PHIDGET_TYPE}--></b></td>
				<td><b><!--{$LANG_VIDEOS_PHIDGET_TEXT}--></b></td>
				<td><b><!--{$LANG_VIDEOS_PHIDGET_COLOR}--></b></td>
				<td><b><!--{$LANG_VIDEOS_PHIDGET_INSERT}--></b></td>
				<td><b><!--{$LANG_VIDEOS_PHIDGET_RESOLUTION}--></b></td>
				<td><b><!--{$LANG_VIDEOS_PHIDGET_TRANSPARENCY}--></b></td>
				<td><b><!--{$LANG_VIDEOS_PHIDGET_XLOCATION}--></b></td>
				<td><b><!--{$LANG_VIDEOS_PHIDGET_YLOCATION}--></b></td>
			</tr>
			<!--{section name=capteurs start=1 loop=5}-->
			<tr align="center">
				<td><!--{$smarty.section.capteurs.index}--></td>	
				<td>
					<select name="srcfgsensortype-<!--{$smarty.section.capteurs.index}-->">
						<option value="no" <!--{if $SRCCFGSENSORTYPE[capteurs] eq "no"}-->selected<!--{/if}-->><!--{$LANG_VIDEOS_ERROR_DISABLED}--></option>
						<!--{section name=phidget start=1 loop=$CFGPHIDGETSENSORTYPENB}-->
							<option value="<!--{$CFGPHIDGETSENSORTYPE[phidget]}-->" <!--{if $SRCCFGSENSORTYPE[capteurs] eq $CFGPHIDGETSENSORTYPE[phidget]}-->selected<!--{/if}-->><!--{$CFGPHIDGETSENSORTYPE[phidget]}--></option>
						<!--{/section}-->
					</select>
				</td>
				<td><input name="srcfgsensortext-<!--{$smarty.section.capteurs.index}-->" type="text" value="<!--{$SRCCFGSENSORTEXT[capteurs]}-->" size="15"></td>	
				<td><input name="srcfgsensorcolor-<!--{$smarty.section.capteurs.index}-->" type="text" value="<!--{$SRCCFGSENSORCOLOR[capteurs]}-->" size="8"></td>	
				<td><input name="srcfgsensorinsert-<!--{$smarty.section.capteurs.index}-->" type="checkbox" value="yes" <!--{$SRCCFGSENSORINSERT[capteurs]}-->></td>
				<td><input name="srcfgsensorsize-<!--{$smarty.section.capteurs.index}-->" type="text" value="<!--{$SRCCFGSENSORSIZE[capteurs]}-->" size="8"></td>	
				<td><input name="srcfgsensortransparency-<!--{$smarty.section.capteurs.index}-->" type="text" value="<!--{$SRCCFGSENSORTRANSPARENCY[capteurs]}-->" size="3"></td>	
				<td><input name="srcfgsensorposx-<!--{$smarty.section.capteurs.index}-->" type="text" value="<!--{$SRCCFGSENSORPOSX[capteurs]}-->" size="4"></td>	
				<td><input name="srcfgsensorposy-<!--{$smarty.section.capteurs.index}-->" type="text" value="<!--{$SRCCFGSENSORPOSY[capteurs]}-->" size="4"></td>	
			</tr>
			<!--{/section}-->
		</table>
	</div>
</div>

<div id="commentstatusdiv" class="postbox <!--{if $CFGWATERMARKACTIVATE neq "checked"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_VIDEOS_WATERMARK_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
			<tr valign="top"><th scope="row"><!--{$LANG_VIDEOS_WATERMARK_ADDWATERMARK}--></th><td><input name="cfgwatermarkactivate" type="checkbox" value="yes" <!--{$CFGWATERMARKACTIVATE}-->></td></tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_VIDEOS_WATERMARK_WATERMARKFILE}--></th><td>
				<select name="cfgwatermarkfile">
					<!--{section name=watermarkfiles loop=$CPTWATERMARKFILES}-->
						<!--{if $WATERMARKFILES[watermarkfiles] eq $CFGWATERMARKFILE}-->
							<option value="<!--{$WATERMARKFILES[watermarkfiles]}-->" selected="selected"><!--{$WATERMARKFILES[watermarkfiles]}--></option>
						<!--{else}-->
							<option value="<!--{$WATERMARKFILES[watermarkfiles]}-->"><!--{$WATERMARKFILES[watermarkfiles]}--></option>
						<!--{/if}-->
					<!--{/section}-->						
				</select>
			</td></tr>
			<tr valign="top"><th scope="row"><!--{$LANG_VIDEOS_WATERMARK_TRANSPARENCY}--> </th><td><input name="cfgwatermarkdissolve" type="text" value="<!--{$CFGWATERMARKDISSOLVE}-->" width="5">%</td></tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_VIDEOS_WATERMARK_XCOORDINATE}--></th><td><input name="cfgwatermarkpositionx" type="text" value="<!--{$CFGWATERMARKPOSITIONX}-->" width="5"></td></tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_VIDEOS_WATERMARK_YCOORDINATE}--> </th><td><input name="cfgwatermarkpositiony" type="text" value="<!--{$CFGWATERMARKPOSITIONY}-->" width="5"></td></tr> 		
		</table>
		<p>
			<strong><!--{$LANG_VIDEOS_TIP}--></strong><br />
		  	<!--{$LANG_VIDEOS_WATERMARK_TIP}-->
		</p>		
	</div>
</div>

<div id="commentstatusdiv" class="postbox <!--{if $CFGVIDEOPREIMAGEMAGICKTXT neq "checked"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_VIDEOS_PREPROCESS_TITLE}--></span></h3>
	<div class="inside">
		<p>
			<!--{$LANG_VIDEOS_PREPROCESS_TEXT}-->
		</p>
		<table class="form-table">
			<tr><td colspan="2"><strong><!--{$LANG_VIDEOS_PREPROCESS_LEGEND}--></strong></td></tr>		
			<tr valign="top"><td><!--{$LANG_VIDEOS_PREPROCESS_LEGENDTXT}--></td><td><input name="cfgvideopreimagemagicktxt" type="checkbox" value="yes" <!--{$CFGVIDEOPREIMAGEMAGICKTXT}-->></td></tr> 
			<tr valign="top"><td><!--{$LANG_VIDEOS_PREPROCESS_LEGENDVALUE}--> </td><td><input name="cfgvideopreimgtext" type="text" value="<!--{$CFGVIDEOPREIMGTEXT}-->" size="30"></td></tr> 
			<tr valign="top"><td><!--{$LANG_VIDEOS_PREPROCESS_FORMAT}--> </td><td>
					<select name="cfgvideopreimgdateformat">
						<option value="0"><!--{$LANG_VIDEOS_PREPROCESS_NODATE}--></option>
						<option value="1" <!--{if $CFGVIDEOPREIMGDATEFORMAT eq "1"}--> selected<!--{/if}-->>25/01/2010 - 09h30</option>
						<option value="2" <!--{if $CFGVIDEOPREIMGDATEFORMAT eq "2"}--> selected<!--{/if}-->>25/01/2010</option>
						<option value="3" <!--{if $CFGVIDEOPREIMGDATEFORMAT eq "3"}--> selected<!--{/if}-->>09h30</option>
						<option value="4" <!--{if $CFGVIDEOPREIMGDATEFORMAT eq "4"}--> selected<!--{/if}-->><!--{$LANG_VIDEOS_PREPROCESS_FORMAT4}--></option>
						<option value="5" <!--{if $CFGVIDEOPREIMGDATEFORMAT eq "5"}--> selected<!--{/if}-->><!--{$LANG_VIDEOS_PREPROCESS_FORMAT5}--></option>
					</select>
			</td></tr> 
			<tr valign="top"><td><b><!--{$LANG_VIDEOS_PREPROCESS_ADVANCED}--></b></td></tr>
			<tr valign="top"><td><!--{$LANG_VIDEOS_PREPROCESS_FONTSIZE}--> </td><td><input name="cfgvideopreimgtextsize" type="text" value="<!--{$CFGVIDEOPREIMGTEXTSIZE}-->"></td></tr> 
			<tr valign="top"><td><!--{$LANG_VIDEOS_PREPROCESS_FONTLOCATION}--> </td>
			<td>
				<select name="cfgvideopreimgtextgravity">
					<option value="southwest" <!--{if $CFGVIDEOPREIMGTEXTGRAVITY eq "southwest"}--> selected<!--{/if}-->><!--{$LANG_VIDEOS_PREPROCESS_FONTSOUTHWEST}--></option>
					<option value="south" <!--{if $CFGVIDEOPREIMGTEXTGRAVITY eq "south"}--> selected<!--{/if}-->><!--{$LANG_VIDEOS_PREPROCESS_FONTSOUTH}--></option>
					<option value="southeast" <!--{if $CFGVIDEOPREIMGTEXTGRAVITY eq "southeast"}--> selected<!--{/if}-->><!--{$LANG_VIDEOS_PREPROCESS_FONTSOUTHEAST}--></option>
					<option value="east" <!--{if $CFGVIDEOPREIMGTEXTGRAVITY eq "east"}--> selected<!--{/if}-->><!--{$LANG_VIDEOS_PREPROCESS_FONTEAST}--></option>
					<option value="northeast" <!--{if $CFGVIDEOPREIMGTEXTGRAVITY eq "northeast"}--> selected<!--{/if}-->><!--{$LANG_VIDEOS_PREPROCESS_FONTNORTHEAST}--></option>
					<option value="north" <!--{if $CFGVIDEOPREIMGTEXTGRAVITY eq "north"}--> selected<!--{/if}-->><!--{$LANG_VIDEOS_PREPROCESS_FONTNORTH}--></option>
					<option value="northwest" <!--{if $CFGVIDEOPREIMGTEXTGRAVITY eq "northwest"}--> selected<!--{/if}-->><!--{$LANG_VIDEOS_PREPROCESS_FONTNORTWEST}--></option>
					<option value="west" <!--{if $CFGVIDEOPREIMGTEXTGRAVITY eq "west"}--> selected<!--{/if}-->><!--{$LANG_VIDEOS_PREPROCESS_FONTWEST}--></option>
				</select>					
			</td>
			</tr> 
			<tr valign="top"><td><!--{$LANG_VIDEOS_PREPROCESS_FONTNAME}--></td>
			<td>
				<select name="cfgvideopreimgtextfont">
					<!--{section name=fonts loop=$FONTSCPT}-->
						<!--{if $FONTSLIST[fonts] eq $CFGVIDEOPREIMGTEXTFONT}-->
							<option value="<!--{$FONTSLIST[fonts]}-->" selected><!--{$FONTSLIST[fonts]}--></option>
						<!--{else}-->
							<option value="<!--{$FONTSLIST[fonts]}-->"><!--{$FONTSLIST[fonts]}--></option>
						<!--{/if}-->
					<!--{/section}-->						
				</select>
			</td>
			</tr> 
			<tr valign="top"><td><!--{$LANG_VIDEOS_PREPROCESS_FONTCOLOR}--></td><td><input name="cfgvideopreimgtextovercolor" type="text" value="<!--{$CFGVIDEOPREIMGTEXTOVERCOLOR}-->"></td></tr> 
			<tr valign="top"><td><!--{$LANG_VIDEOS_PREPROCESS_FONTCOORDINATES}--> </td><td><input name="cfgvideopreimgtextoverposition" type="text" value="<!--{$CFGVIDEOPREIMGTEXTOVERPOSITION}-->"></td></tr> 
			<tr valign="top"><td><!--{$LANG_VIDEOS_PREPROCESS_FONTSHADOWCOLOR}--></td><td><input name="cfgvideopreimgtextbasecolor" type="text" value="<!--{$CFGVIDEOPREIMGTEXTBASECOLOR}-->"></td></tr> 
			<tr valign="top"><td><!--{$LANG_VIDEOS_PREPROCESS_FONTSHADOWCOORDINATES}--> </td><td><input name="cfgvideopreimgtextbaseposition" type="text" value="<!--{$CFGVIDEOPREIMGTEXTBASEPOSITION}-->"></td></tr> 
			<tr><td colspan="2"><strong><!--{$LANG_VIDEOS_PREPROCESS_RESIZE}--></strong></td></tr>
			<tr valign="top"><td width="200"><!--{$LANG_VIDEOS_PREPROCESS_RESIZETXT}--></td><td><input name="cfgvideopreresize" type="checkbox" value="yes" <!--{$CFGVIDEOPRERESIZE}-->></td></tr> 
			<tr valign="top"><td><!--{$LANG_VIDEOS_PREPROCESS_RESIZETXTVALUE}--></td><td><input name="cfgvideopreresizeres" type="text" value="<!--{$CFGVIDEOPRERESIZERES}-->" size="15"></td></tr> 
			<tr><td colspan="2"><strong><!--{$LANG_VIDEOS_DAILY_EFFECT}--></strong></td></tr>
			<tr valign="top"><td width="200"><!--{$LANG_VIDEOS_DAILY_EFFECT}--></td><td>
					<select name="cfgvideoeffect">
						<option value="no" <!--{if $CFGVIDEOEFFECT eq "no"}--> selected<!--{/if}-->><!--{$LANG_VIDEOS_DAILY_NO}--></option>
						<option value="tiltshift" <!--{if $CFGVIDEOEFFECT eq "tiltshift"}--> selected<!--{/if}-->>Tilt Shift</option>
						<option value="charcoal" <!--{if $CFGVIDEOEFFECT eq "charcoal"}--> selected<!--{/if}-->>Charcoal</option>
						<option value="colorin" <!--{if $CFGVIDEOEFFECT eq "colorin"}--> selected<!--{/if}-->>Color-in</option>
						<option value="sketch" <!--{if $CFGVIDEOEFFECT eq "sketch"}--> selected<!--{/if}-->>Sketch</option>
					</select>
			</td></tr> 
		</table>
		<p>
			<strong>	<!--{$LANG_VIDEOS_TIP}--></strong><br />
		  	<!--{$LANG_VIDEOS_PREPROCESS_TIP}-->
		</p>		
	</div>
</div>


<div id="commentstatusdiv" class="postbox <!--{if $CFGVIDEOYOUTUBEUPLOAD neq "checked"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_VIDEOS_YOUTUBE_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
			<tr valign="top"><th scope="row"><!--{$LANG_VIDEOS_YOUTUBE_ACTIVATE}--></th><td><input name="cfgvideoyoutubeupload" type="checkbox" value="yes" <!--{$CFGVIDEOYOUTUBEUPLOAD}-->></td></tr> 
			<tr valign="top"><th scope="row"><!--{$LANG_VIDEOS_YOUTUBE_CATEGORY}--></th><td>
				<select name="cfgvideoyoutubecategory">
					<option value="Film" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "Film"}--> selected<!--{/if}-->>Film</option>
					<option value="Autos" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "Autos"}--> selected<!--{/if}-->>Autos</option>
					<option value="Music" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "Music"}--> selected<!--{/if}-->>Music</option>
					<option value="Animals" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "Animals"}--> selected<!--{/if}-->>Animals</option>
					<option value="Sports" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "Sports"}--> selected<!--{/if}-->>Sports</option>
					<option value="Travel" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "Travel"}--> selected<!--{/if}-->>Travel</option>
					<option value="Shortmov" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "Shortmov"}--> selected<!--{/if}-->>Shortmov</option>
					<option value="Games" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "Games"}--> selected<!--{/if}-->>Games</option>
					<option value="Comedy" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "Comedy"}--> selected<!--{/if}-->>Comedy</option>
					<option value="People" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "People"}--> selected<!--{/if}-->>People</option>
					<option value="News" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "News"}--> selected<!--{/if}-->>News</option>
					<option value="Entertainment" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "Entertainment"}--> selected<!--{/if}-->>Entertainment</option>
					<option value="Education" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "Education"}--> selected<!--{/if}-->>Education</option>
					<option value="Howto" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "Howto"}--> selected<!--{/if}-->>Howto</option>
					<option value="Nonprofit" <!--{if $CFGVIDEOYOUTUBECATEGORY eq "Nonprofit"}--> selected<!--{/if}-->>Nonprofit</option>
				</select>
			</td></tr> 
		</table>
		<p>
			<strong><!--{$LANG_VIDEOS_TIP}--></strong><br />
		  	<!--{$LANG_VIDEOS_YOUTUBE_TIP}-->
		</p>		
	</div>
</div>





<p>
	<input name="accept" type="submit" value="<!--{$LANG_VIDEOS_BUTTON}-->" class="button-primary" >
</p>
<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_VIDEOS_CUSTOM_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
		<tr><th scope="row"><!--{$LANG_VIDEOS_CUSTOM_FILENAME}--> </th><td><input name="cfgcustomvidname" type="text" value="<!--{$CFGCUSTOMVIDNAME}-->"></td></tr> 
		<tr><th scope="row"><!--{$LANG_VIDEOS_CUSTOM_FROM}-->  </th>
		<td>
			<select name="cfgcustomstartday">
			<!--{section name=day loop=$CPTDAY}-->
				<!--{if $DAYTXT[day] eq $CFGCUSTOMSTARTDAY}-->
					<option value="<!--{$DAYTXT[day]}-->" selected="selected"><!--{$DAYTXT[day]}--></option>
				<!--{else}-->
					<option value="<!--{$DAYTXT[day]}-->"><!--{$DAYTXT[day]}--></option>
				<!--{/if}-->
			<!--{/section}-->		
			</select>
			<select name="cfgcustomstartmonth">
				<option value="01" <!--{if $CFGCUSTOMSTARTMONTH eq "01"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_JANUARY}--></option>
				<option value="02" <!--{if $CFGCUSTOMSTARTMONTH eq "02"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_FEBRUARY}--></option>
				<option value="03" <!--{if $CFGCUSTOMSTARTMONTH eq "03"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_MARCH}--></option>
				<option value="04" <!--{if $CFGCUSTOMSTARTMONTH eq "04"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_APRIL}--></option>
				<option value="05" <!--{if $CFGCUSTOMSTARTMONTH eq "05"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_MAY}--></option>
				<option value="06" <!--{if $CFGCUSTOMSTARTMONTH eq "06"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_JUNE}--></option>
				<option value="07" <!--{if $CFGCUSTOMSTARTMONTH eq "07"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_JULY}--></option>
				<option value="08" <!--{if $CFGCUSTOMSTARTMONTH eq "08"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_AUGUST}--></option>
				<option value="09" <!--{if $CFGCUSTOMSTARTMONTH eq "09"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_SEPTEMBER}--></option>
				<option value="10" <!--{if $CFGCUSTOMSTARTMONTH eq "10"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_OCTOBER}--></option>
				<option value="11" <!--{if $CFGCUSTOMSTARTMONTH eq "11"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_NOVEMBER}--></option>
				<option value="12" <!--{if $CFGCUSTOMSTARTMONTH eq "12"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_DECEMBER}--></option>
			</select>
			<select name="cfgcustomstartyear">
			<!--{section name=year loop=$CPTYEAR}-->
				<!--{if $YEARTXT[year] eq $CFGCUSTOMSTARTYEAR}-->
					<option value="<!--{$YEARTXT[year]}-->" selected="selected"><!--{$YEARTXT[year]}--></option>
				<!--{else}-->
					<option value="<!--{$YEARTXT[year]}-->"><!--{$YEARTXT[year]}--></option>
				<!--{/if}-->
			<!--{/section}-->		
			</select>
			<!--{$LANG_VIDEOS_CUSTOM_AT}-->
			<select name="cfgcustomstarthour">
			<!--{section name=hour loop=$CPTHOUR}-->
				<!--{if $HOURTXT[hour] eq $CFGCUSTOMSTARTHOUR}-->
					<option value="<!--{$HOURTXT[hour]}-->" selected="selected"><!--{$HOURTXT[hour]}--></option>
				<!--{else}-->
					<option value="<!--{$HOURTXT[hour]}-->"><!--{$HOURTXT[hour]}--></option>
				<!--{/if}-->
			<!--{/section}-->		
			</select>
			h 
			<select name="cfgcustomstartminute">
			<!--{section name=minute loop=$CPTMINUTE}-->
				<!--{if $MINUTETXT[minute] eq $CFGCUSTOMSTARTMINUTE}-->
					<option value="<!--{$MINUTETXT[minute]}-->" selected="selected"><!--{$MINUTETXT[minute]}--></option>
				<!--{else}-->
					<option value="<!--{$MINUTETXT[minute]}-->"><!--{$MINUTETXT[minute]}--></option>
				<!--{/if}-->
			<!--{/section}-->
			</select>
		</td></tr> 
		<tr><th scope="row"><!--{$LANG_VIDEOS_CUSTOM_TO}--> </th>
		<td>
			<select name="cfgcustomendday">
			<!--{section name=day loop=$CPTDAY}-->
				<!--{if $DAYTXT[day] eq $CFGCUSTOMENDDAY}-->
					<option value="<!--{$DAYTXT[day]}-->" selected="selected"><!--{$DAYTXT[day]}--></option>
				<!--{else}-->
					<option value="<!--{$DAYTXT[day]}-->"><!--{$DAYTXT[day]}--></option>
				<!--{/if}-->
			<!--{/section}-->		
			</select>
			<select name="cfgcustomendmonth">
				<option value="01" <!--{if $CFGCUSTOMENDMONTH eq "01"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_JANUARY}--></option>
				<option value="02" <!--{if $CFGCUSTOMENDMONTH eq "02"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_FEBRUARY}--></option>
				<option value="03" <!--{if $CFGCUSTOMENDMONTH eq "03"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_MARCH}--></option>
				<option value="04" <!--{if $CFGCUSTOMENDMONTH eq "04"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_APRIL}--></option>
				<option value="05" <!--{if $CFGCUSTOMENDMONTH eq "05"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_MAY}--></option>
				<option value="06" <!--{if $CFGCUSTOMENDMONTH eq "06"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_JUNE}--></option>
				<option value="07" <!--{if $CFGCUSTOMENDMONTH eq "07"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_JULY}--></option>
				<option value="08" <!--{if $CFGCUSTOMENDMONTH eq "08"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_AUGUST}--></option>
				<option value="09" <!--{if $CFGCUSTOMENDMONTH eq "09"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_SEPTEMBER}--></option>
				<option value="10" <!--{if $CFGCUSTOMENDMONTH eq "10"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_OCTOBER}--></option>
				<option value="11" <!--{if $CFGCUSTOMENDMONTH eq "11"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_NOVEMBER}--></option>
				<option value="12" <!--{if $CFGCUSTOMENDMONTH eq "12"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_DECEMBER}--></option>
			</select>
			<select name="cfgcustomendyear">
			<!--{section name=year loop=$CPTYEAR}-->
				<!--{if $YEARTXT[year] eq $CFGCUSTOMENDYEAR}-->
					<option value="<!--{$YEARTXT[year]}-->" selected="selected"><!--{$YEARTXT[year]}--></option>
				<!--{else}-->
					<option value="<!--{$YEARTXT[year]}-->"><!--{$YEARTXT[year]}--></option>
				<!--{/if}-->
			<!--{/section}-->		
			</select>
			<!--{$LANG_VIDEOS_CUSTOM_AT}--> 
			<select name="cfgcustomendhour">
			<!--{section name=hour loop=$CPTHOUR}-->
				<!--{if $HOURTXT[hour] eq $CFGCUSTOMENDHOUR}-->
					<option value="<!--{$HOURTXT[hour]}-->" selected="selected"><!--{$HOURTXT[hour]}--></option>
				<!--{else}-->
					<option value="<!--{$HOURTXT[hour]}-->"><!--{$HOURTXT[hour]}--></option>
				<!--{/if}-->
			<!--{/section}-->		
			</select>
			h 
			<select name="cfgcustomendminute">
			<!--{section name=minute loop=$CPTMINUTE}-->
				<!--{if $MINUTETXT[minute] eq $CFGCUSTOMENDMINUTE}-->
					<option value="<!--{$MINUTETXT[minute]}-->" selected="selected"><!--{$MINUTETXT[minute]}--></option>
				<!--{else}-->
					<option value="<!--{$MINUTETXT[minute]}-->"><!--{$MINUTETXT[minute]}--></option>
				<!--{/if}-->
			<!--{/section}-->
			</select>
		</td></tr> 
		<tr><th scope="row"><!--{$LANG_VIDEOS_CUSTOM_KEEPPICTURES}--> </th><td>
			<select name="cfgcustomkeepstarthour">
			<!--{section name=hour loop=$CPTHOUR}-->
				<!--{if $HOURTXT[hour] eq $CFGCUSTOMKEEPSTARTHOUR}-->
					<option value="<!--{$HOURTXT[hour]}-->" selected="selected"><!--{$HOURTXT[hour]}--></option>
				<!--{else}-->
					<option value="<!--{$HOURTXT[hour]}-->"><!--{$HOURTXT[hour]}--></option>
				<!--{/if}-->
			<!--{/section}-->		
			</select>
			h 
			<select name="cfgcustomkeepstartminute">
			<!--{section name=minute loop=$CPTMINUTE}-->
				<!--{if $MINUTETXT[minute] eq $CFGCUSTOMKEEPSTARTMINUTE}-->
					<option value="<!--{$MINUTETXT[minute]}-->" selected="selected"><!--{$MINUTETXT[minute]}--></option>
				<!--{else}-->
					<option value="<!--{$MINUTETXT[minute]}-->"><!--{$MINUTETXT[minute]}--></option>
				<!--{/if}-->
			<!--{/section}-->
			</select>
			<!--{$LANG_VIDEOS_CUSTOM_AND}-->
			<select name="cfgcustomkeependhour">
			<!--{section name=hour loop=$CPTHOUR}-->
				<!--{if $HOURTXT[hour] eq $CFGCUSTOMKEEPENDHOUR}-->
					<option value="<!--{$HOURTXT[hour]}-->" selected="selected"><!--{$HOURTXT[hour]}--></option>
				<!--{else}-->
					<option value="<!--{$HOURTXT[hour]}-->"><!--{$HOURTXT[hour]}--></option>
				<!--{/if}-->
			<!--{/section}-->		
			</select>
			h 
			<select name="cfgcustomkeependminute">
			<!--{section name=minute loop=$CPTMINUTE}-->
				<!--{if $MINUTETXT[minute] eq $CFGCUSTOMKEEPENDMINUTE}-->
					<option value="<!--{$MINUTETXT[minute]}-->" selected="selected"><!--{$MINUTETXT[minute]}--></option>
				<!--{else}-->
					<option value="<!--{$MINUTETXT[minute]}-->"><!--{$MINUTETXT[minute]}--></option>
				<!--{/if}-->
			<!--{/section}-->
			</select>
		</td></tr>
		<tr valign="top">
			<th scope="row"><!--{$LANG_VIDEOS_CUSTOM_MININTERVAL}--></th>		
			<td colspan="2">
				<input name="cfgvidminintervalvalue" type="text" value="<!--{$CFGVIDMININTERVALVALUE}-->" size="2">	
				<select name="cfgvidmininterval">
					<option value="seconds" <!--{if $CFGVIDMININTERVAL eq "seconds"}-->selected<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_MININTERVAL_SECONDS}--></option>
					<option value="minutes" <!--{if $CFGVIDMININTERVAL eq "minutes"}-->selected<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_MININTERVAL_MINUTES}--></option>
				</select>		
			</td>
		</tr>			
		<tr valign="top"><th scope="row"><!--{$LANG_VIDEOS_CUSTOM_ADDAUDIO}--></th><td><input name="cfgvideoaddaudio" type="checkbox" value="yes" <!--{$CFGVIDEOADDAUDIO}-->></td></tr> 
		<tr valign="top"><th scope="row"><!--{$LANG_VIDEOS_CUSTOM_AUDIOFILE}--></th><td>
			<select name="cfgvideoaudiofile">
				<!--{section name=audiofiles loop=$CPTAUDIOFILES}-->
					<!--{if $AUDIOFILES[audiofiles] eq $CFGVIDEOAUDIOFILE}-->
						<option value="<!--{$AUDIOFILES[audiofiles]}-->" selected="selected"><!--{$AUDIOFILES[audiofiles]}--></option>
					<!--{else}-->
						<option value="<!--{$AUDIOFILES[audiofiles]}-->"><!--{$AUDIOFILES[audiofiles]}--></option>
					<!--{/if}-->
				<!--{/section}-->						
			</select>
		</td></tr>
		<tr valign="middle"><th scope="row"><!--{$LANG_VIDEOS_CUSTOM_EMAIL}--></th>		
			<td><input name="cfgemailmovieactivate" type="checkbox" value="yes" <!--{$CFGEMAILMOVIEACTIVATE}-->></td>
		</tr>
		<tr><th scope="row"><!--{$LANG_VIDEOS_CUSTOM_START}--> </th><td>
			<select name="cfgcustomactive">
				<option value="off" <!--{if $CFGCUSTOMACTIVE eq "no"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_DISABLED}--></option>
				<option value="planon" <!--{if $CFGCUSTOMACTIVE eq "planon"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_ASAP}--></option>
				<option value="plan04" <!--{if $CFGCUSTOMACTIVE eq "plan04"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_NIGHT}--></option>
			</select>				
		</td></tr>						
		</table>	
		<p>
			<strong><!--{$LANG_VIDEOS_TIP}--></strong><br />
			<!--{$LANG_VIDEOS_CUSTOM_TIP}-->
		</p>		
	</div>
</div>

<input name="accept" type="submit" value="<!--{$LANG_VIDEOS_BUTTON}-->" class="button-primary" >
</form>

</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->
