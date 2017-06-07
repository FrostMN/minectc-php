<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// nav-div for Index page
$index =
"<div class=\"nav-div\">" .
"    <div class=\"nav-btn\">" .
"       <a href=\"index.php?page=home&sec=main\">Home</a><br>" .
"    </div>" .
"    <div class=\"nav-btn\">" .
"       <a href=\"index.php?page=home&sec=map\">DynMap</a><br>" .
"    </div>" .
"    <div class=\"nav-btn\">" .
"       <a href=\"index.php?page=home&sec=download\">Downloads</a><br>" .
"    </div>" .
"    <div class=\"nav-btn\">" .
"       <a href=\"index.php?page=home&sec=rules\">Rules</a><br>" .
"    </div>";

if ($admin){
    $index .=
    "    <div class=\"nav-btn\">" .
    "        <a href=\"index.php?page=home&sec=todo\">To Do</a><br>" .
    "    </div>" ;
}
$index .=
"</div>";

// nav-div for Profile page
$profile = 
"<div class=\"nav-div\">" . 
"    <div class=\"nav-btn\">" .
"        <a href=\"index.php?page=profile&sec=main\">Home</a>" .
"    </div>" .
"</div>";

// nav-div for Ticket page
$ticket = 
"<div class=\"nav-div\">" . 
"    <div class=\"nav-btn\">" .
"        <a href=\"index.php?page=ticket&sec=main\">Home</a>" .
"    </div>" .
"</div>";

// nav-div for the Admin Page
$admin =
"<div class=\"nav-div\">" .
"    <div class=\"nav-btn\">" .
"        <a href=\"index.php?page=admin&sec=mail\">Mail</a><br>" .
"    </div>" .
"    <div class=\"nav-btn\">" .
"        <a href=\"index.php?page=admin&sec=players\">Players</a><br>" .
"    </div>" .
"    <div class=\"nav-btn\">" .
"        <a href=\"index.php?page=admin&sec=ticket\">Tickets</a>" .
"    </div>" .
"</div>";


switch ($current_page) {
    case "home":
        echo $index;
        break;
    case "profile":
        echo $profile;
        break;
    case "admin":
        echo $admin;
        break;
    case "ticket":
        echo $ticket;
        break;
    default:
        echo $index;
        break;
}
