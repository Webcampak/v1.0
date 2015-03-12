<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="fr-FR">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<!--{if $CENTRAL eq "index.tpl"}-->
<meta http-equiv="refresh" content="120">
<!--{/if}-->
<title>Administration Webcampak</title>
<script type="text/javascript">
//<![CDATA[
addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
var userSettings = {
		'url': '/',
		'uid': '1',
		'time':'1295906613'
	},
	ajaxurl = '<!--{$CONFIGURL}-->',
	pagenow = 'post',
	typenow = 'post',
	adminpage = 'post-php',
	thousandsSeparator = ' ',
	decimalPoint = ', ',
	isRtl = 0;
//]]>
</script>

<link rel='stylesheet' href='<!--{$CONFIGURL}-->themes/<!--{$CONFIGTHEME}-->/wordpress-load-styles.css' type='text/css' media='all' />
<link rel='stylesheet' id='colors-css'  href='<!--{$CONFIGURL}-->themes/<!--{$CONFIGTHEME}-->/wordpress-colors-fresh.css' type='text/css' media='all' />
<!--[if lte IE 7]>
<link rel='stylesheet' id='ie-css'  href='<!--{$CONFIGURL}-->themes/<!--{$CONFIGTHEME}-->/wordpress-ie.css' type='text/css' media='all' />
<![endif]-->
<script type='text/javascript' src='<!--{$CONFIGURL}-->themes/<!--{$CONFIGTHEME}-->/wordpress-load-scripts.js'></script>
		<style type="text/css" media="screen">
			.titledesc {width:300px;}
			.thanks {width:400px; }
			.thanks p {padding-left:20px; padding-right:20px;}
			.info { background: #FFFFCC; border: 1px dotted #D8D2A9; padding: 10px; color: #333; }
			.info a { color: #333; text-decoration: none; border-bottom: 1px dotted #333 }
			.info a:hover { color: #666; border-bottom: 1px dotted #666; }
		</style>
		</head>

<body class="wp-admin no-js  edit-php">
<script type="text/javascript">
//<![CDATA[
(function(){
var c = document.body.className;
c = c.replace(/no-js/, 'js');
document.body.className = c;
})();
//]]>
</script>

<div id="wpwrap">
<div id="wpcontent">
<div id="wphead">

<a href="<!--{$CONFIGURL}-->../viewer/"><img id="header-logo" src="<!--{$CONFIGURL}-->themes/<!--{$CONFIGTHEME}-->/img/wp-logo.png" alt="" width="237" height="32" /></a>
<h1 id="site-heading" class="long-title">
	<a href="<!--{$CONFIGURL}-->" title="<!--{$LANG_SKELETON_INDEX_ADMINLINK}-->">
		<span id="site-title"><!--{$LANG_SKELETON_INDEX_ADMINTITLE}--></span> 
	</a>

</h1>


<div id="wphead-info">
<div id="user_info">
<p><!--{$LANG_SKELETON_REMAININGDISKSPACE}--> <!--{$WITODISKSPACELEFT}-->&nbsp;</p>
</div>

<div id="favorite-actions">
<div id="favorite-first"><a href="<!--{$CONFIGURL}-->config-appareils.php"><!--{$LANG_SKELETON_CONNECTEDCAMERAS}--></a></div>
<div id="favorite-toggle"><br /></div><div id="favorite-inside">
<div class='favorite-action'><a href='<!--{$CONFIGURL}-->config-appareils.php'><!--{$LANG_SKELETON_CONNECTEDCAMERAS}--></a></div>
<!--{section name=sources start=1 loop=$CONFIGNBSOURCES}-->
	<div class='favorite-action'><a href='<!--{$CONFIGURL}-->config-source.php?s=<!--{$smarty.section.sources.index}-->'><!--{$LANG_SKELETON_ADMINSOURCE}--> <!--{$smarty.section.sources.index}--></a></div>
<!--{/section}-->
</div></div>
</div>
</div>

<div id="wpbody">

<ul id="adminmenu">
	<!--{if $CONFIGSYSTEM eq "1"}-->
		<li class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-settings menu-top-last" id="menu-dashboard">
	<!--{else}-->
		<li class="wp-first-item wp-has-submenu menu-top menu-top-first menu-icon-settings menu-top-last" id="menu-dashboard">
	<!--{/if}-->
	<div class='wp-menu-image'><a href='<!--{$CONFIGURL}-->config-systeme.php'><br /></a></div>
	<div class="wp-menu-toggle"><br /></div>
	<a href='<!--{$CONFIGURL}-->config-systeme.php' class="wp-first-item wp-has-submenu menu-top menu-top-first menu-icon-dashboard menu-top-last" tabindex="1"><!--{$LANG_SKELETON_SYSTEMMENU_TITLE}--></a>
	<div class='wp-submenu'>
		<div class='wp-submenu-head'><!--{$LANG_SKELETON_SYSTEMMENU_TITLE}--></div>
		<ul>
			<li class="wp-first-item <!--{if $CONFIGPAGE eq "systeme"}-->current<!--{/if}-->"><a href='<!--{$CONFIGURL}-->config-systeme.php' class="wp-first-item <!--{if $CONFIGPAGE eq "systeme"}-->current<!--{/if}-->" tabindex="1"><!--{$LANG_SKELETON_SYSTEMMENU_TITLE}--></a></li>
			<li<!--{if $CONFIGPAGE eq "ftpservers"}--> class="current"<!--{/if}-->><a href='<!--{$CONFIGURL}-->config-ftpservers.php' <!--{if $CONFIGPAGE eq "ftpservers"}--> class="current"<!--{/if}--> tabindex="1"><!--{$LANG_SKELETON_SYSTEMMENU_FTPSERVERS}--> <span class='<!--{$CONFIGURL}-->config-ftpservers.php' title=''><span class='update-count'></span></span></a></li>
			<li<!--{if $CONFIGPAGE eq "appareils"}--> class="current"<!--{/if}-->><a href='<!--{$CONFIGURL}-->config-appareils.php' <!--{if $CONFIGPAGE eq "appareils"}--> class="current"<!--{/if}--> tabindex="1"><!--{$LANG_SKELETON_SYSTEMMENU_CONNECTEDCAMERAS}--> <span class='<!--{$CONFIGURL}-->config-appareils.php' title=''><span class='update-count'></span></span></a></li>
			<li<!--{if $CONFIGPAGE eq "reboot"}--> class="current"<!--{/if}-->><a href='<!--{$CONFIGURL}-->config-reboot.php' <!--{if $CONFIGPAGE eq "reboot"}--> class="current"<!--{/if}--> tabindex="1"><!--{$LANG_SKELETON_SYSTEMMENU_REBOOT}--> <span class='<!--{$CONFIGURL}-->config-reboot.php' title=''><span class='update-count'></span></span></a></li>
			<li<!--{if $CONFIGPAGE eq "systemlogs"}--> class="current"<!--{/if}-->><a href='<!--{$CONFIGURL}-->config-systemlogs.php' <!--{if $CONFIGPAGE eq "systemlogs"}--> class="current"<!--{/if}--> tabindex="1"><!--{$LANG_SKELETON_SYSTEMMENU_SYSTEMLOGS}--><span class='<!--{$CONFIGURL}-->config-systemlogs.php' title=''><span class='update-count'></span></span></a></li>
			<li<!--{if $CONFIGPAGE eq "reset"}--> class="current"<!--{/if}-->><a href='<!--{$CONFIGURL}-->config-reset.php' <!--{if $CONFIGPAGE eq "reset"}--> class="current"<!--{/if}--> tabindex="1"><!--{$LANG_SKELETON_SYSTEMMENU_RESET}--><span class='<!--{$CONFIGURL}-->config-reset.php' title=''><span class='update-count'></span></span></a></li>
		</ul>
	</div>
	</li>
	<li class="wp-menu-separator"><a class="separator" href="?unfoldmenu=1"><br /></a></li>	

<!--{section name=sources start=1 loop=$CONFIGNBSOURCES}-->
	<!--{if $smarty.section.sources.index neq "1" }-->
		<li class="wp-has-submenu<!--{if $CONFIGSOURCE eq $smarty.section.sources.index}--> wp-has-current-submenu wp-menu-open<!--{/if}--> menu-top menu-icon-media" id="menu-media">	
	<!--{elseif $smarty.section.sources.index eq "1"}-->
		<!--{if $CONFIGSOURCE eq "1"}-->
			<li class="wp-has-submenu wp-has-current-submenu wp-menu-open open-if-no-js menu-top menu-icon-media menu-top-first" id="menu-posts">
		<!--{else}-->
			<li class="wp-has-submenu open-if-no-js menu-top menu-icon-media menu-top-first" id="menu-posts">
		<!--{/if}-->
	<!--{else}-->
		<li class="menu-top menu-icon-media menu-top-last" id="menu-comments">
	<!--{/if}-->
	<div class='wp-menu-image'><a href='<!--{$CONFIGURL}-->config-source.php?s=<!--{$smarty.section.sources.index}-->'><br /></a></div>
	<div class="wp-menu-toggle"><br /></div>
	<a href='<!--{$CONFIGURL}-->config-source.php?s=<!--{$smarty.section.sources.index}-->' class="wp-has-submenu<!--{if $CONFIGSOURCE eq $smarty.section.sources.index}--> wp-has-current-submenu wp-menu-open<!--{/if}--> menu-top menu-icon-media" tabindex="1"><!--{$LANG_SKELETON_SOURCEMENU_TITLE}--> <!--{$smarty.section.sources.index}--></a>
	<div class='wp-submenu'><div class='wp-submenu-head'><!--{$LANG_SKELETON_SOURCEMENU_TITLE}--> <!--{$smarty.section.sources.index}--></div>
		<ul>
			<li class="wp-first-item <!--{if $CONFIGPAGE eq "source" && $smarty.section.sources.index eq $CONFIGSOURCE}-->current<!--{/if}-->"><a href='<!--{$CONFIGURL}-->config-source.php?s=<!--{$smarty.section.sources.index}-->' class="wp-first-item <!--{if $CONFIGPAGE eq "source" && $smarty.section.sources.index eq $CONFIGSOURCE}-->current<!--{/if}-->" tabindex="1"><!--{$LANG_SKELETON_SOURCEMENU_CAPTURE}--></a></li>
			<!--{if $CONFIGDISPLAYMOTION eq "Y"}--><li<!--{if $CONFIGPAGE eq "motion" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}-->><a href='<!--{$CONFIGURL}-->config-motion.php?s=<!--{$smarty.section.sources.index}-->' <!--{if $CONFIGPAGE eq "motion" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}--> tabindex="1"><!--{$LANG_SKELETON_SOURCEMENU_MOTION}--></a></li><!--{/if}-->
			<li<!--{if $CONFIGPAGE eq "photos" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}-->><a href='<!--{$CONFIGURL}-->config-photos.php?s=<!--{$smarty.section.sources.index}-->' <!--{if $CONFIGPAGE eq "photos" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}--> tabindex="1"><!--{$LANG_SKELETON_SOURCEMENU_PHOTOS}--></a></li>
			<li<!--{if $CONFIGPAGE eq "videos" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}-->><a href='<!--{$CONFIGURL}-->config-videos.php?s=<!--{$smarty.section.sources.index}-->' <!--{if $CONFIGPAGE eq "videos" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}--> tabindex="1"><!--{$LANG_SKELETON_SOURCEMENU_VIDEOS}--></a></li>
			<li<!--{if $CONFIGPAGE eq "videoscustom" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}-->><a href='<!--{$CONFIGURL}-->config-videoscustom.php?s=<!--{$smarty.section.sources.index}-->' <!--{if $CONFIGPAGE eq "videoscustom" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}--> tabindex="1"><!--{$LANG_SKELETON_SOURCEMENU_CUSTOMVIDEOS}--></a></li>
			<li<!--{if $CONFIGPAGE eq "videospost" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}-->><a href='<!--{$CONFIGURL}-->config-videospost.php?s=<!--{$smarty.section.sources.index}-->' <!--{if $CONFIGPAGE eq "videospost" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}--> tabindex="1"><!--{$LANG_SKELETON_SOURCEMENU_VIDEOSPOST}--></a></li>
			<li<!--{if $CONFIGPAGE eq "logs" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}-->><a href='<!--{$CONFIGURL}-->config-logs.php?s=<!--{$smarty.section.sources.index}-->' <!--{if $CONFIGPAGE eq "logs" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}--> tabindex="1"><!--{$LANG_SKELETON_SOURCEMENU_LOGS}--></a></li>
			<li<!--{if $CONFIGPAGE eq "avance" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}-->><a href='<!--{$CONFIGURL}-->config-avance.php?s=<!--{$smarty.section.sources.index}-->' <!--{if $CONFIGPAGE eq "avance" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}--> tabindex="1"><!--{$LANG_SKELETON_SOURCEMENU_ADVANCED}--></a></li>
			<li<!--{if $CONFIGPAGE eq "managepictures" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}-->><a href='<!--{$CONFIGURL}-->config-managepictures.php?s=<!--{$smarty.section.sources.index}-->' <!--{if $CONFIGPAGE eq "managepictures" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}--> tabindex="1"><!--{$LANG_SKELETON_SOURCEMENU_MANAGEPICTURES}--></a></li>
			<li<!--{if $CONFIGPAGE eq "managevideos" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}-->><a href='<!--{$CONFIGURL}-->config-managevideos.php?s=<!--{$smarty.section.sources.index}-->' <!--{if $CONFIGPAGE eq "managevideos" && $smarty.section.sources.index eq $CONFIGSOURCE}--> class="current"<!--{/if}--> tabindex="1"><!--{$LANG_SKELETON_SOURCEMENU_MANAGEVIDEOS}--></a></li>									
			<li><a href='<!--{$CONFIGURL}-->../viewer/' tabindex="1"><!--{$LANG_SKELETON_SOURCEMENU_VIEWARCHIVES}--></a></li>
		</ul>
	</div>
	</li>
<!--{/section}-->
	<li class="menu-top menu-icon-media menu-top-last" id="menu-comments">
	<div class='wp-menu-image'><a href='<!--{$CONFIGURL}-->../viewer/'><br /></a></div>
	<div class="wp-menu-toggle"><br /></div>
	<a href='<!--{$CONFIGURL}-->../viewer/' class="wp-has-submenu<!--{if $CONFIGSOURCE eq $smarty.section.sources.index}--> wp-has-current-submenu wp-menu-open<!--{/if}--> menu-top menu-icon-media" tabindex="1"><!--{$LANG_SKELETON_EXITMENU_TITLE}--></a>
	<div class='wp-submenu'><div class='wp-submenu-head'><!--{$LANG_SKELETON_EXITMENU_TITLE}--></div>
		<ul>
			<li class="wp-first-item current"><a href='<!--{$CONFIGURL}-->../viewer/' class="wp-first-item <!--{if $CONFIGPAGE eq "source"}-->current<!--{/if}-->" tabindex="1"><!--{$LANG_SKELETON_EXITMENU_VIEWER}--></a></li>
		</ul>
	</div>
	</li>


	<li class="wp-menu-separator-last"><a class="separator" href="?unfoldmenu=1"><br /></a></li></ul>
<div id="wpbody-content">
<div id="screen-meta">
<div id="screen-options-wrap" class="hidden">
	<!--{if $LOCALE_APROPOS neq ""}-->
		<!--{include file="$LOCALE_APROPOS"}-->
	<!--{/if}-->
</div>

	<div id="contextual-help-wrap" class="hidden">
	<!--{if $LOCALE_HELP neq ""}-->
		<!--{include file="$LOCALE_HELP"}-->
	<!--{/if}-->	
	</div>
<div id="screen-meta-links">
<div id="contextual-help-link-wrap" class="hide-if-no-js screen-meta-toggle">
	<!--{section name=availablelanguages loop=$CONFIGLANGUAGESCPT}-->
		<a href="?lang=<!--{$CONFIGLANGUAGES[availablelanguages]}-->"><img src="<!--{$CONFIGBASE}-->themes/wordpress/img/<!--{$CONFIGLANGUAGES[availablelanguages]}-->.png" alt="<!--{$CONFIGLANGUAGES[availablelanguages]}-->" border="0" /></a> 
	<!--{/section}-->
</div>
<div id="contextual-help-link-wrap" class="hide-if-no-js screen-meta-toggle">
<a href="#contextual-help" id="contextual-help-link" class="show-settings"><!--{$LANG_SKELETON_HELP}--></a>
</div>
<div id="screen-options-link-wrap" class="hide-if-no-js screen-meta-toggle">
<a href="#screen-options" id="show-settings-link" class="show-settings"><!--{$LANG_SKELETON_ABOUT}--></a>
</div>
</div>
</div>

<div class="wrap">

<!--{if $CENTRAL neq ""}-->
	<!--{include file="$CENTRAL"}-->
<!--{/if}-->

</div><!-- wpwrap -->

<div id="footer">
<p id="footer-left" class="alignleft"><span id="footer-thankyou"><!--{$LANG_SKELETON_FOOTER}--></span></p>

<p id="footer-upgrade" class="alignright"><!--{$LANG_SKELETON_FOOTER_VERSION}--> <!--{$WITOVERSION}--></p>
<div class="clear"></div>
</div>
<script type='text/javascript' src='<!--{$CONFIGURL}-->themes/<!--{$CONFIGTHEME}-->/wordpress-load-scriptsb.js'></script>

<script type="text/javascript">if(typeof wpOnload=='function')wpOnload();</script>
</body>
</html>
