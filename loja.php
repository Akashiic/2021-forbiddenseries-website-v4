<?php
session_start();
require "assets/modules/dbboardconnect.php";
require 'assets/modules/class/AkashicMain.php';

$acc = new AkashicMain();

if(isset($_POST['addItem'])){
    $resp = Array(
        "Card" => $_POST['itemCartImg'],
        "Title" => $_POST['titleItemCart'],
        "Desc" => $_POST['descItemCart'],
        "Price" => $_POST['priceItemCart'],
        "Exit" => $_POST['itemDrop'],
        "ID" => $_POST['idItemCart']
    );
    echo $acc->responseJson($resp);
    //echo '<pre>', var_dump($_SESSION['CartItems'][0]), '</pre>';
    $acc->addItemCart($resp);
    exit();
}

if(isset($_POST['returnGet'])){
    echo $acc->responseJson(Array(
        "return" => true
    ));
    exit();
}

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loja</title>

    <link rel="stylesheet" href="assets/lib/css/styles.css">
    <link rel="stylesheet" href="assets/lib/css/ap_stylish.css">

    <link rel="shortcut icon" href="assets/lib/img_remote/2c7cc__ProjectE-Mod1-160x160.png" type="image/png">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <!--background-->
    <div class="bg-image"></div>
    <div class="background-media-main">
        <img src="assets/lib/img_remote/background.jpg" class="background-media-main">
    </div>

    <div class="container-shop-flow">
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
                    <li id="li-1" class="device-bars-menu"><span class="mobile-text-navbar"><a id="a-1"><i
                                    class="fa fa-bars" aria-hidden="true"></i></a></span></li>
                    <li id="li-1" class="toplist-main"><span class="web-text-navbar"><a id="a-1">Top Score <i
                                    class="fa fa-caret-down" aria-hidden="true"></i></a></span>
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
                        <a href="carrinho.php" id="a-1"><span class="shopping-cart-span"><span style="font-family: 'Minecraft Font';" class="subCointer-sCarSpan"><?php if($_SESSION['CartItems'] != 0){echo count($_SESSION['CartItems']);}else{echo '0';} ?></span></span> <i class="fa fa-shopping-cart"
                                aria-hidden="true"></i></a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>

    <button id="addButtonItemToCart">ADICIONAR ITEM</button>

    <div class="container-nrg">
        <div class="product-nrg" id="nrg-product-1">
            <h1>VIP Vanila</h1>
            <br>
            <img src="https://i.pinimg.com/originals/05/78/1a/05781a7d86141a044b345b3ddaa082f5.png" />
            <p id="nrg-p-1">Ao adquirir você receberá recompensas com itens do proprio minecraft Vanilla por ativar o
                Vip, e ganhará comandos que players comuns não tem.</p>
            <br>
            <div class="nrg-product-price">
                <p>9,99 R$</p>
            </div>
            <div class="button-nrgx"><button id="button-nrg-vipvanila">Comprar</button></div>
        </div>

        <div class="product-nrg" id="nrg-product-2">
            <h1>VIP Radio</h1>
            <br>
            <img src="https://cdn.pixabay.com/photo/2012/04/24/11/24/radioactive-39417_1280.png" />
            <p id="nrg-p-1">O Vip Radio é uma abreviação de Vip Radioativo, porque as recompensas de ativação tem bem
                mais valor que o VIP Vanila, Comandos exclusivos e bonûs é recebido ao ativar.</p>
            <br>
            <div class="nrg-product-price">
                <p>24,99 R$</p>
            </div>
            <div class="button-nrgx"><button id="button-nrg-vipradio">Comprar</button></div>
        </div>

        <div class="product-nrg" id="nrg-product-3">
            <h1>VIP Avaroza</h1>
            <br>
            <img
                src="https://lh3.googleusercontent.com/Sa7YAiHSHPiCxLhGc5yn_6Uk5hgrYsgerQxfly7UEf4ejMC4bEtLMsKICEBagAxwnya__dJUlp1m02dqtUDc=s400" />
            <p id="nrg-p-1">Se você estiver disposto a pagar para ter uma gameplay tranquila e agradavél ou se quiser se
                exibir para os outros players ou os dois, então esse vip vai atender a suas expectativas!</p>
            <br>
            <div class="nrg-product-price">
                <p>49,99 R$</p>
            </div>
            <div class="button-nrgx"><button id="button-nrg-vipavaroza">Comprar</button></div>
        </div>

        <div class="product-nrg" id="nrg-product-4">
            <h1>VIP Terminus</h1>
            <br>
            <img
                src="https://lh3.googleusercontent.com/Sa7YAiHSHPiCxLhGc5yn_6Uk5hgrYsgerQxfly7UEf4ejMC4bEtLMsKICEBagAxwnya__dJUlp1m02dqtUDc=s400" />
            <p id="nrg-p-1">Isto deveria existir?????</p>
            <br>
            <div class="nrg-product-price">
                <p>99,99 R$</p>
            </div>
            <div class="button-nrgx"><button id="button-nrg-vipterminus">Comprar</button></div>
        </div>
    </div>

    <div class="dsi-container">
        <?php

		$stmt = $mysqli->query("SELECT * FROM `item_shop_table`");
		while ($bind = $stmt->fetch_assoc()) {
		?>
        <div class="dsi-items" style="background-image: url('assets/lib/src/file_upload/<?php echo $bind['image']; ?>');">
            <form id="dsi-form-<?php echo $bind['id']; ?>" class="dsi-formData" enctype="multipart/form-data">
                <h2><?php echo $bind['item']; ?></h2>
                <input name="itemTitle" type="hidden" value="<?php echo $bind['item']; ?>" />

                <span class="dsi-label-details">
                    <p><?php echo $bind['info']; ?></p>
                    <input name="itemId" type="hidden" value="<?php echo $bind['info']; ?>" />
                    <input name="itemId" type="hidden" value="<?php echo $bind['id']; ?>" />
                </span>

                <h1>R$ <?php echo $bind['price']; ?></h1>
                <input name="itemPrice" type="hidden" value="<?php echo $bind['type']; ?>" />
                <input type="hidden" name="itemCard" value="<?php echo $bind['image']; ?>">

                <span class="dsi-label-buy">
                    <button type="submit" onclick="ClientAddItemCart('#dsi-form-<?php echo $bind['id']; ?>')">Comprar</button>
                </span>
            </form>
        </div>
        <?php
		}
		?>
    </div>

    <div class="xrg-container">
        <div class="xrg-limited-forbidden">
            <h1>Em Manutenção</h1>
        </div>
        <div class="product-xrg" id="xrg-product-xi">
            <h1>Cash</h1>
            <img src="https://www.nicepng.com/png/full/28-288275_cash-cash-pixel-art-png.png">
            <p>Adicionando Cash em sua conta, você poderá comprar itens exclusivos para te ajudar no seu progresso no
                servidor, como Chunk Loaders ou Querys, ultilize o comando <font color="orange">'/cash'</font> para ter
                acesso ao contéudo de nossa loja =)</p>
            <div class="xrg-product-containerButton">
                <button id="xrg-buttonOpening-xi">Comprar</button>
            </div>
        </div>

        <div class="product-xrg" id="xrg-product-xii">
            <h1>Blocos de Proteção</h1>
            <img src="https://png.vector.me/files/images/2/8/286710/minecraft_block_preview">
            <p>Você pode comprar por aqui quantos blocos de proteção você terá na sua conta! por padrão você vem com
                2000(2 mil) blocos de proteção para você construir sua base apropriadamente :)</p>
            <div class="xrg-product-containerButton">
                <button id="xrg-buttonOpening-xii">Comprar</button>
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

    <div class="footer-shop">
        <footer class="bg-dark text-center text-white">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                Copyright © 2021
                <a class="text-white" href="https://forbiddenseries.net/"
                    style="-webkit-text-stroke: 0.7px black; font-size: 14px; font-family: '8 BIT WONDER'; text-decoration: none;">
                    <font color="#660103"> Forbidden </font>Series
                </a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
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