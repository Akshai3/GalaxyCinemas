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
        <li><a href="add_theater.php">Add Theater</a></li>
        <li class="active">Add Theater Details</li>
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
            $th=mysqli_query($con,"select * from tbl_theatre where id='".$_GET['id']."'");
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
        
    </section>
    <!-- /.content -->
  </div>
  <?php
include('footer.php');
?>
<script type="text/javascript">
  var screenid;
  function loadScreendtls()
  {
    $.ajax({
			url: 'get_screen_dtls.php',
			type: 'POST',
			data: 'id='+<?php echo $_GET['id'];?>,
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
  			data: 'id='+<?php echo $_GET['id'];?>,
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
  			data: 'theatre='+<?php echo $_GET['id'];?>+'&name='+name+'&charge='+charge+'&seats='+seats,
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