<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Suwa Shanthi Pharmacy</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <!-- <div class="card-heading"></div> -->
                <div class="card-body">
                    <h2 class="title">Sign Up Here</h2>
                    <form action="register.php" method="POST" >
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAME" name="name" id="name" required>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                            <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="CONTACT" name="contact" id="contact"  required>
                        </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender" id="gender"  required>
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                           
                                            </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="EMAIL" name="email"  required>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="password" placeholder="PASSWORD" name="password" id="password"  required>
                                </div>
                            </div>
                            <div class="input-group">
                                    <input class="input--style-1" type="password" placeholder="CONFIRM PASSWORD" id="Conpassword" name="Conpassword">
                                </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" name ="Btnsubmit" id="Btnsubmit">Submit</button>
                        </div>
                       
                    </form>
                    <?php 
$con = mysqli_connect ("localhost","root","","suwashanthi");
if(isset($_POST["Btnsubmit"]))
{
  $name = $_POST["name"];
  $contact = $_POST["contact"];
  $gender = $_POST["gender"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  
                   
  
  $sql = "INSERT INTO `user`(`name`, `contact`, `gender`, `email`, `password`) VALUES ('".$name."', `".$contact."` ,'".$gender."` ,`".$email."` , `".$password."`) ;";
	
    
  mysqli_query($con,$sql);

  mysqli_close($con);
  header ('Location:index.html');
}
  ?>	
  <div class="p-t-20">
                        <a link href="login.php"> <button class="btn btn--radius btn--green" name ="submit" id="submit">Sign In</button></a>
                        </div>
                </div>
            </div>
        </div>
    </div>

  

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
