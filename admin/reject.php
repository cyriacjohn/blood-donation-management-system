<?php
include 'connection.php';

$id = $_GET['id'];
$sql= "UPDATE blood_requests SET request_status = 'rejected' WHERE id={$id}";
$result=mysqli_query($connection,$sql);
mysqli_close($connection);

header("Location: request.php");
 ?>
