<?php
session_start();
require './assets/modules/class/AkashicMain.php';
require './assets/lib/apis/mercadopago/vendor/autoload.php';
$controller = new AkashicMain;

if (isset($_POST) && $_POST['TYPE'] == 'VIP') {
    if ($_POST['QUANTITY'] <= 0) {
        echo 'Não funfo';
        exit();
    }

    switch ($_POST['TITLE']) {
        case 'VIPVANILLA':
            echo $controller->mercadoPago($_POST['TITLE'], $_POST['QUANTITY'], 9.99, 'VIPVANILLA', $_POST['TYPE'], $_POST['USERNAME']);
            exit();
            break;
        case 'VIPRADIO':
            echo $controller->mercadoPago($_POST['TITLE'], $_POST['QUANTITY'], 24.99, 'VIPRADIO', $_POST['TYPE'], $_POST['USERNAME']);
            exit();
            break;
        case 'VIPAVAROZA':
            echo $controller->mercadoPago($_POST['TITLE'], $_POST['QUANTITY'], 49.99, 'VIPAVAROZA', $_POST['TYPE'], $_POST['USERNAME']);
            exit();
            break;
        case 'VIPTERMINUS':
            echo $controller->mercadoPago($_POST['TITLE'], $_POST['QUANTITY'], 99.99, 'VIPTERMINUS', $_POST['TYPE'], $_POST['USERNAME']);
            exit();
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forbidden Series</title>

    <link rel="stylesheet" href="./assets/lib/css/stylish_engine.css">
    <link rel="shortcut icon" href="assets/lib/img_remote/2c7cc__ProjectE-Mod1-160x160.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="background-color"></div>

    <nav>
        <ul>
            <a>
                <li>Loja</li>
            </a>
            <a>
                <li>Artigos</li>
            </a>
            <a>
                <li style="cursor:not-allowed">Score</li>
            </a>
            <?php
            if (empty($_SESSION['UserLevel']) || $_SESSION['UserLevel'] == null) {
            ?>
                <a>
                    <li style="margin-right: 12.3px;" id="login-button">Login</li>
                </a>
            <?php
            } else {
            ?>
                <a>
                    <li id="shop-nav">
                        <span class="shopping-cart-span"><span style="font-family: 'Minecraft Font';" class="subCointer-sCarSpan"><?php if($_SESSION['CartItems'] != 0){echo count($_SESSION['CartItems']);}else{echo '0';} ?></span></span> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </li>
                </a>
                <a>
                    <li>
                        <img src="https://mc-heads.net/avatar/<?php echo $_SESSION['UserLevel']; ?>">
                        <p> <?php echo $_SESSION['UserLevel']; ?> </p>
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </li>
                </a>
            <?php
            }
            ?>
        </ul>
    </nav>

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-players-panel">
            <p id="carousel-info-players">0</p>
            <p>Players<br>Online</p>
        </div>

        <div class="caroulsel-title">
            <div class="carousel-logo">
                <img src="./assets/lib/img_remote/logo.png" alt="">
            </div>

            <div class="carousel-info-panel">

                <div class="carousel-launcher-panel launcher-panel-0">
                    <img src="./assets/lib/img_remote/technic-launcher-logo-png-transparent.png" alt="">
                    <h5>Technic<br>Launcher</h5>
                </div>

                <div class="carousel-launcher-panel launcher-panel-1">
                    <img src="./assets/lib/img_remote/minecraft-icon.png" alt="">
                    <h5>Manual<br><br></h5>
                </div>
            </div>

        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <div class="itemBackground" style="background-image: url('./assets/lib/img_remote/2022-09-16_12.36.33.png');"></div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <div class="itemBackground" style="background-image: url('./assets/lib/img_remote/2022-09-18_03.42.38.png');"></div>
            </div>
            <div class="carousel-item">
                <div class="itemBackground" style="background-image: url('./assets/lib/img_remote/2022-09-21_18.26.04.png');"></div>
            </div>
            <div class="carousel-item">
                <div class="itemBackground" style="background-image: url('./assets/lib/img_remote/Screenshot_3.png');"></div>
            </div>
            <div class="carousel-item">
                <div class="itemBackground" style="background-image: url('./assets/lib/img_remote/2022-10-18_16.06.21.png');"></div>
            </div>
        </div>
        <button class="carousel-control-prev cButton-padding" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next cButton-padding" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="content-container">
        <h1>Rushe o seu progresso, compre o seu VIP!</h1>
        <h3>Veja mais coisas na loja!</h3>
        <section class="section-items">
            <article class="item item-1">
                <h3 style="background-color: rgb(61, 254, 254);">VIP Vanilla</h3>
                <div class="item-more-details">
                    <p>Este VIP é o de longe mais barato e custo beneficio, ele concede permissão para você craftar itens vips, mas ele não concede acesso a loja VIP, Clique em mais detalhes para saber mais!</p>
                </div>
                <div class="item-container-price">
                    9,99R$
                </div>
                <div class="item-container-footer" style="background-color: rgb(61, 254, 254);">
                    <button id="item-buy-1">Comprar</button>
                </div>
            </article>

            <article class="item item-2">
                <h3 style="background-color: yellow;">VIP Radio</h3>
                <div class="item-more-details">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda alias illo odit, consequatur accusamus non laudantium, vel unde sapiente molestiae dolor quia adipisci necessitatibus dolorem placeat blanditiis asperiores cupiditate praesentium.</p>
                </div>
                <div class="item-container-price">
                    24,99R$
                </div>
                <div class="item-container-footer" style="background-color: yellow;">
                    <button id="item-buy-2">Comprar</button>
                </div>
            </article>

            <article class="item item-3">
                <h3 style="background-color: rgb(255, 54, 87);">VIP Avaroza</h3>
                <div class="item-more-details">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda alias illo odit, consequatur accusamus non laudantium, vel unde sapiente molestiae dolor quia adipisci necessitatibus dolorem placeat blanditiis asperiores cupiditate praesentium.</p>
                </div>
                <div class="item-container-price">
                    49,99R$
                </div>
                <div class="item-container-footer" style="background-color: rgb(255, 54, 87);">
                    <button id="item-buy-3">Comprar</button>
                </div>
            </article>

            <article class="item item-4">
                <!--<div class="item-mark-new">
                    <p>Novo!</p>
                </div>-->
                <h3 style="background-color: rgb(147, 1, 1);">VIP Terminus</h3>
                <div class="item-more-details">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda alias illo odit, consequatur accusamus non laudantium, vel unde sapiente molestiae dolor quia adipisci necessitatibus dolorem placeat blanditiis asperiores cupiditate praesentium.</p>
                </div>
                <div class="item-container-price">
                    99,99R$
                </div>
                <div class="item-container-footer" style="background-color: rgb(147, 1, 1);">
                    <button id="item-buy-4">Comprar</button>
                </div>
            </article>
        </section>
    </div>

    <div class="second-container">
        <!--<iframe src="https://discord.com/widget?id=679090600724660234&theme=dark" width="450px" height="fit-content" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>-->
        <div class="container-info"></div>
    </div>

    <div class="discord-button">
        <img src="./assets/lib/img_remote/discord-icon.png" alt="">
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8SRKND60JW"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-8SRKND60JW');
    </script>
    <script src="./assets/lib/js/main.js"></script>
</body>

</html>