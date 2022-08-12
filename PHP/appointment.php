<?php
  include "conn.php";


  if(isset($_POST['submit'])){
    $em=$_POST['email'];
    $doc=$_POST['doc'];
    $time=$_POST['time'];
    $mid=$_GET['id'];
    $sql = "SELECT * from P_Users where email='$em'";
    $pidre = $conn->query($sql);
    $pidr = $pidre->fetch_assoc();
    $pid = $pidr['u_id'];
    $sql= "INSERT INTO appointments VALUES ('$pid','$doc','$mid','$time')";
    if($conn->query($sql) == true){
        $sql="DELETE FROM D_Avail where d_uid='$doc' and avail_slot='$time'";
        $conn->query($sql);
        ?> <script>alert("Registered successfully");</script> <?php
    }
    else{
        echo "ERROR: $sql <br> $con->error";    
    }
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>e-Aushadhi - A Taru Foundation - Appointments</title>

	<!-- Google font -->
  <link rel = "icon" href = "Images/x_icon.png" type = "image/x-icon">
	<link href="http://fonts.googleapis.com/css?family=Playfair+Display:900" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Alice:400,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="appointment.css" />

	

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
                      <a class="nav-item nav-link" href="Appointments.php?id=<?php echo($id)?>&type=<?php echo($type)?>">Appointments</a>
                    </div>
                    <!-- Navbar Right Side -->
                    <div class="navbar-nav">
                    <a class="nav-item nav-link" href="Profile.php?id=<?php echo($id)?>&type=<?php echo($type)?>"><?php echo $username?></a><?php }
                  
                    else {?>
                    <a class="nav-item nav-link" href="Home.php">Home</a>
                    <a class="nav-item nav-link" href="About.php">About</a>
                    <a class="nav-item nav-link" href="Login.php">Appointments</a>
                  </div>
                  <!-- Navbar Right Side -->
                  <div class="navbar-nav">
                    <a class="nav-item nav-link" href="Login.php">Login</a>
                    <a class="nav-item nav-link" href="Signup.php">Register</a>
                    <?php }?>
                  </div>
                </div>
              </div>
            </nav>
        </header>

	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="booking-bg bg-dark">
							<div class="form-header">
								<h2>Book an Appointment</h2>
							</div>
						</div>
						<form method = "POST" action="" name="appform">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<span class="form-label">Email</span>
                                        <?php if($ptype == 2) {?>
										<input name="email" class="form-control" type="text" required>
                                        <?php }
                                        else{?>
                                        <input name="email" class="form-control" type="text" value="<?php echo($row['email'])?>">
                                        <?php }?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<span class="form-label">Doctor</span>
								<select name="doc" class="form-control" required>
									<option value="" selected hidden>Select doctor</option>
                  <?php 
                  $sql = "SELECT * FROM d_users";
                  $res = $conn->query($sql);
                  while($ro = $res->fetch_assoc()){?>
                  <option value="<?php echo($ro['u_id'])?>"> <?php echo " " . $ro['first_name'] . " " . $ro['last_name'] . " " . $ro['specialization'];?> </option>
                  <?php }?>
								</select>
								<span class="select-arrow"></span>
							</div>
							
							<div class="form-group">
								<span class="form-label">Time Slot</span>
								<select name="time" class="form-control" required>
									<option value="" selected hidden>Select time slot</option>
                  <option value="28-06-2002 14:00:00">28-06-2002 14:00:00</option>
								</select>
								<span class="select-arrow"></span>
							</div>
							<div class="form-btn">
								<button name="submit" class="submit-btn bg-dark">Book</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>