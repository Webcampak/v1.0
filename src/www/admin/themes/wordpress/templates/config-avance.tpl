	<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_CONFIGAVANCE_SOURCE}--> <!--{$CONFIGWEBCAMSOURCE}--><!--{$LANG_CONFIGAVANCE_TITLE}--></h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">
		


<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_CONFIGFTP_LOCALFTP_TITLE}--></span></h3>
	<div class="inside">
		<form method="post" action="<!--{$CONFIGURL}-->config-avance.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&ftpuserscreate=1">						
		<table class="form-table">
			<tr><td width="100"><!--{$LANG_CONFIGFTP_LOCALFTP_USERNAME}--> </td><td><b>source<!--{$CONFIGWEBCAMSOURCE}--></b></td></tr> 
			<tr><td><!--{$LANG_CONFIGFTP_LOCALFTP_PASSWORD}--> </td><td><input name="cfglocalftppass" type="text" value="<!--{$CFGLOCALFTPPASS}-->"></td></tr> 
			<tr>
					<td colspan="2">
					<input name="accept" type="submit" value="<!--{$LANG_CONFIGFTP_LOCALFTP_BUTTON}-->" class="button-primary">
				</td>
	   	</tr>	
		</table>	
		</form>	
		<p>
			<strong><!--{$LANG_CONFIGFTP_TIP}--></strong><br />
			<!--{$LANG_CONFIGFTP_LOCALFTP_TIP}-->		
			</p>			
	</div>	
</div>
<form method="post" action="<!--{$CONFIGURL}-->config-avance.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">
<input type="hidden" name="submitform" value="1">
<div id="commentstatusdiv" class="postbox">
	<h3 class="hndle"><span><!--{$LANG_CONFIGAVANCE_EMAIL_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">		
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_EMAIL_SENDTO}--></th>
			<td><input name="cfgemailsendto" type="text" value="<!--{$CFGEMAILSENDTO}-->" size="50"></td>					
		</tr>
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_EMAIL_SENDCOPYTO}--></th>
			<td><input name="cfgemailsendcc" type="text" value="<!--{$CFGEMAILSENDCC}-->" size="50"></td>					
		</tr>
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_EMAIL_EMAILSOURCE}--></th>
			<td><input name="cfgemailsendfrom" type="text" value="<!--{$CFGEMAILSENDFROM}-->" size="50"></td>					
		</tr>
		<tr valign="middle"><th scope="row"><!--{$LANG_CONFIGAVANCE_EMAIL_NBFAILURES}--></th>
			<td>
				<input name="cfgemailalertfailure" type="text" value="<!--{$CFGEMAILALERTFAILURE}-->" size="3">
				<!--{$LANG_CONFIGAVANCE_EMAIL_REMINDER}-->	
				<input name="cfgemailalertreminder" type="text" value="<!--{$CFGEMAILALERTREMINDER}-->" size="3">
				<!--{$LANG_CONFIGAVANCE_EMAIL_REMINDER_FAILURE}-->
			</td>	
		</tr>
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_EMAIL_SMTPSERVER}--></th>		
			<td><input name="cfgemailsmtpserver" type="text" value="<!--{$CFGEMAILSMTPSERVER}-->" size="50">:
			<input name="cfgemailsmtpserverport" type="text" value="<!--{$CFGEMAILSMTPSERVERPORT}-->" size="5">
		</td>
		</tr>			
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_EMAIL_SMTPTTLS}--></th>
			<td><input name="cfgemailsmtpstartttls" type="checkbox" value="yes" <!--{$CFGEMAILSMTPSTARTTTLS}-->></td>	
		</tr>
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_EMAIL_SMTPAUTH}--></th>
			<td><input name="cfgemailsmtpauth" type="checkbox" value="yes" <!--{$CFGEMAILSMTPAUTH}-->></td>	
		</tr>
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_EMAIL_SMTPAUTHUSERNAME}--></th>		
			<td><input name="cfgemailsmtpauthusername" type="text" value="<!--{$CFGEMAILSMTPAUTHUSERNAME}-->" size="50"></td>
		</tr>
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_EMAIL_SMTPAUTHPASSWORD}--></th>
			<td><input name="cfgemailsmtpauthpassword" type="password" value="<!--{$CFGEMAILSMTPAUTHPASSWORD}-->" size="50"></td>
		</tr>				
		</table>
		<input name="accept" type="submit" value="<!--{$LANG_CONFIGAVANCE_EMAIL_BUTTON}-->" class="button-primary" >						
	</div>
</div>

