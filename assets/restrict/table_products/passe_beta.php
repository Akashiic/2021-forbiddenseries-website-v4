<?php
session_start();

require '../../../lib/remote_api/vendor/autoload.php';
MercadoPago\SDK::setAccessToken('APP_USR-8523633585826880-022016-eaab47eb620d3632411d5a6426cd30f5-246758338');

$preference = new MercadoPago\Preference();

// Cria um item na preferência
$item = new MercadoPago\Item();
$item->title = 'Passe-Beta';
$item->quantity = 1;
$item->unit_price = 16.99;
$item->category_id = 'season_pass';
$preference->items = array($item);
$preference->notification_url = 'https://forbiddenseries.net/assets/modules/module_httpost_notification.php';
$preference->additional_info = $_SESSION['UserLevel'];
$preference->back_urls = array(
	"success" => "https://forbiddenseries.net/loja.php",
	"failure" => "https://forbiddenseries.net/loja.php",
	"pending" => "https://forbiddenseries.net/loja.php"
);
$preference->save();

if (isset($_SESSION['UserLevel'])) {

	header('Location: ' . $preference->init_point . '');
} else {

	echo '<script>alert("Você não está logado!\n Logue-se para continuar");
			window.location.href = "https://forbiddenseries.net/";
		</script>';
}


?>
<!--<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
</body>
</html>-->