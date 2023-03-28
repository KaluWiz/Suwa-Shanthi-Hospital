<?php
session_start();
include("../dist/includes/dbcon.php");

$user_id=$_SESSION['id'];
$id = $_POST['pr_id'];
	
		$query=mysqli_query($con,"select prod_name,qty from product natural join purchase_request where pr_id='$id'")or die(mysqli_error());
			$row=mysqli_fetch_array($query);
			$name=$row['prod_name'];
			$qty=$row['qty'];

$result=mysqli_query($con,"DELETE FROM purchase_request WHERE pr_id ='$id'")
	or die(mysqli_error());

			date_default_timezone_set("Asia/Manila"); 
			$date = date("Y-m-d H:i:s");
	
	$remarks="deleted $qty $name from purchase request";
mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$user_id','$remarks','$date')")or die(mysqli_error($con));

echo "<script>document.location='request.php'</script>";  
?>