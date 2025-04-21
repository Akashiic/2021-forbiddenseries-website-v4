<?php
session_start();

if(!isset($_SESSION['UserLevel']) && !isset($_SESSION['LevelSession'])){
	echo '<script>
			alert("Você não está logado!");
				window.location.href="https://forbiddenseries.net/";
		 </script>';
	//header('Location: https://forbiddenseries.net');
}elseif($_SESSION['LevelSession'] !== 'master'){
	echo '<script>
			alert("Sem Permissão!");
				window.location.href="https://forbiddenseries.net/";
		 </script>';
	//header('Location: https://forbiddenseries.net');
}else{
	
}

?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Confiramação SMS</title>
	<link type="text/css" rel="stylesheet" href="../../../lib/css/styles.css" />
    <link type="text/css" rel="stylesheet" href="../../../lib/css/zero.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main-background"></div>
    <div class="auth-window">
        <form>
            <p>Confirme o codigo que foi enviado no seu Celular</p>
            <input type="text" placeholder="Codigo" required>
        </form>
    </div>
</body>

</html>