<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// div for index page
$menu = 
"<div class=\"dropdown\" style=\"float:right;\">" .
"    <button class=\"dropbtn\">" . $uname . "</button>" .
"        <div class=\"dropdown-content\">" .
        
//"            <a href=\"#\">- Home</a>" .
"            <a href=\"index.php?page=home&sec=main\">Home</a>" .
//"<form id=\"hom\" method=\"post\" action=\"index.php\">" .
//"    <input type=\"hidden\" name=\"page\" value=\"home\" />" . 
//"    <input type=\"hidden\" name=\"section\" value=\"main\" />" . 
//"    <a onclick=\"document.getElementById('hom').submit();\">Home</a>" .
//"</form>" .

//"            <a href=\"profile.php\">Profile</a>" .
"            <a href=\"index.php?page=profile&sec=main\">Profile</a>" .
//"<form id=\"pro\" method=\"post\" action=\"index.php\">" .
//"    <input type=\"hidden\" name=\"page\" value=\"profile\" />" . 
//"    <input type=\"hidden\" name=\"section\" value=\"main\" />" . 
//"    <a onclick=\"document.getElementById('pro').submit();\">Profile</a>" .
//"</form>" .
        
//"            <a href=\"ticket.php\">Ticket</a>";
"            <a href=\"index.php?page=ticket&sec=main\">Ticket</a>" ;
//"<form id=\"tic\" method=\"post\" action=\"index.php\">" .
//"    <input type=\"hidden\" name=\"page\" value=\"ticket\" />" . 
//"    <input type=\"hidden\" name=\"section\" value=\"main\" />" . 
//"    <a onclick=\"document.getElementById('tic').submit();\">Ticket</a>" .
//"</form>";

if ($admin) {
$menu .=
//"            <a href=\"admin.php\">Admin</a>";
"            <a href=\"index.php?page=admin&sec=main\">Admin</a>" ;

//"<form id=\"adm\" method=\"post\" action=\"index.php\">" .
//"    <input type=\"hidden\" name=\"page\" value=\"admin\" />" . 
//"    <input type=\"hidden\" name=\"section\" value=\"main\" />" . 
//"    <a onclick=\"document.getElementById('adm').submit();\">Admin</a>" .
//"</form>";
}
$menu .=
"            <a href=\"logout.php\">Logout</a>" .
"        </div>" .
"</div>";


echo $menu;

