<?php include('header1.php');?>
<?php $con=mysqli_connect("localhost","root","","mass");?>
<?php
    session_start();
    $doctorName = $_SESSION['doctorName'];
    $specialization = $_SESSION['specialization'];
?>
<?php 
if(isset($_GET['approve']))
{
    $query=mysqli_query($con,"update appointment set doctorStatus='2' where ID = '".$_GET['ID']."'");
    if($query)
    {
    echo "<script>alert('This appointment has been approved');</script>";
    }
}

if (isset($_POST['conduct'])) {
  $appointment_status = $_POST['appointment_status'];
  $id = $_POST['id'];
  $query="UPDATE `appointment` SET `appointment_status`='$appointment_status' WHERE `id`='$id'";
  $result = mysqli_query($con,$query) or die(mysqli_error($con));
 
}


?>


<div class="container-fluid">
    <div class="row">
    <div class="col-3 text-light bg-primary text-center" style="min-height: 600px;">
    <h2 class="text-warning">Doctor's Dashboard</h2><br><hr>
        
    <!--<img class="img-fluid img-thumbnail mx-auto d-block" alt="Responsive image" src="<?php?>" style="height: 150px; width: 150px;"><br><br><br>-->
        <tr class="text-center"> 
        <a href="doctor_profile.php"><button class="fun btn btn-light w-100"><h5>Profile</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="doctor_appointment.php"><button class="fun btn btn-light w-100"><h5>My Appointments</h5></button></a>
        </tr><hr class="bg-light">
        <tr class="text-center">
        <a href="logout_doctor.php"><button class="fun btn btn-light w-100"><h5>Sign out </h5></button></a>
        </tr><hr class="bg-light">

    </div>


    <div class="col-9"><br>
    <div class="jumbotron">
    <div class="card">
    <div class="card-body">
    <h3 class="text-center">My Appointment Lists</h3><br>


    <div class="table-responsive">
    <table id="patient_data" class="table table-hover table-striped table-bordered">
          <thead>
            <tr class="text-center">
            <th class="d-none" scope="col"></th>
              <th class="d-none" scope="col"></th>
              <th class="d-none" scope="col"></th>
              <th scope="col">S/N</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Gender</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Appointment Date</th>
              <th scope="col">Appointment Time</th>
              <th scope="col">Health Challenge</th>
              <th scope="col">Amount(NGN)</th>
              <th scope="col">Current Status</th>
              <th scope="col">Decline Appointment</th>
              <th scope="col">Approve Appointment</th>
              <th scope="col">Payment Status</th>
              <th scope="col">Appointment Status</th>
              

            </tr>
          </thead>
            <?php 
              $con=mysqli_connect("localhost","root","","mass");
              global $con;
              $doctorName = $_SESSION['doctorName'];
              $specialization = $_SESSION['specialization'];
              $query = "select pid,ID,id,firstname,lastname,gender,email,gsm,appdate,apptime,problem,doctorFee,doctorName,userStatus,doctorStatus,payment_status,appointment_status from appointment where doctorName='$doctorName' and specialization='$specialization' order by id desc";
              $result = mysqli_query($con,$query);
              $i = 1;
              while ($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                <td class="d-none"><?php echo $row['pid'];?></td>
                  <td class="d-none"><?php echo $row['ID'];?></td>
                  <td class="d-none"><?php echo $row['id'];?></td>
                  <td><?php echo $i++ ;?></td>
                  <td><?php echo ucfirst($row['firstname']);?></td>
                  <td><?php echo ucfirst($row['lastname']);?></td>
                  <td><?php echo ucfirst($row['gender']);?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['gsm'];?></td>
                  <td><?php echo $row['appdate'];?></td>
                  <td><?php echo $row['apptime'];?></td>
                  <td><?php echo $row['problem'];?></td>
                  <td><?php echo $row['doctorFee'];?></td>
                  <td>
              <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
              {?>
                <p class="text-warning">Pending</p>
             <?php }elseif(($row['userStatus']==0) && ($row['doctorStatus']==1))  
              {?>
                <p class="text-danger">Declined by patient</p>
             <?php }elseif(($row['userStatus']==1) && ($row['doctorStatus']==0))  
              {?>
                <p class="text-danger">Declined by me</p>
             <?php }elseif(($row['userStatus']==1) && ($row['doctorStatus']==2))  
              {?>
                <p class="text-success">Approved by me</p>
             <?php }elseif (($row['userStatus']==0) && ($row['doctorStatus']==2))
            {?>
              <p class="text-success">Approved by me</p>
           <?php }
                  ?></td>

               <td>
                  <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                  { ?>                                 
                      <a href="message.php?ID=<?php echo $row['ID']?>&cancel=update" 
                        onClick="return confirm('Are you sure you want to decline this appointment ?')"
                        title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">
                        <button class="btn btn-danger">Decline</button></a>
                      <?php } elseif(($row['userStatus']==1) && ($row['doctorStatus']==2))
                      {
                          echo " -- ";
                      }elseif (($row['userStatus']==0) && ($row['doctorStatus']==2)) {
                          echo " -- ";
                      }elseif(($row['userStatus']==1) && ($row['doctorStatus']==0))
                      {?>
                        <p class="text-danger">Declined</p>
                     <?php }elseif (($row['userStatus']==0) && ($row['doctorStatus']==1))
                      {?>
                        <p class="text-danger">Declined</p>
                     <?php }
                      ?>
                  
                  </td>

                    <td>
                  <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                  { ?>
                  
                  <a href="message2.php?ID=<?php echo $row['ID']?>&approve=update"
                  onClick="return confirm('You are about to approve this appointment ?')"
                  tooltip-placement="top" tooltip="approve" title="Approve appointment">
                  <button class="btn btn-success" type="submit" name="">Approve</button>
                  </a>
                  
                  <?php } elseif(($row['userStatus']==1) && ($row['doctorStatus']==0))
                      {
                          echo " -- ";
                      }elseif (($row['userStatus']==0) && ($row['doctorStatus']==1)) {
                          echo " -- ";
                      }elseif(($row['userStatus']==1) && ($row['doctorStatus']==2))
                      {?>
                        <p class="text-success">Approved</p>
                     <?php }elseif (($row['userStatus']==0) && ($row['doctorStatus']==2)) 
                     {?>
                      <p class="text-success">Approved</p>
                   <?php }
                      
                      ?>
                  
                  </td>
                  <td>
                  <h4 class="text-success"><?php echo $row['payment_status']?></h4>
                  </td>
                  <td>
                  <?php 
                  if ($row['payment_status']=="Paid") {?>
                  <form action="" method="post">
                  <input type="text" class="d-none" name="id" value="<?php echo $row['id']; ?>">
                  <input type="text" class="d-none" name="appointment_status" value="<?php echo "Conducted"; ?>">
                  <?php
                  if ($row['appointment_status']=="Conducted") {?>
                    <h4 class="text-success"><?php echo $row['appointment_status']; ?></h4>
                 <?php }else{?>
                    <button class="btn btn-primary btn-sm" name="conduct" 
                    onClick="return confirm('Click on Conduct button only when this appointment has been held between the doctor and the patient')" >Conduct</button>
                <?php }
                  ?>
                  
                  </form>
              <?php  }else {
                echo "";
              }
               ?>
                  </td>
                </tr></a>
              <?php } ?>
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

    <style>
thead input {
        width: 120%;
    }
</style>
<script>
 
    $(document).ready(function () {
        
    // Setup - add a text input to each footer cell
    
    $('#patient_data thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#patient_data thead');

    var table = $('#patient_data').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('keyup change', function (e) {
                            e.stopPropagation();
 
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
 
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
        dom: 'Bfrtip',
              buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
    });
});
</script>