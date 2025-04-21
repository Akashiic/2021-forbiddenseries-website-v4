<?php

require "dbboardconnect.php";

session_start();

$request = $_POST['level'];

$stmt = $mysqli->query("SELECT * FROM authme WHERE permission_level = '$request'");
$bind = $stmt->fetch_assoc();

$staffName = $bind['username'];
$staffLevel = $bind['permission_level'];

header("Content-type: application/json; charset=utf-8");
$response = [
    "username" => "$staffName",
    "level" => "$staffLevel"
];
http_response_code(200);
echo json_encode($response);

