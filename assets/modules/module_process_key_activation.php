<?php

/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

$serialid = $_POST['serialID'];
$usernick = $_POST['usernameSerial'];

// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //

include_once 'dbboardconnect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'dbboardconnect.php';
require '../lib/apis/phpmailer/vendor/autoload.php';

// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //

//echo '<pre>', var_dump($bind), '</pre>';


function sendMail($assunto, $htmlMail, $whitoutHtmlMail, $destiny){

    $mail = new PHPMailer(true);

    try {

//        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@forbiddenseries.net';
        $mail->Password = '@Forbidden2020';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('no-reply@forbiddenseries.net', 'Forbidden Series');
        $mail->addAddress($destiny, 'Destinatario');

        $mail->isHTML(true);

        $mail->Subject = $assunto;
        $mail->msgHTML($htmlMail);
        $mail->AltBody = $whitoutHtmlMail;

        $mail->send();
    } catch (Exception $e) {
        echo "Bug {$mail->ErrorInfo}";
    }
}

function generateKey($n){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}


$transaction = $mysqli->query("SELECT * FROM fire_transaction WHERE serial_id = '$serialid'");
$bind = $transaction->fetch_assoc();

if($bind['claimed'] == 'false' && $bind['type_info'] == 'VIP' && $bind['status'] == 'approved'){

    if ($bind['title'] == 'Vip Vanilla'){$grupo = 'vipvanilla';}
    if ($bind['title'] == 'Vip Radio'){$grupo = 'vipradio';}
    if ($bind['title'] == 'Vip Avaroza'){$grupo = 'vipavaroza';}

    $insert = $mysqli->prepare("INSERT INTO `keys`(`key`, `grupo`, `dias`, `search`) VALUES ('" . generateKey(10) . "', '$grupo', " . 30 * $bind['quantity'] . ", '" . $bind['serial_id'] . "')");
    $insert->execute();
    $insert->close();

    $consulta = $mysqli->query("SELECT * FROM `keys` WHERE `grupo` = '$grupo'");
    $rows = $consulta->fetch_assoc();


    header("Content-type: application/json; charset=utf-8");
    $response = [
        "alredyClaimed" => false,
        "key" => $rows['key'],
        "name" => $bind['title']
    ];
    http_response_code(200);
    echo json_encode($response);

            // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
            // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //

            $semMail = 'Sua key:'.$rows['key'];
            $mailHtml = '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
            xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
        
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="x-apple-disable-message-reformatting">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
            <style>
        
                @font-face{
                    font-family: "Minecraft";
                    font-style: normal;
                    font-weight: normal;
                    src: url("https://forbiddenseries.net/assets/lib/fonts/1_MinecraftRegular1.woff") format("woff");
                }
        
                @font-face{
                    font-family: "Raleway Regular";
                    src: url("https:https://forbiddenseries.net/assets/lib/fonts/Raleway-Regular.woff") format("woff");
                }
        
                * {
                    outline: none;
                    border: none;
                    padding: 0;
                    margin: 0;
                }
        
                body{
                    width: 100%;
                    height: 100%;
                }
        
                #inner {
                    display: table;
                    margin: 0 auto;
                    background-color: rgba(255, 255, 255, 0.8);
                    border-radius: 6px;
                    width: 500px;
                }
        
                #inner img {
                    display: table;
                    margin: 0 auto;
                    width: 490px;
                }
        
                #injustice {
                    padding-top: 20px;
                    padding-bottom: 30px;
                }
        
                #injustice p {
                    padding-left: 10px !important;
                    padding-right: 10px !important;
                    text-align: center;
                    font-size: 15px;
                    font-family: "Minecraft";
                }
        
                #reform-product{
                    color: black;
                    font-family: Arial, sans-serif !important;
                    font-size: 18px !important;
                }
        
                #outer {
                    width: 100%;
                    padding-top: 120px;
                    padding-bottom: 120px;
                }
        
                #internal-divison {
                    margin-bottom: 20px;
                    margin-top: 20px;
                }
            </style>
        
        </head>
        <body style="background-image: url(`https://forbiddenseries.net/assets/lib/img_remote/abxc.png`); background-size: cover;">
        
            <div id="outer">
                <div id="inner">
                    <img src="https://forbiddenseries.net/assets/lib/img_remote/logodoforbidden.png">
                    <hr style="border-top: solid 1px rgba(0,0,0,0.5); border-bottom: solid 1px rgba(0,0,0,0.5);">
                    <div id="injustice">
                        <p id="reform-product">Você Ativou '. $bind["title"] .'</p>
                        <p>de ' . $rows['dias'] . ' Dias</p>
                        <br>
                        <p>Entre no Servidor e digite /usarkey (key)</p>
                        <hr id="internal-divison" style="border-top: solid 1px rgba(0,0,0,0.5); border-bottom: solid 1px rgba(0,0,0,0.5);">
                        <p>Ative sua Key!!</p>
                        <h2 style="text-align: center;">'. $rows['key'] .'</h2>
                    </div>
                </div>
            </div>
        
        </body>
        </html>';
            
            sendMail('Sua key foi liberada!', $mailHtml, $semMail, $bind['email_payer']);
            // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
            // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //

    $update = $mysqli->prepare("UPDATE fire_transaction SET claimed = 'true' WHERE payment_id = '".$bind['payment_id']."';");
    $update->execute();

}

