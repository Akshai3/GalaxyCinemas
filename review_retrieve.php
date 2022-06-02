<?php
  require('connect.php');
	$query = "SELECT * FROM tbl_review WHERE movieId='" . $_POST['FilmId']."'";
    
  $result = mysqli_query($con, $query) or die ('Failed to query '.mysqli_error($con));

  while($row = mysqli_fetch_array($result)) {
    print "<section style='padding: 1rem 3rem;'>";
    print "<h3>Viewer: " . $row['userId'] . "</h3>";
    print "<p style='padding:0;'>" . $row['comment'] . "</p>";
    print "</section>";
  }
	mysqli_free_result($result);
  mysqli_close($con);
?>