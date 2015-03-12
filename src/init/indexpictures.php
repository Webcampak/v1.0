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
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
<title>Affichage des images</title>
<style type="text/css">
<!--
a {
	color: #369;
	text-decoration: none;
}
a:hover {
	color : #30569D;
	text-decoration : underline;
}
a:active {
	color : #FF9900;
	text-decoration : underline;
}

a.calendar-date {
	font-weight: bold;
	color: black;
}

sup { vertical-align: super; font-size: 8px; } 

table.calendar {
border: 1px solid black;
}
table.calendar td.calendar-date {
	font-size: 1em;
	text-align: center;
	font-weight: bold;
}

table.hours td{
	font-size: 0.7em;
	border-left: 1px solid black;
	border-right: 1px solid black;
}
table.hours td:hover{
	background: #b5c9fb;
}

table.hours td.hours-first {
	border-top: 1px solid black;
}

table.hours td.hours-00 {
	border-top: 1px solid black;
}

table.hours td.hours-30 {
	border-top: 1px dashed black;
}

table.hours td.hours-last {
	border-top: 1px dashed black;
	border-bottom: 1px solid black;
}

table.hours td.blank {
	border: 0px;
}

table.hours td.hours-content-first {
	border-top: 1px solid black;
}

table.hours td.hours-content-00 {
	border-top: 1px solid black;
}

table.hours td.hours-content-30 {
	border-top: 1px dashed black;
}

table.hours td.hours-content-last {
	border-top: 1px dashed black;
	border-bottom: 1px solid black;
}
table.hours tr.row1 {
	background-color: #FFFFFF;
}

table.hours td.selected {
	font-weight: bold;
	border: 1px dashed black;
	background: #b5c9fb;
}

table.months {
	text-align: center;
}
table.months td.selected {
	font-weight: bold;
	border: 1px dashed black;
	background: #b5c9fb;
}
table.months td:hover {
	font-weight: bold;
	background: #b5c9fb;
}
table.days td.selected {
	font-weight: bold;
	border: 1px dashed black;
	background: #b5c9fb;
}
table.days td.title {
	font-size: 1.1em;
	font-weight: bold;
	text-align: center;
}
table.days td:hover {
	font-weight: bold;
	background: #b5c9fb;
}

} -->
</style> 
</head>
<body>

