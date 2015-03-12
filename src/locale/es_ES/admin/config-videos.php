<?php 
$smarty->assign('LANG_VIDEOS_SOURCE', "Fuente");
$smarty->assign('LANG_VIDEOS_TITLE', ": Configuración de video");
$smarty->assign('LANG_VIDEOS_TIP', "Consejo:");
 
$smarty->assign('LANG_VIDEOS_DAILY_TITLE', "Creación diaria de video");
$smarty->assign('LANG_VIDEOS_DAILY_FORMAT', "Formato");
$smarty->assign('LANG_VIDEOS_DAILY_WEB', "Web<br />(MP4)");
$smarty->assign('LANG_VIDEOS_DAILY_DESCRIPTION', "Descripción");
$smarty->assign('LANG_VIDEOS_DAILY_EFFECT', "Efecto visual*<br /><i>Prueba</i>");
$smarty->assign('LANG_VIDEOS_DAILY_MINSIZE', "Tamaño mínimo <br /><i>(KB)</i>");
$smarty->assign('LANG_VIDEOS_DAILY_SPEED', "Creación<br /><i>Velocidad</i>");
$smarty->assign('LANG_VIDEOS_DAILY_HD', "- Alta definición (HD) - H.264:");
$smarty->assign('LANG_VIDEOS_DAILY_HDMAX', "Formato HD, la mejor calidad.");
$smarty->assign('LANG_VIDEOS_DAILY_HDGOOD', "Formato HD, alta calidad.");
$smarty->assign('LANG_VIDEOS_DAILY_SD', "- Definición estándar:");
$smarty->assign('LANG_VIDEOS_DAILY_SDDVD', "Similar a DVD.");
$smarty->assign('LANG_VIDEOS_DAILY_CUSTOM', "H. 264 (Personalizado):");
$smarty->assign('LANG_VIDEOS_DAILY_CUSTOMTXT', "H.264, parámetros personalizables.");
$smarty->assign('LANG_VIDEOS_DAILY_NO', "No");
$smarty->assign('LANG_VIDEOS_DAILY_WARNING', "<strong><span class='blue'>Aviso:</span></strong><br /> - *Los efectos visuales están disponibles únicamente para realizar pruebas, ya que pueden ser inestables y utilizar una gran cantidad de memoria/CPU. El tiempo de creación será multiplicado como mínimo por dos.");

$smarty->assign('LANG_VIDEOS_ADVANCED_TITLE', "Parámetros avanzados - Compresión de video");
$smarty->assign('LANG_VIDEOS_ADVANCED_FORMAT', "Formato");
$smarty->assign('LANG_VIDEOS_ADVANCED_FPS', "FPS");
$smarty->assign('LANG_VIDEOS_ADVANCED_BITRATE', "Calidad");
$smarty->assign('LANG_VIDEOS_ADVANCED_RESOLUTION', "Resolución");
$smarty->assign('LANG_VIDEOS_ADVANCED_CUT', "Recortar fotografía sobre zona de interés");
$smarty->assign('LANG_VIDEOS_ADVANCED_PASSES', "2 Pases");
$smarty->assign('LANG_VIDEOS_ADVANCED_HD', "- Alta definición (HD) - H.264:");
$smarty->assign('LANG_VIDEOS_ADVANCED_SD', "- Definición estándar:");
$smarty->assign('LANG_VIDEOS_ADVANCED_CUSTOM', "H. 264 (Personalizado):");

