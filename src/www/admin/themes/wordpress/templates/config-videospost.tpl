	<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_VIDEOS_SOURCE}--> <!--{$CONFIGWEBCAMSOURCE}--><!--{$LANG_VIDEOS_TITLE}--></h2>

<form method="post" action="<!--{$CONFIGURL}-->config-videospost.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">
<input type="hidden" name="submitform" value="1">				
<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">

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

<div id="commentstatusdiv" class="postbox <!--{if $CFGCROPACTIVATE neq "checked"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_VIDEOS_DIMENSIONS_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="middle"><th scope="row"><!--{$LANG_VIDEOS_DIMENSIONS_ACTIVATE}--></th><td><input name="cfgcropactivate" type="checkbox" value="yes" <!--{$CFGCROPACTIVATE}-->></td></tr> 
		<tr valign="middle">
			<th scope="row"><!--{$LANG_VIDEOS_DIMENSIONS_CROPZONE}--></th>
			<td>
				<input name="cfgcropsizewidth" type="text" value="<!--{$CFGCROPSIZEWIDTH}-->" size="6">
				x
				<input name="cfgcropsizeheight" type="text" value="<!--{$CFGCROPSIZEHEIGHT}-->" size="6">
			</td>
		</tr>
		<tr valign="middle">
			<th scope="row"><!--{$LANG_VIDEOS_DIMENSIONS_CROPLOCATION}--></th>
			<td>
				X: <input name="cfgcropxpos" type="text" value="<!--{$CFGCROPXPOS}-->" size="6">, 
				Y: <input name="cfgcropypos" type="text" value="<!--{$CFGCROPYPOS}-->" size="6">
			</td>
		</tr>
		</table>
		<p>
			<strong><!--{$LANG_VIDEOS_TIP}--></strong><br />
		  	<!--{$LANG_VIDEOS_DIMENSIONS_TIP}-->
		</p>		
	</div>
</div>

<div id="commentstatusdiv" class="postbox <!--{if $CFGTRANSITIONACTIVATE neq "checked"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_VIDEOS_TRANSITION_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="middle"><th scope="row"><!--{$LANG_VIDEOS_TRANSITION_ACTIVATE}--></th><td><input name="cfgtransitionactivate" type="checkbox" value="yes" <!--{$CFGTRANSITIONACTIVATE}-->></td></tr> 
		<tr valign="middle">
			<th scope="row"><!--{$LANG_VIDEOS_TRANSITION_CROPZONE}--></th>
			<td>
				<input name="cfgtransitioncropsizewidth" type="text" value="<!--{$CFGTRANSITIONCROPSIZEWIDTH}-->" size="6">
				x
				<input name="cfgtransitioncropsizeheight" type="text" value="<!--{$CFGTRANSITIONCROPSIZEHEIGHT}-->" size="6">
			</td>
		</tr>
		<tr valign="middle">
			<th scope="row"><!--{$LANG_VIDEOS_TRANSITION_CROPLOCATION}--></th>
			<td>
				X: <input name="cfgtransitioncropxpos" type="text" value="<!--{$CFGTRANSITIONCROPXPOS}-->" size="6">, 
				Y: <input name="cfgtransitioncropypos" type="text" value="<!--{$CFGTRANSITIONCROPYPOS}-->" size="6">
			</td>
		</tr>
		</table>
		<p>
			<strong><!--{$LANG_VIDEOS_TIP}--></strong><br />
		  	<!--{$LANG_VIDEOS_TRANSITION_TIP}-->
		</p>		
	</div>
</div>

<div id="commentstatusdiv" class="postbox <!--{if $CFGVIDEOSIZEACTIVATE neq "checked"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_VIDEOS_SIZE_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="middle"><th scope="row"><!--{$LANG_VIDEOS_SIZE_ACTIVATE}--></th><td><input name="cfgvideosizeactivate" type="checkbox" value="yes" <!--{$CFGVIDEOSIZEACTIVATE}-->></td></tr> 
		<tr valign="middle">
			<th scope="row"><!--{$LANG_VIDEOS_SIZE_SIZE}--></th>
			<td>
				<input name="cfgvideosizewidth" type="text" value="<!--{$CFGVIDEOSIZEWIDTH}-->" size="6">
				x
				<input name="cfgvideosizeheight" type="text" value="<!--{$CFGVIDEOSIZEHEIGHT}-->" size="6">
			</td>
		</tr>
		</table>
		<p>
			<strong><!--{$LANG_VIDEOS_TIP}--></strong><br />
		  	<!--{$LANG_VIDEOS_SIZE_TIP}-->
		</p>		
	</div>
</div>

