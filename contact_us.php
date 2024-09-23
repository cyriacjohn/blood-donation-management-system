<html>
<head>
  <title>Contact Us</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<?php $active ='contact_us';
include 'head.php'; ?>
<?php
if(isset($_POST["send"])){
$name=$_POST['fullname'];
$number=$_POST['contactno'];
$email=$_POST['email'];
$message=$_POST['message'];
$conn=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
$sql= "insert into contact_us (query_name,query_mail,query_number,query_message) values('{$name}','{$number}','{$email}','{$message}')";
$result=mysqli_query($conn,$sql) or die("query unsuccessful.");
  echo '<div class="alert alert-success alert_dismissible"><b><button type="button" class="close" data-dismiss="alert">&times;</button></b><b>Query Sent, We will contact you shortly. </b></div>';
}?>

<div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
  <div class="container">
  <div id="content-wrap" style="padding-bottom:50px;">
    <h1 class="mt-4 mb-3">Contact Us</h1>
    <div class="row">
      <div class="col-lg-8 mb-4">
        <form name="sentMessage"  method="post">
            <div class="control-group form-group">
                <div class="controls">
                    <label>Name:</label>
                    <input type="text" class="form-control" placeholder="Enter your name " id="name" name="fullname" required>
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Phone:</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" name="contactno"  required >
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Email:</label>
                    <input type="email" class="form-control" placeholder="Enter your mail ID" id="email" name="email" required>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Message:</label>
                    <textarea rows="10" cols="100" class="form-control" placeholder="Enter your message" id="message" name="message" required  maxlength="999" style="resize:none"></textarea>
                </div>
            </div>
            <button type="submit" name="send" style="background-color:#e74c3c" class="btn btn-primary">Send</button>
        </form>
    </div><
    
</div>

</div>
</div>
<?php include 'footer.php' ?>
</div>
</body>

</html>