$smarty->assign('LANG_VIDEOS_PREPROCESS_TITLE', "Parámetros avanzados - Manipulaciones de pre-proceso");
$smarty->assign('LANG_VIDEOS_PREPROCESS_TEXT', "Estas opciones le permiten modificar las fotografías antes de la creación del video. Puede utilizarlas para añadir la leyenda, reajustar el tamaño de las fotografías...Lleve cuidado puesto que estas opciones incrementarán el tiempo de proceso para generar videos.<br />");
$smarty->assign('LANG_VIDEOS_PREPROCESS_LEGEND', "Leyenda");
$smarty->assign('LANG_VIDEOS_PREPROCESS_LEGENDTXT', "Insertar la leyenda en la fotografía:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_LEGENDVALUE', "Leyenda:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FORMAT', "Formato de fecha:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_NODATE', "Sin fecha");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FORMAT4', "Jueves 25 de enero de 2010 - 09h30");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FORMAT5', "25 de enero de 2010 - 09h30");
$smarty->assign('LANG_VIDEOS_PREPROCESS_ADVANCED', "Configuración avanzada de texto:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTSIZE', "Tamaño de fuente:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTLOCATION', "Posición del texto:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTSOUTHWEST', "Inferior izquierda");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTSOUTH', "Inferior centro");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTSOUTHEAST', "Inferior derecha");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTEAST', "Centro derecha)");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTNORTHEAST', "Superior derecha");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTNORTH', "Superior centro");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTNORTWEST', "Superior izquierda");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTWEST', "Centro izquierda");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTNAME', "Fuente:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTSHADOWCOLOR', "Color de sombra:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTSHADOWCOORDINATES', "Posición de la sombra:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTCOLOR', "Color de fuente:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_FONTCOORDINATES', "Posición del texto:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_RESIZE', "Cambiar de tamaño");
$smarty->assign('LANG_VIDEOS_PREPROCESS_RESIZETXT', "Cambiar el tamaño de la fotograía antes de la creación del video:");
$smarty->assign('LANG_VIDEOS_PREPROCESS_RESIZETXTVALUE', "Tamaño de fotografía (por ejemplo: 2272x1704):");
$smarty->assign('LANG_VIDEOS_PREPROCESS_TIP', "Esta función es útil si las fotografías de origen son muy grandes de 10Mpix o más, de lo contrario el proceso de creación de video se puede bloquear.");

$smarty->assign('LANG_VIDEOS_AUDIO_TITLE', "Pista de audio");
$smarty->assign('LANG_VIDEOS_AUDIO_ADDTRACK', "Añadir una pista de audio:");
$smarty->assign('LANG_VIDEOS_AUDIO_AUDIOFILE', "Archivo de audio:");
$smarty->assign('LANG_VIDEOS_AUDIO_TIP', "Los archivos de audio se deben colgar via FTP en /audio/ cuyo directorio está disponible a través de la cuenta global de FTP (ver 'System').<br /><strong>Aviso:</strong> Los nombres de archivo no debe contener ningún espacio o caracter especial.");

$smarty->assign('LANG_VIDEOS_WATERMARK_TITLE', "Insertar Watermark (imagen en la parte superior de la fotografía)");
$smarty->assign('LANG_VIDEOS_WATERMARK_ADDWATERMARK', "Insertar un watermark en la fotografía:");
$smarty->assign('LANG_VIDEOS_WATERMARK_WATERMARKFILE', "Archivo Watermark:");
$smarty->assign('LANG_VIDEOS_WATERMARK_TRANSPARENCY', "Transparencia:");
$smarty->assign('LANG_VIDEOS_WATERMARK_XCOORDINATE', "Posición horizontal (X):");
$smarty->assign('LANG_VIDEOS_WATERMARK_YCOORDINATE', "Posición vertical (Y):");
$smarty->assign('LANG_VIDEOS_WATERMARK_TIP', "Los archivos de Watermark deben estar en formato 'PNG' y estar ubicados dentro de la carpeta /watermark/  accesible via la cuenta global de FTP (via System tab), esta carpeta se encuentra compartida con todas las fuentes. <br />	El punto de inicio de posición es la esquina superior izquierda de la fotografía <br /> <strong>Aviso:</strong> Los nombres de archivos no deben contener ningún espacio o caracter especial.");

