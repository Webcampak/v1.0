	<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_MANAGEVIDEOS_SOURCE}--> <!--{$CONFIGWEBCAMSOURCE}--><!--{$LANG_MANAGEVIDEOS_TITLE}--></h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">

<div id="commentstatusdiv" class="postbox ">
	<form method="post" action="<!--{$CONFIGURL}-->config-managevideos.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">
	<input type="hidden" name="submitform" value="1">
	<h3 class="hndle"><span><!--{$LANG_MANAGEVIDEOS_MANAGE}--></h3>
	<div class="inside">
			<table class="form-table">
                	<tr id="frheader">
                  	<td>&nbsp;</td> 
        				 	<td align="center"></td>                 	
                  	<td align="center"><!--{$LANG_MANAGEVIDEOS_DATE}--></td>         	
                  	<td align="center">H.264<br />1080p</td>
                  	<td align="center">H.264<br />720p</td>
                  	<td align="center">H.264<br />480p</td>
                  	<td align="center">H.264<br />Custom</td>
						</tr>
						<!--{section name=vidfile loop=$CPTVIDFILE start=1}-->
				      <tr valign="top">
                  	<td align="center" valign="middle">
                  		<table>
                  		<tr><td><b><input name="<!--{$VIDRESULTSGLOBALDATE[vidfile]}-->" type="checkbox" value="yes"></b></td>
                  		<td><b><a href="<!--{$CONFIGURL}-->config-managevideos.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1&deleteday=<!--{$VIDRESULTSGLOBALDATE[vidfile]}-->"><img src="<!--{$CONFIGURL}-->themes/default/img/delete.gif" width="14" border="0" /></a></b></td></tr>
                  		<tr><td colspan="2"><font size="-7"><!--{$VIDRESULTSGLOBALDSIZE[vidfile]}--></font></td></tr>
                  		</table>                  	
                  	</td>
                  	<td align="center" valign="middle">
                  		<table cellpadding="0" cellspacing="0" border="0">
                  		<tr><td><b>Avi</b></td></tr>
                  		<tr><td><b>MP4</b></td></tr>
                  		</table>
                  	</td>                  		
                 	   <td align="center" valign="middle"><!--{$VIDRESULTSGLOBALDATETXT[vidfile]}--></td>
                 	   <!--{section name=codecs loop=$CPTCODECS}-->
                  		<td align="center" valign="middle">
                  			<table cellpadding="0" cellspacing="0" border="0">
                  			<tr>
	                  			<td valign="middle">
	                  			<!--{if $VIDRESULTSCONTENT[vidfile][codecs][1] neq ""}-->
	                  				<a href="<!--{$CONFIGURL}-->config-managevideos.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1&deletevid=<!--{$VIDRESULTSCONTENT[vidfile][codecs][1]}-->"><img src="<!--{$CONFIGURL}-->themes/default/img/delete.gif" width="10" border="0" /></a>
										<!--{/if}-->
										&nbsp;           			
	                  			</td>
   	               			<td valign="middle">
                  					<!--{$VIDRESULTSCONTENT[vidfile][codecs][2]}-->
      	            			</td>
                  			</tr>
                  			<tr>
	                  			<td valign="middle">
	                  			<!--{if $VIDRESULTSCONTENT[vidfile][codecs][3] neq ""}-->
	                  				<a href="<!--{$CONFIGURL}-->config-managevideos.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1&deletevid=<!--{$VIDRESULTSCONTENT[vidfile][codecs][3]}-->"><img src="<!--{$CONFIGURL}-->themes/default/img/delete.gif" width="10" border="0" /></a>
										<!--{/if}-->
										&nbsp;           			
	                  			</td>
   	               			<td valign="middle">
                  					<!--{$VIDRESULTSCONTENT[vidfile][codecs][4]}-->
      	            			</td>
                  			</tr>    
                  			</table>
                  		</td>
                  	<!--{/section}-->
						</tr>
						<!--{/section}-->
						<tr>
							<td colspan="2"><b><input name="accept" type="submit" value="<!--{$LANG_MANAGEVIDEOS_BUTTON}-->" class="button-primary" ></b></td>
							<td align="right"><b></b></td>
							<td align="center"><b><!--{$VIDRESULTSNBFILES}--></b></td>
							<td align="center"><b><!--{$VIDRESULTSTOTALSIZE}--></b></td>	 	
						</tr>			
			</table>		
	</div>
</div>

</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->
