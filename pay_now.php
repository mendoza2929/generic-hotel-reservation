<?php
define('PAYPAL_ID','');
define('PAYPAL_SANDBOX', TRUE);


define('PAYPAL_URL',(PAYPAL_SANDBOX == true)? "https:www.sandbox.paypal.com/cgi-bin/webscr" : "https://www.paypal.com/cgi-bin/webscr");


?>