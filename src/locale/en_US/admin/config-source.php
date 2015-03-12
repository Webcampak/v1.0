<?php 
$smarty->assign('LANG_SOURCE_SOURCE', "Source");
$smarty->assign('LANG_SOURCE_TITLE', ": Device configuration");
$smarty->assign('LANG_SOURCE_TIP', "Tip:");

$smarty->assign('LANG_SOURCE_TYPE_TITLE', "Source configuration");
$smarty->assign('LANG_SOURCE_TYPE_ACTIVATE', "Activate source:");
$smarty->assign('LANG_SOURCE_TYPE_SOURCETYPE', "Type:");
$smarty->assign('LANG_SOURCE_TYPE_SOURCEGPHOTO', "Compact or DSLR USB Camera (Gphoto2 PTP mode)");
$smarty->assign('LANG_SOURCE_TYPE_SOURCEWEBCAM', "USB Webcam");
$smarty->assign('LANG_SOURCE_TYPE_SOURCECAMIP', "IP Camera(FTP)");
$smarty->assign('LANG_SOURCE_TYPE_SOURCEWEB', "Internet Picture (HTTP ou FTP)");
$smarty->assign('LANG_SOURCE_TYPE_SOURCESTREAMING', "Video Streaming (RTSP)");
$smarty->assign('LANG_SOURCE_TYPE_SOURCESENSOR', "Sensor (Phidget)");
$smarty->assign('LANG_SOURCE_TYPE_INTERVAL', "Minimum Interval:");
$smarty->assign('LANG_SOURCE_TYPE_SECONDS', "Seconds");
$smarty->assign('LANG_SOURCE_TYPE_MINUTES', "Minutes");
$smarty->assign('LANG_SOURCE_TYPE_CAPTUREDELAY', "Capture delay (secondes):");
$smarty->assign('LANG_SOURCE_TYPE_DEBUG', "Activate debug:");
$smarty->assign('LANG_SOURCE_TYPE_EMAILALERT', "Activate email alerts:");
$smarty->assign('LANG_SOURCE_TYPE_BLOCK', "Block automated capture:");
$smarty->assign('LANG_SOURCE_TYPE_BUTTON', "Save");
$smarty->assign('LANG_SOURCE_TYPE_TIP', "Using 'Block automated capture' during configuration unlock additionnal functionalities.");


$smarty->assign('LANG_SOURCE_CAPTURE_CAPTUREPICTURE', "Capture picture");
$smarty->assign('LANG_SOURCE_CAPTURE_CAPTURESAVEPICTURE', "Manual Capture");
$smarty->assign('LANG_SOURCE_CAPTURE_CAPTUREPICTUREDISABLED', "Disabled function, please use 'Block automated capture' option.");

$smarty->assign('LANG_CRON_SOURCE_STARTCAPTURE', "Capture every ");
$smarty->assign('LANG_CRON_SOURCE_SECONDS', "Seconds");
$smarty->assign('LANG_CRON_SOURCE_MINUTES', "Minutes");
$smarty->assign('LANG_CRON_SOURCE_HOURS', "Hours");

$smarty->assign('LANG_CRON_TYPE_CAPTUREDELAYDATE', "Picture date*:");
$smarty->assign('LANG_CRON_TYPE_CAPTUREDELAYDATECAPTURE', "Capture time");
$smarty->assign('LANG_CRON_TYPE_CAPTUREDELAYDATESCRIPT', "Script start time");

$lang_cron_day[1] = "Monday";
$lang_cron_day[2] = "Tuesday";
$lang_cron_day[3] = "Wednesday";
$lang_cron_day[4] = "Thursday";
$lang_cron_day[5] = "Friday";
$lang_cron_day[6] = "Saturday";
$lang_cron_day[7] = "Sunday";
$smarty->assign('LANG_CRON_DAYS', $lang_cron_day);

