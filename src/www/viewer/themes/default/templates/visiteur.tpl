	<!--{if $DISPLAY eq "photos" OR $DISPLAY eq "videos" }-->	
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
						<a href="include/timthumb/timthumb.php?src=<!--{$DISPPICTURE}-->&w=<!--{$DISPPICTUREZOOMWIDTH}-->&q=100" class="jqzoom" style="" title="Zoom <!--{$CURRENTZOOM}-->%">
					<!--{else}-->
						<a href="<!--{$DISPPICTURE}-->" class="jqzoom" style="" title="Zoom <!--{$CURRENTZOOM}-->%">
					<!--{/if}-->
					<img src="include/timthumb/timthumb.php?src=<!--{$DISPPICTURE}-->&w=348&q=100" title="Zoom <!--{$CURRENTZOOM}-->%" style="border: 1px solid #666;">
					</a>
				</div>
				<div id="zoom">
					<div id="zoomleftcolumn"><img src="<!--{$CONFIGBASE}-->themes/default/img/zoomleft.png" /></div>
					<div id="zoomrightcolumn"><img src="<!--{$CONFIGBASE}-->themes/default/img/zoomright.png" /></div>
					<div id="zoomcenter">					
						<div class="sc_menu">
							<ul class="sc_menu">
								<li><a href="?zoom=25"><img src="<!--{$CONFIGBASE}-->themes/default/img/scrollbar-<!--{if $CURRENTZOOM neq 25}-->not<!--{/if}-->selected.png" alt="25%"/><br />25%<span>25%</span>
								<li><a href="?zoom=50"><img src="<!--{$CONFIGBASE}-->themes/default/img/scrollbar-<!--{if $CURRENTZOOM neq 50}-->not<!--{/if}-->selected.png" alt="50%"/><br />50%<span>50%</span>
								<li><a href="?zoom=100"><img src="<!--{$CONFIGBASE}-->themes/default/img/scrollbar-<!--{if $CURRENTZOOM neq 100}-->not<!--{/if}-->selected.png" alt="100%"/><br />100%<span>100%</span>              
								<li><a href="?zoom=150"><img src="<!--{$CONFIGBASE}-->themes/default/img/scrollbar-<!--{if $CURRENTZOOM neq 150}-->not<!--{/if}-->selected-numeric.png" alt="150%"/><br />150%<span>150%</span> 
								<li><a href="?zoom=200"><img src="<!--{$CONFIGBASE}-->themes/default/img/scrollbar-<!--{if $CURRENTZOOM neq 200}-->not<!--{/if}-->selected-numeric.png" alt="200%"/><br />200%<span>200%</span> 
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
			<!--{elseif $DISPLAY eq "videos"}-->
			<br /><br />
			<b>Video(s) du jour:</b><br />
			<!--{section name=dailyvideos loop=$CPTVIDS}-->
				<a href="?playvideo=<!--{$DAILYVIDS[dailyvideos]}-->"><!--{$DAILYVIDS[dailyvideos]}--> (<!--{$DAILYVIDSFILESIZE[dailyvideos]}-->)</a><br />
			<!--{/section}-->
			<br /><br />	
			<b>Video(s) crées ce jour:</b><br />
			<!--{section name=dailycreatedvideos loop=$CPTCREATEDVIDS}-->
				<a href="?playvideo=<!--{$DAILYCREATEDVIDS[dailycreatedvideos]}-->"><!--{$DAILYCREATEDVIDS[dailycreatedvideos]}--> (<!--{$DAILYCREATEDVIDSFILESIZE[dailycreatedvideos]}-->)</a><br />
			<!--{/section}-->	
			<!--{/if}-->
			<br />
			
		</div>
		<div id="rightcolumn">
			<br />		
			<!--{if $DISPLAY neq "videos"}-->			
				<a href="include/timthumb/timthumb.php?src=<!--{$DISPPICTURE}-->&w=<!--{$DISPPICTUREZOOMWIDTH}-->&q=100" targer="_blank"><img src="<!--{$CONFIGBASE}-->themes/default/img/f-spot.png" /><br />Tél. image</a> <br /><br />
				<a href="<!--{$DISPPICTURE}-->" targer="_blank"><img src="<!--{$CONFIGBASE}-->themes/default/img/ksnapshot.png" /><br />Tél. original</a> <br />
			<!--{else}-->
				<a href="<!--{$PLAYVIDEO}-->" targer="_blank"><img src="<!--{$CONFIGBASE}-->themes/default/img/gnome-mplayer.png" /><br />Tél. vidéo</a> <br />			
			<!--{/if}-->
			<br />
		</div>
		<div id="center">
			<div id="centerprevious">
				<!--{if $CALENDARPREVIOUSTIMESTAMP neq ""}-->
					<a href="?timestamp=<!--{$CALENDARPREVIOUSTIMESTAMP}-->"><img src="<!--{$CONFIGBASE}-->themes/default/img/go-previous.png" border="0" /> Précédent</a>
				<!--{/if}-->
			</div>
			<div id="centernext">
				<!--{if $CALENDARFOLLOWINGTIMESTAMP neq ""}-->			
					<a href="?timestamp=<!--{$CALENDARFOLLOWINGTIMESTAMP}-->">Suivant <img src="<!--{$CONFIGBASE}-->themes/default/img/go-next.png" border="0" /></a>
				<!--{/if}-->				
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
			<!--{if $DISPLAY eq "photos"}-->	
				<!--{if $DISPPICTURE neq "0"}-->	
					<!--{if $CURRENTZOOM neq 100 AND $CURRENTZOOM neq ""}-->
						<a href="include/timthumb/timthumb.php?src=<!--{$DISPPICTURE}-->&w=<!--{$DISPPICTUREZOOMWIDTH}-->&q=100" target="_blank"><img src="include/timthumb/timthumb.php?src=<!--{$DISPPICTURE}-->&w=<!--{$DISPPICTUREZOOMWIDTH}-->&q=100" width="624" /></a>
					<!--{else}-->
						<a href="<!--{$DISPPICTURE}-->" target="_blank"><img src="<!--{$DISPPICTURE}-->" width="624"/></a>
					<!--{/if}-->
				<!--{else}-->
					Image inexistante pour la date et l'heure sélectionnée. <br />
				<!--{/if}-->
			<!--{elseif $DISPLAY eq "videos"}-->
				<!--{if $PLAYVIDEOFLASHAVAILABLE eq "yes"}-->	
					<!-- Begin VideoJS -->
			  		<div class="video-js-box">
		    			<!-- Using the Video for Everybody Embed Code http://camendesign.com/code/video_for_everybody -->
		    			<video class="video-js" width="<!--{$PLAYVIDEOFLASHWIDTH}-->" height="<!--{$PLAYVIDEOFLASHHEIGHT}-->" controls preload poster="<!--{$PLAYVIDEO}-->.jpg">
		    	  			<source src="<!--{$CONFIGWEBSITENAME}--><!--{$PLAYVIDEO}-->.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
		      			<!-- Flash Fallback. Use any flash video player here. Make sure to keep the vjs-flash-fallback class. -->
		      			<object class="vjs-flash-fallback" width="<!--{$PLAYVIDEOFLASHWIDTH}-->" height="<!--{$PLAYVIDEOFLASHHEIGHT}-->" type="application/x-shockwave-flash"
		        				data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
  		      				<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
  		      				<param name="allowfullscreen" value="true" />
  		      				<param name="flashvars" value='config={"playlist":["<!--{$CONFIGWEBSITENAME}--><!--{$PLAYVIDEO}-->.jpg", {"url": "<!--{$CONFIGWEBSITENAME}--><!--{$PLAYVIDEO}-->.mp4","autoPlay":false,"autoBuffering":true}]}' />
  		      				<!-- Image Fallback. Typically the same as the poster image. -->
  		      				<img src="<!--{$PLAYVIDEO}-->.jpg" width="<!--{$PLAYVIDEOFLASHWIDTH}-->" height="<!--{$PLAYVIDEOFLASHHEIGHT}-->" alt="Poster Image"
  		      				  title="No video playback capabilities." />
  			    			</object>
  			 			</video>
  			  			<!-- Download links provided for devices that can't play video in the browser. -->
  			  			<p class="vjs-no-video"><strong>Download Video:</strong>
  		   	 			<a href="<!--{$PLAYVIDEO}-->">Pleine résolution</a>
  		   	 			<!-- Support VideoJS by keeping this link. -->
   			   		<a href="http://videojs.com">HTML5 Video Player</a> by VideoJS
   			 		</p>
  					</div>
  					<!-- End VideoJS -->
  				<!--{else}-->
  					Prévisualisation vidéo indisponible. <br />
  					Cochez la case "Web" dans l'interface d'administration.
  				<!--{/if}-->	
			<!--{/if}-->
		</div>
	<!--{elseif $DISPLAY eq "autorefresh"}-->
		<!--{if $HOTLINKPICTURE neq ""}-->
			<img src="<!--{$HOTLINKPICTURE}-->" />
		<!--{elseif $HOTLINKPICTUREERROR neq ""}-->
			<img src="<!--{$HOTLINKPICTUREERROR}-->" />	
		<!--{else}-->		
			Image non disponible, veuillez sélectionner un autre résolution ou recharger la page
		<!--{/if}-->
	<!--{elseif $DISPLAY eq "thumbnails"}-->
		<table align="center">
			<tr>
				<td>		
			<!--{section name=thumbsources start=1 loop=$CONFIGNBSOURCES}-->
				<!--{if $smarty.section.thumbsources.index is odd}-->
					<tr>									
				<!--{/if}-->
				<td>
				Source <!--{$smarty.section.thumbsources.index}-->: <!--{$WEBCAMPAKCONFIGIMGTEXT[thumbsources]}--><br />	
				<!--{if $SCPTFORMAT[thumbsources] > 0}-->
					<!--{section name=picfile loop=$SCPTFORMAT[thumbsources]}-->
						<!--{if $SLIVEBEGSMALLESTFILESIZE[thumbsources] eq $SLIVEBEGFILESIZE[thumbsources][picfile]}-->
							<img src="<!--{$CONFIGBASE}-->../sources/source<!--{$smarty.section.thumbsources.index}-->/live/<!--{$SLIVEFILENAME[thumbsources][picfile]}-->" width="450" />
						<!--{/if}-->
					<!--{/section}-->
					<p>
					Résolutions disponibles: 
					<!--{section name=picfile loop=$SCPTFORMAT[thumbsources]}-->
					<a href="<!--{$CONFIGBASE}-->../sources/source<!--{$smarty.section.thumbsources.index}-->/live/<!--{$SLIVEFILENAME[thumbsources][picfile]}-->">[<!--{$SLIVEFILESIZE[thumbsources][picfile]}-->]</a>
					<!--{/section}-->
					</p>
				<!--{else}-->
				<p>Aucun cliché actuellement disponible</p>
				<!--{/if}-->
				</td>
				<!--{if $smarty.section.thumbsources.index is even}-->
				</tr>									
				<!--{/if}-->				
		<!--{/section}-->				
		</table>
	<!--{/if}-->

