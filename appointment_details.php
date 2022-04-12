<?php include("header1.php");?>
<?php
    session_start();
    $con=mysqli_connect("localhost","root","","mass");

    $username = $_SESSION['username'];

?>
<?php
  if (isset($_POST['payment'])) {
    $payment_status = $_POST['payment_status'];
    $id = $_POST['id'];
    $query="UPDATE `appointment` SET `payment_status`='$payment_status' WHERE `id`='$id'";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
   
  }

?>

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
    <div class="jumbotron">
    <div class="card">
    <div class="card-body">
    <h3 class="text-center">List of All Appointments</h3><br>

    <div class="table-responsive">

     <table id="people_data" class="table table-hover table-striped table-bordered">
       <thead>
         <tr class="text-center">
         <th>S/N</th>
         <th class="d-none">id</th>
           <th>First Name</th>
           <th>Last Name</th>
           <th>Gender</th>
           <th>Email</th>
           <th>Phone</th>
           <th>Doctor Name</th>
           <th>Specialization</th>
           <th>Appointment Date</th>
           <th>Appointment Time</th>
           <th>Amount(NGN)</th>
           <th>Current Status</th>
           <th>Payment Status</th>
           <th>Appointment Status</th>
         </tr>
       </thead>
       <?php 

           $query = "select * from appointment order by id desc";
           $result = mysqli_query($con,$query) or die(mysqli_error($con));
           $i = 1;
           while ($row = mysqli_fetch_array($result)){
         ?>
             <tr>
         
                <td><?php echo $i++;?></td>
                <td  class="d-none"><?php echo $row['id'];?></td>
               <td><?php echo ucfirst($row['firstname']);?></td>
               <td><?php echo ucfirst($row['lastname']);?></td>
               <td><?php echo ucfirst($row['gender']);?></td>
               <td><?php echo $row['email'];?></td>
               <td><?php echo $row['gsm'];?></td>
               <td><?php echo $row['doctorName'];?></td>
               <td><?php echo $row['specialization'];?></td>
               <td><?php echo $row['appdate'];?></td>
               <td><?php echo $row['apptime'];?></td>
               <td><?php echo $row['doctorFee'];?></td>
               <td>
           <?php 
                         if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                         { ?>
                           <p class="text-warning">Pending</p> 
                         <?php }elseif(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                         { ?>
                           <p class="text-danger">Cancelled by Patient</p> 
                         <?php }elseif(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                         { ?>
                           <p class="text-danger">Cancelled by <?php echo $row['doctorName']; ?></p> 
                         <?php }elseif(($row['userStatus']==1) && ($row['doctorStatus']==2))  
                         { ?>
                           <p class="text-success">Approved by <?php echo $row['doctorName']; ?></p> 
                         <?php }elseif(($row['userStatus']==0) && ($row['doctorStatus']==2))  
                         { ?>
                           <p class="text-danger">Cancelled by Patient</p> 
                         <?php }else{
                           
                         } 
               ?></td>
               <td>
               
               <?php 
                if (($row['userStatus']==1) && ($row['doctorStatus']==2)) {?>
                  <form action="" method="post">
                  <input type="text" class="d-none" name="id" value="<?php echo $row['id']; ?>">
                  <input type="text" class="d-none" name="payment_status" value="<?php echo "Paid"; ?>">
                  <?php 
                  if ($row['payment_status']=="Paid") {?>
                    <h3 class="text-success"><?php echo $row['payment_status']; ?></h3>
                 <?php }else {?>
                    <button class="btn btn-primary btn-sm" 
                    onClick="return confirm('Click on pay button only when a patient pays for an appointment')" name="payment" >Pay</button>
                <?php  }
                  ?>
                  
                  </form>
              <?php  }else {
                echo "";
              }
               ?>

               </td>
               <td>
               <h3 class="text-success"><?php echo $row['appointment_status']?></h3>
               </td>
             </tr>
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
    
    $('#people_data thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#people_data thead');

    var table = $('#people_data').DataTable({
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