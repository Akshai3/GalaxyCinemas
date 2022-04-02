<?php
session_start();
include '../../connect.php';
$id = $_SESSION['id'];
$idd = $_SESSION['uid'];
$m_name = $_POST['name'];
$adress = $_POST['address'];
$place = $_POST['place'];
$state = $_POST['state'];
$phno = $_POST['phno'];
$mail = $_POST['mail'];
$pin = $_POST['pin'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "UPDATE tbl_theatre SET `name` = '$m_name', `address` = '$adress' , `place` = '$place', `state` = '$state'  , `phno` = '$phno', `mail` = '$mail'  , `pin` = '$pin' 
                 WHERE `id` = '$id'";
$log = "UPDATE tbl_login SET `username` ='$username', `password` = '$password' WHERE `uid` ='$idd'";
$res = mysqli_query($con, $query, $log);
if ($res) {
    $_SESSION['success'] = "Movie News Updated";
    header('location:index.php');
}
