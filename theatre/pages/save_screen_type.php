<?php
    include('../../connect.php');
    extract($_POST);
    $ac="insert into `tbl_screentype` (`screen_id`, `type_name`, `scRow`, `scCol`, `seats`, `charge`) values('$box_id','$box_name','$rname','$cname','$cseat','$price')";
    $data= mysqli_query($con,$ac);
    if($data){
        header('location:add_theatre_2.php');
    }
    else{
        echo "Not inserted";
    }
?>