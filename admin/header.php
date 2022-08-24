<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dash.css">
</head>
<body>
<div class="container-fluid admin-dash text-light p-3 d-flex align-items-center justify-content-between sticky-top">
        <h3 class="mb-0"><i class="bi bi-house"></i> KLC ADMIN</h3>
        <a href="logout.php" class="btn btn-light shadow-none me-lg-2 me-3"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>

    <div class="col-lg-2  border-top border-3 dashboard admin-navbar" id="dashboard">
    <nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid flex-lg-column align-items-stretch">
  <h5 class="mt-2 text-center text-light" style="font-size:18px;">
 
  </li>
</h5>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#admin" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse align-items-stretch mt-2 flex-column navbar-admin" id="admin">
        <ul class="nav nav-pills flex-column">
        <li class="nav-item navbar-admin">
        <a class="nav-link text-white" href="dashboard.php"><i class="bi bi-people"></i> Dashboard</a>
          </li>
          <li class="nav-item navbar-admin">
            <a class="nav-link " href="#"><i class="bi bi-house-door"></i> Rooms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="#"><i class="bi bi-people"></i> Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="user_queries.php"><i class="bi bi-person-lines-fill"></i> Users Inquiry</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link " href="setting.php"><i class="bi bi-gear"></i> Setting</a>
          </li>
        </ul>
    </div>
  </div>
</nav>
    </div>
</body>
</html>
