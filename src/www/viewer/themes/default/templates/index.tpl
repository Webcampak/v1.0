	<div id="icon-index" class="icon32"><br /></div>
<h2>Derniers clichés disponibles</h2> 

<div id="dashboard-widgets-wrap">

<div id="dashboard-widgets" class="metabox-holder">
	<div class='postbox-container' style='width:49%;'>
<div id="normal-sortables" class="meta-box-sortables">
<!--{if $CONFIGNBSOURCES gt 1}-->
	<div id="dashboard_right_now" class="postbox " >
		<h3 class='hndle'><span>Source 1</span></h3>
		<div class="inside">
		<center>
			<br class="clear" />
			<!--{if $S1LIVEBEGSMALLESTFILESIZE neq "" && $S1CPTFORMAT > 0}-->
				<!--{section name=picfile loop=$S1CPTFORMAT}-->
					<!--{if $S1LIVEBEGSMALLESTFILESIZE eq $S1LIVEBEGFILESIZE[picfile]}-->
						<img src="<!--{$CONFIGBASE}-->../sources/source<!--{$S1SOURCE}-->/live/<!--{$S1LIVEFILENAME[picfile]}-->" width="320" />
					<!--{/if}-->
				<!--{/section}-->
				<p>
				Résolutions disponibles: 
				<!--{section name=picfile loop=$S1CPTFORMAT}-->
				<a href="<!--{$CONFIGBASE}-->../sources/source<!--{$S1SOURCE}-->/live/<!--{$S1LIVEFILENAME[picfile]}-->">[<!--{$S1LIVEFILESIZE[picfile]}-->]</a>
				<!--{/section}-->
				</p>
			<!--{else}-->
			<p>Aucun cliché actuellement disponible</p>
			<!--{/if}-->
		</center>
		<br class="clear" />
		</div>
	</div>
<!--{/if}-->
<!--{if $CONFIGNBSOURCES gt 3}-->
<div id="dashboard_right_now" class="postbox " >
	<h3 class='hndle'><span>Source 3</span></h3>
	<div class="inside">
		<center>
			<br class="clear" />
			<!--{if $S3LIVEBEGSMALLESTFILESIZE neq "" && $S3CPTFORMAT > 0}-->
				<!--{section name=picfile loop=$S3CPTFORMAT}-->
					<!--{if $S3LIVEBEGSMALLESTFILESIZE eq $S3LIVEBEGFILESIZE[picfile]}-->
						<img src="<!--{$CONFIGBASE}-->../sources/source<!--{$S3SOURCE}-->/live/<!--{$S3LIVEFILENAME[picfile]}-->" width="320" />
					<!--{/if}-->
				<!--{/section}-->
				<p>
				Résolutions disponibles: 
				<!--{section name=picfile loop=$S3CPTFORMAT}-->
				<a href="<!--{$CONFIGBASE}-->../sources/source<!--{$S3SOURCE}-->/live/<!--{$S3LIVEFILENAME[picfile]}-->">[<!--{$S3LIVEFILESIZE[picfile]}-->]</a>
				<!--{/section}-->
				</p>
			<!--{else}-->
			<p>Aucun cliché actuellement disponible</p>
			<!--{/if}-->
		</center>
		<br class="clear" />
	</div>
</div>
<!--{/if}-->
<!--{if $CONFIGNBSOURCES gt 5}-->
<div id="dashboard_plugins" class="postbox " >
<h3 class='hndle'><span>Source 5</span></h3>
<div class="inside">
		<center>
			<br class="clear" />
			<!--{if $S5LIVEBEGSMALLESTFILESIZE neq "" && $S5CPTFORMAT > 0}-->
				<!--{section name=picfile loop=$S5CPTFORMAT}-->
					<!--{if $S5LIVEBEGSMALLESTFILESIZE eq $S5LIVEBEGFILESIZE[picfile]}-->
						<img src="<!--{$CONFIGBASE}-->../sources/source<!--{$S5SOURCE}-->/live/<!--{$S5LIVEFILENAME[picfile]}-->" width="320" />
					<!--{/if}-->
				<!--{/section}-->
				<p>
				Résolutions disponibles: 
				<!--{section name=picfile loop=$S5CPTFORMAT}-->
				<a href="<!--{$CONFIGBASE}-->../sources/source<!--{$S5SOURCE}-->/live/<!--{$S5LIVEFILENAME[picfile]}-->">[<!--{$S5LIVEFILESIZE[picfile]}-->]</a>
				<!--{/section}-->
				</p>
			<!--{else}-->
			<p>Aucun cliché actuellement disponible</p>
			<!--{/if}-->
		</center>
		<br class="clear" />
