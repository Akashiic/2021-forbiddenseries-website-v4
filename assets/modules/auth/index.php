<?php

/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require 'AuthMeController.php';

// Change this to the file of the hash encryption you need, e.g. Bcrypt.php or Sha256.php
require 'Bcrypt.php';
// The class name must correspond to the file you have in require above! e.g. require 'Sha256.php'; and new Sha256();
$authme_controller = new Bcrypt();

$action = get_from_post_or_empty('action');
$user = $_POST['username'];
$pass = $_POST['password'];
$email = get_from_post_or_empty('email');

$was_successful = false;
if ($user && $pass) {
    if (isset($user) && isset($pass)) {
        $was_successful = process_login($user, $pass, $authme_controller);
    } else if ($action === 'Register') {
        $was_successful = process_register($user, $pass, $email, $authme_controller);
    }
}

function get_from_post_or_empty($index_name) {
    return trim(
        filter_input(INPUT_POST, $index_name, FILTER_UNSAFE_RAW, FILTER_REQUIRE_SCALAR | FILTER_FLAG_STRIP_LOW)
            ?: '');
}

if(empty($_POST['username']) || empty($_POST['password'])){
	
	header('Location: https://forbiddenseries.net/');
	exit();
	
}else{
	
}
	 
// Login logic
function process_login($user, $pass, AuthMeController $controller) {
    if ($controller->checkPassword($user, $pass)){

		include_once('chain.php');
		header("Content-type: application/json; charset=utf-8");
        $response = [
            "auth" => true
        ];
        http_response_code(200);
        echo json_encode($response);
        exit();
		
    } else {

        header("Content-type: application/json; charset=utf-8");
        $response = [
            "auth" => false
        ];
        http_response_code(200);
        echo json_encode($response);
        exit();

    }
    return true;
}

// Register logic
function process_register($user, $pass, $email, AuthMeController $controller) {
    if ($controller->isUserRegistered($user)) {
        echo '<h1>Error</h1> This user already exists.';
    } else if (!is_email_valid($email)) {
        echo '<h1>Error</h1> The supplied email is invalid.';
    } else {
        // Note that we don't validate the password or username at all in this demo...
        $register_success = $controller->register($user, $pass, $email);
        if ($register_success) {
            printf('<h1>Welcome, %s!</h1>Thanks for registering', htmlspecialchars($user));
            echo '<br /><a href="https://forbiddenseries.net">Back to form</a>';
            return true;
        } else {
            echo '<h1>Error</h1>Unfortunately, there was an error during the registration.';
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