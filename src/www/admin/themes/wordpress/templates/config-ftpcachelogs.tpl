	<div id="icon-options-general" class="icon32"><br /></div>
<h2>Logs mise en cache FTP</h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">

<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span>Débug prolongé</span></h3> 
	<div class="inside">
		<form method="post" action="<!--{$CONFIGURL}-->config-ftpcachelogs.php?submit=1">
		<input type="hidden" name="submitform" value="1">		
		<table class="form-table">				
			<tr valign="top"><th scope="row">Activer debug prolongé: </th><td><input name="cfgftpcachedebugprolong" type="checkbox" value="yes" <!--{$CFGFTPCACHEDEBUGPROLONG}-->></td></tr> 
			<tr valign="top"><th scope="row"><input name="accept" type="submit" value="Enregistrer" class="button-primary"></th></tr>
		</table>
		</form>	
		<p>
			<strong>Astuce:</strong><br />
			Par défaut les logs précédents sont effacés à chaque nouvelle execution du cache, cette option permet de conserver les anciens logs indéfiniment. 
		</p>			
	</div>	
</div>
<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span>Logs Cache FTP (Photos)</h3>
	<div class="inside">
		<p>
			<pre><!--{$DISP_FTPCACHEARCHIVES}--></pre>
		</p>						
	</div>
</div>
<div id="commentstatusdiv" class="postbox ">
	<h3 class="hndle"><span>Logs Cache FTP (Hotlink)</h3>
	<div class="inside">
		<p>
			<pre><!--{$DISP_FTPCACHEHOTLINK}--></pre>
		</p>						
	</div>
</div>

</div>
</div>

</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->
