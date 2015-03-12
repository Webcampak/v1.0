<table align="center">
	<tr>
		<td>		
		<!--{section name=thumbsources start=0 loop=$CONFIGNBSOURCES}-->
		<!--{if $smarty.section.thumbsources.index is even}-->
			<tr>									
		<!--{/if}--> 
		<td align="center">
		<!--{$LANG_THUMBNAILS_SOURCE}--> <!--{$SSOURCENAME[thumbsources]}--><br />	
		<!--{if $SCPTFORMAT[thumbsources] > 0}-->
			<!--{section name=picfile loop=$SCPTFORMAT[thumbsources]}-->
				<!--{if $SLIVEBEGSMALLESTFILESIZE[thumbsources] eq $SLIVEBEGFILESIZE[thumbsources][picfile]}-->
					<img src="<!--{$SLIVEFILENAME[thumbsources][picfile]}-->" width="450" />
				<!--{/if}-->
			<!--{/section}-->
			<p>
			<!--{$LANG_THUMBNAILS_AVAILABLESIZES}--> 
			<!--{section name=picfile loop=$SCPTFORMAT[thumbsources]}-->
			<a href="<!--{$SLIVEFILENAME[thumbsources][picfile]}-->">[<!--{$SLIVEFILESIZE[thumbsources][picfile]}-->]</a>
			<!--{/section}-->
			</p>
		<!--{else}-->
		<p><!--{$LANG_THUMBNAILS_NOPICTURE}--></p>
		<!--{/if}-->
		</td>
		<!--{if $smarty.section.thumbsources.index is odd}-->
		</tr>									
		<!--{/if}-->				
		<!--{/section}-->				
</table>
<center>
<a href="slideshow.php" target="_blank"><font color="white"><img src="<!--{$CONFIGBASE}-->themes/default/img/fullscreen.png" width="50" border="0" /> <br /><!--{$LANG_THUMBNAILS_SLIDESHOW}--></font></a>
</center>



