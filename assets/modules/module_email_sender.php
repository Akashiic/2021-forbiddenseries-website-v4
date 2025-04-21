<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'dbboardconnect.php';
require '../lib/apis/phpmailer/vendor/autoload.php';

function sendMail($assunto, $htmlMail, $whitoutHtmlMail, $destiny){

    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@forbiddenseries.net';
        $mail->Password = 'XXXXX';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('no-reply@forbiddenseries.net', 'Forbidden Series');
        $mail->addAddress($destiny, 'Destinatario');

        $mail->isHTML(true);

        $mail->Subject = $assunto;
        $mail->msgHTML($htmlMail);
        $mail->AltBody = $whitoutHtmlMail;

        $mail->send();
        echo 'Email enviado';
    } catch (Exception $e) {
        echo "Bug {$mail->ErrorInfo}";
    }
}

$bridgeboard = $mysqli->query("SELECT * FROM fire_transaction");
while ($bindrows = $bridgeboard->fetch_assoc()) {

    if ($bindrows['title'] == 'Donate' && $bindrows['sended'] == 'false' && $bindrows['status'] == 'approved') {

        $subject = 'Seu pagamento em ' . $bindrows['title'] . '.' . ' foi Aprovado!';

        $bodyHtml = '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
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
                font-size: 20px;
                font-family: "Minecraft";
            }
    
            #reform-product{
                color: violet;
                font-family: Arial, sans-serif !important;
                font-size: 32px !important;
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
                    <p>Você adquiriu</p>
                    <p id="reform-product">' . $bindrows["title"] . '</p>
                    <p>por ' . $bindrows["price_product"] . ' R$</p>
    <!--                <hr id="internal-divison" style="border-top: solid 1px rgba(0,0,0,0.5); border-bottom: solid 1px rgba(0,0,0,0.5);">
                    <p>Ative sua Key:</p>
                    <h2 style="text-align: center;">12345-67890-12345-67890</h2>-->
                </div>
            </div>
        </div>
    
    </body>
    </html>';

        $defaultBody = 'Sua key';
        $destiny = $bindrows['email_payer'];
        sendMail($subject, $bodyHtml, $defaultBody, $destiny);

        $request = $mysqli->query("UPDATE fire_transaction
            SET sended = 'true'
            WHERE sended = 'false' AND status = 'approved'");

            echo 'processo concluído';
    }

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 


    if ($bindrows['title'] == 'Vip Vanilla' && $bindrows['sended'] == 'false' && $bindrows['status'] == 'approved') {
        
        $subject = 'Seu pagamento em ' . $bindrows['title'] . '.' . ' foi Aprovado!';

        $bodyHtml = '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
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
                font-size: 20px;
                font-family: "Minecraft";
            }
    
            #reform-product{
                color: violet;
                font-family: Arial, sans-serif !important;
                font-size: 32px !important;
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
    
    <body style="background-image: url(`https://forbiddenseries.net/assets/lib/img_remote/abxc.png`); background-size:
        cover;">
    
        <div id="outer">
            <div id="inner">
                <img src="https://forbiddenseries.net/assets/lib/img_remote/logodoforbidden.png">
                <hr style="border-top: solid 1px rgba(0,0,0,0.5); border-bottom: solid 1px rgba(0,0,0,0.5);">
                <div id="injustice">
                    <p>Você comprou</p>
                    <p>
                        <font face="calibri" font-size="18px" color="violet">'.'x'. $bindrows['quantity'] .' '. $bindrows["title"] . '</font><br>por '.$bindrows['transaction_amount'].'
                        R$
                    </p>
                    <hr id="internal-divison"
                        style="border-top: solid 1px rgba(0,0,0,0.5); border-bottom: solid 1px rgba(0,0,0,0.5);">
                    <p>ID de Ativação</p>
                    <h2 style="text-align: center;">'.$bindrows['serial_id'].'</h2>
                </div>
            </div>
        </div>
    
    </body>
    
    </html>';

        $defaultBody = 'Sua key';
        $destiny = $bindrows['email_payer'];

        sendMail($subject, $bodyHtml, $defaultBody, $destiny);

        $request = $mysqli->query("UPDATE fire_transaction
            SET sended = 'true'
            WHERE sended = 'false' AND status = 'approved'");

            echo 'processo concluído';
    }

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    if ($bindrows['title'] == 'Vip Radio' && $bindrows['sended'] == 'false' && $bindrows['status'] == 'approved') {
        
        $subject = 'Seu pagamento em ' . $bindrows['title'] . '.' . ' foi Aprovado!';

        $bodyHtml = '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
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
                font-size: 20px;
                font-family: "Minecraft";
            }
    
            #reform-product{
                color: violet;
                font-family: Arial, sans-serif !important;
                font-size: 32px !important;
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
    
    <body style="background-image: url(`https://forbiddenseries.net/assets/lib/img_remote/abxc.png`); background-size:
        cover;">
    
        <div id="outer">
            <div id="inner">
                <img src="https://forbiddenseries.net/assets/lib/img_remote/logodoforbidden.png">
                <hr style="border-top: solid 1px rgba(0,0,0,0.5); border-bottom: solid 1px rgba(0,0,0,0.5);">
                <div id="injustice">
                    <p>Você comprou</p>
                    <p>
                        <font face="calibri" font-size="18px" color="violet">'. $bindrows['quantity'] . $bindrows["title"] . '</font><br>por '.$bindrows['transaction_amount'].'
                        R$
                    </p>
                    <hr id="internal-divison"
                        style="border-top: solid 1px rgba(0,0,0,0.5); border-bottom: solid 1px rgba(0,0,0,0.5);">
                        <p>ID de Ativação</p>
                        <h2 style="text-align: center;">'.$bindrows['serial_id'].'</h2>
                </div>
            </div>
        </div>
    
    </body>
    
    </html>';

        $defaultBody = 'Sua key';
        $destiny = $bindrows['email_payer'];

        sendMail($subject, $bodyHtml, $defaultBody, $destiny);

        $request = $mysqli->query("UPDATE fire_transaction
        SET sended = 'true'
        WHERE sended = 'false' AND status = 'approved'");

        echo 'processo concluído';
    }

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    if ($bindrows['title'] == 'Vip Avaroza' && $bindrows['sended'] == 'false' && $bindrows['status'] == 'approved') {
        
        $subject = 'Seu pagamento em ' . $bindrows['title'] . '.' . ' foi Aprovado!';

        $bodyHtml = '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
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
                font-size: 20px;
                font-family: "Minecraft";
            }
    
            #reform-product{
                color: violet;
                font-family: Arial, sans-serif !important;
                font-size: 32px !important;
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
    
    <body style="background-image: url(`https://forbiddenseries.net/assets/lib/img_remote/abxc.png`); background-size:
        cover;">
    
        <div id="outer">
            <div id="inner">
                <img src="https://forbiddenseries.net/assets/lib/img_remote/logodoforbidden.png">
                <hr style="border-top: solid 1px rgba(0,0,0,0.5); border-bottom: solid 1px rgba(0,0,0,0.5);">
                <div id="injustice">
                    <p>Você comprou</p>
                    <p>
                        <font face="calibri" font-size="18px" color="violet">'. $bindrows['quantity'] . $bindrows["title"] . '</font><br>por '.$bindrows['transaction_amount'].'
                        R$
                    </p>
                    <hr id="internal-divison"
                        style="border-top: solid 1px rgba(0,0,0,0.5); border-bottom: solid 1px rgba(0,0,0,0.5);">
                        <p>ID de Ativação</p>
                        <h2 style="text-align: center;">'.$bindrows['serial_id'].'</h2>
                </div>
            </div>
        </div>
    
    </body>
    
    </html>';

        $defaultBody = 'Sua key';
        $destiny = $bindrows['email_payer'];

        sendMail($subject, $bodyHtml, $defaultBody, $destiny);

        $request = $mysqli->query("UPDATE fire_transaction
        SET sended = 'true'
        WHERE sended = 'false' AND status = 'approved'");

        echo 'processo concluído';
    }

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    if ($bindrows['title'] == 'Passe Beta' && $bindrows['sended'] == 'false' && $bindrows['status'] == 'approved') {
        
        $subject = 'Seu pagamento em ' . $bindrows['title'] . '.' . ' foi Aprovado!';

        $bodyHtml = '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
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
                font-size: 20px;
                font-family: "Minecraft";
            }
    
            #reform-product{
                color: violet;
                font-family: Arial, sans-serif !important;
                font-size: 32px !important;
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
    
    <body style="background-image: url(`https://forbiddenseries.net/assets/lib/img_remote/abxc.png`); background-size:
        cover;">
    
        <div id="outer">
            <div id="inner">
                <img src="https://forbiddenseries.net/assets/lib/img_remote/logodoforbidden.png">
                <hr style="border-top: solid 1px rgba(0,0,0,0.5); border-bottom: solid 1px rgba(0,0,0,0.5);">
                <div id="injustice">
                    <p>Você comprou</p>
                    <p>
                        <font face="calibri" font-size="18px" color="violet">'. $bindrows['quantity'] . 'x ' . $bindrows["title"] . '</font><br>por '.$bindrows['transaction_amount'].'
                        R$
                    </p>
                    <hr id="internal-divison"
                        style="border-top: solid 1px rgba(0,0,0,0.5); border-bottom: solid 1px rgba(0,0,0,0.5);">
                        <p>ID de Ativação</p>
                        <h2 style="text-align: center;">'.$bindrows['serial_id'].'</h2>
                </div>
            </div>
        </div>
    
    </body>
    
    </html>';

        $defaultBody = 'Sua key';
        $destiny = $bindrows['email_payer'];

        sendMail($subject, $bodyHtml, $defaultBody, $destiny);

        $request = $mysqli->query("UPDATE fire_transaction
        SET sended = 'true'
        WHERE sended = 'false' AND status = 'approved'");

        echo 'processo concluído';
    }

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

    // SKIP // SKIP // SKIP // SKIP // SKIP // SKIP 

}