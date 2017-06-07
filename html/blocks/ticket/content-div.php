<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!$logged ){
    header("location: index.php");
    //?page=profile&sec=main
}

//echo "in block/home/content-div $current_section";
switch ($current_section) {
    case "main":
        echo "This page is not yet implemented.";
        //echo "main";
        break;
    default:
        echo "This page is not yet implemented.";
        break;
}
