<?php

    session_start();

?>

<div class="dc-newgrounds">
    <div id="dc-background-exit-1" class="dc-background-exit"></div>
    <form class="dc-fire-form" id="fire-form-1">
        <!--assets/modules/module_process_donate.php-->
        <h1>Doar</h1>
        <input type="hidden" name="ffi-username" value="<?php echo $_SESSION['UserLevel']; ?>" />
        <input id="dc-fire-form-input" name="ffi-value" type="text" placeholder="50.00 R$" />
        <button id="dc-fire-form-submit" type="submit">Pagar</button>
    </form>
</div>