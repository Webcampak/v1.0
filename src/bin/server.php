<?php
// Copyright 2010-2012 Infracom & Eurotechnia (support@webcampak.com)
// This file is part of the Webcampak project.
// Webcampak is free software: you can redistribute it and/or modify it 
// under the terms of the GNU General Public License as published by 
// the Free Software Foundation, either version 3 of the License, 
// or (at your option) any later version.

// WiTo is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
// even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// See the GNU General Public License for more details.

// You should have received a copy of the GNU General Public License along with Webcampak. 
// If not, see http://www.gnu.org/licenses/.


$config_source = $argv[1];
require("/home/tmpusername/webcampak/etc/admin.config.php");
exec ("echo $(date) ' --------------------------' >> " . $config_logdirectory . "passthru.log");

if (strip_tags($argv[2]) == "samplerecord") {
 exec ("echo $(date) ' - SAMPLE RECORD: python " . $config_bindirectory . "webcampak.py -t capturesample -s " . $argv[1] . "' >> " . $config_logdirectory . "passthru.log");
 exec ("python " . $config_bindirectory . "webcampak.py -t capturesample -s " . $argv[1]);
}

if (strip_tags($argv[2]) == "getowner") {
//echo "Port: " . $argv[1];
 exec ("echo $(date) ' - GETOWNER: gphoto2 --port $argv[1] --get-config=/main/settings/ownername >> /tmp/gphotoabilities' >> " . $config_logdirectory . "passthru.log");
 exec ("gphoto2 --port " . $argv[1] . " --get-config=/main/settings/ownername >> /tmp/gphotoabilities");
	//echo $test;
}

if (strip_tags($argv[2]) == "gphotoassign") {
	$cfgsourcegphotocameraportdetail = wito_getconfig($config_witoconfig, "cfgsourcegphotocameraportdetail");
	$cfgsourcegphotoowner = wito_getconfig($config_witoconfig, "cfgsourcegphotoowner");	
	//echo "GPHOTO USB: " . $cfgsourcegphotocameraportdetail . " - OWNER: " . $cfgsourcegphotoowner . " - " . $argv[2] . "<br />";
	 exec ("echo $(date) ' - GPHOTO ASSIGN: gphoto2 --port " . $cfgsourcegphotocameraportdetail . " --set-config /main/settings/ownername=" . $cfgsourcegphotoowner . "' >> " . $config_logdirectory . "passthru.log");
	 //exec ("bash " . $config_bindirectory . "/pictures-capture.sh " . $argv[1] . " sample");
	 exec ("gphoto2 --port " . $cfgsourcegphotocameraportdetail . " --set-config /main/settings/ownername=" . $cfgsourcegphotoowner ." "); 
}

if (strip_tags($argv[2]) == "gphoto2usbports") {
 exec ("echo $(date) ' - SAMPLE: gphoto2 --auto-detect |egrep -o usb:...,... > /tmp/gphoto2ports' >> " . $config_logdirectory . "passthru.log");
 exec ('gphoto2 --auto-detect |egrep -o "usb:...,..." > /tmp/gphoto2ports');
}

if (strip_tags($argv[2]) == "calibrateinit") {
 exec ("echo $(date) ' - CALIBRATE INIT: bash " . $config_bindirectory . "/pictures-gphoto-calibrate.sh " . $argv[1] . " init' >> " . $config_logdirectory . "passthru.log");
 exec ("bash " . $config_bindirectory . "/pictures-gphoto-calibrate.sh " . $argv[1] . " init");
}

if (strip_tags($argv[2]) == "calibrateinitapply") {
 exec ("echo $(date) ' - CALIBRATE INIT APPLY: rm " . $config_etcdirectory . "/source" . $argv[1] . "/gphotoapply' >> " . $config_logdirectory . "passthru.log");
 exec ("rm " . $config_etcdirectory . "/source" . $argv[1] . "/gphotoapply");
}

