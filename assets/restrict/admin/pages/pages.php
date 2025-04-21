<?php

include_once '../../../modules/dbboardconnect.php';
require '../../../modules/class/AkashicMain.php';

const mainController = new AkashicMain();

session_start();
if (!isset($_SESSION['LevelSession'])) {
	http_response_code(403);
	exit();
}

function formatCpf($cpf)
{

	if (strlen($cpf) == 11) {

		$cpf = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 3);

		return $cpf;
	} else {

		return $cpf;
	}
}

function translateDate($mounth)
{

	if ($mounth == '01') {
		$target = 'Janeiro';
	}
	if ($mounth == '02') {
		$target = 'Fevereiro';
	}
	if ($mounth == '03') {
		$target = 'Março';
	}
	if ($mounth == '04') {
		$target = 'Abril';
	}
	if ($mounth == '05') {
		$target = 'Maio';
	}
	if ($mounth == '06') {
		$target = 'Junho';
	}
	if ($mounth == '07') {
		$target = 'Julho';
	}
	if ($mounth == '08') {
		$target = 'Agosto';
	}
	if ($mounth == '09') {
		$target = 'Setembro';
	}
	if ($mounth == '10') {
		$target = 'Outubro';
	}
	if ($mounth == '11') {
		$target = 'Novembro';
	}
	if ($mounth == '12') {
		$target = 'Dezembro';
	}

	return $target;
}

function newsListLooping($bridge)
{

	$stmt = $bridge->query("SELECT * FROM `publishing_news` ORDER BY `id` DESC");
	$prr = "";

	while ($bind = $stmt->fetch_assoc()) {

		$prr .= '<tr class="bg-success custom-table-flash">	
		<th scope="row">' . $bind['id'] . '</th>
		<td>' . $bind['title'] . '</td>
		<td>' . $bind['desc_code'] . '</td>
		<td>' . $bind['img'] . '</td>
		<th scope="row">
			<div class="flash-autor-news">
				<img src="https://mc-heads.net/avatar/' . $bind['autor'] . '"> ' . $bind['autor'] . '
			</div> 
		</td>
		<td>' . $bind['data_dia'] . '</td>
		<td>' . translateDate($bind['data_mes']) . '</td>
		<td>' . $bind['data_ano'] . '</td>
		<td><button class="button-edit-user button-resize">Opções</button></td>
	 </tr>';
	}

	return $prr;
}
$bar = 'newsListLooping';

function littleFunction($start)
{
	if ($start == 'approved') {

		$target = '<label class="flash-table-status fts-accepted"><p>Aprovado</p></label>';
		return $target;
	} elseif ($start == 'cancelled') {

		$target = '<label class="flash-table-status fts-cancelled"><p>Cancelada</p></label>';
		return $target;
	} elseif ($start == 'rejected') {

		$target = '<label class="flash-table-status fts-rejected"><p>Rejeitado</p></label>';
		return $target;
	} elseif ($start == 'pending') {

		$target = '<label class="flash-table-status fts-pending"><p>Pendente</p></label>';
		return $target;
	}
}

function transactionListLooping($bridge)
{

	$stmt = $bridge->query("SELECT * FROM `fire_transaction` ORDER BY `sql_id` DESC");

	$print = "";

	while ($bind = $stmt->fetch_assoc()) {

		$print .= '<tr class="bg-success">
					<th scope="row">' . $bind['sql_id'] . '</th>
					<td>' . $bind['payment_id'] . '</td>
					<td>' . $bind['title'] . '</td>
					<td>' . $bind['email_payer'] . '</td>
					<td>' . formatCpf($bind['cpf_payer']) . '</td>
					<td>' . $bind['type_info'] . '</td>
					<td>' . $bind['payment_method'] . '</td>
					<td>' . $bind['username'] . '</td>
					<td>' . $bind['price_product'] . '</td>
					<td>' . $bind['quantity'] . '</td>
					<td>' . littleFunction($bind['status']) . '</td>
					<td>' . $bind['status_detail'] . '</td>
					<td>' . $bind['date_created'] . '</td>
					<td>' . $bind['date_last_updated'] . '</td>
					<td><button class="button-edit-user button-edit-resize">Opções</button></td>
	  			</tr>';
	}

	return $print;
}
$foo = 'transactionListLooping';

