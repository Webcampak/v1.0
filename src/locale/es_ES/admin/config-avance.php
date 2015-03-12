<?php 
$smarty->assign('LANG_CONFIGAVANCE_SOURCE', "Fuente");
$smarty->assign('LANG_CONFIGAVANCE_TITLE', ": Configuración Avanzada");

$smarty->assign('LANG_CONFIGAVANCE_CONFIGURATIONFILE_TITLE', "Configuración de archivo");
$smarty->assign('LANG_CONFIGAVANCE_CONFIGURATIONFILE_IMPORT', "Importar archivo de configuración:");
$smarty->assign('LANG_CONFIGAVANCE_CONFIGURATIONFILE_BUTTON', "Enviar");
$smarty->assign('LANG_CONFIGAVANCE_CONFIGURATIONFILE_UPLOADSUCCESS', "Configuración del archivo actualizado.");
$smarty->assign('LANG_CONFIGAVANCE_CONFIGURATIONFILE_WARNING', "<strong><font color='red'>Warning:</font></strong> La importación del archivo de configuración borrará el fichero de configuración anterior.	<br/>");
$smarty->assign('LANG_CONFIGAVANCE_CONFIGURATIONFILE_BUTTONDOWNLOAD', "Descargar archivo de configuración");
$smarty->assign('LANG_CONFIGAVANCE_CONFIGURATIONFILE_BUTTONDISPLAY', "Visualizar el archivo de configuración");

$smarty->assign('LANG_CONFIGFTP_LOCALFTP_TITLE', "FTP Server Local");
$smarty->assign('LANG_CONFIGFTP_LOCALFTP_USERNAME', "Nombre de usuario:");
$smarty->assign('LANG_CONFIGFTP_LOCALFTP_PASSWORD', "Contraseña:");
$smarty->assign('LANG_CONFIGFTP_LOCALFTP_BUTTON', "Crear/Editar usuario");
$smarty->assign('LANG_CONFIGFTP_LOCALFTP_TIP', "El FTP Local se utiliza para dar acceso a fotografías y videos almacenados dentro de webcampak y permitir a cámaras remotas (cámaras IP u otros webcampaks) subir fotografías en /tmp/ directory.<br />
Aviso, por defecto las cuentas FTP no son configuradas, por favor haga clik en 'Crear/Editar usuario' para habilitar el FTP local.");

$smarty->assign('LANG_CONFIGAVANCE_EMAIL_TITLE', "Configurar alertas por correo electrónico");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_SENDTO', "Enviar a:");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_SENDCOPYTO', "Enviar una copia a: (@ email):");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_EMAILSOURCE', "Correo electrónico (@ email):");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_NBFAILURES', "Fallo antes de enviar el correo electrónico:");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_REMINDER', "Reminder every");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_REMINDER_FAILURE', "failures (0 = never)");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_SMTPSERVER', "Servidor SMTP:Port");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_SMTPTTLS', "SMTP Start TTLS:");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_SMTPAUTH', "SMTP Auth:");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_SMTPAUTHUSERNAME', "SMTP Auth Nombre de usuario:");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_SMTPAUTHPASSWORD', "SMTP Auth Contraseña:");
$smarty->assign('LANG_CONFIGAVANCE_EMAIL_BUTTON', "Guardar");

$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_TITLE', "Configuración Phidget para la fuente");
$smarty->assign('LANG_CONFIGAVANCE_ERROR_ACTIVATE', "Activar el ciclo de alimentación remoto");
$smarty->assign('LANG_CONFIGAVANCE_GRAPH_ACTIVATE', "Crear gráficos diarios de sensores");
$smarty->assign('LANG_CONFIGAVANCE_ERROR_NBERRORS', "Número de fallos antes del ciclo de alimentación:");
$smarty->assign('LANG_CONFIGAVANCE_ERROR_PORT', "Puerto donde está conectado el relé:");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_TEMPERATURE', "Puerto donde está conectado el sensor de temperatura:");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_LIGHT', "Puerto donde está conectado el sensor de luminosidad:");
$smarty->assign('LANG_CONFIGAVANCE_ERROR_DISABLED', "Disabled");

