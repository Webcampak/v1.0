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
header("Content-Type: text/html; charset=UTF-8");
include("include/cookie.php");
require("../../etc/viewer.config.php");
include("include/login.php");
include("include/witofunctions.php");

if (!login_allowed($current_usersid, $db, $current_usersgroupid, "display-content")) {
	$smarty->assign('LOGINERROR', "Accès refusé à cette section du programme");
	$smarty->display('login.tpl');		
	exit();
} 

include("include/allowedsources.php");

if (strip_tags($_GET['display']) != "") {
	$displaycontent = strtr(strip_tags($_GET['display']), "..", "Error");
	if (substr($displaycontent, -4)== ".avi") {
		header('Content-Type: image/mp4');
	} elseif (substr($displaycontent, -4)== ".mp4") {
		header('Content-Type: image/mp4');
	} else {
		header('Content-Type: image/jpeg');	
		echo file_get_contents($config_camroot . $displaycontent);		
	}
}


?>