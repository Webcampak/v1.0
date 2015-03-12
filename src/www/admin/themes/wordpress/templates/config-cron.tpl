<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_CRON_TITLE}--></h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">
<form method="post" action="<!--{$CONFIGURL}-->config-cron.php?submit=1">
<input type="hidden" name="submitform" value="1">		
<!--{section name=sources start=1 loop=$CRONNBSOURCES}-->
	<div id="commentstatusdiv" class="postbox ">
		<h3 class="hndle"><span><!--{$LANG_CRON_SOURCE}--> <!--{$smarty.section.sources.index}--><!--{$LANG_CRON_PRESENTATION_TITLE}--></span></h3> 
		<div class="inside">
			<h4><!--{$LANG_CRON_SOURCETITLE}--></h4>
								
			<table>
				<tr>
					<td></td>
					<td rowspan="2" colspan="2" align="center"><b><!--{$LANG_CRON_CAPTURE_FREQUENCY}--></b></td>
					<td width="10"></td>
					<td colspan="3" align="center"><b><!--{$LANG_CRON_CAPTURE_TIME}--></b></td>				
					<td width="10"></td>
					<td colspan="3" align="center"><b><!--{$LANG_CRON_CAPTURE_DAYS}--></b></td>				
				</tr>
				<tr>			
					<td></td>
					<td width="10"></td>
					<td align="center"><b><!--{$LANG_CRON_CAPTURE_ALL}--></b></td>				
					<td align="center"><b><!--{$LANG_CRON_CAPTURE_FROM}--></b></td>
					<td align="center"><b><!--{$LANG_CRON_CAPTURE_TO}--></b></td>
					<td width="10"></td>
					<td align="center"><b><!--{$LANG_CRON_CAPTURE_ALL}--></b></td>				
					<td align="center"><b><!--{$LANG_CRON_CAPTURE_FROMB}--></b></td>				
					<td align="center"><b><!--{$LANG_CRON_CAPTURE_TOB}--></b></td>					
				</tr>
				<tr>
					<td><!--{$LANG_CRON_SOURCE_STARTCAPTURE}--> </td>
					<td><input name="croncapturevalue<!--{$smarty.section.sources.index}-->" type="text" value="<!--{$CRONCAPTUREVALUE[sources]}-->" size="2"></td>		
					<td>
						<select name="croncaptureinterval<!--{$smarty.section.sources.index}-->">
							<option value="seconds" <!--{if $CRONCAPTUREINTERVAL[sources] eq "seconds"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_SECONDS}--></option>
							<option value="minutes" <!--{if $CRONCAPTUREINTERVAL[sources] eq minutes}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_MINUTES}--></option>
						</select>
					</td>
					<td></td>
					<td align="center"><input name="croncapturehourall<!--{$smarty.section.sources.index}-->" type="checkbox" value="yes" <!--{$CRONCAPTUREHOURALL[sources]}-->></td>	
					<td>
						<select name="croncapturehourstart<!--{$smarty.section.sources.index}-->">
							<option value="0" <!--{if $CRONCAPTUREHOURSTART[sources] eq "0"}-->selected<!--{/if}-->>00</option>
							<option value="1" <!--{if $CRONCAPTUREHOURSTART[sources] eq "1"}-->selected<!--{/if}-->>01</option>
							<option value="2" <!--{if $CRONCAPTUREHOURSTART[sources] eq "2"}-->selected<!--{/if}-->>02</option>
							<option value="3" <!--{if $CRONCAPTUREHOURSTART[sources] eq "3"}-->selected<!--{/if}-->>03</option>						
							<option value="4" <!--{if $CRONCAPTUREHOURSTART[sources] eq "4"}-->selected<!--{/if}-->>04</option>						
							<option value="5" <!--{if $CRONCAPTUREHOURSTART[sources] eq "5"}-->selected<!--{/if}-->>05</option>						
							<option value="6" <!--{if $CRONCAPTUREHOURSTART[sources] eq "6"}-->selected<!--{/if}-->>06</option>						
							<option value="7" <!--{if $CRONCAPTUREHOURSTART[sources] eq "7"}-->selected<!--{/if}-->>07</option>						
							<option value="8" <!--{if $CRONCAPTUREHOURSTART[sources] eq "8"}-->selected<!--{/if}-->>08</option>						
							<option value="9" <!--{if $CRONCAPTUREHOURSTART[sources] eq "9"}-->selected<!--{/if}-->>09</option>						
							<option value="10" <!--{if $CRONCAPTUREHOURSTART[sources] eq "10"}-->selected<!--{/if}-->>10</option>						
							<option value="11" <!--{if $CRONCAPTUREHOURSTART[sources] eq "11"}-->selected<!--{/if}-->>11</option>						
							<option value="12" <!--{if $CRONCAPTUREHOURSTART[sources] eq "12"}-->selected<!--{/if}-->>12</option>						
							<option value="13" <!--{if $CRONCAPTUREHOURSTART[sources] eq "13"}-->selected<!--{/if}-->>13</option>						
							<option value="14" <!--{if $CRONCAPTUREHOURSTART[sources] eq "14"}-->selected<!--{/if}-->>14</option>						
							<option value="15" <!--{if $CRONCAPTUREHOURSTART[sources] eq "15"}-->selected<!--{/if}-->>15</option>						
							<option value="16" <!--{if $CRONCAPTUREHOURSTART[sources] eq "16"}-->selected<!--{/if}-->>16</option>						
							<option value="17" <!--{if $CRONCAPTUREHOURSTART[sources] eq "17"}-->selected<!--{/if}-->>17</option>						
							<option value="18" <!--{if $CRONCAPTUREHOURSTART[sources] eq "18"}-->selected<!--{/if}-->>18</option>						
							<option value="19" <!--{if $CRONCAPTUREHOURSTART[sources] eq "19"}-->selected<!--{/if}-->>19</option>						
							<option value="20" <!--{if $CRONCAPTUREHOURSTART[sources] eq "20"}-->selected<!--{/if}-->>20</option>						
							<option value="21" <!--{if $CRONCAPTUREHOURSTART[sources] eq "21"}-->selected<!--{/if}-->>21</option>						
							<option value="22" <!--{if $CRONCAPTUREHOURSTART[sources] eq "22"}-->selected<!--{/if}-->>22</option>						
							<option value="23" <!--{if $CRONCAPTUREHOURSTART[sources] eq "23"}-->selected<!--{/if}-->>23</option>						
						</select><!--{$LANG_CRON_SOURCE_DAILYHOUR}-->
					</td>
					<td>
						<select name="croncapturehourstop<!--{$smarty.section.sources.index}-->">
							<option value="0" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "0"}-->selected<!--{/if}-->>00</option>
							<option value="1" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "1"}-->selected<!--{/if}-->>01</option>
							<option value="2" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "2"}-->selected<!--{/if}-->>02</option>
							<option value="3" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "3"}-->selected<!--{/if}-->>03</option>						
							<option value="4" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "4"}-->selected<!--{/if}-->>04</option>						
							<option value="5" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "5"}-->selected<!--{/if}-->>05</option>						
							<option value="6" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "6"}-->selected<!--{/if}-->>06</option>						
							<option value="7" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "7"}-->selected<!--{/if}-->>07</option>						
							<option value="8" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "8"}-->selected<!--{/if}-->>08</option>						
							<option value="9" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "9"}-->selected<!--{/if}-->>09</option>						
							<option value="10" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "10"}-->selected<!--{/if}-->>10</option>						
							<option value="11" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "11"}-->selected<!--{/if}-->>11</option>						
							<option value="12" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "12"}-->selected<!--{/if}-->>12</option>						
							<option value="13" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "13"}-->selected<!--{/if}-->>13</option>						
							<option value="14" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "14"}-->selected<!--{/if}-->>14</option>						
							<option value="15" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "15"}-->selected<!--{/if}-->>15</option>						
							<option value="16" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "16"}-->selected<!--{/if}-->>16</option>						
							<option value="17" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "17"}-->selected<!--{/if}-->>17</option>						
							<option value="18" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "18"}-->selected<!--{/if}-->>18</option>						
							<option value="19" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "19"}-->selected<!--{/if}-->>19</option>						
							<option value="20" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "20"}-->selected<!--{/if}-->>20</option>						
							<option value="21" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "21"}-->selected<!--{/if}-->>21</option>						
							<option value="22" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "22"}-->selected<!--{/if}-->>22</option>						
							<option value="23" <!--{if $CRONCAPTUREHOURSTOP[sources] eq "23"}-->selected<!--{/if}-->>23</option>						
						</select><!--{$LANG_CRON_SOURCE_DAILYHOUR}-->
					</td>
					<td></td>
					<td align="center"><input name="croncapturedaysall<!--{$smarty.section.sources.index}-->" type="checkbox" value="yes" <!--{$CRONCAPTUREDAYSALL[sources]}-->></td>	
					<td>
						<select name="croncapturedaysstart<!--{$smarty.section.sources.index}-->">
							<option value="1" <!--{if $CRONCAPTUREDAYSSTART[sources] eq "1"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_MONDAY}--></option>
							<option value="2" <!--{if $CRONCAPTUREDAYSSTART[sources] eq "2"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_TUESDAY}--></option>						
							<option value="3" <!--{if $CRONCAPTUREDAYSSTART[sources] eq "3"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_WEDNESDAY}--></option>						
							<option value="4" <!--{if $CRONCAPTUREDAYSSTART[sources] eq "4"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_THURSDAY}--></option>						
							<option value="5" <!--{if $CRONCAPTUREDAYSSTART[sources] eq "5"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_FRIDAY}--></option>						
							<option value="6" <!--{if $CRONCAPTUREDAYSSTART[sources] eq "6"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_SATURDAY}--></option>						
							<option value="7" <!--{if $CRONCAPTUREDAYSSTART[sources] eq "7"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_SUNDAY}--></option>						
						</select>
					</td>
					<td>
						<select name="croncapturedaysstop<!--{$smarty.section.sources.index}-->">
							<option value="1"	<!--{if $CRONCAPTUREDAYSSTOP[sources] eq "1"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_MONDAY}--></option>
							<option value="2" <!--{if $CRONCAPTUREDAYSSTOP[sources] eq "2"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_TUESDAY}--></option>						
							<option value="3" <!--{if $CRONCAPTUREDAYSSTOP[sources] eq "3"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_WEDNESDAY}--></option>						
							<option value="4" <!--{if $CRONCAPTUREDAYSSTOP[sources] eq "4"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_THURSDAY}--></option>						
							<option value="5" <!--{if $CRONCAPTUREDAYSSTOP[sources] eq "5"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_FRIDAY}--></option>						
							<option value="6" <!--{if $CRONCAPTUREDAYSSTOP[sources] eq "6"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_SATURDAY}--></option>						
							<option value="7" <!--{if $CRONCAPTUREDAYSSTOP[sources] eq "7"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_SUNDAY}--></option>						
						</select>
					</td>
				</tr>		
			</table>
			<h4><!--{$LANG_CRON_SOURCE_DAILYVIDTITLE}--></h4>
			<table>
				<tr>
					<td><!--{$LANG_CRON_SOURCE_DAILYSTART}--> </td>
					<td><input name="crondailyhour<!--{$smarty.section.sources.index}-->" type="text" value="<!--{$CRONDAILYHOUR[sources]}-->" size="2"></td>		
					<td><!--{$LANG_CRON_SOURCE_DAILYHOUR}--></td>	
					<td><input name="crondailyminute<!--{$smarty.section.sources.index}-->" type="text" value="<!--{$CRONDAILYMINUTE[sources]}-->" size="2"></td>
					<td> <!--{$LANG_CRON_SOURCE_DAILYDAYS}--> </td>				
				</tr>		
			</table>		
			<h4><!--{$LANG_CRON_SOURCE_CUSTOMTITLE}--></h4>
			<table>
				<tr>
					<td><!--{$LANG_CRON_SOURCE_CUSTOMSTART}--> </td>
					<td><input name="croncustomvalue<!--{$smarty.section.sources.index}-->" type="text" value="<!--{$CRONCUSTOMVALUE[sources]}-->" size="2"></td>		
					<td>
						<select name="croncustominterval<!--{$smarty.section.sources.index}-->">
							<option value="minutes" <!--{if $CRONCUSTOMINTERVAL[sources] eq "minutes"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_MINUTES}--></option>
							<option value="hours" <!--{if $CRONCUSTOMINTERVAL[sources] eq "hours"}-->selected<!--{/if}-->><!--{$LANG_CRON_SOURCE_HOURS}--></option>						
						</select>
					</td>
				</tr>		
			</table>
			<p>
			<strong><!--{$LANG_CRON_TIP}--></strong><br />
		  	<!--{$LANG_CRON_TIPTEXT}--> 
		</p>					
		</div>
	</div>	
<!--{/section}-->
<input name="accept" type="submit" value="<!--{$LANG_CRON_BUTTON}-->" class="button-primary" >
</form>

</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

