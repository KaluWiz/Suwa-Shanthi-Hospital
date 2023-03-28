<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Elearning | Home</title>
	<link rel="icon" href="psits.png" type="image/x-icon"/>
	<link rel="shortcut icon" href="psits.png" type="image/x-icon"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->

    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <script>
	function showTitle()
	 {
	$("#title").mouseenter(function(){
	$("#more").show(500);
	});
	
	 }
	</script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<?php include('../dist/includes/header.php');?>
		<?php include('../dist/includes/aside.php');?>
      <!-- Left side column. contains the logo and sidebar -->
      

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
	
        <!-- Main content -->
        <section class="content" >
	  <div class="row">
	      <div class="col-md-12">
              <!-- Widget: user widget style 1 -->
		<div class="box box-widget widget-user">
		  <!-- Add the bg color to the header using any of the bg-* classes -->
		  <div class="widget-user-header bg-aqua-active">
		    <h3 class="widget-user-username">Account Settings</h3>
		    <h5 class="widget-user-desc"><a href="" data-target="#teacherlog" class="text-muted" data-toggle="modal">Change Picture</a></h5>
		  </div>
		  <div class="widget-user-image">
		    <img class="img-circle" src="../dist/img/<?php echo $_SESSION['pic'];?>" alt="User Avatar">
		  </div>
		  <div class="box-footer">
		    <div class="row">
		      <div class="col-md-6">
		      <div class="box box-info">
			  <div class="box-header with-border">
			    <h3 class="box-title">Personal Information</h3>
			  </div><!-- /.box-header -->
			  <!-- form start -->
			  <?php
			  include('../dist/includes/dbcon.php');
			  $id=$_SESSION['id'];
			    $query2=mysqli_query($con,"select * from teacher where t_id='$id'")or die(mysqli_error());
				$row1=mysqli_fetch_array($query2);
			  ?>	
			  <form class="form-horizontal" method="post" action="personalinfo_update.php">
			    <div class="box-body">
			      <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Salutation</label>
				<div class="col-sm-5">
				  <select class="form-control" id="tsalut" name="salut" required> 
					<option><?php echo $row1['t_salut'];?></option>
					<option>Mr.</option>
					<option>Ms.</option>
					<option>Mrs.</option>
					<option>Prof.</option>
					<option>Dr.</option>
					
                                     </select>
				</div>
			      </div>
			      <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">First Name</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="inputPassword3" placeholder="First Name" name="first" value="<?php echo $row1['t_first'];?>" required>
				</div>
			      </div>
			      <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name" name="last" value="<?php echo $row1['t_last'];?>" required>
				</div>
			      </div>
			    </div><!-- /.box-body -->
			   
			      <button type="reset" class="btn btn-default pull-right">Cancel</button>
			      <button type="submit" class="btn btn-primary pull-right" name="update"> Update</button>
			   
			  </form><br>
			</div>
			</div>
			<div class="col-md-6">
			<div class="box box-info">
			    <div class="box-header with-border">
			      <h3 class="box-title">Change Username</h3>
			    </div><!-- /.box-header -->
			    <!-- form start -->
			    <form class="form-horizontal" method="post" action="personalinfo_update.php">
			      <div class="box-body">
				<div class="form-group">
				  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
				  <div class="col-sm-10">
				    <input type="text" class="form-control" id="inputEmail3" placeholder="Username" name="username" value="<?php echo $row1['t_user'];?>" required>
				  </div>
				</div>
				<div class="form-group">
				  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				  <div class="col-sm-10"><input type="hidden" class="form-control" id="inputPassword3" name="pass1" value="<?php echo $row1['t_pass'];?>">
				    <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="pass" required>
				  </div>
				</div>
								
			      </div><!-- /.box-body -->
			     
				<button type="reset" class="btn btn-default pull-right">Cancel</button>
				<button type="submit" class="btn btn-primary pull-right" name="updateusername"> Update</button>
			     
			    </form><br>
			  </div>
			  
			  <div class="box box-info">
			    <div class="box-header with-border">
			      <h3 class="box-title"> Change Password </h3>
			    </div><!-- /.box-header -->
			    <!-- form start -->
			    <form class="form-horizontal" method="post" action="personalinfo_update.php">
			      <div class="box-body">
				
				<div class="form-group"><input type="hidden" class="form-control" id="pass1" name="oldpass" value="<?php echo $row1['t_pass'];?>">
				  <label for="inputPassword3" class="col-sm-2 control-label">Old Password</label>
				  <div class="col-sm-10">
				    <input type="password" class="form-control" placeholder="Password" oninput="check1(this)" id="pass2" required>
				  </div>
				</div>
				<div class="form-group">
				  <label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
				  <div class="col-sm-10">
				    <input type="password" class="form-control" placeholder="Password" id="new1" required>
				  </div>
				</div>
				<div class="form-group">
				  <label for="inputPassword3" class="col-sm-2 control-label">Re-type New Password</label>
				  <div class="col-sm-10">
				    <input type="password" class="form-control" placeholder="Password" name="new" id="new2" oninput="check(this)" required>
				  </div>
				</div>
				
			      </div><!-- /.box-body -->
			      
				<button type="submit" class="btn btn-default pull-right">Cancel</button>
				<button type="submit" class="btn btn-primary pull-right" name="updatepass"> Update</button>
			      
			    </form>
			  </div>

			  </div>
		    </div><!-- /.row -->
		  </div>
		</div><!-- /.widget-user -->
	      </div>
	   
            
	  </div><!--row-->
		    
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <div id="teacherlog" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
		  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Upload Picture</h4>
                      </div>
                      <div class="modal-body">
			  <form class="form-horizontal" method="post" action="personalinfo_update.php" enctype="multipart/form-data">
                             <!-- Title -->
                             <div class="form-group">
				  <label class="control-label col-lg-3" for="tuser">Picture</label>
				  <div class="col-lg-8">
                                     <input type="file" class="form-control" id="image" name="image" required>  
				  </div>
                             </div> 
                            
                      </div>       
                      <!--end of modal body-->
                      <div class="modal-footer">
			<button type="submit" name="upload" class="btn btn-primary">Upload</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                      </div>
               </div>
               
               <!--end of modal content-->
                </form>
           </div>
        </div>   
<!--end of teacherlog modal-->+
      <?php include('../dist/includes/footer.php');?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

   
    <script type="text/javascript">

function check(input) {
    if (input.value != document.getElementById('new1').value) {
        input.setCustomValidity('The two passwords must match.');
    } 
		
		else {
        // input is valid -- reset the error message
        input.setCustomValidity('');
   }
}

function check1(input) {
		if (input.value != document.getElementById('pass1').value) {
        input.setCustomValidity('Invalid Password!');
    }

		else {
        // input is valid -- reset the error message
        input.setCustomValidity('');
   }
}
</script>
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../dist/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="../plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
  </body>
</html>
