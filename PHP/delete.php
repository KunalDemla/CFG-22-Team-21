<?php

include 'conn.php';

$id=$_GET['id'];

$del = "DELETE FROM p_history WHERE u_id='$id'";
$query= mysqli_query($conn,$del);

header('location:history.php');
?>