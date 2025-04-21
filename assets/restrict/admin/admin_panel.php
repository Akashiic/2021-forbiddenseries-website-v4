<?php
session_start();

if (!isset($_SESSION['UserLevel']) && !isset($_SESSION['LevelSession'])) {
	echo '<script>
			alert("Você não está logado!");
				window.location.href="https://forbiddenseries.net/";
		 </script>';
	//header('Location: https://forbiddenseries.net');
} elseif ($_SESSION['LevelSession'] !== 'master') {
	echo '<script>
			alert("Sem Permissão!");
				window.location.href="https://forbiddenseries.net/";
		 </script>';
	//header('Location: https://forbiddenseries.net');
} else {
}

?>
<!doctype html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<title>Painel</title>
	<link type="text/css" rel="stylesheet" href="../../../assets/lib/css/styles.css" />
	<link type="text/css" rel="stylesheet" href="../../../assets/lib/css/zero.css" />
	<link rel="shortcut icon" href="../../lib/img_remote/2c7cc__ProjectE-Mod1-160x160.png" type="image/png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>

	<div class="main-background"></div>
	<div class="flash-main-container px-0">
		<div class="panel-menu-flash px-0">
			<h1 id="flash-header">Dashboard</h1>
			<hr id="flash-hr">
			<div class="panel-flash-container px-0">
				<ul class="px-0">
					<li class="menu active px-0 home"><i class="fa fa-home" aria-hidden="true"></i>
						<p>Home</p>
					</li>
					<li class="menu px-0 transactions"><i class="fa fa-university" aria-hidden="true"></i>
						<p>Transações</p>
					</li>
					<li class="menu px-0 news"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
						<p>Gerenciar Noticias</p>
					</li>
					<li class="menu px-0 users"><i class="fa fa-users" aria-hidden="true"></i>
						<p>Gerenciar Usuários</p>
					</li>
					<li class="menu px-0 cupons"><i class="fa fa-book" aria-hidden="true"></i>
						<p>Cupons</p>
					</li>
					<li class="menu px-0 keys"><i class="fa fa-key" aria-hidden="true"></i>
						<p>Gerenciar Vips</p>
					</li>
					<li class="menu px-0 itemShop"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
						<p>Items da Loja</p>
					</li>

				</ul>
			</div>
			<div class="panel-flash-footer">
				<li class=""><i class="fa fa-cogs" aria-hidden="true"></i>
					<p>Configurações</p>
				</li>
				<li id="exit-sign"><i class="fa fa-sign-out" aria-hidden="true"></i>
					<p>Sair</p>
				</li>
			</div>
		</div>

		<div id="outputError"></div>

		<div class="panel-page-flash"></div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="extension_admin.js"></script>
	<!--<script src="engine.js"></script>-->

</body>

</html>