if (strip_tags($argv[2]) == "calibrateapply") {
 exec ("echo $(date) ' - CALIBRATE APPLY: echo '" . $argv[3] . "' >> " . $config_etcdirectory . "/source" . $argv[1] . "/gphotoapply' >> " . $config_logdirectory . "passthru.log");
 exec ("echo " . $argv[3] . " >> " . $config_etcdirectory . "/source" . $argv[1] . "/gphotoapply");
 exec ("echo $(date) ' - CALIBRATE INIT: bash " . $config_bindirectory . "/pictures-gphoto-calibrate.sh " . $argv[1] . " restartconf' >> " . $config_logdirectory . "passthru.log");
 exec ("bash " . $config_bindirectory . "/pictures-gphoto-calibrate.sh " . $argv[1] . " restartconf");
}

if (strip_tags($argv[2]) == "calibrateglobalinitapply") {
 exec ("echo $(date) ' - CALIBRATE GLOBAL INIT APPLY: rm " . $config_etcdirectory . "/source" . $argv[1] . "/gphotoinitparameters' >> " . $config_logdirectory . "passthru.log");
 exec ("rm " . $config_etcdirectory . "/source" . $argv[1] . "/gphotoinitparameters");
}

if (strip_tags($argv[2]) == "calibrateglobalapply") {
 exec ("echo $(date) ' - CALIBRATE GLOBAL APPLY: echo '" . $argv[3] . "' >> " . $config_etcdirectory . "/source" . $argv[1] . "/gphotoinitparameters' >> " . $config_logdirectory . "passthru.log");
 exec ("echo " . $argv[3] . " >> " . $config_etcdirectory . "/source" . $argv[1] . "/gphotoinitparameters");
}

if (strip_tags($argv[2]) == "calibraterestore") {
 exec ("echo $(date) ' - CALIBRATE RESTORE INIT CONF: cp " . $config_etcdirectory . "/source" . $argv[1] . "/gphotoinitparameters " . $config_etcdirectory . "/source" . $argv[1] . "/gphotoapply' >> " . $config_logdirectory . "passthru.log");
 exec ("cp " . $config_etcdirectory . "/source" . $argv[1] . "/gphotoinitparameters " . $config_etcdirectory . "/source" . $argv[1] . "/gphotoapply");
 exec ("echo $(date) ' - CALIBRATE INIT: bash " . $config_bindirectory . "/pictures-gphoto-calibrate.sh " . $argv[1] . " restartconf' >> " . $config_logdirectory . "passthru.log");
 exec ("bash " . $config_bindirectory . "/pictures-gphoto-calibrate.sh " . $argv[1] . " restartconf");
}

if (strip_tags($argv[2]) == "calibraterestoredel") {
 exec ("echo $(date) ' - CALIBRATE RESTORE INIT CONF: rm " . $config_etcdirectory . "/source" . $argv[1] . "/gphotoapply ' >> " . $config_logdirectory . "passthru.log");
 exec ("rm " . $config_etcdirectory . "/source" . $argv[1] . "/gphotoapply ");
}

// Reinitialisation de la configuration des sources
if (strip_tags($argv[2]) == "initconfsources") {
 exec ("echo $(date) ' - INITCONFSOURCES: cp " . $config_initdirectory . "/etc/config-source.cfg " . $config_etcdirectory . "config-source" . $argv[1] . ".cfg ' >> " . $config_logdirectory . "passthru.log");
 exec ("echo $(date) ' - INITCONFSOURCES: cp " . $config_initdirectory . "/etc/config-source-video.cfg " . $config_etcdirectory . "config-source" . $argv[1] . "-video.cfg ' >> " . $config_logdirectory . "passthru.log");
 exec ("echo $(date) ' - INITCONFSOURCES: cp " . $config_initdirectory . "/etc/config-source-videocustom.cfg " . $config_etcdirectory . "config-source" . $argv[1] . "-videocustom.cfg ' >> " . $config_logdirectory . "passthru.log");
 exec ("echo $(date) ' - INITCONFSOURCES: cp " . $config_initdirectory . "/etc/config-source-videopost.cfg " . $config_etcdirectory . "config-source" . $argv[1] . "-videopost.cfg ' >> " . $config_logdirectory . "passthru.log");
 exec ("cp " . $config_initdirectory . "/etc/config-source.cfg " . $config_etcdirectory . "config-source" . $argv[1] . ".cfg");
 exec ("cp " . $config_initdirectory . "/etc/config-source-video.cfg " . $config_etcdirectory . "config-source" . $argv[1] . "-video.cfg");
 exec ("cp " . $config_initdirectory . "/etc/config-source-videocustom.cfg " . $config_etcdirectory . "config-source" . $argv[1] . "-videocustom.cfg");
 exec ("cp " . $config_initdirectory . "/etc/config-source-videopost.cfg " . $config_etcdirectory . "config-source" . $argv[1] . "-videopost.cfg"); 
}