$smarty->assign('LANG_CRON_CALENDAR_TITLE', "Capture calendar");
$smarty->assign('LANG_CRON_CALENDAR_ENABLE', "Activate calendar");
$smarty->assign('LANG_CRON_CALENDAR_ENABLE_MORE', "If disabled, the system will capture 24/7");
$smarty->assign('LANG_CRON_CALENDAR_TIME_START', "Between ");
$smarty->assign('LANG_CRON_CALENDAR_TIME_END', " and ");

$smarty->assign('LANG_SOURCE_GPHOTO_TITLE', "Configuration of '<u>Compact or DSLR USB Camera (Gphoto2 PTP mode)</u>'");
$smarty->assign('LANG_SOURCE_GPHOTO_CAMERAMODEL', "Camera Model:<br /><i>Multi-Camera environment only</i>");
$smarty->assign('LANG_SOURCE_GPHOTO_CAMERAPORT', "Camera Port:<br /><i>Multi-Camera environment only</i>");
$smarty->assign('LANG_SOURCE_GPHOTO_CURRENTCONF', "Currently: ");
$smarty->assign('LANG_SOURCE_GPHOTO_AUTO', "Automatic");
$smarty->assign('LANG_SOURCE_GPHOTO_CAMERAOWNER', "Camera Owner (TAG):<br /><i>Multi-Camera environment only</i>");
$smarty->assign('LANG_SOURCE_GPHOTO_CAMERAOWNERAPPLIED', "Modification applied");
$smarty->assign('LANG_SOURCE_GPHOTO_CAMERAOWNERASSIGN', "Assign (Save configuration before)");
$smarty->assign('LANG_SOURCE_GPHOTO_NOSPACES', "No spaces or Special Characters.");
$smarty->assign('LANG_SOURCE_GPHOTO_APPLYCALIBRATION', "Apply calibration at startup (testing purposes only):");
$smarty->assign('LANG_SOURCE_GPHOTO_CALIBRATE', "Calibrate camera (testing purposes only)");
$smarty->assign('LANG_SOURCE_GPHOTO_DISABLED', "Disabled function, please use 'Block automated capture' option.");
$smarty->assign('LANG_SOURCE_GPHOTO_SUPPORTED', "<i>A list of supported cameras is available <a href='http://www.gphoto.org/doc/remote/' target='_blank'>here</a></i>");
$smarty->assign('LANG_SOURCE_GPHOTO_TIP', "If you are working in a multi camera environment it will be necessary to specify the camera model (see 'Connected devices' for the full name). <br />If you are using two identical cameras you can set a different 'owner' on each camera, this tag will then be used by the system to identify the two cameras.");

$smarty->assign('LANG_SOURCE_USBWEBCAM_TITLE', "Configuration of '<u>USB Webcam</u>'");
$smarty->assign('LANG_SOURCE_USBWEBCAM_NATIVESIZE', "Native webcam resolution:");
$smarty->assign('LANG_SOURCE_USBWEBCAM_OTHERSIZE', "Other resolution");
$smarty->assign('LANG_SOURCE_USBWEBCAM_IFOTHER', " If other, please specify: ");
$smarty->assign('LANG_SOURCE_USBWEBCAM_DEVICE', "Device (bus_info):");
$smarty->assign('LANG_SOURCE_USBWEBCAM_ADVANCED', "Advanced configuration");
$smarty->assign('LANG_SOURCE_USBWEBCAM_ATTRIBUTE', "Attribut");
$smarty->assign('LANG_SOURCE_USBWEBCAM_RESOLUTION', "(for example: 1024x768)");
$smarty->assign('LANG_SOURCE_USBWEBCAM_NEW', "New");
$smarty->assign('LANG_SOURCE_USBWEBCAM_CURRENT', "Current");
$smarty->assign('LANG_SOURCE_USBWEBCAM_DEFAULT', "Default");
$smarty->assign('LANG_SOURCE_USBWEBCAM_DETAILS', "Details");
$smarty->assign('LANG_SOURCE_USBWEBCAM_BRIGHTNESS', "Brightness:");
$smarty->assign('LANG_SOURCE_USBWEBCAM_CONTRAST', "Contrast:");
$smarty->assign('LANG_SOURCE_USBWEBCAM_SATURATION', "Saturation:");
$smarty->assign('LANG_SOURCE_USBWEBCAM_GAIN', "Gain:");
$smarty->assign('LANG_SOURCE_USBWEBCAM_INSTRUCTIONS', "Values in %, for default values, please refer to logs after a fresh start");

