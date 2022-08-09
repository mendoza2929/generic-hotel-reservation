<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KLC HOMES</title>
    <link rel = "stylesheet" href="index.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
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
      <div class="d-flex" role="search">
      
       <button type="button" class="btn btn-outline-dark me-lg-2 me-3 shadow-none" data-bs-toggle="modal" data-bs-target="#loginModal">
            Login
        </button>

      </div>
    </div>
  </div>
</nav>



<!-- Login Modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form >
      <div class="modal-header">
        <h5 class="modal-title text-center align-items-center d-flex"> <i class="bi bi-person fs-3 me-2"></i>User Login</h5>
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
        <button type="submit"class="btn btn-success shadow-none align-items-center">Login</button>
        <a href="#registerModal" data-bs-toggle="modal" data-bs-target="#registerModal">Don't Have an Account?</a>
      </div>
     
      </form>
    </div>
  </div>
</div>


<!-- Register Modal -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form >
      <div class="modal-header">
        <h5 class="modal-title text-center align-items-center d-flex"> <i class="bi bi-person fs-3 me-2"></i>User Login</h5>
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
        <button type="submit"class="btn btn-success shadow-none align-items-center">Login</button>
        <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">Don't Have an Account?</button>
      </div>
     
      </form>
    </div>
  </div>
</div>





<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>