
<?php 

require("db.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin KLC</title>
    <!-- CSS only -->
<link rel="stylesheet" href="index.css" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class="bg-light">
    
    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST" >
            <h4 class="bg-dark text-white py-3 ">Admin KLC</h4>
            <div class="p-4">
                <div class="mb-3">
                   
                    <input name="admin_name" required type="email" class="form-control shadow-none text-center" placeholder="Email" > 
                </div>
                <div class="mb-4">
       
                    <input name="admin_pass" required   type="password" class="form-control shadow-none text-center" placeholder="Password" >
                </div>
                <button name="login"type="submit" class="btn-primary text-black custom-bg shadow-none" >Login</button>
            </div>
        </form>
    </div>


    <?php 
    
    
    
    if(isset($_POST['login']))
    
    {
        $frm_data=filteration($_POST);
        
        $query = "SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass`=? " ;
        $values = [$frm_data['admin_name'],$frm_data['admin_pass']];
       

        select($query,$values,"ss");
    }
    
    ?>




<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>