<?php

include ('classes/server-ping.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$forge_up = true;

echo "<div class=\"dropdown\" style=\"float:left;\">";
echo "    <span>Forge:" . BinStatusLight($forge_up) . "</span>";
echo "    <div class=\"dropdown-content\" style=\"width: 160px;left: 0;text-align: left;\">";
echo "        <p>Players: $now_players / $max_players</p>";
echo "    </div>";
echo "</div>";
