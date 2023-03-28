<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "project";

//database_connection.php
try{
    $connect = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");
}catch(PDOException $e){
    die('Unable to connect with the database');
}
?>