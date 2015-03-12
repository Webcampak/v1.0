	<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_SOURCE_SOURCE}--> <!--{$CONFIGWEBCAMSOURCE}--><!--{$LANG_SOURCE_TITLE}--></h2>


<form method="post" action="<!--{$CONFIGURL}-->config-source.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">
<input type="hidden" name="submitform" value="1">		
<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_SOURCE_TYPE_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="top">
			<th scope="row"><!--{$LANG_SOURCE_TYPE_ACTIVATE}--></th>
			<td colspan="2"><input name="cfgsourceactive" type="checkbox" value="yes" <!--{$CFGSOURCEACTIVE}-->></td>
		</tr>
		<tr valign="top">
			<th scope="row"><!--{$LANG_SOURCE_TYPE_SOURCETYPE}--></th>
			<td colspan="2">
				<select name="cfgsourcetype">
					<option value="gphoto" <!--{if $CFGSOURCETYPE eq "gphoto"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_TYPE_SOURCEGPHOTO}--></option>
					<option value="webcam" <!--{if $CFGSOURCETYPE eq "webcam"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_TYPE_SOURCEWEBCAM}--></option>
					<option value="ipcam" <!--{if $CFGSOURCETYPE eq "ipcam"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_TYPE_SOURCECAMIP}--></option>
					<option value="webfile" <!--{if $CFGSOURCETYPE eq "webfile"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_TYPE_SOURCEWEB}--></option>
					<option value="rtsp" <!--{if $CFGSOURCETYPE eq "rtsp"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_TYPE_SOURCESTREAMING}--></option>
					<option value="sensor" <!--{if $CFGSOURCETYPE eq "sensor"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_TYPE_SOURCESENSOR}--></option>					
				</select>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><!--{$LANG_CRON_SOURCE_STARTCAPTURE}--></th>		
			<td colspan="2">
				<input name="cfgcroncapturevalue" type="text" value="<!--{$CFGCRONCAPTUREVALUE}-->" size="2">	
				<select name="cfgcroncaptureinterval">
					<option value="seconds" <!--{if $CFGCRONCAPTUREINTERVAL eq "seconds"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_SECONDS}--></option>
					<option value="minutes" <!--{if $CFGCRONCAPTUREINTERVAL eq "minutes"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_MINUTES}--></option>
				</select>		
			</td>
		</tr>	
		<tr valign="top">
			<th scope="row"><!--{$LANG_CRON_TYPE_CAPTUREDELAYDATE}--></th>		
			<td colspan="2">
				<select name="cfgcapturedelaydate">
					<option value="capture" <!--{if $CFGCAPTUREDELAYDATE eq "capture"}-->selected<!--{/if}-->><!--{$LANG_CRON_TYPE_CAPTUREDELAYDATECAPTURE}--></option>
					<option value="script" <!--{if $CFGCAPTUREDELAYDATE eq "script"}-->selected<!--{/if}-->><!--{$LANG_CRON_TYPE_CAPTUREDELAYDATESCRIPT}--></option>
				</select>
			</td>
		</tr>		
		<tr valign="top">
			<th scope="row"><!--{$LANG_SOURCE_TYPE_INTERVAL}--> </th>
			<td width="20"><input name="cfgminimumcapturevalue" type="text" value="<!--{$CFGMINIMUMCAPTUREVALUE}-->" size="2"></td>		
			<td>
				<select name="cfgminimumcaptureinterval">
					<option value="seconds" <!--{if $CFGMINIMUMCAPTUREINTERVAL eq "seconds"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_TYPE_SECONDS}--></option>
					<option value="minutes" <!--{if $CFGMINIMUMCAPTUREINTERVAL eq "minutes"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_TYPE_MINUTES}--></option>
				</select>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><!--{$LANG_SOURCE_TYPE_CAPTUREDELAY}--> </th>
			<td width="20"><input name="cfgcapturedelay" type="text" value="<!--{$CFGCAPTUREDELAY}-->" size="2"></td>		
		</tr>
		<tr valign="top">
			<th scope="row"><!--{$LANG_SOURCE_TYPE_DEBUG}--></th>
			<td colspan="2">
				<input name="cfgsourcedebug" type="checkbox" value="yes" <!--{$CFGSOURCEDEBUG}-->>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><!--{$LANG_SOURCE_TYPE_EMAILALERT}--></th>
			<td colspan="2">
				<input name="cfgemailerroractivate" type="checkbox" value="yes" <!--{$CFGEMAILERRORACTIVATE}-->>
			</td>
		</tr>				
		<tr valign="top">
			<th scope="row"><!--{$LANG_SOURCE_TYPE_BLOCK}--></th>
			<td colspan="2">
				<input name="cfgnocapture" type="checkbox" value="yes" <!--{$CFGNOCAPTURE}-->>
			</td>
		</tr>						
		<tr valign="top">
			<th scope="row"></th>
			<td colspan="2">
				<input name="accept" type="submit" value="<!--{$LANG_SOURCE_TYPE_BUTTON}-->" class="button-primary" >
			</td>
		</tr>	
		</table>	
	  	<p>
		  	<strong><!--{$LANG_SOURCE_TIP}--></strong> <br />
		  	<!--{$LANG_SOURCE_TYPE_TIP}--> 
		</p>			
	</div>
