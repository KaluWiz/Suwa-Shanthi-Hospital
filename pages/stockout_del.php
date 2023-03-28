<?php
session_start();
include("../dist/includes/dbcon.php");
$user_id=$_SESSION['id'];
$id = $_REQUEST['id'];
$qty = $_REQUEST['qty'];
$pid = $_REQUEST['pid'];

$result=mysqli_query($con,"DELETE FROM stockout WHERE stockout_id ='$id'")
	or die(mysqli_error());
	
		$query=mysqli_query($con,"select prod_name,prod_unit from product where prod_id='$pid'")or die(mysqli_error());
			$row=mysqli_fetch_array($query);
			$name=$row['prod_name'];
			$unit=$row['prod_unit'];
			date_default_timezone_set("Asia/Manila"); 
			$date = date("Y-m-d H:i:s");
	
	$remarks="deleted $qty $unit of $name from stockout";
mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$user_id','$remarks','$date')")or die(mysqli_error($con));

echo "<script>document.location='stockout.php'</script>";  
?>