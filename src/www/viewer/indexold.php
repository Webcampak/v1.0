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

include("include/cookie.php");
require("../../etc/viewer.config.php");
include("include/login.php");
include("include/witofunctions.php");

if (!login_allowed($current_usersid, $db, $current_usersgroupid, "index")) {
	$smarty->assign('LOGINERROR', "Accès refusé à cette section du programme");
	$smarty->display('login.tpl');		
	exit();
} 










for ($i=1;$i<$config_nbsources;$i++) {
	$webcampakconfig[$i] = wito_getfullconfig($config_etcdirectory . "config-source" . $i . ".cfg");
	$webcampakconfigimgtext[$i] = $webcampakconfig[$i]["cfgimgtext"];
}
$smarty->assign('WEBCAMPAKCONFIGIMGTEXT', $webcampakconfigimgtext);
$smarty->assign('CURRENTSOURCELEGEND', $webcampakconfig[$config_source]["cfgimgtext"]);

if (strip_tags($_GET['timestamp']) != "") {
	Cookie::Set('timestamp', strip_tags($_GET['timestamp']), Cookie::Session);
	if (!is_file($config_camlive . Cookie::Get('autorefresh'))) {
		$smarty->assign('PICTURENOTFOUND', $config_webcamlive . Cookie::Get('autorefresh'));		
	}
}

if (strip_tags($_GET['video']) == "1") {
	Cookie::Set('display', 'videos', Cookie::Session);
} elseif (strip_tags($_GET['photos']) == "1") {
	Cookie::Set('display', 'photos', Cookie::Session);
} elseif (strip_tags($_GET['thumbnails']) == "1") {
	Cookie::Set('display', 'thumbnails', Cookie::Session);
} elseif (strip_tags($_GET['autorefresh']) != "") {
	Cookie::Set('display', 'autorefresh', Cookie::Session);
} 
if (Cookie::Get('display') == "") {
	Cookie::Set('display', 'autorefresh', Cookie::Session);
}
$smarty->assign('DISPLAY', Cookie::Get('display'));

if (Cookie::Get('timestamp') != "") {
	$currentdate = Cookie::Get('timestamp');
	$currentyear = substr($currentdate, 0,4);
	$currentmonthnb = substr($currentdate, 4,2);
	$currentday = substr($currentdate, 6,2);
	$currenthour = substr($currentdate, 8,2);
	$currentminute = substr($currentdate, 10,2);
	$currentsecond = substr($currentdate, 12,2);	
	$currentmonth = ucwords(strftime("%b", mktime($currenthour,$currentminute,$currentsecond,$currentmonthnb,$currentday,$currentyear)));		
	$currentmonthnbdays = date("t", mktime($currenthour,$currentminute,$currentsecond,$currentmonthnb,$currentday,$currentyear));		
} else {
	$currentdate = date("YmdHis");
	$currentyear = date("Y");
	$currentmonth = ucwords(strftime("%b"));//M
	$currentmonthnb = date("m");
	$currentmonthnbdays = date("t");
	$currentday = date("d");
	$currenthour = date("H");
	$currentminute = date("i");
	$currentsecond = date("s");
	Cookie::Set('timestamp', $currentdate, Cookie::Session);
}
//echo "CURRENT MONTH NB 1" . $currentmonth . "<br />";
$smarty->assign('CURRENTTIMESTAMP', Cookie::Get('timestamp'));
$currenttimestamp = Cookie::Get('timestamp');
	
