<?php
include('header.php');
?>
<link rel="stylesheet" href="../../validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="../../validation/dist/js/bootstrapValidator.js"></script>
  <!-- =============================================== -->
  <?php
    include('../../form.php');
    $frm=new formBuilder;      
  ?> 
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Create category</li>
      </ol>
    </section>
<!-- Main content -->
<section class="content">

<!-- Default box --> 
<div class="box">
  <div class="box-body">
    <?php include('../../msgbox.php');?>
    <form action="process_category.php" method="post" enctype="multipart/form-data" id="form1">
     <!-- Table Panel -->
     <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                    <table class="table table-bordered table-hover mb-0">
                        <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th class="text-center" >Id</th>
                            <th class="text-center">Img</th>
                            <th class="text-center">Category Detail</th>
                            <th class="text-center" style="width: 15%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $sql = "SELECT * FROM `tbl_categories`"; 
                            $result = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $catId = $row['category_id'];
                                $catName = $row['category_name'];
                                $catDesc = $row['category_desc'];
                                $img = $row['image'];

                                echo '<tr>
                                        <td class="text-center"><b>' .$catId. '</b></td>';?>
                                        <td><img src="../../images/<?php echo $row['image'];?>" width="150px" height="150px"></td>
                            <?php echo '     <td>
                                            <p>Name : <b>' .$catName. '</b></p>
                                            <p>Description : <b class="truncate">' .$catDesc. '</b></p>
                                        </td>
                                        <td class="text-center">
                                        <form action="#" method="POST">
                                            <div class="row mx-auto" style="display:flex; margin-left:8%;">
                                            <div class="col">
                                            <button class="btn btn-sm btn-primary edit_cat" type="button" data-toggle="modal" data-target="#updateCat' .$catId. '">Edit</button>
                                            </div>
                                            <div class="col">
                                                <button name="removeCategory" type="button" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                                                </div>
                                                </div>
                                                <input type="hidden" name="catId" value="'.$catId. '">
                                            </form>
                                        </td>
                                    </tr>';
                            }
                        ?> 
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <!-- Table Panel -->
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
        <?php $frm->applyvalidations("form1");?>
    </script>



