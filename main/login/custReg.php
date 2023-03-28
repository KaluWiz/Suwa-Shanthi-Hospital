<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">


	 <link rel="icon" type="image/png" href="images/logo.png"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
	
<!--===============================================================================================-->
</head>
<body>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<header class="header">
       <a a href="F:\UOB FINALS\Group Project\W06\Suwa Shanthi Hospitals Website\index.html"> <img src="images/logo1.png" id="logo" alt=""></a>
       

        <nav class="navbar">
            <a href="index.html">home</a>
            <a href="#">services</a>
            <a href="#">about us</a>
            
        </nav>

        <div class="icons">
           <div id="menubar" class="fas fa-bars"></div>
            <a href="F:\UOB FINALS\Group Project\W06\Suwa Shanthi Hospitals Website\medicine.html">Browse Medicine</a>

            <div id="menubar" class="fas fa-bars"></div>
            <a href ="F:\UOB FINALS\Group Project\W06\Suwa Shanthi Hospitals Website\rentals.html">Browse Rentals</a>
        </div>
    </header>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/customer.png" alt="IMG">
				</div>

				<form class="login100-form validate-form">
					<span class="login100-form-title">
						Customer Registration
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Name required">
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "username required">
						<input class="input100" type="text" name="username" placeholder="User Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</span>
					</div>

					

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

				
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Register
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Already have an account?
						</span>
						<a class="txt2" href="customer.php">
							Login Here
						</a>
					</div>

					<!-- <div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<?php
  // Database connection settings
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "user";

  // Check if form is submitted
  if(isset($_POST['submit'])){

    // Create connection
    $conn = mysqli_connect("localhost", "root", "", "user");

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Get form input values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert data into database
    $sql = "INSERT INTO users (name, email, username, password)
    VALUES ('$name', '$email', '$username', '$hashed_password')";

    // Execute query and check if data is inserted successfully
    if (mysqli_query($conn, $sql)) {
      echo "Registration successful!";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
  }
  ?>
</body>
</html>