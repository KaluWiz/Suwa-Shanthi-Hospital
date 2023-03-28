<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$status =$_POST['status'];
	
	
	mysqli_query($con,"update customer set credit_status='$status' where cust_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated application status!');</script>";
	echo "<script>document.location='application.php'</script>";  

	
?>
