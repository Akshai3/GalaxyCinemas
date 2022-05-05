<?php
    include('../../connect.php');
    extract($_POST);
    if($box_name=='Gold')
    {
         $row['position']="3";
         echo $pos=$row['position'];
    }else if($box_name=='Platinum')
    {
         $row['position']="2";
         $pos=$row['position'];
    }else if($box_name=='Diamond')
    {
         $row['position']="1";
         $pos=$row['position'];
    }else{
        echo "Not Inserted";
    }
    $ac="insert into `tbl_screentype` (`screen_id`, `type_name`, `position`, `scRow`, `scCol`, `seats`, `charge`) values('$box_id','$box_name','$pos','$rname','$cname','$cseat','$price')";
    $data= mysqli_query($con,$ac);
    if($data){
        header('location:add_theatre_2.php');
    }
    else{
        echo "Not inserted";
    }
?>