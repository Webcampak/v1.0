<?php 
$smarty->assign('LANG_VIDEOS_SOURCE', "Source");
$smarty->assign('LANG_VIDEOS_TITLE', ": Video configuration");
$smarty->assign('LANG_VIDEOS_TIP', "Tip:");

$smarty->assign('LANG_VIDEOS_DAILY_TITLE', "Daily video creation");
$smarty->assign('LANG_VIDEOS_DAILY_FORMAT', "Format");
$smarty->assign('LANG_VIDEOS_DAILY_WEB', "Web<br />(MP4)");
$smarty->assign('LANG_VIDEOS_DAILY_DESCRIPTION', "Description");
$smarty->assign('LANG_VIDEOS_DAILY_EFFECT', "Visual Effect*<br /><i>Test only</i>");
$smarty->assign('LANG_VIDEOS_DAILY_MINSIZE', "Min. size <br /><i>(KB)</i>");
$smarty->assign('LANG_VIDEOS_DAILY_SPEED', "Creation<br /><i>Speed</i>");
$smarty->assign('LANG_VIDEOS_DAILY_HD', "- High Definition (HD) - H.264:");
$smarty->assign('LANG_VIDEOS_DAILY_HDMAX', "HD Format, Highest quality.");
$smarty->assign('LANG_VIDEOS_DAILY_HDGOOD', "HD Format, High quality.");
$smarty->assign('LANG_VIDEOS_DAILY_SD', "- Standard Definition:");
$smarty->assign('LANG_VIDEOS_DAILY_SDDVD', "Similar to DVD.");
$smarty->assign('LANG_VIDEOS_DAILY_CUSTOM', "H. 264 (Custom):");
$smarty->assign('LANG_VIDEOS_DAILY_CUSTOMTXT', "H.264, customisable parameters.");
$smarty->assign('LANG_VIDEOS_DAILY_NO', "No");
$smarty->assign('LANG_VIDEOS_DAILY_WARNING', "<strong><span class='blue'>Warning:</span></strong><br /> - *Visual effect is only available for testing purposes, may be unstable and use a large amount of CPU/Memory. Creation time will be at least multiplied by two.");

$smarty->assign('LANG_VIDEOS_ADVANCED_TITLE', "Advanced Parameters - Video Compression");
$smarty->assign('LANG_VIDEOS_ADVANCED_FORMAT', "Format");
$smarty->assign('LANG_VIDEOS_ADVANCED_FPS', "FPS");
$smarty->assign('LANG_VIDEOS_ADVANCED_BITRATE', "Bitrate");
$smarty->assign('LANG_VIDEOS_ADVANCED_RESOLUTION', "Resolution");
$smarty->assign('LANG_VIDEOS_ADVANCED_CUT', "Cropping");
$smarty->assign('LANG_VIDEOS_ADVANCED_PASSES', "2 Passes");
$smarty->assign('LANG_VIDEOS_ADVANCED_HD', "- Hight Definition (HD) - H.264:");
$smarty->assign('LANG_VIDEOS_ADVANCED_SD', "- Standard Definition:");
$smarty->assign('LANG_VIDEOS_ADVANCED_CUSTOM', "H. 264 (Custom):");

