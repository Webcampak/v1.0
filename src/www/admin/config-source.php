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

	//passthru('echo testee | sudo /usr/bin/php -f ' . $config_bindirectory . 'server.php'); 
	if (strip_tags($_GET['capture']) == "1") {
		//Lancer la capture de l'image
		passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " sample");
		$smarty->assign('DSIPLAYCAPTURE', '1' );
	}
	if (strip_tags($_GET['capturerecord']) == "1") {
		$currentdate = date("YmdHis");
		$currentday = date("Ymd");
		//Lancer la capture de l'image
		passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " samplerecord");
		$dirresultstmp = php4_scandir($config_campictures . $currentday);
		sort($dirresultstmp);
		for ($i=0;$i<sizeof($dirresultstmp);$i++) {
		    if (substr($dirresultstmp[$i], 0,14) >= $currentdate && substr($dirresultstmp[$i], 0,2) == "20") {
			$smarty->assign('PICTUREDISPLAY', $config_webcampictures . $currentday . "/" . $dirresultstmp[$i] );
		    }
		}
		//$smarty->assign('DSIPLAYCAPTURE', '1' );
	}	
	
	if (strip_tags($_GET['gphotoassign']) == "1") {
		passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " gphotoassign");
		$smarty->assign('GPHOTOASSIGNAPPLIED', '1' );
	}	
	
	$webcamboxconfig = wito_getfullconfig($config_witoconfig);
	$config_cambase = $webcamboxconfig["cfgbasedir"];
	$smarty->assign('WITODISKSPACE', wito_diskspace($config_base));
		//MODIFICATION DES PARAMETRES		
		if (strip_tags($_GET['submit']) == "1" && strip_tags($_POST['submitform']) == "1") {

			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " updatecron");	
			
			foreach ($_POST as $confkey=>$confvalue) {
				if (substr($confkey, 0, 3) == "cfg") {
					//if ($confkey == "cfgsourcewebcamsize" && $confvalue == "autre") { $witoparameters[strip_tags($confkey)] = strip_tags($_POST['sourcewebcamsizeother']);}
					//else {
						$witoparameters[strip_tags($confkey)] = strip_tags($confvalue);
					//}
				}
			}
			if (strip_tags($_POST["cfgsourcedebug"]) == "") { $witoparameters["cfgsourcedebug"] = "no";}
			if (strip_tags($_POST["cfgemailerroractivate"]) == "") { $witoparameters["cfgemailerroractivate"] = "no";}
			if (strip_tags($_POST["cfgnocapture"]) == "") { $witoparameters["cfgnocapture"] = "no";}
			if (strip_tags($_POST["cfgsourcegphotocameramodel"]) == "") { $witoparameters["cfgsourcegphotocameramodel"] = "no";}
			if (strip_tags($_POST["cfgsourcegphotocalibration"]) == "") { $witoparameters["cfgsourcegphotocalibration"] = "no";}
			if (strip_tags($_POST["cfgsourcecamiplimiterotation"]) == "") { $witoparameters["cfgsourcecamiplimiterotation"] = "no";}
			if (strip_tags($_POST["cfgsourcecamiphotlinkerror"]) == "") { $witoparameters["cfgsourcecamiphotlinkerror"] = "no";}
			if (strip_tags($_POST["cfgsourceactive"]) == "") { $witoparameters["cfgsourceactive"] = "no";}
			if (strip_tags($_POST["cfgcroncalendar"]) == "") { $witoparameters["cfgcroncalendar"] = "no";}			
			wito_writeconfig($config_witoconfig, $witoparameters);
			
			$prewebcamboxconfig = wito_getfullconfig($config_witoconfig);
			for ($i=1;$i<$prewebcamboxconfig["cfgphidgetsensornb"] + 1; $i++) {
				$subsrcfgsensortype = strip_tags($_POST["srcfgsensortype-" . $i]);
				$subsrcfgsensorport = strip_tags($_POST["srcfgsensorport-" . $i]);
				$subsrcfgsensortext = strip_tags($_POST["srcfgsensortext-" . $i]);
				$subsrcfgsensorcolor = strip_tags($_POST["srcfgsensorcolor-" . $i]);
				$witoparametersadd["cfgphidgetsensor" . $i] = $subsrcfgsensortype . "\",\"" . $subsrcfgsensorport . "\",\"" . $subsrcfgsensortext . "\",\"" . $subsrcfgsensorcolor;
			}

			for ($i=1;$i<8; $i++) {
				if (strip_tags($_POST["cfgcapturedayenable" . $i]) == "") { $subcfgcapturedayenable = "no";}
				else { $subcfgcapturedayenable = "yes";}
				$subcfgcapturestarthour = strip_tags($_POST["cfgcapturestarthour" . $i]);
				$subcfgcapturestartminute = strip_tags($_POST["cfgcapturestartminute" . $i]);
				$subcfgcapturesendhour = strip_tags($_POST["cfgcapturesendhour" . $i]);
				$subcfgcapturesendminute = strip_tags($_POST["cfgcapturesendminute" . $i]);
				$witoparametersadd["cfgcronday" . $i] = $subcfgcapturedayenable . "\",\"" . $subcfgcapturestarthour . "\",\"" . $subcfgcapturestartminute . "\",\"" . $subcfgcapturesendhour . "\",\"" . $subcfgcapturesendminute;
			}			
			wito_writeconfig($config_witoconfig, $witoparametersadd);			
			
			
		}
		//LECTURE DES PARAMETRES
		$webcamboxconfig = wito_getfullconfig($config_witoconfig);
		foreach ($webcamboxconfig as $readkey=>$readvalue) {
		      $smarty->assign(strtoupper($readkey), $readvalue);
		}
		if ($webcamboxconfig["cfgsourceactive"] == "yes") {
			$smarty->assign('CFGSOURCEACTIVE', "checked");
		}
		if ($webcamboxconfig["cfgsourcedebug"] == "yes") {
			$smarty->assign('CFGSOURCEDEBUG', "checked");
		}
		if ($webcamboxconfig["cfgemailerroractivate"] == "yes") {
			$smarty->assign('CFGEMAILERRORACTIVATE', "checked");
		}		
		if ($webcamboxconfig["cfgsourcegphotocalibration"] == "yes") {
			$smarty->assign('CFGSOURCEGPHOTOCALIBRATION', "checked");
		}		
		if ($webcamboxconfig["cfgsourcecamiplimiterotation"] == "yes") {
			$smarty->assign('CFGSOURCECAMIPLIMITEROTATION', "checked");
		}
		if ($webcamboxconfig["cfgsourcecamiphotlinkerror"] == "yes") {
			$smarty->assign('CFGSOURCECAMIPHOTLINKERROR', "checked");
		}
		if ($webcamboxconfig["cfgnocapture"] == "yes") {
			$smarty->assign('CFGNOCAPTURE', "checked");
		}
		if ($webcamboxconfig["cfgcroncalendar"] == "yes") {
			$smarty->assign('CFGCRONCALENDAR', "checked");
		}		
		
		$cfgsourcegphotocameramodel = $webcamboxconfig["cfgsourcegphotocameramodel"];
		if ($cfgsourcegphotocameramodel == "no") {
			$smarty->assign('CFGSOURCEGPHOTOCAMERAMODEL', "");
		} else {
			$smarty->assign('CFGSOURCEGPHOTOCAMERAMODEL', $webcamboxconfig["cfgsourcegphotocameramodel"] );		
		}
		$cfgsourcegphotocameraportdetail = $webcamboxconfig["cfgsourcegphotocameraportdetail"];
		if ($cfgsourcegphotocameraportdetail == "automatic") {
			$smarty->assign('CFGSOURCEGPHOTOCAMERAPORTDETAIL', "automatique");
		} else {
			$smarty->assign('CFGSOURCEGPHOTOCAMERAPORTDETAIL', $webcamboxconfig["cfgsourcegphotocameraportdetail"] );		
		}		
