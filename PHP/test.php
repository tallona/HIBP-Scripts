<?php
require('HIBP.php');

$source = "Test Website";
$email = "name@email.com";

$HIBP = new HIBP($source);
$response = $HIBP->checkEmail($email);

echo "<pre>" . print_r($response, true) . "</pre>";