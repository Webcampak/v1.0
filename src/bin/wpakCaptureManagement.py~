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
import numpy as np

from wpakFTPClass import FTPClass
from wpakConfig import Config

# This class contains various capture management function and is ususlly called by Capture class
class CaptureManagement: 
	def __init__(self, c, cfgcurrentsource, g, debug, cfgnow, Phidget, DateFormat, FileManager, CmdMotion, ErrorManagement, Graph, cmdType):
		self.C = c
		self.Cfgcurrentsource = cfgcurrentsource
		self.G = g
		self.Debug = debug
		self.Cfgnow = cfgnow
		self.Phidget = Phidget
		self.DateFormat = DateFormat
		self.FileManager = FileManager
		self.CmdMotion = CmdMotion
		self.ErrorManagement = ErrorManagement
		self.Graph = Graph
		self.CmdType = cmdType
		self.Cfgtmpdir =  self.G.getConfig('cfgbasedir') + self.G.getConfig('cfgsourcesdir') + "source" + self.Cfgcurrentsource + "/" + self.G.getConfig('cfgtmpdir')
		self.Cfgcachedir = self.G.getConfig('cfgbasedir') +  self.G.getConfig('cfgcachedir')				
		self.Cfgdispdate = self.Cfgnow.strftime("%Y%m%d%H%M%S")
		self.Cfgfilename = self.Cfgdispdate + ".jpg"
		self.Cfglivedir = self.G.getConfig('cfgbasedir') + self.G.getConfig('cfgsourcesdir') + "source" + self.Cfgcurrentsource + "/" + self.G.getConfig('cfglivedir')
		self.Cfgpictdir = self.G.getConfig('cfgbasedir') + self.G.getConfig('cfgsourcesdir') + "source" + self.Cfgcurrentsource + "/" + self.G.getConfig('cfgpictdir')
		self.Cfgwatermarkdir = self.G.getConfig('cfgbasedir') + self.G.getConfig('cfgwatermarkdir')

	# Function: SensorFindNearest
	# Description; Wihin sensors.txt file, find the closest date in sensor values
	# array: array of dates
	# value: current date
	# Return: closest date
	def SensorFindNearest(self, array,value):
		idx=(np.abs(array-value)).argmin()
		return array[idx]

	# Function: IsCaptureAllowed
	# Description; Check if capture is allowed (within the proper timeframe, sufficient time since last capture, ...)
	#	- Check if the capture is within a proper, defined timeframe
	#	- Check if capture is no locked
	#	- Check elapsed time since last capture
	#	- Check if motion detection configuration
	# Return: True (capture allowed) or False (capture not allowed)
	def IsCaptureAllowed(self):
		self.Debug.Display(_("Authorization: Requesting capture slot"))
		AllowCapture = CaptureManagement.TimeFrame(self)
		if self.C.getConfig('cfgnocapture') == "yes" and self.CmdType != "capturesample":
			self.Debug.Display(_("Authorization: Capture manually disabled via administration panel"))
			AllowCapture = False	  
		if AllowCapture == True:
			AllowCapture = CaptureManagement.CheckInterval(self)
			AllowCapture = CaptureManagement.MotionDetection(self, AllowCapture)
		return AllowCapture

	# Function: TimeFrame
	# Description; Check if capture is within a pre-configured timeframe (within configuration file)
	# Return: True (capture allowed) or False (capture not allowed)
	def TimeFrame(self): 
		CurrentTime = int(self.Cfgnow.strftime("%H%M"))
		CurrentDay = int(self.Cfgnow.strftime("%w"))
		if self.C.getConfig('cfgcroncalendar') == "no": # Captures are allowed 24 / 7
			AllowCapture = True
		elif self.C.getConfig('cfgcronday' + str(CurrentDay))[0] == "yes":
			if CurrentTime > int(self.C.getConfig('cfgcronday' + str(CurrentDay))[1] + self.C.getConfig('cfgcronday' + str(CurrentDay))[2]) and CurrentTime < int(self.C.getConfig('cfgcronday' + str(CurrentDay))[3] + self.C.getConfig('cfgcronday' + str(CurrentDay))[4]):
				AllowCapture = True
			else:
				AllowCapture = False		
			if int(self.C.getConfig('cfgcronday' + str(CurrentDay))[1] + self.C.getConfig('cfgcronday' + str(CurrentDay))[2]) > int(self.C.getConfig('cfgcronday' + str(CurrentDay))[3] + self.C.getConfig('cfgcronday' + str(CurrentDay))[4]):
				if (CurrentTime > 0 and CurrentTime < int(self.C.getConfig('cfgcronday' + str(CurrentDay))[3] + self.C.getConfig('cfgcronday' + str(CurrentDay))[4])) or (CurrentTime <= 2359 and CurrentTime > int(self.C.getConfig('cfgcronday' + str(CurrentDay))[1] + self.C.getConfig('cfgcronday' + str(CurrentDay))[2])):
					AllowCapture = True
		else: # Capture not allowed this day
			AllowCapture = False	
		if AllowCapture == False:
			self.Debug.Display(_("Authorization: Refused: Outside pre-configured capture slot"))
		return AllowCapture

	# Function: CheckInterval
	# Description; Check if time since last capture is within a pre-configured range
	# Return: True (capture allowed) or False (capture not allowed)
	def CheckInterval(self): 
		if os.path.isfile(self.Cfgcachedir + "capture-" + self.Cfgcurrentsource): 
			try:
				f = open(self.Cfgcachedir + "capture-" + self.Cfgcurrentsource, 'r')
				LastCapture = int(f.read())
				f.close()
			except: 
				LastCapture = 0
				os.remove(self.Cfgcachedir + "capture-" + self.Cfgcurrentsource)
			if LastCapture > 0:
				TimeSinceLastCapture = int(self.Cfgnow.strftime("%s")) - LastCapture
				self.Debug.Display(_("Authorization: Last capture %(TimeSinceLastCapture)s seconds ago") % {'TimeSinceLastCapture': str(TimeSinceLastCapture)} )
				MinimumCaptureValue = int(self.C.getConfig('cfgminimumcapturevalue'))			
				if self.C.getConfig('cfgminimumcaptureinterval') == "minutes":
					MinimumCaptureValue = MinimumCaptureValue * 60
				self.Debug.Display(_("Authorization: Minimum capture interval: %(MinimumCaptureValue)s seconds") % {'MinimumCaptureValue': str(MinimumCaptureValue)} )		
				if TimeSinceLastCapture >= MinimumCaptureValue:
					self.Debug.Display(_("Authorization: Capture slot available"))		
					return True
				else:
					self.Debug.Display(_("Authorization: Capture slot refused, not enough time since last capture"))
					return False
			else:
				self.Debug.Display(_("Authorization: Capture slot available"))		
				return True				  
		else:
			self.Debug.Display(_("Authorization: Capture slot available, no captures previously"))	
			return True

	# Function: MotionDetection
	# Description; Used if motion detected is activated on the system, multiple mode are available
	#	- Captures can only be allowed if generated by motion
	#	- Regular captures + motion captures can be allowed
	#	Motion interval can also be configured and can be different from global capture interval
	# Return: True (capture allowed) or False (capture not allowed)
	def MotionDetection(self, AllowCapture): 
		if self.C.getConfig('cfgmotiondetectionactivate') == "yes" and self.C.getConfig('cfgmotiondetectiononly') == "yes" and self.CmdMotion != "motion": # and "$2" != "motion"
			AllowMotionCapture = False
			self.Debug.Display(_("Authorization: Motion: Capturing via cron jobs is not allowed, captures are only allowed if started by motion detection"))	
		elif self.C.getConfig('cfgmotiondetectionactivate') == "yes" and AllowCapture == True and self.CmdMotion == "motion": 
			AllowMotionCapture = False
			self.Debug.Display(_("Authorization: Motion: Motion detection module"))	
			self.Debug.Display(_("Authorization: Motion: Capture device: %(CaptureDevice)s (%(CaptureDeviceWidth)sx%(CaptureDeviceHeight)s)") % {'CaptureDevice': self.C.getConfig('cfgmotiondetectiondevice'), 'CaptureDeviceWidth': self.C.getConfig('cfgmotiondetectiondevicewidth'), 'CaptureDeviceHeight': self.C.getConfig('cfgmotiondetectiondeviceheight')} )	
			self.Debug.Display(_("Authorization: Motion: Threshold: %(CaptureDeviceThreshold)s pixels") % {'CaptureDeviceThreshold': self.C.getConfig('cfgmotiondetectionthreshold')} )	
			if os.path.isfile(self.Cfgcachedir + "motion-" + self.Cfgcurrentsource): 
				try:
					f = open(self.Cfgcachedir + "motion-" + self.Cfgcurrentsource, 'r')
					LastMotionCapture = int(f.read())
					f.close()
				except:
					LastMotionCapture = 0
					os.remove(self.Cfgcachedir + "motion-" + self.Cfgcurrentsource)
				if LastMotionCapture > 0:
					TimeSinceLastMotionCapture = int(self.Cfgnow.strftime("%s")) - LastMotionCapture 
					self.Debug.Display(_("Authorization: Motion: Last capture related to motion detection %(TimeSinceLastMotionCapture)s seconds ago") % {'TimeSinceLastMotionCapture': str(TimeSinceLastMotionCapture)} )	
					MinimumMotionCaptureValue = int(self.C.getConfig('cfgmotiondetectioncapturevalue'))			
					if self.C.getConfig('cfgmotiondetectioncaptureinterval') == "minutes":
						MinimumMotionCaptureValue = MinimumMotionCaptureValue * 60
					self.Debug.Display(_("Authorization: Motion: Minimum allowed frequency: %(MinimumMotionCaptureValue)s seconds") % {'MinimumMotionCaptureValue': str(MinimumMotionCaptureValue)} )	
					if TimeSinceLastMotionCapture >= MinimumMotionCaptureValue:
						self.Debug.Display(_("Authorization: Motion: Capture allowed, recording timestamp"))	
						f = open(self.Cfgcachedir + "motion-" + self.Cfgcurrentsource, 'w')
						f.write(self.Cfgnow.strftime("%s"))
						f.close()
						AllowMotionCapture = True
					else:
						self.Debug.Display(_("Authorization: Motion: Capture not allowed, not enough time since last capture"))	
						AllowMotionCapture = False
				else:
					AllowMotionCapture = False
					self.Debug.Display(_("Authorization: Motion: Capture not allowed, incorrect timestamp"))	
					f = open(self.Cfgcachedir + "motion-" + self.Cfgcurrentsource, 'w')
					f.write(self.Cfgnow.strftime("%s"))
					f.close()
			else:
				AllowMotionCapture = True
				self.Debug.Display(_("Authorization: Motion: Capture allowed, no previous capture found"))	
				f = open(self.Cfgcachedir + "motion-" + self.Cfgcurrentsource, 'w')
				f.write(self.Cfgnow.strftime("%s"))
				f.close()
			if AllowMotionCapture == True:
				return True
			else:
				return False
				self.Debug.Display(_("Authorization: Motion: Capture blocked by motion detection system"))	
		else:
			return AllowCapture

	# Function: ProcessImages
	# Description; Function used to apply modification to captured pictures, each option can be activated or not via configuration file
	#	- Crop picture
	#	- Insert watermark
	#	- Insert text
	#	- Insert temperature (phidget only)
	#	- Insert luminosity (phidget only)
	#	- Resize picture
	#	- Create hotlink files and, if applicable, upload via FTP
	#	- Create sensors graph
	# Return: Nothing
	def ProcessImages(self, i, cfgnow, CreateHotlink):
		cfgdispday = cfgnow.strftime("%Y%m%d")
		cfgdispdate = cfgnow.strftime("%Y%m%d%H%M%S")
		cfgfilename = cfgdispdate + ".jpg"
		cfgcurrentdate = cfgnow.strftime("%d %B %Y - %k:%M")
		if self.C.getConfig('cfgcropactivate') == "yes":
			self.Debug.Display(_("ImageMagick: Cropping picture"))
			self.Phidget.Display(0, _("IM> Recadrage"))
			i.Crop(self.C.getConfig('cfgcropsizewidth'), self.C.getConfig('cfgcropsizeheight'), self.C.getConfig('cfgcropxpos'), self.C.getConfig('cfgcropypos'), self.Cfgtmpdir + cfgfilename)
		else:
			self.Debug.Display(_("ImageMagick: Cropping disabled"))
	
		if self.C.getConfig('cfgpicwatermarkactivate') == "yes":
			self.Debug.Display(_("ImageMagick: Insert Watermark"))
			self.Phidget.Display(0, _("IM> Watermark"))
			i.Watermark(self.C.getConfig('cfgpicwatermarkpositionx'), self.C.getConfig('cfgpicwatermarkpositiony'), self.C.getConfig('cfgpicwatermarkdissolve'), self.Cfgwatermarkdir + self.C.getConfig('cfgpicwatermarkfile'), self.Cfgtmpdir + cfgfilename)	
		else:
			self.Debug.Display(_("ImageMagick: Watermark disabled"))
		
		if self.C.getConfig('cfgimagemagicktxt') == "yes":	
			self.Debug.Display(_("ImageMagick: Insert Legend"))	
			self.Phidget.Display(0, _("IM> Legende"))
			i.Text(self.C.getConfig('cfgimgtextfont'), self.C.getConfig('cfgimgtextsize'), self.C.getConfig('cfgimgtextgravity'), self.C.getConfig('cfgimgtextbasecolor'), self.C.getConfig('cfgimgtextbaseposition'), self.C.getConfig('cfgimgtext'), self.DateFormat.DateFormat(cfgnow), self.C.getConfig('cfgimgtextovercolor'), self.C.getConfig('cfgimgtextoverposition'), self.Cfgtmpdir + cfgfilename)
		else:
			self.Debug.Display(_("ImageMagick: Legend disabled"))

		# NEW SECTION TO MANAGE GRAPHS
		if self.G.getConfig('cfgphidgetactivate') == "yes":
			for ListSourceSensors in range(1,int(self.C.getConfig('cfgphidgetsensornb')) + 1):
				if self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[0] != "no" and self.C.getConfig('cfgphidgetsensorinsert' + str(ListSourceSensors))[0] != "no":
					self.Debug.Display(_("ImageMagick: Processing Sensor %(SensorNb)s") % {'SensorNb': ListSourceSensors})
					SensorsHistory = Config(self.Cfgpictdir + cfgdispday + "/" + self.G.getConfig('cfgphidgetcapturefile'))
					CurrentValue = SensorsHistory.getSensor(cfgdispdate, self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[0])
					if CurrentValue == False:
						SensorTable = []
						for capturetime in SensorsHistory.getFullConfig():
							SensorTable.append(int(capturetime))
						SensorTable = np.array(SensorTable) # Convert Python array to Numpy array
						if len(SensorTable) > 0:
							SensorNearestValue = self.SensorFindNearest(SensorTable,int(cfgdispdate))
							self.Debug.Display(_("ImageMagick: Sensor: Date %(cfgdispdate)s not found in sensor file, closest date is %(SensorNearestValue)s") % {'cfgdispdate': cfgdispdate, 'SensorNearestValue': str(SensorNearestValue)})					
							CurrentValue = SensorsHistory.getSensor(str(SensorNearestValue), self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[0])				
					if CurrentValue != False:
						self.Debug.Display(_("ImageMagick: Sensor: Insert %(SensorType)s") % {'SensorType': self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[0]})
						self.Graph.CreateSensorBar(CurrentValue, ListSourceSensors, "", "")
						if self.C.getConfig('cfgphidgetsensorinsert' + str(ListSourceSensors))[1] != "no":
							import shlex, subprocess
							Command = "convert " + self.Cfgtmpdir + "Sensor" + str(ListSourceSensors) + ".png -resize " + self.C.getConfig('cfgphidgetsensorinsert' + str(ListSourceSensors))[1] + " " + self.Cfgtmpdir + "Sensor" + str(ListSourceSensors) + ".png"
							args = shlex.split(Command)
							p = subprocess.Popen(args,stdout=subprocess.PIPE,stderr=subprocess.PIPE)
							output, errors = p.communicate()
						self.Phidget.Display(0, _("IM> Ins. Sensor"))
						i.Watermark(self.C.getConfig('cfgphidgetsensorinsert' + str(ListSourceSensors))[3], self.C.getConfig('cfgphidgetsensorinsert' + str(ListSourceSensors))[4], self.C.getConfig('cfgphidgetsensorinsert' + str(ListSourceSensors))[2], self.Cfgtmpdir + "Sensor" + str(ListSourceSensors) + ".png", self.Cfgtmpdir + cfgfilename)			  
				else:
					self.Debug.Display(_("ImageMagick: Sensor %(SensorNb)s disabled") % {'SensorNb': ListSourceSensors})

		if self.C.getConfig('cfgarchivesize') != "no":
			self.Debug.Display(_("ImageMagick: Resize archive"))
			self.Phidget.Display(0, _("IM> Redim. Archive"))
			i.Resize(self.C.getConfig('cfgarchivesize'), self.Cfgtmpdir, cfgfilename)
		else:
			self.Debug.Display(_("ImageMagick: Resizing disabled"))

	# Function: Hotlink
	# Description; Function used to create hotlink files and send it via FTP
	# Return: Nothing
	def Hotlink(self, i, cfgnow, CreateHotlink):		
		if CreateHotlink == True:
			for j in range(1, 5):
				if self.C.getConfig('cfghotlinksize' + str(j)) != "no":
					self.Debug.Display(_("ImageMagick: Hotlink: %(Hotlinkfile)s") % {'Hotlinkfile': str(j)} )
					self.Phidget.Display(0, _("IM> Hotlink ") + str(j))
					i.Resize(self.C.getConfig('cfghotlinksize' + str(j)), self.Cfglivedir, "webcam-" + self.C.getConfig('cfghotlinksize' + str(j)) + ".jpg")
					os.chmod(self.Cfglivedir + "webcam-" + self.C.getConfig('cfghotlinksize' + str(j)) + ".jpg", 0775) 			
					if self.C.getConfig('cfgftphotlinkserverid') != "no":
						self.Phidget.Display(0, _("FTP> Hotlink ") + str(j))
						self.Debug.Display(_("ImageMagick: Hotlink file upload: %(Hotlinkfile)s") % {'Hotlinkfile': str(j)} )						
						FTPClass.FTPUpload(self.C.getConfig('cfgftphotlinkserverid'), "", self.Cfglivedir,  "webcam-" + self.C.getConfig('cfghotlinksize' + str(j)) + ".jpg", self.Debug, self.C.getConfig('cfgftphotlinkserverretry'))
				else:
					self.Debug.Display(_("ImageMagick: Hotlink: %(Hotlinkfile)s disabled") % {'Hotlinkfile': str(j)} )

	# Function: Archive
	# Description; Archive capture within pictures directory
	#	- If applicable copy a full size picture within live directory (filename is full-webcam.jpg)
	#	- Copy captured filed into pictures directory (pictures/YYYYMMDD/YYYYMMDDHHMMSS.jpg)
	# Return: Nothing
	def Archive(self, cfgnow):
		cfgdispday = cfgnow.strftime("%Y%m%d")
		cfgdispdate = cfgnow.strftime("%Y%m%d%H%M%S")
		cfgfilename = cfgdispdate + ".jpg"
		if self.C.getConfig('cfghotlinkmax') != "no":
			self.Debug.Display(_("ImageMagick: Using full size picture as hotlink"))
			shutil.copy(self.Cfgtmpdir + cfgfilename, self.Cfglivedir + "full-webcam.jpg")
			os.chmod(self.Cfglivedir + "full-webcam.jpg", 0775) 			
		#if self.C.getConfig('cfgdeletelocalpictures') != "yes":
		self.Debug.Display(_("Archive: Saving picture into archives"))
		self.Phidget.Display(0, "> Archive photo")
		self.FileManager.CheckDir(self.Cfgpictdir + cfgdispday + "/" + cfgfilename)
		shutil.copy(self.Cfgtmpdir + cfgfilename, self.Cfgpictdir + cfgdispday + "/" + cfgfilename)
		os.chmod(self.Cfgpictdir + cfgdispday + "/" + cfgfilename, 0775)
			
	# Function: FTP
	# Description; Send captured picture via FTP
	# Return: Nothing
	def FTP(self, cfgnow):
		cfgdispday = cfgnow.strftime("%Y%m%d")
		cfgdispdate = cfgnow.strftime("%Y%m%d%H%M%S")
		cfgfilename = cfgdispdate + ".jpg"
		if self.C.getConfig('cfgftpmainserverid') != "no":
			self.Phidget.Display(0, _("> Upload FTP"))
			self.Debug.Display(_("FTP: Upload Archive"))
			FTPResult = FTPClass.FTPUpload(self.C.getConfig('cfgftpmainserverid'), cfgdispday + "/", self.Cfgpictdir + cfgdispday + "/",  cfgfilename, self.Debug, self.C.getConfig('cfgftpmainserverretry'))
			if FTPResult == True:
				self.Phidget.Display(0, _("> FTP: Succes"))
			else:
				self.Phidget.Display(0, _("> FTP: Failed"))
				time.sleep(1)

	# Function: SecondFTP
	# Description; Send captured picture via FTP to an additional FTP server
	# Return: Nothing
	def SecondFTP(self, cfgnow):
		cfgdispday = cfgnow.strftime("%Y%m%d")
		cfgdispdate = cfgnow.strftime("%Y%m%d%H%M%S")
		cfgfilename = cfgdispdate + ".jpg"
		if self.C.getConfig('cfgftpsecondserverid') != "no":
			self.Phidget.Display(0, _("> Upload FTP2"))
			self.Debug.Display(_("FTP2: Upload Archive"))
			FTPResult = FTPClass.FTPUpload(self.C.getConfig('cfgftpsecondserverid'), cfgdispday + "/", self.Cfgpictdir + cfgdispday + "/",  cfgfilename, self.Debug, self.C.getConfig('cfgftpsecondserverretry'))	
			if FTPResult == True:
				self.Phidget.Display(0, _("> FTP2: Succes"))
			else:
				self.Phidget.Display(0, _("> FTP2: Failed"))
				time.sleep(1)

	# Function: Purge
	# Description; Function used to purge captured files
	#	- Clean tmp directory
	#	- Automatically delete old pictures after X days (work with full days directories and not on a pictures basis)
	#	- Automatically delete pictures if global size of pictures directory is over XXMB (work with full days directories and not on a pictures basis)
	# Return: Nothing
	def Purge(self, cfgnow):
		cfgdispday = cfgnow.strftime("%Y%m%d")
		cfgdispdate = cfgnow.strftime("%Y%m%d%H%M%S")
		cfgfilename = cfgdispdate + ".jpg"
		self.Debug.Display(_("DiskManagement: Delete temporary files"))
		if os.path.isfile(self.Cfgtmpdir + cfgfilename): 
			os.remove(self.Cfgtmpdir + cfgfilename)		
		for listfiles in sorted(os.listdir(self.Cfgtmpdir)):
			if os.path.splitext(self.Cfgtmpdir + listfiles)[1] == ".jpeg":
				os.remove(self.Cfgtmpdir + listfiles)
			if os.path.splitext(listfiles)[1] == ".jpg" and str(listfiles[0] + listfiles[1] + listfiles[2] + listfiles[3]) == "capt":
				os.remove(self.Cfgtmpdir + listfiles)
		if self.C.getConfig('cfgdeletelocalpictures') == "yes":
			self.Debug.Display(_("DiskManagement: Delete picture from archive"))	
			if os.path.isfile(self.Cfgpictdir + cfgdispday + "/" + cfgfilename): 
				os.remove(self.Cfgpictdir + cfgdispday + "/" + cfgfilename)							
		if self.C.getConfig('cfgcapturedeleteafterdays') != "0":
			self.FileManager.DeleteOldPictures(self.Cfgpictdir, int(self.C.getConfig('cfgcapturedeleteafterdays')))
		if self.C.getConfig('cfgcapturemaxdirsize') != "0":
			self.FileManager.DeleteOverSize(self.Cfgpictdir, int(self.C.getConfig('cfgcapturemaxdirsize')))

	# Function: CaptureFailure
	# Description; This function is used when capture failed
	#	- It checks if it is necessary to send an email to inform about the issue
	#	- It checks if it is necessary to restart the camera (Phidget only)
	## FileManager: FileManager instance
	# Return: Nothing
	def CaptureFailure(self):
		CurrentErrorCount = self.ErrorManagement.CurrentStatus()
		self.Debug.Display(_("Capture Error: Current error count: %(CurrentErrorCount)s") % {'CurrentErrorCount': str(CurrentErrorCount)} )
		if int(CurrentErrorCount) >= int(self.C.getConfig('cfgemailalertfailure')) and self.C.getConfig('cfgemailerroractivate') == "yes":			
			self.ErrorManagement.SendErrorEmail(CurrentErrorCount, self.FileManager)	  
		if int(CurrentErrorCount) >= int(self.C.getConfig('cfgphidgetfailure')) and self.C.getConfig('cfgphidgeterroractivate') == "yes":
			CaptureManagement.RestartCamera(self,CurrentErrorCount)

	# Function: RestartCamera
	# Description; Restart the camera (Phidget only)
	#	- The function checks if the camera has already been restarted
	# Return: Nothing
	def RestartCamera(self, SendEmailErrorCount):
		if os.path.isfile(self.Cfgcachedir + "source" + self.Cfgcurrentsource + "-errorcountphidget"):
			self.Debug.Display(_("Capture Error: The camera has already been restarted... no additionnal restarts planned"))
		else:
			self.Debug.Display(_("Capture Error: Error count %(SendEmailErrorCount)s/%(EmailPhidgetFailure)s") % {'SendEmailErrorCount': str(SendEmailErrorCount), 'EmailPhidgetFailure': self.C.getConfig('cfgphidgetfailure')} )
			self.Phidget.CameraRestart()
			f = open(self.Cfgcachedir + "source" + self.Cfgcurrentsource + "-errorcountphidget", 'w')
			f.write('1')
			f.close()

	# Function: StatsProgram
	# Description; Participate in the stats program by sending a few elements
	# Return: Nothing
	def StatsProgram(self):
		import platform
		import re
		#Get software version
		if self.G.getConfig('cfgstatsactivate') == "yes":
			if os.path.isfile(self.G.getConfig('cfgbasedir') + "version"): 			
				f = open(self.G.getConfig('cfgbasedir') + "version", 'r')		
				try:
					SwVersion = f.read()
				except:
					SwVersion = "unknown"
				f.close()
			else:
				SwVersion = "unknown"
			#self.G.getConfig('cfgbasedir')
			CurrentCPU = platform.processor()
			CurrentCPU = re.sub(r'\s', '', CurrentCPU)	
			CurrentDist = platform.linux_distribution()
			CurrentDist = re.sub(r'\s', '', str(CurrentDist))
			ServerUrl = "http://stats.webcampak.com/stats.run.html?v=" + str(SwVersion) +"&t=" + self.C.getConfig('cfgsourcetype') + "&c=" + CurrentCPU + "&d=" + CurrentDist
			ServerUrl=ServerUrl.rstrip()
			#print "Server URL:" + ServerUrl
			socket.setdefaulttimeout(10)
			self.Debug.Display(_("Stats Program: Communication with central server successful"))
			try: 
				urllib.urlretrieve(ServerUrl, self.Cfgtmpdir + "tmpfile")
			except: 
				self.Debug.Display(_("Stats Program: Unable to communicate with central server"))	