<div id="commentstatusdiv" class="postbox">
	<h3 class="hndle"><span><!--{$LANG_CONFIGAVANCE_PHIDGET_TITLE}--></span></h3>
	<div class="inside">
		<table class="form-table">
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_ERROR_ACTIVATE}--></th>
			<td><input name="cfgphidgeterroractivate" type="checkbox" value="yes" <!--{$CFGPHIDGETERRORACTIVATE}-->></td>	
		</tr>		
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_ERROR_NBERRORS}--></th>
			<td><input name="cfgphidgetfailure" type="text" value="<!--{$CFGPHIDGETFAILURE}-->" size="5"></td>					
		</tr>
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_ERROR_PORT}--></th>
			<td><input name="cfgphidgetcameraport" type="text" value="<!--{$CFGPHIDGETCAMERAPORT}-->" size="5"></td>					
		</tr>
		<tr valign="top"><th scope="row"><!--{$LANG_CONFIGAVANCE_GRAPH_ACTIVATE}--></th>
			<td><input name="cfgphidgetsensorsgraph" type="checkbox" value="yes" <!--{$CFGPHIDGETSENSORSGRAPH}-->></td>	
		</tr>
		<tr valign="middle"><th scope="row"><!--{$LANG_CONFIGAVANCE_PHIDGET_FTP}--></th>
			<td>
					<select name="cfgftpphidgetserverid">
						<option value="no" <!--{if $CFGFTPPHIDGETSERVERID eq "no"}-->selected<!--{/if}-->><!--{$LANG_CONFIGAVANCE_FTP_DISABLED}--></option>
						<!--{section name=ftpservers start=1 loop=$CFGFTPSERVERSNB}-->
							<option value="<!--{$smarty.section.ftpservers.index}-->" <!--{if $CFGFTPPHIDGETSERVERID eq $smarty.section.ftpservers.index}-->selected<!--{/if}-->><!--{$smarty.section.ftpservers.index}-->: <!--{$CFGFTPSERVERSNAME[ftpservers]}--></option>
						<!--{/section}-->						
					</select>
					<!--{$LANG_CONFIGAVANCE_FTP_MAINFTPRETRY}-->
					<select name="cfgftpphidgetserverretry">
						<option value="no" <!--{if $CFGFTPPHIDGETSERVERRETRY eq "no"}-->selected<!--{/if}-->><!--{$LANG_CONFIGAVANCE_FTP_NORETRY}--></option>
						<!--{section name=cptloop start=1 loop=4}-->
							<option value="<!--{$smarty.section.cptloop.index}-->" <!--{if $CFGFTPPHIDGETSERVERRETRY eq $smarty.section.cptloop.index}-->selected<!--{/if}-->><!--{$smarty.section.cptloop.index}--></option>
						<!--{/section}-->						
					</select>			
			</td>	
		</tr>	
		</table>
		<table class="form-table">
			<tr>
				<td colspan="5"></td>
				<td colspan="5" align="center"><b><!--{$LANG_CONFIGAVANCE_PHIDGET_INSERTIMAGE}--></b></td>
			</tr>
			<tr align="center">
				<td><b><!--{$LANG_CONFIGAVANCE_PHIDGET_SENSOR}--></b></td>				
				<td><b><!--{$LANG_CONFIGAVANCE_PHIDGET_TYPE}--></b></td>
				<td><b><!--{$LANG_CONFIGAVANCE_PHIDGET_PORT}--></b></td>
				<td><b><!--{$LANG_CONFIGAVANCE_PHIDGET_TEXT}--></b></td>
				<td><b><!--{$LANG_CONFIGAVANCE_PHIDGET_COLOR}--></b></td>
				<td><b><!--{$LANG_CONFIGAVANCE_PHIDGET_INSERT}--></b></td>
				<td><b><!--{$LANG_CONFIGAVANCE_PHIDGET_RESOLUTION}--></b></td>
				<td><b><!--{$LANG_CONFIGAVANCE_PHIDGET_TRANSPARENCY}--></b></td>
				<td><b><!--{$LANG_CONFIGAVANCE_PHIDGET_XLOCATION}--></b></td>
				<td><b><!--{$LANG_CONFIGAVANCE_PHIDGET_YLOCATION}--></b></td>
			</tr>
			<!--{section name=capteurs start=1 loop=5}-->
			<tr align="center">
				<td><!--{$smarty.section.capteurs.index}--></td>	
				<td>
					<select name="srcfgsensortype-<!--{$smarty.section.capteurs.index}-->">
						<option value="no" <!--{if $SRCCFGSENSORTYPE[capteurs] eq "no"}-->selected<!--{/if}-->><!--{$LANG_CONFIGAVANCE_ERROR_DISABLED}--></option>
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
						<option value="no" <!--{if $SRCCFGSENSORPORT[capteurs] eq "disabled"}-->selected<!--{/if}-->><!--{$LANG_CONFIGAVANCE_ERROR_DISABLED}--></option>
					</select>
				</td>
				<td><input name="srcfgsensortext-<!--{$smarty.section.capteurs.index}-->" type="text" value="<!--{$SRCCFGSENSORTEXT[capteurs]}-->" size="15"></td>	
				<td>#<input name="srcfgsensorcolor-<!--{$smarty.section.capteurs.index}-->" type="text" value="<!--{$SRCCFGSENSORCOLOR[capteurs]}-->" size="8"></td>	
				<td><input name="srcfgsensorinsert-<!--{$smarty.section.capteurs.index}-->" type="checkbox" value="yes" <!--{$SRCCFGSENSORINSERT[capteurs]}-->></td>
				<td><input name="srcfgsensorsize-<!--{$smarty.section.capteurs.index}-->" type="text" value="<!--{$SRCCFGSENSORSIZE[capteurs]}-->" size="8"></td>	
				<td><input name="srcfgsensortransparency-<!--{$smarty.section.capteurs.index}-->" type="text" value="<!--{$SRCCFGSENSORTRANSPARENCY[capteurs]}-->" size="3"></td>	
				<td><input name="srcfgsensorposx-<!--{$smarty.section.capteurs.index}-->" type="text" value="<!--{$SRCCFGSENSORPOSX[capteurs]}-->" size="4"></td>	
				<td><input name="srcfgsensorposy-<!--{$smarty.section.capteurs.index}-->" type="text" value="<!--{$SRCCFGSENSORPOSY[capteurs]}-->" size="4"></td>	
			</tr>
			<!--{/section}-->
		</table>
		<input name="accept" type="submit" value="<!--{$LANG_CONFIGAVANCE_EMAIL_BUTTON}-->" class="button-primary" >						
	</div>
