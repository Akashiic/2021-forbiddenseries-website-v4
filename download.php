<?php

session_start();

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jogar</title>
    <link rel="stylesheet" href="assets/lib/css/style_2.css">
    <link rel="stylesheet" href="assets/lib/css/styles.css">


    <link rel="shortcut icon" href="assets/lib/img_remote/2c7cc__ProjectE-Mod1-160x160.png" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</head>

<body>

    <!--background-->
    <div class="bg-image"></div>
    <img src="assets/lib/img_remote/background.jpg" class="background-media-main"></div>

    <div class="g-header">
        <div class="container-fluid px-0">
            <!--Header-->
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
    </div>

    <div class="xml-introduction">
        <h1>Como é o servidor ?</h1>

        <div class="xml-paragraph">
            <p>O Forbidden Series é um servidor de Modpack Magia/Tech com plugins, Embora que esses plugins não influem
                tanto na sua gameplay. Esse servidor tem a gameplay bem diferente dos de mais servidores. O Objetivo
                principal é o progresso, o player deve criar sua base e se desenvolver até ser potente para disputar com
                outros players.</p>
        </div>

    </div>

    <div class="xml-introduction">
        <h1>Como jogar/entrar no Forbidden Series ?</h1>
        <div class="xml-paragraph">
            <p1>Prosseguindo, caso não saiba como baixar o modpack, essa area o instruirá a baixar e instalar o modpack.
            </p1>
        </div>

    </div>

    <div class="container-xml">
        <div class="xml-box-download" id="xml-box-1">
            <img src="assets/lib/img_remote/technic-launcher-logo-png-transparent.png" />
            <h1>Technic</h1>
            <div class="xml-sub-container">
                <p>Clique em Detalhes, para mais informações</p>
                <br>
                <button id="xml-details-modal-1">Detalhes</button>
            </div>
            <div class="xml-box-button-area" id="xml-box-button-area-1"><button id="xmli-download-btn-xi">Download</button></div>
        </div>

        <div class="xml-box-download" id="xml-box-2">
            <img src="assets/lib/img_remote/technicpirata.png" />
            <h1>Technic Pirata</h1>
            <div class="xml-sub-container">
                <p>Clique em Detalhes, para mais informações</p>
                <br>
                <div><button id="xml-details-modal-2">Detalhes</button></div>
            </div>
            <div class="xml-box-button-area" id="xml-box-button-area-2"><button id="xmli-download-btn-xii">Download</button></div>
        </div>

        <div class="xml-box-download" id="xml-box-3">
            <img src="assets/lib/img_remote/Dropbox_Icon.png" />
            <h1>Manual</h1>
            <div class="xml-sub-container">
                <p>Clique em Detalhes, para mais informações</p>
                <br>
                <div><button id="xml-details-modal-3">Detalhes</button></div>
            </div>
            <a href="https://dl.dropbox.com/s/w9rpvwz1qzwbsux/FORBIDDENZA.zip">
                <div class="xml-box-button-area" id="xml-box-button-area-3"><button id="xmli-download-btn-xiii">Download</button></div>
            </a>
        </div>
    </div>

    <div class="xml-introduction">
        <h1>A Quantidade de RAM não é mostrada no Technic Launcher</h1>
        <div class="xml-paragraph">
            <p>Se a opção de escolher a RAM na configuração JAVA do seu technic não aparecer, isso significa que o JAVA
                que você tem instalado na sua maquina não é o JAVA de 64x BITS, e mesmo tendo um PC de 32x Bits, é
                recomendável você ter o JAVA de 64x BITS instalado, Clique no botão detalhes logo abaixo</p>
        </div>

    </div>

    <div class="xml-container-java">
        <img src="https://freepikpsd.com/media/2019/10/java-logo-transparent-png-5-Transparent-Images.png" />
        <h1>Java JRE 64x</h1>
        <div class="xml-java-container-button">
            <a href="assets/lib/src/files/jre-8u301-windows-x64.exe"><button>Download</button></a>
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

    <div class="footer-xmlg">

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