$smarty->assign('LANG_VIDEOS_FILTER_TITLE', "Parámetros avanzados - Filter similar pictures");
$smarty->assign('LANG_VIDEOS_FILTER_ACTIVATE', "Activate filtering");
$smarty->assign('LANG_VIDEOS_FILTER_TIP', "This option will compare consecutive pictures, if many parts are identical, pictures will not be considered.<br />
You can also apply a mask to pictures to focus the comparaison only on some portions of the pictures.<br /> 
Watermark files must be using 'PNG' format and be located within /watermark/ folder reachable via the FTP global account (via System tab), this folder is shared between all sources.<br />
This option is not compatible in case of transition (zoom, pan, ...)");
$smarty->assign('LANG_VIDEOS_FILTER_WATERMARKFILE', "Add a mask:");
$smarty->assign('LANG_VIDEOS_FILTER_VALUE', "Maximum distance:");

$smarty->assign('LANG_PHOTOS_PHIDGET_TITLE', "Insertar medidas del sensor Phidget");
$smarty->assign('LANG_PHOTOS_PHIDGET_TEMPERATURE_ACTIVATE', "Insertar la temperature en la fotografía");
$smarty->assign('LANG_PHOTOS_PHIDGET_TEMPERATURE_SIZE', "Insertar tamaño (por ejemplo: 320x240)");
$smarty->assign('LANG_PHOTOS_PHIDGET_TEMPERATURE_DISSOLVE', "Transparencia:");
$smarty->assign('LANG_PHOTOS_PHIDGET_TEMPERATURE_XCOORDINATE', "Posición horizontal (X):");
$smarty->assign('LANG_PHOTOS_PHIDGET_TEMPERATURE_YCOORDINATE', "Posición vertical (Y):");
$smarty->assign('LANG_PHOTOS_PHIDGET_LUMINOSITY_ACTIVATE', "Insertar luminosidad en la fotografía");
$smarty->assign('LANG_PHOTOS_PHIDGET_LUMINOSITY_SIZE', "Insertar tamaño (por ejemplo: 320x240)");
$smarty->assign('LANG_PHOTOS_PHIDGET_LUMINOSITY_DISSOLVE', "Transparencia:");
$smarty->assign('LANG_PHOTOS_PHIDGET_LUMINOSITY_XCOORDINATE', "Posición horizontal (X):");
$smarty->assign('LANG_PHOTOS_PHIDGET_LUMINOSITY_YCOORDINATE', "Posición vertical (Y):");

$smarty->assign('LANG_VIDEOS_PHIDGET_TITLE', "Insert Phidget sensors measurements");
$smarty->assign('LANG_VIDEOS_PHIDGET_INSERTIMAGE', "Picture insertion");
$smarty->assign('LANG_VIDEOS_PHIDGET_SENSOR', "Sensor");
$smarty->assign('LANG_VIDEOS_PHIDGET_TYPE', "Type");
$smarty->assign('LANG_VIDEOS_PHIDGET_PORT', "Port");
$smarty->assign('LANG_VIDEOS_PHIDGET_TEXT', "Legend");
$smarty->assign('LANG_VIDEOS_PHIDGET_COLOR', "Coulor");
$smarty->assign('LANG_VIDEOS_PHIDGET_INSERT', "Insert");
$smarty->assign('LANG_VIDEOS_PHIDGET_RESOLUTION', "Resolution");
$smarty->assign('LANG_VIDEOS_PHIDGET_TRANSPARENCY', "Transparency");
$smarty->assign('LANG_VIDEOS_PHIDGET_XLOCATION', "Location (x)");
$smarty->assign('LANG_VIDEOS_PHIDGET_YLOCATION', "Location (y)");
$smarty->assign('LANG_VIDEOS_ERROR_DISABLED', "Disabled");

$smarty->assign('LANG_VIDEOS_YOUTUBE_TITLE', "Subir a Youtube");
$smarty->assign('LANG_VIDEOS_YOUTUBE_ACTIVATE', "Activar subida a Youtube:");
$smarty->assign('LANG_VIDEOS_YOUTUBE_CATEGORY', "Categoría de video:");
$smarty->assign('LANG_VIDEOS_YOUTUBE_TIP', "Para subir un video a Youtube la clave de autenticación debe estar vinculada a su cuenta y se almacena en el webcampak. La creación de la clave ha sido generada en nuestras oficinas, por lo que debería haber obtenido las instrucciones para vincular esta clave a su cuenta de google.<br /> El video con mejor calidad se subirá a Youtube.<br />");

$smarty->assign('LANG_VIDEOS_FTP_TITLE', "Send videos via FTP");
$smarty->assign('LANG_VIDEOS_FTP_MAINAVI', "Send AVI video files to:");
$smarty->assign('LANG_VIDEOS_FTP_MAINMP4', "Send MP4 video files to:");
$smarty->assign('LANG_VIDEOS_FTP_HOTLINKAVI', "Send hotlink AVI video files to:");
$smarty->assign('LANG_VIDEOS_FTP_HOTLINKMP4', "Send hotlink MP4 video files to:");
$smarty->assign('LANG_VIDEOS_FTP_FTPRETRY', "Number or retry in case of failure:");
$smarty->assign('LANG_VIDEOS_FTP_DISABLED', "Disabled");
$smarty->assign('LANG_VIDEOS_FTP_NORETRY', "No retry");

$smarty->assign('LANG_VIDEOS_BUTTON', "Guardar");

?>
