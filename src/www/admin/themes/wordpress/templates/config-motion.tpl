	<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_CONFIGAVANCE_SOURCE}--> <!--{$CONFIGWEBCAMSOURCE}--><!--{$LANG_CONFIGAVANCE_TITLE}--></h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_MOTION_OVERVIEW_TITLE}--></span></h3>
	<div class="inside">
		<!--{$LANG_MOTION_OVERVIEW_EXPLANATION}-->
	</div>	
</div>

<div id="commentstatusdiv" class="postbox">
	<h3 class="hndle"><span><!--{$LANG_CONFIGAVANCE_MOTION_TITLE}--></span></h3>
	<div class="inside">
		<form method="post" action="<!--{$CONFIGURL}-->config-motion.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">
		<input type="hidden" name="submitform" value="1">
		<table class="form-table">	
		<tr><th scope="row"><!--{$LANG_CONFIGAVANCE_MOTION_ACTIVATE}--></th>
			<td colspan="2"><input name="cfgmotiondetectionactivate" type="checkbox" value="yes" <!--{$CFGMOTIONDETECTIONACTIVATE}-->></td>	
		</tr>
		<tr><th scope="row"><!--{$LANG_CONFIGAVANCE_MOTION_ONLY}--></th>
			<td colspan="2"><input name="cfgmotiondetectiononly" type="checkbox" value="yes" <!--{$CFGMOTIONDETECTIONONLY}-->></td>	
		</tr>		
		<tr valign="top">
			<th scope="row"><!--{$LANG_CONFIGAVANCE_MOTION_INTERVAL}--> </th>
			<td width="20"><input name="cfgmotiondetectioncapturevalue" type="text" value="<!--{$CFGMOTIONDETECTIONCAPTUREVALUE}-->" size="2"></td>		
			<td>
				<select name="cfgmotiondetectioncaptureinterval">
					<option value="seconds" <!--{if $CFGMOTIONDETECTIONCAPTUREINTERVAL eq "seconds"}-->selected<!--{/if}-->><!--{$LANG_CONFIGAVANCE_MOTION_SECONDS}--></option>
					<option value="minutes" <!--{if $CFGMOTIONDETECTIONCAPTUREINTERVAL eq "minutes"}-->selected<!--{/if}-->><!--{$LANG_CONFIGAVANCE_MOTION_MINUTES}--></option>
				</select>
			</td>
		</tr>					
		</table>
		<input name="accept" type="submit" value="<!--{$LANG_CONFIGAVANCE_MOTION_BUTTON}-->" class="button-primary" >						
	  	<p>
		  	<strong><!--{$LANG_CONFIGAVANCE_MOTION_TIP}--></strong> <br />
		  	<!--{$LANG_CONFIGAVANCE_MOTION_WARNING}--> 
		</p>			
	</div>
</div>

