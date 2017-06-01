<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<div class=\"page_header\">";
    include ('blocks/forge-status.php');
    include ('blocks/mojang-status.php');
    if (!$logged) {
    //echo "<a href=\"new-user.php\">Create Account</a> | ";
    //echo "<a href=\"mc-login.php\">Login</a>";
    //echo "<div class=\"header_btn\">";

    echo "<div class=\"header_btn\" style=\"float:right;\">";
    //echo "    <button class=\"dropbtn\"><a href=\"mc-login.php\">Login</a></button>";
    echo "    <a href=\"mc-login.php\">Login</a>";
    echo "</div>";

    echo "<div class=\"header_btn\" style=\"float:right;\">";
    //echo "    <button class=\"dropbtn\"><a href=\"new-user.php\">Create Account</a></button>";
    echo "    <a href=\"new-user.php\">Create Account</a>";
    echo "</div>";
        
    } else {
    include ('blocks/user-menu.php');
    }
echo "</div>";
