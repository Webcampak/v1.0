<?php 
$smarty->assign('LANG_VIDEOS_SOURCE', "Source");
$smarty->assign('LANG_VIDEOS_TITLE', ": Post-prod preparation (experimental)");
$smarty->assign('LANG_VIDEOS_TIP', "Tip:");

$smarty->assign('LANG_VIDEOS_DIMENSIONS_TITLE', "Zone selection within source picture");
$smarty->assign('LANG_VIDEOS_DIMENSIONS_ACTIVATE', "Activate image cropping:");
$smarty->assign('LANG_VIDEOS_DIMENSIONS_CROPZONE', "Size of the zone to be extracted:");
$smarty->assign('LANG_VIDEOS_DIMENSIONS_CROPLOCATION', "Location:");
$smarty->assign('LANG_VIDEOS_DIMENSIONS_TIP', "Download any picture in full-size and use any picture processing tool (The Gimp, Photoshop, ...) to identify area to be cropped.<br />
Be careful to maintain the same scale than your target picture.");

$smarty->assign('LANG_VIDEOS_SIZE_TITLE', "Target video size");
$smarty->assign('LANG_VIDEOS_SIZE_ACTIVATE', "Resize picture:");
$smarty->assign('LANG_VIDEOS_SIZE_SIZE', "Target video size:");
$smarty->assign('LANG_VIDEOS_SIZE_TIP', "Mention the target resolution for your video, pictures will be resized to match this resolution.");

$smarty->assign('LANG_VIDEOS_EFFECT_TITLE', "Add an effect to your pictures (Experimental)");
$smarty->assign('LANG_VIDEOS_EFFECT_EFFECT', "Choose an effect:");
$smarty->assign('LANG_VIDEOS_EFFECT_TIP', "This is an experimental functionality.");
$smarty->assign('LANG_VIDEOS_EFFECT_NONE', "Disabled");

$smarty->assign('LANG_VIDEOS_TRANSITION_TITLE', "Insert a tracking shot transition");
$smarty->assign('LANG_VIDEOS_TRANSITION_ACTIVATE', "Activate tracking shot transition:");
$smarty->assign('LANG_VIDEOS_TRANSITION_CROPZONE', "Size of the zone to be extracted (target):");
$smarty->assign('LANG_VIDEOS_TRANSITION_CROPLOCATION', "Location (taget):");
$smarty->assign('LANG_VIDEOS_TRANSITION_TIP', "By activating a tracking shot transition the system will automatically calculat how to modify pictures based upon locations and number of pictures.");

$smarty->assign('LANG_VIDEOS_THUMBNAIL_TITLE', "Insert a thumbnail within the picture");
$smarty->assign('LANG_VIDEOS_THUMBNAIL_BORDER', "Insert a border around thumbnail");
$smarty->assign('LANG_VIDEOS_THUMBNAIL_TIP', "This function lets you insert a thumbnail within a video, the tumbnail will be created 
from the raw unprocessed picture (Source Picture). It will then be inserted within resized processed picture (Destination Picture).");
$smarty->assign('LANG_VIDEOS_THUMBNAIL_ACTIVATE', "Activer la création de vignette:");
$smarty->assign('LANG_VIDEOS_THUMBNAIL_TITLE', "Insert a thumbnail");
$smarty->assign('LANG_VIDEOS_THUMBNAIL_SRCCROPZONE', "<b>Source Picture</b>: Size of the zone to be extracted");
$smarty->assign('LANG_VIDEOS_THUMBNAIL_SRCCROPLOCATION', "<b>Source Picture</b>: Location of the zone to be extracted");
$smarty->assign('LANG_VIDEOS_THUMBNAIL_DSTZONE', "<b>Destination Picture</b>: Size of the thumbnail");
$smarty->assign('LANG_VIDEOS_THUMBNAIL_DSTLOCATION', "<b>Destination Picture</b>: Zone of the thumbnail");

$smarty->assign('LANG_VIDEOS_PREPROCESS_TITLE', "Insert a legend");
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

$smarty->assign('LANG_VIDEOS_WATERMARK_TITLE', "Insert Watermark (image on top of a picture)");
$smarty->assign('LANG_VIDEOS_WATERMARK_ADDWATERMARK', "Insert a watermark into the picture:");
$smarty->assign('LANG_VIDEOS_WATERMARK_WATERMARKFILE', "Watermark file:");
$smarty->assign('LANG_VIDEOS_WATERMARK_TRANSPARENCY', "Transparancy:");
$smarty->assign('LANG_VIDEOS_WATERMARK_XCOORDINATE', "Horizontale coordinate (X):");
$smarty->assign('LANG_VIDEOS_WATERMARK_YCOORDINATE', "Verticale coordinate (Y):");
$smarty->assign('LANG_VIDEOS_WATERMARK_TIP', "Watermark files must be using 'PNG' format and be located within /watermark/ folder reachable via the FTP global account (via System tab), this folder is shared between all sources. <br />	Starting point for coordinates is to top left corner of the picture <br /> <strong>Warning:</strong> Filenames must not contain spaces of special characters.");

$smarty->assign('LANG_VIDEOS_FILTER_TITLE', "Filter similar pictures");
$smarty->assign('LANG_VIDEOS_FILTER_ACTIVATE', "Activate filtering");
$smarty->assign('LANG_VIDEOS_FILTER_TIP', "This option will compare consecutive pictures, if many parts are identical, pictures will not be considered.<br />
You can also apply a mask to pictures to focus the comparaison only on some portions of the pictures.<br /> 
Watermark files must be using 'PNG' format and be located within /watermark/ folder reachable via the FTP global account (via System tab), this folder is shared between all sources.<br />
This option is not compatible in case of transition (zoom, pan, ...)");
$smarty->assign('LANG_VIDEOS_FILTER_WATERMARKFILE', "Add a mask:");
$smarty->assign('LANG_VIDEOS_FILTER_VALUE', "Maximum distance:");

$smarty->assign('LANG_VIDEOS_STATIC_TITLE', "Static videos (hotlink)");
$smarty->assign('LANG_VIDEOS_STATIC_FILENAME', "Name of the video file (no extension nor spaces):");
$smarty->assign('LANG_VIDEOS_STATIC_CREATEVID', "Create a downloadable static video:");
$smarty->assign('LANG_VIDEOS_STATIC_CREATEWEB', "Create a streaming static video (MP4):");
$smarty->assign('LANG_VIDEOS_STATIC_TIP', "A static picture or video is a file which keep the same name whatever the content is. <br />They can be directly reachable via web links (URL), they are sometime called 'hotlinks'. <br />");

$smarty->assign('LANG_VIDEOS_BUTTON', "Save");

$smarty->assign('LANG_VIDEOS_CUSTOM_TITLE', "Prepare post-prod. pictures");
$smarty->assign('LANG_VIDEOS_CUSTOM_FROM', "From:");
$smarty->assign('LANG_VIDEOS_CUSTOM_AT', "at");
$smarty->assign('LANG_VIDEOS_CUSTOM_JANUARY', "January");
$smarty->assign('LANG_VIDEOS_CUSTOM_FEBRUARY', "February");
$smarty->assign('LANG_VIDEOS_CUSTOM_MARCH', "March");
$smarty->assign('LANG_VIDEOS_CUSTOM_APRIL', "April");
$smarty->assign('LANG_VIDEOS_CUSTOM_MAY', "May");
$smarty->assign('LANG_VIDEOS_CUSTOM_JUNE', "June");
$smarty->assign('LANG_VIDEOS_CUSTOM_JULY', "July");
$smarty->assign('LANG_VIDEOS_CUSTOM_AUGUST', "August");
$smarty->assign('LANG_VIDEOS_CUSTOM_SEPTEMBER', "September");
$smarty->assign('LANG_VIDEOS_CUSTOM_OCTOBER', "October");
$smarty->assign('LANG_VIDEOS_CUSTOM_NOVEMBER', "November");
$smarty->assign('LANG_VIDEOS_CUSTOM_DECEMBER', "December");
$smarty->assign('LANG_VIDEOS_CUSTOM_TO', "To:");
$smarty->assign('LANG_VIDEOS_CUSTOM_KEEPPICTURES', "Keep pictures between:");
$smarty->assign('LANG_VIDEOS_CUSTOM_AND', "and");
$smarty->assign('LANG_VIDEOS_CUSTOM_START', "Start video creation:");
$smarty->assign('LANG_VIDEOS_CUSTOM_DISABLED', "Disabled");
$smarty->assign('LANG_VIDEOS_CUSTOM_ASAP', "As soon as possible");
$smarty->assign('LANG_VIDEOS_CUSTOM_NIGHT', "Between 4:00am and 5:00am");
$smarty->assign('LANG_VIDEOS_CUSTOM_MININTERVAL', "Minimum time between two pictures:");
$smarty->assign('LANG_VIDEOS_CUSTOM_MININTERVAL_MINUTES', "Minutes");
$smarty->assign('LANG_VIDEOS_CUSTOM_MININTERVAL_SECONDS', "Seconds");
$smarty->assign('LANG_VIDEOS_CUSTOM_ADDAUDIO', "Insert an audio track:");
$smarty->assign('LANG_VIDEOS_CUSTOM_AUDIOFILE', "Audio File:");
$smarty->assign('LANG_VIDEOS_CUSTOM_EMAIL', "Email alert:");
$smarty->assign('LANG_VIDEOS_CUSTOM_COPYTOSOURCE', "Copy pictures into sources directory:");
$smarty->assign('LANG_VIDEOS_CUSTOM_TIP', "Your video will be located in the 'videos' directory of the source once created. <br />	Creation data will be automatically added in front of the filename (YYYYMMDD).<br /> Starting video creation during the night might be a good idea to spare system resources. Please be sure that you have enough disk space to generate the video. ");


?>
