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
//GLOBAL ROOT DIRECTORY
$config_base = "/home/tmpusername/webcampak/";
if ($_SERVER['SERVER_PORT'] != "80") {
$config_serverport = ":" . $_SERVER['SERVER_PORT'];
}
$config_webbase = "http://" . $_SERVER['SERVER_NAME'] . $config_serverport . "/";
$config_localedirectory =  $config_base . "locale/";

//ROOT DIRECTORY OF THE WEBSITE 
$config_directory = $config_base . "www/viewer/";
$config_weburl = "http://" . $_SERVER['SERVER_NAME'] . $config_serverport . "/viewer/";

//ROOT DIRECTORY OF THE SOURCES
$config_sourcesdirectory = $config_base . "sources/";
$config_websourcesdirectory = $config_webbase . "sources/";
$config_sourcesprefix = "source"; //Prefix dans le répertoire sources/ ce qui donnera sourceX avec X numéro de source

//$config_symlinks = $config_directory . "themes/default/cache/symlinks/";
//$config_websymlinks = $config_weburl . "themes/default/cache/symlinks/";

//MYSQL CONFIGURATION
$config_mysqlhost = "localhost";
$config_database = "webcampak";
$config_login = "mysqlwebcampak";
$config_password = "tmpmysqlpassword";

//Available translations
$config_languages = array("en","fr","es");


$config_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
if ($config_lang != "en" && $config_lang != "fr" && $config_lang != "es") {
	$config_lang = "fr";
}
$config_theme = "default";


try {
	$db = new PDO('mysql:host=' . $config_mysqlhost . ';dbname=' . $config_database . '', $config_login , $config_password);
	$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); // les noms de champs seront en caractères minuscules
	$db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); // les erreurs lanceront des exceptions
} catch(Exception $e) {
	echo "Échec : " . $e->getMessage();
}


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

//setlocale (LC_TIME, 'fr_FR.utf8','fra'); 

// XHTML & PHP VALIDATION 
	ini_set("arg_separator.output","&amp;");

//CONFIGURATION DE LA LANGUE
if (isset($_GET['lang'])) {
	if (strip_tags($_GET['lang']) != "" && (strip_tags($_GET['lang']) == "en" || strip_tags($_GET['lang']) == "fr" || strip_tags($_GET['lang']) == "de" || strip_tags($_GET['lang']) == "es")) {
		Cookie::Set('lang', strip_tags($_GET['lang']), Cookie::OneYear);
	}
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
	$config_langdir = $config_localedirectory . $config_langenc . "/" . "viewer/";
} elseif($config_lang == "en") {
	$config_langenc = "en_US";
	putenv("LANG=" . $config_langenc);
	setlocale (LC_ALL, $config_langenc);
	setlocale (LC_TIME, 'en_US.utf8','eng'); 
	$config_langdir = $config_localedirectory . $config_langenc . "/" . "viewer/";
} elseif($config_lang == "de") {
	$config_langenc = "de_DE";
	putenv("LANG=" . $config_langenc);
	setlocale (LC_ALL, $config_langenc);
	setlocale (LC_TIME, 'de_DE.utf8','eng');
	$config_langdir = $config_localedirectory . $config_langenc . "/" . "viewer/";
} elseif($config_lang == "es") {
	$config_langenc = "es_ES";
	putenv("LANG=" . $config_langenc);
	setlocale (LC_ALL, $config_langenc);
	setlocale (LC_TIME, 'es_ES.utf8','eng');
	$config_langdir = $config_localedirectory . $config_langenc . "/" . "viewer/";
}
//bindtextdomain("webcampak.viewer", $config_localedirectory);
//textdomain("webcampak.viewer");

$smarty->assign('CONFIGLANGUAGES', $config_languages);
$smarty->assign('CONFIGLANGUAGESCPT', count($config_languages));

include($config_langdir . "skeleton.php");

?>