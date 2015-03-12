<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<!--
		Supersized - Fullscreen Slideshow jQuery Plugin
		Version : Core 3.2.1
		Site	: www.buildinternet.com/project/supersized
		
		Author	: Sam Dunn
		Company : One Mighty Roar (www.onemightyroar.com)
		License : MIT License / GPL License
	-->

	<head>



		<title>Webcampak Fullscreen picture display</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="refresh" content="300">
		
		<link rel="stylesheet" href="<!--{$CONFIGBASE}-->include/supersized/core/css/supersized.core.css" type="text/css" media="screen" />
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
		<script type="text/javascript" src="<!--{$CONFIGBASE}-->include/supersized/core/js/supersized.core.3.2.1.min.js"></script>
		
		<script type="text/javascript">
			
			jQuery(function($){
				
				$.supersized({
					fit_always : 1, 
					slides  :  	[ {image : '<!--{$DISPLAYFULLSCREEN}-->'} ]
				});
		    });
		    
		</script>
		
		<style type="text/css">
			
			/*Demo Styles
			--------------------*/
			p{ padding:0 30px 30px 30px; color:#aaa; font:12px "Helvetica Neue", "Helvetica", Arial, sans-serif; text-shadow: #000 0px 1px 0px; line-height:200%; }
				p a{ color:#eee; font-weight:bold; }
			h3{ padding:30px 30px 20px 30px; }
			
			#content{ background:#111; background:url('img/bg-black.png'); width:720px; height:800px; margin:30px auto; text-align:left; }
			
		</style>
		
	</head>

<body>


</body>
</html>