//		$cfgsourcewebcamsize = $webcamboxconfig["cfgsourcewebcamsize"];
//		if ($cfgsourcewebcamsize != "320x240" && $cfgsourcewebcamsize != "640x480" && $cfgsourcewebcamsize != "800x600" && $cfgsourcewebcamsize != "1024x768" && $cfgsourcewebcamsize != "1280x1024" && $cfgsourcewebcamsize != "1600x1200") {
//			$smarty->assign('CFGSOURCEWEBCAMSIZE', 'autre');
//			$smarty->assign('CFGSOURCEWEBCAMSIZEOTHER', $cfgsourcewebcamsize);
//		} else {
//			$smarty->assign('CFGSOURCEWEBCAMSIZE', $webcamboxconfig["cfgsourcewebcamsize"] );
//		}
//		$cfgsourcewebcamid = $webcamboxconfig["cfgsourcewebcamcamid"];
		//$smarty->assign('CFGSOURCEWEBCAMID', $cfgsourcewebcamid);
//		$trans = array("video" => "", "dev" => "", "/" => "");
//		$cfgsourcewebcamidnb = strtr($cfgsourcewebcamid, $trans);
//		$cfgsourcewebcamidnb = $cfgsourcewebcamidnb * 1;
		$usbbuscpt = 0;
		if ($webcamboxconfig["cfgsourcetype"] == "webcam") {
			passthru("sudo /usr/bin/php -f " . $config_bindirectory . "server.php -- 1 v4l");
			for ($i=0;$i<11;$i++) {
				if (is_file("/tmp/v4linfo" . $i)) {
					$convert = explode("\n", file_get_contents("/tmp/v4linfo" . $i)); //create array separate by new line
					for ($j=0;$j<count($convert);$j++)  {
						if (strpos($convert[$j], "bus_info") != False) {
							list($junk, $bus_info) = explode("usb", $convert[$j]);
							$bus_info = "usb" . $bus_info;
							$bus_info = substr_replace($bus_info ,"",-1);
							$usbbustxt[$usbbuscpt] = $bus_info;
							$usbbuscpt++;
							break;
						}	
					}
				}
			}
		}
		$smarty->assign('USBBUSCPT', $usbbuscpt);		
		$smarty->assign('USBBUSTXT', $usbbustxt);		
		
