<?php
include 'connection.php';
$name=$_POST['name'];
$number=$_POST['phone'];
$email=$_POST['email'];
$message=$_POST['message'];
$conn=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
$sql= "insert into contact_admin (query_name,query_phone,query_email,query_message) values('{$name}','{$number}','{$email}','{$message}')";
$result=mysqli_query($conn,$sql) or die("query unsuccessful.");

$msg = "Query submitted successfully, we'll contact you shortly!";
session_start();
$_SESSION['success_message'] = $msg;
header("Location: contact.php");
exit();


?>