$smarty->assign('LANG_SOURCE_CAMERAIP_TITLE', "Configuration of '<u>IP Camera</u>'");
$smarty->assign('LANG_SOURCE_CAMERAIP_LIMITROTATION', "Limit hotlink processing to one picture per rotation:");
$smarty->assign('LANG_SOURCE_CAMERAIP_HOTLINKERROR', "Take actions (send email, create error thumbnails, ...) if no new pictures are available in /tmp/ directory.");
$smarty->assign('LANG_SOURCE_CAMERAIP_SOURCETYPE', "Define picture date based upon:");
$smarty->assign('LANG_SOURCE_CAMERAIP_ANYTYPES', "Date when it was saved into /tmp/ directory");
$smarty->assign('LANG_SOURCE_CAMERAIP_WEBCAMPAK', "Picture filename (Webcampak) - format: YYYYMMDDHHMMSS.jpg");
$smarty->assign('LANG_SOURCE_CAMERAIP_EXIF', "EXIF Metadata");
$smarty->assign('LANG_SOURCE_CAMERAIP_TIP', "By limiting FTP upload to one picture per rotation you also limit the amount of data to be sent to your FTP server if your IP camera is configured to send a lot of files. <br /> All pictures are stored in the archives and can be used for video creation.<br /><br />	Option 'Other Webcampak' means that pictures are uploaded by another webcampak.");

$smarty->assign('LANG_SOURCE_PHIDGET_TITLE', "Configuration of '<u>Sensor (Phidget)</u>'");
$smarty->assign('LANG_SOURCE_GRAPH_ACTIVATE', "Create daily graph");
$smarty->assign('LANG_SOURCE_ERROR_DISABLED', "Disabled");
$smarty->assign('LANG_SOURCE_PHIDGET_SENSOR', "Sensor");
$smarty->assign('LANG_SOURCE_PHIDGET_TYPE', "Type");
$smarty->assign('LANG_SOURCE_PHIDGET_PORT', "Port");
$smarty->assign('LANG_SOURCE_PHIDGET_TEXT', "Name");
$smarty->assign('LANG_SOURCE_PHIDGET_COLOR', "Color<br />(ex: #FF0000)");
$smarty->assign('LANG_SOURCE_PHIDGET_FTP', "Send to: ");
$smarty->assign('LANG_SOURCE_FTP_MAINFTPRETRY', "Number of retry in case of error:");
$smarty->assign('LANG_SOURCE_FTP_DISABLED', "Disabled");
$smarty->assign('LANG_SOURCE_FTP_NORETRY', "No retry");

$smarty->assign('LANG_SOURCE_SOURCEWEB_TITLE', "Configuration of '<u>Internet Picture</u>' or '<u>Video Streaming</u>'");
$smarty->assign('LANG_SOURCE_SOURCEWEB_URL', "URL File/Stream:");
$smarty->assign('LANG_SOURCE_SOURCEWEB_DELAY', "Delay before downloading (advanced):");
$smarty->assign('LANG_SOURCE_SOURCEWEB_TIP', "Webcampak is compatible with  HTTP, FTP, RTSP sources.<br />	If you want to use a file located on a remote FTP server you can use the following URL: ftp://User:Password@Server/Directory/File.jpg <br />	Note: Only JPG format is supported.<br /> Example of a RTSP stream: rtsp://192.168.1.21/mpeg4");
$smarty->assign('LANG_SOURCE_BUTTON', "Save");



?>