</div>
<p>
	<center>
		<!--{if $PICTUREDISPLAY neq ""}-->
		<a href="<!--{$PICTUREDISPLAY}-->" target="_blank"><img src="<!--{$PICTUREDISPLAY}-->" width="640" /><br /><!--{$PICTUREDISPLAY}--></a>
		<!--{/if}-->	
		<!--{if $DSIPLAYCAPTURE eq "1"}-->
		<img src="<!--{$CONFIGURL}-->../sources/source<!--{$CONFIGWEBCAMSOURCE}-->/tmp/sample.jpg" width="640" />
		<!--{/if}-->		
		<p class="submit">
		<!--{if $CFGNOCAPTURE eq "checked"}-->
			<input type="button" class="button-primary" value="<!--{$LANG_SOURCE_CAPTURE_CAPTURESAVEPICTURE}-->" onclick="window.location.href='<!--{$CONFIGURL}-->config-source.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&capturerecord=1'">
		<!--{else}-->
			<input type="button" class="button-primary" value="<!--{$LANG_SOURCE_CAPTURE_CAPTURESAVEPICTURE}-->" onclick="window.location.href='<!--{$CONFIGURL}-->config-source.php?s=<!--{$CONFIGWEBCAMSOURCE}-->'"><br />
			<font color="red"><!--{$LANG_SOURCE_CAPTURE_CAPTUREPICTUREDISABLED}--></font>
		<!--{/if}-->	
		</p>
	</center>
</p>


