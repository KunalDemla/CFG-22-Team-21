<?php

include 'conn.php';

$id=$_GET['id'];

$del = "DELETE FROM appointments WHERE id='$id'";
$query= mysqli_query($conn,$del);

header('location:history.php');
?>