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

if (!login_allowed($current_usersid, $db, $current_usersgroupid, "view-photos")) {
	$smarty->assign('LOGINERROR', "Accès refusé à cette section du programme");
	$smarty->display('login.tpl');		
	exit();
} 

include("include/allowedsources.php");

if (isset($_GET['timestamp'])) {
	Cookie::Set('p' . $config_source . 'timestamp', strip_tags($_GET['timestamp']), Cookie::Session);
}

//On récupère la liste des répertoires de jours
$dirresultsscandays = php4_scandir($config_campictures);	// On cherche la dernière image de la source stockée sur le webcampak
sort($dirresultsscandays);
$cptdays = 0;
$cptpicfiletmp = sizeof($dirresultsscandays);
for ($i=0;$i<$cptpicfiletmp;$i++) {	
	if (substr($dirresultsscandays[$i], 0,2)== "20" && strlen($dirresultsscandays[$i]) == "8") {
		$dirscandays[$cptdays] = $dirresultsscandays[$i];
		$cptdays++;
	}
}

if (Cookie::Get('p' . $config_source . 'timestamp') != "" && is_file($config_campictures . substr(Cookie::Get('p' . $config_source . 'timestamp'), 0,8) . "/" . Cookie::Get('p' . $config_source . 'timestamp') . ".jpg")) {
	$currentdate = Cookie::Get('p' . $config_source . 'timestamp');
} else {
	if (Cookie::Get('p' . $config_source . 'timestamp') != "") { // Si un timestamp est présent
		$dirresultsscanpics = php4_scandir($config_campictures . substr(Cookie::Get('p' . $config_source . 'timestamp'), 0,8) . "/");	// On scanne ensuite le dernier répertoire, on considère que le répertoire n'est créé que si une photo est mise en ligne
	} else {
		if ($cptdays > 0) { // Si aucun timestamp n'est présent
			$dirresultsscanpics = php4_scandir($config_campictures . max($dirscandays) . "/");	// On scanne ensuite le dernier répertoire, on considère que le répertoire n'est créé que si une photo est mise en ligne
		}
	}
	$cptpicfiletmp = sizeof($dirresultsscanpics);
	for ($i=0;$i<$cptpicfiletmp;$i++) {	
		if (substr($dirresultsscanpics[$i], 0,2)== "20" && substr($dirresultsscanpics[$i], -4) == ".jpg") {
			//Dans ce cas c'est un répertoire.
			$dirscanpics[$cptpics] = substr($dirresultsscanpics[$i], 0,14);
			$cptpics++;
		}
	}
	if ($cptpics > 0) {
		if (max($dirscanpics) != "") {
			$currentdate = max($dirscanpics);
			Cookie::Set('p' . $config_source . 'timestamp', $currentdate, Cookie::Session);
		}
	} elseif (Cookie::Get('p' . $config_source . 'timestamp') != "" && is_dir($config_campictures . substr(Cookie::Get('p' . $config_source . 'timestamp'), 0,8) . "/")) {
		echo "Error, " . substr(Cookie::Get('p' . $config_source . 'timestamp'), 0,8) . "/ directory is empty, please delete it.";
	}
}
if ($currentdate != "") {
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
	Cookie::Set('p' . $config_source . 'timestamp', $currentdate, Cookie::Session);
}
$smarty->assign('CURRENTTIMESTAMP', Cookie::Get('p' . $config_source . 'timestamp'));
$currenttimestamp = Cookie::Get('p' . $config_source . 'timestamp');


$calendarpreviousmonth = "";
$listdirectories = scandir($config_base . "sources/source" . $config_source . "/pictures/", 1);
for ($i=0;$i<sizeof($listdirectories);$i++) {
	if (substr($listdirectories[$i], 0,2)== "20" && strlen($listdirectories[$i]) == "8" && substr($currentdate, 0,6) > substr($listdirectories[$i], 0,6) && $calendarpreviousmonth == "") {
		$listdirectoriespics = scandir($config_base . "sources/source" . $config_source . "/pictures/" . $listdirectories[$i], 1);
		for ($k=0;$k<sizeof($listdirectoriespics);$k++) {
			if (substr($listdirectoriespics[$k], 0,2)== "20" && substr($listdirectoriespics[$k], -4) == ".jpg" && $calendarpreviousmonth == "" && substr($currentdate, 0,6) > substr($listdirectoriespics[$k], 0,6)) {
				$calendarpreviousmonth = substr($listdirectoriespics[$k], 0,12);
			}
		}
	}
}			

