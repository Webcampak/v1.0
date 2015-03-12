<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_SYSTEME_TITLE}--></h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_SYSTEME_PRESENTATION_TITLE}--></span></h3> 
	<div class="inside">
		<p>
			<!--{$LANG_SYSTEME_PRESENTATION_TITLEDESCRIPTION}-->
			<br/>			
		</p>		
	</div>	
</div>

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_SYSTEME_ASSISTANCE_TITLE}--></span></h3>
	<div class="inside">
		<p>
			<strong><!--{$LANG_SYSTEME_ASSISTANCE_STATUS}--></strong> 
			<!--{if $DISPOPENVPNSTATUS eq "1"}-->
					<!--{$LANG_SYSTEME_VPN_STARTED}-->
			<!--{else}-->
					<!--{$LANG_SYSTEME_VPN_STOPPED}-->
			<!--{/if}-->
			<br />
			<br />
			<table>
				<tr>
					<td>
						<form>
							<input type="button" class="button-primary" value="<!--{$LANG_SYSTEME_ASSISTANCE_START}-->" onclick="window.location.href='<!--{$CONFIGURL}-->config-systeme.php?openvpnstart=1'">
						</form>					
					</td>
					<td>
						<form>
							<input type="button" class="button-primary" value="<!--{$LANG_SYSTEME_ASSISTANCE_STOP}-->" onclick="window.location.href='<!--{$CONFIGURL}-->config-systeme.php?openvpnstop=1'">
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

<div id="commentstatusdiv" class="postbox ">
	<form method="post" action="<!--{$CONFIGURL}-->config-systeme.php?ftpuserscreate=1">		
	<h3 class="hndle"><span><!--{$LANG_SYSTEME_FTP_TITLE}--></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="top">
			<th scope="row"><!--{$LANG_SYSTEME_FTP_USERNAME}--></th>
			<td><!--{$CFGFTPRESOURCESUSERNAME}--></td>
		</tr>
		<tr valign="top">
			<th scope="row"><!--{$LANG_SYSTEME_FTP_PASSWORD}--></th>
			<td><input name="cfgftpresourcespassword" type="text" value="<!--{$CFGFTPRESOURCESPASSWORD}-->" size="30"></td>
		</tr>		
		</table>
		<input name="accept" type="submit" value="<!--{$LANG_SYSTEME_FTP_BUTTON}-->" class="button-primary" >
		</form>		
	  	<p>
		  	<strong><!--{$LANG_SYSTEME_TIP}--></strong> <br />
		  	<!--{$LANG_SYSTEME_FTP_TIP}-->
		</p>		
	</div>
</div>

<form method="post" action="<!--{$CONFIGURL}-->config-systeme.php?submit=1">
<input type="hidden" name="submitform" value="1">		
<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_SYSTEME_MULTI_TITLE}--></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="middle">
			<th scope="row"><!--{$LANG_SYSTEME_MULTI_AUTODETECT}--></th>
			<td><input name="cfggphotoports" type="checkbox" value="yes" <!--{$CFGGPHOTOPORTS}-->></td>
		</tr>
		<tr valign="middle"><th scope="row"><!--{$LANG_SYSTEME_MULTI_TYPES}--></th>
			<td>
				<select name="cfggphotoportscameras">
					<option value="<!--{$CFGGPHOTOPORTSCAMERAS}-->" selected><!--{$LANG_SYSTEME_MULTI_CURRENT}--> <!--{$CFGGPHOTOPORTSCAMERAS}--></option>
					<option value="different"><!--{$LANG_SYSTEME_MULTI_DIFFERENT}--></option>
					<option value="identical"><!--{$LANG_SYSTEME_MULTI_IDENTICAL}--></option>						
				</select>			
		</tr>		
		</table>
		<input name="accept" type="submit" value="<!--{$LANG_SYSTEME_MULTI_BUTTON}-->" class="button-primary" >
	  	<p>
		  	<strong><!--{$LANG_SYSTEME_TIP}--></strong> <br />
		  	<!--{$LANG_SYSTEME_MULTI_TIP}-->
		</p>		
	</div>
</div>



<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_SYSTEME_PHIDGET_TITLE}--></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="middle">
			<th scope="row"><!--{$LANG_SYSTEME_PHIDGET_ACTIVATE}--></th>
			<td><input name="cfgphidgetactivate" type="checkbox" value="yes" <!--{$CFGPHIDGETACTIVATE}-->></td>
		</tr>
		<tr valign="middle"><th scope="row"><!--{$LANG_SYSTEME_PHIDGET_SCREEN}--></th>
			<td>
				<select name="cfgphidgetdisplaysource">
					<option value="no" <!--{if $CFGPHIDGETDISPLAYSOURCE eq "no"}-->selected<!--{/if}-->><!--{$LANG_SYSTEME_PHIDGET_SCREEN_DISABLED}--></option>						
					<!--{section name=sources start=1 loop=$CONFIGNBSOURCES}-->
						<option value="<!--{$smarty.section.sources.index}-->" <!--{if $CFGPHIDGETDISPLAYSOURCE eq $smarty.section.sources.index}-->selected<!--{/if}-->><!--{$LANG_SYSTEME_PHIDGET_SCREEN_SOURCE}--> <!--{$smarty.section.sources.index}--></option>
					<!--{/section}-->
				</select>			
		</tr>		
		</table>
		<input name="accept" type="submit" value="<!--{$LANG_SYSTEME_MULTI_BUTTON}-->" class="button-primary" >
	</div>
</div>

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_SYSTEME_STATS_TITLE}--></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="middle">
			<th scope="row"><!--{$LANG_SYSTEME_STATS_ACTIVATE}--></th>
			<td><input name="cfgstatsactivate" type="checkbox" value="yes" <!--{$CFGSTATSACTIVATE}-->></td>
		</tr>	
		</table>
		<input name="accept" type="submit" value="<!--{$LANG_SYSTEME_MULTI_BUTTON}-->" class="button-primary" >
	</div>
</div>

</form>

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_SYSTEME_GPHOTO_TITLE}--></h3>
	<div class="inside">
		<p>
			<pre><!--{$DISP_GPHOTOVERSION}--></pre>
		</p>						
	</div>
</div>

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_SYSTEME_UPTIME_TITLE}--></h3>
	<div class="inside">
		<p>
			<pre><!--{$DISP_UPTIME}--></pre>
			<br />
			<pre><!--{$DISP_DISK}--></pre>			
		</p>						
	</div>
</div>

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_SYSTEME_PS_TITLE}--></h3>
	<div class="inside">
		<p>
			<pre><!--{$DISP_LISTPS}--></pre>
		</p>						
	</div>
</div>

</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

