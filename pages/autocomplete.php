<?php
    $connection = mysqli_connect("localhost","root","","ebrgy") or die("Error " . mysqli_error($connection));

    //fetch department names from the department table
    $sql = "select lname from resident";
    $result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));

    $dname_list = array();
    while($row = mysqli_fetch_array($result))
    {
        $dname_list[] = $row['lname'];
    }
    echo json_encode($dname_list);
?>