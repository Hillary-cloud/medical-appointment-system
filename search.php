<?php
$doctor1=$_REQUEST['doctorName'];
$con=mysqli_connect("localhost","root","","mass");
if ($doctor1!=="") {
    $query = mysqli_query($con,"select * from test where doctorName='$doctor1'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($query);
    $doctorFee = $row["doctorFee"];
    $email = $row["email"];
}
$result = array("$doctorFee", "$email");
$myJSON = json_encode($result);
echo $myJSON;
?>