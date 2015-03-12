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
	if (strip_tags($_GET['submit']) == "1" && strip_tags($_POST['submitform']) == "1") {
		 if (strip_tags($_POST['postinitconf']) == "yes"){
		 	$smarty->assign('POSTINITCONF', 'Réinitialisation de la configuration en cours ...');
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 1 initconfsources");		 	
		 	$smarty->assign('POSTINITCONFS1', 'Source 1 ... OK');
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 2 initconfsources");		 	
		 	$smarty->assign('POSTINITCONFS2', 'Source 2 ... OK');
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 3 initconfsources");		 	
		 	$smarty->assign('POSTINITCONFS3', 'Source 3 ... OK');
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 4 initconfsources");		 	
		 	$smarty->assign('POSTINITCONFS4', 'Source 4 ... OK');
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 5 initconfsources");		 	
		 	$smarty->assign('POSTINITCONFS5', 'Source 5 ... OK');
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 6 initconfsources");		 	
		 	$smarty->assign('POSTINITCONFS6', 'Source 6 ... OK');
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 7 initconfsources");		 	
		 	$smarty->assign('POSTINITCONFS7', 'Source 7 ... OK');
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 8 initconfsources");		 	
		 	$smarty->assign('POSTINITCONFS8', 'Source 8 ... OK');
		 }
		 if (strip_tags($_POST['postinitcontent']) == "yes"){
		 	$smarty->assign('POSTINITCONTENT', 'Suppression des images et vidéos en cours ...');
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 1 initcontent");		
			$smarty->assign('POSTINITCONTENTS1', 'Source 1 ... OK'); 
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 2 initcontent");		
			$smarty->assign('POSTINITCONTENTS2', 'Source 2 ... OK');			
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 3 initcontent");		
			$smarty->assign('POSTINITCONTENTS3', 'Source 3 ... OK');			
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 4 initcontent");		
			$smarty->assign('POSTINITCONTENTS4', 'Source 4 ... OK');			
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 5 initcontent");		
			$smarty->assign('POSTINITCONTENTS5', 'Source 5 ... OK');			
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 6 initcontent");		
			$smarty->assign('POSTINITCONTENTS6', 'Source 6 ... OK');			
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 7 initcontent");		
			$smarty->assign('POSTINITCONTENTS7', 'Source 7 ... OK');			
			passthru("sudo -u " . $config_systemuser . " /usr/bin/php -f " . $config_bindirectory . "server.php -- 8 initcontent");		
			$smarty->assign('POSTINITCONTENTS8', 'Source 8 ... OK');			
		 }
	}		 

//$smarty->assign("BODYCONTENT", $smarty->template_dir . "index.tpl");

if (is_file($config_langdir . "config-reset.php")) {
	include($config_langdir . "config-reset.php");
}
$smarty->assign('CONFIGSYSTEM', '1');
$smarty->assign('CONFIGPAGE', 'reset');
$smarty->assign('CONFIGSOURCE', '0');
$smarty->assign('CENTRAL', 'config-reset.tpl');
$smarty->display('skeleton.tpl');
//$_COOKIE['lasturl'] = "panel.php"browserurl();



?>
