<?php 
$smarty->assign('LANG_CONFIGFTP_SOURCE', "Fuente");
$smarty->assign('LANG_CONFIGFTP_TITLE', ": Parámetros FTP");
$smarty->assign('LANG_CONFIGFTP_TIP', "Consejo:");
 


$smarty->assign('LANG_CONFIGFTP_FTPTEST_TITLE', "Test de configuración del FTP");
$smarty->assign('LANG_CONFIGFTP_FTPTEST_TYPE', "Tipo de tests:");
$smarty->assign('LANG_CONFIGFTP_FTPTEST_TYPESIMPLE', "Test simple");
$smarty->assign('LANG_CONFIGFTP_FTPTEST_TYPEPIC', "Test con captura de cámara");
$smarty->assign('LANG_CONFIGFTP_FTPTEST_TYPEPICDISABLED', "Test con captura de cámara - deshabilitado");
$smarty->assign('LANG_CONFIGFTP_FTPTEST_BUTTON', "Test de configuración del FTP");
$smarty->assign('LANG_CONFIGFTP_FTPTEST_LOG', "Log FTP:");
$smarty->assign('LANG_CONFIGFTP_FTPTEST_TIP', "Esta función sube archivos a un servidor remoto, 'ftpupload.txt' se colgará en el directorio de fotografías.");

$smarty->assign('LANG_CONFIGFTP_ARCHIVES_TITLE', "Configuración FTP - Videos y fotografía");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_PICUPLOAD', "Subir fotografías via FTP:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_VIDUPLOAD', "Subir videos a tamaño completo via FTP:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_WEBVIDUPLOAD', "Subir videos 'web' a tamaño completo via FTP:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_FTPSERVER', "Servidor FTP:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_FTPUSERNAME', "Nombre de usuario:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_FTPPASSWORD', "Contraseña:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_FTPBASEDIR', "Directorio base:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_FTPPICDIR', "Directorio de fotos:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_FTPVIDDIR', "Directorio de videos:");
$smarty->assign('LANG_CONFIGFTP_ARCHIVES_FTPACTIVE', "Modo activo de FTP (Modo de Puerto):");

$smarty->assign('LANG_CONFIGFTP_SECONDFTP_TITLE', "Configuración FTP adicional - fotografía");
$smarty->assign('LANG_CONFIGFTP_SECONDFTP_PICUPLOAD', "Subir fotografías via FTP:");
$smarty->assign('LANG_CONFIGFTP_SECONDFTP_FTPSERVER', "Servidor FTP:");
$smarty->assign('LANG_CONFIGFTP_SECONDFTP_FTPUSERNAME', "Nombre de usuario:");
$smarty->assign('LANG_CONFIGFTP_SECONDFTP_FTPPASSWORD', "Contraseña:");
$smarty->assign('LANG_CONFIGFTP_SECONDFTP_FTPPICDIR', "Directorio de fotos:");
$smarty->assign('LANG_CONFIGFTP_SECONDFTP_FTPACTIVE', "Modo activo de FTP (Modo de Puerto):");

$smarty->assign('LANG_CONFIGFTP_HOTLINK_TITLE', "Configuración de FTP - Archivos estáticos (Hotlink)");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_PICUPLOAD', "Subir fotos estáticas* via FTP:");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_VIDUPLOAD', "Subir videos hotlink a tamaño completo via FTP:");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_WEBVIDUPLOAD', "Subir videos 'web" hotlink a tamaño completo via FTP:");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_FTPSERVER', "Servidor FTP:");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_FTPUSERNAME', "Nombre de usuario:");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_FTPPASSWORD', "Contraseña:");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_FTPDIR', "Directorio Hotlink*:");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_FTPACTIVE', "Modo activo de FTP (Modo de Puerto):");
$smarty->assign('LANG_CONFIGFTP_HOTLINK_TIP', " Los archivos 'Hotlink' siempre mantienen el mismo nombre y URL aunque el contenido cambie continuamente. Este tipo de archivos se pueden utilizar mientras se inserte una fotografía en vivo a la página web.<br />
Los archivos Hotlink se pueden subir al mismo directorio que las fotografías y videos.
");
$smarty->assign('LANG_CONFIGFTP_BUTTON', "Guardar cambios");

?>
