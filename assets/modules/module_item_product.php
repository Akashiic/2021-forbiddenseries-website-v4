<?php

/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require 'dbboardconnect.php';

$itemShop = $_POST['productName'];
$priceShop = $_POST['productPrice'];
$infoShop = $_POST['productDesc'];
$typeItemShop = $_POST['productTypeItem'];
$imageProduct = $_FILES['productImage'];

if($imageProduct == null || !isset($imageProduct) || empty($imageProduct || $imageProduct == "")){
    $inquisition = "INSERT INTO `item_shop_table`(`item`, `price`, `info`. `type`) VALUES ('$itemShop', '$priceShop', '$infoShop', '$typeItemShop')";
}else{

    $extensao = strtolower(substr($_FILES['productImage']['name'], -4));
    $imageSet = md5(time()) . $extensao;
    $srcfilles = '../lib/src/file_upload/';
    move_uploaded_file($_FILES['productImage']['tmp_name'], $srcfilles . $imageSet);

    $inquisition = "INSERT INTO `item_shop_table`(`item`, `price`, `info`, `type`, `image`) VALUES ('$itemShop', '$priceShop', '$infoShop', '$typeItemShop', '$imageSet')";
}

$stmt = $mysqli->query($inquisition);

header("Content-type: application/json; charset=utf-8");
$response = [
    "return" => true,
    "NameItem" => $itemShop,
    "priceShop" => $priceShop,
    "infoShop" => $infoShop,
    "typeItemShop" => $typeItemShop,
    "imageProduct" => $imageProduct
];
http_response_code(200);
echo json_encode($response);
