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
    <title>Creditor Application | <?php include('../dist/includes/title.php');?></title>
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
            <h1>
              <a class="btn btn-lg btn-warning" href="home.php">Back</a>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Customer</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
	           <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Apply As New Creditor</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="creditor_add.php" enctype="multipart/form-data" class="form-horizontal">
                  <div class="row">
                    <div class="col-md-4">
          					  <label for="date">Last Name</label>
                      <div class="input-group col-md-12">
            						<div class="input-group col-sm-12">
            						  <input type="text" class="form-control pull-right" id="date" name="last" placeholder="Last Name" required>
            						</div><!-- /.input group -->
          					  </div><!-- /.form group -->
                    </div>
                    
                    <div class="col-md-4">  
                      <label for="date">First Name</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="first" placeholder="First Name" required>
                      </div><!-- /.input group -->
                      
                    </div>
                    <div class="col-md-4">  
                      <label for="date">Middle Initial</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="mi" placeholder="Middle Initial" required>
                        </div><!-- /.input group -->
                      </div><!-- /.form group -->
                  </div><!--row-->
                  <div class="row">
                    <div class="col-md-4">  
                      <label for="date">Birthday</label>
                      <div class="input-group col-md-12">
                          <input type="date" class="form-control pull-right" id="date" name="bday" placeholder="Customer First Name" required>
                      </div><!-- /.input group -->
                    </div>

                    <div class="col-md-4">
                      <label for="date">Nick Name</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="nickname" placeholder="Nicknamer" required>
                        </div>
                    </div>
                    
                   </div>
                  <div class="row">
                    <div class="col-md-8">  
                      <label for="date">Present Home Address</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="address" placeholder="Customer Complete Address" required>
                      </div><!-- /.input group -->
                    </div>
                    <div class="col-md-4">  
                      <label for="date">Tel # and Cellphone #</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="contact" placeholder="Customer Contact #" required>
                      </div><!-- /.input group -->
                    </div>
                  
                  </div><!--row-->  
                  <div class="row">
                    <div class="col-md-6">  
                      <label for="date">House Status</label>
                      <div class="input-group col-md-6">
                          <input type="radio" name="house_status" value="owned">Owned
                          <input type="text" class="form-control pull-right" id="date" name="years" placeholder="# of years">
                      </div>

                    </div>
                    <div class="col-md-6">  
                      <label for="date"></label>
                      <div class="input-group col-md-6">
                          <input type="radio" name="house_status" value="rent">Rent
                          <input type="text" class="form-control pull-right" id="date" name="years" placeholder="# of years">
                      </div>

                    </div>


                    <div class="col-md-12">
                      <label for="date">If renting</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="rent" placeholder="Landlord Name, Address, Contact Number">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                      <label for="date">Name of Employer or Business</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="emp_name" placeholder="Employer Name or Business">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="date">Employer/Business Contact #</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="emp_no" placeholder="Employer Name or Business Contact Number">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="date">Employer or Business Address</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="emp_address" placeholder="Employer Name or Business Address">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="date">Years Employed or in Business</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="emp_year" placeholder="Years of Employment/Business">
                        </div>  
                      </div>  
                    <div class="col-md-6">
                      <label for="date">Occupation</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="occupation" placeholder="Creditor's Occupation">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="date">Monthly Salary/ Net Business Income</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="salary" placeholder="Employer Name or Business">
                        </div>  
                      </div>    
                    <div class="col-md-6">
                      <label for="date">Spouse Name</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="spouse" placeholder="Complete Name of Spouse">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="date">Cellphone Number</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="spouse_no" placeholder="Spouse Contact Number">
                        </div>  
                      </div>    
                    <div class="col-md-6">
                      <label for="date">Spouse Employer or Business</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="spouse_emp" placeholder="Spouse Employer or Business">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="date">Spouse Employer or Business Address & Telephone Number</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="spouse_details" placeholder="Spouse Employer or Business Address & Telephone Number">
                        </div>  
                      </div>  
                    <div class="col-md-12">
                      <label for="date">Spouse Monthly Income</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="spouse_income" placeholder="Spouse Monthly Income">
                        </div>  
                      </div>
                      <div class="col-md-6">
                      <label for="date">Name of Co-Maker (If required)</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="comaker" placeholder="Name of Co-Maker">
                        </div>  
                      </div>
                    <div class="col-md-6">
                      <label for="date">Present Home Address & Telephone # of Co-Maker</label>
                      <div class="input-group col-md-12">
                          <input type="text" class="form-control pull-right" id="date" name="comaker_details" placeholder="Present Home Address & Telephone # of Co-Maker">
                        </div>  
                      </div>    
                    
                  </div><!--row-->     
                    <div class="col-md-12">
                       <div class="col-md-12">
                        <button class="btn btn-lg btn-primary pull-right" id="daterange-btn" name="">Submit</button>
					</div>	
                    </div>  
					
				  </form>	

                
        
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          
            
            

          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->

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
