<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


switch ($current_section) {
    case "main":
        include ('blocks/home/main/home-div.php');
        break;
    case "map":
        include ('blocks/home/map/map-div.php');
        break;
    case "download":
        include ('blocks/home/download/download-div.php');
        break;
    case "rules":
        include ('blocks/home/rules/rules-div.php');
        break;
    case "todo":
        include ('blocks/home/todo/todo-div.php');
        break;
    default:
        include ('blocks/home/main/home-div.php');
        break;
}