if (strip_tags($argv[2]) == "calibraterefresh") {
 exec ("echo $(date) ' - CALIBRATE INIT: bash " . $config_bindirectory . "/pictures-gphoto-calibrate.sh " . $argv[1] . " init' >> " . $config_logdirectory . "passthru.log");
 exec ("bash " . $config_bindirectory . "/pictures-gphoto-calibrate.sh " . $argv[1] . " refresh");
}

// Reinitialisation de la configuration des sources
if (strip_tags($argv[2]) == "initcontent") {
 exec ("echo $(date) ' - INITCONTENT: rm " . $config_sourcesdirectory . "/source" . $argv[1] . "/* -r ' >> " . $config_logdirectory . "passthru.log");
 exec ("rm " . $config_sourcesdirectory . "/source" . $argv[1] . "/* -r ");
 exec ("echo $(date) ' - INITCONTENT: mkdir " . $config_sourcesdirectory . "/source" . $argv[1] . "/live ' >> " . $config_logdirectory . "passthru.log");
 exec ("mkdir " . $config_sourcesdirectory . "/source" . $argv[1] . "/live ");
 exec ("echo $(date) ' - INITCONTENT: mkdir " . $config_sourcesdirectory . "/source" . $argv[1] . "/pictures ' >> " . $config_logdirectory . "passthru.log");
 exec ("mkdir " . $config_sourcesdirectory . "/source" . $argv[1] . "/pictures "); 
 exec ("echo $(date) ' - INITCONTENT: mkdir " . $config_sourcesdirectory . "/source" . $argv[1] . "/videos ' >> " . $config_logdirectory . "passthru.log");
 exec ("mkdir " . $config_sourcesdirectory . "/source" . $argv[1] . "/videos ");
 exec ("echo $(date) ' - INITCONTENT: mkdir " . $config_sourcesdirectory . "/source" . $argv[1] . "/tmp ' >> " . $config_logdirectory . "passthru.log");
 exec ("mkdir " . $config_sourcesdirectory . "/source" . $argv[1] . "/tmp ");
 exec ("echo $(date) ' - INITCONTENT: cp " . $config_initdirectory . "/indexpictures.php " . $config_sourcesdirectory . "/source" . $argv[1] . "/pictures/index.php ' >> " . $config_logdirectory . "passthru.log");
 exec ("cp " . $config_initdirectory . "/indexpictures.php " . $config_sourcesdirectory . "/source" . $argv[1] . "/pictures/index.php "); 
 exec ("echo $(date) ' - INITCONTENT: cp " . $config_initdirectory . "/indexvideos.php " . $config_sourcesdirectory . "/source" . $argv[1] . "/videos/index.php ' >> " . $config_logdirectory . "passthru.log");
 exec ("cp " . $config_initdirectory . "/indexvideos.php " . $config_sourcesdirectory . "/source" . $argv[1] . "/videos/index.php "); 
 exec ("echo $(date) ' - INITCONTENT: chmod 777 " . $config_sourcesdirectory . "/source" . $argv[1] . "/* -r ' >> " . $config_logdirectory . "passthru.log");
 exec ("chmod 777 " . $config_sourcesdirectory . "/source" . $argv[1] . "/ -R ");
}

