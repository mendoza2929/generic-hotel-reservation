<?php 


$db =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

//display error if failed to connect to database


if($db->connect_error){
    printf("connection failed: %s\n",$db->connect_error);   
}


?>