<?php
include 'connection.php';

$id = $_GET['id'];
$units_req = $_GET['units'];
$bld = base64_decode($_GET['blood_group']);
$sql = "SELECT * FROM blood_units WHERE blood_group ='{$bld}'";
$result = mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$units = $row['units'];
if ($units < $units_req)
{
    $error = "Insufficient units available!!";
}
else
{   
    $bal = $units - $units_req;
    $sql1 = "UPDATE blood_units SET units = $bal WHERE blood_group = '{$bld}'";
    $result1=mysqli_query($connection,$sql1);
    $sql2= "UPDATE blood_requests SET request_status = 'approved' WHERE id='{$id}'";
    $result2=mysqli_query($connection,$sql2);
}
mysqli_close($connection);
if (isset($error)) 
{
    header("Location: request.php?error=" . urlencode($error));
} else 
{
    header("Location: request.php");
}
 ?>
