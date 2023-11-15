<?php
    

    $host = "localhost";
    $username = "root";
    $password = '';
    $database = "mvc_php-noithat";

    // Create DB Connection
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
?>

