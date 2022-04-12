<?php include('header1.php');?>
<?php $con=mysqli_connect("localhost","root","","mass");?>
<?php
    session_start();
    $email = $_SESSION['email'];
    $doctorName = $_SESSION['doctorName'];
    $specialization = $_SESSION['specialization'];
?>


<div class="container-fluid">
    <div class="row">
    <div class="col-3 text-light bg-primary text-center" style="min-height: 600px;"><hr class="bg-primary">
    <h2 class="text-warning">Doctor's Dashboard</h2><br><hr>
        
    <!--<img class="img-fluid img-thumbnail mx-auto d-block" alt="Responsive image" src="<?php?>" style="height: 150px; width: 150px;"><br><br><br>-->
        <tr class="text-center"> 
        <a href="doctor_profile.php"><button class="fun btn btn-light w-100"><h5>Profile</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="doctor_appointment.php"><button class="fun btn btn-light w-100"><h5>My Appointments</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="logout_doctor.php"><button class="fun btn btn-light w-100"><h5>Sign out </h5></button></a>
        </tr><hr class="bg-light">

    </div>


    <div class="col-9"><br>
    <div class="jumbotron">
    <div class="card">
    <div class="card-body">
    <h3 class="text-center">Hello <?php echo ucfirst($doctorName); ?>, Welcome to your dashboard.</h3><br>
    <div class="row">
    <div class="col-12">
    <?php 
      $query="select * from appointment where doctorName='$doctorName'";
      if($result=mysqli_query($con,$query)){;
      $row = mysqli_num_rows($result);
      ?>
      <div class="card bg-warning text-light">
        <div class="card-body">
        <h3>APPOINTMENTS</h3><br><br><br><br>
        <h4><?php echo $row ; ?></h4>
        </div>
        </div>
      <?php }
      ?>
    </div>
    </div>
    
    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>

    <?php include("footer.php");?>