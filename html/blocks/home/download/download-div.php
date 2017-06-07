<?php

include('classes/client-info.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<div class=\"download-div-main\">";


switch ("blah") {//getOS()) {
    case "lin":
        include ('blocks/home/download/lin.php');
        break;
    case "mac":
        include ('blocks/home/download/mac.php');
        break;
    case "win":
        include ('blocks/home/download/win.php');
        break;
    default:
        include ('blocks/home/download/all.php');
        break;
}

switch (getOS()) {
    case "lin":
        include ('blocks/home/download/lin-help.php');
        break;
    case "mac":
        include ('blocks/home/download/mac-help.php');
        break;
    case "win":
        include ('blocks/home/download/win-help.php');
        break;
    default:
        include ('blocks/home/download/all-help.php');
        break;
}

echo "</div>";