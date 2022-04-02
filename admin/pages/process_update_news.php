<?php
session_start();
include '../../connect.php';
$id = $_SESSION['id'];
$m_name = $_POST['name'];
$cast = $_POST['cast'];
$rdate = $_POST['date'];
$desc = $_POST['description'];
$uploaddir = '../news_images/';
$uploadfile = $uploaddir . basename($_FILES['attachment']['name']);
move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadfile);
$flname = "news_images/" . basename($_FILES["attachment"]["name"]);
$query = "UPDATE tbl_news SET `name` = '$m_name', `cast` = '$cast' , `news_date` = '$rdate', `description` = '$desc'  , `attachment` = '$flname' 
                 WHERE `news_id` = '$id'";
$res = mysqli_query($con, $query);
if ($res) {
    $_SESSION['success'] = "Movie News Updated";
    header('location:index.php');
}
