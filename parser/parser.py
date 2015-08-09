from ftplib import FTP
import MySQLdb
import os
from sets import Set
import time

#from db.py import *

downdir="C:\\Users\\Tharindu Prabhath\\Desktop\\FTP Parser\\"
targetdir="C:\\Users\\Tharindu Prabhath\\Desktop\\FTP Parser\\target\\"

#pass txt to sql
def vvstosql(s,v,location):
     sql="insert into votes"
     col="(seat,"
     val="('"+v[:3]+"',"
     
     votes=open(location+"//"+v,'r')
     time=votes.readline()
     for lines in votes:
          record=lines.split()
          if(record[0][:3]=="IND"):
               col=col+record[0][:5]+"_votes,"+record[0][:5]+"_percentage,"
               val=val+record[1].replace(',', '')+","+record[2][:-1]+","
          else:
               col=col+record[0]+"_votes,"+record[0]+"_percentage,"
               val=val+record[1].replace(',', '')+","+record[2][:-1]+","
     sumary=open(location+"//"+s,'r')
     time1=sumary.readline()
     valid=sumary.readline().split()
     col=col+valid[0]+"_votes,"+valid[0]+"_percentage,"
     val=val+valid[1].replace(',', '')+","+valid[2][:-1]+","
     rejected=sumary.readline().split()
     col=col+rejected[0]+"_votes,"+rejected[0]+"_percentage,"
     val=val+rejected[1].replace(',', '')+","+rejected[2][:-1]+","
     polled=sumary.readline().split()
     col=col+polled[0]+"_votes,"+polled[0]+"_percentage,"
     val=val+polled[1].replace(',', '')+","+polled[2][:-1]+","
     electors=sumary.readline().split()
     col=col+electors[0]+")"
     val=val+electors[1].replace(',', '')+")" 
    
     sql=sql+col+" values"+val
     return(sql)

#district votes and summary to table
def dvstosql(s,v,location):
     sql="insert into district_votes "
     col="(district,"
     val="('"+v[:3]+"',"

     votes=open(location+"//"+v,'r')
     time=votes.readline()
     for lines in votes:
          record=lines.split()
          if(record[0][:3]=="IND"):
               col=col+record[0][:5]+"_votes,"+record[0][:5]+"_percentage,"+record[0][:5]+"_seats,"
               val=val+record[1].replace(',', '')+","+record[2][:-1]+","+record[3]+","
          else:
               col=col+record[0]+"_votes,"+record[0]+"_percentage,"+record[0][:5]+"_seats,"
               val=val+record[1].replace(',', '')+","+record[2][:-1]+","+record[3]+","
     sumary=open(location+"//"+s,'r')
     time1=sumary.readline()
     valid=sumary.readline().split()
     col=col+valid[0]+"_votes,"+valid[0]+"_percentage,"
     val=val+valid[1].replace(',', '')+","+valid[2][:-1]+","
     rejected=sumary.readline().split()
     col=col+rejected[0]+"_votes,"+rejected[0]+"_percentage,"
     val=val+rejected[1].replace(',', '')+","+rejected[2][:-1]+","
     polled=sumary.readline().split()
     col=col+polled[0]+"_votes,"+polled[0]+"_percentage,"
     val=val+polled[1].replace(',', '')+","+polled[2][:-1]+","
     electors=sumary.readline().split()
     col=col+electors[0]+")"
     val=val+electors[1].replace(',', '')+")" 
     sql=sql+col+" values"+val
     return(sql)

