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

    if(isset($_POST['patient_login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query="select * from patient where email='$email' and password='$password';";
        $result=mysqli_query($con,$query) or die(mysqli_error($con));
        if(mysqli_num_rows($result)==1)
        {
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $pid= $row['pid'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $gender = $row['gender'];
                $_SESSION['gsm'] = $row['gsm'];
                $_SESSION['dob'] = $row['dob'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['email'] = $row['email'];
        }
            header("Location:patient_dashboard.php");
        }
      else {
        echo("<script>alert('Invalid Email or Password. Try Again!');
              window.location.href = 'index.php';</script>");
        // header("Location:error.php");
      }
            
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
    <h3 class="text-center">Hello <?php echo ucfirst($firstname)." ".ucfirst($lastname); ?>, Welcome to your dashboard.</h3><br>
    
    <div class="row">
    <div class="col-12">
    <?php 
      $query="select * from appointment where firstname='$firstname' and lastname='$lastname'";
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