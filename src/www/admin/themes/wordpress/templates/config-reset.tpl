	<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_RESET_TITLE}--></h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_RESET_ALLSOURCES}--></span></h3>
	<div class="inside">
		<p>
			<!--{$LANG_RESET_ALLSOURCESTXT}--> <br/>
			<form method="post" action="<!--{$CONFIGURL}-->config-reset.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">
			<input type="hidden" name="submitform" value="1">
			<input name="postinitconf" type="checkbox" value="yes">
			<input name="accept" type="submit" value="<!--{$LANG_RESET_ALLSOURCESBUTTON}-->" class="button-primary">						
			</form>
			<br/>
			<!--{if $POSTINITCONF neq ""}-->
			<strong><font color="blue"><!--{$POSTINITCONF}--></font></strong><br/>
			<strong><font color="blue"><!--{$POSTINITCONFS1}--></font></strong><br/>
			<strong><font color="blue"><!--{$POSTINITCONFS2}--></font></strong><br/>
			<strong><font color="blue"><!--{$POSTINITCONFS3}--></font></strong><br/>
			<strong><font color="blue"><!--{$POSTINITCONFS4}--></font></strong><br/>
			<strong><font color="blue"><!--{$POSTINITCONFS5}--></font></strong><br/>
			<strong><font color="blue"><!--{$POSTINITCONFS6}--></font></strong><br/>
			<strong><font color="blue"><!--{$POSTINITCONFS7}--></font></strong><br/>
			<strong><font color="blue"><!--{$POSTINITCONFS8}--></font></strong><br/>
			<!--{/if}-->				
		</p>
		<p>
			<!--{$LANG_RESET_ALLCONTENT}--> <br/>
			<form method="post" action="<!--{$CONFIGURL}-->config-reset.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">	
			<input name="postinitcontent" type="checkbox" value="yes">
			<input name="accept" type="submit" value="<!--{$LANG_RESET_ALLCONTENTBUTTON}-->" class="button-primary">						
			</form>
			<!--{if $POSTINITCONTENT neq ""}-->
				<strong><font color="blue"><!--{$POSTINITCONTENT}--></font></strong><br/>
				<strong><font color="blue"><!--{$POSTINITCONTENTS1}--></font></strong><br/>
				<strong><font color="blue"><!--{$POSTINITCONTENTS2}--></font></strong><br/>
				<strong><font color="blue"><!--{$POSTINITCONTENTS3}--></font></strong><br/>
				<strong><font color="blue"><!--{$POSTINITCONTENTS4}--></font></strong><br/>
				<strong><font color="blue"><!--{$POSTINITCONTENTS5}--></font></strong><br/>
				<strong><font color="blue"><!--{$POSTINITCONTENTS6}--></font></strong><br/>
				<strong><font color="blue"><!--{$POSTINITCONTENTS7}--></font></strong><br/>
				<strong><font color="blue"><!--{$POSTINITCONTENTS8}--></font></strong><br/>
			<!--{/if}-->				
		</p>
		<p>
			<!--{$LANG_RESET_WARNING}-->		
		</p>		
	</div>
</div>

</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->
