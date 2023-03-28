<script language="JavaScript"><!--
javascript:window.history.forward(1);
//--></script>
<?php 
session_start();
$id=$_SESSION['id'];
$branch=$_SESSION['branch'];
include('../dist/includes/dbcon.php');
$sid=$_SESSION['sid'];

date_default_timezone_set('Asia/Manila');

	$day=date('d');	
	$month=date('m');	

	$span = $_POST['span'];
	$terms = $_POST['terms'];
	$down = $_POST['down'];
	$interest = $_POST['interest'];
	$total = $_POST['grandtotal'];
	$balance=$total-$down;
	echo $balance;
	$date=date("Y-m-d");
	$due_date = date("Y-m-d",strtotime("+$span months"));
	$cid=$_POST['cid'];
	$date=date("Y-m-d");
	$query=mysqli_query($con,"select * from term where sales_id='$sid'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query);

		$query1=mysqli_query($con,"SELECT or_no FROM payment NATURAL JOIN sales WHERE modeofpayment =  'credit' and or_no<>'0' ORDER BY payment_id DESC LIMIT 0 , 1")or die(mysqli_error($con));

			$row1=mysqli_fetch_array($query1);
				$or=$row1['or_no'];	

				if ($or==0)
				{
					$or=3151;
				}
				else
				{
					$or=$or+1;
				}
	
	if ($terms=='monthly')
	{
		$due=($balance)/$span;	
		for($i=1;$i<=$span;$i++)	
		{
			$due_date1 = date("Y-m-d",strtotime("+$i months"));

				mysqli_query($con,"INSERT INTO payment(cust_id,payment_for,due,interest,payment,user_id,branch_id,remaining,sales_id) 
			VALUES('$cid','$due_date1','$due','0','0','$id','$branch','$due','$sid')")or die(mysqli_error($con));
		
		}
	}
	else if($terms=='daily')
	{
		$due=($balance)/$span/30;	
		$spanday=$span*30;
		for($i=0;$i<$spanday;$i++)	
		{
			$due_date1 = date("Y-m-d",strtotime($date. " + $i days")); 
				
				mysqli_query($con,"INSERT INTO payment(cust_id,payment_for,due,interest,payment,user_id,branch_id,remaining,sales_id) 
			VALUES('$cid','$due_date1','$due','0','0','$id','$branch','$due','$sid')")or die(mysqli_error($con));

		}
	}
	else{
		$due=($balance)/$span/4;	
		$spanweek=$span*4;
		
		$day=date("Y-m-d");
		
		for($i=1;$i<=$spanweek;$i++)	
		{
		$due_date1 = date("Y-m-d",strtotime($date. " + $i weeks"));

				mysqli_query($con,"INSERT INTO payment(cust_id,payment_for,due,interest,payment,user_id,branch_id,remaining,sales_id) 
			VALUES('$cid','$due_date1','$due','0','0','$id','$branch','$due','$sid')")or die(mysqli_error($con));
		}	
	}	
		
		mysqli_query($con,"INSERT INTO term(payable_for,term,due,payment_start,down,due_date,interest,sales_id) 
		VALUES('$span','$terms','$due','$date','$down','$due_date','$interest','$sid')")or die(mysqli_error($con));
		
	mysqli_query($con,"UPDATE customer SET balance='$balance' where cust_id='$cid'") or die(mysqli_error($con)); 
	
		mysqli_query($con,"INSERT INTO payment(cust_id,payment,payment_date,user_id,payment_for,branch_id,due,status,sales_id,or_no) 
			VALUES('$cid','$down','$date','$id','$date','$branch','$down','paid','$sid','$or')")or die(mysqli_error($con));	
	
	echo "<script>document.location='receipt1.php'</script>";  	

?>
