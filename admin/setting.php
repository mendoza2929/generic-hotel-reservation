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
    <title>KLC HOMES - Setting</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class="bg-light">
 

  <?php require('header.php') ?>

  
    <div class="container-fluid" id="main-content">
      <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
          <h3 class="mb-4"><i class="bi bi-gear"></i> Settings</h3>

          <!---- Settings section -------------------->
 

        <div class="card border-0 shadow-sm ">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-title m-0">General Settings</h5>
              <button type="button" class="btn btn-warning shadow-none btn-sm fw-bold " data-bs-toggle="modal" data-bs-target="#setting">
              <i class="bi bi-pencil-square"></i> Edit
          </button>
            </div>
            <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
            <p class="card-text" id="site_title"></p>
            <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
            <p class="card-text" id="site_about"></p>
          </div>
          

    <!-- Setting Modal -->
    
        <div class="modal fade" id="setting" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form id="general_s_form">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-pencil-square"></i> General Settings</h5>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label fw-bold">Site Title</label>
                  <input type="text" name="site_title" id="site_title_input" class="form-control shadow-none" required>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bold">About</label>
                <textarea name="site_about" id="site_about_input" class="form-control shadow-none" rows="5" required></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" onclick="site_title.value = general_data.site_title,site_about.value = general_data.site_about" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                <button type="submit"  class="btn btn-success shadow-none">Save</button>
              </div>
            </form>
            </div>
          </div>
        </div>


  <!--- Shutdown settings-->

    
  <div class="card border-0">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-title m-0">There are no reservations.</h5>
              <div class="form-check form-switch">
                <form>
                <div class="form-check form-switch">
                  <input onchange="upd_shutdown(this.value)" class="form-check-input shadow-none" type="checkbox" role="switch" id="shutdown" >
                </div>
                </form>
              </div>
          </button>
            </div>
            <p class="card-text" id="site_about">
            When there are no available rooms, shutdown mode is activated, and no clients are permitted to make reservations.
            </p>
          </div>


           <!--- Contact Us  settings-->

           <div class="card border-0 shadow-sm ">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-title m-0">Contact Us Settings</h5>
              <button type="button" class="btn btn-warning shadow-none btn-sm fw-bold " data-bs-toggle="modal" data-bs-target="#contact-settings">
              <i class="bi bi-pencil-square"></i> Edit
          </button>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-4">
                <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                <p class="card-text" id="address"></p>
                </div>
                <div class="mb-4">
                <h6 class="card-subtitle mb-1 fw-bold">location</h6>
                <p class="card-text" id="gmap"></p>
                </div>
                <div class="mb-4">
                <h6 class="card-subtitle mb-1 fw-bold">Contact</h6>
                <p class="card-text mb-1">
                  <i class="bi bi-telephone-inbound"></i>
                  <span id="pn1"></span>
                </p>
                </div>
                <div class="mb-4">
                <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                <p class="card-text" id="email"></p>
                </div>
              </div>
              <div class="col-lg-6">
              <div class="mb-4">
                <h6 class="card-subtitle mb-1 fw-bold">Social Media</h6>
                <p class="card-text mb-2">
                <i class="bi bi-facebook"></i>
                  <span id="fb"></span>
                </p>
                <p class="card-text mb-2">
                <i class="bi bi-instagram"></i>
                  <span id="insta"></span>
                </p>
                <p class="card-text mb-2">
                <i class="bi bi-twitter"></i>
                  <span id="tw"></span>
                </p>
                </div>
                <div class="mb-4">
                <h6 class="card-subtitle mb-1 fw-bold">Location Maps</h6>
                  <iframe id="iframe"class="border p-2 w-100"loading="lazy"></iframe>
                </div>
              </div>
            </div>

          </div>




        </div>
      </div>
    </div>
    


 <!-- JavaScript Bundle with Popper -->
 <?php 
require ("script.php");
?>   
<script>
  let general_data;

  let general_s_form = document.getElementById('general_s_form');
  let site_title_input =document.getElementById('site_title_input');
  let site_about_input =document.getElementById('site_about_input');

  function get_general(){
    let site_title =document.getElementById('site_title');
    let site_about  =document.getElementById('site_about');

    let shutdown = document.getElementById('shutdown'); 

    let xhr = new XMLHttpRequest();
    xhr.open("POST","settings_crud.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
      general_data = JSON.parse(this.responseText);

      site_title.innerText = general_data.site_title;
      site_about.innerText = general_data.site_about;

      site_title_input.value = general_data.site_title;
      site_about_input.value = general_data.site_about;
     

      if(general_data.shutdown == 0){
        shutdown.checked=false;
        shutdown.value=0;
      }else{
        shutdown.checked=true;
        shutdown.value=1;
      }

    }

    xhr.send('get_general');
  }

  general_s_form.addEventListener('submit', function(e){
    e.preventDefault();
    upd_general(site_title_input.value,site_about_input.value);



  })

  function upd_general(site_title_val,site_about_val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","settings_crud.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
      var myModalEl = document.getElementById('setting')
      var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
      modal.hide();


      if(this.responseText== 1){
        
      alert('success', 'Sucessfully Change')
        get_general();
      }
      else{
      alert('error', 'No Changes')
      }


     
    }

    xhr.send('site_title='+site_title_val+'&site_about='+site_about_val+'&upd_general');
  }

  function upd_shutdown(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","settings_crud.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){

      if(this.responseText== 1 && general_data.shutdown==0){
        
      alert('success', 'Shutdown mode is activated');
      }
      else{
      alert('success', 'Shutdown mode is turned off');
      }
      get_general();
    }

    xhr.send('upd_shutdown='+val);
  }

  window.onload = function(){
    get_general();
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>   

</body>
</html>