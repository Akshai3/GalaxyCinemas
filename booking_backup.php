<!DOCTYPE HTML>
<html>

<head>
	<title>GCTB</title>
	<link rel="stylesheet" type="text/css" href="trailer.css">

	<?php include('header.php');
	error_reporting(0);
	if (!isset($_SESSION['loginstat'])) {
		header('location:Login.php');
	}
	$qry2 = mysqli_query($con, "select * from tbl_movie where movie_id='" . $_SESSION['movie'] . "'");
	$movie = mysqli_fetch_array($qry2);
	?>
</head>

<body>

	<div class="content">
		<div class="wrap">
			<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">
						<div class="logo">
							Movie Details
						</div>

						<p id="move"> movie name</p>
						<br />
						<div class="det">Genre:</div>

						<div class="row">
							<p class="column" id="genre1"></p>
							<p class="column" id="genre2"></p>
						</div>


						<hr>
						<div class="det2"> Ratings:</div>
						<div class="row">
							<p class="column" id="rat1"></p>
							<p class="column" id="rat2"></p>
						</div>
						<br />
						<div id="trailer_dock">
							<p>
							<h2 style="text-align:center;color: white;">Watch Trailer</h2>
							</p>

							<p style="text-align:center">
								<iframe id="vid" width="900" height="450" src="">

								</iframe>
								<br />
								<br />
								<br />
								<br />
								<br />
							</p>
						</div>
						<div id="bottom_dock">
							<a class="button" href="theatre.html">
								Book Tickets
							</a>
						</div>

					</div>

				</div>
				<div class="clear"></div>
			</div>

		</div>
	</div>


	<script type="text/javascript">
		$('#seats').change(function() {
			var charge = <?php echo $screen['charge']; ?>;
			amount = charge * $(this).val();
			$('#amount').html("Rs " + amount);
			$('#hm').val(amount);
		});
	</script>

</body>

</html>













