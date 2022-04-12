<?php include("header1.php");?>
<?php
    session_start();
    $con=mysqli_connect("localhost","root","","mass");

    $username = $_SESSION['username'];


if (isset($_POST['updateDoctor'])) {
    $id = $_SESSION['id'];
    $specialization = $_SESSION['specialization'];
    $doctorFee = $_SESSION['doctorFee'];
    $gender = $_SESSION['gender'];
    $doctorName = $_SESSION['doctorName'];
    $specialization = $_POST['specialization'];
    $doctorFee = $_POST['doctorFee'];
    $id = $_POST['id'];
    $gender = $_POST['gender'];
    $doctorName = $_POST['doctorName'];
    $query = "update doctor set specialization='$specialization', doctorFee='$doctorFee', gender='$gender', doctorName='$doctorName' where id = '".$_POST['id']."'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    if ($result) {?>
        <h4 class="text-success">Doctor details updated successfully.</h4>
   <?php }else {?>
        <h4 class="text-danger">Doctor details could not be updated.</h4>
  <?php }
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
        <a href="appointment_details.php"><button class="fun btn btn-light w-100"><h5>Appointment Details</h5></button></a>
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
    <h3 class="text-center">Update Specialization</h3><br>

    <form class="form-group" method="post" action="">
                <div class="row">
                <?php
                $con=mysqli_connect("localhost","root","","mass");
              global $con;
              if(isset($_POST['edit']))
    {
      $query=mysqli_query($con,"select * from doctor where id = '".$_POST['id']."'");
      while ($row = mysqli_fetch_array($query)) {

          ?>   
              <input type="text" class="d-none" name="id" value="<?php echo $row['id']?>">
                <div class="col-md-4"><label>Doctor Name:</label></div>
                  <div class="col-md-6"><input type="text" value="<?php echo ucfirst($row['doctorName']); ?>" class="form-control" name="doctorName" required></div><br><br>

                  <div class="col-md-4"><label>Gender: </label></div>
                  <div class="col-md-6"><input type="text" value="<?php echo ucfirst($row['gender']); ?>" class="form-control" name="gender" required></div><br><br>


                <div class="col-md-4"><label>Specialization:</label></div>
                  <div class="col-md-6"><input type="text" value="<?php echo ucfirst($row['specialization']); ?>" class="form-control" name="specialization" required></div><br><br>

                  <div class="col-md-4"><label>Consultation Fee(NGN): </label></div>
                  <div class="col-md-6"><input type="text" value="<?php echo ucfirst($row['doctorFee']); ?>" class="form-control" name="doctorFee" required></div><br><br>

                  <div class="col-md-4"><label></label></div>
                  <div class="col-md-6">
                    <input type="submit" name="updateDoctor" value="Click to Update" class="btn btn-primary" id="inputbtn">
                    <a href="doctor_list.php">Click to go back</a>
                  </div>                  
                </div>
              </form>
              <?php }} ?>
    
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <?php include("footer.php");?>