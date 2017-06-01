<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//echo "in sqlCalls.php";


$db_conf = "/var/www/devctc/config/db.conf";
$db_creds = array();

$file = fopen($db_conf, "r");
    if ($file) {
        while(!feof($file)) {
            $line = fgets($file);
            $db_creds[] = explode(" ", $line)[1];
        }
        fclose($file);
    } else {
    echo "can't open db.conf<br>";
    }

$db_servername = "localhost";
$db_username = trim($db_creds[0]);
$db_password = trim($db_creds[1]);
$db_name = trim($db_creds[2]);

//echo $db_name;
