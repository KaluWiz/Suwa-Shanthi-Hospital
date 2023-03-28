<?php
session_start();
include('dbcon.php');
$year=$_SESSION['year'];
$month=$_SESSION['month'];
$result = mysqli_query($con,"select branch_name,SUM(payment) as payment from payment natural join branch
			where YEAR(payment_date)='$year' and MONTH(payment_date)='$month' group by branch_id,MONTH(payment_date) order by  MONTH(payment_date)");

$rows = array();
while($r = mysqli_fetch_array($result)) {
    $row[0] = $r[0];
    $row[1] = $r[1];
    array_push($rows,$row);
}

print json_encode($rows, JSON_NUMERIC_CHECK);

mysqli_close($con);
?>

