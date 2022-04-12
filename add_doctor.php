<?php include("header1.php");?>
<?php
  $con=mysqli_connect("localhost","root","","mass");
    session_start();
    
if(isset($_POST['addDoctor']))
{
  $doctorName=$_POST['doctorName'];
  $password=$_POST['password'];
  $confirm_password=$_POST['confirm_password'];
  $email=$_POST['email'];
  $special=$_POST['specialization'];
  $doctorFee=$_POST['doctorFee'];
  $address=$_POST['address'];
  $gender=$_POST['gender'];
  $gsm=$_POST['gsm'];
  $dob=$_POST['dob'];

  if ($password==$confirm_password) {
  $query="insert into doctor(doctorName,password,email,specialization,address,doctorFee,gender,gsm,dob)values('$doctorName','$password','$email','$special','$address','$doctorFee','$gender','$gsm','$dob')";
  $result=mysqli_query($con,$query) or die(mysqli_error($con));
  if ($result) {?>
    <h5 class="text-success">Doctor added successfully.</h5>
 <?php }else {?>
    <h5 class="text-danger">Doctor could not be added.</h5>
<?php }
}
else{?>
  <h5 class="text-danger">Password don't match.</h5>
<?php }
}

  /* if ($special == 'General') {
    $query="insert into doctor(doctorName,password,email,specialization,address,doctorFee,gender,gsm,dob,specialization_id)values('$doctorName','$password','$email','$special','$address','$doctorFee','$gender','$gsm','$dob',1)";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
  }elseif ($special == 'Gynecology') {
    $query="insert into doctor(doctorName,password,email,specialization,address,doctorFee,gender,gsm,dob,specialization_id)values('$doctorName','$password','$email','$special','$address','$doctorFee','$gender','$gsm','$dob',2)";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
  }elseif ($special == 'Neurology') {
    $query="insert into doctor(doctorName,password,email,specialization,address,doctorFee,gender,gsm,dob,specialization_id)values('$doctorName','$password','$email','$special','$address','$doctorFee','$gender','$gsm','$dob',3)";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
  }elseif ($special == 'Cardiology') {
    $query="insert into doctor(doctorName,password,email,specialization,address,doctorFee,gender,gsm,dob,specialization_id)values('$doctorName','$password','$email','$special','$address','$doctorFee','$gender','$gsm','$dob',4)";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
  }elseif ($special == 'Pediatrician') {
    $query="insert into doctor(doctorName,password,email,specialization,address,doctorFee,gender,gsm,dob,specialization_id)values('$doctorName','$password','$email','$special','$address','$doctorFee','$gender','$gsm','$dob',5)";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
  }else {
    echo "Unabel to add a doctor!";
    header("Location:add_doctor.php");
  }

  if($result){
    if ($doctorFee == 'NGN1000') {
      $query1="insert into fee(doctorName,specialization,doctorFee,doctorName_id)values('$doctorName','$special','$doctorFee',1)";
      $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
      echo "<script>alert('Doctor added successfully!');</script>";
    }elseif ($doctorFee == 'NGN1500') {
      $query1="insert into fee(doctorName,specialization,doctorFee,doctorName_id)values('$doctorName','$special','$doctorFee',2)";
      $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
      echo "<script>alert('Doctor added successfully!');</script>";
    }elseif ($doctorFee == 'NGN2000') {
      $query1="insert into fee(doctorName,specialization,doctorFee,doctorName_id)values('$doctorName','$special','$doctorFee',3)";
      $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
      echo "<script>alert('Doctor added successfully!');</script>";
    }elseif ($doctorFee == 'NGN2500') {
      $query1="insert into fee(doctorName,specialization,doctorFee,doctorName_id)values('$doctorName','$special','$doctorFee',4)";
      $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
      echo "<script>alert('Doctor added successfully!');</script>";
    }elseif ($doctorFee == 'NGN1800') {
      $query1="insert into fee(doctorName,specialization,doctorFee,doctorName_id)values('$doctorName','$special','$doctorFee',5)";
      $result1=mysqli_query($con,$query1) or die(mysqli_error($con));
      echo "<script>alert('Doctor added successfully!');</script>";
    }else {
      echo "Unabel to add a doctor!";
      header("Location:add_doctor.php");
    }
  }*/

