<?php 

require("alert.php");
require("db.php");

adminLogin();
// session_regenerate_id(true);


// if(isset($_GET['seen'])){
//     $frm_data =filteration($_GET);

//     if($frm_data['seen']=='all'){
//         $q = "UPDATE `user_queries` SET `seen`=?";
//         $values= [1];
//         if(update($q,$values,'i')){
//             alert('success','Mark all as read');
//         } 
//     }
//     else{
//         $q = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
//         $values= [1,$frm_data['seen']];
//         if(update($q,$values,'ii')){
//             alert('success','Mark as read');
//         } 
//     }
// }


// if(isset($_GET['del'])){
//     $frm_data =filteration($_GET);

//     if($frm_data['del']=='all'){
//         // $q = "DELETE FROM `user_queries`";
//         // if(mysqli_query($con,$q)){
//         //     alert('success','All inquiry Deleted');
//         // }
//     }
//     else{
//         $q = "DELETE FROM `user_queries` WHERE `sr_no`=?";
//         $values= [$frm_data['del']];
//         if(delete($q,$values,'i')){
//             alert('success','Inquiry Deleted');
//         }
        
//     }
// }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KLC HOMES - Rooms</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="room.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body class="bg-light">
 

  <?php require('header.php') ?>



    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-y">
                <h3 class="mb-4"><i class="bi bi-house-door"></i> Rooms</h3>

                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">

                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-warning btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#add-room">
                            <i class="bi bi-file-plus"></i> Add
                            </button>
                        </div>


                           <div class="table-responsive-lg" style="height:450px; overflow-y:scroll;">
                           <table class="table table-hover border">
                            <thead>
                                <tr class="bg-secondary text-white">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Area</th>
                                <th scope="col">guest</th> 
                                <th scope="col">Price</th> 
                                <th scope="col" >Quantity</th>
                                <th scope="col">Status</th> 
                                <th scope="col">Action</th> 
                                </tr>
                            </thead>
                            <tbody id="room_data">
                          
                             
                           
                            </tbody>
                            </table>
                            </div>

                        </div>
                    </div>
                    

                    
                    


            </div>
        </div>
    </div>

        <!----Rooms Modal-->

        <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard= "true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form id="room_form" autocomplete="off">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title"><i class="bi bi-plus-square"></i> Add Room</div>
                        </div>
                        <div class="modal-body"> 
                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Area</label>
                                <input type="number" min="1" name="area" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" name="price" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" name="quantity" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Adult (Max.)</label>
                                <input type="number" min="1"  name="adult" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Children (Max.)</label>
                                <input type="number" min="1" name="children" class="form-control shadow-none">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Facilities</label>
                                <div class="row">
                                    <?php 
                                    
                                    $res = selectAll('features');
                                    while($opt = mysqli_fetch_assoc($res)){
                                        echo"
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none' >          
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                    
                                    ?> 
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="desc" rows=4 class="form-control shadow-none" required></textarea>
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success shadow-none">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

     


 <?php 
require ("script.php");
?> 


<script>

let room_form = document.getElementById('room_form');

room_form.addEventListener('submit', function(e){
    e.preventDefault();
    add_rooms();
})

function add_rooms(){
    let data= new FormData();
    data.append('add_rooms','');
        data.append('name',room_form.elements['name'].value);
        data.append('area',room_form.elements['area'].value);
        data.append('price',room_form.elements['price'].value);
        data.append('quantity',room_form.elements['quantity'].value);
        data.append('adult',room_form.elements['adult'].value);
        data.append('children',room_form.elements['children'].value);
        data.append('desc',room_form.elements['desc'].value);


        let features = [];

        room_form.elements['features'].forEach(el => {
            if(el.checked){
                features.push(el.value);
            }
        });

        data.append('features',JSON.stringify(features));


        let xhr = new XMLHttpRequest();
        xhr.open("POST","rooms_ajax.php",true);

        xhr.onload = function(){
            var myModalEl = document.getElementById('add-room')
            var modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instanceof
            modal.hide();

            if(this.responseText==1){
                alert('success','New Room Added');
                room_form.reset();
                get_rooms();
                
            }else{
                alert('error','Server Down!');
            }

        }
        xhr.send(data);
}

function get_rooms(){
        
    let xhr = new XMLHttpRequest();
        xhr.open("POST","rooms_ajax.php",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onload = function(){
            document.getElementById('room_data').innerHTML = this.responseText;
        }
        xhr.send('get_rooms');

}


function toggleStatus(id,val){
        
        let xhr = new XMLHttpRequest();
            xhr.open("POST","rooms_ajax.php",true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        
            xhr.onload = function(){
                if(this.responseText==1){
                    alert('success','Status Active');
                    get_rooms();
                }else{
                    alert('error','Status Not Active');
                    
                }
            }
            xhr.send('toggleStatus='+id+'&value='+val);
    
    }


    window.onload = function(){
        get_rooms();
    }

</script>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>