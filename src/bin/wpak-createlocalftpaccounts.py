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

"""Webcampak Create local FTP accounrs

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
	

	Debug.Display("FTP Create Accounts: Deleting previous temporary users file")
	if os.path.isfile("/etc/vsftpd/ftpusers"):
		os.remove("/etc/vsftpd/ftpusers")

	FileManager.CheckDir("/etc/vsftpd/ftpusers")
	f = open("/etc/vsftpd/ftpusers", 'a')
	f.write(g.getConfig('cfgftpresourcesusername') + "\n")
	f.write(g.getConfig('cfgftpresourcespassword') + "\n")


	for sources in range(1, int(g.getConfig('cfgnbsources')) + 1):
		if os.path.isfile(cfgetcdir + "config-source" + str(sources) + ".cfg"):
			c = Config(cfgetcdir + "config-source" + str(sources) + ".cfg")
			f.write("source" + str(sources) + "\n")
			f.write(c.getConfig('cfglocalftppass') + "\n")	  
	f.write(" " + "\n")
	f.close()

	Debug.Display("FTP Create Accounts: Creation of the users database")

	import shlex, subprocess
	Command = "db4.7_load -T -t hash -f /etc/vsftpd/ftpusers /etc/vsftpd/login.db"
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


