<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `rental` where id=$id";
        $con->query($sql);
    }
    header('location:index.php');
    exit;
?>