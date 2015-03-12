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
header("Content-Type: text/html; charset=UTF-8");
include("include/cookie.php");
require("../../etc/viewer.config.php");
include("include/login.php");
include("include/witofunctions.php");

if (!login_allowed($current_usersid, $db, $current_usersgroupid, "view-videos")) {
	$smarty->assign('LOGINERROR', "Accès refusé à cette section du programme");
	$smarty->display('login.tpl');		
	exit();
} 

include("include/allowedsources.php");

if (isset($_GET['timestamp'])) {
	Cookie::Set('timestamp', strip_tags($_GET['timestamp']), Cookie::Session);
}
if (isset($_GET['playvideo'])) {
	Cookie::Set('playvideo', strip_tags($_GET['playvideo']), Cookie::Session);		
}

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
$smarty->assign('CURRENTTIMESTAMP', Cookie::Get('timestamp'));
$currenttimestamp = Cookie::Get('timestamp');

$dirresultsday = php4_scandir($config_camvideos);
sort($dirresultsday);
$cptvidfiletmp = sizeof($dirresultsday);
$cptcreatedvids = 0;
$cptvids = 0;
$dailyvidscpt = array();
for ($i=0;$i<$cptvidfiletmp;$i++) {
	if (substr($dirresultsday[$i], -4)== ".avi") {
		if (substr($dirresultsday[$i],0,6) == $currentyear . $currentmonthnb) {
			if (substr($dirresultsday[$i], 0,9) == substr(Cookie::Get('timestamp'), 0,8) . "." || substr($dirresultsday[$i], 0,9) == substr(Cookie::Get('timestamp'), 0,8) . "_" ) {
				$dailycreatedvids[$cptcreatedvids] = $dirresultsday[$i];
				$dailycreatedvidsfilesize[$cptcreatedvids] = formatSizeSmall(filesize($config_camvideos . $dirresultsday[$i]));
				$cptcreatedvids++;
			}
			$tmpdirresultsday = substr($dirresultsday[$i],6,8) * 1;
			$dailyvidscpt[$tmpdirresultsday] = $dailyvidscpt[$tmpdirresultsday] + 1;
			$dailypicresultstimestamp[$tmpdirresultsday] = date("YmdHis", mktime(0,0,0,substr($dirresultsday[$i],4,2),substr($dirresultsday[$i],6,2),substr($dirresultsday[$i],0,4)));
		}

	}
}

if (isset($dailycreatedvids)) {$smarty->assign('DAILYCREATEDVIDS', $dailycreatedvids);}
if (isset($dailycreatedvidsfilesize)) {$smarty->assign('DAILYCREATEDVIDSFILESIZE', $dailycreatedvidsfilesize);}
$smarty->assign('CPTCREATEDVIDS', $cptcreatedvids);

if (isset($dailyvids)) {$smarty->assign('DAILYVIDS', $dailyvids);}
if (isset($dailyvidscpt)) {$smarty->assign('DAILYVIDSCPT', $dailyvidscpt);}
if (isset($dailyvidsfilesize)) {$smarty->assign('DAILYVIDSFILESIZE', $dailyvidsfilesize);}
$smarty->assign('CPTVIDS', $cptvids);

if (Cookie::Get('playvideo') != "") {
	if (is_file($config_camvideos . Cookie::Get('playvideo') . ".jpg")) {
		$smarty->assign('PLAYVIDEOFLASHAVAILABLE', "yes");
		list($currentpicwidth, $currentpicheight, $currentpictype, $currentpicattr) = getimagesize($config_camvideos . Cookie::Get('playvideo') . ".jpg");
		$smarty->assign('PLAYVIDEOFLASHWIDTH', "640");
		$smarty->assign('PLAYVIDEOFLASHHEIGHT', "360");
	}	
	$smarty->assign('VIDEOFILENAME', Cookie::Get('playvideo'));		
}

if (is_file($config_camvideos . Cookie::Get('playvideo'))) {
	$smarty->assign('PLAYVIDEO', $config_sourcesprefix . $config_source . "/videos/" . Cookie::Get('playvideo'));
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
if (isset($dailypicresultscpt)) {$smarty->assign('CALENDARTABLEDAILYPICS', $dailypicresultscpt);}
if (isset($dailypicresultstimestamp)) {$smarty->assign('CALENDARTABLEDAILYPICSTIMESTAMP', $dailypicresultstimestamp);}
$smarty->assign('CALENDARCURRENTDAY', $currentday);
$smarty->assign('CALENDARCURRENTDAYTXT', ucwords(strftime("%d %B %G %Hh%M", mktime($currenthour,$currentminute,$currentsecond, $currentmonthnb,$currentday,$currentyear))));
$smarty->assign('CALENDARCURRENTMINUTE', $currentminute * 1);
$smarty->assign('CALENDARCURRENTHOUR', $currenthour * 1);


if (isset($hourlypicresults)) {$smarty->assign('CALENDARHOURLYPICRESULTSTIMESTAMP', $hourlypicresults);}
if (isset($hourlypicresultsdisp)) {$smarty->assign('CALENDARHOURLYPICRESULTS', $hourlypicresultsdisp);}

if (is_file($config_langdir . "videos.php")) {
	include($config_langdir . "videos.php");
}

$smarty->assign('DISPLAY', "videos");
$smarty->assign('CENTRAL', 'videos.tpl');
$smarty->display('skeleton.tpl');

?>
