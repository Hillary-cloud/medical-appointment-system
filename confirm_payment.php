<?php include("header1.php");?>
<?php
    session_start();
    $con=mysqli_connect("localhost","root","","mass");
   // $id = $_SESSION['ID'];
    $pid = $_SESSION['pid'];
    $email = $_SESSION['email'];
    $firstname = $_SESSION['firstname'];
    $gender = $_SESSION['gender'];
    $lastname = $_SESSION['lastname'];
    $gsm = $_SESSION['gsm'];

?>
  


<div class="container-fluid">
    <div class="row">
    <div class="col-3 text-light bg-primary text-center" style="min-height: 600px;"><hr class="bg-primary"><hr class="bg-light">
    <h2>Dashboard</h2><br>
        
    <img class="img-fluid img-thumbnail mx-auto d-block" alt="Responsive image" src="<?php?>" style="height: 150px; width: 150px;"><br><br><br>
        <tr class="text-center"> 
        <a href="patient_profile.php"><button class="fun btn btn-light w-100"><h5>Profile</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="book_appointment.php"><button class="fun btn btn-light w-100"><h5>Book Appointment</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="myappointment_history.php"><button class="fun btn btn-light w-100"><h5>My Appointment History</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="patient_prescription.php"><button class="fun btn btn-light w-100"><h5>Prescription</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="logout_patient.php"><button class="fun btn btn-light w-100"><h5>Sign out </h5></button></a>
        </tr><hr class="bg-light">

    </div>


    <div class="col-9"><br>
               <h3 class="text-left">Payment Page</h3><hr>
    <div class=" jumbotron">
    <div class="row">
    <div style="margin-top: 3%; margin-left: 20%;" class="col-8">
    <div id="div1"  class="card border-4">
        <div class="card-body">
        <h3 class="text-center text-success"><strong>Medical Appointment Schedulling System</strong></h1><hr>
        <form class="form-group" method="post" id="paymentForm" action="">
                <div class="row">
                <h5 class="text-center text-success"><strong>Consultation Fee Payment</strong></h5><hr>
                <?php
                $con=mysqli_connect("localhost","root","","mass");
              global $con;
              if(isset($_GET['view']))
    {
      $query=mysqli_query($con,"select * from appointment where ID = '".$_GET['ID']."'");
      while ($row = mysqli_fetch_array($query)) {
          ?>
                <input  class="" name="id" id="id" type="text" value="<?php echo $row['id'];?>">

                  <div class="col-md-4"><label></label></div>
                  <div class="col-md-6">
                    <input type="submit" name="pay" value="Pay" class="btn btn-primary" id="inputbtn">
                  </div>                  
                </div>
              </form>
    


    </div>
    <br>
    </div>
    
    </div>
    
    </div>
    </div></div></div>
    </div></div>
    </div><?php } }?>
    <?php include("footer.php");  ?>
