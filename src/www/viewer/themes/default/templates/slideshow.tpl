<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<!--
		Supersized - Fullscreen Slideshow jQuery Plugin
		Version : 3.2.5
		Site	: www.buildinternet.com/project/supersized
		
		Author	: Sam Dunn
		Company : One Mighty Roar (www.onemightyroar.com)
		License : MIT License / GPL License
	-->

	<head>

		<title>Webcampak Slideshow</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="refresh" content="300">
		
		<link rel="stylesheet" href="<!--{$CONFIGBASE}-->include/supersized/slideshow/css/supersized.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<!--{$CONFIGBASE}-->include/supersized/slideshow/theme/supersized.shutter.css" type="text/css" media="screen" />
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript" src="<!--{$CONFIGBASE}-->include/supersized/slideshow/js/jquery.easing.min.js"></script>
		
		<script type="text/javascript" src="<!--{$CONFIGBASE}-->include/supersized/slideshow/js/supersized.3.2.5.min.js"></script>
		<script type="text/javascript" src="<!--{$CONFIGBASE}-->include/supersized/slideshow/theme/supersized.shutter.min.js"></script>
		
		<script type="text/javascript">
			
			jQuery(function($){
				
				$.supersized({
				
					// Functionality
					slide_interval  	: 30000,	// Length between transitions
					transition      	: 1, 		// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed	: 700,		// Speed of transition
															   
					// Components							
					slide_links		: 'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					fit_always 		: 1, 
					thumbnail_navigation 	: 0,
					slides 	: [// Slideshow Images
						<!--{section name=thumbsources start=0 loop=$SLIDESHOWDISPCPT}-->
							<!--{if $SLIDESHOWDISP[thumbsources] neq ""}-->
								{image : '<!--{$SLIDESHOWDISP[thumbsources]}-->'}
								<!--{if $smarty.section.thumbsources.index neq $SLIDESHOWDISPCPT}-->
								,
								<!--{/if}-->
							<!--{/if}-->
						<!--{/section}-->
						]
				});
		    });
		    
		</script>
		
	</head>
	
	<style type="text/css">
		ul#demo-block{ margin:0 15px 15px 15px; }
			ul#demo-block li{ margin:0 0 10px 0; padding:10px; display:inline; float:left; clear:both; color:#aaa; background:url('img/bg-black.png'); font:11px Helvetica, Arial, sans-serif; }
			ul#demo-block li a{ color:#eee; font-weight:bold; }
	</style>

<body>

	<!--Arrow Navigation-->
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>
	
	<!--Time Bar-->
	<div id="progress-back" class="load-item">
		<div id="progress-bar"></div>
	</div>
	
	<!--Control Bar-->
	<div id="controls-wrapper" class="load-item">
		<div id="controls">
			
			<a id="play-button"><img id="pauseplay" src="<!--{$CONFIGBASE}-->include/supersized/slideshow/img/pause.png"/></a>
		
			<!--Slide counter-->
			<div id="slidecounter">
				<span class="slidenumber"></span> / <span class="totalslides"></span>
			</div>
			
			<!--Slide captions displayed here-->
			<div id="slidecaption"></div>
			
			<!--Navigation-->
			<ul id="slide-list"></ul>
			
		</div>
	</div>

</body>
</html>




