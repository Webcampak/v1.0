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


import os, sys, smtplib, datetime, tempfile, subprocess, datetime, shutil, time, ftplib
import getopt
import time
import smtplib
import zipfile
import socket
import urllib
import pwd
import locale
import gettext
import socket

from wpakFileManager import FileManager


class WebFile: 
	def __init__(self, c, cfgcurrentsource, g, debug, cfgnow, cmdType, FileManager):
		self.C = c
		self.Cfgcurrentsource = cfgcurrentsource
		self.G = g
		self.Debug = debug
		self.Cfgnow = cfgnow
		self.Cfgdispdate = self.Cfgnow.strftime("%Y%m%d%H%M%S")
		self.Cfgfilename = self.Cfgdispdate + ".jpg"		
		self.Cfgtmpdir =  self.G.getConfig('cfgbasedir') + self.G.getConfig('cfgsourcesdir') + "source" + self.Cfgcurrentsource + "/" + self.G.getConfig('cfgtmpdir')
		self.FileManager = FileManager
		
	# Function: Capture
	# Description; This function is used to download a picture from internet and consider it as a source
	# Return: True or False
	def Capture(self):
		socket.setdefaulttimeout(10)
		self.Debug.Display(_("Capture: WebFile: Starting the capture process"))
		try: 
			urllib.urlretrieve(self.C.getConfig('cfgsourcewebfileurl'), self.Cfgtmpdir + self.Cfgfilename)
			return self.FileManager.CheckCapturedFile(self.Cfgtmpdir + self.Cfgfilename, "")			
		except: 
			self.Debug.Display(_("Capture: WebFile: Error opening the URL"))	
			return False

