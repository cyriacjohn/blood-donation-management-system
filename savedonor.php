<?php
$name = $_POST['name'];
$_SESSION['name'] = $name;
$phone = $_POST['phone'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$bloodgroup = $_POST['bloodGroup'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$connection=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
$sql = "INSERT INTO donor_details(name,mobile,mail_id,age,gender,blood_group,address,city,state) values('{$name}','{$phone}','{$email}','{$age}','{$gender}','{$bloodgroup}','{$address}','{$city}','{$state}')";
$result=mysqli_query($connection,$sql) or die("query unsuccessful.");
$sql1 = "UPDATE blood_units SET units = units + 1 where blood_group='{$bloodgroup}'";
$result1=mysqli_query($connection,$sql1) or die("query unsuccessful.");

if($result && $result1)
{
  $url = "generate_certificate.php?name=" . urlencode($name);
  header("Location:".$url);
}
else
{ header("Location:reg_failed.php"); 
}

mysqli_close($connection);
 ?>
