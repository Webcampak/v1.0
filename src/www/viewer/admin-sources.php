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
	if (isset($_POST["addsourcesourceid"])) {
		$insertuser = $db->prepare("INSERT INTO `sources` 
		( `id` , `sourceid`, `name`) 
		VALUES 
		('', '" . strip_tags($_POST["addsourcesourceid"]) . "', 
		'" . strip_tags($_POST["addsourcename"]) . "' 
		)");
		$insertuser->execute();
	}
}

if (isset($_GET["viewpermissions"])) {
	if (isset($_POST["adduser"])) {
		if (strip_tags($_POST["adduser"]) != "0") {
			$deleteusers = $db->prepare("DELETE FROM sources_groups WHERE usergroup='" . strip_tags($_GET["viewpermissions"]) . "' AND username='" . strip_tags($_POST["adduser"]) . "'");	
			$deleteusers->execute();
			$insertuser = $db->prepare("INSERT INTO `sources_groups` 
			( `id` , `usergroup`, `username`) 
			VALUES 
			('', '" . strip_tags($_GET["viewpermissions"]) . "', '" . strip_tags($_POST["adduser"]) . "')");
			$insertuser->execute();
		}
	}
	if (isset($_GET["permdel"])) {	
		if (strip_tags($_GET["permdel"]) != "0") {
			$deletepermission = $db->prepare("DELETE FROM sources_groups WHERE id='" . strip_tags($_GET["permdel"]) . "'");	
			$deletepermission->execute();		
		}	
	}
}

if (isset($_GET["changesourceid"])) {
	if (isset($_POST["editsourceid"])) {
		$changepassword = $db->prepare("UPDATE sources SET sourceid='" . strip_tags($_POST["editsourceid"]) ."' WHERE id='" . strip_tags($_GET["changesourceid"]) . "' LIMIT 1");
		$changepassword->execute();		
	} else {
		$smarty->assign('CHANGESOURCEID', strip_tags($_GET["changesourceid"]));	
	}
}

if (isset($_GET["changesourcename"])) {
	if (isset($_POST["editsourcename"])) {
		$changepassword = $db->prepare("UPDATE sources SET name='" . strip_tags($_POST["editsourcename"]) ."' WHERE id='" . strip_tags($_GET["changesourcename"]) . "' LIMIT 1");
		$changepassword->execute();		
	} else {
		$smarty->assign('CHANGESOURCENAME', strip_tags($_GET["changesourcename"]));	
	}
}

if (isset($_GET["changesourceweight"])) {
	if (isset($_POST["editsourceweight"])) {
		$changepassword = $db->prepare("UPDATE sources SET weight='" . strip_tags($_POST["editsourceweight"]) ."' WHERE id='" . strip_tags($_GET["changesourceweight"]) . "' LIMIT 1");
		$changepassword->execute();		
	} else {
		$smarty->assign('CHANGESOURCEWEIGHT', strip_tags($_GET["changesourceweight"]));	
	}
}

if (isset($_GET["delsource"])) {
	$deletesources = $db->prepare("DELETE FROM sources WHERE sourceid='" . strip_tags($_GET["delsource"]) . "'");
	$deletesources->execute();
	$deletesources = $db->prepare("DELETE FROM sources_groups WHERE usergroup='" . strip_tags($_GET["delsource"]) . "'");
	$deletesources->execute();	
}

$listsources = $db->prepare("
	SELECT 
		s.id AS sid,
		s.sourceid AS ssourceid,
		s.weight AS sweight,
		s.name AS sname
	FROM 
		sources AS s
	ORDER BY s.sourceid
			      ");
$listsources->execute();
$resultlistsources = $listsources->fetchAll();
for ($i=0;$i<count($resultlistsources);$i++) {
	$sourcesid[$i] = $resultlistsources[$i]["sid"];
	$sourcessourceid[$i] = $resultlistsources[$i]["ssourceid"];
	$sourcesname[$i] = $resultlistsources[$i]["sname"];
	$sourcesweight[$i] = $resultlistsources[$i]["sweight"];
	if(isset($_GET["viewpermissions"])) {
		if (strip_tags($_GET["viewpermissions"]) == $sourcessourceid[$i]) {
			$smarty->assign('VIEWPERMISSIONS', strip_tags($_GET["viewpermissions"]));
			$smarty->assign('VIEWPERMISSIONSSOURCENAME', $sourcesname[$i]);		
		}
	}
}
$smarty->assign('SOURCESCPT', count($resultlistsources));
$smarty->assign('SOURCESID', $sourcesid);
$smarty->assign('SOURCESSOURCEID', $sourcessourceid);
$smarty->assign('SOURCESNAME', $sourcesname);
$smarty->assign('SOURCESWEIGHT', $sourcesweight);

if (isset($_GET["viewpermissions"])) {
	$listuserspermissions = $db->prepare("
		SELECT 
			sg.id AS sgid,
			sg.username AS sgusername,
			u.firstname AS ufirstname,
			u.lastname AS ulastname,
			c.name AS cname
		FROM 
			sources_groups AS sg
		LEFT JOIN users AS u ON u.username = sg.username
		LEFT JOIN companies AS c ON u.companies_id = c.id
		WHERE sg.usergroup ='" . strip_tags($_GET["viewpermissions"]) . "'");
	$listuserspermissions->execute();
	$resultlistuserspermissions = $listuserspermissions->fetchAll();
	for ($i=0;$i<count($resultlistuserspermissions);$i++) {
		$permissionid[$i] = $resultlistuserspermissions[$i]["sgid"];
		$permissionusername[$i] = $resultlistuserspermissions[$i]["sgusername"];
		$permissionfirstname[$i] = $resultlistuserspermissions[$i]["ufirstname"];
		$permissionlastname[$i] = $resultlistuserspermissions[$i]["ulastname"];	
		$permissioncompany[$i] = $resultlistuserspermissions[$i]["cname"];			
	}
	$smarty->assign('PERMISSIONID', $permissionid);
	$smarty->assign('PERMISSIONUSERNAME', $permissionusername);
	$smarty->assign('PERMISSIONFIRSTNAME', $permissionfirstname);
	$smarty->assign('PERMISSIONLASTNAME', $permissionlastname);
	$smarty->assign('PERMISSIONCOMPANY', $permissioncompany);
	$smarty->assign('PERMISSIONCPT', count($resultlistuserspermissions));

}

$listcompanies = $db->prepare("
SELECT 
	c.name AS cname,
	c.id AS cid
FROM 
	companies AS c");
$listcompanies->execute();
$resultlistcompanies = $listcompanies->fetchAll();
for ($i=0;$i<count($resultlistcompanies);$i++) {
	$companylistcname[$i] = $resultlistcompanies[$i]["cname"];
	$companylistcid[$i] = $resultlistcompanies[$i]["cid"];
}
$smarty->assign('COMPANIESNAME', $companylistcname);
$smarty->assign('COMPANIESID', $companylistcid);
$smarty->assign('COMPANIESCPT', count($resultlistcompanies));

$listusers = $db->prepare("
SELECT 
	u.firstname AS ufirstname,
	u.username AS uusername,
	u.lastname AS ulastname,	
	u.id AS uid,
	c.name AS cname
FROM 
	users AS u
LEFT JOIN companies AS c ON c.id = u.companies_id	
ORDER BY c.name");
$listusers->execute();
$resultlistusers = $listusers->fetchAll();
for ($i=0;$i<count($resultlistusers);$i++) {
	$userslistuusername[$i] = $resultlistusers[$i]["uusername"];
	$userslistufirstname[$i] = $resultlistusers[$i]["ufirstname"];
	$userslistulastname[$i] = $resultlistusers[$i]["ulastname"];
	$userslistcname[$i] = $resultlistusers[$i]["cname"];	
	$userslistuid[$i] = $resultlistusers[$i]["uid"];	
}
$smarty->assign('USERSUSERNAME', $userslistuusername);
$smarty->assign('USERSFIRSTNAME', $userslistufirstname);
$smarty->assign('USERSLASTNAME', $userslistulastname);
$smarty->assign('USERSCNAME', $userslistcname);
$smarty->assign('USERSID', $userslistuid);
$smarty->assign('USERSCPT', count($resultlistusers));

if (is_file($config_langdir . "admin.php")) {
	include($config_langdir . "admin.php");
}	

$smarty->assign('CENTRALCONTENT', 'admin-sources.tpl');
$smarty->assign('CENTRAL', 'admin.tpl');
$smarty->display('skeleton.tpl');


?>