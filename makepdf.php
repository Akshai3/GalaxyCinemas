<html>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%; 
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
</style>
</html>
<?php


include 'connect.php';
session_start();
$ah=$_SESSION['dd'];
$pay=mysqli_query($con,"SELECT * FROM `tbl_bookings` WHERE  `ticket_id`='$ah'");
while($p=mysqli_fetch_assoc($pay))
{
    $email = $ah;
    $amount = $p['amount'];
    $date = $p['added_on'];
}


$mpdf = new Mpdf();
$data = '';
$data .= '<div class="card"><h1>GALAXY CINEMAS</h1>';
$data .= '<div class="crntdate"><h4>BILL</h4></div>';
$data .= '<p> Email :' .  $email.'</p>';
$data .= '<p> description :Advance Payment</p>';
$data .= '<p> Amount :' . $amount.'</p>';
$data .= '<p> Date and time :' . $date.'</p></div>';
$mpdf->WriteHTML($data);
$mpdf->Output('idcard.pdf','D');

?>