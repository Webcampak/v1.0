<?php
	
function wito_getconfig($witoconfig, $witoget) 
{
	 $string= array("\${cfgbasedir}" => "");	 
    $fd = @fopen($witoconfig,"r");
    if (!$fd) die("Impossible d'ouvrir le fichier: $witoconfig");
    $i = 1; // compteur de ligne
    while (!feof($fd)) {
        $ligne = fgets($fd, 1024);
        if (stripos($ligne, $witoget . "=\"") !== false) {
        		list($witoconfig, $witovalue) = explode("=\"", $ligne);
        		list($witoparam, $witocomment) = explode("\"", $witovalue);
        		$witoparam =  strtr($witoparam, $string);
        }
        $i++;
    }
    fclose($fd);
	 return $witoparam; 
}

function wito_getfullconfig($witoconfig) 
{
    /*$string= array("\${cfgbasedir}" => "");
    $fd = @fopen($witoconfig,"r");
    if (!$fd) die("Impossible d'ouvrir le fichier: $witoconfig");
    $i = 1; // compteur de ligne
    while (!feof($fd)) {
        $ligne = fgets($fd, 1024);
		# Old config, not compatible with configobj
		#list($witoconfig, $witovalue) = explode("=\"", $ligne);
		#list($witoparam, $witocomment) = explode("\"", $witovalue);
	# START NEW SECTION
	if ($ligne[0] != "#") {
		if (isset($ligne)) {
			list($witoconfig, $witovalue) = explode("=", $ligne);
			if (isset($witovalue)) {	    
				list($witoparam, $witocomment) = explode("#", $witovalue);
				#echo "Cat: " . $witoconfig . " NOSUB:$witoparam-" .$witoparam[0] . "-" . substr($witoparam,-1) . "<br />";
				if ($witoparam[0] == "\"") { #&& substr($witoparam,-1) == "\""
					$witoparam = substr($witoparam,1);
					list($witoparam, $witotrash) = explode("\"", $witoparam);
					##echo "SUB: $witoparam <br />";
				}
				# END NEW SECTION
				#list($witoparam, $witocomment) = explode("\"", $witovalue);
				$witoparam =  strtr($witoparam, $string);
				if ($witoparam != "") {
					$witoconfig = rtrim($witoconfig);
					$witofullconf["$witoconfig"] = $witoparam;
				}
				$i++;
			}
		}
	}
    }
    fclose($fd);
    return $witofullconf; */
    $witofullconf = parse_ini_file($witoconfig, FALSE, $scanner_mode = INI_SCANNER_RAW);
   // foreach($witofullconf as $key=>$value)
   // {
//	    echo $key.' : '.$value.'<br />';
 //   }
    //echo "<pre>" . print_r($witofullconf) . "</pre>";
    foreach($witofullconf as $key=>$value)
    {
	    $value = trim(str_replace("\"", "", $value));
	    $witofullconf[$key] = $value;
//	    echo " - " . $key.' : '.$value.'<br />';
    }
     
    return $witofullconf;
}

