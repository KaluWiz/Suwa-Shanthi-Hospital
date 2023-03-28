<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if(empty($_SESSION['branch'])):
header('Location:../index.php');
endif;

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer Account | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <style>
      img.profile_pic {
    width: 152px;
    height: 125px;
    border: 5px solid #ccc;
}
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-<?php echo $_SESSION['skin'];?> layout-top-nav">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');
      include('../dist/includes/dbcon.php');
      ?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
        
          <?php
          if(isset($_REQUEST['cid']))
            {
              $cid=$_REQUEST['cid'];
            }
            else
            {
            $cid=$_POST['cid'];
          }
          ?>
            <h1>
              <a class="btn btn-lg btn-warning" href="customer.php">Back</a>
              
            </h1>
            
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="" enctype="multipart/form-data">
		  <?php
		    
		      $query=mysqli_query($con,"select * from customer where cust_id='$cid'")or die(mysqli_error());
			       $row=mysqli_fetch_array($query);
		  ?>	
		    <img class = "profile_pic" src = "../dist/uploads/<?php echo $row['cust_pic'];?>">
                  <div class="form-group">
                    <label for="date">Customer Name</label>
                    <div class="input-group col-md-12">
                      <h3><?php echo $row['cust_last'].", ".$row['cust_first'];?></h3>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
		  
                  <div class="form-group">
                    <label for="date">Address</label>
                    <div class="input-group col-md-12">
                      <?php echo $row['cust_address'];?>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Contact</label>
                    <div class="input-group col-md-12">
                      <?php echo $row['cust_contact'];?>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Balance</label>
                    <div class="input-group col-md-12">
                      <h3><?php echo number_format($row['balance'],2);?></h3>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <a href="<?php if ($row['balance']<=0) echo "transaction.php?cid=$cid";?>" class="btn btn-block btn-primary">
                  <i class="glyphicon glyphicon-shopping-cart text-blue"></i>Add New Order</a>
                
				</form>	
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
            <div class="col-xs-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class=""><a href="#fa-icons" data-toggle="tab" aria-expanded="true">Credit History</a></li>
                  <li class=""><a href="#cash" data-toggle="tab">Cash History</a></li>
                  <li class=""><a href="#payments" data-toggle="tab" aria-expanded="false">Payments</a></li>
                </ul>
                <div class="tab-content">
                  <!-- Font Awesome Icons -->
                  
                  <div class="tab-pane active" id="fa-icons">
                    <table id="" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Credit #</th>                      
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Term</th>
                        <th>Payable for</th>
                        <th>Amount Due</th>
                        <th>Order Date</th>
                        <th>Due Date</th>
                        <th>Payment Status</th>
                        <th>View</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
   // $cid=$_REQUEST['cid'];
    $query1=mysqli_query($con,"select * from sales natural join sales_details natural join product natural join term where cust_id='$cid' order by date_added desc")or die(mysqli_error($con));
    while($row1=mysqli_fetch_array($query1)){
    
?>
                      <tr>
                        <td><?php echo $row1['term_id'];?></td>
                        <td><?php echo $row1['qty'];?></td>
                        <td><?php echo $row1['prod_name'];?></td>
                        <td><?php echo $row1['prod_price'];?></td>
                        <td><?php echo $row1['term'];?></td>
                        <td><?php echo $row1['payable_for'];?> month/s</td>
                        <td><?php echo $row1['due'];?></td>
                        <td><?php echo date("M d, Y",strtotime($row1['date_added']));?></td>
                       <td><?php echo date("M d, Y",strtotime($row1['due_date']));?></td>
                        <td><?php 
                        if ($row1['status']=='paid') 
                        echo "<span class='badge bg-green'>".$row1['status']."</span>";
                        else echo "<span class='badge bg-red'>unpaid</span>";
                        ?>

                      </td>
                      <td>
                        <a href="payment.php?cid=<?php echo $row['cust_id'];?>&sid=<?php echo $row1['sales_id'];?>"><i class="glyphicon glyphicon-share-alt"></i></a>
                        <a href="reprint.php?sid=<?php echo $row1['sales_id'];?>"><i class="glyphicon glyphicon-print"></i></a>
                        <a href="print.php?sid=<?php echo $row1['sales_id'];?>&cid=<?php echo $row['cust_id'];?>"><i class="glyphicon glyphicon-list"></i></a>
                      </td>  
                      </tr>
    <?php }?>       
                      </tbody>
                  
                  </table>
                  </div><!-- /#fa-icons -->

                  <div class="tab-pane" id="cash">
                    <table id="" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Transaction #</th>                      
                        <th>Product</th>
                        <th>Product Code</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Amount</th>
                        <th>Date Paid</th>
                        <th>Reprint</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
   // $cid=$_REQUEST['cid'];
    $query1=mysqli_query($con,"select * from sales natural join sales_details natural join product where cust_id='$cid' and modeofpayment='cash' order by date_added desc")or die(mysqli_error($con));
    while($row1=mysqli_fetch_array($query1)){
    
?>
                      <tr>
                        <td><?php echo $row1['sales_id'];?></td>
                        <td><?php echo $row1['prod_name'];?></td>
                        <td><?php echo $row1['serial'];?> month/s</td>
                        <td><?php echo $row1['prod_price'];?></td>
                        <td><?php echo $row1['qty'];?></td>
                        <td><?php echo number_format($row1['total'],2);?></td>
                        <td><?php echo date("M d, Y",strtotime($row1['date_added']));?></td>
                        <td><a href="reprint_cash.php?sid=<?php echo $row1['sales_id'];?>"><i class="glyphicon glyphicon-print"></i></a>
                      </td>  
                      </tr>
    <?php }?>       
                      </tbody>
                  
                  </table>
                  </div><!-- /#fa-icons -->
                  <!-- glyphicons-->
                  <div class="tab-pane" id="payments">
                    <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Amount Paid</th>
                        <th>Due Date</th>
                        <th>Date of Payment</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    $cid=$_REQUEST['cid'];
    $query3=mysqli_query($con,"select * from payment natural join sales_details natural join product where cust_id='$cid' and status='paid' order by payment_date desc")or die(mysqli_error());
    while($row3=mysqli_fetch_array($query3)){
    
?>
                      <tr>
                        <td><?php echo $row3['serial'];?></td>
                        <td><?php echo $row3['prod_name'];?></td>
                        <td><?php echo $row3['payment'];?></td>
                        <td><?php echo date("M d, Y",strtotime($row3['payment_for']));?></td>
                        <td><?php echo date("M d, Y",strtotime($row3['payment_date']));?></td>
    
                        
                      </tr>
    <?php }?>       
                    </tbody>
                  
                  </table>
                    
                  </div><!-- /#ion-icons -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div>
          </div><!-- /.row -->
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->
<?php
   // $cid=$_REQUEST['cid'];
    $query4=mysqli_query($con,"select * from term natural join sales where cust_id='$cid' order by term_id desc limit 0,1")or die(mysqli_error($con));
      $row1=mysqli_fetch_array($query4);    
