<?php 


    function adminLogin(){
        session_start();
        if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
            echo "
            <script>window.location.href='index.php';</script>
             ";
             exit;
        }
        
    }




    function redirect($url){
        echo "
            <script>window.location.href='$url';</script>
        ";
        exit;
    }



function alert($type, $message){
    $bs_class = ($type == 'success') ? "alert-success" : "alert-danger";
    echo <<<alert


        <div class="alert $bs_class alert-dismissible fade show text-center custom-alert" role="alert">
        <strong class="m-3">$message</strong>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>


        alert;
}



?>