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



if(isset($_POST['app-submit']))
{
  $pid = $_SESSION['pid'];
  $email = $_SESSION['email'];
  $firstname = $_SESSION['firstname'];
  $gender = $_SESSION['gender'];
  $lastname = $_SESSION['lastname'];
  $gsm = $_SESSION['gsm'];

  $doctorName=$_POST['doctorName'];
  $doctorFee=$_POST['doctorFee'];
  $specialization=$_POST['specialization'];
  $appdate=$_POST['appdate'];
  $apptime=$_POST['apptime'];
  $problem=$_POST['problem'];
  $cur_date = date("Y-m-d");
  date_default_timezone_set('Africa/Lagos');
  $cur_time = date("H:i:s");
  $apptime1 = strtotime($apptime);
  $appdate1 = strtotime($appdate);
	
  if(date("Y-m-d",$appdate1)>=$cur_date){
    if((date("Y-m-d",$appdate1)==$cur_date and date("H:i:s",$apptime1)>$cur_time) or date("Y-m-d",$appdate1)>$cur_date) {
      $check_query = mysqli_query($con,"select apptime from appointment where doctorName='$doctorName' and appdate='$appdate' and apptime='$apptime'");

        if(mysqli_num_rows($check_query)==0){
          $query=mysqli_query($con,"insert into appointment(pid,firstname,lastname,gender,email,gsm,doctorName,doctorFee,specialization,appdate,apptime,problem,userStatus,doctorStatus,payment_status,appointment_status) values('$pid','$firstname','$lastname','$gender','$email','$gsm','$doctorName','$doctorFee','$specialization','$appdate','$apptime','$problem','1','1','','')") or die(mysqli_error($con));

          if($query)
          {
            header("location:myappointment_history.php");
            echo "<script>alert('Your appointment is successfully booked');</script>";
           
          }
          else{
            echo "<script>alert('Unable to process your request. Please try again!');</script>";
          }
      }
      else{
        echo "<script>alert('We are sorry to inform you that the doctor is not available in this time or date. Please choose a different time or date!');</script>";
      }
    }
    else{
      echo "<script>alert('Select a valid time or date!');</script>";
    }
  }
  else{
      echo "<script>alert('Select a valid time or date!');</script>";
  }
  
}
?>

<?php