<div id="commentstatusdiv" class="postbox <!--{if $CFGVIDEOEFFECT eq "no"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_VIDEOS_EFFECT_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
			<tr valign="middle">
				<th scope="row"><!--{$LANG_VIDEOS_EFFECT_EFFECT}--></th>
				<td>
					<select name="cfgvideoeffect">
						<option value="no" <!--{if $CFGVIDEOEFFECT eq "no"}--> selected<!--{/if}-->><!--{$LANG_VIDEOS_EFFECT_NONE}--></option>
						<option value="tiltshift" <!--{if $CFGVIDEOEFFECT eq "tiltshift"}--> selected<!--{/if}-->>Tilt Shift</option>
						<option value="charcoal" <!--{if $CFGVIDEOEFFECT eq "charcoal"}--> selected<!--{/if}-->>Charcoal</option>
						<option value="colorin" <!--{if $CFGVIDEOEFFECT eq "colorin"}--> selected<!--{/if}-->>Color-in</option>
						<option value="sketch" <!--{if $CFGVIDEOEFFECT eq "sketch"}--> selected<!--{/if}-->>Sketch</option>
					</select>
				</td>
			</tr> 
		</table>
		<p>
			<strong><!--{$LANG_VIDEOS_TIP}--></strong><br />
		  	<!--{$LANG_VIDEOS_EFFECT_TIP}-->
		</p>	
	</div>
</div>

<div id="commentstatusdiv" class="postbox <!--{if $CFGTHUMBNAILACTIVATE neq "checked"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_VIDEOS_THUMBNAIL_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="middle"><th scope="row"><!--{$LANG_VIDEOS_THUMBNAIL_ACTIVATE}--></th><td><input name="cfgthumbnailactivate" type="checkbox" value="yes" <!--{$CFGTHUMBNAILACTIVATE}-->></td></tr> 
		<tr valign="middle"><th scope="row"><!--{$LANG_VIDEOS_THUMBNAIL_BORDER}--></th><td><input name="cfgthumbnailborder" type="checkbox" value="yes" <!--{$CFGTHUMBNAILBORDER}-->></td></tr> 
		<tr valign="middle">
			<th scope="row"><!--{$LANG_VIDEOS_THUMBNAIL_SRCCROPZONE}--></th>
			<td>
				<input name="cfgthumbnailsrccropsizewidth" type="text" value="<!--{$CFGTHUMBNAILSRCCROPSIZEWIDTH}-->" size="6">
				x
				<input name="cfgthumbnailsrccropsizeheight" type="text" value="<!--{$CFGTHUMBNAILSRCCROPSIZEHEIGHT}-->" size="6">
			</td>
		</tr>
		<tr valign="middle">
			<th scope="row"><!--{$LANG_VIDEOS_THUMBNAIL_SRCCROPLOCATION}--></th>
			<td>
				X: <input name="cfgthumbnailsrccropxpos" type="text" value="<!--{$CFGTHUMBNAILSRCCROPXPOS}-->" size="6">, 
				Y: <input name="cfgthumbnailsrccropypos" type="text" value="<!--{$CFGTHUMBNAILSRCCROPYPOS}-->" size="6">
			</td>
		</tr>
		<tr valign="middle">
			<th scope="row"><!--{$LANG_VIDEOS_THUMBNAIL_DSTZONE}--></th>
			<td>
				<input name="cfgthumbnaildstsizewidth" type="text" value="<!--{$CFGTHUMBNAILDSTSIZEWIDTH}-->" size="6">
				x
				<input name="cfgthumbnaildstsizeheight" type="text" value="<!--{$CFGTHUMBNAILDSTSIZEHEIGHT}-->" size="6">
			</td>
		</tr>
		<tr valign="middle">
			<th scope="row"><!--{$LANG_VIDEOS_THUMBNAIL_DSTLOCATION}--></th>
			<td>
				X: <input name="cfgthumbnaildstxpos" type="text" value="<!--{$CFGTHUMBNAILDSTXPOS}-->" size="6">, 
				Y: <input name="cfgthumbnaildstypos" type="text" value="<!--{$CFGTHUMBNAILDSTYPOS}-->" size="6">
			</td>
		</tr>		
		</table>
		<p>
			<strong><!--{$LANG_VIDEOS_TIP}--></strong><br />
		  	<!--{$LANG_VIDEOS_THUMBNAIL_TIP}-->
		</p>		
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
			<tr valign="middle"><th scope="row"><!--{$LANG_VIDEOS_WATERMARK_TRANSPARENCY}--> </th><td><input name="cfgwatermarkdissolve" type="text" value="<!--{$CFGWATERMARKDISSOLVE}-->" width="5">%</td></tr> 
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
		<table class="form-table">
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
		</table>	
	</div>
</div>



<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_VIDEOS_CUSTOM_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
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
		<tr valign="middle"><th scope="row"><!--{$LANG_VIDEOS_CUSTOM_EMAIL}--></th>		
			<td><input name="cfgemailpostactivate" type="checkbox" value="yes" <!--{$CFGEMAILPOSTACTIVATE}-->></td>
		</tr>
		<tr valign="middle"><th scope="row"><!--{$LANG_VIDEOS_CUSTOM_COPYTOSOURCE}--></th>		
			<td>
			<select name="cfgmovefilestosource">
			<option value="no" <!--{if $CFGMOVEFILESTOSOURCE eq "no"}--> selected="selected"<!--{/if}-->><!--{$LANG_VIDEOS_CUSTOM_DISABLED}--></option>
			<!--{section name=sources start=1 loop=$CONFIGNBSOURCES}-->
				<option value="<!--{$smarty.section.sources.index}-->" <!--{if $CFGMOVEFILESTOSOURCE eq $smarty.section.sources.index}--> selected="selected"<!--{/if}-->>Source <!--{$smarty.section.sources.index}--></option>
			<!--{/section}-->
			</select>
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
