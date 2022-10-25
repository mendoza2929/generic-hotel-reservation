

<?php 

    require("db.php");
    require("alert.php");
    adminLogin();


   
    if(isset($_POST['get_bookings'])){  
        
        $query = "SELECT bo.*, bd.*  FROM `booking_order` bo INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id WHERE bo.booking_status = 'booked' AND bo.arrival = 0 ORDER BY bo.booking_id ASC ";

        $res = mysqli_query($con,$query);

        $i=1;
        $table_data = "";

        while($data = mysqli_fetch_array($res)){

            $date = date("d-m-Y",strtotime($data['datentime']));
            
            $checkin= date("d-m-Y",strtotime($data['check_in']));
                        
            $checkout= date("d-m-Y",strtotime($data['check_out']));

            $table_data .="
            
            <tr>
                <td>$i</td>
                <td>
                <span class='badge bg-info'>
                    Order ID: $data[order_id]
                </span>
                <br>
                <b>Name: </b> $data[user_name]
                <br>
                <b>Phone No: </b> $data[phonenum]
                </td>
                <td>
                <b>Room: </b> $data[room_name]
                <br>
                <b>Price: </b> ₱ $data[price] 
                </td>
                <td>
                    <b>Check in: </b> $checkin
                    <br>
                    <b>Check out: </b> $checkout
                    <br>
                    <b>Total Pay: </b> ₱ $data[total_pay]
                    <br>
                    <b>Date: </b> $date
                </td>
                <td>
                <button type='button' class='btn text-white btn-sm fw-bold bg-success shadow-none' data-bs-toggle='modal' data-bs-target='#assign-room'>
                  Room Number
                </button>
                <br>

                <button type='button' class='btn btn-outline-danger mt-2 btn-sm fw-bold shadow-none'>
                Cancel Reservation
              </button>
                </td>
            </tr>
            
            ";

            $i++;
        }

        echo $table_data;

}



  

    if(isset($_POST['remove_user'])){
        $frm_data = filteration($_POST);

    
      $res = delete("DELETE FROM `user_cred` WHERE `id`=? AND  `is_verified`=?",[$frm_data['user_id'],0],'ii');
     
      if($res){
        echo 1;
      }else{
        echo 0;
      }
    
    }
    

    if(isset($_POST['search_user'])){  

        $frm_data = filteration($_POST);
        $query = "SELECT * FROM  `user_cred` WHERE `name` LIKE ?";

        $res = select($query,["%$frm_data[name]%"],'s');
        $i=1;

        

        $data= "";

        while($row = mysqli_fetch_array($res)){
            
            $del_btn = "
            <button type='button' onclick='remove_user($row[id])' class='btn btn-danger btn-sm shadow-none'>
            <i class='i bi-trash'></i>
            </button>
            ";

            $verified = "<i class='bi bi-x-square text-danger'></i>";

            if($row['is_verified']){
                $verified = "<i class='bi bi-person-check text-success'></i>";
                $del_btn  = "";
            }

            // $status = "<button onclick='toggleStatus($row[id],0)' class='btn btn-success btn-sm shadow-none'>Active</button>";

            // if(!$row['status']){
            //     $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-danger btn-sm shadow-none'>Inactive</button>";
                
            // }

         



            $date = date("d-m-y",strtotime($row['datentime']));

            $data.= "
               <tr>
                <td>$i</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[phonenum]</td>
                <td>$row[address]</td>
                <td>$verified</td>
                <td>$date</td>
                <td>$del_btn</td>
               </tr>
            ";
            $i++;
    }
    echo $data;
}





 
?>  