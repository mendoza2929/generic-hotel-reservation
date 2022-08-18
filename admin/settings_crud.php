

<?php 

    require("db.php");
    require("alert.php");
    adminLogin();


if(isset($_POST['get_general']))
{
    $q = "SELECT * FROM `settings` WHERE `sr_no`=?";
    $values = [2];
    $res = select($q, $values,"i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;
}


?>