<?php

$stmt = $mysqli->query("SELECT * FROM fire_tdonors WHERE value_price ORDER BY value_price DESC");
$signRows = $stmt->fetch_assoc();

$userSignDonate = $signRows['username'];
$valueSignDonate = $signRows['transaction_quantity'];


/*$SSQL = $mysqli->query("SELECT * FROM fire_tdonors ORDER BY transaction_quantity DESC");
			
	if($SSQL->num_rows == 0){
		echo 'Nenhuma postagem no banco de dados';
	}else{
		$paramount = $SSQL->fetch_array(MYSQLI_ASSOC);
			$donor_username = $paramount['username'];
			$donor_transaction_quantity = $paramount['transaction_quantity'];
		
		echo $donor_username;
		echo $donor_transaction_quantity;
	}*/

//echo rand(1,99999999999999999);