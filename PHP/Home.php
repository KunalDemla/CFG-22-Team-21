<?php
  include "conn.php";
 ?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href = "Images/x_icon.png" type = "image/x-icon">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="Home.css" type="text/css">
        <title>
           e-Aushadhi - A Taru Foundation
        </title>
    </head>
    <body>
          <header class="site-header">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
              <div class="container">
                <a class="navbar-brand mr-4" href="Home.php">e-Aushadhi - A Taru Foundation</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggle">
                  <div class="navbar-nav mr-auto">
                  <?php if(isset($_GET['id'], $_GET['type'])) {
                    $type = $_GET['type'];
                    $id= $_GET['id'];
                    $sql = "select * from d_users where u_id='$id'";
                    if($type==1){
                      $sql = "select * from p_users where u_id='$id'";
                    }
                    $res = $conn->query($sql);
                    $row = $res->fetch_assoc();
                    $username = $row['email'];
                    if($type==1){
                      $ptype = $row['user_type'];
                    } 
                  ?>
                    <a class="nav-item nav-link" href="Home.php?id=<?php echo($id)?>&type=<?php echo($type)?>">Home</a>
                      <a class="nav-item nav-link" href="About.php?id=<?php echo($id)?>&type=<?php echo($type)?>">About</a>
                      <?php if($type==1){ ?>
                      <a class="nav-item nav-link" href="Appointment.php?id=<?php echo($id)?>&type=<?php echo($type)?>">Appointments</a>
                      <?php } 
                      else{ ?>
                      <a class="nav-item nav-link" href="schedule.php?id=<?php echo($id)?>&type=<?php echo($type)?>">Appointments</a>
                      <?php } ?>
                    </div>
                    <!-- Navbar Right Side -->
                    <div class="navbar-nav">
                    <a class="nav-item nav-link" href="Profile.php?id=<?php echo($id)?>&type=<?php echo($type)?>"><?php echo $username?></a><?php }
                  
                    else { ?>
                    <a class="nav-item nav-link" href="Home.php">Home</a>
                    <a class="nav-item nav-link" href="About.php">About</a>
                    <a class="nav-item nav-link" href="Login.php">Appointments</a>
                  </div>
                  <!-- Navbar Right Side -->
                  <div class="navbar-nav">
                    <a class="nav-item nav-link" href="Login.php">Login</a>
                    <a class="nav-item nav-link" href="Signup.php">Register</a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </nav>
          </header>
          <main role="main" class="container">
            <div class="row">
              <div class="col-md-8">
                <h1 class="mt-5">e-Aushadhi - A Taru Foundation</h1>
                <p class="mt-4 mr-5">
                    Taru Foundation helps with vocational and skill development training program for rural students, provides solution for healthcare in rural areas, and trains rural community members to promote their livelihood.
                    Their healthcare solution program, e-chikitsalaya, provides expert healthcare services to patients in a decentralized manner. The objective of the program is to create a successful model where a patient can have a first or second level of opinion by expert doctors at a telemedicine center. The program will simultaneously work with the district health department and existing infrastructure to give strength and support.
                    Taru is now aiming to scale their programs using technology. It will help increase efficiency, reach and have a bigger impact.
                </p>
              </div>
              <div class="col-md-4">
                <div class="content-section mt-4">
                  <h3>Taru Foundation</h3>
                  <p class='text-muted'>Know more about Taru
                    <ul class="list-group">
                      <li class="list-group-item list-group-item-light"><a class="text-muted" href="#">Latest Posts</a></li>
                      <li class="list-group-item list-group-item-light"><a class="text-muted" href="#">The Family</a></li>
                      <li class="list-group-item list-group-item-light"><a class="text-muted" href="#">Calendars</a></li>
                      <li class="list-group-item list-group-item-light"><a target="_blank" class="text-muted" href="https://tarufoundation.com/">Our Website</a></li>
                    </ul>
                  </p>
                </div>
              </div>
              <div class="col-md-12">
                <div class="">
                    <img src="Images/taruimg.png" class="img-fluid mt-5 mx-auto d-block">
                    <p class ="mt-5">
                        Taru Foundation helps with vocational and skill development training program for rural students, provides solution for healthcare in rural areas, and trains rural community members to promote their livelihood.
                        Their healthcare solution program, e-chikitsalaya, provides expert healthcare services to patients in a decentralized manner. The objective of the program is to create a successful model where a patient can have a first or second level of opinion by expert doctors at a telemedicine center. The program will simultaneously work with the district health department and existing infrastructure to give strength and support
                        Taru is now aiming to scale their programs using technology. It will help increase efficiency, reach and have a bigger impact.
                    </p>
                </div>
              </div>
            </div>
            <div class="card text-center mt-5">
              <!-- <div class="card-header">
                Contact Us
              </div> -->
              <div class="card-body">
                <h4 class="card-title">Contact Us!</h4>
                <p class="card-text">Help us spread the word!</p>
                <a href="#" class="btn btn-secondary">Instagram</a>
                <a href="#" class="btn btn-secondary">Facebook</a>
                <a href="#" class="btn btn-secondary">Twitter</a>
              </div>
              <!-- <div class="card-footer text-muted">
                2 days ago
              </div> -->
            </div>
          </main>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    </body>
</html>