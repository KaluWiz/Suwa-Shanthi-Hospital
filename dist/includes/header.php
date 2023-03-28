<style>
     .skin-red .main-header .navbar {
    background-color: #184962;
}
</style>


<?php
//session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
date_default_timezone_set("Asia/Manila"); 
?>
<?php
include('../dist/includes/dbcon.php');

$branch=$_SESSION['branch'];
$query=mysqli_query($con,"select * from branch where branch_id='$branch'")or die(mysqli_error($con));
  $row=mysqli_fetch_array($query);
           $branch_name=$row['branch_name'];
?>


                        

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header" >
           
              <a href="home.php" class="navbar-brand"> <img src="../images/logo1.png" alt="" width="210" height="40"></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                 
                  <li><!-- start notification -->
                            <a href="home.php">
                              <i class=""></i> Home
                            </a>
                          </li>
                 
                  <!-- Notifications Menu -->

                    <ul class="dropdown-menu">
                      <li class="header">You have <?php echo$row['count'];?> products that needs reorder</li>
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
                        <?php
                        $queryprod=mysqli_query($con,"select prod_name from product where  branch_id='$branch'")or die(mysqli_error());
			  while($rowprod=mysqli_fetch_array($queryprod)){
			?>
                          <li><!-- start notification -->
                            <a href="reorder.php">
                              <i class=""></i> <?php echo $rowprod['prod_name'];?>
                            </a>
                          </li><!-- end notification -->
                          <?php }?>
                        </ul>
                      </li>
                      <li class="footer"><a href="inventory.php">View all</a></li>
                    </ul>
                  </li>

                
                  
                  <li><!-- start notification -->
                            <a href="category.php">
                              <i class=""></i> Category
                            </a>
                          </li>
                          <li><!-- start notification -->
                            <a href="supplier.php">
                              <i class=""></i> Supplier
                            </a>
                          </li><!-- end notification -->
                  <!-- Tasks Menu -->
                  <li><!-- start notification -->
                            <a href="product.php">
                              <i class=""></i> Product
                            </a>
                          </li><!-- end notification -->
                  <!-- Tasks Menu -->
				   <!-- Tasks Menu -->
				   <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="stockin.php">
                      <i class=" "></i> Stock
                      
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                      </li>
                     
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
                  <li><!-- start notification -->
                            <a href="sales.php">
                              <i class=""></i> Reports
                            </a>
                          </li>
				 
                  <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="../admin_panel/index.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-off text-red"></i> Logout 
                      
                    </a>
                  </li>
               >
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>