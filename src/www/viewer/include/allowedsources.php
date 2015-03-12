<?php
//On récupère la liste des sources autorisées pour l'utilisateur ainsi que la source courante
if ($current_usersgroupid == "1") {
	$listallowedcameras = $db->prepare("
		SELECT 
			s.sourceid AS ssourceid,
			s.name AS sname
		FROM 
			sources AS s
		ORDER BY s.weight, s.name			
			");
} else {
	$listallowedcameras = $db->prepare("
		SELECT 
			s.sourceid AS ssourceid,
			s.name AS sname
		FROM 
			sources_groups AS sg
		LEFT JOIN sources AS s ON s.sourceid = sg.usergroup
		WHERE sg.username ='" . $current_usersname . "'
		ORDER BY s.weight, s.name		
		");
}
$listallowedcameras->execute();
$resultlistallowedcameras = $listallowedcameras->fetchAll();

//echo "<pre>";
//print_r($resultlistallowedcameras);
//echo "</pre>";

//if (is_numeric(strip_tags($_GET['s']))) {
if (isset($_GET['s'])) {
	if (is_numeric(strip_tags($_GET['s']))) {
		Cookie::Set('sourceid', strip_tags($_GET['s']), Cookie::Session);
		$config_source = strip_tags($_GET['s']);
	}
} elseif (Cookie::Get('sourceid') != "" && is_numeric(Cookie::Get('sourceid'))) {
	$config_source = Cookie::Get('sourceid');
} else {
	$config_source = $resultlistallowedcameras[0]["ssourceid"];
	Cookie::Set('sourceid', $config_source, Cookie::Session);	
}

for ($i=0;$i<count($resultlistallowedcameras);$i++) {
	$allowedcameraid[$i] = $resultlistallowedcameras[$i]["ssourceid"];
	$allowedcameraname[$i] = $resultlistallowedcameras[$i]["sname"];
	if ($allowedcameraid[$i] == $config_source) {
		$currentcameraname = $allowedcameraname[$i];
		$smarty->assign('CURRENTCAMERANAME', $currentcameraname);		
	}
}
$smarty->assign('ALLOWEDCAMERASID', $allowedcameraid);
$smarty->assign('ALLOWEDCALERASNAME', $allowedcameraname);
$smarty->assign('ALLOWEDCAMERASCPT', count($resultlistallowedcameras));

$config_nbsources = count($resultlistallowedcameras);

$config_camroot = $config_sourcesdirectory . $config_sourcesprefix . $config_source  . "/";
$config_camlive = $config_sourcesdirectory . $config_sourcesprefix . $config_source  . "/live/";
$config_campictures = $config_sourcesdirectory . $config_sourcesprefix . $config_source  . "/pictures/";
$config_camvideos = $config_sourcesdirectory . $config_sourcesprefix . $config_source  . "/videos/";

$config_webcamlive = $config_websourcesdirectory . $config_sourcesprefix . $config_source  . "/live/";
$config_webcampictures = $config_websourcesdirectory . $config_sourcesprefix . $config_source  . "/pictures/";
$config_webcampicturesshort = "pictures/";
$config_webcamvideos = $config_websourcesdirectory . $config_sourcesprefix . $config_source  . "/videos/";

$smarty->assign('CONFIGBASE', $config_weburl);

$smarty->assign('CONFIGTHEME', $config_theme);
$smarty->assign('CONFIGSOURCE', $config_source);
if (isset($config_url)) {$smarty->assign('CONFIGURL', $config_url);}
$smarty->assign('CONFIGWEBSITENAME', $config_websourcesdirectory);
$smarty->assign('CONFIGNBSOURCES', $config_nbsources);

$smarty->assign('CONFIGWEBCAMSOURCE', $config_source);
$smarty->assign('CONFIGWEBCAMLIVE', $config_webcamlive);
$smarty->assign('CONFIGWEBCAMPICTURES', $config_webcampictures);
$smarty->assign('CONFIGWEBCAMPICTURESSHORT', $config_webcampicturesshort);
$smarty->assign('CONFIGWEBCAMVIDEOS', $config_webcamvideos);

$smarty->assign('CONFIGNBSOURCES', $config_nbsources);

$selectlivefilename = "";
$selectshortlivefilename = "";
$selectlivesize = "";
$selectdirresultstmp = scandir($config_camlive);
$selectcptpicfiletmp = sizeof($selectdirresultstmp);
$selectcptformat=0;
for ($i=0;$i<$selectcptpicfiletmp;$i++) {
	if ($selectdirresultstmp[$i] != '.' && $selectdirresultstmp[$i] != '..' && substr($selectdirresultstmp[$i], -4,4) == ".jpg") {
		if(ereg("webcam",$selectdirresultstmp[$i])) {
			if ($selectdirresultstmp[$i] != "full-webcam.jpg") {
				list($webcamprefix, $selectlivesize[$selectcptformat]) = explode("-", $selectdirresultstmp[$i]);
				$selectlivefilename[$selectcptformat] = $config_webcamlive . $selectdirresultstmp[$i];
				$selectshortlivefilename[$selectcptformat] = $selectdirresultstmp[$i];				
				$selectlivesize[$selectcptformat] = str_replace(".jpg", "", $selectlivesize[$selectcptformat]);				
				list($selectlivebegsize[$selectcptformat], $webcamprefix) = explode("x", $selectlivesize[$selectcptformat]);
				$selectcptformat++;					
			}
		}
	}
}
$smarty->assign('SELECTSOURCECPTFORMAT', $selectcptformat);
$smarty->assign('SELECTSOURCELIVEFILENAME', $selectlivefilename);
$smarty->assign('SELECTSHORTSOURCELIVEFILENAME', $selectshortlivefilename);
$smarty->assign('SELECTSOURCELIVEFILESIZE', $selectlivesize);
if ($selectcptpicfiletmp > 2 && sizeof($selectlivebegsize) > 1) {
	$smarty->assign('SELECTSOURCELIVEBEGSMALLESTFILESIZE', min($selectlivebegsize));
}
if (login_allowed($current_usersid, $db, $current_usersgroupid, "view-photos")) {$smarty->assign('DISPLAYPHOTOS', "1");}
if (login_allowed($current_usersid, $db, $current_usersgroupid, "view-videos")) {$smarty->assign('DISPLAYVIDEOS', "1");}
if (login_allowed($current_usersid, $db, $current_usersgroupid, "view-thumbnails")) {$smarty->assign('DISPLAYTHUMBNAILS', "1");}
if (login_allowed($current_usersid, $db, $current_usersgroupid, "index")) {$smarty->assign('DISPLAYINDEX', "1");}
if (login_allowed($current_usersid, $db, $current_usersgroupid, "admin")) {$smarty->assign('DISPLAYADMIN', "1");}
if (login_allowed($current_usersid, $db, $current_usersgroupid, "gestion")) {$smarty->assign('DISPLAYGESTION', "1");}
if (login_allowed($current_usersid, $db, $current_usersgroupid, "gestion-admin")) {$smarty->assign('DISPLAYGESTIONADMIN', "1");}
?>
