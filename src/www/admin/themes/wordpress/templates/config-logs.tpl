	<div id="icon-options-general" class="icon32"><br /></div>
<h2><!--{$LANG_LOGS_SOURCE}--> <!--{$CONFIGWEBCAMSOURCE}--><!--{$LANG_LOGS_TITLE}--></h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_LOGS_DEBUG}--></span></h3>
	<div class="inside">
		<form method="post" action="<!--{$CONFIGURL}-->config-logs.php?s=<!--{$CONFIGWEBCAMSOURCE}-->&submit=1">
		<input type="hidden" name="submitform" value="1">
		<table class="form-table">
			<tr valign="top"><th scope="row"><!--{$LANG_LOGS_DEBUGACTIVATE}--> </th><td><input name="cfgdebugprolong" type="checkbox" value="yes" <!--{$CFGDEBUGPROLONG}-->></td></tr> 
			<tr valign="top"><th scope="row"><input name="accept" type="submit" value="<!--{$LANG_LOGS_DEBUGBUTTON}-->" class="button-primary"></th></tr>
		</table>	
		</form>	
		<p>
			<strong><!--{$LANG_LOGS_TIP}--> </strong><br />
			<!--{$LANG_LOGS_DEBUGTIP}--> 
		</p>			
	</div>	
</div>
<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_LOGS_PICTURES}--></h3>
	<div class="inside">
		<p>
			<pre><!--{$DISP_LOGSPHOTOS}--></pre>
		</p>						
	</div>
</div>
<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_LOGS_DAILYVID}--></h3>
	<div class="inside">
		<p>
			<pre><!--{$DISP_LOGSVIDEOSDAILY}--></pre>
		</p>						
	</div>
</div>

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_LOGS_CUSTOMVID}--></h3>
	<div class="inside">
		<p>
			<pre><!--{$DISP_LOGSVIDEOSCUSTOM}--></pre>
		</p>						
	</div>
</div>

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span><!--{$LANG_LOGS_POSTVID}--></h3>
	<div class="inside">
		<p>
			<pre><!--{$DISP_LOGSVIDEOSPOST}--></pre>
		</p>						
	</div>
</div>

</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

