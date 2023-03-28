<?php 
session_start();
$id=$_SESSION['id'];	
include('../dist/includes/dbcon.php');

	$name = $_POST['prod_name'];
	$qty = $_POST['qty'];
	date_default_timezone_set("Asia/Manila"); 
	$date = date("Y-m-d H:i:s");
			
		$query=mysqli_query($con,"select prod_price from product where prod_id='$name'")or die(mysqli_error());
		$row=mysqli_fetch_array($query);
		$price=$row['prod_price'];
		
		$total=$price*$qty;
			mysqli_query($con,"INSERT INTO stockout(prod_id,qty,date,price,total,user_id) VALUES('$name','$qty','$date','$price','$total','$id')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully disposed stocks!');</script>";
					  echo "<script>document.location='stockout.php'</script>";  
	
?>