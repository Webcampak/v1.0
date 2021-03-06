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

if (!login_allowed($current_usersid, $db, $current_usersgroupid, "view-autorefresh")) {
	$smarty->assign('LOGINERROR', "Accès refusé à cette section du programme");
	$smarty->display('login.tpl');		
	exit();
} 

include("include/allowedsources.php");

//if (strip_tags($_POST['autorefresh']) != "") {
if (isset($_POST['autorefresh'])) {	
	Cookie::Set('autorefresh', strip_tags($_POST['autorefresh']), Cookie::Session);	
}
if (is_file($config_camlive . Cookie::Get('autorefresh'))) {
	$smarty->assign('HOTLINKPICTURE', $config_webcamlive . Cookie::Get('autorefresh'));		
}

for ($j=0;$j<$selectcptformat;$j++) {	
	if ($selectlivebegsize[$j] == min($selectlivebegsize)) {
		$smarty->assign('SOURCELIVEPICTURENOW', $selectlivefilename[$j]);
		$smarty->assign('HOTLINKPICTUREERROR', $selectlivefilename[$j]);				
	}
}

$smarty->assign('DISPLAY', "autorefresh");


if (is_file($config_langdir . "autorefresh.php")) {
	include($config_langdir . "autorefresh.php");
}	

$smarty->assign('CENTRAL', 'autorefresh.tpl');
$smarty->display('skeleton.tpl');

?>