<?php
include("../dist/includes/dbcon.php");
$id=$_GET['id'];
$result=mysqli_query($con,"DELETE FROM temp_trans WHERE temp_trans_id ='$id'")
	or die(mysqli_error());

?>