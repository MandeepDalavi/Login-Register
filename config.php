<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "accounts";
    
    $connection = mysqli_connect($server, $user, $password, $database);

    if(!$connection) {
        echo "<script>alert('Connection Failed!')</script>";
    }
?>