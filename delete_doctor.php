<?php include("header1.php");?>
<?php
  $con=mysqli_connect("localhost","root","","mass");
    session_start();
    
    if(isset($_POST['deleteDoctor']))
    {
      $email=$_POST['email'];
      $query="delete from doctor where email='$email';";
      $result=mysqli_query($con,$query);
      if($result)
        {
          echo "<script>alert('Doctor removed successfully!');</script>";
      }
      else{
        echo "<script>alert('Unable to delete!');</script>";
      }
    }

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
    <h3 class="text-center">Remove Doctor</h3><br>
    <div class="jumbotron">
    <div class="card">
    <div class="card-body">

        <form class="form-group" method="post">
          <div class="row">
          
                  <div class="col-md-2"><label>Email ID:</label></div>
                  <div class="col-md-10"><input type="email"  class="form-control" name="email" placeholder="Enter doctor's email to delete" required></div><br><br>
                  
                </div><br>
          <input type="submit" name="deleteDoctor" value="Delete Doctor" class="btn btn-primary" onclick="confirm('do you really want to delete this doctor?')">
        </form>
    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>

    <?php include("footer.php");?>