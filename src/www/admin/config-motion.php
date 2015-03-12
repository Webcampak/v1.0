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
require("include/zip.lib.php");


$configsection = strip_tags($_GET['section']);
$smarty->assign('CONFIGSECTION', $configsection);

			//passthru("sudo /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " initconfsources");		 	
		 	//$smarty->assign('POSTINITCONFS1', 'Réinitialisation source 4 ... OK');

		if (strip_tags($_GET['motionstart']) == "1") {
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " motionstart");		 		
		}
		if (strip_tags($_GET['motionstop']) == "1") {
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " motionstop");		 				
		}
						
		if (strip_tags($_GET['submit']) == "1" && strip_tags($_POST['submitform']) == "1") {
			foreach ($_POST as $confkey=>$confvalue) {
				if (substr($confkey, 0, 3) == "cfg") {
					$witoparameters[strip_tags($confkey)] = strip_tags($confvalue);
				}
			}
			if (strip_tags($_POST["cfgmotiondetectionactivate"]) == "") { $witoparameters["cfgmotiondetectionactivate"] = "no";}
			if (strip_tags($_POST["cfgmotiondetectiononly"]) == "") { $witoparameters["cfgmotiondetectiononly"] = "no";}
			wito_writeconfig($config_witoconfig, $witoparameters);
	
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " motionsetup");
				
		}

		$webcamboxconfig = wito_getfullconfig($config_witoconfig);
		foreach ($webcamboxconfig as $readkey=>$readvalue) {
		      $smarty->assign(strtoupper($readkey), $readvalue);
		}
		if ($webcamboxconfig["cfgmotiondetectionactivate"] == "yes") {
			$smarty->assign('CFGMOTIONDETECTIONACTIVATE', "checked");
		}
		if ($webcamboxconfig["cfgmotiondetectiononly"] == "yes") {
			$smarty->assign('CFGMOTIONDETECTIONONLY', "checked");
		}		

		passthru("sudo /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " motionstatus");		 		
		$smarty->assign('DISPMOTIONSTATUS', file_get_contents("/tmp/motionstatus"));

$cptwatermark = 0;
$watermarkdir = opendir($config_watermarkdirectory); 
while ($listwatermarkfile = readdir($watermarkdir)) {
   if(is_file($config_watermarkdirectory.$listwatermarkfile) && substr($listwatermarkfile, -4,4) == ".pgm") {
      //echo "Nom : ".$listwatermarkfile . "<br />";
      $watermarkfiles[$cptwatermark] = $listwatermarkfile;
      $cptwatermark++;
   }
} 
closedir($watermarkdir);
$smarty->assign('CPTWATERMARKFILES', $cptwatermark);
$smarty->assign('WATERMARKFILES', $watermarkfiles);


if (is_file($config_langdir . "config-motion.php")) {
	include($config_langdir . "config-motion.php");
}
//$smarty->assign("BODYCONTENT", $smarty->template_dir . "index.tpl");
$smarty->assign('CONFIGPAGE', 'motion');
$smarty->assign('CENTRAL', 'config-motion.tpl');
$smarty->display('skeleton.tpl');
//$_COOKIE['lasturl'] = "panel.php"browserurl();



?>
