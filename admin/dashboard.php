<?php 

require("alert.php");
require("db.php");
adminLogin();
// session_regenerate_id(true);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation - DASHBOARD</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class="bg-light">
 

  <?php require('header.php');
  
  $is_shutdown = mysqli_fetch_assoc(mysqli_query($con,"SELECT `shutdown` FROM `settings`"));

  $current_bookings = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(CASE WHEN booking_status='booked' AND arrival=0 THEN 1 END) AS `new_bookings`, COUNT(CASE WHEN booking_status='cancelled' AND refund=0 then 1 END) AS `refund_bookings` FROM `booking_order`"));
  
  $unread_queries = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(sr_no) AS `count` FROM `user_queries` WHERE `seen`=0"));
 
  $unread_reviews = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(sr_no) AS `count` FROM `rating_review` WHERE `seen`=0"));


  $current_user = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(id) AS `total`, COUNT(CASE WHEN `status`=1 THEN 1 END) AS `active`, COUNT(CASE WHEN `status`=0  then 1 END) AS `inactive`, COUNT(CASE WHEN `is_verified`=0  then 1 END) AS `unverified` FROM `user_cred`"));

  
  ?>

    <div class="container-fluid" id="main-content">
      <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h3><i class="bi bi-people"></i> Dashboard</h3>
            <?php 
            if($is_shutdown['shutdown']){
              echo<<<data
              <h6 class="badge bg-danger py-2 px-3">Shutdown Mode is Active!</h6>
              data;
            }
            ?>
            
          </div>
          
            <div class="row mb-4">
              <div class="col-md-3 mb-4">
                  <a href="new_bookings.php" class="text-decoration-none">
                    <div class="card text-center p-3 text-success">
                        <h5><i class="bi bi-house-add"></i> New Reservation</h5>
                        <h1 class="mt-2 mb-0"><?php echo $current_bookings['new_bookings'] ?></h1>
                    </div>
                  </a>
              </div>
              <div class="col-md-3 mb-4">
                  <a href="#" class="text-decoration-none">
                    <div class="card text-center p-3 text-success">
                        <h5><i class="bi bi-emoji-expressionless"></i> Refund Booking</h5>
                        <h1 class="mt-2 mb-0"><?php echo $current_bookings['refund_bookings'] ?></h1>
                    </div>
                  </a>
              </div>
              <div class="col-md-3 mb-4">
                  <a href="user_queries.php" class="text-decoration-none">
                    <div class="card text-center p-3 text-success">
                        <h5><i class="bi bi-chat"></i> User Inquiry</h5>
                        <h1 class="mt-2 mb-0"><?php echo $unread_queries['count']?></h1>
                    </div>
                  </a>
              </div>
              <div class="col-md-3 mb-4">
                  <a href="rating_reviews.php" class="text-decoration-none">
                    <div class="card text-center p-3 text-success">
                        <h5><i class="bi bi-chat-square-heart"></i> Rate & Review</h5>
                        <h1 class="mt-2 mb-0"><?php echo $unread_reviews['count']?></h1>
                    </div>
                  </a>
              </div>
            </div>


            <div class="d-flex align-items-center justify-content-between mb-3">
            <h5><i class="bi bi-journals"></i> Booking Analytics</h5>
            <select class="form-select shadow-none bg-light w-auto" onchange="booking_analytics(this.value)">
              <option value="1">Past 30 Days</option>
              <option value="2">Past 90 Days</option>
              <option value="3">Past 1 Year</option>
              <option value="4">All Time</option>
            </select>
          </div>


          <div class="row mb-3">
              <div class="col-md-3 mb-4">
                    <div class="card text-center p-3 text-primary">
                      <h6><i class="bi bi-cash-stack"></i> Total Bookings</h6>
                      <h1 class="mt-2 mb-0" id="total_bookings">5</h1>
                      <h4 class="mt-2 mb-0" id="total_amt"></h4>
                    </div>
              </div>
              <div class="col-md-3 mb-4">
                    <div class="card text-center p-3 text-primary">
                      <h6><i class="bi bi-wallet"></i> Active Bookings</h6>
                      <h1 class="mt-2 mb-0" id="active_bookings">5</h1>
                      <h4 class="mt-2 mb-0" id="active_amt">6</h4>
                    </div>
              </div>
              <div class="col-md-3 mb-4">
                    <div class="card text-center p-3 text-primary">
                      <h6><i class="bi bi-x-square"></i> Cancelled Bookings</h6>
                      <h1 class="mt-2 mb-0" id="cancelled_bookings">5</h1>
                      <h4 class="mt-2 mb-0" id="cancelled_amt">₱ 5</h4>
                    </div>
              </div>
            </div>


            <div class="d-flex align-items-center justify-content-between mb-4">
            <h5><i class="bi bi-chat-right-heart"></i> User, Inquiry , Review Analytics</h5>
            <select class="form-select shadow-none bg-light w-auto" onchange="user_analytics(this.value)">
              <option value="1">Past 30 Days</option>
              <option value="2">Past 90 Days</option>
              <option value="3">Past 1 Year</option>
              <option value="4">All Time</option>
            </select>
          </div>  

          <div class="row mb-3">
              <div class="col-md-3 mb-4">
                    <div class="card text-center p-3 text-secondary">
                      <h6><i class="bi bi-cash-stack"></i> New Registration</h6>
                      <h1 class="mt-2 mb-0" id="total_new_reg">5</h1>
                 
                    </div>
              </div>
              <div class="col-md-3 mb-4">
                    <div class="card text-center p-3 text-secondary">
                      <h6><i class="bi bi-wallet"></i> Inquiry</h6>
                      <h1 class="mt-2 mb-0" id="total_queries">5</h1>
               
                    </div>
              </div>
              <div class="col-md-3 mb-4">
                    <div class="card text-center p-3 text-secondary">
                      <h6><i class="bi bi-x-square"></i> Reviews</h6>
                      <h1 class="mt-2 mb-0" id="total_review">5</h1>
                 
                    </div>
              </div>
            </div>

            <h5><i class="bi bi-people"></i> Users</h5>
            <div class="row mb-3">
              <div class="col-md-3 mb-4">
                    <div class="card text-center p-3 text-primary">
                      <h6><i class="bi bi-person-check"></i> Total</h6>
                      <h1 class="mt-2 mb-0"><?php echo $current_user['total']?></h1>
                 
                    </div>
              </div>
              <div class="col-md-3 mb-4">
                    <div class="card text-center p-3 text-success">
                      <h6><i class="bi bi-person-lock"></i> Active</h6>
                      <h1 class="mt-2 mb-0"><?php echo $current_user['active']?></h1>
               
                    </div>
              </div>
              <div class="col-md-3 mb-4">
                    <div class="card text-center p-3 text-danger">
                      <h6><i class="bi bi-person-x"></i> Unvarified</h6>
                      <h1 class="mt-2 mb-0"><?php echo $current_user['unverified']?></h1>
                 
                    </div>
              </div>
            </div>



        </div>
      </div>
    </div>


 <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>   