function userListLooping($bridge)
{

	$stmt = $bridge->query("SELECT * FROM `authme` ORDER BY `id` ASC");

	$prtn = "";
	$quering = "";

	if ($stmt->num_rows > 0) {

		while ($bind = $stmt->fetch_assoc()) {

			// ($bindBind['permission_level'] == 'master') ? "table-danger bg-success" : "bg-success" . 
			if ($bind['permission_level'] == "master") {
				$prtn .= '<tr class="bg-success custom-table-flash">	
					<th scope="row">' . $bind['id'] . '</th>
					<td><img src="https://mc-heads.net/avatar/' . $bind['realname'] . '"> ' . $bind['realname'] . '</td>
					<td>' . $bind['email'] . '</td>
					<td id="isLoggedAuth">' . ($bind['isLogged'] == 1) ? "True" : "False" . '</td>
					<td class="table-perm-master">' . ucwords($bind['permission_level']) . '</td>
					<td><button class="button-edit-user">Opções</button></td>
	 			</tr>';
			} else {
				$prtn .= '<tr class="bg-success custom-table-flash">	
					<th scope="row">' . $bind['id'] . '</th>
					<td><img src="https://mc-heads.net/avatar/' . $bind['realname'] . '"> ' . $bind['realname'] . '</td>
					<td>' . $bind['email'] . '</td>
					<td>' . $bind['isLogged'] . '</td>
					<td>' . ucwords($bind['permission_level']) . '</td>
					<td><button class="button-edit-user">Opções</button></td>
	 			</tr>';
			}

			$quering .= [
				"status" => true,
				"isLogged" => $bind['isLogged']
			];
		}

		//var_dump($prtn);
		return [$prtn, json_encode($quering)];
	}
}
$fn = 'userListLooping';

function itemsShopMain($bridge)
{

	$cool = "";

	$stmt = $bridge->query("SELECT * FROM `item_shop_table`");
	if ($stmt->num_rows >= 1) {

		while ($result = $stmt->fetch_assoc()) {

			$cool .= '<tr class="bg-success">
			<th scope="row">' . $result['id'] . '</th>
			<td>' . $result['item'] . '</td>
			<td>' . $result['price'] . '</td>
			<td>' . $result['type'] . '</td>
			<td scope="row"><button class="button-edit-user button-edit-resize">Opções</button></td>
		  </tr>';
		}
	} else {

		$cool = 'Sem resultados';
	}

	return $cool;
}
$fool = 'itemsShopMain';

function Cupons($bridge){
	try{
		$stmt = $bridge->query("SELECT * FROM cupom");
		$cool = "";
		while ($bind = $stmt->fetch_assoc()) {

				if($bind['valid'] == true){$valid = 'True';}
				else{$valid = 'False';}

				$cool .= '<tr class="bg-success">
				<th scope="row">' . $bind['id'] . '</th>
				<td>' . $bind['cupom'] . '</td>
				<td>' . $bind['discount'] . '</td>
				<td>' . $bind['dateForExpire'] . '</td>
				<td>' . $valid . '</td>
				<td scope="row"><button class="button-edit-user button-edit-resize">Opções</button></td>
			</tr>';
			return $cool;
		}
	}catch(Exception $e){
		printf($e . ' Erro');
	}
}
$four = 'Cupons';

$home = <<<EOF
	<div class="ppflash-home">
		<div class="ppflash-home-welcome">
			<h1>Bem-Vindo, <span style="font-family: 'Minecraft Font'; font-size: 26px;">$_SESSION[UserLevel]</span></h1>
		</div>

		<div class="ppflash-container-all-graphic">
			<div class="ppflash-home-graphic-container">
				<div class="ppflash-home-graphic">
					<h1>Preferencia</h1>
					<div class="ppflash-graphic-">
						<div>
							<canvas id="myChart" width="400" height="400"></canvas>
				  </div>
					</div>
				</div>

				<div class="ppflash-home-graphic">
					<h1>Players</h1>
					<div class="ipc-panel-onlinePlayers">
					<div class="ipc-p-op-span-container">
						<p class="ipc-p-op-span-content" id="interact-fluid-panel">0</p>
						<p>Online Players</p>
					</div>
				</div>
				</div>

			</div>	
	
			<div class="ppflash-home-graphic-details">
				<div class="ppflash-graphic-child-details">
					<h1>Preferencia</h1>
					<div>
						<canvas id="chartGraph"></canvas>
			  		</div>
				</div>
			</div>

		</div>
	</div>
EOF;

$transacoes = <<<EOF
<div class="ppflash-transaction">

<div class="FFIXX-transactions">
<h1>Tabela de Transações</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, sapiente magni temporibus vel, exercitationem eius amet voluptatibus aut, sed debitis distinctio saepe sit praesentium voluptatem quidem provident architecto eos eaque.</p>
</div>

