<?php

require_once("vendor/autoload.php");

$api_keys = array(
    "secret_key" => "test_sec_k_16dc38ad730d6ba806a92",
    "open_key"   => "test_open_k_c3f462a1e8277114c1da"
);


/* convert 10.00 AED to cents */
$amount_in_cents = 10.00 * 100;
$currency = "AED";
$customer_email = "customer@example.com";

?>