function wito_writeconfig($witoconfig, $witoparameters) 
{
	$content = file_get_contents($witoconfig);
	$convert = explode("\n", $content);
	for ($i=0;$i<count($convert);$i++) 
	{
		if ($convert[$i][0] != "#") {
			//echo "Ligne $i :" . $convert[$i] . "<br />";
			//echo "Param:" . $witoparameters["cfgcustomvidname"] . "<br />";
			foreach ($witoparameters as $fcconfkey=>$fcconfvalue) {
				list($getwitoparam, $getwitojunk) = explode("=",$convert[$i]);
				if (str_replace(' ', '', $getwitoparam) == $fcconfkey) {
					$convert[$i] = $fcconfkey . '="' . $fcconfvalue . '" ';
					//echo "=> Ligne $i :" . $convert[$i] . "<br />";
				}
			}
		}
		//else {
		//str_replace(' ', '', $getwitoparam);
		//	echo "Ligne $i :" . $convert[$i][0] . "<br />";
		//}
	}
	$f=fopen($witoconfig,"w");
	for ($i=0;$i<count($convert);$i++) 
	{
		if ($convert[$i] != "") {
			//echo "=> Ligne $i :" . $convert[$i] . "<br />";
			fwrite($f, $convert[$i] . "\n");
		}
	}
	fclose($f);
}
function wito_setconfig($witoconfig, $witoparam, $witovalue) 
{
	//echo "CONF: " . $witoconfig . " - PARAM:" . $witoparam . "=" . $witovalue . "==<br />";
	$convert = "";
	$content = file_get_contents($witoconfig);
	$convert = explode("\n", $content);
	$newcontent = "";
	for ($i=0;$i<count($convert);$i++) 
	{
	    #echo $convert[$i].', '; //write value by index
	    #echo "Ligne $i :" . $convert[$i] . "<br />";
	    list($getwitoparam, $getwitojunk) = explode("=",$convert[$i]);
	    #echo "ifxx" . $witoparam . "xx==xx" . $getwitoparam . "xx - Line $i - xx" . $convert[$i] . "xx<br />";
	    if ($getwitoparam == $witoparam) {
	    #if (strpos($convert[$i], substr($witoparam, 1)) != FALSE && $convert[0] != "") {
		list($getwitojunk, $getwitocomment) = explode("#",$convert[$i]);
		#$convert[$i] = $witoparam . '="' . $witovalue . '" #' . $getwitocomment;
		$convert[$i] = $witoparam . '="' . $witovalue . '" ';
		//echo "Ligne $i :" . $convert[$i] . "<br />";
		#echo "<br />";
	    }
	    #$newcontent = $newcontent . '\n' . $convert[$i];
	    #echo "Newcontet:" .  $newcontent;
	}
	$f=fopen($witoconfig,"w");
	for ($i=0;$i<count($convert);$i++) 
	{
	    fwrite($f, $convert[$i] . "\n");
	}
	fclose($f);

	 #echo "<pre>";
#print_r($newcontent);
#echo "</pre>";
	#file_put_contents($witoconfig , $newcontent); 

	#if (strpos($witovalue, ",") != FALSE) {
	#    $texte = preg_replace('`' . $witoparam . '="(.*?)"`', '' . $witoparam . '="' . $witovalue . '"', $texte);
	#} else {
	#    $texte = preg_replace('`' . $witoparam . '=(.*?)#`', '' . $witoparam . '="' . $witovalue . '" #', $texte);
	#    #$texte = preg_replace('`' . $witoparam . '="(.*?)"`', '' . $witoparam . '="' . $witovalue . '"', $texte);
	#}
	#file_put_contents($witoconfig , $texte); 

}

function wito_replacechars($text) 
{
	//echo "<br />TEXT1: " . $text;	
	$text = ereg_replace('"', "''", $text);
	stripslashes($text);
	//echo "<br />TEXT2: " . $text;		
	return $text;
}

function wito_returndate($filename) 
{
	$mois[1] = "Janvier";	
	$mois[2] = "F�vrier";	
	$mois[3] = "Mars";	
	$mois[4] = "Avril";	
	$mois[5] = "Mai";	
	$mois[6] = "Juin";	
	$mois[7] = "Juillet";	
	$mois[8] = "Aout";	
	$mois[9] = "Septembre";	
	$mois[10] = "Octobre";	
	$mois[11] = "Novembre";	
	$mois[12] = "D�cembre";
	$retyear = substr($filename, -8,4);
	$monthnb = substr($filename, -4,2) * 1;
	$retmonth = $mois[$monthnb];
	$retday = substr($filename, -2,2);
	//$text = ereg_replace("\\", "", $text);
	return $retday . " " . $retmonth . " " . $retyear;
}

function wito_returnfulldate($filename) 
{
	$mois[1] = "Janvier";	
	$mois[2] = "F�vrier";	
	$mois[3] = "Mars";	
	$mois[4] = "Avril";	
	$mois[5] = "Mai";	
	$mois[6] = "Juin";	
	$mois[7] = "Juillet";	
	$mois[8] = "Aout";	
	$mois[9] = "Septembre";	
	$mois[10] = "Octobre";	
	$mois[11] = "Novembre";	
	$mois[12] = "D�cembre";
	$retyear = substr($filename, -12,4);
	$monthnb = substr($filename, -8,2) * 1;
	$retmonth = $mois[$monthnb];
	$retday = substr($filename, -6,2);
	$rethour = substr($filename, -4,2);
	$retminute = substr($filename, -2,2);
	//$text = ereg_replace("\\", "", $text);
	return $retday . " " . $retmonth . " " . $retyear . " " . $rethour . "h" . $retminute;
}

