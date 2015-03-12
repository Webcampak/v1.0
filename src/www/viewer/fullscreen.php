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

/*if (!login_allowed($current_usersid, $db, $current_usersgroupid, "view-autorefresh")) {
	$smarty->assign('LOGINERROR', "Accès refusé à cette section du programme");
	$smarty->display('login.tpl');		
	exit();
} 

include("include/allowedsources.php");
*/

if (isset($_GET['s'])) {
	$dispsource = strip_tags($_GET['s']);
	$dirresultstmp = scandir($config_base . "sources/source" . $dispsource . "/live/");
	$cptpicfiletmp = sizeof($dirresultstmp);
	$cptresults = 0;
	for ($i=0;$i<$cptpicfiletmp;$i++) {
		if ($dirresultstmp[$i] != '.' && $dirresultstmp[$i] != '..' && substr($dirresultstmp[$i], -4,4) == ".jpg" && $dirresultstmp[$i] != "full-webcam.jpg" && ereg("webcam",$dirresultstmp[$i])) {
			$livefilesize[$cptresults] = filesize($config_sourcesdirectory . $config_sourcesprefix . $dispsource . "/live/" . $dirresultstmp[$i]);	
			$livefilename[$cptresults] = $config_websourcesdirectory . $config_sourcesprefix . $dispsource . "/live/" . $dirresultstmp[$i];
			$cptresults++;
		}
	}
	$livebiggestfilesize = max($livefilesize);
	for ($i=0;$i<$cptresults;$i++) {
		if ($livebiggestfilesize == $livefilesize[$i]) {
			$smarty->assign('DISPLAYFULLSCREEN', $livefilename[$i]);
		}
	}
}

$smarty->display('fullscreen.tpl');

?>
