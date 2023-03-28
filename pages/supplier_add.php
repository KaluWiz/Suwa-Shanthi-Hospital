<?php 

include('../dist/includes/dbcon.php');

	$name = $_POST['name'];
	
			
			mysqli_query($con,"INSERT INTO supplier(supplier_name) 
				VALUES('$name')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new supplier!');</script>";
					  echo "<script>document.location='supplier.php'</script>";  
	
?>