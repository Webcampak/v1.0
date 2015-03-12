<?php 
$smarty->assign('LANG_CONFIGAVANCE_SOURCE', "Fuente");
$smarty->assign('LANG_CONFIGAVANCE_TITLE', ": Detección de movimiento");

$smarty->assign('LANG_MOTION_OVERVIEW_TITLE', "Presentación");
$smarty->assign('LANG_MOTION_OVERVIEW_EXPLANATION', "La detección de movimiento de Webcampak ha sido creada para ser usada en un webcampak equipado con una cámara DSLR. <br /> El sistema utilizará una cámara web USB para detectar movimiento y una cámara DSLR para capturar fotografías.<br />
Están disponibles los siguientes modos:<br />
- <b>Captura regular</b>: Webcampak toma disparos regulares y la detección de movimiento no está activada.<br/>
- <b>Captura regular + detección de movimiento</b>: Webcampak toma disparos regulares, y si se activa la detección de movimiento se tomarán disparos adicionales de forma regular. Usted tendrá que configurar el intervalo mínimo de captura (via sección ''Fuente'') y el intervalo mínimo de detección de movimiento.<br/>
- <b>Detección de movimiento</b>: Webcampak no realiza disparos regulares, de tal modo que los disparos se toman en caso de que esté activo el detector de movimiento.<br/>

");
 
$smarty->assign('LANG_CONFIGAVANCE_MOTION_TITLE', "Detección de movimiento");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_ACTIVATE', "Activar detección de movimiento");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_ONLY', "Guardar solo fotografías relacionadas con detección de movimiento.");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_DEVICE', "Fuente de video (cámara web USB)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_DEVICEWIDTH', "Cámara web USB fuente (ancho de pixel)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_DEVICEHEIGHT', "Cámara web USB fuente (altura de pixel)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_THRESHOLD', "Umbral (en píxeles modificados)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_ENDEVENT', "Número de segundos antes de considerar terminado el evento");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_BUTTON', "Guardar");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_TIP', "Más detalles:");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_WARNING', "- <u>Guardar solo fotografías relacionadas con detección de movimiento:</u> Captura regular desactivada automáticamente. <br/>
- <u>Intervalo mínimo:</u> Captura regular activada, en caso de que se detecte movimiento durante dos disparos regulares se toman nuevas fotografías. <br/>");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_INTERVAL', "Intervalo mínimo:");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_SECONDS', "Segundos");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_MINUTES', "Minutos");

$smarty->assign('LANG_MOTION_DEVICE_TITLE', "Cámara web USB (detección de movimiento)");

$smarty->assign('LANG_MOTION_STATUS_TITLE', "Estado del programa");
$smarty->assign('LANG_MOTION_STATUS_DESCRIPTION', "Cámara web USB (detección de movimiento)");

$smarty->assign('LANG_CONFIGAVANCE_MOTION_MASK', "Aplicar máscara de detección (archivo PGM)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_NOMASK', "Sin máscara");

$smarty->assign('LANG_MOTION_START', "Comenzar");
$smarty->assign('LANG_MOTION_STOP', "Detener");

?>