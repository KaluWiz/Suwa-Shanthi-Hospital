<?php 
include 'dbcon.php';
	$branch_name = $_POST['branch_name'];
	$branch_address = $_POST['branch_address'];
	$branch_contact = $_POST['branch_contact'];
	$skin = $_POST['skin'];
	
	
		mysqli_query($con,"INSERT INTO branch(branch_name,branch_address,branch_contact,skin) 
			VALUES('$branch_name','$branch_address','$branch_contact','$skin')")or die(mysqli_error($con));  
			echo "<script type='text/javascript'>alert('Data Successfully Saved!');</script>";
			echo "<script>window.location='branch.php'</script>";   
	


?>