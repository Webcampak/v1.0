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
  
	if (strip_tags($_GET['captureftp']) == "1") {
		//Lancer la capture de l'image, si la source est ipcam on ne capture pas
		//$webcamboxconfig["cfgsourcetype")
		$webcamboxconfig = wito_getfullconfig($config_witoconfig);		
		if ($webcamboxconfig["cfgsourcetype"] == "ipcam" && strip_tags($_POST['ftptest']) == "sampleftp" ) {
			$dispftpcapture = "Capture non compatible avec ce mode";
		} else {
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " " . strip_tags($_POST['ftptest']));
			$dispftpcapture = file_get_contents("/tmp/ftpcapture");
		}
		$smarty->assign('DISPFTPCAPTURE', $dispftpcapture);	
		//$smarty->assign('DSIPLAYCAPTURE', '1' );
	}
	if (strip_tags($_GET['ftpuserscreate']) == "1") {
			$witoparameters["cfglocalftppass"] =  wito_replacechars(strip_tags($_POST['cfglocalftppass']));
			wito_writeconfig($config_witoconfig, $witoparameters);
			//wito_setconfig($config_witoconfig, "cfglocalftppass", wito_replacechars(strip_tags($_POST['cfglocalftppass'])));
			passthru("sudo /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " createftpaccounts");
	}	

		if (strip_tags($_GET['submit']) == "1" && strip_tags($_POST['submitform']) == "1") {
			foreach ($_POST as $confkey=>$confvalue) {
				if (substr($confkey, 0, 3) == "cfg") {
					$witoparameters[strip_tags($confkey)] = strip_tags($confvalue);
				}
			}
			if (strip_tags($_POST["cfgftpactive"]) == "") { $witoparameters["cfgftpactive"] = "no";}
			if (strip_tags($_POST["cfgftpcache"]) == "") { $witoparameters["cfgftpcache"] = "no";}
			if (strip_tags($_POST["cfgsecondftpactivate"]) == "") { $witoparameters["cfgsecondftpactivate"] = "no";}
			if (strip_tags($_POST["cfgsecondftpactive"]) == "") { $witoparameters["cfgsecondftpactive"] = "no";}
			if (strip_tags($_POST["cfghotlinkftpcache"]) == "") { $witoparameters["cfghotlinkftpcache"] = "no";}
			if (strip_tags($_POST["cfghotlinkftpactive"]) == "") { $witoparameters["cfghotlinkftpactive"] = "no";}
			if (strip_tags($_POST["cfguploadarchives"]) == "") { $witoparameters["cfguploadarchives"] = "no";}
			if (strip_tags($_POST["cfguploadhotlink"]) == "") { $witoparameters["cfguploadhotlink"] = "no";}
			if (strip_tags($_POST["cfgvideoaviupload"]) == "") { $witoparameters["cfgvideoaviupload"] = "no";}
			if (strip_tags($_POST["cfgvideoflvupload"]) == "") { $witoparameters["cfgvideoflvupload"] = "no";}
			wito_writeconfig($config_witoconfig, $witoparameters);
		}	
		//$smarty->assign('CFGFTPCACHE', $webcamboxconfig["cfgftpcache"]);
		
		//Chargement config
		$webcamboxconfig = wito_getfullconfig($config_witoconfig);
		foreach ($webcamboxconfig as $readkey=>$readvalue) {
		      $smarty->assign(strtoupper($readkey), $readvalue);
		}
		if ($webcamboxconfig["cfghotlinkftpactive"] == "yes") {
			$smarty->assign('CFGHOTLINKFTPACTIVE', "checked");
		}					
		if ($webcamboxconfig["cfgftpactive"] == "yes") {
			$smarty->assign('CFGFTPACTIVE', "checked");
		}	
		if ($webcamboxconfig["cfgsecondftpactivate"] == "yes") {
			$smarty->assign('CFGSECONDFTPACTIVATE', "checked");
		}
		if ($webcamboxconfig["cfgsecondftpactive"] == "yes") {
			$smarty->assign('CFGSECONDFTPACTIVE', "checked");
		}
		if ($webcamboxconfig["cfguploadhotlink"] == "yes") {
			$smarty->assign('CFGUPLOADHOTLINK', "checked");
		}	
		if ($webcamboxconfig["cfguploadarchives"] == "yes") {
			$smarty->assign('CFGUPLOADARCHIVE', "checked");
		}		
		if ($webcamboxconfig["cfgvideoaviupload"] == "yes") {
			$smarty->assign('CFGVIDEOAVIUPLOAD', "checked");
		}
		if ($webcamboxconfig["cfgvideoflvupload"] == "yes") {
			$smarty->assign('CFGVIDEOFLVUPLOAD', "checked");
		}
		if ($webcamboxconfig["cfgnocapture"] == "yes") {
			$smarty->assign('CFGNOCAPTURE', "checked");
		}			

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


if (is_file($config_langdir . "config-ftp.php")) {
	include($config_langdir . "config-ftp.php");
}
//$smarty->assign("BODYCONTENT", $smarty->template_dir . "index.tpl");
$smarty->assign('CONFIGPAGE', 'ftp');
$smarty->assign('CENTRAL', 'config-ftp.tpl');
$smarty->display('skeleton.tpl');
//$_COOKIE['lasturl'] = "panel.php"browserurl();



?>
