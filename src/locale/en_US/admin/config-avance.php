<?php 
$smarty->assign('LANG_CONFIGAVANCE_SOURCE', "Source");
$smarty->assign('LANG_CONFIGAVANCE_TITLE', ": Advanced Configuration");

$smarty->assign('LANG_CONFIGAVANCE_CONFIGURATIONFILE_TITLE', "Configuration file");
$smarty->assign('LANG_CONFIGAVANCE_CONFIGURATIONFILE_IMPORT', "Import configuration file:");
$smarty->assign('LANG_CONFIGAVANCE_CONFIGURATIONFILE_BUTTON', "Send");
$smarty->assign('LANG_CONFIGAVANCE_CONFIGURATIONFILE_UPLOADSUCCESS', "Configuration file updated.");
$smarty->assign('LANG_CONFIGAVANCE_CONFIGURATIONFILE_WARNING', "<strong><font color='red'>Warning:</font></strong> Importing a configuration file will erase previous configuration.	<br/>");
$smarty->assign('LANG_CONFIGAVANCE_CONFIGURATIONFILE_BUTTONDOWNLOAD', "Download configuration file");
$smarty->assign('LANG_CONFIGAVANCE_CONFIGURATIONFILE_BUTTONDISPLAY', "Display configuration file");

$smarty->assign('LANG_CONFIGFTP_LOCALFTP_TITLE', "Local FTP Server");
$smarty->assign('LANG_CONFIGFTP_LOCALFTP_USERNAME', "Username:");
$smarty->assign('LANG_CONFIGFTP_LOCALFTP_PASSWORD', "Password:");
$smarty->assign('LANG_CONFIGFTP_LOCALFTP_BUTTON', "Create/Edit user");
$smarty->assign('LANG_CONFIGFTP_LOCALFTP_TIP', "Local FTP is used to give access to pictures and videos stored within the webcampak and to allow remote cameras (IP cameras or other webcampaks) to upload pictures into /tmp/ directory.<br />
Warning, by default FTP accounts are not configured, please click on 'Create/Edit user' to enable local FTP.");

$smarty->assign('LANG_CONFIGAVANCE_EMAIL_TITLE', "Configure Email alerts");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_SENDTO', "Send to:");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_SENDCOPYTO', "Send a copy to: (@ email):");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_EMAILSOURCE', "Email source (@ email):");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_NBFAILURES', "Failure before sending email:");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_REMINDER', "Reminder every");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_REMINDER_FAILURE', "failures (0 = never)");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_SMTPSERVER', "SMTP Server:Port");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_SMTPTTLS', "SMTP Start TTLS:");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_SMTPAUTH', "SMTP Auth:");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_SMTPAUTHUSERNAME', "SMTP Auth Username:");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_SMTPAUTHPASSWORD', "SMTP Auth Password:");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_BUTTON', "Save");

$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_TITLE', "Phidget configuration for the source");
$smarty->assign('LANG_CONFIGAVANCE_ERROR_ACTIVATE', "Activate remote power cycle");
$smarty->assign('LANG_CONFIGAVANCE_GRAPH_ACTIVATE', "Create daily sensors graphs");
$smarty->assign('LANG_CONFIGAVANCE_ERROR_NBERRORS', "Number of failure before power cycling:");
$smarty->assign('LANG_CONFIGAVANCE_ERROR_PORT', "Port on which the relay is connected:");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_TEMPERATURE', "Port on which temperature sensor is connected:");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_LIGHT', "Port on which luminosity sensor is connected:");
$smarty->assign('LANG_CONFIGAVANCE_ERROR_DISABLED', "Disabled");

$smarty->assign('LANG_CONFIGAVANCE_INIT_TITLEINIT', "Reset (source ");
$smarty->assign('LANG_CONFIGAVANCE_INIT_TITLEEND', " only):"); 
$smarty->assign('LANG_CONFIGAVANCE_INIT_INITSOURCE', "Reset configuration for the source ");
$smarty->assign('LANG_CONFIGAVANCE_INIT_INITSOURCEBUTTON', "Reset source "); 
$smarty->assign('LANG_CONFIGAVANCE_INIT_INITVIDEO', "Are you sure you want to delete all pictures and videos ?:"); 
$smarty->assign('LANG_CONFIGAVANCE_INIT_INITVIDEOBUTTON', "Delete all pictures and videos "); 
$smarty->assign('LANG_CONFIGAVANCE_INIT_WARNING', "<strong><font color='red'>Warning:</strong> this action is definitive	</font><br/>"); 

$smarty->assign('LANG_CONFIGAVANCE_MOTION_TITLE', "Motion Detection (Experimental)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_ACTIVATE', "Activate motion detection");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_ONLY', "Only save pictures related to motion detection");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_DEVICE', "Video Source (USB Webcam)");

$smarty->assign('LANG_CONFIGAVANCE_MOTION_DEVICEWIDTH', "Source width (pixel width)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_DEVICEHEIGHT', "Source height (pixel height)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_THRESHOLD', "Threshold (modified pixels)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_ENDEVENT', "Number of seconds before considering the motion event completed");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_BUTTON', "Save");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_TIP', "Warning:");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_WARNING', "This option has been created to be used with the capture source being a DSLR camera<br />
Motion detection will be performed by a USB Webcam.");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_INTERVAL', "Minimum Interval:");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_SECONDS', "Seconds");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_MINUTES', "Minutes");

$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_INSERTIMAGE', "Picture insertion");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_SENSOR', "Sensor");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_TYPE', "Type");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_PORT', "Port");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_TEXT', "Legend");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_COLOR', "Color<br/>(ex:#FF0000)");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_INSERT', "Insert");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_RESOLUTION', "Resolution");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_TRANSPARENCY', "Transparency");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_XLOCATION', "Location (x)");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_YLOCATION', "Location (y)");

$smarty->assign('LANG_CONFIGAVANCE_FTPADVANCED', "Advanced FTP settings");
$smarty->assign('LANG_CONFIGAVANCE_FTPRETRY', "Number of retry in case of transmission failure:");
$smarty->assign('LANG_CONFIGAVANCE_FTPPRIMARY', "Main FTP");
$smarty->assign('LANG_CONFIGAVANCE_FTPSECONDARY', "Secondary FTP");
$smarty->assign('LANG_CONFIGAVANCE_FTPHOTLINK', "Hotlink FTP");
$smarty->assign('LANG_CONFIGAVANCE_FTPNORETRY', "No Retry");
$smarty->assign('LANG_CONFIGAVANCE_FTPSENDPIC', "Picture");
$smarty->assign('LANG_CONFIGAVANCE_FTPSENDAVI', "Video (avi)");
$smarty->assign('LANG_CONFIGAVANCE_FTPSENDFLV', "Video (mp4)");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_FTP', "Send phidget measurements via FTP");

$smarty->assign('LANG_CONFIGAVANCE_FTP_MAINFTPRETRY', "Number of retry in case of failure:");
$smarty->assign('LANG_CONFIGAVANCE_FTP_DISABLED', "Disabled");
$smarty->assign('LANG_CONFIGAVANCE_FTP_NORETRY', "No Retry");

?>
