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

from email.MIMEMultipart import MIMEMultipart
from email.MIMEBase import MIMEBase
from email.MIMEText import MIMEText
from email.Utils import COMMASPACE, formatdate
from email import Encoders
from ctypes import *	

# This class is used to send an email
class EmailClass:
	def __init__(self, c, cfgcurrentsource, g, debug):
		#gettext.install('webcampak')
		self.C = c
		self.Cfgcurrentsource = cfgcurrentsource
		self.G = g
		self.Debug = debug
		self.Cfgcachedir = self.G.getConfig('cfgbasedir') +  self.G.getConfig('cfgcachedir')

	# Function: SendEmail
	# Description; This function is used to send an email, most parameters are stored within source config file
	#	- It collects config values and fill main parameters (From, To, Server, Port, ...)
	#	- It checks if a file must be enclosed, if yes the file is zipped
	#	- It configures SMTP (auth, tls, ...)
	#	- It sends the message
	#	- It removes the zip file
	## Subject: Email subject
	## Text: Email content
	## FilePath: Path of the file to be enclosed
	## FileName: Filename to be enclosed with the email
	## FileManager: Instance of FileManager
	# Return: Nothing
	def SendEmail(self, Subject, Text, FilePath, FileName, FileManager):
		From = self.C.getConfig('cfgemailsendfrom')
		To = [self.C.getConfig('cfgemailsendto'),self.C.getConfig('cfgemailsendcc')]
		Server = self.C.getConfig('cfgemailsmtpserver')
		ServerPort = self.C.getConfig('cfgemailsmtpserverport')
		self.Debug.Display(_("Email: Preparing to send an email to: %(To)s from: %(From)s using Server:Port: %(Server)s:%(ServerPort)s") % {'To': To,'From': From,'Server': Server,'ServerPort': ServerPort } )	
		self.Debug.Display(_("Email: Subject: %(Subject)s") % {'Subject': Subject} )	
		msg = MIMEMultipart()
		msg['From'] = From
		msg['To'] = COMMASPACE.join(To)
		msg['Date'] = formatdate(localtime=True)
		msg['Subject'] = Subject
		msg.attach( MIMEText(Text) )

		if FileName != "":
			self.Debug.Display(_("Email: Adding enclosed file: %(FileName)s.zip") % {'FileName': FileName} )	
			try:
			    import zlib
			    compression = zipfile.ZIP_DEFLATED
			except:
			    compression = zipfile.ZIP_STORED
			
			FileManager.CheckDir(self.Cfgcachedir + FileName + '.zip')	
			zf = zipfile.ZipFile(self.Cfgcachedir + FileName + '.zip', mode='w')
			zf.write(FilePath + FileName, arcname=FileName, compress_type=compression)
			zf.close()
			part = MIMEBase('application', "octet-stream")
			part.set_payload( open(self.Cfgcachedir + FileName + '.zip',"rb").read() )
			Encoders.encode_base64(part)
			part.add_header('Content-Disposition', 'attachment; filename="%s"'
				% os.path.basename(FilePath + FileName + '.zip'))
			msg.attach(part)
		try:
			smtp = smtplib.SMTP(Server, ServerPort)
			# Strat TLS		
			smtp.set_debuglevel(0)
			if self.C.getConfig('cfgemailsmtpstartttls') == "yes":
				smtp.ehlo()
				smtp.starttls()
				smtp.ehlo()
			if self.C.getConfig('cfgemailsmtpauth') == "yes":
				smtp.login(self.C.getConfig('cfgemailsmtpauthusername'), self.C.getConfig('cfgemailsmtpauthpassword'))
			# End TLS
			smtp.sendmail(From, To, msg.as_string() )
			smtp.close()
		except:
			print("Error while sending the email")
		# Remove Zip file
		if os.path.isfile(self.Cfgcachedir + FileName + '.zip'): 
			os.remove(self.Cfgcachedir + FileName + '.zip')
