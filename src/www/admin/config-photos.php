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

		// WRITE CONFIG
		if (strip_tags($_GET['submit']) == "1" && strip_tags($_POST['submitform']) == "1") {
			foreach ($_POST as $confkey=>$confvalue) {
				if (substr($confkey, 0, 3) == "cfg") {
						$witoparameters[strip_tags($confkey)] = strip_tags($confvalue);
				}
			}
			if (strip_tags($_POST["cfgimagemagicktxt"]) == "") { $witoparameters["cfgimagemagicktxt"] = "no";}
			if (strip_tags($_POST["cfgpicwatermarkactivate"]) == "") { $witoparameters["cfgpicwatermarkactivate"] = "no";}
			if (strip_tags($_POST["cfgcropactivate"]) == "") { $witoparameters["cfgcropactivate"] = "no";}
			if (strip_tags($_POST["cfgdeletelocalpictures"]) == "") { $witoparameters["cfgdeletelocalpictures"] = "yes";}
			else { $witoparameters["cfgdeletelocalpictures"] = "no";}
			if (strip_tags($_POST["cfgarchivesize"]) == "") { $witoparameters["cfgarchivesize"] = "no";}
			if (strip_tags($_POST["cfghotlinkerrorcreate"]) == "") { $witoparameters["cfghotlinkerrorcreate"] = "no";}
			
			if (strip_tags($_POST["cfgarchivesize"]) == "yes") { $witoparameters["cfgarchivesize"] = strip_tags($_POST['cfgarchivesizeres']);}
			if (strip_tags($_POST["cfgimagemagickres"]) == "") { $witoparameters["cfgimagemagickres"] = "no";}
			if (strip_tags($_POST["cfghotlinksize1"]) == "" || strip_tags($_POST["cfghotlinksize1box"]) != "yes") { $witoparameters["cfghotlinksize1"] = "no";}
			if (strip_tags($_POST["cfghotlinksize2"]) == "" || strip_tags($_POST["cfghotlinksize2box"]) != "yes") { $witoparameters["cfghotlinksize2"] = "no";}
			if (strip_tags($_POST["cfghotlinksize3"]) == "" || strip_tags($_POST["cfghotlinksize3box"]) != "yes") { $witoparameters["cfghotlinksize3"] = "no";}
			if (strip_tags($_POST["cfghotlinksize4"]) == "" || strip_tags($_POST["cfghotlinksize4box"]) != "yes") { $witoparameters["cfghotlinksize4"] = "no";}
   
			wito_writeconfig($config_witoconfig, $witoparameters);
		}	
		// READ CONFIG	
		$webcamboxconfig = wito_getfullconfig($config_witoconfig);
		foreach ($webcamboxconfig as $readkey=>$readvalue) {
		      $smarty->assign(strtoupper($readkey), $readvalue);
		}
		if ($webcamboxconfig["cfgimagemagicktxt"] == "yes") {	$smarty->assign('CFGIMAGEMAGICKTXT', "checked");}	
		if ($webcamboxconfig["cfghotlinkerrorcreate"] == "yes") {	$smarty->assign('CFGHOTLINKERRORCREATE', "checked");}				
		
		$smarty->assign('CFGIMGTEXT', $webcamboxconfig["cfgimgtext"] );
		$cfgimgdateformat = $webcamboxconfig["cfgimgdateformat"];
		if ($cfgimgdateformat == "1") {
			$smarty->assign('CFGIMGDATEFORMAT', "1"); //25/01/2010 - 09h30
		} elseif ($cfgimgdateformat == "2") {
			$smarty->assign('CFGIMGDATEFORMAT', "2"); //25/01/2010
		} elseif ($cfgimgdateformat == "3") {
			$smarty->assign('CFGIMGDATEFORMAT', "3"); //09h30
		} elseif ($cfgimgdateformat == "4") {
			$smarty->assign('CFGIMGDATEFORMAT', "4"); //Thursday 25 January 2010 - 09h30
		} elseif ($cfgimgdateformat == "5") {
			$smarty->assign('CFGIMGDATEFORMAT', "5"); //25 January 2010 - 09h30
		} else {
			$smarty->assign('CFGIMGDATEFORMAT', "0");
		}
		if ($webcamboxconfig["cfgdeletelocalpictures"] == "no") {
			$smarty->assign('CFGDELETELOCALPICTURES', "checked");
		}
		$smarty->assign('CFGSTOREPICTURESDAYS', $webcamboxconfig["cfgstorepicturesdays"] );
		if ($webcamboxconfig["cfgarchivesize"] != "no") {
			$smarty->assign('CFGARCHIVESIZE', "checked");
			$smarty->assign('CFGARCHIVESIZERES', $webcamboxconfig["cfgarchivesize"] );
		}		
		if ($webcamboxconfig["cfgpicwatermarkactivate"] == "yes") {
			$smarty->assign('CFGPICWATERMARKACTIVATE', "checked");
		}
		/*$cfghotlinksize1 = $webcamboxconfig["cfghotlinksize1"];
		if ($cfghotlinksize1 != "no" && $cfghotlinksize1 != "320x240" && $cfghotlinksize1 != "640x480" && $cfghotlinksize1 != "800x600" && $cfghotlinksize1 != "1024x768" && $cfghotlinksize2 != "1280x1024") {
			$smarty->assign('CFGHOTLINKSIZE1', 'autre');
			$smarty->assign('CFGHOTLINKSIZE1OTHER', $cfghotlinksize1);
		} else {
			$smarty->assign('CFGHOTLINKSIZE1', $webcamboxconfig["cfghotlinksize1"] );
		}
		$cfghotlinksize2 = $webcamboxconfig["cfghotlinksize2"];
		if ($cfghotlinksize2 != "no" && $cfghotlinksize2 != "320x240" && $cfghotlinksize2 != "640x480" && $cfghotlinksize2 != "800x600" && $cfghotlinksize2 != "1024x768" && $cfghotlinksize2 != "1280x1024") {
			$smarty->assign('CFGHOTLINKSIZE2', 'autre');
			$smarty->assign('CFGHOTLINKSIZE2OTHER', $cfghotlinksize2);
		} else {
			$smarty->assign('CFGHOTLINKSIZE2', $webcamboxconfig["cfghotlinksize2"] );
		}
		$cfghotlinksize3 = $webcamboxconfig["cfghotlinksize3"];
		if ($cfghotlinksize3 != "no" && $cfghotlinksize3 != "320x240" && $cfghotlinksize3 != "640x480" && $cfghotlinksize3 != "800x600" && $cfghotlinksize3 != "1024x768" && $cfghotlinksize3 != "1280x1024") {
			$smarty->assign('CFGHOTLINKSIZE3', 'autre');
			$smarty->assign('CFGHOTLINKSIZE3OTHER', $cfghotlinksize3);
		} else {
			$smarty->assign('CFGHOTLINKSIZE3', $webcamboxconfig["cfghotlinksize3"] );
		}
		$cfghotlinksize4 = $webcamboxconfig["cfghotlinksize4"];
		if ($cfghotlinksize4 != "no" && $cfghotlinksize4 != "320x240" && $cfghotlinksize4 != "640x480" && $cfghotlinksize4 != "800x600" && $cfghotlinksize4 != "1024x768" && $cfghotlinksize4 != "1280x1024") {
			$smarty->assign('CFGHOTLINKSIZE4', 'autre');
			$smarty->assign('CFGHOTLINKSIZE4OTHER', $cfghotlinksize4);
		} else {
			$smarty->assign('CFGHOTLINKSIZE4', $webcamboxconfig["cfghotlinksize4"] );
		}
		*/
		if ($webcamboxconfig["cfgimagemagickres"] == "yes") {
			$smarty->assign('CFGIMAGEMAGICKRES', "checked");
		}

		if ($webcamboxconfig["cfgcropactivate"] == "yes") {
			$smarty->assign('CFGCROPACTIVATE', "checked");
		}			

		exec('mogrify -list font | grep Font', $fontlist, $ret); 	
		$cptfonts = sizeof($fontlist);
		for ($i=0;$i<$cptfonts;$i++) {
			$fontlist[$i] = trim(str_replace("Font:", "", $fontlist[$i]));
		}
		$smarty->assign('FONTSLIST', $fontlist);
		$smarty->assign('FONTSCPT', $cptfonts);


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

$cptwatermark = 0;
$watermarkdir = opendir($config_watermarkdirectory); 
while ($listwatermarkfile = readdir($watermarkdir)) {
   if(is_file($config_watermarkdirectory.$listwatermarkfile) && substr($listwatermarkfile, -4,4) == ".png") {
      //echo "Nom : ".$listwatermarkfile . "<br />";
      $watermarkfiles[$cptwatermark] = $listwatermarkfile;
      $cptwatermark++;
   }
} 
closedir($watermarkdir);
$smarty->assign('CPTWATERMARKFILES', $cptwatermark);
$smarty->assign('WATERMARKFILES', $watermarkfiles);


if (is_file($config_langdir . "config-photos.php")) {
	include($config_langdir . "config-photos.php");
}
//$smarty->assign("BODYCONTENT", $smarty->template_dir . "index.tpl");
$smarty->assign('CONFIGPAGE', 'photos');
$smarty->assign('CENTRAL', 'config-photos.tpl');
$smarty->display('skeleton.tpl');
//$_COOKIE['lasturl'] = "panel.php"browserurl();



?>
