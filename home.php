<html>

<head>
  <title>Blood Donation System</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
   .bg-image {
  /* The image used */
  background-image: url("./image/back.png");

  /* Add the blur effect */
  /*filter: blur(2px);
  -webkit-filter: blur(2px);/*

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size : 50%;
}
</style>
</head>

<body>
<div>
<?php
$active="home";
include('head.php'); ?>
<?php include'liveupd.php'; ?>
</div>
<div class="bg-image">
</div>
<div>
<div>
<?php include('footer.php');?>
</div>

</body>

</html>
