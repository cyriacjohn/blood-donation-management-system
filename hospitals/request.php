<?php
 include 'connection.php';
   include 'session.php';
   if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
   ?>
<?php
$username=$_SESSION['username'];
$sql="select * from hospitals where user_name='$username'";
$result=mysqli_query($connection,$sql) or die("query failed.");
$row=mysqli_fetch_assoc($result);
$hospital_name=$row['name'];
$bloodgroup = $_POST['bloodGroup'];
$units = $_POST['units'];
$priority = $_POST['priority'];
$connection=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
$sql= "INSERT INTO blood_requests(blood_group,units,hospital,priority) values('{$bloodgroup}','{$units}','{$hospital_name}','{$priority}')";
$result=mysqli_query($connection,$sql) or die("query unsuccessful.");

$msg = "Request submitted successfully!!";
session_start();
$_SESSION['success_message'] = $msg;
header("Location: request_blood.php");
exit();


mysqli_close($connection);
 ?>
 <?php
 } else {
     echo '<div class="alert alert-danger"><b> Please Login First To Access Portal.</b></div>';
     ?>
     <form method="post" name="" action="login_register.php" class="form-horizontal">
       <div class="form-group">
         <div class="col-sm-8 col-sm-offset-4" style="float:left">

           <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
         </div>
       </div>
     </form>
 <?php }
  ?>
