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
               val=val+record[1].replace(',', '')+","+record[2][:-1]+","
          else:
               col=col+record[0]+"_votes,"+record[0]+"_percentage,"
               val=val+record[1].replace(',', '')+","+record[2][:-1]+","
     sumary=open(s,'r')
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
               val=val+record[1].replace(',', '')+","+record[2][:-1]+","+record[3]+","
          else:
               col=col+record[0]+"_votes,"+record[0]+"_percentage,"+record[0][:5]+"_seats,"
               val=val+record[1].replace(',', '')+","+record[2][:-1]+","+record[3]+","
     sumary=open(s,'r')
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
def allislandsql(s,v):
     sql="insert into all_island "
     col="(time_stamps,"
     val="('"

     votes=open(v,'r')
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
               
     sumary=open(s,'r')
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

def seatstosql(v):
     sql="insert into national_basis_seats "
     col="(time_stamps,"
     val="('"

     votes=open(v,'r')
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

def composition(v):
     sql="insert into composition "
     col="(time_stamps,"
     val="('"

     votes=open(v,'r')
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
     
try:
     # Open database connection
     db = MySQLdb.connect("localhost","root","","election" )
     # prepare a cursor object using cursor() method
     cursor = db.cursor()
except:
     print "Error connecting to database"

#listfiles
filelist=os.listdir(downdir)
#for f in filelist:
     #if(f[-3:]=='xml'):
#print(vvstosql('01AS.txt','01AV.txt'))
#cursor.execute(vvstosql('01AS.txt','01AV.txt'))
#print(dvstosql('01ZS.txt','01ZV.txt'))
#cursor.execute(dvstosql('01ZS.txt','01ZV.txt'))
#cursor.execute(allislandsql('AIVOTS.txt','AIVOTV.txt'))
#cursor.execute(seatstosql('AINAST.txt'))
#cursor.execute(composition('AICOMP.txt'))


#cursor.execute("insert into votes(seat,AITC_votes) values('a1',4566)")
# execute SQL query using execute() method.
#

db.commit()
# Fetch a single row using fetchone() method.
#data = cursor.fetchone()



# disconnect from server
db.close()
