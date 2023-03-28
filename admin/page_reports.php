
<?php include 'header.php';

$branch_id = $_GET['id'];

?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       <?php include 'main_sidebar.php';?>

        <!-- top navigation -->
       <?php include 'top_nav.php';?>
        <!-- /top navigation -->

        <!-- page content -->
        <div role="main"> 
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">	
					<div class = "x-panel">
						<div class="right_col" role="main">
								<?php					 
			$branch=$_GET['id'];
			$query=mysqli_query($con,"select * from branch where branch_id='$branch'")or die(mysqli_error());  
			$row=mysqli_fetch_array($query);
        
	?>      
                  <h5><b><?php echo $row['branch_name'];?></b> </h5>  
                  <h6>Address: <?php echo $row['branch_address'];?></h6>
                  <h6>Contact #: <?php echo $row['branch_contact'];?></h6>
				  <h5><b>Product Inventory as of today, <?php echo date("M d, Y h:i a");?></b></h5>
                  
				  <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
				  <a class = "btn btn-primary btn-print" href = "reports.php"><i class ="glyphicon glyphicon-arrow-left"></i> Back to Homepage</a>   

				  
				  
							<div class="row tile_count">
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count">
								<span class="count_top"><i class="fa fa-money"></i> Total Sales</span>
								<?php 
								$year1 = date("Y");
								$month = date("m");
								$branch_id = $_GET['id'];
									$query = mysqli_query($con,"select SUM(payment) as total_payment from payment where MONTH(payment_date)='$month' and YEAR(payment_date)='$year1' and branch_id ='$branch_id' ") or die(mysqli_error($con));
										$row=mysqli_fetch_array($query);
											
								?>
								<div class="count">
									<?php echo $row['total_payment'];?>
								
								</div>
										
								<span class="count_bottom"><i class="green"></i>For the month of  <?php echo date("F",strtotime($month));?>, <?php echo $year1;?></span>
								</div>
								
								<div class="col-md-3 col-sm-3 col-xs-3 tile_stats_count">
								<span class="count_top"><i class="fa fa-money"></i> Total Receivables</span>
								<?php 
								$date = date("M. d, Y");
								$branch_id = $_GET['id'];
									$query = mysqli_query($con,"select SUM(balance) as total_balance from customer where  branch_id ='$branch_id' ") or die(mysqli_error($con));
										$row1=mysqli_fetch_array($query);
											
								?>
								<div class="count green"><?php echo $row1['total_balance'];?></div>
								<span class="count_bottom"><i class="green">Total Receivables as of</i> <?php echo $date;?></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 tile_stats_count">
								<span class="count_top"><i class="fa fa-user"></i> Active Customers</span>
								<?php 
									$query = mysqli_query($con,"select COUNT(*) as total_no_customer from customer where  branch_id ='$branch_id' AND balance !='0' ") or die(mysqli_error($con));
										$row2=mysqli_fetch_array($query);
								?>
								<div class="count"><?php echo $row2['total_no_customer'];?></div>
								<span class="count_bottom"><i class="red">as of today</i></span>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count">
								<span class="count_top"><i class="fa fa-user"></i> Number products re-order</span>
								<?php 
									$query = mysqli_query($con,"select COUNT(*) as total_no_reorder from product where  branch_id ='$branch_id' AND prod_qty <=reorder ") or die(mysqli_error($con));
										$row3=mysqli_fetch_array($query);
								?>
								<div class="count"><?php echo $row3['total_no_reorder'];?></div>
								<span class="count_bottom"><i class="green">as of today</i></span>
								</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="x_panel">
										  <div class="x_title">
											<h2>Total Monthly Sales <small></small></h2>
											<ul class="nav navbar-right panel_toolbox">
											  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											  </li>
											  <li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
												<ul class="dropdown-menu" role="menu">
												  <li><a href="#">Settings 1</a>
												  </li>
												  <li><a href="#">Settings 2</a>
												  </li>
												</ul>
											  </li>
											  <li><a class="close-link"><i class="fa fa-close"></i></a>
											  </li>
											</ul>
											<div class="clearfix"></div>
										  </div>
										  <div class="x_content">
											<div id="graph"></div>
												<table id="example1" class="table table-bordered table-striped">
												<tr>
												<th>MONTH</th>
												<th class="text-right">SALES</th>
											</tr>
			
                    
                    <tbody>
<?php
	$_SESSION['branch']=$_GET['id'];
	$year=date("Y");
	$query=mysqli_query($con,"select *,SUM(payment) as payment,DATE_FORMAT(payment_date,'%b') as month from payment where YEAR(payment_date)='$year' and branch_id='$branch' group by MONTH(payment_date)")or die(mysqli_error($con));
			$total=0;
			while($row=mysqli_fetch_array($query)){
				$total=$total+$row['payment'];	
?>
            
			<tr>
                <th><?php echo$row['month'];?></th>
				<td class="text-right"><b><?php echo number_format($row['payment'],2);?></b></td>
			</tr>
	<?php }?>	
			<tr>
                <th><h2>TOTAL</h2></th>
				<th class="text-right"><h2><b><?php echo number_format($total,2);?></b></h2></td>
			</tr>
	            </tbody>
                    <tfoot>
					
         				  
       
        </tfoot>
       </table>
											
										  </div>
										</div>
							</div>
							</div>
					</div> 
						
						
						
						
						
						
						
						
					</div>								
				</div>
			</div>
        </div>		
        <!-- /page content -->

        <!-- footer content -->
      
        <!-- /footer content -->
      </div>
    </div>
	 <script src="vendors/jquery/dist/jquery.min.js"></script>
	<script src="js/highcharts.js"></script>
    <!-- Bootstrap -->
    <script src="js/exporting.js"></script>
	 
    <!-- FastClick -->
   
	<script type="text/javascript">
    $(document).ready(function() {
      var options = {
              chart: {
                  renderTo: 'graph',
                  type: 'column',
                  marginRight: 20,
                  marginBottom: 25
              },
              title: {
                  text: '',
                  x: -20 //center
              },
              subtitle: {
                  text: '',
                  x: -10
              },
              xAxis: {
                  categories: []
              },
              yAxis: {
                  
                  title: {
                      text: 'Total Monthly Sales'
                  },
                  plotLines: [{
                      value: 0,
                      width: 1,
                      color: '#808080'
                  }]
              },
              tooltip: {
                  formatter: function() {
                          return '<b>'+ this.series.name +'</b><br/>'+  Highcharts.numberFormat(this.y, 0)
                          this.x +': '+ this.y
                          
                  ;
                  }
              },
              legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'top',
                  x: 0,
                  y: 100,
                  borderWidth: 0
              },
              series: []
          }
          
          $.getJSON("data.php", function(json) {
			options.xAxis.categories = json[0]['name'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            
            
            
            chart = new Highcharts.Chart(options);
          });
      });
    </script>
	<?php include 'datatable_script.php';?>
    <!-- /gauge.js -->
  </body>
</html>
