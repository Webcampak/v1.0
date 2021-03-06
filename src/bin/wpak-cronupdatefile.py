#!/usr/bin/python
# -*- coding: utf-8 -*-
# Copyright 2010-2012 Infracom & Eurotechnia (support@webcampak.com)
# This file is part of the Webcampak project.
# Webcampak is free software: you can redistribute it and/or modify it 
# under the terms of the GNU General Public License as published by 
# the Free Software Foundation, either version 3 of the License, 
# or (at your option) any later version.

# Webcampak is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
# without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
# See the GNU General Public License for more details.

# You should have received a copy of the GNU General Public License along with Webcampak. 
# If not, see http://www.gnu.org/licenses/

"""Webcampak Update motion

Command Line tool to create local FTP accounts for vsftpd server

Usage: python wpak-createlocalftpaccounts.py

Options:
  -g /home/user/webcampak/etc/config-general.cfg,   --global=...   Global configuration file (optional), will create it if it does not exist.
  -h, --help                                                       Show this help

Examples:
  python wpak-createlocalftpaccounts.py              Create local FTP accounts for vsftpd

This program is part of Webcampk tools. For more details please visit
http://www.webcampak.com
"""

__author__ = "Eurotechnia & Infracom"
__version__ = "$Revision: 0.9 $"
__copyright__ = "Copyright (c) 2011 Eurotechnia & Infracom"
__license__ = "GPLv3"

import os, sys, smtplib, datetime, tempfile, subprocess, datetime, shutil, time, ftplib
import pwd
import getopt

class FileManager: 
	@staticmethod
	def CheckDir(f):
	    d = os.path.dirname(f)
	    if not os.path.exists(d):
	        os.makedirs(d)

class Config:
	def __init__(self, path):
		self.Path = path
		from configobj import ConfigObj
		self.Config = ConfigObj(self.Path)

	def getConfig(self, key):
		return self.Config[key]
class Debug: 
	@staticmethod
	def Display(Log):	  
		now = datetime.datetime.now()
		print(now.strftime("%d %B %Y - %k:%M:%S") + " : " + Log)
		Debug.Write(now.strftime("%d %B %Y - %k:%M:%S") + " : " + Log)

	@staticmethod
	def Write(Log):
		FileManager.CheckDir(cfglogdir + cfglogfile)
		f = open(cfglogdir + cfglogfile, 'a')
		f.write(Log + "\n")
		f.close()

	@staticmethod
	def Purge():
		if os.path.isfile(cfglogdir + cfglogfile): 	# On verifie si le fichier de logs existe existe
			if os.path.getsize(cfglogdir + cfglogfile) > int(g.getConfig('cfglogmaxsize')): # Si la taille est superieure a la valeur du fichier de configuration, suppression
				os.remove(cfglogdir + cfglogfile)
				Debug.Display("Debug: Purge: Deletion previous log file, max size allowed is %(MaxLogFileSize)s bytes" % {'MaxLogFileSize': g.getConfig('cfglogmaxsize')} )	

def usage():
    print(__doc__)