#all island files to sql
def allislandsql(s,v,location):
     sql="insert into all_island "
     col="(time_stamps,"
     val="('"

     votes=open(location+"//"+v,'r')
     time=votes.readline()[:-1]
     val=val+time+"',"
     for lines in votes:
          record=lines.split()
          #ignoring independant votes
          a=0
          if(record[0][:3]=="IND"):
               continue
          else:
               #print(record)
               col=col+record[0]+"_votes,"+record[0]+"_percentage,"
               
               val=val+record[1].replace(',', '')+","+record[2][:-1]+","
               
     sumary=open(location+"//"+s,'r')
     time1=sumary.readline() #ignore timestamp in summary
     valid=sumary.readline().split()
     col=col+valid[0]+"_votes,"+valid[0]+"_percentage,"
     val=val+valid[1].replace(',', '')+","+valid[2][:-1]+","
     rejected=sumary.readline().split()
     col=col+rejected[0]+"_votes,"+rejected[0]+"_percentage,"
     val=val+rejected[1].replace(',', '')+","+rejected[2][:-1]+","
     polled=sumary.readline().split()
     col=col+polled[0]+"_votes,"+polled[0]+"_percentage,"
     val=val+polled[1].replace(',', '')+","+polled[2][:-1]+","
     electors=sumary.readline().split()
     col=col+electors[0]+")"
     val=val+electors[1].replace(',', '')+")" 
    
     sql=sql+col+" values"+val
     return(sql)

def seatstosql(v,location):
     sql="insert into national_basis_seats "
     col="(time_stamps,"
     val="('"

     votes=open(location+"//"+v,'r')
     time=votes.readline()[:-1]
     val=val+time+"',"
     for lines in votes:
          record=lines.split()
          #ignoring independant votes
          a=0
          if(record[0][:3]=="IND"):
               continue
          else:
               
               col=col+record[0]+"_votes,"+record[0]+"_seats,"
               
               val=val+record[1].replace(',', '')+","+record[2].replace(',', '')+","

     col=col[:-1]+")"          
     val=val[:-1]+")"
     sql=sql+col+" values"+val
     return(sql)

def composition(v,location):
     sql="insert into composition "
     col="(time_stamps,"
     val="('"

     votes=open(location+"//"+v,'r')
     time=votes.readline()[:-1]
     val=val+time+"',"
     for lines in votes:
          record=lines.split()
          #ignoring independant votes
          a=0
          if(record[0][:3]=="IND"):
               continue
          else:
               
               col=col+record[0]+"_district,"+record[0]+"_national,"+record[0]+"_total,"
               
               val=val+record[1].replace(',', '')+","+record[2].replace(',', '')+","+record[3].replace(',', '')+","

     col=col[:-1]+")"          
     val=val[:-1]+")"
     sql=sql+col+" values"+val
     return(sql)