if($bind['claimed'] == 'true' && $bind['status'] == 'approved'){
    
    header("Content-type: application/json; charset=utf-8");
    $response = [
        "alredyClaimed" => true,
    ];
    http_response_code(200);
    echo json_encode($response);

}

if($serialid !== $bind['serial_id'] || $bind['status'] !== 'approved'){
    header("Content-type: application/json; charset=utf-8");
    $response = [
        "invalid" => true,
    ];
    http_response_code(200);
    echo json_encode($response);
}

/*if ($bind['claimed'] == 'false' && $bind['type_info'] == 'VIP') {

    $serials = $mysqli->query("SELECT * FROM `keys` WHERE `search` = '$serialid'");
    $bindKeys = $serials->fetch_assoc();

    if ($serials->num_rows < 1) {

        if ($bind['title'] == 'Vip Vanilla') {
            $grupo = 'vipvanilla';
        }
        if ($bind['title'] == 'Vip Radio') {
            $grupo = 'vipradio';
        }
        if ($bind['title'] == 'Vip Avaroza') {
            $grupo = 'vipavaroza';
        }

        $insert = $mysqli->prepare("INSERT INTO `keys`(`key`, `grupo`, `dias`, `search`) VALUES ('" . generateKey(10) . "', '$grupo', " . 30 * $bind['quantity'] . ", '" . $bind['serial_id'] . "')");
        $insert->execute();
        $insert->close();

        $binding = $mysqli->query("SELECT * FROM `keys` WHERE `search` = '$serialid'");
        $bindingKey = $binding->fetch_assoc();

        if ($binding->num_rows < 1) {

            $update = $mysqli->prepare("UPDATE fire_transaction SET claimed = 'true' WHERE payment_id = '" . $bind['payment_id'] . "';");
            $update->execute() ? 'Updated' : 'Not Found';

            header("Content-type: application/json; charset=utf-8");
            $response = [
                "alredyClaimed" => false,
                "name" => $bind['title'],
                "key" => $bindingKey['key']
            ];
            http_response_code(200);
            echo json_encode($response);
    
        }
        

    }elseif($serials->num_rows == 1){

        $binding = $mysqli->query("SELECT * FROM `keys` WHERE `search` = '$serialid'");
        $bindingKey = $binding->fetch_assoc();
        if($binding->num_rows == 1){
            header("Content-type: application/json; charset=utf-8");
            $response = [
                "alredyClaimed" => false,
                "name" => $bind['title'],
                "key" => $bindingKey['key']
            ];
            http_response_code(200);
            echo json_encode($response);
        }
    }

} else {

    header("Content-type: application/json; charset=utf-8");
    $response = [
        "alredyClaimed" => true
    ];
    http_response_code(200);
    echo json_encode($response);
}*/

