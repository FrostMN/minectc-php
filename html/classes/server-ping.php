<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$forge_json = file_get_contents('https://mcapi.us/server/status?ip=forge.minectc.com');
$forge_obj = json_decode($forge_json);
/*print $forge_json;*/
/*var_dump($forge_obj);*/
$motd = $forge_obj->{'motd'};
$online = $forge_obj->{'online'};
if ($online == 1){
    $forge_up = true;
} else {
    $forge_up = false;
}
$players = $forge_obj->{'players'};
$max_players = $players->{'max'};
$now_players = $players->{'now'};
//print "Forge: $status</br>" ;
//print "Players: $now_players / $max_players" ;

$mojang_json = file_get_contents('https://status.mojang.com/check');
$mojang_obj = json_decode($mojang_json, true);
/*echo $mojang_obj;*/
/*echo $mojang_obj[0]->{'minectaft.net'};*/
/*var_dump($mojang_obj);*/
if ($mojang_obj[0]["minecraft.net"] == "green"){
    $mc_net = true;
} else {
    $mc_net = false;
}

if ($mojang_obj[1]["session.minecraft.net"] == "green") {
    $mc_session = true;
} else {
$mc_session = false;
}

if ($mojang_obj[2]["account.mojang.com"] == "green") {
$mj_account = true;
} else {
$mj_account = false;
}

if ($mojang_obj[3]["auth.mojang.com"] == "green") {
$mj_auth = true;                            
} else {
$mj_auth = false;                            
}

if ($mojang_obj[4]["skins.minecraft.net"] == "green") {
$mc_skins = true;                            
} else {
$mc_skins = false;                            
}

if ($mojang_obj[5]["authserver.mojang.com"] == "green") {
$mj_authserv = true;                                                        
} else {
$mj_authserv = false;                            
}

if ($mojang_obj[6]["sessionserver.mojang.com"] == "green") {
$mj_session = true;                                                        
} else {
$mj_session = false;                            
}

if ($mojang_obj[7]["api.mojang.com"] == "green") {
$mj_api = true;                                                        
} else {
$mj_api = false;                            
}

if ($mojang_obj[8]["textures.minecraft.net"] == "green") {
$mc_texture = true;                                                        
} else {
$mc_texture = false;                            
}

if ($mojang_obj[9]["mojang.com"] == "green") {
$mj_com = true;                                                        
} else {
$mj_com = false;                            
}

$mojang_up = 0;
$moj_total = 10;

if ($mc_net == true) {
    $mojang_up += 1;
}

if ($mc_session == true) {
    $mojang_up += 1;
}

if ($mj_account == true) {
    $mojang_up += 1;
}

if ($mj_auth == true) {
    $mojang_up += 1;
}

if ($mc_skins == true) {
    $mojang_up += 1;
}

if ($mj_authserv == true) {
    $mojang_up += 1;
}

if ($mj_session == true) {
    $mojang_up += 1;
}

if ($mj_api == true) {
    $mojang_up += 1;
}

if ($mc_texture == true) {
    $mojang_up += 1;
}

if ($mj_com == true) {
    $mojang_up += 1;
}



function BinStatusLight ($is_up, $size = 20){ //, $float = ""){
    if ($is_up) {
        return "<img src=\"img/led-grn.png\" style=\"margin-top: 3px;\" alt=\"Green LED\" height=\"$size\" width=\"$size\">";
    } else {
        return "<img src=\"img/led-grn.png\" style=\"margin-top: 3px;\" alt=\"Green LED\" height=\"$size\" width=\"$size\">";
    }
}

function TriStatusLight ($up_count, $total, $size = 20){
    if ($up_count == $total) {
        return "<img src=\"img/led-grn.png\" style=\"margin-top: 3px;\" alt=\"Green LED\" height=\"$size\" width=\"$size\">";
    } elseif (($up_count < $total) && ($up_count > 0)) {
        return "<img src=\"img/led-yel.png\" style=\"margin-top: 3px;\" alt=\"Green LED\" height=\"$size\" width=\"$size\">";
    } else {
        return "<img src=\"img/led-red.png\" style=\"margin-top: 3px;\" alt=\"Green LED\" height=\"$size\" width=\"$size\">";
    }
}