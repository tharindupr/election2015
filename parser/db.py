import MySQLdb
import os
import xml.etree.ElementTree as ET

downdir="C:\\Users\\Tharindu Prabhath\\Desktop\\FTP Parser\\"
targetdir="C:\\Users\\Tharindu Prabhath\\Desktop\\FTP Parser\\target\\"

#pass txt to sql
def vvstosql(s,v):
     sql="insert into votes"
     col="(seat,"
     val="('"+v[:3]+"',"
     
     votes=open(v,'r')
     time=votes.readline()
     for lines in votes:
          record=lines.split()
          if(record[0][:3]=="IND"):
               col=col+record[0][:5]+"_votes,"+record[0][:5]+"_percentage,"
               val=val+record[1]+","+record[2][:-1]+","
          else:
               col=col+record[0]+"_votes,"+record[0]+"_percentage,"
               val=val+record[1]+","+record[2][:-1]+","
     sumary=open(s,'r')
     time1=sumary.readline()
     valid=sumary.readline().split()
     col=col+valid[0]+"_votes,"+valid[0]+"_percentage,"
     val=val+valid[1]+","+valid[2][:-1]+","
     rejected=sumary.readline().split()
     col=col+rejected[0]+"_votes,"+rejected[0]+"_percentage,"
     val=val+rejected[1]+","+rejected[2][:-1]+","
     polled=sumary.readline().split()
     col=col+polled[0]+"_votes,"+polled[0]+"_percentage,"
     val=val+polled[1]+","+polled[2][:-1]+","
     electors=sumary.readline().split()
     col=col+electors[0]+")"
     val=val+electors[1].replace(',', '')+")" 
    
     sql=sql+col+" values"+val
     return(sql)

def dvstosql(s,v):
     sql="insert into district_votes "
     col="(district,"
     val="('"+v[:3]+"',"

     votes=open(v,'r')
     time=votes.readline()
     for lines in votes:
          record=lines.split()
          if(record[0][:3]=="IND"):
               col=col+record[0][:5]+"_votes,"+record[0][:5]+"_percentage,"+record[0][:5]+"_seats,"
               val=val+record[1]+","+record[2][:-1]+","+record[3]+","
          else:
               col=col+record[0]+"_votes,"+record[0]+"_percentage,"+record[0][:5]+"_seats,"
               val=val+record[1]+","+record[2][:-1]+","+record[3]+","
     sumary=open(s,'r')
     time1=sumary.readline()
     valid=sumary.readline().split()
     col=col+valid[0]+"_votes,"+valid[0]+"_percentage,"
     val=val+valid[1]+","+valid[2][:-1]+","
     rejected=sumary.readline().split()
     col=col+rejected[0]+"_votes,"+rejected[0]+"_percentage,"
     val=val+rejected[1]+","+rejected[2][:-1]+","
     polled=sumary.readline().split()
     col=col+polled[0]+"_votes,"+polled[0]+"_percentage,"
     val=val+polled[1]+","+polled[2][:-1]+","
     electors=sumary.readline().split()
     col=col+electors[0]+")"
     val=val+electors[1].replace(',', '')+")" 
    
     sql=sql+col+" values"+val
     return(sql)
     
try:
     # Open database connection
     db = MySQLdb.connect("localhost","root","","art" )
     # prepare a cursor object using cursor() method
     cursor = db.cursor()
except:
     print "Error connecting to database"

#listfiles
filelist=os.listdir(downdir)
#for f in filelist:
     #if(f[-3:]=='xml'):
          
     
     
# execute SQL query using execute() method.
#cursor.execute("")

# Fetch a single row using fetchone() method.
#data = cursor.fetchone()



# disconnect from server
db.close()
