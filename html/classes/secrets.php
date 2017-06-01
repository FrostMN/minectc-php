<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function HashPassword($salt, $pword) {
    return hash('sha256', $salt . $pword );
}

function GenerateEmailNonce($length = 16 ) {
    return GenerateSalt($length);
}

function GenerateSalt($length = 64) {
    $hash = "";
    while (strlen($hash) < $length) {
        $RandStr = openssl_random_pseudo_bytes($length);
        $hash .= hash('sha256', $RandStr);
    }
return substr($hash, 0, $length);
}