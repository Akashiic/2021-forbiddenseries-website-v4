<?php

$mysqli = new mysqli('31.170.167.25', 'u790604256_akashic', 'Enstone@2020', 'u790604256_db_server_game');

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{
    
}

class bridgeConnection{

    function connection(){

        $mysqli = new mysqli('31.170.167.25', 'u790604256_akashic', 'Enstone@2020', 'u790604256_db_server_game');

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }else{
            
        }

        return $mysqli;

    }

}