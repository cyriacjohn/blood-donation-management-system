<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">
  <style>
    /* Header */
    .dashboard-header {
      background-color: #000;
      color: #fff;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    
    .dashboard-header .user-info {
      display: flex;
      align-items: center;
      position: relative;
    }
    
    .dashboard-header .user-info .user-name {
      margin-right: 10px;

    }
    
    .dashboard-header .user-info .user-name:hover,
    .dashboard-header .user-info .user-name:focus {
      color: red;
    }
    
    .dashboard-header .user-info .dropdown-menu {
      min-width: 100px;
      position: absolute;
      top: 100%;
      right: 0;
      background-color: #fdfdfd;
      color: #000;
      border: none; 
  
    }
    
    .dashboard-header .user-info .dropdown-menu a {
      color: #000000; 
      display: block;
    }
    
    .dashboard-header .user-info .dropdown-menu a:hover {
      background-color: rgba(106, 102, 102,0.4);
    }
   
    .usr{
      padding: 10px;
      color: #fff;                              
    }
    .usr:hover {
      color:red;

    }

  </style>
</head>
<body>
  <header class="dashboard-header">
    <h3>Hospital Dashboard</h3>
    <div class="user-info dropdown">
      <a id="act" class="dropdown-toggle usr" style="text-decoration:none" data-toggle="dropdown" href="#">
        <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;
        <?php
        include 'connection.php';
        $username=$_SESSION['username'];
        $sql="select * from hospitals where user_name='$username'";
        $result=mysqli_query($connection,$sql) or die("query failed.");
        $row=mysqli_fetch_assoc($result);
        echo "Hello ".$row['name'];
        ?>
        <span class="caret"></span>
  </a>
      <ul class="dropdown-menu">
        <li><a href="logout.php">Logout</a></li>
      </ul>
  </div>  
  </header>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
