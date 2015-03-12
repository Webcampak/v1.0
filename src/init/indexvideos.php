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
<title>Affichage des vidéos</title>
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



/*}}}*/


/*{{{ go buttons */

/*}}}*/


} -->
</style>
<script src="flowplayer/js/flowplayer-3.2.2.min.js"></script>
<script src="http://static.flowplayer.org/js/flowplayer.playlist-3.0.7.min.js"></script>	
</head>
<body>



<?php
	//setlocale (LC_TIME, 'fr_FR.utf8','fra');
	//setlocale(LC_TIME,"fr_FR.UTF-8"); 
	setlocale (LC_TIME, 'fr_FR','fra'); 

function formatSizeSmall($size){
    switch (true){
    case ($size > 1099511627776):
        $size /= 1099511627776;
        $suffix = ' T';
    break;
    case ($size > 1073741824):
        $size /= 1073741824;
        $suffix = ' G';
    break;
    case ($size > 1048576):
        $size /= 1048576;
        $suffix = ' M';   
    break;
    case ($size > 1024):
        $size /= 1024;
        $suffix = ' K';
        break;
    default:
        $suffix = ' B';
    }
    return round($size, 1).$suffix;
}
	
function date_fr($date)
{
$date=str_replace ("Monday","Lundi",$date);
$date=str_replace ("Tuesday","Lundi",$date);
$date=str_replace ("Wednesday","Lundi",$date);
$date=str_replace ("Thursday","Lundi",$date);
$date=str_replace ("Friday","Lundi",$date);
$date=str_replace ("Saturday","Lundi",$date);
$date=str_replace ("Sunday","Lundi",$date);


$date=str_replace("January","Janvier",$date);
$date=str_replace("February","Février",$date);
$date=str_replace("March","Mars",$date);
$date=str_replace("April","Avril",$date);
$date=str_replace("May","Mai",$date);
$date=str_replace("June","Juin",$date);
$date=str_replace("July","Juillet",$date);
$date=str_replace("August","Août",$date);
$date=str_replace("September","Septembre",$date);
$date=str_replace("October","Octobre",$date);
$date=str_replace("November","Novembre",$date);
$date=str_replace("December","Décembre",$date);
return ($date);
}



	$dirresultstmp = scandir(".");
	sort($dirresultstmp);
	$cptpicfiletmp = sizeof($dirresultstmp);
	$cptothers = 0;
	echo "<table align='center'>
	<tr>
		<td valign='top'>";
	if (is_file(strip_tags($_GET['flvfile']))) {		
		echo '<a href="' . strip_tags($_GET['flvfile']) . '" '; 
		echo 'style="display:block;width:425px;height:300px;" '; 
		echo 'id="player">'; 
		echo '</a><br />';
	}		
	echo "</td>
	
	<td>";
	echo "<table class='hours' cellpadding='1' cellspacing='0'>";
	echo "<tr>
	<td class='hours-first' bgcolor='#e4e4e4' align='center'><b>Télécharger</b></td>	
	<td class='hours-first' bgcolor='#e4e4e4' align='center'><b>Voir</b></td>
	<td class='hours-first' bgcolor='#e4e4e4' align='center'><b>Nom</b></td>
	<td class='hours-first' bgcolor='#e4e4e4' align='center'><b>Date de création</b></td>
	<td class='hours-first' bgcolor='#e4e4e4' align='center'><b>Taille</b></td>
	</tr>		
	";
	for ($i=0;$i<$cptpicfiletmp;$i++) {
		if (substr($dirresultstmp[$i], -4,4) == ".avi" || substr($dirresultstmp[$i], -4,4) == ".mp4" || substr($dirresultstmp[$i], -4,4) == ".mpeg" || substr($dirresultstmp[$i], -4,4) == ".wmv") {		
			echo "<tr>";
			echo "<td>&nbsp;";						
			if (substr($dirresultstmp[$i], -4,4) != ".flv") {
				echo "<a href='" . $dirresultstmp[$i] . "' target='_blank'> [Téléch.] </a>";
			}
			echo "&nbsp;</td>";
			echo "<td>&nbsp;";
			$flvfile[$i] =	str_replace("avi", "flv", $dirresultstmp[$i]);
			$flvfile[$i] =	str_replace("mp4", "flv", $flvfile[$i]);
			$flvfile[$i] =	str_replace("mpeg", "flv", $flvfile[$i]);
			$flvfile[$i] =	str_replace("wmv", "flv", $flvfile[$i]);			
			if (is_file($flvfile[$i])) {
				echo "<a href='index.php?flvfile=" . $flvfile[$i] . "'> [Voir] </a>";
				
			}			
			echo "&nbsp;</td>";			
			echo "<td>" . $dirresultstmp[$i] . "</td>";
			//echo "<td>" . Date_litterale_FR(filemtime($dirresultstmp[$i])) . "</td>";
			echo "<td>" . date_fr(date ("d F Y H\hi", filemtime($dirresultstmp[$i]))) . "</td>";			
			echo "<td align='center'>" . formatSizeSmall(filesize($dirresultstmp[$i])) . "</td>";
			$otherfiles[$cptothers] = $dirresultstmp[$i];
			echo "</tr>";
			$cptothers++;	
		}
	}
	echo "<td class='hours-content-last' colspan='5'>&nbsp;</td>";
	echo "</table>";
	echo "</td></tr></table>";	
	//echo($closest);

?>
<script language="JavaScript"> 
	flowplayer("player", "flowplayer/flowplayer-3.2.2.swf"); 
</script>
</body>
</html>