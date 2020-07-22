<?php 
/*
include "paypal/vendor/autoload.php";

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        //Cliente IDE
        'ASFNaJyUXs4X3RRLno3UIuQP85pFyPv0sr9BMJr8kV9ER-tRKs7ZqAtjIOjf3LRcBFw0R68gAo7fmULG',
        //Secret
        'EFF4fxE5aPWyj0kR91S1wjdSesqMjJIGmFURwO9vAey4GAkdukQgIc5eKNtAdKe8C9bpEcct7TUAKYLx'
    )
);
*/

require __DIR__ . '/paypal/vendor/autoload.php';
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
// Creating an environment
$clientId = "ASFNaJyUXs4X3RRLno3UIuQP85pFyPv0sr9BMJr8kV9ER-tRKs7ZqAtjIOjf3LRcBFw0R68gAo7fmULG";
$clientSecret = "EFF4fxE5aPWyj0kR91S1wjdSesqMjJIGmFURwO9vAey4GAkdukQgIc5eKNtAdKe8C9bpEcct7TUAKYLx";

$environment = new SandboxEnvironment($clientId, $clientSecret);
$client = new PayPalHttpClient($environment);

//var_dump($environment);