/*while($bind = $transaction->fetch_assoc()){

    if($serialid == $bind['serial_id'] && $bind['title'] == 'Vip Vanilla' && $bind['status'] == 'approved'){

        if($bind['recived_product'] == 'false'){

            header("Content-type: application/json; charset=utf-8");
            $response = [
                "alredyClaimed" => false
            ];
            http_response_code(200);
            echo json_encode($response);
    
            $insert = $mysqli->prepare("INSERT INTO `keys`(`key`, `grupo`, `dias`) VALUES ('" . generateKey(10) . "','vipvanilla', 30)");
            $insert->execute();
            $insert->close();

            // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
            // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
            $consulta = $mysqli->query("SELECT `key` FROM `keys` WHERE `grupo` = 'vipvanilla'");
            $rows = $consulta->fetch_assoc();

            $semMail = 'Sua key:'.$rows['key'];
            $mailHtml = '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
            xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
        
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="x-apple-disable-message-reformatting">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
            <style>
        
                @font-face{
                    font-family: "Minecraft";
                    font-style: normal;
                    font-weight: normal;
                    src: url("https://forbiddenseries.net/assets/lib/fonts/1_MinecraftRegular1.woff") format("woff");
                }
        
                @font-face{
                    font-family: "Raleway Regular";
                    src: url("https:https://forbiddenseries.net/assets/lib/fonts/Raleway-Regular.woff") format("woff");
                }
        
                * {
                    outline: none;
                    border: none;
                    padding: 0;
                    margin: 0;
                }
        
                body{
                    width: 100%;
                    height: 100%;
                }
        
                #inner {
                    display: table;
                    margin: 0 auto;
                    background-color: rgba(255, 255, 255, 0.8);
                    border-radius: 6px;
                    width: 500px;
                }
        
                #inner img {
                    display: table;
                    margin: 0 auto;
                    width: 490px;
                }
        
                #injustice {
                    padding-top: 20px;
                    padding-bottom: 30px;
                }
        
                #injustice p {
                    padding-left: 10px !important;
                    padding-right: 10px !important;
                    text-align: center;
                    font-size: 15px;
                    font-family: "Minecraft";
                }
        
                #reform-product{
                    color: black;
                    font-family: Arial, sans-serif !important;
                    font-size: 18px !important;
                }
        
                #outer {
                    width: 100%;
                    padding-top: 120px;
                    padding-bottom: 120px;
                }
        
                #internal-divison {
                    margin-bottom: 20px;
                    margin-top: 20px;
                }
            </style>
        
        </head>
        <body style="background-image: url(`https://forbiddenseries.net/assets/lib/img_remote/abxc.png`); background-size: cover;">
        
            <div id="outer">
                <div id="inner">
                    <img src="https://forbiddenseries.net/assets/lib/img_remote/logodoforbidden.png">
                    <hr style="border-top: solid 1px rgba(0,0,0,0.5); border-bottom: solid 1px rgba(0,0,0,0.5);">
                    <div id="injustice">
                        <p id="reform-product">Você Ativou '. $bind["title"] .'</p>
                        <p>Entre no Servidor e digite /usarkey (key)</p>
                        <hr id="internal-divison" style="border-top: solid 1px rgba(0,0,0,0.5); border-bottom: solid 1px rgba(0,0,0,0.5);">
                        <p>Ative sua Key!!</p>
                        <h2 style="text-align: center;">'. $rows['key'] .'</h2>
                    </div>
                </div>
            </div>
        
        </body>
        </html>';
            
            sendMail('Sua key está disponivel', $mailHtml, $semMail, $bind['email_payer']);
            // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
            // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
    
            $update = $mysqli->prepare("UPDATE fire_transaction SET recived_product = 'true' WHERE payment_id = '".$bind['payment_id']."';");
            $update->execute();

        }else{

            header("Content-type: application/json; charset=utf-8");
            $response = [
                "alredyClaimed" => true
            ];
            http_response_code(200);
            echo json_encode($response);

        }

        break;

    }

}*/

if($bind['type_info'] == 'season_pass' && $bind['claimed'] == 'false'){

    if($bind['title'] == 'Passe Beta'){$passe = 'passebeta';}

    $ship = $mysqli->prepare("INSERT INTO `fire_passebeta_list`(`user`) VALUES ('$usernick')");
    $ship->execute();
    $ship->close();

    header("Content-type: application/json; charset=utf-8");
    $response = [
        "alredyClaimed" => false,
        "name" => $bind['title'],
        "beta" => true
    ];
    http_response_code(200);
    echo json_encode($response);

    $update = $mysqli->prepare("UPDATE `fire_transaction` SET claimed = 'true' WHERE payment_id = '".$bind['payment_id']."';");
    $update->execute();

}