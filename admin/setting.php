<?php 

require("alert.php");
require("db.php");
require('script.php');
adminLogin();
// session_regenerate_id(true);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KLC HOMES - Setting</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class="bg-light">
 

  <?php require('header.php') ?>

    <div class="container-fluid" id="main-content">
      <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
          <h3 class="mb-4">Settings</h3>

          <!---- Settings section -------------------->

        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-title m-0">General Settings</h5>
              <button type="button" class="btn btn-warning shadow-none btn-sm fw-bold " data-bs-toggle="modal" data-bs-target="#setting">
              <i class="bi bi-pencil-square"></i> Edit
          </button>
            </div>
            <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
            <p class="card-text" id="site_title"> "></p>
            <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
            <p class="card-text" id="site_about"></p>
          </div>

                <!-- Setting Modal -->
    
        <div class="modal fade" id="setting" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form>
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-pencil-square"></i> General Settings</h5>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Site Title</label>
                  <input type="text" name="site_title" id="site_title_input" class="form-control shadow-none">
                </div>
                <div class="mb-3">
                  <label class="form-label">About</label>
                <textarea name="site_about" id="site_about_input" class="form-control shadow-none" rows="5"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" onclick="site_title.value = general_data.site_title,site_about.value = general_data.site_about" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                <button type="button" onclick="upd_general(site_title.value,site_about.value)" class="btn btn-success shadow-none">Save</button>
              </div>
            </form>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>


 <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>   

<script>
  let general_data;

  function get_general(){
    let site_title =document.getElementById('site_title');
    let site_about  =document.getElementById('site_about');

    let site_title_input =document.getElementById('site_title_input');
    let site_about_input =document.getElementById('site_about_input');


    let xhr = new XMLHttpRequest();
    xhr.open("POST","settings_crud.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
      general_data = JSON.parse(this.responseText);

      site_title.innerText = general_data.site_title;
      site_about.innerText = general_data.site_about;

      site_title_input.value = general_data.site_title;
      site_about_input.value = general_data.site_about;
     
    }

    xhr.send('get_general');
  }

  function upd_general(site_title_val,site_about_val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","settings_crud.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
      var myModalEl = document.getElementById('setting')
      var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
      modal.hide();


      if(this.responseText== 1){
        
       alerts('success',"changes saved")
        get_general();
      }
      else{
        alerts('error',"changes saved")
      }


     
    }

    xhr.send('site_title='+site_title_val+'&site_about='+site_about_val+'&upd_general');
  }

  window.onload = function(){
    get_general();
  }
</script>


</body>
</html>