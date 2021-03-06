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

		$smarty->assign('DISP_GPHOTOCAMERAS', exec($config_gphotodir . 'gphoto2 --auto-detect > /tmp/gphotocam'));
		$gphotocam = file_get_contents("/tmp/gphotocam");
		$smarty->assign('DISP_GPHOTOAUTODETECT', $gphotocam);
		passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " gphoto2usbports");
		if (is_file("/tmp/gphoto2ports")) {
			$fd = @fopen("/tmp/gphoto2ports","r");	
			$cptports=0;
	   	while (!feof($fd)) {	
				$ligne = fgets($fd, 1024);
		     	if (!feof($fd)) {
		     		if ($ligne != "") {
							$camcapabilities = exec($config_gphotodir . "gphoto2 --port " . trim($ligne) . " --abilities > /tmp/gphotoabilities");
							passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . trim($ligne) . " getowner");
							//$camowner = exec($config_gphotodir . "gphoto2 --port " . trim($ligne) . " --get-config=/main/settings/ownername >> /tmp/gphotoabilities");
		       			$gphotoabilities[$cptports] = file_get_contents("/tmp/gphotoabilities");
		       			unlink("/tmp/gphotoabilities");
		       			$cptports++;
		       		}
		        }
			}
			fclose($fd);
			$smarty->assign('CPTGPHOTOPORTS', $cptports);
			$smarty->assign('GPHOTOABILITIES', $gphotoabilities);					
		}  		
		
		
		
		//$camcapabilities = exec($config_gphotodir . 'gphoto2 --abilities > /tmp/gphotoabi');
		//$gphotoabi = file_get_contents("/tmp/gphotoabi");
		//$smarty->assign('DISP_GPHOTOABILITIES', $gphotoabi);	
		$camcapabilities = exec('lsusb > /tmp/lsusb');
		$scanlsusb = file_get_contents("/tmp/lsusb");
		$smarty->assign('DISP_LSUSB', $scanlsusb);
		//$camcapabilities = exec('xawtv -hwscan');
		passthru("sudo /usr/bin/php -f " . $config_bindirectory . "server.php -- 1 v4l");
		//$camcapabilities = exec('v4l-info > /tmp/v4linfo');
		$scanv4l = file_get_contents("/tmp/v4linfo0");
		$smarty->assign('DISP_V4L0', $scanv4l);	
		$scanv4l = file_get_contents("/tmp/v4linfo1");
		$smarty->assign('DISP_V4L1', $scanv4l);
		$scanv4l = file_get_contents("/tmp/v4linfo2");
		$smarty->assign('DISP_V4L2', $scanv4l);
		$scanv4l = file_get_contents("/tmp/v4linfo3");
		$smarty->assign('DISP_V4L3', $scanv4l);
		$scanv4l = file_get_contents("/tmp/v4linfo4");
		$smarty->assign('DISP_V4L4', $scanv4l);
		$scanv4l = file_get_contents("/tmp/v4linfo5");
		$smarty->assign('DISP_V4L5', $scanv4l);
		$scanv4l = file_get_contents("/tmp/v4linfo6");
		$smarty->assign('DISP_V4L6', $scanv4l);
		$scanv4l = file_get_contents("/tmp/v4linfo7");
		$smarty->assign('DISP_V4L7', $scanv4l);
		$scanv4l = file_get_contents("/tmp/v4linfo8");
		$smarty->assign('DISP_V4L8', $scanv4l);
		$scanv4l = file_get_contents("/tmp/v4linfo9");
		$smarty->assign('DISP_V4L9', $scanv4l);
		$scanv4l = file_get_contents("/tmp/v4linfo10");
		$smarty->assign('DISP_V4L10', $scanv4l);

		if (is_file("/tmp/v4lctl0")) {
			$scanv4lctl = file_get_contents("/tmp/v4lctl0");
			$smarty->assign('DISP_V4LCTL0', $scanv4lctl);	
		}
		if (is_file("/tmp/v4lctl1")) {		
			$scanv4lctl = file_get_contents("/tmp/v4lctl1");
			$smarty->assign('DISP_V4LCTL1', $scanv4lctl);
		}
		if (is_file("/tmp/v4lctl2")) {				
			$scanv4lctl = file_get_contents("/tmp/v4lctl2");
			$smarty->assign('DISP_V4LCTL2', $scanv4lctl);
		}
		if (is_file("/tmp/v4lctl3")) {		
			$scanv4lctl = file_get_contents("/tmp/v4lctl3");
			$smarty->assign('DISP_V4LCTL3', $scanv4lctl);
		}
		if (is_file("/tmp/v4lctl4")) {	
			$scanv4lctl = file_get_contents("/tmp/v4lctl4");
			$smarty->assign('DISP_V4LCTL4', $scanv4lctl);
		}
		if (is_file("/tmp/v4lctl5")) {		
			$scanv4lctl = file_get_contents("/tmp/v4lctl5");
			$smarty->assign('DISP_V4LCTL5', $scanv4lctl);
		}
		if (is_file("/tmp/v4lctl6")) {
			$scanv4lctl = file_get_contents("/tmp/v4lctl6");
			$smarty->assign('DISP_V4LCTL6', $scanv4lctl);
		}
		if (is_file("/tmp/v4lctl7")) {
			$scanv4lctl = file_get_contents("/tmp/v4lctl7");
			$smarty->assign('DISP_V4LCTL7', $scanv4lctl);
		}
		if (is_file("/tmp/v4lctl8")) {
			$scanv4lctl = file_get_contents("/tmp/v4lctl8");
			$smarty->assign('DISP_V4LCTL8', $scanv4lctl);
		}
		if (is_file("/tmp/v4lctl9")) {
			$scanv4lctl = file_get_contents("/tmp/v4lctl9");
			$smarty->assign('DISP_V4LCTL9', $scanv4lctl);
		}
		if (is_file("/tmp/v4lctl10")) {
			$scanv4lctl = file_get_contents("/tmp/v4lctl10");
			$smarty->assign('DISP_V4LCTL10', $scanv4lctl);
		}
	
if (is_file($config_langdir . "config-appareils.php")) {
	include($config_langdir . "config-appareils.php");
}	
$smarty->assign('CONFIGSYSTEM', '1');
$smarty->assign('CONFIGPAGE', 'appareils');
$smarty->assign('CONFIGSOURCE', '0');
$smarty->assign('CENTRAL', 'config-appareils.tpl');
$smarty->display('skeleton.tpl');
//$_COOKIE['lasturl'] = "panel.php"browserurl();



?>