<div id="commentstatusdiv" class="postbox <!--{if $CFGCRONCALENDAR neq "checked"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_CRON_CALENDAR_TITLE}--></span></h3>
	<div class="inside">
			<table>
				<tr>
					<th scope="row"><!--{$LANG_CRON_CALENDAR_ENABLE}--></th>
					<td><input name="cfgcroncalendar" type="checkbox" value="yes" <!--{$CFGCRONCALENDAR}-->></td>
					<td colspan="3"><i><!--{$LANG_CRON_CALENDAR_ENABLE_MORE}--></i></td>				
				</tr>
				<!--{section name=days start=1 loop=8}-->
				<tr>
					<th scope="row"><!--{$LANG_CRON_DAYS[days]}--></th>
					<td><input name="cfgcapturedayenable<!--{$smarty.section.days.index}-->" type="checkbox" value="yes" <!--{$CFGCAPTUREDAYENABLE[days]}-->></td>
					<td><!--{$LANG_CRON_CALENDAR_TIME_START}--> </td>
					<td> 
						<select name="cfgcapturestarthour<!--{$smarty.section.days.index}-->">
							<!--{section name=hour loop=$CPTHOUR}-->
								<!--{if $HOURTXT[hour] eq $CFGCAPTURESTARTHOUR[days]}-->
									<option value="<!--{$HOURTXT[hour]}-->" selected><!--{$HOURTXT[hour]}--></option>
								<!--{else}-->
									<option value="<!--{$HOURTXT[hour]}-->"><!--{$HOURTXT[hour]}--></option>
								<!--{/if}-->
							<!--{/section}-->		
						</select> h 
						<select name="cfgcapturestartminute<!--{$smarty.section.days.index}-->">
							<!--{section name=minute loop=$CPTMINUTE}-->
								<!--{if $MINUTETXT[minute] eq $CFGCAPTURESTARTMINUTE[days]}-->
									<option value="<!--{$MINUTETXT[minute]}-->" selected><!--{$MINUTETXT[minute]}--></option>
								<!--{else}-->
									<option value="<!--{$MINUTETXT[minute]}-->"><!--{$MINUTETXT[minute]}--></option>
								<!--{/if}-->
							<!--{/section}-->
						</select>			
					</td>
					<td><!--{$LANG_CRON_CALENDAR_TIME_END}--> </td>
					<td>
						<select name="cfgcapturesendhour<!--{$smarty.section.days.index}-->">
							<!--{section name=hour loop=$CPTHOUR}-->
								<!--{if $HOURTXT[hour] eq $CFGCAPTUREENDHOUR[days]}-->
									<option value="<!--{$HOURTXT[hour]}-->" selected="selected"><!--{$HOURTXT[hour]}--></option>
								<!--{else}-->
									<option value="<!--{$HOURTXT[hour]}-->"><!--{$HOURTXT[hour]}--></option>
								<!--{/if}-->
							<!--{/section}-->		
						</select> h 
						<select name="cfgcapturesendminute<!--{$smarty.section.days.index}-->">
							<!--{section name=minute loop=$CPTMINUTE}-->
								<!--{if $MINUTETXT[minute] eq $CFGCAPTUREENDMINUTE[days]}-->
									<option value="<!--{$MINUTETXT[minute]}-->" selected="selected"><!--{$MINUTETXT[minute]}--></option>
								<!--{else}-->
									<option value="<!--{$MINUTETXT[minute]}-->"><!--{$MINUTETXT[minute]}--></option>
								<!--{/if}-->
							<!--{/section}-->
						</select>			
					</td>
				</tr>
				<!--{/section}-->
			</table>
	
	</div>
</div>



