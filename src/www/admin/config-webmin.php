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

if (is_file($config_langdir . "config-webmin.php")) {
	include($config_langdir . "config-webmin.php");
}
#$smarty->assign('LOCALE_HELP', $config_directory . 'include/languages/' . $config_lang . '/pages/' . 'locale.help.tpl');
$smarty->assign('CONFIGSYSTEM', '1');
$smarty->assign('CONFIGPAGE', 'webmin');
$smarty->assign('CONFIGSOURCE', '0');
$smarty->assign('CENTRAL', 'config-webmin.tpl');
$smarty->display('skeleton.tpl');

?>