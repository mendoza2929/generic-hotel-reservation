<?php


define('PAYPAL_ID','adminklc@business.example.com');
define('PAYPAL_SANDBOX', TRUE);


define('PAYPAL_RETURN_URL','http://localhost/success.php');
define('PAYPAL_CANCEL_URL','http://localhost/cancel.php');
define('PAYPAL_CURRENCY','PHP');


//database

define('DB_HOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','klc');


define('PAYPAL_URL',(PAYPAL_SANDBOX == true)? "https:www.sandbox.paypal.com/cgi-bin/webscr" : "https://www.paypal.com/cgi-bin/webscr");









?>