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


    $slct_query = "SELECT `booking_id` , `user_id` FROM `booking_order` WHERE `order_id`='$_POST[ORDERID]'";
    redirect('pay_status.php?order='.$ORDER_ID);
// $slct_query = "SELECT `booking_id` , `user_id` FROM `booking_order` WHERE `order_id`='$_POST[ORDERID]'";

// $slct_res = mysqli_query($con,$slct_query);

// if(mysqli_num_rows($slct_res)==0){
//     redirect('index.php');

// }

// $slct_fetch = mysqli_fetch_assoc($slct_res);

// if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
//     regenerate_session($slct_fetch['user_id']);
// }
    

//     $upd_query = "UPDATE `booking_order` SET  `booking_status`='booked' WHERE `booking_id`='$slct_fetch[booking_id]'";
//     mysqli_query($con,$upd_query);




//     $upd_query = "UPDATE `booking_order` SET  `booking_status`='booked',`trans_id`='$_POST[TXNID]',`trans_amt`='$_POST[TNXAMOUNT]',`trans_status`='$_POST[STATUS]',`trans_res_msg`='$_POST[RESPMSG]', WHERE `booking_id`='$slct_fetch[booking_id]'";


//     mysqli_query($con,$upd_query);

       
// $slct_query = "SELECT `booking_id` , `user_id` FROM `booking_order` WHERE `order_id`='$_POST[ORDERID]'";

// $slct_res = mysqli_query($con,$slct_query);

// if(mysqli_num_rows($slct_res)==0){
//     redirect('index.php');

// }

// $slct_fetch = mysqli_fetch_assoc($slct_res);

// if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
//     regenerate_session($slct_fetch['user_id']);
// }




 }


 

//  if (empty($_POST['item_number'])) {
//     throw new Exception('This script should not be called directly, expected post data');
// }


// $payer = new Payer();
// $payer->setPaymentMethod('paypal');

// // Set some example data for the payment.
// $currency = 'PHP';
// // $item_qty = 1;
// $amountPayable = $_POST['amount'];
// $product_name = $_POST['item_name'];
// $item_code = $_POST['item_number'];
// $description = 'Paypal transaction';
// $invoiceNumber = uniqid();
// $my_items = array(
// 	array('name'=> $product_name, 'quantity'=> $item_qty, 'price'=> $amountPayable, 'sku'=> $item_code, 'currency'=> $currency)
// );
	
// $amount = new Amount();
// $amount->setCurrency($currency)
//     ->setTotal($amountPayable);

// $items = new ItemList();
// $items->setItems($my_items);
	
// $transaction = new Transaction();
// $transaction->setAmount($amount)
//     ->setDescription($description)
//     ->setInvoiceNumber($invoiceNumber)
// 	->setItemList($items);

// $redirectUrls = new RedirectUrls();
// $redirectUrls->setReturnUrl($paypalConfig['return_url'])
//     ->setCancelUrl($paypalConfig['cancel_url']);

// $payment = new Payment();
// $payment->setIntent('sale')
//     ->setPayer($payer)
//     ->setTransactions([$transaction])
//     ->setRedirectUrls($redirectUrls);

// try {
//     $payment->create($apiContext);
// } catch (Exception $e) {
//     throw new Exception('Unable to create link for payment');
// }

// header('location:' . $payment->getApprovalLink());
// exit(1);


?>





