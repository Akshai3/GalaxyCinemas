<?php include('header.php');
error_reporting(0);
if (!isset($_SESSION['loginstat'])) {
	header('location:Login.php');
}
$qry2 = mysqli_query($con, "select * from tbl_movie where movie_id='" . $_SESSION['movie'] . "'");
$movie = mysqli_fetch_array($qry2);
?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<div class="section group">
				<div class="about span_1_of_2">

					<table class="table table-hover table-bordered text-center">
						<?php
						$s = mysqli_query($con, "select * from tbl_shows where s_id='" . $_SESSION['show'] . "'");
						$shw = mysqli_fetch_array($s);

						$t = mysqli_query($con, "select * from tbl_theatre where id='" . $shw['theatre_id'] . "'");
						$theatre = mysqli_fetch_array($t);
						?>
						<tr>
							<td class="col-md-6">
								Theatre
							</td>
							<td>
								<?php echo $theatre['name'] . ", " . $theatre['place']; ?>
								<input type="hidden" id="theaterId" value="<?php echo $shw['theatre_id'];?>">
							</td>
						</tr>
						<tr>
							<td>
								Screen
							</td>
							<td>
								<?php
								$ttm = mysqli_query($con, "select  * from tbl_show_time where st_id='" . $shw['st_id'] . "'");

								$ttme = mysqli_fetch_array($ttm);

								$sn = mysqli_query($con, "select  * from tbl_screens where screen_id='" . $ttme['screen_id'] . "'");

								$screen = mysqli_fetch_array($sn);
								echo $screen['screen_name'];

								?>
								<input type="hidden" id="showId" value="<?php echo $_SESSION['show'];?>">
								<input type="hidden" id="screenId" value="<?php echo $ttme['screen_id'];?>">
								<input type="hidden" id="showTime" value="<?php echo $shw['st_id'];?>">
							</td>
						</tr>

						<tr>
							<td>
								Total Seats
							</td>
							<td>
								<?php

								echo sizeof($_POST['seat']);
								
								?>
								<input type="hidden" name="seatCount" id="seatCount" value="<?php echo sizeof($_POST['seat']) ?>">
							</td>
						</tr>
						<tr>
							<td>
								Show Date
							</td>
							<td>
								<?php echo date('d-M-Y', strtotime($_SESSION['ticketDate'])); ?>
							</td>
						</tr>
						<tr>
							<td>
								Show Time
							</td>
							<td>
								<?php echo date('h:i A', strtotime($ttme['start_time'])) . " " . $ttme['name']; ?> Show
							</td>
						</tr>

						<tr>
							<td>
								Seat No
							</td>
							<td>
								<?php
								for ($i = 0; $i < sizeof($_POST['seat']); $i++) {
									list($row, $col, $type) = explode('|', $_POST['seat'][$i]);
									$rowName = chr(65 + $row - 1);
									echo "<p>" . $type . ": " . $rowName . $col . " </p>";
									$seatNumber = $rowName . $col;
								?>

									<input type="hidden" name="seats" id="seats" value="<?php echo $row.'|'.$col.'|'.$type.'|'.$seatNumber; ?>">
									

								<?php
								}
								?>
							</td>
						</tr>
						<tr>
							<td>
								Amount
							</td>
							<td id="amount" style="font-weight:bold;font-size:18px">

								Rs <?php echo $_POST['submit']; ?>
								<input type="hidden" name="totalRate" id="totalRate" value="<?php echo $_POST['submit']; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<button class="btn btn-info" id="payment" style="width:100%">Book Now</button>


							</td>
						</tr>
						<table>
							<tr>
								<td></td>
							</tr>
						</table>
				</div>

			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




<script>
	let seatArr = [];
	let amount = $('#totalRate').val();
	let theaterId = $('#theaterId').val();
	let screenId = $('#screenId').val();
	let showId = $('#showId').val();
	let seatCount = $('#seatCount').val();
	let showTime = $('#showTime').val();

	$("input[name='seats']").each(function(){
		 seatArr.push(this.value);
        });
		console.log(seatArr);
	$("#payment").click(function() {
		var options = {
			"key": "rzp_test_SugKuECyOups8l",
			"amount": amount*100,
			"currency": "INR",
			"name": "Galaxy Cinemas",
			"description": "Test Transaction",
			"image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
			"handler": function(response) {
				$.ajax({
					type: 'post',
					url: 'ticketPayment.php',
					data: {
						payment_id: response.razorpay_payment_id,
						seats: seatArr,
						theaterId: theaterId,
						screenId: screenId,
						showId: showId,
						amount: amount,
						seatCount: seatCount,
						showTime: showTime
					},
					success: function(result) {
						alert(result);
						window.location.href = " profile.php";
					}
				});

			}
		};
		var rzp1 = new Razorpay(options);
		rzp1.open();
	});
</script>

<?php include('footer.php'); ?>

