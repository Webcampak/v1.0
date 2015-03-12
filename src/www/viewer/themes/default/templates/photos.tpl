		<div id="leftcolumn">
			<div id="calendar">
				<table align="center">
				<tr>
					<td align='center'><!--{if $CALENDARPREVIOUSMONTH neq ""}--><a href='?timestamp=<!--{$CALENDARPREVIOUSMONTH}-->'><img src="<!--{$CONFIGBASE}-->themes/default/img/go-previous.png" border="0" /></a><!--{/if}--></td>
					<td colspan='5' align='center'><!--{$CALENDARCURRENTMONTH}--> <!--{$CALENDARCURRENTYEAR}--></td>
					<td align='center'><!--{if $CALENDARFOLLOWINGMONTH neq ""}--><a href='?timestamp=<!--{$CALENDARFOLLOWINGMONTH}-->'><img src="<!--{$CONFIGBASE}-->themes/default/img/go-next.png" border="0" /></a><!--{/if}--></td>
				</tr>
				<tr>
					<td width='15' align='center'><b><!--{$CALENDARDAY01}--></b></td>
					<td width='15' align='center'><b><!--{$CALENDARDAY02}--></b></td>
					<td width='15' align='center'><b><!--{$CALENDARDAY03}--></b></td>
					<td width='15' align='center'><b><!--{$CALENDARDAY04}--></b></td>
					<td width='15' align='center'><b><!--{$CALENDARDAY05}--></b></td>
					<td width='15' align='center'><b><!--{$CALENDARDAY06}--></b></td>
					<td width='15' align='center'><b><!--{$CALENDARDAY07}--></b></td>
				</tr>
				<!--{section name=days start=1 loop=$CALENDARTABLENBDAYS}-->
					<!--{if $smarty.section.days.index eq 1}-->
						<tr>
					<!--{/if}-->
					<!--{if $CALENDARTABLEDAILYPICS[days] gte 1}-->
						<!--{if $CALENDARCURRENTDAY eq $smarty.section.days.index}-->
							<td bgcolor='#525252'>
						<!--{else}-->
							<td>
						<!--{/if}-->
							<a href="?timestamp=<!--{$CALENDARTABLEDAILYPICSTIMESTAMP[days]}-->"><!--{$smarty.section.days.index}--></a>
					<!--{else}-->
						<td><!--{$smarty.section.days.index}--></td>
					<!--{/if}-->
					<!--{if $smarty.section.days.index eq 7 OR $smarty.section.days.index eq 14 OR $smarty.section.days.index eq 21 OR $smarty.section.days.index eq 28}-->
						</tr><tr>
					<!--{/if}-->
				<!--{/section}-->
				</table>
			</div>
			<!--{if $DISPLAY eq "photos"}-->	
				<!--{if $DISPPICTURE neq "0"}-->	
				<div id="joystick">			
					<!--{if $CURRENTZOOM neq 100 AND $CURRENTZOOM neq ""}-->
						<a href="include/timthumb/timthumb.php?src=<!--{$DISPPICTURESHORT}-->&s=<!--{$CONFIGSOURCE}-->&w=<!--{$DISPPICTUREZOOMWIDTH}-->&q=100" class="jqzoom" style="" title="Zoom <!--{$CURRENTZOOM}-->%">
					<!--{else}-->
						<a href="<!--{$DISPPICTURE}-->" class="jqzoom" style="" title="Zoom <!--{$CURRENTZOOM}-->%">
					<!--{/if}-->
					<img src="include/timthumb/timthumb.php?src=<!--{$DISPPICTURESHORT}-->&s=<!--{$CONFIGSOURCE}-->&w=348&q=100" title="Zoom <!--{$CURRENTZOOM}-->%" style="border: 1px solid #666;">
					</a>
				</div>
				&nbsp;
				<div id="zoom">
					<div id="zoomleftcolumn"><img src="<!--{$CONFIGBASE}-->themes/default/img/zoomleft.png" /></div>
					<div id="zoomrightcolumn"><img src="<!--{$CONFIGBASE}-->themes/default/img/zoomright.png" /></div>
					<div id="zoomcenter">					
						<div class="sc_menu">
							<ul class="sc_menu">
								<li><a href="?zoom=25"><img src="<!--{$CONFIGBASE}-->themes/default/img/scrollbar-<!--{if $CURRENTZOOM neq 25}-->not<!--{/if}-->selected.png" alt="25%"/><br />25%<span>25%</span></a>
								<li><a href="?zoom=50"><img src="<!--{$CONFIGBASE}-->themes/default/img/scrollbar-<!--{if $CURRENTZOOM neq 50}-->not<!--{/if}-->selected.png" alt="50%"/><br />50%<span>50%</span></a>
								<li><a href="?zoom=100"><img src="<!--{$CONFIGBASE}-->themes/default/img/scrollbar-<!--{if $CURRENTZOOM neq 100}-->not<!--{/if}-->selected.png" alt="100%"/><br />100%<span>100%</span></a>           
								<li><a href="?zoom=150"><img src="<!--{$CONFIGBASE}-->themes/default/img/scrollbar-<!--{if $CURRENTZOOM neq 150}-->not<!--{/if}-->selected-numeric.png" alt="150%"/><br />150%<span>150%</span></a>
								<li><a href="?zoom=200"><img src="<!--{$CONFIGBASE}-->themes/default/img/scrollbar-<!--{if $CURRENTZOOM neq 200}-->not<!--{/if}-->selected-numeric.png" alt="200%"/><br />200%<span>200%</span></a>
							</ul>
						</div>
					</div>
				</div>
				<!--{/if}-->
				<div id="calendarday">			
					<table cellspacing="0" cellpadding="0">
					<!--{section name=hours loop=24}-->
						<tr>
						<td><!--{if $smarty.section.hours.index lt "10"}-->0<!--{/if}--><!--{$smarty.section.hours.index}--></td>
						<!--{section name=minutes loop=60}-->
							<!--{if $CALENDARCURRENTMINUTE eq $smarty.section.minutes.index AND $CALENDARCURRENTHOUR eq $smarty.section.hours.index}-->
								<td bgcolor="#d9d9d9">
									&nbsp;
								</td>
							<!--{elseif $CALENDARHOURLYPICRESULTS[hours][minutes] eq $smarty.section.minutes.index AND $CALENDARHOURLYPICRESULTSTIMESTAMP[hours][minutes] neq ""}-->
								<td bgcolor="#5dc1dc">
									<a class="tabledisphour" href="?timestamp=<!--{$CALENDARHOURLYPICRESULTSTIMESTAMP[hours][minutes]}-->">&nbsp;
									<span class="tabledispspanhour" >
										<!--{$smarty.section.hours.index}-->h<!--{if $smarty.section.minutes.index lt "10"}-->0<!--{/if}--><!--{$smarty.section.minutes.index}-->
									</span>
									</a>
								</td>
							<!--{else}-->
								<td bgcolor="#989898">
								&nbsp;
								</td>
							<!--{/if}-->					
						<!--{/section}-->
						</tr>
					<!--{/section}-->	
					</table>			
				</div>
				<!--{if $DISPLAYSENSORCPT neq "0"}-->
				<br />
				<div id="joystick">
					<!--{section name=sensors loop=$DISPLAYSENSORCPT}-->
					<a href="<!--{$DISPLAYSENSOR[sensors]}-->" target="_blank">
					<img src="<!--{$DISPLAYSENSOR[sensors]}-->" width="348" style="border: 0px solid #666;">
					</a> <br />
					<!--{/section}-->
				</div>
				<!--{/if}-->
			<!--{/if}-->
			<br />
			
		</div>
		<div id="rightcolumn">
			<br />
				<a href="include/timthumb/timthumb.php?src=<!--{$DISPPICTURESHORT}-->&s=<!--{$CONFIGSOURCE}-->&w=<!--{$DISPPICTUREZOOMWIDTH}-->&q=100" target="_blank"><img src="<!--{$CONFIGBASE}-->themes/default/img/f-spot.png" /><br /><!--{$LANG_PHOTOS_DOWNLOAD_PICTURE}--></a> <br /><br />
				<a href="<!--{$DISPPICTURE}-->" target="_blank"><img src="<!--{$CONFIGBASE}-->themes/default/img/ksnapshot.png" /><br /><!--{$LANG_PHOTOS_DOWNLOAD_ORIGINAL}--></a> <br />
			<br />
		</div>
		<div id="center">
			<div id="centerprevious">
				<!--{if $CALENDARPREVIOUSTIMESTAMP neq ""}-->
					<a href="?timestamp=<!--{$CALENDARPREVIOUSTIMESTAMP}-->"><img src="<!--{$CONFIGBASE}-->themes/default/img/go-previous.png" border="0" /> <!--{$LANG_PHOTOS_PREVIOUS}--></a>
				<!--{/if}-->
			</div>
			<div id="centernext">
				<!--{if $CALENDARFOLLOWINGTIMESTAMP neq ""}-->			
					<a href="?timestamp=<!--{$CALENDARFOLLOWINGTIMESTAMP}-->"><!--{$LANG_PHOTOS_NEXT}--> <img src="<!--{$CONFIGBASE}-->themes/default/img/go-next.png" border="0" /></a>
				<!--{/if}-->				
			</div>			
			<div id="centerdate">		
				<h1>
					<!--{if $VIDEOFILENAME neq ""}-->
						<!--{$VIDEOFILENAME}-->	
					<!--{/if}-->		
				</h1>
			</div>
				<!--{if $DISPPICTURE neq "0"}-->	
					<table align="center">
					<tr>
						<!--{if $THUMBPICMIN3TIMESTAMP neq ""}-->						
							<td><!--{$THUMBPICMIN3TXTHOUR}-->:<!--{$THUMBPICMIN3TXTMINUTE}--><br />
							<a href="?timestamp=<!--{$THUMBPICMIN3TIMESTAMP}-->"><img src="include/timthumb/timthumb.php?src=<!--{$THUMBPICMIN3}-->&s=<!--{$CONFIGSOURCE}-->&w=90&q=70" width="90" /></a></td>
							<td width="4"></td>
						<!--{/if}-->
						<!--{if $THUMBPICMIN2TIMESTAMP neq ""}-->
							<td><!--{$THUMBPICMIN2TXTHOUR}-->:<!--{$THUMBPICMIN2TXTMINUTE}--><br />
							<a href="?timestamp=<!--{$THUMBPICMIN2TIMESTAMP}-->"><img src="include/timthumb/timthumb.php?src=<!--{$THUMBPICMIN2}-->&s=<!--{$CONFIGSOURCE}-->&w=90&q=70" width="90" /></a></td>
							<td width="4"></td>
						<!--{/if}-->
						<!--{if $THUMBPICMIN1TIMESTAMP neq ""}-->
							<td><!--{$THUMBPICMIN1TXTHOUR}-->:<!--{$THUMBPICMIN1TXTMINUTE}--><br />
							<a href="?timestamp=<!--{$THUMBPICMIN1TIMESTAMP}-->"><img src="include/timthumb/timthumb.php?src=<!--{$THUMBPICMIN1}-->&s=<!--{$CONFIGSOURCE}-->&w=90&q=70" width="90" /></a></td>
							<td width="4"></td>
						<!--{/if}-->
						<!--{if $THUMBPICPLUS1TIMESTAMP neq ""}-->
							<td><!--{$THUMBPICPLUS1TXTHOUR}-->:<!--{$THUMBPICPLUS1TXTMINUTE}--><br />
							<a href="?timestamp=<!--{$THUMBPICPLUS1TIMESTAMP}-->"><img src="include/timthumb/timthumb.php?src=<!--{$THUMBPICPLUS1}-->&s=<!--{$CONFIGSOURCE}-->&w=90&q=70" width="90" /></a></td>
							<td width="4"></td>
						<!--{/if}-->
						<!--{if $THUMBPICPLUS2TIMESTAMP neq ""}-->
							<td><!--{$THUMBPICPLUS2TXTHOUR}-->:<!--{$THUMBPICPLUS2TXTMINUTE}--><br />
							<a href="?timestamp=<!--{$THUMBPICPLUS2TIMESTAMP}-->"><img src="include/timthumb/timthumb.php?src=<!--{$THUMBPICPLUS2}-->&s=<!--{$CONFIGSOURCE}-->&w=90&q=70" width="90" /></a></td>
							<td width="4"></td>
						<!--{/if}-->
						<!--{if $THUMBPICPLUS3TIMESTAMP neq ""}-->
							<td><!--{$THUMBPICPLUS3TXTHOUR}-->:<!--{$THUMBPICPLUS3TXTMINUTE}--><br />
							<a href="?timestamp=<!--{$THUMBPICPLUS3TIMESTAMP}-->"><img src="include/timthumb/timthumb.php?src=<!--{$THUMBPICPLUS3}-->&s=<!--{$CONFIGSOURCE}-->&w=90&q=70" width="90" /></a></td>
						<!--{/if}-->
						<tr><td align="center" colspan="11"><h2><!--{$CALENDARCURRENTDAYTXT}--></h2></td></tr>
					</tr>
					</table>
					<!--{if $DISPPICTUREWIDTH lt 1024}-->
						<a href="<!--{$DISPPICTURE}-->" target="_blank"><img src="<!--{$DISPPICTURE}-->" width="624"/></a> <br />
					<!--{else}-->
						<!--{if ($CURRENTZOOM neq 100 AND $CURRENTZOOM neq "")}-->
							<a href="include/timthumb/timthumb.php?src=<!--{$DISPPICTURESHORT}-->&s=<!--{$CONFIGSOURCE}-->&w=<!--{$DISPPICTUREZOOMWIDTH}-->&q=100" target="_blank"><img src="include/timthumb/timthumb.php?src=<!--{$DISPPICTURESHORT}-->&s=<!--{$CONFIGSOURCE}-->&w=<!--{$DISPPICTUREZOOMWIDTH}-->&q=100" width="624" /></a>
						<!--{else}-->
							<a href="<!--{$DISPPICTURE}-->" target="_blank"><img src="<!--{$DISPPICTURE}-->" width="624"/></a>
						<!--{/if}-->
					<!--{/if}-->					
				<!--{else}-->
					<!--{$LANG_PHOTOS_NOPICTURE}--> <br />
				<!--{/if}-->
		</div>
