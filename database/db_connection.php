<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "keshmoon";
    $conn = new mysqli($host , $user, $pass, $dbname);
    mysqli_set_charset($conn, "utf8mb4");
    if($conn->connect_error){
        die("Database Error : " . $conn->connect_error);
    }
