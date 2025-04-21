<?php

session_start();
session_unset();
session_destroy();

$newURL = 'https://forbiddenseries.net/';
header('Location: '.$newURL);