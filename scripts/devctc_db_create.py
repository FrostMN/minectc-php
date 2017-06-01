
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
    UsrID         int           NOT NULL PRIMARY KEY AUTO_INCREMENT,
    mcName        varchar(16)   UNIQUE NOT NULL,
    email         varchar(100)  UNIQUE,
    nonce   varchar(25)   DEFAULT NULL,
    time          datetime      DEFAULT NULL
);

insert into players (mcName) VALUES ('asouer');
insert into players (mcName) VALUES ('linc');
insert into players (mcName) VALUES ('LincolnHY');

CREATE TABLE users (
    UsrID       int            NOT NULL PRIMARY KEY AUTO_INCREMENT,
    mcName      varchar(16)    UNIQUE NOT NULL,
    webName     varchar(25)    UNIQUE NOT NULL,
    admin       tinyint(1)     NOT NULL DEFAULT 0,
    first_name  varchar(30)    NOT NULL,
    last_name   varchar(30)    NOT NULL,
    email       varchar(100)   UNIQUE NOT NULL,
    salt        varchar(64)    NOT NULL,
    hash  varchar(64)    NOT NULL
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


