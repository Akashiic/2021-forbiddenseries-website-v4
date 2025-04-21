<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require('dbboardconnect.php');

if (!isset($_POST['infoNickname']) || $_POST['infoNickname'] == "") {

	header("Content-type: application/json; charset=utf-8");
	$respSendXI = [
		"author-is-missing" => true
	];
	http_response_code(200);
	echo json_encode($respSendXI);

	exit();
}



if (empty($_POST['infoTitle']) || empty($_POST['infoDesc'])) {

	header("Content-type: application/json; charset=utf-8");
	$respSendXII = [
		"details-is-missing" => true
	];
	http_response_code(200);

	echo json_encode($respSendXII);
	exit();
}


if ($_POST['infoLevel'] == 'master') {

	$titulo = $_POST['infoTitle'];
	$description = $_POST['infoDesc'];
	$autor = $_POST['infoNickname'];

	date_default_timezone_set('America/Sao_Paulo');
	$dateday = date("d");
	$datemonth = date("m");
	$dateyear = date("y");

	//O if abaixo vai verificar se o $_FILES tem algum dado armazenado
	if (isset($_FILES['infoFile']) && $_FILES['infoFile']['name'] !== '') {

		$extensao = strtolower(substr($_FILES['infoFile']['name'], -4));
		$novo_nome = md5(time()) . $extensao;
		$srcfilles = '../lib/src/file_upload/';

		move_uploaded_file($_FILES['infoFile']['tmp_name'], $srcfilles . $novo_nome);

		$adquery = "INSERT INTO publishing_news (title, desc_code, img, autor, data_dia, data_mes, data_ano) VALUES ('$titulo', '$description', '$novo_nome', '$autor', '$dateday', '$datemonth', '$dateyear')";

		if ($mysqli->query($adquery)) {

			header("Content-type: application/json; charset=utf-8");
			$respSend = [
				"published" => true
			];
			http_response_code(200);
			echo json_encode($respSend);
		} else {

			header("Content-type: application/json; charset=utf-8");
			$respSend = [
				"published" => false
			];
			http_response_code(200);
			echo json_encode($respSend);

			exit();
		}
	} else {

		$adquery = "INSERT INTO publishing_news (title, desc_code, autor, data_dia, data_mes, data_ano) VALUES ('$titulo', '$description', '$autor', '$dateday', '$datemonth', '$dateyear')";

		if ($mysqli->query($adquery)) {

			header("Content-type: application/json; charset=utf-8");
			$respSend = [
				"published" => true
			];
			http_response_code(200);
			echo json_encode($respSend);
		} else {

			header("Content-type: application/json; charset=utf-8");
			$respSend = [
				"published" => false
			];
			http_response_code(200);
			echo json_encode($respSend);

		}
	}
}

/*if(empty($_POST['publishing-autor']) || !isset($_POST['publishing-autor']) || $_POST['publishing-autor'] == ''){
	
	//header('Location: https://forbiddenseries.net/');
	echo '<script>alert("Você não está logado");</script>';
	
}elseif(empty($_POST['publishing-title']) || empty($_POST['publishing-desc'])){
	header('Location: https://forbiddenseries.net');
}elseif($_POST['publishing-autor-level'] == 'master'){
	
	if(isset($_POST['publishing-submit'])){
	

	
			header('Location: https://forbiddenseries.net');
	
    
	}else{
		header('Location: https://forbiddenseries.net');
	}
	
}else{
	echo '<script>alert("Você não tem Permissão/Level");</script>';
}*/
