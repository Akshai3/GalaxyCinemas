<?php
session_start();
include '../../connect.php';
$id = $_SESSION['id'];
$m_name = $_POST['name'];
$cast = $_POST['cast'];
$desc = $_POST['desc'];
$rdate = $_POST['rdate'];
$video = $_POST['video'];
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$flname = "images/" . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
$query = "UPDATE tbl_movie SET `movie_name` = '$m_name', `cast` = '$cast' , `desc` = '$desc' , `release_date` = '$rdate' , `image` = '$flname' ,
                         `video_url` = '$video' WHERE `movie_id` = '$id'";
$res = mysqli_query($con, $query);
if ($res) {
    $_SESSION['success'] = "Movie Updated";
    header('location:index.php');
}