<!--<table class="table">-->
<table class="table table-dark ffi-xii table-hover table-borderless">
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Payment ID</th>
      <th scope="col">Titulo</th>
      <th scope="col">Email</th>
      <th scope="col">CPF</th>
      <th scope="col">Tipo</th>
	  <th scope="col">Metodo</th>
      <th scope="col">Usuario</th>
      <th scope="col">Preço</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Status</th>
      <th scope="col">Status++</th>
      <th scope="col">Criado</th>
      <th scope="col">Atualizado</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
	{$foo($mysqli)}
  </tbody>
</table>

</div>
EOF;

$gerenciar_noticias = <<<EOF
	<h1>Gerenciar Noticias</h1>
	<!--<table class="table">-->
	<table class="table table-dark flash-table-panel-xi table-hover table-borderless">
  	<caption>List of users</caption>
  		<thead>
    		<tr>
      			<th scope="col">ID</th>
      			<th scope="col">Titulo</th>
      			<th scope="col">Descrição</th>
      			<th scope="col">Anexo</th>
      			<th scope="col">Autor</th>
      			<th colspan="3" scope="col">Data</th>
      			<th scope="col">Editar</th>
    		</tr>
  		</thead>
  		<tbody>
			{$bar($mysqli)}
  		</tbody>
	</table>
EOF;

$gerenciar_usuarios = <<<EOF
	<div class="ppflash-index">
		<h1>Usuarios</h1>
		<nav class="navbar navbar-light flash-searchbar">
			<div class="container-fluid">
		  	<form class="d-flex">
				<input class="form-control me-2" type="search" placeholder="Procurar Usuario" aria-label="Search">
				<button class="btn btn-success flash-searchbar-button" type="submit">Buscar</button>
		  	</form>
			</div>
	  	</nav>
	</div>
	<!--<table class="table">-->
<table class="table table-dark flash-table-panel-xi table-hover table-borderless">
  <caption>Lista de Usuarios</caption>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Usuario</th>
      <th scope="col">E-mail</th>
      <th scope="col">Logado</th>
      <th scope="col">Nivel/Grau</th>
      <th scope="col">Edição</th>
    </tr>
  </thead>
  <tbody>
  	{$fn($mysqli)[0]}
  </tbody>
</table>

</div>
EOF;

$cupons = <<<EOF
	<div class="ppflash-index cupons-interface">
	<h1>Cupons</h1>
	<nav class="navbar navbar-light flash-searchbar">
		<div class="container-fluid">
		  <form class="d-flex">
			<input class="form-control me-2" type="search" placeholder="Procurar Usuario" aria-label="Search">
			<button class="btn btn-success flash-searchbar-button" type="submit">Buscar</button>
		  </form>
		</div>
	  </nav>
</div>

<div class="eixo-horizontal-backdrop">

<div class="eixo-container">
	<button id="eixo-button-modal" type="button" class="btn btn-success btn-sm eixo-button">
		<i class="fa fa-user-plus" aria-hidden="true"></i>
	</button>
</div>

</div>

<!--<table class="table">-->
<table class="table table-dark flash-table-panel-xi table-hover table-borderless">
<caption>Lista de Cupons</caption>
<thead>
<tr>
  <th scope="col">ID</th>
  <th scope="col">Cupom</th>
  <th scope="col">Desconto</th>
  <th scope="col">Data</th>
  <th scope="col">Valido</th>
  <th scope="col">Editar</th>
</tr>
</thead>
<tbody>
{$four($mysqli)}
</tbody>
</table>

</div>
EOF;

$gerenciar_vips = <<<EOF
	<h1>Gerenciar Vips</h1>
EOF;

$items_shop = <<<EOF
<div class="ppflash-index shopItems-Interface">
<h1>Items</h1>
<nav class="navbar navbar-light flash-searchbar">
	<div class="container-fluid">
	  <form class="d-flex">
		<input class="form-control me-2" type="search" placeholder="Procurar Item" aria-label="Search">
		<button class="btn btn-success flash-searchbar-button" type="submit">Buscar</button>
	  </form>
	</div>
</nav>

</div>

<div class="eixo-horizontal-backdrop">

<div class="eixo-container">
	<button id="eixo-button-modal" type="button" class="btn btn-success btn-sm eixo-button">
		<i class="fa fa-user-plus" aria-hidden="true"></i>
	</button>
</div>

</div>

	<!--<table class="table">-->
<table class="table table-dark series-xi table-hover table-borderless">
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Item</th>
      <th scope="col">Preço</th>
      <th scope="col">Tipo</th>
      <th scope="col">Edição</th>
    </tr>
  </thead>
  <tbody>
	{$fool($mysqli)}
  </tbody>
</table>

