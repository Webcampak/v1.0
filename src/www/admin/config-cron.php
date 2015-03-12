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

for ($i=1;$i<$config_nbsources;$i++) {
	if (strip_tags($_GET['submit']) == "1" && strip_tags($_POST['submitform']) == "1") {
		$witoparameters["cfgcroncapturevalue"] = strip_tags($_POST['croncapturevalue' . $i]);
		$witoparameters["cfgcroncaptureinterval"] = strip_tags($_POST['croncaptureinterval' . $i]);
		if (strip_tags($_POST['croncapturehourall' . $i]) == "yes") { $witoparameters["cfgcroncapturehourall"] = "yes";} else {$witoparameters["cfgcroncapturehourall"] = "no";}
		$witoparameters["cfgcroncapturehourstart"] = strip_tags($_POST['croncapturehourstart' . $i]);
		$witoparameters["cfgcroncapturehourstop"] = strip_tags($_POST['croncapturehourstop' . $i]);
		if (strip_tags($_POST['croncapturedaysall' . $i]) == "yes") { $witoparameters["cfgcroncapturedaysall"] = "yes";} else {$witoparameters["cfgcroncapturedaysall"] = "no";}
		$witoparameters["cfgcroncapturedaysstart"] = strip_tags($_POST['croncapturedaysstart' . $i]);
		$witoparameters["cfgcroncapturedaysstop"] = strip_tags($_POST['croncapturedaysstop' . $i]);
		$witoparameters["cfgcrondailyhour"] = strip_tags($_POST['crondailyhour' . $i]);
		$witoparameters["cfgcrondailyminute"] = strip_tags($_POST['crondailyminute' . $i]);
		$witoparameters["cfgcroncustomvalue"] = strip_tags($_POST['croncustomvalue' . $i]);
		$witoparameters["cfgcroncustominterval"] = strip_tags($_POST['croncustominterval' . $i]);
		wito_writeconfig($config_etcdirectory . "config-source" . $i . ".cfg", $witoparameters);				
	}
	$webcampakconfig[$i] = wito_getfullconfig($config_etcdirectory . "config-source" . $i . ".cfg");
	//echo "CRON $i : " . $webcampakconfig[$i]["cfgcroncapturevalue"] . "<br />";
	$croncapturevalue[$i] = $webcampakconfig[$i]["cfgcroncapturevalue"];
	$croncaptureinterval[$i] = $webcampakconfig[$i]["cfgcroncaptureinterval"];
	//echo "CRONDAILMINUTE - $i - " . $webcampakconfig[$i]["cfgcroncaptureinterval"] . "<br />";
	$crondailyhour[$i] = $webcampakconfig[$i]["cfgcrondailyhour"];
	$crondailyminute[$i] = $webcampakconfig[$i]["cfgcrondailyminute"];
	//echo "CRONDAILMINUTE - $i - " . $webcampakconfig[$i]["cfgcrondailyminute"] . "<br />";
	$croncustomvalue[$i] = $webcampakconfig[$i]["cfgcroncustomvalue"];
	$croncustominterval[$i] = $webcampakconfig[$i]["cfgcroncustominterval"];
	if ($webcampakconfig[$i]["cfgcroncapturehourall"] == "yes") {
		$croncapturehourall[$i] = "checked";
	}
	$croncapturehourstart[$i] = $webcampakconfig[$i]["cfgcroncapturehourstart"];
	$croncapturehourstop[$i] = $webcampakconfig[$i]["cfgcroncapturehourstop"];
	if ($webcampakconfig[$i]["cfgcroncapturedaysall"] == "yes") {
		$croncapturedaysall[$i] = "checked";
	}
	$croncapturedaysstart[$i] = $webcampakconfig[$i]["cfgcroncapturedaysstart"];
	$croncapturedaysstop[$i] = $webcampakconfig[$i]["cfgcroncapturedaysstop"];
	
}
$smarty->assign('CRONCAPTUREVALUE', $croncapturevalue);
$smarty->assign('CRONCAPTUREINTERVAL', $croncaptureinterval);
$smarty->assign('CRONCAPTUREHOURALL', $croncapturehourall);
$smarty->assign('CRONCAPTUREHOURSTART', $croncapturehourstart);
$smarty->assign('CRONCAPTUREHOURSTOP', $croncapturehourstop);
$smarty->assign('CRONCAPTUREDAYSALL', $croncapturedaysall);
$smarty->assign('CRONCAPTUREDAYSSTART', $croncapturedaysstart);
$smarty->assign('CRONCAPTUREDAYSSTOP', $croncapturedaysstop);
$smarty->assign('CRONDAILYHOUR', $crondailyhour);
$smarty->assign('CRONDAILYMINUTE', $crondailyminute);
$smarty->assign('CRONCUSTOMVALUE', $croncustomvalue);
$smarty->assign('CRONCUSTOMINTERVAL', $croncustominterval);		
$smarty->assign('CRONNBSOURCES', $config_nbsources);	
	
//$webcamboxconfig = wito_getfullconfig($config_etcdirectory . "config-general.cfg");
if (strip_tags($_GET['submit']) == "1") {	
	passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- " . $config_source . " updatecron");
}	 


if (is_file($config_langdir . "config-cron.php")) {
	include($config_langdir . "config-cron.php");
}

$smarty->assign('CONFIGSYSTEM', '1');
$smarty->assign('CONFIGPAGE', 'cron');
$smarty->assign('CONFIGSOURCE', '0');
$smarty->assign('CENTRAL', 'config-cron.tpl');
$smarty->display('skeleton.tpl');

?>
