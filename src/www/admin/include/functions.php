<?php
	
function clean_url($name='') 
{
	$name = strtolower($name);
	$string= array("¥" => "Y", "µ" => "u", "À" => "A", "Á" => "A",
   "Â" => "A", "Ã" => "A", "Ä" => "A", "Å" => "A",
   "Æ" => "A", "Ç" => "C", "È" => "E", "É" => "E",
   "Ê" => "E", "Ë" => "E", "Ì" => "I", "Í" => "I",
   "Î" => "I", "Ï" => "I", "Ð" => "D", "Ñ" => "N",
   "Ò" => "O", "Ó" => "O", "Ô" => "O", "Õ" => "O",
   "Ö" => "O", "Ø" => "O", "Ù" => "U", "Ú" => "U",
   "Û" => "U", "Ü" => "U", "Ý" => "Y", "ß" => "s",
   "à" => "a", "á" => "a", "â" => "a", "ã" => "a",
   "ä" => "a", "å" => "a", "æ" => "a", "ç" => "c",
   "è" => "e", "é" => "e", "ê" => "e", "ë" => "e",
   "ì" => "i", "í" => "i", "î" => "i", "ï" => "i",
   "ð" => "o", "ñ" => "n", "ò" => "o", "ó" => "o",
   "ô" => "o", "õ" => "o", "ö" => "o", "ø" => "o",
   "ù" => "u", "ú" => "u", "û" => "u", "ü" => "u",
   "ý" => "y", "ÿ" => "y", "'" => "", "&" => "et", 
   "," => "", ":" => "", "=" => "", "+" => "", ";" => "",
   "(" => "", ")" => "", "[" => "", "]" => "", 
   "{" => "", "}" => "", "-" => "", "?" => "", "!" => "",
   "°" => "", "/" => "");
	$name = strtr($name, $string); 
	$name = str_replace(" ", "-", str_replace("%20", "-", $name) );
	//$name = ereg_replace("[^a-z0-9.-_]", "", $name);
	if ($name[0] == '.') { 
		$name = "_".$name;
	}
	if (!strlen($name)) { 
		$name = 'index';
	}
	return $name . ".html"; 
}

function clean_txt($name='') 
{
	//$name = strtolower($name);
	$string= array("¥" => "Y", "µ" => "u", "À" => "A", "Á" => "A",
   "Â" => "A", "Ã" => "A", "Ä" => "A", "Å" => "A",
   "Æ" => "A", "Ç" => "C", "È" => "E", "É" => "E",
   "Ê" => "E", "Ë" => "E", "Ì" => "I", "Í" => "I",
   "Î" => "I", "Ï" => "I", "Ð" => "D", "Ñ" => "N",
   "Ò" => "O", "Ó" => "O", "Ô" => "O", "Õ" => "O",
   "Ö" => "O", "Ø" => "O", "Ù" => "U", "Ú" => "U",
   "Û" => "U", "Ü" => "U", "Ý" => "Y", "ß" => "s",
   "à" => "a", "á" => "a", "â" => "a", "ã" => "a",
   "ä" => "a", "å" => "a", "æ" => "a", "ç" => "c",
   "è" => "e", "é" => "e", "ê" => "e", "ë" => "e",
   "ì" => "i", "í" => "i", "î" => "i", "ï" => "i",
   "ð" => "o", "ñ" => "n", "ò" => "o", "ó" => "o",
   "ô" => "o", "õ" => "o", "ö" => "o", "ø" => "o",
   "ù" => "u", "ú" => "u", "û" => "u", "ü" => "u",
   "ý" => "y", "ÿ" => "y", "'" => "", "&" => "et", 
   "," => "", ":" => "", "=" => "", "+" => "", ";" => "",
   "(" => "", ")" => "", "[" => "", "]" => "", 
   "{" => "", "}" => "", "-" => "", "?" => "", "!" => "",
   "°" => "");
	$name = strtr($name, $string); 
	return $name; 
}

function clean_xml($name='') 
{
	//$name = strtolower($name);
	$string= array("'" => "&#39;", "&" => "&amp;", ">" => "&gt;", "<" => "&lt;", "\"" => "&quot;");
	//$string= array("'" => "&#39;", "&" => "&amp;", ">" => "&gt;", "<" => "&lt;");
	$name = strtr($name, $string); 
	return $name; 
}


function deletetags($text, $rempl = "") {
	$text = ereg_replace("< [^>]*>", $rempl, $texte);
	return $text;
}

