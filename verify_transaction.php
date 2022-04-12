<?php include("header1.php");?>

<?php
$ref = $_GET['reference'];
if ($ref == "") {
    # code...
    header("location:javascript://history.go(-1)");
}
  $curl = curl_init();

  

  curl_setopt_array($curl, array(

    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_ENCODING => "",

    CURLOPT_MAXREDIRS => 10,

    CURLOPT_TIMEOUT => 30,

    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

    CURLOPT_CUSTOMREQUEST => "GET",

    CURLOPT_HTTPHEADER => array(

      "Authorization: Bearer sk_test_75a0b03227da848ffb804f988aca294626b906b3",

      "Cache-Control: no-cache",

    ),

  ));

  

  $response = curl_exec($curl);

  $err = curl_error($curl);

  curl_close($curl);

  

  if ($err) {

    echo "cURL Error #:" . $err;

  } else {

   // echo $response;
   $result = json_decode($response);

  }
  if ($result->data->status == 'success') {
      $status = $result->data->status;
      $reference = $result->data->reference;
      $lastname = $result->data->customer->last_name;
      $firstname = $result->data->customer->first_name;
      $fullname = $firstname.' '.$lastname;
      $customer_email = $result->data->customer->email;
      date_default_timezone_set('Africa/Lagos');
      $Date_time = date('m/d/Y h:i:s a', time());

      $con=mysqli_connect("localhost","root","","mass");
      $stmt = $con->prepare("INSERT INTO payment (status,reference,fullname,date,email) VALUE (?,?,?,?,?)");
      $stmt->bind_param("sssss",$status,$reference,$fullname,$Date_time,$customer_email);
      $stmt->execute();
      if (!$stmt) {
          echo "There was a problem on your code". mysqli_error($con);
      }else{
          header("Location:verify_transaction.php");
      }

  }else{
    header("Location:myappointment_history.php"); ?>
      <p class="text-success">Success</p>
  <?php }

?>