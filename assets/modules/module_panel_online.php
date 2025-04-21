<?php

use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;

require_once './class/MinecraftPing.php';
require_once './class/MinecraftPingException.php';



try {
    $interact = new MinecraftPing("172.111.34.138", 25565);
    $infoInteract = $interact->QueryOldPre17();
    header("Content-type: application/json; charset=utf-8");
    $response = [
        "status" => true,
        "onlinePlayer" => $infoInteract['Players']
    ];
    http_response_code(200);
    echo json_encode($response);
} catch (MinecraftPingException $e) {
    header("Content-type: application/json; charset=utf-8");
    $response = [
        "status" => false,
        "message" => $e->getMessage()
    ];
    http_response_code(404);
    echo json_encode($response);
}