function htmltotxt($text) {
	$text = ereg_replace("[\n\r]+", " ", $text);
	$text = eregi_replace("< (p|br)([[:space:]][^>]*)?".">", "\n\n", $text);
	$text = ereg_replace("^\n+", "", $text);
	$text = ereg_replace("\n+$", "", $text);
	$text = ereg_replace("\n +", "\n", $text);
	$text = deletetags($text);
	$text = ereg_replace("( | )+", " ", $text);
	return $text;
}
function htmltotxtml($text) {
	$text = ereg_replace(">", "&gt;", $text);
	$text = ereg_replace("<", "&lt;", $text);
	$text = ereg_replace("\"", "&quot;", $text);
	/*$text = ereg_replace("[\n\r]+", " ", $text);
	$text = eregi_replace("< (p|br)([[:space:]][^>]*)?".">", "\n\n", $text);
	$text = ereg_replace("^\n+", "", $text);
	$text = ereg_replace("\n+$", "", $text);
	$text = ereg_replace("\n +", "\n", $text);
	$text = deletetags($text);
	$text = ereg_replace("( | )+", " ", $text);*/
	return $text;
}

function browserurl()
{
     return "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
}

function writelog($text, $config_logfile)
{
	//VERIFICATION TAILLE DU FICHIER
	//SI SUPPERIEUR A 500KO, RENOMMAGE ET COMPRESSION
	if (is_file($config_logfile)) {	
		if (filesize($config_logfile) > 500000) {
			gzcompressfile($config_logfile,$level=false);
			unlink($config_logfile);
		}
	}
	// AJOUT DU CONTENU DANS LE FICHIER 
	$logfile = fopen($config_logfile,"a");
	fwrite($logfile, "\r\n" . $text);
	fclose($logfile);
}

function gzcompressfile($source,$level=false){
   $dest=$source. date("d-m-Y-H-i", time()) . '.gz';
   $mode='wb'.$level;
   $error=false;
   if($fp_out=gzopen($dest,$mode)){
       if($fp_in=fopen($source,'rb')){
           while(!feof($fp_in))
               gzwrite($fp_out,fread($fp_in,1024*512));
           fclose($fp_in);
           }
         else $error=true;
       gzclose($fp_out);
       }
     else $error=true;
   if($error) return false;
     else return $dest;
   } 

function gen_passwd() {
	$tpass=array();
	$id=0;
	$taille=6;
	// récupération des chiffres et lettre
	for($i=48;$i<58;$i++) $tpass[$id++]=chr($i);
	for($i=65;$i<91;$i++) $tpass[$id++]=chr($i);
	for($i=97;$i<123;$i++) $tpass[$id++]=chr($i);
	$passwd="";
	for($i=0;$i<$taille;$i++) {
	$passwd.=$tpass[rand(0,$id-1)];
	}
return $passwd;
}


function transformesec($time){
    if ($time>=86400){ 
	    $jour = floor($time/86400);
	    $reste = $time%86400;
	    $heure = floor($reste/3600);
	    $reste = $reste%3600;
	    $minute = floor($reste/60);
	    $seconde = $reste%60;
	    if ($jour > 0) { $result = $jour.'j ';}
	    if ($heure > 0) { $result = $result . $heure.'h ';}
	    if ($minute > 0) { $result = $result . $minute.'min ';}
	    if ($seconde > 0) { $result = $result . $seconde.'s ';}
	    //$result = $jour.'j '.$heure.'h '.$minute.'min '.$seconde.'s';
    }
    elseif ($time < 86400 AND $time>=3600) {
   	$heure = floor($time/3600);
   	$reste = $time%3600;
   	$minute = floor($reste/60);
    	$seconde = $reste%60;
	    if ($heure > 0) { $result = $heure.'h ';}
	    if ($minute > 0) { $result = $result . $minute.'min ';}
	    if ($seconde > 0) { $result = $result . $seconde.'s ';}    	
    	//$result = $heure.'h '.$minute.'min '.$seconde.' s';
    }
    elseif ($time<3600 AND $time>=60)
    {
	    $minute = floor($time/60);
	    $seconde = $time%60;
	    if ($minute > 0) { $result = $minute.'min ';}
	    if ($seconde > 0) { $result = $result . $seconde.'s ';} 	    
	    //$result = $minute.'min '.$seconde.'s';
    }
    elseif ($time < 60)
    {
	    $result = $time.'s';
    }
 return $result;
}
	
?>