<?php 

session_start();

$username = $_SESSION['UserLevel'];

?>

<div class="window-droptower" id="wdt-terminus">
    <div class="window-droptower-close" id="window-droptower-close-XIV"></div>
    <div class="window-droptower-container-flex">
        <div class="window-droptower-content-1">
            <h2>VIP Terminus</h2>
            <div class="wdt-contentFlex-1">
                <p>Ser VIP no nosso servidor é ter vantagens adicionais e exclusiva para aquele que obtém!
                    <br>
                    Tem interesse em ser VIP mas não sabe qual VIP comprar?
                    <br>
                    <br>
                    Clique no Botão abaixo para você ver a diferença entre os VIP's!
                    <br>
                <form id="wdt-enstone">
                    <button type="submit" class="wdt-details-vip" id="wdt-details-terminus">Beneficios VIP</button>
                </form>
                <br>
                <br>
                O Kit do VIP Avaroza é oque as imagens abaixo mostra
                <br>
                <br>

                <h5>Kit Div:</h5>
                <img src="assets/lib/img_remote/v1.png">
                <br>
                <br>
                <h5>Kit Avaroza:</h5>
                <img src="assets/lib/img_remote/v2.png">
                <br>
                <br>
                <h5>Kit Applied:</h5>
                <img src="assets/lib/img_remote/v3.png">
                <br>
                <br>
                Como pode ver acima, são 3 Kits que vem em um só VIP! e você receberá esse Kit Mensalmente caso tenha
                comprado mais de 1 Mês de VIP Terminus!
                <hr style="margin-bottom: 15px;">
                </p>
                <br>
                <br>
            </div>
        </div>

        <div class="window-droptower-content-2">
            <div class="wdt-interface-mask">
                <div id="wdt-interMask-circleMask">
                    <h2>Vip Avaroza</h2>
                </div>
            </div>

            <form id="wdt-vipFormData" enctype="multipart/form-data">
                <div class="wdt-purchase-interface">
                    <div class="wdt-purchase-mounthQuantity">
                        <div class="wdt-purchase-mountQuantity-subcontainer">
                            <select name="VIPTERMINUS" class="wdt-selection" id="wdt-selection-XIV"></select>
                            <input name="username" type="hidden" value="<?php echo $username; ?>" />
                        </div>
                    </div>

                    <div class="wdt-purchase-finishButton">
                        <button type="submit"><img src="assets/lib/img_remote/2c7cc__ProjectE-Mod1-160x160.png">Comprar</button>
                    </div>

                    <div class="wdt-purchase-totalInterface">
                        <label class="wdt-label-totalAmount" id="wdt-labelviewTotal-XIV">99,99 R$</label>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>