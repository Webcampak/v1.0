<!--{if $HOTLINKPICTURE neq ""}-->
	<img src="<!--{$HOTLINKPICTURE}-->" />
	<br />
	<a href="fullscreen.php?s=<!--{$CONFIGSOURCE}-->" target="_blank"><font color="white"><img src="<!--{$CONFIGBASE}-->themes/default/img/fullscreen.png" width="50" border="0" /> <br /><!--{$LANG_AUTOREFRESH_FULLSCREEN}--></font></a>
	<br />
<!--{elseif $HOTLINKPICTUREERROR neq ""}-->
	<img src="<!--{$HOTLINKPICTUREERROR}-->" />
	<br />
	<a href="fullscreen.php?s=<!--{$CONFIGSOURCE}-->" target="_blank"><font color="white"><img src="<!--{$CONFIGBASE}-->themes/default/img/fullscreen.png" width="50" border="0" /> <br /><!--{$LANG_AUTOREFRESH_FULLSCREEN}--></font></a>
	<br />
<!--{else}-->		
	<!--{$LANG_AUTOREFRESH_NOPICTURE}-->
<!--{/if}--> 
