<?php include("header1.php");?>
<?php
    session_start();
    $con=mysqli_connect("localhost","root","","mass");

    $username = $_SESSION['username'];

?>

<?php

if(isset($_POST['register_patient'])){
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $gsm = mysqli_real_escape_string($con, $_POST['gsm']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
    if ($password == $confirm_password) {
        $query = "INSERT INTO patient (firstname, lastname, email, address, gender, gsm, dob, password, confirm_password) 
        VALUES('$firstname','$lastname','$email','$address','$gender','$gsm','$dob','$password','$confirm_password')";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        if ($result) {?>
            <h5 class="text-success"> Patient added successfully.</h5>
        <?php }else {?>
            <h5 class="text-danger">Patient could not be added successfully.</h5>
       <?php }
       }
    else{?>
        <h5 class="text-danger">Password don't match.</h5>
  <?php }
  
}

/*
    $query1 = "select * from patient";
    $result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
    $row=mysqli_fetch_assoc($result1);
    if($result1){
      $_SESSION['pid'] = $row['pid'];?>
     <script>alert("Email already exists!");</script>
    <?php
    }
    }*/
?>

<script>
    var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = '#5dd05d';
    document.getElementById('message').innerHTML = 'Matched';
  } else {
    document.getElementById('message').style.color = '#f55252';
    document.getElementById('message').innerHTML = 'Not Matching';
  }
}

function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8 || key == 32);
};

function checklen()
{
    var pass1 = document.getElementById("password");  
    if(pass1.value.length<6){  
        alert("Password must be at least 6 characters long. Try again!");  
        return false;  
  }  
}
</script>

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
    <h3 class="text-center">Add Patient</h3><br>
    <form action="" method="post">
                        <div class="row">
                        <div class="col-6">
                        <label for="">Firstname</label>
                        <input class="form-control" name="firstname" type="text" value="<?php if(isset($firstname)) { echo $firstname; } ?>" onkeydown="return alphaOnly(event);" required><br>
                        <label for="">Lastname</label>
                        <input class="form-control"  name="lastname" type="text" value="<?php if(isset($lastname)) { echo $lastname; } ?>" onkeydown="return alphaOnly(event);" required><br>
                        <label for="">Email</label>
                        <input class="form-control" name="email" type="email" required><br>
                        <label for="">Address</label>
                        <input class="form-control" name="address" type="text" value="<?php if(isset($address)) { echo $address; } ?>" required><br>
                        <label class="radio inline"> 
                        <input type="radio" name="gender" value="Male" checked>
                        <span> Male </span> 
                        </label>
                        <label class="radio inline"> 
                        <input type="radio" name="gender" value="Female">
                        <span>Female </span> 
                        </label>
                        </div>
                        <div class="col-6">
                        <label for="">Phone</label>
                        <input class="form-control" name="gsm" id="phone" placeholder="e.g, +2348034365465 " type="text" value="<?php ?>" required><br>
                        <label for="">Date of Birth</label>
                        <input class="form-control" name="dob" type="date" value="<?php if(isset($dob)) {echo $dob;} ?>" required><br>
                        <label for="">Password</label>
                        <input class="form-control" name="password" id="password" type="password"  onkeyup='check();' required><br>
                        <label for="">Confirm Password</label>
                        <input class="form-control" name="confirm_password" id="confirm_password" type="password" onkeyup='check();' required><span id='message'></span><br>
                        </div>
                        <center><button class="btn btn-primary" name="register_patient" onclick="return checklen();" type="submit">Register</button></center><br>
                        </div>
                    </form>
    
    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>

    <?php include("footer.php");?>