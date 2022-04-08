<?php
	use PayPal\Rest\ApiContext;
	use PayPal\Auth\OAuthTokenCredential;

	require './autoload.php';

	// For test payments we want to enable the sandbox mode. If you want to put live
	// payments through then this setting needs changing to `false`.
	$enableSandbox = true;

	// PayPal settings. Change these to your account details and the relevant URLs
	// for your site.
	$paypalConfig = [
	    'client_id' => 'ASBSUJq3_95Dkbq4fc07Rto9cIp01VKkuTGDBn1tJEcjH9sXPbg_GheipgaS5uV7uDbfjeSiStoI8nqr',
	    'client_secret' => 'EABMUny0hFO2rq512gmigtOHqgRY6Ui07L1MbFlZvcBU-WvFJrMhDlbUWuA_JCDmYp036Y0iCvRqPsE4',
	    'return_url' => 'https://trupaypal.test/response.php',
	    'cancel_url' => 'https://trupaypal.test/payment-cancelled.html'
	];

	// Database settings. Change these for your database configuration.
	$dbConfig = [
	    'host' => 'localhost',
	    'username' => 'root',
	    'password' => 'password',
	    'name' => 'trucomm_pay'
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