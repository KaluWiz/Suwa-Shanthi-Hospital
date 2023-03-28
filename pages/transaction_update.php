<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$qty =$_POST['qty'];
	$cid =$_POST['cid'];
	
	
	mysqli_query($con,"update temp_trans set qty='$qty' where temp_trans_id='$id'")or die(mysqli_error());
	
	
	echo "<script>document.location='transaction.php?cid=$cid'</script>";  

	
?>
