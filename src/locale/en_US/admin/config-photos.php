<?php 
$smarty->assign('LANG_PHOTOS_SOURCE', "Source");
$smarty->assign('LANG_PHOTOS_TITLE', ": Pictures Configuration");
$smarty->assign('LANG_PHOTOS_TIP', "Tip:");

$smarty->assign('LANG_PHOTOS_TIME_TITLE', "Capture Timeframe");
$smarty->assign('LANG_PHOTOS_TIME_NORESTRICTIONS', "No timeframe restrictions:");
$smarty->assign('LANG_PHOTOS_TIME_START', "Begin captures at:");
$smarty->assign('LANG_PHOTOS_TIME_END', "End captures at:");
$smarty->assign('LANG_PHOTOS_TYPE_CAPTUREDELAYDATE', "Picture date:");
$smarty->assign('LANG_PHOTOS_TYPE_CAPTUREDELAYDATECAPTURE', "Capture time");
$smarty->assign('LANG_PHOTOS_TYPE_CAPTUREDELAYDATESCRIPT', "Script start time");

$smarty->assign('LANG_PHOTOS_CROP_TITLE', "Crop");
$smarty->assign('LANG_PHOTOS_CROP_ACTIVATE', "Crop pictures:");
$smarty->assign('LANG_PHOTOS_CROP_SIZE', "Size of the area:");
$smarty->assign('LANG_PHOTOS_CROP_LOCATION', "Location:");

$smarty->assign('LANG_PHOTOS_LEGEND_TITLE', "Insert Text");
$smarty->assign('LANG_PHOTOS_LEGEND_ACTIVATE', "Insert text into the picture:");
$smarty->assign('LANG_PHOTOS_LEGEND_LEGEND', "Text:");
$smarty->assign('LANG_PHOTOS_LEGEND_FORMAT', "Date format:");
$smarty->assign('LANG_PHOTOS_LEGEND_NODATE', "No date");
$smarty->assign('LANG_PHOTOS_LEGEND_FORMAT4', "Thursday 25 January 2010 - 09h30");
$smarty->assign('LANG_PHOTOS_LEGEND_FORMAT5', "25 January 2010 - 09h30");
$smarty->assign('LANG_PHOTOS_LEGEND_ADVANCED', "Advanced text configuration:");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTSIZE', "Font size:");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTLOCATION', "Text location:");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTSOUTHWEST', "Down left (southwest)");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTSOUTH', "Down middle (south)");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTSOUTHEAST', "Down right (southeast)");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTEAST', "Middle right (east)");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTNORTHEAST', "Top right (northeast)");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTNORTH', "Top middle (north)");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTNORTWEST', "Top left (northwest)");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTWEST', "Middle left (west)");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTNAME', "Font:");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTSHADOWCOLOR', "Shadow color:");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTSHADOWCOORDINATES', "Shadow coordinates:");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTCOLOR', "Font color:");
$smarty->assign('LANG_PHOTOS_LEGEND_FONTCOORDINATES', "Text coordinates:");

$smarty->assign('LANG_PHOTOS_WATERMARK_TITLE', "Insert Watermark (image on top of a picture)");
$smarty->assign('LANG_PHOTOS_WATERMARK_ACTIVATE', "Insert a watermark into the picture:");
$smarty->assign('LANG_PHOTOS_WATERMARK_SOURCE', "Watermark file:");
$smarty->assign('LANG_PHOTOS_WATERMARK_TRANSPARENCY', "Transparency:");
$smarty->assign('LANG_PHOTOS_WATERMARK_XCOORDINATE', "Horizontal coordinate (X):");
$smarty->assign('LANG_PHOTOS_WATERMARK_YCOORDINATE', "Vertical coordinate (Y):");
$smarty->assign('LANG_PHOTOS_WATERMARK_TIP', "Watermark files must be using 'PNG' format and be located within /watermark/ folder reachable via the FTP global account (via System tab), this folder is shared between all sources. <br />	Starting point for coordinates is to top left corner of the picture <br /> <strong>Warning:</strong> Filenames must not contain spaces of special characters.");

$smarty->assign('LANG_PHOTOS_PHIDGET_TITLE', "Insert Phidget sensors measurements");
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

