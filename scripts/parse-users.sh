#!/bin/bash

#This shell script lives on the system running the minecraft server
#it requires the dynamap mod to be installed. It Parses the contents
#of the dynmay ids-by-is.txt file for unique usernames then compares
#that list to what usernames it is aware of and updates the list of
#known users. It then copies the list of usernames to the web servers
#that will be using them. but only wirtes if there are changes to avoid
#unnessasary writes on the SSD. Runs as an every minute cron job.

#sets envrionmental variables
MC_DIR="/srv/forge1_7_10"
DYNMAP_DIR="$MC_DIR/dynmap/"
ID_FILE="$DYNMAP_DIR/ids-by-ip.txt"
OUTPUT_FILE="/root/.web_data/active_users"
WWW_DIR="/var/www/minectc/data"

LIVE_WWW_SERVER_IP="10.10.20.5"
DEV_WWW_SERVER_IP="10.10.20.40"

#reads ids-by-ip.txt
while read dyn_line
do
    if [[ $dyn_line =~ .*"-".* ]]; then
        DYN_USR_STRING+="$dyn_line"
    fi
done <$ID_FILE

#formats parsed data from file
DYN_USR_STRING="$(echo -e "${DYN_USR_STRING}" | tr -d '[:space:]')"
DYN_USR_STRING=${DYN_USR_STRING:1}
DYN_USR_STRING="$(echo "$DYN_USR_STRING" | sed -r 's/[-]+/ /g')"
DYN_USR_STRING="$(echo "$DYN_USR_STRING" | xargs -n1 | sort -u | xargs)"

#reads know user names from file
while read usr_line
do
    USR_STRING+="$usr_line "
done <$OUTPUT_FILE

#formates data parsed from know users 
USR_STRING="$(echo -e "${USR_STRING}" | sed -e 's/[[:space:]]*$//')"
USR_STRING="$(echo "$USR_STRING" | xargs -n1 | sort -u | xargs)"

#Compares list of users writes usernames to file if there have been changes  
if [ "$DYN_USR_STRING" != "$USR_STRING" ]; then
    unames=("$DYN_USR_STRING")
    rm $OUTPUT_FILE
    for usr_name in $unames; do
        echo $usr_name >> $OUTPUT_FILE
    done
#    echo "updated output"
    scp -q $OUTPUT_FILE root@$LIVE_WWW_SERVER_IP:$WWW_DIR/users
    scp -q $OUTPUT_FILE root@$DEV_WWW_SERVER_IP:$WWW_DIR/users
fi
