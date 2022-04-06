<?php
include('header.php');
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
            Manage Snacks
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Manage Snacks</li>
        </ol>
    </section>
    <div class="row">
       
        <div class="col-xs-3 col-sm-3 col-md-3" style="display: flex;">
                  <div class="card" style="width: 18rem; margin-left:10%; margin-top:30%;">
                    <img src="../../images/add.jpg" class="card-img-top" alt="image for this category" width="250px" height="250px">
                    <div class="card-body">
                      <h5 class="card-title"style="margin-left:40%;">Add Category</h5>
                      <p class="card-text"></p>
                      <a href="category.php" class="btn btn-primary" style="margin-left:50%;">Add</a>
                    </div>
                  </div>
                  

                  <div class="card" style="width: 18rem; margin-left:35%; margin-top:30%;">
                    <img src="../../images/addItem.png" class="card-img-top" alt="image for this category" width="250px" height="250px">
                    <div class="card-body">
                      <h5 class="card-title"style="margin-left:40%;">Add New Item</h5>
                      <p class="card-text"></p>
                      <a href="Menu_Manage.php" class="btn btn-primary" style="margin-left:50%;">Add</a>
                    </div>
                  </div>


                  <div class="card" style="width: 18rem; margin-left:35%; margin-top:30%;">
                    <img src="../../images/viewCategory.png" class="card-img-top" alt="image for this category" width="250px" height="250px">
                    <div class="card-body">
                      <h5 class="card-title"style="margin-left:40%;">View Category</h5>
                      <p class="card-text"></p>
                      <a href="view_category.php" class="btn btn-primary" style="margin-left:50%;">View all</a>
                    </div>
                  </div>


                  <div class="card" style="width: 18rem; margin-left:35%; margin-top:30%;">
                    <img src="../../images/viewItem.png" class="card-img-top" alt="image for this category" width="250px" height="250px">
                    <div class="card-body">
                      <h5 class="card-title"style="margin-left:50%;">View Item</h5>
                      <p class="card-text"></p>
                      <a href="view_item.php" class="btn btn-primary" style="margin-left:50%;">View all</a>
                    </div>
                  </div>
                </div>
    
    </div>

</div>
<?php
include('footer.php');
?>
<script type="text/javascript">
    $('#screen').change(function() {
        screen = $(this).val();
        $.ajax({
                url: 'get_showtime.php',
                type: 'POST',
                data: 'screen=' + screen,
                dataType: 'html'
            })
            .done(function(data) {
                //console.log(data);	
                $('#stime').html(data);
            })
            .fail(function() {
                $('#stime').html('<option><i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...</option>');
            });
    });
</script>
<script>
    <?php $frm->applyvalidations("form1"); ?>
</script>