// Creation des utilisateurs pour le FTP
if (strip_tags($argv[2]) == "createftpaccounts") {
 exec ("echo $(date) ' - CREATE FTP ACCOUNTS: python " . $config_bindirectory . "wpak-createlocalftpaccounts.py -g ... config-general.cfg' >> " . $config_logdirectory . "passthru.log");
 exec ("python " . $config_bindirectory . "wpak-createlocalftpaccounts.py -g " . $config_etcdirectory . "/config-general.cfg");
}

// Modification du crontab
if (strip_tags($argv[2]) == "updatecron") {
 exec ("echo $(date) ' - UPDATE CRONTAB: python " . $config_bindirectory . "wpak-cronupdatefile.py -g ... config-general.cfg' >> " . $config_logdirectory . "passthru.log");
 exec ("python " . $config_bindirectory . "wpak-cronupdatefile.py -g " . $config_etcdirectory . "/config-general.cfg");
}

// Reboot
if (strip_tags($argv[2]) == "reboot") {
 exec ("echo $(date) ' - REBOOT: reboot' >> " . $config_logdirectory . "passthru.log");
 exec ("reboot");
}

// Openvpn START
if (strip_tags($argv[2]) == "openvpnstart") {
 exec ("echo $(date) ' - Démarrage OPENVPN: /etc/init.d/openvpn start' >> " . $config_logdirectory . "passthru.log");
 exec ("/etc/init.d/openvpn start");
}

// Openvpn STOP
if (strip_tags($argv[2]) == "openvpnstop") {
 exec ("echo $(date) ' - Arret OPENVPN: /etc/init.d/openvpn stop' >> " . $config_logdirectory . "passthru.log");
 exec ("/etc/init.d/openvpn stop");
}

// Motion START
if (strip_tags($argv[2]) == "motionstart") {
 exec ("echo $(date) ' - Setup Motion: python " . $config_bindirectory . "wpak-cronupdatefile.py -a start -g .../config-general.cfg' >> " . $config_logdirectory . "passthru.log");
 exec ("python " . $config_bindirectory . "wpak-motionsetup.py -a setup -g " . $config_etcdirectory . "/config-general.cfg");
 exec ("python " . $config_bindirectory . "wpak-motionsetup.py -a start -g " . $config_etcdirectory . "/config-general.cfg");
}

// Motion STOP
if (strip_tags($argv[2]) == "motionstop") {
 exec ("echo $(date) ' - Arret Motion: /etc/init.d/motion stop' >> " . $config_logdirectory . "passthru.log");
 exec ("/etc/init.d/motion stop");
}

// Motion Status
if (strip_tags($argv[2]) == "motionstatus") {
 exec ("echo '' > /tmp/motionstatus");
 exec ("ps aux | grep motion | grep " . $config_systemuser . " | grep 'motion -c' >> /tmp/motionstatus");
}

// Motion SETUP
if (strip_tags($argv[2]) == "motionsetup") {
 exec ("echo $(date) ' - Setup Motion: python " . $config_bindirectory . "wpak-cronupdatefile.py -a setup -g .../config-general.cfg' >> " . $config_logdirectory . "passthru.log");
 exec ("python " . $config_bindirectory . "wpak-cronupdatefile.py -a setup -g " . $config_etcdirectory . "/config-general.cfg");
}

if (strip_tags($argv[2]) == "deletepic" && strip_tags($argv[3]) > 2000) {
 exec ("echo $(date) ' - DELETEPIC: rm " . $config_campictures . strip_tags($argv[3]) . "/*.jpg' >> " . $config_logdirectory . "passthru.log");
 exec ("echo $(date) ' - DELETEPIC: rmdir " . $config_campictures . strip_tags($argv[3]) . "/' >> " . $config_logdirectory . "passthru.log");
 exec ("rm " . $config_campictures . strip_tags($argv[3]) . "/*.jpg");
 exec ("rm " . $config_campictures . strip_tags($argv[3]) . "/sens*");
 exec ("rmdir " . $config_campictures . strip_tags($argv[3]) . "/"); 
 //$config_campictures
}

