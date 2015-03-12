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

if (!login_allowed($current_usersid, $db, $current_usersgroupid, "gestion-utilisateurs")) {
	$smarty->assign('LOGINERROR', "Accès refusé à cette section du programme");
	$smarty->display('login.tpl');		
	exit();
}

include("include/allowedsources.php");

if(isset($_GET["submit"])) {$submitpage = strip_tags($_GET["submit"]);} else {$submitpage = 0;}
if ($submitpage == "1") {
	if (strip_tags($_POST["addusername"]) != "") {
		$insertuser = $db->prepare("INSERT INTO `users` 
		( `id` , `username`, `password`, `firstname`, `lastname`, `email`, `companies_id`, `groups_id`) 
		VALUES 
		('', '" . strip_tags($_POST["addusername"]) . "', 
		SHA1('" . strip_tags($_POST["addpassword"]) . "'), 
		'" . strip_tags($_POST["addfirstname"]) . "', 
		'" . strip_tags($_POST["addlastname"]) . "', 
		'" . strip_tags($_POST["addemail"]) . "', 
		'" . strip_tags($_POST["addcompany"]) . "', 
		'" . strip_tags($_POST["addgroup"]) . "' 
		)");
		$insertuser->execute();
	}
}

if (isset($_GET["changepassword"])) {
	if (isset($_POST["editpassword"])) {
		$changepassword = $db->prepare("UPDATE users SET password=SHA1('" . strip_tags($_POST["editpassword"]) ."') WHERE id='" . strip_tags($_GET["changepassword"]) . "' LIMIT 1");
		$changepassword->execute();		
	} else {
		$smarty->assign('CHANGEPASSWORDID', strip_tags($_GET["changepassword"]));	
	}
}

if (isset($_GET["deluser"])) {
	if (strip_tags($_GET["deluser"]) != "1") {
		$deleteusers = $db->prepare("DELETE FROM users WHERE id='" . strip_tags($_GET["deluser"]) . "'");
		$deleteusers->execute();
	} else {
		$smarty->assign('ERRORDELETE', "Utilisateur racine, il est impossible de supprimer cet utilisateur");
	}
}


$listusers = $db->prepare("
	SELECT 
		u.id AS uid,
		u.username AS uusername,
		u.firstname AS ufirstname,
		u.lastname AS ulastname,
		u.email AS uemail,
		u.companies_id AS ucompaniesid,
		u.groups_id AS ugroupsid,
		c.name AS cname,
		g.name AS gname
	FROM 
		users AS u
	LEFT JOIN companies AS c ON c.id = u.companies_id
	LEFT JOIN groups AS g ON g.id = u.groups_id
	ORDER BY u.username");
$listusers->execute();
$resultlistusers = $listusers->fetchAll();
for ($i=0;$i<count($resultlistusers);$i++) {
	$usersid[$i] = $resultlistusers[$i]["uid"];
	$usersusername[$i] = $resultlistusers[$i]["uusername"];
	$usersfirstname[$i] = $resultlistusers[$i]["ufirstname"];
	$userslastname[$i] = $resultlistusers[$i]["ulastname"];
	$usersemail[$i] = $resultlistusers[$i]["uemail"];
	$userscname[$i] = $resultlistusers[$i]["cname"];
	$usersgname[$i] = $resultlistusers[$i]["gname"];
}
$smarty->assign('USERSCPT', count($resultlistusers));
$smarty->assign('USERSID', $usersid);
$smarty->assign('USERSUSERNAME', $usersusername);
$smarty->assign('USERSFIRSTNAME', $usersfirstname);
$smarty->assign('USERSLASTNAME', $userslastname);
$smarty->assign('USERSEMAIL', $usersemail);
$smarty->assign('USERSCNAME', $userscname);
$smarty->assign('USERSGNAME', $usersgname);

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

$listgroups = $db->prepare("
SELECT 
	g.name AS gname,
	g.id AS gid
FROM 
	groups AS g
ORDER BY g.name	
	");
$listgroups->execute();
$resultlistgroups = $listgroups->fetchAll();
for ($i=0;$i<count($resultlistgroups);$i++) {
	$grouplistgname[$i] = $resultlistgroups[$i]["gname"];
	$grouplistgid[$i] = $resultlistgroups[$i]["gid"];
}
$smarty->assign('GROUPSLISTGNAME', $grouplistgname);
$smarty->assign('GROUPSLISTGID', $grouplistgid);
$smarty->assign('GROUPSCPT', count($resultlistgroups));

if (is_file($config_langdir . "admin.php")) {
	include($config_langdir . "admin.php");
}	

$smarty->assign('CENTRALCONTENT', 'admin-users.tpl');
$smarty->assign('CENTRAL', 'admin.tpl');
$smarty->display('skeleton.tpl');


?>