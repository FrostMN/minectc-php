<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$mojang_up = 10;
//$moj_total = 10;
//
//$mc_net = true;
//$mc_session = true;
//$mc_account = true;
//$mj_auth = true;
//$mc_skins = true;
//$mj_authserv = true;
//$mj_session = true;
//$mj_api = true;
//$mc_texture = true;
//$mj_com = true;

//$mc_net_light = BinStatusLight($mc_net, 15);

//echo $moj_total . " " . $mojang_up . "<br>";


echo "<div class=\"dropdown\" style=\"float:left;\">";
echo "    <span>Mojang: </span>"; 
echo TriStatusLight($mojang_up, $moj_total);
echo "    <div class=\"dropdown-content\" style=\"width: 160px;left: 0;text-align: left;\">";
echo "        <p>minecraft.net: " . BinStatusLight($mc_net, 15) . "</p>";
echo "        <p>mc session: " . BinStatusLight($mc_session, 15) . "</p>";
echo "        <p>mj account: " . BinStatusLight($mj_account, 15) . "</p>";
echo "        <p>mj auth: " . BinStatusLight($mj_auth, 15) . "</p>";
echo "        <p>mc skins: " . BinStatusLight($mc_skins, 15) . "</p>";
echo "        <p>mj authserv: " . BinStatusLight($mj_authserv, 15) . "</p>";
echo "        <p>mj session: " . BinStatusLight($mj_session, 15) . "</p>";
echo "        <p>mj api: " . BinStatusLight($mj_api, 15) . "</p>";
echo "        <p>mc texture: " . BinStatusLight($mc_texture, 15) . "</p>";
echo "        <p>mojang.com: " . BinStatusLight($mj_com, 15) . "</p>";
echo "    </div>";
echo "</div>";
