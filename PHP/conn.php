<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname ="dbtest";

    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection failed". $conn->connect_error);
    }
?>
