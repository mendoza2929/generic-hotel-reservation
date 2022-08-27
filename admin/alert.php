<?php 


    // frontend data
    define('SITE_URL','http://127.0.0.1/klc/');
    define('FEATURES_IMG_PATH',SITE_URL.'img/features/');


     // backend data
    define('UPLOAD_IMAGE_PATH',$_SERVER['DOCUMENT_ROOT'].'/klc/img/');
    define('FEATURES_FOLDER','features/');

    




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


function uploadSVGImage($image,$folder){
    $valid_mime =['image/svg+xml'];
    $img_mime=$image['type'];
    
    if(!in_array($img_mime,$valid_mime)){
        return 'inv_img'; //invalid image mime or format not supported
    }
    else if(($image['size']/(1024*1024))>1){
        return 'inv_size'; //invalid size greater than 1mb
    }
    else{
        $ext= pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname='IMG_'.random_int(11111,99999).".$ext";

        $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
        if(move_uploaded_file($image['tmp_name'],$img_path)){
            return $rname;
        }
        else{
            return 'upd_failed'; //
        }
    }

}



?>