if (strip_tags($argv[2]) == "deletevid" && strip_tags($argv[3])!= "") {
 exec ("echo $(date) ' - DELETEVID: rm " . $config_camvideos . strip_tags($argv[3]) . "' >> " . $config_logdirectory . "passthru.log");
 exec ("rm " . $config_camvideos . $argv[3]);
 //$config_campictures
}

if (strip_tags($argv[2]) == "deletevidday" && strip_tags($argv[3])!= "") {
 exec ("echo $(date) ' - DELETEVID: rm " . $config_camvideos . strip_tags($argv[3]) . "' >> " . $config_logdirectory . "passthru.log");
 exec ("rm " . $config_camvideos . $argv[3] . "*");
 //$config_campictures
}

if (strip_tags($argv[2]) == "v4l") {
	//echo "test";
 exec ("echo $(date) ' - V4L: rm /tmp/v4linfo*' >> " . $config_logdirectory . "passthru.log");
 exec ("rm /tmp/v4linfo*");
 exec ("echo $(date) ' - V4L: rm /tmp/v4lctl*' >> " . $config_logdirectory . "passthru.log");
 exec ("rm /tmp/v4lctl*"); 
 exec ("echo $(date) ' - V4L: v4l-info /dev/video0 > /tmp/v4linfo0' >> " . $config_logdirectory . "passthru.log");
 exec ("v4l-info /dev/video0 > /tmp/v4linfo0");
 exec ("echo $(date) ' - V4L: v4l-info /dev/video1 > /tmp/v4linfo1' >> " . $config_logdirectory . "passthru.log");
 exec ("v4l-info /dev/video1 > /tmp/v4linfo1");
 exec ("echo $(date) ' - V4L: v4l-info /dev/video2 > /tmp/v4linfo2' >> " . $config_logdirectory . "passthru.log");
 exec ("v4l-info /dev/video2 > /tmp/v4linfo2");
 exec ("echo $(date) ' - V4L: v4l-info /dev/video3 > /tmp/v4linfo3' >> " . $config_logdirectory . "passthru.log");
 exec ("v4l-info /dev/video3 > /tmp/v4linfo3");
 exec ("echo $(date) ' - V4L: v4l-info /dev/video4 > /tmp/v4linfo4' >> " . $config_logdirectory . "passthru.log");
 exec ("v4l-info /dev/video4 > /tmp/v4linfo4");
 exec ("echo $(date) ' - V4L: v4l-info /dev/video5 > /tmp/v4linfo5' >> " . $config_logdirectory . "passthru.log");
 exec ("v4l-info /dev/video5 > /tmp/v4linfo5");
 exec ("echo $(date) ' - V4L: v4l-info /dev/video6 > /tmp/v4linfo6' >> " . $config_logdirectory . "passthru.log");
 exec ("v4l-info /dev/video6 > /tmp/v4linfo6");
 exec ("echo $(date) ' - V4L: v4l-info /dev/video7 > /tmp/v4linfo7' >> " . $config_logdirectory . "passthru.log");
 exec ("v4l-info /dev/video7 > /tmp/v4linfo7");
 exec ("echo $(date) ' - V4L: v4l-info /dev/video8 > /tmp/v4linfo8' >> " . $config_logdirectory . "passthru.log");
 exec ("v4l-info /dev/video8 > /tmp/v4linfo8");
 exec ("echo $(date) ' - V4L: v4l-info /dev/video9 > /tmp/v4linfo9' >> " . $config_logdirectory . "passthru.log");
 exec ("v4l-info /dev/video9 > /tmp/v4linfo9");
 exec ("echo $(date) ' - V4L: v4l-info /dev/video10 > /tmp/v4linfo10' >> " . $config_logdirectory . "passthru.log");
 exec ("v4l-info /dev/video10 > /tmp/v4linfo10");
 
 if (filesize("/tmp/v4linfo0") > "10") {
	exec ("echo $(date) ' - V4L: v4lctl -c /dev/video0 list > /tmp/v4lctl0' >> " . $config_logdirectory . "passthru.log");
	exec ("v4lctl -c /dev/video0 list > /tmp/v4lctl0");
 }
 if (filesize("/tmp/v4linfo1") > "10") {
	exec ("echo $(date) ' - V4L: v4lctl -c /dev/video1 list > /tmp/v4lctl1' >> " . $config_logdirectory . "passthru.log");
	exec ("v4lctl -c /dev/video1 list > /tmp/v4lctl1");
 }
 if (filesize("/tmp/v4linfo2") > "10") {
	exec ("echo $(date) ' - V4L: v4lctl -c /dev/video2 list > /tmp/v4lctl2' >> " . $config_logdirectory . "passthru.log");
	exec ("v4lctl -c /dev/video2 list > /tmp/v4lctl2");
 }
 if (filesize("/tmp/v4linfo3") > "10") {
	exec ("echo $(date) ' - V4L: v4lctl -c /dev/video3 list > /tmp/v4lctl3' >> " . $config_logdirectory . "passthru.log");
	exec ("v4lctl -c /dev/video3 list > /tmp/v4lctl3");
 }
 if (filesize("/tmp/v4linfo4") > "10") {
	exec ("echo $(date) ' - V4L: v4lctl -c /dev/video4 list > /tmp/v4lctl4' >> " . $config_logdirectory . "passthru.log");
	exec ("v4lctl -c /dev/video4 list > /tmp/v4lctl4");
 }
  if (filesize("/tmp/v4linfo5") > "10") {
	exec ("echo $(date) ' - V4L: v4lctl -c /dev/video5 list > /tmp/v4lctl5' >> " . $config_logdirectory . "passthru.log");
	exec ("v4lctl -c /dev/video5 list > /tmp/v4lctl5");
 }
  if (filesize("/tmp/v4linfo6") > "10") {
	exec ("echo $(date) ' - V4L: v4lctl -c /dev/video6 list > /tmp/v4lctl6' >> " . $config_logdirectory . "passthru.log");
	exec ("v4lctl -c /dev/video6 list > /tmp/v4lctl6");
 }
  if (filesize("/tmp/v4linfo7") > "10") {
	exec ("echo $(date) ' - V4L: v4lctl -c /dev/video7 list > /tmp/v4lctl7' >> " . $config_logdirectory . "passthru.log");
	exec ("v4lctl -c /dev/video7 list > /tmp/v4lctl7");
 }
  if (filesize("/tmp/v4linfo8") > "10") {
	exec ("echo $(date) ' - V4L: v4lctl -c /dev/video8 list > /tmp/v4lctl8' >> " . $config_logdirectory . "passthru.log");
	exec ("v4lctl -c /dev/video8 list > /tmp/v4lctl8");
 } 
  if (filesize("/tmp/v4linfo9") > "10") {
	exec ("echo $(date) ' - V4L: v4lctl -c /dev/video9 list > /tmp/v4lctl9' >> " . $config_logdirectory . "passthru.log");
	exec ("v4lctl -c /dev/video9 list > /tmp/v4lctl9");
 }
  if (filesize("/tmp/v4linfo10") > "10") {
	exec ("echo $(date) ' - V4L: v4lctl -c /dev/video10 list > /tmp/v4lctl10' >> " . $config_logdirectory . "passthru.log");
	exec ("v4lctl -c /dev/video10 list > /tmp/v4lctl10");
 }  
}

