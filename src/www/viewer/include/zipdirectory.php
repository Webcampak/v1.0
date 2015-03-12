<?php
/*$zip = new ZipArchive();
$zip->open("Source_" . $config_source . "_" . $currentyear . $currentmonthnb . $currentday . ".zip", ZipArchive::CREATE);

$dirName = $config_campictures . $currentyear . $currentmonthnb . $currentday;

if (!is_dir($dirName)) {
    throw new Exception('Directory ' . $dirName . ' does not exist');
}

$dirName = realpath($dirName);
if (substr($dirName, -1) != '/') {
    $dirName.= '/';
}

$dirStack = array($dirName);
//Find the index where the last dir starts
$cutFrom = strrpos(substr($dirName, 0, -1), '/')+1;

while (!empty($dirStack)) {
    $currentDir = array_pop($dirStack);
    $filesToAdd = array();

    $dir = dir($currentDir);
    while (false !== ($node = $dir->read())) {
        if (($node == '..') || ($node == '.')) {
            continue;
        }
        if (is_dir($currentDir . $node)) {
            array_push($dirStack, $currentDir . $node . '/');
        }
        if (is_file($currentDir . $node)) {
            $filesToAdd[] = $node;
        }
    }

    $localDir = substr($currentDir, $cutFrom);
    $zip->addEmptyDir($localDir);
   
    foreach ($filesToAdd as $file) {
        $zip->addFile($currentDir . $file, $localDir . $file);
    }
}
//$zip->fileclose();
$zip->open();
*/


	 
$createZip = new CreateZipFile;
	 
$createZip->zipDirectory($config_campictures . $currentyear . $currentmonthnb . $currentday, '');
 
$zipFileName = "Source_" . $config_source . "_" . $currentyear . $currentmonthnb . $currentday . ".zip";
$handle       = fopen($zipFileName, 'wb');
$out           = fwrite($handle, $createZip->getZippedFile());
 
fclose($handle);
 
$createZip->forceDownload($zipFileName);
 
@unlink($zipFileName);



?>
