<?php
    session_start();
    include('../../connect.php');
    extract($_POST);
    
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
    $flname="images/".basename($_FILES["image"]["name"]);
    
    mysqli_query($con,"INSERT INTO `tbl_categories` (`category_name`, `category_desc`, `category_createDate`) VALUES ('$name', '$desc', current_timestamp())");
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $_SESSION['success']="Snacks Added";
    header('location:category.php');
?>