if (strip_tags($argv[2]) == "v4lunique") {
	$cfgsourcewebcamid = wito_getconfig($config_witoconfig, "cfgsourcewebcamcamid");
	$trans = array("video" => "", "dev" => "", "/" => "");
	$cfgsourcewebcamidnb = strtr($cfgsourcewebcamid, $trans);
	$cfgsourcewebcamidnb = $cfgsourcewebcamidnb * 1;
	exec ("echo $(date) ' - V4LUNIQUE: v4lctl -c " . $cfgsourcewebcamid . " list > /tmp/v4lctl" . $cfgsourcewebcamidnb . "' >> " . $config_logdirectory . "passthru.log");
	exec ("v4lctl -c " . $cfgsourcewebcamid . " list > /tmp/v4lctl" . $cfgsourcewebcamidnb);
}
/*if (strip_tags($argv[2]) == "sampleftp") {
 // PRISE DE LA PHOTO 
 exec ("echo $(date) ' - SAMPLEFTP: bash " . $config_bindirectory . "/pictures-capture.sh " . $argv[1] . " sample' >> " . $config_logdirectory . "passthru.log");
 exec ("bash " . $config_bindirectory . "/pictures-capture.sh " . $argv[1] . " sample");
 // UPLOAD DE LA PHOTO EN FTP
 if (wito_getconfig($config_witoconfig, "cfgftpactive") == "yes") {
	$wputactive = "-p";
 }
 $testftpuser = wito_getconfig($config_witoconfig, "cfgftpuser");
 $testftppass = wito_getconfig($config_witoconfig, "cfgftppassword");
 $testftpserver = wito_getconfig($config_witoconfig, "cfgftpserver");
 $testftpdir = wito_getconfig($config_witoconfig, "cfgftpdir");		
 $testftpphotos = wito_getconfig($config_witoconfig, "cfgftpphotosdir");
 $testsourcedir = $config_base . "sources/source" . $argv[1]  . "/tmp/";
 exec ("echo $(date) ' - SAMPLEFTP: cd " . $testsourcedir . ";/usr/bin/wput -t 3 -u " . $wputactive . " sample.jpg ftp://" . $testftpuser . ":" . $testftppass . "@" . $testftpserver . $testftpdir . $testftpphotos . " > /tmp/ftpcapture' >> " . $config_logdirectory . "passthru.log");
 exec ("cd " . $testsourcedir . ";/usr/bin/wput -t 3 -u " . $wputactive . " sample.jpg ftp://" . $testftpuser . ":" . $testftppass . "@" . $testftpserver . $testftpdir . $testftpphotos . " > /tmp/ftpcapture");
}*/

