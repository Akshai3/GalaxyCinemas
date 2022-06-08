<?php include('header.php');
error_reporting(0);
$un = $_SESSION['un'];
if (!isset($_SESSION['loginstat'])) {
	header('location:Login.php');
}
$qry2 = mysqli_query($con, "select * from tbl_movie where movie_id='" . $_SESSION['movie'] . "'");
$movie = mysqli_fetch_array($qry2);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<title> GCTB </title>
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
	<div class="content">
		<div class="wrap">
			<div class="content-top">
				<div class="section group">

					<div class="about span_1_of_2">
						<h3 style="color:black;" class="text-center">BOOKING HISTORY</h3>
						<?php include('msgbox.php'); ?>
						<?php
						$bk = mysqli_query($con, "select * from tbl_bookings where user_id='" . $_SESSION['uid'] . "' GROUP BY ticket_id;");
						if (mysqli_num_rows($bk)) {
						?>
							<table class="table table-bordered">
								<thead>
									<th>Booking Id</th>
									<th>Movie</th>
									<th>Theatre</th>
									<th>Screen</th>
									<th>Show</th>
									<th>Start time</th>
									<th>Seats</th>
									<th>Amount</th>
									<th></th>
								</thead>
								<tbody>
									<?php
									while ($bkg = mysqli_fetch_array($bk)) {
										$m = mysqli_query($con, "select * from tbl_movie where movie_id=(select movie_id from tbl_shows where s_id='" . $bkg['show_id'] . "')");
										$mov = mysqli_fetch_array($m);
										$mid = $_SESSION['movie_id'] = $mov['movie_id'];
										$s = mysqli_query($con, "select * from tbl_screens where screen_id='" . $bkg['screen_id'] . "'");
										$srn = mysqli_fetch_array($s);
										$tt = mysqli_query($con, "select * from tbl_theatre where id='" . $bkg['t_id'] . "'");
										$thr = mysqli_fetch_array($tt);
										$st = mysqli_query($con, "select * from tbl_show_time where st_id=(select st_id from tbl_shows where s_id='" . $bkg['show_id'] . "')");
										$stm = mysqli_fetch_array($st);
										$selectSeatNumberSql = "select seatNumber,seatType from tbl_bookings where ticket_id='" . $bkg['ticket_id'] . "'";
										$selectSeatNumberResult = mysqli_query($con, $selectSeatNumberSql);
										$seatNumber = "";
										$seatType = "";
										while ($selectSeatNumberRow = mysqli_fetch_array($selectSeatNumberResult)) {
											$seatNumber .= $selectSeatNumberRow['seatType'] . ":" . $selectSeatNumberRow['seatNumber'] . ",";
										}
										$seatNumber = rtrim($seatNumber, ",");



									?>
										<tr>
											<td>
												<?php echo $bk2 = $bkg['ticket_id']; ?>
											</td>
											<td>
												<?php echo $movie = $_SESSION['movie_name'] = $mov['movie_name']; ?>
											</td>
											<td>
												<?php echo $theatre = $_SESSION['tname'] = $thr['name']; ?>
											</td>
											<td>
												<?php echo $srn['screen_name']; ?>
											</td>
											<td>
												<?php echo $stm['name']; ?>
											</td>
											<td>
												<?php echo date('h:i A', strtotime($stm['start_time'])); ?>
											</td>

											<td>
												<?php echo $seatNumber; ?>
											</td>
											<td>
												Rs. <?php echo $bkg['amount']; ?>
											</td>
											<td>
												<?php
												$abc = $bkg['book_id'];
												if ($bkg['ticket_date'] < date('Y-m-d')) {
													$query = "UPDATE `tbl_bookings` SET `status`='0' WHERE book_id=$abc";
													$qry2 = mysqli_query($con, $query);
												?>
													<i class="glyphicon glyphicon-ok"></i>
													<?php
													$un;
													$sql5 = ("SELECT * FROM `tbl_review` WHERE ticket_id='$bk2' ");
													$result5 = mysqli_query($con, $sql5);
													$row5 = mysqli_fetch_array($result5);
													if ($row5 == "") { ?>
														<a href='review.php?id=<?php echo $bkg['ticket_id']; ?>'>Review</a>
													<?php
													} else {
														echo "<a href='#'>Reviewed</a>";
													}
													?>
													<!-- <a href="review.php">Review</a> -->
												<?php
												} else { ?>
													<a href="cancel.php?id=<?php echo $bkg['book_id']; ?>" style="text-decoration:none; color:red;">Cancel</a>
													<br><a href="ticket_print.php?id2=<?php echo $bkg['ticket_id']; ?>"><i class='bx bxs-file'></i></a>
												<?php
												}
												?>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						<?php
						} else {
						?>
							<h3 style="color:red;" class="text-center">No Previous Bookings Found!</h3>
							<p>Once you start booking movie tickets with this account, you'll be able to see all the booking history.</p>
						<?php
						}
						?>
					</div>
					<div class="about span_1_of_2">
						<h3 style="color:black;" class="text-center">ORDER HISTORY</h3>
						<?php include('msgbox.php'); ?>
						<?php
						$od = mysqli_query($con, "select * from tbl_snackbook where user_id='" . $_SESSION['uid'] . "'");
						$od1 = mysqli_query($con, "select * from tbl_categories");
						$snod1 = mysqli_fetch_array($od1);
						$od2 = mysqli_query($con, "select * from tbl_theatre");
						$snod2 = mysqli_fetch_array($od2);
						if (mysqli_num_rows($od)) {
						?>
							<table class="table table-bordered">
								<thead>
									<th>Order Id</th>
									<th>Theatre</th>
									<th>Snack</th>
									<th>Quantity</th>
									<th>Price</th>
									<th>Order date</th>
									<th></th>
								</thead>
								<tbody>
									<?php
									while ($snod = mysqli_fetch_array($od)) {
										$s = mysqli_query($con, "select * from tbl_snacks where snackId='" . $snod['snackId'] . "'");
										$sn = mysqli_fetch_array($s);
										$c = mysqli_query($con, "select * from tbl_categories where category_id='" . $snod1['category_id'] . "'");
										$ct = mysqli_fetch_array($c);
										$t = mysqli_query($con, "select * from tbl_categories where t_id=(select id from tbl_theatre where id='" . $snod2['id'] . "')");
										$the = mysqli_fetch_array($t);
									?>
										<tr>
											<td>
												<?php echo $snod['order_id']; ?>
											</td>
											<td>
												<?php echo $snod2['name']; ?>
											</td>
											<td>
												<a href="order_print.php"><?php echo $sn['snackName']; ?></a>
											</td>
											<td>
												<?php echo $snod['itemQuantity']; ?>
											</td>
											<td>
												<?php echo $snod['amount']; ?>
											</td>
											<td>
												<?php echo $snod['orderDate']; ?>
											</td>
											<td>
												<?php
												$abcd = $snod['order_id'];
												if ($snod['orderDate'] < date('Y-m-d')) {
													$query3 = "UPDATE `tbl_snackbook` SET `status`='0' WHERE order_id=$abcd";
													$qry3 = mysqli_query($con, $query3);
												?>
													<i class="glyphicon glyphicon-ok"></i>
												<?php
												} else { ?>
													<a href="order_cancel.php?id=<?php echo $snod['order_id']; ?>" style="text-decoration:none; color:red;">Cancel</a>

													<br><a href="order_print.php?id2=<?php echo $snod['order_id']; ?>"><i class='bx bxs-file'></i></a>
												<?php
												}
												?>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						<?php
						} else {
						?>
							<h3 style="color:red;" class="text-center">No Orders Found!</h3>
							<p>Once you start Order Snacks with this account, you'll be able to see all the Order history.</p>
						<?php
						}
						?>
					</div>
					<?php include('movie_sidebar.php'); ?>

				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<?php include('footer.php'); ?>


</body>

</html>
<script type="text/javascript">
	$('#seats').change(function() {
		var charge = <?php echo $screen['charge']; ?>;
		amount = charge * $(this).val();
		$('#amount').html("Rs " + amount);
		$('#hm').val(amount);
	});
</script>