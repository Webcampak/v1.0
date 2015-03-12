#!/usr/bin/python
# -*- coding: utf-8 -*-
# Copyright 2010 Infracom & Eurotechnia (support@webcampak.com)
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
from xml.dom.minidom import Document

from wpakDateFormat import DateFormat
from wpakConfig import Config
from wpakFTPClass import FTPClass

# This class is the main class used to capture a picture
class RRDGraph:
	def __init__(self, c, cfgcurrentsource, g, debug, cfgnow, cmdType, FileManager, ErrorManagement, EmailClass):
		self.G = g
		self.C = c
		self.Cfgcurrentsource = cfgcurrentsource
		self.Debug = debug
		self.Cfgnow = cfgnow
		self.ErrorManagement = ErrorManagement
		self.EmailClass = EmailClass
		self.FileManager = FileManager
		self.Cfgcachedir = self.G.getConfig('cfgbasedir') +  self.G.getConfig('cfgcachedir')
		self.Cfglivedir = self.G.getConfig('cfgbasedir') + self.G.getConfig('cfgsourcesdir') + "source" + self.Cfgcurrentsource + "/" + self.G.getConfig('cfglivedir')
		self.Cfgvideodir = self.G.getConfig('cfgbasedir') + self.G.getConfig('cfgsourcesdir') + "source" + self.Cfgcurrentsource + "/" + self.G.getConfig('cfgvideodir')
		self.Cfgpictdir = self.G.getConfig('cfgbasedir') + self.G.getConfig('cfgsourcesdir') + "source" + self.Cfgcurrentsource + "/" + self.G.getConfig('cfgpictdir')
		self.Cfgtmpdir =  self.G.getConfig('cfgbasedir') + self.G.getConfig('cfgsourcesdir') + "source" + self.Cfgcurrentsource + "/" + self.G.getConfig('cfgtmpdir')
		self.Cfgdispdate = self.Cfgnow.strftime("%Y%m%d%H%M%S")
		self.Cfgfilename = self.Cfgdispdate + ".jpg"
		self.Cfginitdir = self.G.getConfig('cfgbasedir') +  self.G.getConfig('cfginitdir')
		self.Cfgnowtimestamp = cfgnow.strftime("%s")
		self.Cfglocalemessagesdir = self.G.getConfig('cfgbasedir') + "locale/" + self.G.getConfig('cfgsystemlang') + "/messages/"
		self.DateFormat = DateFormat(self.C)



	# Function: CreatXMLFiles
	# Description; Create XML Files based upon sensors.txt files. 
	#	One file per day, per sensor type
	# Return: Nothing
	def CreatXMLFiles(self):
		cptdir = 0
		for listpictdir in sorted(os.listdir(self.Cfgpictdir), reverse=True): # Browse all directories
			if listpictdir[:2] == "20" and os.path.isdir(self.Cfgpictdir + listpictdir):
				cptdir = cptdir + 1
				self.Debug.Display(_("Graph: XML: Processing %(CurrentDirectory)s directory") % {'CurrentDirectory': str(listpictdir)} )
				if os.path.isfile(self.Cfgpictdir + listpictdir + "/" + self.G.getConfig('cfgphidgetcapturefile')):
					self.Debug.Display(_("Graph: XML: %(SensorFile)s found") % {'SensorFile': self.G.getConfig('cfgphidgetcapturefile')} )
					for ListSourceSensors in range(1,int(self.C.getConfig('cfgphidgetsensornb')) + 1):
						if self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[0] != "no":
							if os.path.isfile(self.Cfgpictdir + listpictdir + "/" + self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[0] + ".xml") == False or cptdir == 1:
								self.Debug.Display(_("Graph: XML: XML file: begninning creation of %(SensorXMLFile)s file ...") % {'SensorXMLFile': self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[0] + ".xml"} )
								Sensors = Config(self.Cfgpictdir + listpictdir + "/" + self.G.getConfig('cfgphidgetcapturefile'))

								f = open(self.Cfgpictdir + listpictdir + "/" + self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[0] + ".xml", 'w')
								f.write("<?xml version=\"1.0\" ?>")
								f.write("<meta>")
								cpt = 0
								for capturetime in Sensors.getFullConfig():
									if cpt == 0:
										f.write("<start>" + str(Sensors.getSensor(capturetime, "Timestamp")) + "</start>")
									cpt = cpt + 1
								f.write("<step>60</step>")
								f.write("<end>" + str(Sensors.getSensor(capturetime, "Timestamp")) + "</end>")
								f.write("<rows>" + str(len(Sensors.getFullConfig())) + "</rows>")
								f.write("<meta>")
								f.write("<meta>")
								f.write("<meta>")

								f.write("<meta>")
								f.write("<meta>")
								f.close()

								# Start creation of the XML file
								doc = Document()
								meta = doc.createElement("meta")
								doc.appendChild(meta)

								cpt = 0
								for capturetime in Sensors.getFullConfig():
									if cpt == 0:
										node = doc.createElement("start")
										meta.appendChild(node)
										nodetext = doc.createTextNode(str(Sensors.getSensor(capturetime, "Timestamp")))
										node.appendChild(nodetext)
									cpt = cpt + 1

								node = doc.createElement("step")
								meta.appendChild(node)
								nodetext = doc.createTextNode("60")
								node.appendChild(nodetext)

								node = doc.createElement("end")
								meta.appendChild(node)
								nodetext = doc.createTextNode(str(Sensors.getSensor(capturetime, "Timestamp")))
								node.appendChild(nodetext)

								node = doc.createElement("rows")
								meta.appendChild(node)
								nodetext = doc.createTextNode(str(len(Sensors.getFullConfig())))
								node.appendChild(nodetext)

								node = doc.createElement("columns")
								meta.appendChild(node)
								nodetext = doc.createTextNode("1")
								node.appendChild(nodetext)

								node = doc.createElement("legend")
								meta.appendChild(node)
								subnode = doc.createElement("entry")
								node.appendChild(subnode)
								nodetext = doc.createTextNode(self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[2])
								subnode.appendChild(nodetext)
								# Write XML file
								#f = open(self.Cfgpictdir + listpictdir + "/" + self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[0] + ".xml", 'w')
								#doc.writexml(f)
								#f.close()
								
								doc = Document()
								data = doc.createElement("data")
								doc.appendChild(data)

								for capturetime in Sensors.getFullConfig():
									node = doc.createElement("row")
									data.appendChild(node)
									subnode = doc.createElement("t")
									node.appendChild(subnode)
									nodetext = doc.createTextNode(Sensors.getSensor(capturetime, "Timestamp"))
									subnode.appendChild(nodetext)
									subnode = doc.createElement("v")
									node.appendChild(subnode)
									if Sensors.getSensor(capturetime, self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[0]) == False:
										nodetext = doc.createTextNode("NaN")
										subnode.appendChild(nodetext)
										#print "XML:Date:" + capturetime + " - Timestamp:" + Sensors.getSensor(capturetime, "Timestamp") + " - Value:UNKNOWN" 
									else:
										nodetext = doc.createTextNode(Sensors.getSensor(capturetime, self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[0]))
										subnode.appendChild(nodetext)
										#print "XML:Date:" + capturetime + " - Timestamp:" + Sensors.getSensor(capturetime, "Timestamp") + " - Value:" + Sensors.getSensor(capturetime, self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[0])

								# Append data to XML file
								#f = open(self.Cfgpictdir + listpictdir + "/" + self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[0] + ".xml", 'a')
								#doc.writexml(f)
								#f.close()
							else: 
								self.Debug.Display(_("Graph: XML: XML file: %(SensorXMLFile)s found, cancelling ...") % {'SensorXMLFile': self.C.getConfig('cfgphidgetsensor' + str(ListSourceSensors))[0] + ".xml"} )
								


					#if self.C.getConfig('cfgphidgetcapturefile')[0] 
					#SensorsHistory = Config(self.Cfgpictdir + cfgdispday + "/" + self.G.getConfig('cfgphidgetcapturefile'))
				else:
					self.Debug.Display(_("Graph: XML: %(SensorFile)s not found, moving to next directory") % {'SensorFile': self.G.getConfig('cfgphidgetcapturefile')} )

	# Function: Main 
	# Description; Main function of the class, fully manage the RRD Graph process, see comments within the function
	# Return: Nothing
	def Main(self):
		if self.C.getConfig('cfgphidgetsensorsgraph') == "yes":
			self.Debug.Display(_("Graph: Starting graph creation function"))
			RRDGraph.CreatXMLFiles(self)	# Process failed capture (picture process only)

		else:
			self.Debug.Display(_("Graph: Graph creation disabled in config"))
		#1- Open all pictures directory, starting with the newest one
		#2- Check for sensors.txt file, cancel if no file available
		#3- Open sensors.txt file, Read sensor types
		#4- Check if there is a SensorType.xml file
		#5- If current day, re-generate sensorType.xml
		#6- If not current day, create SensorType.xml file if not available


			