<!--<div class="akashic-modal">

	<div class="akashic-shadow-background escape-background"></div>
	<div class="akashic-modal-container">
		<h1>Adicionar Produto</h1>
		<hr id="hr-amc">
		<form>
			<ul>
				<li><input id="product-shop-name" type="text" placeholder="Nome do Produto" /></li>
				<li><input id="product-shop-price" type="text" placeholder="Preço do Protudo" /></li>
				<li><textarea id="product-shop-info" name="" maxlength="300" placeholder="Descrição do Produto"></textarea></li>
			</ul>

			<div class="product-container-footer">
				<div class="hr-akashic"></div>
				<div class="button-conclusion-product">
					<button type="button" class="btn btn-success">Concluir</button>
					<button type="button" class="btn btn-danger">Cancelar</button>
				</div>
			<div>
		</form>
	</div>

</div>-->

EOF;


if (isset($_GET['page']) && isset($_SESSION['LevelSession'])) {
	$data;
	$page = strtolower(utf8_encode(base64_decode($_GET['page'])));
	if ($page == "home") {
		$data = [
			'success' => true,
			"html" => $home
		];
		http_response_code(200);
	} else if ($page == "transações") {
		$data = [
			'success' => true,
			"html" => $transacoes
		];
		http_response_code(200);
	} else if ($page == "gerenciar noticias") {
		$data = [
			'success' => true,
			"html" => $gerenciar_noticias
		];
		http_response_code(200);
	} else if ($page == "gerenciar usuários") {
		$data = [
			'success' => true,
			"html" => $gerenciar_usuarios
		];
		http_response_code(200);
	} else if ($page == "cupons") {
		$data = [
			'success' => true,
			"html" => $cupons
		];
		http_response_code(200);
	} else if ($page == "gerenciar vips") {
		$data = [
			'success' => true,
			"html" => $gerenciar_vips
		];
		http_response_code(200);
	} else if ($page == "items da loja") {
		$data = [
			'success' => true,
			"html" => $items_shop
		];
		http_response_code(200);
	} else {
		$data = [
			'success' => false,
			"errors" => ["reason" => "access denied", "route" => $page]

		];
		http_response_code(403);
	}
	header("Content-type", "application/json; charset=utf-8");
	echo json_encode($data);
} else {
	$data = [
		'success' => false,
		"errors" => ["reason" => "access denied"]
	];
	http_response_code(403);
	header("Content-type", "application/json; charset=utf-8");
	echo json_encode($data);
}
exit();
?>

<!--
<!doctype html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<title>CRUD</title>
	<link type="text/css" rel="stylesheet" href="../../../../lib/css/styles.css" />
	<link type="text/css" rel="stylesheet" href="../../../../lib/css/zero.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<div class="main-background"></div>
	<div class="flash-main-container">
		<div class="panel-menu-flash">
			<h1 id="flash-header">Dashboard</h1>
			<hr id="flash-hr">
			<div class="panel-flash-container">
				<ul>
					<li class="active"><i class="fa fa-home" aria-hidden="true"></i>
						<a href="./home.php?page=home">
							<p>Home</p>
						</a>
					</li>
					<li><i class="fa fa-university" aria-hidden="true"></i>
						<p>Transações</p>
					</li>
					<li><i class="fa fa-newspaper-o" aria-hidden="true"></i>
						<p>Gerenciar Noticias</p>
					</li>
					<li><i class="fa fa-users" aria-hidden="true"></i>
						<p>Gerenciar Usuários</p>
					</li>
					<li><i class="fa fa-book" aria-hidden="true"></i>
						<p>Gerenciar Permissões</p>
					</li>
					<li><i class="fa fa-cogs" aria-hidden="true"></i>
						<p>Configurações</p>
					</li>
				</ul>
			</div>
			<div class="panel-flash-footer">
				<li><i class="fa fa-sign-out" aria-hidden="true"></i>
					<p>Sair</p>
				</li>
			</div>
		</div>

		<div class="panel-page-flash">

			<div class="ppflash-home">
				<div class="ppflash-home-welcome">
					<h1>Bem-Vindo, <span style="font-family: 'Minecraft Font'; font-size: 26px;">$_SESSION[UserLevel]</span></h1>
				</div>
				<div class="ppflash-home-graphic-container">
					<div class="ppflash-home-graphic">
						<h1>Presença</h1>
						<div class="ppflash-graphic-">

						</div>
					</div>

					<div class="ppflash-home-graphic">
						<h1>Vendas</h1>
					</div>

					<div class="ppflash-home-graphic">
						<h1>Players</h1>
					</div>
				</div>
			</div>

		</div>
	</div>

	<script src="../extension_admin.js"></script>

</body>

</html>
-->