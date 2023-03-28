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
    <title>EBrgy | Settings</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

	<script type="text/javascript" src="../plugins/select2/select2.full.js"></script>
	<link href="../plugins/select2/select2.full.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript">
  $('select').select2();
</script>
	</script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

     <?php include('../dist/includes/header.php');?>
		<?php include('../dist/includes/aside.php');?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Settings
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Settings</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-4">

              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">List of Terms</h3><a href="#addterm" data-target="#addterm" data-toggle="modal" style="color:#fff;" class="pull-right"><i class="glyphicon glyphicon-plus-sign text-blue"></i></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Start of Term</th>
			<th>End of Term</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		include('../dist/includes/dbcon.php');
		
		$query=mysqli_query($con,"select * from term order by term_end desc")or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){
		
?>
                      <tr>
			<td><?php echo date("M d, Y",strtotime($row['term_start']));?></td>
			<td><?php echo date("M d, Y",strtotime($row['term_end']));?></td>
			<td><a href="#updateterm<?php echo $row['term_id'];?>" data-target="#updateterm<?php echo $row['term_id'];?>" data-toggle="modal" style="color:#fff;"><i class="glyphicon glyphicon-edit text-blue"></i></a></td>
                        
                      </tr>
<div id="updateterm<?php echo $row['term_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Term Details</h4>
              </div>
              <div class="modal-body">
		<form class="form-horizontal" method="post" action="settings_update.php">
                <div class="form-group">
		  <label class="control-label col-lg-3" for="start">Start of Term</label>
		  <div class="col-lg-9"><input type="hidden" value="<?php echo $row['term_id'];?>" name="id">  
                        <input type="date" class="form-control" id="start" name="start" value="<?php echo $row['term_start'];?>">  
		  </div>
                </div> 
		<div class="form-group">
		  <label class="control-label col-lg-3" for="end">End of Term</label>
		  <div class="col-lg-9">
                        <input type="date" class="form-control" id="end" name="end" value="<?php echo $row['term_end'];?>">  
		  </div>
                </div><br><br> 		
              </div>
              <div class="modal-footer">
		<button type="submit" class="btn btn-primary" name="updateterm">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div></form>
            </div>
			
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->                    
<?php }?>					  
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Start of Term</th>
			<th>End of Term</th>
                        <th>Action</th>
                      </tr>					  
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			
<?php

	$settings=mysqli_query($con,"select * from settings natural join term")or die(mysqli_error());
	  $rowset=mysqli_fetch_array($settings);
		
?>

	    <div class="col-md-4">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Census Year</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
		<form method="POST" action="settings_add.php">
                  <div class="form-group">
                    <label for="year">Current Census Year</label>
                    <div class="form-group">
                      <input type="number" class="form-control pull-right" id="year" name="year" value="<?php echo $rowset['census_year'];?>" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
		  <div class="form-group">
                    <label>Current Term</label>
                    <select class="form-control" style="width: 100%;" name="term" required>
			    <option value="<?php echo $rowset['term_id'];?>"><?php echo date("M d, Y",strtotime($rowset['term_start']))." - ".date("M d, Y",strtotime($rowset['term_end']));?></option>
                      <?php
				$query2=mysqli_query($con,"select * from term order by term_end desc")or die(mysqli_error());
					while($row2=mysqli_fetch_array($query2)){						
		      ?>
					<option value="<?php echo $row2['term_id'];?>"><?php echo date("M d, Y",strtotime($row2['term_start']))." - ".date("M d, Y",strtotime($row2['term_end']));?></option>
		      <?php }?>
                    </select>
                  </div><!-- /.form-group -->
                  <!-- Date and time range -->
                  <div class="form-group">
                    
                    <div class="input-group">
                      <button class="btn btn-primary" id="daterange-btn" name="">
                        Save
                      </button>
		      <button class="btn" id="daterange-btn">
                        Clear
                      </button>
                    </div>
                  </div><!-- /.form group -->
				</form>	
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- iCheck -->
            
            </div><!-- /.col (right) -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
      
<div id="addterm" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add New Term</h4>
              </div>
              <div class="modal-body">
		<form class="form-horizontal" method="post" action="settings_update.php">
                <div class="form-group">
		  <label class="control-label col-lg-3" for="start">Start of Term</label>
		  <div class="col-lg-9">
                        <input type="date" class="form-control" id="start" name="start">  
		  </div>
                </div> 
		<div class="form-group">
		  <label class="control-label col-lg-3" for="end">End of Term</label>
		  <div class="col-lg-9">
                        <input type="date" class="form-control" id="end" name="end">  
		  </div>
                </div><br><br> 		
              </div>
              <div class="modal-footer">
		<button type="submit" class="btn btn-primary" name="addterm">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div></form>
            </div>
			
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->                    

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
