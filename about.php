

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
    <title>KLC HOMES - About Us</title>
    <link rel = "stylesheet" href="./style.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
      
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="css/index.css"/>

</head>

<body class="bg-light">
<?php 

$home_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
$values = [1];
$home_r = mysqli_fetch_assoc(select($home_q, $values,'i'));

?>

    <nav class="navbar navbar-expand-lg bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3" href="index.php"><i class="bi bi-house-fill"></i> <?php echo $home_r['site_title']?></a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active me-3" aria-current="page" href="index.php">Home</a>
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


    <!----ABOUT MAIN--->

    <?php 

$home_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
$values = [1];
$home_r = mysqli_fetch_assoc(select($home_q, $values,'i'));

?>
    

    <div class="my-5 px-4">
        <div class="h2 fw-bold text-center">ABOUT US</div>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3"> 
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-mb-5 mb-4 order-lg-1 order-mb-1 order-2">
                <h3 class="mb-3">KLC HOMES</h3>
                <h5> <?php echo $home_r['site_about']?>  </h5>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-1 order-mb-2 order-1">
                <img src="./img/b3.jpg" class="w-100" alt="">
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
      <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form>
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
                    <input type="text" class="form-control shadow-none">
                  </div>
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control shadow-none">
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="number" class="form-control shadow-none">
                  </div>
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Picture</label>
                    <input type="file" class="form-control shadow-none">
                  </div>
                  <div class="col-md-12 p-0 mb-3">
                    <label class="form-label">Address</label>
                    <textarea class="form-control shadow-none" rows="3" style="resize: none;"></textarea>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control shadow-none">
                  </div>
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control shadow-none">
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

</body>
</html>