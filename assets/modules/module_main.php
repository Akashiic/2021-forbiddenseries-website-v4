<?php
session_start();

require 'class/AkashicMain.php';

$acc = new AkashicMain();

// Sub-sistema: Cupom
if (isset($_POST['cupom'])) {
    
    $cupomCupom = $_POST['cupom'];
    $cupomDiscount = $_POST['discount'];
    $dateNow = $acc->dateFormat()[0];

    $acc->sendData("cupom", "cupom, discount, dateForExpire", "'$cupomCupom', $cupomDiscount, '$dateNow'");
    $resp = array(
        "sucessful" => true,
        "cupom" => $_POST['cupom'],
        "discount" => $_POST['discount'],
        "date" => $dateNow
    );
    echo $acc->responseJson($resp);
    exit();
}

if(isset($_POST['cupomValidation'])){
    echo $acc->cupomVerify($_POST['cupomValidation']);
    exit();
}

if(isset($_POST['ArrayInfo'])){
    $resp = array(
        "sucessful" => true,
        "ArrayInit" => array_key_first($_SESSION['CartItems']),
        "ArrayOver" => array_key_last(array_values($_SESSION['CartItems'])),
        "CountItems" => count($_SESSION['CartItems'])
    );
    echo $acc->responseJson($resp);
    exit();
}

if(isset($_POST['ItemType'])){
    $bar = $acc->addItemCart(Array(
        "ItemID" => $_POST['ItemID'],
        "ItemCard" => $_POST['ItemCard'],
        "ItemTitle" => $_POST['ItemTitle'],
        "ItemDesc" => $_POST['ItemDesc'],
        "ItemPrice" => $_POST['ItemPrice'],
        "ItemType" => $_POST['ItemType']
    ));
    
    echo $acc->responseJson($bar);
    exit();
}

echo '<pre>', var_dump($_SESSION), '</pre>';
//echo '<br>';

/*for($i = 0; $i < count($_SESSION['CartItems']); $i++){
    echo $i . ' teste<br>';
    echo '<br>';
    echo array_keys($_SESSION['CartItems']);
}*/
//echo $_SESSION['CartItems'][0];