function display_specs() {
  global $con;
  $query="select distinct(specialization) from doctor";
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

function display_docs()
{
 global $con;
 $query = "select * from doctor";
 $result = mysqli_query($con,$query);
 while( $row = mysqli_fetch_array($result) )
 {
  $doctorName = $row['doctorName'];
  $doctorFee = $row['doctorFee'];
  $specialization = $row['specialization'];
  echo '<option value="' .$doctorName. '" data-value="'.$doctorFee.'" data-spec="'.$specialization.'">'.$doctorName."|".$doctorFee.'</option>';
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
    <h3 class="text-center">Creat Appointment Here</h3><br>

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <center><h4>Create an appointment</h4></center><br>
              <form class="form-group" method="post" action="">
                <div class="row">
                  
                  <!-- <?php

                        $con=mysqli_connect("localhost","root","","mass");
                        $query=mysqli_query($con,"select doctorName,specialization,doctorFee from doctor");
                        $docarray = array();
                          while($row =mysqli_fetch_assoc($query))
                          {
                              $docarray[] = $row;
                          }
                          echo json_encode($docarray);

                  ?> -->
        

                    <div class="col-md-4">
                          <label for="spec">Specialization:</label>
                        </div>
                        <div class="col-md-6">
                          <select name="specialization" class="form-control" id="specialization" required>
                              <option value="" disabled selected>Select Specialization</option>
                              <?php 
                              display_specs();
                              ?>
                          </select>
                        </div>

                        <br><br>

                        <script>
                      document.getElementById('specialization').onchange = function foo() {
                        let spec = this.value;   
                        console.log(spec)
                        let docs = [...document.getElementById('doctorName').options];
                        let docsfee = [...document.getElementById('doctorFee').options];
                        
                        docs.forEach((el, ind, arr)=>{
                          arr[ind].setAttribute("style","");
                          if (el.getAttribute("data-spec") != spec ) {
                            arr[ind].setAttribute("style","display: none");
                          }
                        });
                        docsfee.forEach((el, ind, arr)=>{
                          arr[ind].setAttribute("style","");
                          if (el.getAttribute("data-spec") != spec ) {
                            arr[ind].setAttribute("style","display: none");
                          }
                        });
                      };

                  </script>

              <div class="col-md-4"><label for="doctor">Doctors:</label></div>
                <div class="col-md-6">
                    <select name="doctorName" class="form-control" id="doctorName" required="required">
                      <option value="" disabled selected>Select Doctor with consultation fee</option>
                
                      <?php display_docs(); ?>
                      
                    </select>
                  </div><br/><br/> 
                  <div class="col-md-4"><label for="doctorFee">Consultation Fee(NGN):</label></div>
                <div class="col-md-6">
                    <select name="doctorFee" class="form-control" id="doctorFee" required="required">
                      <option value="" disabled selected>Consultation fee</option>
                
                      <?php display_fee(); ?>
                      
                    </select>
                  </div><br/><br/> 

                  <div class="col-md-4"><label>Appointment Date</label></div>
                  <div class="col-md-6"><input type="date" class="form-control datepicker" name="appdate" required></div><br><br>

                  <div class="col-md-4"><label>Appointment Time</label></div>
                  <div class="col-md-6">
                    <!-- <input type="time" class="form-control" name="apptime"> -->
                    <select name="apptime" class="form-control" id="apptime" required="required">
                      <option value="" disabled selected>Select Time</option>
                      <option value="8:00 AM - 8:30 AM">8:00 AM - 8:30 AM</option>
                      <option value="8:30 AM - 9:00 AM">8:30 AM - 9:00 AM</option>
                      <option value="9:00 AM - 9:30 AM">9:00 AM - 9:30 AM</option>
                      <option value="9:30 AM - 10:00 AM">9:30 AM - 10:00 AM</option>
                      <option value="10:00 AM - 10:30 AM">10:00 AM - 10:30 AM</option>
                      <option value="10:30 AM - 11:00 AM">10:30 AM - 11:00 AM</option>
                      <option value="11:00 AM - 11:30 AM">11:00 AM - 11:30 AM</option>
                      <option value="11:30 AM - 12:00 PM">11:30 AM - 12:00 PM</option>
                      <option value="12:30 PM - 1:00 PM">12:30 PM - 1:00 PM</option>
                      <option value="1:00 PM - 1:30 PM">1:00 PM - 1:30 PM</option>
                      <option value="1:30 PM - 2:00 PM">1:30 PM - 2:00 PM</option>
                      <option value="2:00 PM - 2:30 PM">2:00 PM - 2:30 PM</option>
                      <option value="2:30 PM - 3:00 PM">2:30 PM - 3:00 PM</option>
                      <option value="3:00 PM - 3:30 PM">3:00 PM - 3:30 PM</option>
                      <option value="3:30 PM - 4:00 PM">3:30 PM - 4:00 PM</option>
                      <option value="4:00 PM - 4:30 PM">4:00 PM - 4:30 PM</option>
                      <option value="4:30 PM - 5:00 PM">4:30 PM - 5:00 PM</option>
                    </select>

                  </div><br><br>

                  <div class="col-md-4"><label>Appointment Reason</label></div>
                  <div class="col-md-6"><textarea type="text" class="form-control" row="10px" col="20px" placeholder="Give a brief reason for this appointment" name="problem" required></textarea></div><br><br>


                  <div class="col-md-4">
                    <input type="submit" name="app-submit" value="Submit Appointment" class="btn btn-primary" id="inputbtn">
                  </div>
                  <div class="col-md-6"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div>
        <br>
    
    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>

    <?php include("footer.php");?>