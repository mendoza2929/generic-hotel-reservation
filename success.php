<?php

require('admin/db.php');
require('admin/alert.php');


include_once 'config.php';

include_once 'dbconnection.php';



date_default_timezone_set("Asia/Manila");


session_start();
UNSET($_SESSION['ROOM']);

if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
    redirect('index.php');


}   




    FUNCTION REGENERATE_SESSION($UID){
    $USER_Q=SELECT("SELECT * FROM `USER_CRED` WHERE `ID`=? LIMIT 1",[$UID],'I');
    $USER_FETCH = MYSQLI_FETCH_ASSOC($USER_Q);

  $_SESSION['LOGIN']=TRUE;
    $_SESSION['UID']= $USER_FETCH['ID'];
     $_SESSION['UNAME'] =$USER_FETCH['NAME'];
      $_SESSION['UPHONE']= $USER_FETCH['PHONENUM'];
} 

// header("Pragma: no-cache");
// header("Cache-Control: no-cache");
// header("Expires: 0");

   $ORDER_ID = 'ORD_'.$_SESSION['uId'].random_int(11111,9999999);
    $CUST_ID = $_SESSION['uId'];
    $TXN_AMOUNT = $_SESSION['room']['payment'];
    
     //$slct_query = "SELECT `booking_id` , `user_id` FROM `booking_order` WHERE `order_id`='$_POST[ORDERID]'";




if(isset($_GET['PayerID'])){
     $slct_query = "SELECT `booking_id` , `user_id` FROM `booking_order` WHERE `order_id`='$_POST[ORDERID]'";
    redirect('pay_status.php?order='.$ORDER_ID);

}else{
    echo "<h1>failed</h1>";
}
session_destroy();

?>


