<?php 
session_start();
include('../dist/includes/dbcon.php');

	$id = $_POST['id'];
	$amount = $_POST['amount'];
	$type = $_POST['type'];
	$date = date("Y-m-d H:i:s");
	$user_id = $_SESSION['id'];
	
	$query2=mysqli_query($con,"select * from supplier where supplier_id='$id'")or die(mysqli_error());
		$rowc=mysqli_fetch_array($query2);
		$supplier_name=$rowc['supplier_name'];
	
	if ($type=="Payment")
	  {
		$remarks="added a payment of $amount to $supplier_name";  
	   	mysqli_query($con,"UPDATE supplier SET balance=balance-'$amount' where supplier_id='$id'") or die(mysqli_error()); 
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$user_id','$remarks','$date')")or die(mysqli_error($con));
		mysqli_query($con,"INSERT INTO expense(expense,source,date,amount) VALUES('Payment to $supplier_name','Store','$date','$amount')")or die(mysqli_error($con));
	  }
	else if ($type=="Credit")
	 {
		$remarks="added a credit of $amount to $supplier_name";   
		mysqli_query($con,"UPDATE supplier SET balance=balance+'$amount' where supplier_id='$id'") or die(mysqli_error()); 
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$user_id','$remarks','$date')")or die(mysqli_error($con));
	 }
	else if ($type=="Credit Memo")
	 {
		$remarks="added a credit memo of $amount to $supplier_name";  
		mysqli_query($con,"UPDATE customer SET balance=balance-'$amount' where supplier_id='$id'") or die(mysqli_error()); 
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$user_id','$remarks','$date')")or die(mysqli_error($con));
	 }
			//mysqli_query($con,"INSERT INTO account(cust_id,amount,type,date,user_id) VALUES('$id','$amount','$type','$date','$user_id')")or die(mysqli_error($con));

		      echo "<script type='text/javascript'>alert('Successfully added new account!');</script>";
					  echo "<script>document.location='supplier.php'</script>";  
	
?>