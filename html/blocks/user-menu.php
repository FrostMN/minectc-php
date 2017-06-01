<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

switch ($current_page) {
    case "index":
    case "home":

        echo "<div class=\"dropdown\" style=\"float:right;\">";
        echo "    <button class=\"dropbtn\">" . $uname . "</button>";
        echo "        <div class=\"dropdown-content\">";
        echo "            <a href=\"#\">- Home</a>";
        echo "            <a href=\"profile.php\">Profile</a>";
        echo "            <a href=\"ticket.php\">Ticket</a>";
        if ($admin) {
        echo "            <a href=\"admin.php\">Admin</a>";
        }
        echo "            <a href=\"logout.php\">Logout</a>";
        echo "        </div>";
        echo "</div>";

        break;

    case "profile":

        echo "<div class=\"dropdown\" style=\"float:right;\">";
        echo "    <button class=\"dropbtn\">" . $uname . "</button>";
        echo "        <div class=\"dropdown-content\">";
        echo "            <a href=\"index.php\">Home</a>";
        echo "            <a href=\"#\">- Profile</a>";
        echo "            <a href=\"ticket.php\">Ticket</a>";
        if ($admin) {
        echo "            <a href=\"admin.php\">Admin</a>";
        }
        echo "            <a href=\"logout.php\">Logout</a>";
        echo "        </div>";
        echo "</div>";

        break;
    case "ticket":

        echo "<div class=\"dropdown\" style=\"float:right;\">";
        echo "    <button class=\"dropbtn\">" . $uname . "</button>";
        echo "        <div class=\"dropdown-content\">";
        echo "            <a href=\"index.php\">Home</a>";
        echo "            <a href=\"profile.php\">Profile</a>";
        echo "            <a href=\"#\">- Ticket</a>";
        if ($admin) {
        echo "            <a href=\"admin.php\">Admin</a>";
        }
        echo "            <a href=\"logout.php\">Logout</a>";
        echo "        </div>";
        echo "</div>";

        break;
    case "admin":
        echo "<div class=\"dropdown\" style=\"float:right;\">";
        echo "    <button class=\"dropbtn\">" . $uname . "</button>";
        echo "        <div class=\"dropdown-content\">";
        echo "            <a href=\"index.php\">Home</a>";
        echo "            <a href=\"profile.php\">Profile</a>";
        echo "            <a href=\"ticket.php\">Ticket</a>";
        if ($admin) {
        echo "             <a href=\"#\">- Admin</a>";
        }
        echo "            <a href=\"logout.php\">Logout</a>";
        echo "        </div>";
        echo "</div>";

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