?>    
<div id="teacherreg" class="modal fade in primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
		  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"><i class="glyphicon glyphicon-plus" style="font-size:30px;"></i>Add Payment</h4>
                      </div>
                      <div class="modal-body">
			  <form class="form-horizontal" method="post" action="payment_add.php" enctype='multipart/form-data'>
                             <input type="hidden" class="form-control" id="tlast" name="cid" value="<?php echo $cid;?>">  
                             <input type="hidden" class="form-control" id="tlast" name="term" value="<?php echo $row1['term'];?>">   
                             <div class="form-group">
          <label class="control-label col-lg-3" for="tlast">Payment for</label>
          <div class="col-lg-8">
            <select class="form-control select2" style="width:100%" name="payment_for" required>
                <?php
                   $query3=mysqli_query($con,"select * from payment where cust_id='$cid' and payment='0'")or die(mysqli_error($con));
                      while($row3=mysqli_fetch_array($query3)){
                ?>
                    <option value="<?php echo $row3['payment_for'];?>"><?php echo date("M d, Y",strtotime($row3['payment_for']));?></option>
                  <?php }?>
                </select>
          </div>
             </div> 
                            
                             <div class="form-group">
				  <label class="control-label col-lg-3" for="tlast">Amount</label>
				  <div class="col-lg-8">
            <input type="hidden" class="form-control" id="tlast" name="balance" value="<?php echo $row['balance'];?>">  
                                     <input type="text" class="form-control" id="tlast" name="amount" placeholder="Amount" required>  
				  </div>
                             </div> 
                            
                      </div>       
                      <!--end of modal body-->
                      <div class="modal-footer">
			<button type="submit" name="save" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                      </div>
               </div>
               
               <!--end of modal content-->
                </form>
           </div>
        </div>   
<!--end of teacherreg modal-->
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    
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
     <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>
