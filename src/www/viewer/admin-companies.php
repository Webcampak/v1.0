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

if (!login_allowed($current_usersid, $db, $current_usersgroupid, "gestion")) {
	$smarty->assign('LOGINERROR', "Accès refusé à cette section du programme");
	$smarty->display('login.tpl');		
	exit();
}

include("include/allowedsources.php");

if(isset($_GET["submit"])) {$submitpage = strip_tags($_GET["submit"]);} else {$submitpage = 0;}
if ($submitpage == "1") {
	if (isset($_POST["addcompany"])) {
		$insertgroup = $db->prepare("INSERT INTO `companies` ( `id` , `name`) VALUES ('', '" . strip_tags($_POST["addcompany"]) . "')");
		$insertgroup->execute();
	}
}

if (isset($_GET["delcompany"])) {
	$deletecompany = $db->prepare("DELETE FROM companies WHERE id='" . strip_tags($_GET["delcompany"]) . "'");
	$deletecompany->execute();
	$deletepagerelations = $db->prepare("UPDATE users SET companies_id='0' WHERE companies_id='" . strip_tags($_GET["delcompany"]) . "'");
	$deletepagerelations->execute();		
}


$listcompanies = $db->prepare("
SELECT 
	c.name AS cname,
	c.id AS cid
FROM 
	companies AS c
ORDER BY c.name	
	");
$listcompanies->execute();
$resultlistcompanies = $listcompanies->fetchAll();
for ($i=0;$i<count($resultlistcompanies);$i++) {
	$companylistcname[$i] = $resultlistcompanies[$i]["cname"];
	$companylistcid[$i] = $resultlistcompanies[$i]["cid"];
}
$smarty->assign('COMPANIESNAME', $companylistcname);
$smarty->assign('COMPANIESID', $companylistcid);
$smarty->assign('COMPANIESCPT', count($resultlistcompanies));

if (is_file($config_langdir . "admin.php")) {
	include($config_langdir . "admin.php");
}	

$smarty->assign('CENTRALCONTENT', 'admin-companies.tpl');
$smarty->assign('CENTRAL', 'admin.tpl');
$smarty->display('skeleton.tpl');


?>