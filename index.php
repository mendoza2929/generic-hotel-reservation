
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
    <title>KLC HOMES</title>
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

<?php 

$home_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
$values = [2];
$home_r = mysqli_fetch_assoc(select($home_q, $values,'i'));

?>

<nav class="navbar navbar-expand-lg bg-white px-lg-3 py-lg-2 shadow-sm sticky-top nav-user">
      <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3" href="index.php"><?php echo $home_r['site_title']?></a>
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
          <i class="bi bi-box-arrow-in-right"></i> Login
          </button>
          </div>
        </div>
      </div>
    </nav>

  

    <!-- Swiper -->
    <div class="container-fluid px-lg-4 mt-2">
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="./img/bg2.jpg" class="h-50 w-100 d-block"  />
        </div>
    
      </div>
    </div>

    <!---Check Availability--->
    <div class="availability-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded ">
          <h5 class="text-center mb-4">Check Availability</h5>
          <form>
            <div class="row align-items-end">
              <div class="col-lg-3 mb-3">
                <label class="form-label" style="font-weight: 500;">Check-in</label>
                <input type="date" class="form-control shadow-none">
              </div>
              <div class="col-lg-3 mb-3">
                <label class="form-label" style="font-weight: 500;">Check-out</label>
                <input type="date" class="form-control shadow-none">
              </div>
              <div class="col-lg-2 mb-3">
                <label class="form-label" style="font-weight: 500;">Adult</label>
                <select class="form-select shadow-none">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5 </option>
                </select>
              </div>
              <div class="col-lg-2 mb-3">
                <label class="form-label" style="font-weight: 500;">Children</label>
                <select class="form-select shadow-none">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5 </option>
                </select>
              </div>

              <div class="col-lg-2 mb-lg-3 mt-2">
                <button type="submit" class="btn btn-success text-white shadow-none">Check Availability</button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
    </div>



  <!--- Our Rooms -->

  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">OUR ROOMS</h2>

  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 my-3">
      <div class="card border-0 shadow" style="max-width:350px; margin:auto;">
        <img src="./img/room2.webp" class="card-img-top" alt="...">
        <div class="card-body">
          <h5>Studio Type</h5>
          <h6 class="mb-4">₱500 per night</h6>
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
          <div class="rating mb-4">
            <span class="badge rounded-pill bg-light">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </span>
          </div>
          <div class="d-flex justify-content-between">
          <a href="#" class="btn btn-success  text-white shadow-none">Book Now!</a>
          <a href="#" class="btn btn-outline-dark shadow-none">More Details</a>
          </div>
        </div>
      </div>
      </div>

      <div class="col-lg-4 col-md-6 my-3">
      <div class="card border-0 shadow" style="max-width:350px; margin:auto;">
        <img src="./img/room2.webp" class="card-img-top" alt="...">
        <div class="card-body">
          <h5>Studio Type</h5>
          <h6 class="mb-4">₱500 per night</h6>
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
          <div class="rating mb-4">
            <span class="badge rounded-pill bg-light">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </span>
          </div>
          <div class="d-flex justify-content-between">
          <a href="#" class="btn btn-success  text-white shadow-none">Book Now!</a>
          <a href="#" class="btn btn-outline-dark shadow-none">More Details</a>
          </div>
        </div>
      </div>
      </div>

      <div class="col-lg-4 col-md-6 my-3">
      <div class="card border-0 shadow" style="max-width:350px; margin:auto;">
        <img src="./img/room3.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5>Studio Type</h5>
          <h6 class="mb-4">₱500 per night</h6>
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
          <div class="rating mb-4">
            <span class="badge rounded-pill bg-light">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </span>
          </div>
          <div class="d-flex justify-content-between">
          <a href="#" class="btn btn-success  text-white shadow-none">Book Now!</a>
          <a href="#" class="btn btn-outline-dark shadow-none">More Details</a>
          </div>
        </div>
      </div>
      </div>

      <div class="col-lg-12 text-center mt-5">
          <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms</a>
      </div>
    </div>
  </div>


<!---- OUR FACILITIES--->

<h2 class="mt-5 pt-4 mb-4 text-center fw-bold">OUR FACILITIES</h2>

