	<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_CONFIGFTP_SOURCE}--> <!--{$CONFIGWEBCAMSOURCE}--><!--{$LANG_CONFIGFTP_TITLE}--></h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">
 
<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_CONFIGFTP_FTPTEST_TITLE}--></span></h3>
	<div class="inside">
		<form method="post" action="<!--{$CONFIGURL}-->config-ftp.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&captureftp=1">						
		<table class="form-table">
			<tr><td><!--{$LANG_CONFIGFTP_FTPTEST_TYPE}--> </td><td>
				<select name="ftptest">
					<option value="sampleftpnopic"><!--{$LANG_CONFIGFTP_FTPTEST_TYPESIMPLE}--></option>					
				</select>
			</td></tr>	
		</table>
		<input name="accept" type="submit" value="<!--{$LANG_CONFIGFTP_FTPTEST_BUTTON}-->" class="button-primary">
		</form>
		<!--{if $DISPFTPCAPTURE neq ""}-->
		<p>
			<b><u><!--{$LANG_CONFIGFTP_FTPTEST_LOG}--></u></b><br />
			<pre><!--{$DISPFTPCAPTURE}--></pre>
		</p>	
		<!--{/if}-->
		<p>
			<strong><!--{$LANG_CONFIGFTP_TIP}--></strong><br />
		  	<!--{$LANG_CONFIGFTP_FTPTEST_TIP}-->
		</p>					
	</div>
</div>
<form method="post" action="<!--{$CONFIGURL}-->config-ftp.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">
<input type="hidden" name="submitform" value="1">	  																		
<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_CONFIGFTP_ARCHIVES_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
				<tr><td><!--{$LANG_CONFIGFTP_ARCHIVES_PICUPLOAD}--> </td><td><input name="cfguploadarchives" type="checkbox" value="yes" <!--{$CFGUPLOADARCHIVE}-->></td></tr> 
				<tr><td><!--{$LANG_CONFIGFTP_ARCHIVES_VIDUPLOAD}--> </td><td><input name="cfgvideoaviupload" type="checkbox" value="yes" <!--{$CFGVIDEOAVIUPLOAD}-->></td></tr> 
				<tr><td><!--{$LANG_CONFIGFTP_ARCHIVES_WEBVIDUPLOAD}--> </td><td><input name="cfgvideoflvupload" type="checkbox" value="yes" <!--{$CFGVIDEOFLVUPLOAD}-->></td></tr> 
				<tr><td><!--{$LANG_CONFIGFTP_ARCHIVES_FTPSERVER}--> </td><td><input name="cfgftpserver" type="text" value="<!--{$CFGFTPSERVER}-->"></td></tr> 
				<tr><td><!--{$LANG_CONFIGFTP_ARCHIVES_FTPUSERNAME}--> </td><td><input name="cfgftpuser" type="text" value="<!--{$CFGFTPUSER}-->"></td></tr>
				<tr><td><!--{$LANG_CONFIGFTP_ARCHIVES_FTPPASSWORD}--> </td><td><input name="cfgftppassword" type="password" value="<!--{$CFGFTPPASSWORD}-->"></td></tr>
				<tr><td><!--{$LANG_CONFIGFTP_ARCHIVES_FTPBASEDIR}--> </td><td><input name="cfgftpdir" type="text" value="<!--{$CFGFTPDIR}-->"></td></tr> 
				<tr><td><!--{$LANG_CONFIGFTP_ARCHIVES_FTPPICDIR}--> </td><td><!--{$CFGFTPDIR}--><input name="cfgftpphotosdir" type="text" value="<!--{$CFGFTPPHOTOSDIR}-->"></td></tr>		
				<tr><td><!--{$LANG_CONFIGFTP_ARCHIVES_FTPVIDDIR}--> </td><td><!--{$CFGFTPDIR}--><input name="cfgftpvideosdir" type="text" value="<!--{$CFGFTPVIDEOSDIR}-->"></td></tr>		
				<tr><td><!--{$LANG_CONFIGFTP_ARCHIVES_FTPACTIVE}--> </td><td><input name="cfgftpactive" type="checkbox" value="yes" <!--{$CFGFTPACTIVE}-->></td></tr> 
		</table>	
	</div>
