from ftplib import FTP
import os
from sets import Set
import time
import db



def download(serverName,userName,passWord,remotePath,localPath):
     
     try:
          ftp=FTP(serverName,userName,passWord)
          #ftp.login(userName,passWord)
     except:
          print "Couldn't find server"
          
     
     #ftp.cwd(remotePath)
     localPath="..\\downloads\\"
     try:
          #print(ftp.pwd())
          lFileSet = Set(os.listdir(localPath))
          rFileSet = Set(ftp.nlst())
          transferList = list(rFileSet - lFileSet)
          
          #print(transferList)
          for fl in transferList:
               # create a full local filepath
            if(fl[-3:]=='php'):
                 localFile = localPath + fl
                 print(localFile)
                 grabFile = True
                 if grabFile:                
                   #open a the local file
                   fileObj = open(localFile, 'wb')
                   # Download the file a chunk at a time using RETR
                   ftp.retrbinary('RETR ' + fl, fileObj.write)
                   # Close the file
                   fileObj.close()
                   
          
     except:
          print "Connection Error"

while(True):
     
     download('31.220.16.10','u764471038','1992july07438','','')
     time.sleep(20)




