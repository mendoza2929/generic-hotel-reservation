<?php

require('admin/db.php');
require('admin/alert.php');


include_once 'config.php';

include_once 'dbconnection.php';



date_default_timezone_set("Asia/Manila");


session_start();
unset($_SESSION['room']);

function regenerate_session($uid){
    $user_q=select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1",[$uid],'i');
    $user_fetch = mysqli_fetch_assoc($user_q);

    $_SESSION['login']=true;
    $_SESSION['uId']= $user_fetch['id'];
    $_SESSION['uName'] =$user_fetch['name'];
     $_SESSION['uPhone']= $user_fetch['phonenum'];
} 

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// $isValidCheckSum = "FALSE";

// $paytmCheckSum="";
// $paramList= $_POST;

// $paytmCheckSum = isset($_POST["return"]) ? $_POST["return"] : "";

// $isValidCheckSum = PAYPAL_RETURN_URL;





// if($isValidCheckSum == "TRUE"){

    
// $slct_query = "SELECT `booking_id` , `user_id` FROM `booking_order` WHERE `order_id`='$_POST[ORDERID]'";

// $slct_res = mysqli_query($con,$slct_query);

// if(mysqli_num_rows($slct_res)==0){
//     redirect('index.php');

// }

// $slct_fetch = mysqli_fetch_assoc($slct_res);

// if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
//     regenerate_session($slct_fetch['user_id']);
// }
    
// if ($_POST["STATUS"] == "TXN_SUCCESS"){
//     $upd_query = "UPDATE `booking_order` SET  `booking_status`='booked',`trans_id`='$_POST[TXNID]',`trans_amt`='$_POST[TNXAMOUNT]',`trans_status`='$_POST[STATUS]',`trans_res_msg`='$_POST[RESPMSG]', WHERE `booking_id`='$slct_fetch[booking_id]'";


//     mysqli_query($con,$upd_query);


// }else{
//     $upd_query = "UPDATE `booking_order` SET  `booking_status`='payment failed',`trans_id`='$_POST[TXNID]',`trans_amt`='$_POST[TNXAMOUNT]',`trans_status`='$_POST[STATUS]',`trans_res_msg`='$_POST[RESPMSG]', WHERE `booking_id`='$slct_fetch[booking_id]'";

//     mysqli_query($con,$upd_query);
// }
//     redirect('pay_status.php?order='.$_POST['ORDERID']);
// }
// else{
//     redirect('index.php');
// }








// // If transaction data is available in the URL 
// if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 
//     // Get transaction information from URL 
//     $item_number = $_GET['item_number'];  
//     $txn_id = $_GET['tx']; 
//     $payment_gross = $_GET['amt']; 
//     $currency_code = $_GET['cc']; 
//     $payment_status = $_GET['st']; 
     
//     // Get product info from the database 
//     $productResult = $db->query("SELECT * FROM `booking_details` WHERE sr_no = ".$item_number); 
//     $productRow = $productResult->fetch_assoc(); 
     
//     // Check if transaction data exists with the same TXN ID. 
//     $prevPaymentResult = $db->query("SELECT * FROM `booking_order` WHERE  trans_id = '".$txn_id."'"); 
 
//     if($prevPaymentResult->num_rows > 0){ 
//         $paymentRow = $prevPaymentResult->fetch_assoc(); 
//         $payment_id = $paymentRow['booking_id']; 
//         $payment_gross = $paymentRow['trans_amt']; 
//         $payment_status = $paymentRow['trans_status']; 
//     }else{ 
//         // Insert tansaction data into the database 
//         $insert = $db->query("INSERT INTO `booking_order`(`user_id`, `trans_id`, `trans_amt`,`currency`,`trans_status`) VALUES('".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."')"); 
//         $payment_id = $db->insert_id; 
//     } 
// } 

// Once the transaction has been approved, we need to complete it.
// if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
//     $transaction = $gateway->completePurchase(array(
//         'payer_id'             => $_GET['PayerID'],
//         'transactionReference' => $_GET['paymentId'],
//     ));
//     $response = $transaction->send();
 
//     if ($response->isSuccessful()) {
//         // The customer has successfully paid.
//         $arr_body = $response->getData();
 
//         $payment_id = $arr_body['booking_id'];
//         $payer_id = $arr_body['user_id'];
//         // $payer_email = $arr_body['payer']['payer_info']['email'];
//         $amount = $arr_body['trans_amt'];
//         $currency = PAYPAL_CURRENCY;
//         $payment_status = $arr_body['trans_status'];
 
//         $db->query("INSERT INTO `booking_order`(`booking_id`, `user_id`, `trans_amt`, `trans_status`, `currency`) VALUES('". $payment_id ."', '". $payer_id ."', '". $amount ."', '". $currency ."', '". $payment_status ."')");
 
//         echo "Payment is successful. Your transaction id is: ". $payment_id;
//     } else {
//         echo $response->getMessage();
//     }
// } else {
//     echo 'Transaction is declined';
// }
?>

