

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
    <link rel = "stylesheet" href="./index.css" type="text/css"/>
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


    <nav class="navbar navbar-expand-lg bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3" href="index.php">KLC HOMES</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active me-3" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link me-3" href="rooms.php">Rooms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-3" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-3" href="contact.php">Contact Us</a>
            </li>
    
          </ul>
          <div class="d-flex">
          <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
              Login
          </button>
          </div>
        </div>
      </div>
    </nav>


    <!----CONTACT US MAIN--->
    

    <div class="my-5 px-4">
        <div class="h2 fw-bold text-center">Our Rooms</div>
        <div class="h-line bg-dark"></div>
    </div>


    <div class="container">
        <div class="row">
     <div class="col-lg-3 col-mb-12 mb-4 mb-lg-0 px-lg-0">
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
    <div class="card mb-4 border-0 shadow">
  <div class="row g-0 p-3 align-items-center">
    <div class="col-md-5 ">
      <img src="./img/room1.jpg"class="img-fluid rounded" style="width:90%" alt="...">
    </div>
    <div class="col-md-4">
      <h5 class="mb-5 mt-2 text-center">Studio Type</h5>
      <div class="features mb-4">
            <h6 class="mb-1">Amenities</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap  ">
            Monitored with 24/7
            </span>
            <span class="badge rounded-pill bg-light text-dark text-wrap  ">
            With parking area
            </span>
            <span class="badge rounded-pill bg-light text-dark text-wrap  ">
            NO CURFEW
            </span>
            <span class="badge rounded-pill bg-light text-dark text-wrap  ">
            Flood free area
            </span>
          </div>
    </div>
    <div class="col-md-2 text-center mt-lg-0 mt-md-0 mt-4">
    <h6 class="mb-4">₱500 per night</h6>
    <a href="#" class="btn btn-success w-100 text-white shadow-none mb-2">Book Now!</a>
          <a href="#" class="btn btn-outline-dark  w-100 shadow-none">More Details</a>
    </div>
  </div>
</div>
<div class="card mb-4 border-0 shadow">
  <div class="row g-0 p-3 align-items-center">
    <div class="col-md-5">
      <img src="./img/room1.jpg"class="img-fluid rounded" style="width:90%" alt="...">
    </div>
    <div class="col-md-4">
      <h5 class="mb-5">Studio Type</h5>
      <div class="features mb-4">
            <h6 class="mb-1">Amenities</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap  ">
            Monitored with 24/7
            </span>
            <span class="badge rounded-pill bg-light text-dark text-wrap  ">
            With parking area
            </span>
            <span class="badge rounded-pill bg-light text-dark text-wrap  ">
            NO CURFEW
            </span>
            <span class="badge rounded-pill bg-light text-dark text-wrap  ">
            Flood free area
            </span>
          </div>
    </div>
    <div class="col-md-2 text-center">
    <h6 class="mb-4">₱500 per night</h6>
    <a href="#" class="btn btn-success w-100 text-white shadow-none mb-2">Book Now!</a>
          <a href="#" class="btn btn-outline-dark  w-100 shadow-none">More Details</a>
    </div>
  </div>
</div>

<div class="card mb-4 border-0 shadow">
  <div class="row g-0 p-3 align-items-center">
    <div class="col-md-5">
      <img src="./img/room3.jpg"class="img-fluid rounded" style="width:90%" alt="...">
    </div>
    <div class="col-md-4">
      <h5 class="mb-5">Studio Type</h5>
      <div class="features mb-4">
            <h6 class="mb-1">Amenities</h6>
            <span class="badge rounded-pill bg-light text-dark text-wrap  ">
            Monitored with 24/7
            </span>
            <span class="badge rounded-pill bg-light text-dark text-wrap  ">
            With parking area
            </span>
            <span class="badge rounded-pill bg-light text-dark text-wrap  ">
            NO CURFEW
            </span>
            <span class="badge rounded-pill bg-light text-dark text-wrap  ">
            Flood free area
            </span>
          </div>
    </div>
    <div class="col-md-2 text-center">
    <h6 class="mb-4">₱500 per night</h6>
    <a href="#" class="btn btn-success w-100 text-white shadow-none mb-2">Book Now!</a>
          <a href="#" class="btn btn-outline-dark  w-100 shadow-none">More Details</a>
    </div>
  </div>
</div>

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



    
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

</body>
</html>