$smarty->assign('LANG_PHOTOS_ARCHIVES_TITLE', "Archives");
$smarty->assign('LANG_PHOTOS_ARCHIVES_ACTIVATE', "Save pictures in the archives:");
$smarty->assign('LANG_PHOTOS_ARCHIVES_WARNING', "Warning, if saving picture is not activated it will not be possible to generate videos.");
$smarty->assign('LANG_PHOTOS_ARCHIVES_RESIZEACTIVATE', "Resize pictures before saving into archives:");
$smarty->assign('LANG_PHOTOS_ARCHIVES_RESIZESIZE', "New size (for example: 1024x768):");
$smarty->assign('LANG_PHOTOS_ARCHIVES_PICSIZE', "Pictures minimum size:");
$smarty->assign('LANG_PHOTOS_ARCHIVES_PICDELETE', "Pictures below this size wil be automatically deleted.");
$smarty->assign('LANG_PHOTOS_ARCHIVES_DELETEPICAFTER', "Delete pictures after:");
$smarty->assign('LANG_PHOTOS_ARCHIVES_DAYS', "days");
$smarty->assign('LANG_PHOTOS_ARCHIVES_DELETEPICAFTERDELETE', "0 = no limit. Once pictures are deleted it is not possible to generate videos of corresponding days.");
$smarty->assign('LANG_PHOTOS_ARCHIVES_MAXSIZE', "Maximum archive size:");
$smarty->assign('LANG_PHOTOS_ARCHIVES_MB', "Mbytes");
$smarty->assign('LANG_PHOTOS_ARCHIVES_MAXSIZEDELETE', "0 = no limit. Over this value, the oldest day of captures will automatically be deleted.");

$smarty->assign('LANG_PHOTOS_HOTLINK_TITLE', "Static pictures (hotlink)");
$smarty->assign('LANG_PHOTOS_HOTLINK_RESIZE', "Resize pictures:");
$smarty->assign('LANG_PHOTOS_HOTLINK_IFOTHER', "If other, please specify:");
$smarty->assign('LANG_PHOTOS_HOTLINK_OTHERSIZES', "Other size");
$smarty->assign('LANG_PHOTOS_HOTLINK_DISABLED', "Disabled");
$smarty->assign('LANG_PHOTOS_HOTLINK_FORMAT1', "File 1:");
$smarty->assign('LANG_PHOTOS_HOTLINK_FORMAT2', "File 2:");
$smarty->assign('LANG_PHOTOS_HOTLINK_FORMAT3', "File 3:");
$smarty->assign('LANG_PHOTOS_HOTLINK_FORMAT4', "File 4:");
$smarty->assign('LANG_PHOTOS_HOTLINK_EXAMPLE', "(for example: 1024x768)");
$smarty->assign('LANG_PHOTOS_HOTLINKERROR_ACTIVATE', "Generate hotlink image in case of capture error:");
$smarty->assign('LANG_PHOTOS_HOTLINK_TIP', "A static picture or video is a file which constantly keep the same name, only the content changes. Those pictures can be use by a website displaying a webcam for example. <br />");

$smarty->assign('LANG_PHOTOS_FTP_TITLE', "Send pictures via FTP");
$smarty->assign('LANG_PHOTOS_FTP_MAINFTP', "Send pictures to:");
$smarty->assign('LANG_PHOTOS_FTP_MAINFTPRETRY', "Number of retry in case of issue:");
$smarty->assign('LANG_PHOTOS_FTP_SECONDFTP', "Send a copy of pictures to:");
$smarty->assign('LANG_PHOTOS_FTP_SECONDFTPRETRY', "Number of retry in case of issue:");
$smarty->assign('LANG_PHOTOS_FTP_HOTLINKFTP', "Send hotlink pictures to:");
$smarty->assign('LANG_PHOTOS_FTP_HOTLINKRETRY', "Number or retry in case of issue:");
$smarty->assign('LANG_PHOTOS_FTP_DISABLED', "Disabled");
$smarty->assign('LANG_PHOTOS_FTP_NORETRY', "No retry");

$smarty->assign('LANG_PHOTOS_BUTTON', "Save");

?>