<div id="commentstatusdiv" class="postbox">
	<h3 class="hndle"><span><!--{$LANG_MOTION_DEVICE_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">					
		<tr><th scope="row"><!--{$LANG_CONFIGAVANCE_MOTION_DEVICE}--></th>		
			<td colspan="2">
				<select name="cfgmotiondetectiondevice">
					<option value="video0" <!--{if $CFGMOTIONDETECTIONDEVICE eq "video0"}-->selected<!--{/if}-->>/dev/video0</option>
					<option value="video1" <!--{if $CFGMOTIONDETECTIONDEVICE eq "video1"}-->selected<!--{/if}-->>/dev/video1</option>
					<option value="video2" <!--{if $CFGMOTIONDETECTIONDEVICE eq "video2"}-->selected<!--{/if}-->>/dev/video2</option>
					<option value="video3" <!--{if $CFGMOTIONDETECTIONDEVICE eq "video3"}-->selected<!--{/if}-->>/dev/video3</option>
					<option value="video4" <!--{if $CFGMOTIONDETECTIONDEVICE eq "video4"}-->selected<!--{/if}-->>/dev/video4</option>
					<option value="video5" <!--{if $CFGMOTIONDETECTIONDEVICE eq "video5"}-->selected<!--{/if}-->>/dev/video5</option>
					<option value="video6" <!--{if $CFGMOTIONDETECTIONDEVICE eq "video6"}-->selected<!--{/if}-->>/dev/video6</option>
					<option value="video7" <!--{if $CFGMOTIONDETECTIONDEVICE eq "video7"}-->selected<!--{/if}-->>/dev/video7</option>
					<option value="video8" <!--{if $CFGMOTIONDETECTIONDEVICE eq "video8"}-->selected<!--{/if}-->>/dev/video8</option>
					<option value="video9" <!--{if $CFGMOTIONDETECTIONDEVICE eq "video9"}-->selected<!--{/if}-->>/dev/video9</option>
					<option value="video10" <!--{if $CFGMOTIONDETECTIONDEVICE eq "video10"}-->selected<!--{/if}-->>/dev/video10</option>
				</select>			
			</td>
		</tr>	
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_MOTION_DEVICEWIDTH}--></th>
			<td colspan="2"><input name="cfgmotiondetectiondevicewidth" type="text" value="<!--{$CFGMOTIONDETECTIONDEVICEWIDTH}-->" size="10"></td>					
		</tr>
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_MOTION_DEVICEHEIGHT}--></th>
			<td colspan="2"><input name="cfgmotiondetectiondeviceheight" type="text" value="<!--{$CFGMOTIONDETECTIONDEVICEHEIGHT}-->" size="10"></td>					
		</tr>
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_MOTION_THRESHOLD}--></th>
			<td colspan="2"><input name="cfgmotiondetectionthreshold" type="text" value="<!--{$CFGMOTIONDETECTIONTHRESHOLD}-->" size="10"></td>					
		</tr>
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_MOTION_ENDEVENT}--></th>		
			<td colspan="2"><input name="cfgmotiondetectionendevent" type="text" value="<!--{$CFGMOTIONDETECTIONENDEVENT}-->" size="10"></td>
		</tr>
			<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_MOTION_MASK}--></th><td>
				<select name="cfgmotiondetectionmask">
					<!--{section name=watermarkfiles loop=$CPTWATERMARKFILES}-->
						<!--{if $WATERMARKFILES[watermarkfiles] eq $CFGMOTIONDETECTIONMASK}-->
							<option value="<!--{$WATERMARKFILES[watermarkfiles]}-->" selected="selected"><!--{$WATERMARKFILES[watermarkfiles]}--></option>
						<!--{else}-->
							<option value="<!--{$WATERMARKFILES[watermarkfiles]}-->"><!--{$WATERMARKFILES[watermarkfiles]}--></option>
						<!--{/if}-->
					<!--{/section}-->		
						<option value="no" <!--{if $CFGMOTIONDETECTIONMASK eq "no"}--> selected="selected"<!--{/if}-->><!--{$LANG_CONFIGAVANCE_MOTION_NOMASK}--></option>									
				</select>
			</td></tr>				
		</table>
		<input name="accept" type="submit" value="<!--{$LANG_CONFIGAVANCE_MOTION_BUTTON}-->" class="button-primary" >						
		</form>			
	</div>
</div>

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_MOTION_STATUS_TITLE}--></span></h3>
	<div class="inside">
		<p>
			<pre>
				<!--{$DISPMOTIONSTATUS}-->			
			</pre>
			<table>
				<tr>
					<td>
						<form>
							<input type="button" class="button-primary" value="<!--{$LANG_MOTION_START}-->" onclick="window.location.href='<!--{$CONFIGURL}-->config-motion.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&motionstart=1'">
						</form>					
					</td>
					<td>
						<form>
							<input type="button" class="button-primary" value="<!--{$LANG_MOTION_STOP}-->" onclick="window.location.href='<!--{$CONFIGURL}-->config-motion.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&motionstop=1'">
						</form>					
					</td>								
				</tr>			
			</table>								
		</p>
	  	<p>
		  	<strong><!--{$LANG_SYSTEME_TIP}--></strong> <br />
			<!--{$LANG_SYSTEME_ASSISTANCE_TIP}-->
		</p>			
	</div>	
</div>

</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->
