<html>

<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.card {
  transition: transform 0.3s;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  height:300px;
  width:250px;
}
.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}
.card-title{
  font-size:15px;
}
.card-img-top {
  object-fit: cover;
  height: 200px;
  display:block;
  margin-left:auto;
  margin-right:auto;
}
#sidebar{
  position:fixed;
  margin-top:-20px
}
#content{
  position:relative;
  margin-left:210px
}

.block-anchor {
  color:red;
  cursor: pointer;
}
</style>
</head>

<body style="color:black;" >

  <?php
  include 'connection.php';
    include 'session.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>

<div id="header">
<?php include 'header.php';
?>
</div>
<div id="sidebar">
<?php
$active="dashboard";
include 'sidebar.php'; ?>

</div>
<div id="content">

  <div class="content-wrapper">
    <div class="container-fluid">
          <div class="container mt-5">
          <h1>Status</h1><br><br>
          <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="text-center"><img src="./admin_image/bld.png" class="card-img-top" alt="Image 1"></div>
          <div class="card-body">
            <h5 class="card-title"><center><b>Blood Donors Available<b></h5>
            <div class="stat-panel text-center">
                    <?php
                      $sql =" SELECT * from donor_details ";
                      $result=mysqli_query($connection,$sql) or die("query failed.");
                      $row=mysqli_num_rows($result);

                    ?>
                    <div class="stat-panel-number h3"><?php echo $row?></div>
            </div>        
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="./admin_image/usr.jpg" class="card-img-top" alt="Image 2">
          <div class="card-body">
            <h5 class="card-title"><center><b>All User Queries<b></h5>
            <div class="stat-panel text-center">
                    <?php
                      $sql1 =" SELECT * from contact_us ";
                      $result1=mysqli_query($connection,$sql1) or die("query failed.");
                      $row1=mysqli_num_rows($result1);
                    ?>
                    <div class="stat-panel-number h3 "><?php echo $row1?></div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="./admin_image/pnd.jpg" class="card-img-top" alt="Image 3">
          <div class="card-body">
            <h5 class="card-title"><center><b>Pending Queries<b></h5>
            <div class="stat-panel text-center">
                    <?php
                      $sql2 ="SELECT * from contact_us where query_status='pending' ";
                      $result2=mysqli_query($connection,$sql2) or die("query failed.");
                      $row2=mysqli_num_rows($result2);
                    ?>
                    <div class="stat-panel-number h3"><?php echo $row2 ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>

    
  <?php
 } else {
     echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
     ?>
     <form method="post" name="" action="login.php" class="form-horizontal">
       <div class="form-group">
         <div class="col-sm-8 col-sm-offset-4" style="float:left">

           <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
         </div>
       </div>
     </form>
 <?php }
  ?>

</body>
</html>
