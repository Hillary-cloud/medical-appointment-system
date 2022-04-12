<?php include("header1.php");?>
<?php
    session_start();
    $con=mysqli_connect("localhost","root","","mass");
    //$id = $_SESSION['ID'];
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
            <?php 

              $con=mysqli_connect("localhost","root","","mass");
              global $con;
              if(isset($_GET['view']))
    {
      $query=mysqli_query($con,"select * from appointment where ID = '".$_GET['ID']."'");
      while ($row = mysqli_fetch_array($query)) {
          ?>
               <h3 class="text-left">Appointment Details</h3><hr>
    <div class=" jumbotron">
    <div class="row">
    <div style="margin-top: 3%; margin-left: 20%;" class="col-8">
    <div id="div1"  class="card border-4">
        <div class="card-body">
        <h3 class="text-center text-success"><strong>Medical Appointment Schedulling System</strong></h1><hr>
        <a class="d-none" href="payment.php?ID=<?php echo $row['id']?>&view=select">Card payment here</a>
        <h4 class="text-center"><strong>Doctor's Details</strong></h4>
        <div class="row ">
<div class="col-8">
        <h6>Doctor Name:</h6>
        <h6>Specialization:</h6>
    </div>

     <div class="col-4">
     <h6 class="d-none"><?php echo $row['id']; ?></h6>
<h6><?php echo $row['doctorName']; ?></h6>
<h6><?php echo $row['specialization']; ?></h6>

     </div><hr>
    </div>
    <h4 class="text-center"><strong>Patient's Details</strong></h4>
<div class="row ">
<div class="col-8">
        <h6>Name:</h6>
        <h6>Email:</h6>
        <h6>Phone No:</h6>
        <h6>Appointment Date:</h6>
        <h6>Appointment Time:</h6>

     </div>

     <div class="col-4">
<h6><?php echo ucfirst($row['firstname'])," ", ucfirst($row['lastname']); ?></h6>
<h6><?php echo $row['email']; ?></h6>
<h6><?php echo $row['gsm']; ?></h6>
<h6><?php echo $row['appdate']; ?></h6>
<h6><?php echo $row['apptime']; ?></h6>

     </div>
    </div><hr>

    <div class="row">
        <div class="col-12 table-responsive">
        <table class="text-left" border align="center" width="100%" cellspacing="1" cellpadding="1">
            <tr>
                <th>Description</th>
                <th>Amount</th>
                <th>Payment Type</th>
            </tr>

            <tr>
                <td><?php echo $row['email']; ?></td>
                <td>NGN
                
                </td>
                <td>CONSULTATION FEES</td>
            </tr>
            <tr>
                <td>.</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>.</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Total:</td>
                <td><strong>
                    <?php echo $row['doctorFee'];?>
                </strong></td>
                <td></td>
            </tr>
        </table><hr>
        <p class="text-warning">Ensure you take a copy of this invoice to the hospital, as you will need it to make payment on arrival at the hospital.</p>
        </div>
    </div>
    <br>
    </div>
    
    </div>
    
    

    <button onclick="printContent('div1')" class="btn btn-success">Print</button>
    
    </div>
    </div></div></div>
    </div></div>
    </div>
    <?php }
      
    }else {
      echo "could not view appointment";
    }
        
            ?>
    <?php include("footer.php"); ?>
    <script>
        function printContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;

        }
    </script>