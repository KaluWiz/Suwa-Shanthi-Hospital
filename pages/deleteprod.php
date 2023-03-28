<?php
session_start();
include('../dist/includes/dbcon.php');
$id=$_GET['id'];


$sql=mysqli_query($con,"DELETE FROM `product` where prod_id='$id'")
	or die(mysqli_error());

	
  echo "<script type='text/javascript'>alert('Successfully Deleted product details!');</script>";
	echo "<script>document.location='product.php'</script>";  

?>
