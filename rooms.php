

<?php 

require('admin/db.php');
require('admin/alert.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KLC HOMES - Rooms</title>
    <link rel = "stylesheet" href="mains.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
      
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body class="bg-light">
<?php 

$home_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
$values = [1];
$home_r = mysqli_fetch_assoc(select($home_q, $values,'i'));

?>

    <nav class="navbar navbar-expand-lg bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3" href="index.php"><i class="bi bi-house-fill"></i><?php echo $home_r['site_title']?></a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active me-3 fw-bold" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link me-3 fw-bold" href="rooms.php">Rooms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-3 fw-bold" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-3 fw-bold" href="contact.php">Contact Us</a>
            </li>
    
          </ul>
          <div class="d-flex">
          <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
          <i class="bi bi-box-arrow-in-right"></i> Login
          </button>
          </div>
        </div>
      </div>
    </nav>



    

    <div class="my-5 px-4">
        <div class="h2 fw-bold text-center">Our Rooms</div>
        <div class="h-line bg-dark"></div>
    </div>


    <div class="container">
        <div class="row">
     <div class="col-lg-3 col-mb-12 mb-4 mb-lg-0 ps-4">
   <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow shadow-sm">
  <div class="container-fluid flex-lg-column align-items-stretch">
  <h5 class="mt-2 text-center" style="font-size:18px;">Check Availability</h5>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filter" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse align-items-stretch mt-2 flex-column" id="filter">
      <div class="border bg-light p-3 rounded mb-3 mt-2">
        <h5 class="mb-3" style="font-size:18px;">Check Availability</h5>
        <label class="form-label">Check-in</label>
        <input type="date" class="form-control shadow-none mb-3">
        <label class="form-label">Check-out</label>
        <input type="date" class="form-control shadow-none">
      </div>
      <div class="border bg-light p-3 rounded mb-3 mt-2" >
        <h5 class="mb-3" style="font-size:18px;">Guest</h5>
        <div class="d-flex">
        <div class="me-3">
          <label class="form-label">Adults</label>
          <input type="number" class="form-control shadow-none">
        </div>
        <div>
          <label class="form-label">Children</label>
          <input type="number" class="form-control shadow-none">
        </div>
        </div>
      </div>
    </div>
  </div>
</nav>
  </div>

    <div class="col-lg-9 col-mb-12 px-4">

    <?php 
    
    $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=?",[1,0],'ii');

    while($room_data = mysqli_fetch_assoc($room_res)){

      //get Facilities room

      $fac_q = mysqli_query($con,"SELECT f.name FROM `features` f INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id WHERE rfac.room_id = '$room_data[id]'");

      $facilities_data = "";
      while($fac_row = mysqli_fetch_assoc($fac_q)){
        $facilities_data.=" <span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
        $fac_row[name]
        </span>";
      }
     

            //get Images room

        $room_thumb = ROOM_IMG_PATH."360_F_349457338_PLFgcgC2C0NFoEajYw45kfVo6hkJDp7S.jpg";
        $thumb_q = mysqli_query($con,"SELECT * FROM `room_images` WHERE `room_id`='$room_data[id]' AND `thumb`='1'");

        if(mysqli_num_rows($thumb_q) > 0){
          $thumb_res = mysqli_fetch_assoc($thumb_q);
          $room_thumb = ROOM_IMG_PATH.$thumb_res['image'];
        }

        echo<<<data
        
        <div class="card mb-4 border-0 shadow">
          <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
               <img src="$room_thumb"class="img-fluid rounded" style="width:90%" ">
            </div>
              <div class="col-md-5 px-lg-3 px-mb-3 px-0">
                <h4 class="mb-5 mt-2 text-center fw-bold">$room_data[name]</h4>
                <div class="features mb-3">
                <h6 class="mb-1">Facilities</h6>
                  $facilities_data
                </div>
                <div class="guests">
                  <h6 class="mb-1">Guests</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    $room_data[adult] Adults
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    $room_data[children] Children
                  </span>
                </div>
              </div>
              <div class="col-md-2 text-center mt-lg-0 mt-md-0 mt-4">
              <h6 class="mb-4">₱$room_data[price] per night</h6>
              <a href="#" class="btn btn-success w-100 text-white shadow-none mb-2">Book Now!</a>
              <a href="room_details.php?id=$room_data[id]" class="btn btn-outline-dark  w-100 shadow-none">More Details</a>
              </div>
          </div>
        </div>

        data;



    }

    
    ?>






    </div>
   </div>
  </div>

  <?php 

$contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
$values = [1];
$contact_r = mysqli_fetch_assoc(select($contact_q, $values,'i'));
// print_r($contact_r);
?>


    <!----Footer--->

  <div class="container-fluid bg-white mt-5">
    <div class="row">
      <div class="col-lg-4 p-4">
        <h3 class="fw-bold fs-3 mb-4">KLC HOMES</h3>
                <p>KLC Homes
        Calle San Pedro, Zone 1
        Ayala Zamboanga City
      </p>
      </div>
      <div class="col-lg-4 p-4">
        <h5 class="mb-3">Links</h5>
        <a href="index.php" class="d-inline-block mb-2 text-decoration-none text-dark">HOME</a><br>
        <a href="rooms.php" class="d-inline-block mb-2 text-decoration-none text-dark">ROOM</a><br>
        <a href="about.php" class="d-inline-block mb-2 text-decoration-none text-dark">ABOUT US</a><br>
        <a href="contact.php" class="d-inline-block mb-2 text-decoration-none text-dark">CONTACT US</a>

      </div>
      <div class="col-lg-4 p-4">
          <h5 class="mb-3">Follow Us</h5>
          <?php 
                      if($contact_r['fb']!=''){
                        echo<<<data

                        <a href="$contact_r[fb]" target="_blank" class="d-inline-block text-dark fs-5 me-2">
                          <i class="bi bi-facebook me-1"></i>
                        </a>

                        data;
                      }
                    
                    ?>

                    <?php 
                      if($contact_r['insta']!=''){
                        echo<<<data

                        <a href="$contact_r[insta]" target="_blank" class="d-inline-block text-dark fs-5 me-2">
                          <i class="bi bi-instagram me-1"></i>
                        </a>

                        data;
                      }
                    
                    ?>

                  <?php 
                      if($contact_r['tw']!=''){
                        echo<<<data

                        <a href="$contact_r[tw]" target="_blank" class="d-inline-block text-dark fs-5 me-2">
                          <i class="bi bi-twitter me-1"></i>
                        </a>

                        data;
                      }
                    
                    ?>
      </div>
    </div>
  </div>

  <h6 class="text-center bg-dark text-white p-3m m-0">Designed and Develop by KLC HOMES TEAM</h6>


 <!-- Login Modal -->
 <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form>
            <div class="modal-header">
              <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-check-fill fs-3 me-2"></i>User login</h5>
              <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control shadow-none">
                </div>
                <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" class="form-control shadow-none">
                </div>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="submit" class="btn btn-success mb-2">Login</button>
                  <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Don't Have an Account?</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
 


      <!-- Register Modal -->
      -<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="register-form">
            <div class="modal-header">
              <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-plus-fill fs-3 me-2"></i></i>User Registration</h5>
              <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="text-center">
              <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base ">
                Note: Your Details must match with your ID that will be required  during check-in.
              </span>
              </div>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control shadow-none" required name="name">
                  </div>
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control shadow-none" required name="email">
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="number" class="form-control shadow-none" required name="phonenum">
                  </div>
                  <!--<div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Picture</label>
                    <input type="file" class="form-control shadow-none" accept=".jpg, .jpeg, .png, .webp" name="profile">
                  </div>-->
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control shadow-none" required name="address">
                   <!-- <textarea class="form-control shadow-none" name="address" rows="3" style="resize: none;" required></textarea>-->
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control shadow-none" required name="pass">
                  </div>
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control shadow-none" required name="cpass">
                  </div>
                </div>
                <div class="text-center my-1">
                  <button type="submit" class="btn btn-success shadow-none">Register</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script>

        
    // function alertRoom(type,message,position='body'){
    //     let bs_class = (type== 'success') ? 'alert-success' : 'alert-danger';
    //     let element = document.createElement('div');
    //     element.innerHTML =`
        
    //     <div class="alert ${bs_class} alert-dismissible fade show text-center " role="alert">
    //     <strong class="m-3">${message}</strong>
    //     <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    //     </div>

        
    //     `;

    //     if(position=='body'){
    //         document.body.append(element);
    //         element.classList.add('room-alert');
    //     }else{
    //         document.getElementById(position).appendChild(element);
    //     }
    //     setTimeout(remAlert,2000);

    // }

    
    // function remAlert(){
    //         document.getElementsByClassName('alert')[0].remove();
//         }


 let register_form = document.getElementById('register-form');

register_form.addEventListener('submit',function(e){
 e.preventDefault();
 add_User();

});


 function add_User(){

          let data = new FormData();
          data.append('name',register_form.elements['name'].value);
          data.append('email',register_form.elements['email'].value);
          data.append('phonenum',register_form.elements['phonenum'].value);
          data.append('address',register_form.elements['address'].value);
          data.append('pass',register_form.elements['pass'].value);
          data.append('cpass',register_form.elements['cpass'].value);
          data.append('register','');

          // var myModalEl = document.getElementById('registerModal')
          //     var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
          //     modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST","./ajax/login_register.php",true);

        var myModalEl = document.getElementById('registerModal')
            var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
            modal.hide();


       xhr.onload = function(){
              if(this.responseText == "password_mismatch"){
                alert('Password mismatch');
              }
              else if(this.responseText == 'email_already'){
                alert('Email Already Exist');
              }
              else if(this.responseText == 'phone_already'){
                alert('Phone Number Already Use');
              }
              else if(this.responseText == 'mail_failed'){
                alert('Cannot send confirmation email');
              }
              else if(this.responseText == 'ins_failed'){
                alert('Registration Failed');
              }
              else{
                Swal.fire(
                'Successfully Registered ',
                'Confirmation link send to your email',
                'success'
              );
                register_form.reset();
              }
            }

            xhr.send(data);


        
          // let xhr = new XMLHttpRequest();
          //   xhr.open("POST","./admin/login_register.php",true);
          

          //   xhr.onload = function(){
          //     if(this.responseText == "password_mismatch"){
          //       alert('Password mismatch');
          //     }
          //     else if(this.responseText == 'email_already'){
          //       alert('Email Already Exist');
          //     }
          //     else if(this.responseText == 'phone_already'){
          //       alert('Phone Number Already Use');
          //     }
          //     else if(this.responseText == 'mail_failed'){
          //       alert('Cannot send confirmation email');
          //     }
          //     else if(this.responseText == 'ins_failed'){
          //       alert('Registration Failed');
          //     }
          //     else{
          //       Swal.fire(
          //       'Successfully Registered ',
          //       'Confirmation link send to your email',
          //       'success'
          //     );
          //       register_form.reset();
          //     }
          //   }

          //   xhr.send(data);

 }
     
     
      // let register_form = document.getElementById('register-form');

      // register_form.addEventListener('submit',(e)=>{
      //     e.preventDefault();

      //     let data = new FormData();

      //     data.append('name',register_form.elements['name'].value);
      //     data.append('email',register_form.elements['email'].value);
      //     data.append('phonenum',register_form.elements['phonenum'].value);
      //     data.append('address',register_form.elements['address'].value);
      //     data.append('pass',register_form.elements['pass'].value);
      //     data.append('cpass',register_form.elements['cpass'].value);
      //     // data.append('profile',register_form.elements['profile'].files[0]);
      //     data.append('register','');


      //       // var myModalEl = document.getElementById('registerModal')
      //       // var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
      //       // modal.hide();

      //       // let xhr = new XMLHttpRequest();
      //       // xhr.open("POST","admin/login_register.php",true);
            

      //   let xhr = new XMLHttpRequest();
      //   xhr.open("POST","admin/login_register.php",true);

      //   xhr.onload = function(){
     
      //       var myModalEl = document.getElementById('registerModal')
      //       var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
      //       modal.hide();

      //       if(this.responseText =='password_mismatch'){
      //       alert('Please enter correct password');
                
      //       }else{
      //           alert('sucesss');
      //       }

      //   }
      //   xhr.send(data);

      //       // xhr.onload = function(){
            //   if(this.responseText == 'password_mismatch'){
            //     Swal.fire({
            //     icon: 'error',
            //     title: 'Oops...',
            //     text: 'Password Incorrect',
                
            //   });
              
            //   }
            //   else if(this.responseText == 'email_already'){
            //     Swal.fire({
            //     icon: 'error',
            //     title: 'Oops...',
            //     text: 'Email already registered',
                
            //   });
                
            //   }
            //   else if(this.responseText == 'phone_already'){
            //     Swal.fire({
            //     icon: 'error',
            //     title: 'Oops...',
            //     text: 'Phone Number is already registered',
                
            //   });
               
            //   }
            //   else if(this.responseText == 'inv_img'){
            //     Swal.fire({
            //     icon: 'error',
            //     title: 'Oops...',
            //     text: 'Only JPG, JPEG , WEBP & PNG images are supported',
                
            //   });
                
            //   }
            //   // else if(this.responseText == 'upd_failed'){
                
            //   //   alertRoom('error',"Image Upload Failed");
            //   // }
            //   else if(this.responseText == 'mail_failed'){
            //     Swal.fire({
            //     icon: 'error',
            //     title: 'Oops...',
            //     text: 'Cannot send confirmation email',
                
            //   });
               
            //   }
            //   else if(this.responseText == 'ins_failed'){
            //     Swal.fire({
            //     icon: 'error',
            //     title: 'Oops...',
            //     text: 'Registration Failed',
                
            //   });
                
            //   }
            //   else{
            //     Swal.fire({
            //   position: 'top-end',
            //   icon: 'success',
            //   title: 'Registration Sucessfully Confirmation link send to your email',
            //   showConfirmButton: false,
            //   timer: 3000
            // })            
            //     register_form.reset();
            //   }
            // }
            // xhr.send(data);  
          // });

     

      </script>






</body>
</html>