</div>


</form>	


<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_CONFIGAVANCE_CONFIGURATIONFILE_TITLE}--></span></h3>
	<div class="inside">
		<p>
		<!--{$LANG_CONFIGAVANCE_CONFIGURATIONFILE_IMPORT}--> <br /> 
		<form method="POST" action="<!--{$CONFIGURL}-->config-avance.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&upload=1" ENCTYPE="multipart/form-data">
		<input type=file name="configupload" /><input type=submit value="<!--{$LANG_CONFIGAVANCE_CONFIGURATIONFILE_BUTTON}-->" class="button-primary">
		</form>
		<br />		
			<!--{if $UPLOADSUCCESSFUL eq "YES"}-->
				<strong><font color="red"><!--{$LANG_CONFIGAVANCE_CONFIGURATIONFILE_UPLOADSUCCESS}--></font></strong><br />					
			<!--{/if}-->
			<!--{$LANG_CONFIGAVANCE_CONFIGURATIONFILE_WARNING}-->
			<br />
			<form>
				<input type="button" class="button-primary" value="<!--{$LANG_CONFIGAVANCE_CONFIGURATIONFILE_BUTTONDOWNLOAD}-->" onclick="window.location.href='<!--{$CONFIGURL}-->config-download.php?s=<!--{$CONFIGWEBCAMSOURCE}-->'">
			</form>
			<form>
				<input type="button" class="button-primary" value="<!--{$LANG_CONFIGAVANCE_CONFIGURATIONFILE_BUTTONDISPLAY}-->" onclick="window.location.href='<!--{$CONFIGURL}-->config-debug.php?s=<!--{$CONFIGWEBCAMSOURCE}-->'">
			</form>											
		</p>		
	</div>	
</div>

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_CONFIGAVANCE_INIT_TITLEINIT}--><!--{$CONFIGWEBCAMSOURCE}--><!--{$LANG_CONFIGAVANCE_INIT_TITLEEND}--></span></h3>
	<div class="inside">
		<p>
			<b><!--{$LANG_CONFIGAVANCE_INIT_INITSOURCE}--><!--{$CONFIGWEBCAMSOURCE}-->:</b> <br/>
			<form method="post" action="<!--{$CONFIGURL}-->config-avance.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">	
			<input name="postinitconfcs" type="checkbox" value="yes">
			<input name="accept" type="submit" value="<!--{$LANG_CONFIGAVANCE_INIT_INITSOURCEBUTTON}--><!--{$CONFIGWEBCAMSOURCE}-->" class="button-primary" >						
			</form>
			<br/>
			<!--{if $POSTINITCONF neq ""}-->
			<strong><font color="blue"><!--{$POSTINITCONF}--></font></strong><br/>
			<strong><font color="blue"><!--{$POSTINITCONFCS}--></font></strong><br/>
			<!--{/if}-->				
		</p>
		<p>
			<b><!--{$LANG_CONFIGAVANCE_INIT_INITVIDEO}--></b> <br/>
			<form method="post" action="<!--{$CONFIGURL}-->config-avance.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">	
			<input name="postinitcontentcs" type="checkbox" value="yes">
			<input name="accept" type="submit" value="<!--{$LANG_CONFIGAVANCE_INIT_INITVIDEOBUTTON}--><!--{$CONFIGWEBCAMSOURCE}-->" class="button-primary" >						
			</form>
			<!--{if $POSTINITCONTENT neq ""}-->
				<strong><font color="blue"><!--{$POSTINITCONTENT}--></font></strong><br/>
				<strong><font color="blue"><!--{$POSTINITCONTENTCS}--></font></strong><br/>
			<!--{/if}-->				
		</p>
		<p>
			<!--{$LANG_CONFIGAVANCE_INIT_WARNING}-->
		</p>		
	</div>
</div>


</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->
