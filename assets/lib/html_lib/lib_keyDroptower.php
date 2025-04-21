<?php

session_start();

?>

<div class="keydroptower-container">
	<div class="keydroptower-exit"></div>
	<div class="keydroptower-window">

		<div class="loadingInfos">
			<div class="positionLoadingInfo">
				<div class="spinner-border text-info" role="status">
					<span class="sr-only">Loading...</span>
				</div>
			</div>
		</div>

		<h1>Ativar Key</h1>
		<form id="serial-to-key">
			<input type="text" name="serialID" maxlength="32" placeholder="Serial-ID Aqui!" required>
			<input type="hidden" name="usernameSerial" <?php echo 'value="'. $_SESSION['UserLevel'] .'"';?>/>
			<button id="submit-button-serial" type="submit" name="keydroptowerSubmit">Ativar</button>
		</form>
		<div class="revelInfo">
			<div class="nameProduct-division">
				<hr>
				<p>Você resgatou:</p>
				<p id="product-revel"></p>
			</div>
			<div class="key-division">
				<hr id="division-revel">
				<p>Key:</p>
				<p2 id="key-append"></p2>
			</div>
		</div>
	</div>
</div>