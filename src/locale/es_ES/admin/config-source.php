<?php 
$smarty->assign('LANG_SOURCE_SOURCE', "Fuente");
$smarty->assign('LANG_SOURCE_TITLE', ": Configuración de dispositivo");
$smarty->assign('LANG_SOURCE_TIP', "Consejo:");
 
$smarty->assign('LANG_SOURCE_TYPE_TITLE', "Configuración de fuente");
$smarty->assign('LANG_SOURCE_TYPE_ACTIVATE', "Activar fuente:");
$smarty->assign('LANG_SOURCE_TYPE_SOURCETYPE', "Tipo:");
$smarty->assign('LANG_SOURCE_TYPE_SOURCEGPHOTO', "Cámara compacta o DSLR USB (Modo Gphoto2 PTP)");
$smarty->assign('LANG_SOURCE_TYPE_SOURCEWEBCAM', "Cámara web USB");
$smarty->assign('LANG_SOURCE_TYPE_SOURCECAMIP', "Cámara IP (FTP)");
$smarty->assign('LANG_SOURCE_TYPE_SOURCEWEB', "Imagen de internet (HTTP ou FTP)");
$smarty->assign('LANG_SOURCE_TYPE_SOURCESTREAMING', "Video Streaming (RTSP)");
$smarty->assign('LANG_SOURCE_TYPE_SOURCESENSOR', "Sensor (Phidget)");
$smarty->assign('LANG_SOURCE_TYPE_INTERVAL', "Intervalo mínimo:");
$smarty->assign('LANG_SOURCE_TYPE_SECONDS', "Segundos");
$smarty->assign('LANG_SOURCE_TYPE_MINUTES', "Minutos");
$smarty->assign('LANG_SOURCE_TYPE_CAPTUREDELAY', "Retraso de captura (segundos):");
$smarty->assign('LANG_SOURCE_TYPE_DEBUG', "Activar el modo de diagnóstico:");
$smarty->assign('LANG_SOURCE_TYPE_EMAILALERT', "Activar alerta por email:");
$smarty->assign('LANG_SOURCE_TYPE_BLOCK', "Bloquear captura automática:");
$smarty->assign('LANG_SOURCE_TYPE_BUTTON', "Guardar");
$smarty->assign('LANG_SOURCE_TYPE_TIP', "Al usar 'Bloquear captura automática' durante la configuración se desbloquean las funcionalidades adicionales.");


$smarty->assign('LANG_SOURCE_CAPTURE_CAPTUREPICTURE', "Captura de imagen");
$smarty->assign('LANG_SOURCE_CAPTURE_CAPTURESAVEPICTURE', "Captura manual");
$smarty->assign('LANG_SOURCE_CAPTURE_CAPTUREPICTUREDISABLED', "Función deshabilitada, por favor utilice la opción 'Bloquear captura automática'.");

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
$smarty->assign('LANG_CRON_CALENDAR_ENABLE_MORE', "If disabled, 24/7 captures");
$smarty->assign('LANG_CRON_CALENDAR_TIME_START', "Between ");
$smarty->assign('LANG_CRON_CALENDAR_TIME_END', " and ");

$smarty->assign('LANG_SOURCE_GPHOTO_TITLE', "Configuración de '<u>Cámara compacta o DSLR USB (Modo Gphoto2 PTP)</u>'");
$smarty->assign('LANG_SOURCE_GPHOTO_CAMERAMODEL', "Modelo de cámara:<br /><i>Múltiples dispositivos de cámara</i>");
$smarty->assign('LANG_SOURCE_GPHOTO_CAMERAPORT', "Puerto de cámara:<br /><i>Múltiples dispositivos de cámara</i>");
$smarty->assign('LANG_SOURCE_GPHOTO_CURRENTCONF', "En la actualidad: ");
$smarty->assign('LANG_SOURCE_GPHOTO_AUTO', "Automático");
$smarty->assign('LANG_SOURCE_GPHOTO_CAMERAOWNER', "'Propietario de cámara:<br /><i>Múltiples dispositivos de cámara</i>");
$smarty->assign('LANG_SOURCE_GPHOTO_CAMERAOWNERAPPLIED', "Modificación aplicada");
$smarty->assign('LANG_SOURCE_GPHOTO_CAMERAOWNERASSIGN', "Asignar (Guardar configuración antes)");
$smarty->assign('LANG_SOURCE_GPHOTO_NOSPACES', "Sin espacios o caracteres especiales.");
$smarty->assign('LANG_SOURCE_GPHOTO_APPLYCALIBRATION', "Aplicar calibración en el arranque (sólo con fines de prueba):");
$smarty->assign('LANG_SOURCE_GPHOTO_CALIBRATE', "Calibrar cámara (sólo con fines de prueba)");
$smarty->assign('LANG_SOURCE_GPHOTO_DISABLED', "Función deshabilitada, por favor utilice la opción 'Bloquear captura automática'.");
$smarty->assign('LANG_SOURCE_GPHOTO_SUPPORTED', "<i>El listado de cámaras soportadas se encuentra disponible en <a href='http://www.gphoto.org/doc/remote/' target='_blank'>here</a></i>");
$smarty->assign('LANG_SOURCE_GPHOTO_TIP', "Si está trabajando en un entorno con múltiples cámaras será necesario especificar el modelo de cámara que está manejando (ver el nombre completo en 'Dispositivos conectados'. <br />Si está utilizando dos cámaras idénticas puede definir un  propietario diferente para cada una de ellas, y el sistema lo utilizará para identificar ambas cámaras.");

