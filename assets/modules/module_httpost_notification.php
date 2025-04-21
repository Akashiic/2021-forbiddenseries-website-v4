<?php

include_once 'dbboardconnect.php';


/*if(isset($_GET['topic']) && $_GET['topic'] == 'payment'){

	$twi = json_encode($_GET);

	$fp = fopen('log.txt', 'a');
	$rewrite = fwrite($fp, $twi);
	fclose($fp);
}
*/
function generateKey($n)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';

	for ($i = 0; $i < $n; $i++) {
		$index = rand(0, strlen($characters) - 1);
		$randomString .= $characters[$index];
	}

	return $randomString;
}

// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 

if (isset($_GET['topic']) && $_GET['topic'] == 'payment') {

	$paymentID = $_GET["id"];

	// cUrl para o payment
	$curl = curl_init();

	curl_setopt($curl, CURLOPT_URL, 'https://api.mercadopago.com/v1/payments/' . $paymentID . '?access_token=APP_USR-5775462616287637-072114-206d6e457a5233ede9336f21ebdfb469-246758338');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$result = json_decode(curl_exec($curl), true);

	if (curl_errno($curl)) {
		echo 'Error:' . curl_error($curl);
	}
	curl_close($curl);

	// cUrl para o merchant_order

	// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
	// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
	// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
	date_default_timezone_set('america/sao_paulo');
	$timeDate = date('d/m/Y H:i:s');

	$payID = $result['id'];
	$paymentUsername = $result['external_reference'];
	$paymentTitle = $result['additional_info']['items'][0]['title'];
	$paymentQuantity = $result['additional_info']['items'][0]['quantity'];
	$paymentPrice = $result['additional_info']['items'][0]['unit_price'];
	$paymentTotalAmount = $result['transaction_amount'];
	$paymentType = $result['additional_info']['items'][0]['category_id'];
	$paymentMethod = $result['payment_method_id'];
	$paymentEmail = $result['payer']['email'];
	$paymentCPF = $result['payer']['identification']['number'];
	$paymentStatus = $result['status'];
	$paymentStatusDetail = $result['status_detail'];
	$paymentDateCreated = $timeDate;
	$paymentDateLastUpdate = $timeDate;
	$paymentCollectorID = $result['collector_id'];

	//$SerialID = generateKey(30);

	// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
	// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
	// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 

	// Connect to database and perform queries 

	$consulta = "SELECT * FROM fire_transaction WHERE payment_id = '$payID'";
	$stmti = $mysqli->query($consulta);

	if ($stmti->num_rows < 1) {
		$query = "INSERT INTO fire_transaction 
					(payment_id, title, email_payer, cpf_payer, type_info, payment_method, username, transaction_amount, quantity, price_product, status, status_detail, date_created, date_last_updated, collector_id) 
					VALUES ($payID, '$paymentTitle', '$paymentEmail', '$paymentCPF', '$paymentType', '$paymentMethod', '$paymentUsername', '$paymentTotalAmount', '$paymentQuantity', '$paymentPrice', '$paymentStatus', '$paymentStatusDetail', '$paymentDateCreated', '$paymentDateLastUpdate', '$paymentCollectorID')";
	} elseif ($stmti->num_rows >= 1) {
		$query = "UPDATE fire_transaction
						SET title = '$paymentTitle',
						email_payer = '$paymentEmail',
						cpf_payer = '$paymentCPF',
						type_info = '$paymentType',
						payment_method = '$paymentMethod',
						transaction_amount = '$paymentTotalAmount',
						price_product = '$paymentPrice',
						status = '$paymentStatus',
						status_detail = '$paymentStatusDetail',
						date_last_updated = '$paymentDateLastUpdate',
						collector_id = '$paymentCollectorID'
						WHERE payment_id = '$payID'";
	} else {
		echo 'SQL Error';
	}
	$stmt = $mysqli->prepare($query);
	$query_status = $stmt->execute() ? "Payment updated successfully<br>" : "Failed to update payment<br>";

	// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
	// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
	// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 

}

$SUSMT = $mysqli->query("SELECT * FROM fire_transaction WHERE title = 'Donate'");
while ($rows = $SUSMT->fetch_assoc()) {

	$donor_username = $rows['username'];
	$donor_transaction = $rows['transaction_amount'];
	$donor_status = $rows['status'];
	$donor_valuePrice = $rows['price_product'];

	if ($rows['title'] == 'Donate' && $rows['status'] == 'approved' && $rows['expired'] == 'false') {

		$qRequest = $mysqli->query("SELECT * FROM fire_tdonors WHERE username = '$donor_username';");
		$sin = $qRequest->fetch_assoc();

		if ($qRequest->num_rows < 1 || $qRequest->num_rows == 0) {

			$rquery = "INSERT INTO fire_tdonors (username, transaction_quantity, value_price, status) VALUES ('$donor_username', '$donor_transaction', '$donor_valuePrice', '$donor_status')";
		} elseif ($qRequest->num_rows >= 1) {

			$rquery = "UPDATE fire_tdonors SET status = '$donor_status' WHERE username = '$donor_username'";

			if ($sin['transaction_quantity'] < $donor_transaction) {

				$rquery = "UPDATE fire_tdonors
					SET transaction_quantity = '$donor_transaction',
					value_price = $donor_valuePrice,
					status = '$donor_status'
					WHERE username = '$donor_username'";
			}
		}

		$statemt = $mysqli->prepare($rquery);
		$queryExecute = $statemt->execute() ? "Payment updated successfully<br>" : "Failed to update payment<br>";
	}
}

// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 

include_once 'module_email_sender.php';

	// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
	// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP //
	// SKIP // // SKIP // // SKIP // // SKIP // // SKIP // // SKIP // 