<div class="container">
  <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <h5 class="mt-3 font-bold">🛵Free parking on premises
Outdoor grilling area 
Fully fenced area with gate that can be locked for safety purposes</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <h5 class="mt-3 font-bold">📍Dining:
Kitchen
Space where guests can cook their own meals</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <h5 class="mt-3 font-bold">📍Bed and bath:
🛏️Double deck bed is included but without foam
🚿Bathroom can be locked for safety and privacy</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <h5 class="mt-3 font-bold">📍Electricity and Water Bill:
Each unit is provided with their own electric meter and water meter
Each room is provided with a main switch located inside the units</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <h5 class="mt-3 font-bold">📍Water Source:
Own water tank: Deep well – no water interruption</h5>
    </div>
  </div>
</div>


<!---Testimonials-------------->

<h2 class="mt-5 pt-4 mb-4 text-center fw-bold">TESTIMONIALS</h2>

  <div class="container">
    <div class="swiper swiper-textinomials">
      <div class="swiper-wrapper">
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center p-4">
            <h6 class="m-0 ms-2">Random user1</h6>
          </div>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus tenetur laborum beatae optio molestias, sint iste hic autem ad aperiam deserunt cum perspiciatis illo veniam dignissimos, quod culpa, reiciendis libero?
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center p-4">
            <h6 class="m-0 ms-2">Random user1</h6>
          </div>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus tenetur laborum beatae optio molestias, sint iste hic autem ad aperiam deserunt cum perspiciatis illo veniam dignissimos, quod culpa, reiciendis libero?
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center p-4">
            <h6 class="m-0 ms-2">Random user1</h6>
          </div>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus tenetur laborum beatae optio molestias, sint iste hic autem ad aperiam deserunt cum perspiciatis illo veniam dignissimos, quod culpa, reiciendis libero?
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>

      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>


  <!----REACH US--->

  <?php 

    $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q, $values,'i'));
    // print_r($contact_r);
  ?>


  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">REACH US</h2>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
      <iframe class="w-100 rounded" height="320px"src="<?php echo $contact_r['iframe']?>"allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="col-lg-4 col-md-4">
          <div class="bg-white p-4 rounded mb-4">
            <h5 class="text-center">Contact Us</h5>
            <a href="Phone: 0956 408 0804" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone"></i> <?php echo $contact_r['pn1']?></a>
          </div>
          <div class="bg-white p-4 rounded mb-4">
            <h5 class="text-center">Follow Us</h5>
            <?php
            
            if($contact_r['fb']!=''){
              echo<<<data

              <a href="$contact_r[fb]" target="_blank" class="d-inline-block mb-3">
              <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-facebook me-1"></i>Facebook</span>
              </a>

              data;
            }
            
            ?>

            <?php 
            
            if($contact_r['insta']!=''){
              echo<<<data
              
              <a href="$contact_r[insta]" target="_blank" class="d-inline-block mb-3">
              <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-instagram me-1"></i></i>Instagram</span>
              </a>

              data;
            }
            
            ?>

            <?php 
            
            if($contact_r['tw']!=''){
              echo<<<data
              
              <a href="$contact_r[tw]" target="_blank" class="d-inline-block mb-3">
              <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-instagram me-1"></i></i>Instagram</span>
              </a>

              data;
            }
            
            ?>


            
          


          
          </div>
      </div>
    </div>
  </div>

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

<!-- Initialize Swiper -->
<script>
      var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop:true,
        autoplay:{
          delay:3500,
          disabledOnInteraction:false,
        }
      });
    </script>

    <script>
      var swiper = new Swiper(".swiper-textinomials",{
        effect:"coverflow",
        grabCursor:true,
        centeredSlides:true,
        slidesPerView:"auto",
        slidesPerView:3,
        loop:true,
        coverflowEffect:{
          rotate:50,
          stretch:0,
          depth:100,
          modifier:1,
          slideShadows:false,
        },
        pagination:{
          el:".swiper-pagin ation",
        },
        breakpoints:{
          320:{
            slidesPerView:1,
          },
          640:{
            slidesPerView:1,
          },
          768:{
            slidesPerView:2,
          },
          1024:{
            slidesPerView:3,
          },
        }
      })
    </script>








</body>
</html>