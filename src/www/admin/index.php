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
$smarty->assign('CONFIGNBSOURCES', $config_nbsources);
$currenttimestamp = strftime("%s");


function pluralize( $count, $text ) 
{ 
    return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s" ) );
}

function ago( $datetime )
{
    $interval = date_create('now')->diff( $datetime );
    $suffix = ( $interval->invert ? '' : '' );
    if ( $v = $interval->y >= 1 ) return pluralize( $interval->y, 'year' ) . $suffix;
    if ( $v = $interval->m >= 1 ) return pluralize( $interval->m, 'month' ) . $suffix;
    if ( $v = $interval->d >= 1 ) return pluralize( $interval->d, 'day' ) . $suffix;
    if ( $v = $interval->h >= 1 ) return $interval->h. ' h' . $suffix;
    if ( $v = $interval->i >= 1 ) return $interval->i .  ' mn' . $suffix;
    return $interval->s . ' s' . $suffix;
}




$currenttimestampdate = new DateTime();
for ($j=1;$j<$config_nbsources;$j++) {
	$listdirectories = scandir($config_base . "sources/source" . $j . "/pictures/", 1);
	for ($i=0;$i<sizeof($listdirectories);$i++) {
		if (substr($listdirectories[$i], 0,2)== "20" && strlen($listdirectories[$i]) == "8") {
			$listdirectoriespics = scandir($config_base . "sources/source" . $j . "/pictures/" . $listdirectories[$i], 1);
			for ($k=0;$k<sizeof($listdirectoriespics);$k++) {
				if (substr($listdirectoriespics[$k], 0,2)== "20" && substr($listdirectoriespics[$k], -4) == ".jpg") {
					$sourceslastpicture[$j] = $listdirectoriespics[$k];
					$sourcelastpictureyear = substr($listdirectoriespics[$k], 0,4);
					$sourcelastpicturemonthnb = substr($listdirectoriespics[$k], 4,2);
					$sourcelastpictureday = substr($listdirectoriespics[$k], 6,2);
					$sourcelastpicturehour = substr($listdirectoriespics[$k], 8,2);
					$sourcelastpictureminute = substr($listdirectoriespics[$k], 10,2);
					$sourcelastpicturesecond = substr($listdirectoriespics[$k], 12,2);	
					$sourcelastpicturetimestamp = strftime("%s", mktime($sourcelastpicturehour,$sourcelastpictureminute,$sourcelastpicturesecond,$sourcelastpicturemonthnb,$sourcelastpictureday,$sourcelastpictureyear));
					$timediff = $currenttimestamp - $sourcelastpicturetimestamp;
					$sourceslastpicturedate[$j] = date('d M. Y H:i:s', $sourcelastpicturetimestamp);
					if ($sourceslastpicturedate[$j] == "") {$sourceslastpicturedate[$j] = "n/a";}
					$sourcelastpicturedate = new DateTime();
					$sourcelastpicturedate->setTimestamp($sourcelastpicturetimestamp);
					$sourceslastpicturediffdate[$j] = ago($sourcelastpicturedate);
					
					$webcampakconfig[$j] = wito_getfullconfig($config_etcdirectory . "config-source" . $j . ".cfg");
					$sourceslastpicturecronvalue[$j] = $webcampakconfig[$j]["cfgcroncapturevalue"];
					$sourceslastpicturecroninterval[$j] = $webcampakconfig[$j]["cfgcroncaptureinterval"];
					$sourceslastpicturelegend[$j] = $webcampakconfig[$j]["cfgimgtext"];			
					
					if ($sourceslastpicturecroninterval[$j] == "minutes") {$sourcelastpicturecronseconds = $sourceslastpicturecronvalue[$j] * 60; }
					else {$sourcelastpicturecronseconds = $sourceslastpicturecronvalue[$j] * 60;}
					
					if ($currenttimestamp - $sourcelastpicturetimestamp < 2 * $sourcelastpicturecronseconds) {
						$sourceslastpicturecolor[$j] = "green";
					}
					elseif ($currenttimestamp - $sourcelastpicturetimestamp < 5 * $sourcelastpicturecronseconds) {
						$sourceslastpicturecolor[$j] = "orange";
					}
					else {$sourceslastpicturecolor[$j] = "red";}	
					if ($webcampakconfig[$j]["cfgsourceactive"] == "no") {
						$sourceslastpicturecolor[$j] = "disabled";
					}
					$folder = $config_base . "sources/source" . $j . "/pictures/";
					$folder = escapeshellcmd($folder);
					$output = `du -sh $folder`;
					list($sourcessizepic[$j], $trash) = explode("/", $output);
					
					$folder = $config_base . "sources/source" . $j . "/videos/";
					$folder = escapeshellcmd($folder);
					$output = `du -sh $folder`;
					list($sourcessizevid[$j], $trash) = explode("/", $output);	
									
					$folder = $config_base . "sources/source" . $j . "/";
					$folder = escapeshellcmd($folder);
					$output = `du -sh $folder`;
					list($sourcessizetotal[$j], $trash) = explode("/", $output);
																	
					break;
				}
			}
			if ($sourceslastpicture[$j] != "") {
				break;
			}
		}
	}
}
$smarty->assign('SOURCELASTPICTURE', $sourceslastpicture);
$smarty->assign('SOURCELASTPICTUREDATE', $sourceslastpicturedate);
$smarty->assign('SOURCELASTPICTUREDIFFDATE', $sourceslastpicturediffdate);
$smarty->assign('SOURCELASTPICTURECRONVALUE', $sourceslastpicturecronvalue);
$smarty->assign('SOURCELASTPICTURECRONINTERVAL', $sourceslastpicturecroninterval);
$smarty->assign('SOURCELASTPICTURECOLOR', $sourceslastpicturecolor);
$smarty->assign('SOURCESIZEPIC', $sourcessizepic);
$smarty->assign('SOURCESIZEVID', $sourcessizevid);
$smarty->assign('SOURCESIZETOTAL', $sourcessizetotal);
$smarty->assign('SOURCELEGEND', $sourceslastpicturelegend);


	//SOURCE 1
	for ($j=1;$j<$config_nbsources;$j++) {
		$dirresultstmp = scandir($config_base . "sources/source" . $j . "/live/");
		$cptpicfiletmp = sizeof($dirresultstmp);
		$cptformat=0;
		for ($i=0;$i<$cptpicfiletmp;$i++) {
			if ($dirresultstmp[$i] != '.' && $dirresultstmp[$i] != '..' && substr($dirresultstmp[$i], -4,4) == ".jpg") {
				if(ereg("webcam",$dirresultstmp[$i])) {
					if ($dirresultstmp[$i] == "webcam.jpg") {
						$livebegsize[$cptformat] = "full";
						$livesize[$cptformat] = "full";	
						$livefilename[$cptformat] = $dirresultstmp[$i];
					} else {
						list($webcamprefix, $livesize[$cptformat]) = explode("-", $dirresultstmp[$i]);
						$livefilename[$cptformat] = $dirresultstmp[$i];
						$livesize[$cptformat] = str_replace(".jpg", "", $livesize[$cptformat]);				
						list($livebegsize[$cptformat], $webcamprefix) = explode("x", $livesize[$cptformat]);		
					}
					$cptformat++;
				}
			}
		}
		$smarty->assign('S' . $j . 'CPTFORMAT', $cptformat);
		$smarty->assign('S' . $j . 'SOURCE', $j);
		$smarty->assign('S' . $j . 'LIVEFILENAME', $livefilename);
		$smarty->assign('S' . $j . 'LIVEFILESIZE', $livesize);
		if ($cptpicfiletmp > 2 && sizeof($livebegsize) > 1) {
			//print_r($livebegsize);
			$smarty->assign('S' . $j . 'LIVEBEGSMALLESTFILESIZE', min($livebegsize));
		}
		$smarty->assign('S' . $j . 'LIVEBEGFILESIZE', $livebegsize);
	}	
	
	
if (is_file($config_langdir . "index.php")) {
	include($config_langdir . "index.php");
}
#$smarty->assign('LOCALE_HELP', $config_directory . 'include/languages/' . $config_lang . '/pages/' . 'locale.help.tpl');
$smarty->assign('CENTRAL', 'index.tpl');
$smarty->display('skeleton.tpl');
?>