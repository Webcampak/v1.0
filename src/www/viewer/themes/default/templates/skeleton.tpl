<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">  
<!--[if IE]><script src="<!--{$CONFIGBASE}-->themes/default/js/html5-ie.js"></script><![endif]--> 
<script type='text/javascript' src='<!--{$CONFIGBASE}-->themes/default/js/jqzoom_ev-2.3/js/jquery-1.6.js'></script>
<script type='text/javascript' src='<!--{$CONFIGBASE}-->themes/default/js/jqzoom_ev-2.3/js/jquery.jqzoom-core.js'></script>
<script type="text/javascript" src="<!--{$CONFIGBASE}-->themes/default/js/video-js-1.1.4/video.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<!--{$CONFIGBASE}-->themes/default/js/jqzoom_ev-2.3/css/jquery.jqzoom.css" />
<link rel="stylesheet" type="text/css" href="<!--{$CONFIGBASE}-->themes/default/js/video-js-1.1.4/video-js.css" />
<link rel="stylesheet" type="text/css" media="all" href="<!--{$CONFIGBASE}-->themes/default/styles.css" />
<!--{if $DISPLAY eq "autorefresh"}-->	
<meta http-equiv="refresh" content="60; URL=/viewer/autorefresh.php">
<!--{/if}-->	
<!--{if $DISPLAY eq "thumbnails"}-->	
<meta http-equiv="refresh" content="60; URL=/viewer/thumbnails.php">
<!--{/if}-->

<script type="text/javascript">

$(function() {
	var options = {  
            zoomType: 'standard',  
            lens:true,  
            preloadImages: true,  
            alwaysOn:false,  
            zoomWidth: 626,  
            zoomHeight: 420,  
            xOffset:10,  
            yOffset:2,  
            position:'right'  
            //...MORE OPTIONS  
    };
	$(".jqzoom").jqzoom(options);
});

VideoJS.setupAllWhenReady();

function linkRef(yurl ){
	var linkref = yurl;
	if(confirm("Etes-vous sûrs ?")){
		window.location.href=linkref;
	}
}

</script>
</head>
<body>
<div id="content">
	<!--{section name=availablelanguages loop=$CONFIGLANGUAGESCPT}-->
		<a href="?lang=<!--{$CONFIGLANGUAGES[availablelanguages]}-->"><img src="<!--{$CONFIGBASE}-->themes/default/img/<!--{$CONFIGLANGUAGES[availablelanguages]}-->.png" alt="<!--{$CONFIGLANGUAGES[availablelanguages]}-->" border="0" /></a> 
	<!--{/section}-->
	<div id="overallbanner">
		<div id="banner">
			<div id="bannerleftcolumn">
				<form>
					<select name="s">		
						<!--{section name=sources loop=$ALLOWEDCAMERASCPT}-->
							<!--{if $ALLOWEDCAMERASID[sources] neq ""}-->
								<option value="<!--{$ALLOWEDCAMERASID[sources]}-->" <!--{if $CONFIGSOURCE eq $ALLOWEDCAMERASID[sources]}-->selected<!--{/if}-->><!--{$ALLOWEDCALERASNAME[sources]}--></option>
							<!--{/if}-->
						<!--{/section}-->
					</select>
					<input type="submit" value="OK" />
				</form>
			</div>
			<div id="bannerrightcolumn">
					<form method="post" action="autorefresh.php">
						<select name="autorefresh">
						<option value="#"><!--{$LANG_SKELETON_BANNERRIGHT_AUTOREFRESH}--></option>							
						<!--{section name=picfile loop=$SELECTSOURCECPTFORMAT}-->
						<option value="<!--{$SELECTSHORTSOURCELIVEFILENAME[picfile]}-->"><!--{$SELECTSOURCELIVEFILESIZE[picfile]}--></option>
						<!--{/section}-->
						</select>
						<input type="submit" value="OK" />
					</form>
			</div>
			<div id="bannercenter"><h1>&nbsp;<!--{$CURRENTCAMERANAME}--> (<!--{$CONFIGUSERNAME}-->)&nbsp;</h1></div>
			<br />		
		</div>
		<div id="menu">	
			<ul id="ulmenu">
				<!--{if $DISPLAYPHOTOS eq "1"}--><li><a href="photos.php" targer="_blank"><!--{$LANG_SKELETON_MENU_PHOTOS}--></a></li><!--{/if}-->
				<!--{if $DISPLAYVIDEOS eq "1"}--><li><a href="videos.php" targer="_blank"><!--{$LANG_SKELETON_MENU_VIDEOS}--></a></li><!--{/if}-->
				<!--{if $DISPLAYTHUMBNAILS eq "1"}--><li><a href="thumbnails.php" targer="_blank"><!--{$LANG_SKELETON_MENU_THUMBNAILS}--></a></li><!--{/if}-->
				<!--{if $DISPLAYINDEX eq "1"}--><li><a href="autorefresh.php" targer="_blank"><!--{$LANG_SKELETON_MENU_AUTOREFRESH}--></a></li><!--{/if}-->
				<!--{if $DISPLAYADMIN eq "1"}--><li><a href="/admin/" targer="_blank"><!--{$LANG_SKELETON_MENU_ADMIN}--></a></li><!--{/if}-->
				<!--{if $DISPLAYGESTION eq "1"}--><li><a href="admin.php" targer="_blank"><!--{$LANG_SKELETON_MENU_MANAGE}--></a></li><!--{/if}-->
				<li><a href="logout.php" targer="_blank"><!--{$LANG_SKELETON_MENU_EXIT}--></a></li>
			</ul>
		</div>
	</div>	
	<div id="wrap">
		<!--{include file="$CENTRAL"}-->
	</div>
</div>

</body>
</html>
