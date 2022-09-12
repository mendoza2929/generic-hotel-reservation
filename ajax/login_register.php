<?php 

require('../admin/db.php');
require('../admin/alert.php');
require('../sendgrid-php/sendgrid-php.php');


function send_Mail($uemail,$name,$token){
    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom("reuelmendoza29@gmail.com", "KLC HOMES");
    $email->setSubject("Account Verfication Link");

    $email->addTo($uemail,$name);

  
    $email->addContent(
        "text/html", "Click the link to Confirm  your email <br> <a href='".SITE_URL."email_confirm.php?email=$uemail&toke=$token"."'>Click Here</a>"
    );

    $sendgrid = new \SendGrid(SENDGRID_API_KEY);
    
    try{
        $sendgrid->send($email);
        return 1;
    }catch (Exception $e){
        return 0;
    }
}


if(isset($_POST['register'])){      
    $data = filteration($_POST);

    //match password and confirm password

    if($data['pass'] != $data['cpass']){
        echo'password_mismatch';
        exit;
    }

    // check user if exist 

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? AND `phonenum`=? LIMIT 1",[$data['email'],$data['phonenum']],'ss');

    if(mysqli_num_rows($u_exist)!=0){
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo($u_exist_fetch['email'] == $data['email'])? 'email_already' : 'phone_already';
        exit;
    }

    //upload user image to server

    // $img = uploadUserImage($_FILES['profile']);

    // if($img == 'inv_img'){
    //     echo 'inv_img';
    //     exit;
    // }else if($img == 'upd_failed'){
    //     echo 'upd_failed';
    //     exit;
    // }

    // send comfirmation link to the users email
    $token = bin2hex(random_bytes(16));

    if(!send_Mail($data['email'],$data['name'],$token)){
        echo "mail_failed";
        exit;
    }

    $enc_pass = password_hash($data['pass'],PASSWORD_BCRYPT);

    $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `password` , `token`) VALUES (?,?,?,?,?,?)"; // insert `profile`

    $values = [$data['name'],$data['email'],$data['address'],$data['phonenum'],$enc_pass,$token]; //$img insert before phonenum

    if(insert($query,$values,'ssssss')){
        echo 1;
    }else {
        echo 'ins_failed';
    }




      
}










?>