/*

// div  for profile page
$profile = 
"<div class=\"dropdown\" style=\"float:right;\">" .
"    <button class=\"dropbtn\">" . $uname . "</button>" .
"        <div class=\"dropdown-content\">" .
                
//"            <a href=\"profile.php\">Home</a>" .
"<form id=\"page\" method=\"post\" action=\"index.php\">" .
"    <input type=\"hidden\" name=\"page\" value=\"home\" />" . 
"    <input type=\"hidden\" name=\"section\" value=\"main\" />" . 
"    <a onclick=\"document.getElementById('page').submit();\">Home</a>" .
"</form>" .
        
        
//"            <a href=\"#\">- Profile</a>" .
"<form id=\"page\" method=\"post\" action=\"index.php\">" .
"    <input type=\"hidden\" name=\"page\" value=\"profile\" />" . 
"    <input type=\"hidden\" name=\"section\" value=\"main\" />" . 
"    <a onclick=\"document.getElementById('page').submit();\">- Profile</a>" .
"</form>" .        
        
//"            <a href=\"ticket.php\">Ticket</a>";
"<form id=\"page\" method=\"post\" action=\"index.php\">" .
"    <input type=\"hidden\" name=\"page\" value=\"ticket\" />" . 
"    <input type=\"hidden\" name=\"section\" value=\"main\" />" . 
"    <a onclick=\"document.getElementById('page').submit();\">Ticket</a>" .
"</form>";

if ($admin) {
$profile .=
//"            <a href=\"admin.php\">Admin</a>";

"<form id=\"page\" method=\"post\" action=\"index.php\">" .
"    <input type=\"hidden\" name=\"page\" value=\"admin\" />" . 
"    <input type=\"hidden\" name=\"section\" value=\"main\" />" . 
"    <a onclick=\"document.getElementById('page').submit();\">Admin</a>" .
"</form>";
}
$profile .=
"            <a href=\"logout.php\">Logout</a>" .
"        </div>" .
"</div>";


// div  for ticket page
$profile = 
"<div class=\"dropdown\" style=\"float:right;\">" .
"    <button class=\"dropbtn\">" . $uname . "</button>" .
"        <div class=\"dropdown-content\">" .
        
"            <a href=\"#\">Home</a>" .
        
//"            <a href=\"profile.php\">Profile</a>" .
"<form id=\"page\" method=\"post\" action=\"index.php\">" .
"    <input type=\"hidden\" name=\"page\" value=\"profile\" />" . 
"    <input type=\"hidden\" name=\"section\" value=\"main\" />" . 
"    <a onclick=\"document.getElementById('page').submit();\">Profile</a>" .
"</form>" .
        
//"            <a href=\"ticket.php\">Ticket</a>";
"            <a href=\"#\"> - Ticket</a>";

if ($admin) {
$profile .=
//"            <a href=\"admin.php\">Admin</a>";

"<form id=\"page\" method=\"post\" action=\"index.php\">" .
"    <input type=\"hidden\" name=\"page\" value=\"admin\" />" . 
"    <input type=\"hidden\" name=\"section\" value=\"main\" />" . 
"    <a onclick=\"document.getElementById('page').submit();\">Admin</a>" .
"</form>";
}
$profile .=
"            <a href=\"logout.php\">Logout</a>" .
"        </div>" .
"</div>";

// div  for admin page
$profile = 
"<div class=\"dropdown\" style=\"float:right;\">" .
"    <button class=\"dropbtn\">" . $uname . "</button>" .
"        <div class=\"dropdown-content\">" .
        
"            <a href=\"#\">Home</a>" .
        
//"            <a href=\"profile.php\">Profile</a>" .
"<form id=\"page\" method=\"post\" action=\"index.php\">" .
"    <input type=\"hidden\" name=\"page\" value=\"profile\" />" . 
"    <input type=\"hidden\" name=\"section\" value=\"main\" />" . 
"    <a onclick=\"document.getElementById('page').submit();\">Profile</a>" .
"</form>" .
        
//"            <a href=\"ticket.php\">Ticket</a>";
"            <a href=\"#\"> - Ticket</a>";

if ($admin) {
$profile .=
//"            <a href=\"admin.php\">Admin</a>";

"<form id=\"page\" method=\"post\" action=\"index.php\">" .
"    <input type=\"hidden\" name=\"page\" value=\"admin\" />" . 
"    <input type=\"hidden\" name=\"section\" value=\"main\" />" . 
"    <a onclick=\"document.getElementById('page').submit();\">Admin</a>" .
"</form>";
}
$profile .=
"            <a href=\"logout.php\">Logout</a>" .
"        </div>" .
"</div>";



switch ($current_page) {
    case "index":
    case "home":
        echo $current_page;
        echo $index;
        break;

    case "profile":

        echo $current_page;
        echo $profile;

        break;
    case "ticket":

        echo $current_page;
        echo $ticket;

        break;
    case "admin":
        echo $current_page;
        echo $admin;
        break;
    default:
        break;
}

//echo "<div class=\"dropdown\" style=\"float:right;\">";
//echo "    <button class=\"dropbtn\">" . $uname . "</button>";
//echo "        <div class=\"dropdown-content\">";
//echo "            <a href=\"profile.php\">Profile</a>";
//echo "            <a href=\"ticket.php\">Ticket</a>";
//if ($admin) {
//echo "            <a href=\"admin.php\">Admin</a>";
//}
//echo "            <a href=\"logout.php\">Logout</a>";
//echo "        </div>";
//echo "</div>";
*/