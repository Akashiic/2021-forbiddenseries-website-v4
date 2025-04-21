<?php
session_start();

require 'assets/modules/class/AkashicMain.php';
$acc = new AkashicMain();

if (!isset($_SESSION['UserLevel'])) {
	echo '<script>alert("Você precisa estar logado!")""</script>';
	exit();
}
?>
<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Carrinho</title>

	<link rel="stylesheet" href="assets/lib/css/styles.css">
	<link rel="stylesheet" href="assets/lib/css/main.css">

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
				<ul id="ul-1" class="unlisting-mainNavbar">
					<li id="li-1">
						<a id="a-1" href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</a>
					</li>
				</ul>
			</nav>
		</header>
	</div>

	<div class="cart-Container">

		<div class="cart-Column-1">

			<div class="cart-items">
				<?php
				if (count($_SESSION['CartItems']) == 0) {
					echo '<h1 style="color: white;">Não tem Nada!</h1>';
				} else {
					foreach (array_keys($_SESSION['CartItems']) as $key) {
				?>
						<div class="cartItemFocus item-<?php echo $key; ?>">
							<img src="assets/lib/src/file_upload/<?php echo $_SESSION['CartItems'][$key]['ItemCard']; ?>">

							<div class="itemStructureInfo">
								<h1><?php echo $_SESSION['CartItems'][$key]['ItemTitle']; ?></h1>
								<p><?php echo $_SESSION['CartItems'][$key]['ItemDesc']; ?></p>
							</div>

							<div class="itemStructureInput">
								<label id="itemInputIncrement-<?php echo $key; ?>">+</label>
								<input id="itemInput-Indentity-<?php echo $key; ?>" onclick="client.instantInputChange('#itemInput-Indentity-<?php echo $key; ?>', <?php echo $_SESSION['CartItems'][$key]['ItemPrice']; ?>, '#itemIDPrice-<?php echo $key; ?>', '#itemInputIncrement-<?php echo $key; ?>', '#itemInputDecrement-<?php echo $key; ?>');" type="text" />
								<label id="itemInputDecrement-<?php echo $key; ?>">-</label>
							</div>
							<label class="itemStructurePrice" id="itemIDPrice-<?php echo $key; ?>">0,00 R$</label>
							<label class="itemStructure-exit exit-<?php echo $key; ?>" onclick="requestRemoveItem(<?php echo $key; ?>)"><i class="fa fa-times" aria-hidden="true"></i></label>
							<input type="hidden" value="<?php echo $_SESSION['CartItems'][$key]['ItemID'] ?>">
						</div>
				<?php
						if (isset($_POST['removeItem'])) {
							$ItemArrayId = $_POST['ItemArrayId'];
							unset($_SESSION['CartItems'][$ItemArrayId]);
							exit();
						}
					}
				}
				?>
			</div>

		</div>

		<div class="cart-Column-2">

			<div class="cartContent2-top">
				<h1>Carrinho</h1>
				<hr>
				<div class="cartSubContent2-top">
					<div class="cartDivisionFlex">
						<h5>Valor:</h5>
						<p>0</p>
					</div>

					<div class="cartDivisionFlex" id="cupomInterfaceCount">
						<h5>Cupom:</h5>
						<p>0</p>
					</div>

					<br>

					<div class="cartDivisionFlex">
						<h4>Total:</h4>
						<p>0</p>
					</div>

					<hr>

					<div class="cartCoupom">
						<form id="carCoupomForm">
							<h6>Cupom</h6>
							<input type="text" placeholder="Coloque o seu cupom aqui!" />
							<button type="submit">Aplicar</button>
						</form>
					</div>

				</div>
			</div>

			<div class="cartContent2-bottom">
				<hr>
				<form id="cartConclusionFinish">
					<button type="submit">Concluir</button>
				</form>
				<img src="assets/lib/img_remote/cardFlags.png">
			</div>
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
	<script src="assets/lib/js/ClientController.js"></script>
	<script src="assets/lib/js/influence.js"></script>
	<script src="assets/lib/js/engine.js"></script>
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