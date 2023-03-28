<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');

 
	 $term = $_POST['term'];
	 $year = $_POST['year'];

	 mysqli_query($con,"UPDATE settings SET term_id='$term',census_year='$year'")
	 or die(mysqli_error()); 

	 $queryterm=mysqli_query($con,"select * from settings natural join term")or die(mysqli_error($con));
	      $rowterm=mysqli_fetch_array($queryterm);
		$start=date("M d, Y",strtotime($rowterm['term_start']));
		$end=date("M d, Y",strtotime($rowterm['term_end']));
	   
	 $_SESSION['year']=$year;
	 $_SESSION['term_id']=$term;
	 $_SESSION['term']=$start." - ".$end;
	 
		echo "<script type='text/javascript'>alert('Successfully updated system settings!');</script>";
		echo "<script>document.location='settings.php'</script>";

