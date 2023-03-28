<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "suwashanthi";  
    $con = new mysqli('localhost', 'root', '', 'suwashanthi');
    if($con->connect_error){
        die("Connection failed".$con->connect_error);
    }
    echo "";
   // echo "Connection successfull!";// no need to show a message when successfull.but only when an error
    
    ?>