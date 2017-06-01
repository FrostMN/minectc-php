!/usr/bin/env python

#Imports Python MySQL Library
import MySQLdb
import sys

#Creates PATH for credental files
CONF_PATH = "/root/.secrets/"
DB_FILE = CONF_PATH + "db.conf"

#Loads credentals from file for db
db_creds = []
with open(DB_FILE) as line:
    db_creds = line.read().splitlines()
DB_USER = db_creds[0].split(" ")[1]
DB_PWRD = db_creds[1].split(" ")[1]
DB_NAME = "devctc"

#Quary for recreating database
db_qry = """
USE %s;
UPDATE users SET admin='0' WHERE webName='%s';
""" % (DB_NAME, sys.argv[1])

#Uncomment to echo quary as sent
#print(db_qry)

#db connection to execute quary
conn = MySQLdb.connect(user=DB_USER, passwd=DB_PWRD)
cur = conn.cursor()

cur.execute(db_qry)

cur.close()

conn.commit()

conn.close()
