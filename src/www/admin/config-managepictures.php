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

	$smarty->assign('WITODISKSPACE', wito_diskspace($config_campictures));

	if (strip_tags($_GET['submit']) == "1" && strip_tags($_GET['deleteday']) != "" && strip_tags($_GET['deleteday']) > 2000) {
		passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " deletepic ". strip_tags($_GET['deleteday']));
	}

	$cptpicfile = 0;
	$dirresultstmp = scandir($config_campictures);
	$cptpicfiletmp = sizeof($dirresultstmp);
	//print_r($dirresultstmp);
	for ($i=0;$i<$cptpicfiletmp;$i++) {
		if ($dirresultstmp[$i] != '.' && $dirresultstmp[$i] != '..' && substr($dirresultstmp[$i], -4,1) != "." && substr($dirresultstmp[$i], -4,4) != ".jpg" && substr($dirresultstmp[$i], -8,2) == "20") {
	 		//echo "REPERTOIRE JOUR:" . $dirresultstmp[$i] . "<br />";
			if (strip_tags($_GET['submit']) == "1" && strip_tags($_POST[$dirresultstmp[$i]]) == "yes") {
				//echo "delete MULTI - witodelete.sh photos " . substr($dirresultstmp[$i], -18,8) . "<br />";
				passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " deletepic ". $dirresultstmp[$i]);
				//$deletemarkup = substr($dirresultstmp[$i], -18,8);
			} else {
				$subdirresultstmp = scandir($config_campictures . $dirresultstmp[$i] . "/");
				$subcptpicfiletmp = sizeof($subdirresultstmp);
				for ($j=0;$j<$subcptpicfiletmp;$j++) {
					if ($subdirresultstmp[$j] != '.' && $subdirresultstmp[$j] != '..' && substr($subdirresultstmp[$j], -4,4) == ".jpg" && substr($subdirresultstmp[$j], -18,2) == "20") {
						$dirresultssize[$cptpicfile] = $dirresultssize[$cptpicfile] + filesize($config_campictures . $dirresultstmp[$i] . "/" . $subdirresultstmp[$i]);
						$totaldirresultssize = $totaldirresultssize + filesize($config_campictures . $dirresultstmp[$i] . "/" . $subdirresultstmp[$i]);
						$dirresultsnbpic[$cptpicfile]++;
					}	
				}
				$dirresultssize[$cptpicfile] = formatSize($dirresultssize[$cptpicfile]);		
				$dirresultsday[$cptpicfile] = $dirresultstmp[$i];						
				$dirresultsdaytxt[$cptpicfile] = wito_returndate($dirresultsday[$cptpicfile]);		
				$cptpicfile++;
			}
	 	}
	}
	$dirresultssize[$cptpicfile - 1] = formatSize($dirresultssize[$cptpicfile - 1]);
	$totaldirresultssize = formatSize($totaldirresultssize);
	$smarty->assign('CPTPICFILE', $cptpicfile);
	$smarty->assign('PICRESULTSDAY', $dirresultsdaytxt);
	$smarty->assign('PICRESULTSNBFILES', $dirresultsnbpic);
	$smarty->assign('PICRESULTSSIZE', $dirresultssize);
	$smarty->assign('PICRESULTSFILE', $dirresultsday);
	$smarty->assign('TOTALPICRESULTSSIZE', $totaldirresultssize);
	$smarty->assign('TOTALPICRESULTSFILE', $totaldirresultsnbpic);	


if (is_file($config_langdir . "config-managepictures.php")) {
	include($config_langdir . "config-managepictures.php");
}
//$smarty->assign("BODYCONTENT", $smarty->template_dir . "index.tpl");
$smarty->assign('CONFIGPAGE', 'managepictures');
$smarty->assign('CENTRAL', 'config-managepictures.tpl');
$smarty->display('skeleton.tpl');
//$_COOKIE['lasturl'] = "panel.php"browserurl();



?>