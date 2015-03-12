<?php
	
function wito_getfullconfig($witoconfig) 
{
	 $string= array("\${cfgbasedir}" => "");
    $fd = @fopen($witoconfig,"r");
    if (!$fd) die("Impossible d'ouvrir le fichier: $witoconfig");
    $i = 1; // compteur de ligne
    while (!feof($fd)) {
        $ligne = fgets($fd, 1024);
        //if (stripos($ligne, $witoget . "=\"") !== false) {
        		list($witoconfig, $witovalue) = explode("=\"", $ligne);
        		list($witoparam, $witocomment) = explode("\"", $witovalue);
        		$witoparam =  strtr($witoparam, $string);
        		if ($witoparam != "") {
        			$witofullconf[$witoconfig] = $witoparam;
        			//echo $witoconfig . " = " . $witoparam . "<br />";
        		}
        //}
        $i++;
    }
    fclose($fd);
	 return $witofullconf; 
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

	
?>