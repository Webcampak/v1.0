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
	if (isset($_POST["addgroup"])) {
		$insertgroup = $db->prepare("INSERT INTO `groups` ( `id` , `name`) VALUES ('', '" . strip_tags($_POST["addgroup"]) . "')");
		$insertgroup->execute();
	}
	if (isset($_POST["addpage"])) {
		$insertgroup = $db->prepare("INSERT INTO `pages` ( `id` , `name`) VALUES ('', '" . strip_tags($_POST["addpage"]) . "')");
		$insertgroup->execute();
	}	
}

if (isset($_GET["delpage"])) {
	$deletepage = $db->prepare("DELETE FROM pages WHERE id='" . strip_tags($_GET["delpage"]) . "'");
	$deletepage->execute();
	$deletepagerelations = $db->prepare("DELETE FROM groups_pages WHERE pages_id='" . strip_tags($_GET["delpage"]) . "'");
	$deletepagerelations->execute();		
}

if (isset($_GET["delgroup"])) {
	$deletepage = $db->prepare("DELETE FROM groups WHERE id='" . strip_tags($_GET["delgroup"]) . "'");
	$deletepage->execute();
	$deletepagerelations = $db->prepare("DELETE FROM groups_pages WHERE groups_id='" . strip_tags($_GET["delgroup"]) . "'");
	$deletepagerelations->execute();		
}

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

$listpages = $db->prepare("
SELECT 
	p.name AS pname,
	p.id AS pid
FROM 
	pages AS p
ORDER BY p.name	
	");
$listpages->execute();
$resultlistpages = $listpages->fetchAll();
for ($i=0;$i<count($resultlistpages);$i++) {
	$pageslistpname[$i] = $resultlistpages[$i]["pname"];
	$pageslistpid[$i] = $resultlistpages[$i]["pid"];
}
$smarty->assign('PAGESLISTPNAME', $pageslistpname);
$smarty->assign('PAGESLISTPID', $pageslistpid);
$smarty->assign('PAGESCPT', count($resultlistpages));

for ($i=0;$i<count($resultlistpages);$i++) {
	for ($j=0;$j<count($resultlistgroups);$j++) {
		$tmppageslistpid = $pageslistpid[$i];
		$tmpgrouplistgid = $grouplistgid[$j];
		if ($submitpage == "1") {
			$deleterelation = $db->prepare("DELETE FROM groups_pages	WHERE groups_id='" . $grouplistgid[$j] . "' AND	pages_id='" . $pageslistpid[$i] . "' ");
			$deleterelation->execute();			
		}
		if (isset($_POST[$tmppageslistpid . '-' . $tmpgrouplistgid])) {
			if (strip_tags($_POST[$tmppageslistpid . '-' . $tmpgrouplistgid]) == "yes") {
				$insertrelation = $db->prepare("INSERT INTO `groups_pages` ( `id` , `groups_id`, `pages_id`, `access`) VALUES ('', '" . $grouplistgid[$j] . "', '" . $pageslistpid[$i] . "', '1')");
				$insertrelation->execute();
			}
		}
		$checkgrouprights = $db->prepare("SELECT id FROM groups_pages
			WHERE groups_id='" . $grouplistgid[$j] . "' AND 
			pages_id='" . $pageslistpid[$i] . "' AND access='1' LIMIT 1");
		$checkgrouprights->execute();
		if (count($checkgrouprights->fetchAll()) == "1") {
			$groupspagesresults[$i][$j] = "yes";
		}		
	}
}
$smarty->assign('GROUPSPAGESRESULTS', $groupspagesresults);


//echo "<pre>";
//print_r($resultcheckaccess);
//echo "</pre>";

if (is_file($config_langdir . "admin.php")) {
	include($config_langdir . "admin.php");
}	
$smarty->assign('CENTRALCONTENT', 'admin-groups.tpl');
$smarty->assign('CENTRAL', 'admin.tpl');
$smarty->display('skeleton.tpl');


?>