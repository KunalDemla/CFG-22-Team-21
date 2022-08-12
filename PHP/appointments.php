<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./display.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montez&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Appointments</title>
</head>
<body>

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
<h1>Appointments</h1> <br>
       
        <div class="center-div mt-5">
            <div class="table-responsive">
                <table>
                    <thead>
                        <th>P_ID</th>
                    <th>D_ID</th>
                    <th>M_ID</th>
                    <th>Date Time</th>
                   
                    </thead>

                    <tbody>
                    <?php
                    include 'conn.php';

                        $selectQuery= "select* from appointments";

                        $query=mysqli_query($conn,$selectQuery);
                        while($res=mysqli_fetch_array($query)){
                      ?>
                      <tr>
                            <td><?php echo $res['p_uid'] ?></td>
                            <td><?php echo $res['d_uid'] ?></td>
                            <td><?php echo $res['m_uid'] ?></td>
                            <td><?php echo $res['app_time'] ?></td>
                         

                          
                        <?php
                    }

                    ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
   </div>






    <script> $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })</script>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js " integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js " integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js " integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s " crossorigin="anonymous "></script>
</body>
</html>