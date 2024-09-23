<?php
include 'connection.php';
  $donor_id = $_GET['id'];
$sql= "DELETE FROM donor_details where id={$donor_id}";
$result=mysqli_query($connection,$sql);

header("Location: donor_list.php");

mysqli_close($connection);

 ?>