/*		if ($webcamboxconfig["cfgsourcetype"] == "webcam") {
			// Recuperation des parametres par défaut pour la webcam usb
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " v4lunique");
			$fd = @fopen("/tmp/v4lctl" . $cfgsourcewebcamidnb ,"r");
			if (!$fd) die("Erreur ouverture fichier: $fd");
			$i = 1; // compteur de ligne
			while (!feof($fd)) {
				$ligne = fgets($fd, 1024);
				if (stripos($ligne, $witoget . "bright") !== false) {
					list($webcamattribute, $webcamtype, $webcamcurrent, $webcamdefault, $webcamcomment) = explode("|", $ligne);
					$smarty->assign('CFGSOURCEWEBCAMBRIGHTATTRIBUTE', $webcamattribute);
					$smarty->assign('CFGSOURCEWEBCAMBRIGHTCURRENT', $webcamcurrent);
					$smarty->assign('CFGSOURCEWEBCAMBRIGHTDEFAULT', $webcamdefault);
					$smarty->assign('CFGSOURCEWEBCAMBRIGHTCOMMENT', $webcamcomment);		
				}			
				if (stripos($ligne, $witoget . "contrast") !== false) {
					list($webcamattribute, $webcamtype, $webcamcurrent, $webcamdefault, $webcamcomment) = explode("|", $ligne);
					$smarty->assign('CFGSOURCEWEBCAMCONTRASTATTRIBUTE', $webcamattribute);
					$smarty->assign('CFGSOURCEWEBCAMCONTRASTCURRENT', $webcamcurrent);
					$smarty->assign('CFGSOURCEWEBCAMCONTRASTDEFAULT', $webcamdefault);
					$smarty->assign('CFGSOURCEWEBCAMCONTRASTCOMMENT', $webcamcomment);		
				}
				if (stripos($ligne, $witoget . "color") !== false) {
					list($webcamattribute, $webcamtype, $webcamcurrent, $webcamdefault, $webcamcomment) = explode("|", $ligne);
					$smarty->assign('CFGSOURCEWEBCAMCOLORATTRIBUTE', $webcamattribute);
					$smarty->assign('CFGSOURCEWEBCAMCOLORCURRENT', $webcamcurrent);
					$smarty->assign('CFGSOURCEWEBCAMCOLORDEFAULT', $webcamdefault);
					$smarty->assign('CFGSOURCEWEBCAMCOLORCOMMENT', $webcamcomment);		
				}
				if (stripos($ligne, $witoget . "hue") !== false) {
					list($webcamattribute, $webcamtype, $webcamcurrent, $webcamdefault, $webcamcomment) = explode("|", $ligne);
					$smarty->assign('CFGSOURCEWEBCAMHUEATTRIBUTE', $webcamattribute);
					$smarty->assign('CFGSOURCEWEBCAMHUECURRENT', $webcamcurrent);
					$smarty->assign('CFGSOURCEWEBCAMHUEDEFAULT', $webcamdefault);
					$smarty->assign('CFGSOURCEWEBCAMHUECOMMENT', $webcamcomment);		
				}					
				//if (!feof($fd)) echo "Ligne $i : ".htmlEntities($ligne)."<br/>";
				$i++;
			}
			fclose($fd);
		}
*/		
		if ($webcamboxconfig["cfgsourcetype"] == "gphoto") {
			//Gphoto2 Ports
			//gphoto2 --auto-detect |egrep -o "usb:...,..."
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " gphoto2usbports");
			if (is_file("/tmp/gphoto2ports")) {
				$fd = @fopen("/tmp/gphoto2ports","r");	
				$cptports=0;
	   		while (!feof($fd)) {	
					$ligne = fgets($fd, 1024);
		      	if (!feof($fd)) {
		      		if ($ligne != "") {
		        			$gphotoports[$cptports] = trim($ligne);
		        			$cptports++;
		        		}
		         }
				}
				fclose($fd);
				$smarty->assign('CPTGPHOTOPORTS', $cptports);
				$smarty->assign('GPHOTOPORTS', $gphotoports);					
			}  		
			//$searchgphotoports = file_get_contents("/tmp/gphoto2ports");
			//echo "<pre>$searchgphotoports</pre>";
			//$smarty->assign('DISPGPHOTOPORTS', $searchgphotoports);
		}

		$webcamboxconfig = wito_getfullconfig($config_witoconfig);
		#foreach ($webcamboxconfig as $readkey=>$readvalue) {
		#      $smarty->assign(strtoupper($readkey), $readvalue);
		#}
		if ($webcamboxconfig["cfgphidgetsensorsgraph"] == "yes") {
			$smarty->assign('CFGPHIDGETSENSORSGRAPH', "checked");
		}
		for ($i=1;$i<$webcamboxconfig["cfgphidgetsensornb"] + 1; $i++) {
			$srcfgparameters = explode(",", $webcamboxconfig["cfgphidgetsensor" . $i]);
			if($srcfgparameters[0][0] == " ") {$srcfgsensortype[$i] = substr($srcfgparameters[0],1);} else {$srcfgsensortype[$i] = $srcfgparameters[0];}
			if($srcfgparameters[1][0] == " ") {$srcfgsensorport[$i] = substr($srcfgparameters[1],1);} else {$srcfgsensorport[$i] = $srcfgparameters[1];}
			if($srcfgparameters[2][0] == " ") {$srcfgsensortext[$i] = substr($srcfgparameters[2],1);} else {$srcfgsensortext[$i] = $srcfgparameters[2];}
			if($srcfgparameters[3][0] == " ") {$srcfgsensorcolor[$i] = substr($srcfgparameters[3],1);} else {$srcfgsensorcolor[$i] = $srcfgparameters[3];}
						
			if ($srcfgsensorport[$i] == "no") {$srcfgsensorport[$i] = "disabled";}
		}
		$smarty->assign('SRCCFGSENSORTYPE', $srcfgsensortype);
		$smarty->assign('SRCCFGSENSORPORT', $srcfgsensorport);
		$smarty->assign('SRCCFGSENSORTEXT', $srcfgsensortext);
		$smarty->assign('SRCCFGSENSORCOLOR', $srcfgsensorcolor);


		for ($i=1;$i<8; $i++) {
			$srccfgcrondayraw = explode(",", $webcamboxconfig["cfgcronday" . $i]);
			//echo $webcamboxconfig["cfgcronday" . $i] . "<br />";
			if($srccfgcrondayraw[0][0] == " ") {$cfgcapturedayenable[$i] = substr($srccfgcrondayraw[0],1);} else {$cfgcapturedayenable[$i] = $srccfgcrondayraw[0];}
			if($srccfgcrondayraw[1][0] == " ") {$cfgcapturestarthour[$i] = substr($srccfgcrondayraw[1],1);} else {$cfgcapturestarthour[$i] = $srccfgcrondayraw[1];}
			if($srccfgcrondayraw[2][0] == " ") {$cfgcapturestartminute[$i] = substr($srccfgcrondayraw[2],1);} else {$cfgcapturestartminute[$i] = $srccfgcrondayraw[2];}
			if($srccfgcrondayraw[3][0] == " ") {$cfgcapturesendhour[$i] = substr($srccfgcrondayraw[3],1);} else {$cfgcapturesendhour[$i] = $srccfgcrondayraw[3];}
			if($srccfgcrondayraw[4][0] == " ") {$cfgcapturesendminute[$i] = substr($srccfgcrondayraw[4],1);} else {$cfgcapturesendminute[$i] = $srccfgcrondayraw[4];}
			if ($cfgcapturedayenable[$i] == "yes") {$cfgcapturedayenable[$i] = "checked";}
		}
		$smarty->assign('CFGCAPTUREDAYENABLE', $cfgcapturedayenable);
		$smarty->assign('CFGCAPTURESTARTHOUR', $cfgcapturestarthour);
		$smarty->assign('CFGCAPTURESTARTMINUTE', $cfgcapturestartminute);
		$smarty->assign('CFGCAPTUREENDHOUR', $cfgcapturesendhour);
		$smarty->assign('CFGCAPTUREENDMINUTE', $cfgcapturesendminute);


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

$cptpercent = 0;
for ($i=-1;$i<100;$i++) { 
	$percenttxt[$cptpercent] = $i + 1;
	if ($percenttxt[$cptpercent] < 10) {
		$percenttxt[$cptpercent] = "0" . $percenttxt[$cptpercent];
	}
	$cptpercent++;
}
$smarty->assign('CPTPERCENT', $cptpercent);
$smarty->assign('PERCENTTXT', $percenttxt);


if (is_file($config_langdir . "config-source.php")) {
	include($config_langdir . "config-source.php");
}
$smarty->assign('CONFIGPAGE', 'source');
$smarty->assign('CENTRAL', 'config-source.tpl');
$smarty->display('skeleton.tpl');
?>
