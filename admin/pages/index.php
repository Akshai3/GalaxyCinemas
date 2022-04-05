<?php
include('header.php');
?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Movies List
    </h1>
    <ol class="breadcrumb">
      <li><a href="index"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="box box-primary">
          <!-- /.box-header -->
          <div class="box-body">
            <?php include('../../msgbox.php'); ?>
            <ul class="todo-list">
              <?php
              $qry7 = mysqli_query($con, "select * from tbl_movie");
              if (mysqli_num_rows($qry7)) {
                while ($c = mysqli_fetch_array($qry7)) {
              ?>
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fa fa-film"></i>

                    </span>
                    <!-- checkbox -->
                    <!-- todo text -->
                    <span class="text"><?php echo $c['movie_name']; ?></span>
                    <!-- Emphasis label -->

                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <button class="fa fa-wrench" onclick="re(<?php echo $c['movie_id']; ?>)"></button>

                      <button class="fa fa-trash-o" onclick="del(<?php echo $c['movie_id']; ?>)"></button>  
                    </div>
                  </li>
              <?php
                }
              }
              ?>

          </div>
        </div>
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>



  <!-- Content Header (Theatre list) -->
  <section class="content-header">
    <h1>
      Theatre List
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="box box-primary">
          <!-- /.box-header -->
          <div class="box-body">
            <?php include('../../msgbox.php'); ?>
            <ul class="todo-list">
              <?php
              $qry7 = mysqli_query($con, "select * from tbl_theatre");
              if (mysqli_num_rows($qry7)) {
                while ($c = mysqli_fetch_array($qry7)) {
              ?>
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fa fa-film"></i>

                    </span>
                    <!-- checkbox -->
                    <!-- todo text -->
                    <span class="text"><?php echo $c['name']; ?></span>
                    <!-- Emphasis label -->

                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                    <button class="fa fa-wrench" onclick="te(<?php echo $c['id']; ?>)"></button>

                    </div>
                  </li>
              <?php
                }
              }
              ?>

          </div>
        </div>
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>




  <!-- Content Header (News list) -->
  <section class="content-header">
    <h1>
      Upcoming Movies
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="box box-primary">
          <!-- /.box-header -->
          <div class="box-body">
            <?php include('../../msgbox.php'); ?>
            <ul class="todo-list">
              <?php
              $qry7 = mysqli_query($con, "select * from tbl_news");
              if (mysqli_num_rows($qry7)) {
                while ($c = mysqli_fetch_array($qry7)) {
              ?>
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fa fa-film"></i>

                    </span>
                    <!-- checkbox -->
                    <!-- todo text -->
                    <span class="text"><?php echo $c['name']; ?></span>
                    <!-- Emphasis label -->

                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                    <button class="fa fa-wrench" onclick="ue(<?php echo $c['news_id']; ?>)"></button>

                    <button class="fa fa-trash-o" onclick="umDel(<?php echo $c['news_id']; ?>)"></button>
                    </div>
                  </li>
              <?php
                }
              }
              ?>

          </div>
        </div>
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
  function del(m) {
    if (confirm("Are you want to delete this movie") == true) {
      window.location = "process_delete_movie.php?mid=" + m;
    }
  }

  function umDel(m) {
    if (confirm("Are you want to delete this movie") == true) {
      window.location = "process_delete_UpcomingMovie.php?mid=" + m;
    }
  }

  function re(m) {
    window.location = "EditMovieList.php?mid=" + m;
  }


  function te(m) {
    window.location = "EditTheatreList.php?mid=" + m;
  }

  function ue(m) {
    window.location = "EditUpcomingList.php?mid=" + m;
  }
</script>