<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');

$query = mysqli_query($con,"select census_year,COUNT(*) as total from census natural join census_details group by census_year");

$category = array();
$category['name'] = 'Count';

$series1 = array();
$series1['name'] = 'Resident';



while($r = mysqli_fetch_array($query)) {
    $count=$r['count'];
    $category['data'][] =$r['census_year'];
    $series1['data'][] = $r['total'];

}

$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);




print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 
