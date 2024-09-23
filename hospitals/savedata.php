<?php
$username = $_POST['username'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$hospname = $_POST["hospital_name"];
$password = $_POST["password"];
$hashed_password = hash('sha256',$password);
$connection=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
$sql= "INSERT INTO hospitals(user_name,name,phone,mail_id,password) values('{$username}','{$hospname}','{$phone}','{$email}','{$hashed_password}')";
$result=mysqli_query($connection,$sql) or die("query unsuccessful.");
if ($result) {
    $response = [
      'success' => true,
      'message' => 'Registration is successful. Please proceed to login.'
    ];
  } else {
    $response = [
      'success' => false,
      'message' => 'An error occurred during registration.'
    ];
  }
  
  echo json_encode($response);

mysqli_close($connection);
 ?>
