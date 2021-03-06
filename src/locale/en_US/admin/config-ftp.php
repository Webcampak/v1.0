<?php 
$smarty->assign('LANG_CONFIGFTP_SOURCE', "Source");
$smarty->assign('LANG_CONFIGFTP_TITLE', ": FTP Parameters");
$smarty->assign('LANG_CONFIGFTP_TIP', "Tip:");


$smarty->assign('LANG_CONFIGFTP_FTPTEST_TITLE', "Test FTP configuration");
$smarty->assign('LANG_CONFIGFTP_FTPTEST_TYPE', "Type of test:");
$smarty->assign('LANG_CONFIGFTP_FTPTEST_TYPESIMPLE', "Simple test");
$smarty->assign('LANG_CONFIGFTP_FTPTEST_TYPEPIC', "Test with camera capture");
$smarty->assign('LANG_CONFIGFTP_FTPTEST_TYPEPICDISABLED', "Test with camera capture - disabled");
$smarty->assign('LANG_CONFIGFTP_FTPTEST_BUTTON', "Test FTP configuration");
$smarty->assign('LANG_CONFIGFTP_FTPTEST_LOG', "FTP Logs:");
$smarty->assign('LANG_CONFIGFTP_FTPTEST_TIP', "This function upload files to remote server, 'ftpupload.txt' will be uploaded to pictures directory.");

$smarty->assign('LANG_CONFIGFTP_ARCHIVES_TITLE', "FTP Configuration - Pictures and Videos");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_PICUPLOAD', "Upload pictures via FTP:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_VIDUPLOAD', "Upload full size videos via FTP:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_WEBVIDUPLOAD', "Upload 'web' size videos via FTP:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_FTPSERVER', "FTP Server:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_FTPUSERNAME', "Username:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_FTPPASSWORD', "Password:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_FTPBASEDIR', "Base directory:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_FTPPICDIR', "Photos directory:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_FTPVIDDIR', "Videos directory:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_FTPACTIVE', "FTP Active Mode (Port Mode):");

$smarty->assign('LANG_CONFIGFTP_SECONDFTP_TITLE', "FTP Configuration - Additional FTP");
$smarty->assign('LANG_CONFIGFTP_SECONDFTP_PICUPLOAD', "Upload pictures via FTP:");
$smarty->assign('LANG_CONFIGFTP_SECONDFTP_FTPSERVER', "FTP Server:");
$smarty->assign('LANG_CONFIGFTP_SECONDFTP_FTPUSERNAME', "Username:");
$smarty->assign('LANG_CONFIGFTP_SECONDFTP_FTPPASSWORD', "Password:");
$smarty->assign('LANG_CONFIGFTP_SECONDFTP_FTPPICDIR', "Photos directory:");
$smarty->assign('LANG_CONFIGFTP_SECONDFTP_FTPACTIVE', "FTP Active Mode (Port Mode):");

$smarty->assign('LANG_CONFIGFTP_HOTLINK_TITLE', "FTP Configuration - Static files (Hotlink)");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_PICUPLOAD', "Upload hotlink pictures* via FTP:");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_VIDUPLOAD', "Upload hotlink full size videos via FTP:");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_WEBVIDUPLOAD', "Upload hotlink 'web' size videos via FTP:");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_FTPSERVER', "FTP Server:");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_FTPUSERNAME', "Username:");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_FTPPASSWORD', "Password:");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_FTPDIR', "Hotlink directory*:");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_FTPACTIVE', "FTP Active Mode (Port Mode):");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_TIP', "'Hotlink' files always keep the same name and URL although their content is constantly changing. This kind of files can be used while inserting a live picture into a website.<br />
Hotlink files can be uploaded to the same directory than pictures and videos.
");
$smarty->assign('LANG_CONFIGFTP_BUTTON', "Save changes");

?>
