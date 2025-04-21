<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

$mysqli = new mysqli('31.170.167.25', 'u790604256_akashic', 'Enstone@2020', 'u790604256_db_server_game');

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = $mysqli->prepare('SELECT realname, permission_level FROM authme WHERE username = ?');
$query->bind_param('s', $user);
$query->execute();
$query->bind_result($realname, $permission_level);
    
if ($query->fetch()) {
	
	session_start();
	
	$_SESSION['UserLevel'] = $realname;
	$_SESSION['LevelSession'] = $permission_level;
    $_SESSION['CartItems'] = Array();
	
    return $permission_level;
}
