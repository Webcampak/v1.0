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


	$webcamboxconfig = wito_getfullconfig($config_witoconfig);
	$cfg_basedir = $webcamboxconfig["cfgbasedir"];
	$cfg_pictdir = $webcamboxconfig["cfgpictdir"];
	$cfg_videodir = $webcamboxconfig["cfgvideodir"];
	$cfg_logdir = $webcamboxconfig["cfglogdir"];

	$smarty->assign('WITODISKSPACE', wito_diskspace($config_cambase));

	if (strip_tags($_GET['submit']) == "1" && strip_tags($_GET['deletevid']) != "") {
		$vidtodelete = strip_tags($_GET['deletevid']);
		//echo "delete - witodelete.sh videos " . $vidtodelete . "<br />";
		passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " deletevid ". $vidtodelete);
	}

	if (strip_tags($_GET['submit']) == "1" && strip_tags($_GET['deleteday']) != "") {
		$daytodelete = strip_tags($_GET['deleteday']);
		//echo "delete - witodelete.sh videos " . $vidtodelete . "<br />";
		passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " deletevidday ". $daytodelete);
	}	

	$cptvidfile = 0;
	$dirresultstmp = scandir($config_camvideos);
	$cptvidfiletmp = sizeof($dirresultstmp);
	for ($i=0;$i<$cptvidfiletmp;$i++) {
	 if ($dirresultstmp[$i] != '.' && $dirresultstmp[$i] != '..' && (substr($dirresultstmp[$i], -4,4) == ".avi" || substr($dirresultstmp[$i], -4,4) == ".flv" || substr($dirresultstmp[$i], -4,4) == ".mp4" || substr($dirresultstmp[$i], -4,4) == ".wmv" || substr($dirresultstmp[$i], -4,4) == ".mpeg") && substr($dirresultstmp[$i], 0,2) == "20") {
			$tmpfile = substr($dirresultstmp[$i], 0,8);
			//str_replace(".", "", $dirresultstmp[$i]);
			//echo $dirresultstmp[$i] . " - " . $_POST[$tmpfile] . " - " . substr($dirresultstmp[$i], -16,8) . "<br />";
			if (strip_tags($_GET['submit']) == "1" && strip_tags($_POST[$tmpfile]) == "yes") {
				//delete 
				//echo "delete - witodelete.sh videos " . $dirresultstmp[$i] . "<br />";
				passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " deletevidday ". $dirresultstmp[$i]);
			} else {	
				//echo "test";			20100101.avi

				$tmpdirresults = substr($dirresultstmp[$i], 0,8);			
				if ($cptvidfile == 0) {
					$cptvidfile = 1;
				} else {
					if (array_search($tmpdirresults, $dirresultsvidglobaldate) == FALSE) {
						$cptvidfile = count($dirresultsvidglobaldate) + 1;
						$alreadydone = 0;
					}else {
						$cptvidfile = array_search($tmpdirresults, $dirresultsvidglobaldate);
						$alreadydone = 1;
					}
				}
				if ($alreadydone != 1) {
				$dirresultsvidglobaldate[$cptvidfile] = $tmpdirresults;
				$dirresultsvidglobaldatetxt[$cptvidfile] = wito_returndate($tmpdirresults);
				if (is_file($config_camvideos . $tmpdirresults . ".1080p.avi")) { 
					$dirresultsvidcontent[$cptvidfile][0][1] = $tmpdirresults . ".1080p.avi"; 
					$dirresultsvidcontent[$cptvidfile][0][2] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".1080p.avi")); 				
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".1080p.avi");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".1080p.flv")) { 
					$dirresultsvidcontent[$cptvidfile][0][3] = $tmpdirresults . ".1080p.flv"; 
					$dirresultsvidcontent[$cptvidfile][0][4] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".1080p.flv")); 
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".1080p.flv");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".720p.avi")) { 
					$dirresultsvidcontent[$cptvidfile][1][1] = $tmpdirresults . ".720p.avi"; 
					$dirresultsvidcontent[$cptvidfile][1][2] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".720p.avi")); 				
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".720p.avi");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".720p.flv")) { 
					$dirresultsvidcontent[$cptvidfile][1][3] = $tmpdirresults . ".720p.flv"; 
					$dirresultsvidcontent[$cptvidfile][1][4] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".720p.flv")); 
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".720p.flv");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".480p.avi")) { 
					$dirresultsvidcontent[$cptvidfile][2][1] = $tmpdirresults . ".480p.avi"; 
					$dirresultsvidcontent[$cptvidfile][2][2] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".480p.avi")); 				
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".480p.avi");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".480p.flv")) { 
					$dirresultsvidcontent[$cptvidfile][2][3] = $tmpdirresults . ".480p.flv"; 
					$dirresultsvidcontent[$cptvidfile][2][4] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".480p.flv")); 
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".480p.flv");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".H264-custom.avi")) { 
					$dirresultsvidcontent[$cptvidfile][3][1] = $tmpdirresults . ".H264-custom.avi"; 
					$dirresultsvidcontent[$cptvidfile][3][2] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".H264-custom.avi")); 				
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".H264-custom.avi");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".H264-custom.flv")) { 
					$dirresultsvidcontent[$cptvidfile][3][3] = $tmpdirresults . ".H264-custom.flv"; 
					$dirresultsvidcontent[$cptvidfile][3][4] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".H264-custom.flv")); 
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".H264-custom.flv");
				}				
				if (is_file($config_camvideos . $tmpdirresults . ".mpeg2-dvd.avi")) { 
					$dirresultsvidcontent[$cptvidfile][4][1] = $tmpdirresults . ".mpeg2-dvd.avi"; 
					$dirresultsvidcontent[$cptvidfile][4][2] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".mpeg2-dvd.avi")); 				
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".mpeg2-dvd.avi");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".mpeg2-dvd.flv")) { 
					$dirresultsvidcontent[$cptvidfile][4][3] = $tmpdirresults . ".mpeg2-dvd.flv"; 
					$dirresultsvidcontent[$cptvidfile][4][4] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".mpeg2-dvd.flv")); 
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".mpeg2-dvd.flv");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".xvid.avi")) { 
					$dirresultsvidcontent[$cptvidfile][5][1] = $tmpdirresults . ".xvid.avi"; 
					$dirresultsvidcontent[$cptvidfile][5][2] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".xvid.avi")); 				
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".xvid.avi");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".xvid.flv")) { 
					$dirresultsvidcontent[$cptvidfile][5][3] = $tmpdirresults . ".xvid.flv"; 
					$dirresultsvidcontent[$cptvidfile][5][4] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".xvid.flv")); 
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".xvid.flv");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".mobile.mp4")) { 
					$dirresultsvidcontent[$cptvidfile][6][1] = $tmpdirresults . ".mobile.mp4"; 
					$dirresultsvidcontent[$cptvidfile][6][2] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".mobile.mp4")); 				
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".mobile.mp4");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".mobile.flv")) { 
					$dirresultsvidcontent[$cptvidfile][6][3] = $tmpdirresults . ".mobile.flv"; 
					$dirresultsvidcontent[$cptvidfile][6][4] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".mobile.flv")); 
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".mobile.flv");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".custom.mpeg")) { 
					$dirresultsvidcontent[$cptvidfile][7][1] = $tmpdirresults . ".custom.mpeg"; 
					$dirresultsvidcontent[$cptvidfile][7][2] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".custom.mpeg")); 				
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".custom.mpeg");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".custom.flv")) { 
					$dirresultsvidcontent[$cptvidfile][7][3] = $tmpdirresults . ".mpegcustom.flv"; 
					$dirresultsvidcontent[$cptvidfile][7][4] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".custom.flv")); 
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".custom.flv");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".custom.wmv")) { 
					$dirresultsvidcontent[$cptvidfile][8][1] = $tmpdirresults . ".custom.wmv"; 
					$dirresultsvidcontent[$cptvidfile][8][2] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".custom.wmv")); 				
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".custom.wmv");
				}
				if (is_file($config_camvideos . $tmpdirresults . ".custom.flv")) { 
					$dirresultsvidcontent[$cptvidfile][8][3] = $tmpdirresults . ".wmv2custom.flv"; 
					$dirresultsvidcontent[$cptvidfile][8][4] = formatSizeSmall(filesize($config_camvideos . $tmpdirresults . ".custom.flv")); 
					$dirresultsvidglobalsize[$cptvidfile] = $dirresultsvidglobalsize[$cptvidfile] + filesize($config_camvideos . $tmpdirresults . ".custom.flv");
				}
				}
			}	
	 }
	}
	//$totaldirresultssize = formatSizeSmall($totaldirresultssize);
	for ($i=1;$i<$cptvidfile+1;$i++) {	
		$dirresultsvidglobalsize[$i] = formatSizeSmall($dirresultsvidglobalsize[$i]);
	}
	$smarty->assign('CPTVIDFILE', $cptvidfile);
	$smarty->assign('VIDRESULTSGLOBALDATE', $dirresultsvidglobaldate);
	$smarty->assign('VIDRESULTSGLOBALDATETXT', $dirresultsvidglobaldatetxt);
	$smarty->assign('VIDRESULTSGLOBALDSIZE', $dirresultsvidglobalsize);		
	$smarty->assign('VIDRESULTSCONTENT', $dirresultsvidcontent);	
	$smarty->assign('CPTCODECS', 9);



if (is_file($config_langdir . "config-managevideos.php")) {
	include($config_langdir . "config-managevideos.php");
}
//$smarty->assign("BODYCONTENT", $smarty->template_dir . "index.tpl");
$smarty->assign('CONFIGPAGE', 'managevideos');
$smarty->assign('CENTRAL', 'config-managevideos.tpl');
$smarty->display('skeleton.tpl');
//$_COOKIE['lasturl'] = "panel.php"browserurl();



?>