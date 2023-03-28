<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
$start = $_POST['start'];
$end = $_POST['end'];

 
 if (isset($_POST['updateterm']))
 { 
  $id = $_POST['id'];
  mysqli_query($con,"UPDATE term SET term_start='$start',term_end='$end' where term_id='$id'") or die(mysqli_error()); 
  echo "<script type='text/javascript'>alert('Successfully updated term!');</script>";
 } 
  if (isset($_POST['addterm']))
 { 
  mysqli_query($con,"INSERT INTO term(term_start,term_end) VALUES('$start','$end')")or die(mysqli_error());  
  echo "<script type='text/javascript'>alert('Successfully added new term!');</script>";
 } 
 
  
  echo "<script>document.location='settings.php'</script>";
