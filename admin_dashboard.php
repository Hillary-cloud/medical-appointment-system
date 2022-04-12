<?php include("header1.php");?>
<?php
    session_start();
    $con=mysqli_connect("localhost","root","","mass");

    $username = $_SESSION['username'];

?>

<div class="container-fluid">
    <div class="row">
    <div class="col-3 text-light bg-primary text-center" style="min-height: 600px;"><hr class="bg-primary">
    <h2 class="text-warning">Admin Dashboard</h2><br><hr>
        
    <!--<img class="img-fluid img-thumbnail mx-auto d-block" alt="Responsive image" src="<?php?>" style="height: 150px; width: 150px;"><br><br><br>-->
        <tr class="text-center">
        <div class="list-group" id="list-tab" role="tablist"> 
        <a href="specialization.php" id="list-doc-list"><button class="fun btn btn-light w-100"><h5>Add/Remove Specialization</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="doctor_list.php" id="list-doc-list"><button class="fun btn btn-light w-100"><h5>Doctor List</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="patient_list.php"><button class="fun btn btn-light w-100"><h5>Patient List</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="appointment_details.php"><button class="fun btn btn-light w-100"><h5>Appointments</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="add_patient.php"><button class="fun btn btn-light w-100"><h5>Add Patient</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="add_doctor.php"><button class="fun btn btn-light w-100"><h5>Add Doctor</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="delete_doctor.php"><button class="fun btn btn-light w-100"><h5>Delete Doctor</h5></button></a>
        </tr><hr class="bg-light">
        <a href="message_us.php"><button class="fun btn btn-light w-100"><h5>Messages</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="logout_admin.php"><button class="fun btn btn-light w-100"><h5>Sign out </h5></button></a>
        </tr><hr class="bg-light">
      </div>
    </div>


    <div class="col-9"><br>
    <div class="jumbotron">
    <div class="card">
    <div class="card-body">
    <h3 class="text-center">Hello <?php echo ucfirst($username); ?>, Welcome to your dashboard.</h3><br>
      <div class="row">
      <div class="col-4">
      <?php 
      $query="select * from doctor";
      if($result=mysqli_query($con,$query)){;
      $row = mysqli_num_rows($result);
      ?>
      <div class="card bg-danger text-light">
        <div class="card-body">
        <h3>DOCTORS</h3><br><br><br><br>
        <h4><?php echo $row ; ?></h4>
        </div>
        </div>
      <?php }
      ?>
      </div>
      <div class="col-4">
      <?php 
      $query="select * from patient";
      if($result=mysqli_query($con,$query)){;
      $row = mysqli_num_rows($result);
      ?>
      <div class="card bg-success text-light">
        <div class="card-body">
        <h3>PATIENTS</h3><br><br><br><br>
        <h4><?php echo $row ; ?></h4>
        </div>
        </div>
      <?php }
      ?>
      </div>
      <div class="col-4">
      <?php 
      $query="select * from appointment";
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