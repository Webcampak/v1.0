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

		if (strip_tags($_GET['testconfig']) == "1") {
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " dailyvidtest");
			$smarty->assign('TESTPARAMETERS', '1' );
		}
		if (strip_tags($_GET['submit']) == "1" && strip_tags($_POST['submitform']) == "1") {
			foreach ($_POST as $confkey=>$confvalue) {
				if (substr($confkey, 0, 3) == "cfg") {
					$witoparameters[strip_tags($confkey)] = wito_replacechars(strip_tags($confvalue));
				}
			}
			if (strip_tags($_POST["cfgvideoavihotlinkupload"]) == "") { $witoparameters["cfgvideoavihotlinkupload"] = "no";}
			if (strip_tags($_POST["cfgvideoflvhotlinkupload"]) == "") { $witoparameters["cfgvideoflvhotlinkupload"] = "no";}
			if (strip_tags($_POST["cfgvideoyoutubeupload"]) == "") { $witoparameters["cfgvideoyoutubeupload"] = "no";}
			if (strip_tags($_POST["cfgvideaddaudio"]) == "") { $witoparameters["cfgvideaddaudio"] = "no";}
			if (strip_tags($_POST["cfgwatermarkactivate"]) == "") { $witoparameters["cfgwatermarkactivate"] = "no";}
			if (strip_tags($_POST["cfgvideopreimagemagicktxt"]) == "") { $witoparameters["cfgvideopreimagemagicktxt"] = "no";}
			if (strip_tags($_POST["cfgvideopreresize"]) == "") { $witoparameters["cfgvideopreresize"] = "no";}
			if (strip_tags($_POST["cfgfilteractivate"]) == "") { $witoparameters["cfgfilteractivate"] = "no";}
			if (strip_tags($_POST["cfgvideocodecH2641080pcreate"]) == "") { $witoparameters["cfgvideocodecH2641080pcreate"] = "no";}
			if (strip_tags($_POST["cfgvideocodecH2641080pcreateflv"]) == "") { $witoparameters["cfgvideocodecH2641080pcreateflv"] = "no";}
			if (strip_tags($_POST["cfgvideocodecH2641080p2pass"]) == "") { $witoparameters["cfgvideocodecH2641080p2pass"] = "no";}
			$witoparameters["cfgvideocodecH2641080pminsize"] = wito_replacechars(strip_tags($_POST['cfgvideocodecH2641080pminsize'])) * 1000;
			if (strip_tags($_POST["cfgvideocodecH264720pcreate"]) == "") { $witoparameters["cfgvideocodecH264720pcreate"] = "no";}
			if (strip_tags($_POST["cfgvideocodecH264720pcreateflv"]) == "") { $witoparameters["cfgvideocodecH264720pcreateflv"] = "no";}
			if (strip_tags($_POST["cfgvideocodecH264720p2pass"]) == "") { $witoparameters["cfgvideocodecH264720p2pass"] = "no";}
			$witoparameters["cfgvideocodecH264720pminsize"] = wito_replacechars(strip_tags($_POST['cfgvideocodecH264720pminsize'])) * 1000;
			if (strip_tags($_POST["cfgvideocodecH264480pcreate"]) == "") { $witoparameters["cfgvideocodecH264480pcreate"] = "no";}
			if (strip_tags($_POST["cfgvideocodecH264480pcreateflv"]) == "") { $witoparameters["cfgvideocodecH264480pcreateflv"] = "no";}
			if (strip_tags($_POST["cfgvideocodecH264480p2pass"]) == "") { $witoparameters["cfgvideocodecH264480p2pass"] = "no";}
			$witoparameters["cfgvideocodecH264480pminsize"] = wito_replacechars(strip_tags($_POST['cfgvideocodecH264480pminsize'])) * 1000;
			if (strip_tags($_POST["cfgvideocodecH264customcreate"]) == "") { $witoparameters["cfgvideocodecH264customcreate"] = "no";}
			if (strip_tags($_POST["cfgvideocodecH264customcreateflv"]) == "") { $witoparameters["cfgvideocodecH264customcreateflv"] = "no";}
			if (strip_tags($_POST["cfgvideocodecH264custom2pass"]) == "") { $witoparameters["cfgvideocodecH264custom2pass"] = "no";}
			$witoparameters["cfgvideocodecH264customminsize"] = wito_replacechars(strip_tags($_POST['cfgvideocodecH264customminsize'])) * 1000;
			if (strip_tags($_POST["cfgphidgetdisplaytemperature"]) == "") { $witoparameters["cfgphidgetdisplaytemperature"] = "no";}
			if (strip_tags($_POST["cfgphidgetdisplayluminosity"]) == "") { $witoparameters["cfgphidgetdisplayluminosity"] = "no";}
			wito_writeconfig($config_witoconfigvid, $witoparameters);

			$prewebcamboxconfig = wito_getfullconfig($config_witoconfigvid);
			for ($i=1;$i<$prewebcamboxconfig["cfgphidgetsensornb"] + 1; $i++) {
				$subsrcfgsensortype = strip_tags($_POST["srcfgsensortype-" . $i]);
				$subsrcfgsensortext = strip_tags($_POST["srcfgsensortext-" . $i]);
				$subsrcfgsensorcolor = strip_tags($_POST["srcfgsensorcolor-" . $i]);
				if (strip_tags($_POST["srcfgsensorinsert-" . $i]) == "yes") {$subsrcfgsensorinsert = "yes";} else {$subsrcfgsensorinsert = "no";}
				$subsrcfgsensorsize = strip_tags($_POST["srcfgsensorsize-" . $i]);
				$subsrcfgsensortransparency = strip_tags($_POST["srcfgsensortransparency-" . $i]);
				$subsrcfgsensorposx = strip_tags($_POST["srcfgsensorposx-" . $i]);
				$subsrcfgsensorposy = strip_tags($_POST["srcfgsensorposy-" . $i]);
				$witoparametersadd["cfgphidgetsensor" . $i] = $subsrcfgsensortype . "\",\"" . $subsrcfgsensortext . "\",\"" . $subsrcfgsensorcolor . "\",\"" . $subsrcfgsensorinsert . "\",\"" . $subsrcfgsensorsize . "\",\"" . $subsrcfgsensortransparency . "\",\"" . $subsrcfgsensorposx . "\",\"" . $subsrcfgsensorposy;
				#print $witoparametersadd["cfgphidgetsensor" . $i] . "<br />";
			}
			wito_writeconfig($config_witoconfigvid, $witoparametersadd);

		}
		$webcamboxconfig = wito_getfullconfig($config_witoconfigvid);		
		foreach ($webcamboxconfig as $readkey=>$readvalue) {
		      $smarty->assign(strtoupper($readkey), $readvalue);
		}	
		if ($webcamboxconfig["cfgvideoyoutubeupload"] == "yes") {
			$smarty->assign('CFGVIDEOYOUTUBEUPLOAD', "checked");
		}
		if ($webcamboxconfig["cfgvideoaddaudio"] == "yes") {
			$smarty->assign('CFGVIDEOADDAUDIO', "checked");
		}
		if ($webcamboxconfig["cfgwatermarkactivate"] == "yes") {
			$smarty->assign('CFGWATERMARKACTIVATE', "checked");
		}
		if ($webcamboxconfig["cfgvideopreimagemagicktxt"] == "yes") {
			$smarty->assign('CFGVIDEOPREIMAGEMAGICKTXT', "checked");
		}			
		if ($webcamboxconfig["cfgvideopreresize"] == "yes") {
			$smarty->assign('CFGVIDEOPRERESIZE', "checked");
		}	
		if ($webcamboxconfig["cfgvideocodecH2641080pcreate"] == "yes") {
			$smarty->assign('CFGVIDEOCODECH2641080PCREATE', "checked");
		}
		if ($webcamboxconfig["cfgvideocodecH2641080pcreateflv"] == "yes") {
			$smarty->assign('CFGVIDEOCODECH2641080PCREATEFLV', "checked");
		}
		if ($webcamboxconfig["cfgvideocodecH2641080p2pass"] == "yes") {
			$smarty->assign('CFGVIDEOCODECH2641080P2PASS', "checked");
		}				
		$smarty->assign('CFGVIDEOCODECH2641080PMINSIZE', round($webcamboxconfig["cfgvideocodecH2641080pminsize"]/1000) );

		if ($webcamboxconfig["cfgvideocodecH264720pcreate"] == "yes") {
			$smarty->assign('CFGVIDEOCODECH264720PCREATE', "checked");
		}
		if ($webcamboxconfig["cfgvideocodecH264720pcreateflv"] == "yes") {
			$smarty->assign('CFGVIDEOCODECH264720PCREATEFLV', "checked");
		}
		if ($webcamboxconfig["cfgvideocodecH264720p2pass"] == "yes") {
			$smarty->assign('CFGVIDEOCODECH264720P2PASS', "checked");
		}				
		$smarty->assign('CFGVIDEOCODECH264720PMINSIZE', round($webcamboxconfig["cfgvideocodecH264720pminsize"]/1000) );

		if ($webcamboxconfig["cfgvideocodecH264480pcreate"] == "yes") {
			$smarty->assign('CFGVIDEOCODECH264480PCREATE', "checked");
		}
		if ($webcamboxconfig["cfgvideocodecH264480pcreateflv"] == "yes") {
			$smarty->assign('CFGVIDEOCODECH264480PCREATEFLV', "checked");
		}
		if ($webcamboxconfig["cfgvideocodecH264480p2pass"] == "yes") {
			$smarty->assign('CFGVIDEOCODECH264480P2PASS', "checked");
		}				
		$smarty->assign('CFGVIDEOCODECH264480PMINSIZE', round($webcamboxconfig["cfgvideocodecH264480pminsize"]/1000) );

		if ($webcamboxconfig["cfgvideocodecH264customcreate"] == "yes") {
			$smarty->assign('CFGVIDEOCODECH264CUSTOMCREATE', "checked");
		}
		if ($webcamboxconfig["cfgvideocodecH264customcreateflv"] == "yes") {
			$smarty->assign('CFGVIDEOCODECH264CUSTOMCREATEFLV', "checked");
		}
		if ($webcamboxconfig["cfgvideocodecH264custom2pass"] == "yes") {
			$smarty->assign('CFGVIDEOCODECH264CUSTOM2PASS', "checked");
		}				
		$smarty->assign('CFGVIDEOCODECH264CUSTOMMINSIZE', round($webcamboxconfig["cfgvideocodecH264customminsize"]/1000) );

		if ($webcamboxconfig["cfgphidgetdisplaytemperature"] == "yes") {
			$smarty->assign('CFGPHIDGETDISPLAYTEMPERATURE', "checked");
		}
		if ($webcamboxconfig["cfgphidgetdisplayluminosity"] == "yes") {
			$smarty->assign('CFGPHIDGETDISPLAYLUMINOSITY', "checked");
		}
		if ($webcamboxconfig["cfgfilteractivate"] == "yes") {
			$smarty->assign('CFGFILTERACTIVATE', "checked");
		}		

		for ($i=1;$i<$webcamboxconfig["cfgphidgetsensornb"] + 1; $i++) {
			$srcfgparameters = explode(",", $webcamboxconfig["cfgphidgetsensor" . $i]);
			if($srcfgparameters[0][0] == " ") {$srcfgsensortype[$i] = substr($srcfgparameters[0],1);} else {$srcfgsensortype[$i] = $srcfgparameters[0];}
			if($srcfgparameters[1][0] == " ") {$srcfgsensortext[$i] = substr($srcfgparameters[1],1);} else {$srcfgsensortext[$i] = $srcfgparameters[1];}
			if($srcfgparameters[2][0] == " ") {$srcfgsensorcolor[$i] = substr($srcfgparameters[2],1);} else {$srcfgsensorcolor[$i] = $srcfgparameters[2];}
			if($srcfgparameters[3][0] == " ") {$srcfgsensorinsert[$i] = substr($srcfgparameters[3],1);} else {$srcfgsensorinsert[$i] = $srcfgparameters[3];}
			if ($srcfgsensorinsert[$i] == "yes") {
				$srcfgsensorinsert[$i] = "checked";
			} else {$srcfgsensorinsert[$i] = "";}
			if($srcfgparameters[4][0] == " "){$srcfgsensorsize[$i] = substr($srcfgparameters[4],1);} else {$srcfgsensorsize[$i] = $srcfgparameters[4];}
			if($srcfgparameters[5][0] == " "){$srcfgsensortransparency[$i] = substr($srcfgparameters[5],1);} else {$srcfgsensortransparency[$i] = $srcfgparameters[5];}
			if($srcfgparameters[6][0] == " "){$srcfgsensorposx[$i] = substr($srcfgparameters[6],1);} else {$srcfgsensorposx[$i] = $srcfgparameters[6];}
			if($srcfgparameters[7][0] == " "){$srcfgsensorposy[$i] = substr($srcfgparameters[7],1);} else {$srcfgsensorposy[$i] = $srcfgparameters[7];}
		}
		$smarty->assign('SRCCFGSENSORTYPE', $srcfgsensortype);
		$smarty->assign('SRCCFGSENSORPORT', $srcfgsensorport);
		$smarty->assign('SRCCFGSENSORTEXT', $srcfgsensortext);
		$smarty->assign('SRCCFGSENSORCOLOR', $srcfgsensorcolor);
		$smarty->assign('SRCCFGSENSORINSERT', $srcfgsensorinsert);
		$smarty->assign('SRCCFGSENSORSIZE', $srcfgsensorsize);
		$smarty->assign('SRCCFGSENSORTRANSPARENCY', $srcfgsensortransparency);
		$smarty->assign('SRCCFGSENSORPOSX', $srcfgsensorposx);
		$smarty->assign('SRCCFGSENSORPOSY', $srcfgsensorposy);

		$webcamboxconfig = wito_getfullconfig($config_etcdirectory . "config-general.cfg");
		foreach ($webcamboxconfig as $readkey=>$readvalue) {
		      $smarty->assign(strtoupper($readkey), $readvalue);
		}

		for ($i=1;$i<$webcamboxconfig["cfgphidgetsensortypenb"] + 1; $i++) {
			$phidgetparameters = explode(",", $webcamboxconfig["cfgphidgetsensortype" . $i]);
			$phidgetsensortype[$i] = $phidgetparameters[0];
		}
		$smarty->assign('CFGPHIDGETSENSORTYPE', $phidgetsensortype);

		$smarty->assign('CFGPHIDGETSENSORTYPENB', $webcamboxconfig["cfgphidgetsensortypenb"] + 1);

		$webcamboxconfig = wito_getfullconfig($config_ftpserversconfig);
		foreach ($webcamboxconfig as $readkey=>$readvalue) {
		      $smarty->assign(strtoupper($readkey), $readvalue);
		}

		for ($i=1;$i<$webcamboxconfig["cfgftpserverslistnb"] + 1; $i++) {
			$ftpserversparameters = explode(",", $webcamboxconfig["cfgftpserverslist" . $i]);
			$ftpserversname[$i] = $ftpserversparameters[0];
		}
		$smarty->assign('CFGFTPSERVERSNAME', $ftpserversname);
		$smarty->assign('CFGFTPSERVERSNB', $webcamboxconfig["cfgftpserverslistnb"] + 1);

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

if (is_file($config_langdir . "config-videos.php")) {
	include($config_langdir . "config-videos.php");
}

//$smarty->assign("BODYCONTENT", $smarty->template_dir . "index.tpl");
$smarty->assign('CONFIGPAGE', 'videos');
$smarty->assign('CENTRAL', 'config-videos.tpl');
$smarty->display('skeleton.tpl');
//$_COOKIE['lasturl'] = "panel.php"browserurl();

?>
