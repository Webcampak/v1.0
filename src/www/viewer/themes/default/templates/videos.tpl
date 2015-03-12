		<div id="leftcolumn">
			<div id="calendar">
				<table align="center">
				<tr>
					<td align='center'><a href='?timestamp=<!--{$CALENDARPREVIOUSMONTH}-->'><img src="<!--{$CONFIGBASE}-->themes/default/img/go-previous.png" border="0" /></a></td>
					<td colspan='5' align='center'><!--{$CALENDARCURRENTMONTH}--> <!--{$CALENDARCURRENTYEAR}--></td>
					<td align='center'><a href='?timestamp=<!--{$CALENDARFOLLOWINGMONTH}-->'><img src="<!--{$CONFIGBASE}-->themes/default/img/go-next.png" border="0" /></a></td>
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
					<!--{if $CALENDARTABLEDAILYPICS[days] gte 1 or $DAILYVIDSCPT[days] gte 1}-->
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
			<br /><br />
			<b><!--{$LANG_VIDEOS_DAILYCREATEDVID}--></b><br />
			<!--{section name=dailycreatedvideos loop=$CPTCREATEDVIDS}-->
				<a href="?playvideo=<!--{$DAILYCREATEDVIDS[dailycreatedvideos]}-->"><!--{$DAILYCREATEDVIDS[dailycreatedvideos]}--> (<!--{$DAILYCREATEDVIDSFILESIZE[dailycreatedvideos]}-->)</a><br />
			<!--{/section}-->	
			<br />
			
		</div>
		<div id="rightcolumn">
			<br />		
				<a href="<!--{$CONFIGWEBSITENAME}--><!--{$PLAYVIDEO}-->" targer="_blank"><img src="<!--{$CONFIGBASE}-->themes/default/img/gnome-mplayer.png" /><br /><!--{$LANG_VIDEOS_DOWNLOADVID}--></a> <br />			
			<br />
		</div>
		<div id="center">
			<div id="centerprevious">
			</div>
			<div id="centernext">			
			</div>			
			<div id="centerdate">		
				<h1>
					<!--{if $VIDEOFILENAME neq ""}-->
						<!--{$VIDEOFILENAME}-->			
					<!--{else}-->
						<!--{$CALENDARCURRENTDAYTXT}-->
					<!--{/if}-->		
				</h1>
			</div>
				<!--{if $PLAYVIDEOFLASHAVAILABLE eq "yes"}-->	
					<!-- Begin VideoJS -->
			  		<div class="video-js-box">
		    			<!-- Using the Video for Everybody Embed Code http://camendesign.com/code/video_for_everybody -->
		    			<video class="video-js" width="<!--{$PLAYVIDEOFLASHWIDTH}-->" height="<!--{$PLAYVIDEOFLASHHEIGHT}-->" controls preload poster="<!--{$CONFIGWEBSITENAME}--><!--{$PLAYVIDEO}-->.jpg">
		    	  			<source src="<!--{$CONFIGWEBSITENAME}--><!--{$PLAYVIDEO}-->.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
		      			<!-- Flash Fallback. Use any flash video player here. Make sure to keep the vjs-flash-fallback class. -->
		      			<object class="vjs-flash-fallback" width="<!--{$PLAYVIDEOFLASHWIDTH}-->" height="<!--{$PLAYVIDEOFLASHHEIGHT}-->" type="application/x-shockwave-flash"
		        				data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
  		      				<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
  		      				<param name="allowfullscreen" value="true" />
  		      				<param name="flashvars" value='config={"playlist":["<!--{$CONFIGWEBSITENAME}--><!--{$PLAYVIDEO}-->.jpg", {"url": "<!--{$CONFIGWEBSITENAME}--><!--{$PLAYVIDEO}-->.mp4","autoPlay":false,"autoBuffering":true}]}' />
  		      				<!-- Image Fallback. Typically the same as the poster image. -->
  		      				<img src="<!--{$CONFIGWEBSITENAME}--><!--{$PLAYVIDEO}-->.jpg" width="<!--{$PLAYVIDEOFLASHWIDTH}-->" height="<!--{$PLAYVIDEOFLASHHEIGHT}-->" alt="Poster Image"
  		      				  title="No video playback capabilities." />
  			    			</object>
  			 			</video>
  			  			<!-- Download links provided for devices that can't play video in the browser. -->
  			  			<p class="vjs-no-video"><strong>Download Video:</strong>
  		   	 			<a href="<!--{$CONFIGWEBSITENAME}--><!--{$PLAYVIDEO}-->">Pleine résolution</a>
  		   	 			<!-- Support VideoJS by keeping this link. -->
   			   		<a href="http://videojs.com">HTML5 Video Player</a> by VideoJS
   			 		</p>
  					</div>
  					<!-- End VideoJS -->
  				<!--{else}-->
  					<!--{$LANG_VIDEOS_NOPREVIEW}-->
  				<!--{/if}-->	
		</div>
