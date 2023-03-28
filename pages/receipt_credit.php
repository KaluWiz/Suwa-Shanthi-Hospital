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
    <title>Home | <?php include('../dist/includes/title.php');?></title>
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
  
    <style type="text/css">
      h5,h6{
        text-align:center;
      }


      @media print {
          .btn-print {
            display:none !important;
          }
      }
    </style>
    
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
      
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">

          <section class="content">
            <div class="row">
	      <div class="col-md-12">
              <div class="">
                
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="">
				<?php
include('../dist/includes/dbcon.php');

$branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select * from branch where branch_id='$branch'")or die(mysqli_error());
  
        $row=mysqli_fetch_array($query);
        
?>      
                  <h5><b><?php echo $row['branch_name'];?></b> </h5>  
                  <h6><?php echo $row['branch_address'];?></h6>
                  <h6>Contact #: <?php echo $row['branch_contact'];?></h6>
                  <h6>Date <?php echo date("M d, Y");?> Time <?php echo date("h:i A");?></h6>
                  <hr>
           <table class="table">
                    <thead>
<?php
include('../dist/includes/dbcon.php');

    $sid=$_REQUEST['sid'];
    $query=mysqli_query($con,"select * from sales natural join customer natural join term where sales.sales_id='$sid'")or die(mysqli_error($con));
      
        $row=mysqli_fetch_array($query);
        $last=$row['cust_last'];
        $first=$row['cust_first'];
        $address=$row['cust_address'];
        $contact=$row['cust_contact'];
        $down=$row['down'];
        $interest=$row['interest'];
        $user_id=$row['user_id'];
        $term=$row['term'];
        $payable_for=$row['payable_for'];
        $due_date=$row['due_date'];
      
         $queryp=mysqli_query($con,"select * from payment where sales_id='$sid'")or die(mysqli_error($con));
      
        $row=mysqli_fetch_array($queryp);
?>                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><h4>OR #: <?php echo $row['payment_id'];?> </h4></th>
                      </tr>    
                      <tr>
                        <th>Customer's Name</th>
                        <th><?php echo $last.", ".$first;?></th>
                        <th>Term</th>
                        <th><?php echo ucwords($term);?> </th>
                      </tr>
                      <tr>
                        <th>Contact #</th>
                        <th><?php echo $contact;?></th>
                        <th>Payable for</th>
                        <th><?php echo $payable_for;?> month/s</th>
                      </tr>
                      <tr>
                        <th>Complete Address</th>
                        <th><?php echo $address;?></th>
                        <th>Due Date</th>
                        <th><?php echo $due_date;?></th>
                      </tr>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Amount Due</th>
                        <th>P<?php echo number_format($row['due'],2);?></th>
                      </tr>
                    </thead>
                  </table>
                  <table class="table">
                    <thead>

                      <tr>
                        <th>QTY</th>
                        <th>Product Code</th>
                        <th>ARTICLES</th>
            						<th>Unit Price</th>
            						<th class="text-right">AMOUNT</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		$query1=mysqli_query($con,"select * from sales natural join sales_details natural join product where sales_id='$sid'")or die(mysqli_error());
			$grand=0;
		while($row1=mysqli_fetch_array($query1)){

				$total= $row1['qty']*$row1['price'];
				$grand=$grand+$total;
        $due=$row1['amount_due'];
        $cid=$row1['cust_id'];
        
		   
?>
                      <tr >
            						<td><?php echo $row1['qty'];?></td>
                        <td><?php echo $row1['serial'];?></td>
                        <td class="record"><?php echo $row1['prod_name'];?></td>
            						<td><?php echo number_format($row1['price'],2);?></td>
            						<td style="text-align:right"><?php echo number_format($total,2);?></td>
                                    
                      </tr>
					  

<?php }?>					
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">Subtotal</td>
                        <td style="text-align:right"><?php echo number_format($grand,2);?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">Interest</td>
                        <td style="text-align:right"><?php echo number_format($interest,2);?></td>
                      </tr>
                      
<?php
    $query2=mysqli_query($con,"select * from payment where sales_id='$sid' and payment<>'0' order by payment_date")or die(mysqli_error($con));
    while($row2=mysqli_fetch_array($query2)){
       
?>                     
                      <tr>
                        
                        <td>Payment for</td>
                        <td style="text-align:right"><?php echo $row2['payment_for'];?></td>
                        <td>Amount Due</td>
                        <td style="text-align:right"><?php echo $row2['due'];?></td>
                        <td class="text-right">Payment</td>
                        <td style="text-align:right"><?php echo $row2['payment'];?></td>
                      </tr>

<?php }?>                      
                      <tr>
                      <th colspan="6" class="text-center"><h4>Upcoming Due Dates</h4></th>
                      </tr>
<?php
    $query2=mysqli_query($con,"select * from payment where sales_id='$sid' and status<>'paid' order by payment_for")or die(mysqli_error($con));
    while($row2=mysqli_fetch_array($query2)){
       
?>                     
                      <tr>
                        
                        <td>Payment for</td>
                        <td style="text-align:right"><?php echo $row2['payment_for'];?></td>
                        <td>Amount Due</td>
                        <td style="text-align:right"><?php echo $row2['due'];?></td>
                        <td class="text-right">Payments</td>
                        <td style="text-align:right"><?php echo $row2['payment'];?></td>
                      </tr>
<?php }?>           
<?php
    $query4=mysqli_query($con,"select balance from customer where cust_id='$cid'")or die(mysqli_error($con));
    $row4=mysqli_fetch_array($query4);
       
?>          
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b>Remaining Balance</b></td>
                        <td style="text-align:right"><b><?php 
                         // $total=$grand+$interest-$row['down'];
                          echo number_format($row4['balance'],2);?></b></td>
                      </tr>

                      <tr>
                        <th>Prepared by: </th>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
<?php
$query2=mysqli_query($con,"select * from user where user_id='$user_id'")or die(mysqli_error($con));  
    $row2=mysqli_fetch_array($query2);

?>                    
                      <tr>
                        <th><?php echo $row2['name'];?> </th>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                     
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->

				</div>	
            <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
                <a class = "btn btn-primary btn-print" href = "home.php"><i class ="glyphicon glyphicon-arrow-left"></i> Back to Homepage</a>   
                  
                  
				</form>	
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
           
          </div><!-- /.row -->
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
     
    </div><!-- ./wrapper -->
	
	
	<script type="text/javascript" src="autosum.js"></script>
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../dist/js/jquery.min.js"></script>
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
   
  </body>
</html>