$smarty->assign('LANG_CONFIGAVANCE_INIT_TITLEINIT', "Reiniciar (source "); 
$smarty->assign('LANG_CONFIGAVANCE_INIT_TITLEEND', " sólo):"); 
$smarty->assign('LANG_CONFIGAVANCE_INIT_INITSOURCE', "Reiniciar la configuración de la fuente ");
$smarty->assign('LANG_CONFIGAVANCE_INIT_INITSOURCEBUTTON', "Reiniciar la fuente "); 
$smarty->assign('LANG_CONFIGAVANCE_INIT_INITVIDEO', "¿Está seguro que desea eliminar todas las fotografías y videos?:"); 
$smarty->assign('LANG_CONFIGAVANCE_INIT_INITVIDEOBUTTON', "Borrar todas las fotografías y videos "); 
$smarty->assign('LANG_CONFIGAVANCE_INIT_WARNING', "<strong><font color='red'>Warning:</strong> esta acción es definitiva	</font><br/>"); 

$smarty->assign('LANG_CONFIGAVANCE_MOTION_TITLE', "Detección de movimiento (Experimental)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_ACTIVATE', "Activar el detector de movimiento");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_ONLY', "Guardar sólo las fotografías relacionadas con el detector de movimiento");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_DEVICE', "Fuente de video (Cámara web USB)");

$smarty->assign('LANG_CONFIGAVANCE_MOTION_DEVICEWIDTH', "Ancho de fuente (ancho de pixel)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_DEVICEHEIGHT', "Altura de fuente (altura de pixel)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_THRESHOLD', "Umbral (pixeles modificados)");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_ENDEVENT', "Número de segundos antes de considerar completado el evento de movimiento");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_BUTTON', "Guardar");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_TIP', "Aviso:");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_WARNING', "Esta opción ha sido creada para ser usada con la fuente de captura para una cámara DSLR<br />
La detección de movimiento se realizará mediante una cámara web USB.");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_INTERVAL', "Intervalo mínimo:");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_SECONDS', "Segundos");
$smarty->assign('LANG_CONFIGAVANCE_MOTION_MINUTES', "Minutos");

$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_INSERTIMAGE', "Picture insertion");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_SENSOR', "Sensor");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_TYPE', "Type");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_PORT', "Port");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_TEXT', "Legend");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_COLOR', "Coulor<br />(ex: #FF0000)");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_INSERT', "Insert");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_RESOLUTION', "Resolution");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_TRANSPARENCY', "Transparency");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_XLOCATION', "Location (x)");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_YLOCATION', "Location (y)");

$smarty->assign('LANG_CONFIGAVANCE_FTPADVANCED', "Advanced FTP settings");
$smarty->assign('LANG_CONFIGAVANCE_FTPRETRY', "Number of retry in case of transmission failure:");
$smarty->assign('LANG_CONFIGAVANCE_FTPPRIMARY', "Main FTP");
$smarty->assign('LANG_CONFIGAVANCE_FTPSECONDARY', "Secondary FTP");
$smarty->assign('LANG_CONFIGAVANCE_FTPNORETRY', "No Retry");
$smarty->assign('LANG_CONFIGAVANCE_FTPHOTLINK', "Hotlink FTP");
$smarty->assign('LANG_CONFIGAVANCE_FTPSENDPIC', "Picture");
$smarty->assign('LANG_CONFIGAVANCE_FTPSENDAVI', "Video (avi)");
$smarty->assign('LANG_CONFIGAVANCE_FTPSENDFLV', "Video (mp4)");
$smarty->assign('LANG_CONFIGAVANCE_PHIDGET_FTP', "Send phidget measurements via FTP");

$smarty->assign('LANG_CONFIGAVANCE_FTP_MAINFTPRETRY', "Number of retry in case of failure:");
$smarty->assign('LANG_CONFIGAVANCE_FTP_DISABLED', "Disabled");
$smarty->assign('LANG_CONFIGAVANCE_FTP_NORETRY', "No Retry");

?>
