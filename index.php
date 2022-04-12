<?php include('header.php');?>
<?php
    session_start();
    $con=mysqli_connect("localhost","root","","mass");
    if(isset($_POST['patient_login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query="select * from patient where email='$email' and password='$password';";
        $result=mysqli_query($con,$query) or die(mysqli_error($con));
        if(mysqli_num_rows($result)==1)
        {
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
          $_SESSION['pid'] = $row['pid'];
          $_SESSION['firstname'] = $row['firstname'];
          $_SESSION['lastname'] = $row['lastname'];
          $_SESSION['gender'] = $row['gender'];
          $_SESSION['gsm'] = $row['gsm'];
          $_SESSION['dob'] = $row['dob'];
          $_SESSION['address'] = $row['address'];
          $_SESSION['email'] = $row['email'];
        }
            header("Location:patient_dashboard.php");
        }
      else {
        echo("<script>alert('Invalid Username or Password. Try Again!');
              window.location.href = 'index.php';</script>");
        // header("Location:error.php");
      }
            
    }
?>  


    <div class="container">
        <div class="row">
        <div class="col-md-6" style="margin-top: 15%; margin-right: 3%; text-align: justify;">
            <div class="card bg-dark">
                <div class="card-body">
                    <h3 class="text-warning">Welcome to <span class="text-primary">Medic Health Hospital</span></h3>
                    <em class="text-danger">(motto: Your health is our priority.)</em>
                        <p class="text-warning">Location: Hilltop, UNN Enugu, Nigeria.</p>
                    <hr class="text-light">

                    <h6 class="text-white "> Everyday is an opportunity to do something good for your health
                         and that is why we are here to make sure that your health is always taken care of.</h6>
                         <p class="text-white">Our website gives our patients the opportunity to book and manage an appointment at their prefered time so as to 
                             avoid long queue and also be able to improve time management at the hospital.
                         </p>
                </div>
            </div>
            </div>

        <div class="col-md-5" style="margin-top: 5%; margin-right: 5%;">
                <div class="card" style="border-radius: 1.5rem;">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-justified bg-primary" style="border-radius: 1.5rem;" id="myTab" role="tablist" style="width: 300px;">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php">Patient</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="doctor_login.php">Doctor</a>
                            </li>
                        </ul><br><br>
                        <h4 class="text-center text-light">Patient Login</h4><br>
                        <form action="" method="post">
                            <label class="text-light" for="">Email</label>
                            <input class="form-control" type="email" placeholder="Enter Email" name="email" required><br>
                            <label class="text-light" for="">Password</label>
                            <input class="form-control" type="password" placeholder="Enter Password" name="password" required><br><br>
                            <center><button class="btn btn-primary" name="patient_login" type="submit">Login</button></center>
                        </form>
                        <a class="text-light" href="forgot_password.php">Forgot password</a>
                    </div>
                </div>
            </div>
           
        </div><br>
        <div class="" style="text-align: justify;">
        <div class="card bg-dark">
            <div class="card-body ">
            <h4 class="text-warning">Health Quotes</h4>
            <p class="text-light">> "Time and health are two precious assests that we don't recognize and appreciate until they have been depleted" - Denis Waitley. </p>
            <p class="text-light">> "A fit body, a calm mind, a house full of love. these things cannot be bought" - Naval Ravikant. </p>
            <p class="text-light">> "God health is not something we can buy. However, it can be an extremely valuable savings account" - Anne Wilson Schaef. </p>
            </div>
        </div>
                
            </div>
    </div>
<br>
<?php include("footer.php");?>