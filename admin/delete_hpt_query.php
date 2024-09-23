<?php
include 'connection.php';

  $id = $_GET['id'];
$sql= "DELETE FROM contact_admin where id={$id}";
$result=mysqli_query($connection,$sql);
mysqli_close($connection);

header("Location: hospital_query.php");
 ?>
