<?php
// Copyright 2010 Infracom & Eurotechnia (support@webcampak.com)
// This file is part of the Webcampak project.
// Webcampak is free software: you can redistribute it and/or modify it 
// under the terms of the GNU General Public License as published by 
// the Free Software Foundation, either version 3 of the License, 
// or (at your option) any later version.

// WiTo is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
// even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// See the GNU General Public License for more details.

// You should have received a copy of the GNU General Public License along with Webcampak. 
// If not, see http://www.gnu.org/licenses/.

//////////////////////////////////////
//-----------GLOBAL CONF-----------//
////////////////////////////////////
//ROOT DIRECTORY OF THE WEBSITE
$config_base = "/home/tmpusername/webcampak/";
$config_directory = $config_base . "www/admin/";
if ($_SERVER['SERVER_PORT'] != "80") {
$config_serverport = ":" . $_SERVER['SERVER_PORT'];
}
$config_url = "http://" . $_SERVER['SERVER_NAME'] . $config_serverport . "/admin/";
$config_webminurl = "http://" . $_SERVER['SERVER_NAME'] . ":10000";
$config_websitename = $_SERVER['SERVER_NAME'] . $config_serverport;
$config_bindirectory = $config_base . "bin/";
$config_etcdirectory = $config_base . "etc/";
$config_initdirectory = $config_base . "init/";
$config_logdirectory = $config_base . "resources/logs/";
$config_sourcesdirectory = $config_base . "sources/";
$config_audiodirectory = $config_base . "resources/audio/";
$config_watermarkdirectory = $config_base . "resources/watermark/";
$config_localedirectory =  $config_base . "locale/";
$config_displayadmin = "Y";
$config_displaymotion = "N";
$config_languages = array("en","fr","es"); //Available translations
$config_gphotodir = "/usr/bin/";
$config_systemuser = "tmpusername"; // Used for Passthru
$config_nbsources = "tmpnbsources"; // Nombre de sources 
$config_nbsources = $config_nbsources + 1;
//PASSAGE DE LA SOURCE EN PARAMETRE URL
if (!isset($config_source)) {
	if (!isset($_GET['s'])) {
		$config_source = "1";
	}
	elseif(is_numeric(strip_tags($_GET['s'])))  {
		$config_source = strip_tags($_GET['s']);
	} else {
		$config_source = "1";
	}
}
$config_witoconfig = $config_base . "etc/config-source" . $config_source  . ".cfg";
$config_witoconfigvid = $config_base . "etc/config-source" . $config_source  . "-video.cfg";
$config_witoconfigvidcustom = $config_base . "etc/config-source" . $config_source  . "-videocustom.cfg";
$config_witoconfigvidpost = $config_base . "etc/config-source" . $config_source  . "-videopost.cfg";
$config_ftpserversconfig = $config_base . "etc/config-ftpservers.cfg";

$config_cambase = $config_base . "sources/source" . $config_source  . "/";
$config_camlive = $config_base . "sources/source" . $config_source  . "/live/";
$config_camtmp = $config_base . "sources/source" . $config_source  . "/tmp/";
$config_campictures = $config_base . "sources/source" . $config_source  . "/pictures/";
$config_camvideos = $config_base . "sources/source" . $config_source  . "/videos/";
$config_cametcfile = $config_base . "etc/config-source" . $config_source  . ".sh";

$config_webcambase = $config_url . "../sources/source" . $config_source  . "/";
$config_webcamlive = $config_url . "../sources/source" . $config_source  . "/live/";
$config_webcampictures = $config_url . "../sources/source" . $config_source  . "/pictures/";
$config_webcamvideos = $config_url . "../sources/source" . $config_source  . "/videos/";


//INCLUDES 
require($config_directory . "include/witofunctions.php");
require($config_directory . "include/cookie.php");

$config_theme = "wordpress";


//////////////////////////////////////
//-----------SMARTY CONFIG---------//
////////////////////////////////////
//CREATION OF A SMARTY INSTANCE
	require($config_directory . "include/smarty/Smarty.class.php");
	$smarty = new Smarty;
//SMARTY DIRECTORIES
	$smarty->template_dir = $config_directory . "themes/". $config_theme . "/templates/";
	$smarty->compile_dir = $config_directory . "themes/". $config_theme . "/cache/templates_c/";
	$smarty->config_dir = $config_directory . "themes/". $config_theme . "/cache/configs/";
	$smarty->cache_dir = $config_directory . "themes/". $config_theme . "/cache/cache/";
//SMARTY DELIMITERS
	$smarty->left_delimiter = '<!--{';
	$smarty->right_delimiter = '}-->';
////////////////////////////////////////////////////

$smarty->assign('CONFIGBASE', $config_url);

