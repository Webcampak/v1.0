	<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_CONFIGCALIBRATE_SOURCE}--> <!--{$CONFIGWEBCAMSOURCE}--><!--{$LANG_CONFIGCALIBRATE_TITLE}--></h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_CONFIGCALIBRATE_PICTURESAMPLE}--></span></h3>
	<div class="inside">
	<p>
		<center>
		<form method="post" action="<!--{$CONFIGURL}-->config-calibrate.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&capture=1">		
		<input name="accept" type="submit" value="<!--{$LANG_CONFIGCALIBRATE_PICTURESAMPLE_BUTTON}-->" class="button-primary">
		</form><br />
		<!--{$LANG_CONFIGCALIBRATE_PICTURESAMPLE_NOTE}-->
		<!--{if $DSIPLAYCAPTURE eq "1"}-->
			<img src="<!--{$CONFIGURL}-->../sources/source<!--{$CONFIGWEBCAMSOURCE}-->/tmp/sample.jpg" width="640" />			
		<!--{/if}-->	
		</center>		
	</p>	
	</div>	
</div>
<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_CONFIGCALIBRATE_PARAMETERS_TITLE}--></span></h3>
	<div class="inside">
		<form method="post" action="<!--{$CONFIGURL}-->config-calibrate.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">
		<input type="hidden" name="submitform" value="1">
		<table class="form-table">
			<!--{if $GPHOTOINITWARNING eq ""}-->						
			<tr>
				<td align="center"><b><!--{$LANG_CONFIGCALIBRATE_PARAMETERS_PARAMETERS}--></b></td>
				<td align="center"><b><!--{$LANG_CONFIGCALIBRATE_PARAMETERS_CAMERAVALUE}--></b></td>
				<td align="center"><b><!--{$LANG_CONFIGCALIBRATE_PARAMETERS_DEFAULTVALUE}--></b></td>							
				<td align="center"><b><!--{$LANG_CONFIGCALIBRATE_PARAMETERS_CUSTOMVALUE}--></b></td>																
				<td align="center"><b><!--{$LANG_CONFIGCALIBRATE_PARAMETERS_EDIT}--></b></td>
			</tr>	
				<!--{section name=params loop=$GPHOTOPARAMCPT}-->
				<!--{if $smarty.section.params.index is odd}-->
					<tr bgcolor="#e6ddd5">
				<!--{else}-->
					<tr bgcolor="#efe9e3">
				<!--{/if}-->					
					<td><!--{$GPHOTOPARAMLABEL[params]}--></td>					
					<td><!--{$GPHOTOPARAMCURRENT[params]}--></td>
					<td align="center"><!--{$GPHOTOPARAMFROMCONFCONFIGTXT[params]}--></td>									
					<td align="center"><!--{$GPHOTOPARAMCUSTOMCONFIG[params]}--></td>													
					<td align="center">
						<!--{if $GPHOTOPARAMCHOICECPT[params] neq ""}-->
							<select name="<!--{$GPHOTOPARAMNAME[params]}-->">
								<!--{if $GPHOTOPARAMCUSTOMCONFIG[params] eq ""}-->
									<option value="default" selected><!--{$LANG_CONFIGCALIBRATE_PARAMETERS_NOCHANGES}--></option>
								<!--{/if}-->																	
							<!--{section name=choices loop=$GPHOTOPARAMCHOICECPT[params]}-->
								<option value="<!--{$GPHOTOPARAMCHOICEVALUE[params][choices]}-->" <!--{if $GPHOTOPARAMCUSTOMCONFIG[params] neq ""}--><!--{if $GPHOTOPARAMCUSTOMCONFIG[params] eq $GPHOTOPARAMCHOICEVALUE[params][choices]}-->selected<!--{/if}--><!--{/if}-->><!--{$GPHOTOPARAMCHOICE[params][choices]}--></option>						
							<!--{/section}-->	
							</select>										
						<!--{/if}-->
						<!--{if $GPHOTOPARAMTOP[params] neq ""}-->
							<select name="<!--{$GPHOTOPARAMNAME[params]}-->">
								<option value="default"><!--{$LANG_CONFIGCALIBRATE_PARAMETERS_NOCHANGES}--></option>									
							<!--{section name=choices loop=$GPHOTOPARAMTOP[params] step=$GPHOTOPARAMSTEP[params] start=$GPHOTOPARAMBOTTOM[params]}-->
								<option value="<!--{$smarty.section.choices.index}-->" <!--{if $GPHOTOPARAMCUSTOMCONFIG[params] neq ""}--><!--{if $GPHOTOPARAMCUSTOMCONFIG[params] eq $smarty.section.choices.index}-->selected<!--{/if}--><!--{/if}-->><!--{$smarty.section.choices.index}--></option>						
							<!--{/section}-->	
							</select>										
						<!--{/if}-->										
					</td>					
				</tr>
				<!--{/section}-->
			<!--{else}-->
				<tr><td colspan="3"><b>
					<!--{if $GPHOTOINITWARNING eq "1"}-->				
						<!--{$LANG_CONFIGCALIBRATE_GPHOTOINITWARNING1}-->
					<!--{elseif $GPHOTOINITWARNING eq "2"}-->
						<!--{$LANG_CONFIGCALIBRATE_GPHOTOINITWARNING1}-->
					<!--{/if}-->				
				</b></td></tr>
			<!--{/if}-->	
		<tr><td>&nbsp;</td></tr>
		<!--{if $GPHOTOINITWARNING eq ""}-->			
		<tr><td colspan="5" align="center">		
				<input name="acceptcapture" type="submit" value="<!--{$LANG_CONFIGCALIBRATE_PARAMETERS_BUTTON}-->" class="button-primary">											
		</td></tr>
		<!--{/if}-->		
		</table>
		</form>	
	</div>
</div>

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_CONFIGCALIBRATE_ACTIONS_TITLE}--></span></h3>
	<div class="inside">
	<p>
		<table class="form-table">
			<tr valign="top">
				<td>
					<!--{$LANG_CONFIGCALIBRATE_ACTIONS_DELETE}-->
				</td>				
				<td align="center">					
					<form method="post" action="<!--{$CONFIGURL}-->config-calibrate.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&init=1">		
					<input name="globalinit" type="submit" value="<!--{$LANG_CONFIGCALIBRATE_ACTIONS_BUTTONINIT}-->" class="button-primary"><br />
					</form>								
				</td>	
			</tr>
			<tr valign="top">		
				<td>
					<!--{$LANG_CONFIGCALIBRATE_ACTIONS_RESTORE}-->
				</td>				
				<td align="center">						
					<form method="post" action="<!--{$CONFIGURL}-->config-calibrate.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&restore=1">		
					<input name="accept" type="submit" value="<!--{$LANG_CONFIGCALIBRATE_ACTIONS_BUTTONRESTORE}-->" class="button-primary"><br />
					</form>								
				</td>
			</tr>					
		</table>		
	</p>	
	</div>	
</div>



</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->
