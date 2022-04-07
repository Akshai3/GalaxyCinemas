<?php
    session_start();
    include('../../connect.php');
    if(isset($_POST['createItem'])) {
        $name = $_POST["name"];
        $description = $_POST["desc"];
        $categoryId = $_POST["categoryId"];
        $price = $_POST["price"];
    
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
    $flname="images/".basename($_FILES["image"]["name"]);
    
    mysqli_query($con,"INSERT INTO `tbl_snacks` (`snackName`, `snackPrice`, `snackDesc`, `image`, `snackCategoryId`, `snackPubDate`) VALUES ('$name', '$price', '$description','$flname', '$categoryId', current_timestamp())");   
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $_SESSION['success']="Items Added";
    header('location:Menu_Manage.php');
    }
?>