$calendarfollowingmonth = "";
$listdirectories = scandir($config_base . "sources/source" . $config_source . "/pictures/", 0);
for ($i=0;$i<sizeof($listdirectories);$i++) {
	if (substr($listdirectories[$i], 0,2)== "20" && strlen($listdirectories[$i]) == "8" && substr($currentdate, 0,6) < substr($listdirectories[$i], 0,6) && $calendarfollowingmonth == "") {
		$listdirectoriespics = scandir($config_base . "sources/source" . $config_source . "/pictures/" . $listdirectories[$i], 1);
		for ($k=0;$k<sizeof($listdirectoriespics);$k++) {
			if (substr($listdirectoriespics[$k], 0,2)== "20" && substr($listdirectoriespics[$k], -4) == ".jpg" && $calendarfollowingmonth == "" && substr($currentdate, 0,6) < substr($listdirectoriespics[$k], 0,6)) {
				$calendarfollowingmonth = substr($listdirectoriespics[$k], 0,12);
			}
		}
	}
}	

/*$cptfol = 0;
for ($i=0;$i<$cptdays;$i++) {
	//echo "CURRENTDATE: " . $currentdate . " - " . $dirscandays[$i] . " if " . substr($currentdate, 0,6) . " < " .
	substr($dirscandays[$i], 0,6) . "<br />"; 
	if(substr($dirscandays[$i], 0,6) < substr($currentdate, 0,6) && $dirscandays[$i] != "") {
		//$calendarpreviousmonth = $dirscandays[$i] . "010000";
		//echo "t-";
	} elseif (substr($dirscandays[$i], 0,6) > substr($currentdate, 0,6)  && $cptfol == 0 && $dirscandays[$i] != "") {
		$calendarfollowingmonth = $dirscandays[$i] . "010000";
		$cptfol++;
	}
}*/


if (isset($_GET['zoom'])) {
	Cookie::Set('zoom', strip_tags($_GET['zoom']), Cookie::Session);	
	$smarty->assign('CURRENTZOOM', Cookie::Get('zoom'));	
} elseif (Cookie::Get('zoom') != "") {
	$smarty->assign('CURRENTZOOM', Cookie::Get('zoom'));
} else {
	$defaultzoom = 1;
	Cookie::Set('zoom', '50', Cookie::Session);	
	$smarty->assign('CURRENTZOOM', "50");	
}

