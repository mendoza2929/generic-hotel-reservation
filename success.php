<?php

require('admin/db.php');
require('admin/alert.php');


include_once 'config.php';

include_once 'dbconnection.php';



date_default_timezone_set("Asia/Manila");


session_start();

if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
    redirect('index.php');


}   

if(isset($_POST['pay_now'])){
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

    $query1 = "INSERT INTO `booking_order`(`user_id`, `room_id`, `check_in`, `check_out`, `order_id`) VALUES (?,?,?,?,?)";

    insert($query1,[$CUST_ID,$_SESSION['room']['id'],$frm_data['checkin'],$frm_data['checkout'],$ORDER_ID],'issss');

    $booking_id = mysqli_insert_id($con);

    $query2 = "INSERT INTO `booking_details`(`booking_id`, `room_name`, `price`, `total_pay`, `user_name`, `phonenum`, `address`) 
    VALUES (?,?,?,?,?,?,?)";

    insert($query2,[$booking_id,$_SESSION['room']['name'],$_SESSION['room']['price'],$TXN_AMOUNT,$frm_data['name'],$frm_data['phonenum'],$frm_data['address']],'issssss');



 }


 if(!empty($_GET['item_book']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) && !empty($_GET['st'])){

    $item_book = $_GET['item_book'];
    $txn_id  = $_GET['tx'];
    $payment_gross = $_GET['amt'];
    $currency_code = $_GET['cc'];
    $payment_status = $_GET['st'];
    
    $productResult = $con->query("SELECT * FROM `booking_details` WHERE sr_no = ".$item_book);
    $productRow = $productResult->fetch_assoc();


    $prevPaymentResult = $con->query("SELECT * FROM `booking_order` WHERE  trans_id = '".$txn_id."'");
    

    if($prevPaymentResult->num_rows > 0){
        $paymentRow= $prevPaymentResult->fetch_assoc();
        $payment_id = $paymentRow['booking_id'];
        $payment_gross = $paymentRow['trans_amt'];
        $payment_status= $paymentRow['trans_status'];
    }
    
 }





?>


<html>
    <head>
        <title>Processing</title>
    </head>
    <body>
        <h1>Please do not refresh this page...</h1>
        <form method="POST" action="<?php echo PAYPAL_URL;?>" name="f1">
        <input type="hidden" name="business" value="<?php echo PAYPAL_ID;?>">
        
        <input type="hidden" name="cmd" value="_xclick">
                  <!--- Specify URLS-->
         <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL?>"> 
         <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL?>"> 
    </form>



    <div class="container">
        <div class="status">
            <?php 
            
            if(!empty($payment_id)){ ?>

            <h4>Payment Information</h4>
            <p><b>Reference Number:</b><?php echo $payment_id; ?></p>
            <p><b>Transcation ID:</b><?php echo $txn_id; ?></p>
            <p><b>Paid Amount:</b><?php echo $payment_id; ?></p>
            <p><b>Reference Number:</b><?php echo $payment_gross; ?></p>
            <p><b>Payment Status:</b><?php echo $payment_status; ?></p>
            

            <h4>Reservation Information</h4>
            <p><b>Name:</b><?php echo $CUST_ID ?></p>
            <p><b>Room Price:</b><?php echo $TXN_AMOUNT ?></p>
            
            <?php } else { ?>
                <h1 class="error">Your Payment has failed</h1>
            <?php } ?>
          
         
        </div>
        <a href="index.php" class="btn-link">Back to Room Reservation</a>
    </div>









    <script type="text/javascript">
        document.f1.submit();
    </script>
    </body>
</html>





