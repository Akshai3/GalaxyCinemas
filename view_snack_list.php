<?php include('header.php');
error_reporting(0);
if (!isset($_SESSION['loginstat'])) {
  header('location:Login.php');
}
$qry2 = mysqli_query($con, "select * from tbl_movie where movie_id='" . $_SESSION['movie'] . "'");
$movie = mysqli_fetch_array($qry2);
?>
<!doctype html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>

<body>

  <div class="content">
    <div class="wrap">
      <div class="content-top">
        <div class="section group">
          <div class="container">
            <div class="container my-3 mb-5">
            <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `tbl_categories` WHERE category_id = $id";
        $result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['category_name'];
            $catdesc = $row['category_desc'];
        }
    ?>
              <div class="text-center bg-light my-3" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">
                <h2 class="text-center"><span id="catTitle"><?php echo $catname;?></span></h2>
              </div>
              <div class="container my-5">
                <div class="row">
                  <?php
                  $id = $_GET['catid'];
                  $sql = "SELECT * FROM `tbl_snacks` WHERE snackCategoryId = $id";
                  $result = mysqli_query($con, $sql);
                  $noResult = true;
                  while ($row = mysqli_fetch_assoc($result)) {
                    $noResult = false;
                    $pizzaId = $row['snackId'];
                    $pizzaName = $row['snackName'];
                    $pizzaPrice = $row['snackPrice'];
                    $pizzaDesc = $row['snackDesc'];
                    $img = $row['image']; ?>

                    <?php echo '<div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="card" style="width: 19rem;">'; ?>
                    <img src="images/<?php echo $row['image']; ?>" height="200px" width="300px">

                  <?php echo '<div class="card-body">
                  <form action="order_snacks.php" method="POST">
                                <h5 class="card-title" style="font-size:18px; color:darkblue;">' . substr($pizzaName, 0, 20) . '...</h5>
                                <h6 style="color: #ff0000; font-size:14px;">Rs. ' . $pizzaPrice . '/-</h6>
                                <p class="card-text" style="font-size:14px;">' . substr($pizzaDesc, 0, 29) . '...</p>   
                                <div class="form-group">
                                <label class="control-label">Select Quantity</label>
                                  <select name="qnty_name" id="q_name" class="form-control">
                                    
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                  </select>
                                </div>
                                <div class="row justify-content-center">';

                    echo '
                                              <input type="hidden" name="itemId" value="' . $pizzaId . '">
                                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Order Now</button>
                            </form>                            
                                </div>
                            </div>
                        </div>
                    </div>';
                  }
                  if ($noResult) {
                    echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">Sorry In this category No items available.</p>
                        <p class="lead"> We will update Soon.</p>
                    </div>
                </div> ';
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>


        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>

</html>