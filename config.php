<?php
// use PayPal\Rest\ApiContext;
// use PayPal\Auth\OAuthTokenCredential;

// require './autoload.php';


define('PAYPAL_ID','adminklc@business.example.com');
define('PAYPAL_SANDBOX', TRUE);


define('PAYPAL_RETURN_URL','http://localhost/klc/success.php');
define('PAYPAL_CANCEL_URL','http://localhost/klc/cancel.php');
define('PAYPAL_NOTIFY_URL', 'http://localhost/klc/ipn.php'); 
define('PAYPAL_CURRENCY','PHP');


// //database

define('DB_HOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','klc');


define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");


// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
// $enableSandbox = true;

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
// $paypalConfig = [
//     // 'client_id' => 'AUikR1XoqPXjD5qnciXEYw-_rs83pQ90KSNBK4wMgIKv_x8-mXA4DIWTneq2zrzZlSz6tLcuMZKscsjF',
//     // 'client_secret' => 'EKHcg6v0JnYMDZQAig3Xlmn5LorcmRFHPG6zfdHJ_WLsXhsLGccAYZR1ajDfgsM_DuNW6Q6Wr5UyO-xT',
//     'return_url' => 'http://localhost/klc/response.php',
//     'cancel_url' => 'http://localhost/klc/payment-cancelled.html'
// ];

// // Database settings. Change these for your database configuration.
// $dbConfig = [
//     'host' => 'localhost',
//     'username' => 'root',
//     'password' => '',
//     'name' => 'klc'
// ];

// $apiContext = getApiContext($paypalConfig['client_id'], $paypalConfig['client_secret'], $enableSandbox);

// /**
// //  * Set up a connection to the API
// //  *
// //  * @param string $clientId
// //  * @param string $clientSecret
// //  * @param bool   $enableSandbox Sandbox mode toggle, true for test payments
// //  * @return \PayPal\Rest\ApiContext
// //  */
// function getApiContext($clientId, $clientSecret, $enableSandbox = false)
// {
//     $apiContext = new ApiContext(
//         new OAuthTokenCredential($clientId, $clientSecret)
//     );

//     $apiContext->setConfig([
//         'mode' => $enableSandbox ? 'sandbox' : 'live'
//     ]);

//     return $apiContext;
// }








?>