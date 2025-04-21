<?php
session_start();
?>

<div class="window-droptower" id="wdt-vipradio">
    <div class="window-droptower-close" id="window-droptower-close-xii"></div>
    <div class="window-droptower-container-flex">
        <div class="window-droptower-content-1">
            <h2>VIP Radio</h2>
            <div class="wdt-contentFlex-1">
                <p>Ser VIP no nosso servidor é ter vantagens adicionais e exclusiva para aquele que obtém!
                    <br>
                    Tem interesse em ser VIP mas não sabe qual VIP comprar?
                    <br>
                    <br>
                    Clique no Botão abaixo para você ver a diferença entre os VIP's!
                    <br>
                <form id="wdt-enstone">
                    <button type="submit" class="wdt-details-vip" id="wdt-details-vipavaroza">Beneficios VIP</button>
                </form>
                <br>
                <br>
                Além dos benéficios dos vips que você pode ver acima, você ganhará Kits que fará sua gameplay ter um progresso iminente, veja os kits do VIP Radio abaixo!
                <br>
                <br>

                <h5>Kit Radio:</h5>
                <img src="assets/lib/img_remote/VipRadioV1.png">
                <br>
                <br>
                <h5>Kit Applied:</h5>
                <img src="assets/lib/img_remote/v3.png">
                <br>
                <br>
                Como pode ver acima, são 3 Kits que vem em um só VIP! e você receberá esse Kit Mensalmente caso tenha
                comprado mais de 1 Mês de VIP Radio!
                <hr style="margin-bottom: 15px;">
                </p>
                <br>
                <br>
            </div>
        </div>

        <div class="window-droptower-content-2">
            <div class="wdt-interface-mask">
                <div id="wdt-interMask-circleMask">
                    <h2>Vip Radio</h2>
                </div>
            </div>

            <form id="wdt-vipFormData" enctype="multipart/form-data">
                <div class="wdt-purchase-interface">
                    <div class="wdt-purchase-mounthQuantity">
                        <div class="wdt-purchase-mountQuantity-subcontainer">
                            <select name="VIPRADIO" class="wdt-selection" id="wdt-selection-xii"></select>
                            <input name="username" type="hidden" value="<?php echo $username; ?>" />
                        </div>
                    </div>

                    <div class="wdt-purchase-finishButton">
                        <button><img src="assets/lib/img_remote/2c7cc__ProjectE-Mod1-160x160.png">Comprar</button>
                    </div>

                    <div class="wdt-purchase-totalInterface">
                        <label class="wdt-label-totalAmount" id="wdt-labelviewTotal-xii">24,99 R$</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>