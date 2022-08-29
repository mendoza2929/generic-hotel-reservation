

<?php 

    require("db.php");
    require("alert.php");
    adminLogin();


    if(isset($_POST['add_facilities'])){
        $frm_data = filteration($_POST);

        $q = "INSERT INTO `features`(`name`) VALUES (?)";
        $values=[$frm_data['name']];
        $res=insert($q,$values,'s');
        echo $res;

    }

    if(isset($_POST['get_facilities'])){
        $res = selectAll('features');
        $i=1;

        while($row = mysqli_fetch_assoc($res)){
            echo <<<data
            <tr>
            <td>$i</td>
            <td>$row[name]</td>
            <td>
             <button type="button" onclick="rem_facilities($row[id])" class="btn btn-danger btn-sm shadow-none">
             <i class="bi bi-trash"></i>Delete
            </button>
            </td>
            </tr>
            data;
            $i++;
        }
    }

    if(isset($_POST['rem_facilities'])){
        $frm_data = filteration($_POST);
        $values = [$frm_data['rem_facilities']];

        $check_q = select('SELECT * FROM `room_facilities` WHERE `facilities_id`=?',[$frm_data['rem_facilities']],'i');

        if(mysqli_num_rows($check_q)==0){

            $q = "DELETE FROM `features` WHERE `id`=?";
            $res = delete($q, $values,'i');
            echo $res;
        }else{
            echo 'room_added';
        }

    }



    if(isset($_POST['add_features'])){
        $frm_data = filteration($_POST);

        $img_r = uploadSVGImage($_FILES['icon'],FEATURES_FOLDER);

        if($img_r=='inv_img'){
            echo $img_r;
        }
        else if($img_r=='inv_size'){
            echo $img_r;
        }
        else if($img_r == 'upd_failed'){
            echo $img_r;
        }
        else {
            $q = "INSERT INTO `facilities` (`icon`,`name`,`description`) VALUES (?,?,?)";
            $values = [$img_r,$frm_data['name'],$frm_data['desc']];
            $res = insert($q,$values,'sss');
            echo $res;
        }
    
    }

    if(isset($_POST['get_features'])){
        $res = selectAll('facilities');
        $i=1;
        $path = FEATURES_IMG_PATH;

        while($row = mysqli_fetch_assoc($res)){
            echo <<<data
            <tr class="align-middle">
            <td>$i</td>
            <td><img src="$path$row[icon]" width="60px"></td>
            <td>$row[name]</td>
            <td>$row[description]</td>
            <td>
             <button type="button" onclick="rem_features($row[id])" class="btn btn-danger btn-sm shadow-none">
             <i class="bi bi-trash"></i>Delete
            </button>
            </td>
            </tr>
            data;
            $i++;
        }
    }

    if(isset($_POST['rem_features'])){
        $frm_data = filteration($_POST);
        $values = [$frm_data['rem_features']];

     
        $q = "DELETE FROM `facilities` WHERE `id`=?";
        $res = delete($q, $values,'i');
        echo $res;
    }

?> 