<?php
	//setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
	//setlocale ("LC_TIME", "fr");
	//setlocale(LC_ALL, 'fr_FR.UTF-8');
	setlocale(LC_TIME,"fr_FR.UTF-8");
	$dirname = explode("/", dirname(dirname($_SERVER["PHP_SELF"])));
	$dirsize = count($dirname);
	$dispdirname = ucfirst($dirname[$dirsize - 1]);
	//echo "<big><b>" . $dirname[$dirsize - 1] . "</b></big> <br />";
	
	//echo "++" . dirname(dirname($_SERVER["PHP_SELF"])) . "<br />";	
	
	//echo strftime("%A %e %B %Y", mktime(0, 0, 0, 12, 22, 1978));

	//PARAMETRES
	// 1: Affichage du calendrier
	// 2: Affichage des horaires
	// 3: Affichage des secondes 
	if (strip_tags($_GET['params']) != "") {
		$dispcalendar = substr(strip_tags($_GET['params']), 0,1);
		$disphours = substr(strip_tags($_GET['params']), 1,1);
		$dispseconds = substr(strip_tags($_GET['params']), 2,1);
		$disphome = substr(strip_tags($_GET['params']), 3,1);
		$dispstyle = substr(strip_tags($_GET['params']), 4,1);		
		$dispparams = $dispcalendar . $disphours . $dispseconds . $disphome . $dispstyle;
	} else {
		// Paramètres d'affichage par défaut
		$dispcalendar = "1";
		$disphours = "1";
		$dispseconds = "0";
		$disphome = "0";
		$dispstyle = "0";			
		$dispparams = $dispcalendar . $disphours . $dispseconds . $disphome . $dispstyle;
	}
	if (strip_tags($_GET['imgwidth']) != "") {	
		$imgwidth = strip_tags($_GET['imgwidth']);
	} else {
		$imgwidth = "640";	
	}
		
	if (strip_tags($_GET['timestamp']) != "") {
		$currentdate = strip_tags($_GET['timestamp']);
		$currentyear = substr($currentdate, 0,4);
		$currentmonthnb = substr($currentdate, 4,2);
		$currentday = substr($currentdate, 6,2);
		$currenthour = substr($currentdate, 8,2);
		$currentminute = substr($currentdate, 10,2);
		$currentsecond = substr($currentdate, 12,2);	
		//$currentmonth = date("M", mktime($currenthour,$currentminute,$currentsecond,$currentmonthnb,$currentday,$currentyear));		
		$currentmonth = ucwords(strftime("%b", mktime($currenthour,$currentminute,$currentsecond,$currentmonthnb,$currentday,$currentyear)));		
		$currentmonthnbdays = date("t", mktime($currenthour,$currentminute,$currentsecond,$currentmonthnb,$currentday,$currentyear));		
	}
	else {
		$currentdate = date("YmdHis");
		$currentyear = date("Y");
		$currentmonth = ucwords(strftime("%b"));//M
		$currentmonthnb = date("m");
		$currentmonthnbdays = date("t");
		$currentday = date("d");
		$currenthour = date("H");
		$currentminute = date("i");
		$currentsecond = date("s");
	}

	function php4_scandir($dir,$listDirectories=true, $skipDots=true) {
    	$dirArray = array();
    	if ($handle = opendir($dir)) {
    	    while (false !== ($file = readdir($handle))) {
    	        if (($file != "." && $file != "..") || $skipDots == true) {
    	            if($listDirectories == false) { if(is_dir($file)) { continue; } }
    	            array_push($dirArray,basename($file));
    	        }
    	    }
    	    closedir($handle);
    	}
    	return $dirArray;
	}

	//echo "Current Date: $currentdate <br />";
	$dirresultstmp = php4_scandir(".");
	sort($dirresultstmp);
	$cptpicfiletmp = sizeof($dirresultstmp);
	//$cptformat=0;
	for ($i=0;$i<$cptpicfiletmp;$i++) {	
		if (substr($dirresultstmp[$i], 0,2)== "20") {
			$currentdaydir = $dirresultstmp[$i];
			//echo "L1: " . $dirresultstmp[$i] . "<br />";			
			$dirresultsday[$currentdaydir] = php4_scandir($dirresultstmp[$i] . "/");
			sort($dirresultsday[$currentdaydir]);
			$cptpicdayfiletmp = sizeof($dirresultsday[$currentdaydir]);
			for ($j=0;$j<$cptpicdayfiletmp;$j++) {				
				$wholetimestamp[$cptwhole] =  $dirresultsday[$currentdaydir][$j];
				//echo $wholetimestamp[$cptwhole] . "<br />";
				if ($dirresultsday[$currentdaydir][$j] == $currentdate . ".jpg") {
					$browsecpt = $cptwhole;
				}
				if (substr($dirresultsday[$currentdaydir][$j], 0,4)== $currentyear && substr($dirresultsday[$currentdaydir][$j], 4,2) == $currentmonthnb ) {
					$tmpdirresultsday = 0;
					$tmpdirresultsday = substr($dirresultstmp[$i], 6,2) * 1;
					$tmploopcpt = $dailyflvresultscpt[$tmpdirresultsday];
					$dailypicresults[$tmpdirresultsday][$tmploopcpt] = $dirresultsday[$currentdaydir][$j];
					$dailypicresultscpt[$tmpdirresultsday] = $dailypicresultscpt[$tmpdirresultsday] + 1;
					if (substr($dirresultsday[$currentdaydir][$j], 6,2) == $currentday) {
						$timestamptable[$cpttimestamp] = substr($dirresultstmp[$i], 0,14);
						$cpttimestamp++;
						$tmpdirresultshour = 0;
						$tmpdirresultshour = substr($dirresultsday[$currentdaydir][$j], 8,2) * 1;
						$tmploopcpthour = $hourlypicresultscpt[$tmpdirresultshour] * 1;
						$hourlypicresults[$tmpdirresultshour][$tmploopcpthour] = substr($dirresultsday[$currentdaydir][$j], 0,14);
						$hourlypicresultscpt[$tmpdirresultshour] = $hourlypicresultscpt[$tmpdirresultshour] + 1;
					}				
				}
				$cptwhole++;				
			}
		}
	}
	if ($disphome == "1") {
		echo "<a href='/'>Home</a><br />";
	}
	if ($dispstyle == "1") {
		echo "<center>";
		echo "<big><b>" . $dispdirname . "</b></big> <br />";
		if (is_file(substr($wholetimestamp[$browsecpt - 1], 0,8) . "/" . $wholetimestamp[$browsecpt - 1]) || is_file(substr($wholetimestamp[$browsecpt + 1], 0,8) . "/" . $wholetimestamp[$browsecpt + 1])) {
			if (strip_tags($_GET['timestamp']) == "" && substr($timestamptable[$cpttimestamp - 2], 0,14) != "") {
				echo '<a href="index.php?timestamp=' . substr($timestamptable[$cpttimestamp - 2], 0,14) . '&params=' . $dispparams . '&imgwidth=' . $imgwidth . '"><- Précédent</a>';
				//echo "Selectionnez une date";
			}elseif (is_file(substr($wholetimestamp[$browsecpt - 1], 0,8) . "/" . $wholetimestamp[$browsecpt - 1]) && is_file(substr(strip_tags($_GET['timestamp']), 0,8) . "/" . strip_tags($_GET['timestamp']) . ".jpg")) {
				echo '<a href="index.php?timestamp=' . substr($wholetimestamp[$browsecpt - 1], 0,14) . '&params=' . $dispparams . '&imgwidth=' . $imgwidth . '"><- Précédent</a>';
			}
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";		
			if (strip_tags($_GET['timestamp']) == "") {
				echo " ";
			}elseif (is_file(substr($wholetimestamp[$browsecpt + 1], 0,8) . "/" . $wholetimestamp[$browsecpt + 1])  && is_file(substr(strip_tags($_GET['timestamp']), 0,8) . "/" . strip_tags($_GET['timestamp']) . ".jpg")) {
				echo '<a href="index.php?timestamp=' . substr($wholetimestamp[$browsecpt + 1], 0,14) . '&params=' . $dispparams . '&imgwidth=' . $imgwidth . '">Suivant -></a>';
			}
		}
		echo "<br />";
		if (is_file(substr(strip_tags($_GET['timestamp']), 0,8) . "/" . strip_tags($_GET['timestamp']) . ".jpg")) {
				echo "<a href='" . substr(strip_tags($_GET['timestamp']), 0,8) . "/" . strip_tags($_GET['timestamp']) . ".jpg' target='_blank'><img src='" . substr(strip_tags($_GET['timestamp']), 0,8) . "/" . strip_tags($_GET['timestamp']) . ".jpg' width='" . $imgwidth . "' /></a><br />";		
		} elseif (is_file(substr($timestamptable[$cpttimestamp - 1], 0,8) . "/" . $timestamptable[$cpttimestamp - 1] . ".jpg")) {
			echo "<a href='" . substr($timestamptable[$cpttimestamp - 1], 0,8) . "/" . $timestamptable[$cpttimestamp - 1] . "' target='_blank'><img src='" . substr($timestamptable[$cpttimestamp - 1], 0,8) . "/" . $timestamptable[$cpttimestamp - 1] . "' width='" . $imgwidth . "' /></a><br />";
		} else {
			echo "Aucune image disponible ce jour à cette heure<br />";
		}
			echo "</center>";
	}
	echo "
	<center>
	<table>
	<tr valign='top'>
	<td width='130' align ='center'>";
	echo "<br />";
	echo "<table  class='months'>";
	echo "<tr>
			<td align='center'><a href='index.php?timestamp=" . date("YmdHis", mktime("0","0","0", $currentmonthnb - 1,$currentday,$currentyear)) . "&params=" . $dispparams . "&imgwidth=" . $imgwidth . "'><</a></td>
			<td colspan='5' align='center'>" . $currentmonth . ". " . $currentyear . "</td>
			<td align='center'><a href='index.php?timestamp=" . date("YmdHis", mktime("0","0","0", $currentmonthnb + 1,$currentday,$currentyear)) . "&params=" . $dispparams . "&imgwidth=" . $imgwidth . "'>></a></td>
			</tr>";
	echo "<tr>
			<td width='15' align='center'><b>" . ucwords(strftime("%a", mktime("0","0","0",$currentmonthnb,1,$currentyear))) . "</b></td>
			<td width='15' align='center'><b>" . ucwords(strftime("%a", mktime("0","0","0", $currentmonthnb,"2",$currentyear))) . "</b></td>
			<td width='15' align='center'><b>" . ucwords(strftime("%a", mktime("0","0","0", $currentmonthnb,"3",$currentyear))) . "</b></td>
			<td width='15' align='center'><b>" . ucwords(strftime("%a", mktime("0","0","0", $currentmonthnb,"4",$currentyear))) . "</b></td>
			<td width='15' align='center'><b>" . ucwords(strftime("%a", mktime("0","0","0", $currentmonthnb,"5",$currentyear))) . "</b></td>
			<td width='15' align='center'><b>" . ucwords(strftime("%a", mktime("0","0","0", $currentmonthnb,"6",$currentyear))) . "</b></td>
			<td width='15' align='center'><b>" . ucwords(strftime("%a", mktime("0","0","0", $currentmonthnb,"7",$currentyear))) . "</b></td>
			</tr>";
	for ($i=1;$i<$currentmonthnbdays+1;$i++) {
		if ($i == 1) {echo "<tr>";}
			//$dailyflvresults[$tmpdirresultsday][$tmploopcpt] = $dirresultstmp[$i];
			//$dailyflvresultscpt[$tmpdirresultsday] = $dailyflvresultscpt[$tmpdirresultsday] + 1;				
			if ($dailypicresultscpt[$i] >= 1) {
				if ($currentday == $i) {
					echo "<td class='selected'>";
				}
				else {
					echo "<td>";
				}
				echo "<a href='index.php?timestamp=" . date("YmdHis", mktime($currenthour,$currentminute,$currentsecond,$currentmonthnb,$i,$currentyear)) . "&params=" . $dispparams . "&imgwidth=" . $imgwidth . "'>" . $i . "</a></td>";				
			} else {
				echo "<td>" . $i . "</td>";
			}
		if ($i == 7 || $i == 14 || $i == 21 || $i == 28) {echo "</tr><tr>";}
	}
	echo "</tr>";
	echo "</table>";
	echo "</td>
	<td width='15'></td>";
	if ($dispstyle == "0") {	
		echo "<td width='645' align ='center'>";
		echo "<big><b>" . $dispdirname . "</b></big> <br />";
		if (is_file(substr($wholetimestamp[$browsecpt - 1], 0,8) . "/" . $wholetimestamp[$browsecpt - 1]) || is_file(substr($wholetimestamp[$browsecpt + 1], 0,8) . "/" . $wholetimestamp[$browsecpt + 1])) {
			if (strip_tags($_GET['timestamp']) == "" && substr($timestamptable[$cpttimestamp - 2], 0,14) != "") {
				echo '<a href="index.php?timestamp=' . substr($timestamptable[$cpttimestamp - 2], 0,14) . '&params=' . $dispparams . '&imgwidth=' . $imgwidth . '"><- Précédent</a>';
				//echo "Selectionnez une date";
			}elseif (is_file(substr($wholetimestamp[$browsecpt - 1], 0,8) . "/" . $wholetimestamp[$browsecpt - 1]) && is_file(substr(strip_tags($_GET['timestamp']), 0,8) . "/" . strip_tags($_GET['timestamp']) . ".jpg")) {
				echo '<a href="index.php?timestamp=' . substr($wholetimestamp[$browsecpt - 1], 0,14) . '&params=' . $dispparams . '&imgwidth=' . $imgwidth . '"><- Précédent</a>';
			}
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";		
			if (strip_tags($_GET['timestamp']) == "") {
				echo " ";
			}elseif (is_file(substr($wholetimestamp[$browsecpt + 1], 0,8) . "/" . $wholetimestamp[$browsecpt + 1])  && is_file(substr(strip_tags($_GET['timestamp']), 0,8) . "/" . strip_tags($_GET['timestamp']) . ".jpg")) {
				echo '<a href="index.php?timestamp=' . substr($wholetimestamp[$browsecpt + 1], 0,14) . '&params=' . $dispparams . '&imgwidth=' . $imgwidth . '">Suivant -></a>';
			}
		}
		echo "<br />";		
		if (is_file(substr(strip_tags($_GET['timestamp']), 0,8) . "/" . strip_tags($_GET['timestamp']) . ".jpg")) {
				echo "<a href='" . substr(strip_tags($_GET['timestamp']), 0,8) . "/" . strip_tags($_GET['timestamp']) . ".jpg' target='_blank'><img src='" . substr(strip_tags($_GET['timestamp']), 0,8) . "/" . strip_tags($_GET['timestamp']) . ".jpg' width='" . $imgwidth . "' /></a><br />";		
		} elseif (is_file(substr($timestamptable[$cpttimestamp - 1], 0,8) . "/" . $timestamptable[$cpttimestamp - 1] . ".jpg")) {
			echo "<a href='" . substr($timestamptable[$cpttimestamp - 1], 0,8) . "/" . $timestamptable[$cpttimestamp - 1] . "' target='_blank'><img src='" . substr($timestamptable[$cpttimestamp - 1], 0,8) . "/" . $timestamptable[$cpttimestamp - 1] . "' width='" . $imgwidth . "' /></a><br />";
		} else {
			echo "Aucune image disponible ce jour à cette heure<br />";
		}
		echo "</td>
		<td width='15'></td>";
	}	
	echo"	<td width='130' align>";
	echo "<br />";
	//$hourlypicresults[$tmpdirresultshour][$tmploopcpthour] = $dirresultstmp[$i];
	//$hourlypicresultscpt[$tmpdirresultshour] = $hourlypicresultscpt[$tmpdirresultshour] + 1;	
	echo "<table class='hours' cellpadding='0' cellspacing='0'>";
	for ($i=0;$i<24;$i++) {
		//if ($i > 100) {
			echo "<tr><td class='";
			if ($i == 0) { echo "hours-first"; }
			elseif ($i == 23) { echo "hours-last"; }			
			elseif ($i & 1 == 1) { echo "hours-30"; }
			else { echo "hours-00"; }			
			echo "' width='20' bgcolor='#e4e4e4'><b>";
			if ($i < 10) {echo "0" . $i;}
			else {echo $i;}
			echo "h</b></td>
			<td class='";
			if ($i == 0) { echo "hours-content-first"; }
			elseif ($i == 23) { echo "hours-content-last"; }			
			elseif ($i & 1 == 1) { echo "hours-content-30"; }
			else { echo "hours-content-00"; }					
			echo "' bgcolor='#FFFFFF'><table><tr>";		
			echo "<tr>";

			for ($j=0;$j<$hourlypicresultscpt[$i]; $j++) {
				$hourlypicresultsdisp = "";
				$hourlypicresultsdisp = substr($hourlypicresults[$i][$j], 10,2) * 1 . "&acute;";
				if ($hourlypicresultsdisp <10) {
					$hourlypicresultsdisp = "0" . $hourlypicresultsdisp;
				}
				if ($dispseconds == "1") {
					$hourlypicresultsdisp = $hourlypicresultsdisp . "<sup>" . substr($hourlypicresults[$i][$j], 12,2) . "&acute;&acute;</sup>";											
				}				
				if ($hourlypicresults[$i][$j] == $currentdate) {
					echo "<td class='selected'><a href='index.php?timestamp=" . $hourlypicresults[$i][$j] . "&params=" . $dispparams . "&imgwidth=" . $imgwidth . "'>" . $hourlypicresultsdisp . "</a></td>";
				} else {
					echo "<td class='blank'><a href='index.php?timestamp=" . $hourlypicresults[$i][$j] . "&params=" . $dispparams . "&imgwidth=" . $imgwidth . "'>" . $hourlypicresultsdisp . "</a></td>";
				}
			}
			echo "</tr></table></td></tr>";
		}
	//}
	echo "</table>";	

	echo "</td>	
	</tr>	
	</center>	
	</table>";
?>
</body>
</html>