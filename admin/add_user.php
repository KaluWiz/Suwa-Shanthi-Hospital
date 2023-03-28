<?php 
include 'dbcon.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$status = $_POST['status'];
	$branch_id = $_POST['branch_id'];
	
	$pass1=md5($password);
	$salt="a1Bz20ydqelm8m1wql";
	$pass1=$salt.$pass1;
	
	
		mysqli_query($con,"INSERT INTO user
		(username,password,name,status,branch_id) 
		VALUES
		('$username','$pass1','$name','$status', '$branch_id')")
		or die(mysqli_error($con));  
			echo "<script type='text/javascript'>alert('Data Successfully Saved!');</script>";
			echo "<script>window.location='user.php'</script>";   
	


?>