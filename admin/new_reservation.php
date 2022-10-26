

<?php 

    require("db.php");
    require("alert.php");
    adminLogin();


   
    if(isset($_POST['get_bookings'])){  
        
        $query = "SELECT bo.*, bd.*  FROM `booking_order` bo INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id WHERE bo.booking_status = 'booked' AND bo.arrival = 0 ORDER BY bo.booking_id DESC ";

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
                <button type='button' onclick='assign_room($data[booking_id])' class='btn text-white btn-sm fw-bold bg-success shadow-none' data-bs-toggle='modal' data-bs-target='#assign-room'>
                  Room Number
                </button>
                <br>

                <button type='button' onclick='cancel_booking($data[booking_id])' class='btn btn-outline-danger mt-2 btn-sm fw-bold shadow-none'>
                Cancel Reservation
              </button>
                </td>
            </tr>
            
            ";

            $i++;
        }

        echo $table_data;

}



if(isset($_POST['assign_room'])){  
        
  $frm_data = filteration($_POST);

  $query = "UPDATE `booking_order` bo INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id SET bo.arrival = ?, bd.room_no = ? WHERE bo.booking_id = ? ";

  $values = [1,$frm_data['room_no'],$frm_data['booking_id']];

  $res = update($query,$values,'isi');

  echo ($res==2) ? 1 : 0;  //it will update 2 rows so it will return 2 

}

  

    if(isset($_POST['cancel_booking'])){
        $frm_data = filteration($_POST);

        $query = "UPDATE `booking_order` SET `booking_status`=?, `refund`=? WHERE `booking_id`=? ";

        $values = ['cancelled',0,$frm_data['booking_id']];

        $res = update($query,$values,'sii');

        echo $res;
    
     
    
}





 
?>  