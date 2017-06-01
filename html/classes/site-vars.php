<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$site_conf = "/var/www/devctc/config/site.conf";
$site_vars = array();

$file = fopen($site_conf, "r");
if ($file) {
    while(!feof($file)) {
        $line = fgets($file);
        $site_vars[] = explode(" ", $line)[1];
    }
    fclose($file);
} else {
    echo "can't open site.conf<br>";
}
    
$site_url = trim($site_vars[0]);
$base_title = trim($site_vars[1]);

//echo $site_url;
//echo $base_title;