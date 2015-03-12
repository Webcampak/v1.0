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
  
		if (is_file($config_logdirectory . "capture-" . $config_source . ".log")) {		
			$displayphotolog = file_get_contents($config_logdirectory . "capture-" . $config_source . ".log");
			$smarty->assign('DISP_LOGSPHOTOS', $displayphotolog);
		}
		if (is_file($config_logdirectory . "video-" . $config_source . "-daily.log")) {	
			$displayvideolog = file_get_contents($config_logdirectory . "video-" . $config_source . "-daily.log");
			$smarty->assign('DISP_LOGSVIDEOSDAILY', $displayvideolog);	
		}
		if (is_file($config_logdirectory . "video-" . $config_source . "-custom.log")) {	
			$displayvideolog = file_get_contents($config_logdirectory . "video-" . $config_source . "-custom.log");
			$smarty->assign('DISP_LOGSVIDEOSCUSTOM', $displayvideolog);	
		}
		if (is_file($config_logdirectory . "video-" . $config_source . "-post.log")) {	
			$displayvideolog = file_get_contents($config_logdirectory . "video-" . $config_source . "-post.log");
			$smarty->assign('DISP_LOGSVIDEOSPOST', $displayvideolog);	
		}	
		if (strip_tags($_GET['submit']) == "1" && strip_tags($_POST['submitform']) == "1") {
			$witoparameters["cfgdebugprolong"] =  wito_replacechars(strip_tags($_POST['cfgdebugprolong']));
			if (strip_tags($_POST["cfgdebugprolong"]) == "") { $witoparameters["cfgdebugprolong"] = "no";}
			wito_writeconfig($config_witoconfig, $witoparameters);
		}
				
		$webcamboxconfig = wito_getfullconfig($config_witoconfig);
		if ($webcamboxconfig["cfgdebugprolong"] == "yes") {
			$smarty->assign('CFGDEBUGPROLONG', "checked");
		}	


if (is_file($config_langdir . "config-logs.php")) {
	include($config_langdir . "config-logs.php");
}
//$smarty->assign("BODYCONTENT", $smarty->template_dir . "index.tpl");
$smarty->assign('CONFIGPAGE', 'logs');
$smarty->assign('CENTRAL', 'config-logs.tpl');
$smarty->display('skeleton.tpl');
//$_COOKIE['lasturl'] = "panel.php"browserurl();



?>
