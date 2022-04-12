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
        <form class="form-group" method="post" id="paymentForm" action="https://js.paystack.co/v1/inline.js">
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
                <input  class="d-none" name="id" id="id" type="text" value="<?php echo $row['id'];?>">
                <div class="col-md-4"><label> First Name:</label></div>
                  <div class="col-md-6"><input type="text"  id="firstname" value="<?php echo ucfirst($row['firstname']); ?>" class="form-control" name="firstname" readonly></div><br><br>

                  <div class="col-md-4"><label>Last Name </label></div>
                  <div class="col-md-6"><input type="text" id="lastname" value="<?php echo ucfirst($row['lastname']); ?>" class="form-control" name="lastname" readonly></div><br><br>

                  <div class="col-md-4"><label>Phone no:</label></div>
                  <div class="col-md-6"><input type="text" id="gsm" value="<?php echo $row['gsm']; ?>" class="form-control" name="gsm" readonly></div><br><br>

                    
                  <div class="col-md-4"><label>Email:</label></div>
                  <div class="col-md-6"><input type="email" id="email" value="<?php echo $row['email']; ?>" class="form-control" name="email" readonly></div><br><br>

                  <div class="col-md-4"><label>Amount(NGN):</label></div>
                  <div class="col-md-6"><input type="text" id="doctorFee" value="<?php echo $row['doctorFee']; ?>" class="form-control" name="doctorFee" readonly></div>

                  <div class="col-md-4"><label></label></div>
                  <div class="col-md-6">
                    <input type="submit" onclick="payWithPaystack()" name="pay" value="Pay" class="btn btn-primary" id="inputbtn">
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
    </div>
    <?php }
      
    }else {
      echo "could not make payment";
    }
        
            ?>
    <?php include("footer.php"); ?>

    <script>
const paymentForm = document.getElementById('paymentForm');

paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {

  e.preventDefault();

  let handler = PaystackPop.setup({

    key: 'pk_test_a866f1b5e5d8f2d3549790c8333bbf7fc9d15e5b', // Replace with your public key
    id: document.getElementById("id").value,
    email: document.getElementById("email").value,
    firstname: document.getElementById("firstname").value,
    lastname: document.getElementById("lastname").value,
    gsm: document.getElementById("gsm").value,
    amount: document.getElementById("doctorFee").value * 100,

    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

    // label: "Optional string that replaces customer email"

    onClose: function(){
    
      alert('Transaction Cancelled.');

    },

    callback: function(response){

      let message = 'Payment complete! Reference: ' + response.reference;

      alert(message);
      window.location = "http://localhost/myproject/verify_transaction.php?reference=" + response.reference;

    }

  });

  handler.openIframe();

}
</script>