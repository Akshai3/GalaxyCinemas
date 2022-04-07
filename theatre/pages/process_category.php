<?php
    session_start();
    include('../../connect.php');
    extract($_POST);
    
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    echo "$target_dir";
    
    $flname="images/".basename($_FILES["image"]["name"]);
    
    mysqli_query($con,"insert into  tbl_categories values(NULL,'$name','".$_SESSION['theatre']."','$desc','$flname',current_timestamp())");
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $_SESSION['success']="Snacks Added";
    header('location:category.php');
?>