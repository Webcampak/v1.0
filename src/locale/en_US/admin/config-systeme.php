<?php 
$smarty->assign('LANG_SYSTEME_TITLE', "System Configuration");
$smarty->assign('LANG_SYSTEME_TIP', "Tip:");

$smarty->assign('LANG_SYSTEME_PRESENTATION_TITLE', "Presentation");
$smarty->assign('LANG_SYSTEME_PRESENTATION_TITLEDESCRIPTION', "You are currently connected to the administration panel of your Webcampak.<br />You can use menus on the left to navigate through the system.");

$smarty->assign('LANG_SYSTEME_VPN_STARTED', "Started");
$smarty->assign('LANG_SYSTEME_VPN_STOPPED', "Stopped");

$smarty->assign('LANG_SYSTEME_ASSISTANCE_TITLE', "Remote Help");
$smarty->assign('LANG_SYSTEME_ASSISTANCE_STATUS', "VPN client status:");
$smarty->assign('LANG_SYSTEME_ASSISTANCE_START', "Start remote control");
$smarty->assign('LANG_SYSTEME_ASSISTANCE_STOP', "Stop remote control");
$smarty->assign('LANG_SYSTEME_ASSISTANCE_TIP', "Remote control/help is a VPN tunnel established between your webcampak and our offices, we can then connect to your webcampak through this secured tunnel.");

$smarty->assign('LANG_SYSTEME_MULTI_TITLE', "Multi-cameras environment (Point-and-shoot and DSLR)");
$smarty->assign('LANG_SYSTEME_MULTI_AUTODETECT', "Activate USB port auto-detect:");
$smarty->assign('LANG_SYSTEME_MULTI_TYPES', "Camera Model:");
$smarty->assign('LANG_SYSTEME_MULTI_CURRENT', "Currently: ");
$smarty->assign('LANG_SYSTEME_MULTI_DIFFERENT', "Different models");
$smarty->assign('LANG_SYSTEME_MULTI_IDENTICAL', "Identical models");
$smarty->assign('LANG_SYSTEME_MULTI_BUTTON', "Save");
$smarty->assign('LANG_SYSTEME_MULTI_TIP', "This is only useful when multiple USB Compacts/DSLR cameras are used.");

$smarty->assign('LANG_SYSTEME_PHIDGET_TITLE', "Phidget electronic board");
$smarty->assign('LANG_SYSTEME_PHIDGET_ACTIVATE', "Activate Phidget");
$smarty->assign('LANG_SYSTEME_PHIDGET_SCREEN', "Source to be displayed: ");
$smarty->assign('LANG_SYSTEME_PHIDGET_SCREEN_DISABLED', "Disabled");
$smarty->assign('LANG_SYSTEME_PHIDGET_SCREEN_SOURCE', "Source");

$smarty->assign('LANG_SYSTEME_FTP_TITLE', "Global FTP account");
$smarty->assign('LANG_SYSTEME_FTP_USERNAME', "Username:");
$smarty->assign('LANG_SYSTEME_FTP_PASSWORD', "Password:");
$smarty->assign('LANG_SYSTEME_FTP_BUTTON', "Create/Edit user");
$smarty->assign('LANG_SYSTEME_FTP_TIP', "Those credentials are used to access a shared resources directory. Logs, Audio files, Watermarks are located in this directory.");

$smarty->assign('LANG_SYSTEME_STATS_TITLE', "Stats");
$smarty->assign('LANG_SYSTEME_STATS_ACTIVATE', "Activate stats gathering");

$smarty->assign('LANG_SYSTEME_GPHOTO_TITLE', "Gphoto2 Version");
$smarty->assign('LANG_SYSTEME_UPTIME_TITLE', "Uptime & Disk");
$smarty->assign('LANG_SYSTEME_PS_TITLE', "System Processes (ps aux)");

?>