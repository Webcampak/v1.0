<?php 
$smarty->assign('LANG_CONFIGAVANCE_SOURCE', "Source");
$smarty->assign('LANG_CONFIGAVANCE_TITLE', ": Motion Detection");

$smarty->assign('LANG_MOTION_OVERVIEW_TITLE', "Overview");
$smarty->assign('LANG_MOTION_OVERVIEW_EXPLANATION', "Webcampak motion detection has been created to be used on a webcampak equipped with a DSLR camera. <br /> The system will use a USB Webcam to detect motion and a DSLR camera to take pictures.<br />
The following modes are available:<br />
- <b>Regular capture</b>: Webcampak takes regular shots and motion detection is not activated.<br/>
- <b>Regular capture + motion detection</b>: Webcampak takes regular shots, if a motion is detected additionnal shots will be taken in between regular shots. You will have to configure the minimum capture interval (via ''Source'' section) and minimum motion detection interval.<br/>
- <b>Motion detection only</b>: Webcampak does not take regular shots, shots are taken only if a motion is detected.<br/>

");

$smarty->assign('LANG_CONFIGAVANCE_MOTION_TITLE', "Motion detection");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_ACTIVATE', "Activate motion detection");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_ONLY', "Only save pictures related to motion detection.");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_DEVICE', "Video Source (USB Webcam)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_DEVICEWIDTH', "USB Webcam width (pixel width)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_DEVICEHEIGHT', "USB Webcam height (pixel height)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_THRESHOLD', "Threshold (in modified pixels)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_ENDEVENT', "Number of seconds before considering the event as terminated");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_BUTTON', "Save");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_TIP', "Addtional details:");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_WARNING', "- <u>Only save pictures related to motion detection:</u> Regulat capture is automatically deactivated. <br/>
- <u>Lowest interval:</u> Regular capture is activated, if motion is detected during two regular shots additional pictures are taken. <br/>");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_INTERVAL', "Lowest interval:");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_SECONDS', "Seconds");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_MINUTES', "Minutes");

$smarty->assign('LANG_MOTION_DEVICE_TITLE', "USB Webcam (motion detection)");

$smarty->assign('LANG_MOTION_STATUS_TITLE', "Software status");
$smarty->assign('LANG_MOTION_STATUS_DESCRIPTION', "USB Webcam (motion detection)");

$smarty->assign('LANG_CONFIGAVANCE_MOTION_MASK', "Apply a detection mask (PGM file)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_NOMASK', "No mask");

$smarty->assign('LANG_MOTION_START', "Start");
$smarty->assign('LANG_MOTION_STOP', "Stop");

?>