</div>
</div>
<!--{/if}-->
<!--{if $CONFIGNBSOURCES gt 7}-->
<div id="blogplay_db_widget" class="postbox " >
<h3 class='hndle'><span>Source 7</span></h3>
<div class="inside">
		<center>
			<br class="clear" />
			<!--{if $S7LIVEBEGSMALLESTFILESIZE neq "" && $S7CPTFORMAT > 0}-->
				<!--{section name=picfile loop=$S7CPTFORMAT}-->
					<!--{if $S7LIVEBEGSMALLESTFILESIZE eq $S7LIVEBEGFILESIZE[picfile]}-->
						<img src="<!--{$CONFIGBASE}-->../sources/source<!--{$S7SOURCE}-->/live/<!--{$S7LIVEFILENAME[picfile]}-->" width="320" />
					<!--{/if}-->
				<!--{/section}-->
				<p>
				Résolutions disponibles: 
				<!--{section name=picfile loop=$S7CPTFORMAT}-->
				<a href="<!--{$CONFIGBASE}-->../sources/source<!--{$S7SOURCE}-->/live/<!--{$S7LIVEFILENAME[picfile]}-->">[<!--{$S7LIVEFILESIZE[picfile]}-->]</a>
				<!--{/section}-->
				</p>
			<!--{else}-->
			<p>Aucun cliché actuellement disponible</p>
			<!--{/if}-->
		</center>
		<br class="clear" />
</div>
</div>
<!--{/if}-->
</div>
</div>
<div class='postbox-container' style='width:49%;'>
<div id="side-sortables" class="meta-box-sortables">

<!--{if $CONFIGNBSOURCES gt 2}-->
<div id="dashboard_quick_press" class="postbox " >
<h3 class='hndle'><span>Source 2</span></h3>
<div class="inside">
		<center>
			<br class="clear" />
			<!--{if $S2LIVEBEGSMALLESTFILESIZE neq "" && $S2CPTFORMAT > 0}-->
				<!--{section name=picfile loop=$S2CPTFORMAT}-->
					<!--{if $S2LIVEBEGSMALLESTFILESIZE eq $S2LIVEBEGFILESIZE[picfile]}-->
						<img src="<!--{$CONFIGBASE}-->../sources/source<!--{$S2SOURCE}-->/live/<!--{$S2LIVEFILENAME[picfile]}-->" width="320" />
					<!--{/if}-->
				<!--{/section}-->
				<p>
				Résolutions disponibles: 
				<!--{section name=picfile loop=$S2CPTFORMAT}-->
				<a href="<!--{$CONFIGBASE}-->../sources/source<!--{$S2SOURCE}-->/live/<!--{$S2LIVEFILENAME[picfile]}-->">[<!--{$S2LIVEFILESIZE[picfile]}-->]</a>
				<!--{/section}-->
				</p>
			<!--{else}-->
			<p>Aucun cliché actuellement disponible</p>
			<!--{/if}-->
		</center>
</div>
</div>
<!--{/if}-->
<!--{if $CONFIGNBSOURCES gt 4}-->
<div id="dashboard_recent_drafts" class="postbox " >
<h3 class='hndle'><span>Source 4</span></h3>
<div class="inside">
		<center>
			<br class="clear" />
			<!--{if $S4LIVEBEGSMALLESTFILESIZE neq "" && $S4CPTFORMAT > 0}-->
				<!--{section name=picfile loop=$S4CPTFORMAT}-->
					<!--{if $S4LIVEBEGSMALLESTFILESIZE eq $S4LIVEBEGFILESIZE[picfile]}-->
						<img src="<!--{$CONFIGBASE}-->../sources/source<!--{$S4SOURCE}-->/live/<!--{$S4LIVEFILENAME[picfile]}-->" width="320" />
					<!--{/if}-->
				<!--{/section}-->
				<p>
				Résolutions disponibles: 
				<!--{section name=picfile loop=$S4CPTFORMAT}-->
				<a href="<!--{$CONFIGBASE}-->../sources/source<!--{$S4SOURCE}-->/live/<!--{$S4LIVEFILENAME[picfile]}-->">[<!--{$S4LIVEFILESIZE[picfile]}-->]</a>
				<!--{/section}-->
				</p>
			<!--{else}-->
			<p>Aucun cliché actuellement disponible</p>
			<!--{/if}-->
		</center>
