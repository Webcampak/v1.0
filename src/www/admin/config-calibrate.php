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

	if (strip_tags($_GET['init']) == "1") {
		//Lancer la capture de l'image
		passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " calibrateinit");
	}

	if (strip_tags($_GET['restore']) == "1") {
		//Lancer la capture de l'image
		passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " calibraterestore");
		passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " sample");
		passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " calibraterestoredel");
		$smarty->assign('DSIPLAYCAPTURE', '1' );
	}

	if (strip_tags($_GET['refresh']) == "1") {
		//Lancer la capture de l'image
		passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " calibraterefresh");
	}

	$config_cambase = wito_getconfig($config_witoconfig, "cfgbasedir");
	$smarty->assign('WITODISKSPACE', wito_diskspace($config_base));
	
		#passthru("sudo /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " v4lunique");
		$fd = @fopen($config_etcdirectory . "source" . $config_source . "/cameraparameters" ,"r");
		if (!$fd) {
			$smarty->assign('GPHOTOINITWARNING', "1");	
		} else {
			$filecpt = 0; // compteur de ligne
			while (!feof($fd)) {
				$ligne = fgets($fd, 1024);	
				if ($ligne[0] == "/") {
					//OBTENTION DES PARAMETRES
					$filename = $config_etcdirectory . "source" . $config_source . "/" . str_replace("/", "_", $ligne);
					$lignemod = trim(str_replace("/", "_", $ligne));
					$filename = substr($filename,0,-1);
					$lines = file($filename);
					foreach ($lines as $line_num => $line) {
						$gphotoparamname[$filecpt] =  $lignemod;
						if (strpos($line, "Label:") !== false) {
							$gphotoparamlabel[$filecpt] = str_replace("Label:", "", $line);
						} elseif (strpos($line, "Type:") !== false) {
							$gphotoparamtype[$filecpt] = trim(str_replace("Type:", "", $line));
						} elseif (strpos($line, "Current:") !== false) {
							$gphotoparamcurrent[$filecpt] = str_replace("Current:", "", $line);
							if ($gphotoparamtype[$filecpt] == "RANGE") {
								$gphotoparamchoicefromconfvalue[$filecpt] = str_replace(" ", "", $gphotoparamcurrent[$filecpt]) * 1;				
							}	
							//echo 	$gphotoparamtype[$filecpt]	. "---" . $gphotoparamchoicefromconfvalue[$filecpt] . "<br />";		
						} elseif (strpos($line, "Printable:") !== false) {
							$gphotoparamcurrent[$filecpt] = $gphotoparamcurrent[$filecpt] . "<br />" . str_replace("Printable:", "", $line);
						}  elseif (strpos($line, "Bottom:") !== false) {
							$gphotoparambottom[$filecpt] = str_replace("Bottom:", "", $line) * 1;	
						} elseif (strpos($line, "Top:") !== false) {
							$gphotoparamtop[$filecpt] = str_replace("Top:", "", $line) * 1;						
						} elseif (strpos($line, "Step:") !== false) {
							$gphotoparamstep[$filecpt] = str_replace("Step:", "", $line) * 1;	
						} elseif (strpos($line, "Choice:") !== false) {
							$currentcptchoice = $gphotoparamchoicecpt[$filecpt] * 1;
							$gphotoparamchoice[$filecpt][$currentcptchoice] = str_replace("Choice:", "", $line);
							$gphotoparamchoicevalue[$filecpt][$currentcptchoice] = $gphotoparamchoice[$filecpt][$currentcptchoice][0];
							if ($gphotoparamchoice[$filecpt][$currentcptchoice][1] >= 0) {
								$gphotoparamchoicevalue[$filecpt][$currentcptchoice] = $gphotoparamchoicevalue[$filecpt][$currentcptchoice] . $gphotoparamchoice[$filecpt][$currentcptchoice][1];
							}
							if ($gphotoparamchoice[$filecpt][$currentcptchoice][2] >= 0) {
								$gphotoparamchoicevalue[$filecpt][$currentcptchoice] = $gphotoparamchoicevalue[$filecpt][$currentcptchoice] . $gphotoparamchoice[$filecpt][$currentcptchoice][2];
							}
							$gphotoparamchoicevalue[$filecpt][$currentcptchoice] = str_replace(" ", "", $gphotoparamchoicevalue[$filecpt][$currentcptchoice]);				
							$tmpgphotoparambottom = trim(str_replace("/", "\/", $gphotoparamcurrent[$filecpt]));
							$tmpgphotoparambottom = trim(str_replace("(", "\(", $tmpgphotoparambottom));
							$tmpgphotoparambottom = trim(str_replace(")", "\)", $tmpgphotoparambottom));					
								//echo "TEST:" . $gphotoparamcurrent[$filecpt] . "--<br />";							
								//echo "== TEST:" . $tmpgphotoparambottom . "--<br />";
							if (preg_match("/\b" . $tmpgphotoparambottom . "\b/i", $gphotoparamchoice[$filecpt][$currentcptchoice]) && $gphotoparamtype[$filecpt] != "RANGE") {
								$gphotoparamchoicefromconfvalue[$filecpt] = $gphotoparamchoicevalue[$filecpt][$currentcptchoice];											
								$gphotoparamchoicefromconftxt[$filecpt] = substr($gphotoparamchoice[$filecpt][$currentcptchoice],2);	
							}
							$gphotoparamchoicecpt[$filecpt] = $gphotoparamchoicecpt[$filecpt] + 1;
						}				
					}
					//VERIFICATION MODIFICATION PARAMETRE
					if (strip_tags($_GET['submit']) == "1") {
						if (strip_tags($_POST[$lignemod]) != "default" && strip_tags($_POST[$lignemod]) != "") {
							//echo "Parametre Modifi�: "  . $lignemod . " = " . strip_tags($_POST[$lignemod]) . "<br />";
							if ($cptpassthru == "") {
								passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " calibrateinitapply");
							}
							passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " calibrateapply " . $lignemod . "=" . strip_tags($_POST[$lignemod]));
							$cptpassthru++;
						}
					}
					//Initialisation Globale globalinit - T�l�chargement des parametres depuis l'appareil photo
					if (strip_tags($_GET['init']) == "1" && strip_tags($_POST['globalinit']) != "" && ($gphotoparamchoicevalue[$filecpt][$currentcptchoice] != "" || $gphotoparamtype[$filecpt] == "RANGE")) {
							if ($cptglobalpassthru == "") {
								passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " calibrateglobalinitapply");
							}
							if (strip_tags($_GET['refresh']) != "1" && $gphotoparamchoicefromconfvalue[$filecpt] >= "0") {
								passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " calibrateglobalapply " . $lignemod . "=" . $gphotoparamchoicefromconfvalue[$filecpt]);
							}							
							$cptglobalpassthru++;
					}
					
					//TEST SI CONFIG PRESENTE DANS LE FICHIER gphotoapply
					$fdb = @fopen($config_etcdirectory . "source" . $config_source . "/gphotoapply" ,"r");
					if (!$fdb) {
						$smarty->assign('TRASH', "Fichier inexistant");
					} else {
						while (!feof($fdb)) {
							$ligneconfig = fgets($fdb, 1024);
							if (preg_match("/\b" . $lignemod . "\b/i", $ligneconfig)) {
								$tmpparameter = explode("=", $ligneconfig);
								$gphotoparamcustomconfig[$filecpt] = trim($tmpparameter[1]);
							} 						
						}	
					}
					//TEST SI CONFIG PRESENTE DANS LE FICHIER gphotoapply
					$fdb = @fopen($config_etcdirectory . "source" . $config_source . "/gphotoinitparameters" ,"r");
					if (!$fdb) {
						$smarty->assign('TRASH', "Fichier inexistant");
					} else {
						while (!feof($fdb)) {
							$ligneconfig = fgets($fdb, 1024);
							if (preg_match("/\b" . $lignemod . "\b/i", $ligneconfig)) {
								$tmpparameter = explode("=", $ligneconfig);
								$gphotoparamdefaultconfig[$filecpt] = trim($tmpparameter[1]);
							} 						
						}	
					}										
				} elseif ($filecpt == 0 && $ligne[0] != "/") {
					$smarty->assign('GPHOTOINITWARNING', "2");					
				}	
				$filecpt++;
			}
			fclose($fd);				
			$smarty->assign('GPHOTOPARAMNAME', $gphotoparamname);				
			$smarty->assign('GPHOTOPARAMLABEL', $gphotoparamlabel);				
			$smarty->assign('GPHOTOPARAMTYPE', $gphotoparamtype);				
			$smarty->assign('GPHOTOPARAMCURRENT', $gphotoparamcurrent);	
			$smarty->assign('GPHOTOPARAMCUSTOMCONFIG', $gphotoparamcustomconfig);
			$smarty->assign('GPHOTOPARAMDEFAULTCONFIG', $gphotoparamdefaultconfig);
			$smarty->assign('GPHOTOPARAMFROMCONFCONFIG', $gphotoparamchoicefromconfvalue);
			$smarty->assign('GPHOTOPARAMFROMCONFCONFIGTXT', $gphotoparamchoicefromconftxt);							
			$smarty->assign('GPHOTOPARAMPRINTABLE', $gphotoparamprintable);
			$smarty->assign('GPHOTOPARAMBOTTOM', $gphotoparambottom);
			$smarty->assign('GPHOTOPARAMTOP', $gphotoparamtop);
			$smarty->assign('GPHOTOPARAMSTEP', $gphotoparamstep);													
			$smarty->assign('GPHOTOPARAMCHOICE', $gphotoparamchoice);
			$smarty->assign('GPHOTOPARAMCHOICEVALUE', $gphotoparamchoicevalue);						
			$smarty->assign('GPHOTOPARAMCHOICECPT', $gphotoparamchoicecpt);
			$smarty->assign('GPHOTOPARAMCPT', $filecpt);							
			}

			if ((strip_tags($_GET['capture']) == "1") || (strip_tags($_POST['acceptcapture']) != "" && strip_tags($_GET['submit']) == "1")) {
				//Lancer la capture de l'image
				passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " sample");
				$smarty->assign('DSIPLAYCAPTURE', '1' );
			}
	
if (is_file($config_langdir . "config-calibrate.php")) {
	include($config_langdir . "config-calibrate.php");
}
			
$smarty->assign('CENTRAL', 'config-calibrate.tpl');
$smarty->display('skeleton.tpl');
?>