$smarty->assign('LANG_VIDEOS_PREPROCESS_TITLE', "Advanced Parameters - Pre-processing manipulations");
$smarty->assign('LANG_VIDEOS_PREPROCESS_TEXT', "Those options allow you to modify pictures before video creation. You can use it do add an additional text, resize pictures ... Be careful those options will increase time necessary to create videos.<br />");
$smarty->assign('LANG_VIDEOS_PREPROCESS_LEGEND', "Insert Text");
$smarty->assign('LANG_VIDEOS_PREPROCESS_LEGENDTXT', "Insert text in the picture:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_LEGENDVALUE', "Text:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FORMAT', "Date format:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_NODATE', "No date");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FORMAT4', "Thursday 25 January 2010 - 09h30");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FORMAT5', "25 January 2010 - 09h30");
$smarty->assign('LANG_VIDEOS_PREPROCESS_ADVANCED', "Advanced text configuration:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTSIZE', "Font size:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTLOCATION', "Text location:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTSOUTHWEST', "Down left (southwest)");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTSOUTH', "Down middle (south)");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTSOUTHEAST', "Down right (southeast)");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTEAST', "Middle right (east)");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTNORTHEAST', "Top right (northeast)");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTNORTH', "Top middle (north)");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTNORTWEST', "Top left (northwest)");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTWEST', "Middle left (west)");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTNAME', "Font:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTSHADOWCOLOR', "Shadow color:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTSHADOWCOORDINATES', "Shadow coordinates:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTCOLOR', "Font color:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTCOORDINATES', "Text coordinates:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_RESIZE', "Resize");
$smarty->assign('LANG_VIDEOS_PREPROCESS_RESIZETXT', "Resize picture before video creation:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_RESIZETXTVALUE', "Picture size (for example: 2272x1704):");
$smarty->assign('LANG_VIDEOS_PREPROCESS_TIP', "This function is useful if source pictures are very large 10Mpix or more otherwise the video creation process might crash.");

$smarty->assign('LANG_VIDEOS_AUDIO_TITLE', "Audio track");
$smarty->assign('LANG_VIDEOS_AUDIO_ADDTRACK', "Add an audio track:");
$smarty->assign('LANG_VIDEOS_AUDIO_AUDIOFILE', "Audio file:");
$smarty->assign('LANG_VIDEOS_AUDIO_TIP', "Audio files must be uploaded via FTP to /audio/ directory available via the global ftp account (see 'System').<br /><strong>Warning:</strong> Filename must not contain any spaces or special characters.");

$smarty->assign('LANG_VIDEOS_WATERMARK_TITLE', "Insert Watermark (image on top of a picture)");
$smarty->assign('LANG_VIDEOS_WATERMARK_ADDWATERMARK', "Insert a watermark into the picture:");
$smarty->assign('LANG_VIDEOS_WATERMARK_WATERMARKFILE', "Watermark file:");
$smarty->assign('LANG_VIDEOS_WATERMARK_TRANSPARENCY', "Transparancy:");
$smarty->assign('LANG_VIDEOS_WATERMARK_XCOORDINATE', "Horizontale coordinate (X):");
$smarty->assign('LANG_VIDEOS_WATERMARK_YCOORDINATE', "Verticale coordinate (Y):");
$smarty->assign('LANG_VIDEOS_WATERMARK_TIP', "Watermark files must be using 'PNG' format and be located within /watermark/ folder reachable via the FTP global account (via System tab), this folder is shared between all sources. <br />	Starting point for coordinates is to top left corner of the picture <br /> <strong>Warning:</strong> Filenames must not contain spaces of special characters.");

$smarty->assign('LANG_VIDEOS_FILTER_TITLE', "Advanced Parameters - Filter similar pictures");
$smarty->assign('LANG_VIDEOS_FILTER_ACTIVATE', "Activate filtering");
$smarty->assign('LANG_VIDEOS_FILTER_TIP', "This option will compare consecutive pictures, if many parts are identical, pictures will not be considered.<br />
You can also apply a mask to pictures to focus the comparaison only on some portions of the pictures.<br /> 
Watermark files must be using 'PNG' format and be located within /watermark/ folder reachable via the FTP global account (via System tab), this folder is shared between all sources.<br />
This option is not compatible in case of transition (zoom, pan, ...)");
$smarty->assign('LANG_VIDEOS_FILTER_WATERMARKFILE', "Add a mask:");
$smarty->assign('LANG_VIDEOS_FILTER_VALUE', "Modifications threshold:");

$smarty->assign('LANG_PHOTOS_PHIDGET_TITLE', "Advanced Parameters - Insert Phidget sensors measurements");
$smarty->assign('LANG_PHOTOS_PHIDGET_TEMPERATURE_ACTIVATE', "Insert temperature within picture");
$smarty->assign('LANG_PHOTOS_PHIDGET_TEMPERATURE_SIZE', "Insert Size (for example: 320x240)");
$smarty->assign('LANG_PHOTOS_PHIDGET_TEMPERATURE_DISSOLVE', "Transparency:");
$smarty->assign('LANG_PHOTOS_PHIDGET_TEMPERATURE_XCOORDINATE', "Horizontal coordinate (X):");
$smarty->assign('LANG_PHOTOS_PHIDGET_TEMPERATURE_YCOORDINATE', "Vertical coordinate (Y):");
$smarty->assign('LANG_PHOTOS_PHIDGET_LUMINOSITY_ACTIVATE', "Insert luminosity within picture");
$smarty->assign('LANG_PHOTOS_PHIDGET_LUMINOSITY_SIZE', "Insert Size (for example: 320x240)");
$smarty->assign('LANG_PHOTOS_PHIDGET_LUMINOSITY_DISSOLVE', "Transparency:");
$smarty->assign('LANG_PHOTOS_PHIDGET_LUMINOSITY_XCOORDINATE', "Horizontal coordinate (X):");
$smarty->assign('LANG_PHOTOS_PHIDGET_LUMINOSITY_YCOORDINATE', "Vertical coordinate (Y):");

$smarty->assign('LANG_VIDEOS_PHIDGET_TITLE', "Insert Phidget sensors measurements");
$smarty->assign('LANG_VIDEOS_PHIDGET_INSERTIMAGE', "Picture insertion");
$smarty->assign('LANG_VIDEOS_PHIDGET_SENSOR', "Sensor");
$smarty->assign('LANG_VIDEOS_PHIDGET_TYPE', "Type");
$smarty->assign('LANG_VIDEOS_PHIDGET_PORT', "Port");
$smarty->assign('LANG_VIDEOS_PHIDGET_TEXT', "Legend");
$smarty->assign('LANG_VIDEOS_PHIDGET_COLOR', "Color");
$smarty->assign('LANG_VIDEOS_PHIDGET_INSERT', "Insert");
$smarty->assign('LANG_VIDEOS_PHIDGET_RESOLUTION', "Resolution");
$smarty->assign('LANG_VIDEOS_PHIDGET_TRANSPARENCY', "Transparency");
$smarty->assign('LANG_VIDEOS_PHIDGET_XLOCATION', "Location (x)");
$smarty->assign('LANG_VIDEOS_PHIDGET_YLOCATION', "Location (y)");
$smarty->assign('LANG_VIDEOS_ERROR_DISABLED', "Disabled");


$smarty->assign('LANG_VIDEOS_YOUTUBE_TITLE', "Youtube Upload");
$smarty->assign('LANG_VIDEOS_YOUTUBE_ACTIVATE', "Activate Youtube upload:");
$smarty->assign('LANG_VIDEOS_YOUTUBE_CATEGORY', "Video Category:");
$smarty->assign('LANG_VIDEOS_YOUTUBE_TIP', "To upload a video to Youtube an authentication key must be linked to your account and stored within the webcampak. Key creation has been made in our office, you sould have been provided with instructions to link this key to your google account.<br /> Video with the best quality will be uploaded to Youtube.<br />");

$smarty->assign('LANG_VIDEOS_FTP_TITLE', "Send videos via FTP");
$smarty->assign('LANG_VIDEOS_FTP_MAINAVI', "Send AVI video files to:");
$smarty->assign('LANG_VIDEOS_FTP_MAINMP4', "Send MP4 video files to:");
$smarty->assign('LANG_VIDEOS_FTP_HOTLINKAVI', "Send hotlink AVI video files to:");
$smarty->assign('LANG_VIDEOS_FTP_HOTLINKMP4', "Send hotlink MP4 video files to:");
$smarty->assign('LANG_VIDEOS_FTP_FTPRETRY', "Number or retry in case of failure:");
$smarty->assign('LANG_VIDEOS_FTP_DISABLED', "Disabled");
$smarty->assign('LANG_VIDEOS_FTP_NORETRY', "No retry");

$smarty->assign('LANG_VIDEOS_BUTTON', "Save");

?>
