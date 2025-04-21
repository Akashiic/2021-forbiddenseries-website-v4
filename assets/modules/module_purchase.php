<?php

require '../lib/apis/mercadopago/vendor/autoload.php';
MercadoPago\SDK::setAccessToken('APP_USR-5775462616287637-072114-206d6e457a5233ede9336f21ebdfb469-246758338');
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

$preference->init_point;