?>
<?php

function display_specs() {
  global $con;
  $query="select distinct(specialization) from spec";
  $result=mysqli_query($con,$query);
  while($row=mysqli_fetch_array($result))
  {
    $specialization=$row['specialization'];
    echo '<option data-value="'.$specialization.'">'.$specialization.'</option>';
  }
}

function display_fee()
{
 global $con;
 $query = "select * from spec";
 $result = mysqli_query($con,$query);
 while( $row = mysqli_fetch_array($result) )
 {
  $doctorFee = $row['doctorFee'];
  $specialization = $row['specialization'];
  echo '<option value="'.$doctorFee.'" data-value="'.$doctorFee.'" data-spec="'.$specialization.'">'.$doctorFee.'</option>';
 }
}

?>

<script >
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
    <h3 class="text-center">Add Doctor</h3><br>
    <div class="jumbotron">
    <div class="card">
    <div class="card-body">

    <form class="form-group" style="padding-left:200px; padding-right: 200px;" method="post" action="">
          <div class="row">
                  <label>Doctor Name:</label>
                  <input type="text" class="form-control" name="doctorName" required>
                   <!-- <?php

$con=mysqli_connect("localhost","root","","mass");
$query=mysqli_query($con,"select specialization,doctorFee from spec");
$docarray = array();
  while($row =mysqli_fetch_assoc($query))
  {
      $docarray[] = $row;
  }
  echo json_encode($docarray);

?> -->
                  <label>Specialization:</label>
                   <select name="specialization" class="form-control" id="specialization" required="required">
                      <option value="" name="specialization" disabled selected>Select Specialization</option>
                      <?php 
                              display_specs();
                              ?>
                    </select>
                    <script>
                      document.getElementById('specialization').onchange = function foo() {
                        let spec = this.value;   
                        console.log(spec)
                        let docs = [...document.getElementById('doctorFee').options];
                        
                        docs.forEach((el, ind, arr)=>{
                          arr[ind].setAttribute("style","");
                          if (el.getAttribute("data-spec") != spec ) {
                            arr[ind].setAttribute("style","display: none");
                          }
                        });
                      };

                  </script>
                  <label>Consultation Fee(NGN):</label>
                   <select name="doctorFee" class="form-control" id="doctorFee" required="required">
                      <option value="" name="doctorFee" disabled selected>Consultation Fee</option>
                      <?php 
                              display_fee();
                              ?>
                    </select>
                  <label>Email:</label>
                  <input type="text"  class="form-control" name="email" required>
                  <label>Address:</label>
                  <input type="text"  class="form-control" name="address" required>
                  <label>Sex:</label>
                   <select name="gender" class="form-control" id="gender" required="required">
                      <option value="head" name="gender" disabled selected>Select Sex</option>
                      <option value="Male" name="male">Male</option>
                      <option value="Female" name="female">Female</option>
                    </select>
                  <label>Date of Birth:</label>
                  <input type="date"  class="form-control" name="dob" required>
                  <label>Phone:</label>
                  <input type="text"  class="form-control" name="gsm" placeholder="e.g, +2348099887657" required>
                  <label>Password:</label>
                  <input type="password" class="form-control"  onkeyup='check();' name="password" id="password"  required>
                  <label>Confirm Password:</label>
                  <input type="password" class="form-control" onkeyup='check();' name="confirm_password" id="confirm_password" required>&nbsp &nbsp<span id='message'></span>
                </div><br>
          <input type="submit" name="addDoctor" value="Add Doctor" class="btn btn-primary">
        </form>
    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>

    <?php include("footer.php");?>