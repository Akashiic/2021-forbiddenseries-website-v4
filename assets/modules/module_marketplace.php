<?php

if(!isset($_POST['username'])){
    http_response_code(403);
    exit();
}

/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/
require 'dbboardconnect.php';
require '../lib/apis/mercadopago/vendor/autoload.php';
MercadoPago\SDK::setAccessToken('APP_USR-XXXXXXX');

$item = $_POST['title'];

function processProductPrice($quantity, $price, $title, $description, $infoType, $username)
{

    if (empty($quantity) || !isset($quantity)) {
        echo '<script>
                alert("Algo Errado");
                window.location.href = "https://forbiddenseries.net/";
            </script>';
    } else {
        $preference = new MercadoPago\Preference();
        // Cria um item na preferência
        $item = new MercadoPago\Item();
        $item->title = $title;
        $item->quantity = $quantity;
        $item->unit_price = $price;
        $item->description = $description;
        $item->category_id = $infoType;
        $preference->items = array($item);
        $preference->external_reference = $username;
        $preference->back_urls = array(
            "success" => "https://forbiddenseries.net/",
            "failure" => "https://forbiddenseries.net/",
            "pending" => "https://forbiddenseries.net/"
        );
        $preference->payment_methods = array(
            "installments" => 1
        );
        $preference->additional_info = $username;
        $preference->notification_url = 'https://forbiddenseries.net/assets/modules/module_httpost_notification.php';
        $preference->save();

        return $preference->init_point;
    }
}

$stmt = $mysqli->query("SELECT * FROM item_shop_table WHERE item = '$item'");
$bind = $stmt->fetch_assoc();

if ($bind['item'] == $_POST['title'] && $bind['type'] == 'Item') {

    header("Content-type: application/json; charset=utf-8");
    $response = [
        "init_point" => processProductPrice(1, $bind['price'], $bind['item'], $bind['item'], $bind['type'], $_POST['username']),
        "init_point_valid" => true
    ];
    http_response_code(200);
    echo json_encode($response);
}

    // SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
    // SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
    // SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /

    // SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
    // SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
    // SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /


if($bind['type'] !== 'Item' || $bind['type'] !== null){

    $valueForm = [
        $_POST['VIPVANILLA'],
        $_POST['VIPRADIO'],
        $_POST['VIPAVAROZA'],
        $_POST['VIPTERMINUS']
    ];
    
    
    $processManage = false;
    if (isset($valueForm[0])) {
    
        if ($valueForm[0] > 12 || $valueForm[0] <= 0) {
            echo '<script>alert("Algo Errado");</script>';
            exit();
        } else {
            
            header("Content-type: application/json; charset=utf-8");
            $response = [
                "init_point" => processProductPrice($valueForm[0], $valueForm[0] * 9.99, 'Vip Vanilla ' . $valueForm[0] . ' Meses', 'Vip Vanilla ' . $valueForm[0] . ' Meses', 'VIP', $_POST['username']),
                "init_point_valid" => true
            ];
            http_response_code(200);
            echo json_encode($response);
            
        }
    } elseif (isset($valueForm[1])) {
    
        if ($valueForm[1] <= 0 || $valueForm[1] > 12) {
            echo '<script>alert("Algo Errado");</script>';
            exit();
        } else {
            
            header("Content-type: application/json; charset=utf-8");
            $response = [
                "init_point" => processProductPrice($valueForm[1], $valueForm[1] * 24.99, 'Vip Radio ' . $valueForm[1] . ' Meses', 'Vip Radio ' . $valueForm[0] . ' Meses', 'VIP', $_POST['username']),
                "init_point_valid" => true
            ];
            http_response_code(200);
            echo json_encode($response);

        }
    } elseif (isset($valueForm[2])) {
    
        if ($valueForm[2] <= 0 || $valueForm[2] > 12) {
            echo '<script>alert("Algo Errado");</script>';
            exit();
        } else {
            
            header("Content-type: application/json; charset=utf-8");
            $response = [
                "init_point" => processProductPrice($valueForm[2], $valueForm[2] * 49.99, 'Vip Avaroza ' . $valueForm[2] . ' Meses', 'Vip Avaroza ' . $valueForm[2] . ' Meses', 'VIP', $_POST['username']),
                "init_point_valid" => true
            ];
            http_response_code(200);
            echo json_encode($response);

        }
    }elseif(isset($valueForm[3])){
        if ($valueForm[3] <= 0 || $valueForm[3] > 12) {
            echo '<script>alert("Algo Errado");</script>';
            exit();
        } else {
            
            header("Content-type: application/json; charset=utf-8");
            $response = [
                "init_point" => processProductPrice($valueForm[3], $valueForm[3] * 99.99, 'Vip Terminus ' . $valueForm[3] . ' Meses', 'Vip Terminus ' . $valueForm[2] . ' Meses', 'VIP', $_POST['username']),
                "init_point_valid" => true
            ];
            http_response_code(200);
            echo json_encode($response);

        }
    } else {
        echo '<script>
                alert("Algo Erradooo");
                window.location.href = "https://forbiddenseries.net/";
            </script>';
        exit();
    }

}


/*if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {

    $valueForm = [
        $_POST['passe-betaValue'],
        $_POST['get-protectBlocksValue'],
        $_POST['get-CashValue'],
        $_POST['vip-vanillaValue'],
        $_POST['vip-radioValue'],
        $_POST['vip-avarozaValue']
    ];


    // SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
    // SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
    // SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /

    // SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
    // SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /
    // SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP / SKIP /

    $processManage = false;
    if (isset($valueForm[0])) {

        if ($valueForm[0] >= 100 || $valueForm[0] <= 0) {
            echo '<script>alert("Algo Errado");</script>';
            exit();
        } else {
            $processManage = processProductPrice($valueForm[0], 16.99, 'Passe Beta', 'Adquirir Passe Beta', 'season_pass', null);
        }
    } elseif (isset($valueForm[1])) {

        $priceForm = 77.77;
        $processManage = processProductPrice($valueForm[1], null, null, null, null, null);
    } elseif (isset($valueForm[2])) {

        $priceForm = 77.77;
        $processManage = processProductPrice($valueForm[2], null, null, null, null, null);
    } elseif (isset($valueForm[3])) {

        if ($valueForm[3] > 12 || $valueForm[3] <= 0) {
            echo '<script>alert("Algo Errado");</script>';
            exit();
        } else {
            $processManage = processProductPrice($valueForm[3], 9.99, 'Vip Vanilla', 'Adquririr Vip Vanilla', 'VIP', null);
        }
    } elseif (isset($valueForm[4])) {

        if ($valueForm[4] <= 0 || $valueForm[4] > 12) {
            echo '<script>alert("Algo Errado");</script>';
            exit();
        } else {
            $processManage = processProductPrice($valueForm[4], 24.99, 'Vip Radio', 'Adquirir Vip Radio', 'VIP', null);
        }
    } elseif (isset($valueForm[5])) {

        if ($valueForm[5] <= 0 || $valueForm[5] > 12) {
            echo '<script>alert("Algo Errado");</script>';
            exit();
        } else {
            $processManage = processProductPrice($valueForm[5], 49.99, 'Vip Avaroza', 'Adqurir Vip Avaroza', 'VIP', null);
        }
    } else {
        echo '<script>
                alert("Algo Errado");
                window.location.href = "https://forbiddenseries.net/";
            </script>';
        exit();
    }
} else {

    echo '<script>alert("Você deve estar logado para realizar a compra");</script>';
    exit();
}*/
