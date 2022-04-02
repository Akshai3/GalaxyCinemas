<?php
include('header.php');
$id = $_SESSION['id'] = $_GET['mid'];
$query = "SELECT * FROM tbl_movie WHERE movie_id = '$id'";
$res = mysqli_query($con, $query);
$row = mysqli_fetch_array($res);
?>
<link rel="stylesheet" href="../../validation/dist/css/bootstrapValidator.css" />

<script type="text/javascript" src="../../validation/dist/js/bootstrapValidator.js"></script>
<!-- =============================================== -->
<?php
include('../../form.php');
$frm = new formBuilder;
?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Update Movie
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Update Movie</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <?php include('../../msgbox.php'); ?>
        <form action="process_update_movie.php" method="post" enctype="multipart/form-data" id="form1">
          <div class="form-group">
            <label class="control-label">Movie Name</label>
            <input type="text" name="name" value="<?php echo $row['movie_name']; ?>" class="form-control" />
            <?php $frm->validate("name", array("required", "label" => "Movie Name")); // Validating form using form builder written in form.php 
            ?>
          </div>
          <div class="form-group">
            <label class="control-label">Cast</label>
            <input type="text" name="cast" value="<?php echo $row['cast']; ?>" class="form-control" />
            <?php $frm->validate("cast", array("required", "label" => "Cast", "regexp" => "text")); // Validating form using form builder written in form.php 
            ?>
          </div>
          <div class="form-group">
            <label class="control-label">Description</label>
            <textarea name="desc" class="form-control"><?php echo $row['desc']; ?></textarea>
            <?php $frm->validate("desc", array("required", "label" => "Description")); // Validating form using form builder written in form.php 
            ?>
          </div>
          <div class="form-group">
            <label class="control-label">Release Date</label>
            <input type="date" name="rdate" value="<?php echo $row['release_date']; ?>" class="form-control" min="<?php echo date('Y-m-d'); ?>" />
            <?php $frm->validate("rdate", array("required", "label" => "Release Date")); // Validating form using form builder written in form.php 
            ?>
          </div>
          <div class="form-group">
            <label class="control-label">Image</label>
            <input type="file" name="image" class="form-control" />
            <?php $frm->validate("image", array("required", "label" => "Image")); // Validating form using form builder written in form.php 
            ?>
          </div>
          <div class="form-group">
            <label class="control-label">Trailer Youtube Link</label>
            <input type="text" name="video" value="<?php echo $row['video_url']; ?>" class="form-control" />
            <?php $frm->validate("video", array("label" => "Image", "max" => "500")); // Validating form using form builder written in form.php 
            ?>
          </div>
          <div class="form-group">
            <button type="submit" name="OK" class="btn btn-success">Update Movie Details</button>
          </div>
        </form>
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<?php
include('footer.php');
?>
<script>
  <?php $frm->applyvalidations("form1"); ?>
</script>