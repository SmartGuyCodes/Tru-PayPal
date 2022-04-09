<?php
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require './autoload.php';
require 'vendor/autoload.php';

//Enable dotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// Change this using your url
$baseUrl = $_ENV['APP_URL'];//'https://trupaypal.test/';

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'client_id' => $_ENV['PAYPAL_CLIENT_ID'],//'your paypal client id',
    'client_secret' => $_ENV['PAYPAL_CLIENT_SECRET'],//'your paypal secret id',
    'return_url' => $baseUrl.'response.php', 
    'cancel_url' => $baseUrl.'payment-cancelled.html'
];

// Database settings. Change these for your database configuration.
$dbConfig = [
    'host' => $_ENV['DB_HOST'],//'localhost',
    'username' => $_ENV['DB_USERNAME'],//'root',
    'password' => $_ENV['DB_PASSWORD'],//'',
    'name' => $_ENV['DB_DATABASE'],//''
];

$apiContext = getApiContext($paypalConfig['client_id'], $paypalConfig['client_secret'], $enableSandbox);

/**
 * Set up a connection to the API
 *
 * @param string $clientId
 * @param string $clientSecret
 * @param bool   $enableSandbox Sandbox mode toggle, true for test payments
 * @return \PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret, $enableSandbox = false)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential($clientId, $clientSecret)
    );

    $apiContext->setConfig([
        'mode' => $enableSandbox ? 'sandbox' : 'live'
    ]);

    return $apiContext;
}
