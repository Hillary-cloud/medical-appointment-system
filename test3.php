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

    if(isset($_GET['cancel']))
  {
    $query=mysqli_query($con,"update appointment set userStatus='0' where ID = '".$_GET['ID']."'");
    if($query)
    {
      echo "<script>alert('Your appointment has been cancelled');</script>";
    }
  }
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
    <div class="jumbotron">
    <div class="card">
    <div class="card-body">
    <h3 class="text-center">List of My Appointments</h3><br>
    
    <div class="table-responsive">
        
        <table class="table table-hover table-striped">
          <thead>
            <tr class="text-center">
            <th scope="col">S/N</th>
              <th scope="col">Doctor Name</th>
              <th scope="col">Specialization</th>
              <th scope="col">Appointment Date</th>
              <th scope="col">Appointment Time</th>
              <th scope="col">Reason</th>
              <th scope="col">Amount(NGN)</th>
              <th scope="col">Current Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 

              $con=mysqli_connect("localhost","root","","mass");
              global $con;
              $i = 1;
              $query = "select ID,doctorName,specialization,appdate,apptime,problem,doctorFee,userStatus,doctorStatus from appointment where firstname ='$firstname' and lastname='$lastname';";
              $result = mysqli_query($con,$query);
              while ($row = mysqli_fetch_array($result)){
        
            ?>
                <tr>
                <td><?php echo $i++;?></td>
                <td class="d-none"><?php echo $row['ID'];?></td>
                  <td><?php echo $row['doctorName'];?></td>
                  <td><?php echo $row['specialization'];?></td>
                  <td><?php echo $row['appdate'];?></td>
                  <td><?php echo $row['apptime'];?></td>
                  <td><?php echo $row['problem'];?></td>
                  <td><?php echo $row['doctorFee'];?></td>
                  
                    <td>
              <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
              {
                echo "Pending";
              }elseif(($row['userStatus']==0) && ($row['doctorStatus']==1))  
              {
                echo "Cancelled by me";
              }elseif(($row['userStatus']==1) && ($row['doctorStatus']==0))  
              {
                echo 'Cancelled by '. $row['doctorName']; 
              }elseif(($row['userStatus']==1) && ($row['doctorStatus']==2))  
              {
                echo 'Approved by '. $row['doctorName']; 
              }elseif(($row['userStatus']==0) && ($row['doctorStatus']==2))  
              {
                echo 'Approved by '. $row['doctorName']; 
              }
                  ?></td>

                  <td>
                  <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                  { ?>

                                              
                      <a href="myappointment_history.php?ID=<?php echo $row['ID']?>&cancel=update" 
                        onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                        title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
                      <?php }elseif(($row['userStatus']==1) && ($row['doctorStatus']==2))  
                            {
                              echo 'Approved'; 
                            } elseif(($row['userStatus']==0) && ($row['doctorStatus']==2))  
                            {
                              echo 'Approved'; 
                            }elseif(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                            {
                              echo 'Cancelled'; 
                            } elseif(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                            {
                              echo 'Cancelled'; 
                            }
                      ?>
                  
                  </td>
                  <?php 
                    if (($row['userStatus']==1) && ($row['doctorStatus']==2)) {?>
                     <td><a href="appointment_page.php?ID=<?php echo $row['ID']?>&view=select"><button class="btn btn-success">View/Pay</button></a></td> 
                   <?php }else{?>
                    <td><a href="appointment_page2.php?ID=<?php echo $row['ID']?>&view=select"><button class="btn btn-success">View</button></a></td>
                  <?php }
                  ?>
                </tr>
              <?php } ?>
          </tbody>
        </table>
  <br>
</div>


    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>

    <?php include("footer.php");?>




    <!DOCTYPE html>
<html>
 
<head>
  <title>International telephone input with country flags and dial codes using jQuery - Clue Mediator</title>
  <!-- CSS -->
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
  <!-- JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js"></script>
</head>
 
<body>
  <div class="container">
    <div class="col-md-8 mt-4">
      <h5>International telephone input with country flags and dial codes using jQuery - <a href="https://www.cluemediator.com/" target="_blank" rel="noopener noreferrer">Clue Mediator</a></h5>
      <input type="text" id="phone" />
    </div>
  </div>
 
  <script>
    var input = document.querySelector("#phone");
    intlTelInput(input, {
      initialCountry: "auto",
      geoIpLookup: function (success, failure) {
        $.get("https://ipinfo.io", function () { }, "jsonp").always(function (resp) {
          var countryCode = (resp && resp.country) ? resp.country : "us";
          success(countryCode);
        });
      },
    });
  </script>
</body>
 
</html>
