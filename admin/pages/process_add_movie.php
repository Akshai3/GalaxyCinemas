<?php
    session_start();
    include('../../connect.php');
    extract($_POST);

       
    $resultset = mysqli_query($con, "select * from `tbl_movie` where `movie_name`='$name'");
    $count = mysqli_num_rows($resultset);
    if ($count == 0) {
    
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
    $flname="images/".basename($_FILES["image"]["name"]);
    
    mysqli_query($con,"insert into  tbl_movie values(NULL,'".$_SESSION['theatre']."','$name','$cast','$desc','$rdate','$flname','$video','0')");
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $_SESSION['success']="Movie Added";
    header('location:add_movie.php');
    }
    else{
        $_SESSION['error']="The Movie already exists";
        header('location:add_movie.php');
    }
?>