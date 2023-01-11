<?php

require('admin/db.php');
require('admin/alert.php');


require 'config.php';

include_once 'dbconnection.php';


date_default_timezone_set("Asia/Manila");


session_start();

if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
    redirect('index.php');


}   

if(isset($_POST['pay_now'])){


    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");

    // $checkSum = "";

    $ORDER_ID = 'ORD_'.$_SESSION['uId'].random_int(11111,9999999);
    $CUST_ID = $_SESSION['uId'];
    $TXN_AMOUNT = $_SESSION['room']['payment'];

    
  


    // $paramList = array();
    // $paramList["ORDER_ID"] = $ORDER_ID;
    // $paramList["CUST_ID"] = $ORDER_ID;
    // $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;

    // $checkSum = getChecksumFromArray($paramList,PAYPAL_ID);

    $frm_data =filteration($_POST);

    $query1 = "INSERT INTO `booking_order` (`user_id`, `room_id`, `check_in`, `check_out`, `order_id`,`booking_status`) VALUES (?,?,?,?,?,'booked')";

    insert($query1,[$CUST_ID,$_SESSION['room']['id'],$frm_data['checkin'],$frm_data['checkout'],$ORDER_ID],'issss');
    

    $booking_id = mysqli_insert_id($con);
    

    $query2 = "INSERT INTO `booking_details`(`booking_id`, `room_name`, `price`, `total_pay`, `user_name`, `phonenum`, `address`) 
    VALUES (?,?,?,?,?,?,?)";

    insert($query2,[$booking_id,$_SESSION['room']['name'],$_SESSION['room']['price'],$TXN_AMOUNT,$frm_data['name'],$frm_data['phonenum'],$frm_data['address']],'issssss');


  



 }


 


?>



<html>

<head>
    <title>Proccessing</title>

</head>
    
    <body>
        <h1>Please do not refresh this page...</h1>

        <form action="<?php echo PAYPAL_URL;?>" name="f1">

         <!-- Identify your bussiness so that you can collect the payment -->
         <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

<!-- Specify a buy now button -->
<input type="hidden" name="cmd" value="_xclick">

<input type="hidden" name="item_name" value="<?php echo $CUST_ID; ?>">
<input type="hidden" name="item_number" value="<?php echo  $ORDER_ID; ?>">
<input type="hidden" name="amount" value="<?php echo $TXN_AMOUNT; ?>">
<input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">



<!-- Specify URLs -->
<input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
<input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">


    
    </form>

    <script type="text/javascript">
        document.f1.submit();
    </script>

    </body>

</html>