</div>

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_CONFIGFTP_SECONDFTP_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
				<tr><td><!--{$LANG_CONFIGFTP_SECONDFTP_PICUPLOAD}--> </td><td><input name="cfgsecondftpactivate" type="checkbox" value="yes" <!--{$CFGSECONDFTPACTIVATE}-->></td></tr> 
				<tr><td><!--{$LANG_CONFIGFTP_SECONDFTP_FTPSERVER}--> </td><td><input name="cfgsecondftpserver" type="text" value="<!--{$CFGSECONDFTPSERVER}-->"></td></tr> 
				<tr><td><!--{$LANG_CONFIGFTP_SECONDFTP_FTPUSERNAME}--> </td><td><input name="cfgsecondftpuser" type="text" value="<!--{$CFGSECONDFTPUSER}-->"></td></tr>
				<tr><td><!--{$LANG_CONFIGFTP_SECONDFTP_FTPPASSWORD}--> </td><td><input name="cfgsecondftppassword" type="password" value="<!--{$CFGSECONDFTPPASSWORD}-->"></td></tr>
				<tr><td><!--{$LANG_CONFIGFTP_SECONDFTP_FTPPICDIR}--> </td><td><input name="cfgsecondftpphotosdir" type="text" value="<!--{$CFGSECONDFTPPHOTOSDIR}-->"></td></tr>		
				<tr><td><!--{$LANG_CONFIGFTP_SECONDFTP_FTPACTIVE}--> </td><td><input name="cfgsecondftpactive" type="checkbox" value="yes" <!--{$CFGSECONDFTPACTIVE}-->></td></tr> 
		</table>	
	</div>
</div>

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_CONFIGFTP_HOTLINK_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
				<tr><td><!--{$LANG_CONFIGFTP_HOTLINK_PICUPLOAD}--> </td><td><input name="cfguploadhotlink" type="checkbox" value="yes" <!--{$CFGUPLOADHOTLINK}-->></td></tr> 
				<tr><td><!--{$LANG_CONFIGFTP_HOTLINK_VIDUPLOAD}--> </td><td><input name="cfgvideoavihotlinkupload" type="checkbox" value="yes" <!--{$CFGVIDEOAVIHOTLINKUPLOAD}-->></td></tr> 
				<tr><td><!--{$LANG_CONFIGFTP_HOTLINK_WEBVIDUPLOAD}--> </td><td><input name="cfgvideoflvhotlinkupload" type="checkbox" value="yes" <!--{$CFGVIDEOFLVHOTLINKUPLOAD}-->></td></tr> 
				<tr><td><!--{$LANG_CONFIGFTP_HOTLINK_FTPSERVER}--> </td><td><input name="cfghotlinkftpserver" type="text" value="<!--{$CFGHOTLINKFTPSERVER}-->"></td></tr> 
				<tr><td><!--{$LANG_CONFIGFTP_HOTLINK_FTPUSERNAME}--> </td><td><input name="cfghotlinkftpuser" type="text" value="<!--{$CFGHOTLINKFTPUSER}-->"></td></tr>
				<tr><td><!--{$LANG_CONFIGFTP_HOTLINK_FTPPASSWORD}--> </td><td><input name="cfghotlinkftppassword" type="password" value="<!--{$CFGHOTLINKFTPPASSWORD}-->"></td></tr>
				<tr><td><!--{$LANG_CONFIGFTP_HOTLINK_FTPDIR}--> </td><td><input name="cfghotlinkftpdir" type="text" value="<!--{$CFGHOTLINKFTPDIR}-->"></td></tr>		
				<tr><td><!--{$LANG_CONFIGFTP_HOTLINK_FTPACTIVE}--> </td><td><input name="cfghotlinkftpactive" type="checkbox" value="yes" <!--{$CFGHOTLINKFTPACTIVE}-->></td></tr> 
		</table>	
		<p>
			<strong><!--{$LANG_CONFIGFTP_TIP}--></strong><br />
			<!--{$LANG_CONFIGFTP_HOTLINK_TIP}-->		
		</p>		
	</div>
</div>

<input name="accept" type="submit" value="<!--{$LANG_CONFIGFTP_BUTTON}-->" class="button-primary" >
</form>

</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->
