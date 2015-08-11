import MySQLdb
db = MySQLdb.connect("localhost","root","","election" )
# prepare a cursor object using cursor() method
cursor = db.cursor()
#cursor.execute()
sql="insert into result_description(code,description,district) values("
dis=['','Colombo','Gampaha','Kalutara','Mahanuwara','Matale','Nuwara Eliya','Galle','Matara','Hambantota','Jaffna','Vanni','Batticaloa','Digamadulla','Trincomalee','Kurunegala','Puttalam','Anuradhapura','Polonnaruwa','Badulla','Moneragala','Ratnapura','Kegalle']
f=open("resultdes.txt","r")

for i in f:
     a=""
     b=i.strip().split("\t")
     a=a+"'"+b[1]+"'"+","+"'"+b[0]+"'"+","+"'"+dis[int(b[1][:-1])]+"'"+")"
     cursor.execute(sql+a)
     db.commit()
