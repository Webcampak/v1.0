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

	if (strip_tags($_GET['ftpuserscreate']) == "1") {
			$witoparameters["cfglocalftppass"] =  wito_replacechars(strip_tags($_POST['cfglocalftppass']));
			wito_writeconfig($config_witoconfig, $witoparameters);
			//wito_setconfig($config_witoconfig, "cfglocalftppass", wito_replacechars(strip_tags($_POST['cfglocalftppass'])));
			passthru("sudo /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " createftpaccounts");
	}	
		if (strip_tags($_GET['submit']) == "1") {
			if (strip_tags($_POST['postinitconfcs']) == "yes"){
				$smarty->assign('POSTINITCONF', 'Réinitialisation de la configuration en cours ...');
				passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " initconfsources");		 	
				$smarty->assign('POSTINITCONFCS', 'Réinitialisation source ' . $config_source . ' ... OK');
			}
			 if (strip_tags($_POST['postinitcontentcs']) == "yes"){
			 	$smarty->assign('POSTINITCONTENT', 'Suppression des images et vidéos en cours ...');
				passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " initcontent");		
				$smarty->assign('POSTINITCONTENTCS', 'Réinitialisation source  ' . $config_source . ' ... OK'); 		 
			 }			
		}	

						
		if (strip_tags($_GET['submit']) == "1" && strip_tags($_POST['submitform']) == "1") {

			foreach ($_POST as $confkey=>$confvalue) {
				if (substr($confkey, 0, 3) == "cfg") {
					$witoparameters[strip_tags($confkey)] = strip_tags($confvalue);
				}
			}
			if (strip_tags($_POST["cfgemailsmtpauth"]) == "") { $witoparameters["cfgemailsmtpauth"] = "no";}
			if (strip_tags($_POST["cfgemailsmtpstartttls"]) == "") { $witoparameters["cfgemailsmtpstartttls"] = "no";}
			if (strip_tags($_POST["cfgphidgeterroractivate"]) == "") { $witoparameters["cfgphidgeterroractivate"] = "no";}
			if (strip_tags($_POST["cfgphidgetsensorsgraph"]) == "") { $witoparameters["cfgphidgetsensorsgraph"] = "no";}
			if (strip_tags($_POST["cfguploadphidget"]) == "") { $witoparameters["cfguploadphidget"] = "no";}
			wito_writeconfig($config_witoconfig, $witoparameters);
	
			$prewebcamboxconfig = wito_getfullconfig($config_witoconfig);
			for ($i=1;$i<$prewebcamboxconfig["cfgphidgetsensornb"] + 1; $i++) {
				$subsrcfgsensortype = strip_tags($_POST["srcfgsensortype-" . $i]);
				$subsrcfgsensorport = strip_tags($_POST["srcfgsensorport-" . $i]);
				$subsrcfgsensortext = strip_tags($_POST["srcfgsensortext-" . $i]);
				$subsrcfgsensorcolor = strip_tags($_POST["srcfgsensorcolor-" . $i]);
				if (strip_tags($_POST["srcfgsensorinsert-" . $i]) == "yes") {$subsrcfgsensorinsert = "yes";} else {$subsrcfgsensorinsert = "no";}
				$subsrcfgsensorsize = strip_tags($_POST["srcfgsensorsize-" . $i]);
				$subsrcfgsensortransparency = strip_tags($_POST["srcfgsensortransparency-" . $i]);
				$subsrcfgsensorposx = strip_tags($_POST["srcfgsensorposx-" . $i]);
				$subsrcfgsensorposy = strip_tags($_POST["srcfgsensorposy-" . $i]);
				$witoparametersadd["cfgphidgetsensor" . $i] = $subsrcfgsensortype . "\",\"" . $subsrcfgsensorport . "\",\"" . $subsrcfgsensortext . "\",\"" . $subsrcfgsensorcolor;
				$witoparametersadd["cfgphidgetsensorinsert" . $i] = $subsrcfgsensorinsert . "\",\"" . $subsrcfgsensorsize . "\",\"" . $subsrcfgsensortransparency . "\",\"" . $subsrcfgsensorposx . "\",\"" . $subsrcfgsensorposy;

			}
			wito_writeconfig($config_witoconfig, $witoparametersadd);


		}
		if (strip_tags($_GET['upload']) == "1") { 
			if ($_FILES['configupload']['error'] == UPLOAD_ERR_OK) {
				move_uploaded_file($_FILES['configupload']['tmp_name'], $config_etcdirectory. "config-source" . $config_source . ".zip");
				$unzipfiles = unzip($config_etcdirectory. "config-source" . $config_source . ".zip", $config_etcdirectory, true, $config_source);
				if ($unzipfiles != FALSE) {
					$smarty->assign('UPLOADSUCCESSFUL', 'YES');
				}
			}
		}
		$webcamboxconfig = wito_getfullconfig($config_witoconfig);
		foreach ($webcamboxconfig as $readkey=>$readvalue) {
		      $smarty->assign(strtoupper($readkey), $readvalue);
		}
		if ($webcamboxconfig["cfgemailsmtpauth"] == "yes") {
			$smarty->assign('CFGEMAILSMTPAUTH', "checked");
		}
		if ($webcamboxconfig["cfgemailsmtpstartttls"] == "yes") {
			$smarty->assign('CFGEMAILSMTPSTARTTTLS', "checked");
		}
		if ($webcamboxconfig["cfgphidgeterroractivate"] == "yes") {
			$smarty->assign('CFGPHIDGETERRORACTIVATE', "checked");
		}
		if ($webcamboxconfig["cfgphidgetsensorsgraph"] == "yes") {
			$smarty->assign('CFGPHIDGETSENSORSGRAPH', "checked");
		}
		if ($webcamboxconfig["cfguploadphidget"] == "yes") {
			$smarty->assign('CFGUPLOADPHIDGET', "checked");
		}
		for ($i=1;$i<$webcamboxconfig["cfgphidgetsensornb"] + 1; $i++) {
			$srcfgparameters = explode(",", $webcamboxconfig["cfgphidgetsensor" . $i]);
			if($srcfgparameters[0][0] == " ") {$srcfgsensortype[$i] = substr($srcfgparameters[0],1);} else {$srcfgsensortype[$i] = $srcfgparameters[0];}
			if($srcfgparameters[1][0] == " ") {$srcfgsensorport[$i] = substr($srcfgparameters[1],1);} else {$srcfgsensorport[$i] = $srcfgparameters[1];}
			if($srcfgparameters[2][0] == " ") {$srcfgsensortext[$i] = substr($srcfgparameters[2],1);} else {$srcfgsensortext[$i] = $srcfgparameters[2];}
			if($srcfgparameters[3][0] == " ") {$srcfgsensorcolor[$i] = substr($srcfgparameters[3],1);} else {$srcfgsensorcolor[$i] = $srcfgparameters[3];}
			
			$srcfgparameters = explode(",", $webcamboxconfig["cfgphidgetsensorinsert" . $i]);
			if($srcfgparameters[0][0] == " ") {$srcfgsensorinsert[$i] = substr($srcfgparameters[0],1);} else {$srcfgsensorinsert[$i] = $srcfgparameters[0];}
			if ($srcfgsensorinsert[$i] == "yes") {
				$srcfgsensorinsert[$i] = "checked";
			} else {$srcfgsensorinsert[$i] = "";}
			if($srcfgparameters[1][0] == " "){$srcfgsensorsize[$i] = substr($srcfgparameters[1],1);} else {$srcfgsensorsize[$i] = $srcfgparameters[1];}
			if($srcfgparameters[2][0] == " "){$srcfgsensortransparency[$i] = substr($srcfgparameters[2],1);} else {$srcfgsensortransparency[$i] = $srcfgparameters[2];}
			if($srcfgparameters[3][0] == " "){$srcfgsensorposx[$i] = substr($srcfgparameters[3],1);} else {$srcfgsensorposx[$i] = $srcfgparameters[3];}
			if($srcfgparameters[4][0] == " "){$srcfgsensorposy[$i] = substr($srcfgparameters[4],1);} else {$srcfgsensorposy[$i] = $srcfgparameters[4];}
			
			if ($srcfgsensorport[$i] == "no") {$srcfgsensorport[$i] = "disabled";}
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


if (is_file($config_langdir . "config-avance.php")) {
	include($config_langdir . "config-avance.php");
}
//$smarty->assign("BODYCONTENT", $smarty->template_dir . "index.tpl");
$smarty->assign('CONFIGPAGE', 'avance');
$smarty->assign('CENTRAL', 'config-avance.tpl');
$smarty->display('skeleton.tpl');
//$_COOKIE['lasturl'] = "panel.php"browserurl();



?>
