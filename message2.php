<?php include('header1.php');
require_once 'vendor/autoload.php';?>
<?php $con=mysqli_connect("localhost","root","","mass");?>
<?php
    session_start();
    $doctorName = $_SESSION['doctorName'];
    $specialization = $_SESSION['specialization'];

if(isset($_GET['approve']))
{
    $query=mysqli_query($con,"update appointment set doctorStatus='2' where ID = '".$_GET['ID']."'");
    if($query)
    {
    echo "<script>alert('This appointment has been approved');</script>";
    }
}

if (isset($_POST['send'])) {
  $gsm = $_POST['gsm'];
  $msg = $_POST['message'];
 
$messagebird = new MessageBird\Client('0g8jWDVz0TBSJoONQz846YQ9X');
$message = new MessageBird\Objects\Message;
$message->originator = '+2348147078588';
$message->recipients = [ $gsm ];
$message->body = $msg;
$response = $messagebird->messages->create($message);
//var_dump($response); 
 }
?>

<div class="container-fluid">
    <div class="row">
    <div class="col-3 text-light bg-primary text-center" style="min-height: 600px;"><hr class="bg-primary">
    <h2 class="text-warning">Doctor's Dashboard</h2><br><hr>
        
    <!--<img class="img-fluid img-thumbnail mx-auto d-block" alt="Responsive image" src="<?php?>" style="height: 150px; width: 150px;"><br><br><br>-->
        <tr class="text-center"> 
        <a href="doctor_profile.php"><button class="fun btn btn-light w-100"><h5>Profile</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="doctor_appointment.php"><button class="fun btn btn-light w-100"><h5>My Appointment</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="logout_doctor.php"><button class="fun btn btn-light w-100"><h5>Sign out </h5></button></a>
        </tr><hr class="bg-light">

    </div>


    <div class="col-9"><br>
    <div class="jumbotron">
    <div class="card">
    <div class="card-body">
    <h3 class="text-center">Send Message to Patient</h3><br><br>

<?php 
if (isset($_POST['send'])) {?>
  <h2 class="text-success">Approval Message Notification Sent Successfully.</h2><br>
<?php }
?>


    <form class="form-group" method="post" action="">
                <div class="row">
                <?php
                $con=mysqli_connect("localhost","root","","mass");
              global $con;
              if(isset($_GET['approve']))
    {
      $query=mysqli_query($con,"select * from appointment where ID = '".$_GET['ID']."'");
      while ($row = mysqli_fetch_array($query)) {
          ?>
                <div class="col-md-4"><label>Patient's Firstname:</label></div>
                  <div class="col-md-6"><input type="text" value="<?php echo ucfirst($row['firstname']); ?>" class="form-control" name="firstname" readonly></div><br><br>

                  <div class="col-md-4"><label>Patient's Lastname </label></div>
                  <div class="col-md-6"><input type="text" value="<?php echo ucfirst($row['lastname']); ?>" class="form-control" name="lastname" readonly></div><br><br>

                  <div class="col-md-4"><label>Patient's phone no:</label></div>
                  <div class="col-md-6"><input type="text" value="<?php echo $row['gsm']; ?>" class="form-control" name="gsm" readonly></div><br><br>

                  <div class="col-md-4"><label>Message:</label></div>
                  <div class="col-md-6"><textarea class=" form-control" type="text" name="message"><?php echo "Dear ".ucfirst($row['firstname'])." ".ucfirst($row['lastname']). ", your appointment with "
                  .$row['doctorName']. ", schedulled to hold on " .$row['appdate']. " at " .$row['apptime']. " has been approved."; ?></textarea></div>

                  <div class="col-md-4"><label></label></div>
                  <div class="col-md-6">
                    <input type="submit" name="send" value="Click to send approval message" class="btn btn-primary" id="inputbtn">
                  </div>                  
                </div>
              </form>
    
    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>

    <?php include("footer.php");}}?>