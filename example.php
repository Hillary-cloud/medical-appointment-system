<?php include("header1.php");?>

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
    <h3 class="text-center">Creat Appointment Here</h3><br>
    <?php
    include_once 'config.php';
    $query = "SELECT * FROM country Order by country_name";
    $result = $db->query($query);
    ?>

        <div class="container">
        <div class="row">
        <div class="col-md-8 col-md-offset-8">
              <center><h4>Create an appointment</h4></center><br>
              <form method="post" action="">                       
                <div class="form-group">
                    <label for="">Country</label>
                    <select name="country" id="country" onChange="fetchState(this.value)" class="form-control" required>
                        <option value="">Select country</option>
                        <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value='.$row['id'].'>'.$row['country_name'].'</option>';
                                }
                                }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">State</label>
                    <select name="state" id="state" onChange="fetchCity(this.value)" class="form-control" required>
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">City</label>
                    <select name="city" id="city" class="form-control" required>
                        <option value="">Select</option>
                    </select>
                </div>
              </form>
        </div>
        <br>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>

    <?php include("footer.php");?>
    <script>
    function fetchState(id){
        $('#state').html('');
        $('#city').html('<option>Select City</option>');
        $.ajax({
            type:'post',
            url: 'ajaxdata.php',
            data: {country_id : id},
            success : function(data){
                $('#state').html(data);
            }
        })
    }
    function fetchCity(id){
        $('#city').html('');
        $.ajax({
            type:'post',
            url: 'ajaxdata.php',
            data: {state_id : id},
            success : function(data){
                $('#city').html(data);
            }
        })
    }
    </script>
    