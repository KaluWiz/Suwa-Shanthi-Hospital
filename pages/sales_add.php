<?php 
session_start();
$id=$_SESSION['id'];	
include('../dist/includes/dbcon.php');

	$discount = $_POST['discount'];
	$payment = $_POST['payment'];
	$amount_due = $_POST['amount_due'];
	
	date_default_timezone_set("Asia/Manila"); 
	$date = date("Y-m-d H:i:s");
	$cid=$_REQUEST['cid'];
	$branch=$_SESSION['branch'];
	
	$total=$amount_due-$discount;
	$cid=$_REQUEST['cid'];

		$tendered = $_POST['tendered'];
		$change = $_POST['change'];

		mysqli_query($con,"INSERT INTO sales(cust_id,user_id,discount,amount_due,total,date_added,modeofpayment,cash_tendered,cash_change,branch_id) 
	VALUES('$cid','$id','$discount','$amount_due','$total','$date','cash','$tendered','$change','$branch')")or die(mysqli_error($con));
		
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
		
		$query1=mysqli_query($con,"SELECT or_no FROM payment NATURAL JOIN sales WHERE modeofpayment =  'cash' ORDER BY payment_id DESC LIMIT 0 , 1")or die(mysqli_error($con));

			$row1=mysqli_fetch_array($query1);
				$or=$row1['or_no'];	

				if ($or==0)
				{
					$or=1901;
				}
				else
				{
					$or=$or+1;
				}

				mysqli_query($con,"INSERT INTO payment(cust_id,user_id,payment,payment_date,branch_id,payment_for,due,status,sales_id,or_no) 
	VALUES('$cid','$id','$total','$date','$branch','$date','$total','paid','$sales_id','$or')")or die(mysqli_error($con));
				echo "<script>document.location='receipt.php?cid=$cid'</script>";  	
		
		$result=mysqli_query($con,"DELETE FROM temp_trans where branch_id='$branch'")	or die(mysqli_error($con));
		//echo "<script>document.location='receipt.php?cid=$cid'</script>";  	
		
	
?>