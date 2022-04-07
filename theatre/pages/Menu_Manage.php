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
            Create New item
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Create New Item</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <?php include('../../msgbox.php'); ?>
                <form action="process_menu_manage.php" method="post" enctype="multipart/form-data" id="form1">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input type="text" name="name" class="form-control" />
                        <?php $frm->validate("name", array("required", "label" => "Movie Name")); // Validating form using form builder written in form.php 
                        ?>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <textarea name="desc" class="form-control"></textarea>
                        <?php $frm->validate("desc", array("required", "label" => "Description")); // Validating form using form builder written in form.php 
                        ?>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Price</label>
                        <input type="number" class="form-control" name="price" required min="1">
                        <?php $frm->validate("cast",array("required","label"=>"Cast","regexp"=>"text")); // Validating form using form builder written in form.php ?>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Category</label><br>
                        <select name="categoryId" id="categoryId" class="form-control" required>
						<option hidden disabled selected value>None</option>
                        <?php
                                    $catsql = "SELECT * FROM `tbl_categories`"; 
                                    $catresult = mysqli_query($con, $catsql);
                                    while($row = mysqli_fetch_assoc($catresult)){
                                        $catId = $row['category_id'];
                                        $catName = $row['category_name'];
                                        echo '<option value="' .$catId. '">' .$catName. '</option>';
                                    }
                                ?>
						</select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Image</label>
                        <input type="file" name="image" class="form-control" />
                        <?php $frm->validate("image", array("required", "label" => "Image")); // Validating form using form builder written in form.php 
                        ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="createItem" class="btn btn-success">Create</button>
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