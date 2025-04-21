<?php

session_start();

if (!isset($_SESSION['UserLevel']) && !isset($_POST['ffi-username'])) {

	header("Content-type: application/json; charset=utf-8");
	$response = [
		"session_exist" => false
	];
	echo json_encode($response);
	exit();
}

// SDK do Mercado Pago
require '../lib/apis/mercadopago/vendor/autoload.php';
MercadoPago\SDK::setAccessToken('APP_USR-5775462616287637-072114-206d6e457a5233ede9336f21ebdfb469-246758338');

$mask = $_POST['ffi-value'];
$ffask = str_replace('R$', '', $mask);
$ink = str_replace(',', '.', $ffask);

if (!isset($_POST['ffi-value'])) {
	header("Content-type: application/json; charset=utf-8");
	$response = [
		"value" => 0,
		"message" => "invalid value"
	];
	echo json_encode($response);
} else {

	if ($ink <= 0.99) {

		header("Content-type: application/json; charset=utf-8");
		$response = [
			"value" => 1,
			"message" => "value not reached"
		];
		echo json_encode($response);

	} elseif (isset($_POST['ffi-username']) && isset($_SESSION['UserLevel'])) {



		$int = $_POST['ffi-value'];
		$a = str_replace('R$', '', $int);
		$i = str_replace(',', '.', $a);


		$preference = new MercadoPago\Preference();

		// Cria um item na preferência
		$item = new MercadoPago\Item();
		$item->title = 'Donate';
		$item->quantity = 1;
		$item->unit_price = $i;
		$item->description = 'Donate';
		$preference->items = array($item);
		$preference->back_urls = array(
			"success" => "https://forbiddenseries.net/",
			"failure" => "https://forbiddenseries.net/",
			"pending" => "https://forbiddenseries.net/"
		);
		$preference->payment_methods = array(
			"installments" => 1
		);
		$preference->notification_url = 'https://forbiddenseries.net/assets/modules/module_httpost_notification.php';
		$preference->external_reference = $_POST['ffi-username'];
		$preference->save();

		header("Content-type: application/json; charset=utf-8");
		$response = [
			"value" => 2,
			"message" => "Success",
			"return" => $preference->init_point
		];
		echo json_encode($response);

		//header('Location: ' . $preference->init_point . '');
	} else {
		echo '<script>
					alert("Você precisa estar logado para continuar");
					window.location.href = "https://forbiddenseries.net/";
					</script>';
	}
}
/*	if(!isset($_SESSION['UserLevel'])){	
				echo '<script>
					Swal.fire({
					icon: "error",
					title: "Sua sessão expirou!",
					text: "Realize o Login para continuar!"
					})
		  			</script>';*/
//}else{
// Cria um objeto de preferência

//}
