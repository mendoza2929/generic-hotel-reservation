<?php
/* 
PayPal Setting and Database configuration
*/

//Paypal Settings and Configuration
define('PAYPAL_ID','adminklc@business.example.com');
define('PAYPAL_SANDBOX', TRUE); //TRUE OR FALSE

define('PAYPAL_RETURN_URL','https://generichotel.online/klc/success.php');
define('PAYPAL_CANCEL_URL','https://generichotel.online/klc/cancel.php');
define('PAYPAL_NOTIFY_URL','https://generichotel.online/klc/ipn.php');
define('PAYPAL_CURRENCY','PHP');

//Database Configuration
define('DB_HOST','localhost');
define('DB_USERNAME','u964845835_hotel');
define('DB_PASSWORD','Generichotel27');
define('DB_NAME','u964845835_klc');

//Change Not Required
define('PAYPAL_URL', (PAYPAL_SANDBOX == true) ? "https://www.sandbox.paypal.com/cgi-bin/webscr" : "https://www.paypal.com/cgi-bin/webscr");












?>