</div>
</div>
<!--{/if}-->
<!--{if $CONFIGNBSOURCES gt 6}-->
<div id="dashboard_primary" class="postbox " >
<h3 class='hndle'><span>Source 6 </span></h3>
<div class="inside">
		<center>
			<br class="clear" />
			<!--{if $S6LIVEBEGSMALLESTFILESIZE neq "" && $S6CPTFORMAT > 0}-->
				<!--{section name=picfile loop=$S6CPTFORMAT}-->
					<!--{if $S6LIVEBEGSMALLESTFILESIZE eq $S6LIVEBEGFILESIZE[picfile]}-->
						<img src="<!--{$CONFIGBASE}-->../sources/source<!--{$S6SOURCE}-->/live/<!--{$S6LIVEFILENAME[picfile]}-->" width="320" />
					<!--{/if}-->
				<!--{/section}-->
				<p>
				Résolutions disponibles: 
				<!--{section name=picfile loop=$S6CPTFORMAT}-->
				<a href="<!--{$CONFIGBASE}-->../sources/source<!--{$S6SOURCE}-->/live/<!--{$S6LIVEFILENAME[picfile]}-->">[<!--{$S6LIVEFILESIZE[picfile]}-->]</a>
				<!--{/section}-->
				</p>
			<!--{else}-->
			<p>Aucun cliché actuellement disponible</p>
			<!--{/if}-->
		</center>
</div>
</div>
<!--{/if}-->
<!--{if $CONFIGNBSOURCES gt 8}-->
<div id="dashboard_secondary" class="postbox " >
<h3 class='hndle'><span>Source 8</span></h3>
<div class="inside">
		<center>
			<br class="clear" />
			<!--{if $S8LIVEBEGSMALLESTFILESIZE neq "" && $S8CPTFORMAT > 0}-->
				<!--{section name=picfile loop=$S8CPTFORMAT}-->
					<!--{if $S8LIVEBEGSMALLESTFILESIZE eq $S8LIVEBEGFILESIZE[picfile]}-->
						<img src="<!--{$CONFIGBASE}-->../sources/source<!--{$S8SOURCE}-->/live/<!--{$S8LIVEFILENAME[picfile]}-->" width="320" />
					<!--{/if}-->
				<!--{/section}-->
				<p>
				Résolutions disponibles: 
				<!--{section name=picfile loop=$S8CPTFORMAT}-->
				<a href="<!--{$CONFIGBASE}-->../sources/source<!--{$S8SOURCE}-->/live/<!--{$S8LIVEFILENAME[picfile]}-->">[<!--{$S8LIVEFILESIZE[picfile]}-->]</a>
				<!--{/section}-->
				</p>
			<!--{else}-->
			<p>Aucun cliché actuellement disponible</p>
			<!--{/if}-->
		</center>
	</div>
</div>
<!--{/if}-->
</div>	</div><div class='postbox-container' style='display:none;width:49%;'>
<div id="column3-sortables" class="meta-box-sortables"></div>	</div><div class='postbox-container' style='display:none;width:49%;'>
<div id="column4-sortables" class="meta-box-sortables"></div></div></div>

<form style="display:none" method="get" action="">
	<p>
<input type="hidden" id="closedpostboxesnonce" name="closedpostboxesnonce" value="7bc4c99b48" /><input type="hidden" id="meta-box-order-nonce" name="meta-box-order-nonce" value="1333f54a9c" />	</p>
</form>
 

<div class="clear"></div>
</div><!-- dashboard-widgets-wrap -->

</div><!-- wrap -->


<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

