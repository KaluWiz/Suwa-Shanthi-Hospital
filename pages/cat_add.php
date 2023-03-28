<?php 

include('../dist/includes/dbcon.php');

	$cat = $_POST['category'];
	
	$query2=mysqli_query($con,"select * from category where cat_name='$cat'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Category already exist!');</script>";
			echo "<script>document.location='category.php'</script>";  
		}
		else
		{			
			mysqli_query($con,"INSERT INTO category(cat_name) VALUES('$cat')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new category!');</script>";
					  echo "<script>document.location='category.php'</script>";  
		}
?>