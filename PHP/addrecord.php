<?php 
include "conn.php";
$insert = false;
if(isset($_POST['submit'])){
    // Set connection variables
    
    $p_id=$_POST['p_id'];
    $vitals=$_POST['vitals'];
   

  
    $sql="INSERT INTO p_history (u_id, history) VALUES ('$p_id','$vitals')";
    if($conn->query($sql) == true){
        $insert = true;
        ?> <script>alert("Registered successfully");</script> <?php
        header("Location: history.php");
        exit();
    }
    else{
        echo "ERROR: $sql <br> $conn->error";    
    }
    $conn->close();
}
?>
<html>

<head>
    <title>e-Aushadhi - A Taru Foundation</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "icon" href = "Images/x_icon.png" type = "image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body id="bodybg">
    <p>
        <!--Paragraph goes here-->
    </p>
    <!-- Nav Bar-->
    <header class="site-header">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand mr-4" href="Home.php">e-Aushadhi - A Taru Foundation</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
                <div class="collapse navbar-collapse" id="navbarToggle">
                    <div class="navbar-nav mr-auto">
                        <a class="nav-item nav-link" href="Home.php">Home</a>
                        <a class="nav-item nav-link" href="About.php">About</a>
                    </div>
                    <!-- Navbar Right Side -->
                    
                </div>
            </div>
        </nav>
    </header>
    <!--Register Section-->
    <div>
        <form action="" method="POST" class="myForm" name="myForm">
            <img src="https://tarufoundation.com/wp-content/uploads/2020/06/Transparent-Logo_Resize.png" alt="Login Logo" style="width:100px; height:100px;">
            <!--First Name input-->
            <div class="input-container mt-4">
                <i class="fa fa-user-circle icon bg-dark"></i>
                <input type="p_id" placeholder="Patient ID" name="p_id" class="input-field" required>
            </div>
            <!-- <div class="input-container mt-4">
                <i class="fa fa-user-circle icon bg-dark"></i>
                <input type="d_id" placeholder="Doctor ID" name="d_id" class="input-field" required>
            </div> -->
            <div class="input-container mt-4">
                <i class="fa fa-user-circle icon bg-dark"></i>
                <input type="te" placeholder="vitals" name="vitals" class="input-field" required>
            </div>
            
            
            
            <div><input type="submit" name="submit" value="Add Record" class="bttn bg-dark"></div>
        </form>
    </div>


    <!-- For background and wave-->
    <!-- <div class="waveWrapper waveAnimation">
        <div class="waveWrapperInner bgTop">
            <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
        </div>
        <div class="waveWrapperInner bgMiddle">
            <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')">
            </div>
        </div>
        <div class="waveWrapperInner bgBottom">
            <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
        </div>
    </div> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>