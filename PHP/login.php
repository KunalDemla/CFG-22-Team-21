<?php 
include "conn.php";
if(isset($_POST['submit'])){
    // Set connection variables
    
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="select * from p_users where email='$email' AND password='$password'"  ;
    $res = $conn->query($sql);

    $sqld="select * from d_users where email='$email' AND password='$password'"  ;
    // $resd = $conn->query($sqld) or die($conn->error);
    $resd = $conn->query($sqld);
    if($res->num_rows == 1){
        echo "Logged in successfully";
        $conn->close();
        $row = $res->fetch_assoc();
        $id = $row['u_id'];
        ob_start();
        header("Location: Home.php?id=$id&type=1");
        ob_end_flush();
        die();
        exit();
    }
    elseif($resd->num_rows == 1){
        echo "Logged in successfully";
        $conn->close();
        $row = $resd->fetch_assoc();
        $id = $row['u_id'];
        ob_start();
        header("Location: Home.php?id=$id&type=2");
        ob_end_flush();
        die();
        exit();
    }
    else{
        echo "Error!!";
    }
    $conn->close();
}
?>
<html>

<head>
    <title>e-Aushadhi - A Taru Foundation - Login</title>
    <link rel="icon" href="https://tarufoundation.com/wp-content/uploads/2020/06/Transparent-Logo_Resize.png" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
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
                    <a class="nav-item nav-link" href="Appointments.php">Appointments</a>
                    </div>
                    <!-- Navbar Right Side -->
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="Login.php">Login</a>
                        <a class="nav-item nav-link" href="Signup.php">Register</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!--Login Section-->
    <div>
        <form action="" class="myForm mt-6" name="myForm" method="POST">
            <img src="https://tarufoundation.com/wp-content/uploads/2020/06/Transparent-Logo_Resize.png" alt="Login Logo" style="width:100px; height:100px;">
            <div class="input-container mt-4">
                <i class="fa fa-envelope icon bg-dark"></i>
                <input type="email" placeholder="Email" name="email" class="input-field" required>
            </div>
            <div class="input-container">
                <i class="fa fa-key icon bg-dark"></i>
                <input type="password" placeholder="Password" name="password" class="input-field" required>
            </div>
            <div><input type="submit" class="bttn bg-dark" name="submit"></div>
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