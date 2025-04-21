<?php

session_start();

require 'assets/modules/dbboardconnect.php';
include_once 'assets/modules/donors_pump.php';
include_once 'assets/modules/module_resetDonorsMonth.php';

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Forbidden Series</title>

    <link rel="stylesheet" href="assets/lib/css/main.css">
    <link rel="stylesheet" href="assets/lib/css/styles.css">

    <link rel="shortcut icon" href="assets/lib/img_remote/2c7cc__ProjectE-Mod1-160x160.png" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/lib/src/local/minecraft-skinviewer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">

</head>

<body>

    <!--background-->
    <div class="bg-image"></div>
    <div class="bg-device-background"></div>

    <div class="main-header">
        <div class="container-fluid px-0">

            <!--Header-->
            <header id="index-header-nav" class="header-navbar-flex">
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

                <nav class="navDevice-mobile">
                    <ul class="mobile-navbar">
                        <li><a></a></li>
                        <li><a></a></li>
                        <li><a></a></li>
                        <li><a></a></li>
                    </ul>
                </nav>

            </header>
        </div>
    </div>

    <div class="interface-panel-container">

        <div class="ipc-panel-playerSkinTDonator">
            <span>
                <h1>Top 1 doador do mes</h1>
            </span>
            <span>
                <p><?php echo (!isset($userSignDonate) ? "Ninguem Doou!" : "$userSignDonate"); ?></p>
            </span>
            <div class="ipc-p-psTD-skin">

                <!-- Skin 3D View -->

                <style>
                    #skin-viewer * {
                        background-image: url(<?php echo 'https://mc-heads.net/skin/' . $userSignDonate . ''; ?>);
                    }
                </style>

                <div id="skin-viewer" class="mc-skin-viewer-11x legacy legacy-cape spin">
                    <div class="player">
                        <!-- Head -->
                        <div class="head">
                            <div class="top"></div>
                            <div class="left"></div>
                            <div class="front"></div>
                            <div class="right"></div>
                            <div class="back"></div>
                            <div class="bottom"></div>
                            <div class="accessory">
                                <div class="top"></div>
                                <div class="left"></div>
                                <div class="front"></div>
                                <div class="right"></div>
                                <div class="back"></div>
                                <div class="bottom"></div>
                            </div>
                        </div>
                        <!-- Body -->
                        <div class="body">
                            <div class="top"></div>
                            <div class="left"></div>
                            <div class="front"></div>
                            <div class="right"></div>
                            <div class="back"></div>
                            <div class="bottom"></div>
                            <div class="accessory">
                                <div class="top"></div>
                                <div class="left"></div>
                                <div class="front"></div>
                                <div class="right"></div>
                                <div class="back"></div>
                                <div class="bottom"></div>
                            </div>
                        </div>
                        <!-- Left Arm -->
                        <div class="left-arm">
                            <div class="top"></div>
                            <div class="left"></div>
                            <div class="front"></div>
                            <div class="right"></div>
                            <div class="back"></div>
                            <div class="bottom"></div>
                            <div class="accessory">
                                <div class="top"></div>
                                <div class="left"></div>
                                <div class="front"></div>
                                <div class="right"></div>
                                <div class="back"></div>
                                <div class="bottom"></div>
                            </div>
                        </div>
                        <!-- Right Arm -->
                        <div class="right-arm">
                            <div class="top"></div>
                            <div class="left"></div>
                            <div class="front"></div>
                            <div class="right"></div>
                            <div class="back"></div>
                            <div class="bottom"></div>
                            <div class="accessory">
                                <div class="top"></div>
                                <div class="left"></div>
                                <div class="front"></div>
                                <div class="right"></div>
                                <div class="back"></div>
                                <div class="bottom"></div>
                            </div>
                        </div>
                        <!-- Left Leg -->
                        <div class="left-leg">
                            <div class="top"></div>
                            <div class="left"></div>
                            <div class="front"></div>
                            <div class="right"></div>
                            <div class="back"></div>
                            <div class="bottom"></div>
                            <div class="accessory">
                                <div class="top"></div>
                                <div class="left"></div>
                                <div class="front"></div>
                                <div class="right"></div>
                                <div class="back"></div>
                                <div class="bottom"></div>
                            </div>
                        </div>
                        <!-- Right Leg -->
                        <div class="right-leg">
                            <div class="top"></div>
                            <div class="left"></div>
                            <div class="front"></div>
                            <div class="right"></div>
                            <div class="back"></div>
                            <div class="bottom"></div>
                            <div class="accessory">
                                <div class="top"></div>
                                <div class="left"></div>
                                <div class="front"></div>
                                <div class="right"></div>
                                <div class="back"></div>
                                <div class="bottom"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $quantity_donate = str_replace('.', ',', $quantity_donate); ?>
                <span class="ipc-p-psTd-valueDonate">
                    <p>R$ <?php echo (!isset($valueSignDonate) || ($valueSignDonate == null) ? "0,00" : "$valueSignDonate"); ?></p>
                </span>


                <!-- End of Skin 3D View -->

            </div>
        </div>

        <div class="ipc-container-content-2">

            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/lib/img_remote/cardforbidden.png" class="d-block w-100" alt="...">
                        <div class="shadow-interface"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Bem Vindo</h5>
                            <p>Tutorial para entrar no Servidor clique em "Jogar"</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                        <div class="shadow-interface"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                        <div class="shadow-interface"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>


    </div>

    <div class="page-panel-container">
        <div class="page-panel-interface-1">

            <?php

            if ($_SESSION['LevelSession'] == 'master') {
                echo '<style>.cnews-interface{display: block !important;}</style>';
            } else {
                echo '<style>.cnews-interface{display: none !important;}</style>';
            }

            ?>
            <div class="cnews-interface ppi1-content-news">
                <div class="publishing-noticia" id="publ-news-xi">
                    <div class="publishing-display">
                        <div class="publishing-id-user">
                            <div class="publishing-avatar-id">
                                <?php echo '<img src="https://mc-heads.net/avatar/' . $_SESSION['UserLevel'] . '">'; ?>
                            </div>
                            <div class="publishing-username-id">
                                <p><?php echo $_SESSION['UserLevel']; ?></p>
                            </div>
                        </div>
                        <div class="publishing-post">
                            <form id="publishing-form-post" enctype="multipart/form-data">
                                <input id="pp-post-author" type="hidden" name="publishing-author" value="<?php echo $_SESSION['UserLevel']; ?>" />
                                <input id="pp-post-author-level" type="hidden" name="publishing-author-level" value="<?php echo $_SESSION['LevelSession']; ?>" />
                                <input id="pp-post-title" class="publishing-title" type="text" placeholder="Digite o Titulo" name="publishing-title" required>
                                <code><textarea id="pp-post-description" class="publishing-content-text" placeholder="Crie uma noticia!" name="publishing-desc" required></textarea></code>
                                <input id="pp-post-file-user" type="file" name="userfile" class="form form-control">
                                <button id="pbp-button-submit" class="publishing-button-post" name="publishing-submit" value="publishing-submit">Publicar</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <?php

            function translateDate($target)
            {
                if ($target == '01') {
                    $result = "Jan";
                }
                if ($target == '02') {
                    $result = "Fev";
                }
                if ($target == '03') {
                    $result = "Mar";
                }
                if ($target == '04') {
                    $result = "Abr";
                }
                if ($target == '05') {
                    $result = "Mai";
                }
                if ($target == '06') {
                    $result = "Jun";
                }
                if ($target == '07') {
                    $result = "Jul";
                }
                if ($target == '08') {
                    $result = "Ago";
                }
                if ($target == '09') {
                    $result = "Set";
                }
                if ($target == '10') {
                    $result = "Out";
                }
                if ($target == '11') {
                    $result = "Nov";
                }
                if ($target == '12') {
                    $result = "Dez";
                }

                echo $result;
            }

            $stmt = $mysqli->query("SELECT * FROM publishing_news ORDER BY id DESC");

            if ($stmt->num_rows == 0) {
                echo 'Nenhuma postagem no banco de dados';
            } else {
                while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $desc_code = $row['desc_code'];
                    $img = $row['img'];
                    $autor = $row['autor'];
                    $data_dia = $row['data_dia'];
                    $data_mes = $row['data_mes'];
            ?>
                    <div class="ppi1-content-news">

                        <div class="hotface-publish">
                            <div class="hotface-publish-header">
                                <div class="hotface-publish-subcontainer-header">
                                    <div class="hotface-publish-header-avatar">
                                        <div class="hpha-subcontainer">
                                            <img src="https://mc-heads.net/avatar/<?php echo $autor; ?>" />
                                            <p><?php echo $autor; ?></p>
                                        </div>
                                    </div>
                                    <div class="hotface-publish-header-title">
                                        <h1><?php echo $title; ?></h1>
                                    </div>
                                </div>

                                <div class="hotface-publish-header-date-container">
                                    <div class="hotface-publish-header-date">
                                        <p><span><?php echo $data_dia; ?></span><br><?php translateDate($data_mes); ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="hotface-publish-body">
                                <div class="hotface-publish-body-desc">
                                    <p><code><?php echo $desc_code; ?></code></p>
                                </div>

                                <div class="hotface-publish-body-image" id="hf-pbi-<?php echo $id; ?>">
                                    <img src="assets/lib/src/file_upload/<?php echo $img; ?>">
                                </div>

                            </div>

                        </div>
                    </div>
            <?php
                    if ($img == '' || $img == null || empty($img)) {
                        echo '<script type="text/javascript">document.getElementById("hf-pbi-' . $id . '").remove()</script>';
                    } else {
                    }
                }
            }
            ?>
        </div>

        <div class="page-panel-interface-2">

            <div class="ppi2-widgets-interface ipc-container">

                <div class="ipc-panel-onlinePlayers">
                    <div class="ipc-p-op-span-container">
                        <div class="custom-painel-ipc ipc-p-op-span-content" id="interact-fluid-panel">0</div>
                        <div class="custom-painel-ipc ipc-xii-span">Online Players</div>
                    </div>
                </div>

            </div>

            <div class="ppi2-widgets-interface">

                <div class="ppi2-widget-topdonators-month">
                    <div id="ppi2-widget-tdm-title">
                        <p>Top doadores do Mês</p>
                    </div>

                    <?php

                    $board = $mysqli->query("SELECT * FROM fire_tdonors WHERE value_price ORDER BY value_price DESC LIMIT 0,10");
                    while ($coneccta = $board->fetch_assoc()) {

                        echo '<div class="ppi2-widget-tdm-profile" id="ppi2wtp-position-1">
                        <p1 id="tdm-podium-score"></p1>
                        <img src="https://mc-heads.net/avatar/' . $coneccta['username'] . '" />
                        <p3>' . $coneccta['username'] . '</p3>
                        <p4>' . $coneccta['transaction_quantity'] . ' R$</p4>
                    </div>';
                    }
                    ?>

                </div>

            </div>

            <div class="ppi2-widgets-interface">

                <div class="ppi2-widget-iframe">
                    <iframe width="100%" height="180" src="https://www.youtube.com/embed/3vslUz6kPms" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

            </div>

            <div class="ppi2-widgets-interface">

                <div class="ppi2-widget-discord">
                    <iframe src="https://discord.com/widget?id=679090600724660234&theme=dark" width="100%" height="480px" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                </div>

            </div>

            <div class="ppi2-widgets-interface">

                <script src="https://minecraft-mp.com/embed.js?id=298803&type=votes&size=normal"></script>

            </div>

        </div>

    </div>

    <?php
    if (!isset($_SESSION['UserLevel']) && !isset($_SESSION['LevelSession'])) {

        echo '<div class="login-popups">
			<div class="login-popups-invalid" id="lp-failure">
				<p>Usuario/Senha Inválidos <i class="fa fa-times" aria-hidden="true"></i></p>
				<span></span>
			</div>
			<div class="login-popups-sucessful" id="lp-sucessful">
				<p>Login bem sucedido <i class="fa fa-times" aria-hidden="true"></i></p>
			</div>
	</div>	
	
<div class="login">
	<div id="close-background-login" class="close-background-login""></div>
	<div class="login-system">
		<h1>Login</h1>
		<form id="form-login">
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

    <div class="footer">
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

    <div class="scripts">
        <!--Scripts-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-8SRKND60JW"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-8SRKND60JW');
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            hljs.initHighlightingOnLoad();
        </script>

    </div>
    <script src="assets/lib/js/influence.js"></script>
</body>

</html>