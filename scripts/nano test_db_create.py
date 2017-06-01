
#!/usr/bin/env python

#Imports Python MySQL Library
import MySQLdb

#Creates PATH for credental files
CONF_PATH = "/root/.secrets/"
DB_FILE = CONF_PATH + "db.conf"

#Loads credentals from file for db
db_creds = []
with open(DB_FILE) as line:
    db_creds = line.read().splitlines()
DB_USER = db_creds[0].split(" ")[1]
DB_PWRD = db_creds[1].split(" ")[1]
DB_NAME = "minectc_test"

#Quary for recreating database
db_qry = """
DROP DATABASE IF EXISTS `%s`;
CREATE DATABASE IF NOT EXISTS `%s`;
USE `%s`;

GRANT ALL PRIVILEGES ON `%s`.* TO 'minectcuser'@'localhost';

CREATE TABLE players (
    UsrID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    mcName varchar(16) UNIQUE,
    claimed tinyint(1) NOT NULL DEFAULT 0,
    webName varchar(25) UNIQUE,
    admin tinyint(1) NOT NULL DEFAULT 0,
    email varchar(250),
    email_verified tinyint(1) NOT NULL DEFAULT 0,
    email_nonce varchar(16),
    first_name varchar(250),
    last_name varchar(250),
    salt varchar(64),
    pword_hash varchar(64),
    hash_iter bigint default 1
);

CREATE TABLE users (
    mcName varchar(16) NOT NULL UNIQUE,
    FOREIGN KEY (mcName) REFERENCES players(mcName),
    webName varchar(25) UNIQUE
);
""" % (DB_NAME, DB_NAME, DB_NAME, DB_NAME)


#Uncomment to echo quary as sent
#print(db_qry)

#db connection to execute quary
conn = MySQLdb.connect(user=DB_USER, passwd=DB_PWRD)
cur = conn.cursor()

cur.execute(db_qry)

cur.close()

conn.commit()
conn.close()