def main(argv):
	try:
		opts, args = getopt.getopt(argv, "hg:g", ["help", "global="])
	except getopt.GetoptError:
		usage()
		sys.exit(2)
		
	global CmdGlobalConfig	
	global cfglogdir
	global cfglogfile
	
	CmdGlobalConfig = ""

	for opt, arg in opts:
		if opt in ("-h", "--help"):
			usage()
			sys.exit()
		elif opt in ("-g", "--global"):
			CmdGlobalConfig = arg

	if CmdGlobalConfig != "" and os.path.isfile(CmdGlobalConfig):
			g = Config(CmdGlobalConfig)
	else:
		print("Error: Unable to identify source configuration file")
		usage()
		sys.exit()

	cfgbasedir = g.getConfig('cfgbasedir')
	cfglogdir = cfgbasedir +  g.getConfig('cfglogdir')
	cfglogfile = "passthru.log"
	cfgetcdir = cfgbasedir + g.getConfig('cfgetcdir')
	cfgcachedir = cfgbasedir +  g.getConfig('cfgcachedir')
	cfginitdir = cfgbasedir +  g.getConfig('cfginitdir')
	cfgbindir = cfgbasedir +  g.getConfig('cfgbindir')

	Debug.Display("Crontab: Deleting previous temporary cron file")
	if os.path.isfile(cfgcachedir + "crontab"):
		os.remove(cfgcachedir + "crontab")

	FileManager.CheckDir(cfgcachedir + "crontab")
	if os.path.isfile(cfginitdir + "config/crontab.init"):
		shutil.copy(cfginitdir + "config/crontab.init", cfgcachedir + "crontab")
	
	f = open(cfgcachedir + "crontab", 'a')

	for sources in range(1, int(g.getConfig('cfgnbsources')) + 1):
		if os.path.isfile(cfgetcdir + "config-source" + str(sources) + ".cfg"):
			Debug.Display("Crontab: Processing source %(SourceNumber)s: Captures" % {'SourceNumber': str(sources)} )
			c = Config(cfgetcdir + "config-source" + str(sources) + ".cfg")
			f.write("#Taches source:" + str(sources) + "\n")
			newcronhours="*"
			newcrondays="*"
			if c.getConfig('cfgcroncaptureinterval') == "minutes":	
				f.write("*/" + c.getConfig('cfgcroncapturevalue') + " " +  newcronhours + " * * " + newcrondays + " python " + cfgbindir + "webcampak.py -t capture -s " + str(sources) + "\n")
			elif c.getConfig('cfgcroncaptureinterval') == "seconds":
				f.write("* " +  newcronhours + " * * " + newcrondays + " python " + cfgbindir + "webcampak.py -t capture -s " + str(sources) + "\n")
				i = 0
				for secloop in range(1, 30):
					i = i + int(c.getConfig('cfgcroncapturevalue'))
					if i < 60:
						f.write("* " +  newcronhours + " * * " + newcrondays + " sleep " + str(i) + " && python " + cfgbindir + "webcampak.py -t capture -s " + str(sources) + "\n")
			Debug.Display("Crontab: Processing source %(SourceNumber)s: Videos" % {'SourceNumber': str(sources)} )
			f.write(c.getConfig('cfgcrondailyminute') + " " +  c.getConfig('cfgcrondailyhour') + " * * * python " + cfgbindir + "webcampak.py -t video -s " + str(sources) + " > " + cfglogdir + "cronlog-" + str(sources) + "-dailyvid \n")
			Debug.Display("Crontab: Processing source %(SourceNumber)s: Videos Custom" % {'SourceNumber': str(sources)} )
			if c.getConfig('cfgcroncustominterval') == "minutes":		
				f.write("*/" + c.getConfig('cfgcroncustomvalue') + " * * * * flock -xn " + cfgcachedir + "createcustom" + str(sources) + ".lock python " + cfgbindir + "webcampak.py -t videocustom -s " + str(sources) + " > " + cfglogdir + "cronlog-" + str(sources) + "-customvid \n")
				f.write("*/" + c.getConfig('cfgcroncustomvalue') + " * * * * flock -xn " + cfgcachedir + "createpost" + str(sources) + ".lock python " + cfgbindir + "webcampak.py -t videopost -s " + str(sources) + " > " + cfglogdir + "cronlog-" + str(sources) + "-post \n")
			elif c.getConfig('cfgcroncustominterval') == "hours":	
				f.write("* */" + c.getConfig('cfgcroncustomvalue') + " * * * flock -xn " + cfgcachedir + "createcustom" + str(sources) + ".lock python " + cfgbindir + "webcampak.py -t videocustom -s " + str(sources) + " > " + cfglogdir + "cronlog-" + str(sources) + "-customvid \n")
				f.write("* */" + c.getConfig('cfgcroncustomvalue') + " * * * flock -xn " + cfgcachedir + "createpost" + str(sources) + ".lock python " + cfgbindir + "webcampak.py -t videopost -s " + str(sources) + " > " + cfglogdir + "cronlog-" + str(sources) + "-post \n")
			Debug.Display("Crontab: Processing source %(SourceNumber)s: RRD Graph" % {'SourceNumber': str(sources)} )
			f.write("*/5 * * * * python " + cfgbindir + "webcampak.py -t rrdgraph -s " + str(sources) + " > " + cfglogdir + "cronlog-" + str(sources) + "-rrdgraph \n")
			
			f.write(" " + "\n")
	f.close()

	Debug.Display("FTP Create Accounts: Creation of the users database")

	import shlex, subprocess
	Command = "crontab " + cfgcachedir + "crontab"
	args = shlex.split(Command)
	p = subprocess.Popen(args,stdout=subprocess.PIPE,stderr=subprocess.PIPE)
	output, errors = p.communicate()
	Debug.Display(output)
	Debug.Display(errors)

	import shlex, subprocess
	Command = "crontab -l "
	args = shlex.split(Command)
	p = subprocess.Popen(args,stdout=subprocess.PIPE,stderr=subprocess.PIPE)
	output, errors = p.communicate()
	Debug.Display(output)
	Debug.Display(errors)

if __name__ == "__main__":
	main(sys.argv[1:])


#cfgbasedir="/home/choupi/webcampak/";	# Configuration du répertoire de base du script
#Chargement de la configuration generale
#. ${cfgbasedir}etc/config-general.cfg

#echo "$(date +'%d %B %Y - %k:%M')${logtag} Suppression du fichier utilisateurs temporaire" >> ${cfglogdir}passthru.log
#rm /etc/vsftpd/ftpusers

#echo "${cfgftpresourcesusername}" >> /etc/vsftpd/ftpusers
#echo "${cfgftpresourcespassword}" >> /etc/vsftpd/ftpusers 

#echo "$(date +'%d %B %Y - %k:%M')${logtag} Creation des comptes FTP" >> ${cfglogdir}passthru.log	
#for ((i = 1; i <= ${cfgnbsources}; i += 1))
#do
#	if [ -f ${cfgetcdir}config-source${i}.cfg ]; then
#		echo "Traitement source: ${i}"  >> ${cfglogdir}passthru.log
#		. ${cfgetcdir}config-source${i}.cfg
#		echo "source${i}"  >> /etc/vsftpd/ftpusers
#		echo "${cfglocalftppass}" >> /etc/vsftpd/ftpusers	
#	fi
#done 
#echo " " >> /etc/vsftpd/ftpusers
#echo "$(date +'%d %B %Y - %k:%M')${logtag} Creation de la base utilisateurs" >> ${cfglogdir}passthru.log

#db4.7_load -T -t hash -f /etc/vsftpd/ftpusers /etc/vsftpd/login.db >> ${cfglogdir}passthru.log
#(Requires the Berkeley db program installed).
#sudo apt-get install db4.7-util