$smarty->assign('LANG_SOURCE_USBWEBCAM_TITLE', "Configuración de '<u>Cámara web USB</u>'");
$smarty->assign('LANG_SOURCE_USBWEBCAM_NATIVESIZE', "Resolución origianl de la cámara web:");
$smarty->assign('LANG_SOURCE_USBWEBCAM_OTHERSIZE', "Otra resolución");
$smarty->assign('LANG_SOURCE_USBWEBCAM_IFOTHER', " Si es otra, por favor especifique: ");
$smarty->assign('LANG_SOURCE_USBWEBCAM_DEVICE', "Dispositivos (bus_info):");
$smarty->assign('LANG_SOURCE_USBWEBCAM_ADVANCED', "Configuración avanzada");
$smarty->assign('LANG_SOURCE_USBWEBCAM_ATTRIBUTE', "Atributo");
$smarty->assign('LANG_SOURCE_USBWEBCAM_RESOLUTION', "(for example: 1024x768)");
$smarty->assign('LANG_SOURCE_USBWEBCAM_NEW', "Nuevo");
$smarty->assign('LANG_SOURCE_USBWEBCAM_CURRENT', "Actual");
$smarty->assign('LANG_SOURCE_USBWEBCAM_DEFAULT', "Por defecto");
$smarty->assign('LANG_SOURCE_USBWEBCAM_DETAILS', "Detalles");
$smarty->assign('LANG_SOURCE_USBWEBCAM_BRIGHTNESS', "Brightness:");
$smarty->assign('LANG_SOURCE_USBWEBCAM_CONTRAST', "Contrast:");
$smarty->assign('LANG_SOURCE_USBWEBCAM_SATURATION', "Saturation:");
$smarty->assign('LANG_SOURCE_USBWEBCAM_GAIN', "Gain:");
$smarty->assign('LANG_SOURCE_USBWEBCAM_INSTRUCTIONS', "Values in %, for default values, please refer to logs after a fresh start");

$smarty->assign('LANG_SOURCE_CAMERAIP_TITLE', "Configuración de '<u>IP Camera</u>'");
$smarty->assign('LANG_SOURCE_CAMERAIP_LIMITROTATION', "Límite de subida via FTP para una fotografía por rotación:");
$smarty->assign('LANG_SOURCE_CAMERAIP_HOTLINKERROR', "Create 'failed capture' thumbnails if no pictures are found during a rotation of the source.");
$smarty->assign('LANG_SOURCE_CAMERAIP_SOURCETYPE', "Define picture date based upon:");
$smarty->assign('LANG_SOURCE_CAMERAIP_ANYTYPES', "Date it was savec into /tmp/ directory");
$smarty->assign('LANG_SOURCE_CAMERAIP_WEBCAMPAK', "Picture filename (Webcampak) - format: YYYYMMDDHHMMSS.jpg");
$smarty->assign('LANG_SOURCE_CAMERAIP_EXIF', "EXIF Metadata");
$smarty->assign('LANG_SOURCE_CAMERAIP_TIP', "Al limitar la subida vía FTP a una fotografía por rotación también se limita la cantidad de datos que deben ser enviados al servidor FTP en el caso de que la cámara IP se encuentre configurada para enviar muchos archivos. <br /> Todas las fotografías se encuentran almacenadas en los archivos y pueden ser utilizadas para la creación de video.<br /><br />	Opción 'Otro Webcampak' significa que las fotografías son subidas por otro webcampak.");

$smarty->assign('LANG_SOURCE_PHIDGET_TITLE', "Configuración de '<u>Sensor (Phidget)</u>'");
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


$smarty->assign('LANG_SOURCE_SOURCEWEB_TITLE', "Configuración de '<u>Imagen de internet</u>' or '<u>Video Streaming</u>'");
$smarty->assign('LANG_SOURCE_SOURCEWEB_URL', "URL Archivo/Stream:");
$smarty->assign('LANG_SOURCE_SOURCEWEB_DELAY', "Retraso antes de descargar (avanzado):");
$smarty->assign('LANG_SOURCE_SOURCEWEB_TIP', "Webcampak es compatible con fuentes HTTP, FTP y RTSP.<br />	Si desea utilizar un archivo ubicado en un servidor FTP remoto puede utilizar el siguiente URL: ftp://User:Password@Server/Directory/File.jpg <br />	Nota: Sólo soporta el formato JPG.<br /> Ejemplo de un RTSP stream: rtsp://192.168.1.21/mpeg4");
$smarty->assign('LANG_SOURCE_BUTTON', "Guardar");



?>
