<?php 
include "conn.php";
$insert = false;
if(isset($_POST['submit'])){
    // Set connection variables
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $password=$_POST['password'];

    $sql="SELECT * FROM p_users where u_id = (select  MAX(u_id) from p_users)";
    $newidrs= $conn->query($sql);
    $newidr = $newidrs->fetch_assoc();
    $newid= $newidr['u_id'];
    $newid= $newid + 1;
    $type = 1;
    $sql="INSERT INTO p_users (u_id, first_name,last_name, mobile, password, email , gender, user_type) VALUES ('$newid','$fname','$lname',' $mobile', '$password','$email','$gender', '$type')";
    if($conn->query($sql) == true){
        $insert = true;
        ?> <script>alert("Registered successfully");</script> <?php
        ob_start();
        header("Location: Home.php?id=$newid&type=1");
        ob_end_flush();
        die();
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
    <title>e-Aushadhi - A Taru Foundation - Sign Up</title>
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
                        <a class="nav-item nav-link" href="login.php">Appointments</a>
                    </div>
                    <!-- Navbar Right Side -->
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="login.php">Login</a>
                        <a class="nav-item nav-link" href="signup.php">Register</a>
                    </div>
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
                <input type="firstname" placeholder="First Name" name="fname" class="input-field" required>
            </div>
            <!--Last Name input-->
            <div class="input-container">
                <i class="fa fa-user-circle-o icon bg-dark"></i>
                <input type="lastname" placeholder="Last Name" name="lname" class="input-field" required>
            </div>
            <!--Gender input (Changes required)-->
            <div class="input-container">
              <i class="fa fa-user-circle-o icon bg-dark"></i>
              <div id="styled-select">
              <label for="gender">Gender - </label>
              <select name="gender" id="gender">
                <option value="">Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Others</option>
              </select>
            </div>
            </div>
            <!--DOB input-->
            <div class="input-container">
                <i class="fa fa-calendar-o icon bg-dark"></i>
                <input type="date" placeholder="Date of birth" name="dob" class="input-field" required>
            </div>
            <!--Userame input-->
            <div class="input-container">
                <i class="fa fa-user icon bg-dark"></i>
                <input  type="tel" id="phone" placeholder="Mobile Number" name="mobile" class="input-field" required>
            </div>
            <!--Email input-->
            <div class="input-container">
                <i class="fa fa-envelope icon bg-dark"></i>
                <input type="email" placeholder="Email" name="email" class="input-field" required>
            </div>
            <!--Password input-->
            <div class="input-container">
                <i class="fa fa-key icon bg-dark"></i>
                <input type="password" placeholder="Password" name="password" class="input-field" required>
            </div>
            <div><input type="submit" name="submit" value="Submit" class="bttn bg-dark"></div>
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