<script>




function booking_analytics(period=1){
        
    let xhr = new XMLHttpRequest();
        xhr.open("POST","dashboard/dashboard_ajax.php",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onload = function(){
            let data = JSON.parse(this.responseText);
            document.getElementById('total_bookings').textContent = data.total_bookings;
            document.getElementById('total_amt').textContent = '₱'+ data.total_amt;

            document.getElementById('active_bookings').textContent = data.active_bookings;
            document.getElementById('active_amt').textContent = '₱'+ data.active_amt;

            document.getElementById('cancelled_bookings').textContent = data.cancelled_bookings;
            document.getElementById('cancelled_amt').textContent = '₱'+ data.cancelled_amt;
        }
        xhr.send('booking_analytics&period='+period);

}




function user_analytics(period=1){
        
        let xhr = new XMLHttpRequest();
            xhr.open("POST","dashboard/dashboard_ajax.php",true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    
            xhr.onload = function(){
                let data = JSON.parse(this.responseText);
                document.getElementById('total_new_reg').textContent = data.total_new_re;
        
    
                document.getElementById('total_queries').textContent = data.total_queries;
      
    
                document.getElementById('total_review').textContent = data.total_review;
                
            }
            xhr.send('user_analytics&period='+period);
    
    }
    



    window.onload = function(){
      booking_analytics();
      user_analytics();
    }


    




</script>











</body>
</html>