<div id="commentstatusdiv" class="postbox <!--{if $CFGSOURCETYPE neq "gphoto"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_SOURCE_GPHOTO_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="top"><th scope="row"><!--{$LANG_SOURCE_GPHOTO_CAMERAMODEL}--></th>
			<td><input name="cfgsourcegphotocameramodel" type="text" value="<!--{$CFGSOURCEGPHOTOCAMERAMODEL}-->" size="50"></td>					
		</tr>	
		<tr valign="top"><th scope="row"><!--{$LANG_SOURCE_GPHOTO_CAMERAPORT}--></th>
			<td>
				<select name="cfgsourcegphotocameraportdetail">
					<!--{if $CFGSOURCEGPHOTOCAMERAPORTDETAIL neq ""}--> 
						<option value="<!--{$CFGSOURCEGPHOTOCAMERAPORTDETAIL}-->" selected><!--{$LANG_SOURCE_GPHOTO_CURRENTCONF}--> <!--{$CFGSOURCEGPHOTOCAMERAPORTDETAIL}--></option>
					<!--{/if}-->				
					<!--{section name=gphotoports loop=$CPTGPHOTOPORTS}-->
							<option value="<!--{$GPHOTOPORTS[gphotoports]}-->"><!--{$GPHOTOPORTS[gphotoports]}--></option>
					<!--{/section}-->	
					<option value="automatic"><!--{$LANG_SOURCE_GPHOTO_AUTO}--></option>						
				</select>			
		</tr>
		<tr valign="top"><th scope="row"><!--{$LANG_SOURCE_GPHOTO_CAMERAOWNER}--></th>
			<td>
			<!--{if $GPHOTOASSIGNAPPLIED neq ""}--> 
				<font color="red"><!--{$LANG_SOURCE_GPHOTO_CAMERAOWNERAPPLIED}--></font>		
			<!--{/if}-->
			<input name="cfgsourcegphotoowner" type="text" value="<!--{$CFGSOURCEGPHOTOOWNER}-->" size="50">
			<input type="button" class="button-primary" value="<!--{$LANG_SOURCE_GPHOTO_CAMERAOWNERASSIGN}-->" onclick="window.location.href='<!--{$CONFIGURL}-->config-source.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&gphotoassign=1'"><br />
			<font color="red"><!--{$LANG_SOURCE_GPHOTO_NOSPACES}--></font>				
			</td>					
		</tr>
		<tr valign="top"><th scope="row"></th>
			<td><!--{$LANG_SOURCE_GPHOTO_SUPPORTED}--></td>
		</tr>			
		</table>
	  	<p>
		  	<strong><!--{$LANG_SOURCE_TIP}--></strong> <br />
		  	<!--{$LANG_SOURCE_GPHOTO_TIP}-->
		</p>		
	</div>
</div>

