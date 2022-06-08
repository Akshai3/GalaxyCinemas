<?php
include('header.php');
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Theater Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Theater Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
         <div class="box-header with-border">
              <h3 class="box-title">General Details</h3>
            </div>
        <div class="box-body">
          <?php
            $th=mysqli_query($con,"select * from tbl_theatre where id='".$_SESSION['theatre']."'");
            $theatre=mysqli_fetch_array($th);
          ?>
            <table class="table table-bordered table-hover">
                <tr>
                    <td class="col-md-6">Theater Name</td>
                    <td  class="col-md-6"><?php echo $theatre['name'];?></td>
                </tr>
                <tr>
                    <td>Theater Address</td>
                    <td><?php echo $theatre['address'];?></td>
                </tr>
                <tr>
                    <td>Place</td>
                    <td><?php echo $theatre['place'];?></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><?php echo $theatre['state'];?></td>
                </tr>
                <tr>
                    <td>Pin</td>
                    <td><?php echo $theatre['pin'];?></td>
                </tr>
            </table>
        </div> 
        <!-- /.box-footer-->
      </div>
         <div class="box">
         <div class="box-header with-border">
              <h3 class="box-title">Screen Details</h3>
            </div>
        <div class="box-body" id="screendtls">
          <?php
            $sr=mysqli_query($con,"select * from tbl_screens where t_id='".$_SESSION['theatre']."'");
            if(mysqli_num_rows($sr))
            {
          ?>
            <table class="table table-bordered table-hover">
              <th class="col-md-1">Slno</th>
              <th class="col-md-3">Screen Name</th>
              <th class="col-md-3">Show Time</th>
              <th class="text-right col-md-3"><button data-toggle="modal" data-target="#view-modal" id="getUser" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add Screen</button></th>
                <?php 
                $sl=1;
                while($screen=mysqli_fetch_array($sr))
                {
                  ?>
                  <tr>
                    <td><?php echo $sl;?></td>
                    <td><?php echo $screen['screen_name'];?></td>
                    
                    <?php 
                      $st=mysqli_query($con,"select * from tbl_show_time where screen_id='".$screen['screen_id']."'");
                    ?>
                    <td><?php if(mysqli_num_rows($st)) { while($stm=mysqli_fetch_array($st))
                    { echo date('h:i a',strtotime($stm['start_time']))." ,";}}
                    else
                    {echo "No Show Time Added";}
                    ?></td>
                    <td class="text-right"><button data-toggle="modal" data-id="<?php echo $screen['screen_id'];?>" data-target="#view-modal2" id="getUser2" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add Show Times</button></td>
                  </tr>
                  <?php
                  $sl++;
                }
                ?>
            </table>
            <?php
            }
            else
            {
              ?>
              <button data-toggle="modal" data-target="#view-modal" id="getUser" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add Screen</button>
                    
              <?php
            }
            ?>
        </div> 
        <!-- /.box-footer-->
      </div>

      <div class="box">
         <div class="box-header with-border">
              <h3 class="box-title">Screen Type Details</h3>
            </div>
        <div class="box-body" id="screentydtls">
          <?php
            $sr=mysqli_query($con,"select * from tbl_screentype where screen_id in(select screen_id from  tbl_screens where t_id='".$_SESSION['theatre']."')") ;
            if(mysqli_num_rows($sr))
            {
          ?>
            <table class="table table-bordered table-hover">
              <th class="col-md-1">Slno</th>
              <th class="col-md-3">Screen Name</th>
              <th class="col-md-3">Type Name</th>
              <th class="col-md-3">Seats</th>
              <th class="col-md-3">Charge</th>
              <th class="text-right col-md-3"><button data-toggle="modal" data-target="#view-modal3" id="getUser3" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add Screen Type</button></th>
                <?php 
                $sl=1;
                while($screen=mysqli_fetch_array($sr))
                {
                  ?>
                  <tr>
                    <td><?php echo $sl;?></td>
                    <?php
                  $snm=mysqli_query($con,"select * from tbl_screens where screen_id='".$screen['screen_id']."'");
                  $scnm=mysqli_fetch_array($snm);
                 
                  ?>
                    <td><?php echo $scnm['screen_name'];?></td>
                    <td><?php echo $screen['type_name'];?></td>
                    <td><?php echo $screen['seats'];?></td>
                    <td><?php echo $screen['charge'];?></td>
                  </tr>
                  <?php
                  $sl++;
                }
                ?>
            </table>
            <?php
            }
            else
            {
              ?>
              <button data-toggle="modal" data-target="#view-modal3" id="getUser" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add Screen Type</button>
                    
              <?php
            }
            ?>
        </div> 
        <!-- /.box-footer-->
      </div>




       <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog"> 
                  <div class="modal-content"> 
                  
                       <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">
                            	<i class="fa fa-plus"></i> Add Screen
                            </h4> 
                       </div> 
                       <div class="modal-body"> 
                       
                       	   <div id="modal-loader" style="display: none; text-align: center;">
                       	   	<img src="ajax-loader.gif">
                       	   </div>
                            
                           <!-- content will be load here -->                          
                           <div id="dynamic-content"></div>
                             
                        </div> 
                        <div class="modal-footer"> 
                             
                        </div> 
                        
                 </div> 
              </div>
       </div>
       <div id="view-modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog"> 
                  <div class="modal-content"> 
                  
                       <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">
                            	<i class="fa fa-plus"></i> Add Show Time
                            </h4> 
                       </div> 
                       <div class="modal-body"> 
                           <div class="form-group">
                       	     <label class="control-label">Select Show</label>
                       	     <select name="s_name" id="s_name" class="form-control">
                       	       <option value="0">Select Show</option>
                       	       <option>Noon</option>
                       	       <option>Matinee</option>
                       	       <option>First</option>
                       	       <option>Second</option>
                       	       <option>Others</option>
                       	     </select>
                       	   </div>
                       	   <div class="form-group">
                       	     <label class="control-label">Show Starting Time</label>
                       	     <input type="time" id="s_time" class="form-control"/>
                       	   </div>
                       	   <div class="form-group">
                            <button class="btn btn-success" id="savetime">Save</button>
                          </div>
                        </div> 
                        <div class="modal-footer"> 
                             
                        </div> 
                        
                 </div> 
              </div>
       </div>
       <div id="view-modal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog"> 
                  <div class="modal-content"> 
                  <form action="save_screen_type.php" method="POST">
                       <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">
                            	<i class="fa fa-plus"></i> Add Screen Type
                            </h4> 
                       </div> 
                       <div class="modal-body"> 
                       <div class="form-group">
                       	     <label class="control-label">Select Screen</label>
                       	     <select name="box_id" class="form-control" id="screen">
                              <option value="0">Select Screen</option>
                              <?php
                              $q=mysqli_query($con,"select  * from tbl_screens where t_id='".$_SESSION['theatre']."'");
                              while($th=mysqli_fetch_array($q))
                              {
                             ?>
                            <option value="<?php echo $th['screen_id'];?>"><?php echo $th['screen_name'];?></option>
                            <?php
                              }
                              ?>
                          </select>
                       	   </div>
                       	   <div class="form-group">
                            <label class="control-label">Select Screen Type</label>
                       	     <select name="box_name" id="st_name" class="form-control">
                       	       <option value="0">Select Type</option>
                       	       <option>Gold</option>
                       	       <option>Platinum</option>
                       	       <option>Diamond</option>
                       	     </select>
                       	   </div>
                            <div class="form-group">
                            <input type="number" name="rname" id="rowname" placeholder="Screen Row" class="form-control"/>
                          </div>
                          <div class="form-group">
                          <input type="number" name="cname" id="colname" placeholder="Screen Column" class="form-control"/>
                          </div>
                          <div class="form-group" style="display: flex;">
                          <input style="width:80%;" type="number" name="cseat" id="sename" placeholder="Seats" class="form-control" readonly />
                          <input style="margin-left:5%; background-color:blue;" class="btn btn-success" type="button" value="Calc Seats"  name="calc" onclick="totseat()">
                        </div>
                          <div class="form-group">
                          <input type="number" name="price" id="chname" placeholder="Charge" class="form-control"/> 
                          
                          </div>
                       	   <div class="form-group">
                            <button class="btn btn-success" id="savetype">Save</button>
                          </div>
                        </div> 
                        <div class="modal-footer"> 
                             
                        </div> 
                        </form>
                 </div> 
              </div>
       </div>
    </section>
    <!-- /.content -->
  </div>
  <?php