$displaysensorcpt = 0;
$cptwhole = 0;
$dailypicresultscpt = array();
$hourlypicresultscpt = array();
$cpttimestamp = 0;
$dirresultstmp = php4_scandir($config_campictures);
sort($dirresultstmp);
$cptpicfiletmp = sizeof($dirresultstmp);
for ($i=0;$i<$cptpicfiletmp;$i++) {	
	if (substr($dirresultstmp[$i], 0,2)== "20") {
		$currentdaydir = $dirresultstmp[$i];
		$dirresultsday[$currentdaydir] = php4_scandir($config_campictures . $dirresultstmp[$i] . "/");
		sort($dirresultsday[$currentdaydir]);
		$cptpicdayfiletmp = sizeof($dirresultsday[$currentdaydir]);
		for ($j=0;$j<$cptpicdayfiletmp;$j++) {				
			$wholetimestamp[$cptwhole] =  $dirresultsday[$currentdaydir][$j];
			if ($dirresultsday[$currentdaydir][$j] == $currentdate . ".jpg") {
				$browsecpt = $cptwhole;
			}
			if (substr($dirresultsday[$currentdaydir][$j], 0,4)== $currentyear && substr($dirresultsday[$currentdaydir][$j], 4,2) == $currentmonthnb ) {
				$tmpdirresultsday = 0;
				$tmpdirresultsday = substr($dirresultstmp[$i], 6,2) * 1;
				#$tmploopcpt = $dailyflvresultscpt[$tmpdirresultsday];
				#$dailypicresults[$tmpdirresultsday][$tmploopcpt] = $dirresultsday[$currentdaydir][$j];
				$dailypicresultscpt[$tmpdirresultsday] = $dailypicresultscpt[$tmpdirresultsday] + 1;
				$dailypicresultstimestamp[$tmpdirresultsday] = date("YmdHis", mktime($currenthour,$currentminute,$currentsecond,$currentmonthnb,$tmpdirresultsday,$currentyear));
				if (substr($dirresultsday[$currentdaydir][$j], 6,2) == $currentday) {
					$timestamptable[$cpttimestamp] = substr($dirresultstmp[$i], 0,14);
					$cpttimestamp++;
					$tmpdirresultshour = 0;
					$tmpdirresultshour = substr($dirresultsday[$currentdaydir][$j], 8,2) * 1;
					$tmpdirresultsminute = substr($dirresultsday[$currentdaydir][$j], 10,2) * 1;						
					$tmploopcpthour = $hourlypicresultscpt[$tmpdirresultshour] * 1;
					$hourlypicresults[$tmpdirresultshour][$tmpdirresultsminute] = substr($dirresultsday[$currentdaydir][$j], 0,14);
					$hourlypicresultsdisp[$tmpdirresultshour][$tmpdirresultsminute] = substr($dirresultsday[$currentdaydir][$j], 10,2) * 1;
					$hourlypicresultscpt[$tmpdirresultshour] = $hourlypicresultscpt[$tmpdirresultshour] + 1;
				}	
			}
			if (substr($dirresultsday[$currentdaydir][$j], 0,7)== "Sensor-" && substr($dirresultstmp[$i], 0,8) == $currentyear . $currentmonthnb . $currentday) {
				$displaysensor[$displaysensorcpt] = $config_webcampictures . substr($currenttimestamp, 0,8) . "/" . $dirresultsday[$currentdaydir][$j];
				$displaysensorcpt++;
			}
			$cptwhole++;
			
		}
	}

}
if (isset($displaysensor)){$smarty->assign('DISPLAYSENSOR', $displaysensor);}
$smarty->assign('DISPLAYSENSORCPT', $displaysensorcpt);