<div id="commentstatusdiv" class="postbox <!--{if $CFGSOURCETYPE neq "webcam"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_SOURCE_USBWEBCAM_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="top"><th scope="row"><!--{$LANG_SOURCE_USBWEBCAM_NATIVESIZE}--></th>
			<td valign="middle"><input name="sourcewebcamsize" type="text" value="<!--{$CFGSOURCEWEBCAMSIZE}-->" size="10"> <!--{$LANG_SOURCE_USBWEBCAM_RESOLUTION}--></td>
		</tr>		
		<!--{if $CFGSOURCETYPE eq "webcam"}-->	
			<tr valign="top"><th scope="row"><!--{$LANG_SOURCE_USBWEBCAM_DEVICE}--></th>		
				<td>
					<select name="cfgsourcewebcamcamid">
						<!--{section name=webcamid loop=$USBBUSCPT}-->
							<!--{if $CFGSOURCEWEBCAMCAMID eq $USBBUSTXT[webcamid]}-->
								<option value="<!--{$USBBUSTXT[webcamid]}-->" selected="selected"><!--{$USBBUSTXT[webcamid]}--></option>
							<!--{else}-->
								<option value="<!--{$USBBUSTXT[webcamid]}-->"><!--{$USBBUSTXT[webcamid]}--></option>
							<!--{/if}-->
						<!--{/section}-->
						<!--{if $CFGSOURCEWEBCAMCAMID eq "disabled"}-->
							<option value="disabled" selected="selected"><!--{$LANG_SOURCE_ERROR_DISABLED}--></option>
						<!--{else}-->
								<option value="disabled"><!--{$LANG_SOURCE_ERROR_DISABLED}--></option>
						<!--{/if}-->
					</select>											
				</td>
			</tr>	
		<!--{/if}-->	
		<tr valign="top"><th scope="row"><b><!--{$LANG_SOURCE_USBWEBCAM_ADVANCED}--></b></th>
		<tr valign="middle"><th scope="row"><!--{$LANG_SOURCE_USBWEBCAM_BRIGHTNESS}--></th>
			<td>
				<select name="cfgsourcewebcambright">			
				<!--{if $CFGSOURCEWEBCAMBRIGHT eq "no"}-->
						<option value="no" selected="selected"><!--{$LANG_SOURCE_ERROR_DISABLED}--></option>
				<!--{else}-->	
						<option value="no"><!--{$LANG_SOURCE_ERROR_DISABLED}--></option>				
				<!--{/if}-->					
				<!--{section name=percent loop=$CPTPERCENT}-->
					<!--{if $CFGSOURCEWEBCAMBRIGHT eq $PERCENTTXT[percent]}-->
						<option value="<!--{$PERCENTTXT[percent]}-->" selected="selected"><!--{$PERCENTTXT[percent]}-->%</option>
					<!--{else}-->
						<option value="<!--{$PERCENTTXT[percent]}-->"><!--{$PERCENTTXT[percent]}-->%</option>
					<!--{/if}-->
				<!--{/section}-->	
				</select>							
			</td>					
		</tr>	
		<tr valign="middle"><th scope="row"><!--{$LANG_SOURCE_USBWEBCAM_CONTRAST}--></th>
			<td>
				<select name="cfgsourcewebcamcontrast">			
				<!--{if $CFGSOURCEWEBCAMCONTRAST eq "no"}-->
						<option value="no" selected="selected"><!--{$LANG_SOURCE_ERROR_DISABLED}--></option>
				<!--{else}-->	
						<option value="no"><!--{$LANG_SOURCE_ERROR_DISABLED}--></option>				
				<!--{/if}-->					
				<!--{section name=percent loop=$CPTPERCENT}-->
					<!--{if $PERCENTTXT[percent] eq $CFGSOURCEWEBCAMCONTRAST}-->
						<option value="<!--{$PERCENTTXT[percent]}-->" selected="selected"><!--{$PERCENTTXT[percent]}-->%</option>
					<!--{else}-->
						<option value="<!--{$PERCENTTXT[percent]}-->"><!--{$PERCENTTXT[percent]}-->%</option>
					<!--{/if}-->
				<!--{/section}-->	
				</select>							
			</td>					
		</tr>		
		<tr valign="middle"><th scope="row"><!--{$LANG_SOURCE_USBWEBCAM_SATURATION}--></th>
			<td>
				<select name="cfgsourcewebcamsaturation">			
				<!--{if $CFGSOURCEWEBCAMSATURATION eq "no"}-->
						<option value="no" selected="selected"><!--{$LANG_SOURCE_ERROR_DISABLED}--></option>
				<!--{else}-->	
						<option value="no"><!--{$LANG_SOURCE_ERROR_DISABLED}--></option>				
				<!--{/if}-->	
				<!--{section name=percent loop=$CPTPERCENT}-->
					<!--{if $PERCENTTXT[percent] eq $CFGSOURCEWEBCAMSATURATION}-->
						<option value="<!--{$PERCENTTXT[percent]}-->" selected="selected"><!--{$PERCENTTXT[percent]}-->%</option>
					<!--{else}-->
						<option value="<!--{$PERCENTTXT[percent]}-->"><!--{$PERCENTTXT[percent]}-->%</option>
					<!--{/if}-->
				<!--{/section}-->	
				</select>							
			</td>					
		</tr>	
		<tr valign="middle"><th scope="row"><!--{$LANG_SOURCE_USBWEBCAM_GAIN}--></th>
			<td>
				<select name="cfgsourcewebcamgain">			
				<!--{if $CFGSOURCEWEBCAMGAIN eq "no"}-->
						<option value="no" selected="selected"><!--{$LANG_SOURCE_ERROR_DISABLED}--></option>
				<!--{else}-->	
						<option value="no"><!--{$LANG_SOURCE_ERROR_DISABLED}--></option>				
				<!--{/if}-->	
				<!--{section name=percent loop=$CPTPERCENT}-->
					<!--{if $PERCENTTXT[percent] eq $CFGSOURCEWEBCAMGAIN}-->
						<option value="<!--{$PERCENTTXT[percent]}-->" selected="selected"><!--{$PERCENTTXT[percent]}-->%</option>
					<!--{else}-->
						<option value="<!--{$PERCENTTXT[percent]}-->"><!--{$PERCENTTXT[percent]}-->%</option>
					<!--{/if}-->
				<!--{/section}-->	
				</select>							
			</td>					
		</tr>	
		<tr><td colspan="2"><i><!--{$LANG_SOURCE_USBWEBCAM_INSTRUCTIONS}--></i>	</td></tr>
		</table>	
	</div>