#downdir shouldbe ..//downloads like this
def updatedb(downdir):
     
     try:
          # Open database connection
          db = MySQLdb.connect("localhost","root","","election" )
          # prepare a cursor object using cursor() method
          cursor = db.cursor()
     except:
          print "Error connecting to database"


     filelist=os.listdir(downdir)

     for fil in filelist:
          print(fil)
          if(fil[-3:]=='txt'):

               #catching district summary results
               if(fil[2]=='Z'):
                    
                    cursor.execute(dvstosql(fil[:3]+"S.txt",fil[:3]+"V.txt",downdir))
                    #print fil[:3]+"S.txt",fil[:3]+"V.txt"
                    os.remove(downdir+"//"+fil[:3]+"S.txt")
                    os.remove(downdir+"//"+fil[:3]+"V.txt")
                    if(fil[3]=='S'):
                         filelist.remove(fil[:3]+"V.txt")
                    else:
                         filelist.remove(fil[:3]+"S.txt")

                    db.commit()

               #catching all island summary results
               elif(fil[:5]=='AIVOT'):
                                         
                    #print(fil[:5]+"S.txt",fil[:5]+"V.txt")
                    try:
                         cursor.execute(allislandsql(fil[:5]+"S.txt",fil[:5]+"V.txt",downdir))
                    except MySQLdb.IntegrityError as err:
                         print("Previously entered file")
                    #print fil[:3]+"S.txt",fil[:3]+"V.txt"
                    os.remove(downdir+"//"+fil[:5]+"S.txt")
                    os.remove("..//downloads//"+fil[:5]+"S.txt")
                    os.remove(downdir+"//"+fil[:5]+"V.txt")
                    os.remove("..//downloads//"+fil[:5]+"V.txt")
                    if(fil[5]=='S'):
                         filelist.remove(fil[:5]+"V.txt")
                    else:
                         filelist.remove(fil[:5]+"S.txt")

                    db.commit()

               elif(fil=='AINAST.txt'):

                    try:                     
                         cursor.execute(seatstosql(fil,downdir))
                    except MySQLdb.IntegrityError as err:
                         print("Previously entered file")
                    
                    os.remove(downdir+"//"+fil)
                    os.remove("..//downloads//"+fil)
                    db.commit()

                    
               elif(fil=='AICOMP.txt'):
                    try:                     
                         cursor.execute(composition(fil,downdir))
                    except MySQLdb.IntegrityError as err:
                         print("Previously entered file")
                    os.remove(downdir+"//"+fil)
                    os.remove("..//downloads//"+fil)
                    db.commit()


               elif((fil[3:]=='S.txt') or (fil[3:]=='V.txt')):
                    cursor.execute(vvstosql(fil[:3]+"S.txt",fil[:3]+"V.txt",downdir))
                    #print fil[:3]+"S.txt",fil[:3]+"V.txt"
                    os.remove(downdir+"//"+fil[:3]+"S.txt")
                    os.remove(downdir+"//"+fil[:3]+"V.txt")
                    if(fil[3]=='S'):
                         filelist.remove(fil[:3]+"V.txt")
                    else:
                         filelist.remove(fil[:3]+"S.txt")

                    db.commit()
               else:
                    print("Invalid result file name")


          else:
               print("invalid file detected file name "+fil)
               continue


     db.close()

###########################################################################
def download(serverName,userName,passWord,remotePath,localPath):
     
     try:
          
          ftp=FTP(serverName,userName,passWord)
          
          #ftp.login(userName,passWord)
     except:
          print "Couldn't find server"
          
     
     #ftp.cwd(remotePath)
     localPath="..\\downloads\\"
     processingpath="..\\processing\\"
     try:
          #print(ftp.pwd())
          
          lFileSet = Set(os.listdir(localPath))
          rFileSet = Set(ftp.nlst())
          transferList = list(rFileSet - lFileSet)
          
          #print(transferList)
          for fl in transferList:
               
               #create a full local filepath
               if(fl[-3:]=='txt'):
                 
                 
                 localFile = localPath + fl
                 localFile1=processingpath+ fl
                 print(localFile)
                 grabFile = True
                 if grabFile:
                   if(fl=="AICOMP.txt" or fl=="AINAST.txt" or fl=="AIVOTS.txt" or fl=="AIVOTV.txt"):
                        fileObj = open(localFile, 'wb')
                        fileObj1 = open(localFile1, 'wb')
                        
                        # Download the file a chunk at a time using RETR
                        ftp.retrbinary('RETR ' + fl, fileObj.write)
                        ftp.retrbinary('RETR ' + fl, fileObj1.write)

                                                 
                             
                             
                        # Close the file
                        fileObj.close()
                        fileObj1.close()
                        
                        
                   else:
                        fileObj = open(localFile, 'wb')
                        fileObj1 = open(localFile1, 'wb')
                        
                        # Download the file a chunk at a time using RETR
                        ftp.retrbinary('RETR ' + fl, fileObj.write)
                        ftp.retrbinary('RETR ' + fl, fileObj1.write)

                                                 
                             
                             
                        # Close the file
                        fileObj.close()
                        fileObj1.close()
          
     except:
          print "Connection Error"



while(True):     
     download('31.220.16.10','u764471038','1992july07438','','')
     
     updatedb('..//processing')
     time.sleep(30)