function wito_returntimestamp($filename) 
{
	$retyear = substr($filename, -12,4);
	$monthnb = substr($filename, -8,2) * 1;
	$retday = substr($filename, -6,2);
	$rethour = substr($filename, -4,2);
	$retminute = substr($filename, -2,2);
	//$text = ereg_replace("\\", "", $text);
	//int mktime  ([ int $hour = date("H")  [, int $minute = date("i")  [, int $second = date("s")  [, int $month = date("n")  [, int $day = date("j")  [, int $year = date("Y")  [, int $is_dst = -1  ]]]]]]] )
	return mktime($rethour,$retminute,0,$monthnb,$retday,$retyear);
	//return $retday . " " . $retmonth . " " . $retyear . " " . $rethour . "h" . $retminute;
}

function formatSize($size){
    switch (true){
    case ($size > 1099511627776):
        $size /= 1099511627776;
        $suffix = ' TB';
    break;
    case ($size > 1073741824):
        $size /= 1073741824;
        $suffix = ' GB';
    break;
    case ($size > 1048576):
        $size /= 1048576;
        $suffix = ' MB';   
    break;
    case ($size > 1024):
        $size /= 1024;
        $suffix = ' KB';
        break;
    default:
        $suffix = ' MB';
    }
    return round($size, 2).$suffix;
}

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
        $suffix = ' MB';
    }
    return round($size, 1).$suffix;
}

function wito_diskspace($partition) 
{	
	$dt = disk_total_space($partition);
  	$df = disk_free_space($partition);
  $freespace = $df / 1048576;
  $totalspace = $dt / 1048576;
/*  $usedspace = $totalspace - $freespace;
  $pourcent = $usedspace / $totalspace;
  if($pourcent < 80) {
      $toreturn = '<font color="#f90000">';
  } elseif($pourcent >=80 && $pourcent < 90) {
      $toreturn = '<font color="f9a300">';
  } else {
      $toreturn = '<font color="#00b600">';
  }
  $pourcent = $pourcent * 100;
  $pourcent = round($pourcent, 1);
  $pourcent = 100 - $pourcent;
  $usedsize = $dt - $df;
  $toreturn = $toreturn . "Espace disque disponible " . $pourcent . "% (" . formatSize($usedsize) . " utilis�s / " . formatSize($dt) . " disponibles) </font>";
*/
  //return $toreturn;
  return array ($totalspace, $freespace);
}
//function wito_setconfig($name='') cfgimgtext="

function unzip($file, $path='', $wipe_zip=false, $source_id){
	$tab_liste_fichiers = array(); //Initialisation
	//echo "initialisation <br />";
	$zip = zip_open($file);
	if (is_resource($zip)) {
		while ($zip_entry = zip_read($zip)) {
			if (zip_entry_filesize($zip_entry) > 0){
				$complete_path = $path.dirname(zip_entry_name($zip_entry));
				/*On supprime les �ventuels caract�res sp�ciaux et majuscules*/
				$nom_fichier = zip_entry_name($zip_entry);
				$nom_fichier = strtr($nom_fichier,
				"�����������������������������������������������������",
				"AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn");
				$nom_fichier = strtolower($nom_fichier);
				$nom_fichier = preg_replace('/[^a-zA-Z0-9.]/','-',$nom_fichier);
				$nom_fichier = str_replace("e.c", "e" . $source_id . ".c", $nom_fichier);
				$nom_fichier = str_replace("e-v", "e" . $source_id . "-v", $nom_fichier);								
				//echo "On ajoute le nom du fichier dans le tableau <br />";
				array_push($tab_liste_fichiers,$nom_fichier);
				$complete_name = $path.$nom_fichier;
				if(!file_exists($complete_path)){
					$tmp = '';
					foreach(explode('/',$complete_path) AS $k) {
						$tmp .= $k.'/';
						if(!file_exists($tmp)){
							mkdir($tmp, 0755);
						}
					}
				}
				//echo "On extrait le fichier <br />";
				if (zip_entry_open($zip, $zip_entry, "r")) {
					$fd = fopen($complete_name, 'w');
					fwrite($fd, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)));
					fclose($fd);
					zip_entry_close($zip_entry);
				}
			}
		}
		zip_close($zip);
		/*On efface �ventuellement le fichier zip d'origine*/
		if ($wipe_zip === true){
			unlink($file);
		}
		return $tab_liste_fichiers;
	}
	return FALSE;
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
	
?>