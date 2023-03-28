<?php 
session_start();
$id=$_SESSION['id'];	
include('../dist/includes/dbcon.php');

	date_default_timezone_set("Asia/Manila"); 
	$date = date("Y-m-d H:i:s");
	$cid=$_REQUEST['cid'];
	$branch=$_SESSION['branch'];
	
	$total=$_POST['total'];
	$cid=$_REQUEST['cid'];

		
		mysqli_query($con,"INSERT INTO sales(cust_id,user_id,amount_due,total,date_added,branch_id,modeofpayment) 
	VALUES('$cid','$id','$amount_due','$total','$date','$branch','credit')")or die(mysqli_error($con));
	
	
	$sales_id=mysqli_insert_id($con);
	$_SESSION['sid']=$sales_id;
	$query=mysqli_query($con,"select * from temp_trans where branch_id='$branch'")or die(mysqli_error($con));
		while ($row=mysqli_fetch_array($query))
		{
			$pid=$row['prod_id'];	
 			$qty=$row['qty'];
			$price=$row['price'];
			
			
			mysqli_query($con,"INSERT INTO sales_details(prod_id,qty,price,sales_id) VALUES('$pid','$qty','$price','$sales_id')")or die(mysqli_error($con));
			mysqli_query($con,"UPDATE product SET prod_qty=prod_qty-'$qty' where prod_id='$pid' and branch_id='$branch'") or die(mysqli_error($con)); 
		}
		
				mysqli_query($con,"UPDATE customer SET balance=balance+'$total' where cust_id='$cid'") or die(mysqli_error($con)); 
				echo "<script>document.location='credit.php?cid=$cid'</script>";  	
		
				$result=mysqli_query($con,"DELETE FROM temp_trans where branch_id='$branch'")	or die(mysqli_error($con));
				
		
	
?>