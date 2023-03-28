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
              <div class="col-md-12">

              </div>
                
                <div class="box-body">

                  <!-- Date range -->
                  <form method="post" action="transaction_add.php">
<?php
include('../dist/includes/dbcon.php');
$id=$_SESSION['id'];
$branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select * from branch where branch_id='$branch'")or die(mysqli_error());
  
        $row=mysqli_fetch_array($query);
        
?>			
                  <h5><b><?php echo $row['branch_name'];?></b> </h5>  
                  <h6><?php echo $row['branch_address'];?></h6>
                  <h6>Contact #: <?php echo $row['branch_contact'];?></h6>
                  <h6 class="text-right">Date <?php echo date("M d, Y");?></h6>
                  <hr>
                   <table class="table">
                    <thead>
<?php

    $branch=$_SESSION['branch'];
    $sid=$_REQUEST['sid'];
    $cid=$_REQUEST['cid'];
    $query=mysqli_query($con,"select * from customer natural join sales natural join term natural join product where cust_id='$cid'")or die(mysqli_error($con));
      
        $row=mysqli_fetch_array($query);
        $last=$row['cust_last'];
        $first=$row['cust_first'];
        $address=$row['cust_address'];
        $contact=$row['cust_contact'];
        
?>                    <tr>
                        <th>Customer's Name: </th>
                        <th><?php echo $last.", ".$first;?></th>
                      </tr>
                      <tr>
                        <th>Product Name:</th>
                        <th><?php echo $row['prod_name'];?></th>
                      </tr>
                      <tr>
                        <th>Product Serial #</th>
                        <th><?php echo $row['serial'];?></th>
                      </tr>
                    </thead>
                  </table>
                  <h4 class="text-center">CUSTOMER’S UNDERTAKING AND RESPONSIBILITIES</h4>

<p><b>1.)</b> Item delivered is understood to be in order and without defect if the customer has affixed his/ her signature below.</p>

<p><b>2.)</b> To pay the monthly installment on time and in case of default, a 3% monthly penalty on present balance will be impose.</p>

<p><b>3.)</b> Payments to the office or collectors should be receipted or documented by an AHIRA MARKETING official receipt. Payments with no receipts and unauthorized receipts will not be honored.</p>

<p><b>4.)</b> Not to lend, hire, sell, or pledge the PRODUCT until the balance is fully paid.</p>

<p><b>5.)</b> Not to remove/ transfer the product from the residence or place agreed upon without the consent of AHIRA MARKETING.</p>

<p><b>6.)</b> Failure to pay two (2) or more monthly installments, the unit/ product will be voluntarily deposited, and the customer shall allow AHIRA MARKETING REPRESENTATIVE to enter the premises and pull out the unit/ product.</p>

<p><b>7.)</b> In cases of legal matters, all legal expenses (filling fees, attorney’s fees, ETC.) pertaining to legal problems will be shouldered by the customer.</p>

<p><b>8.)</b> Strictly NO REFUNDS of whatever payments made if the unit/ product will be repossessed.</p>

<p>I acknowledge and fully understood and read the contents of this undertaking listed above from numbers 1 to 8. And below I affix my signature for conformity and acceptance of my obligation.</p>
                  <table class="table">
                    <thead>
                        
                      <tr><br>
                        <th>____________________________________________</th>
                        <th>Regular Cash Price</th>
                        <th><?php echo number_format($row['prod_price'],2);?></th>
                      </tr>
                      <tr>
                        <th>Customer’s printed name and signature/ Date</th>
                        <th>Downpayment</th>
            						<th><?php echo $row['down'];?></th>
                      </tr>
                      <tr>
                        <th></th>
                        <th><?php echo $row['serial'];?></th>
                        <th><?php   ?></th>
                      </tr>
                      <tr>
                        <th></th>
                        <th>Term</th>
                        <th><?php  echo $row['term']; ?></th>
                      </tr>
                      <tr>
                        <th></th>
                        <th><?php echo $row['payable_for'];?> month/s</th>
                        <th><?php echo $row['due'];?></th>
                      </tr>
                      
                      <tr>
                        <th></th>
                        <th>REBATE/Month</th>
                        <th><?php   ?></th>
                      </tr>
                      <tr>
                        <th>Schedule</th>
                        
                      </tr>
<?php
    $query2=mysqli_query($con,"select * from payment where sales_id='$sid' and payment='0' order by payment_date")or die(mysqli_error($con));
    while($row2=mysqli_fetch_array($query2)){
       
?>                     
                      <tr>
                        
                        <td>Due Date</td>
                        <td style="text-align:right"><?php echo $row2['payment_for'];?></td>
                        <td>Amount Due</td>
                        <td style="text-align:right"><?php echo $row2['due'];?></td>
                       
                      </tr>
<?php }?>                      <tr>
                        <th>Remarks:<br>
                        <p></p></th>
                      </tr>
                    </thead>
                    <tbody>

                </div><!-- /.box-body -->
				</div>  
				</form>	
                </div><!-- /.box-body -->
                <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
                <a class = "btn btn-primary btn-print" href = "home.php"><i class ="glyphicon glyphicon-arrow-left"></i> Back to Homepage</a>
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