</div>

<div id="commentstatusdiv" class="postbox <!--{if $CFGSOURCETYPE neq "ipcam"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_SOURCE_CAMERAIP_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="top"><th scope="row"><!--{$LANG_SOURCE_CAMERAIP_LIMITROTATION}--></th>
			<td><input name="cfgsourcecamiplimiterotation" type="checkbox" value="yes" <!--{$CFGSOURCECAMIPLIMITEROTATION}-->></td>
		</tr>
		<tr valign="top"><th scope="row"><!--{$LANG_SOURCE_CAMERAIP_HOTLINKERROR}--></th>
			<td><input name="cfgsourcecamiphotlinkerror" type="checkbox" value="yes" <!--{$CFGSOURCECAMIPHOTLINKERROR}-->></td>
		</tr>
		<tr valign="top"><th scope="row"><!--{$LANG_SOURCE_CAMERAIP_SOURCETYPE}--></th>
			<td>
				<select name="cfgsourcecamiptemplate">
					<option value="filedate" <!--{if $CFGSOURCECAMIPTEMPLATE eq "filedate"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_CAMERAIP_ANYTYPES}--></option>
					<option value="webcampak" <!--{if $CFGSOURCECAMIPTEMPLATE eq "webcampak"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_CAMERAIP_WEBCAMPAK}--></option>
					<option value="exif" <!--{if $CFGSOURCECAMIPTEMPLATE eq "exif"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_CAMERAIP_EXIF}--></option>
				</select>			
			</td>
		</tr>		
		</table>	
		<p>
			<strong><!--{$LANG_SOURCE_TIP}--></strong><br /> 
			<!--{$LANG_SOURCE_CAMERAIP_TIP}-->
		</p>		
	</div>
</div>

<div id="commentstatusdiv" class="postbox <!--{if $CFGSOURCETYPE neq "webfile" AND $CFGSOURCETYPE neq "rtsp" }-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_SOURCE_SOURCEWEB_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="top"><th scope="row"><!--{$LANG_SOURCE_SOURCEWEB_URL}--></th>
			<td><input name="cfgsourcewebfileurl" type="text" value="<!--{$CFGSOURCEWEBFILEURL}-->" size="50"></td>
		</tr>
		</table>	
		<p>
		 <strong><!--{$LANG_SOURCE_TIP}--></strong><br />
		<!--{$LANG_SOURCE_SOURCEWEB_TIP}-->
		</p>		
	</div>
</div>

