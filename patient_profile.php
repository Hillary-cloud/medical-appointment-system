<?php include("header1.php");?>
<?php
    session_start();
    $con=mysqli_connect("localhost","root","","mass");

    $pid = $_SESSION['pid'];
    $email = $_SESSION['email'];
    $firstname = $_SESSION['firstname'];
    $gender = $_SESSION['gender'];
    $lastname = $_SESSION['lastname'];
    $gsm = $_SESSION['gsm'];

    if (isset($_POST['update'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $gsm = $_POST['gsm'];

        $query = "UPDATE `patient` SET `firstname`='".$firstname."',`lastname`='".$lastname."',`gsm`='".$gsm."',`email`='".$email."',
        `address`='".$address."',`dob`='".$dob."',`gender`='".$gender."' WHERE `email`='$email'";
        $result = mysqli_query($con,$query);
        if ($result) {?>
            <h5 class="text-success"> updated successfully</h5>
        <?php }else {?>
            <h5 class="text-danger"> could not be uploaded.</h5>
        <?php }
    }
    
?>

<div class="container-fluid">
    <div class="row">
    <div class="col-3 text-light bg-primary text-center" style="min-height: 600px;"><hr class="bg-primary"><hr class="bg-light">
    <h2 class="text-warning">Patient's Dashboard</h2><br><br><hr>
        
    <!--<img class="img-fluid img-thumbnail mx-auto d-block" alt="Responsive image" src="<?php?>" style="height: 150px; width: 150px;"><br><br><br>-->
        <tr class="text-center"> 
        <a href="patient_profile.php"><button class="fun btn btn-light w-100"><h5>Profile</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="book_appointment.php"><button class="fun btn btn-light w-100"><h5>Book Appointment</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="myappointment_history.php"><button class="fun btn btn-light w-100"><h5>My Appointments</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="logout_patient.php"><button class="fun btn btn-light w-100"><h5>Sign out </h5></button></a>
        </tr><hr class="bg-light">

    </div>


    <div class="col-9"><br>
    <div class="jumbotron">
    <div class="card">
    <div class="card-body">
    <form action="" method="post">
    <h5 class="text-center"><strong>PATIENT'S DETAILS</strong></h5><br>
    <hr>
<?php 
$query = "select * from patient where email='$email'";
$result = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($result)) { ?>

    <div class="row">
        <div class="col-6">
        <label> <strong>First Name:  </strong></label><input name="firstname" class=" form-control" type="text" value="<?php echo ucfirst($row['firstname']); ?>" readonly><br><br>
        <label> <strong>Last Name: </strong></label><input name="lastname" type="text" class=" form-control" value="<?php echo ucfirst($row['lastname']); ?>" readonly><br><br>
        <label> <strong>Email: </strong></label><input name="email" type="email" class=" form-control" value="<?php echo $row['email']; ?>" readonly><br><br>
        <label> <strong>Gender:        </strong></label><input name="gender" type="text" class=" form-control" value="<?php echo ucfirst($row['gender']); ?>" readonly><br><br>
        </div>
        <div class="col-6">
        <label> <strong>Address:  </strong></label><input name="address" class=" form-control" type="text" value="<?php echo ucfirst($row['address']); ?>"><br><br>
        <label> <strong>Date of Birth: </strong></label><input name="dob" type="text" class=" form-control" value="<?php echo $row['dob']; ?>" ><br><br>
        <label> <strong>Phone number: </strong></label><input name="gsm" type="text" class=" form-control" value="<?php echo $row['gsm']; ?>" ><br><br> <br>
        <input type="submit" value="Update/Save" name="update" class="btn btn-success">
        </div>
    </div>
    <?php
}
?>
    </form>
    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>

    <?php include("footer.php");?>