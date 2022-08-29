

<?php 

    require("db.php");
    require("alert.php");
    adminLogin();


    if(isset($_POST['add_rooms'])){
        $features = filteration(json_decode($_POST['features']));

        $frm_data = filteration($_POST);
        $flag = 0;

        $q1 = "INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adult`, `children`, `description`) VALUES (?,?,?,?,?,?,?)";
        $values = [$frm_data['name'],$frm_data['area'],$frm_data['price'],$frm_data['quantity'],$frm_data['adult'],$frm_data['children'],$frm_data['desc']];


        if(insert($q1,$values,'siiiiis')){
            $flag=1;
        }

       $room_id = mysqli_insert_id($con);

        $q2 = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?,?)";

        if($stmt = mysqli_prepare($con,$q2)){
            {
                foreach($features as $f){
                    mysqli_stmt_bind_param($stmt,'ii',$room_id,$f);
                    mysqli_stmt_execute($stmt);
                }
                mysqli_stmt_close($stmt);

            }
        }else{
            $flag = 0;
            die('query cannot be prepared - insert ');
        }

        if($flag){
            echo 1;
        }else{
            echo 0;
        }
    }

    if(isset($_POST['get_rooms'])){
        $res = selectAll('rooms');
        $i=1;

        $data= "";

        while($row = mysqli_fetch_array($res)){

            if($row['status']==1){
       
                    $status = "<button  onclick='toggleStatus($row[id],0)'class='btn btn-success btn-sm shadow-none'>Active</button>";
            
            }else{
            
                $status = "<button onclick='toggleStatus($row[id],1)' class='btn btn-danger btn-sm shadow-none'>Not active</button>";
            
            }


            $data.= "
                <tr class='align-middle'>
                    <td>$i</td>
                    <td>$row[name]</td>
                    <td>$row[area] sq.ft</td>
                    <td><span class='badge rounded-pill bg-light text-dark'>Adult: $row[adult]</span><br><span class='badge rounded-pill bg-light text-dark'>Children: $row[children]</span></td>
                    <td>₱$row[price]</td>
                    <td>$row[quantity]</td>
                    <td>$status</td>
                    <td>Action</td>
                </tr>
            ";
            $i++;
    }
    echo $data;
}

    if(isset($_POST['toggleStatus'])){
        $frm_data = filteration($_POST);

        $q= "UPDATE `rooms` SET `status`=? WHERE `id`=?";
        $v = [$frm_data['value'],$frm_data['toggleStatus']];

        if(update($q,$v,'ii')){
            echo 1;
        }else{
            echo 0; 
        }

    }

 
?> 