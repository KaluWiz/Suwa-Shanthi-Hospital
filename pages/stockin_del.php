<?php
session_start();
include("../dist/includes/dbcon.php");
$user_id=$_SESSION['id'];
$id = $_REQUEST['id'];
$qty = $_REQUEST['qty'];
$pid = $_REQUEST['pid'];

$result=mysqli_query($con,"DELETE FROM stockin WHERE stockin_id ='$id'")
	or die(mysqli_error());
	
mysqli_query($con,"update product set prod_qty=prod_qty-'$qty' where prod_id='$pid'")or die(mysqli_error($con));
		
		$query=mysqli_query($con,"select prod_name from product where prod_id='$pid'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query);
		
			$name=$row['prod_name'];
			$unit=$row['prod_unit'];
			$date = date("Y-m-d H:i:s");
	
	$remarks="deleted $qty $name from stockin";
mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$user_id','$remarks','$date')")or die(mysqli_error($con));

echo "<script>document.location='stockin.php'</script>";  
?>