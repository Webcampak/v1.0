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

if (!login_allowed($current_usersid, $db, $current_usersgroupid, "view-thumbnails")) {
	$smarty->assign('LOGINERROR', "Accès refusé à cette section du programme");
	$smarty->display('login.tpl');		
	exit();
} 

include("include/allowedsources.php");

if (isset($_GET['autorefresh'])) {
	Cookie::Set('autorefresh', strip_tags($_GET['autorefresh']), Cookie::Session);		
}
if (is_file($config_camlive . Cookie::Get('autorefresh'))) {
	$smarty->assign('HOTLINKPICTURE', $config_webcamlive . Cookie::Get('autorefresh'));		
}

for ($j=0;$j<$config_nbsources;$j++) {
	$dirresultstmp = scandir($config_base . "sources/source" . $allowedcameraid[$j] . "/live/");
	$cptpicfiletmp = 0;
	$cptpicfiletmp = sizeof($dirresultstmp);
	$cpttmp = 0;
	for ($i=0;$i<$cptpicfiletmp;$i++) {	
		if ($dirresultstmp[$i] != '.' && $dirresultstmp[$i] != '..' && substr($dirresultstmp[$i], -4,4) == ".jpg") {
			if(ereg("webcam",$dirresultstmp[$i])) {
				if ($dirresultstmp[$i] != "full-webcam.jpg") {
					if (is_file($config_sourcesdirectory . $config_sourcesprefix . $allowedcameraid[$j] . "/live/" . $dirresultstmp[$i])) {
						$livefilesize[$j][$cpttmp] = filesize($config_sourcesdirectory . $config_sourcesprefix . $allowedcameraid[$j] . "/live/" . $dirresultstmp[$i]);
						list($webcamprefix, $livesize[$j][$cpttmp]) = explode("-", $dirresultstmp[$i]);
						$livefilename[$j][$cpttmp] = $config_websourcesdirectory . $config_sourcesprefix . $allowedcameraid[$j] . "/live/" . $dirresultstmp[$i];
						$liverealfilename[$j][$cpttmp] = $config_sourcesdirectory . $config_sourcesprefix . $allowedcameraid[$j] . "/live/" . $dirresultstmp[$i];
						$livesize[$j][$cpttmp] = str_replace(".jpg", "", $livesize[$j][$cpttmp]);				
						list($livebegsize[$j][$cpttmp], $webcamprefix) = explode("x", $livesize[$j][$cpttmp]);
						$cpttmp++;	
						$cptthumbformat[$j] = $cpttmp;
					} 
				} 
			} 
		}
	}
	if(count($livefilesize[$j]) > 1) {
		$livebiggestfilesize[$j] = max($livefilesize[$j]);
	} else {
		$livebiggestfilesize[$j] = $livefilesize[$j][0];		
	}
	for ($k=0;$k<$cptthumbformat[$j];$k++) {
		if ($livebiggestfilesize[$j] == filesize($liverealfilename[$j][$k])) {
			$livebiggestfile[$j] = $livefilename[$j][$k];
		}
	}
	if ($cptpicfiletmp >= 1 && sizeof($livebegsize[$j]) >= 1) {
		$slivebegsmallestfilesize[$j] = min($livebegsize[$j]);
	}
}

$livebiggestfile = array_filter($livebiggestfile);
$smarty->assign('SLIDESHOWDISP', $livebiggestfile);
$smarty->assign('SLIDESHOWDISPCPT', sizeof($livebiggestfile) + 1);


$smarty->display('slideshow.tpl');

?>
