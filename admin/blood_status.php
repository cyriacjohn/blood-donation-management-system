<html>

<head>
  <title>Blood Bank Status</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.card {
  transition: transform 0.3s;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  height:150px;
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
  height: 100px;
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
$active="blood_status";
include 'sidebar.php'; ?>

</div>
<div id="content">

  <div class="content-wrapper">
    <div class="container-fluid">
          <div class="container mt-5">
          <h1>Blood Bank Status</h1><br><br>
          <div class="row">
      <div class="col-md-3">
        <div class="card">
        <img src="./admin_image/Apos.png" class="card-img-top" >
          <div class="card-body">
            <div class="stat-panel text-center">
                    <?php
                      $sql ="SELECT * from blood_units WHERE blood_group='A+'";
                      $result=mysqli_query($connection,$sql) or die("query failed.");
                      $row=mysqli_fetch_assoc($result);
                      $units = $row['units'];

                    ?>
                    <div class="stat-panel-number h3"><?php echo $units?></div>
            </div>        
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
        <img src="./admin_image/aneg.png" class="card-img-top" >
            <div class="card-body">
            <div class="stat-panel text-center">
                    <?php
                      $sql1 ="SELECT * from blood_units WHERE blood_group='A-'";
                      $result1=mysqli_query($connection,$sql1) or die("query failed.");
                      $row1=mysqli_fetch_assoc($result1);
                      $units1 = $row1['units'];
                    ?>
                    <div class="stat-panel-number h3"><?php echo $units1?></div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
        <img src="./admin_image/bpos.png" class="card-img-top" >
            <div class="card-body">
                    <div class="stat-panel text-center">
                    <?php
                      $sql2 ="SELECT * from blood_units WHERE blood_group='B+'";
                      $result2=mysqli_query($connection,$sql2) or die("query failed.");
                      $row2=mysqli_fetch_assoc($result2);
                      $units2 = $row2['units'];
                    ?>
                    <div class="stat-panel-number h3"><?php echo $units2?></div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
        <img src="./admin_image/bneg.png" class="card-img-top" >
            <div class="card-body">
            <div class="stat-panel text-center">
                    <?php
                      $sql3 ="SELECT * from blood_units WHERE blood_group='B-'";
                      $result3=mysqli_query($connection,$sql3) or die("query failed.");
                      $row3=mysqli_fetch_assoc($result3);
                      $units3 = $row3['units'];
                    ?>
                    <div class="stat-panel-number h3"><?php echo $units3?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br>
      <div class="row">
      <div class="col-md-3">
        <div class="card">
        <img src="./admin_image/abpos.png" class="card-img-top" >
          <div class="card-body">
            <div class="stat-panel text-center">
                    <?php
                      $sql4 ="SELECT * from blood_units WHERE blood_group='AB+'";
                      $result4=mysqli_query($connection,$sql4) or die("query failed.");
                      $row4=mysqli_fetch_assoc($result4);
                      $units4 = $row4['units'];

                    ?>
                    <div class="stat-panel-number h3"><?php echo $units4?></div>
            </div>        
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
        <img src="./admin_image/abneg.png" class="card-img-top" >
            <div class="card-body">
            <div class="stat-panel text-center">
                    <?php
                      $sql5 ="SELECT * from blood_units WHERE blood_group='AB-'";
                      $result5=mysqli_query($connection,$sql5) or die("query failed.");
                      $row5=mysqli_fetch_assoc($result5);
                      $units5 = $row5['units'];

                    ?>
                    <div class="stat-panel-number h3"><?php echo $units5?></div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
        <img src="./admin_image/opos.png" class="card-img-top" >
            <div class="card-body">
            <div class="stat-panel text-center">
                     <?php
                      $sql6 ="SELECT * from blood_units WHERE blood_group='O+'";
                      $result6=mysqli_query($connection,$sql6) or die("query failed.");
                      $row6=mysqli_fetch_assoc($result6);
                      $units6 = $row6['units'];
                    ?>
                    <div class="stat-panel-number h3"><?php echo $units6?></div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
        <img src="./admin_image/oneg.png" class="card-img-top" >
            <div class="card-body">
            <div class="stat-panel text-center">
                    <?php
                      $sql7 ="SELECT * from blood_units WHERE blood_group='O-'";
                      $result7=mysqli_query($connection,$sql7) or die("query failed.");
                      $row7=mysqli_fetch_assoc($result7);
                      $units7 = $row7['units'];
                    ?>
                    <div class="stat-panel-number h3"><?php echo $units7?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
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
