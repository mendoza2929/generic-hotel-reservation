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

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

*{
    font-family: 'Poppins',sans-serif;

}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}



.availability-form{
  z-index:2;
  margin-top: -100px;
  position: relative;
}
</style>

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
              <a class="nav-link active me-3" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link me-3" href="#">Rooms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-3" href="#">Facilities</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-3" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-3" href="#">Contact Us</a>
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

    <div class="container availability-form mt-4 ">
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



<br><br><br>
<br><br><br>
<br><br><br>



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
                    <textarea class="form-control shadow-none" rows="1"></textarea>
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


</body>
</html>