<?php
// Copyright 2010 Infracom & Eurotechnia (support@webcampak.com)
// This file is part of the Webcampak project.
// Webcampak is free software: you can redistribute it and/or modify it 
// under the terms of the GNU General Public License as published by 
// the Free Software Foundation, either version 3 of the License, 
// or (at your option) any later version.

// Webcampak is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
// even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// See the GNU General Public License for more details.

// You should have received a copy of the GNU General Public License along with Webcampak. 
// If not, see http://www.gnu.org/licenses/.


require("../../etc/admin.config.php");


$configsection = strip_tags($_GET['section']);
$smarty->assign('CONFIGSECTION', $configsection);

		if (strip_tags($_GET['submit']) == "1" && strip_tags($_POST['submitform']) == "1") {
			foreach ($_POST as $confkey=>$confvalue) {
				if (substr($confkey, 0, 3) == "cfg") {
					$witoparameters[strip_tags($confkey)] = wito_replacechars(strip_tags($confvalue));
				}
			}
			if (strip_tags($_POST["cfgcropactivate"]) == "") { $witoparameters["cfgcropactivate"] = "no";}
			if (strip_tags($_POST["cfgthumbnailactivate"]) == "") { $witoparameters["cfgthumbnailactivate"] = "no";}
			if (strip_tags($_POST["cfgthumbnailborder"]) == "") { $witoparameters["cfgthumbnailborder"] = "no";}
			if (strip_tags($_POST["cfgvideosizeactivate"]) == "") { $witoparameters["cfgvideosizeactivate"] = "no";}
			if (strip_tags($_POST["cfgtransitionactivate"]) == "") { $witoparameters["cfgtransitionactivate"] = "no";}
			if (strip_tags($_POST["cfgwatermarkactivate"]) == "") { $witoparameters["cfgwatermarkactivate"] = "no";}
			if (strip_tags($_POST["cfgfilteractivate"]) == "") { $witoparameters["cfgfilteractivate"] = "no";}
			if (strip_tags($_POST["cfgvideopreimagemagicktxt"]) == "") { $witoparameters["cfgvideopreimagemagicktxt"] = "no";}
			if (strip_tags($_POST["cfgemailmovieactivate"]) == "") { $witoparameters["cfgemailmovieactivate"] = "no";}
			wito_writeconfig($config_witoconfigvidpost, $witoparameters);

		}
		$webcamboxconfig = wito_getfullconfig($config_witoconfigvidpost);	
		foreach ($webcamboxconfig as $readkey=>$readvalue) {
		      $smarty->assign(strtoupper($readkey), $readvalue);
		}	
		if ($webcamboxconfig["cfgcropactivate"] == "yes") {
			$smarty->assign('CFGCROPACTIVATE', "checked");
		}
		if ($webcamboxconfig["cfgthumbnailactivate"] == "yes") {
			$smarty->assign('CFGTHUMBNAILACTIVATE', "checked");
		}
		if ($webcamboxconfig["cfgthumbnailborder"] == "yes") {
			$smarty->assign('CFGTHUMBNAILBORDER', "checked");
		}		
		
		if ($webcamboxconfig["cfgvideosizeactivate"] == "yes") {
			$smarty->assign('CFGVIDEOSIZEACTIVATE', "checked");
		}
		if ($webcamboxconfig["cfgtransitionactivate"] == "yes") {
			$smarty->assign('CFGTRANSITIONACTIVATE', "checked");
		}
	
		if ($webcamboxconfig["cfgwatermarkactivate"] == "yes") {
			$smarty->assign('CFGWATERMARKACTIVATE', "checked");
		}
		if ($webcamboxconfig["cfgvideopreimagemagicktxt"] == "yes") {
			$smarty->assign('CFGVIDEOPREIMAGEMAGICKTXT', "checked");
		}
		if ($webcamboxconfig["cfgemailpostactivate"] == "yes") {
			$smarty->assign('CFGEMAILPOSTACTIVATE', "checked");
		}
		if ($webcamboxconfig["cfgfilteractivate"] == "yes") {
			$smarty->assign('CFGFILTERACTIVATE', "checked");
		}

$cptday = 0;
for ($i=0;$i<31;$i++) { 
	$daytxt[$cptday] = $i + 1;
	if ($daytxt[$cptday] < 10) {
		$daytxt[$cptday] = "0" . $daytxt[$cptday];
	}
	$cptday++;
}
$smarty->assign('CPTDAY', $cptday);
$smarty->assign('DAYTXT', $daytxt);

$cptyear = 0;
for ($i=2005;$i<2020;$i++) { 
	$yeartxt[$cptyear] = $i + 1;
	$cptyear++;
}
$smarty->assign('CPTYEAR', $cptyear);
$smarty->assign('YEARTXT', $yeartxt);

$cpthour = 0;
for ($i=-1;$i<23;$i++) { 
	$hourtxt[$cpthour] = $i + 1;
	if ($hourtxt[$cpthour] < 10) {
		$hourtxt[$cpthour] = "0" . $hourtxt[$cpthour];
	}
	$cpthour++;
}
$smarty->assign('CPTHOUR', $cpthour);
$smarty->assign('HOURTXT', $hourtxt);

$cptminute = 0;
for ($i=-1;$i<59;$i++) {
	$minutetxt[$cptminute] = $i + 1;
	if ($minutetxt[$cptminute] < 10) {
		$minutetxt[$cptminute] = "0" . $minutetxt[$cptminute];
	}	
	$cptminute++;
}
$smarty->assign('CPTMINUTE', $cptminute);
$smarty->assign('MINUTETXT', $minutetxt);

exec('mogrify -list font | grep Font', $fontlist, $ret); 	
$cptfonts = sizeof($fontlist);
for ($i=0;$i<$cptfonts;$i++) {
	$fontlist[$i] = trim(str_replace("Font:", "", $fontlist[$i]));
}
$smarty->assign('FONTSLIST', $fontlist);
$smarty->assign('FONTSCPT', $cptfonts);

$cptaudio = 0;
$audiodir = opendir($config_audiodirectory); 
while ($listaudiofile = readdir($audiodir)) {
   if(is_file($config_audiodirectory.$listaudiofile) && (substr($listaudiofile, -4,4) == ".mp3" || substr($listaudiofile, -4,4) == ".m3u")) {
      //echo "Nom : ".$listaudiofile . "<br />";
      $audiofiles[$cptaudio] = $listaudiofile;
      $cptaudio++;
   }
} 
closedir($audiodir);
$smarty->assign('CPTAUDIOFILES', $cptaudio);
$smarty->assign('AUDIOFILES', $audiofiles);

$cptwatermark = 0;
$watermarkdir = opendir($config_watermarkdirectory); 
while ($listwatermarkfile = readdir($watermarkdir)) {
   if(is_file($config_watermarkdirectory.$listwatermarkfile) && substr($listwatermarkfile, -4,4) == ".png") {
      //echo "Nom : ".$listwatermarkfile . "<br />";
      $watermarkfiles[$cptwatermark] = $listwatermarkfile;
      $cptwatermark++;
   }
} 
closedir($watermarkdir);
$smarty->assign('CPTWATERMARKFILES', $cptwatermark);
$smarty->assign('WATERMARKFILES', $watermarkfiles);


if (is_file($config_langdir . "config-videospost.php")) {
	include($config_langdir . "config-videospost.php");
}

$smarty->assign('CONFIGPAGE', 'videospost');
$smarty->assign('CENTRAL', 'config-videospost.tpl');
$smarty->display('skeleton.tpl');


?>
