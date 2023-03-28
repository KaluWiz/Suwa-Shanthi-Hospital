<?php
include('dbcon.php');

 if (isset($_POST['update']))
 { 
	 $id = $_POST['user_id'];
	 $name = $_POST['name'];
	 $username = $_POST['username'];
	 $password = $_POST['password'];
	 $status = $_POST['status'];
	 $branch_id = $_POST['branch_id'];
	 
	 if($password=="")
	 {
		 
	 mysqli_query($con,"UPDATE user SET username='$username', name = '$name', status = '$status', branch_id = '$branch_id' where user_id='$id'")
	 or die(mysqli_error($con)); 
	 }
	 else
	 {
		 $pass=md5($password);
		$salt="a1Bz20ydqelm8m1wql";
		$pass=$salt.$pass;

		 mysqli_query($con,"UPDATE user SET username='$username', password = '$pass', name = '$name', status = '$status', branch_id = '$branch_id' where user_id='$id'")
	 or die(mysqli_error($con)); 
	 }
		echo "<script type='text/javascript'>alert('Successfully updated user details!');</script>";
		echo "<script>document.location='user.php'</script>";
	
} 

