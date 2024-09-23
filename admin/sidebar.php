<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">
  <style>
    /* Sidebar */
    .sidebar {
      width: 200px; /* Adjust the width as desired */
      height: 100vh;
      background-color: rgb(0, 0, 0);
      color: #fff;
    }
    
    .sidebar ul.nav {
      padding: 20px;
      list-style-type: none;
    }
    
    .sidebar ul.nav li {
      margin-bottom: 10px;
    }
    
    .sidebar ul.nav li a {
      color: #fff;                              
      text-decoration: none;

    }
    
    .sidebar ul.nav li a:hover,
    .sidebar ul.nav li a.active {
      color: red;
    }
   
  </style>
</head>
<body>
  <div class="sidebar">
    <ul class="nav">
      <li><a href="dashboard.php" <?php if($active=='dashboard') echo "class='active'" ;?>>Dashboard</a></li>
      <li><a href="donor_list.php" <?php if($active=='donor_list') echo "class='active'" ;?>>Donor List</a></li>
      <li><a href="query.php" <?php if($active=='contact') echo "class='active'" ;?>>Queries</a></li>
      <li><a href="request.php"<?php if($active=='request') echo "class='active'" ;?>>Blood Requests</a></li>
      <li><a href="blood_status.php"<?php if($active=='blood_status') echo "class='active'" ;?>>Blood Bank Status</a></li>
      <li><a href="hospital_query.php"<?php if($active=='hospital_query') echo "class='active'" ;?>>Hospital Queries</a></li>

    </ul>
  </div>
  

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
