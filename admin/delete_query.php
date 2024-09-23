<?php
include 'connection.php';

  $id = $_GET['id'];
$sql= "DELETE FROM contact_us where query_id={$id}";
$result=mysqli_query($connection,$sql);
mysqli_close($connection);

header("Location: query.php");
 ?>