if (strip_tags($argv[2]) == "sampleftpnopic") {
 // PRISE DE LA PHOTO 
 exec ("echo $(date) ' - SAMPLEFTPNOPIC: echo UPLOAD SUCCESSFUL > /tmp/ftpupload.txt' >> " . $config_logdirectory . "passthru.log");
 exec (" echo 'UPLOAD SUCCESSFUL' > /tmp/ftpupload.txt");
 // UPLOAD DE LA PHOTO EN FTP
 if (wito_getconfig($config_witoconfig, "cfgftpactive") == "yes") {
	$wputactive = "-p";
 }
 $testftpuser = wito_getconfig($config_witoconfig, "cfgftpuser");
 $testftppass = wito_getconfig($config_witoconfig, "cfgftppassword");
 $testftpserver = wito_getconfig($config_witoconfig, "cfgftpserver");
 $testftpdir = wito_getconfig($config_witoconfig, "cfgftpdir");		
 $testftpphotos = wito_getconfig($config_witoconfig, "cfgftpphotosdir");
 $testsourcedir = $config_base . "sources/source" . $argv[1]  . "/tmp/";
 exec ("echo $(date) ' - SAMPLEFTPNOPIC: cd /tmp ;/usr/bin/wput -t 10 -u " . $wputactive . " ftpupload.txt ftp://" . $testftpuser . ":" . $testftppass . "@" . $testftpserver . $testftpdir . $testftpphotos . " > /tmp/ftpcapture' >> " . $config_logdirectory . "passthru.log");
 exec ("cd /tmp ;/usr/bin/wput -t 10 -u " . $wputactive . " ftpupload.txt ftp://" . $testftpuser . ":" . $testftppass . "@" . $testftpserver . $testftpdir . $testftpphotos . " > /tmp/ftpcapture");
}

?> 
