#!/usr/bin/env python

import MySQLdb

WWW_PATH = "/var/www/minectc/"
DATA_PATH = WWW_PATH + "data/"
CONF_PATH = WWW_PATH + "config/"
USR_FILE = DATA_PATH + "users"
DB_FILE = CONF_PATH + "db.conf"

db_creds = []

with open(DB_FILE) as line:
    db_creds = line.read().splitlines()

DB_USER = db_creds[0].split(" ")[1]
DB_PWRD = db_creds[1].split(" ")[1]
DB_NAME = "minectc"

DB_NAME_DEV = "devctc"

users = []
db_users = []

with open(USR_FILE) as line:
    users = line.read().splitlines()

conn = MySQLdb.connect(user=DB_USER, passwd=DB_PWRD, db=DB_NAME)
cur = conn.cursor()

cur.execute("SELECT mcName FROM players")

db_qry = cur.fetchall()

for uname in db_qry:
    db_users.append(uname[0])

cur.close()
conn.close()

usr_delta = list(set(users) - set(db_users))

qry = "INSERT INTO players (mcName) VALUES (%s)"

if len(usr_delta) > 0:
    for usr in usr_delta:
        conn = MySQLdb.connect(user=DB_USER, passwd=DB_PWRD, db=DB_NAME)
        cur = conn.cursor()
        cur.execute("INSERT INTO players (mcName) VALUES (%s)", usr)
        cur.close()
        conn.commit()
        conn.close()