if (Cookie::Get('display') == "photos") {
	include("include/photos.php");
} elseif (Cookie::Get('display') == "videos") {
	if (strip_tags($_GET['playvideo']) != "") {
		Cookie::Set('playvideo', strip_tags($_GET['playvideo']), Cookie::Session);		
	}
	include("include/videos.php");
	if (is_file($config_camvideos . Cookie::Get('playvideo'))) {
		$smarty->assign('PLAYVIDEO', $config_webcamvideos . Cookie::Get('playvideo'));
	}	
} elseif (Cookie::Get('display') == "thumbnails") {
	include("include/thumbnails.php");
}elseif (Cookie::Get('display') == "autorefresh") {
	if (strip_tags($_GET['autorefresh']) != "") {
		Cookie::Set('autorefresh', strip_tags($_GET['autorefresh']), Cookie::Session);		
	}
	if (is_file($config_camlive . Cookie::Get('autorefresh'))) {
		$smarty->assign('HOTLINKPICTURE', $config_webcamlive . Cookie::Get('autorefresh'));		
	}
} 
//echo "CURRENT MONTH NB 2" . $currentmonth . "<br />";
$dirresultstmp = scandir($config_base . "sources/source" . $config_source . "/live/");
$cptpicfiletmp = sizeof($dirresultstmp);
$cptformat=0;
for ($i=0;$i<$cptpicfiletmp;$i++) {
	if ($dirresultstmp[$i] != '.' && $dirresultstmp[$i] != '..' && substr($dirresultstmp[$i], -4,4) == ".jpg") {
		if(ereg("webcam",$dirresultstmp[$i])) {
			if ($dirresultstmp[$i] != "full-webcam.jpg") {
				list($webcamprefix, $livesize[$cptformat]) = explode("-", $dirresultstmp[$i]);
				$livefilename[$cptformat] = $dirresultstmp[$i];
				$livesize[$cptformat] = str_replace(".jpg", "", $livesize[$cptformat]);				
				list($livebegsize[$cptformat], $webcamprefix) = explode("x", $livesize[$cptformat]);
				$cptformat++;					
			}
		}
	}
}
$smarty->assign('SOURCECPTFORMAT', $cptformat);
$smarty->assign('SOURCELIVEFILENAME', $livefilename);
$smarty->assign('SOURCELIVEFILESIZE', $livesize);
if ($cptpicfiletmp > 2 && sizeof($livebegsize) > 1) {
	$smarty->assign('SOURCELIVEBEGSMALLESTFILESIZE', min($livebegsize));
}

for ($j=0;$j<$cptformat;$j++) {
	if ($livebegsize[$j] == min($livebegsize)) {
		$smarty->assign('SOURCELIVEPICTURENOW', $livefilename[$j]);
		if (is_file($config_camlive . $livefilename[$j])) {
			$smarty->assign('HOTLINKPICTUREERROR', $config_webcamlive . $livefilename[$j]);		
		}		
	}
}

$smarty->assign('CALENDARCURRENTMONTH', $currentmonth);
$smarty->assign('CALENDARPREVIOUSMONTH', date("YmdHis", mktime("0","0","0", $currentmonthnb - 1,$currentday,$currentyear)));
$smarty->assign('CALENDARCURRENTYEAR', $currentyear);
$smarty->assign('CALENDARFOLLOWINGMONTH', date("YmdHis", mktime("0","0","0", $currentmonthnb + 1,$currentday,$currentyear)));
$smarty->assign('CALENDARDAY01', ucwords(substr(strftime("%a", mktime("0","0","0", $currentmonthnb,"1",$currentyear)),0,4)));
$smarty->assign('CALENDARDAY02', ucwords(substr(strftime("%a", mktime("0","0","0", $currentmonthnb,"2",$currentyear)),0,4)));
$smarty->assign('CALENDARDAY03', ucwords(substr(strftime("%a", mktime("0","0","0", $currentmonthnb,"3",$currentyear)),0,4)));
$smarty->assign('CALENDARDAY04', ucwords(substr(strftime("%a", mktime("0","0","0", $currentmonthnb,"4",$currentyear)),0,4)));
$smarty->assign('CALENDARDAY05', ucwords(substr(strftime("%a", mktime("0","0","0", $currentmonthnb,"5",$currentyear)),0,4)));
$smarty->assign('CALENDARDAY06', ucwords(substr(strftime("%a", mktime("0","0","0", $currentmonthnb,"6",$currentyear)),0,4)));
$smarty->assign('CALENDARDAY07', ucwords(substr(strftime("%a", mktime("0","0","0", $currentmonthnb,"7",$currentyear)),0,4)));	
$smarty->assign('CALENDARTABLENBDAYS', $currentmonthnbdays+1);	
$smarty->assign('CALENDARTABLEDAILYPICS', $dailypicresultscpt);	
$smarty->assign('CALENDARTABLEDAILYPICSTIMESTAMP', $dailypicresultstimestamp);	
$smarty->assign('CALENDARCURRENTDAY', $currentday);
$smarty->assign('CALENDARCURRENTDAYTXT', ucwords(strftime("%d %B %G %Hh%M", mktime($currenthour,$currentminute,$currentsecond, $currentmonthnb,$currentday,$currentyear))));
$smarty->assign('CALENDARCURRENTMINUTE', $currentminute * 1);
$smarty->assign('CALENDARCURRENTHOUR', $currenthour * 1);
	
$smarty->assign('CALENDARHOURLYPICRESULTSTIMESTAMP', $hourlypicresults);
$smarty->assign('CALENDARHOURLYPICRESULTS', $hourlypicresultsdisp);
//echo "TIMESTAMP:" . Cookie::Get('timestamp')  . "<br />";

$smarty->assign('CENTRAL', 'visiteur.tpl');
$smarty->display('skeleton.tpl');

?>