$smarty->assign('WEBCAMBOXDISPLAYADMIN', $config_displayadmin);
$smarty->assign('CONFIGTHEME', $config_theme);
$smarty->assign('CONFIGSOURCE', $config_source);
$smarty->assign('CONFIGURL', $config_url);
$smarty->assign('CONFIGWEBMINURL', $config_webminurl);
$smarty->assign('CONFIGWEBSITENAME', $config_websitename);
$smarty->assign('CONFIGNBSOURCES', $config_nbsources);

$smarty->assign('CONFIGWEBCAMSOURCE', $config_source);
$smarty->assign('CONFIGWEBCAMBASE', $config_webcambase);
$smarty->assign('CONFIGWEBCAMLIVE', $config_webcamlive);
$smarty->assign('CONFIGWEBCAMPICTURES', $config_webcampictures);
$smarty->assign('CONFIGWEBCAMVIDEOS', $config_webcamvideos);

$smarty->assign('CONFIGNBSOURCES', $config_nbsources);

$smarty->assign('CONFIGDISPLAYMOTION', $config_displaymotion);

//setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
header("Content-Type: text/html; charset=UTF-8");
//CONFIGURATION DE LA LANGUE
$config_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
if ($config_lang != "en" && $config_lang != "fr" && $config_lang != "es") {
	$config_lang = "fr";
}
if (strip_tags($_GET['lang']) != "" && (strip_tags($_GET['lang']) == "en" || strip_tags($_GET['lang']) == "fr" || strip_tags($_GET['lang']) == "de" || strip_tags($_GET['lang']) == "es")) {
	Cookie::Set('lang', strip_tags($_GET['lang']), Cookie::OneYear);
}
if (Cookie::Get('lang') == 'en' || Cookie::Get('lang') == 'fr' || Cookie::Get('lang') == 'de' || Cookie::Get('lang') == 'es') {
	$config_lang = Cookie::Get('lang');
} else {
	Cookie::Set('lang', $config_lang, Cookie::OneYear);
}
if ($config_lang == "fr") {
	$config_langenc = "fr_FR";
	putenv("LANG=" . $config_langenc);
	setlocale (LC_ALL, $config_langenc);
	setlocale (LC_TIME, 'fr_FR.utf8','fra');
	$config_langdir = $config_localedirectory . $config_langenc . "/" . "admin/";
} elseif($config_lang == "en") {
	$config_langenc = "en_US";
	putenv("LANG=" . $config_langenc);
	setlocale (LC_ALL, $config_langenc);
	setlocale (LC_TIME, 'en_US.utf8','eng'); 
	$config_langdir = $config_localedirectory . $config_langenc . "/" . "admin/";
} elseif($config_lang == "de") {
	$config_langenc = "de_DE";
	putenv("LANG=" . $config_langenc);
	setlocale (LC_ALL, $config_langenc);
	setlocale (LC_TIME, 'de_DE.utf8','eng');
	$config_langdir = $config_localedirectory . $config_langenc . "/" . "admin/";
} elseif($config_lang == "es") {
	$config_langenc = "es_ES";
	putenv("LANG=" . $config_langenc);
	setlocale (LC_ALL, $config_langenc);
	setlocale (LC_TIME, 'es_ES.utf8','eng');
	$config_langdir = $config_localedirectory . $config_langenc . "/" . "admin/";
}
//bindtextdomain("webcampak.admin", $config_localedirectory);
//textdomain("webcampak.admin");

include($config_langdir . "skeleton.php");

// XHTML & PHP VALIDATION 
	ini_set("arg_separator.output","&amp;");

//DEFAULT TTF FONTS DIRECTORY
	putenv('GDFONTPATH=' . $config_directory . "include/fonts/");

$smarty->assign('LOCALE_APROPOS', $config_langdir .  'pages/' . 'locale.apropos.tpl');
$smarty->assign('LOCALE_HELP', $config_langdir .  'pages/' . 'locale.help.tpl');

$smarty->assign('CONFIGLANGUAGES', $config_languages);
$smarty->assign('CONFIGLANGUAGESCPT', count($config_languages));

$witodiskspace = wito_diskspace($config_campictures);
$witodiskspaceused = ($witodiskspace[0] - $witodiskspace[1]) * 100 / $witodiskspace[0];

$smarty->assign('WITODISKSPACEPICUSED', round($witodiskspaceused));
$smarty->assign('WITODISKSPACEPICLEFT', round(100 - $witodiskspaceused));
$smarty->assign('WITODISKSPACELEFT', formatSize($witodiskspace[1]*1000000));

if (is_file($config_base . "version")) {	
	$witoversion = file_get_contents($config_base . "version");
	$smarty->assign('WITOVERSION', $witoversion);	
}



?>
