<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        if ($logged && $admin) {
        echo "<div class=\"to-do\">";
        echo "    <h1>To Do List!</h1>";
        echo "    <ul>";
        echo "        <li><del>Test for admin on login</del></li>";
        echo "        <li>Improve login:</li>";
        echo "            <ul>";
        echo "                <li>Test for unique email (users list) on account creation</li>";
        echo "                <li>Test for unique webName (users list) on account creation</li>";
        echo "                <li>more ???</li>";
        echo "            </ul>";
        echo "        <li><del>re-enable server staus on new framework</del></li>";
        echo "        <li>re-enable modloader downloads</li>";
        echo "        <li>Create mass emailer for admin</li>";
        echo "        <li>Improve email html/css</li>";
        echo "        <li>Create page to administer normal users</li>";
        echo "        <li>Create page for users to edit themselves</li>";
        echo "        <li>Create ticketing system</li>";
        echo "        <li>Proof read for typos</li>";
        echo "        <li>Fix CSS make pretty/cohesive</li>";
        echo "    </ul>";
        echo "</div>";
        }
