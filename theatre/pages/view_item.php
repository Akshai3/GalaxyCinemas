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
        <?php include('../../msgbox.php'); ?>
        <form action="process_category.php" method="post" enctype="multipart/form-data" id="form1">
          <!-- Table Panel -->
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-body">
                <table class="table table-bordered table-hover mb-0">
                  <thead style="background-color: rgb(111 202 203);">
                    <tr>
                      <th class="text-center">Cat. Id</th>
                      <th class="text-center">Img</th>
                      <th class="text-center">Item Detail</th>
                      <th class="text-center" style="width: 15%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM `tbl_snacks`";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                      $pizzaId = $row['snackId'];
                      $pizzaName = $row['snackName'];
                      $pizzaPrice = $row['snackPrice'];
                      $pizzaDesc = $row['snackDesc'];
                      $pizzaCategorieId = $row['snackCategoryId'];
                      $img = $row['image'];

                      echo '<tr>
                                            <td class="text-center">' . $pizzaCategorieId . '</td>'; ?>
                      <td>
                        <img src="../../images/<?php echo $row['image']; ?>" width="150px" height="150px" alt="image for this item">

                      </td>
                    <?php echo '<td>
                                                <p>Name : <b>' . $pizzaName . '</b></p>
                                                <p>Description : <b class="truncate">' . $pizzaDesc . '</b></p>
                                                <p>Price : <b>' . $pizzaPrice . '</b></p>
                                            </td>
                                            <td class="text-center">
                        <form action="#" method="POST">
												<div class="row mx-auto" style="display:flex; margin-left:8%;">
                          <div class="col">
                              <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#updateItem' . $pizzaId . '">Edit</button>
                          </div>
                          <div class="col">
                              <button name="removeItem" type="button" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                          </div>
												</div>
                        <input type="hidden" name="pizzaId" value="' . $pizzaId . '">
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
      </div>
    </div>
</div>


<?php
include('footer.php');
?>

<script>
  <?php $frm->applyvalidations("form1"); ?>
</script>