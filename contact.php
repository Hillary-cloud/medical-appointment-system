<?php include('header.php');?>
<?php
$con=mysqli_connect("localhost","root","","mass");
if (isset($_POST['contactUs'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gsm = $_POST['gsm'];
    $message = $_POST['message'];

    $query = "insert into contact (name,email,gsm,message) values('$name','$email','$gsm','$message')";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    if ($result) {?>
        <h5 class="text-success bg-light">Message sent successfully.</h5>
    <?php }else {?>
        <h5 class="bg-light text-danger">Sorry, your message could not be sent.</h5>
    <?php }
}
?>

<div class="container" style=" display: flex; margin-top: 50px; align-items: center; flex-direction: column;">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <h3 class="text-warning text-center">Leave us a message.</h3>
                    <label class="text-light" for="">Name</label>
                    <input class="form-control" type="text" placeholder="Enter your name" name="name" required><br>
                    <label class="text-light" for="">Email</label>
                    <input class="form-control" type="email" placeholder="Enter Email" name="email" required><br>
                    <label class="text-light" for="">Phone number</label>
                    <input class="form-control" type="text" placeholder="Enter phone number" name="gsm" required><br>
                    <label class="text-white" for="">Message</label><br>
                    <textarea name="message" placeholder="Enter your message here" id="" cols="35" rows="5" required></textarea>
                    <center><button class="btn btn-primary" name="contactUs" type="submit">Send</button></center>
                </form>
            </div>
        </div>
    </div>
</div>
<br>

<?php include('footer.php');?>