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
require("include/zip.lib.php");

$zip = new zipfile () ;
$files = array($config_etcdirectory . "config-source" . $config_source . ".cfg" , $config_etcdirectory . "config-source" . $config_source . "-video.cfg" , $config_etcdirectory . "config-source" . $config_source . "-videocustom.cfg" ) ;
$filenames = array("config-source.cfg" ,"config-source-video.cfg" , "config-source-videocustom.cfg" ) ;
$i = 0 ;
while ( count( $files ) > $i )   {
	$fo = fopen($files[$i],'r') ;
	$contenu = fread($fo, filesize($files[$i])) ; 
	fclose($fo) ;
	$zip->addfile($contenu, $filenames[$i]) ;       
	$i++;
}
$archive = $zip->file();
header("Content-Type: application/x-zip");
header("Content-Disposition: filename=config-source" . $config_source . ".zip");
echo $archive ;
?>