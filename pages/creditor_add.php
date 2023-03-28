<?php 
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$last = $_POST['last'];
	$first = $_POST['first'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$bday = $_POST['bday'];
	$nickname = $_POST['nickname'];
	$house_status = $_POST['house_status'];
	$years = $_POST['years'];
	$rent = $_POST['rent'];
	$emp_name = $_POST['emp_name'];
	$emp_no = $_POST['emp_no'];
	$emp_address = $_POST['emp_address'];
	$emp_year = $_POST['emp_year'];
	$occupation = $_POST['occupation'];
	$salary = $_POST['salary'];
	$spouse = $_POST['spouse'];
	$spouse_no = $_POST['spouse_no'];
	$spouse_emp = $_POST['spouse_emp'];
	$spouse_details = $_POST['spouse_details'];
	$spouse_income = $_POST['spouse_income'];
	$comaker = $_POST['comaker'];
	$comaker_details = $_POST['comaker_details'];

	
	$query2=mysqli_query($con,"select * from customer where cust_last='$last' and cust_first='$first' and branch_id='$branch'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);
		$row=mysqli_fetch_array($query2);
			$id=$row['cust_id'];

		if ($count>0)
		{
			mysqli_query($con,"update customer set cust_contact='$contact',credit_status='pending' where cust_id='$id'")or die(mysqli_error());
	
			echo "<script type='text/javascript'>alert('Application resubmitted for approval!');</script>";
			echo "<script>document.location='creditor.php'</script>";  
		}
		else
		{	
			
			mysqli_query($con,"INSERT INTO customer(cust_last,cust_first,cust_address,cust_contact,branch_id,balance,credit_status,bday,nickname,house_status,years,rent,emp_name,emp_no,emp_address,emp_year,occupation,salary,spouse,spouse_no,spouse_emp,spouse_details,spouse_income,comaker,comaker_details,cust_pic) 
				VALUES('$last','$first','$address','$contact','$branch','0','pending','$bday','$nickname','$house_status','$years','$rent','$emp_name','$emp_no','$emp_address','$emp_year','$occupation','$salary','$spouse','$spouse_no','$spouse_emp','$spouse_details','$spouse_income','$comaker','$comaker_details','default.gif')")or die(mysqli_error($con));

			$id=mysqli_insert_id($con);
			//$_SESSION['cid']=$id;
			echo "<script type='text/javascript'>alert('Successfully added new creditor! Waiting for admin approval.');</script>";
			echo "<script>document.location='creditor.php'</script>";  
		}
?>