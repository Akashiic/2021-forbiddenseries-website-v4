<?php
session_start();
?>
<div class="container-modal" style="opacity: 0;">
        <div class="modal-bg modal-exit"></div>
        <div class="modal">
            <div class="modal-part-container mp-part-1">
                <h1 style="background-color: yellow;">VIP Radio</h1>
                <p>Sendo esse o melhor VIP, será concedido permissões especiais para você se usufruir 100% do conteúdo VIP do servidor e ainda receberá Kit's do seu respectivo VIP!</p>
                <img src="./assets/lib/img_remote/vipterminustag.gif" alt="tagterminus">
                <hr>
                <img src="./assets/lib/img_remote/kitterminus.gif" alt="kitterminus">
            </div>
            <div class="modal-part-container mp-part-2">
                <div class="dropmodal-content-viewmodel-product">
                    <div class="dropmodal-content-sphere"></div>
                    <div class="dm-ticket-card">
                        <div class="dm-ticket-card-back"></div>
                        <div class="dm-ticket-card-front"></div>
                    </div>
                    <div class="dm-content-details">
                        <p>VIP Radio</p>
                    </div>
                </div>
                <div class="modal-content-purchase">
                    <form enctype="multipart/form-data">
                        <input type="hidden" name="TITLE" value="VIPRADIO">
                        <input type="hidden" name="USERNAME" value="<?php echo $_SESSION['UserLevel']; ?>">
                        <select name="QUANTITY" value="1" id="modal-content-selection">
                            <option value="1">1 Mês</option>
                            <option value="2">2 Meses</option>
                            <option value="3">3 Meses</option>
                        </select>
                        <input type="hidden" name="TYPE" value="VIP">
                        <p>24,99 R$</p>
                        <button type="submit">Comprar</button>
                    </form>
                </div>
            </div>

        </div>
    </div>