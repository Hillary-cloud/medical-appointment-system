<?php include('header.php');?>
<?php
session_start();
$con=mysqli_connect("localhost","root","","mass");
if(isset($_POST['admin_login'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from admin where username='$username' and password='$password';";
	$result=mysqli_query($con,$query) or die(mysqli_error($con));
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['username']=$username;
		header("Location:admin_dashboard.php");
	}
	else
		// header("Location:error2.php");
		echo("<script>alert('Invalid Username or Password. Try Again!');
          window.location.href = 'admin_login.php';</script>");
}
?>

    <div class="container">
        <div class="row">

            <div class="col-md-6" style="margin-top: 15%; margin-right: 2%; color:white; text-align: justify;">
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
                                <a class="nav-link text-white" href="index.php">Patient</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="doctor_login.php">Doctor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="admin_login.php">Admin</a>
                            </li>
                        </ul><br><br>
                        <h4 class="text-center text-light">Login as Admin</h4><br>
                        <form action="" method="post">
                            <label class="text-light" for="">Username</label>
                            <input class="form-control" type="text" placeholder="Enter Username" name="username"><br>
                            <label class="text-light" for="">Password</label>
                            <input class="form-control" type="password" placeholder="Enter Password" name="password"><br><br>
                            <center><button class="btn btn-primary" type="submit" name="admin_login">Login</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="card bg-dark">
                <div class="card-body">
                <h4 class="text-warning">Health Quotes</h4>
            <p class="text-light">> "Time and health are two precious assests that we don't recognize and appreciate until they have been depleted" - Denis Waitley. </p>
            <p class="text-light">> "A fit body, a calm mind, a house full of love. these things cannot be bought" - Naval Ravikant. </p>
            <p class="text-light">> "God health is not something we can buy. However, it can be an extremely valuable savings account" - Anne Wilson Schaef. </p>
                </div>
            </div>
    </div>
<br>
<?php include("footer.php");?>