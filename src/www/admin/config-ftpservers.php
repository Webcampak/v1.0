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
						
		if (strip_tags($_GET['submit']) == "1" && strip_tags($_POST['submitform']) == "1") {
	
			$prewebcamboxconfig = wito_getfullconfig($config_ftpserversconfig);
			for ($i=1;$i<$prewebcamboxconfig["cfgftpserverslistnb"] + 1; $i++) {
				$cfgftpserverslistname = strip_tags($_POST["cfgftpserverslistname-" . $i]);
				$cfgftpserverslisthost = strip_tags($_POST["cfgftpserverslisthost-" . $i]);
				$cfgftpserverslistusername = strip_tags($_POST["cfgftpserverslistusername-" . $i]);
				$cfgftpserverslistpassword = strip_tags($_POST["cfgftpserverslistpassword-" . $i]);
				$cfgftpserverslistdirectory = strip_tags($_POST["cfgftpserverslistdirectory-" . $i]);				
				if (strip_tags($_POST["cfgftpserverslistactive-" . $i]) == "yes") {$cfgftpserverslistactive = "yes";} else {$cfgftpserverslistactive = "no";}
				$witoparametersadd["cfgftpserverslist" . $i] = $cfgftpserverslistname . "\",\"" . $cfgftpserverslisthost . "\",\"" . $cfgftpserverslistusername . "\",\"" . $cfgftpserverslistpassword . "\",\"" . $cfgftpserverslistdirectory . "\",\"" . $cfgftpserverslistactive;

			}
			wito_writeconfig($config_ftpserversconfig, $witoparametersadd);


		}

		$webcamboxconfig = wito_getfullconfig($config_ftpserversconfig);
		foreach ($webcamboxconfig as $readkey=>$readvalue) {
		      $smarty->assign(strtoupper($readkey), $readvalue);
		}
		for ($i=1;$i<$webcamboxconfig["cfgftpserverslistnb"] + 1; $i++) {
			//echo $webcamboxconfig["cfgftpserverslist" . $i] . "-";
			$srcfgparameters = explode(",", $webcamboxconfig["cfgftpserverslist" . $i]);	
			if($srcfgparameters[0][0] == " ") {$scfgftpserverslistname[$i] = substr($srcfgparameters[0],1);} else {$scfgftpserverslistname[$i] = $srcfgparameters[0];}
			if($srcfgparameters[1][0] == " ") {$scfgftpserverslisthost[$i] = substr($srcfgparameters[1],1);} else {$scfgftpserverslisthost[$i] = $srcfgparameters[1];}
			if($srcfgparameters[2][0] == " ") {$scfgftpserverslistusername[$i] = substr($srcfgparameters[2],1);} else {$scfgftpserverslistusername[$i] = $srcfgparameters[2];}
			if($srcfgparameters[3][0] == " ") {$scfgftpserverslistpassword[$i] = substr($srcfgparameters[3],1);} else {$scfgftpserverslistpassword[$i] = $srcfgparameters[3];}
			if($srcfgparameters[4][0] == " ") {$scfgftpserverslistdirectory[$i] = substr($srcfgparameters[4],1);} else {$scfgftpserverslistdirectory[$i] = $srcfgparameters[4];}			
			if($srcfgparameters[5][0] == " ") {$scfgftpserverslistactive[$i] = substr($srcfgparameters[5],1);} else {$scfgftpserverslistactive[$i] = $srcfgparameters[5];}
			#print 	$srcfgsensorinsert[$i] . "<br />";		
			if ($scfgftpserverslistactive[$i] == "yes") {
				$scfgftpserverslistactive[$i] = "checked";
			} else {$scfgftpserverslistactive[$i] = "";}

		}
		$smarty->assign('CFGFTPSERVERSLISTNAME', $scfgftpserverslistname);
		$smarty->assign('CFGFTPSERVERSLISTHOST', $scfgftpserverslisthost);
		$smarty->assign('CFGFTPSERVERSLISTUSERNAME', $scfgftpserverslistusername);
		$smarty->assign('CFGFTPSERVERSLISTPASSWORD', $scfgftpserverslistpassword);
		$smarty->assign('CFGFTPSERVERSLISTDIRECTORY', $scfgftpserverslistdirectory);
		$smarty->assign('CFGFTPSERVERSLISTACTIVE', $scfgftpserverslistactive);


if (is_file($config_langdir . "config-ftpservers.php")) {
	include($config_langdir . "config-ftpservers.php");
}
//$smarty->assign("BODYCONTENT", $smarty->template_dir . "index.tpl");
$smarty->assign('CONFIGPAGE', 'ftpservers');
$smarty->assign('CENTRAL', 'config-ftpservers.tpl');
$smarty->display('skeleton.tpl');
//$_COOKIE['lasturl'] = "panel.php"browserurl();



?>
