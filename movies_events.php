<?php include('header.php'); ?>
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<center>
				<h1 style="color:#555;">(NOW SHOWING)</h1>
			</center>

			<?php
			$today = date("Y-m-d");
			$qry2 = mysqli_query($con, "select * from  tbl_movie ");

			while ($m = mysqli_fetch_array($qry2)) {
			?>

				<div class="col_1_of_4 span_1_of_4">
					<div class="imageRow">
						<div class="single">
							<?php

							?>
							<a href="about.php?id=<?php echo $m['movie_id']; ?>"><img height="400px" width="300px" src="<?php echo $m['image']; ?>" alt="" /></a>
						</div>
						<div class="movie-text">
							<h4 class="h-text"><a href="about.php?id=<?php echo $m['movie_id']; ?>" style="text-decoration:none;"><?php echo $m['movie_name']; ?></a></h4>
							Cast: <Span class="color2" style="text-decoration:none;"><?php echo $m['cast']; ?></span><br>

						</div>
					</div>
				</div>

			<?php
			}
			?>

		</div>
		<div class="clear"></div>
	</div>
</div>
<?php include('footer.php'); ?>