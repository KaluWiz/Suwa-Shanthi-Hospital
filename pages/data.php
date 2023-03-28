<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

$year=$_SESSION['year'];
include('../dist/includes/dbcon.php');

$result = mysqli_query($con,"SELECT emp_stat,COUNT(*),census_year FROM census natural join census_details where census_year='$year' group by emp_stat");

$rows = array();
while($r = mysqli_fetch_array($result)) {
    $row[0] = $r[0];
    $row[1] = $r[1];
    array_push($rows,$row);
}

print json_encode($rows, JSON_NUMERIC_CHECK);

mysql_close($con);
?>