<div id="commentstatusdiv" class="postbox <!--{if $CFGSOURCETYPE neq "sensor"}-->closed<!--{/if}-->">
	<h3 class="hndle"><span><!--{$LANG_SOURCE_PHIDGET_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
			<tr align="center">
				<td><b><!--{$LANG_SOURCE_PHIDGET_SENSOR}--></b></td>				
				<td><b><!--{$LANG_SOURCE_PHIDGET_TYPE}--></b></td>
				<td><b><!--{$LANG_SOURCE_PHIDGET_PORT}--></b></td>
				<td><b><!--{$LANG_SOURCE_PHIDGET_TEXT}--></b></td>
				<td><b><!--{$LANG_SOURCE_PHIDGET_COLOR}--></b></td>
			</tr>
			<!--{section name=capteurs start=1 loop=5}-->
			<tr align="center">
				<td><!--{$smarty.section.capteurs.index}--></td>	
				<td>
					<select name="srcfgsensortype-<!--{$smarty.section.capteurs.index}-->">
						<option value="no" <!--{if $SRCCFGSENSORTYPE[capteurs] eq "no"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_ERROR_DISABLED}--></option>
						<!--{section name=phidget start=1 loop=$CFGPHIDGETSENSORTYPENB}-->
							<option value="<!--{$CFGPHIDGETSENSORTYPE[phidget]}-->" <!--{if $SRCCFGSENSORTYPE[capteurs] eq $CFGPHIDGETSENSORTYPE[phidget]}-->selected<!--{/if}-->><!--{$CFGPHIDGETSENSORTYPE[phidget]}--></option>
						<!--{/section}-->
					</select>
				</td>
				<td>
					<select name="srcfgsensorport-<!--{$smarty.section.capteurs.index}-->">
						<!--{section name=phidgetport start=0 loop=10}-->
							<option value="<!--{$smarty.section.phidgetport.index}-->" <!--{if $SRCCFGSENSORPORT[capteurs] eq $smarty.section.phidgetport.index}-->selected<!--{/if}-->><!--{$smarty.section.phidgetport.index}--></option>
						<!--{/section}-->
						<option value="no" <!--{if $SRCCFGSENSORPORT[capteurs] eq "disabled"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_ERROR_DISABLED}--></option>
					</select>
				</td>
				<td><input name="srcfgsensortext-<!--{$smarty.section.capteurs.index}-->" type="text" value="<!--{$SRCCFGSENSORTEXT[capteurs]}-->" size="15"></td>	
				<td>#<input name="srcfgsensorcolor-<!--{$smarty.section.capteurs.index}-->" type="text" value="<!--{$SRCCFGSENSORCOLOR[capteurs]}-->" size="8"></td>		
			</tr>
			<!--{/section}-->
		</table>
		<table class="form-table">
		<tr valign="top"><th scope="row"><!--{$LANG_SOURCE_GRAPH_ACTIVATE}--></th>
			<td><input name="cfgphidgetsensorsgraph" type="checkbox" value="yes" <!--{$CFGPHIDGETSENSORSGRAPH}-->></td>	
		</tr>
		<tr valign="middle"><th scope="row"><!--{$LANG_SOURCE_PHIDGET_FTP}--></th>
			<td>
					<select name="cfgftpphidgetserverid">
						<option value="no" <!--{if $CFGFTPPHIDGETSERVERID eq "no"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_FTP_DISABLED}--></option>
						<!--{section name=ftpservers start=1 loop=$CFGFTPSERVERSNB}-->
							<option value="<!--{$smarty.section.ftpservers.index}-->" <!--{if $CFGFTPPHIDGETSERVERID eq $smarty.section.ftpservers.index}-->selected<!--{/if}-->><!--{$smarty.section.ftpservers.index}-->: <!--{$CFGFTPSERVERSNAME[ftpservers]}--></option>
						<!--{/section}-->						
					</select>
					<!--{$LANG_SOURCE_FTP_MAINFTPRETRY}-->
					<select name="cfgftpphidgetserverretry">
						<option value="no" <!--{if $CFGFTPPHIDGETSERVERRETRY eq "no"}-->selected<!--{/if}-->><!--{$LANG_SOURCE_FTP_NORETRY}--></option>
						<!--{section name=cptloop start=1 loop=4}-->
							<option value="<!--{$smarty.section.cptloop.index}-->" <!--{if $CFGFTPPHIDGETSERVERRETRY eq $smarty.section.cptloop.index}-->selected<!--{/if}-->><!--{$smarty.section.cptloop.index}--></option>
						<!--{/section}-->						
					</select>			
			</td>	
		</tr>	
		</table>		
	</div>
</div>

<input name="accept" type="submit" value="<!--{$LANG_SOURCE_BUTTON}-->" class="button-primary" >
</form>

</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->
