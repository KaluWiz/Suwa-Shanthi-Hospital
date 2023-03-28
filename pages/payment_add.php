<?php 
session_start();
include('../dist/includes/dbcon.php');

date_default_timezone_set('Asia/Manila');

	$cid = $_POST['cid'];	
	$sid = $_POST['sid'];
	$amount = $_POST['amount'];
	$balance = $_POST['balance'];
	//$interest = $_POST['interest'];
	date_default_timezone_set("Asia/Manila"); 
	$date = date("Y-m-d");
	$id = $_SESSION['id'];
	$branch = $_SESSION['branch'];
	$date1 = date("Y-m-d H:i:s");
	
	mysqli_query($con,"UPDATE customer SET balance=balance-'$amount' where cust_id='$cid'") or die(mysqli_error($con)); 

	$query3=mysqli_query($con,"select * from payment natural join customer where cust_id='$cid' and remaining<>'0' order by payment_for")or die(mysqli_error($con));
    		while ($row3=mysqli_fetch_array($query3)){
    			$pid=$row3['payment_id'];
    			$payment=$row3['payment'];
    			$due=$row3['due'];
    			$total=$row3['due']+$row3['interest'];
    			$bal=$row3['remaining'];
    			$sid=$row3['sales_id'];
    			$payment_date=date("Y-m-d",strtotime($row3['payment_for']));
    			    			
    			if ($amount>=$bal)
    			{

    				$query=mysqli_query($con,"select * from term where term='monthly' and sales_id='$sid'")or die(mysqli_error($con));
    					$count=mysqli_num_rows($query);

    					if (($count>0) and ($date<$payment_date))
    					{
    						$rebate = $_POST['rebate'];
    					}
    					else
    					{
    						$rebate=0;		
    					}

    				mysqli_query($con,"UPDATE payment SET payment='$total',user_id='$id',payment_date='$date1',status='paid',remaining='0',rebate='$rebate' where payment_id='$pid'") or die(mysqli_error($con));

					$amount=$amount-$total;
    			}
    			elseif ($amount<=0)
    			{

    			}
    			else//if (($amount<$bal) and ($amount<>0))
    			{
    				//$due=$total-$amount;
    				$remaining=$bal-$amount;
    				mysqli_query($con,"UPDATE payment SET payment='$amount',user_id='$id',payment_date='$date1',status='partially paid',remaining='$remaining' where payment_id='$pid'") or die(mysqli_error($con));
    				$amount=$amount-$total;
    			}	
    			    

  				//update item status if balance is zero status is paid  				
    			$query=mysqli_query($con,"select * from sales natural join customer where cust_id='$cid' and branch_id='$branch' order by sales_id desc limit 0,1 ")or die(mysqli_error($con));
					$row=mysqli_fetch_array($query);
					
					//$sid=$row['sales_id'];
					$balance=$row['balance'];

					if ($balance<=0)
					{
					mysqli_query($con,"UPDATE term SET status='paid' where sales_id='$sid'") or die(mysqli_error($con)); 
					}
    				
    			}

	
			
			
		$name=$row3['cust_last'].", ".$row3['cust_first'];
		$remarks="added a payment of $amount for $name";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
		
	
		echo "<script type='text/javascript'>alert('Successfully added payment!');</script>";
		echo "<script>document.location='receipt_credit.php?cid=$cid&sid=$sid'</script>"; 

	
	
		
   
	
?>