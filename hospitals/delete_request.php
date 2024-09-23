<?php
include 'connection.php';
$id = $_GET['id'];
$sql= "DELETE FROM blood_requests where id={$id}";
$result=mysqli_query($connection,$sql);

header("Location: request_status.php");

mysqli_close($connection);

 ?>
