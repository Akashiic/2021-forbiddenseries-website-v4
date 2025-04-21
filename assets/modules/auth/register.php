<!--
  This is a demo page for AuthMe website integration.
  See AuthMeController.php and the extending classes for the PHP code you need.
-->
<!DOCTYPE html>
<html lang="pt-br">
 <head>
   <title>AuthMe Integration Sample</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 </head>
 <body>
<?php
error_reporting(E_ALL);

require 'AuthMeController.php';

// Change this to the file of the hash encryption you need, e.g. Bcrypt.php or Sha256.php
require 'Bcrypt.php';
// The class name must correspond to the file you have in require above! e.g. require 'Sha256.php'; and new Sha256();
$authme_controller = new Bcrypt();

$action = get_from_post_or_empty('action');
$user = $_POST['rc-username'];
$pass = $_POST['rc-password'];;
$email = $_POST['rc-email'];

$was_successful = false;
if (isset($user) && isset($pass)) {
	$was_successful = process_register($user, $pass, $email, $authme_controller);
}

function get_from_post_or_empty($index_name) {
    return trim(
        filter_input(INPUT_POST, $index_name, FILTER_UNSAFE_RAW, FILTER_REQUIRE_SCALAR | FILTER_FLAG_STRIP_LOW)
            ?: '');
}

	 /*if(empty($_POST['rc-username']) || empty($_POST['rc_password'])){
		 header('Location: https://forbiddenseries.net/');
	 }*/

// Login logic
	 //Não Precisa

// Register logic
function process_register($user, $pass, $email, AuthMeController $controller) {
    if ($controller->isUserRegistered($user)) {
        echo '<h1>Erro</h1> Já existe alguem com esse nome.';
    } else if (!is_email_valid($email)) {
        echo '<h1>Erro</h1> email invalido.';
    } else {
        // Note that we don't validate the password or username at all in this demo...
        $register_success = $controller->register($user, $pass, $email);
        if ($register_success) {
            printf('<h1>Conta criada, %s!</h1>Obrigado por se Registrar!', htmlspecialchars($user));
            echo '<p>Retorne para o Site e se Logue clicando em login!</p>';
			echo '<a href="https://forbiddenseries.net/">Clique aqui para retornar</a>';
            return true;
        } else {
            echo '<h1>Erro</h1>Erro Fatal. Algo de ruim ocorreu no sistema. Mostre esse codigo para o Desenvolvedor '.rand(1000000,999999).'';
        }
    }
    return false;
}

function is_email_valid($email) {
    return trim($email) === ''
        ? true // accept no email
        : filter_var($email, FILTER_VALIDATE_EMAIL);
}

?>

 </body>
</html>