include('footer.php');
?>
<script type="text/javascript">

function totseat(){
  var row = Number(document.getElementById("rowname").value);
  var col = Number(document.getElementById("colname").value);
  var total = (row * col);
  document.getElementById("sename").value=total;
}

  var screenid;
  function loadScreendtls()
  {
    $.ajax({
			url: 'get_screen_dtls.php',
			type: 'POST',
			data: 'id='+<?php echo $_SESSION['theatre'];?>,
			dataType: 'html'
		})
		.done(function(data){
			//console.log(data);	
			$('#screendtls').html(data);    
		})
		.fail(function(){
			$('#screendtls').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
		  });
  }
  $(document).ready(function(){ // load dynamic bootstrap model
	
	  $(document).on('click', '#getUser', function(e){
		
  		e.preventDefault();
  		
  		$('#dynamic-content').html(''); // leave it blank before ajax call
  		$('#modal-loader').show();      // load ajax loader
  		
  		$.ajax({
  			url: 'add_screen_form.php',
  			type: 'POST',
  			data: 'id='+<?php echo $_SESSION['theatre'];?>,
  			dataType: 'html'
  		})
  		.done(function(data){
  			console.log(data);	
  			$('#dynamic-content').html('');    
  			$('#dynamic-content').html(data); // load response 
  			$('#modal-loader').hide();		  // hide ajax loader	
  		})
  		.fail(function(){
  			$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
  			$('#modal-loader').hide();
  		});
  		
  	});
	
});
$(document).on('click', '#savescreen', function(){
  name=$('#sname').val();
  seats=$('#sseats').val();
  charge=$('#scharge').val();
  if(name=="" && seats=="" && charge=="")
  {
    alert("Enter Correct Details");
  }
  else if(seats=="" && name=="")
  {
    alert("Enter Correct Details");
  }
  else if(charge=="" && name=="")
  {
    alert("Enter Correct Details");
  }
  else if(charge=="" && seats=="")
  {
    alert("Enter Correct Details");
  }
  else if(charge=="")
  {
    alert("Enter Correct Details");
  }
   else if(seats=="")
  {
    alert("Enter Correct Details");
  }
   else if(name=="")
  {
    alert("Enter Correct Details");
  }
  else
  {
    $.ajax({
  			url: 'save_screen.php',
  			type: 'POST',
  			data: 'theatre='+<?php echo $_SESSION['theatre'];?>+'&name='+name,
  			dataType: 'html'
  		})
  		.done(function(data){
  			loadScreendtls();
  			$('#view-modal').modal('toggle');
  		})
  		.fail(function(){
  			loadScreendtls();
  			$('#view-modal').modal('toggle');
  		});
  }
  
});

$(document).on('click', '#getUser2', function(e){

    screenid=$(this).data("id");//screen id
});
$('#savetime').click(function(){
  s_time=$('#s_time').val();
  s_name=$('#s_name').val();
  if(s_time=="" && s_name=="0")
  {
    alert("Enter valid details");
  }
  else if(s_time=="")
  {
      alert("Enter valid details");
  }
  else if(s_name=="0")
  {
      alert("Enter valid details");
  }
  else
  {
    $.ajax({
  		url: 'save_time.php',
  		type: 'POST',
  		data: 'screen='+screenid+'&time='+s_time+'&sname='+s_name,
  		dataType: 'html'
  	})
  	.done(function(data){
  		loadScreendtls();
  		$('#s_time').val('');
  		$('#s_name').val('0');
  		$('#view-modal2').modal('toggle');
  	})
  	.fail(function(){
  		loadScreendtls();
  		$('#view-modal2').modal('toggle');
  	});
  }
  
});

</script>