<?php include("header1.php");?>
<?php
    session_start();
    $con=mysqli_connect("localhost","root","","mass");

    $username = $_SESSION['username'];

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
    <h3 class="text-center">List of Doctors</h3><br>
    <div class="jumbotron">
    <div class="card">
    <div class="card-body">
    <form action="add_doctor.php" method="post">
        <button class="btn btn-primary">Add Doctor</button>
    </form><br>
    <div class="container">
    <div class="table-responsive">
    <table id="doctor_data"  class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>ID</th>
		<th>Doctor Name</th>
		<th>Email</th>
		<th>Gender</th>
		<th>Gsm</th>
		<th>Address</th>
        <th>Specialization</th>
		<th>DoctorFee</th>
		<th>Dob</th>
        <th>Password</th>
        <th>Action</th>
	</tr>
    </thead>

    <?php 
       if (isset($_POST['delete'])) {
        $id = $_POST['id'];
               $query = "DELETE FROM doctor WHERE id = '$id'";
               $result=mysqli_query($con,$query) or die(mysqli_error($con));
               if ($result) {?>
                   <h5 class="text-success">Doctor was successfuly removed.</h5>
               <?php }else {?>
                   <h5 class="text-danger"> Doctor could not be removed.</h5>
               <?php }
           }
 
    $query="select * from doctor";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
         $i = 1;
    while ($row=mysqli_fetch_assoc($result)) {?>
        
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['doctorName'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['gsm'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['specialization'];?></td>
            <td><?php echo $row['doctorFee'];?></td>
            <td><?php echo $row['dob'];?></td>
            <td><?php echo $row['password'];?></td>
            <td>
            <form action="edit_doctor.php" method="post">
            <input name="id" class="d-none" value="<?php echo $row['id']?>" >
                <button class="btn btn-primary btn-sm" name="edit" type="submit">Edit</button>
            </form>

            <form action="" method="post">
            <input name="id" class="d-none" value="<?php echo $row['id']?>" >
                <button class="btn btn-danger btn-sm" name="delete" onclick= "return confirm('Are you sure you want to delete this doctor?')" type="submit">Delete</button>
            </form>
            </td>
        </tr>

    <?php } ?>

    </table>
    </div>

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
    
    $('#doctor_data thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#doctor_data thead');

    var table = $('#doctor_data').DataTable({
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