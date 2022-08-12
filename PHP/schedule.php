<?php
  include "conn.php";

  if(isset(($_POST['submit']))){
    $textt = $_POST['inputt'];
    $id = $_GET['id'];
    $sql= "insert into D_Avail values ('$id','$textt')";
    $rest= $conn->query($sql);
    if($rest){
      ob_start();
        header("Location: schedule.php?id=$id&type=2");
        ob_end_flush();
        die();
        exit();
    }
  }



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
        <link rel="stylesheet" href="schedule.css" type="text/css">
        <title>
        e-Aushadhi - A Taru Foundation - Schedule
        </title>
    </head>
    <body id="bodyt">
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
              <div class ="col-md-5"></div>
                <div class="col-md-7 mt-5" id="goleftlol">
                  <!-- <h3>Trail</h3> -->
                  <h2 class="mb-3">Your Free Schedule is:</h2>
                    <?php 
                        $sql="select * from D_Avail where d_uid='$id'";
                        $results=$conn->query($sql);
                        while($row = $results->fetch_assoc())
                        { ?>
                          <h3> <?php echo($row['avail_slot']); ?> </h3>
                            <?php
                        } ?>
                </div>
                <div class ="col-md-5"></div>
                <div class="col-md-7 mt-5" id="goleftlol">
                  <!-- <h3>Trail</h3> -->
                  <h2 class="mb-3">Your Booked Schedule is:</h2>
                    <?php 
                        $sql="select * from appointments where d_uid='$id'";
                        $results=$conn->query($sql);
                        while($row = $results->fetch_assoc())
                        { ?>
                          <h3> <?php echo(" " . $row['app_time'] . " with " . $row['p_uid'] . " " ); ?> </h3>
                            <?php
                        } ?>
                </div>
                <div class ="col-md-5"></div>
                <div id="getup" class="col-md-2 randomi pb-5">
                  <form action="" method="POST">
                    <input class="mb-4 " id="ibox" type="text" name="inputt" placeholder="Enter Free Time here">
                    <br>    
                    <input type="submit" name="submit" class="btn btn-secondary">
                  </form>
                </div>
                <div class ="col-md-5"></div>
                <div class ="col-md-12 pt-5 mt-5 pb-5"></div>
            </div>
          </main>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    </body>
</html>