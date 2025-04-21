<?php

session_start();

?>
<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Staff</title>

	<link rel="stylesheet" href="assets/lib/css/styles.css">
	<link rel="stylesheet" href="assets/lib/css/ap_stylish.css">

	<link rel="shortcut icon" href="assets/lib/img_remote/2c7cc__ProjectE-Mod1-160x160.png" type="image/png">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

	<div class="bg-image"></div>

	<div class="nav-container-staff">
		<header>
			<!--Navbar-->
			<nav class="main-navbar">
				<ul id="ul-1">
					<a>
						<div class="main-navbar-div">
							<font color="#780002">Forbidden </font>
							<font color="#F5F5F5">Series</font>
						</div>
					</a>
					<li id="li-1"><span class="web-text-navbar"><a id="a-1" href="loja.php">Loja</a></span></li>
					<li id="li-1"><span class="web-text-navbar"><a id="a-1" href="download.php">Download</a></span></li>
					<li id="li-1"><span class="web-text-navbar"><a id="a-1" href="staff.php">Staff</a></span></li>
					<li id="li-1" class="device-bars-menu"><span class="mobile-text-navbar"><a id="a-1"><i class="fa fa-bars" aria-hidden="true"></i></a></span></li>
					<li id="li-1" class="toplist-main"><span class="web-text-navbar"><a id="a-1">Top Score <i class="fa fa-caret-down" aria-hidden="true"></i></a></span>
						<ul class="list-main-navbar">
							<a></a>
							<li>Top Doadores</li>
							</a>
							<a>
								<li>Top Killers</li>
							</a>
							<a>
								<li>Top Ricos</li>
							</a>
						</ul>
					</li>
					<div id="margin-left">
						<?php
						if (isset($_SESSION['UserLevel']) && isset($_SESSION['LevelSession'])) {
							echo '<li class="dropdown-session" id="li-1"><span class="web-text-navbar"><a id="a-1" class="logout-session"> <img src="https://mc-heads.net/avatar/' . $_SESSION['UserLevel'] . '">' . $_SESSION['UserLevel'] . ' <i class="fa fa-caret-down" aria-hidden="true"></i></a></span>
					  <ul id="ul-2">';
							echo '<a class="a-2" id="profile"><li id="li-2">Perfil</li></a>';
							if ($_SESSION['LevelSession'] == 'master') {
								echo '<a class="a-2" id="admin-panel" href="assets/restrict/admin/admin_panel.php"><li id="li-2">Painel Admin</li></a>';
							}
							echo '<a id="donate-action-1" class="a-donate" style="text-decoration: none; color: white;"><li id="li-2">Doar</li></a>';
							echo '<a class="a-2" id="ativar-key"><li id="li-2">Ativar Key</li></a>';
							echo '<a class="a-2" id="settings"><li id="li-2">Configurações</li></a>';
							echo '<a class="a-2" id="unbound-session" href="assets/modules/auth/unbound_session.php"><li id="li-2">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></li></a>
					  </ul>
						</li>';
						} else {
							echo '<li id="li-1"><label id="l-login-open" class="popup-login-open">Login</label></li>';
						}
						?>
					</div>
					<li id="li-1" class="carrinho-forbidden">
						<a href="carrinho.php" id="a-1"><span class="shopping-cart-span"><span style="font-family: 'Minecraft Font';" class="subCointer-sCarSpan"><?php if($_SESSION['CartItems'] != 0){echo count($_SESSION['CartItems']);}else{echo '0';} ?></span></span> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
					</li>
				</ul>
			</nav>
		</header>
	</div>


	<div class="frx-main">
		<h1>Piramide da Staff</h1>
		<div class="frx-container">
			<div class="frx-subcontainer" id="frx-master-tag">
				<h3>Master</h3>
				<div class="frx-user-tag-flex">
					<div class="frx-id-staff-nickname" id="frx-id-staff-true">
						<div class="frx-utf-subcontainer" id="frx-utf-content-1">
							<div class="frx-staff-avatar">
								<img src="https://mc-heads.net/avatar/Akashiic">
							</div>

							<div class="frx-staff-nickname">
								<p>Akashiic</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="frx-subcontainer" id="frx-coordenador-tag">
				<h3>Super-Admin</h3>
				<div class="frx-user-tag-flex">
					<div class="frx-utf-subcontainer" id="frx-id-staff-true">
						<div class="frx-id-staff-nickname" id="frx-id-staff-false">
							<div class="frx-staff-avatar">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</div>

							<div class="frx-staff-nickname">
								<p>Vago</p>
							</div>
						</div>
					</div>

					<div class="frx-utf-subcontainer" id="frx-utf-content-2">
						<div class="frx-id-staff-nickname" id="frx-id-staff-false">
							<div class="frx-staff-avatar">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</div>

							<div class="frx-staff-nickname">
								<p>Vago</p>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="frx-subcontainer" id="frx-administrador-tag">
				<h3>Admin</h3>
				<div class="frx-user-tag-flex">
					<div class="frx-utf-subcontainer" id="frx-utf-content-1">
						<div class="frx-id-staff-nickname" id="frx-id-staff-false">
							<div class="frx-staff-avatar">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</div>

							<div class="frx-staff-nickname">
								<p>Vago</p>
							</div>
						</div>
					</div>

					<div class="frx-utf-subcontainer" id="frx-utf-content-2">
						<div class="frx-id-staff-nickname" id="frx-id-staff-false">
							<div class="frx-staff-avatar">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</div>

							<div class="frx-staff-nickname">
								<p>Vago</p>
							</div>
						</div>
					</div>

					<div class="frx-utf-subcontainer" id="frx-utf-content-3">
						<div class="frx-id-staff-nickname" id="frx-id-staff-false">
							<div class="frx-staff-avatar">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</div>

							<div class="frx-staff-nickname">
								<p>Vago</p>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="frx-subcontainer" id="frx-moderator-tag">
				<h3>Moderador</h3>
				<div class="frx-user-tag-flex">
					<div class="frx-utf-subcontainer" id="frx-utf-content-1">
						<div class="frx-id-staff-nickname" id="frx-id-staff-false">
							<div class="frx-staff-avatar">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</div>

							<div class="frx-staff-nickname">
								<p>Vago</p>
							</div>
						</div>
					</div>

					<div class="frx-utf-subcontainer" id="frx-utf-content-2">
						<div class="frx-id-staff-nickname" id="frx-id-staff-false">
							<div class="frx-staff-avatar">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</div>

							<div class="frx-staff-nickname">
								<p>Vago</p>
							</div>
						</div>
					</div>

					<div class="frx-utf-subcontainer" id="frx-utf-content-3">
						<div class="frx-id-staff-nickname" id="frx-id-staff-false">
							<div class="frx-staff-avatar">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</div>

							<div class="frx-staff-nickname">
								<p>Vago</p>
							</div>
						</div>
					</div>

					<div class="frx-utf-subcontainer" id="frx-utf-content-4">
						<div class="frx-id-staff-nickname" id="frx-id-staff-false">
							<div class="frx-staff-avatar">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</div>

							<div class="frx-staff-nickname">
								<p>Vago</p>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="frx-subcontainer" id="frx-Ajudante-tag">
				<h3>Ajudante</h3>
				<div class="frx-user-tag-flex">
					<div class="frx-utf-subcontainer" id="frx-utf-content-1">
						<div class="frx-id-staff-nickname" id="frx-id-staff-false">
							<div class="frx-staff-avatar">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</div>

							<div class="frx-staff-nickname">
								<p>Vago</p>
							</div>
						</div>
					</div>

					<div class="frx-utf-subcontainer" id="frx-utf-content-2">
						<div class="frx-id-staff-nickname" id="frx-id-staff-false">
							<div class="frx-staff-avatar">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</div>

							<div class="frx-staff-nickname">
								<p>Vago</p>
							</div>
						</div>
					</div>

					<div class="frx-utf-subcontainer" id="frx-utf-content-3">
						<div class="frx-id-staff-nickname" id="frx-id-staff-false">
							<div class="frx-staff-avatar">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</div>

							<div class="frx-staff-nickname">
								<p>Vago</p>
							</div>
						</div>
					</div>

					<div class="frx-utf-subcontainer" id="frx-utf-content-4">
						<div class="frx-id-staff-nickname" id="frx-id-staff-false">
							<div class="frx-staff-avatar">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</div>

							<div class="frx-staff-nickname">
								<p>Vago</p>
							</div>
						</div>
					</div>

					<div class="frx-utf-subcontainer" id="frx-utf-content-5">
						<div class="frx-id-staff-nickname" id="frx-id-staff-false">
							<div class="frx-staff-avatar">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</div>

							<div class="frx-staff-nickname">
								<p>Vago</p>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

	<?php
	if (!isset($_SESSION['UserLevel']) && !isset($_SESSION['LevelSession'])) {

		echo '<div class="login-popups">
			<div class="login-popups-invalid" id="lp-failure">
				<p>Usuario/Senha Inválidos <i class="fa fa-times" aria-hidden="true"></i></p>
			</div>
			<div class="login-popups-sucessful" id="lp-sucessful">
				<p>Login bem sucedido <i class="fa fa-times" aria-hidden="true"></i></p>
			</div>
	</div>	
	
<div class="login">
	<div id="close-background-login" class="close-background-login""></div>
	<div class="login-system">
		<h1>Login</h1>
		<form id="form-login" method="post" action="assets/lib/auth/index.php">
			<div class="data">	
			<input type="text" value="' . htmlspecialchars($user) . '" name="username" id="login-username" placeholder="Usuario" required />
			</div>
			<div class="data">
				<input type="password" value="' . htmlspecialchars($pass) . '" name="password" id="login-password" placeholder="Senha" required />
			</div>
			<div class="btn">
				<div class="inner">
					<button name="form-submit-button" id="button-login-one">Login</button>
				</div>
			</div>
		</form>
	</div>
</div>';
	}
	?>

	<div class="trx-container">
		<i class="fa fa-times" aria-hidden="true"></i>
		<div class="trx-popup-staffRecruit">
			<h1>Tem vaga na Staff ?</h1>
			<p>Tente se candidatar, clique aqui!</p>
		</div>
	</div>


	<div class="footer-staff">
		<footer class="bg-dark text-center text-white">
			<!-- Copyright -->
			<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
				Copyright © 2021
				<a class="text-white" href="https://forbiddenseries.net/" style="-webkit-text-stroke: 0.7px black; font-size: 14px; font-family: '8 BIT WONDER'; text-decoration: none;">
					<font color="#660103"> Forbidden </font>Series
				</a>
			</div>
			<!-- Copyright -->
		</footer>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script src="assets/lib/js/influence.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-8SRKND60JW"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-8SRKND60JW');
	</script>

</body>

</html>