if (is_file($config_campictures . substr($currenttimestamp, 0,8) . "/" . $currenttimestamp . ".jpg")) {
	list($picwidth, $picheight, $pictype, $picattr)= getimagesize($config_campictures . substr($currenttimestamp, 0,8) . "/" . $currenttimestamp . ".jpg"); 
	$smarty->assign('DISPPICTUREWIDTH', $picwidth * 1);
	if ($picwidth < 1024 && $defaultzoom == 1) {
		Cookie::Set('zoom', '100', Cookie::Session);	
		$smarty->assign('CURRENTZOOM', "100");	
	}
	$smarty->assign('DISPPICTURE', $config_webcampictures . substr($currenttimestamp, 0,8) . "/" . $currenttimestamp . ".jpg");
	$smarty->assign('DISPPICTURESHORT', $config_webcampicturesshort . substr($currenttimestamp, 0,8) . "/" . $currenttimestamp . ".jpg");
	list($currentpicwidth, $currentpicheight, $currentpictype, $currentpicattr) = getimagesize($config_campictures . substr($currenttimestamp, 0,8) . "/" . $currenttimestamp . ".jpg");
	if (Cookie::Get('zoom') != "" && Cookie::Get('zoom') != "100") {
		$disppicturezoomwidth = round(Cookie::Get('zoom') * $currentpicwidth  / 100, 0);
		$smarty->assign('DISPPICTUREZOOMWIDTH', $disppicturezoomwidth);				
	}
	if (substr($wholetimestamp[$browsecpt - 1], 0,2)== "20" && substr($wholetimestamp[$browsecpt - 1], 6,2) == substr($wholetimestamp[$browsecpt], 6,2)) {	
		$smarty->assign('CALENDARPREVIOUSTIMESTAMP', substr($wholetimestamp[$browsecpt - 1], 0,14));
	}
	if (substr($wholetimestamp[$browsecpt + 1], 0,2)== "20" && substr($wholetimestamp[$browsecpt + 1], 6,2) == substr($wholetimestamp[$browsecpt], 6,2)) {
		$smarty->assign('CALENDARFOLLOWINGTIMESTAMP', substr($wholetimestamp[$browsecpt + 1], 0,14));
	}
	if (substr($wholetimestamp[$browsecpt - 5], 0,2)== "20" && substr($wholetimestamp[$browsecpt - 5], 6,2) == substr($wholetimestamp[$browsecpt], 6,2)) {	
		$smarty->assign('THUMBPICMIN1TIMESTAMP', substr($wholetimestamp[$browsecpt - 5], 0,14));
		$smarty->assign('THUMBPICMIN1', $config_webcampicturesshort . substr($wholetimestamp[$browsecpt - 5], 0,8) . "/" . $wholetimestamp[$browsecpt - 5]);
		$smarty->assign('THUMBPICMIN1TXTHOUR', substr($wholetimestamp[$browsecpt - 5], 8,2));
		$smarty->assign('THUMBPICMIN1TXTMINUTE', substr($wholetimestamp[$browsecpt - 5], 10,2));
	}
	if (substr($wholetimestamp[$browsecpt - 10], 0,2)== "20" && substr($wholetimestamp[$browsecpt - 10], 6,2) == substr($wholetimestamp[$browsecpt], 6,2)) {	
		$smarty->assign('THUMBPICMIN2TIMESTAMP', substr($wholetimestamp[$browsecpt - 10], 0,14));
		$smarty->assign('THUMBPICMIN2', $config_webcampicturesshort . substr($wholetimestamp[$browsecpt - 10], 0,8) . "/" . $wholetimestamp[$browsecpt - 10]);
		$smarty->assign('THUMBPICMIN2TXTHOUR', substr($wholetimestamp[$browsecpt - 10], 8,2));
		$smarty->assign('THUMBPICMIN2TXTMINUTE', substr($wholetimestamp[$browsecpt - 10], 10,2));
	}
	if (substr($wholetimestamp[$browsecpt - 15], 0,2)== "20" && substr($wholetimestamp[$browsecpt - 15], 6,2) == substr($wholetimestamp[$browsecpt], 6,2)) {	
		$smarty->assign('THUMBPICMIN3TIMESTAMP', substr($wholetimestamp[$browsecpt - 15], 0,14));
		$smarty->assign('THUMBPICMIN3', $config_webcampicturesshort . substr($wholetimestamp[$browsecpt - 15], 0,8) . "/" . $wholetimestamp[$browsecpt - 15]);
		$smarty->assign('THUMBPICMIN3TXTHOUR', substr($wholetimestamp[$browsecpt - 15], 8,2));
		$smarty->assign('THUMBPICMIN3TXTMINUTE', substr($wholetimestamp[$browsecpt - 15], 10,2));
	}
	if (substr($wholetimestamp[$browsecpt + 5], 0,2)== "20" && substr($wholetimestamp[$browsecpt + 5], 6,2) == substr($wholetimestamp[$browsecpt], 6,2)) {
		$smarty->assign('THUMBPICPLUS1TIMESTAMP', substr($wholetimestamp[$browsecpt + 5], 0,14));
		$smarty->assign('THUMBPICPLUS1', $config_webcampicturesshort . substr($wholetimestamp[$browsecpt + 5], 0,8) . "/" . $wholetimestamp[$browsecpt + 5]);	
		$smarty->assign('THUMBPICPLUS1TXTHOUR', substr($wholetimestamp[$browsecpt + 5], 8,2));
		$smarty->assign('THUMBPICPLUS1TXTMINUTE', substr($wholetimestamp[$browsecpt + 5], 10,2));
	}
	if (substr($wholetimestamp[$browsecpt + 10], 0,2)== "20" && substr($wholetimestamp[$browsecpt + 10], 6,2) == substr($wholetimestamp[$browsecpt], 6,2)) {
		$smarty->assign('THUMBPICPLUS2TIMESTAMP', substr($wholetimestamp[$browsecpt + 10], 0,14));
		$smarty->assign('THUMBPICPLUS2', $config_webcampicturesshort . substr($wholetimestamp[$browsecpt + 10], 0,8) . "/" . $wholetimestamp[$browsecpt + 10]);	
		$smarty->assign('THUMBPICPLUS2TXTHOUR', substr($wholetimestamp[$browsecpt + 10], 8,2));
		$smarty->assign('THUMBPICPLUS2TXTMINUTE', substr($wholetimestamp[$browsecpt + 10], 10,2));
	}
	if (substr($wholetimestamp[$browsecpt + 15], 0,2)== "20" && substr($wholetimestamp[$browsecpt + 15], 6,2) == substr($wholetimestamp[$browsecpt], 6,2)) {
		$smarty->assign('THUMBPICPLUS3TIMESTAMP', substr($wholetimestamp[$browsecpt + 15], 0,14));
		$smarty->assign('THUMBPICPLUS3', $config_webcampicturesshort . substr($wholetimestamp[$browsecpt + 15], 0,8) . "/" . $wholetimestamp[$browsecpt + 15]);	
		$smarty->assign('THUMBPICPLUS3TXTHOUR', substr($wholetimestamp[$browsecpt + 15], 8,2));
		$smarty->assign('THUMBPICPLUS3TXTMINUTE', substr($wholetimestamp[$browsecpt + 15], 10,2));
	}		
} else {
	if (substr($wholetimestamp[$cptwhole - 1], 0,8) != substr(Cookie::Get('p' . $config_source . 'timestamp'), 0,8)) {
		$smarty->assign('DISPPICTURE', "0");
	} else {
		$smarty->assign('DISPPICTURESHORT', $config_webcampicturesshort . substr($wholetimestamp[$cptwhole - 1], 0,8) . "/" . $wholetimestamp[$cptwhole - 1]);
		list($currentpicwidth, $currentpicheight, $currentpictype, $currentpicattr) = getimagesize($config_campictures . substr($wholetimestamp[$cptwhole - 1], 0,8) . "/" . $wholetimestamp[$cptwhole - 1]);
		if (Cookie::Get('zoom') != "" && Cookie::Get('zoom') != "100") {
			$disppicturezoomwidth = round(Cookie::Get('zoom') * $currentpicwidth  / 100, 0);
			$smarty->assign('DISPPICTUREZOOMWIDTH', $disppicturezoomwidth);				
		}	
	}
	$smarty->assign('CALENDARPREVIOUSTIMESTAMP', "");
	$smarty->assign('CALENDARFOLLOWINGTIMESTAMP', "");
} 

if (is_file($config_campictures . substr($currenttimestamp, 0,8) . "/sensors.txt.png")) {
	$smarty->assign('DISPLAYSENSORS', $config_webcampictures . substr($currenttimestamp, 0,8) . "/sensors.txt.png");
}

$smarty->assign('CALENDARCURRENTMONTH', $currentmonth);
//$smarty->assign('CALENDARPREVIOUSMONTH', date("YmdHis", mktime("0","0","0", $currentmonthnb - 1,$currentday,$currentyear)));
$smarty->assign('CALENDARPREVIOUSMONTH', $calendarpreviousmonth);
$smarty->assign('CALENDARCURRENTYEAR', $currentyear);
//$smarty->assign('CALENDARFOLLOWINGMONTH', date("YmdHis", mktime("0","0","0", $currentmonthnb + 1,$currentday,$currentyear)));
$smarty->assign('CALENDARFOLLOWINGMONTH', $calendarfollowingmonth);

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



if (is_file($config_langdir . "photos.php")) {
	include($config_langdir . "photos.php");
}	

$smarty->assign('DISPLAY', "photos");
$smarty->assign('CENTRAL', 'photos.tpl');
$smarty->display('skeleton.tpl');

?>
