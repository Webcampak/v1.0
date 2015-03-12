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


		if (strip_tags($_GET['openvpnstart']) == "1") {
			passthru("sudo /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " openvpnstart");		 		
		}
		if (strip_tags($_GET['openvpnstop']) == "1") {
			passthru("sudo /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " openvpnstop");		 				
		}

		if (strip_tags($_GET['ftpuserscreate']) == "1") {
			$witoparameters["cfgftpresourcespassword"] =  wito_replacechars(strip_tags($_POST['cfgftpresourcespassword']));
			wito_writeconfig($config_etcdirectory . "config-general.cfg", $witoparameters);
			//wito_setconfig($config_etcdirectory . "config-general.cfg", "cfgftpresourcespassword", strip_tags($_POST['cfgftpresourcespassword']));										
			passthru("sudo /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " createftpaccounts");
		}	

		if (strip_tags($_GET['submit']) == "1" && strip_tags($_POST['submitform']) == "1") {
			foreach ($_POST as $confkey=>$confvalue) {
				if (substr($confkey, 0, 3) == "cfg") {
						$witoparameters[strip_tags($confkey)] = strip_tags($confvalue);
				}
			}
			if (strip_tags($_POST["cfggphotoports"]) == "") { $witoparameters["cfggphotoports"] = "no";}
			if (strip_tags($_POST["cfgphidgetactivate"]) == "") { $witoparameters["cfgphidgetactivate"] = "no";}
			if (strip_tags($_POST["cfgstatsactivate"]) == "") { $witoparameters["cfgstatsactivate"] = "no";}			
			wito_writeconfig($config_etcdirectory . "config-general.cfg", $witoparameters);

		}
		
		$webcamboxconfig = wito_getfullconfig($config_etcdirectory . "config-general.cfg");
		foreach ($webcamboxconfig as $readkey=>$readvalue) {
		      $smarty->assign(strtoupper($readkey), $readvalue);
		}
		if ($webcamboxconfig["cfggphotoports"] == "yes") {
			$smarty->assign('CFGGPHOTOPORTS', "checked");
		}
		if ($webcamboxconfig["cfgphidgetactivate"] == "yes") {
			$smarty->assign('CFGPHIDGETACTIVATE', "checked");
		}
		if ($webcamboxconfig["cfgstatsactivate"] == "yes") {
			$smarty->assign('CFGSTATSACTIVATE', "checked");
		}		

		$smarty->assign('DISPOPENVPNSTATUSEXEC', exec('/etc/init.d/openvpn status > /tmp/openvpnstatus'));
		$openvpnstatus = file_get_contents("/tmp/openvpnstatus");
		if (stripos($openvpnstatus, "PID") !== false) {
			$smarty->assign('DISPOPENVPNSTATUS', "0");		
		} else {
			$smarty->assign('DISPOPENVPNSTATUS', "1");		
		}

		$camversion = exec($config_gphotodir . 'gphoto2 -v > /tmp/gphotover');
		$gphotoversion = file_get_contents("/tmp/gphotover");
		$smarty->assign('DISP_GPHOTOVERSION', $gphotoversion);	

		$witouptimes = exec('uptime > /tmp/uptime');
		$witouptime = file_get_contents("/tmp/uptime");		
		$witdisk = exec('df -h > /tmp/disk');		
		$witdisk = file_get_contents("/tmp/disk");		
		$smarty->assign('DISP_DISK', $witdisk);
		$smarty->assign('DISP_UPTIME', $witouptime);
  
		$witolistpes = exec('ps -aux > /tmp/psaux');
		$witolistps = file_get_contents("/tmp/psaux");
		$smarty->assign('DISP_LISTPS', $witolistps);	  

if (is_file($config_langdir . "config-systeme.php")) {
	include($config_langdir . "config-systeme.php");
}
$smarty->assign('CONFIGSYSTEM', '1');
$smarty->assign('CONFIGPAGE', 'systeme');
$smarty->assign('CONFIGSOURCE', '0');
$smarty->assign('CENTRAL', 'config-systeme.tpl');
$smarty->display('skeleton.tpl');

?>
