<?php

$unbound_session = <<<EOF

session_start();
session_unset();
session_destroy();

$newURL = 'https://forbiddenseries.net/';
header('Location: '.$newURL);


EOF;